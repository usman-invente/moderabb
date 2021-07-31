<!-- footer area container -->
		<div class="footer-area bg-dark text-gray">
			<!-- aside -->
			<aside class="aside container">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-3 col">
						<div class="logo"><a href="home.html"><img src="{{ asset('image/logo.png') }}" alt="studyLMS"></a></div>
						<p>We have over 20 years experience providing expert Educational both businesses and individuals. Our Investment Committee brings cades the industry expertise in driving our investment approach. portfolio constructor and allocation</p>
						<a href="#" class="btn btn-default text-uppercase">Start Leaning Now</a>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 col hidden-xs">
						<h3>Popular Courses</h3>
						<!-- widget cources list -->
						<ul class="widget-cources-list list-unstyled">
							<li>
								<a href="course-single.html">
									<div class="alignleft">
										<img src="http://placehold.it/60x60" alt="image description">
									</div>
									<div class="description-wrap">
										<h4>Introduction to Mobile Apps Development</h4>
										<strong class="price text-primary element-block font-lato text-uppercase">$99.00</strong>
									</div>
								</a>
							</li>
							<li>
								<a href="course-single.html">
									<div class="alignleft">
										<img src="http://placehold.it/60x60" alt="image description">
									</div>
									<div class="description-wrap">
										<h4>Become a Professional Film Maker</h4>
										<strong class="price text-success element-block font-lato text-uppercase">Free</strong>
									</div>
								</a>
							</li>
							<li>
								<a href="course-single.html">
									<div class="alignleft">
										<img src="http://placehold.it/60x60" alt="image description">
									</div>
									<div class="description-wrap">
										<h4>Swift Programming For Beginners</h4>
										<strong class="price text-primary element-block font-lato text-uppercase">$75.00</strong>
									</div>
								</a>
							</li>
						</ul>
					</div>
					<nav class="col-xs-12 col-sm-6 col-md-3 col">
						<h3>Quick Links</h3>
						<!-- fooer navigation -->
						<ul class="fooer-navigation list-unstyled">
							<li><a href="#">All Courses</a></li>
							<li><a href="#">Summer Sessions</a></li>
							<li><a href="#">Recent Exams</a></li>
							<li><a href="#">Professional Courses</a></li>
							<li><a href="#">Privacy Policy</a></li>
							<li><a href="#">Terms of Use</a></li>
							<li><a href="#">All Courses</a></li>
							<li><a href="#">Contact Us</a></li>
						</ul>
					</nav>
					<div class="col-xs-12 col-sm-6 col-md-3 col">
						<h3>contact us</h3>
						<p>If you want to contact us about any issue our support available to help you 8am-7pm Monday to saturday.</p>
						<!-- ft address -->
						<address class="ft-address">
							<dl>
								<dt><span class="fas fa-map-marker"><span class="sr-only">marker</span></span></dt>
								<dd>Address: 9015 Sunset Boulevard United Kingdom</dd>
								<dt><span class="fas fa-phone-square"><span class="sr-only">phone</span></span></dt>
								<dd>Call: <a href="tel:+2156237532">+ 215 623 7532</a></dd>
								<dt><span class="fas fa-envelope-square"><span class="sr-only">email</span></span></dt>
								<dd>Email: <a href="mailto:info@Studylms.com">info@Studylms.com</a></dd>
							</dl>
						</address>
					</div>
				</div>
			</aside>
			<!-- page footer -->
			<footer id="page-footer" class="font-lato">
				<div class="container">
					<div class="row holder">
						<div class="col-xs-12 col-sm-push-6 col-sm-6">
							<ul class="socail-networks list-unstyled">
								<li><a href="#"><span class="fab fa-facebook"></span></a></li>
								<li><a href="#"><span class="fab fa-twitter"></span></a></li>
								<li><a href="#"><span class="fab fa-instagram"></span></a></li>
								<li><a href="#"><span class="fab fa-linkedin"></span></a></li>
							</ul>
						</div>
						<div class="col-xs-12 col-sm-pull-6 col-sm-6">
							<p><a href="#">Studylms</a> | &copy; 2018 <a href="#">DesignFalls</a>, All rights reserved</p>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<!-- back top of the page -->
		<span id="back-top" class="text-center fa fa-caret-up"></span>
		<!-- loader of the page -->
		<div id="loader" class="loader-holder">
			<div class="block"><img src="{{ asset('image/svg/hearts.svg') }}" width="100" alt="loader"></div>
		</di	v>
	</div>
	<div class="popup-holder">
		<div id="popup1" class="lightbox-demo">
		
		</div>
		<div id="popup2" class="lightbox-demo">
			{{-- <form method="POST" action="{{ route('register') }}" class="user-log-form">
                @csrf
				<h2>Register Form</h2>
				<div class="form-group">
                    <input id="name" type="text" class="form-control element-block @error('name') is-invalid @enderror" name="name" placeholder="ForeName" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
				</div>
                <div class="form-group">
                    <input id="title" type="text" class="form-control element-block @error('title') is-invalid @enderror" name="title" placeholder="Title" value="{{ old('title') }}" required autocomplete="name" autofocus>
                    @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
				</div>
				<div class="form-group">
					<input id="email" type="email" class="form-control element-block @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
				</div>
                <div class="form-group">
                    <input id="password" type="password" class="form-control element-block @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group">

                        <input id="password-confirm" type="password" class="form-control element-block" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">

                </div>
                <div class="form-group">
                    <input id="telephone" type="tel" class="form-control element-block @error('telephone') is-invalid @enderror" name="telephone" placeholder="TelPhone" required autocomplete="telephone">
                        @error('telephone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group">
                    <input id="dob" type="date" class="form-control element-block @error('dob') is-invalid @enderror" name="dob" placeholder="dob" required autocomplete="dob">

                    @error('dob')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group">
                    <h6>Sex:</h6>
                      <input type="radio" id="male" name="sex" value="male">
                      <label for="male">male</label>
                      <input type="radio" id="female" name="sex" value="female">
                      <label for="female">female</label><br>
                </div>
                <div class="form-group">
                    <input id="country" type="text" class="form-control element-block @error('country') is-invalid @enderror" name="country" placeholder="Country" required autocomplete="country">

                    @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
				<div class="btns-wrap">
					<div class="wrap">
						<button type="submit" class="btn btn-theme btn-warning fw-bold font-lato text-uppercase">Register</button>
					</div>
				</div>
			</form> --}}

	</div>
	<!-- include jQuery -->
	<script src="{{asset('js/jquery.js')}}"></script>
	<!-- include jQuery -->
	<script src="{{asset('js/plugins.js')}}"></script>
	<!-- include jQuery -->
	<script src="{{asset('js/jquery.main.js')}}"></script>
	<!-- include jQuery -->
	<script type="text/javascript" src="{{asset('js/init.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/build/utils.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/build/intlTelInput.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/build/intlTelInput-jquery.min.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/img/flags.png"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/img/flags@2x.png"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js" ></script>

    <script>
         /*// Vanilla Javascript
        var input = document.querySelector("#telephone");
        window.intlTelInput(input,({
        // options here
        }));
        // jQuery
        $("#telephone").intlTelInput({
        // options here
        });*/

        let telInput = document.querySelector("#telephone");
        // initialize
        window.intlTelInput(telInput,({
        // options here
        /*allowExtensions: true,
        autoFormat: false,
        autoHideDialCode: false,
        autoPlaceholder: false,
        defaultCountry: "auto",
        ipinfoToken: "yolo",
        nationalMode: false,
        numberType: "MOBILE",
        //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        //preferredCountries: ['cn', 'jp'],
        preventInvalidNumbers: true,*/
        initialCountry: 'auto',
        llowExtensions: true,
        autoFormat: false,
        autoHideDialCode: false,
        autoPlaceholder: false,
        defaultCountry: "auto",
        ipinfoToken: "yolo",
        nationalMode: false,
        numberType: "MOBILE",
        preventInvalidNumbers: true,
        preferredCountries: ['us','gb','br','ru','cn','es','it'],
        autoPlaceholder: 'aggressive',

        utilsScript: "http://127.0.0.1:8000/js/build/utils.js",
            geoIpLookup: function(callback) {
                fetch('https://ipinfo.io/json', {
                    cache: 'reload'
                }).then(response => {
                    if ( response.ok ) {
                        return response.json()
                    }
                    throw new Error('Failed: ' + response.status)
                }).then(ipjson => {
                    callback(ipjson.country)
                }).catch(e => {
                    callback('us')
                })
            }
        })
        )

    </script>
    @yield('script')
</body>
</html>

