@extends('layouts.user')
@section('title', 'Leaderboard')
@section('content')
    <main>
        <div class="container-fluid p-4 text-white sdhdfksk">
            <div class="row">
                <div class="col-lg-3">
                    <div class="htavb">
                        <h4 class="mt-3 mkuytg">Trending Feeds</h4>
                        <div class="news-col-content">
                            @foreach ($trending as $key => $value)
                                    {!! $value->description !!}
                                    <div class="like_share">
                                        <a class="hyujh45" href="#">{{ $value->comment }} Comment</a>
                                        <a class="jkyts778" href="#">Share</a>
                                    </div>
                                    <hr />
                                @endforeach
                        </div>
                    </div>

                    <div class="hjuy4589">
                        <h4 class="mt-5 mkuytg">Premier League News</h4>
                        <div class="latest-image-sec">
                            @foreach($newsdata as $key => $value)
                            <div class="latest-card">
                                <a href="{{ url('/latest-news') }}" class="latest-anchor">
                                    <div class="news-content">
                                        <h4>{{ $value['title'] }}</h4>
                                    <p>{!! $value['localteam']!!}</p>
    
                                    <small>Read More..</small>
                                    </div>
    
                                </a>
                            </div>
                            @endforeach
                        </div>
    
                    </div>
                </div>
                <div class="col-lg-6 mt-3">
                    <div class="njkas985">
                        <div class="dashboard-tab">
                            <ul class="nav nav-pills mb-3" id="pools-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="public-tab" data-bs-toggle="pill"
                                        data-bs-target="#public-home" type="button" role="tab" aria-controls="public-home"
                                        aria-selected="true">
                                        Leaderboard
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link private-1" id="private-tab" data-bs-toggle="pill"
                                        data-bs-target="#private" type="button" role="tab" aria-controls="private"
                                        aria-selected="false">
                                        My Team
                                    </button>
                                </li>
                            </ul>

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="public-home" role="tabpanel"
                                    aria-labelledby="public-tab">
                                    <div class="jdfhuyein">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="gstsbdkiuy">
                                                    <div class="hsdytg">
                                                        <h6>{{!empty($result['pull_name'])?$result['pull_name']:'';}}</h6>
                                                    </div>
                                                    <div class="nhgtyuijn">
                                                        <button class="sjdhjsdh">{{!empty($result['joined'])?$result['joined']:'';}} Users</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 mt-4">
                                            <table class="hdtdusjk">
                                                <tbody>
                                                    <tr>
                                                        <th class="bhytg">Rank</th>
                                                        <th>Username</th>
                                                        <th class="shdghsdg">Fantesy Points</th>
                                                    </tr>
                                                    @foreach ($leaderboardData as $key=>$userData)
                                                    <tr>
                                                        <td>{{$userData['rank']}}</td>
                                                        <td>{{$userData['user_name']}}</td>
                                                        <td>{{$userData['total_points']}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="private" role="tabpanel" aria-labelledby="private-tab">
                                    <div class="row justify-content-center">
                                        <div class="col-md-8">
                                            <div class="mypoint">
                                                <div class="my-point-head">
                                                    <h4>{{isset($result['team_name'])?$result['team_name']:''}}</h4>
                                                    <a href="{{ route('edit-team',$userTeam['id'])  }}" class="btn btn-danger">Edit Team</a>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                        @php
                                                                $total_fpoints=0;
                                                        @endphp
                                                        @foreach($result as $key => $data)    
                                                        @if(!isset($data['name']))
                                                            @continue;
                                                        @endif
                                                            <tr>
                                                                <td>
                                                                    <h5>{{$data['name']}}</h5>
                                                                    <div class="player-name">
                                                                        <img src="{{ asset('public/assets/image/Rectangle 276.png') }}"
                                                                            alt="" class="img-fluid" width="30"
                                                                            height="30" />
                                                                            @if($result['captain_id']==$data['id'])
                                                                                <img src="{{url('public/assets/image/c_captain.png')}}" class="float-end img-fluid" style="margin-right:6%">
                                                                                @endif
                                                                        <span>{{$data['fullname']}}</span>
                                                                    </div>
                                                                </td>
                                                                <td class="points-text">
                                                                    <small>Points :{{$data['total_points']}}</small>
                                                                </td>
                                                            </tr>
                                                            @php
                                                                $total_fpoints+=$data['total_points'];
                                                            @endphp
                                                            @endforeach
                                                            
                                                        </tbody>
                                                    </table>
                                                 @php 
                                                    
                                                 @endphp
                                                    <div class="fantacy-point">
                                                        <h3>Fantasy Point <strong> ${{$total_fpoints}}</strong></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mt-3">
                    <div class="bgcxhdb78">
                        <div class="managers-tab">
                            <ul class="nav nav-pills mb-3" id="magers-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="manger-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#manger-home" type="button" role="tab" aria-controls="manger-home"
                                        aria-selected="true">
                                        Managers
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link private-1" id="player-tab" data-bs-toggle="pill"
                                        data-bs-target="#player-tab1" type="button" role="tab" aria-controls="player-tab1"
                                        aria-selected="false">
                                        Top Players
                                    </button>
                                </li>
                            </ul>

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade active show" id="manger-home" role="tabpanel"
                                    aria-labelledby="manger-home-tab">
                                    <div class="hsdhsd">
                                        <div class="sdkdj">
                                            <div class="sdksdlk">
                                                <img src="{{ asset('public/assets/image/Rectangle 312.png') }}" />
                                            </div>
                                            <div class="sdkjsdj">
                                                <h5>Tammy Abraham</h5>
                                            </div>
                                        </div>
                                        {{-- <div class="sdlsdjk">
                                            <div class="sdj8678">
                                                <p class="sdjdcj89"><b>Email:</b></p>
                                            </div>
                                            <div class="sdjjsh7">
                                                <a class="sdjsjuy" href="#">fantasyallstars@gmail.com</a>
                                            </div>
                                        </div> --}}
                                        
                                        <a class="sjsdjk78" href=""><i class="fa fa-user-plus sdjkdjkd"
                                                aria-hidden="true"></i></a>
                                        <hr />
                                    </div>
                                    <div class="hsdhsd">
                                        <div class="sdkdj">
                                            <div class="sdksdlk">
                                                <img src="{{ asset('public/assets/image/Rectangle 312.png') }}" />
                                            </div>
                                            <div class="sdkjsdj">
                                                <h5>Tammy Abraham</h5>
                                            </div>
                                        </div>
                                        
                                        <a class="sjsdjk78" href=""><i class="fa fa-user-plus sdjkdjkd"
                                                aria-hidden="true"></i></a>
                                        <hr />
                                    </div>
                                    <div class="hsdhsd">
                                        <div class="sdkdj">
                                            <div class="sdksdlk">
                                                <img src="{{ asset('public/assets/image/Rectangle 312.png') }}" />
                                            </div>
                                            <div class="sdkjsdj">
                                                <h5>Tammy Abraham</h5>
                                            </div>
                                        </div>
                                        
                                        <a class="sjsdjk78" href=""><i class="fa fa-user-plus sdjkdjkd"
                                                aria-hidden="true"></i></a>
                                        <hr />
                                    </div>
                                    <div class="hsdhsd">
                                        <div class="sdkdj">
                                            <div class="sdksdlk">
                                                <img src="{{ asset('public/assets/image/Rectangle 312.png') }}" />
                                            </div>
                                            <div class="sdkjsdj">
                                                <h5>Tammy Abraham</h5>
                                            </div>
                                        </div>
                                        
                                        <a class="sjsdjk78" href=""><i class="fa fa-user-plus sdjkdjkd"
                                                aria-hidden="true"></i></a>
                                        <hr />
                                    </div>
                                    <div class="hsdhsd">
                                        <div class="sdkdj">
                                            <div class="sdksdlk">
                                                <img src="{{ asset('public/assets/image/Rectangle 312.png') }}" />
                                            </div>
                                            <div class="sdkjsdj">
                                                <h5>Tammy Abraham</h5>
                                            </div>
                                        </div>
                                        
                                        <a class="sjsdjk78" href=""><i class="fa fa-user-plus sdjkdjkd"
                                                aria-hidden="true"></i></a>
                                        <hr />
                                    </div>
                                    <div class="hsdhsd">
                                        <div class="sdkdj">
                                            <div class="sdksdlk">
                                                <img src="{{ asset('public/assets/image/Rectangle 312.png') }}" />
                                            </div>
                                            <div class="sdkjsdj">
                                                <h5>Tammy Abraham</h5>
                                            </div>
                                        </div>
                                        
                                        <a class="sjsdjk78" href=""><i class="fa fa-user-plus sdjkdjkd"
                                                aria-hidden="true"></i></a>
                                        <hr />
                                    </div>
                                </div>
                                @include('element/users/topplayers') 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
