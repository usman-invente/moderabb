@extends('layouts.app')
@section('content')
<main class="main">
    <div class="container-fluid" style="padding-top: 30px">
        <div class="animated fadeIn">
            <div class="content-header">
    </div><!--content-header-->
<form class="form-horizontal" method="POST" action="{{ route('update_account', $data->id) }}" enctype="multipart/form-data">
    @csrf
<div class="card">
    @if (session('error') || session('message'))
    <div class="alert alert-success" style=" width: 100%;">
    <span class="{{ session('error') ? 'error':'success' }}">{{ session('error') ?? session('message') }}</span>
</div>
@endif
<div class="card-header">
<h3 class="page-title d-inline">My Account</h3>
<div class="float-right">
    
</div>
</div>
<div class="card-body">
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="avatar">Avatar Location</label>
            <input class="form-control" type="file" name="avatar_location" id="avatar_location1">
            <img height="50px" src="{{asset('upload/personal/'.$data->avatar_location)}}" class="mt-1">
        </div><!--form-group-->
    </div><!--col-->
</div>
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <h5>Trainer data:</h5>
                <hr>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="firstName" class="required"> first name </label>
                    <input id="firstName" class="form-control" type="text" name="name" value="{{ $data->name }}" placeholder="first name" maxlength="191" autofocus="on" required="" autocomplete="off">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="last_name"> surname </label>
                    <input id="last_name" class="form-control" type="text" name="title" value="{{ $data->title }}" placeholder="surname" maxlength="191" required="" autocomplete="off">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="academicRank"> academic degree </label>
                    <select id="academicRank" class="form-control" name="academic_rank" autocomplete="off" required="">
                        <option value=""> select degree </option>
                        <option value="b" @if($data->academic_rank == 'b') ? selected : null @endif> bachelor </option>
                        <option value="m" @if($data->academic_rank == 'm') ? selected : null @endif> master </option>
                        <option value="d" @if($data->academic_rank == 'd') ? selected : null @endif> doctorate </option>
                        <option value="cp" @if($data->academic_rank == 'cp') ? selected : null @endif> associate professor </option>
                        <option value="cd" @if($data->academic_rank == 'cd') ? selected : null @endif> professor doctor </option>
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="input-group-phone">
                    <label for="phone"> phone number </label>
                    <input id="telephone" type="tel" class="form-control element-block @error('telephone') is-invalid @enderror" value="{{ $data->telephone }}" name="telephone" placeholder="TelPhone" required autocomplete="telephone">
                        @error('telephone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="gender"> gender </label>
                    <select id="gender" class="form-control" name="sex" autocomplete="off" required="">
                        <option value=""> select gender </option>
                        <option value="male" @if($data->sex == 'male') ? selected : null @endif> male </option>
                        <option value="female" @if($data->sex == 'female') ? selected : null @endif> female </option>
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="nationality"> nationality </label>
                    <input id="nationality" class="form-control" type="text" name="nationality" value="{{ $data->nationality }}" placeholder="nationality" maxlength="191" autocomplete="off" required="">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="country_of_residence"> country of residence </label>
                    <input id="country_of_residence" class="form-control" type="text" name="country_of_residence" value="{{ $data->country_of_residence }}" placeholder="country of residence" maxlength="191" autocomplete="off" required="">
                </div>
            </div>
            <div class="col-12">
                <hr>
                <h5>Social media accounts:</h5>
                <hr>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="facebook"> facebook account </label>
                    <input id="facebook" class="form-control" type="text" name="facbook" value="{{ $data->facbook }}" placeholder="facebook account" maxlength="191" autocomplete="off">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="twitter"> twitter account </label>
                    <input id="twitter" class="form-control" type="text" name="twitter" value="{{ $data->twitter }}" placeholder="twitter account" maxlength="191" autocomplete="off">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="linkedin"> LinkedIn account </label>
                    <input id="facebook" class="form-control" type="text" name="linkedin" value="{{ $data->linkedin }}" placeholder="LinkedIn account" maxlength="191" autocomplete="off">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="instagram"> Instagram Account </label>
                    <input id="instagram" class="form-control" type="text" name="instagram" value="{{ $data->instagram }}" placeholder="Instagram Account" maxlength="191" autocomplete="off">
                </div>
            </div>
            <div class="col-12">
                <h5>Attachments:</h5>
                <hr>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="passport"> passport copy </label>
                    <input id="passport" class="form-control" type="file" name="passport"  placeholder="passport copy">
                    <a href="{{asset('upload/passport/'.$data->passport)}}" target="_blank" class="btn btn-success btn-block mt-4">
                        show
                    </a>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="photo_academic_degree"> photo from the latest academic qualification </label>
                    <input id="photo_academic_degree" class="form-control" type="file" name="photo_academic_degree"  placeholder="photo from the latest academic qualification">
                    <a href="{{asset('upload/acadamic/'.$data->photo_academic_degree)}}" target="_blank" class="btn btn-success btn-block mt-4">
                        show
                    </a>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="cv"> Attach CV </label>
                    <input id="cv" class="form-control" type="file" accept="application/pdf" name="cv"  placeholder="Attach CV">
                    <a href="{{asset('upload/cv/'.$data->cv)}}" target="_blank" class="btn btn-success btn-block mt-4">
                        show
                    </a>
                </div>
            </div>
            <div class="col-12">
                <hr>
                <h5>Information of the bank you wish to transfer to:</h5>
                <hr>
            </div>
            <div class="col-8">
                <div class="form-group">
                    <label for="bank_name"> bank name </label>
                    <input id="bank_name" class="form-control" type="text" name="bank_name" value="{{ $data->bank_name }}" placeholder="bank name" maxlength="191" autocomplete="off" required="">
                </div>
            </div>
            <div class="col-8">
                <div class="form-group">
                    <label for="bank_country"> country </label>
                    <input id="bank_country" class="form-control" type="text" name="bank_country" value="{{ $data->bank_country }}" placeholder="country" maxlength="191" autocomplete="off" required="">
                </div>
            </div>
            <div class="col-8">
                <div class="form-group">
                    <label for="ibn_number"> IBAN </label>
                    <input id="ibn_number" class="form-control" type="text" name="ibn_number" value="{{ $data->ibn_number }}" placeholder="IBAN" maxlength="191" autocomplete="off" required="">
                </div>
            </div>
        </div>
        <div class="form-group row justify-content-center">
            <div class="col-4">
                <a class="btn btn-danger" href="{{ route('teacher') }}">Cancel</a>
                <button class="btn btn-success pull-right" type="submit">Update</button>
            </div>
        </div><!--col-->
    </div>
</div>

</div>
</div>
</form>
        </div><!--animated-->
    </div><!--container-fluid-->
</main>
@endsection
