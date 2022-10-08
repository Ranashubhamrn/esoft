@extends('layouts.app')
@section('content')
    <div id="page" class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Categories </h4>

                    <a class="btn btn-primary text-white mb-2 float-right" href="{{ route('category.create') }}">Add
                        Category</a>

                </div>

                <div class="card-content">

                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table zero-configuration no-wrap no-padding">
                                <thead>
                                    <tr>

                                        <th>S.no</th>
                                        <th>Name </th>
                                        <th>Slug </th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (@$categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td class="d-flex">
                                            <a class="btn btn-info ml-1"
                                                style="height: 40.2px;padding-left: 33px;padding-right: 33px; overflow: visible;"
                                                href="{{ route('category.edit', $category->id) }}">Edit</a>

                                            <form
                                                onsubmit="return confirm('Are you sure you want to delete this Category?\n You cannot undo this action!');"
                                                method="POST" action="{{ route('category.destroy', $category->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger ml-1">Delete</button>
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
