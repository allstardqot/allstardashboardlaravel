@extends('layouts.web.main')
@section('title', ' FAQ')
@section('content')
<main>
  <div class="faq-sec">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="text-center mt-5">
            <h3 class="Frequently">Frequently Asked Questions</h3>
            <img src="{{asset('public/img/Group 56.png')}}" />
          </div>
          <!-- <div class="btn-group">
            <button
              type="button"
              class="btn dropdown-btn"
              data-toggle="dropdown"
              aria-expanded="false"
            >
              <span class="fa fa-arrow-down"></span>
              Dropdown
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Separated link</a>
            </div>
          </div> -->
          <div class="row">
          <div class="col-md-11 mx-auto">
          <ul class="p-0 mt-3 faq-qustion">
            
            @foreach($faq as $key => $value)
            
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                ><span class="fa fa-arrow-down"></span> {{ $value->title }}</a>
              <ul class="dropdown-menu Fantasyone" role="menu">
                <li class="drop-li-sub">
                  {!! $value->description !!}
                </li>
              </ul>
            </li>
            @endforeach
          </ul>
          </div>
</div>
        </div>
      </div>
    </div>
  </div>
  <div class="rightSide1">
    <img src="{{asset('public/img/Pattern(1).png')}}" />
  </div>
</main>
@endsection
