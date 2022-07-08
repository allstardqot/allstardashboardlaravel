@extends('layouts.web.main') @section('title', ' Home') @section('content')

<main style="background: #12133d">
  <div class="navmate">
    <div class="row w-100 align-items-center pb-5">
      <div class="col-lg-7 text-white">
        <div class="col-12 container col-lg-9">
          <div class="sdndj67">
            <h3 style="font-size: 2em">Fantasy Football As It Should Be</h3>
            <h1 style="font-size: 3em">
              <b>Join for the Hat-Tricks - Stay for the Mates</b>
            </h1>
          </div>
          <p class="pregraph">
            At Fantasy Allstars, football and community go hand in hand. You
            challenge the next Guardiolas and future Klopps today but join them
            to watch El Clásico tomorrow. Winning means little to our crypto
            fantasy community if we can’t share the joy.
          </p>
          <a href="{{url('/register')}}">
          <button class="bou">Start Playing</button>
          </a>
          <a class="ml-3 text-white" href="{{url('/how_to_play')}}"><b>Learn More</b></a>
        </div>
      </div>
      <div class="col-lg-5 mt-5">
        <img
          class="jhdhdfjh img-fluid"
          src="{{ asset('public/img/Group%2042(1).png') }}"
          width="100%"
        />
      </div>
    </div>
  </div>
  <div class="leftSide slide-one">
    <div class="row">
      <div class="col-lg-10 col-11 mx-auto">
        <div class="row align-items-center allstar-about-all mb-5">
          <div class="col-md-6 mb-4 mb-md-0">
            <div class="content">
              <h1 class="heading">
                Allstars Fantasy - Fantasy Football on the Blockchain .
              </h1>
              <h3>
                AllStars Fantasy is the most social, intuitive and trustworthy
                cryptocurrency fantasy football manager platform ever. We use
                blockchain technology to unite fans and give them a voice.
              </h3>

              <a href="http://3.110.104.72/offer" class="btn btn-danger buy-token">BUY TOKEN</a>
              <a
                href="http://3.110.104.72/public/assets/img/image/Fantasy Allstars Whitepaper - Final.pdf"
                target="_blank"
                class="btn btn-danger"
                >WHITEPAPER</a
              >
            </div>
          </div>
          <div class="col-md-6">
            <div class="image">
              <img
                src="{{ asset('public/img/coin-big.svg') }}"
                class="img-fluid"
                alt=""
              />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-lg-6 mt-lg-5 mt-2 text-center text-white">
            <img
              class="img-fluid w-100"
              src="{{ asset('public/img/Group%2053.png') }}"
            />
          </div>
          <div
            class="col-12 col-lg-6 text-white d-flex align-items-center dfjdfjk"
          >
            <div class="w-100 text-center mt-3">
              <h1 class="sdhnsk7"><b>Become a Champ and Have Fun</b></h1>
              <p class="pregraph">
                Pit your wits against top managers in public leagues and
                challenge your friends in private pools. Engage in weekly
                head-to-head duels, pick super-talented players and join the
                banter. Once you are done, collect your prizes!
              </p>
              <a href="{{url('/register')}}">
              <button class="boutton"><b>Join Now</b></button>
</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-10 col-11 w-100 text-center py-5 text-white mx-auto">
        <h1><b>How Does It Work?</b></h1>
        <p class="asbsyt" class="pregraph">
          Kick off your crypto football adventure as soon as you join. No crowd
          delays, difficult owners and self-indulgent football divas. Log in,
          buy your coins and start competing in three simple steps.
        </p>
      </div>
      <div class="col-lg-11 col-11 mx-auto">
        <div class="row">
          <div class="col-12 col-lg-4 text-center text-white">
            <img
              src="{{ asset('public/img/Step%2002.png') }}"
              class="img-fluid"
            />
            <h3><b>Choose Your Allstars</b></h3>
            <p>
              Pick a winning team of 7 by Choosing Your Favorite Players. Show
              your Management skills by selecting your starting 5 Allstars each
              week.
            </p>
          </div>
          <div class="col-12 col-lg-4 text-center text-white">
            <img src="{{ asset("public/img/Step%2003.png") }}" class="img-fluid"
            / >
            <h3><b>Fund Your Wallet</b></h3>
            <p>
              Buy Allstar Fantasy Coins (AFC) on major DEXs and on-site Payment
              Providers. Use AFC to buy-in Allstars Fantasy contests.
            </p>
          </div>

          <div class="col-12 col-lg-4 text-center text-white">
            <img
              class="img-fluid"
              src="{{ asset('public/img/Step%2004.png') }}"
            />
            <h3>Compete and Win</h3>
            <p>
              Challenge the best managers in public pools and battle your
              friends in private tournaments. When your players perform well,
              you win and we all celebrate with you.
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
                  >Fantasy Allstars Reinvents the Fantasy Football Experience
                  and Puts Community First!</b
                >
              </h3>
              <p class="pregraph1">
                Become the next Mourinho but without the Special One’s gloating
                when he wins and tantrums when he loses. Win or lose, the
                Allstars community is always there for you. Everyone shares your
                joy when you win and helps you get back on your feet when you
                are down on your luck.
              </p>
              <a href="{{url('/register')}}">
              <button class="boutt"><b>Join Now</b></button>
              </a>
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
