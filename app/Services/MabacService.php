<?php

namespace App\Services;

class MabacService
{

    public function calculate($alternatives, $criterias_weight)
    {
        /**
         * Calculate the MABAC.
         *
         * This method calculates the MABAC based on the given set of alternatives and the weights of each criteria.
         * It returns the ranked alternatives.
         *
         * @param array $alternatives The set of alternatives to be ranked.
         * @param array $criterias_weight The weights of each criteria.
         * @return array The ranked alternatives.
         */
        
        $alternatives = $this->mapAlternatives($alternatives);
        $normalized = $this->normalize($alternatives);
        $weightedMatrixV = $this->weightedMatrixV($normalized, $criterias_weight);
        $estimatedBoundaryAreaG = $this->estimatedBoundaryAreaG($weightedMatrixV);
        $alternativeDistanceMatrixQ = $this->alternativeDistanceMatrixQ($weightedMatrixV, $estimatedBoundaryAreaG);
        $alternativeRanking = $this->alternativeRanking($alternativeDistanceMatrixQ, $alternatives);

        return $alternativeRanking;
    }

    private function mapAlternatives($alternatives)
    {
        /**
         * Map the categories of the given set of alternatives.
         *
         * This method maps the categories of the given set of alternatives based on the criteria values.
         * It returns the mapped set of alternatives.
         *
         * @param array $alternatives The set of alternatives to be mapped.
         * @return array The mapped set of alternatives.
         */

        // map kategori nilai dari database
        // jika umur(age) < 20, maka nilai = 1, jika umur > 20 dan umur < 40, maka nilai = 2, jika umur > 40 dan umur < 60, maka nilai = 3, jika umur > 60, maka nilai = 4
        // jika sakit(disease) true maka nilai = 2, jika sakit false maka nilai = 1
        // jika cacat(disability) true maka nilai = 2, jika cacat false maka nilai = 1
        // jika pendapatan 5 maka nilai = 1, jika pendapatan 4 maka nilai = 2, jika pendapatan 3 maka nilai = 3, jika pendapatan 2 maka nilai = 4, jika pendapatan 1 maka nilai = 5
        // jika pendidikan doktor = 1, jika pendidikan magister = 2, jika pendidikan sarjana = 3, jika pendidikan diploma = 4, jika pendidikan SMA = 5, jika pendidikan SMP = 6, jika pendidikan SD = 7
        // 'job', ['Pelajar', 'PNS', 'TNI', 'POLRI', 'Swasta', 'Wiraswasta', 'Petani', 'Nelayan', 'Buruh', 'Lainnya'
        // jika pekerjaan PNS-TNI-POLRI-Pelajar maka nilai = 1, jika pekerjaan Swasta-Wiraswasta maka nilai = 2, jika pekerjaan Petani-Nelayan-Buruh maka nilai = 3, jika pekerjaan Lainnya maka nilai = 2


        $map_alternatives = $alternatives->map(function ($item) {
            $item->age = $item->age < 20 ? 1 : ($item->age > 20 && $item->age < 40 ? 2 : ($item->age > 40 && $item->age < 60 ? 3 : 4));
            $item->disease = $item->disease ? 2 : 1;
            $item->disability = $item->disability ? 2 : 1;
            $item->income = $item->income == 5 ? 1 : ($item->income == 4 ? 2 : ($item->income == 3 ? 3 : ($item->income == 2 ? 4 : 5)));
            $item->education = $item->education == 'Doktor' ? 1 : ($item->education == 'Magister' ? 2 : ($item->education == 'Sarjana' ? 3 : ($item->education == 'Diploma' ? 4 : ($item->education == 'SMA' ? 5 : ($item->education == 'SMP' ? 6 : 7)))));
            $item->job = in_array($item->job, ['PNS', 'TNI', 'POLRI', 'Pelajar']) ? 1 : (in_array($item->job, ['Swasta', 'Wiraswasta']) ? 2 : (in_array($item->job, ['Petani', 'Nelayan', 'Buruh']) ? 3 : 2));
            return $item;
        });

        return $map_alternatives;
    }

