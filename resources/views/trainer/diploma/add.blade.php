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

                                
<form method="POST" action="{{route('tcreate_diploma')}}" accept-charset="UTF-8" enctype="multipart/form-data">
@csrf
<div class="card">
<div class="card-header">
<h3 class="page-title float-left">create package</h3>
<div class="float-right">
<a href="{{route('tdiploma')}}" class="btn btn-success">view courses</a>
</div>
</div>

<div class="card-body">
            <div class="row">
    <div class="col-10 form-group">
        <label for="teachers" class="control-label">courses *</label>
        <select class="form-control select2 js-example-placeholder-multiple select2bs4" required multiple="multiple" name="courses">
            @foreach ($courses as $cour)
            <option value="{{ $cour->id }}">{{ $cour->title }}</option>
            @endforeach
        </select>
        </div>
    {{-- <div class="col-2 d-flex form-group flex-column">
        OR <a target="_blank" class="btn btn-primary mt-auto" href="{{route('tcourses')}}">add trainers</a>
    </div> --}}
</div>


<div class="row">
<div class="col-10 form-group">
    <label for="category_id" class="control-label">Category *</label>
    <select class="form-control select2 js-example-placeholder-single select2bs4" required="" id="category_id" name="category_id" tabindex="-1" aria-hidden="true">
        
        @foreach ($catagory as $cata)
            <option value="{{ $cata->id }}">{{ $cata->name }}</option>
        @endforeach
    </select>
</div>
{{-- <div class="col-2 d-flex form-group flex-column">
    OR <a target="_blank" class="btn btn-primary mt-auto" href="{{route('tcourses')}}">Add Categories</a>
</div> --}}
</div>
<div class="row">
    <div class="col-10 form-group">
        <label for="e3tmad_id" class="control-label">accreditation body *</label>
        <select class="form-control select2 js-example-placeholder-single select2bs4" required="" id="e3tmad_id" name="eccbody_id" tabindex="-1" aria-hidden="true">
            
            @foreach ($abody as $accer)
            <option value="{{ $accer->id }}">{{ $accer->name }}</option>
            @endforeach
        </select>
    </div>
</div>
        <div class="row">
<div class="col-12 col-lg-4 form-group">
    <label for="bag_type" class="control-label">bag type *</label>
    <select class="form-control select2 js-example-placeholder-single select2bs4" required="" id="bag_type" name="bag_type" tabindex="-1" aria-hidden="true">
        <option value="1">Asynchronous</option>
        <option value="2">Sync</option>
    </select>
</div>
<div class="col-12 col-lg-4 form-group">
    <label for="title" class="control-label">title *</label>
    <input class="form-control" placeholder="title" required="" name="title" type="text" id="title">
</div>
<div class="col-12 col-lg-4 form-group">
    <label for="slug" class="control-label">Url</label>
    <input class="form-control" placeholder="Url will be created automatically" name="slug" type="text" id="slug">

</div>
</div>
<div class="row">

<div class="col-12 form-group">
    <label for="description" class="control-label">description</label>
    <textarea class="form-control " placeholder="description" name="description" cols="50" rows="10" id="description"></textarea>

</div>
</div>
        <div class="row">
<div class="col-12 col-lg-4 form-group">
    <label for="price" class="control-label">price (in $)</label>
    <input class="form-control" placeholder="price" pattern="[0-9]" name="price" type="number" id="price">
</div>
<div class="col-12 col-lg-8 form-group">
    <label for="course_image" class="control-label">course image</label>
    <input class="form-control" accept="image/jpeg,image/gif,image/png" name="course_image" type="file" id="course_image">

</div>
</div>
<div class="row">
<div class="col-12 col-lg-4 form-group">
    <label for="price_certificate" class="control-label">Certificate Price (in $)</label>
    <input class="form-control" placeholder="Certificate Price" pattern="[0-9]" name="price_certificate" type="number" id="price_certificate">
</div>
<div class="col-12 col-lg-8 form-group">
    <label for="certificate" class="control-label">certificate copy</label>
    <input class="form-control" accept="image/jpeg,image/gif,image/png" name="certificate" type="file" id="certificate">

</div>
</div>

        <div class="row">
<div class="col-12 col-lg-4  form-group">
    <label for="start_date" class="control-label" style="width: 100%;">start date (yyyy-mm-dd)</label>
    <input class="form-control hasDatepicker" placeholder="start date (Ex . 2019-01-01)" autocomplete="off" id="start_date" name="start_date" type="date">

</div>
<div class="col-12 col-lg-4  form-group">
    <label for="end_date" class="control-label" style="width: 100%;">end date</label>
    <input class="form-control date hasDatepicker"  placeholder="end date (Ex . 2019-01-01)" autocomplete="off" name="end_date" type="date" id="end_date">

</div>
<div class="col-12 col-lg-4 form-group">
    <label for="level" class="control-label">level</label>
    <input class="form-control" placeholder="level" name="level" type="text" id="level">
