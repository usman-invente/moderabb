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
<form method="POST" action="{{ route('screate_trainings') }}" accept-charset="UTF-8" enctype="multipart/form-data">
@csrf
<div class="card">
<div class="card-header">
<h3 class="page-title float-left mb-0">Create suggested course</h3>
<div class="float-right">
<a href="{{ route('strainings') }}" class="btn btn-success">view suggested session</a>
</div>
</div>
<div class="card-body">
<div class="row">
<div class="col-12 col-lg-6 form-group">
    <label for="title" class="control-label">Suggested course title</label>
    <input class="form-control" placeholder="Suggested course title" name="title" type="text" id="title">
</div>

<div class="col-12 col-lg-6 form-group">
        <label for="mgal" class="control-label">Category</label>
          <select class="form-control select2 js-example-placeholder-single" id="select-country" name="categorie_id" data-live-search="true">
          
          @foreach ($data as $val)
          <option value="{{ $val->id }}">{{ $val->name }}</option>
          @endforeach
          </select>
      
</div>

<div class="col-12 col-lg-6 form-group">
    <label for="mgal" class="control-label">suggested course field</label>
    <input class="form-control" placeholder="suggested course field" name="course_field" type="text" id="mgal">
</div>

</div>
<div class="row">
<div class="col-12 col-lg-6 form-group">
    <label for="axes" class="control-label">axes of suggested course</label>
    <textarea class="form-control" placeholder="" name="axes" cols="50" rows="10" id="axes"></textarea>
</div>
<div class="col-12 col-lg-6 form-group">
    <label for="idea" class="control-label">Course overview</label>
    <textarea class="form-control" placeholder="Course overview" name="idea" cols="50" rows="10" id="idea"></textarea>
</div>
</div>

<div class="row">

<div class="col-md-12 text-center form-group">
    <button type="submit" class="btn btn-info waves-effect waves-light ">
        save
    </button>
    <a href="{{ route('strainings') }}" class="btn btn-danger waves-effect waves-light ">
        Back to list
    </a>
</div>
</div>
</div>
</div>
</form>

    </div><!--animated-->
</div>
@endsection