    private function normalize($alternatives)
    {
        /**
         * Normalize the given set of alternatives.
         *
         * This method normalizes the values of each alternative based on the minimum and maximum values of each criteria.
         * It calculates the normalized value for each alternative and returns the normalized set of alternatives.
         *
         * @param array $alternatives The set of alternatives to be normalized.
         * @return array The normalized set of alternatives.
         */

        // formula normalized = (Xij - Xmin) / (Xmax - Xmin)

        $normalized = [];
        $criteria = ['age', 'disease', 'disability', 'income', 'education', 'job'];

        foreach ($criteria as $c) {
            $min = $alternatives->min($c);
            $max = $alternatives->max($c);

            $normalized[$c] = $alternatives->map(function ($item) use ($c, $min, $max) {
                if ($max - $min == 0) {
                    return 0; // or any other default value
                }
                return ($item->$c - $min) / ($max - $min);
            });
        }
        // dd($normalized);

        return $normalized;
    }

    private function weightedMatrixV($alternatives, $criterias_weights)
    {
        /**
         * Calculate the weighted matrix V.
         *
         * This method calculates the weighted matrix V based on the normalized set of alternatives and the weights of each criteria.
         * It returns the weighted matrix V.
         *
         * @param array $alternatives The normalized set of alternatives.
         * @param array $weights The weights of each criteria.
         * @return array The weighted matrix V.
         */

        // formula V = (Wi * Aij) + Wi

        $weightedMatrixV = [];
        $criteria = ['age', 'disease', 'disability', 'income', 'education', 'job'];

        foreach ($criteria as $c) {
            $weightedMatrixV[$c] = $alternatives[$c]->map(function ($item) use ($c, $criterias_weights) {
                return ($criterias_weights[$c] * $item) + $criterias_weights[$c];
            });
        }
        // dd($weightedMatrixV);
        return $weightedMatrixV;
    }

    private function estimatedBoundaryAreaG($weightedMatrixV)
    {
        /**
         * Calculate the estimated boundary area G.
         *
         * This method calculates the estimated boundary area G based on the weighted matrix V.
         * It returns the estimated boundary area G.
         *
         * @param array $weightedMatrixV The weighted matrix V.
         * @return array The estimated boundary area G.
         */

        // formula G = (Vij * Vij * ...)pow 1/n

        $estimatedBoundaryAreaG = [];
        $criteria = ['age', 'disease', 'disability', 'income', 'education', 'job'];

        foreach ($criteria as $c) {
            $estimatedBoundaryAreaG[$c] = pow($weightedMatrixV[$c]->reduce(function ($carry, $item) {
                return $carry * $item;
            }, 1), 1 / count($weightedMatrixV[$c]));
        }
        // dd($estimatedBoundaryAreaG);
        return $estimatedBoundaryAreaG;
    }

    private function alternativeDistanceMatrixQ($weightedMatrixV, $estimatedBoundaryAreaG)
    {
        /**
         * Calculate the alternative distance matrix Q.
         *
         * This method calculates the alternative distance matrix Q based on the weighted matrix V and the estimated boundary area G.
         * It returns the alternative distance matrix Q.
         *
         * @param array $weightedMatrixV The weighted matrix V.
         * @param array $estimatedBoundaryAreaG The estimated boundary area G.
         * @return array The alternative distance matrix Q.
         */

        // formula Q = V - G per alternatif dengan setiap kriteria

        $alternativeDistanceMatrixQ = [];
        $criteria = ['age', 'disease', 'disability', 'income', 'education', 'job'];

        foreach ($criteria as $c) {
            $alternativeDistanceMatrixQ[$c] = $weightedMatrixV[$c]->map(function ($item) use ($estimatedBoundaryAreaG, $c) {
                return $item - $estimatedBoundaryAreaG[$c];
            });
        }
        // dd($alternativeDistanceMatrixQ);
        return $alternativeDistanceMatrixQ;
    }

    private function alternativeRanking($alternativeDistanceMatrixQ, $alternatives)
    {
        /**
         * Rank the alternatives.
         *
         * This method ranks the alternatives based on the alternative distance matrix Q.
         * It returns the ranked alternatives.
         *
         * @param array $alternativeDistanceMatrixQ The alternative distance matrix Q.
         * @return array The ranked alternatives.
         */

        // formula ranking = sum(Qij) // dijumlah sebaris per alternatif dengan setiap kriteria

        $alternativeRanking = $alternativeDistanceMatrixQ['age']->map(function ($item, $key) use ($alternativeDistanceMatrixQ, $alternatives) {
            $total = collect($alternativeDistanceMatrixQ)->reduce(function ($carry, $value) use ($key) {
                return $carry + $value[$key];
            }, 0);
    
            return [
                'nik' => $alternatives[$key]->nik,
                'value' => $total
            ];
        });    
        $alternativeRanking = $alternativeRanking->sortByDesc('value');

        return $alternativeRanking;
    }
}
