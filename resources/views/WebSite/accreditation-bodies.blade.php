@extends('weblayouts.webapp')
@section('content')
<main id="main">
	
	<!-- contact block -->

	<section class="contact-block">
		<div class="container" style="margin-top: 80px;">
			<header class="seperator-head text-center">
				<h2>Join Arabic Language Centers and Institutions</h2>
				<p>Welcome to our Website. We are glad to have you around.</p>
			</header>
			<br><br><br>
			@if (session('error') || session('message'))
				<div class="alert alert-success" style=" width: 100%;">
				<span class="{{ session('error') ? 'error':'success' }}">{{ session('error') ?? session('message') }}</span>
			</div>
			@endif
			<!-- contact form -->
			<form action="{{route('web_create_accreditation_bodies')}}" method = "POST" class="contact-form">
			@csrf

                <hr>
				<div class="row">
					<div class="col-xs-12 col-sm-4">
						<div class="form-group">
							<label for="firstName" class="required"> entity name </label>
							<input id="firstName" class="form-control" type="text" name="name" value=""
                                                placeholder="entity name" maxlength="191" required="" autofocus="on"
                                                autocomplete="off">
						</div>
					</div>
                    <div class="col-xs-12 col-sm-4">
						<div class="form-group">
							<label for="last_name"> Contact Person </label>
							<input id="last_name" class="form-control" type="text" name="c_person" value=""
							placeholder="Contact Person" maxlength="191" required="" autocomplete="off">
						</div>
					</div>
					<div class="col-xs-12 col-sm-4">
                        <div class="form-group">
							<label for="email"> Email address </label>
							<input id="email" class="form-control" type="email" name="email" value=""
							placeholder="email address" maxlength="191" required="" autocomplete="off">
                        </div>
					</div>
                </div>
                <div class="row"> 
					<div class="col-xs-12 col-sm-4">
						<div class="form-group">
							<label for="password"> password </label>
							<input id="password" class="form-control" type="password" name="password"
                                                placeholder="password" maxlength="191" required="" autocomplete="off">
						</div>
					</div>
                    <div class="col-xs-12 col-sm-4">
						<div class="form-group">
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
                    <div class="col-xs-12 col-sm-4">
						<div class="form-group">
							<label for="ibn_number"> country </label>
							<input id="ibn_number" class="form-control" type="text"
							name="country_of_residence" value="" placeholder="country" maxlength="191"
							required="" autocomplete="off">
						</div>
                        
					</div>
				</div>
                <hr>
                <div class="col-12">
                    <h3>Social media accounts:</h3>
                    <hr>
                </div>
                <div class="row">
					<div class="col-xs-12 col-sm-3">
						<div class="form-group">
                            <label for="firstName" class="required">  facebook account  </label>
							<input id="facebook" class="form-control" type="text" name="facbook" value=""
							placeholder="facebook account" maxlength="191" autocomplete="off">
						</div>
					</div>
                    <div class="col-xs-12 col-sm-3">
						<div class="form-group">
                            <label for="firstName" class="required">  twitter account  </label>
							<input id="twitter" class="form-control" type="text" name="twitter" value=""
							placeholder="twitter account" maxlength="191" autocomplete="off">
						</div>
					</div>
                    <div class="col-xs-12 col-sm-3">
						<div class="form-group">
                            <label for="firstName" class="required">  LinkedIn account  </label>
							<input id="facebook" class="form-control" type="text" name="linkedin" value=""
							placeholder="LinkedIn account" maxlength="191" autocomplete="off">
						</div>
					</div>
                    <div class="col-xs-12 col-sm-3">
						<div class="form-group">
                            <label for="firstName" class="required">  Instagram Account  </label>
							<input id="instagram" class="form-control" type="text" name="instagram" value=""
							placeholder="Instagram Account" maxlength="191" autocomplete="off">
						</div>
					</div>
                </div>
                <div class="col-12">
                    <h3>Information of the bank you wish to transfer to:</h3>
                    <hr>
                </div>
                <div class="row">
					<div class="col-8">
						<div class="form-group">
                            <label for="firstName" class="required">  bank name  </label>
							<input id="bank_name" class="form-control" type="text" name="bank_name" value=""
							placeholder="bank name" maxlength="191" required="" autocomplete="off">
						</div>
					</div>
                    <div class="col-8">
						<div class="form-group">
                            <label for="firstName" class="required">  country  </label>
							<input id="bank_country" class="form-control" type="text" name="bank_country"
							value="" placeholder="country" maxlength="191" required=""
							autocomplete="off">
						</div>
					</div>
                    <div class="col-8">
						<div class="form-group">
                            <label for="firstName" class="required"> IBAN  </label>
							<input id="ibn_number" class="form-control" type="text" name="ibn_number"
							value="" placeholder="IBAN" maxlength="191" required="" autocomplete="off">
						</div>
					</div>
                </div>
				<div class="text-center">
					<button type="submit" class="btn btn-theme btn-warning text-uppercase font-lato fw-bold">Register</button>
				</div>
			</form>
		</div>
	
	</section>
</main>
@endsection
