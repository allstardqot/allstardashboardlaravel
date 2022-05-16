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
                            <input type="hidden" value="{{$editId}}" id="edit_id">
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
goalKeepercheckbox();
defendercheckbox();
midfieldercheckbox();
forwardcheckbox();

    function playerTeamCheck(){
        var teamArray = [];
        $(".form-check-input:checkbox[type=checkbox]:checked").each(function (e) {
            var teamname=$(this).closest("tr").find("strong").html();
            if(teamArray[teamname]===undefined){
                teamArray[teamname]=1
            }else{
                teamArray[teamname]=parseInt(teamArray[teamname])+1
            }
            if(teamArray[teamname]>2){
                $.notify("You can only select 2 maximum players from one team.", "info");
                $(this).closest("tr").find("input[type=checkbox]").prop("checked", false);
                $(this).closest('tr').css('backgroundColor','');
                //$("#NextBtn").attr("class","firstNext next adisable");
            }else{
                //$("#NextBtn").attr("class","firstNext next");
            }
        });
        selectCount();
    }

  $("body").on("click", ".goalkeeper_td", function () {
    if (
      $(this).closest("tr").find("input[type=checkbox]").prop("checked") == true
    ) {
      $(this).closest("tr").find("input[type=checkbox]").prop("checked", false);
      $(".goalkeeper_staricon").hide();
      $("input.goalkeepercheck").removeAttr("disabled");
    } else {
      var select = 0;
      var image = "";
      var full_name = "";
      var sell_price = "";

      $(".goalkeepercheck:checkbox[type=checkbox]:checked").each(function () {
        select += 1;
      });
      if (select >= 1) {
        $("input.goalkeepercheck").prop("disabled", true);
      } else {
        $("input.goalkeepercheck").removeAttr("disabled");
        $(this).closest("tr").find("input[type=checkbox]").prop("checked", true);
        $(".goalkeeper_staricon").show();
      }

      newselect = 0;
      $(".goalkeepercheck:checkbox[type=checkbox]:checked").each(function () {
        newselect += 1;
      });
      if (newselect >= 1) {
        $("input.goalkeepercheck").prop("disabled", true);
      }

      $(".goalkeepercheck:checkbox[type=checkbox]:checked").each(function () {
        $(this).removeAttr("disabled");
        image = $(this).closest("tr").find("img").attr("src");
        full_name = $(this).closest("tr").find(".goalkep_fullname").html();
        sell_price = $(this)
          .closest("tr")
          .find(".goalkeeper_sell_price")
          .html();
        $("#goalkeeper_img").attr("src", image);
        $("#goalkeeper_name").html(full_name);
        $("#goalkeepersell_price").html(sell_price);
        select += 1;
      });
    }
    $(".goalkeepercheck:checkbox[type=checkbox]:checked").closest('tr').css('backgroundColor','#0ea5e0');
    $(".goalkeepercheck:checkbox[type=checkbox]:not(:checked)").closest('tr').css('backgroundColor','');
    selectCount();
    playerTeamCheck();
  });

  $("body").on("click", ".defender_td", function () {
    if (
      $(this).closest("tr").find("input[type=checkbox]").prop("checked") == true
    ) {
      $(this).closest("tr").find("input[type=checkbox]").prop("checked", false);
      $("input.defendercheck").removeAttr("disabled");
    } else {
      var select = 0;
      var image = "";
      var full_name = "";
      var sell_price = "";

      $(".defendercheck:checkbox[type=checkbox]:checked").each(function () {
        select += 1;
      });
      if (select >= 2) {
        $("input.defendercheck").prop("disabled", true);
      } else {
        $("input.defendercheck").removeAttr("disabled");
        $(this)
          .closest("tr")
          .find("input[type=checkbox]")
          .prop("checked", true);
      }
      newselect = 0;
      $(".defendercheck:checkbox[type=checkbox]:checked").each(function () {
        newselect += 1;
      });
      if (newselect >= 2) {
        $("input.defendercheck").prop("disabled", true);
      }
      var n = 0;
      $(".defendercheck:checkbox[type=checkbox]:checked").each(function () {
        $(this).removeAttr("disabled");
        image = $(this).closest("tr").find("img").attr("src");
        full_name = $(this).closest("tr").find(".defender_fullname").html();
        sell_price = $(this).closest("tr").find(".defender_sell_price").html();
        $("#defender_img" + n).attr("src", image);
        $("#defender_name" + n).html(full_name);
        $("#defendersell_price" + n).html(sell_price);
        $(".defender_staricon"+n).show();
        n += 1;
      });
    }
    $(".defendercheck:checkbox[type=checkbox]:checked").closest('tr').css('backgroundColor','#0ea5e0');
    $(".defendercheck:checkbox[type=checkbox]:not(:checked)").closest('tr').css('backgroundColor','');
    selectCount();
    playerTeamCheck();

  });

  $("body").on("click", ".midfielder_td", function () {
    if (
      $(this).closest("tr").find("input[type=checkbox]").prop("checked") == true
    ) {
      $(this).closest("tr").find("input[type=checkbox]").prop("checked", false);
      $("input.midfieldercheck").removeAttr("disabled");
    } else {
      var select = 0;
      var image = "";
      var full_name = "";
      var sell_price = "";

      $(".midfieldercheck:checkbox[type=checkbox]:checked").each(function () {
        select += 1;
      });
      if (select >= 2) {
        $("input.midfieldercheck").prop("disabled", true);
      } else {
        $("input.midfieldercheck").removeAttr("disabled");
        $(this)
          .closest("tr")
          .find("input[type=checkbox]")
          .prop("checked", true);
      }
      newselect = 0;
      $(".midfieldercheck:checkbox[type=checkbox]:checked").each(function () {
        newselect += 1;
      });
      if (newselect >= 2) {
        $("input.midfieldercheck").prop("disabled", true);
      }
      var n = 0;
      $(".midfieldercheck:checkbox[type=checkbox]:checked").each(function () {
        $(this).removeAttr("disabled");
        image = $(this).closest("tr").find("img").attr("src");
        full_name = $(this).closest("tr").find(".midfielder_fullname").html();
        sell_price = $(this)
          .closest("tr")
          .find(".midfielder_sell_price")
          .html();
        $("#midfielder_img" + n).attr("src", image);
        $("#midfielder_name" + n).html(full_name);
        $("#midfieldersell_price" + n).html(sell_price);
        $(".midfielder_staricon"+n).show();

        n += 1;
      });
    }
    $(".midfieldercheck:checkbox[type=checkbox]:checked").closest('tr').css('backgroundColor','#0ea5e0');
    $(".midfieldercheck:checkbox[type=checkbox]:not(:checked)").closest('tr').css('backgroundColor','');
    selectCount();
    playerTeamCheck();
  });

  $("body").on("click", ".forward_td", function () {
    if (
      $(this).closest("tr").find("input[type=checkbox]").prop("checked") == true
    ) {
      $(this).closest("tr").find("input[type=checkbox]").prop("checked", false);
      $("input.forwardcheck").removeAttr("disabled");
    } else {
      var select = 0;
      var image = "";
      var full_name = "";
      var sell_price = "";

      $(".forwardcheck:checkbox[type=checkbox]:checked").each(function () {
        select += 1;
      });
      if (select >= 2) {
        $("input.forwardcheck").prop("disabled", true);
      } else {
        $("input.forwardcheck").removeAttr("disabled");
        $(this)
          .closest("tr")
          .find("input[type=checkbox]")
          .prop("checked", true);
      }
      newselect = 0;
      $(".forwardcheck:checkbox[type=checkbox]:checked").each(function () {
        newselect += 1;
      });
      if (newselect >= 2) {
        $("input.forwardcheck").prop("disabled", true);
      }
      var n = 0;
      $(".forwardcheck:checkbox[type=checkbox]:checked").each(function () {
        $(this).removeAttr("disabled");
        image = $(this).closest("tr").find("img").attr("src");
        full_name = $(this).closest("tr").find(".forward_fullname").html();
        sell_price = $(this).closest("tr").find(".forward_sell_price").html();
        $("#forward_img" + n).attr("src", image);
        $("#forward_name" + n).html(full_name);
        $("#forwardsell_price" + n).html(sell_price);
        $(".forward_staricon"+n).show();

        n += 1;
      });
    }
    $(".forwardcheck:checkbox[type=checkbox]:checked").closest('tr').css('backgroundColor','#0ea5e0');
    $(".forwardcheck:checkbox[type=checkbox]:not(:checked)").closest('tr').css('backgroundColor','');
    selectCount();
    playerTeamCheck();
  });

  function selectCount() {
    let selected = 0;
    $(".form-check-input:checkbox[type=checkbox]:checked").each(function (e) {
      selected += 1;
    });
    $("#selected_count").html(selected + "/7");
  }


  function goalKeepercheckbox() {
    var select = 0;
    var image = "";
    var full_name = "";
    var sell_price = "";
    $(".goalkeepercheck:checkbox[type=checkbox]:checked").each(function () {
      image = $(this).closest("tr").find("img").attr("src");
      full_name = $(this).closest("tr").find(".goalkep_fullname").html();
      sell_price = $(this).closest("tr").find(".goalkeeper_sell_price").html();
      select += 1;
    });
    if (select >= 1) {
      $("#goalkeeper_img").attr("src", image);
      $("#goalkeeper_name").html(full_name);
      $("#goalkeepersell_price").html(sell_price);
      $("input.goalkeepercheck").attr("disabled", true);
      $(".goalkeepercheck:checkbox[type=checkbox]:checked").removeAttr(
        "disabled"
      );
      $(".goalkeeper_staricon").show();
    } else {
        $(".goalkeeper_staricon").hide();
      $("input.goalkeepercheck").removeAttr("disabled");
      $(".goalkeepercheck:checkbox[type=checkbox]:checked").removeAttr(
        "disabled"
      );
    }
    $(".goalkeepercheck:checkbox[type=checkbox]:checked").closest('tr').css('backgroundColor','#0ea5e0');
    $(".goalkeepercheck:checkbox[type=checkbox]:not(:checked)").closest('tr').css('backgroundColor','');
  }

  function defendercheckbox() {
    var select = 0;

    $(".defendercheck:checkbox[type=checkbox]:checked").each(function () {
      image = $(this).closest("tr").find("img").attr("src");
      full_name = $(this).closest("tr").find(".defender_fullname").html();
      sell_price = $(this).closest("tr").find(".defender_sell_price").html();
      $("#defender_img" + select).attr("src", image);
      $("#defender_name" + select).html(full_name);
      $("#defendersell_price" + select).html(sell_price);
      $(".defender_staricon"+select).show();

      select += 1;
    });

    if (select >= 2) {
      $("input.defendercheck").attr("disabled", true);
      $(".defendercheck:checkbox[type=checkbox]:checked").removeAttr(
        "disabled"
      );
    } else {
      $(".defendercheck:checkbox[type=checkbox]:checked").removeAttr(
        "disabled"
      );
      $("input.defendercheck").removeAttr("disabled");
    }
    $(".defendercheck:checkbox[type=checkbox]:checked").closest('tr').css('backgroundColor','#0ea5e0');
    $(".defendercheck:checkbox[type=checkbox]:not(:checked)").closest('tr').css('backgroundColor','');
  }

  function midfieldercheckbox() {
    var select = 0;
    $(".midfieldercheck:checkbox[type=checkbox]:checked").each(function () {
      image = $(this).closest("tr").find("img").attr("src");
      full_name = $(this).closest("tr").find(".midfielder_fullname").html();
      sell_price = $(this).closest("tr").find(".midfielder_sell_price").html();
      $("#midfielder_img" + select).attr("src", image);
      $("#midfielder_name" + select).html(full_name);
      $("#midfieldersell_price" + select).html(sell_price);
      $(".midfielder_staricon"+select).show();
      select += 1;
    });

    if (select >= 2) {
      $("input.midfieldercheck").attr("disabled", true);
      $(".midfieldercheck:checkbox[type=checkbox]:checked").removeAttr(
        "disabled"
      );
    } else {
      $(".midfieldercheck:checkbox[type=checkbox]:checked").removeAttr(
        "disabled"
      );
      $("input.midfieldercheck").removeAttr("disabled");
    }
    $(".midfieldercheck:checkbox[type=checkbox]:checked").closest('tr').css('backgroundColor','#0ea5e0');
    $(".midfieldercheck:checkbox[type=checkbox]:not(:checked)").closest('tr').css('backgroundColor','');
  }

  function forwardcheckbox() {
    var select = 0;
    $(".forwardcheck:checkbox[type=checkbox]:checked").each(function () {
      image = $(this).closest("tr").find("img").attr("src");
      full_name = $(this).closest("tr").find(".forward_fullname").html();
      sell_price = $(this).closest("tr").find(".forward_sell_price").html();
      $("#forward_img" + select).attr("src", image);
      $("#forward_name" + select).html(full_name);
      $("#forwardsell_price" + select).html(sell_price);
      $(".forward_staricon"+select).show();
      select += 1;
    });
    if (select >= 2) {
      $("input.forwardcheck").attr("disabled", true);
      $(".forwardcheck:checkbox[type=checkbox]:checked").removeAttr("disabled");
    } else {
      $(".forwardcheck:checkbox[type=checkbox]:checked").removeAttr("disabled");
      $("input.forwardcheck").removeAttr("disabled");
    }
    $(".forwardcheck:checkbox[type=checkbox]:checked").closest('tr').css('backgroundColor','#0ea5e0');
    $(".forwardcheck:checkbox[type=checkbox]:not(:checked)").closest('tr').css('backgroundColor','');
  }
    $(document).ready(function() {
        cookiesCheck();
        fetchData("Search");

        function fetchData(data, type = null,status=null,team=null,cost_range=null) {
            var point=''
            var editId=$("#edit_id").val();
            if(status=='filter'){
                point=data;
                data="Search";
            }
            showLoader();
            $.ajax({
                url: "create-team",
                method: "GET",
                data: {
                    'searchData': data,
                    'type': type,
                    'point':point,
                    'team':team,
                    'editId':editId,
                    'cost_range':cost_range
                },
                success: function(result) {
                    $("#myTabContent").html(result);
                    hideLoader();
                }
            });
        }

        $("body").on('click', "#goalkeeper_filt", function(e) {
            point=$("#goal_keeper_point").val();
            cost_range=$("#rangeSlider").val();
            team=$("#goal_keeper_team").val();
            fetchData(point,'goalkeeper',"filter",team,cost_range)
        })

        $("body").on('click', "#defender_filt", function(e) {
            point=$("#defender_point").val();
            team=$("#defender_team").val();
            cost_range=$("#defender_rangeSlider").val();
            fetchData(point,'defender',"filter",team,cost_range)
        })

        $("body").on('click', "#midfielder_filt", function(e) {
            point=$("#midfielder_point").val();
            team=$("#midfielder_team").val();
            cost_range=$("#midfielder_rangeSlider").val();
            fetchData(point,'midfielder',"filter",team,cost_range)
        })

        $("body").on('click', "#forward_filt", function(e) {
            point=$("#forward_point").val();
            team=$("#forward_team").val();
            cost_range=$("#forward_rangeSlider").val();
            fetchData(point,'forward',"filter",team,cost_range)
        })



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

        $("body").on('click', "#defender_search", function(e) {
            searchData = $("#defender").val();
            if (!searchData) {
                searchData = 'Search'
            }
            fetchData(searchData, "defender");
        })
        $("body").on('click', "#goal_keeper_search", function(e) {
            searchData = $("#goal_keeper").val();
            if (!searchData) {
                searchData = 'Search'
            }
            fetchData(searchData, "goalkeeper");
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

                selected += 1;
            });
            $("#selected_count").html(selected+"/7")

        });

        $('body').on("click",".choose_substitude",function(e) {
                $(this).find('.aboutplayer').toggleClass("active");
                var selectId=[];
                var categorie=[];
                $(".choose_substitude .active").each(function() {
                    var categorieHtml=$(this).closest('div').find('.categorie').html();
                    if(selectId.length>=5){
                        $.notify("Select only 5 players.", "info");
                        $(this).removeClass("active");
                    }else{
                        selectId.push($(this).closest('div').find('.categorie').attr('data-id'));
                        if($.inArray($(this).closest('div').find('.categorie').html(),categorie)==-1){
                            categorie.push($(this).closest('div').find('.categorie').html());
                        }
                        if(selectId.length>=5 && $.inArray("Goalkeeper",categorie)==-1){
                            $.notify("Please choose a goalkeeper.", "info");
                        }
                        else if(selectId.length>=5 && categorie.length<4){
                            $.notify("Please chose a player to remaning category.", "info");
                        }else if(selectId.length==5){
                            console.log("fineeee");
                        }
                    }
                    // else if(selectId.length>=5 && categorie.length<4){
                    //     $.notify("Please chose a player to remaning category.", "info");
                    // }else if(selectId.length>=5 && $.inArray("Goalkeeper",categorie)==-1){
                    //     $.notify("Please choose a goalkeeper.", "info");
                    // }
                })
        });

        $('body').on("click",".choose_captain",function(e) {
            if($(this).closest('div').find('.categorie').html()=="Goalkeeper"){
                $.notify("Can not select goalkeeper.", "info");
            }else{
                $(this).toggleClass("captain_icon");
                var selectId=[];
                $(".captain_icon").each(function() {
                    if(selectId.length>=1){
                        $.notify("Select only 1 captain.", "info");
                        $(this).removeClass("captain_icon");
                    }else if(selectId.length === 0){
                        console.log($(this).closest('div').find('.categorie').attr('data-id'));
                        selectId.push($(this).closest('div').find('.categorie').attr('data-id'));
                    }else{
                        $(this).removeClass("captain_icon");
                        $.notify("Can not select 2 captain.", "info");
                    }
                })
            }
        });

        $('body').on("click","#goalkeeper_detail",function(e){
            var category_name=$(this).closest('div').find(".categorie").html();
            var player_name=$(this).closest('div').find("h4").html();
            $("#category_model").html(category_name);
            $("#player_name_model").html(player_name);
        })

        $('body').on("click","#defender_detail",function(e){
            var category_name=$(this).closest('div').find(".categorie").html();
            var player_name=$(this).closest('div').find("h4").html();
            $("#category_model").html(category_name);
            $("#player_name_model").html(player_name);
        })

        $('body').on("click","#midfielder_detail",function(e){
            var category_name=$(this).closest('div').find(".categorie").html();
            var player_name=$(this).closest('div').find("h4").html();
            $("#category_model").html(category_name);
            $("#player_name_model").html(player_name);
        })

        $('body').on("click","#forward_detail",function(e){
            var category_name=$(this).closest('div').find(".categorie").html();
            var player_name=$(this).closest('div').find("h4").html();
            $("#category_model").html(category_name);
            $("#player_name_model").html(player_name);
        })
    })
    </script>
@endsection
