@extends('layouts.user')
@section('title', 'My Pool')
@section('content')

    <main>
        <div class="container-fluid p-4 text-white sdfjsdkfn">
            <div class="row">
                <div class="col-lg-3 d-none d-lg-block">
                    <div class="jhdfjkh">
                        <h4 class="mt-3 ksdxjj878">Trending Feeds</h4>
                        <h6 class="mt-3 kjhmn90">NestleVera</h6>
                        <p class="sjdhd89">
                            There are many variations of passages of Lorem Ipsum
                            available,but the majority have suffered alteration.
                        </p>
                        <a class="jsdhjkshd78" href="">2 Comment</a>
                        <a class="bjui67" href="">Share</a>
                        <hr />
                        <h6 class="sdhsdbhjk87">NestleVera</h6>
                        <p class="sjdhd89">
                            There are many variations of passages of Lorem Ipsum
                            available,but the majority have suffered alteration.
                        </p>
                        <a class="aksdjd89787" href="">2 Comment</a>
                        <a class="bjui67" href="">Share</a>
                        <hr />
                        <h6 class="sdhsdbhjk87">NestleVera</h6>
                        <p class="sjdhd89">
                            There are many variations of passages of Lorem Ipsum
                            available,but the majority have suffered alteration.
                        </p>
                        <a class="aksdjd89787" href="">2 Comment</a>
                        <a class="bjui67" href="">Share</a>
                        <hr />
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
                        <div class="dashboard-tab new-dash-tab">
                            <ul class="nav nav-pills mb-3" id="pools-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="public-tab" data-bs-toggle="pill"
                                        data-bs-target="#public-home" type="button" role="tab" aria-controls="public-home"
                                        aria-selected="true">
                                        Upcoming
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link private-11" id="live-tab" data-bs-toggle="pill"
                                        data-bs-target="#public-live" type="button" role="tab"
                                        aria-controls="public-home-live" aria-selected="true">
                                        Live
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link private-1" id="private-tab" data-bs-toggle="pill"
                                        data-bs-target="#private1" type="button" role="tab" aria-controls="private1"
                                        aria-selected="false">
                                        Completed
                                    </button>
                                </li>
                            </ul>

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="public-home" role="tabpanel"
                                    aria-labelledby="public-tab">
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <div class="dash-tab">
                                                @if (!empty($upcomingDate['starting_at']))
                                                    <h5>Open Pools of this Game Week 13M-19M2021</h5>
                                                    <p>{{ date('d M Y', strtotime($upcomingDate['starting_at'])) }} -
                                                        {{ date('d M Y', strtotime($upcomingDate['ending_at'])) }}</p>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="col-sm-3 pb-2">
                                            <div class="text-center">
                                                <a href="{{ url('create-pool') }}" class="btn-01">+ Create
                                                    Pool</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dash-data">

                                        @if (count($upcomingPool) != 0)
                                            @foreach ($upcomingPool as $key => $value)
                                                <div class="mkpiuh">
                                                    <div class="row">
                                                        <div class="col-sm-7 mt-3">
                                                            <div class="lkpoioubn">
                                                                <div>
                                                                    <h6>{{ $value['pool_name'] }}</h6>
                                                                    <p class="yhji2365">Entry Amount <img
                                                                            src="{{ asset('public/assets/image/coin-img.png') }}"
                                                                            width="20" class="img-fluid" alt="">
                                                                        {{ $value['entry_fees'] }}</p>
                                                                </div>
                                                                <div class="jhgyu56">
                                                                    <button class="asunht56">{{ $value['joined'] }}
                                                                        Users</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5 mt-4 w-90 pb-3">
                                                            <div class="okiuj456">
                                                                <a href="{{ url('view-detail',$value['ucid']) }}" class="hjytg458">+View Detail</a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="tab-pane fade" id="private" role="tabpanel"
                                                aria-labelledby="private-tab">
                                                <h5 class="sdksdjdj">No Record</h5>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="public-live" role="tabpanel" aria-labelledby="live-tab">
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <div class="dash-tab">
                                                @if (!empty($currentDate['starting_at']))

                                                <h5>Open Pools of this Game Week 13M-19M2021</h5>
                                                <p>{{ date('d M Y', strtotime($currentDate['starting_at'])) }} -
                                                    {{ date('d M Y', strtotime($currentDate['ending_at'])) }}</p>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-3 pb-2">
                                            <div class="text-center">
                                                <a href="{{ url('create-pool') }}" class="btn-01">+ Create
                                                    Pool</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dash-data">

                                        @if (count($livePool) != 0)
                                            @foreach ($livePool as $key => $value)
                                                {{-- {{prr($value['pool_name']."ereerwr");}} --}}
                                                <div class="mkpiuh">
                                                    <div class="row">
                                                        <div class="col-sm-7 mt-3">
                                                            <div class="lkpoioubn">
                                                                <div>
                                                                    <h6>{{ $value['pool_name'] }}</h6>
                                                                    <p class="yhji2365">Entry Amount <img
                                                                            src="{{ asset('public/assets/image/coin-img.png') }}"
                                                                            width="20" class="img-fluid" alt="">
                                                                        {{ $value['entry_fees'] }}</p>
                                                                </div>
                                                                <div class="jhgyu56">
                                                                    <button class="asunht56">{{ $value['joined'] }}
                                                                        Users</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5 mt-4 w-90 pb-3">
                                                            <div class="okiuj456">
                                                                <a href="{{ url('view-detail',$value['id']) }}" class="hjytg458">+View Detail</a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            {{-- <div class="tab-pane fade" id="private" role="tabpanel"
                                            aria-labelledby="private-tab"> --}}
                                            <h5 class="sdksdjdj">No Record</h5>
                                            {{-- </div> --}}
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="private1" role="tabpanel" aria-labelledby="private-tab">
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <div class="dash-tab">
                                                <h5>Open Pools of this Game Week 13M-19M2021</h5>
                                                <p>13th March 2021 - 19th March 2021 GAMEWEEK</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 pb-2">
                                            <div class="text-center">
                                                <a href="{{ url('create-pool') }}" class="btn-01">+ Create
                                                    Pool</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dash-data">
                                        @if (count($completePool) != 0)
                                            @foreach ($completePool as $key => $value)
                                                <div class="mkpiuh">
                                                    <div class="row">
                                                        <div class="col-sm-7 mt-3">
                                                            <div class="lkpoioubn">
                                                                <div>
                                                                    <h6>{{ $value['pool_name'] }}</h6>
                                                                    <p class="yhji2365">Entry Amount <img
                                                                            src="{{ asset('public/assets/image/coin-img.png') }}"
                                                                            width="20" class="img-fluid" alt="">
                                                                        {{ $value['entry_fees'] }}</p>
                                                                </div>
                                                                <div class="jhgyu56">
                                                                    <button class="asunht56">{{ $value['joined'] }}
                                                                        Users</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5 mt-4 w-90 pb-3">
                                                            <div class="okiuj456">
                                                                <a href="{{ url('view-detail',$value['id']) }}" class="hjytg458">+View Detail</a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            {{-- <div class="tab-pane fade" id="private" role="tabpanel"
                                            aria-labelledby="private-tab"> --}}
                                            <h5 class="sdksdjdj">No Record</h5>
                                            {{-- </div> --}}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3  mt-3 d-none d-lg-block">
                    <div class="bgcxhdb78">

                        <div class="managers-tab">
                            <ul class="nav nav-pills mb-3" id="magers-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="manger-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#manger-home" type="button" role="tab" aria-controls="manger-home"
                                        aria-selected="true">Manager's</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link private-1" id="player-tab" data-bs-toggle="pill"
                                        data-bs-target="#player-tab1" type="button" role="tab" aria-controls="player-tab1"
                                        aria-selected="false">Top Players</button>
                                </li>

                            </ul>

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="manger-home" role="tabpanel"
                                    aria-labelledby="manger-home-tab">
                                    <div class="hsdhsd">
                                        {{-- <div class="sdkdj">
                                            <div class="user-details">
                                                <div class="sdksdlk"><img
                                                        src="{{ asset('public/assets/image/Rectangle 312.png') }}"></div>
                                                <div class="sdkjsdj">
                                                    <h5>Tammy Abraham</h5>
                                                </div>
                                            </div>


                                            <div class="user-invite">
                                                <a class="sjsdjk78" href=""><i class="fa fa-user-plus sdjkdjkd"
                                                        aria-hidden="true"></i> Invite</a>
                                            </div>
                                        </div>
                                        <div class="sdkdj">
                                            <div class="user-details">
                                                <div class="sdksdlk"><img
                                                        src="{{ asset('public/assets/image/Rectangle 312.png') }}"></div>
                                                <div class="sdkjsdj">
                                                    <h5>Tammy Abraham</h5>
                                                </div>
                                            </div>


                                            <div class="user-invite">
                                                <a class="sjsdjk78" href=""><i class="fa fa-user-plus sdjkdjkd"
                                                        aria-hidden="true"></i> Invite</a>
                                            </div>
                                        </div>
                                        <div class="sdkdj">
                                            <div class="user-details">
                                                <div class="sdksdlk"><img
                                                        src="{{ asset('public/assets/image/Rectangle 312.png') }}"></div>
                                                <div class="sdkjsdj">
                                                    <h5>Tammy Abraham</h5>
                                                </div>
                                            </div>


                                            <div class="user-invite">
                                                <a class="sjsdjk78" href=""><i class="fa fa-user-plus sdjkdjkd"
                                                        aria-hidden="true"></i> Invite</a>
                                            </div>
                                        </div>
                                        <div class="sdkdj">
                                            <div class="user-details">
                                                <div class="sdksdlk"><img
                                                        src="{{ asset('public/assets/image/Rectangle 312.png') }}"></div>
                                                <div class="sdkjsdj">
                                                    <h5>Tammy Abraham</h5>
                                                </div>
                                            </div>


                                            <div class="user-invite">
                                                <a class="sjsdjk78" href=""><i class="fa fa-user-plus sdjkdjkd"
                                                        aria-hidden="true"></i> Invite</a>
                                            </div>
                                        </div>
                                        <div class="sdkdj">
                                            <div class="user-details">
                                                <div class="sdksdlk"><img
                                                        src="{{ asset('public/assets/image/Rectangle 312.png') }}"></div>
                                                <div class="sdkjsdj">
                                                    <h5>Tammy Abraham</h5>
                                                </div>
                                            </div>


                                            <div class="user-invite">
                                                <a class="sjsdjk78" href=""><i class="fa fa-user-plus sdjkdjkd"
                                                        aria-hidden="true"></i> Invite</a>
                                            </div>
                                        </div> --}}

                                        @foreach($user as $key => $value)
                                        <div class="sdkdj">
                                            <div class="user-details">
                                                <div class="sdksdlk"><img
                                                        src="{{ asset('public/assets/image/Rectangle 312.png') }}"></div>
                                                <div class="sdkjsdj">
                                                    <h5>{{ $value->user_name }}</h5>
                                                </div>
                                            </div>


                                            <div class="user-invite">
                                                <a class="sjsdjk78" href=""><i class="fa fa-user-plus sdjkdjkd"
                                                        aria-hidden="true"></i> Invite</a>
                                            </div>
                                        </div>
                                            
                                        @endforeach
                                        



                                    </div>


                                </div>
                                <div class="tab-pane fade" id="player-tab1" role="tabpanel" aria-labelledby="player-tab">
                                    <div class="sdbndbnuj">
                                        <h4 class="mt-3 jsdfndf6">Top Players by Gameweek</h4>
                                        <div class="sdnnsk7">
                                            <div class="sdjdj78" onclick="ShowAndHide()">
                                                <div class="sdkdfj89">
                                                    <div class="sdjdk0"><img
                                                            src="{{ asset('public/assets/image/Rectangle 312.png') }}">
                                                    </div>
                                                    <div class="askak76">
                                                        <h5>Tammy Abraham</h5>
                                                        <p> 5.25 Million</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="SectionName" style="display:none">
                                                <div class="sdksks78">
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Appearances</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>63</p>
                                                        </div>
                                                    </div>
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Goals</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>19</p>
                                                        </div>
                                                    </div>
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Assists</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>04</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="jksdksdjdj">
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Total Points</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>145</p>
                                                        </div>
                                                    </div>
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Bought</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>45</p>
                                                        </div>
                                                    </div>
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Sold</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>78</p>
                                                        </div>
                                                    </div>
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>GMW</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>35+4 point</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        <div class="sdnnsk7">
                                            <div class="sdjdj78" onclick="ShowAndHide()">
                                                <div class="sdkdfj89">
                                                    <div class="sdjdk0"><img
                                                            src="{{ asset('public/assets/image/Rectangle 312.png') }}">
                                                    </div>
                                                    <div class="askak76">
                                                        <h5>Tammy Abraham</h5>
                                                        <p> 5.25 Million</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="SectionName" style="display:none">
                                                <div class="sdksks78">
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Appearances</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>63</p>
                                                        </div>
                                                    </div>
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Goals</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>19</p>
                                                        </div>
                                                    </div>
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Assists</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>04</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="jksdksdjdj">
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Total Points</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>145</p>
                                                        </div>
                                                    </div>
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Bought</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>45</p>
                                                        </div>
                                                    </div>
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Sold</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>78</p>
                                                        </div>
                                                    </div>
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>GMW</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>35+4 point</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        <div class="sdnnsk7">
                                            <div class="sdjdj78" onclick="ShowAndHide()">
                                                <div class="sdkdfj89">
                                                    <div class="sdjdk0"><img
                                                            src="{{ asset('public/assets/image/Rectangle 312.png') }}">
                                                    </div>
                                                    <div class="askak76">
                                                        <h5>Tammy Abraham</h5>
                                                        <p> 5.25 Million</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="SectionName" style="display:none">
                                                <div class="sdksks78">
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Appearances</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>63</p>
                                                        </div>
                                                    </div>
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Goals</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>19</p>
                                                        </div>
                                                    </div>
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Assists</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>04</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="jksdksdjdj">
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Total Points</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>145</p>
                                                        </div>
                                                    </div>
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Bought</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>45</p>
                                                        </div>
                                                    </div>
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Sold</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>78</p>
                                                        </div>
                                                    </div>
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>GMW</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>35+4 point</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        <div class="sdnnsk7">
                                            <div class="sdjdj78" onclick="ShowAndHide()">
                                                <div class="sdkdfj89">
                                                    <div class="sdjdk0"><img
                                                            src="{{ asset('public/assets/image/Rectangle 312.png') }}">
                                                    </div>
                                                    <div class="askak76">
                                                        <h5>Tammy Abraham</h5>
                                                        <p> 5.25 Million</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="SectionName" style="display:none">
                                                <div class="sdksks78">
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Appearances</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>63</p>
                                                        </div>
                                                    </div>
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Goals</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>19</p>
                                                        </div>
                                                    </div>
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Assists</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>04</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="jksdksdjdj">
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Total Points</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>145</p>
                                                        </div>
                                                    </div>
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Bought</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>45</p>
                                                        </div>
                                                    </div>
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Sold</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>78</p>
                                                        </div>
                                                    </div>
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>GMW</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>35+4 point</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        <div class="sdnnsk7">
                                            <div class="sdjdj78" onclick="ShowAndHide()">
                                                <div class="sdkdfj89">
                                                    <div class="sdjdk0"><img
                                                            src="{{ asset('public/assets/image/Rectangle 312.png') }}">
                                                    </div>
                                                    <div class="askak76">
                                                        <h5>Tammy Abraham</h5>
                                                        <p> 5.25 Million</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="SectionName" style="display:none">
                                                <div class="sdksks78">
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Appearances</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>63</p>
                                                        </div>
                                                    </div>
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Goals</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>19</p>
                                                        </div>
                                                    </div>
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Assists</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>04</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="jksdksdjdj">
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Total Points</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>145</p>
                                                        </div>
                                                    </div>
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Bought</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>45</p>
                                                        </div>
                                                    </div>
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Sold</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>78</p>
                                                        </div>
                                                    </div>
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>GMW</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>35+4 point</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        <div class="sdnnsk7">
                                            <div class="sdjdj78" onclick="ShowAndHide()">
                                                <div class="sdkdfj89">
                                                    <div class="sdjdk0"><img
                                                            src="{{ asset('public/assets/image/Rectangle 312.png') }}">
                                                    </div>
                                                    <div class="askak76">
                                                        <h5>Tammy Abraham</h5>
                                                        <p> 5.25 Million</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="SectionName" style="display:none">
                                                <div class="sdksks78">
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Appearances</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>63</p>
                                                        </div>
                                                    </div>
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Goals</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>19</p>
                                                        </div>
                                                    </div>
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Assists</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>04</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="jksdksdjdj">
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Total Points</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>145</p>
                                                        </div>
                                                    </div>
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Bought</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>45</p>
                                                        </div>
                                                    </div>
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Sold</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>78</p>
                                                        </div>
                                                    </div>
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>GMW</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>35+4 point</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        <div class="sdnnsk7">
                                            <div class="sdjdj78" onclick="ShowAndHide()">
                                                <div class="sdkdfj89">
                                                    <div class="sdjdk0"><img
                                                            src="{{ asset('public/assets/image/Rectangle 312.png') }}">
                                                    </div>
                                                    <div class="askak76">
                                                        <h5>Tammy Abraham</h5>
                                                        <p> 5.25 Million</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="SectionName" style="display:none">
                                                <div class="sdksks78">
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Appearances</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>63</p>
                                                        </div>
                                                    </div>
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Goals</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>19</p>
                                                        </div>
                                                    </div>
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Assists</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>04</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="jksdksdjdj">
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Total Points</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>145</p>
                                                        </div>
                                                    </div>
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Bought</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>45</p>
                                                        </div>
                                                    </div>
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>Sold</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>78</p>
                                                        </div>
                                                    </div>
                                                    <div class="jksdjkdod7889">
                                                        <div class="askak76">
                                                            <p>GMW</p>
                                                        </div>
                                                        <div class="asskk87">
                                                            <p>35+4 point</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>




                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
