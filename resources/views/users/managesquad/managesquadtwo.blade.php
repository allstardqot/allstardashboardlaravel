<div class="djdndnn">
    <div class="container-fluid">
        <h3 class="text-white mt-5 text-center">Managing Squad</h3>
        <ul class="progressbar text-white jsdhsjdh">
            <li class="active">Step - 1</li>
            <li class="active">Step - 2</li>
            <li>Step - 3</li>
        </ul>
        <h4 class="text-white text-center sdjskldj">
            nominate a captain from starting 5
        </h4>

        <div class="m-bg text-white  djkdxjnh">
            <div class="first-row-check">
                <h5>Goalkeeper</h5>
                <div class="playerspot choose_captain {{$user_selected_captain==$goalkeeperData['id']?'captain_icon':'';}}">
                    <img src="{{ $goalkeeperData['image_path'] }}" />
                    <div class="aboutplayer {{in_array($goalkeeperData['id'],$selected)?'active':'';}}">
                        <h4>{{ $goalkeeperData['fullname'] }}</h4>
                        <p class="categorie"  data-id="{{ $goalkeeperData['id'] }}">Goalkeeper</p>
                        <div class="playerdetails">
                            <p>0 CGW Point</p>
                            <p>0 T F Points</p>
                        </div>
                        <p>$5.25 M</p>
                    </div>
                    <a class="kdjkjd" href="" id="goalkeeper_detail" data-bs-toggle="modal" data-bs-target="#myModal">View Details</a>
                </div>
            </div>
            <div class="second-row-check">
                @if (!in_array($defenderData[0]['id'], $substitude))
                    <div class="greatplayer">
                        <div class="playerspot choose_captain {{$user_selected_captain==$defenderData[0]['id']?'captain_icon':'';}}">
                            <img src="{{ $defenderData[0]['image_path'] }}" />
                            <div class="aboutplayer {{in_array($defenderData[0]['id'],$selected)?'active':'';}}">
                                <h4>{{ $defenderData[0]['fullname'] }}</h4>
                                <p class="categorie"  data-id="{{ $defenderData[0]['id'] }}">Defender</p>
                                <div class="playerdetails">
                                    <p>0 CGW Point</p>
                                    <p>0 T F Points</p>
                                </div>
                                <p>$5.25 M</p>
                            </div>
                            <a class="kdjkjd" href="" id="defender_detail" data-bs-toggle="modal" data-bs-target="#myModal">View
                                Details</a>
                        </div>
                    </div>
                @else
                    <div class="greatplayer">
                        <div class="playerspot changestar1">
                            <img src="{{ $defenderData[0]['image_path'] }}" />
                            <div class="changeaboutplayer">
                                <h4>{{ $defenderData[0]['fullname'] }}</h4>
                                <p class="categorie"  data-id="{{ $defenderData[0]['id'] }}">Defender</p>
                                <div class="playerdetails">
                                    <p>0 CGW Point</p>
                                    <p>0 T F Points</p>
                                </div>
                                <p>$5.25 M</p>
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
                        <div class="playerspot choose_captain {{$user_selected_captain==$defenderData[1]['id']?'captain_icon':'';}}">
                            <img src="{{ $defenderData[1]['image_path'] }}" />
                            <div class="aboutplayer  {{in_array($defenderData[1]['id'],$selected)?'active':'';}}">
                                <h4>{{ $defenderData[1]['fullname'] }}</h4>
                                <p class="categorie"  data-id="{{ $defenderData[1]['id'] }}">Defender</p>
                                <div class="playerdetails">
                                    <p>0 CGW Point</p>
                                    <p>0 T F Points</p>
                                </div>
                                <p>$5.25 M</p>
                            </div>
                            <a class="kdjkjd" href="" id="defender_detail" data-bs-toggle="modal" data-bs-target="#myModal">View
                                Details</a>
                        </div>
                    </div>
                @else
                <div class="greatplayer">
                    <div class="playerspot changestar1">
                        <img src="{{ $defenderData[1]['image_path'] }}" />
                        <div class="changeaboutplayer">
                            <h4>{{ $defenderData[1]['fullname'] }}</h4>
                            <p class="categorie"  data-id="{{ $defenderData[1]['id'] }}">Defender</p>
                            <div class="playerdetails">
                                <p>0 CGW Point</p>
                                <p>0 T F Points</p>
                            </div>
                            <p>$5.25 M</p>
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
                        <div class="playerspot choose_captain {{$user_selected_captain==$midfielderData[0]['id']?'captain_icon':'';}}">
                            <img src="{{ $midfielderData[0]['image_path'] }}" />
                            <div class="aboutplayer  {{in_array($midfielderData[0]['id'],$selected)?'active':'';}}">
                                <h4>{{ $midfielderData[0]['fullname'] }}</h4>
                                <p class="categorie"  data-id="{{ $midfielderData[0]['id'] }}">Midfielder</p>
                                <div class="playerdetails">
                                    <p>0 CGW Point</p>
                                    <p>0 T F Points</p>
                                </div>
                                <p>$5.25 M</p>
                            </div>
                            <a class="kdjkjd" href="" id="midfielder_detail" data-bs-toggle="modal" data-bs-target="#myModal">View
                                Details</a>
                        </div>
                    </div>
                @else
                    <div class="greatplayer">
                        <div class="playerspot changestar1">
                            <img src="{{ $midfielderData[0]['image_path'] }}" />
                            <div class="changeaboutplayer">
                                <h4>{{ $midfielderData[0]['fullname'] }}</h4>
                                <p class="categorie"  data-id="{{ $midfielderData[0]['id'] }}">Midfielder</p>
                                <div class="playerdetails">
                                    <p>0 CGW Point</p>
                                    <p>0 T F Points</p>
                                </div>
                                <p>$5.25 M</p>
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
                        <div class="playerspot choose_captain {{$user_selected_captain==$midfielderData[1]['id']?'captain_icon':'';}}">
                            <img src="{{ $midfielderData[1]['image_path'] }}" />
                            <div class="aboutplayer {{in_array($midfielderData[1]['id'],$selected)?'active':'';}}">
                                <h4>{{ $midfielderData[1]['fullname'] }}</h4>
                                <p class="categorie"  data-id="{{ $midfielderData[1]['id'] }}">Midfielder</p>
                                <div class="playerdetails">
                                    <p>0 CGW Point</p>
                                    <p>0 T F Points</p>
                                </div>
                                <p>$5.25 M</p>
                            </div>
                            <a class="kdjkjd" href="" id="midfielder_detail" data-bs-toggle="modal" data-bs-target="#myModal">View
                                Details</a>
                        </div>
                    </div>
                @else
                    <div class="greatplayer">
                         <div class="playerspot changestar1">
                            <img src="{{ $midfielderData[1]['image_path'] }}" />
                            <div class="changeaboutplayer">
                                <h4>{{ $midfielderData[1]['fullname'] }}</h4>
                                <p class="categorie"  data-id="{{ $midfielderData[1]['id'] }}">Midfielder</p>
                                <div class="playerdetails">
                                    <p>0 CGW Point</p>
                                    <p>0 T F Points</p>
                                </div>
                                <p>$5.25 M</p>
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
                        <div class="playerspot choose_captain {{$user_selected_captain==$forwardData[0]['id']?'captain_icon':'';}}">
                            <img src="{{ $forwardData[0]['image_path'] }}" />
                            <div class="aboutplayer {{in_array($forwardData[0]['id'],$selected)?'active':'';}}">
                                <h4>{{ $forwardData[0]['fullname'] }}</h4>
                                <p class="categorie"  data-id="{{ $forwardData[0]['id'] }}">Forward</p>
                                <div class="playerdetails">
                                    <p>0 CGW Point</p>
                                    <p>0 T F Points</p>
                                </div>
                                <p>$5.25 M</p>
                            </div>
                            <a class="kdjkjd" href="" id="forward_detail" data-bs-toggle="modal" data-bs-target="#myModal">View
                                Details</a>
                        </div>
                    </div>
                @else
                    <div class="greatplayer">
                        <div class="playerspot changestar1">
                            <img src="{{ $forwardData[0]['image_path'] }}" />
                            <div class="changeaboutplayer">
                                <h4>{{ $forwardData[0]['fullname'] }}</h4>
                                <p class="categorie"  data-id="{{ $forwardData[0]['id'] }}">Forward</p>
                                <div class="playerdetails">
                                    <p>0 CGW Point</p>
                                    <p>0 T F Points</p>
                                </div>
                                <p>$5.25 M</p>
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
                        <div class="playerspot choose_captain {{$user_selected_captain==$forwardData[1]['id']?'captain_icon':'';}}">
                            <img src="{{ $forwardData[1]['image_path'] }}" />
                            <div class="aboutplayer {{in_array($forwardData[1]['id'],$selected)?'active':'';}}">
                                <h4>{{ $forwardData[1]['fullname'] }}</h4>
                                <p class="categorie"  data-id="{{ $forwardData[1]['id'] }}">Forward</p>
                                <div class="playerdetails">
                                    <p>0 CGW Point</p>
                                    <p>0 T F Points</p>
                                </div>
                                <p>$5.25 M</p>
                            </div>
                            <a class="kdjkjd" href="" id="forward_detail" data-bs-toggle="modal" data-bs-target="#myModal">View
                                Details</a>
                        </div>
                    </div>
                @else
                    <div class="greatplayer">
                        <div class="playerspot changestar1">
                            <img src="{{ $forwardData[1]['image_path'] }}" />
                            <div class="changeaboutplayer">
                                <h4>{{ $forwardData[1]['fullname'] }}</h4>
                                <p class="categorie"  data-id="{{ $forwardData[1]['id'] }}">Forward</p>
                                <div class="playerdetails">
                                    <p>0 CGW Point</p>
                                    <p>0 T F Points</p>
                                </div>
                                <p>$5.25 M</p>
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
                <a id="step2_back" href="#" class="form-control btnColor mt-4 order-last order-lg-first dfhdhfjkh">
                    Back</a>
            </div>

            <div class="col-lg-4 col-4 text-lg-right text-right">
                <a id="managesquad_two_submit" href="javascript:void(0)" class="form-control btnColor mt-4 sdjhsdjh ml-auto">
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
                    <p class="jsdhjdh">Total Fantasy Points:xxx</p>
                    <p class="jsdhjdh">Current GW points: xxx</p>
                    <p class="jsdhjdh">Total Picks: xx</p>
                    <p class="jsdhjdh">Picks current GW: xx</p>
                    <p class="jsdhjdh">Total Times Captained: xx</p>
                    <p class="jsdhjdh">Current GW Captain: xx</p>
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
