@extends('weblayouts.webapp')
@section('content')
<main id="main">

    <!-- two columns -->
    <div id="two-columns" class="container" style="margin-top:150px;">
        <div class="row">
            <div class="col-md-12">
                <a  href="{{route('discussion-form')}}" class="btn btn-theme btn-warning text-uppercase font-lato fw-bold pull-right">New Discussion</a>
            </div>
        </div>
        <br>
        <div class="row">
            <!-- content -->
            <section id="content" class="col-xs-12 col-md-12">
                <div class="table-wrap">
                    <!-- forum data table -->
                    <table class="table forum-data-table tab-full-responsive">
                        <thead class="bg-dark text-uppercase hidden-xs">
                            <tr>
                                <th class="col01">Forum</th>
                                <th class="col02">Category</th>
                                <th class="col03">Comments</th>
                                <th class="col04">freshness</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($forums as $forum)
                            <tr>
                                <td class="col01" data-title="Forum">
                                    <div>
                                        <h4><a href="{{route('singleforum',$forum->fid)}}">{{$forum->title}}</a></h4>
                                        <p>{{$forum->descripption}}</p>
                                    </div>
                                </td>
                                <td class="col02 text-small" data-title="Topics"><span>{{$forum->category_name}}</span></td>
                                <td class="col03 text-small" data-title="posts"><span>{{$forum->reply}}</span></td>
                                <td class="col04 text-small" data-title="posts">
                                    <div>
                                        <p><time datetime="2011-01-12">{{ \Carbon\Carbon::parse($forum->created_at)->diffForHumans() }}</time></p>
                                        <p><a href="#" class="text-capitalize">{{$forum->name}}</a></p>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            {{$forums->links()}}
                        </tbody>
                    </table>
                </div>
            </section>
        
        </div>
    </div>
</main>
@endsection
