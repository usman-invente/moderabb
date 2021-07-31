@extends('weblayouts.webapp')
@section('content')
<main id="main">
    <!-- heading banner -->
    <header class="heading-banner text-white bgCover" style="background-image: url(http://placehold.it/1920x181);">
        <div class="container holder">
            <div class="align">
                <h1>Cart Page</h1>
            </div>
        </div>
    </header>
    <!-- breadcrumb nav -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="home.html">Home</a></li>
                <li><a href="shop.html">Shop</a></li>
                <li class="active">Cart Page</li>
            </ol>
        </div>
    </nav>
    <!-- cart content block -->
    <section class="cart-content-block container">
        <!-- cart form -->
        @if (\Session::has('message'))
        <div class="alert alert-success">     
            {!! \Session::get('message') !!}</li>
        </div>
        @elseif(\Session::has('error'))
        <div class="alert alert-success">     
            {!! \Session::get('message') !!}</li>
        </div>
       @endif
        <form action="#" class="cart-form">
            <div class="table-wrap">
                <!-- cart data table -->
                <table class="table tab-full-responsive cart-data-table font-lato">
                    <thead class="hidden-xs">
                        <tr>
                            <th class="col01">Product</th>
                            <th>Price</th>
                            <th>Certificate Price</th>
                            <th>Start Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($cart_course))
                        @foreach($cart_course as $course)
                        <tr>
                            <td data-title="Product" class="col01">
                                <div>
                                    <a href="{{route('deletecartproduct',$course->id)}}" class="btn-remove fas fa-times"><span class="sr-only">remove</span></a>
                                    <div class="pro-name-wrap">
                                        <div class="alignleft no-shrink hidden-xs">
                                            <img src="{{asset('image/courses/'.$course->course_image)}}" alt="image description">
                                        </div>
                                        <div class="descr-wrap">
                                            <h3 class="fw-normal">{{$course->course_title}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td data-title="Price"><span><strong class="price element-block"> ${{$course->course_price}}</strong></span></td>
                            <td data-title="Price"><span><strong class="price element-block"> ${{$course->certificate_price}}</strong></span></td>
                            <td data-title="Start ON"><span><strong class="price element-block"> {{date('Y-m-d',strtotime($course->start_date))}}</strong></span></td>
                          
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-offset-2 col-sm-10 col-md-offset-6 col-md-6">
                    <h2>Cart Totals</h2>
                    <div class="table-wrap">
                        <!-- table cart total -->
                        <table class="table table-cart-total">
                            <tbody>
                                <tr>
                                    <td class="font-lato fw-bold">Subtotal</td>
                                    <td><strong class="price">${{$sum}}</strong></td>
                                </tr>
                                <tr>
                                    <td class="font-lato fw-bold">Certificate Price</td>
                                    <td><strong class="price">${{$certificate_price}}</strong></td>
                                </tr>
                                <tr>
                                    <td class="font-lato fw-bold">+15.00% VAT</td>
                                    <td><strong class="price">${{$percentage}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td><strong class="price">${{$total}}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <a href="{{route('checkout')}}" class="btn btn-warning btn-theme font-lato fw-bold text-uppercase element-block">Proceed to checkout</a>
                </div>
            </div>
        </form>
    </section>
</main>
@endsection
