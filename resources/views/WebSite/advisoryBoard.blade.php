@extends('weblayouts.webapp')
@section('content')
<main id="main">
    <!-- heading banner -->
    <header class="heading-banner text-white bgCover" style="background-image: url(http://placehold.it/1920x181);">
        <div class="container holder">
            <div class="align">
                <h1>Courses</h1>
            </div>
        </div>
    </header>
    <!-- breadcrumb nav -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="home.html">Home</a></li>
                <li class="active">Courses</li>
            </ol>
        </div>
    </nav>
    <!-- two columns -->
    <div id="two-columns" class="container">
        <div class="row">
            <!-- content -->
            <article id="content" class="col-xs-12 col-md-9">
                <!-- show head -->
                <div class="row flex-wrap">
                    @if(count($boards))
                    @foreach($boards as $board)
                    <div class="col-xs-12 col-sm-6 col-lg-4">
                        <!-- popular post -->
                      
                        <article class="popular-post" style="padding:100px">
                                <img src="{{asset('upload/advisory/'.$board->logo)}}" alt="image description" >
                            <p class="post-heading">{{$board->name}}</p>
                        </article>
                    </div>
                    @endforeach
                    @endif

                </div>
                <div class="pagination">
                    {{ $boards->links() }}
                </div>
                   
              
            </article>
            
        </div>
    </div>
</main>
@endsection