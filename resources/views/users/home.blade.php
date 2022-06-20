@extends('layouts.user')
@section('title', 'Dashboard')
@section('content')
<main>
    <div class="container-fluid p-4 text-white sdjdjh">
        <div class="row">
        <div class="col-lg-6 mt-3 pool_data order-lg-2">

</div>
            <div class="col-lg-3 order-lg-1">
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

            <div class="col-lg-3  mt-3 d-none d-lg-block order-lg-3">
                <div class="bgcxhdb78">

                    <div class="managers-tab">
                        <ul class="nav nav-pills mb-3" id="magers-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="manger-home-tab" data-bs-toggle="pill" data-bs-target="#manger-home" type="button" role="tab" aria-controls="manger-home" aria-selected="true">Manager's</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link private-1" id="player-tab" data-bs-toggle="pill" data-bs-target="#player-tab1" type="button" role="tab" aria-controls="player-tab1" aria-selected="false">Top Players</button>
                            </li>

                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="manger-home" role="tabpanel" aria-labelledby="manger-home-tab">
                                <div class="hsdhsd">
                                    @foreach($user as $key => $value)
                                    <div class="sdkdj">
                                        <div class="user-details">
                                            <div class="sdksdlk"><img src="{{ asset('public/assets/image/Rectangle 312.png') }}"></div>
                                            <div class="sdkjsdj">
                                                <h5>{{ $value->user_name }}</h5>
                                            </div>
                                        </div>


                                        <div class="user-invite">
                                            <a class="sjsdjk78" href="#invitemodal" data-bs-toggle="modal"><i class="fa fa-user-plus sdjkdjkd" aria-hidden="true"></i> Invite</a>
                                        </div>
                                    </div>
                                        
                                    @endforeach
                                    



                                </div>


                            </div>
                            @include('element/users/topplayers') 

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content jsdhdgdtsb">
                <div class="modal-header mnhjityfg">
                    <h4 class="mjnhgt">Big Blues Pool Public</h4>
                    <button class="nhbjkloui " id='pooltypebtn'>Private</button>
                </div>
                <div class="modal-body text-white">
                    <div class=" text-center">
                        <p class="mjnhiok">Amount to join : All Star Coins 20</p>
                        <p class="mjnhiok">Amount in Wallet : All Star Coins 30</p>
                    </div>
                    <form class="hbngtdf" action="{{ route('home') }}" method="POST">
                        @csrf
                        <input type="hidden" name="join_pool_id" id="join_pool_id">
                        <label class="labelhg " id="passLabel">Enter Password to join private
                            pool</label>
                        <div class=" text-center">
                            <input class="inputcolor jhtyu " type="password" id="joinPass" name="password" placeholder="Enter Password">
                        </div>
                        <label class="nmhitf">Select Team</label>
                        <div class=" text-white  text-center">
                            <select class="inputcolor jhngyt" id="select_team" name="select_team">
                                <option class="nhbgyuhd">Select Team</option>
                                @foreach($team as $key => $value)
                                <option class="nhbgyuhd" value="{{ $value->id }}">{{ $value->name }}</option>

                                @endforeach
                            </select>

                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit" class=" btn-default1 mt-4">Pay Now to Join</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->

    
</main>
<div class="modal fade" id="invitemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Please select your pool to share</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="modal-in">
            <form action="">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Email">
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Select Public or Private</option>
                                <option value="Public Pool">Public Pool</option>
                                <option value="Private Pool">Private Pool</option>
                                
                              </select>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>

                    </div>

                </div>
              
            </form>
        </div>
       
        </div>
      
      </div>
    </div>
  </div>
<script src="{{asset('public/assets/js/jquery-3.5.1.min.js')}}"></script>
<script>
    $(document).ready(function() {


        fetchData("Search");

        function fetchData(data, type = null) {
            $.ajax({
                url: "home"
                , method: "GET"
                , data: {
                    'searchData': data
                    , 'type': type
                }
                , success: function(result) {
                    $(".pool_data").html(result);
                }
            });
        }

        $("body").on('keyup', "#public_pool", function(e) {
            if (e.key === 'Enter' || e.keyCode === 13) {
                searchData = $("#public_pool").val();
                if (!searchData) {
                    searchData = 'Search'
                }
                fetchData(searchData, "public");
            }
        })

        $("body").on('keyup', "#private_pool", function(e) {
            if (e.key === 'Enter' || e.keyCode === 13) {
                searchData = $("#private_pool").val();
                if (!searchData) {
                    searchData = 'Search'
                }
                fetchData(searchData, "private");
            }
        })

        $("body").on('click', '#public_search', function() {
            searchData = $("#public_pool").val();
            if (!searchData) {
                searchData = 'Search'
            }
            fetchData(searchData, "public");
        })

        $("body").on('click', '#private_search', function() {
            searchData = $("#private_pool").val();
            if (!searchData) {
                searchData = 'Search'
            }
            $("#public_pool").val("Search");
            fetchData(searchData, "private");
        })
    })

</script>
@endsection
