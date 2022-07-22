@extends('layouts.user')
@section('title', 'My Pool')
@section('content')

    <main>
        <div class="container-fluid p-4 text-white sdfjsdkfn">
            <div class="row">
                <div class="col-lg-3 d-none d-lg-block">
                    @include('components/trendingfeeds')
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
                                                                    <button class="asunht56 " onclick="userdetail('{{ $value['id'] }}')">{{ $value['joined'] }}
                                                                        Users</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5 mt-4 w-90 pb-3">
                                                            <div class="okiuj456">
                                                                <a href="{{ url('view-detail',$value['ucid']) }}" class="hjytg458">+View Detail</a>
                                                                @if ($value['pool_type']==0)
                                                                    <a class="ahjl458" href="{{url('/invite/'.$value['id'])}}">
                                                            <i class="fa fa-user-plus dcs445" aria-hidden="true"></i>
                                                        </a>    
                                                                @endif
                                                                

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
                                                                    <button class="asunht56" onclick="userdetail('{{ $value['id'] }}')">{{ $value['joined'] }}
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
                                                @if (!empty($completeDate->starting_at))
                                               
                                                <p>
                                                    BEFORE - {{ date('d M Y', strtotime($completeDate->ending_at)) }} </p>
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
                                                                    <button class="asunht56" onclick="userdetail('{{ $value['id'] }}')">{{ $value['joined'] }}
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
                @include('components/managers')
            </div>
        </div>
    </main>
@endsection
