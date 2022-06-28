
<div class="managing">
    <div class="container-fluid">
        <h3 class="text-white mt-5 text-center">Manage Squad<?php //pr($midfielderData);
?></h3>
        <ul class="progressbar text-white jsdhsjdh">
            <li class="active">Step - 1</li>
            <li>Step - 2</li>
            <li>Step - 3</li>
        </ul>
        <h4 class="text-white text-center sdjskldj">
            Pick five players from your seven-player squad to from your team. Do this before the Gameweek deadline.
        </h4>

        <div class="m-bg text-white sdjkdxjnh">
            <div class="first-row-check">
                <h5>Goalkeeper</h5>
                <div class="playerspot choose_substitude">
                    <img src="{{ $goalkeeperData['image_path'] }}" />
                    {{$extraClass=''}}
                        @if (!empty($user_selected_substitude) && !in_array($goalkeeperData['id'],$user_selected_substitude))
                            @php $extraClass='active'; @endphp
                        @endif
                    <div class="aboutplayer {{$extraClass}}">
                        <h4>{{ $goalkeeperData['fullname'] }}</h4>
                        <p class="categorie" data-id="{{ $goalkeeperData['id'] }}">Goalkeeper</p>
                        <div class="playerdetails">
                            {{-- @if($goalkeeperData['position_id'] == $currentweekcount[0]['position_id'])
                                
                            <p class="cmg_totalpoints">{{ $currentweekcount[0]['cmg_totalPoints']}} CGW Point</p>
                            @endif --}}
                            <p class="total_points">{{ $goalkeeperData['sum_totalPoints'] }} T F Points</p>
                        </div>
                        <p>${{ $goalkeeperData['sell_price'] }}</p>
                    </div>
                    <a class="skdhhjh" href="" id="goalkeeper_detail" data-bs-toggle="modal" data-bs-target="#myModal">View Details</a>
                </div>
            </div>

            <div class="second-row-check">
                <div class="greatplayer">
                    <div class="playerspot choose_substitude">
                        <img src="{{ $defenderData[0]['image_path'] }}" />
                        {{$extraClass=''}}
                        @if (!empty($user_selected_substitude) && !in_array($defenderData[0]['id'],$user_selected_substitude))
                            @php $extraClass='active'; @endphp
                        @endif
                        <div class="aboutplayer {{$extraClass}}">
                            <h4>{{ $defenderData[0]['fullname'] }}</h4>
                            <p class="categorie"  data-id="{{ $defenderData[0]['id'] }}">Defenders</p>
                            <div class="playerdetails">
                                {{-- @if($defenderData[0]['position_id'] == $currentweekcount[1]['position_id'])
                                   
                                
                                <p class="cmg_totalpoints">{{ $currentweekcount[1]['cmg_totalPoints']}} CGW Point</p>
                                @endif --}}
                                <p class="total_points">{{ $goalkeeperData['sum_totalPoints'] }}T F Points</p>
                            </div>
                            <p>${{ $defenderData[0]['sell_price'] }}</p>
                        </div>
                        <a class="sdhdhsnik" href="" id="defender_detail" data-bs-toggle="modal" data-bs-target="#myModal">View
                            Details</a>
                    </div>
                </div>

                <div class="area-title hide-mob">
                    <h5>Defenders</h5>
                </div>
                <div class="greatplayer">
                    <div class="playerspot choose_substitude">

                        <img src="{{ $defenderData[1]['image_path'] }}" />
                        {{$extraClass=''}}
                        @if (!empty($user_selected_substitude) && !in_array($defenderData[1]['id'],$user_selected_substitude))
                            @php $extraClass='active'; @endphp
                        @endif
                        <div class="aboutplayer {{$extraClass}}">
                            <h4>{{ $defenderData[1]['fullname'] }}</h4>
                            <p class="categorie" data-id="{{ $defenderData[1]['id'] }}">Defenders</p>
                            <div class="playerdetails">
                                {{-- @if($defenderData[1]['position_id'] == $currentweekcount[2]['position_id']) --}}
                                 {{-- {{ $defenderData[0]['position_id'] }}
                                    {{ $currentweekcount[2]['position_id'] }} --}}
                                
                                {{-- <p class="cmg_totalpoints">{{ $currentweekcount[2]['cmg_totalPoints']}} CGW Point</p> --}}
                                {{-- @endif --}}
                                <p class="total_points">{{ $defenderData[0]['sum_totalPoints'] }} T F Points</p>
                            </div>
                            <p>${{ $defenderData[1]['sell_price'] }}</p>
                        </div>
                        <a class="sdhdhsnik" href="" id="defender_detail" data-bs-toggle="modal" data-bs-target="#myModal">View
                            Details</a>
                    </div>
                </div>
            </div>
            <div class="area-title hide-desk">
                <h5>Defenders</h5>
            </div>

            <div class="third-row-check">
                <div class="greatplayer">
                    <div class="playerspot choose_substitude">
                        <img src="{{ $midfielderData[0]['image_path'] }}" />
                        {{$extraClass=''}}
                        @if (!empty($user_selected_substitude) && !in_array($midfielderData[0]['id'],$user_selected_substitude))
                            @php $extraClass='active'; @endphp
                        @endif
                        <div class="aboutplayer {{$extraClass}}">
                            <h4>{{ $midfielderData[0]['fullname'] }}</h4>
                            <p class="categorie" data-id="{{ $midfielderData[0]['id'] }}">Midfielders</p>
                            <div class="playerdetails">
                                {{-- @if($midfielderData[0]['position_id'] == $currentweekcount[3]['position_id'])
                                
                                <p class="cmg_totalpoints">{{ $currentweekcount[3]['cmg_totalPoints']}} CGW Point</p>
                                @endif --}}
                                <p>{{ $midfielderData[0]['sum_totalPoints'] }} T F Points</p>
                            </div>
                            <p class="total_points">${{ $midfielderData[0]['sell_price'] }}</p>
                        </div>
                        <a class="sdhdhsnik" href="" id="midfielder_detail" data-bs-toggle="modal" data-bs-target="#myModal">View
                            Details</a>
                    </div>
                </div>
                <div class="area-title hide-mob">
                    <h5>Midfielders</h5>
                </div>
                <div class="greatplayer">
                    <div class="playerspot choose_substitude">
                        <img src="{{ $midfielderData[1]['image_path'] }}" />
                        {{$extraClass=''}}
                        @if (!empty($user_selected_substitude) && !in_array($midfielderData[1]['id'],$user_selected_substitude))
                            @php $extraClass='active'; @endphp
                        @endif
                        <div class="aboutplayer {{$extraClass}}">
                            <h4>{{ $midfielderData[1]['fullname'] }}</h4>
                            <p class="categorie" data-id="{{ $midfielderData[1]['id'] }}">Midfielders</p>
                            <div class="playerdetails">
                                {{-- @if($midfielderData[1]['position_id'] == $currentweekcount[4]['position_id'])
                                
                                <p class="cmg_totalpoints">{{ $currentweekcount[4]['cmg_totalPoints']}} CGW Point</p>
                                @endif --}}
                                <p class="total_points">{{ $midfielderData[0]['sum_totalPoints'] }} T F Points</p>
                            </div>
                            <p>${{ $midfielderData[1]['sell_price'] }}</p>
                        </div>
                        <a class="sdhdhsnik" href="" id="midfielder_detail" data-bs-toggle="modal" data-bs-target="#myModal">View
                            Details</a>
                    </div>
                </div>
            </div>
            <div class="area-title hide-desk">
                <h5>Midfielders</h5>
            </div>
            <div class="fourth-row-check">
                <div class="greatplayer">
                    <div class="playerspot choose_substitude">
                        <img src="{{ $forwardData[0]['image_path'] }}" />
                        {{$extraClass=''}}
                        @if (!empty($user_selected_substitude) && !in_array($forwardData[0]['id'],$user_selected_substitude))
                            @php $extraClass='active'; @endphp
                        @endif
                       
                        <div class="aboutplayer {{$extraClass}}">
                            <h4>{{ $forwardData[0]['fullname'] }}</h4>
                            <p class="categorie" data-id="{{ $forwardData[0]['id'] }}">Forward</p>
                            <div class="playerdetails">
                                {{-- @if($forwardData[0]['position_id'] == $currentweekcount[5]['position_id'])
                                
                                <p class="cmg_totalpoints">{{ $currentweekcount[5]['cmg_totalPoints']}} CGW Point</p>
                                @endif --}}
                                <p class="total_points">{{ $forwardData[0]['sum_totalPoints'] }} T F Points</p>
                            </div>
                            <p>${{ $forwardData[0]['sell_price'] }}</p>
                        </div>
                        <a class="sdhdhsnik" href="" id="forward_detail" data-bs-toggle="modal" data-bs-target="#myModal">View
                            Details</a>
                    </div>
                </div>
                <div class="area-title hide-mob">
                    <h5>Forward</h5>
                </div>
                <div class="greatplayer">
                    <div class="playerspot choose_substitude">
                        <img src="{{ $forwardData[1]['image_path'] }}" />
                        {{$extraClass=''}}
                        @if (!empty($user_selected_substitude) && !in_array($forwardData[1]['id'],$user_selected_substitude))
                            @php $extraClass='active'; @endphp
                        @endif
                        <div class="aboutplayer {{$extraClass}}">
                            <h4>{{ $forwardData[1]['fullname'] }}</h4>
                            <p class="categorie" data-id="{{ $forwardData[1]['id'] }}">Forward</p>
                            <div class="playerdetails">
                                {{-- @if($forwardData[1]['position_id'] == $currentweekcount[6]['position_id'])
                                
                                <p class="cmg_totalpoints">{{ $currentweekcount[6]['cmg_totalPoints']}} CGW Point</p>
                                @endif --}}
                                <p class="total_points">{{ $forwardData[0]['sum_totalPoints'] }} T F Points</p>
                            </div>
                            <p>${{ $forwardData[1]['sell_price'] }}</p>
                        </div>
                        <a class="sdhdhsnik" href="" id="forward_detail" data-bs-toggle="modal" data-bs-target="#myModal">View
                            Details</a>
                    </div>
                </div>
            </div>
            <div class="area-title hide-desk">
                <h5>Forward</h5>
            </div>
        </div>
    </div>
    <div class="container-fluid sdjkdxjnh">
        <div class="row sdhjdjsd">
            <div class="col-lg-4 col-4 text-lg-left">
                <a id="step1_back" href="#" class="form-control btnColor mt-4 order-last order-lg-first dfhdhfjkh">
                    Back</a>
            </div>

            <div class="col-lg-4 col-4 text-lg-right text-right">
                <a id="managesquad_one_submit" href="javascript:void(0)" class="form-control btnColor mt-4 sdjhsdjh ml-auto">
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
                    <p class="jsdhjdh">Total Picks: 0</p>
                    <p class="jsdhjdh">Picks current GW: 0</p>
                    <p class="jsdhjdh">Total Times Captained: 0</p>
                    <p class="jsdhjdh">Current GW Captain: 0</p>
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
