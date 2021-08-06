@extends('layouts.app')

@section('content')
    <main class="main">


        <div class="container-fluid" style="padding-top: 30px">
            <div class="animated fadeIn">
                <div class="content-header">
                </div>
                <!--content-header-->
                <form method="POST" action="{{ route('create_pages') }}" accept-charset="UTF-8"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h3 class="page-title float-left mb-0">create page</h3>
                            <div class="float-right">
                                <a href="{{ route('pages') }}" class="btn btn-success">view pages</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 form-group">
                                    <label for="title" class="control-label">title</label>
                                    <input class="form-control" placeholder="title" name="title" type="text" id="title">
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-12 col-lg-6 form-group">
                                    <label for="slug" class="control-label">Url</label>
                                    <input class="form-control" placeholder="Url will be created automatically" name="slug"
                                        type="text" id="slug">

                                </div>
                                <div class="col-12 col-lg-6 form-group">
                                    <label for="page_image" class="control-label">Featured Image (Maximum file size
                                        10MB)</label>
                                    <input class="form-control" accept="image/jpeg,image/gif,image/png" name="page_image"
                                        type="file" id="page_image">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 form-group">
                                    <label for="content" class="control-label">content</label>
                                    <textarea class="form-control summernote" placeholder="" name="content" cols="50"
                                        rows="40" id="goals"></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 form-group">
                                    <label for="meta_title" class="control-label">meta title</label>
                                    <input class="form-control" placeholder="meta title" name="meta_title" type="text"
                                        id="meta_title">

                                </div>
                                <div class="col-12 form-group">
                                    <label for="meta_description" class="control-label">meta description</label>
                                    <textarea class="form-control" placeholder="meta description" name="meta_description"
                                        cols="50" rows="10" id="meta_description"></textarea>
                                </div>
                                <div class="col-12 form-group">
                                    <label for="meta_keywords" class="control-label">Tags</label>
                                    <textarea class="form-control" placeholder="Tags" name="meta_keywords" cols="50"
                                        rows="10" id="meta_keywords"></textarea>
                                </div>
                                <div class="col-12 form-group">
                                    <div class="checkbox d-inline mr-3">
                                        <input name="published" type="hidden" value="0">
                                        <input name="published" type="checkbox" value="1">
                                        <label for="published"
                                            class="checkbox control-label font-weight-bold">published</label>
                                    </div>
                                    <div class="checkbox d-inline mr-3">
                                        <input name="sidebar" type="hidden" value="0">
                                        <input name="sidebar" type="checkbox" value="1">
                                        <label for="sidebar" class="checkbox control-label font-weight-bold">add
                                            sidebar</label>
                                    </div>
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

                </form>
            </div>
            <!--animated-->
        </div>
        <!--container-fluid-->
    </main>
@endsection
