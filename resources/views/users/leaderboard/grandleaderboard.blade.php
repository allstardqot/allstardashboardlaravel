@extends('layouts.user')
@section('title', 'Leaderboard')
@section('content')
    <main>
        <div class="container-fluid p-4 text-white sdhdfksk">
            <div class="row">
                <div class="col-lg-3">
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
                        <div class="dashboard-tab">
                            <ul class="nav nav-pills mb-3" id="pools-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="public-tab" data-bs-toggle="pill"
                                        data-bs-target="#public-home" type="button" role="tab" aria-controls="public-home"
                                        aria-selected="true">
                                        Leaderboard
                                    </button>
                                </li>
                                
                            </ul>

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="public-home" role="tabpanel"
                                    aria-labelledby="public-tab">
                                    {{-- <div class="jdfhuyein">
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
                                    </div> --}}
                                    <div class="row">
                                        <div class="col-sm-12 mt-4">
                                            <table class="hdtdusjk">
                                                <tbody>
                                                    <tr>
                                                        <th class="bhytg">Rank</th>
                                                        <th>Username</th>
                                                        <th class="shdghsdg">Fantasy Points</th>
                                                    </tr>
                                                    @foreach ($userTeam as $key=>$userData)
                                                    <tr>
                                                        <td>{{$userData['grand_leaderboard_rank']}}</td>
                                                        <td>{{$userData['user_name']}}</td>
                                                        <td>{{$userData['total_points']}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="d-felx justify-content-center">
                                            {!! $userTeam->links() !!}  
                                        </div>
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
