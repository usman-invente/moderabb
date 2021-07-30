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

                                
<form method="POST" action="{{route('update_courses',$data->id)}}" accept-charset="UTF-8" enctype="multipart/form-data">
@csrf
<div class="card">
<div class="card-header">
<h3 class="page-title float-left">create course</h3>
<div class="float-right">
<a href="{{route('courses')}}" class="btn btn-success">view courses</a>
</div>
</div>

<div class="card-body">
            <div class="row">
    <div class="col-10 form-group">
        <label for="teachers" class="control-label">trainers *</label>
         
        <select class="form-control select2 js-example-placeholder-multiple select2bs4" required multiple="multiple" name="teachers">
            @foreach ($trainer as $tran)
            {{--  <option value="{{ $tran->id }}" <?php if (isset($teachers) && in_array($tran->id , $teachers)) echo 'selected'; ?>>{{ $tran->name }}</option>  --}}
            <option value="{{ $tran->id }}" @if($data->teachers == $tran->id) ? selected : null @endif >{{ $tran->name }}</option>
            @endforeach
        </select>
        </div>
    <div class="col-2 d-flex form-group flex-column">
        OR <a target="_blank" class="btn btn-primary mt-auto" href="{{ route('add_teacher') }}">add trainers</a>
    </div>
</div>
<div class="row">
    <div class="col-10 form-group">
        <label for="e3tmad_id" class="control-label">accreditation body *</label>
        <select class="form-control select2 js-example-placeholder-single select2bs4" required="" id="e3tmad_id" name="eccbody_id" tabindex="-1" aria-hidden="true">
            
            @foreach ($abody as $accer)
            {{--  <option value="{{ $accer->id }}">{{ $accer->name }}</option>  --}}
            <option value="{{ $accer->id }}" @if($data->eccbody_id == $accer->id) ? selected : null @endif >{{ $accer->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row">
<div class="col-10 form-group">
    <label for="category_id" class="control-label">Category *</label>
    <select class="form-control select2 js-example-placeholder-single select2bs4" required="" id="category_id" name="category_id" tabindex="-1" aria-hidden="true">
        
        @foreach ($catagory as $cata)
            {{--  <option value="{{ $cata->id }}">{{ $cata->name }}</option>  --}}
            <option value="{{ $cata->id }}" @if($data->category_id == $cata->id) ? selected : null @endif >{{ $cata->name }}</option>

        @endforeach
    </select>
</div>
<div class="col-2 d-flex form-group flex-column">
    OR <a target="_blank" class="btn btn-primary mt-auto" href="{{route('add_categories')}}">Add Categories</a>
</div>
</div>
        <div class="row">
<div class="col-12 col-lg-4 form-group">
    <label for="bag_type" class="control-label">bag type *</label>
    <select class="form-control select2 js-example-placeholder-single select2bs4" required="" id="bag_type" name="bag_type" tabindex="-1" aria-hidden="true">
        <option value="1" @if($data->bag_type == '1') ? selected : null @endif> Asynchronous </option>
        <option value="2" @if($data->bag_type == '2') ? selected : null @endif> Sync </option>
    </select>
</div>
<div class="col-12 col-lg-4 form-group">
    <label for="title" class="control-label">title *</label>
    <input class="form-control" placeholder="title" required=""  value="{{$data->ctitle}}" name="ctitle" type="text" id="title">
</div>
<div class="col-12 col-lg-4 form-group">
    <label for="slug" class="control-label">Url</label>
    <input class="form-control" placeholder="Url will be created automatically" value="{{$data->slug}}" name="slug" type="text" id="slug">

</div>
</div>
<div class="row">

<div class="col-12 form-group">
    <label for="description" class="control-label">description</label>
    <textarea class="form-control " placeholder="description" name="description" cols="50" rows="10" id="description">{{$data->description}}"</textarea>

</div>
</div>
        <div class="row">
<div class="col-12 col-lg-4 form-group">
    <label for="price" class="control-label">price (in $)</label>
    <input class="form-control" placeholder="price" pattern="[0-9]" name="price" type="number" value="{{$data->price}}" id="price">
</div>
<div class="col-12 col-lg-8 form-group">
    <label for="course_image" class="control-label">course image</label>
    <input class="form-control" accept="image/jpeg,image/gif,image/png" name="course_image" type="file" id="course_image">

</div>
</div>
<div class="row">
<div class="col-12 col-lg-4 form-group">
    <label for="price_certificate" class="control-label">Certificate Price (in $)</label>
    <input class="form-control" placeholder="Certificate Price" pattern="[0-9]" name="price_certificate" value="{{$data->price_certificate}}" type="number" id="price_certificate">
</div>
<div class="col-12 col-lg-8 form-group">
    <label for="certificate" class="control-label">certificate copy</label>
    <input class="form-control" accept="image/jpeg,image/gif,image/png" name="certificate" type="file" id="certificate">

</div>
</div>

        <div class="row">
<div class="col-12 col-lg-4  form-group">
    <label for="start_date" class="control-label" style="width: 100%;">start date (yyyy-mm-dd)</label>
    <input class="form-control hasDatepicker" placeholder="start date (Ex . 2019-01-01)" autocomplete="off"   value="{{$data->start_date}}" id="start_date" name="start_date" type="date">

</div>
<div class="col-12 col-lg-4  form-group">
    <label for="end_date" class="control-label" style="width: 100%;">end date</label>
    <input class="form-control date hasDatepicker"  placeholder="end date (Ex . 2019-01-01)" autocomplete="off" value="{{$data->end_date}}" name="end_date" type="date" id="end_date">

</div>
<div class="col-12 col-lg-4 form-group">
    <label for="level" class="control-label">level</label>
    <input class="form-control" placeholder="level" name="level" value="{{$data->level}}" type="text" id="level">
</div>
</div>
<div class="row">
<div class="col-12 col-lg-4 form-group">
    <label for="voltage" class="control-label">required voltage</label>
    <input class="form-control" placeholder="required voltage" name="voltage" value="{{$data->voltage}}" type="text" id="voltage">
</div>
<div class="col-12 col-lg-4 form-group">
    <label for="duration" class="control-label">duration</label>
    <input class="form-control" placeholder="duration" name="duration" value="{{$data->duration}}" type="text" id="duration">
</div>
                    <div class="col-12 col-lg-4 form-group">
        <label for="recording_url" class="control-label">Synchronous course link</label>
        <input class="form-control" placeholder="Synchronous course link" value="{{$data->recording_url}}" name="recording_url" type="text" id="recording_url">
    </div>
            </div>
        <div class="row">
<div class="col-12 form-group">
    <div class="checkbox d-inline mr-3">
        <input name="published" type="hidden" value="0">
        <input name="published" type="checkbox" value="1" {{$data->published==1 ? 'checked' : ''}}>
        <label for="published" class="checkbox control-label font-weight-bold">published</label>
    </div>

    <div class="checkbox d-inline mr-3">
        <input name="featured" type="hidden" value="0">
        <input name="featured" type="checkbox" value="1"{{$data->featured==1 ? 'checked' : ''}}>
        <label for="featured" class="checkbox control-label font-weight-bold">featured</label>
    </div>

    <div class="checkbox d-inline mr-3">
        <input name="trending" type="hidden" value="0">
        <input name="trending" type="checkbox" value="1"{{$data->trending==1 ? 'checked' : ''}}>
        <label for="trending" class="checkbox control-label font-weight-bold">trending</label>
    </div>

    <div class="checkbox d-inline mr-3">
        <input name="popular" type="hidden" value="0">
        <input name="popular" type="checkbox" value="1" {{$data->popular==1 ? 'checked' : ''}}>
        <label for="popular" class="checkbox control-label font-weight-bold">collection</label>
    </div>

    <div class="checkbox d-inline mr-3">
        <input name="free" type="hidden" value="0">
        <input name="free" type="checkbox" value="1" {{$data->free==1 ? 'checked' : ''}}>
        <label for="free" class="checkbox control-label font-weight-bold">free</label>
    </div>
    
    <div class="checkbox d-inline mr-3">
        <input name="c_purchase" type="hidden" value="0">
        <input name="c_purchase" type="checkbox" value="1" {{$data->c_purchase==1 ? 'checked' : ''}}>
        <label for="flag" class="checkbox control-label font-weight-bold">Enable or disable course purchase
        </label>
    </div>

</div>

</div>
        <div class="row">
<div class="col-12 form-group">
    <label for="goals" class="control-label">training course objectives</label>
    <textarea class="form-control summernote" placeholder="" name="goals" cols="50" rows="40" id="goals"> {!! $data->goals !!} </textarea>
</div>
</div>
<div class="row">
<div class="col-12 form-group">
    <label for="requirements" class="control-label">course requirements</label>
    <textarea class="form-control summernote" placeholder="" name="requirements" cols="50" rows="10" id="requirements">{{$data->requirements}}</textarea>
</div>
</div>
<div class="row">
<div class="col-12 form-group">
    <label for="outputs" class="control-label">Course Outputs</label>
    <textarea class="form-control summernote" placeholder="" name="outputs" cols="50" rows="10" id="outputs">{{$data->outputs}}</textarea>
</div>
</div>
<div class="row">
<div class="col-12 form-group">
    <label for="target_group" class="control-label">target group</label>
    <textarea class="form-control summernote" placeholder="" name="target_group" cols="50" rows="10" id="target_group">{{$data->target_group}}</textarea>
</div>
</div>
        <div class="row">
<div class="col-12 form-group">
    <label for="sponsor_name" class="control-label">This course is sponsored</label>
    <textarea class="form-control summernote" placeholder="" name="sponsor_name" cols="50" rows="10" id="sponsor_name">{{$data->sponsor_name}}</textarea>
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

    <input class="form-control mt-3 d-none" placeholder="Enter video data" id="video" value="{{$data->video}}"  name="video" type="text">


    <input class="form-control mt-3 d-none" placeholder="Enter video data" id="video_file" name="video_file" type="file">
</div>
</div>

<div class="row">
<div class="col-12 form-group">
    <label for="meta_title" class="control-label">meta title</label>
    <input class="form-control" placeholder="meta title" name="meta_title" value="{{$data->meta_title}}" type="text" id="meta_title">

</div>
<div class="col-12 form-group">
    <label for="meta_description" class="control-label">meta description</label>
    <textarea class="form-control" placeholder="meta description" name="meta_description" cols="50" rows="10" id="meta_description">{{$data->meta_description}}</textarea>
</div>
<div class="col-12 form-group">
    <label for="meta_keywords" class="control-label">Tags</label>
    <textarea class="form-control" placeholder="Tags" name="meta_keywords" cols="50" rows="10" id="meta_keywords">{{$data->meta_keywords}}</textarea>
</div>
</div>

<div class="row">
<div class="col-12  text-center form-group">

    <input class="btn btn-lg btn-danger" type="submit" value="Update">
</div>
</div>
</div>
</div>
</form>


    </div><!--animated-->
</div>

@endsection