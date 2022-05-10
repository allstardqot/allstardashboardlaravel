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
            @php
                $i=1;
            @endphp
            @foreach ($newsdata as $newsValue)
                        <p class="text-white mt-3">
              {{ $newsValue['title'] }}
            </p>
            {{-- {{ pr($newsValue) }} --}}
            <div class="news-big">
              <h6 class="hgyu7889">
                {{$newsValue['updated_at']}}
              </h6>
              <p class="text-white mt-3">
                {{$newsValue['localteam']}}


              </p>
              <span id="dots_{{ $i }}">...</span>
              <p class=" text-white" id="more_{{ $i }}" style="display:  none;">
                {{$newsValue['visitorteam']}}</p>
                <button  class="mt-2 hgft432 " onclick="myFunction({{ $i }})" id="myBtn_{{ $i }}">Read More</button>
            </div>
            @php
                $i++;
            @endphp

            @endforeach

          </div>
        </div>
        <div class="col-lg-4 text-white hgtyr56">
            <div class="hjuy4589">
                <h4 class="mt-5 mkuytg">Recent Posts</h4>
                <div class="latest-image-sec">
                    @foreach($newsdata as $key => $value)
                    <div class="latest-card">
                        <a href="{{ url('/latest-news') }}" class="latest-anchor">
                            <img src="{{ asset('public/assets/image/news-1.png') }}" class="img-fluid" alt="" />
                            <div class="news-content">
                                <h4>{{ $value['title'] }}</h4>
                            <p>{!! $value['localteam']!!}</p>

                            {{-- <small>Read More..</small> --}}
                            </div>

                        </a>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
      </div>
    </div>
  </div>
</main>
<script>
  function myFunction(i) {
    // alert(i);
            var dots = document.getElementById("dots_"+i);
            var moreText = document.getElementById("more_"+i);
            var btnText = document.getElementById("myBtn_"+i);

            if (dots.style.display === "none") {
                dots.style.display = "block";
                btnText.innerHTML = "Read more";
                moreText.style.display = "none";
            } else {
                dots.style.display = "none";
                btnText.innerHTML = "Read less";
                moreText.style.display = "block";
            }
        }
</script>

@endsection
