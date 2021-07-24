@extends('layouts.app')

@section('content')
<div class="container-fluid" style="padding-top: 30px">
    <div class="animated fadeIn">
        <div class="content-header">
            </div><!--content-header-->                           
<div class="card">
<div class="card-header">
<h3 class="page-title d-inline">create class</h3>
<div class="float-right">
<a href="{{ route('categories') }}" class="btn btn-success">show categories</a>
</div>
</div>
<div class="card-body">
<div class="row">
<div class="col-12">
    <form method="POST" action="{{ route('update_categories', $data->id) }}" accept-charset="UTF-8" enctype="multipart/form-data">
        @csrf
    <div class="row justify-content-center">
        <div class="col-12 col-lg-4 form-group">
            <label for="title" class="control-label">section *</label>
            <input class="form-control" placeholder="section" value="{{ $data->name }}" name="name" type="text">
        </div>
        <div class="col-12 col-lg-4 form-group">             
                <label for="color" class="control-label">course image</label>
                <input class="form-control" accept="image/jpeg,image/gif,image/png" name="image" type="file" id="color">
                <img height="50px" src="{{asset('upload/courseimage/'.$data->image)}}" class="mt-1">
        </div> 
        </div>
        <div class="form-group row justify-content-center">
            <div class="col-4">
                <a class="btn btn-danger" href="{{ route('categories') }}">Cancel</a>
                <button class="btn btn-success pull-right" type="submit">Save</button>
            </div>
        </div>
    </form></div>
</div>
</div>
</div>
</div>
</div>
@endsection
