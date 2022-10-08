@extends('layouts.app')
@section('content')
    <div class="d-flex">
        <h2 class="content-header-title col-10">Edit Blog</h2>
        <a class="btn btn-success text-white modal-button float-right" href="{{ route('blog.index') }}">Back</a>
    </div>
    <div class="card my-4">
        <div class="card-body">
            <form method='post' enctype="multipart/form-data" action='{{ route('blog.update',$blog->id )}}' class="col-sm-12">
                @csrf

                @method('PUT')
                <div class="row">
                    <div class="form-check col-sm-12">
                        <div class="form-check col-sm-6 mb-2">
                            <label>Select Category</label>
                            <select class="select2 form-control" required id="category_id" name="category_id">
                                <option value="">--Select--</option>
                                @forelse ($categories as $category)
                                    <option {{ $category->id == $blog->category_id ? 'selected' : '' }}
                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Enter Title</label>
                            <input required type="text" value="{{ $blog->title }}" class="form-control" name="title"
                                id="title">
                        </div>
                        <div class="form-group col-sm-6 ">
                            <label>Enter Slug</label>
                            <input required type="text" value="{{ $blog->slug }}" class="form-control" name="slug">
                        </div>
                        <div class="form-group col-sm-6 ">
                            <label>Upload Image</label>
                            <input  type="file" value="{{ old('image') }}" class="form-control" name="image">
                        </div>
                        <div class="form-group col-sm-6 ">
                            <label>Status</label>
                            <div class="mt-1">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" {{ $blog->status==1?'checked':'' }} name="status" id="inlineRadio2"
                                        value="1">
                                    <label class="form-check-label" for="inlineRadio2">Active</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"   {{ $blog->status==0?'checked':'' }} name="status" id="inlineRadio2"
                                        value="0">
                                    <label class="form-check-label" for="inlineRadio2">Inactive</label>
                                </div>
                            </div>
                          

                        </div>
                        <div class="form-group col-sm-6 ">
                            <label>Enter Description</label>
                            <input required type="text" value="{{ $blog->description }}" class="form-control"
                                name="description" id="description">
                        </div>

                    </div>

                </div>





                <button type="submit" class="btn btn-danger">Update</button>
            </form>
        </div>
    </div>
@endsection
@section('script')
@endsection
