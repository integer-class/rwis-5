
@extends('layouts.app')

@section('title', 'Blank Page')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section facility">
        <div class="section-header">
            <h1>Fasilitas RW 07</h1>
        </div>

        <div class="section-body">
            <div class="row">
                @foreach($facilities as $facility)
                    <div class="col-md-4">
                        <article class="article">
                            <div class="article-header">
                                <div class="article-image" data-background="{{ asset('storage/' . $facility->image) }}">
                                </div>
                            </div>
                            <div class="article-details text-center">
                                <h1 class="title">{{ $facility->name }}</h1>
                                <a href="{{ route('facilities.show', $facility->id) }}" class="detail">detail</a> <br>
                                <a href="{{ route('facilities.edit', $facility->id) }}" class="btn btn-outline-secondary mt-4">Edit</a>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <!-- Page Specific JS File -->
@endpush
