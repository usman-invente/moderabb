@extends('weblayouts.webapp')
@section('content')
<main id="main">
    <!-- heading banner -->
    <header class="heading-banner text-white bgCover" style="background-image: url(http://placehold.it/1920x181);">
        <div class="container holder">
            <div class="align">
                <h1>Checkout</h1>
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
                <li class="active">Checkout</li>
            </ol>
        </div>
    </nav>
    <!-- checkout block -->
    <section class="container checkout-block">
        <!-- strip note -->
        <aside class="strip-note font-lato">
            <p>Returning customer? <a href="#">Click here to login</a></p>
        </aside>
        <!-- strip note -->
        <aside class="strip-note font-lato">
            <p>Have a coupon? <a href="#">Click here to enter your code</a></p>
        </aside>
        <!-- checkout form -->
        <form action="#" class="checkout-form">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <h2>Billing Details</h2>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label class="element-block fw-normal font-lato">
                                    <span class="element-block">First Name <span class="required">*</span></span>
                                    <input type="text" class="element-block form-control">
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label class="element-block fw-normal font-lato">
                                    <span class="element-block">Last Name <span class="required">*</span></span>
                                    <input type="text" class="element-block form-control">
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label class="element-block fw-normal font-lato">
                                    <span class="element-block">Email Address <span class="required">*</span></span>
                                    <input type="email" class="element-block form-control">
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label class="element-block fw-normal font-lato">
                                    <span class="element-block">Phone <span class="required">*</span></span>
                                    <input type="tel" class="element-block form-control">
                                </label>
                            </div>
                        </div>
                    </div>
                  
                    <div class="form-group">
                        <label class="element-block fw-normal font-lato">
                            <span class="element-block">Address <span class="required">*</span></span>
                            <input type="text" class="element-block form-control" placeholder="Street address">
                            <input type="text" class="element-block form-control" placeholder="Apartment, suite, unit etc. (optional)">
                        </label>
                    </div>
                  
                   
                   
                </div>
                {{-- <div class="col-xs-12 col-md-6">
                    <label for="sd" class="custom-check-wrap font-lato title-check element-block">
                        <input type="checkbox" id="sd" class="customFormReset">
                        <span class="fake-label element-block">Ship to a different address?</span>
                    </label>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label class="element-block fw-normal font-lato">
                                    <span class="element-block">First Name <span class="required">*</span></span>
                                    <input type="text" class="element-block form-control">
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label class="element-block fw-normal font-lato">
                                    <span class="element-block">Last Name <span class="required">*</span></span>
                                    <input type="text" class="element-block form-control">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="element-block fw-normal font-lato">
                            <span class="element-block">Company Name</span>
                            <input type="text" class="element-block form-control">
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="element-block fw-normal font-lato">
                            <span class="element-block">Country <span class="required">*</span></span>
                            <select data-placeholder="Country" class="chosen-select-no-single">
                                <option value="0">England</option>
                                <option value="0">England</option>
                                <option value="0">England</option>
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="element-block fw-normal font-lato">
                            <span class="element-block">Address <span class="required">*</span></span>
                            <input type="text" class="element-block form-control" placeholder="Street address">
                            <input type="text" class="element-block form-control" placeholder="Apartment, suite, unit etc. (optional)">
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="element-block fw-normal font-lato">
                            <span class="element-block">Town / City <span class="required">*</span></span>
                            <input type="text" class="element-block form-control">
                        </label>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label class="element-block fw-normal font-lato">
                                    <span class="element-block">State / Country <span class="required">*</span></span>
                                    <input type="text" class="element-block form-control">
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label class="element-block fw-normal font-lato">
                                    <span class="element-block">Postcode / ZIP <span class="required">*</span></span>
                                    <input type="text" class="element-block form-control">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="element-block fw-normal font-lato">
                            <span class="element-block">Town / City</span>
                            <textarea class="form-control element-block"></textarea>
                        </label>
                    </div>
                </div> --}}
                
            </div>
            {{-- <h2>Your Order</h2>
            <div class="table-wrap">
                <!-- order data table -->
                <table class="table order-data-table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Wirebound Notebook x 2</td>
                            <td><strong class="price">$138.00</strong></td>
                        </tr>
                        <tr>
                            <td>Compact Stabler x 1</td>
                            <td><strong class="price">$19.00</strong></td>
                        </tr>
                        <tr>
                            <td>Wooden Pencil Yellow x 1</td>
                            <td><strong class="price">$22.00</strong></td>
                        </tr>
                        <tr>
                            <td><span class="text-dark">Subtotal</span></td>
                            <td><strong class="price">$105.00</strong></td>
                        </tr>
                        <tr>
                            <td><span class="text-dark">Shipping</span></td>
                            <td>
                                <!-- radio list -->
                                <ul class="list-unstyled radio-list">
                                    <li>
                                        <input type="radio" class="customFormReset" id="raddf01" name="kknjb" checked>
                                        <label for="raddf01" class="custom-radio-wrap fw-normal">Free Shipping</label>
                                    </li>
                                    <li>
                                        <input type="radio" class="customFormReset" id="rad0asd1" name="kknjb" checked>
                                        <label for="rad0asd1" class="custom-radio-wrap fw-normal">Flat Rate: £10.00</label>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="text-dark">Total</span></td>
                            <td><strong class="price">$105.00</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div> --}}
            <!-- confirmation box -->
            <div class="confirmation-box">
                <!-- radio list -->
                <ul class="list-unstyled radio-list">
                    <li>
                        <input type="radio" class="customFormReset" id="rad02" name="paym" checked>
                        <label for="rad02" class="custom-radio-wrap fw-normal">Pay By Bank Card </label>
                        <img  style="width:86px;" src="{{asset('image/visa-method.png')}}" alt="payment-method" class="hidden-xs">
                        <img style="width:86px;" src="{{asset('image/mastercard-method.png')}}" alt="payment-method" class="hidden-xs">
                       
                    </li>
                </ul>
                <hr class="sep">
                <div class="text-right">
                    <a href="{{route('paymentform')}}" class="btn btn-warning btn-theme font-lato fw-bold text-uppercase">Place Order</a>
                </div>
            </div>
        </form>
    </section>
</main>
@endsection
