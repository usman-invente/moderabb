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

                                
<form method="POST" action="{{ route('create_test')}}" accept-charset="UTF-8" enctype="multipart/form-data">
@csrf
    {{--  <input id="lesson_id" name="model_id" type="hidden" value="0">  --}}

<div class="card">
<div class="card-header">
<h3 class="page-title float-left mb-0">create test</h3>
<div class="float-right">
<a href="{{ route('tests')}}" class="btn btn-success">view tests</a>
</div>
</div>

<div class="card-body">
<div class="row">
<div class="col-12 col-lg-3 form-group">
    <label for="course_id" class="control-label">course</label>
    <select class="form-control select2 js-example-placeholder-multiple select2bs4" id="course_id" name="course_id" tabindex="-1" aria-hidden="true">
        @foreach ($course as $cour)
            <option value="{{ $cour->id }}">{{ $cour->ctitle }}</option>
        @endforeach
    </select>
</div>
<div class="col-12 col-lg-3 form-group">
    <label for="course_id" class="control-label">lesson</label>
    <select class="form-control select2 js-example-placeholder-multiple select2bs4" id="course_id" name="lesson_id" tabindex="-1" aria-hidden="true">
        @foreach ($lesson as $cour)
            <option value="{{ $cour->id }}">{{ $cour->title }}</option>
        @endforeach
    </select>
</div>
<div class="col-12 col-lg-3 form-group">
    <label for="title" class="control-label">title</label>
    <input class="form-control" placeholder="title" required="" name="title" type="text" id="title">
</div>
<div class="col-12 col-lg-3 form-group">
    <label for="title" class="control-label">Repeat Count</label>
    <input class="form-control" placeholder="Repeat Count" required="" name="repeat_count" type="text" id="repeat_count">
</div>
</div>
<div class="row">
<div class="col-12 form-group">
    <label for="short_text" class="control-label">description</label>
    <textarea class="form-control " placeholder="Enter a short description of the test" name="description" cols="50" rows="10" id="description"></textarea>

</div>
</div>
<div class="row">
    <div class="col-12 form-group">
        <input name="published" type="hidden" value="0">
        <input name="published" type="checkbox" value="1">
        <label for="published" class="control-label font-weight-bold">published</label>

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