<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FamilyModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $names = \App\Models\CitizenDataModel::pluck('name')->toArray();
        return [
            'family_id'=> $this->generate_nkk($this->faker),
            'family_head_name' => $this->faker->randomElement($names),
            'address' => $this->faker->randomElement(self::$address),
            'rt' => $this->faker->numberBetween(1, 10),
            'rw' => '03',
            'village' => $this->faker->city(),
            'sub_district' => $this->faker->city(),
            'city' => $this->generate_city($this->faker),
            'province' => 'Jawa Timur',
            'postal_code' => $this->faker->randomNumber(5)
        ];
    }

    private function generate_nkk($faker)
    {
        $kode_provinsi = str_pad(rand(11, 96), 2, '0', STR_PAD_LEFT);
        $tanggal_lahir = $faker->date('ymd');
        $kode_kabupaten = str_pad(rand(1, 99), 2, '0', STR_PAD_LEFT);
        $nomor_urut = str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);

        return $kode_provinsi . $tanggal_lahir . $kode_kabupaten . $nomor_urut;
    }

    protected static $address = [
        'Jl. Raya Tlogomas', 'Jl. Raya Tlogomas No. 1', 'Jl. Raya Tlogomas No. 2', 'Jl. Raya Tlogomas No. 3', 'Jl. Raya Tlogomas No. 4', 'Jl. Raya Tlogomas No. 5', 'Jl. Raya Tlogomas No. 6', 'Jl. Raya Tlogomas No. 7', 'Jl. Raya Tlogomas No. 8', 'Jl. Raya Tlogomas No. 9', 'Jl. Raya Tlogomas No. 10', 'Jl. Raya Tlogomas No. 11', 'Jl. Raya Tlogomas No. 12', 'Jl. Raya Tlogomas No. 13', 'Jl. Raya Tlogomas No. 14', 'Jl. Raya Tlogomas No. 15', 'Jl. Raya Tlogomas No. 16', 'Jl. Raya Tlogomas No. 17', 'Jl. Raya Tlogomas No. 18', 'Jl. Raya Tlogomas No. 19', 'Jl. Raya Tlogomas No. 20', 'Jl. Raya Tlogomas No. 21', 'Jl. Raya Tlogomas No. 22', 'Jl. Raya Tlogomas No. 23', 'Jl. Raya Tlogomas No. 24', 'Jl. Raya Tlogomas No. 25', 'Jl. Raya Tlogomas No. 26', 'Jl. Raya Tlogomas No. 27', 'Jl. Raya Tlogomas No. 28', 'Jl. Raya Tlogomas No. 29', 'Jl. Raya Tlogomas No. 30', 'Jl. Raya Tlogomas No. 31', 'Jl. Raya Tlogomas No. 32', 'Jl. Raya Tlogomas No. 33', 'Jl. Raya Tlogomas No. 34', 'Jl. Raya Tlog
omas No. 35', 'Jl. Raya Tlogomas No. 36', 'Jl. Raya Tlogomas No. 37', 'Jl. Raya Tlogomas No. 38', 'Jl. Raya Tlogomas No. 39', 'Jl. Raya Tlogomas No. 40', 'Jl. Raya Tlogomas No. 41', 'Jl. Raya Tlogomas No. 42', 'Jl. Raya Tlogomas No. 43', 'Jl. Raya Tlogomas No. 44', 'Jl. Raya Tlogomas No. 45', 'Jl. Raya Tlogomas No. 46', 'Jl. Raya Tlogomas No. 47', 'Jl. Raya Tlogomas No. 48', 'Jl. Raya Tlogomas No. 49', 'Jl. Raya Tlogomas No. 50', 'Jl. Raya Tlogomas No. 51', 'Jl. Raya Tlogomas No. 52', 'Jl. Raya Tlogomas No. 53', 'Jl. Raya Tlogomas No. 54', 'Jl. Raya Tlogomas No. 55', 'Jl. Raya Tlogomas No. 56', 'Jl. Raya Tlogomas No. 57', 'Jl. Raya Tlogomas No. 58', 'Jl. Raya Tlogomas No. 59', 'Jl. Raya Tlogomas No. 60', 'Jl. Raya Tlogomas No. 61', 'Jl. Raya Tlogomas No. 62', 'Jl. Raya Tlogomas No. 63', 'Jl. Raya Tlogomas No. 64', 'Jl. Raya Tlogomas No. 65', 'Jl. Raya Tlogomas No. 66', 'Jl. Raya Tlogomas No. 67', 'Jl. Raya Tlogomas No. 68', 'Jl. Raya Tlogomas No. 69', 'Jl. Raya Tlogomas No. 70', 'Jl
. Raya Tlogomas No. 71', 'Jl. Raya Tlogomas No. 72', 'Jl. Raya Tlogomas No. 73', 'Jl. Raya Tlogomas No. 74', 'Jl. Raya Tlogomas No. 75', 'Jl. Raya Tlogomas No. 76', 'Jl. Raya Tlogomas No. 77', 'Jl. Raya Tlogomas No. 78', 'Jl. Raya Tlogomas No. 79', 'Jl. Raya Tlogomas No. 80', 'Jl. Raya Tlogomas No. 81', 'Jl. Raya Tlogomas No. 82', 'Jl. Raya Tlogomas No. 83', 'Jl. Raya Tlogomas No. 84', 'Jl. Raya Tlogomas No. 85', 'Jl. Raya Tlogomas No. 86', 'Jl. Raya Tlogomas No. 87', 'Jl. Raya Tlogomas No. 88', 'Jl. Raya Tlogomas No. 89', 'Jl. Raya Tlogomas No. 90', 'Jl. Raya Tlogomas No. 91', 'Jl. Raya Tlogomas No. 92', 'Jl. Raya Tlogomas No. 93', 'Jl. Raya Tlogomas No. 94', 'Jl. Raya Tlogomas No. 95', 'Jl. Raya Tlogomas No. 96', 'Jl. Raya Tlogomas No. 97', 'Jl. Raya Tlogomas No. 98', 'Jl. Raya Tlogomas No. 99', 'Jl. Raya Tlogomas No. 100', 'Jl. Raya Tlogomas No. 101', 'Jl. Raya Tlogomas No. 102', 'Jl. Raya Tlogomas No. 103', 'Jl. Raya Tlogomas No. 104', 'Jl. Raya Tlogomas No. 105', 'Jl. Raya Tlogomas No.
    106', 'Jl. Raya Tlogomas No. 107', 'Jl. Raya Tlogomas No. 108', 'Jl. Raya Tlogomas No. 109', 'Jl. Raya Tlogomas No. 110', 'Jl. Raya Tlogomas No. 111', 'Jl. Raya Tlogomas No. 112', 'Jl. Raya Tlogomas No. 113', 'Jl. Raya Tlogomas No. 114', 'Jl. Raya Tlogomas No. 115', 'Jl. Raya Tlogomas No. 116', 'Jl. Raya Tlogomas No. 117', 'Jl. Raya Tlogomas No. 118', 'Jl. Raya Tlogomas No. 119', 'Jl. Raya Tlogomas No. 120', 'Jl. Raya Tlogomas No. 121', 'Jl. Raya Tlogomas No. 122', 'Jl. Raya Tlogomas No. 123', 'Jl. Raya Tlogomas No. 124', 'Jl. Raya Tlogomas No. 125', 'Jl. Raya Tlogomas No. 126', 'Jl. Raya Tlogomas No. 127', 'Jl. Raya Tlogomas No. 128', 'Jl. Raya Tlogomas No. 129', 'Jl. Raya Tlogomas No. 130', 'Jl. Raya Tlogomas No. 131', 'Jl. Raya Tlogomas No. 132', 'Jl. Raya Tlogomas No. 133', 'Jl. Raya Tlogomas No. 134', 'Jl. Raya Tlogomas No. 135', 'Jl. Raya Tlogomas No. 136', 'Jl. Raya Tlogomas No. 137', 'Jl. Raya Tlogomas No. 138', 'Jl. Raya Tlogomas No. 139', 'Jl. Raya Tlogomas No. 140', 'Jl. Raya Tlogomas No. 141'
    ];

    private function generate_city($faker)
    {
        $cityJatim = [
            'Kabupaten Bangkalan', 'Kabupaten Banyuwangi', 'Kabupaten Blitar', 'Kabupaten Bojonegoro', 'Kabupaten Bondowoso', 'Kabupaten Gresik', 'Kabupaten Jember', 'Kabupaten Jombang', 'Kabupaten Kediri', 'Kota Malang',
            'Kabupaten Lamongan', 'Kota Madiun', 'Kabupaten Magetan', 'Kabupaten Mojokerto', 'Kabupaten Nganjuk', 'Kabupaten Ngawi', 'Kabupaten Pacitan', 'Kabupaten Pamekasan', 'Kabupaten Pasuruan', 'Kabupaten Ponorogo',
        ];

        return $faker->randomElement($cityJatim);
    }


}
