<div class="djfd765">
    <div class="container-fluid">
        <h3 class="text-white mt-5 text-center">Managing Squad</h3>
        <ul class="progressbar text-white jsdhsjdh">
            <li class="active">Step - 1</li>
            <li class="active">Step - 2</li>
            <li class="active">Step - 3</li>
        </ul>
        <h4 class="text-white text-center sdjskldj">Enter Your Team's Name</h4>
        <div class="team-name-field">
            <input class="team-name-input" type="text" value="{{$user_team_name}}" id="team_name_enter" name="team name" placeholder="Enter team name" />
        </div>

        <div class="m-bg text-white  djkdxjnh">
            <div class="first-row-check">
                <h5>Goalkeeper</h5>
                <div class="playerspot {{$goalkeeperData['id']==$captainData?'captain_icon':'';}}">
                    <img src="{{ $goalkeeperData['image_path'] }}" />
                    <div class="aboutplayer {{in_array($goalkeeperData['id'],$selected)?'active':'';}}">
                        <h4>{{ $goalkeeperData['fullname'] }}</h4>
                        <p class="categorie"  data-id="{{ $goalkeeperData['id'] }}">Goalkeeper</p>
                        <div class="playerdetails">
                            @if(!empty($currentweekcount[0]['position_id']) && $goalkeeperData['position_id'] == $currentweekcount[0]['position_id'])
                            <p class="">{{ !empty($currentweekcount[0]['cmg_totalPoints']) ? $currentweekcount[0]['cmg_totalPoints']:'0'}} CGW Point</p>
                            <input type="hidden" class="cmg_totalpoints" value={{ !empty($currentweekcount[0]['cmg_totalPoints'])?$currentweekcount[0]['cmg_totalPoints']:'0' }}>
                            @else
                            <p class="">0 CGW Point</p>
                                    <input type="hidden" class="cmg_totalpoints" value='0'>
                            @endif
                            <input type="hidden" class="total_picks" value={{ !empty($currentweekcount[0]['pictotal'])?$currentweekcount[0]['pictotal']:'0'}}>
                            <input type="hidden" class="gm_picks" value={{ !empty($currentweekcount[0]['gw_pictotal'])?$currentweekcount[0]['gw_pictotal']:'0'}}>
                            <input type="hidden" class="total_cap" value={{ !empty($currentweekcount[0]['total_cap'])?$currentweekcount[0]['total_cap']:'0'}}>
                            <input type="hidden" class="cgw_cap" value={{ !empty($currentweekcount[0]['cgw_cap'])?$currentweekcount[0]['cgw_cap']:'0'}}>
                            <input type="hidden" class="total_points" value={{ !empty($goalkeeperData['sum_totalPoints']) ? $goalkeeperData['sum_totalPoints'] : '0' }}>
                            <p class="">{{ !empty($goalkeeperData['sum_totalPoints']) ? $goalkeeperData['sum_totalPoints'] : '0' }} T F Points</p>
                        </div>
                        <p>{{ round($goalkeeperData['sell_price']) }}</p>
                    </div>
                    <a class="kdjkjd" href="" id="goalkeeper_detail" data-bs-toggle="modal" data-bs-target="#myModal">View Details</a>
                </div>
            </div>
            <div class="second-row-check">
                @if (!in_array($defenderData[0]['id'], $substitude))
                    <div class="greatplayer">
                        <div class="playerspot {{$defenderData[0]['id']==$captainData?'captain_icon':'';}}">
                            <img src="{{ $defenderData[0]['image_path'] }}" />
                            <div class="aboutplayer {{in_array($defenderData[0]['id'],$selected)?'active':'';}}">
                                <h4>{{ $defenderData[0]['fullname'] }}</h4>
                                <p class="categorie"  data-id="{{ $defenderData[0]['id'] }}">Defender</p>
                                <div class="playerdetails">
                                    @if(!empty($currentweekcount[1]['position_id']) && $defenderData[0]['position_id'] == $currentweekcount[1]['position_id'])
                                   
                                
                                    <p class="">{{ !empty($currentweekcount[1]['cmg_totalPoints']) ? $currentweekcount[1]['cmg_totalPoints'] : '0 ' }} CGW Point</p>
                                    <input type="hidden" class="cmg_totalpoints" value={{ !empty($currentweekcount[1]['cmg_totalPoints'])?$currentweekcount[1]['cmg_totalPoints']:'0' }}>
                                    @else
                                    <p class="">0 CGW Point</p>
                                        <input type="hidden" class="cmg_totalpoints" value='0'>
                                    @endif
                                    <input type="hidden" class="total_picks" value={{ !empty($currentweekcount[1]['pictotal'])?$currentweekcount[1]['pictotal']:'0'}}>
                                    <input type="hidden" class="gm_picks" value={{ !empty($currentweekcount[1]['gw_pictotal'])?$currentweekcount[1]['gw_pictotal']:'0'}}>
                                    <input type="hidden" class="total_cap" value={{ !empty($currentweekcount[1]['total_cap'])?$currentweekcount[1]['total_cap']:'0'}}>
                                    <input type="hidden" class="cgw_cap" value={{ !empty($currentweekcount[1]['cgw_cap'])?$currentweekcount[1]['cgw_cap']:'0'}}>
                                    <input type="hidden" class="total_points" value={{ !empty($defenderData[0]['sum_totalPoints']) ? $defenderData[0]['sum_totalPoints'] : '0' }}>
    
                                    <p class="">{{ !empty($defenderData[0]['sum_totalPoints']) ? $defenderData[0]['sum_totalPoints'] : '0' }} T F Points</p>
                                </div>
                                <p>{{ round($defenderData[0]['sell_price']) }}</p>
                            </div>
                            <a class="kdjkjd" href="" id="defender_detail" data-bs-toggle="modal" data-bs-target="#myModal">View
                                Details</a>
                        </div>
                    </div>
                @else
                    <div class="greatplayer">
                        <div class="playerspot changestar1">
                            <img src="{{ $defenderData[0]['image_path'] }}" />
                            <div class="aboutplayer">
                                <h4>{{ $defenderData[0]['fullname'] }}</h4>
                                <p class="categorie"  data-id="{{ $defenderData[0]['id'] }}">Defender</p>
                                <div class="playerdetails">
                                    @if(!empty($currentweekcount[1]['position_id']) && $defenderData[0]['position_id'] == $currentweekcount[1]['position_id'])
                                   
                                
                                    <p class="">{{ !empty($currentweekcount[1]['cmg_totalPoints']) ? $currentweekcount[1]['cmg_totalPoints'] : '0 ' }} CGW Point</p>
                                    <input type="hidden" class="cmg_totalpoints" value={{ !empty($currentweekcount[1]['cmg_totalPoints'])?$currentweekcount[1]['cmg_totalPoints']:'0' }}>
                                    @else
                                    <p class="">0 CGW Point</p>
                                        <input type="hidden" class="cmg_totalpoints" value='0'>
                                    @endif
                                    <input type="hidden" class="total_picks" value={{ !empty($currentweekcount[1]['pictotal'])?$currentweekcount[1]['pictotal']:'0'}}>
                                    <input type="hidden" class="gm_picks" value={{ !empty($currentweekcount[1]['gw_pictotal'])?$currentweekcount[1]['gw_pictotal']:'0'}}>
                                    <input type="hidden" class="total_cap" value={{ !empty($currentweekcount[1]['total_cap'])?$currentweekcount[1]['total_cap']:'0'}}>
                                    <input type="hidden" class="cgw_cap" value={{ !empty($currentweekcount[1]['cgw_cap'])?$currentweekcount[1]['cgw_cap']:'0'}}>
                                    <input type="hidden" class="total_points" value={{ !empty($defenderData[0]['sum_totalPoints']) ? $defenderData[0]['sum_totalPoints'] : '0' }}>
    
                                    <p class="">{{ !empty($defenderData[0]['sum_totalPoints']) ? $defenderData[0]['sum_totalPoints'] : '0' }} T F Points</p>
                                </div>
                                <p>{{ round($defenderData[0]['sell_price'] )}}</p>
                            </div>
                            <a class="kdjkjd" href="" id="defender_detail" data-bs-toggle="modal" data-bs-target="#myModal">View
                                Details</a>
                        </div>
                    </div>
                @endif
                <div class="area-title hide-mob">
                    <h5>Defenders</h5>
                </div>
                @if (!in_array($defenderData[1]['id'], $substitude))
                    <div class="greatplayer">
                        <div class="playerspot {{$defenderData[1]['id']==$captainData?'captain_icon':'';}}">
                            <img src="{{ $defenderData[1]['image_path'] }}" />
                            <div class="aboutplayer  {{in_array($defenderData[1]['id'],$selected)?'active':'';}}">
                                <h4>{{ $defenderData[1]['fullname'] }}</h4>
                                <p class="categorie"  data-id="{{ $defenderData[1]['id'] }}">Defender</p>
                                <div class="playerdetails">
                                    @if(!empty($currentweekcount[2]['position_id']) && $defenderData[1]['position_id'] == $currentweekcount[2]['position_id'])
                                    {{-- {{ $defenderData[0]['position_id'] }}
                                       {{ $currentweekcount[2]['position_id'] }} --}}
                                   
                                   <p class="">{{ !empty($currentweekcount[2]['cmg_totalPoints']) ? $currentweekcount[2]['cmg_totalPoints'] : '0'}} CGW Point</p>
                                   <input type="hidden" class="cmg_totalpoints" value={{ !empty($currentweekcount[2]['cmg_totalPoints'])?$currentweekcount[2]['cmg_totalPoints']:'0' }}>
                                   @else
                                   <p class="">0 CGW Point</p>
                                       <input type="hidden" class="cmg_totalpoints" value='0'>
                                   @endif
                                   <input type="hidden" class="total_picks" value={{ !empty($currentweekcount[2]['pictotal'])?$currentweekcount[2]['pictotal']:'0'}}>
                                   <input type="hidden" class="gm_picks" value={{ !empty($currentweekcount[2]['gw_pictotal'])?$currentweekcount[2]['gw_pictotal']:'0'}}>
                                   <input type="hidden" class="total_cap" value={{ !empty($currentweekcount[2]['total_cap'])?$currentweekcount[2]['total_cap']:'0'}}>
                                   <input type="hidden" class="cgw_cap" value={{ !empty($currentweekcount[2]['cgw_cap'])?$currentweekcount[2]['cgw_cap']:'0'}}>
                                   <input type="hidden" class="total_points" value={{ $defenderData[1]['sum_totalPoints'] }}>
                                   <p class="">{{ $defenderData[1]['sum_totalPoints'] }} T F Points</p>
                               </div>
                               <p>{{ round($defenderData[1]['sell_price']) }}</p>
                            </div>
                            <a class="kdjkjd" href="" id="defender_detail" data-bs-toggle="modal" data-bs-target="#myModal">View
                                Details</a>
                        </div>
                    </div>
                @else
                <div class="greatplayer">
                    <div class="playerspot changestar1">
                        <img src="{{ $defenderData[1]['image_path'] }}" />
                        <div class="aboutplayer">
                            <h4>{{ $defenderData[1]['fullname'] }}</h4>
                            <p class="categorie"  data-id="{{ $defenderData[1]['id'] }}">Defender</p>
                            <div class="playerdetails">
                                @if(!empty($currentweekcount[2]['position_id']) && $defenderData[1]['position_id'] == $currentweekcount[2]['position_id'])
                                {{-- {{ $defenderData[0]['position_id'] }}
                                   {{ $currentweekcount[2]['position_id'] }} --}}
                               
                                   <p class="">{{ !empty($currentweekcount[2]['cmg_totalPoints']) ? $currentweekcount[2]['cmg_totalPoints'] : '0'}} CGW Point</p>
                               <input type="hidden" class="cmg_totalpoints" value={{ !empty($currentweekcount[2]['cmg_totalPoints'])?$currentweekcount[2]['cmg_totalPoints']:'0' }}>
                               @else
                               <p class="">0 CGW Point</p>
                                   <input type="hidden" class="cmg_totalpoints" value='0'>
                               @endif
                               <input type="hidden" class="total_picks" value={{ !empty($currentweekcount[2]['pictotal'])?$currentweekcount[2]['pictotal']:'0'}}>
                               <input type="hidden" class="gm_picks" value={{ !empty($currentweekcount[2]['gw_pictotal'])?$currentweekcount[2]['gw_pictotal']:'0'}}>
                               <input type="hidden" class="total_cap" value={{ !empty($currentweekcount[2]['total_cap'])?$currentweekcount[2]['total_cap']:'0'}}>
                               <input type="hidden" class="cgw_cap" value={{ !empty($currentweekcount[2]['cgw_cap'])?$currentweekcount[2]['cgw_cap']:'0'}}>
                               <input type="hidden" class="total_points" value={{ $defenderData[1]['sum_totalPoints'] }}>
                               <p class="">{{ $defenderData[1]['sum_totalPoints'] }} T F Points</p>
                           </div>
                           <p>{{ round($defenderData[1]['sell_price']) }}</p>
                        </div>
                        <a class="kdjkjd" href="" id="defender_detail" data-bs-toggle="modal" data-bs-target="#myModal">View
                            Details</a>
                    </div>
                </div>
                @endif
            </div>
            <div class="area-title hide-desk">
                <h5>Defenders</h5>
            </div>

            <div class="third-row-check">
                @if (!in_array($midfielderData[0]['id'], $substitude))
                    <div class="greatplayer">
                        <div class="playerspot {{$midfielderData[0]['id']==$captainData?'captain_icon':'';}}">
                            <img src="{{ $midfielderData[0]['image_path'] }}" />
                            <div class="aboutplayer {{in_array($midfielderData[0]['id'],$selected)?'active':'';}}">
                                <h4>{{ $midfielderData[0]['fullname'] }}</h4>
                                <p class="categorie"  data-id="{{ $midfielderData[0]['id'] }}">Midfielder</p>
                                <div class="playerdetails">
                                    @if(!empty($currentweekcount[3]['position_id']) && $midfielderData[0]['position_id'] == $currentweekcount[3]['position_id'])
                                    <p class="">{{ !empty($currentweekcount[3]['cmg_totalPoints']) ? $currentweekcount[3]['cmg_totalPoints'] : '0'}} CGW Point</p>
                                    {{-- <p class="">{{ $currentweekcount[3]['cmg_totalPoints']}} CGW Point</p> --}}
                                    <input type="hidden" class="cmg_totalpoints" value={{ !empty($currentweekcount[3]['cmg_totalPoints'])?$currentweekcount[3]['cmg_totalPoints']:'0' }}>
                                    @else
                                    <p class="">0 CGW Point</p>
                                        <input type="hidden" class="cmg_totalpoints" value='0'>
                                    @endif
                                    <input type="hidden" class="total_picks" value={{ !empty($currentweekcount[3]['pictotal'])?$currentweekcount[3]['pictotal']:'0'}}>
                                    <input type="hidden" class="gm_picks" value={{ !empty($currentweekcount[3]['gw_pictotal'])?$currentweekcount[3]['gw_pictotal']:'0'}}>
                                    <input type="hidden" class="total_cap" value={{ !empty($currentweekcount[3]['total_cap'])?$currentweekcount[3]['total_cap']:'0'}}>
                                    <input type="hidden" class="cgw_cap" value={{ !empty($currentweekcount[3]['cgw_cap'])?$currentweekcount[3]['cgw_cap']:'0'}}>
                                    <input type="hidden" class="total_points" value={{ $midfielderData[0]['sum_totalPoints'] }}>
                                    <p>{{ $midfielderData[0]['sum_totalPoints'] }} T F Points</p>
                                </div>
                                <p class="">{{ round($midfielderData[0]['sell_price']) }}</p>
                            </div>
                            <a class="kdjkjd" href="" id="midfielder_detail" data-bs-toggle="modal" data-bs-target="#myModal">View
                                Details</a>
                        </div>
                    </div>
                @else
                    <div class="greatplayer">
                        <div class="playerspot changestar1">
                            <img src="{{ $midfielderData[0]['image_path'] }}" />
                            <div class="aboutplayer">
                                <h4>{{ $midfielderData[0]['fullname'] }}</h4>
                                <p class="categorie"  data-id="{{ $midfielderData[0]['id'] }}">Midfielder</p>
                                <div class="playerdetails">
                                    @if(!empty($currentweekcount[3]['position_id']) && $midfielderData[0]['position_id'] == $currentweekcount[3]['position_id'])
                                    <p class="">{{ !empty($currentweekcount[3]['cmg_totalPoints']) ? $currentweekcount[3]['cmg_totalPoints'] : '0'}} CGW Point</p>
                                    {{-- <p class="">{{ $currentweekcount[3]['cmg_totalPoints']}} CGW Point</p> --}}
                                    <input type="hidden" class="cmg_totalpoints" value={{ !empty($currentweekcount[3]['cmg_totalPoints'])?$currentweekcount[3]['cmg_totalPoints']:'0' }}>
                                    @else
                                    <p class="">0 CGW Point</p>
                                        <input type="hidden" class="cmg_totalpoints" value='0'>
                                    @endif
                                    <input type="hidden" class="total_picks" value={{ !empty($currentweekcount[3]['pictotal'])?$currentweekcount[3]['pictotal']:'0'}}>
                                    <input type="hidden" class="gm_picks" value={{ !empty($currentweekcount[3]['gw_pictotal'])?$currentweekcount[3]['gw_pictotal']:'0'}}>
                                    <input type="hidden" class="total_cap" value={{ !empty($currentweekcount[3]['total_cap'])?$currentweekcount[3]['total_cap']:'0'}}>
                                    <input type="hidden" class="cgw_cap" value={{ !empty($currentweekcount[3]['cgw_cap'])?$currentweekcount[3]['cgw_cap']:'0'}}>
                                    <input type="hidden" class="total_points" value={{ $midfielderData[0]['sum_totalPoints'] }}>
                                    <p>{{ $midfielderData[0]['sum_totalPoints'] }} T F Points</p>
                                </div>
                                <p class="">{{ round($midfielderData[0]['sell_price']) }}</p>
                            </div>
                            <a class="kdjkjd" href="" id="midfielder_detail" data-bs-toggle="modal" data-bs-target="#myModal">View
                                Details</a>
                        </div>
                    </div>
                @endif
                <div class="area-title hide-mob">
                    <h5>Midfielders</h5>
                </div>
                @if (!in_array($midfielderData[1]['id'], $substitude))
                    <div class="greatplayer">
                        <div class="playerspot {{$midfielderData[1]['id']==$captainData?'captain_icon':'';}}">
                            <img src="{{ $midfielderData[1]['image_path'] }}" />
                            <div class="aboutplayer {{in_array($midfielderData[1]['id'],$selected)?'active':'';}}">
                                <h4>{{ $midfielderData[1]['fullname'] }}</h4>
                                <p class="categorie"  data-id="{{ $midfielderData[1]['id'] }}">Midfielder</p>
                                <div class="playerdetails">
                                    @if(!empty($currentweekcount[4]['position_id']) && $midfielderData[1]['position_id'] == $currentweekcount[4]['position_id'])
                                    <p class="">{{ !empty($currentweekcount[4]['cmg_totalPoints']) ? $currentweekcount[4]['cmg_totalPoints'] : '0'}} CGW Point</p>
                                {{-- <p class="">{{ $currentweekcount[4]['cmg_totalPoints']}} CGW Point</p> --}}
                                <input type="hidden" class="cmg_totalpoints" value={{ !empty($currentweekcount[4]['cmg_totalPoints'])?$currentweekcount[4]['cmg_totalPoints']:'0' }}>
                                @else
                                <p class="">0 CGW Point</p>
                                    <input type="hidden" class="cmg_totalpoints" value='0'>
                                @endif
                                <input type="hidden" class="total_picks" value={{ !empty($currentweekcount[4]['pictotal'])?$currentweekcount[4]['pictotal']:'0'}}>
                                <input type="hidden" class="gm_picks" value={{ !empty($currentweekcount[4]['gw_pictotal'])?$currentweekcount[4]['gw_pictotal']:'0'}}>
                                <input type="hidden" class="total_cap" value={{ !empty($currentweekcount[4]['total_cap'])?$currentweekcount[4]['total_cap']:'0'}}>
                                <input type="hidden" class="cgw_cap" value={{ !empty($currentweekcount[4]['cgw_cap'])?$currentweekcount[4]['cgw_cap']:'0'}}>
                                <input type="hidden" class="total_points" value={{ $midfielderData[1]['sum_totalPoints'] }}>
                                <p class="">{{ $midfielderData[1]['sum_totalPoints'] }} T F Points</p>
                            </div>
                            <p>{{ round($midfielderData[1]['sell_price']) }}</p>
                            </div>
                            <a class="kdjkjd" href="" id="midfielder_detail" data-bs-toggle="modal" data-bs-target="#myModal">View
                                Details</a>
                        </div>
                    </div>
                @else
                    <div class="greatplayer">
                         <div class="playerspot changestar1">
                            <img src="{{ $midfielderData[1]['image_path'] }}" />
                            <div class="aboutplayer">
                                <h4>{{ $midfielderData[1]['fullname'] }}</h4>
                                <p class="categorie"  data-id="{{ $midfielderData[1]['id'] }}">Midfielder</p>
                                <div class="playerdetails">
                                    @if(!empty($currentweekcount[4]['position_id']) && $midfielderData[1]['position_id'] == $currentweekcount[4]['position_id'])
                                    <p class="">{{ !empty($currentweekcount[4]['cmg_totalPoints']) ? $currentweekcount[4]['cmg_totalPoints'] : '0'}} CGW Point</p>
                                {{-- <p class="">{{ $currentweekcount[4]['cmg_totalPoints']}} CGW Point</p> --}}
                                <input type="hidden" class="cmg_totalpoints" value={{ !empty($currentweekcount[4]['cmg_totalPoints'])?$currentweekcount[4]['cmg_totalPoints']:'0' }}>
                                @else
                                <p class="">0 CGW Point</p>
                                    <input type="hidden" class="cmg_totalpoints" value='0'>
                                @endif
                                <input type="hidden" class="total_picks" value={{ !empty($currentweekcount[4]['pictotal'])?$currentweekcount[4]['pictotal']:'0'}}>
                                <input type="hidden" class="gm_picks" value={{ !empty($currentweekcount[4]['gw_pictotal'])?$currentweekcount[4]['gw_pictotal']:'0'}}>
                                <input type="hidden" class="total_cap" value={{ !empty($currentweekcount[4]['total_cap'])?$currentweekcount[4]['total_cap']:'0'}}>
                                <input type="hidden" class="cgw_cap" value={{ !empty($currentweekcount[4]['cgw_cap'])?$currentweekcount[4]['cgw_cap']:'0'}}>
                                <input type="hidden" class="total_points" value={{ $midfielderData[1]['sum_totalPoints'] }}>
                                <p class="">{{ $midfielderData[1]['sum_totalPoints'] }} T F Points</p>
                            </div>
                            <p>{{ round($midfielderData[1]['sell_price']) }}</p>
                            </div>
                            <a class="kdjkjd" href="" id="midfielder_detail" data-bs-toggle="modal" data-bs-target="#myModal">View
                                Details</a>
                        </div>
                    </div>
                @endif
            </div>
            <div class="area-title hide-desk">
                <h5>Midfielders</h5>
            </div>
            <div class="fourth-row-check">
                @if (!in_array($forwardData[0]['id'], $substitude))
                    <div class="greatplayer">
                        <div class="playerspot {{$forwardData[0]['id']==$captainData?'captain_icon':'';}}">
                            <img src="{{ $forwardData[0]['image_path'] }}" />
                            <div class="aboutplayer {{in_array($forwardData[0]['id'],$selected)?'active':'';}}">
                                <h4>{{ $forwardData[0]['fullname'] }}</h4>
                                <p class="categorie"  data-id="{{ $forwardData[0]['id'] }}">Forward</p>
                                <div class="playerdetails">
                                    @if(!empty($currentweekcount[5]['position_id']) && $forwardData[0]['position_id'] == $currentweekcount[5]['position_id'])
                                    <p class="">{{ !empty($currentweekcount[5]['cmg_totalPoints']) ? $currentweekcount[5]['cmg_totalPoints'] : '0'}} CGW Point</p>
                                    {{-- <p class="">{{ $currentweekcount[5]['cmg_totalPoints']}} CGW Point</p> --}}
                                    <input type="hidden" class="cmg_totalpoints" value={{ !empty($currentweekcount[5]['cmg_totalPoints'])?$currentweekcount[5]['cmg_totalPoints']:'0' }}>
                                    @else
                                        <p class="">0 CGW Point</p>
                                        <input type="hidden" class="cmg_totalpoints" value='0'>
                                    @endif
                                    <input type="hidden" class="total_picks" value={{ !empty($currentweekcount[5]['pictotal'])?$currentweekcount[5]['pictotal']:'0'}}>
                                    <input type="hidden" class="gm_picks" value={{ !empty($currentweekcount[5]['gw_pictotal'])?$currentweekcount[5]['gw_pictotal']:'0'}}>
                                    <input type="hidden" class="total_cap" value={{ !empty($currentweekcount[5]['total_cap'])?$currentweekcount[5]['total_cap']:'0'}}>
                                    <input type="hidden" class="cgw_cap" value={{ !empty($currentweekcount[5]['cgw_cap'])?$currentweekcount[5]['cgw_cap']:'0'}}>
                                    <input type="hidden" class="total_points" value={{ $forwardData[0]['sum_totalPoints'] }}>
                                    <p class="">{{ $forwardData[0]['sum_totalPoints'] }} T F Points</p>
                                </div>
                                <p>{{ round($forwardData[0]['sell_price']) }}</p>
                            </div>
                            <a class="kdjkjd" href="" id="forward_detail" data-bs-toggle="modal" data-bs-target="#myModal">View
                                Details</a>
                        </div>
                    </div>
                @else
                    <div class="greatplayer">
                        <div class="playerspot changestar1">
                            <img src="{{ $forwardData[0]['image_path'] }}" />
                            <div class="aboutplayer">
                                <h4>{{ $forwardData[0]['fullname'] }}</h4>
                                <p class="categorie"  data-id="{{ $forwardData[0]['id'] }}">Forward</p>
                                <div class="playerdetails">
                                    @if(!empty($currentweekcount[5]['position_id']) && $forwardData[0]['position_id'] == $currentweekcount[5]['position_id'])
                                    <p class="">{{ !empty($currentweekcount[5]['cmg_totalPoints']) ? $currentweekcount[5]['cmg_totalPoints'] : '0'}} CGW Point</p>
                                    {{-- <p class="">{{ $currentweekcount[5]['cmg_totalPoints']}} CGW Point</p> --}}
                                    <input type="hidden" class="cmg_totalpoints" value={{ !empty($currentweekcount[5]['cmg_totalPoints'])?$currentweekcount[5]['cmg_totalPoints']:'0' }}>
                                    @else
                                        <p class="">0 CGW Point</p>
                                        <input type="hidden" class="cmg_totalpoints" value='0'>
                                    @endif
                                    <input type="hidden" class="total_picks" value={{ !empty($currentweekcount[5]['pictotal'])?$currentweekcount[5]['pictotal']:'0'}}>
                                    <input type="hidden" class="gm_picks" value={{ !empty($currentweekcount[5]['gw_pictotal'])?$currentweekcount[5]['gw_pictotal']:'0'}}>
                                    <input type="hidden" class="total_cap" value={{ !empty($currentweekcount[5]['total_cap'])?$currentweekcount[5]['total_cap']:'0'}}>
                                    <input type="hidden" class="cgw_cap" value={{ !empty($currentweekcount[5]['cgw_cap'])?$currentweekcount[5]['cgw_cap']:'0'}}>
                                    <input type="hidden" class="total_points" value={{ $forwardData[0]['sum_totalPoints'] }}>
                                    <p class="">{{ $forwardData[0]['sum_totalPoints'] }} T F Points</p>
                                </div>
                                <p>{{ round($forwardData[0]['sell_price']) }}</p>
                            </div>
                            <a class="kdjkjd" href="" id="forward_detail" data-bs-toggle="modal" data-bs-target="#myModal">View
                                Details</a>
                        </div>
                    </div>
                @endif
                <div class="area-title hide-mob">
                    <h5>Forward</h5>
                </div>
                @if (!in_array($forwardData[1]['id'], $substitude))
                    <div class="greatplayer">
                        <div class="playerspot {{$forwardData[1]['id']==$captainData?'captain_icon':'';}}">
                            <img src="{{ $forwardData[1]['image_path'] }}" />
                            <div class="aboutplayer {{in_array($forwardData[1]['id'],$selected)?'active':'';}}">
                                <h4>{{ $forwardData[1]['fullname'] }}</h4>
                                <p class="categorie"  data-id="{{ $forwardData[1]['id'] }}">Forward</p>
                                <div class="playerdetails">
                                    @if(!empty($currentweekcount[6]['position_id']) && $forwardData[1]['position_id'] == $currentweekcount[6]['position_id'])
                                    <p class="">{{ !empty($currentweekcount[6]['cmg_totalPoints']) ? $currentweekcount[6]['cmg_totalPoints'] : '0'}} CGW Point</p>
                                    <input type="hidden" class="cmg_totalpoints" value={{ !empty($currentweekcount[6]['cmg_totalPoints'])?$currentweekcount[6]['cmg_totalPoints']:'0' }}>
                                @else
                                    <p class="">0 CGW Point</p>
                                    <input type="hidden" class="cmg_totalpoints" value='0'>
                                @endif
                                <input type="hidden" class="total_picks" value={{ !empty($currentweekcount[6]['pictotal'])?$currentweekcount[6]['pictotal']:'0'}}>
                                <input type="hidden" class="gm_picks" value={{ !empty($currentweekcount[6]['gw_pictotal'])?$currentweekcount[6]['gw_pictotal']:'0'}}>
                                <input type="hidden" class="total_cap" value={{ !empty($currentweekcount[6]['total_cap'])?$currentweekcount[6]['total_cap']:'0'}}>
                                <input type="hidden" class="cgw_cap" value={{ !empty($currentweekcount[6]['cgw_cap'])?$currentweekcount[6]['cgw_cap']:'0'}}>
                                <input type="hidden" class="total_points" value={{ $forwardData[1]['sum_totalPoints'] }}>
                                <p class="">{{ $forwardData[1]['sum_totalPoints'] }} T F Points</p>
                            </div>
                            <p>{{ $forwardData[1]['sell_price'] }}</p>
                            </div>
                            <a class="kdjkjd" href="" id="forward_detail" data-bs-toggle="modal" data-bs-target="#myModal">View
                                Details</a>
                        </div>
                    </div>
                @else
                    <div class="greatplayer">
                        <div class="playerspot changestar1">
                            <img src="{{ $forwardData[1]['image_path'] }}" />
                            <div class="aboutplayer">
                                <h4>{{ $forwardData[1]['fullname'] }}</h4>
                                <p class="categorie"  data-id="{{ $forwardData[1]['id'] }}">Forward</p>
                                <div class="playerdetails">
                                    @if(!empty($currentweekcount[6]['position_id']) && $forwardData[1]['position_id'] == $currentweekcount[6]['position_id'])
                                    <input type="hidden" class="cmg_totalpoints" value={{ !empty($currentweekcount[6]['cmg_totalPoints'])?$currentweekcount[6]['cmg_totalPoints']:'0' }}>
                                    <p class="">{{ !empty($currentweekcount[6]['cmg_totalPoints']) ? $currentweekcount[6]['cmg_totalPoints'] : '0'}} CGW Point</p>
                                @else
                                <p class="">0 CGW Point</p>
                                    <input type="hidden" class="cmg_totalpoints" value='0'>
                                @endif
                                <input type="hidden" class="total_picks" value={{ !empty($currentweekcount[6]['pictotal'])?$currentweekcount[6]['pictotal']:'0'}}>
                                <input type="hidden" class="gm_picks" value={{ !empty($currentweekcount[6]['gw_pictotal'])?$currentweekcount[6]['gw_pictotal']:'0'}}>
                                <input type="hidden" class="total_cap" value={{ !empty($currentweekcount[6]['total_cap'])?$currentweekcount[6]['total_cap']:'0'}}>
                                <input type="hidden" class="cgw_cap" value={{ !empty($currentweekcount[6]['cgw_cap'])?$currentweekcount[6]['cgw_cap']:'0'}}>
                                <input type="hidden" class="total_points" value={{ $forwardData[1]['sum_totalPoints'] }}>
                                <p class="">{{ $forwardData[1]['sum_totalPoints'] }} T F Points</p>
                            </div>
                            <p>{{ round($forwardData[1]['sell_price']) }}</p>
                            </div>
                            <a class="kdjkjd" href="" id="forward_detail" data-bs-toggle="modal" data-bs-target="#myModal">View
                                Details</a>
                        </div>
                    </div>
                @endif
            </div>
            <div class="area-title hide-desk">
                <h5>Forward</h5>
            </div>
        </div>
    </div>
    <div class="container-fluid sdjkdxjnh">
        <div class="row sdhjdjsd">
            <div class="col-lg-4 col-4 text-lg-left">
                <a id="step3_back" href="#" class="form-control btnColor mt-4 order-last order-lg-first dfhdhfjkh">
                    Back</a>
            </div>

            <div class="col-lg-4 col-4 text-lg-right text-right">
                <a id="managesquad_three_submit" href="javascript:void(0)" class="form-control btnColor mt-4 sdjhsdjh ml-auto">
                    Next</a>
            </div>
        </div>
    </div>


    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog text-white">
            <!-- Modal content-->
            <div class="modal-content djffhhxjm">
                <div class="modal-header mt-5 dcjckjm">
                    <h4 class="modal-title jdxksdjjm" id="player_name_model">Tammy Johnson</h4>
                </div>
                <div class="modal-body text-center">
                    <p class="jsdhjdh" id="category_model">Forward</p>
                    <p class="jsdhjdh" id="total_p_points">Total Fantasy Points:xxx</p>
                    <p class="jsdhjdh" id="total_cgw_points">Current GW points: xxx</p>
                    <p class="jsdhjdh" id="total_picks_id">Total Picks: </p>
                    <p class="jsdhjdh" id="gm_picks">Picks current GW: 0</p>
                    <p class="jsdhjdh" id="total_cap">Total Times Captained: 0</p>
                    <p class="jsdhjdh" id="cgw_cap">Current GW Captain: 0</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default fjdfjjh" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>


</div>
