@extends('layouts.main')
@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"> {{$title}}</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> {{$title}} # {{$data->id}}</h6>
    </div>
    <div class="card-body">
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="colFormLabel" value="{{ $data->name }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                <input type="email" readonly class="form-control-plaintext" id="colFormLabel" value="{{ $data->email }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="colFormLabel" value="{{ $data->phone }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="colFormLabel" value="{{ $data->address }}">
                </div>
            </div>
            <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2">
                        <a href="{{ route('user.edit', $data->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('user.destroy', $data->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                        </form>
                    </div>
                </div>

    </div>
</div>

</div>
@endsection