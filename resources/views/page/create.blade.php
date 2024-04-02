@extends('layouts.main')
@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Create {{$title}}</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Create {{$title}}</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{route('user.store')}}">
            @csrf
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="colFormLabel" placeholder="Input Nama">
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                <input type="email" name="email" class="form-control" id="colFormLabel" placeholder="Input Email">
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                <input type="text" name="phone" class="form-control" id="colFormLabel" placeholder="Input Phone">
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="address" id="colFormLabel" placeholder="Input Alamat"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
    </div>
</div>

</div>
@endsection