@php
$cookiesArray=[];
if (!empty($_COOKIE['playerIdArray'])){
$cookiesArray=explode(',',$_COOKIE['playerIdArray']);
}

@endphp
<div class="tab-pane fade home-tab <?= $type == 'goalkeeper' || $type == '' ? 'show active' : '' ?>" id="home" role="tabpanel" aria-labelledby="home-tab">
    <div class="form-outer">
        <div class="page slide-page">
            <div class="nsd79">
                <div class="row">
                    <div class="col-sm-5 sxdhd789">
                        <div class="nhj89hn9">
                            <p class="h7h8j7">Pick one goalkeeper. Choose a quality shot-stopper that will keep your net intact game after game.</p>
                            <h1 class="dhcbn87">Goalkeeper</h1>
                        </div>
                    </div>
                    <div class="col-sm-7 d-none d-md-block sd8j97j">
                        <div class="d-flex justify-content-center">
                            <div class="team-player">
                                <img class="sdhdh7h8" src="{{ asset('public/assets/image/star-new-1.png') }}" />
                                <div class="bh8j7h7 goalkeeper_staricon">
                                    <img id="goalkeeper_img" src="{{ asset('public/assets/image/image _1.png') }}" />
                                </div>
                                <div class="sdjd7jh89 goalkeeper_staricon">
                                    <img src="{{ asset('public/assets/image/Vector_115.png') }}" />
                                    <div class="j7hs89">
                                        <h6 class="h7bhsh8y6" id="goalkeeper_name">
                                            Tammy Johnson
                                        </h6>
                                        <p class="fjf78h7">goalkeeper</p>
                                        <div class="dfhfj7j">
                                            <div class="djhfhd8h89">
                                                <p class="sdbdj76 goalkeeper_cg_point">18 CGW Point</p>
                                            </div>
                                            <div class="djhfhd8h89">
                                                <p class="sdbdj76 goalkeeper_tf_point">
                                                    104 T F Points
                                                </p>
                                            </div>
                                        </div>
                                        <p class="sxjmndkod78">
                                            <b id="goalkeepersell_price">$5.25 M</b>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-container sdhnd87 sdsdsde44">
                        <input class="input-field inputcolor sdjd8u7" type="text" placeholder="search" name="usrnm" id="goal_keeper" value="{{!empty($request['searchData']) && $request['type']=='goalkeeper'?$request['searchData']:''}}" />
                        <i class="fa fa-search icon sdcjd8" id="goal_keeper_search"></i>
                        <a class="sdjndk7" onclick="goalKeepar()" href="javascript:void(0)">
                            <i class="fa fa-filter sdjd87" aria-hidden="true"></i>
                        </a>
                        <a class="sdjndk788" onclick="removePlayerCookie()" href="javascript:void(0)">
                            Reset
                        </a>
                        <a class="sdjndk788" href="javascript:void(0)" id="goalkeeper_filt">
                            Apply
                        </a>
                    </div>
                </div>




                <div class="row mt-2 sortby" id="sortbyby">
                    <div class="col-sm-7 mt-3">
                        <div class="sxdjdj87">
                            <div class="sdjd787">
                                <h6 class="sdjnd78">Sort By</h6>
                            </div>
                            <div class="text-white text-center sdjnd890j">
                                <div class="jnsjsd87">
                                    <select class="inputcolor jjhn90k7" id="goal_keeper_team">
                                        <option class="hd7h89" value="">Team</option>
                                        @foreach ($team as $key=>$teamValue)
                                        {{$select=''}}
                                        @if(!empty($request['type']) && $request['type']=='goalkeeper')
                                        {{ $select=!empty($request['team']) && $request['team']==$key?"selected":''}}

                                        @endif
                                        <option class="hd7h89" value="{{$key}}" {{$select}}>{{$teamValue}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <select class="inputcolor kdjdkl8" id="goal_keeper_point">
                                    <option class="hd7h89" value="">Point</option>
                                    <option class="hd7h89" value="desc" {{ !empty($request['point']) && $request['point']=='desc'?"selected":''}}>High to Low</option>
                                    <option class="hd7h89" value="asc" {{ !empty($request['point']) && $request['point']=='asc'?"selected":''}}>Low to High</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 mt-3">
                        <div class="range-slider">

                            <p class="range-slider__subtitle">Price Range</p>
                            <div class="value-data">
                                <p class="o-value"> <img src="{{ asset('public/assets/image/coins.png') }}" style="vertical-align: text-top;" alt="" class="img-fluid" width="20">0</p>
                                <p class="goalkeeper_range range-slider__value">${{!empty($request['type']=='goalkeeper') && !empty($request['cost_range']) ?$request['cost_range']:'50' }}</p>
                            </div>

                            <div class="range-slider__slider">
                                <input type="range" min="0" max="50" value="{{!empty($request['type']=='goalkeeper') && !empty($request['cost_range']) ?$request['cost_range']:'50' }}" class="slider" id="rangeSlider" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="table-responsive sdchsdsdh">
                            <table class="table">
                                <thead>
                                    <th scope="col">
                                        <h6></h6>
                                    </th>
                                    <th scope="col">
                                        <h6>Name</h6>
                                    </th>
                                    <th scope="col">
                                        <h6>Team</h6>
                                    </th>
                                    <th scope="col">
                                        <h6>Goals</h6>
                                    </th>
                                    <th scope="col">
                                        <h6>Fantasy points</h6>
                                    </th>
                                    <th scope="col">
                                        <h6>Cost</h6>
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($goalkeeperData as $goakkeeperValue)
                                    {{$check=''}}
                                    @if((!empty($user_selected_player) && in_array($goakkeeperValue["id"],$user_selected_player)) || in_array($goakkeeperValue["id"],$cookiesArray))
                                    @php $check="checked"; 
                                        if($goakkeeperValue['position_id']!=1){
                                            continue;
                                        }
                                    @endphp
                                    @endif
                                    @if(empty($goakkeeperValue["team"]["name"]))
                                    @continue;
                                    @endif
                                    {{--

                  <tr class="goalkeeper_tr" onclick="goalKeepercheckbox()">
                    --}}
                                    </tr>
                                    <tr>
                                        <td class="imagetd goalkeeper_td">
                                            <img class="imgsize" src="{{ $goakkeeperValue['image_path'] }}" />
                                        </td>
                                        <td class="goalkeeper_td">
                                            <p class="goalkep_fullname">
                                                {{ $goakkeeperValue["fullname"] }}
                                            </p>
                                            <p class="sdjd6">{{$goakkeeperValue["Position"]["name"]}}</p>
                                        </td>
                                        <td class="goalkeeper_td">
                                            <strong>{{
                        isset($goakkeeperValue["team"]["name"])
                          ? $goakkeeperValue["team"]["name"]
                          : ""
                      }}</strong>
                                        </td>
                                        <td class="goalkeeper_td">
                                            <p>18 Goals</p>
                                        </td>
                                        <td class="goalkeeper_td">
                                            <p>{{ $goakkeeperValue["sum_totalPoints"] }} Points</p>
                                        </td>
                                        <td class="goalkeeper_td">
                                            <p class="hsksk78 goalkeeper_sell_price">
                                                {{ $goakkeeperValue["sell_price"] }}M
                                            </p>
                                        </td>
                                        <td class="goalkeeper_td">
                                          <span class="check_span"></span>
                                            <input class="form-check-input tem-chekbox goalkeepercheck" type="checkbox" {{$check}} value="{{ $goakkeeperValue['id'] }}" id="flexCheckDefault" />
                                          </span>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="tab-pane fade profile-tab <?= $type == 'defender' ? 'show active' : '' ?>" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="form-outer">
        <div class="page slide-page">
            <div class="nsd79">
                <div class="row">
                    <div class="col-sm-5 sxdhd789">
                        <div class="nhj89hn9">
                            <p class="h7h8j7">Pick two defenders. Choose two impervious defenders that are as impenetrable as the Chinese Wall.</p>
                            <h1 class="dhcbn87">Defenders </h1>
                        </div>
                    </div>
                    <div class="col-sm-7 d-none d-md-block sd8j97j">
                        <div class="d-flex">
                            @for ($i = 0; $i < 2; $i++) <div class="team-player">
                                <img class="sdhdh7h8" src="{{ asset('public/assets/image/star-new-1.png') }}" />
                                <div class="bh8j7h7 defender_staricon{{$i}}">
                                    <img id="defender_img{{ $i }}" src="{{ asset('public/assets/image/image _1.png') }}" />
                                </div>
                                <div class="sdjd7jh89 defender_staricon{{$i}}">
                                    <img src="{{ asset('public/assets/image/Vector_115.png') }}" />
                                    <div class="j7hs89">
                                        <h6 class="h7bhsh8y6" id="defender_name{{ $i }}">
                                            Tammy Johnson
                                        </h6>
                                        <p class="fjf78h7">Defender</p>
                                        <div class="dfhfj7j">
                                            <div class="djhfhd8h89">
                                                <p class="sdbdj76">18 CGW Point</p>
                                            </div>
                                            <div class="djhfhd8h89">
                                                <p class="sdbdj76">104 T F Points</p>
                                            </div>
                                        </div>
                                        <p class="sxjmndkod78">
                                            <b id="defendersell_price{{ $i }}">$5.25 M</b>
                                        </p>
                                    </div>
                                </div>
                        </div>
                        @endfor
                    </div>
                </div>
                <div class="input-container sdhnd87 sdsdsde44">
                    <input class="input-field inputcolor sdjd8u7" type="text" placeholder="search" name="usrnm" id="defender" value="{{!empty($request['searchData']) && $request['type']=='defender'?$request['searchData']:''}}" />
                    <i class="fa fa-search icon sdcjd8" id="defender_search"></i>
                    <a class="sdjndk7" onclick="defenderfilt()" href="javascript:void(0)">
                        <i class="fa fa-filter sdjd87" aria-hidden="true"></i>
                    </a>
                    <a class="sdjndk788" onclick="removePlayerCookie()" href="javascript:void(0)">
                        Reset
                    </a>
                    <a class="sdjndk788" href="javascript:void(0)" id="defender_filt">
                        Apply
                    </a>
                </div>
            </div>

            <div class="row mt-2 sortby" id="sortbydefender">
                <div class="col-sm-7 mt-3">
                    <div class="sxdjdj87">
                        <div class="sdjd787">
                            <h6 class="sdjnd78">Sort By</h6>
                        </div>
                        <div class="text-white text-center sdjnd890j">
                            <div class="jnsjsd87">
                                <select class="inputcolor jjhn90k7" id="defender_team">
                                    <option class="hd7h89" value="">Team</option>
                                    @foreach ($team as $key=>$teamValue)
                                    {{$select=''}}
                                    @if(!empty($request['type']) && $request['type']=='defender')
                                    {{ $select=!empty($request['team']) && $request['team']==$key?"selected":''}}

                                    @endif
                                    <option class="hd7h89" value="{{$key}}" {{$select}}>{{$teamValue}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <select class="inputcolor kdjdkl8" id="defender_point">
                                <option class="hd7h89" value="">Point</option>
                                <option class="hd7h89" value="desc" {{ !empty($request['point']) && $request['point']=='desc'?"selected":''}}>High to Low</option>
                                <option class="hd7h89" value="asc" {{ !empty($request['point']) && $request['point']=='asc'?"selected":''}}>Low to High</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 mt-3">
                    <div class="range-slider">

                        <p class="range-slider__subtitle">Price Range</p>
                        <div class="value-data">
                            <p class="o-value"><img src="{{ asset('public/assets/image/coins.png') }}" style="vertical-align: text-top;" alt="" class="img-fluid" width="20">0</p>
                            <p class="defender_range range-slider__value">${{!empty($request['type']=='defender') && !empty($request['cost_range']) ?$request['cost_range']:'50' }}</p>
                        </div>

                        <div class="range-slider__slider">
                            <input type="range" min="0" max="50" value="{{!empty($request['type']=='defender') && !empty($request['cost_range']) ?$request['cost_range']:'50' }}" class="slider" id="defender_rangeSlider" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="table-responsive sdchsdsdh">
                        <table class="table">
                            <thead>
                                <th scope="col">
                                    <h6></h6>
                                </th>
                                <th scope="col">
                                    <h6>Name</h6>
                                </th>
                                <th scope="col">
                                    <h6>Team</h6>
                                </th>
                                <th scope="col">
                                    <h6>Goals</h6>
                                </th>
                                <th scope="col">
                                    <h6>Fantasy points</h6>
                                </th>
                                <th scope="col">
                                    <h6>Cost</h6>
                                </th>
                            </thead>
                            @foreach ($defenderData as $defenderValue)
                            {{$check=''}}
                            @if((!empty($user_selected_player) && in_array($defenderValue["id"],$user_selected_player)) || in_array($defenderValue["id"],$cookiesArray))
                            @php $check="checked"; 
                                        if($defenderValue['position_id']!=2){
                                            continue;
                                        }
                            @endphp
                            @endif
                            @if(empty($defenderValue["team"]["name"]))
                            @continue;
                            @endif
                            <tr>
                                <td class="defender_td">
                                    <input type="hidden" id="hiddenId" value="{{ $defenderValue["fullname"] }}">
                                    <input type="hidden" id="hiddenSellprice" value="{{ $defenderValue["sell_price"] }}">
                                    <img class="imgsize" src="{{ $defenderValue['image_path'] }}" />
                                </td>
                                <td class="defender_td">
                                    <p class="defender_fullname">
                                        {{ $defenderValue["fullname"] }}
                                    </p>
                                    <p class="sdjd6">{{$defenderValue["Position"]["name"]}}</p>
                                </td>
                                <td class="defender_td">
                                    <strong>{{
                      isset($defenderValue["team"]["name"])
                        ? $defenderValue["team"]["name"]
                        : ""
                    }}</strong>
                                </td>
                                <td class="defender_td">
                                    <p>18 Goals</p>
                                </td>
                                <td class="defender_td">
                                    <p>{{ $defenderValue["sum_totalPoints"] }} Points</p>
                                </td>
                                <td class="defender_td">
                                    <p class="hsksk78 defender_sell_price">
                                        {{ $defenderValue["sell_price"] }}M
                                    </p>
                                </td>
                                <td class="defender_td">
                                    <span class="check_span"></span>
                                    <input class="form-check-input tem-chekbox defendercheck" type="checkbox" value="{{ $defenderValue['id'] }}" id="flexCheckDefault" {{$check}} {{-- onclick="defendercheckbox()" --}} />
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="tab-pane fade contact-tab <?= $type == 'midfielder' ? 'show active' : '' ?>" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="form-outer">
            <div class="page slide-page">
                <div class="nsd79">
                    <div class="row">
                        <div class="col-sm-5 sxdhd789">
                            <div class="nhj89hn9">
                                <p class="h7h8j7">Pick two midfielders. Choose two midfield dynamos that will take each game by the scruff of the neck.</p>
                                <h1 class="dhcbn87">Midfielders</h1>
                            </div>
                        </div>
                        <div class="col-sm-7 d-none d-md-block sd8j97j">
                            <div class="d-flex">
                                @for ($i = 0; $i < 2; $i++) <div class="team-player">
                                    <img class="sdhdh7h8" src="{{ asset('public/assets/image/star-new-1.png') }}" />
                                    <div class="bh8j7h7 midfielder_staricon{{$i}}">
                                        <img id="midfielder_img{{ $i }}" src="{{ asset('public/assets/image/image _1.png') }}" />
                                    </div>
                                    <div class="sdjd7jh89 midfielder_staricon{{$i}}">
                                        <img src="{{ asset('public/assets/image/Vector_115.png') }}" />
                                        <div class="j7hs89">
                                            <h6 class="h7bhsh8y6" id="midfielder_name{{ $i }}">
                                                Tammy Johnson
                                            </h6>
                                            <p class="fjf78h7">Midfielder</p>
                                            <div class="dfhfj7j">
                                                <div class="djhfhd8h89">
                                                    <p class="sdbdj76">18 CGW Point</p>
                                                </div>
                                                <div class="djhfhd8h89">
                                                    <p class="sdbdj76">104 T F Points</p>
                                                </div>
                                            </div>
                                            <p class="sxjmndkod78">
                                                <b id="midfieldersell_price{{ $i }}">$5.25 M</b>
                                            </p>
                                        </div>
                                    </div>
                            </div>
                            @endfor
                        </div>
                    </div>
                    <div class="input-container sdhnd87 sdsdsde44">
                        <input class="input-field inputcolor sdjd8u7" type="text" placeholder="search" name="usrnm" id="midfielder" value="{{!empty($request['searchData']) && $request['type']=='midfielder'?$request['searchData']:''}}" />
                        <i class="fa fa-search icon sdcjd8" id="midfielder_search"></i>
                        <a class="sdjndk7" onclick="midfielderfilt()" href="javascript:void(0)">
                            <i class="fa fa-filter sdjd87" aria-hidden="true"></i>
                        </a>
                        <a class="sdjndk788" onclick="removePlayerCookie()" href="javascript:void(0)">
                            Reset
                        </a>
                        <a class="sdjndk788" href="javascript:void(0)" id="midfielder_filt">
                            Apply
                        </a>
                    </div>
                </div>

                <div class="row mt-2 sortby" id="sortbymidfielder">
                    <div class="col-sm-7 mt-3">
                        <div class="sxdjdj87">
                            <div class="sdjd787">
                                <h6 class="sdjnd78">Sort By</h6>
                            </div>
                            <div class="text-white text-center sdjnd890j">
                                <div class="jnsjsd87">
                                    <select class="inputcolor jjhn90k7" id="midfielder_team">
                                        <option class="hd7h89" value="">Team</option>
                                        @foreach ($team as $key=>$teamValue)
                                        {{$select=''}}
                                        @if(!empty($request['type']) && $request['type']=='midfielder')
                                        {{ $select=!empty($request['team']) && $request['team']==$key?"selected":''}}

                                        @endif
                                        <option class="hd7h89" value="{{$key}}" {{$select}}>{{$teamValue}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <select class="inputcolor kdjdkl8" id="midfielder_point">
                                    <option class="hd7h89" value="">Point</option>
                                    <option class="hd7h89" value="desc" {{ !empty($request['point']) && $request['point']=='desc'?"selected":''}}>High to Low</option>
                                    <option class="hd7h89" value="asc" {{ !empty($request['point']) && $request['point']=='asc'?"selected":''}}>Low to High</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 mt-3">
                        <div class="range-slider">

                            <p class="range-slider__subtitle">Price Range</p>
                            <div class="value-data">
                                <p class="o-value"><img src="{{ asset('public/assets/image/coins.png') }}" style="vertical-align: text-top;" alt="" class="img-fluid" width="20">0</p>
                                <p class="midfielder_range range-slider__value">${{!empty($request['type']=='defender') && !empty($request['cost_range']) ?$request['cost_range']:'50' }}</p>
                            </div>

                            <div class="range-slider__slider">
                                <input type="range" min="0" max="50" value="{{!empty($request['type']=='midfielder') && !empty($request['cost_range']) ?$request['cost_range']:'50' }}" class="slider" id="midfielder_rangeSlider" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="table-responsive sdchsdsdh">
                            <table class="table">
                                <thead>
                                    <th scope="col">
                                        <h6></h6>
                                    </th>
                                    <th scope="col">
                                        <h6>Name</h6>
                                    </th>
                                    <th scope="col">
                                        <h6>Team</h6>
                                    </th>
                                    <th scope="col">
                                        <h6>Goals</h6>
                                    </th>
                                    <th scope="col">
                                        <h6>Fantasy points</h6>
                                    </th>
                                    <th scope="col">
                                        <h6>Cost</h6>
                                    </th>
                                </thead>
                                @foreach ($midfielderData as $midfielderValue)
                                {{$check=''}}
                                @if((!empty($user_selected_player) && in_array($midfielderValue["id"],$user_selected_player)) || in_array($midfielderValue["id"],$cookiesArray))
                                @php $check="checked";
                                        if($midfielderValue['position_id']!=3){
                                            continue;
                                        }
                                 @endphp
                                @endif
                                @if(empty($midfielderValue["team"]["name"]))
                                @continue;
                                @endif
                                <tr>
                                    <td class="midfielder_td">
                                        <input type="hidden" id="hiddenId" value="{{ $midfielderValue["fullname"] }}">
                                        <input type="hidden" id="midSellprice" value="{{ $midfielderValue["sell_price"] }}">
                                        <img class="imgsize" src="{{ $midfielderValue['image_path'] }}" />
                                    </td>
                                    <td class="midfielder_td">
                                        <p class="midfielder_fullname">
                                            {{ $midfielderValue["fullname"] }}
                                        </p>
                                        <p class="sdjd6">{{$midfielderValue["Position"]["name"]}}</p>
                                    </td>
                                    <td class="midfielder_td">
                                        <strong>{{
                        isset($midfielderValue["team"]["name"])
                          ? $midfielderValue["team"]["name"]
                          : ""
                      }}</strong>
                                    </td>
                                    <td class="midfielder_td">
                                        <p>18 Goals</p>
                                    </td>
                                    <td class="midfielder_td">
                                        <p>{{ $midfielderValue["sum_totalPoints"] }} Points</p>
                                    </td>
                                    <td class="midfielder_td">
                                        <p class="hsksk78 midfielder_sell_price">
                                            {{ $midfielderValue["sell_price"] }}M
                                        </p>
                                    </td>
                                    <td class="midfielder_td">
                                        <span class="check_span"></span>
                                        <input class="form-check-input tem-chekbox midfieldercheck" type="checkbox" value="{{ $midfielderValue['id'] }}" id="flexCheckDefault" {{$check}} {{-- onclick="midfieldercheckbox()" --}} />
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="tab-pane fade contact-tab2 <?= $type == 'forward' ? 'show active' : '' ?>" id="contact2" role="tabpanel" aria-labelledby="contact-tab2">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="form-outer">
            <div class="page slide-page">
                <div class="nsd79">
                    <div class="row">
                        <div class="col-sm-5 sxdhd789">
                            <div class="nhj89hn9">
                                <p class="h7h8j7">Pick two forwards. Select two strikers that will demolish any bus the opposition parks.</p>
                                <h1 class="dhcbn87">Forwards</h1>
                            </div>
                        </div>
                        <div class="col-sm-7 d-none d-md-block sd8j97j">
                            <div class="d-flex">
                                @for ($i = 0; $i < 2; $i++) <div class="team-player">
                                    <img class="sdhdh7h8" src="{{ asset('public/assets/image/star-new-1.png') }}" />
                                    <div class="bh8j7h7 forward_staricon{{$i}}">
                                        <img id="forward_img{{ $i }}" src="{{ asset('public/assets/image/image _1.png') }}" />
                                    </div>
                                    <div class="sdjd7jh89 forward_staricon{{$i}}">
                                        <img src="{{ asset('public/assets/image/Vector_115.png') }}" />
                                        <div class="j7hs89">
                                            <h6 class="h7bhsh8y6" id="forward_name{{ $i }}">
                                                Tammy Johnson
                                            </h6>
                                            <p class="fjf78h7">Forward</p>
                                            <div class="dfhfj7j">
                                                <div class="djhfhd8h89">
                                                    <p class="sdbdj76">18 CGW Point</p>
                                                </div>
                                                <div class="djhfhd8h89">
                                                    <p class="sdbdj76">104 T F Points</p>
                                                </div>
                                            </div>
                                            <p class="sxjmndkod78">
                                                <b id="forwardsell_price{{ $i }}">$5.25 M</b>
                                            </p>
                                        </div>
                                    </div>
                            </div>
                            @endfor
                        </div>
                    </div>

                    <div class="input-container sdhnd87 sdsdsde44">
                        <input class="input-field inputcolor sdjd8u7" type="text" placeholder="search" name="usrnm" id="forward" value="{{!empty($request['searchData']) && $request['type']=='forward'?$request['searchData']:''}}" />
                        <i class="fa fa-search icon sdcjd8" id="forward_search"></i>
                        <a class="sdjndk7" onclick="forwardfilt()" href="javascript:void(0)">
                            <i class="fa fa-filter sdjd87" aria-hidden="true"></i>
                        </a>
                        <a class="sdjndk788" onclick="removePlayerCookie()" href="javascript:void(0)">
                            Reset
                        </a>
                        <a class="sdjndk788" href="javascript:void(0)" id="forward_filt">
                            Apply
                        </a>

                    </div>
                </div>

                <div class="row mt-2 sortby" id="sortbyforward">

                    <div class="col-sm-7 mt-3">
                        <div class="sxdjdj87">
                            <div class="sdjd787">
                                <h6 class="sdjnd78">Sort By</h6>
                            </div>
                            <div class="text-white text-center sdjnd890j">
                                <div class="jnsjsd87">
                                    <select class="inputcolor jjhn90k7" id="forward_team">
                                        <option class="hd7h89" value="">Team</option>
                                        @foreach ($team as $key=>$teamValue)
                                        {{$select=''}}
                                        @if(!empty($request['type']) && $request['type']=='forward')
                                        {{ $select=!empty($request['team']) && $request['team']==$key?"selected":''}}

                                        @endif
                                        <option class="hd7h89" value="{{$key}}" {{$select}}>{{$teamValue}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <select class="inputcolor kdjdkl8" id="forward_point">
                                    <option class="hd7h89" value="">Point</option>
                                    <option class="hd7h89" value="desc" {{ !empty($request['point']) && $request['point']=='desc'?"selected":''}}>High to Low</option>
                                    <option class="hd7h89" value="asc" {{ !empty($request['point']) && $request['point']=='asc'?"selected":''}}>Low to High</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 mt-3">
                        <div class="range-slider">

                            <p class="range-slider__subtitle">Price Range</p>
                            <div class="value-data">
                                <p class="o-value"><img src="{{ asset('public/assets/image/coins.png') }}" style="vertical-align: text-top;" alt="" class="img-fluid" width="20">0</p>
                                <p class="forward_range range-slider__value">$ {{!empty($request['type']=='forward') && !empty($request['cost_range']) ?$request['cost_range']:'50' }}</p>
                            </div>

                            <div class="range-slider__slider">
                                <input type="range" min="0" max="50" value="{{!empty($request['type']=='forward') && !empty($request['cost_range']) ?$request['cost_range']:'50' }}" class="slider" id="forward_rangeSlider" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="table-responsive sdchsdsdh">
                            <table class="table">
                                <thead>
                                    <th scope="col">
                                        <h6></h6>
                                    </th>
                                    <th scope="col">
                                        <h6>Name</h6>
                                    </th>
                                    <th scope="col">
                                        <h6>Team</h6>
                                    </th>
                                    <th scope="col">
                                        <h6>Goals</h6>
                                    </th>
                                    <th scope="col">
                                        <h6>Fantasy points</h6>
                                    </th>
                                    <th scope="col">
                                        <h6>Cost</h6>
                                    </th>
                                </thead>
                                @foreach ($forwardData as $forwardValue)
                                {{$check=''}}
                                @if((!empty($user_selected_player) && in_array($forwardValue["id"],$user_selected_player)) || in_array($forwardValue["id"],$cookiesArray))
                                @php $check="checked";
                                        if($forwardValue['position_id']!=4){
                                            continue;
                                        }
                                 @endphp
                                @endif
                                @if(empty($forwardValue["team"]["name"]))
                                @continue;
                                @endif
                                <tr>
                                    <td class="forward_td">
                                        <input type="hidden" id="hiddenId" value="{{ $forwardValue["fullname"] }}">
                                        <input type="hidden" id="forwrdSellPrice" value="{{ $forwardValue["sell_price"] }}">

                                        <img class="imgsize" src="{{ $forwardValue['image_path'] }}" />
                                    </td>
                                    <td class="forward_td">
                                        <p class="forward_fullname">
                                            {{ $forwardValue["fullname"] }}
                                        </p>
                                        <p class="sdjd6">{{$forwardValue["Position"]["name"]}}</p>
                                    </td>
                                    <td class="forward_td">
                                        <strong>{{
                        isset($forwardValue["team"]["name"])
                          ? $forwardValue["team"]["name"]
                          : ""
                      }}</strong>
                                    </td>
                                    <td class="forward_td">
                                        <p>18 Goals</p>
                                    </td>
                                    <td class="forward_td">
                                        <p>{{ $forwardValue["sum_totalPoints"] }} Points</p>
                                    </td>
                                    <td class="forward_td">
                                        <p class="hsksk78 forward_sell_price">
                                            {{ $forwardValue["sell_price"] }}M
                                        </p>
                                    </td>
                                    <td class="forward_td">
                                        <span class="check_span"></span>
                                        <input class="form-check-input tem-chekbox forwardcheck" name="checkbox_forward" type="checkbox" value="{{
                        $forwardValue["id"]
                      }}" id="flexCheckDefault" {{$check}} {{-- onclick="forwardcheckbox()" --}}>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    $(".goalkeeper_staricon").hide();
    $(".defender_staricon0").hide();
    $(".defender_staricon1").hide();
    $(".midfielder_staricon0").hide();
    $(".midfielder_staricon1").hide();
    $(".forward_staricon0").hide();
    $(".forward_staricon1").hide();
    selectCount();
    goalKeepercheckbox();
    defendercheckbox();
    midfieldercheckbox();
    forwardcheckbox();

    function goalKeepar() {
        var element = document.getElementById("sortbyby");
        element.classList.toggle("active");
    }

    function defenderfilt() {
        var element = document.getElementById("sortbydefender");
        element.classList.toggle("active");
    }

    function midfielderfilt() {
        var element = document.getElementById("sortbymidfielder");
        element.classList.toggle("active");
    }

    function forwardfilt() {
        var element = document.getElementById("sortbyforward");
        element.classList.toggle("active");
    }

    slider = document.getElementById("rangeSlider");
    outputEl = document.querySelector(".goalkeeper_range");
    sliderShow(slider, outputEl);

    slider1 = document.getElementById("defender_rangeSlider");
    outputEl1 = document.querySelector(".defender_range");
    sliderShow(slider1, outputEl1);

    slider2 = document.getElementById("midfielder_rangeSlider");
    outputEl2 = document.querySelector(".midfielder_range");
    sliderShow(slider2, outputEl2);

    slider3 = document.getElementById("midfielder_rangeSlider");
    outputEl3 = document.querySelector(".midfielder_range");
    sliderShow(slider3, outputEl3);

    function sliderShow(slider, outputEl) {
        function decimalSeparator(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
        outputEl.textContent = `${decimalSeparator(slider.value)} `; // Display the default slider value
        // Update the current slider value (each time you drag the slider handle)
        slider.oninput = function() {
            outputEl.textContent = `${decimalSeparator(this.value)} `;
        };
    }

</script>
