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

                                
<form method="POST" action="{{ route('create_lessons')}}" accept-charset="UTF-8" enctype="multipart/form-data">
@csrf
    {{--  <input id="lesson_id" name="model_id" type="hidden" value="0">  --}}

<div class="card">
<div class="card-header">
<h3 class="page-title float-left mb-0">create lesson</h3>
<div class="float-right">
<a href="route('tlessons')" class="btn btn-success">view lessons</a>
</div>
</div>

<div class="card-body">
<div class="row">
<div class="col-12 col-lg-6 form-group">
    <label for="course_id" class="control-label">course</label>
    <select class="form-control select2 js-example-placeholder-multiple select2bs4" id="course_id" name="course_id" tabindex="-1" aria-hidden="true">
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
<div class="col-12 col-lg-6 form-group">
    <label for="slug" class="control-label">Url</label>
    <input class="form-control" placeholder="Url will be created automatically" name="url" type="text" id="slug">

</div>
<div class="col-12 col-lg-6 form-group">
    <label for="lesson_image" class="control-label">lesson_image (Max file size 5MB)</label>
    <input class="form-control" accept="image/jpeg,image/gif,image/png" name="lesson_image" type="file" id="lesson_image">

</div>
</div>

<div class="row">
<div class="col-12 form-group">
    <label for="short_text" class="control-label">short text</label>
    <textarea class="form-control " placeholder="Enter a short description of the lesson" name="short_text" cols="50" rows="10" id="short_text"></textarea>

</div>
</div>
<div class="row">
<div class="col-12 form-group">
    <label for="full_text" class="control-label">full text</label>
    <textarea class="form-control summernote" placeholder="" name="full_text" cols="50" rows="10" id="outputs"></textarea>
</div>
</div>
<div class="row">
<div class="col-12 form-group">
    <label for="downloadable_files" class="control-label">downloadable files (Max file size 5MB)</label>
    <input multiple="" class="form-control file-upload" id="downloadable_files" accept="image/jpeg,image/gif,image/png,application/msword,audio/mpeg,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application,application/vnd.openxmlformats-officedocument.presentationml.presentation,application/vnd.ms-powerpoint,application/pdf,video/mp4" name="downloadable_files[]" type="file">
    <div class="photo-block">
        <div class="files-list"></div>
    </div>

</div>
</div>
<div class="row">
<div class="col-12 form-group">
    <label for="pdf_files" class="control-label">Add PDF</label>
    <input class="form-control file-upload" id="add_pdf" accept="application/pdf" name="add_pdf" type="file">
</div>
</div>

<div class="row">
<div class="col-12 form-group">
    <label for="audio_files" class="control-label">add audio</label>
    <input class="form-control file-upload" id="add_audio" accept="audio/mpeg3" name="add_audio" type="file">
</div>
</div>


<div class="row">
<div class="col-md-12 form-group">
    <label for="add_video" class="control-label">add video</label>

    <select class="form-control" id="media_type" name="media_type"><option selected="selected" value="">Select One</option><option value="youtube">Youtube</option><option value="vimeo">Vimeo</option><option value="upload">Upload</option><option value="embed">Embed</option></select>

    <input class="form-control mt-3 d-none" placeholder="Enter video data" id="video" name="video" type="text">


    <input class="form-control mt-3 d-none" placeholder="Enter video data" id="video_file" name="video_file" type="file">

    <p class="mb-1"> <b> Youtube: </b> Go to Youtube -&gt; Go to the video you want to view -&gt; Click on the share button below the video. Copy and paste those links into the text box above </p>
<p class="mb-1"> <b> Vimeo: </b> Go to Vimeo -&gt; Go to the video you want to view -&gt; Click on the share button and copy the url of the video here </p>
<p class="mb-1"> <b> Upload: </b> Upload the file <b> mp4 </b> into file entry </p>
<p class="mb-1"> <b> Include: </b> Copy / paste the embed code into the text box above </p> 
</div>
</div>

<div class="row">

<div class="col-12 col-lg-3 form-group">
    <div class="checkbox">
        <input name="published" type="hidden" value="0">
        <input name="published" type="checkbox" value="1">
        <label for="published" class="checkbox control-label font-weight-bold">published</label>
    </div>
</div>
<div class="col-12  text-left form-group">
    <input class="btn  btn-danger" type="submit" value="Save">
</div>
</div>
</div>
</div>

</form>
    </div><!--animated-->
</div>
<script type="text/javascript">

    var uploadField = $('input[type="file"]');

    $(document).on('change', 'input[name="lesson_image"]', function () {
        var $this = $(this);
        $(this.files).each(function (key, value) {
            if (value.size > 5000000) {
                alert('"' + value.name + '"' + 'exceeds limit of maximum file upload size')
                $this.val("");
            }
        })
    });
 </script>

@endsection