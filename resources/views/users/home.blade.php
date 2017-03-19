@extends('layouts.app')


@section('content')


    @include('users.short-profile-home', ['user' => auth()->user()])

    <div class="fk">

        <ul class="ca bqe bqf agk">

            <li class="tu b ahx">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Message">
                    <div class="om">
                        <button type="button" class="cg pl">
                            <span class="h bbv"></span>
                        </button>
                    </div>
                </div>
            </li>


            @include('tweets._tweets')


        </ul>
    </div>
    <div class="fh">
        <div class="alert to alert-dismissible aye" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            <a class="tl" href="profile/index.html">Visit your profile!</a> Check your self, you aren't looking well.
        </div>

        <div class="rp agk aye">
            <div class="rq">
                <h6 class="agd">Sponsored</h6>
                <div data-grid="images" data-target-height="150"><img class="bqa" data-width="640" data-height="640"
                                                                      data-action="zoom"
                                                                      src="assets/img/instagram_2.jpg"
                                                                      style="width: 239px; height: 225px; margin-bottom: 10px; margin-right: 0px; display: inline-block; vertical-align: bottom;">
                </div>
                <p><strong>It might be time to visit Iceland.</strong> Iceland is so chill, and everything looks cool
                    here. Also, we heard the people are pretty nice. What are you waiting for?</p>
                <button class="cg pq pz">Buy a ticket</button>
            </div>
        </div>

        <div class="rp agk aye">
            <div class="rq">
                <h6 class="agd">Likes
                    <small>· <a href="#">View All</a></small>
                </h6>
                <ul class="bqe bqf">
                    <li class="tu afw">
                        <img class="bqa wp yy agc" src="assets/img/avatar-fat.jpg">
                        <div class="tv">
                            <strong>Jacob Thornton</strong> @fat
                            <div class="bqi">
                                <button class="cg pq pz">
                                    <span class="h azp"></span> Follow
                                </button>
                            </div>
                        </div>
                    </li>
                    <li class="tu">
                        <a class="brc" href="#">
                            <img class="bqa wp yy agc" src="assets/img/avatar-mdo.png">
                        </a>
                        <div class="tv">
                            <strong>Mark Otto</strong> @mdo
                            <div class="bqi">
                                <button class="cg pq pz">
                                    <span class="h azp"></span> Follow
                                </button>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="rw">
                Dave really likes these nerds, no one knows why though.
            </div>
        </div>

        <div class="rp bqu">
            <div class="rq">
                © 2015 Bootstrap
                <a href="#">About</a>
                <a href="#">Help</a>
                <a href="#">Terms</a>
                <a href="#">Privacy</a>
                <a href="#">Cookies</a>
                <a href="#">Ads </a>
                <a href="#">Info</a>
                <a href="#">Brand</a>
                <a href="#">Blog</a>
                <a href="#">Status</a>
                <a href="#">Apps</a>
                <a href="#">Jobs</a>
                <a href="#">Advertise</a>
            </div>
        </div>
    </div>

@endsection