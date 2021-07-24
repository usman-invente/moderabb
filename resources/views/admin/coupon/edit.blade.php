@extends('layouts.app')

@section('content')
<div class="container-fluid" style="padding-top: 30px">
    <div class="animated fadeIn">
        <div class="content-header">
                                    </div><!--content-header-->

 <form class="form-horizontal" method="POST" action="{{ route('update_coupon', $data->id) }}" id="coupons-create" enctype="multipart/form-data">
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
<h3 class="page-title d-inline">Create Coupon</h3>
<div class="float-right">
<a href="{{ route('coupon') }}" class="btn btn-success">show coupons</a>

</div>
</div>
<div class="card-body">

<div class="row form-group">
<label class="col-md-2 form-control-label" for="first_name">name</label>

<div class="col-md-10">
    <input class="form-control" type="text" name="name" id="name" value="{{ $data->name }}" placeholder="name" autofocus="">

</div><!--col-->
</div>
<div class="row form-group">
<label class="col-md-2 form-control-label" for="description">description</label>

<div class="col-md-10">
    <textarea class="form-control" name="description" id="description" placeholder="description" autofocus="">{{ $data->description }}</textarea>

</div><!--col-->
</div>
<div class="row form-group">
<label class="col-md-2 form-control-label" for="first_name">Coupon code</label>

<div class="col-md-10">
    <input class="form-control" type="text" value="{{ $data->code }}" name="code" id="code" placeholder="Ex: MyShopping50">

</div><!--col-->
</div>

<div class="row form-group">
<label class="col-md-2 form-control-label" for="first_name">type</label>

<div class="col-md-10">
    <select class="form-control" name="type" id="type">
        <option value="1" @if($data->type == 1) ? selected : null @endif >discount rate (in %)</option>
        <option value="2" @if($data->type == 2) ? selected : null @endif >rate</option>
    </select>
    <p class="mb-0"><b> Discount rate (%): </b> If you select this, then the rate will be applied at% to the total purchase. the previous. Price = $ 100 and discount rate is 10% then 10% off $ 100 will be deducted. the previous. Price = $ 100 and fixed price $ 25, then $ 25 is deducted from $ 100. </p>
</div><!--col-->
</div>


<div class="row form-group">
<label class="col-md-2 form-control-label" for="amount">amount</label>

<div class="col-md-10">
    <input class="form-control" type="number" value="{{ $data->amount }}" name="amount" id="amount" placeholder="amount">
    <p class="mb-0">If <b> discount rate </b> is specified, then the rate of entry ratio. If <b> Flat Rate </b> is specified, enter a specific amount to be deducted. </p>

</div><!--col-->
</div>

<div class="row form-group">
<label class="col-md-2 form-control-label" for="advert_perce">advertiser percentage</label>
<div class="col-md-10">
    <input class="form-control" type="number" value="{{ $data->advert_perce }}" name="advert_perce" id="advert_perce" placeholder="advertiser percentage">
</div><!--col-->
</div>

<div class="row form-group">
<label class="col-md-2 form-control-label" for="advert_name">Advertiser Name</label>
<div class="col-md-10">
    <input class="form-control" type="text" value="{{ $data->advert_name }}" name="advert_name" id="advert_name" placeholder="Advertiser Name">
</div><!--col-->
</div>
<div class="row form-group">
<label class="col-md-2 form-control-label" for="expires_at">end in</label>

<div class="col-md-10">
<input class="form-control date hasDatepicker" value="{{ $data->expires_at }}" id="expires_at" placeholder="yyyy-mm-dd | Ex . 2019-01-01" autocomplete="off" name="expires_at" type="date">
</div>
</div>

<div class="row form-group">
<label class="col-md-2 form-control-label" for="amount">Minimum Order Price</label>

<div class="col-md-10">
    <input class="form-control" type="number" value="{{ $data->min_price }}" name="min_price" id="min_price" placeholder="Minimum Order Price">

</div><!--col-->
</div>


<div class="row form-group">
<label class="col-md-2 form-control-label" for="per_user_limit">per user limit</label>

<div class="col-md-10">
    <input class="form-control" type="number" value="{{ $data->per_user_limit }}" name="per_user_limit" id="per_user_limit" placeholder="per user limit">
    <p class="mb-0">Specify the number of times a single user can use this Coupon. By default one time use. </p>

</div><!--col-->
</div>


<div class="form-group row justify-content-center">
<div class="col-4">
    <a class="btn btn-danger" href="{{ route('coupon') }}">Cancel</a>

    <button class="btn btn-success pull-right" type="submit">Update</button>
</div>
</div><!--col-->
</div>
</div>
</form>
    </div><!--animated-->
</div>
@endsection