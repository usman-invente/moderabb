@extends('weblayouts.webapp')
@section('content')
<main id="main">
    <br><br>
    <section class="container checkout-block">
        <form action="{{route('create_discussion')}}"  method="post" class="checkout-form">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <h2>Billing Details</h2>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label class="element-block fw-normal font-lato">
                                    <span class="element-block">Discussion Title <span class="required">*</span></span>
                                    <input type="text" name="title" class="element-block form-control">
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label class="element-block fw-normal font-lato">
                                    <span class="element-block">category <span class="required">*</span></span>
                                    <select class="form-control"  name="category">
                                        @foreach($topics as $topic)
                                        <option>{{$topic->category}}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="element-block fw-normal font-lato">
                            <span class="element-block">Details</span>
                            <textarea type="text" class="element-block form-control" name="descripption"></textarea>
                        </label>
                    </div>
                    <button type="submit" >ADD</button>
                </div>
              
            </div>
           
        
       
        </form>
    </section>
</main>
@endsection
