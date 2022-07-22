@extends('layouts.user')
@section('title', 'Dashboard')
@section('content')
<main>
    <div class="container-fluid p-4 text-white sdjdjh">
        <div class="row">
        <div class="col-lg-6 mt-3 pool_data order-lg-2">

</div>
            <div class="col-lg-3 order-lg-1">
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

           @include('components/managers')
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content jsdhdgdtsb">
                <div class="modal-header mnhjityfg">
                    <h4 class="mjnhgt" id="PoolName"></h4>
                    {{-- <button class="nhbjkloui " id='pooltypebtn'>Private</button> --}}
                </div>
                <div class="modal-body text-white">
                    <div class=" text-center">
                        <p class="mjnhiok" id="JoinAmount"></p>
                        <p class="mjnhiok">Amount in Wallet : {{ $wallet }}</p>
                    </div>
                    <form class="hbngtdf" action="{{ route('home') }}" method="POST">
                        @csrf
                        <input type="hidden" name="join_pool_id" id="join_pool_id">
                        <input type="hidden" id="hiddenpooltype" name="hiddenpooltype">
                        <label class="labelhg " id="passLabel">Enter Password to join private
                            pool</label>
                        <div class=" text-center">
                            <input class="inputcolor jhtyu " type="password" id="joinPass" name="password" placeholder="Enter Password">
                           
                        </div>
                        <label class="nmhitf">Select Team</label>
                        <div class=" text-white  text-center">
                            <select class="inputcolor jhngyt" id="select_team" name="user_team_id" >
                                <option selected value="">Select Team</option>
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
