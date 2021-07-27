@extends('layouts.app')

@section('content')
<style>
    .select2-container .select2-selection--single {
        box-sizing: border-box;
        cursor: pointer;
        display: block;
        height: 39px !important;
        user-select: none;
        -webkit-user-select: none;
    }
    .select2-selection--multiple .select2-selection__rendered {
        box-sizing: border-box;
        list-style: none;
        margin: 0;
        padding: 0 5px;
        width: 100%;
        height: 38px !important;
    }
</style>
<div class="container-fluid" style="padding-top: 30px">
    <div class="animated fadeIn">
        <div class="content-header">
                                    </div><!--content-header-->

                                
<form method="POST" action="{{ route('update_testimonials',$data->id)}}" accept-charset="UTF-8" enctype="multipart/form-data">
@csrf
    {{--  <input id="lesson_id" name="model_id" type="hidden" value="0">  --}}

<div class="card">
<div class="card-header">
<h3 class="page-title float-left mb-0">Update a Recommendation</h3>
<div class="float-right">
<a href="{{ route('testimonials')}}" class="btn btn-success">view testimonials</a>
</div>
</div>

<div class="card-body">
<div class="row">
<div class="col-12 form-group">
    <label for="course_id" class="control-label">name</label>
    <input class="form-control" placeholder="name" required="" value="{{ $data->name }}"  name="name" type="text" id="name">
</div>
</div>
<div class="row">
    <div class="col-12 form-group">
        <label for="course_id" class="control-label">title</label>
        <input class="form-control" placeholder="title" required="" value="{{ $data->title }}" name="title" type="text" id="title">
    </div>
    </div>
<div class="row">
<div class="col-12 form-group">
    <label for="short_text" class="control-label">content</label>
    <textarea class="form-control" placeholder="Enter a short content"  name="content" cols="50" rows="10" id="content">{{ $data->content }}</textarea>
</div>
</div>
<div class="row">
    <div class="col-12 form-group">
        <label for="course_id" class="control-label">image</label>
        <input class="form-control" placeholder="image"  name="image" type="file" id="image">
        <img src="{{asset('upload/testimonials/'.$data->image)}}" height="80" width="180" style="margin-top: 10px">
    </div>
    </div>
<div class="row">
<div class="col-12  text-left form-group">
    <input class="btn  btn-danger" type="submit" value="Save">
</div>
</div>
</div>
</div>

</form>
    </div><!--animated-->
</div>

@endsection