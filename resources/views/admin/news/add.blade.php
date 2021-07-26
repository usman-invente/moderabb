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
<main class="main">


    <div class="container-fluid" style="padding-top: 30px">
        <div class="animated fadeIn">
            <div class="content-header">
                                        </div><!--content-header-->
<form method="POST" action="{{ route('create_news') }}" accept-charset="UTF-8" enctype="multipart/form-data">
@csrf
    <div class="card">
<div class="card-header">
<h3 class="page-title float-left mb-0">create News</h3>
<div class="float-right">
    <a href="{{ route('pages') }}" class="btn btn-success">view pages</a>
</div>
</div>

<div class="card-body">
<div class="row">
    <div class="col-6 form-group">
        <label for="title" class="control-label">title</label>
        <input class="form-control" placeholder="title" name="title" type="text" id="title">
    </div>
    <div class="col-6 form-group">
            <label for="category_id" class="control-label">Category *</label>
            <select class="form-control select2 js-example-placeholder-single select2bs4" required=""
                id="category" name="category" tabindex="-1" aria-hidden="true">

                @foreach ($catagory as $cata)
                    <option value="{{ $cata->id }}">{{ $cata->name }}</option>
                @endforeach
            </select>
    </div>
</div>

<div class="row">
    <div class="col-12 col-lg-6 form-group">
        <label for="slug" class="control-label">Url</label>
        <input class="form-control" placeholder="Url will be created automatically" name="slug" type="text" id="slug">

    </div>
    <div class="col-12 col-lg-6 form-group">
        <label for="page_image" class="control-label">Featured Image (Maximum file size 10MB)</label>
        <input class="form-control" accept="image/jpeg,image/gif,image/png" name="featured_image" type="file" id="page_image">
    </div>
</div>
<div class="row">
    <div class="col-12 form-group">
        <label for="content" class="control-label">content</label>
        <textarea class="form-control summernote" placeholder="" name="content" cols="50" rows="40" id="goals"></textarea>
    </div>
</div>

<div class="row">
    <div class="col-12 form-group">
        <label for="meta_title" class="control-label">tags</label>
        <input class="form-control" placeholder="tags here" name="tags" type="text" id="tags">

    </div>
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
    <div class="col-md-12 text-center form-group">
        <button type="submit" class="btn btn-info waves-effect waves-light ">
           save
        </button>
        <button type="reset" class="btn btn-danger waves-effect waves-light ">
           clear
        </button>
    </div>

</div>

</div>
</div>

        </form></div><!--animated-->
    </div><!--container-fluid-->
</main>
@endsection
