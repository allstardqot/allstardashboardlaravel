@extends('layouts.user')
@section('title','My Team')
@section('content')

<main>
  <div class="sdjsdkn">
    <h4><b class="skdjskd">My Team Next Week</b></h4>
    <p class="skdjskdm">Nullam lectus magna, dignissim tempus est in, volutpat scelerisque tortor. Curabitur nec ex
      risus.</p>
    <h4 class="mt-3 text-white ">Teams Under War</h4>
  </div>


  <div class="container-">
    <div class="row mjkoitbh col-lg-12 col-12 mx-auto py-0 text-white">

      @foreach($mainData as $key => $data)
      <div class="col-lg-4 text-white mt-3 ml-3	">
        <div class="sklddnk">
          <ul class="nav mt-4 skdjnm">
            <li class="nav-item ml-3 mt-2">
              <a><b class="jsdh89">{{ $data['team_name'] }}</b></a>
            </li>
            <li class="nav-item hjkuygb">
              <a href="{{ route('edit-team',$data['id'])  }}" class="mt-2 jhuionh">Edit Team</a>

            </li>

          </ul>
          @php
          $total_fpoints=0;
  @endphp
          @foreach($data as $key => $value)
          @if(empty($value['name']))
              @continue;
          @endif
          {{-- {{ pr($value); }} --}}

          {{-- {{ prr($value) }} --}}
          <h6 class="mt-3 ml-4 jhjkhkl77"><b>{{ $value['name'] }}</b></h6>
          <a><img class="sdhdgdgd" src="{{ $value['image_path'] }}" style="width: 50px">{{ $value['display_name'] }}
            @if($data['captain_id']==$value['id'])
            <img src="{{url('public/assets/image/c_captain.png')}}" class="float-end img-fluid" style="margin-right:6%">
            @endif
            </a>
          <hr class="htguy78">
          @php
            $total_fpoints += $value['total_point'];
          @endphp
          @endforeach


          <a href="javascript:void(0)" onclick="editManageSquad({{$data['id']}})" id="go_to_manage_squad" class="hjuy87">Go to manage Squad</a>

          {{-- <a href="{{ url('/leaderboard') }}"> --}}
            <h4 class="ihnik8978">Fantasy Point {{ $total_fpoints  }}</h4>

          {{-- </a> --}}



        </div>
      </div>
      @endforeach
    </div>
</main>


@endsection