</div>
</div>
<div class="row">
<div class="col-12 col-lg-4 form-group">
    <label for="voltage" class="control-label">required voltage</label>
    <input class="form-control" placeholder="required voltage" name="voltage" type="text" id="voltage">
</div>
<div class="col-12 col-lg-4 form-group">
    <label for="duration" class="control-label">duration</label>
    <input class="form-control" placeholder="duration" name="duration" type="text" id="duration">
</div>
                    <div class="col-12 col-lg-4 form-group">
        <label for="recording_url" class="control-label">Synchronous course link</label>
        <input class="form-control" placeholder="Synchronous course link" name="recording_url" type="text" id="recording_url">
    </div>
            </div>
        <div class="row">
<div class="col-12 form-group">
    <div class="checkbox d-inline mr-3">
        <input name="published" type="hidden" value="1">
        <input checked="checked" name="published" type="checkbox" value="1">
        <label for="published" class="checkbox control-label font-weight-bold">published</label>
    </div>

    <div class="checkbox d-inline mr-3">
        <input name="featured" type="hidden" value="0">
        <input name="featured" type="checkbox" value="1">
        <label for="featured" class="checkbox control-label font-weight-bold">featured</label>
    </div>

    <div class="checkbox d-inline mr-3">
        <input name="trending" type="hidden" value="0">
        <input name="trending" type="checkbox" value="1">
        <label for="trending" class="checkbox control-label font-weight-bold">trending</label>
    </div>

    <div class="checkbox d-inline mr-3">
        <input name="popular" type="hidden" value="0">
        <input name="popular" type="checkbox" value="1">
        <label for="popular" class="checkbox control-label font-weight-bold">collection</label>
    </div>

    <div class="checkbox d-inline mr-3">
        <input name="free" type="hidden" value="0">
        <input name="free" type="checkbox" value="1">
        <label for="free" class="checkbox control-label font-weight-bold">free</label>
    </div>
    
    <div class="checkbox d-inline mr-3">
        <input name="c_purchase" type="hidden" value="0">
        <input name="c_purchase" type="checkbox" value="1">
        <label for="flag" class="checkbox control-label font-weight-bold">Enable or disable course purchase
        </label>
    </div>

</div>

</div>
        <div class="row">
<div class="col-12 form-group">
    <label for="goals" class="control-label">training course objectives</label>
    <textarea class="form-control summernote" placeholder="" name="goals" cols="50" rows="40" id="goals"></textarea>
</div>
</div>
<div class="row">
<div class="col-12 form-group">
    <label for="requirements" class="control-label">course requirements</label>
    <textarea class="form-control summernote" placeholder="" name="requirements" cols="50" rows="10" id="requirements"></textarea>
</div>
</div>
<div class="row">
<div class="col-12 form-group">
    <label for="outputs" class="control-label">Course Outputs</label>
    <textarea class="form-control summernote" placeholder="" name="outputs" cols="50" rows="10" id="outputs"></textarea>
</div>
</div>
<div class="row">
<div class="col-12 form-group">
    <label for="target_group" class="control-label">target group</label>
    <textarea class="form-control summernote" placeholder="" name="target_group" cols="50" rows="10" id="target_group"></textarea>
</div>
</div>
        <div class="row">
<div class="col-12 form-group">
    <label for="sponsor_name" class="control-label">This course is sponsored</label>
    <textarea class="form-control summernote" placeholder="" name="sponsor_name" cols="50" rows="10" id="sponsor_name"></textarea>
</div>
</div>
        <div class="row">
<div class="col-md-12 form-group">
    <label for="add_video" class="control-label">add video</label>

    <select class="form-control" id="media_type" name="media_type">
        <option selected="selected" value="">Select One</option>
        <option value="youtube">youtube</option>
        <option value="vimeo">vimeo</option>
        <option value="upload">upload</option>
        <option value="embed">embed</option>
    </select>

    <input class="form-control mt-3 d-none" placeholder="Enter video data" id="video" name="video" type="text">


    <input class="form-control mt-3 d-none" placeholder="Enter video data" id="video_file" name="video_file" type="file">
</div>
</div>

<div class="row">
<div class="col-12 form-group">
    <label for="meta_title" class="control-label">meta title</label>
    <input class="form-control" placeholder="meta title" name="meta_title" type="text" id="meta_title">

</div>
<div class="col-12 form-group">
    <label for="meta_description" class="control-label">meta description</label>
    <textarea class="form-control" placeholder="meta description" name="meta_description" cols="50" rows="10" id="meta_description"></textarea>
</div>
<div class="col-12 form-group">
    <label for="meta_keywords" class="control-label">Tags</label>
    <textarea class="form-control" placeholder="Tags" name="meta_keywords" cols="50" rows="10" id="meta_keywords"></textarea>
</div>
</div>

<div class="row">
<div class="col-12  text-center form-group">

    <input class="btn btn-lg btn-danger" type="submit" value="Save">
</div>
</div>
</div>
</div>
</form>


    </div><!--animated-->
</div>

@endsection