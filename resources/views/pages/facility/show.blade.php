@extends('layouts.app')

@section('title', 'Facility Details')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ $facility->name }}</h1>
        </div>

        <div class="section-body">
            <div class="article">
                <div class="article-header" style="width: 100%;">
                    <div class="article-image" style="background-image: url('{{ asset('storage/' . $facility->image) }}'); background-size: contain; background-repeat: no-repeat; background-position: center; width: 100%; height: 400px;"></div>
                </div>
                <div class="article-details" style="width: 100%;">
                    <p>{{ $facility->description }}</p>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
