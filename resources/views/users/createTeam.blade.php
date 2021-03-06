@extends('layouts.user') @section('title', 'My Team') @section('content')
<link
  rel="stylesheet"
  href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css"
/>
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
    {{--
    <button type="button" class="close" data-dismiss="alert">??</button> --}}
    <strong>{{ $message }}</strong>
  </div>
  @endif
  <div id="manage_squad" style="display: none"></div>
  <div id="manage_squad2" style="display: none"></div>
  <div id="manage_squad3" style="display: none"></div>
  <div class="container jsdbdhsol" id="create_team_main">
    <div class="asdjd76">
      <header>Pick Your Players</header>
      <div class="row">
        <div class="col-sm-12">
          <div class="progress-bar sdjhsdhdhjk">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button
                  class="create-team-nav nav-link active"
                  id="home-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#home"
                  type="button"
                  role="tab"
                  aria-controls="home"
                  aria-selected="true"
                >
                  Goalkeeper
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="create-team-nav nav-link"
                  id="profile-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#profile"
                  type="button"
                  role="tab"
                  aria-controls="profile"
                  aria-selected="false"
                >
                  Defenders
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="create-team-nav nav-link"
                  id="contact-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#contact"
                  type="button"
                  role="tab"
                  aria-controls="contact"
                  aria-selected="false"
                >
                  Midfielders
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="create-team-nav nav-link"
                  id="contact-tab2"
                  data-bs-toggle="tab"
                  data-bs-target="#contact2"
                  type="button"
                  role="tab"
                  aria-controls="contact2"
                  aria-selected="false"
                >
                  Forward
                </button>
              </li>
            </ul>
            <input type="hidden" value="{{ $editId }}" id="edit_id" />
            <input
              type="hidden"
              value="{{ !empty($check) ? $check : '' }}"
              id="edit_manage_squad"
            />
          </div>
          <div class="sdjsd689">
            <div class="sdjsd789">
              <h1 class="sdhn485" id="selected_count">0/7</h1>
              <p class="sxdjhd767">
                <b>Players <br />Selected</b>
              </p>
            </div>
            <div class="sxdhdcn9908">
              @php echo '
              <h1 class="sdhsdks87" id="coin">50M</h1>
              '; @endphp
              <p class="sdjhs7tyh">
                <b
                  >Money<br />
                  Remaining</b
                >
              </p>
            </div>
          </div>
          <div class="tab-content" id="myTabContent"></div>
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
<script src="{{
    asset('public/assets/js/om-javascript-range-slider.js')
  }}"></script>
