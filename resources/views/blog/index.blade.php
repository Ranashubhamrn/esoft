@extends('layouts.app')
@section('content')
    <div id="page"  class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Blogs </h4>
                   
                        <a class="btn btn-primary text-white mb-2 float-right" href="{{ route('blog.create') }}">Add
                            Blog</a>
                           
                </div>
                
                <div class="card-content">

                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table zero-configuration no-wrap no-padding">
                                <thead>
                                    <tr>
                                        
                                        <th>S.no</th>
                                        <th>Category</th>
                                        <th>Title </th>
                                        <th>Slug </th>
                                        <th>Image </th>
                                        <th>Description </th>
                                        <th>Status </th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(@$blogs as $blog)
                                    <tr>
                                    <td>{{ $blog->id }}</td>
                                    <td>{{ $blog->category->name }}</td>
                                    <td>{{ ucwords($blog->title) }}</td>
                                    <td>{{ $blog->slug }}</td>
                                    <td><img width="100" height="100" src="{{ asset('public/Image/'.$blog->image) }}" alt="image"></td>
                                    <td>{{ $blog->description }}</td>
                                    <td>{{ $blog->status?'Active':'Inactive' }}</td>
                                    <td class="d-flex">
                                        <a class="btn btn-info ml-1"
                                            style="height: 40.2px;padding-left: 33px;padding-right: 33px; overflow: visible;"
                                            href="{{ route('blog.edit', $blog->id) }}">Edit</a>
                                            
                                        <form
                                            onsubmit="return confirm('Are you sure you want to delete this blog?\n You cannot undo this action!');"
                                            method="POST" action="{{ route('blog.destroy', $blog->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button  type="submit"
                                                class="btn btn-danger ml-1">Delete</button>
                                        </form>
                                        
                                        </td>
                                    </tr>



@endforeach



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

