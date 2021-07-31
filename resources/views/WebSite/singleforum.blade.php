@extends('weblayouts.webapp')
@section('content')
<main id="main">
    <!-- heading banner -->
    <header class="heading-banner text-white bgCover" style="background-image: url(http://placehold.it/1920x181);">
        <div class="container holder">
            <div class="align">
                <h1>Forum</h1>
            </div>
        </div>
    </header>
    <!-- breadcrumb nav -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="home.html">Home</a></li>
                <li><a href="forum.html">Forum</a></li>
                <li class="active">Private Forum</li>
            </ol>
        </div>
    </nav>
    <!-- two columns -->
    <div id="two-columns" class="container">
        <div class="row">
            <!-- content -->
            <section id="content" class="col-xs-12 col-md-9">
                <div class="table-wrap">
                    <!-- forum data table -->
                   {!! $forum->descripption !!}
                </div>
                <ul class="list-unstyled reviewsList">
                    @foreach($discussion as $discussion)
                    <li>
                        <div class="alignleft">
                            <a href="instructor-single.html"><img src="http://placehold.it/50x50"
                                    alt="Lavin Duster"></a>
                        </div>
                        <div class="description-wrap">
                            <div class="descrHead">
                                <h3>{{$discussion->name}} – <time datetime="2011-01-12">{{date('Y-m-d',strtotime($discussion->created_at))}}</time></h3>
                                
                            </div>
                            <p>{{$discussion->comment}}</p>
                        </div>
                    </li>
                    @endforeach
                   
                </ul>
                <form action="{{route('reply-discussion')}}"  method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" value="{{$forum->id}}" name="forum_id">
                        <textarea class="form-control summernote" required name="comment"></textarea>
                        <button type="submit">ADD</button>

                    </div>

                </form>
              
            </section>
            <!-- sidebar -->
          
        </div>
    </div>
</main>
@endsection