<script>
  //var checkedisquad=$("#edit_manage_squad").val();
  goalKeepercheckbox();
  defendercheckbox();
  midfieldercheckbox();
  forwardcheckbox();

  function playerTeamCheck(teamname = null) {
    var teamArray = [];
    var status = "true";

    $(".form-check-input:checkbox[type=checkbox]:checked").each(function (e) {
      var teamname = $(this).closest("tr").find("strong").html();
      if (teamArray[teamname] === undefined) {
        teamArray[teamname] = 1;
        status = "true";
      } else {
        teamArray[teamname] = parseFloat(teamArray[teamname]) + 1;
        status = "true";
      }
      //console.log("fineeeeeeeeeeeeeeeeee");
      console.log(teamArray);
      if (teamArray[teamname] >= 2) {
        // $.notify("You can only select 2 maximum players from one team.", "info");
        status = "false";
        //$(this).closest("tr").find("input[type=checkbox]").prop("checked", false);
        //$(this).closest('tr').css('backgroundColor', '');
        //$("#NextBtn").attr("class","firstNext next adisable");
      } else {
        //$("#NextBtn").attr("class","firstNext next");
        status = "true";
      }
    });
    if (teamname) {
      status = "true";
      if (teamArray[teamname] >= 2) {
        status = "false";
      }
    }
    return status;
    //selectCount();
  }

  function coins(price, status) {
    //alert(price);
    var spendCoin = $("#coin").html();
    var res =
      status == "plus"
        ? parseFloat(spendCoin.replace("M", "")) +
          parseFloat($.trim(price.replace("M", "")))
        : spendCoin.replace("M", "") - $.trim(price.replace("M", ""));
    res = Math.round(res * 100) / 100;
    $("#coin").html(res + "M");
  }

  function playeridCookies() {
    var playeridArray = [];
    $(".form-check-input:checkbox[type=checkbox]:checked").each(function (e) {
      playeridArray.push($(this).val());
    });
    set_cookie("playerIdArray", playeridArray);
  }

  $("body").on("click", ".goalkeeper_td", function () {
    var sell_price = "";
    var teamname = $(this).closest("tr").find("strong").html();
    var status = playerTeamCheck(teamname);
    var coin_add = "";
    var spendCoin = $("#coin").html();
    //alert(spendCoin);
    playerTeamCheck();

    if (
      $(this).closest("tr").find("input[type=checkbox]").prop("checked") == true
    ) {
      //unchecked td code
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
        coin_add = "plus";
        coins(sell_price, coin_add);
        // alert(sell_price);
      });
      $(this).closest("tr").find("input[type=checkbox]").prop("checked", false);
      $(".goalkeeper_staricon").hide();
      $("input.goalkeepercheck").removeAttr("disabled");
    } else {
      //checked td code
      var select = 0;
      var image = "";
      var full_name = "";
      var spendCoin = $("#coin").html();
      $(this).removeAttr("disabled");

      sell_price = $(this).closest("tr").find(".goalkeeper_sell_price").html();
      if (parseFloat(spendCoin) < parseFloat(sell_price)) {
        $.notify("Your Points are not sufficent!.", "info");
      } else if (status == "false") {
        $.notify(
          "You can only select 2 maximum players from one team.",
          "info"
        );
      } else {
        $(".goalkeepercheck:checkbox[type=checkbox]:checked").each(function () {
          select += 1;
        });
        if (select >= 1) {
          $("input.goalkeepercheck").prop("disabled", true);
        } else {
          $("input.goalkeepercheck").removeAttr("disabled");
          $(this)
            .closest("tr")
            .find("input[type=checkbox]")
            .prop("checked", true);
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
          // alert('sdfsdf');

          $(this).removeAttr("disabled");
          image = $(this).closest("tr").find("img").attr("src");
          full_name = $(this).closest("tr").find(".goalkep_fullname").html();
          sell_price = $(this)
            .closest("tr")
            .find(".goalkeeper_sell_price")
            .html();
          $("#goalkeeper_img").attr("src", image);
          //  alert(sell_price);

          $("#goalkeeper_name").html(full_name);
          $("#goalkeepersell_price").html(sell_price);
          if (select == 0) {
            coins(sell_price);
          }
          select += 1;
        });
      }
    }
    $(".goalkeepercheck:checkbox[type=checkbox]:checked")
      .closest("tr")
      .css("backgroundColor", "#0ea5e0");
    $(".goalkeepercheck:checkbox[type=checkbox]:not(:checked)")
      .closest("tr")
      .css("backgroundColor", "");
    selectCount();
    playeridCookies();
  });

  $("body").on("click", ".defender_td", function () {
    var sell_price = "";
    var teamname = $(this).closest("tr").find("strong").html();
    var status = playerTeamCheck(teamname);
    var coin_add = "";
    // alert(playerTeamCheck())

    if (
      $(this).closest("tr").find("input[type=checkbox]").prop("checked") == true
    ) {
      $(this).closest("tr").find("input[type=checkbox]").prop("checked", false);
      $("input.defendercheck").removeAttr("disabled");

      var nameHidden = $(this).closest("tr").find("input[type='hidden']").val();
      var hiddenSellprice = $(this)
        .closest("tr")
        .find("#hiddenSellprice")
        .val();
      var defender_name1 = $("#defender_name1").html();
      var defender_name0 = $("#defender_name0").html();
      coin_add = "plus";
      coins(hiddenSellprice, coin_add);
      if ($.trim(defender_name0) == nameHidden) {
        $(".defender_staricon0").hide();
      }

      if ($.trim(defender_name1) == nameHidden) {
        $(".defender_staricon1").hide();
      }
    } else {
      var select = 0;
      var image = "";
      var full_name = "";
      var spendCoin = $("#coin").html();
      var sellprice = "";
      $(this).removeAttr("disabled");

      sellprice = $(this).closest("tr").find(".defender_sell_price").html();

      if (
        parseFloat(spendCoin.replace("M", "")) < parseFloat($.trim(sellprice))
      ) {
        $.notify("Your Points are not sufficent!.", "info");
      } else if (status == "false") {
        $.notify(
          "You can only select 2 maximum players from one team.",
          "info"
        );
      } else {
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

        // alert();
        var n = 0;
        $(".defendercheck:checkbox[type=checkbox]:checked").each(function () {
          $(this).removeAttr("disabled");
          image = $(this).closest("tr").find("img").attr("src");
          full_name = $(this).closest("tr").find(".defender_fullname").html();
          sell_price = $(this)
            .closest("tr")
            .find(".defender_sell_price")
            .html();
          $("#defender_img" + n).attr("src", image);
          $("#defender_name" + n).html(full_name);
          $("#defendersell_price" + n).html(sell_price);
          $(".defender_staricon" + n).show();
          n += 1;
        });
        sellprice = $(this).closest("tr").find(".defender_sell_price").html();
        coins(sellprice);
      }
    }
    $(".defendercheck:checkbox[type=checkbox]:checked")
      .closest("tr")
      .css("backgroundColor", "#0ea5e0");
    $(".defendercheck:checkbox[type=checkbox]:not(:checked)")
      .closest("tr")
      .css("backgroundColor", "");
    selectCount();
    playeridCookies();
  });

  $("body").on("click", ".midfielder_td", function () {
    var teamname = $(this).closest("tr").find("strong").html();
    var status = playerTeamCheck(teamname);
    var coin_add = "";
    var nameHidden = $(this).closest("tr").find("input[type='hidden']").val();
    var hiddenSellprice = $(this).closest("tr").find("#midSellprice").val();
    if (
      $(this).closest("tr").find("input[type=checkbox]").prop("checked") == true
    ) {
      $(this).closest("tr").find("input[type=checkbox]").prop("checked", false);
      $("input.defendercheck").removeAttr("disabled");
      var midfielder_name1 = $("#midfielder_name1").html();
      var midfielder_name0 = $("#midfielder_name0").html();
      coin_add = "plus";
      coins(hiddenSellprice, coin_add);

      if ($.trim(midfielder_name0) == nameHidden) {
        $(".midfielder_staricon0").hide();
      }
      if ($.trim(midfielder_name1) == nameHidden) {
        $(".midfielder_staricon1").hide();
      }
    } else {
      var select = 0;
      var image = "";
      var full_name = "";
      var sellprice = "";
      var sell_price = "";
      var spendCoin = $("#coin").html();
      $(this).removeAttr("disabled");

      sellprice = $(this).closest("tr").find(".midfielder_sell_price").html();
      if (
        parseFloat(spendCoin.replace("M", "")) < parseFloat($.trim(sellprice))
      ) {
        $.notify("Your Points are not sufficent!.", "info");
      } else if (status == "false") {
        $.notify(
          "You can only select 2 maximum players from one team.",
          "info"
        );
      } else {
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
        playerTeamCheck();
        $(".midfieldercheck:checkbox[type=checkbox]:checked").each(function () {
          $(this).removeAttr("disabled");
          image = $(this).closest("tr").find("img").attr("src");
          full_name = $(this).closest("tr").find(".midfielder_fullname").html();
          sell_price += $(this)
            .closest("tr")
            .find(".midfielder_sell_price")
            .html();
          $("#midfielder_img" + n).attr("src", image);
          $("#midfielder_name" + n).html(full_name);
          $("#midfieldersell_price" + n).html(sell_price);
          $(".midfielder_staricon" + n).show();
          n += 1;
        });
        sellprice = $(this).closest("tr").find(".midfielder_sell_price").html();
        coins(sellprice);
      }
    }
    $(".midfieldercheck:checkbox[type=checkbox]:checked")
      .closest("tr")
      .css("backgroundColor", "#0ea5e0");
    $(".midfieldercheck:checkbox[type=checkbox]:not(:checked)")
      .closest("tr")
      .css("backgroundColor", "");
    selectCount();
    playeridCookies();
  });

  $("body").on("click", ".forward_td", function () {
    var teamname = $(this).closest("tr").find("strong").html();
    var status = playerTeamCheck(teamname);
    var coin_add = "";
    if (
      $(this).closest("tr").find("input[type=checkbox]").prop("checked") == true
    ) {
      var nameHidden = $(this).closest("tr").find("input[type='hidden']").val();
      var hiddenSellprice = $(this)
        .closest("tr")
        .find("#forwrdSellPrice")
        .val();
      $(this).closest("tr").find("input[type=checkbox]").prop("checked", false);
      $("input.forwardcheck").removeAttr("disabled");
      var forward_name1 = $("#forward_name1").html();
      var forward_name0 = $("#forward_name0").html();
      coin_add = "plus";
      coins(hiddenSellprice, coin_add);
      if ($.trim(forward_name0) == nameHidden) {
        // alert(forward_name1);
        $(".forward_staricon0").hide();
      }
      if ($.trim(forward_name1) == nameHidden) {
        $(".forward_staricon1").hide();
      }
    } else {
      var select = 0;
      var image = "";
      var full_name = "";
      var sell_price = "";
      var spendCoin = $("#coin").html();
      $(this).removeAttr("disabled");

      sell_price = $(this).closest("tr").find(".forward_sell_price").html();
      if (
        parseFloat(spendCoin.replace("M", "")) < parseFloat($.trim(sell_price))
      ) {
        $.notify("Your Points are not sufficent!.", "info");
      } else if (status == "false") {
        $.notify(
          "You can only select 2 maximum players from one team.",
          "info"
        );
      } else {
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
        playerTeamCheck();
        var n = 0;
        $(".forwardcheck:checkbox[type=checkbox]:checked").each(function () {
          $(this).removeAttr("disabled");
          image = $(this).closest("tr").find("img").attr("src");
          full_name = $(this).closest("tr").find(".forward_fullname").html();
          sellprice = parseFloat(
            $(this).closest("tr").find(".forward_sell_price").html()
          );
          $("#forward_img" + n).attr("src", image);
          $("#forward_name" + n).html(full_name);
          $("#forwardsell_price" + n).html(sellprice);
          $(".forward_staricon" + n).show();
          n += 1;
        });
        sell_price = $(this).closest("tr").find(".forward_sell_price").html();
        coins(sell_price);
      }
    }
    $(".forwardcheck:checkbox[type=checkbox]:checked")
      .closest("tr")
      .css("backgroundColor", "#0ea5e0");
    $(".forwardcheck:checkbox[type=checkbox]:not(:checked)")
      .closest("tr")
      .css("backgroundColor", "");
    selectCount();
    playeridCookies();
  });

  function selectCount() {
    let selected = 0;
    $(".form-check-input:checkbox[type=checkbox]:checked").each(function (e) {
      selected += 1;
    });
    $("#selected_count").html(selected + "/7");
  }

  function goalKeepercheckbox() {
    //alert("fineeeeeeeeeeee");
    var select = 0;
    var image = "";
    var full_name = "";
    var sell_price = "";
    var spendCoin = $("#coin").html();

    $(".act").each(function () {
      sell_price = $(this).closest("tr").find(".goalkeeper_sell_price").html();
      status = "plus";
      coins(sell_price, status);
    });

    $(".goalkeepercheck:checkbox[type=checkbox]").each(function () {
      $(this).closest("tr").removeClass("act");
    });

    // coins();
    $(".goalkeepercheck:checkbox[type=checkbox]:checked").each(function () {
      $(this).closest("tr").addClass("act");

      image = $(this).closest("tr").find("img").attr("src");
      full_name = $(this).closest("tr").find(".goalkep_fullname").html();
      sell_price = $(this).closest("tr").find(".goalkeeper_sell_price").html();
      //alert(sell_price);
      if (
        spendCoin != "0M" &&
        parseFloat(spendCoin) >= parseFloat(sell_price)
      ) {
        coins(sell_price);
      }
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
    $(".goalkeepercheck:checkbox[type=checkbox]:checked")
      .closest("tr")
      .css("backgroundColor", "#0ea5e0");
    $(".goalkeepercheck:checkbox[type=checkbox]:not(:checked)")
      .closest("tr")
      .css("backgroundColor", "");
    playerTeamCheck();
  }

  function defendercheckbox() {
    var select = 0;
    var spendCoin = $("#coin").html();

    playerTeamCheck();
    var checkCount = 0;
    /*var sell_priceMinus='yyyy';
                var chec=0;
                $("body").on("click",'.defendercheck:checkbox[type=checkbox]',function(){
                    chec +=1;
                    if($(this).prop("checked") == true){
                        sell_priceMinus = $(this).closest("tr").find(".defender_sell_price").html();
                        alert(sell_priceMinus+"ffffffffffffffffff");
                    }
                    else if($(this).prop("checked") == false){
                        sell_priceMinus = $(this).closest("tr").find(".defender_sell_price").html();
                        alert(sell_priceMinus+"Ssssssssssssssssssss");

                    }
                });*/

    $(".defendercheck:checkbox[type=checkbox]").each(function () {
      $(this).closest("tr").removeClass("act1");
    });

    $(".defendercheck:checkbox[type=checkbox]:checked").each(function () {
      $(this).closest("tr").addClass("act1");
      image = $(this).closest("tr").find("img").attr("src");
      full_name = $(this).closest("tr").find(".defender_fullname").html();
      sell_price = $(this).closest("tr").find(".defender_sell_price").html();
      if (
        spendCoin != "0M" &&
        parseFloat(spendCoin) >= parseFloat(sell_price)
      ) {
        coins(sell_price);
      }
      $("#defender_img" + select).attr("src", image);
      $("#defender_name" + select).html(full_name);
      $("#defendersell_price" + select).html(sell_price);
      $(".defender_staricon" + select).show();

      select += 1;
    });
    /*$(".act1").each(function(){
                    checkCount += 1;
                    sell_price = $(this).closest("tr").find(".defender_sell_price").html();
                    //alert(sell_price+"----------------------"+checkCount);
                    if(checkCount==1)
                    {
                        //sell_price = $(this).closest("tr").find(".defender_sell_price").html();
                        //alert(sell_price);

                    }
                });*/

    if (select == 1) {
      $(".defender_staricon1").hide();
    } else if (select == 0) {
      $(".defender_staricon0").hide();
      $(".defender_staricon0").hide();
    }

    var nameHidden = $(this).closest("tr").find("input[type='hidden']").val();
    var defender_name1 = $("#defender_name1").html();
    var defender_name0 = $("#defender_name0").html();
    if ($.trim(defender_name0) == nameHidden) {
      $(".defender_staricon0").hide();
    }

    if ($.trim(defender_name1) == nameHidden) {
      $(".defender_staricon1").hide();
    }

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
    $(".defendercheck:checkbox[type=checkbox]:checked")
      .closest("tr")
      .css("backgroundColor", "#0ea5e0");
    $(".defendercheck:checkbox[type=checkbox]:not(:checked)")
      .closest("tr")
      .css("backgroundColor", "");
  }

  function midfieldercheckbox() {
    var select = 0;
    var sell_price = "";
    var spendCoin = $("#coin").html();
    playerTeamCheck();

    $(".midfieldercheck:checkbox[type=checkbox]:checked").each(function () {
      image = $(this).closest("tr").find("img").attr("src");
      full_name = $(this).closest("tr").find(".midfielder_fullname").html();
      sell_price = $(this).closest("tr").find(".midfielder_sell_price").html();
      if (
        spendCoin != "0M" &&
        parseFloat(spendCoin) >= parseFloat(sell_price)
      ) {
        coins(sell_price);
      }
      $("#midfielder_img" + select).attr("src", image);
      $("#midfielder_name" + select).html(full_name);
      $("#midfieldersell_price" + select).html(sell_price);
      $(".midfielder_staricon" + select).show();
      select += 1;
    });
    // if( parseFloat(spendCoin) >= parseFloat(sell_price)){
    // $(".midfieldercheck:checkbox[type=checkbox]:checked").removeAttr(
    //         "disabled"
    //     );
    //     $("input.midfieldercheck").removeAttr("disabled");
    // $.notify("Your Points are not sufficent!.", "info");
    // }else{
    if (select == 1) {
      $(".midfielder_staricon1").hide();
    } else if (select == 0) {
      $(".midfielder_staricon0").hide();
      $(".midfielder_staricon1").hide();
    }
    // alert(select);

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
    $(".midfieldercheck:checkbox[type=checkbox]:checked")
      .closest("tr")
      .css("backgroundColor", "#0ea5e0");
    $(".midfieldercheck:checkbox[type=checkbox]:not(:checked)")
      .closest("tr")
      .css("backgroundColor", "");
  }

  // }

  function forwardcheckbox() {
    var select = 0;
    var sell_price = "";
    var spendCoin = $("#coin").html();
    // alert(sell_price);

    $(".forwardcheck:checkbox[type=checkbox]:checked").each(function () {
      image = $(this).closest("tr").find("img").attr("src");
      full_name = $(this).closest("tr").find(".forward_fullname").html();
      sell_price = $(this).closest("tr").find(".forward_sell_price").html();
      // alert(sell_price);
      // alert(spendCoin);
      if (
        spendCoin != "0M" &&
        parseFloat(spendCoin) >= parseFloat(sell_price)
      ) {
        coins(sell_price);
      }

      $("#forward_img" + select).attr("src", image);
      $("#forward_name" + select).html(full_name);
      $("#forwardsell_price" + select).html(sell_price);
      $(".forward_staricon" + select).show();
      select += 1;
    });

    if (parseFloat(spendCoin) < parseFloat(sell_price)) {
      $("input.forwardcheck").attr("disabled", true);
      $(".forwardcheck:checkbox[type=checkbox]:checked").removeAttr("disabled");
      $.notify("Your Points are not sufficent!.", "info");
    } else {
      playerTeamCheck();
      if (select == 1) {
        $(".forward_staricon1").hide();
      } else if (select == 0) {
        $(".forward_staricon1").hide();
        $(".forward_staricon0").hide();
      }
      if (select >= 2) {
        $("input.forwardcheck").attr("disabled", true);
        $(".forwardcheck:checkbox[type=checkbox]:checked").removeAttr(
          "disabled"
        );
      } else {
        $(".forwardcheck:checkbox[type=checkbox]:checked").removeAttr(
          "disabled"
        );
        $("input.forwardcheck").removeAttr("disabled");
      }
      $(".forwardcheck:checkbox[type=checkbox]:checked")
        .closest("tr")
        .css("backgroundColor", "#0ea5e0");
      $(".forwardcheck:checkbox[type=checkbox]:not(:checked)")
        .closest("tr")
        .css("backgroundColor", "");
    }
  }

  $(document).ready(function () {
    cookiesCheck();
    fetchData("Search");

    function fetchData(
      data,
      type = null,
      status = null,
      team = null,
      min = null,
      max = null,
    ) {
      $("#coin").html("50M");
      var point = "";
      var editId = $("#edit_id").val();
      if (status == "filter") {
        point = data;
        data = "Search";
      }
      showLoader();
      // alert(min);
      
      $.ajax({
        url: "create-team",
        method: "GET",
        data: {
          searchData: data,
          type: type,
          point: point,
          team: team,
          editId: editId,
          min: min,
          max: max,

        },
        success: function (result) {
          console.log(result);
          $("#myTabContent").html(result);
          hideLoader();
        },
      });
    }

    $("body").on("click", "#goalkeeper_filt", function (e) {
      point = $("#goal_keeper_point").val();
      var min = $("#gol-slider-range-min").html();
      var max = $("#gol-slider-range-max").html();

      set_cookie('min',min.replace('$', ' '));
      set_cookie('max',max.replace("M", "").replace('$', ' '));

      // alert('Min : '+min.replace("$", ""));
      // alert('Max : '+max.replace("M", "").replace('$', ' '));
      // alert(min);
      // alert(max);
      team = $("#goal_keeper_team").val();
      fetchData(point, 'goalkeeper', "filter", team, min.replace("$", ""),max.replace("M", "").replace('$', ' '))
    });

    $("body").on("click", "#defender_filt", function (e) {
      point = $("#defender_point").val();
      team = $("#defender_team").val();

      var min = $("#def-slider-range-min").html();
      var max = $("#def-slider-range-max").html();

      set_cookie('min_def',min.replace("$", ""));
      set_cookie('max_def',max.replace("M", "").replace('$', ' '));
      // alert(max);
      fetchData(point, "defender", "filter", team, min.replace("$", ""),max.replace("M", "").replace('$', ' '));
    });

    $("body").on("click", "#midfielder_filt", function (e) {
      point = $("#midfielder_point").val();
      team = $("#midfielder_team").val();
      var min = $("#mid-slider-range-min").html();
      var max = $("#mid-slider-range-max").html();

      set_cookie('min_mid',min.replace("$", ""));
      set_cookie('max_mid',max.replace("M", "").replace('$', ' '));

      fetchData(point, "midfielder", "filter", team, min.replace("$", ""),max.replace("M", "").replace('$', ' '));
    });

    $("body").on("click", "#forward_filt", function (e) {
      point = $("#forward_point").val();
      team = $("#forward_team").val();
      var min = $("#for-slider-range-min").html();
      var max = $("#for-slider-range-max").html();

      set_cookie('min_for',min.replace("$", ""));
      set_cookie('max_for',max.replace("M", "").replace('$', ' '));

      fetchData(point, "forward", "filter", team, min.replace("$", ""),max.replace("M", "").replace('$', ' '));
    });

    $("body").on("keyup", "#goal_keeper", function (e) {
      if (e.key === "Enter" || e.keyCode === 13) {
        searchData = $("#goal_keeper").val();

        if (!searchData) {
          searchData = "Search";
        }
        fetchData(searchData, "goalkeeper");
      }
    });

    $("body").on("click", "#goal_keeper_search", function (e) {
      searchData = $("#goal_keeper").val();

      if (!searchData) {
        searchData = "Search";
      }
      fetchData(searchData, "goalkeeper");
    });

    $("body").on("click", "#defender_search", function (e) {
      searchData = $("#defender").val();
      if (!searchData) {
        searchData = "Search";
      }
      fetchData(searchData, "defender");
    });
    $("body").on("click", "#goal_keeper_search", function (e) {
      searchData = $("#goal_keeper").val();
      if (!searchData) {
        searchData = "Search";
      }
      fetchData(searchData, "goalkeeper");
    });
    $("body").on("click", "#goal_keeper_search", function (e) {
      searchData = $("#goal_keeper").val();
      if (!searchData) {
        searchData = "Search";
      }
      fetchData(searchData, "goalkeeper");
    });

    $("body").on("keyup", "#defender", function (e) {
      if (e.key === "Enter" || e.keyCode === 13) {
        searchData = $("#defender").val();
        if (!searchData) {
          searchData = "Search";
        }
        fetchData(searchData, "defender");
      }
    });

    $("body").on("click", "#defender_search", function (e) {
      searchData = $("#defender").val();
      if (!searchData) {
        searchData = "Search";
      }
      fetchData(searchData, "defender");
    });

    $("body").on("keyup", "#midfielder", function (e) {
      if (e.key === "Enter" || e.keyCode === 13) {
        searchData = $("#midfielder").val();
        if (!searchData) {
          searchData = "Search";
        }
        fetchData(searchData, "midfielder");
      }
    });

    $("body").on("click", "#midfielder_search", function (e) {
      searchData = $("#midfielder").val();
      if (!searchData) {
        searchData = "Search";
      }
      fetchData(searchData, "midfielder");
    });

    $("body").on("keyup", "#forward", function (e) {
      if (e.key === "Enter" || e.keyCode === 13) {
        searchData = $("#forward").val();
        if (!searchData) {
          searchData = "Search";
        }
        fetchData(searchData, "forward");
      }
    });

    $("body").on("click", "#forward_search", function (e) {
      searchData = $("#forward").val();
      if (!searchData) {
        searchData = "Search";
      }
      fetchData(searchData, "forward");
    });

    $("body").on("click", ".form-check-input", function () {
      var selected = 0;
      $(".form-check-input:checkbox[type=checkbox]:checked").each(function (e) {
        selected += 1;
      });
      $("#selected_count").html(selected + "/7");
    });

    $("body").on("click", ".choose_substitude", function (e) {
      $(this).find(".aboutplayer").toggleClass("active");
      var selectId = [];
      var categorie = [];
      $(".choose_substitude .active").each(function () {
        var categorieHtml = $(this).closest("div").find(".categorie").html();
        if (selectId.length >= 5) {
          $.notify("Select only 5 players.", "info");
          $(this).removeClass("active");
        } else {
          selectId.push(
            $(this).closest("div").find(".categorie").attr("data-id")
          );
          if (
            $.inArray(
              $(this).closest("div").find(".categorie").html(),
              categorie
            ) == -1
          ) {
            categorie.push($(this).closest("div").find(".categorie").html());
          }
          if (
            selectId.length >= 5 &&
            $.inArray("Goalkeeper", categorie) == -1
          ) {
            $.notify("Please choose a goalkeeper.", "info");
          } else if (selectId.length >= 5 && categorie.length < 4) {
            $.notify(
              "Please choose at least one player from each position.",
              "info"
            );
          } else if (selectId.length == 5) {
            console.log("fineeee");
          }
        }
        // else if(selectId.length>=5 && categorie.length<4){
        //     $.notify("Please chose a player to remaning category.", "info");
        // }else if(selectId.length>=5 && $.inArray("Goalkeeper",categorie)==-1){
        //     $.notify("Please choose a goalkeeper.", "info");
        // }
      });
    });

    $("body").on("click", ".choose_captain", function (e) {
      // if($(this).closest('div').find('.categorie').html()=="Goalkeeper"){
      //     $.notify("Can not select goalkeeper.", "info");
      // }else{
      $(this).toggleClass("captain_icon");
      var selectId = [];
      $(".captain_icon").each(function () {
        if (selectId.length >= 1) {
          $.notify("Select only 1 captain.", "info");
          $(this).removeClass("captain_icon");
        } else if (selectId.length === 0) {
          console.log(
            $(this).closest("div").find(".categorie").attr("data-id")
          );
          selectId.push(
            $(this).closest("div").find(".categorie").attr("data-id")
          );
        } else {
          $(this).removeClass("captain_icon");
          $.notify("Can not select 2 captain.", "info");
        }
      });
      //}
    });

    $("body").on("click", "#goalkeeper_detail", function (e) {
      var category_name = $(this).closest("div").find(".categorie").html();
      var player_name = $(this).closest("div").find("h4").html();
      var total_points =
        "Total Fantasy Points : " +
        $(this).closest("div").find(".total_points").val();
      var cgw_points =
        "Current GW points : " +
        $(this).closest("div").find(".cmg_totalpoints").val();
      var totalpicks =
        "Total Picks : " + $(this).closest("div").find(".total_picks").val();
      var gm_picks =
        "Picks current GW : " + $(this).closest("div").find(".gm_picks").val();
      var total_cap =
        "Total Times Captained : " +
        $(this).closest("div").find(".total_cap").val();
      var cgw_cap =
        "Current GW Captain : " + $(this).closest("div").find(".cgw_cap").val();
      // alert(total_points);

      $("#total_p_points").html(total_points);
      $("#total_cgw_points").html(cgw_points);
      $("#category_model").html(category_name);
      $("#player_name_model").html(player_name);
      $("#total_picks_id").html(totalpicks);
      $("#gm_picks").html(gm_picks);
      $("#total_cap").html(total_cap);
      $("#cgw_cap").html(cgw_cap);
    });

    $("body").on("click", "#defender_detail", function (e) {
      var category_name = $(this).closest("div").find(".categorie").html();
      var player_name = $(this).closest("div").find("h4").html();
      var total_points =
        "Total Fantasy Points : " +
        $(this).closest("div").find(".total_points").val();
      var cgw_points =
        "Current GW points : " +
        $(this).closest("div").find(".cmg_totalpoints").val();
      var totalpicks =
        "Total Picks : " + $(this).closest("div").find(".total_picks").val();
      var gm_picks =
        "Picks current GW : " + $(this).closest("div").find(".gm_picks").val();
      var total_cap =
        "Total Times Captained : " +
        $(this).closest("div").find(".total_cap").val();
      var cgw_cap =
        "Current GW Captain : " + $(this).closest("div").find(".cgw_cap").val();
      // alert(total_points);
      $("#total_p_points").html(total_points);
      $("#total_cgw_points").html(cgw_points);
      $("#category_model").html(category_name);
      $("#player_name_model").html(player_name);
      $("#total_picks_id").html(totalpicks);
      $("#gm_picks").html(gm_picks);
      $("#total_cap").html(total_cap);
      $("#cgw_cap").html(cgw_cap);
    });

    $("body").on("click", "#midfielder_detail", function (e) {
      var category_name = $(this).closest("div").find(".categorie").html();
      var player_name = $(this).closest("div").find("h4").html();
      var total_points =
        "Total Fantasy Points : " +
        $(this).closest("div").find(".total_points").val();
      var cgw_points =
        "Current GW points : " +
        $(this).closest("div").find(".cmg_totalpoints").val();
      var totalpicks =
        "Total Picks : " + $(this).closest("div").find(".total_picks").val();
      var gm_picks =
        "Picks current GW : " + $(this).closest("div").find(".gm_picks").val();
      var total_cap =
        "Total Times Captained : " +
        $(this).closest("div").find(".total_cap").val();
      var cgw_cap =
        "Current GW Captain : " + $(this).closest("div").find(".cgw_cap").val();
      // alert(cgw_cap);
      // alert(total_points);

      $("#total_p_points").html(total_points);
      $("#total_cgw_points").html(cgw_points);
      $("#category_model").html(category_name);
      $("#player_name_model").html(player_name);
      $("#total_picks_id").html(totalpicks);
      $("#gm_picks").html(gm_picks);
      $("#total_cap").html(total_cap);
      $("#cgw_cap").html(cgw_cap);
    });

    $("body").on("click", "#forward_detail", function (e) {
      var category_name = $(this).closest("div").find(".categorie").html();
      var player_name = $(this).closest("div").find("h4").html();
      var total_points =
        "Total Fantasy Points : " +
        $(this).closest("div").find(".total_points").val();
      var cgw_points =
        "Current GW points : " +
        $(this).closest("div").find(".cmg_totalpoints").val();
      var totalpicks =
        "Total Picks : " + $(this).closest("div").find(".total_picks").val();
      var gm_picks =
        "Picks current GW : " + $(this).closest("div").find(".gm_picks").val();
      var total_cap =
        "Total Times Captained : " +
        $(this).closest("div").find(".total_cap").val();
      var cgw_cap =
        "Current GW Captain : " + $(this).closest("div").find(".cgw_cap").val();
      // alert(cgw_cap);
      // alert(total_points);

      $("#total_p_points").html(total_points);
      $("#total_cgw_points").html(cgw_points);
      $("#category_model").html(category_name);
      $("#player_name_model").html(player_name);
      $("#total_picks_id").html(totalpicks);
      $("#gm_picks").html(gm_picks);
      $("#total_cap").html(total_cap);
      $("#cgw_cap").html(cgw_cap);
    });
  });
</script>

@endsection
