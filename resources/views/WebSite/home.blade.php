@extends('weblayouts.webapp')
@section('content')
<!-- contain main informative part of the site -->
		<main id="main">
			<!-- intro block -->
			<section class="intro-block">
				<div class="slider fade-slider">
					@foreach($slides as $slide)
					<div>
						<!-- intro block slide -->
						
						<article class="intro-block-slide overlay bg-cover" style="background-image:  url({{asset('/upload/slider/'.$slide->image)}});">
							<div class="align-wrap container">
								<div class="align">
									<div class="anim">
										<h1 class="intro-block-heading">{{$slide->hero_text}}</h1>
									</div>
									<div class="anim delay1">
										<p>{{$slide->sub_text}}</p>
									</div>
									<div class="anim delay2">
										<div class="btns-wrap">
											<a href="courses-list.html" class="btn btn-warning btn-theme text-uppercase">Our Courses</a>
											<a href="contact.html" class="btn btn-white text-uppercase">Contact us</a>
										</div>
									</div>
								</div>
							</div>
						</article>
					
					</div>
					@endforeach
				</div>
				<div class="container">
					<!-- features aside -->
					<aside class="features-aside">
						<a href="#" class="col">
							<span class="icn-wrap text-center no-shrink">
								<img src="{{asset('image/icon01.svg')}}" width="44" height="43" alt="trophy">
							</span>
							<div class="description">
								<h2 class="features-aside-heading">World’d Best Instructors</h2>
								<span class="view-more element-block text-uppercase">view more</span>
							</div>
						</a>
						<a href="#" class="col">
							<span class="icn-wrap text-center no-shrink">
								<img src="{{asset('image/icon02.svg')}}" width="43" height="39" alt="computer">
							</span>
							<div class="description">
								<h2 class="features-aside-heading">Learn Courses Onlines</h2>
								<span class="view-more element-block text-uppercase">view more</span>
							</div>
						</a>
						<a href="#" class="col">
							<span class="icn-wrap text-center no-shrink">
								<img src="{{asset('image/icon03.svg')}}" width="43" height="39" alt="computer">
							</span>
							<div class="description">
								<h2 class="features-aside-heading">Online Library &amp; Store</h2>
								<span class="view-more element-block text-uppercase">view more</span>
							</div>
						</a>
					</aside>
				</div>
			</section>
			<!-- popular posts block -->
			<section class="popular-posts-block container">
				<header class="popular-posts-head">
					<h2 class="popular-head-heading">Most Popular Courses</h2>
				</header>
				<div class="row">
					<!-- popular posts slider -->
					<div class="slider popular-posts-slider">
							@if(count($featured_courses))
						     @foreach($featured_courses as $course)
						<div>
							<div class="col-xs-12">
								<!-- popular post -->
								<article class="popular-post">
									<div class="aligncenter">
										<img src="{{asset('image/courses/'.$course->course_image)}}" alt="image description">
									</div>
									<div>
										<strong class="bg-primary text-white font-lato text-uppercase price-tag">$ {{$course->price}}</strong>

									</div>
									<h3 class="post-heading"><a href="{{route('singlecourse',$course->slug)}}">{{$course->title}}</a></h3>
									<div class="post-author">
										<div class="alignleft rounded-circle no-shrink">
											<a href="instructor-single.html"><img src="{{asset('image/img03.jpg')}}" class="rounded-circle" alt="image description"></a>
										</div>
									 <h4 class="author-heading"><a href="#">{{$course->name}}</a></h4>
									</div>
									<footer class="post-foot gutter-reset">
										<ul class="list-unstyled post-statuses-list">
											<li>
												<a href="#">
													<span class="fas icn fa-users no-shrink"><span class="sr-only">users</span></span>
													<strong class="text fw-normal">98</strong>
												</a>
											</li>
											<li>
												<a href="#">
													<span class="fas icn no-shrink fa-comments"><span class="sr-only">comments</span></span>
													<strong class="text fw-normal">10</strong>
												</a>
											</li>
										</ul>
										<ul class="star-rating list-unstyled">
											<li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
											<li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
											<li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
											<li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
											<li><span class="fas fa-star"><span class="sr-only">star</span></span></li>
										</ul>
									</footer>
								</article>
							</div>
						</div>
						@endforeach
						@else
						<p>No Course Found</p>
						@endif
						
					</div>
				</div>
			</section>
			<!-- counter aside -->
			<aside class="bg-cover counter-aside" style="background-image: url({{asset('image/img10.jpg')}});">
				<div class="container align-wrap">
					<div class="align">
						<div class="row">
							<div class="col-xs-12 col-sm-3 col">
								<h2 class="counter-aside-heading">
									<strong class="countdown element-block">150</strong>
									<strong class="text element-block">COUNTRIES REACHED</strong>
								</h2>
							</div>
							<div class="col-xs-12 col-sm-3 col">
								<h2 class="counter-aside-heading">
									<strong class="countdown element-block">28000</strong>
									<strong class="text element-block">PASSED GRADUATES</strong>
								</h2>
							</div>
							<div class="col-xs-12 col-sm-3 col">
								<h2 class="counter-aside-heading">
									<strong class="countdown element-block">750</strong>
									<strong class="text element-block">QUALIFIED STAFF</strong>
								</h2>
							</div>
							<div class="col-xs-12 col-sm-3 col">
								<h2 class="counter-aside-heading">
									<strong class="countdown element-block">1200</strong>
									<strong class="text element-block">COURSES PUBLISHED</strong>
								</h2>
							</div>
						</div>
					</div>
				</div>
			</aside>
			<!-- upcoming events block -->
			<section class="upcoming-events-block container">
				<header class="block-header">
					<div class="pull-left">
						<h2 class="block-header-heading">Upcoming Events</h2>
						<p>Recent and upcoming educational events listed here</p>
					</div>
					<a href="event-list.html" class="btn btn-default text-uppercase pull-right">View More</a>
				</header>
				<!-- upcoming events list -->
				<ul class="list-unstyled upcoming-events-list">
					<li>
						<div class="alignright">
							<img src="{{asset('image/img11.jpg')}}" alt="image description">
						</div>
						<div class="alignleft">
							<time datetime="2011-01-12" class="time text-uppercase">
								<strong class="date fw-normal">01</strong>
								<strong class="month fw-light font-lato">march</strong>
								<strong class="day fw-light font-lato">WEDNESDAY</strong>
							</time>
						</div>
						<div class="description-wrap">
							<h3 class="list-heading"><a href="event-sigle.html">WordPress Theme Development with Bootstrap</a></h3>
							<address><time datetime="2011-01-12">8:00 am - 5:00 pm</time> | Great Russell Street, WC1B 3DG UK</address>
							<a href="event-sigle.html" class="btn btn-default text-uppercase">register</a>
						</div>
					</li>
					<li>
						<div class="alignright">
								<img src="{{asset('image/img12.jpg')}}" alt="image description">
						</div>
						<div class="alignleft">
							<time datetime="2011-01-12" class="time text-uppercase">
								<strong class="date fw-normal">05</strong>
								<strong class="month fw-light font-lato">march</strong>
								<strong class="day fw-light font-lato">SATURDAY</strong>
							</time>
						</div>
						<div class="description-wrap">
							<h3 class="list-heading"><a href="event-sigle.html">Build Apps with React Native</a></h3>
							<address><time datetime="2011-01-12">12:00 pm - 5:00 pm</time> | No1 Warehouse London, UK</address>
							<a href="event-sigle.html" class="btn btn-default text-uppercase">register</a>
						</div>
					</li>
					<li>
						<div class="alignright">
							<img src="{{asset('image/img13.jpg')}}" alt="image description">
						</div>
						<div class="alignleft">
							<time datetime="2011-01-12" class="time text-uppercase">
								<strong class="date fw-normal">13</strong>
								<strong class="month fw-light font-lato">march</strong>
								<strong class="day fw-light font-lato">Thursday</strong>
							</time>
						</div>
						<div class="description-wrap">
							<h3 class="list-heading"><a href="event-sigle.html">Free Yoga &amp; Excercise Class at Every Morning</a></h3>
							<address><time datetime="2011-01-12">4:00 pm - 8:00 pm</time> | 21 New Globe Walk London, UK</address>
							<a href="event-sigle.html" class="btn btn-default text-uppercase">register</a>
						</div>
					</li>
				</ul>
			</section>
			<!-- course search aside -->
			<aside class="course-search-aside bg-gray">
				<!-- course search form -->
				<form action="#" class="container course-search-form">
					<label class="element-block text-center font-lato">Search For Course</label>
					<div class="form-holder">
						<div class="form-row">
							<div class="form-group">
								<select data-placeholder="Category" class="chosen-select-no-single">
									<option value="0">Category</option>
									<option value="0">Category</option>
									<option value="0">Category</option>
								</select>
							</div>
							<div class="form-group">
								<select data-placeholder="Course Cost" class="chosen-select-no-single">
									<option value="0">Course Cost</option>
									<option value="0">Course Cost</option>
									<option value="0">Course Cost</option>
								</select>
							</div>
							<div class="form-group">
								<select data-placeholder="Search Text" class="chosen-select-no-single">
									<option value="0">Search Text</option>
									<option value="0">Search Text</option>
									<option value="0">Search Text</option>
								</select>
							</div>
						</div>
						<button type="button" class="btn btn-theme btn-warning no-shrink text-uppercase">Search</button>
					</div>
				</form>
			</aside>
			<!-- categories aside -->
			<aside class="bg-cover categories-aside text-center" style="background-image: url({{asset('image/img14.jpg')}});">
				<div class="container holder">
					<!-- categories list -->
					<ul class="list-unstyled categories-list">
						<li>
							<a href="#">
								<div class="align">
									<span class="icn-wrap">
										<img src="{{asset('image/icon04.svg')}}" width="43" height="43" alt="image description">
									</span>
									<strong class="h h5 element-block text-uppercase">Business</strong>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<div class="align">
									<span class="icn-wrap">
										<img src="{{asset('image/icon05.svg')}}" width="44" height="48" alt="image description">
									</span>
									<strong class="h h5 element-block text-uppercase">Language</strong>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<div class="align">
									<span class="icn-wrap">
										<img src="{{asset('image/icon06.svg')}}" width="51" height="42" alt="image description">
									</span>
									<strong class="h h5 element-block text-uppercase">Programming</strong>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<div class="align">
									<span class="icn-wrap">
										<img src="{{asset('image/icon07.svg')}}" width="51" height="42" alt="image description">
									</span>
									<strong class="h h5 element-block text-uppercase">Film &amp; Video</strong>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<div class="align">
									<span class="icn-wrap">
										<img src="{{asset('image/icon08.svg')}}" width="51" height="39" alt="image description">
									</span>
									<strong class="h h5 element-block text-uppercase">Photography</strong>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<div class="align">
									<span class="icn-wrap">
										<img src="{{asset('image/icon09.svg')}}" width="51" height="51" alt="image description">
									</span>
									<strong class="h h5 element-block text-uppercase">Web Design</strong>
								</div>
							</a>
						</li>
					</ul>
				</div>
			</aside>
			<!-- getstarted block -->
			<article class="container getstarted-block">
				<div class="row">
					<div class="col-xs-12 col-md-8 col">
						<div class="alignleft">
							<img src="{{asset('image/img15.jpg')}}" alt="image description">
						</div>
						<div class="description-wrap">
							<h2><span class="element-block">Get the coaching training</span><span class="fw-light ttn element-block">1000s of online courses for free</span></h2>
							<p>German final week mother of god grey viverra no computer unlock impossibru. Pikachu grin venenatis cuteness&hellip;</p>
							<a href="#" class="btn btn-default text-uppercase">view details</a>
						</div>
					</div>
					<div class="col-xs-12 col-md-4 col text-center">
						<div class="limit-counter">
							<strong class="title element-block fw-normal">It’s limited seating! Hurry up</strong>
							<div id="defaultCountdown" class="comming-timer"></div>
						</div>
					</div>
				</div>
				<!-- getstarted bar -->
				<aside class="getstarted-bar bg-gray text-center">
					<strong class="h h4 element-block">CREATE AN ACCOUNT TO GET STARTED</strong>
					<a href="#" class="btn btn-theme btn-warning text-uppercase no-shrink">Signin Now</a>
				</aside>
			</article>
			<!-- testimonials block -->
			<section class="testimonials-block text-center bg-gray" style="background-image: url(images/bg-pattern01.png);">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-10 col-sm-offset-1">
							<h2>What People Say</h2>
							<!-- testimonail slider -->
							<div class="slick-slider slider testimonail-slider">
								@foreach($testimonial as $testimonial)
								<div>
									<!-- testimonial quote -->
									<blockquote class="testimonial-quote font-roboto">
										<p>{{$testimonial->content}}</p>
										<cite class="element-block font-lato">
											<span class="avatar rounded-circle element-block">
												<img class="rounded-circle" src="{{asset('/upload/testimonials/'.$testimonial->image)}}" alt="Nethor Doct -Developer">
											</span>
											
										</cite>
									</blockquote>
								</div>
								@endforeach
								
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- news block -->
			<section class="news-block container">
				<header class="seperator-head text-center">
					<h2>Recent News</h2>
					<p>Share your work to collaboratve with our vibrant design element.</p>
				</header>
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-4">
						<!-- news post -->
						<article class="news-post">
							<div class="aligncenter">
								<a href="blog-single.html"><img src="{{asset('image/img12.jpg')}}" alt="image desciption"></a>
							</div>
							<h3><a href="blog-single.html">Best Educational Psd Template Launching Today</a></h3>
							<p>Areas tackled in the most fundamental part of medical research include cellu lar and molecular biology&hellip;</p>
							<time datetime="2011-01-12" class="time text-uppercase text-gray">Mar 05,2017  by <a href="blog-single.html">andrew caset</a></time>
						</article>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4">
						<!-- news post -->
						<article class="news-post">
							<div class="aligncenter">
								<a href="blog-single.html"><img src="{{asset('image/img12.jpg')}}" alt="image desciption"></a>
							</div>
							<h3><a href="blog-single.html">Your one stop Solution for Android Development Needs</a></h3>
							<p>Areas tackled in the most fundamental part of medical research include cellu lar and molecular biology&hellip;</p>
							<time datetime="2011-01-12" class="time text-uppercase text-gray">Mar 05,2017  by <a href="blog-single.html">andrew caset</a></time>
						</article>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4">
						<!-- news post -->
						<article class="news-post">
							<div class="aligncenter">
								<a href="blog-single.html"><img src="http://placehold.it/360x210" alt="image desciption"></a>
							</div>
							<h3><a href="blog-single.html">Online Learning students council meeting 2017</a></h3>
							<p>Areas tackled in the most fundamental part of medical research include cellu lar and molecular biology&hellip;</p>
							<time datetime="2011-01-12" class="time text-uppercase text-gray">Mar 05,2017  by <a href="blog-single.html">andrew caset</a></time>
						</article>
					</div>
				</div>
			</section>
			<section class="partner-block">
				<div class="container">
					<div class="row">
						<header class="col-xs-12 popular-posts-head">
							<h2 class="popular-head-heading">Trusted Partners</h2>
						</header>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<ul class="list-unstyled partner-list">
								<li><a href="#"><img src="http://placehold.it/165x90" alt="partner logo"></a></li>
								<li><a href="#"><img src="http://placehold.it/165x90" alt="partner logo"></a></li>
								<li><a href="#"><img src="http://placehold.it/165x90" alt="partner logo"></a></li>
								<li><a href="#"><img src="http://placehold.it/165x90" alt="partner logo"></a></li>
								<li><a href="#"><img src="http://placehold.it/165x90" alt="partner logo"></a></li>
								<li><a href="#"><img src="http://placehold.it/165x90" alt="partner logo"></a></li>
								<li><a href="#"><img src="http://placehold.it/165x90" alt="partner logo"></a></li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<!-- subscription aside block -->
			<aside class="subscription-aside-block bg-theme text-white">
				<!-- newsletter sub form -->
			<form method="POST" action="{{ route('create_newsletter') }}" class="container newsletter-sub-form">
				  @csrf
					<div class="row form-holder">
						<div class="col-xs-12 col-sm-6 col">
							<div class="text-wrap">
								<span class="element-block icn no-shrink rounded-circle"><i class="far fa-envelope-open"><span class="sr-only">icn</span></i></span>
								<div class="inner-wrap">
									<label for="email">Signup for Newsletter</label>
									<p>Subscribe now and receive weekly newsletter with new updates.</p>
								</div>
							</div>
						</div>           
						<div class="col-xs-12 col-sm-6 col">
							<div class="input-group">    
								<input type="email" id="email" name="email" class="form-control" placeholder="Enter your email&hellip;">
								<span class="input-group-btn">
									<button class="btn btn-dark text-uppercase" type="submit">Submit</button>
								</span>
							</div>
						</div>
					</div>
				</form>
			</aside>
		</main>
@endsection
