@extends('layouts.user')
@section('title','My Team')
@section('content')

 <main>
    <div class="managing">
      <div class="container-fluid">
        <h3 class="text-white mt-5 text-center">Managing Squad<?php //pr($midfielderData); ?></h3>
        <ul class="progressbar text-white jsdhsjdh">
          <li class="active">Step - 1</li>
          <li>Step - 2</li>
          <li>Step - 3</li>
        </ul>
        <h4 class="text-white text-center sdjskldj">
          From your 7-player squad, select 5 players by the Gameweek deadline
          to form your team.
        </h4>

        <div class="m-bg text-white sdjkdxjnh">
          <div class="first-row-check">
            <h5>Goalkeeper</h5>
            <div class="playerspot">
              <img src="{{$goalkeeperData['image_path']}}" />
              <div class="aboutplayer">
                <h4>{{$goalkeeperData['fullname']}}</h4>
                <p>Goalkeeper</p>
                <div class="playerdetails">
                  <p>18 CGW Point</p>
                  <p>104 T F Points</p>
                </div>
                <p>$5.25 M</p>
              </div>
              <a
                class="skdhhjh"
                href=""
                data-bs-toggle="modal"
                data-bs-target="#myModal"
                >View Details</a
              >
            </div>
          </div>

          <div class="second-row-check">
            <div class="greatplayer">
              <div class="playerspot">
                <img src="{{$defenderData[0]['image_path']}}" />
                <div class="aboutplayer">
                  <h4>{{$defenderData[0]['fullname']}}</h4>
                  <p>Forward</p>
                  <div class="playerdetails">
                    <p>18 CGW Point</p>
                    <p>104 T F Points</p>
                  </div>
                  <p>$5.25 M</p>
                </div>
                <a
                  class="sdhdhsnik"
                  href=""
                  data-bs-toggle="modal"
                  data-bs-target="#myModal"
                  >View Details</a
                >
              </div>
            </div>

            <div class="area-title hide-mob"><h5>Defenders</h5></div>
            <div class="greatplayer">
              <div class="playerspot">
                <img src="{{$defenderData[1]['image_path']}}" />
                <div class="aboutplayer">
                  <h4>{{$defenderData[1]['fullname']}}</h4>
                  <p>Forward</p>
                  <div class="playerdetails">
                    <p>18 CGW Point</p>
                    <p>104 T F Points</p>
                  </div>
                  <p>$5.25 M</p>
                </div>
                <a
                  class="sdhdhsnik"
                  href=""
                  data-bs-toggle="modal"
                  data-bs-target="#myModal"
                  >View Details</a
                >
              </div>
            </div>
          </div>
          <div class="area-title hide-desk"><h5>Defenders</h5></div>

          <div class="third-row-check">
            <div class="greatplayer">
              <div class="playerspot">
                <img src="{{$midfielderData[0]['image_path']}}" />
                <div class="aboutplayer">
                  <h4>{{$midfielderData[0]['fullname']}}</h4>
                  <p>Forward</p>
                  <div class="playerdetails">
                    <p>18 CGW Point</p>
                    <p>104 T F Points</p>
                  </div>
                  <p>$5.25 M</p>
                </div>
                <a
                  class="sdhdhsnik"
                  href=""
                  data-bs-toggle="modal"
                  data-bs-target="#myModal"
                  >View Details</a
                >
              </div>
            </div>
            <div class="area-title hide-mob"><h5>Midfielders</h5></div>
            <div class="greatplayer">
              <div class="playerspot">
                <img src="{{$midfielderData[1]['image_path']}}" />
                <div class="aboutplayer">
                  <h4>{{$midfielderData[1]['fullname']}}</h4>
                  <p>Forward</p>
                  <div class="playerdetails">
                    <p>18 CGW Point</p>
                    <p>104 T F Points</p>
                  </div>
                  <p>$5.25 M</p>
                </div>
                <a
                  class="sdhdhsnik"
                  href=""
                  data-bs-toggle="modal"
                  data-bs-target="#myModal"
                  >View Details</a
                >
              </div>
            </div>
          </div>
          <div class="area-title hide-desk"><h5>Midfielders</h5></div>
          <div class="fourth-row-check">
            <div class="greatplayer">
              <div class="playerspot">
                <img src="{{$forwardData[0]['image_path']}}" />
                <div class="aboutplayer">
                  <h4>{{$forwardData[0]['fullname']}}</h4>
                  <p>Forward</p>
                  <div class="playerdetails">
                    <p>18 CGW Point</p>
                    <p>104 T F Points</p>
                  </div>
                  <p>$5.25 M</p>
                </div>
                <a
                  class="sdhdhsnik"
                  href=""
                  data-bs-toggle="modal"
                  data-bs-target="#myModal"
                  >View Details</a
                >
              </div>
            </div>
            <div class="area-title hide-mob"><h5>Forward</h5></div>
            <div class="greatplayer">
              <div class="playerspot">
                <img src="{{$forwardData[1]['image_path']}}" />
                <div class="aboutplayer">
                  <h4>{{$forwardData[1]['fullname']}}</h4>
                  <p>Forward</p>
                  <div class="playerdetails">
                    <p>18 CGW Point</p>
                    <p>104 T F Points</p>
                  </div>
                  <p>$5.25 M</p>
                </div>
                <a
                  class="sdhdhsnik"
                  href=""
                  data-bs-toggle="modal"
                  data-bs-target="#myModal"
                  >View Details</a
                >
              </div>
            </div>
          </div>
          <div class="area-title hide-desk"><h5>Forward</h5></div>
        </div>
      </div>
      <div class="container-fluid sdjkdxjnh">
        <div class="row sdhjdjsd">
          <div class="col-lg-4 col-4 text-lg-left">
            <a
              href="#"
              class="form-control btnColor mt-4 order-last order-lg-first dfhdhfjkh"
            >
              Back</a
            >
          </div>

          <div class="col-lg-4 col-4 text-lg-right text-right">
            <a href="#" class="form-control btnColor mt-4 sdjhsdjh ml-auto">
              Next</a
            >
          </div>
        </div>
      </div>

      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog text-white">
          <!-- Modal content-->
          <div class="modal-content djffhhxjm">
            <div class="modal-header mt-5 dcjckjm">
              <h4 class="modal-title jdxksdjjm">Tammy Johnson</h4>
            </div>
            <div class="modal-body text-center">
              <p class="jsdhjdh">Forward</p>
              <p class="jsdhjdh">Total Fantasy Points:xxx</p>
              <p class="jsdhjdh">Current GW points: xxx</p>
              <p class="jsdhjdh">Total Picks: xx</p>
              <p class="jsdhjdh">Picks current GW: xx</p>
              <p class="jsdhjdh">Total Times Captained: xx</p>
              <p class="jsdhjdh">Current GW Captain: xx</p>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-default fjdfjjh"
                data-bs-dismiss="modal"
              >
                Close
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  @endsection
