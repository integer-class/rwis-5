@extends('layouts.app')

@section('title', 'Fasilitas')

@section('main')
<div class="main-content">
    <section class="section facility">
        <div class="section-header">
            <h1>Fasilitas RW 04</h1>
            <div class="section-header-button">
                <a href="{{ route('facilities.create') }}" class="btn btn-primary">+ Tambah Fasilitias</a>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                @foreach($facilities as $facility)
                    <div class="col-md-4">
                        <article class="article">
                            <div class="article-header">
                                <div class="article-image" style="background-image: url('{{ asset('storage/' . $facility->image) }}'); background-size: cover; background-position: center;"></div>
                            </div>
                            <div class="article-details text-center">
                                <h1 class="title">{{ $facility->name }}</h1>
                                <a href="{{ route('facilities.show', $facility->id) }}" class="btn btn-info mt-2">Detail</a>
                                <a href="{{ route('facilities.edit', $facility->id) }}" class="btn btn-outline-secondary mt-2">Edit</a>
                                <form action="{{ route('facilities.destroy', $facility->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mt-2">Delete</button>
                                </form>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $facilities->links() }}
            </div>
        </div>
    </section>
</div>
@endsection
