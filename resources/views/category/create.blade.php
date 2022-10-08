@extends("layouts.app")
@section('content')



<div class="d-flex">
    <h2 class="content-header-title col-10">Create Category</h2>
    <a class="btn btn-success text-white modal-button float-right" href="{{ route('category.index') }}">Back</a>
</div>
<div class="card my-4">
    <div class="card-body">
        <form method='post' action='{{ route("category.store") }}' class="col-sm-12">
            @csrf


        <div class="row">
            <div class="form-check col-sm-12">
                <div class="form-group col-sm-6">
                    <label>Enter Name</label>
                    <input required type="text" value="{{ old('name') }}" class="form-control" name="name" >
                </div>
                <div class="form-group col-sm-6 ">
                    <label>Enter Slug</label>
                    <input required type="text" value="{{ old('slug') }}" class="form-control" name="slug" >
                </div>
                
                
            </div>
            
        </div>
        




            <button type="submit" class="btn btn-danger">Save</button>
        </form>
    </div>
</div>


@endsection
@section('script')

@endsection
