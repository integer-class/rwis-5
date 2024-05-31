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
                <div class="article-header">
                    <div class="article-image" data-background="{{ asset('storage/' . $facility->image) }}">
                    </div>
                </div>
                <div class="article-details">
                    <p>{{ $facility->description }}</p>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
