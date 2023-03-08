@extends('layout.temp')
@section('profile')
<section>
    <div class="gap2 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row merged20" id="page-contents">
                        <div class="col-lg-9">
                            <div class="featured-baner mate-black low-opacity">
                                @php
                                    $baner = explode('/',$subreddit->image);
                                @endphp
                                <img src="{{asset('storage/'.$baner[1])}}" alt="">
                                <h3>{{$subreddit->name}}</h3>
                            </div>
                            <div class="central-meta">
                                <div class="about">
                                    <div class="d-flex flex-row mt-2">
                                        <ul class="nav nav-tabs nav-tabs--vertical nav-tabs--left" >
                                            <li class="nav-item">
                                                <a href="#gen-setting" class="nav-link active" data-toggle="tab" ><i class="fa fa-user"></i>Moderators</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#edit-profile" class="nav-link" data-toggle="tab" ><i class="fa fa-ban"></i> Banned users</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#notifi" class="nav-link" data-toggle="tab" ><i class="fa fa-bell"></i> Notification</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#messages" class="nav-link" data-toggle="tab" ><i class="fa fa-comment"></i> Messages</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#weather" class="nav-link" data-toggle="tab" ><i class="fa fa-cloud"></i> Weather Setting</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#page-manage" class="nav-link" data-toggle="tab" ><i class="fa fa-pencil-square-o"></i>Widgets Setting</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#privacy" class="nav-link" data-toggle="tab"  ><i class="fa fa-shield"></i> Privacy & Data</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#security" class="nav-link" data-toggle="tab" ><i class="fa fa-lock"></i> Security</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#apps" class="nav-link" data-toggle="tab" ><i class="fa fa-th"></i> Apps</a>
                                            </li>
                                        </ul>
                                        @livewire('live-subsettings',['subreddit'=>$subreddit])
                                    </div>
                                </div>
                            </div>
                        </div><!-- centerl meta -->
                        <div class="col-lg-3">
                            <aside class="sidebar static right">
                                <div class="friend-box" >
                                    <figure>
                                        @php
                                            $baner = explode('/',$subreddit->image);
                                        @endphp
                                        <img alt="" src="{{asset('storage/'.$baner[0])}}">
                                        <span>{{$subreddit->users->count()}}</span>
                                    </figure>
                                    <div class="frnd-meta" >
                                        <img alt="" src="images/resources/frnd-figure3.jpg">
                                        <div style="display:flex;justify-content:center;">
                                            <h5><a title="" href="/subreddit/{{$subreddit->id}}" style="color:white;">{{$subreddit->name}}</a></h5>
                                        </div>
                                    </div>
                                    <div style="display:flex;justify-content:center;">
                                    <b>About this community</b>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
