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
                <li class="active">Forum</li>
            </ol>
        </div>
    </nav>
    <!-- two columns -->
    <div id="two-columns" class="container">
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
                                <th class="col02">Topics</th>
                                <th class="col03">posts</th>
                                <th class="col04">freshness</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="col01" data-title="Forum">
                                    <div>
                                        <h4><a href="#">Anroid Mobile App</a></h4>
                                        <p>A Flannel subway tile fam tilde brunch, cliche franzen hell of. Cronut pitchfork quinoa s wind energy continues.</p>
                                    </div>
                                </td>
                                <td class="col02 text-small" data-title="Topics"><span>4</span></td>
                                <td class="col03 text-small" data-title="posts"><span>10</span></td>
                                <td class="col04 text-small" data-title="posts">
                                    <div>
                                        <p><time datetime="2011-01-12">10 days ago</time></p>
                                        <p><a href="#" class="text-capitalize">Maddin Smith</a></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="col01" data-title="Forum">
                                    <div>
                                        <h4><a href="#">Cloud Computing</a></h4>
                                        <p>Squid post-ironic gastropub ugh fashion axe, celiac brooklyn salvia distillery authentic yuccie affogato.</p>
                                    </div>
                                </td>
                                <td class="col02 text-small" data-title="Topics"><span>2</span></td>
                                <td class="col03 text-small" data-title="posts"><span>12</span></td>
                                <td class="col04 text-small" data-title="posts">
                                    <div>
                                        <p><time datetime="2011-01-12">1 months ago</time></p>
                                        <p><a href="#" class="text-capitalize">Diane Cook</a></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="col01" data-title="Forum">
                                    <div>
                                        <h4><a href="#">Web Development</a></h4>
                                        <p>Unicorn humblebrag woke gochujang, succulents fashion axe hell of fixie sriracha thundercats hexagon.</p>
                                    </div>
                                </td>
                                <td class="col02 text-small" data-title="Topics"><span>0</span></td>
                                <td class="col03 text-small" data-title="posts"><span>0</span></td>
                                <td class="col04 text-small" data-title="posts">
                                    <div>
                                        <p><time datetime="2011-01-12">2 months ago</time></p>
                                        <p><a href="#" class="text-capitalize">Student</a></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="col01" data-title="Forum">
                                    <div>
                                        <h4><a href="#">Digital Photography</a></h4>
                                        <p>Artisan gluten-free echo park, cray art party af literally subway tile quinoa tumeric venmo bicycle rights.</p>
                                    </div>
                                </td>
                                <td class="col02 text-small" data-title="Topics"><span>0</span></td>
                                <td class="col03 text-small" data-title="posts"><span>0</span></td>
                                <td class="col04 text-small" data-title="posts">
                                    <div>
                                        <p>No Topics</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="col01" data-title="Forum">
                                    <div>
                                        <h4><a href="#">Technology</a></h4>
                                        <p>Keytar tacos bushwick, hexagon sartorial polaroid marfa biodi master cleanse blog swag iceland chambray poke.</p>
                                    </div>
                                </td>
                                <td class="col02 text-small" data-title="Topics"><span>1</span></td>
                                <td class="col03 text-small" data-title="posts"><span>15</span></td>
                                <td class="col04 text-small" data-title="posts">
                                    <div>
                                        <p><time datetime="2011-01-12">6 months ago</time></p>
                                        <p><a href="#" class="text-capitalize">Diane Cook</a></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="col01" data-title="Forum">
                                    <div>
                                        <h4><a href="#">Operating System</a></h4>
                                        <p>Cardigan small batch plaid artisan, blue bottle shabby chic try&shy;hard. </p>
                                    </div>
                                </td>
                                <td class="col02 text-small" data-title="Topics"><span>0</span></td>
                                <td class="col03 text-small" data-title="posts"><span>0</span></td>
                                <td class="col04 text-small" data-title="posts">
                                    <div>
                                        <p>No Topics</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="col01" data-title="Forum">
                                    <div>
                                        <h4><a href="#">Photoshop</a></h4>
                                        <p>mlkshk beard pug cold-pressed sartorial pour-over cred unicorn bushwick.</p>
                                    </div>
                                </td>
                                <td class="col02 text-small" data-Photoshop="Topics"><span>4</span></td>
                                <td class="col03 text-small" data-title="posts"><span>10</span></td>
                                <td class="col04 text-small" data-title="posts">
                                    <div>
                                        <p><time datetime="2011-01-12">7 months ago</time></p>
                                        <p><a href="#" class="text-capitalize">Diane Cook</a></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="col01" data-title="Forum">
                                    <div>
                                        <h4><a href="#">Mobile Computing</a></h4>
                                        <p>Tote bag mumblecore tumblr church-key austin kickstarter the, edison bulb viral leggings.</p>
                                    </div>
                                </td>
                                <td class="col02 text-small" data-Photoshop="Topics"><span>4</span></td>
                                <td class="col03 text-small" data-title="posts"><span>10</span></td>
                                <td class="col04 text-small" data-title="posts">
                                    <div>
                                        <p><time datetime="2011-01-12">7 months ago</time></p>
                                        <p><a href="#" class="text-capitalize">Student</a></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="col01" data-title="Forum">
                                    <div>
                                        <h4><a href="#">Software Testing</a></h4>
                                        <p>A Flannel subway tile fam tilde brunch, cliche franzen hell of. Cronut pitchfork quinoa s wind energy continues. </p>
                                    </div>
                                </td>
                                <td class="col02 text-small" data-title="Topics"><span>0</span></td>
                                <td class="col03 text-small" data-title="posts"><span>0</span></td>
                                <td class="col04 text-small" data-title="posts">
                                    <div>
                                        <p>No Topics</p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        
        </div>
    </div>
</main>
@endsection
