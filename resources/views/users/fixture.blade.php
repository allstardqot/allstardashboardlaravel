@extends('layouts.user') @section('title', 'Fixture Data') @section( 'content')

<section class="fixture-sec">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-10 mx-auto">
        <div class="fixture-card">
          <div class="fixture-head">
            <div class="row justify-content-between">
              <div class="col-md-5 ">
                <div class="head-content">
                  <h3>FIXTURES</h3>
                  <small>{{date('d M Y', strtotime($weeak['starting_at']))}} - {{date('d M Y', strtotime($weeak['ending_at']))}}</small>
                  <a href="#" class="btn btn-danger">Gameweek</a>
                </div>
              </div>
              <div class="col-md-7 ">
                <div class="calendor-btn">



                <form method="POST" action="{{ route('fixture-data') }}">
                    @csrf


                    <div class="input-group">

                      <span class="input-group-text" > <label for="basic-url" class="form-label">Date/Time</label></span>

  <input  class="form-control" type="date" id="start_fixture" name="start_fixture" value="{{!empty($_POST['start_fixture'])?$_POST['start_fixture']:''}}">


  <span class="input-group-text" >
  <label for="basic-url" class="form-label">End Date</label>
</span>
  <input type="date" class="form-control" id="end_fixture" name="end_fixture" value="{{!empty($_POST['end_fixture'])?$_POST['end_fixture']:''}}">
  <span class="input-group-text" >
  <input type="submit" class="btn btn-danger" value="Apply">
</span>

