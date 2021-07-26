@extends('weblayouts.webapp')
@section('content')
<main id="main">
	
	<!-- contact block -->
	
	<section class="contact-block">
		<div class="container" style="margin-top: 50px;">
            <br><br><br>
			@if (session('error') || session('message'))
				<div class="alert alert-success" style=" width: 100%;">
				<span class="{{ session('error') ? 'error':'success' }}">{{ session('error') ?? session('message') }}</span>
			</div>
			@endif
			<!-- contact form -->
			<form action="{{route('create_trainers')}}" method = "POST" class="contact-form">
			@csrf
				<h3 class="col-12">Trainer data</h3>

				<div class="row">
					<div class="col-xs-12 col-sm-4">
						<div class="form-group">
                            <label for="firstName" class="required"> first name </label>
							<input type="text" class="form-control element-block" name="name"placeholder="first name">
						</div>
					</div>
                    <div class="col-xs-12 col-sm-4">
						<div class="form-group">
                            <label for="firstName" class="required"> surname </label>
							<input type="text" class="form-control element-block" name="title"placeholder="surname">
						</div>
					</div>
					<div class="col-xs-12 col-sm-4">
                        <div class="form-group">
                            <label for="academicRank"> academic degree </label>
                            <select id="academicRank" class="form-control" name="academic_rank" required="" autocomplete="off">
                                <option value=""> select degree </option>
                                <option value="b"> bachelor </option>
                                <option value="m"> master </option>
                                <option value="d"> doctorate </option>
                                <option value="cp"> associate professor </option>
                                <option value="cd"> professor doctor </option>
                            </select>
                        </div>
					</div>
                </div>
                <div class="row"> 
					<div class="col-xs-12 col-sm-4">
						<div class="form-group">
                            <label for="firstName" class="required"> email </label>
							<input type="email" class="form-control element-block" name="email" placeholder="Email">
						</div>
					</div>
                    <div class="col-xs-12 col-sm-4">
						<div class="form-group">
                            <label for="firstName" class="required">password</label>
							<input type="password" class="form-control element-block" name="password" placeholder="Password">
						</div>
					</div>
                    <div class="col-xs-12 col-sm-4">
						<div class="form-group">
                            <label for="firstName" class="required"> email </label>
							<input type="tel" class="form-control element-block" name="phone" placeholder="Phone">
						</div>
                        
					</div>
				</div>
                <div class="row">
					<div class="col-xs-12 col-sm-4">
						<div class="form-group">
                            <label for="firstName" class="required"> nationality </label>
							<input type="text" class="form-control element-block" name="nationality"placeholder="Nationality">
						</div>
					</div>
                    <div class="col-xs-12 col-sm-4">
						<div class="form-group">
                            <label for="firstName" class="required"> country_of_residence </label>
							<input type="text" class="form-control element-block" name="country_of_residence"placeholder="Country Of Residence">
						</div>
					</div>
					<div class="col-xs-12 col-sm-4">
                        <div class="form-group">
                            <label for="academicRank"> Gender </label>
                            <select id="gender" class="form-control" name="sex" autocomplete="off" required="">
                                <option value=""> select gender </option>
                                <option value="male"> male </option>
                                <option value="female"> female </option>
                            </select>
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
							<input type="text" class="form-control element-block" name="facbook"placeholder="Facebook">
						</div>
					</div>
                    <div class="col-xs-12 col-sm-3">
						<div class="form-group">
                            <label for="firstName" class="required">  twitter account  </label>
							<input type="text" class="form-control element-block" name="twitter"placeholder="Twitter">
						</div>
					</div>
                    <div class="col-xs-12 col-sm-3">
						<div class="form-group">
                            <label for="firstName" class="required">  LinkedIn account  </label>
							<input type="text" class="form-control element-block" name="linkedin"placeholder="Linkedin">
						</div>
					</div>
                    <div class="col-xs-12 col-sm-3">
						<div class="form-group">
                            <label for="firstName" class="required">  Instagram Account  </label>
							<input type="text" class="form-control element-block" name="instagram"placeholder="Instagram">
						</div>
					</div>
                </div>
                <div class="col-12">
                    <h3>Attachments:</h3>
                    <hr>
                </div>
                <div class="row">
					<div class="col-xs-12 col-sm-3">
						<div class="form-group">
                            <label for="firstName" class="required">  personal photo  </label>
							<input type="file" class="form-control element-block" name="avatar_location"placeholder="Facebook">
						</div>
					</div>
                    <div class="col-xs-12 col-sm-3">
						<div class="form-group">
                            <label for="firstName" class="required">  passport copy  </label>
							<input type="file" class="form-control element-block" name="passport"placeholder="Twitter">
						</div>
					</div>
                    <div class="col-xs-12 col-sm-3">
						<div class="form-group">
                            <label for="firstName" class="required">  photo from the latest academic qualification  </label>
							<input type="file" class="form-control element-block" name="photo_academic_degree"placeholder="Linkedin">
						</div>
					</div>
                    <div class="col-xs-12 col-sm-3">
						<div class="form-group">
                            <label for="firstName" class="required">  Attach CV  </label>
							<input type="file" accept="application/pdf" class="form-control element-block" name="cv"placeholder="Instagram">
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
							<input type="text" class="form-control element-block" name="bank_name"placeholder="bank name">
						</div>
					</div>
                    <div class="col-8">
						<div class="form-group">
                            <label for="firstName" class="required">  country  </label>
							<input type="text" class="form-control element-block" name="bank_country"placeholder="country">
						</div>
					</div>
                    <div class="col-8">
						<div class="form-group">
                            <label for="firstName" class="required"> IBAN  </label>
							<input type="text" class="form-control element-block" name="ibn_number"placeholder="IBAN">
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
