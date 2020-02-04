@extends('web.web_master')

@section('web_konten')
    <!--================================
        START BREADCRUMB AREA
    =================================-->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb">
                        <ul>
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li class="active">
                                <a href="#">Profile</a>
                            </li>
                        </ul>
                    </div>
                    <h1 class="page-title">Profile Anda</h1>
                </div>
                <!-- end /.col-md-12 -->
            </div>
            <!-- end /.row -->
        </div>
        <!-- end /.container -->
    </section>
    <!--================================
            END BREADCRUMB AREA
        =================================-->


    <section class="author-profile-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <aside class="sidebar sidebar_author">
                            <!-- end /.author-card -->

                            <div class="sidebar-card author-menu">

                                <div class="author-card sidebar-card">
                                    <div class="author-infos">
                                        <div class="author_avatar">
                                            <img src="{{ asset('assets/images/author-avatar.jpg') }}" alt="Presenting the broken author avatar :D">
                                        </div>

                                        <div class="author">
                                            <h4>{{ Auth::guard(Session::get('role'))->user()->username }}</h4>
                                            <p>Bergabung: {{ Auth::guard(Session::get('role'))->user()->created_at->format("d, M Y") }}</p>
                                        </div>
                                        <!-- end /.author -->

                                        <div class="author-badges">
                                            <ul>
                                                <li>
                                                    <a href="#" class="active">Profile</a>
                                                </li>
                                                <li>
                                                    <a href="author-items.html">Rekening</a>
                                                </li>
                                                <li>
                                                    <a href="author-reviews.html">Withdraw</a>
                                                </li>
                                                <li>
                                                    <a href="author-followers.html">Alamat</a>
                                                </li>
                                                <li>
                                                    <a href="author-following.html">Following (39)</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- end /.author-badges -->

                                        <div class="social social--color--filled">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <span class="fa fa-facebook"></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="fa fa-twitter"></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="fa fa-dribbble"></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- end /.social -->

                                        <div class="author-btn">
                                            <a href="#" class="btn btn--md btn--round">Follow</a>
                                        </div>
                                        <!-- end /.author-btn -->
                                    </div>
                                    <!-- end /.author-infos -->


                                </div>
                            </div>
                            <!-- end /.author-menu -->

                            <!-- end /.author-card -->

                            <!-- end /.freelance-status -->
                        </aside>
                    </div>
                    <!-- end /.sidebar -->

                    <div class="col-lg-8 col-md-12">
                        <div class="row">

                            <div class="col-md-12 col-sm-12">
{{--                                <div class="author_module">--}}
{{--                                    <img src="images/authcvr.jpg" alt="author image">--}}
{{--                                </div>--}}

                                <div class="author_module about_author">
                                    @include('web.profile.profile')
                                </div>
                            </div>
                        </div>
                        <!-- end /.row -->

                    </div>
                    <!-- end /.col-md-8 -->

                </div>
                <!-- end /.row -->
            </div>
            <!-- end /.container -->
        </section>

@endsection