</div>



                </form>
                </div>
              </div>
            </div>
          </div>
          <div class="fixture-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col"><h3>Matches</h3></th>
                  <th scope="col"><h3>Starting Date</h3></th>
                  <th scope="col" class="text-end"><h3>Result</h3></th>

                </tr>
              </thead>
              <tbody>
                @if(!empty($fixturedata))
                @foreach ($fixturedata as $key=>$fixturValue )
                @if(empty($fixturValue['teams1']) && empty($fixturValue['teams2']))
                    @continue
                @endif
                <tr>
                    <td >
                        <div class="tean-show">
                          <div class="tem-one">
                            <span>{{$fixturValue['teams1']['short_code']}}</span>
                            <img
                              class="img-fluid"
                              src="{{$fixturValue['teams1']['logo_path']}}"
                            />
                          </div>

                          <div class="vs-icon">
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              class="icon"
                              height="512"
                              viewBox="0 0 1024 1024"
                              version="1.1"
                            >
                              <path
                                d="M480 64C215.04 64 0 279.04 0 544 0 808.96 215.04 1024 480 1024S960 808.96 960 544C960 279.04 744.96 64 480 64zM448 364.16l-127.36 381.44c-4.48 12.8-16.64 21.76-30.08 21.76s-25.6-8.96-30.08-21.76L133.12 364.16C127.36 347.52 136.32 329.6 152.96 323.84c16.64-5.76 34.56 3.2 40.32 19.84l97.28 291.2 97.28-291.2c5.76-16.64 23.68-25.6 40.32-19.84C444.16 329.6 453.76 347.52 448 364.16zM608.64 512.64C704 512.64 768 563.84 768 640c0 78.08-60.8 127.36-159.36 127.36-92.16 0-159.36-53.76-159.36-127.36 0-17.28 14.08-32 32-32 17.92 0 32 14.08 32 32 0 37.12 39.04 63.36 95.36 63.36 35.84 0 95.36-8.32 95.36-63.36 0-60.8-79.36-63.36-95.36-63.36-95.36 0-159.36-51.2-159.36-127.36 0-78.72 60.8-127.36 159.36-127.36 92.16 0 159.36 53.76 159.36 127.36 0 17.28-14.08 32-32 32S704 467.2 704 449.28c0-37.12-39.04-63.36-95.36-63.36-35.84 0-95.36 8.32-95.36 63.36C513.28 510.08 592.64 512.64 608.64 512.64z"
                              />
                            </svg>
                          </div>

                          <div class="tem-one tem-two">
                            <span>{{$fixturValue['teams2']['short_code']}}</span>
                            <img
                              class="img-fluid"
                              src="{{$fixturValue['teams2']['logo_path']}}"
                            />
                          </div>
                        </div>
                    </td>
                    <td><p>{{$fixturValue['starting_at']}}</p></td>
                    <td class="text-end">
                      @php
                      $scoreData='';
                      if(!empty($fixturValue['scores'])){
                        $scoreData=json_decode($fixturValue['scores'],true);
                      }
                      if(!empty($scoreData)){
                        echo '<h6 class="fs-5 text-white">'.$scoreData['localteam_score'].'/'.$scoreData['visitorteam_score'].'</h6>';
                      }else{
                        echo '<h6 class="fs-5 text-white">1/1</h6>';
                      }
                      @endphp

                      
                  </td>
                      {{-- <td>
                        <div class="fropdown-bar-menu">
                          <div class="dropdown">
                            <button
                              class="btn"
                              type="button"
                              data-bs-toggle="collapse"
                              data-bs-target="#collapseExample{{$key}}"
                              aria-expanded="false"
                              aria-controls="collapseExample"
                            >
                            <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>

                            </button>
                          </div>
                        </div>
                      </td> --}}

                    
                </tr>
               
                {{-- <tr class="collapse" id="collapseExample{{$key}}">
                    <td>
                      <table class="table table-in">
                        <tbody>
                        @if(!empty($fixturValue['player2']) && !empty($fixturValue['player2']))
                        @php
                            $i=1;
                        @endphp
                        @foreach ($fixturValue['player1'] as $player)
                        <tr>
                            <td>
                                <img
                                    class="img-fluid"
                                    src="{{$fixturValue['teams1']['logo_path']}}"
                                  />
                            </td>
                            <td>
                                <span>{{$i}}</span>
                            </td>
                            <td>
                                <span>{{$player['fullname']}}</span>
                            </td>
                            <td>
                                <span>{{getposition($player['position_id'])}}</span>
                            </td>
                            <td>
                                <span>{{$fixturValue['teams1']['short_code']}}</span>
                            </td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                        @endforeach
                        @endif
                        </tbody>
                      </table>
                    </td>
                    <td class="vs-td-center">
                    <div class="vs-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" height="512" viewBox="0 0 1024 1024" version="1.1">
                              <path d="M480 64C215.04 64 0 279.04 0 544 0 808.96 215.04 1024 480 1024S960 808.96 960 544C960 279.04 744.96 64 480 64zM448 364.16l-127.36 381.44c-4.48 12.8-16.64 21.76-30.08 21.76s-25.6-8.96-30.08-21.76L133.12 364.16C127.36 347.52 136.32 329.6 152.96 323.84c16.64-5.76 34.56 3.2 40.32 19.84l97.28 291.2 97.28-291.2c5.76-16.64 23.68-25.6 40.32-19.84C444.16 329.6 453.76 347.52 448 364.16zM608.64 512.64C704 512.64 768 563.84 768 640c0 78.08-60.8 127.36-159.36 127.36-92.16 0-159.36-53.76-159.36-127.36 0-17.28 14.08-32 32-32 17.92 0 32 14.08 32 32 0 37.12 39.04 63.36 95.36 63.36 35.84 0 95.36-8.32 95.36-63.36 0-60.8-79.36-63.36-95.36-63.36-95.36 0-159.36-51.2-159.36-127.36 0-78.72 60.8-127.36 159.36-127.36 92.16 0 159.36 53.76 159.36 127.36 0 17.28-14.08 32-32 32S704 467.2 704 449.28c0-37.12-39.04-63.36-95.36-63.36-35.84 0-95.36 8.32-95.36 63.36C513.28 510.08 592.64 512.64 608.64 512.64z"></path>
                            </svg>
                          </div>
                    </td>
                    <td>
                      <table class="table table-in">
                        <tbody>
                        @if(!empty($fixturValue['player1']) && !empty($fixturValue['player2']))
                        @php
                            $i=1;
                        @endphp
                        @foreach ($fixturValue['player2'] as $player)
                        <tr>
                        <td>
                                <img
                                    class="img-fluid"
                                    src="{{$fixturValue['teams2']['logo_path']}}"
                                  />
                            </td>
                            <td>
                                <span>{{$i}}</span>
                            </td>
                            <td>
                                <span>{{$player['fullname']}}</span>
                            </td>
                            <td>
                                <span>{{getposition($player['position_id'])}}</span>
                            </td>
                            <td>
                                <span>{{$fixturValue['teams2']['short_code']}}</span>
                            </td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                        @endforeach
                        @endif
                        </tbody>
                      </table>
                    </td>
                </tr> --}}
                @endforeach
                @else
                    <tr><td>Fixture not available.</td></tr>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



@endsection
