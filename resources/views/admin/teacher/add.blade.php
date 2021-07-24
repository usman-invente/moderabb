@extends('layouts.app')

@section('content')
<main class="main">


    <div class="container-fluid" style="padding-top: 30px">
        <div class="animated fadeIn">
            <div class="content-header">
                                        </div><!--content-header-->


<form class="form-horizontal" method="POST" action="{{ route('create_teacher') }}" enctype="multipart/form-data">
    @csrf
<div class="card">
<div class="card-header">
<h3 class="page-title d-inline">{{ __('lang.Save Coach') }}</h3>
<div class="float-right">
    <a href="{{ route('teacher') }}" class="btn btn-success"> {{ __('lang.view coaches') }}</a>
</div>
</div>
<div class="card-body">

<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="avatar">{{ __('lang.Avatar Location ') }}</label>

            <div>
                <input type="radio" name="avatar_type" value="gravatar" checked="">  {{ __('lang.Gravatar') }}
                &nbsp;&nbsp;
                <input type="radio" name="avatar_type" value="storage">  {{ __('lang.Upload') }}
                <br>

            </div>
        </div><!--form-group-->

        <div class="form-group hidden" id="avatar_location" style="display: none;">
            <input class="form-control" type="file" name="avatar_location" id="avatar_location">
        </div><!--form-group-->

    </div><!--col-->
</div>
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <h5>{{ __('lang.Trainer data') }}</h5>
                <hr>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="firstName" class="required"> {{ __('lang.First Name') }} </label>
                    <input id="firstName" class="form-control" type="text" name="name" value="" placeholder="first name" maxlength="191" autofocus="on" required="" autocomplete="off">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="last_name">   {{ __('lang.Surname') }} </label>
                    <input id="last_name" class="form-control" type="text" name="title" value="" placeholder="surname" maxlength="191" required="" autocomplete="off">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="academicRank">   {{ __('lang.Academic Degree') }}</label>
                    <select id="academicRank" class="form-control" name="academic_rank" autocomplete="off" required="">
                        <option value=""> select degree </option>
                        <option value="b"> bachelor </option>
                        <option value="m"> master </option>
                        <option value="d"> doctorate </option>
                        <option value="cp"> associate professor </option>
                        <option value="cd"> professor doctor </option>
                    </select>
                </div>
            </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="email">   {{ __('lang.Email Address') }}</label>
                        <input id="email" class="form-control" type="email" name="email"  required="" placeholder="email address" maxlength="191" autocomplete="off" required="">
                        @error('email')
                            <div class="alert alert-danger ">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            <div class="col-md-4">
                <div class="input-group-phone">
                    <label for="phone">   {{ __('lang.Phone Number') }}</label>
                    <input id="phone" type="tel" class="form-control element-block @error('telephone') is-invalid @enderror" name="telephone"  required autocomplete="telephone">
                  
                        @error('telephone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="gender">    {{ __('lang.Gender') }}</label>
                    <select id="gender" class="form-control" name="sex" autocomplete="off" required="">
                        <option value=""> select gender </option>
                        <option value="male"> male </option>
                        <option value="female"> female </option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nationality">   {{ __('lang.Nationality') }}</label>
                    <input id="nationality" class="form-control" type="text" name="nationality" value="" placeholder="nationality" maxlength="191" autocomplete="off" required="">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="country_of_residence"> {{ __('lang.Country Of Residence') }} </label>
                    <input id="country_of_residence" class="form-control" type="text" name="country_of_residence" value="" placeholder="country of residence" maxlength="191" autocomplete="off" required="">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="password"> {{ __('lang.Password') }} </label>
                    <input id="password" class="form-control" type="password" name="password" value="" placeholder="password" maxlength="191" autocomplete="off" required="">
                </div>
            </div>
            <div class="col-12">
                <hr>
                <h5>{{ __('lang.Social Media Accounts') }}</h5>
                <hr>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="facebook">{{ __('lang.Facebook Account') }} </label>
                    <input id="facebook" class="form-control" type="text" name="facbook" value="" placeholder="facebook account" maxlength="191" autocomplete="off">
                </div>
            </div>
            <div  class="col-md-3">
                <div class="form-group">
                    <label for="twitter"> {{ __('lang.Twitter Account') }}  </label>
                    <input id="twitter" class="form-control" type="text" name="twitter" value="" placeholder="twitter account" maxlength="191" autocomplete="off">
                </div>
            </div>
            <div  class="col-md-3">
                <div class="form-group">
                    <label for="linkedin"> {{ __('lang.LinkedIn Account') }} </label>
                    <input id="facebook" class="form-control" type="text" name="linkedin" value="" placeholder="LinkedIn account" maxlength="191" autocomplete="off">
                </div>
            </div>
            <div  class="col-md-3">
                <div class="form-group">
                    <label for="instagram">  {{ __('lang.Instagram Account') }}</label>
                    <input id="instagram" class="form-control" type="text" name="instagram" value="" placeholder="Instagram Account" maxlength="191" autocomplete="off">
                </div>
            </div>
            <div class="col-12">
                <h5>{{ __('lang.Attachments') }}</h5>
                <hr>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="passport">  {{ __('lang.Passport Copy') }}</label>
                    <input id="passport" class="form-control" type="file" name="passport"   required=""  placeholder="passport copy">

                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="photo_academic_degree">  {{ __('lang.Academic Qualification') }} </label>
                    <input id="photo_academic_degree" class="form-control"   required=""  type="file" name="photo_academic_degree"  placeholder="photo from the latest academic qualification">

                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="cv"> {{ __('lang.CV') }}</label>
                    <input id="cv" class="form-control"   required=""  type="file" accept="application/pdf" name="cv"  placeholder="Attach CV">
                    @error('cv')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
            </div>
            <div class="col-12">
                <hr>
                <h5>{{ __('lang.Information of the bank you wish to transfer to') }}</h5>
                <hr>
            </div>
            <div class="col-8">
                <div class="form-group">
                    <label for="bank_name"> {{ __('lang.Bank Name') }}</label>
                    <input id="bank_name" class="form-control"  type="text" name="bank_name" value="" placeholder="bank name" maxlength="191" autocomplete="off" required="">
                </div>
            </div>
            <div class="col-8">
                <div class="form-group">
                    <label for="bank_country"> {{ __('lang.Country') }} </label>
                    <input id="bank_country" class="form-control" type="text" name="bank_country" value="" placeholder="country" maxlength="191" autocomplete="off" required="">
                </div>
            </div>
            <div class="col-8">
                <div class="form-group">
                    <label for="ibn_number">  {{ __('lang.IBAN') }}</label>
                    <input id="ibn_number" class="form-control" type="text" name="ibn_number" value="" placeholder="IBAN" maxlength="191" autocomplete="off" required="">
                </div>
            </div>
        </div>

        <div class="form-group row justify-content-center">
            <div class="col-md-4">
                <a class="btn btn-danger" href="{{ route('teacher') }}">{{ __('lang.cancel') }}</a>
                <button class="btn btn-success pull-right" type="submit">{{ __('lang.create') }}</button>
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
