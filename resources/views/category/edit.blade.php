@extends('layouts.app')
@section('content')
    <div class="d-flex">
        <h2 class="content-header-title col-10">Update Category</h2>
        <a class="btn btn-success text-white modal-button float-right" href="{{ route('category.index') }}">Back</a>
    </div>
    <div class="card my-4">
        <div class="card-body">
            <form method='post' action="{{ route('category.update', $category->id) }}" class="col-sm-12">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control"  name='name'
                    value="{{ $category->name }}">
            </div>
            <div class="form-group">
                <label for="name">Slug</label>
                <input type="text" class="form-control"  name='slug'
                    value="{{ $category->slug }}">
            </div>
            
            
            
        <div class="col-sm-2">
            <button type="submit" class="btn btn-success mt-2">Save</button>
        </div>
        </form>
    </div>
    </div>
@endsection
