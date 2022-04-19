@extends('layouts.user')
@section('title','My Team')
@section('content')
<main>
    <div class="djfd765">
      <div class="container-fluid">
        <h3 class="text-white mt-5 text-center">Managing Squad</h3>
        <ul class="progressbar text-white jsdhsjdh">
          <li class="active">Step - 1</li>
          <li>Step - 2</li>
          <li>Step - 3</li>
        </ul>
        <h4 class="text-white text-center sdjskldj">Enter Team Name</h4>
        <div class="team-name-field">
          <input
            class="team-name-input"
            type="text"
            name="team name"
            placeholder="Enter team name"
          />
        </div>

        <div class="m-bg text-white djkdxjnh">
          <div class="first-row-check">
            <h5>Playing 5</h5>
            <div class="playerspot orangebg">
              <img src="{{asset('public/assets/image/image.png')}}" />
              <div class="aboutplayer">
                <h4>Tammy Johnson</h4>
                <p>Forward</p>
                <div class="playerdetails">
                  <p>18 CGW Point</p>
                  <p>104 T F Points</p>
                </div>
                <p>$5.25 M</p>
              </div>
              <a
                class="kdjkjd"
                href=""
                data-bs-toggle="modal"
                data-bs-target="#myModal"
                >View Details</a
              >
            </div>
          </div>

          <div class="second-row-check">
            <div class="second-first">
              <div class="greatplayer">
                <div class="playerspot">
                  <img src="{{asset('public/assets/image/image.png')}}" />
                  <div class="aboutplayer">
                    <h4>Tammy Johnson</h4>
                    <p>Forward</p>
                    <div class="playerdetails">
                      <p>18 CGW Point</p>
                      <p>104 T F Points</p>
                    </div>
                    <p>$5.25 M</p>
                  </div>
                  <a
                    href=""
                    class="kdjkjd"
                    data-bs-toggle="modal"
                    data-bs-target="#myModal"
                    >View Details</a
                  >
                </div>
              </div>
              <div class="greatplayer">
                <div class="playerspot">
                  <img src="{{asset('public/assets/image/image.png')}}" />
                  <div class="aboutplayer">
                    <h4>Tammy Johnson</h4>
                    <p>Forward</p>
                    <div class="playerdetails">
                      <p>18 CGW Point</p>
                      <p>104 T F Points</p>
                    </div>
                    <p>$5.25 M</p>
                  </div>
                  <a
                    href=""
                    class="kdjkjd"
                    data-bs-toggle="modal"
                    data-bs-target="#myModal"
                    >View Details</a
                  >
                </div>
              </div>
            </div>
            <div class="second-first dfndfmn">
              <div class="greatplayer">
                <div class="playerspot">
                  <img src="{{asset('public/assets/image/image.png')}}" />
                  <div class="aboutplayer">
                    <h4>Tammy Johnson</h4>
                    <p>Forward</p>
                    <div class="playerdetails">
                      <p>18 CGW Point</p>
                      <p>104 T F Points</p>
                    </div>
                    <p>$5.25 M</p>
                  </div>
                  <a
                    href=""
                    class="kdjkjd"
                    data-bs-toggle="modal"
                    data-bs-target="#myModal"
                    >View Details</a
                  >
                </div>
              </div>
              <div class="greatplayer">
                <div class="playerspot">
                  <img src="{{asset('public/assets/image/image.png')}}" />
                  <div class="aboutplayer">
                    <h4>Tammy Johnson</h4>
                    <p>Forward</p>
                    <div class="playerdetails">
                      <p>18 CGW Point</p>
                      <p>104 T F Points</p>
                    </div>
                    <p>$5.25 M</p>
                  </div>
                  <a
                    href=""
                    class="kdjkjd"
                    data-bs-toggle="modal"
                    data-bs-target="#myModal"
                    >View Details</a
                  >
                </div>
              </div>
            </div>
          </div>
          <div class="area-title 4rep"><h5>Substitute</h5></div>

          <div class="third-row-check">
            <div class="greatplayer">
              <div class="playerspot">
                <img src="{{asset('public/assets/image/image.png')}}" />
                <div class="aboutplayer">
                  <h4>Tammy Johnson</h4>
                  <p>Forward</p>
                  <div class="playerdetails">
                    <p>18 CGW Point</p>
                    <p>104 T F Points</p>
                  </div>
                  <p>$5.25 M</p>
                </div>
                <a
                  href=""
                  class="kdjkjd"
                  data-bs-toggle="modal"
                  data-bs-target="#myModal"
                  >View Details</a
                >
              </div>
            </div>
            <div class="area-title hide-mob"><h5>Substitute</h5></div>
            <div class="greatplayer">
              <div class="playerspot">
                <img src="{{asset('public/assets/image/image.png')}}" />
                <div class="aboutplayer">
                  <h4>Tammy Johnson</h4>
                  <p>Forward</p>
                  <div class="playerdetails">
                    <p>18 CGW Point</p>
                    <p>104 T F Points</p>
                  </div>
                  <p>$5.25 M</p>
                </div>
                <a
                  href=""
                  class="kdjkjd"
                  data-bs-toggle="modal"
                  data-bs-target="#myModal"
                  >View Details</a
                >
              </div>
            </div>
          </div>
          <div class="area-title hide-desk"><h5>Substitute</h5></div>
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

      <!-- Modal -->
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