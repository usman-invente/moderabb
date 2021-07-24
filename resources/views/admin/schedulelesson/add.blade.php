@extends('layouts.app')

@section('content')
<div class="container-fluid" style="padding-top: 30px">
    <div class="animated fadeIn">
        <div class="content-header">
                                    </div><!--content-header-->

                                
<form method="POST" action="{{ route('create_live_lesson_slots')}}" accept-charset="UTF-8" enctype="multipart/form-data">
@csrf
    {{--  <input id="lesson_id" name="model_id" type="hidden" value="0">  --}}

<div class="card">
<div class="card-header">
<h3 class="page-title float-left mb-0">create scheduling
</h3>
<div class="float-right">
<a href="{{ route('live_lesson_slots') }}" class="btn btn-success">view scheduling
</a>
</div>
</div>

<div class="card-body">
<div class="row">
<div class="col-12 col-lg-6 form-group">
    <label for="course_id" class="control-label">lesson</label>
    <select class="form-control select2 js-example-placeholder-multiple select2bs4" id="course_id" name="lesson_id" tabindex="-1" aria-hidden="true">
        @foreach ($course as $cour)
            <option value="{{ $cour->id }}">{{ $cour->title }}</option>
        @endforeach
    </select>
</div>
<div class="col-12 col-lg-6 form-group">
    <label for="title" class="control-label">title*</label>
    <input class="form-control" placeholder="title" required="" name="title" type="text" id="title">
</div>
</div>
<div class="row">
<div class="col-12 form-group">
    <label for="short_text" class="control-label">short Deacription</label>
    <textarea class="form-control " placeholder="Enter a short description of the lesson" name="short_text" cols="50" rows="10" id="short_text"></textarea>

</div>
</div>
<div class="row">
    <div class="col-12 col-lg-6 form-group">
        <label for="title" class="control-label">date*</label>
        <input class="form-control" placeholder="date" required="" name="date" type="date" id="date">
    </div>
    <div class="col-12 col-lg-6 form-group">
        <label for="title" class="control-label">duration (minutes)*</label>
        <input class="form-control" placeholder="duration" required="" name="duration" type="number" id="title">
    </div>
</div>
<div class="row">
    <div class="col-12 col-lg-6 form-group">
        <label for="title" class="control-label">Password - if not entered, the default is 123456</label>
        <input class="form-control" placeholder="passwords" required="" name="password" type="text" value="123456" id="date">
    </div>
    <div class="col-12 col-lg-6 form-group">
        <label for="title" class="control-label">Limit of trainees allowed*</label>
        <input class="form-control" placeholder="Limit of trainees allowed"  required="" name="trainee_limit" type="number" id="title">
    </div>
</div>
<div class="col-12  text-left form-group">
    <input class="btn  btn-danger" type="submit" value="Save">
</div>
</div>
</div>

</form>
    </div><!--animated-->
</div>

@endsection