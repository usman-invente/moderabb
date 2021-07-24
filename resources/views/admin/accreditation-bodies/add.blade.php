@extends('layouts.app')

@section('content')
    <div class="container-fluid" style="padding-top: 30px">
        <div class="animated fadeIn">
            <div class="content-header">
            </div>
            <!--content-header-->


            <form class="form-horizontal" method="POST" action="{{ route('create_accreditation_bodies') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h3 class="page-title d-inline">Create Acreditation Body</h3>
                        <div class="float-right">
                            <a href="{{ route('accreditation_bodies') }}" class="btn btn-success">View Acreditation
                                body</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <input type="hidden" name="user_type" value="e3tmad">
                                <div class="row">
                                    <div class="col-12">
                                        <h3>Authority data:</h3>
                                        <hr>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="firstName" class="required"> entity name </label>
                                            <input id="firstName" class="form-control" type="text" name="name" value=""
                                                placeholder="entity name" maxlength="191" required="" autofocus="on"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="last_name"> Contact Person </label>
                                            <input id="last_name" class="form-control" type="text" name="c_person" value=""
                                                placeholder="Contact Person" maxlength="191" required="" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="email"> email address </label>
                                            <input id="email" class="form-control" type="email" name="email" value=""
                                                placeholder="email address" maxlength="191" required="" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="password"> password </label>
                                            <input id="password" class="form-control" type="password" name="password"
                                                placeholder="password" maxlength="191" required="" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group-phone">
                                            <label for="phone"> phone number </label>
                                            <input  id="phone" type="tel"
                                                class="form-control element-block @error('telephone') is-invalid @enderror"
                                                name="telephone" placeholder="TelPhone" required autocomplete="telephone">
                                            @error('telephone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="ibn_number"> country </label>
                                            <input id="ibn_number" class="form-control" type="text"
                                                name="country_of_residence" value="" placeholder="country" maxlength="191"
                                                required="" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <hr>
                                        <h3>Social media accounts:</h3>
                                        <hr>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="facebook"> facebook account </label>
                                            <input id="facebook" class="form-control" type="text" name="facbook" value=""
                                                placeholder="facebook account" maxlength="191" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="twitter"> twitter account </label>
                                            <input id="twitter" class="form-control" type="text" name="twitter" value=""
                                                placeholder="twitter account" maxlength="191" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="linkedin"> LinkedIn account </label>
                                            <input id="facebook" class="form-control" type="text" name="linkedin" value=""
                                                placeholder="LinkedIn account" maxlength="191" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="instagram"> Instagram Account </label>
                                            <input id="instagram" class="form-control" type="text" name="instagram" value=""
                                                placeholder="Instagram Account" maxlength="191" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <hr>
                                        <h3>Information of the bank you wish to transfer to:</h3>
                                        <hr>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="bank_name"> bank name </label>
                                            <input id="bank_name" class="form-control" type="text" name="bank_name" value=""
                                                placeholder="bank name" maxlength="191" required="" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="bank_country"> country </label>
                                            <input id="bank_country" class="form-control" type="text" name="bank_country"
                                                value="" placeholder="country" maxlength="191" required=""
                                                autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="ibn_number"> IBAN </label>
                                            <input id="ibn_number" class="form-control" type="text" name="ibn_number"
                                                value="" placeholder="IBAN" maxlength="191" required="" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row justify-content-center">
                                    <div class="col-4">
                                        <a class="btn btn-danger" href="{{ route('accreditation_bodies') }}">Cancel</a>
                                        <button class="btn btn-success pull-right" type="submit">Create</button>
                                    </div>
                                </div>
                                <!--col-->
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!--animated-->
    </div>
@endsection
