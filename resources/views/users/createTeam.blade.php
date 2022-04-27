@extends('layouts.user')
@section('title', 'My Team')
@section('content')

    <style type="text/css">
        @import url("https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap");

        body {
            background-color: #12133d;
        }

        .progress-bar.d-none.d-md-block {
            background: none;
        }

        .container {
            background: #2a2b50;
            text-align: center;
            border-radius: 10px;
            color: #fff;
            margin-top: 5%;
        }

        .container header {
            font-size: 35px;
            font-weight: 600;
            margin: 0 0 30px 0;
        }

        .container .form-outer {
            width: 100%;
            overflow: hidden;
        }

        .container .form-outer form {
            display: flex;
            width: 400%;
        }

        .form-outer form .page {
            width: 25%;
            transition: margin-left 0.3s ease-in-out;
        }

        .form-outer form .page .title {
            text-align: left;
            font-size: 25px;
            font-weight: 500;
        }

        .field {
            width: 100%;
            height: 45px;
            margin: 45px 0;
            display: flex;
            position: relative;
            justify-content: space-between;
        }

        .field .label {
            position: absolute;
            top: -30px;
            font-weight: 500;
        }

        .field input {
            height: 100%;
            width: 100%;
            border: 1px solid lightgrey;
            border-radius: 5px;
            padding-left: 15px;
            font-size: 18px;
        }

        .field select {
            width: 100%;
            padding-left: 10px;
            font-size: 17px;
            font-weight: 500;
        }

        .field a {
            width: 100%;
            height: calc(100% + 5px);
            border: none;
            background: #d33f8d;
            margin-top: -20px;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: 0.5s ease;
            line-height: 45px;
            max-width: 200px;
        }

        .field a:hover {
            background: #000;
        }

        .btns a {
            margin-top: -20px !important;
        }

        .btns button.prev {
            margin-right: 3px;
            font-size: 17px;
        }

        .btns button.next {
            margin-left: 3px;
        }

        .container .progress-bar {
            display: flex;
            margin: 40px 0;
            user-select: none;
        }

        .container .progress-bar .step {
            text-align: center;
            width: 100%;
            position: relative;
        }

        .container .progress-bar .step p {
            font-weight: 500;
            font-size: 18px;
            color: #000;
            margin-bottom: 8px;
        }

        .progress-bar .step .bullet {
            padding: 8px 40px;
            display: inline-block;
            border-radius: 30px;
            position: relative;
            transition: 0.2s;
            font-weight: 500;
            font-size: 17px;
            line-height: 25px;
            color: #fff;
            text-decoration: none;
            background-color: #923b26;
        }

        .progress-bar .step .bullet.active {
            border-color: #d43f8d;
            background: #ff5000;
        }

        .progress-bar .step .bullet span {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .progress-bar .step .bullet.active span {
            display: none;
        }

        .progress-bar .step .bullet.active:after {
            transform: scaleX(0);
            transform-origin: left;
            animation: animate 0.3s linear forwards;
        }

        .imgsize {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        @keyframes animate {
            100% {
                transform: scaleX(1);
            }
        }

        .progress-bar .step:last-child .bullet:before,
        .progress-bar .step:last-child .bullet:after {
            display: none;
            color: #fff;
        }

        .progress-bar .step p.active {
            color: #d43f8d;
            transition: 0.2s linear;
        }

        .progress-bar .step .check {
            position: absolute;
            left: 50%;
            top: 70%;
            font-size: 15px;
            transform: translate(-50%, -50%);
            display: none;
        }

        .progress-bar .step .check.active {
            display: block;
            color: #fff;
        }

        .firstNext {
            background-color: #ff5000 !important;
            border-radius: 30px !important;
            width: 30% !important;
            margin-left: 40% !important;
        }

        .firstNext1 {
            background-color: transparent !important;
            border-radius: 30px !important;
            width: 30% !important;
            border: 1px solid #ff5000 !important;
            color: #ff5000 !important;
        }

        .w3-blue,
        .w3-hover-blue:hover {
            color: #fff !important;
            background-color: #ff5000 !important;
            height: 5px;
        }

    </style>
    <main>
        @if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
    {{-- <button type="button" class="close" data-dismiss="alert">×</button>     --}}
    <strong>{{ $message }}</strong>
</div>
@endif
        <div id="manage_squad" style="display: none">
        </div>
        <div id="manage_squad2" style="display: none">
        </div>
        <div id="manage_squad3" style="display: none">
        </div>
        <div class="container jsdbdhsol" id="create_team_main">
            <div class="asdjd76">
                <header>Select Team Player</header>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="progress-bar sdjhsdhdhjk">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="create-team-nav nav-link active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                        aria-selected="true">
                                        Goalkeeper
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="create-team-nav nav-link" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                        aria-selected="false">
                                        Defenders
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="create-team-nav nav-link" id="contact-tab" data-bs-toggle="tab"
                                        data-bs-target="#contact" type="button" role="tab" aria-controls="contact"
                                        aria-selected="false">
                                        Midfielders
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="create-team-nav nav-link" id="contact-tab2" data-bs-toggle="tab"
                                        data-bs-target="#contact2" type="button" role="tab" aria-controls="contact2"
                                        aria-selected="false">
                                        Forward
                                    </button>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content" id="myTabContent">

                        </div>
                        <div class="field">
                            <a href="#" class="firstNext1 next" id="BackBtn">back </a>
                            <a href="#" class="firstNext next" id="NextBtn">Next</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="{{ asset('public/assets/js/jquery-3.5.1.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            cookiesCheck();
            fetchData("Search");

            function fetchData(data, type = null) {
                $.ajax({
                    url: "create-team",
                    method: "GET",
                    data: {
                        'searchData': data,
                        'type': type
                    },
                    success: function(result) {
                        $("#myTabContent").html(result);
                    }
                });
            }

            $("body").on('keyup', "#goal_keeper", function(e) {
                if (e.key === 'Enter' || e.keyCode === 13) {
                    searchData = $("#goal_keeper").val();
                    if (!searchData) {
                        searchData = 'Search'
                    }
                    fetchData(searchData, "goalkeeper");
                }
            })

            $("body").on('click', "#goal_keeper_search", function(e) {
                searchData = $("#goal_keeper").val();
                if (!searchData) {
                    searchData = 'Search'
                }
                fetchData(searchData, "goalkeeper");
            })


            $("body").on('keyup', "#defender", function(e) {
                if (e.key === 'Enter' || e.keyCode === 13) {
                    searchData = $("#defender").val();
                    if (!searchData) {
                        searchData = 'Search'
                    }
                    fetchData(searchData, "defender");
                }
            })

            $("body").on('click', "#defender_search", function(e) {
                searchData = $("#defender").val();
                if (!searchData) {
                    searchData = 'Search'
                }
                fetchData(searchData, "defender");
            })

            $("body").on('keyup', "#midfielder", function(e) {
                if (e.key === 'Enter' || e.keyCode === 13) {
                    searchData = $("#midfielder").val();
                    if (!searchData) {
                        searchData = 'Search'
                    }
                    fetchData(searchData, "midfielder");
                }
            })

            $("body").on('click', "#midfielder_search", function(e) {
                searchData = $("#midfielder").val();
                if (!searchData) {
                    searchData = 'Search'
                }
                fetchData(searchData, "midfielder");
            })

            $("body").on('keyup', "#forward", function(e) {
                if (e.key === 'Enter' || e.keyCode === 13) {
                    searchData = $("#forward").val();
                    if (!searchData) {
                        searchData = 'Search'
                    }
                    fetchData(searchData, "forward");
                }
            })

            $("body").on('click', "#forward_search", function(e) {
                searchData = $("#forward").val();
                if (!searchData) {
                    searchData = 'Search'
                }
                fetchData(searchData, "forward");
            })

            $('body').on("click", ".form-check-input", function() {
                var selected = 0;
                $('.form-check-input:checkbox[type=checkbox]:checked').each(function(e) {
                    //alert(e);
                    selected += 1;
                });
                $("#selected_count").html(selected+"/07")
                //alert(selected);
            });

            $('body').on("click",".choose_substitude",function(e) {
                if($(this).closest('div').find('.categorie').html()=="Goalkeeper"){
                    $.notify("Can not selecte goalkeeper.", "info");
                }else{
                    $(this).find('.aboutplayer').toggleClass("active");
                    var selectId=[];
                    var categorie=[];
                    $(".choose_substitude .active").each(function() {
                        var categorieHtml=$(this).closest('div').find('.categorie').html();
                        if(selectId.length>=2){
                            $.notify("Select only 2 substituted.", "info");
                            $(this).removeClass("active");
                        }else if($.inArray(categorieHtml,categorie)<0 || categorie.length === 0){
                            selectId.push($(this).closest('div').find('.categorie').attr('data-id'));
                            categorie.push($(this).closest('div').find('.categorie').html());
                        }else{
                            $(this).removeClass("active");
                            $.notify("Can not select 2 categorie.", "info");
                        }
                    })
                }
            });

            $('body').on("click",".choose_captain",function(e) {
                if($(this).closest('div').find('.categorie').html()=="Goalkeeper"){
                    $.notify("Can not select goalkeeper.", "info");
                }else{
                    $(this).find('.aboutplayer').toggleClass("active");
                    var selectId=[];
                    $(".choose_captain .active").each(function() {
                        if(selectId.length>=1){
                            $.notify("Select only 1 captain.", "info");
                            $(this).removeClass("active");
                        }else if(selectId.length === 0){
                            selectId.push($(this).closest('div').find('.categorie').attr('data-id'));
                        }else{
                            $(this).removeClass("active");
                            $.notify("Can not select 2 categorie.", "info");
                        }
                    })
                }
            });
        })
    </script>
@endsection
