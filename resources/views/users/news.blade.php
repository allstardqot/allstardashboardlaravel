@extends('layouts.user')
@section('title','Latest News')
@section('content')

<main>
  <div class="jdfhhdfuien">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-8 mt-4">
          <div class="jhyt67">
            <h3 class="text-white mt-3"><b>Latest News</b></h3>
            <p class="text-white">
              Nullam lectus magna, dignissim tempus est in, volutpat
              scelerisque tortor. Curabitur nec ex risus.
            </p>
            {{-- @foreach ($newsdata as $newsValue) --}}
            <div class="news-big">
              <img class="yhgt678" src="{{asset('public/assets/image/Rectangle%20308.jpg')}}" />
              <h3 class="text-white mt-3">
                <b>Lorem ipsum dolor sit amet</b>
              </h3>
              <h6 class="hgyu7889">
                May 31, 2019 l by User l Comments (2)
              </h6>
              <p class="text-white mt-3">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In
                aliquam ipsum vitae dapibus lobortis. Proin nec nibh ligula.
                Fusce non elit vitae arcu dictum dapibus sit amet in enim.
                Aenean nibh nisl, dapibus vel tellus a, gravida tincidunt
                ex. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            
              </p>
              <a href="javascript:void(0)" class="mt-2 hgft432 newshideShow">Read More</a>
              <p class="hidepara">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In
                aliquam ipsum vitae dapibus lobortis. Proin nec nibh ligula.
                Fusce non elit vitae arcu dictum dapibus sit amet in enim.
                Aenean nibh nisl, dapibus vel tellus a, gravida tincidunt
                ex. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In
                aliquam ipsum vitae dapibus lobortis. Proin nec nibh ligula.</p>
            </div>
            {{-- @endforeach --}}
            <div class="news-big">
              <img class="mt-4 yhgt678" src="{{asset('public/assets/image/Rectangle%20308.png')}}" />
              <h3 class="text-white mt-3">
                <b>Lorem ipsum dolor sit amet</b>
              </h3>
              <h6 class="hgyu7889">
                May 31, 2019 l by User l Comments (2)
              </h6>
              <p class="text-white mt-3">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In
                aliquam ipsum vitae dapibus lobortis. Proin nec nibh ligula.
                Fusce non elit vitae arcu dictum dapibus sit amet in enim.
                Aenean nibh nisl, dapibus vel tellus a, gravida tincidunt
                ex. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              </p>
              <a href="#" class="mt-2 hgft432">Read More</a>
            </div>
            <div class="news-big">
              <img
                class="yhgt678 mt-4"
                src="{{asset('public/assets/image/Rectangle%20308(1).jpg')}}"
              />
              <h3 class="text-white mt-3">
                <b>Lorem ipsum dolor sit amet</b>
              </h3>
              <h6 class="hgyu7889">
                May 31, 2019 l by User l Comments (2)
              </h6>
              <p class="text-white mt-4">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In
                aliquam ipsum vitae dapibus lobortis. Proin nec nibh ligula.
                Fusce non elit vitae arcu dictum dapibus sit amet in enim.
                Aenean nibh nisl, dapibus vel tellus a, gravida tincidunt
                ex. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              </p>
              <a href="#" class="mt-2 hgft432">Read More</a>
            </div>
            <div class="news-big">
              <img
                class="mt-4 yhgt678"
                src="{{asset('public/assets/image/Rectangle%20308(1).png')}}"
              />
              <h3 class="text-white mt-3">
                <b>Lorem ipsum dolor sit amet</b>
              </h3>
              <h6 class="hgyu7889">
                May 31, 2019 l by User l Comments (2)
              </h6>
              <p class="text-white mt-4">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In
                aliquam ipsum vitae dapibus lobortis. Proin nec nibh ligula.
                Fusce non elit vitae arcu dictum dapibus sit amet in enim.
                Aenean nibh nisl, dapibus vel tellus a, gravida tincidunt
                ex. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              </p>
              <a href="#" class="mt-2 hgft432">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 text-white hgtyr56">
          <div class="jhays56">
            <ul class="lkjiio458">
              <h3 class="hgy78">Recent Posts</h3>
            </ul>
            <div class="mkj55">
              <a class="latest-news-listing hgy789056" href="">
                <img src="{{asset('public/assets/image/Rectangle%20312(1).png')}}" />
                <div>
                  <p class="jhgsty"><b>Lorem ipsum sit amet</b></p>
                  <p class="jhgsty">
                    Consectetur adip iscing elit, sed do eiusmod.
                  </p>
                </div>
              </a>
            </div>
            <hr class="lkio90" />
            <div class="mkj55">
              <a class="latest-news-listing hgy789056" href="">
                <img src="{{asset('public/assets/image/Rectangle%20312(1).png')}}" />
                <div>
                  <p class="jhgsty"><b>Lorem ipsum sit amet</b></p>
                  <p class="jhgsty">
                    Consectetur adip iscing elit, sed do eiusmod.
                  </p>
                </div>
              </a>
            </div>
            <hr class="lkio90" />
            <div class="mkj55">
              <a class="latest-news-listing hgy789056" href="">
                <img src="{{asset('public/assets/image/Rectangle%20312(1).png')}}" />
                <div>
                  <p class="jhgsty"><b>Lorem ipsum sit amet</b></p>
                  <p class="jhgsty">
                    Consectetur adip iscing elit, sed do eiusmod.
                  </p>
                </div>
              </a>
            </div>
            <hr class="lkio90" />
            <div class="mkj55">
              <a class="latest-news-listing hgy789056" href="">
                <img src="{{asset('public/assets/image/Rectangle%20312(1).png')}}" />
                <div>
                  <p class="jhgsty"><b>Lorem ipsum sit amet</b></p>
                  <p class="jhgsty">
                    Consectetur adip iscing elit, sed do eiusmod.
                  </p>
                </div>
              </a>
            </div>
            <hr class="lkio90" />
            <div class="mkj55">
              <a class="latest-news-listing hgy789056" href="">
                <img src="{{asset('public/assets/image/Rectangle%20312(1).png')}}" />
                <div>
                  <p class="jhgsty"><b>Lorem ipsum sit amet</b></p>
                  <p class="jhgsty">
                    Consectetur adip iscing elit, sed do eiusmod.
                  </p>
                </div>
              </a>
            </div>
            <hr class="lkio90" />
            <div class="mkj55">
              <a class="latest-news-listing hgy789056" href="">
                <img src="{{asset('public/assets/image/Rectangle%20312(1).png')}}" />
                <div>
                  <p class="jhgsty"><b>Lorem ipsum sit amet</b></p>
                  <p class="jhgsty">
                    Consectetur adip iscing elit, sed do eiusmod.
                  </p>
                </div>
              </a>
            </div>
            <hr class="lkio90" />
            <div class="mkj55">
              <a class="latest-news-listing hgy789056" href="">
                <img src="{{asset('public/assets/image/Rectangle%20312(1).png')}}" />
                <div>
                  <p class="jhgsty"><b>Lorem ipsum sit amet</b></p>
                  <p class="jhgsty">
                    Consectetur adip iscing elit, sed do eiusmod.
                  </p>
                </div>
              </a>
            </div>
            <hr class="lkio90" />
            <div class="mkj55">
              <a class="latest-news-listing hgy789056" href="">
                <img src="{{asset('public/assets/image/Rectangle%20312(1).png')}}" />
                <div>
                  <p class="jhgsty"><b>Lorem ipsum sit amet</b></p>
                  <p class="jhgsty">
                    Consectetur adip iscing elit, sed do eiusmod.
                  </p>
                </div>
              </a>
            </div>
            <hr class="lkio90" />
            <div class="mkj55">
              <a class="latest-news-listing hgy789056" href="">
                <img src="{{asset('public/assets/image/Rectangle%20312(1).png')}}" />
                <div>
                  <p class="jhgsty"><b>Lorem ipsum sit amet</b></p>
                  <p class="jhgsty">
                    Consectetur adip iscing elit, sed do eiusmod.
                  </p>
                </div>
              </a>
            </div>
            <hr class="lkio90" />
            <div class="mkj55">
              <a class="latest-news-listing hgy789056" href="">
                <img src="{{asset('public/assets/image/Rectangle%20312(1).png')}}" />
                <div>
                  <p class="jhgsty"><b>Lorem ipsum sit amet</b></p>
                  <p class="jhgsty">
                    Consectetur adip iscing elit, sed do eiusmod.
                  </p>
                </div>
              </a>
            </div>
            <hr class="lkio90" />
            <div class="mkj55">
              <a class="latest-news-listing hgy789056" href="">
                <img src="{{asset('public/assets/image/Rectangle%20312(1).png')}}" />
                <div>
                  <p class="jhgsty"><b>Lorem ipsum sit amet</b></p>
                  <p class="jhgsty">
                    Consectetur adip iscing elit, sed do eiusmod.
                  </p>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

@endsection
