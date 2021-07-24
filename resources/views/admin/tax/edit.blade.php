@extends('layouts.app')

@section('content')
<div class="container-fluid" style="padding-top: 30px">
    <div class="animated fadeIn">
        <div class="content-header">
                                    </div><!--content-header-->

 <form class="form-horizontal" method="POST" action="{{ route('update_tax',$data->id) }}" id="tax-create" enctype="multipart/form-data">
@csrf
    <div class="alert alert-danger d-none" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
<div class="error-list">
</div>
</div>
<div class="card">
<div class="card-header">
<h3 class="page-title d-inline">Edit tax</h3>
<div class="float-right">
<a href="{{ route('tax') }}" class="btn btn-success">Show tax</a>

</div>
</div>
<div class="card-body">

<div class="row form-group">
<label class="col-md-2 form-control-label" for="first_name">name</label>

<div class="col-md-10">
    <input class="form-control" type="text" value="{{ $data->name }}" name="name" id="name" placeholder="name" autofocus="">

</div><!--col-->
</div>

<div class="row form-group">
<label class="col-md-2 form-control-label" for="first_name">rate (in %)</label>

<div class="col-md-10">
    <input class="form-control" type="number" value="{{ $data->rate }}" name="rate" id="rate" placeholder="rate">

</div><!--col-->
</div>


<div class="form-group row justify-content-center">
<div class="col-4">
    <a class="btn btn-danger" href="{{ route('tax') }}">Cancel</a>

    <button class="btn btn-success pull-right" type="submit">Create</button>
</div>
</div><!--col-->
</div>
</div>
</form>
    </div><!--animated-->
</div>
@endsection