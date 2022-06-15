@extends('layouts.web.main') 
@section('title', ' Home')
@section('content')

<main>
  <div class="navmate">
    <div class="row w-100">
      <div class="col-lg-6 text-white agjustHome">
        <div class="col-12 container col-lg-9">
          <div class="sdndj67">
            <h3 style="font-size: 3em">A Fantasy Football Communit</h3>
            <h1 style="font-size: 5em"><b>Coming Soon</b></h1>
          </div>
          <p class="pregraph">
            Fantasy Allstars is for people who believe football and community go
            hand in hand. All our energy and focus will be on creating an
            experience where all members enjoy Fantasy Football within a
            close-knit community...
          </p>
          <button class="bou">Start Invest</button>
          <a class="ml-3 text-white" href=""><b>Learn More</b></a>
        </div>
      </div>
      <div class="col-lg-6">
        <img
          class="jhdhdfjh"
          src="{{ asset('public/img/Group%2042(1).png') }}"
          width="100%"
        />
      </div>
    </div>
  </div>
  <div class="leftSide slide-one">
    
    <div class="row">
    <div class="col-lg-10 col-11 mx-auto">
      <div class="row ">
        <div class="col-12 col-lg-6 mt-lg-5 mt-2 text-center text-white">
          <img
            class="img-fluid w-100"
            src="{{ asset('public/img/Group%2053.png') }}"
          />
        </div>
        <div class="col-12 col-lg-6 text-white d-flex align-items-center dfjdfjk">
          <div class="w-100 text-center mt-3">
            <h1 class="sdhnsk7" ><b>How to play?</b></h1>
            <p class="pregraph">
              Play in public league. play in private league with<br />
              friends. Play our Head-to-Head war games.<br />
              manage your team through transfers. Interact<br />
              with other managers in the community. win<br />
              prizes.
            </p>
            <button class="boutton"><b>Join Now</b></button>
          </div>
        </div>
      </div>
    </div>
      <div class="col-lg-10 col-11 w-100 text-center py-5 text-white mx-auto">
        <h1><b>How it works?</b></h1>
        <p class="asbsyt" class="pregraph">
          Sint anim laboris in dolore deserunt. Exercitation commodo nostrud
          reprehenderit ut ut.<br />
          Aute amet irure cupidatat occaecat minim eiusmod ea cupidatat.
        </p>
      </div>
      <div class="col-lg-11 col-11 mx-auto">
        <div class="row">
          <div class="col-12 col-lg-4 text-center text-white">
            <img src="{{ asset('public/img/Step%2002.png') }}" />
            <h3><b>Buy coins</b></h3>
            <p>
              Use credit card to add your money to<br />
              your PredictionStrike account anytime<br />
              you want
            </p>
          </div>
          <div class="col-12 col-lg-4 text-center text-white">
            <img src="{{ asset('public/img/Step%2003.png') }}" />
            <h3><b>Pick team</b></h3>
            <p>
              Buy and own shares of your favorite<br />
              players just like you would a real stock
            </p>
          </div>
          <div class="col-12 col-lg-4 text-center text-white">
            <img src="{{ asset('public/img/Step%2004.png') }}" />
            <h3>
              <b
                >compete in public or<br />
                private pools</b
              >
            </h3>
            <p>
              The value of players and team will<br />
              increase or decrease based on upon
            </p>
          </div>
        </div>
      </div>
    </div>
   
    <div class="mt-lg-5 mt-2 py-3 nahtysdr">
      <div class="col-11 col-lg-11 mx-auto">
        <div class="row w-100">
          <div
            class="col-lg-8 col-12 text-white d-flex align-items-center justify-content-sm-center"
          >
            <div class="text-center text-lg-left">
              <h3 class="heading">
                <b
                  >Fantasy All-Stars offers the best<br />
                  fantasy sports experience online.</b
                >
              </h3>
              <p class="pregraph1">
                Play in public leagues, private leagues with friends, or<br />
                compete against the community with our weekly head-to-<br />head
                War games.
              </p>
              <button class="boutt"><b>Join Now</b></button>
            </div>
          </div>
          <div class="col-sm-4">
            <img
              class="img-fluid"
              src="{{ asset('public/img/Group%2046.png') }}"
            />
          </div>
        </div>
      </div>
    </div>
    <div class="rightSide">
      <img src="{{ asset('public/img/Pattern(1).png') }}" />
    </div>
    <!-- <div class="col-lg-11 mx-auto text-white text-center py-5">
      <h1><b>Upcoming Match</b></h1>
      <p class="pregraph">
        Sint anim laboris in dolore deserunt. Exercitation commodo nostrud
        reprehenderit ut ut.<br />
        Aute amet irure cupidatat occaecat minim eiusmod ea cupidatat.
      </p>
      <button class="boutt1"><b>Join Now</b></button>
      <div class="row mt-4 justify-content-center">
        <div class="col-md-6 col-lg-3 col-sm-6">
          <div class="upcoming-main">
            <div class="upcoming-match">
              <div class="team">
                <img
                  src=" {{ asset('public/img/team-1.png') }}"
                  class="img-fluid"
                  alt=""
                />
                <h6>TEN</h6>
              </div>
              <div class="center-time">
                <small>27 Sep</small>
                <h3>1:00</h3>
                <strong>EDT</strong>
              </div>
              <div class="team">
                <img
                  src=" {{ asset('public/img/team-2.png') }}"
                  class="img-fluid"
                  alt=""
                />
                <h6>LAR</h6>
              </div>
            </div>
            <div class="match-ft">
              <span class="time">1d 12h 54m</span>
              <a href="#" class="btn btn-light">Trade Now</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-sm-6">
          <div class="upcoming-main">
            <div class="upcoming-match">
              <div class="team">
                <img
                  src=" {{ asset('public/img/team-1.png') }}"
                  class="img-fluid"
                  alt=""
                />
                <h6>TEN</h6>
              </div>
              <div class="center-time">
                <small>27 Sep</small>
                <h3>1:00</h3>
                <strong>EDT</strong>
              </div>
              <div class="team">
                <img
                  src=" {{ asset('public/img/team-2.png') }}"
                  class="img-fluid"
                  alt=""
                />
                <h6>LAR</h6>
              </div>
            </div>
            <div class="match-ft">
              <span class="time">1d 12h 54m</span>
              <a href="#" class="btn btn-light">Trade Now</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-sm-6">
          <div class="upcoming-main">
            <div class="upcoming-match">
              <div class="team">
                <img
                  src=" {{ asset('public/img/team-1.png') }}"
                  class="img-fluid"
                  alt=""
                />
                <h6>TEN</h6>
              </div>
              <div class="center-time">
                <small>27 Sep</small>
                <h3>1:00</h3>
                <strong>EDT</strong>
              </div>
              <div class="team">
                <img
                  src=" {{ asset('public/img/team-2.png') }}"
                  class="img-fluid"
                  alt=""
                />
                <h6>LAR</h6>
              </div>
            </div>
            <div class="match-ft">
              <span class="time">1d 12h 54m</span>
              <a href="#" class="btn btn-light">Trade Now</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 col-sm-6">
          <div class="upcoming-main">
            <div class="upcoming-match">
              <div class="team">
                <img
                  src=" {{ asset('public/img/team-1.png') }}"
                  class="img-fluid"
                  alt=""
                />
                <h6>TEN</h6>
              </div>
              <div class="center-time">
                <small>27 Sep</small>
                <h3>1:00</h3>
                <strong>EDT</strong>
              </div>
              <div class="team">
                <img
                  src=" {{ asset('public/img/team-2.png') }}"
                  class="img-fluid"
                  alt=""
                />
                <h6>LAR</h6>
              </div>
            </div>
            <div class="match-ft">
              <span class="time">1d 12h 54m</span>
              <a href="#" class="btn btn-light">Trade Now</a>
            </div>
          </div>
        </div>
      </div>
    </div> -->
  </div>
</main>

@endsection
