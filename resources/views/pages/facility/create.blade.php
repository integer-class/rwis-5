@extends('layouts.app')

@section('title', 'Add Facility')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Add New Facility</h1>
        </div>

        <div class="section-body">
            <form action="{{ route('facilities.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>
</div>
@endsection
