<div class="sdjsd689">
  <div class="sdjsd789">
    <h1 class="sdhn485" id="selected_count">0/7</h1>
    <p class="sxdjhd767">
      <b>Players <br />Selected</b>
    </p>
  </div>
  <div class="sxdhdcn9908">
    <h1 class="sdhsdks87">50M</h1>
    <p class="sdjhs7tyh">
      <b
        >Money<br />
        Remaining</b
      >
    </p>
  </div>
</div>
<div
  class="tab-pane fade home-tab <?= $type == 'goalkeeper' || $type == '' ? 'show active' : '' ?>"
  id="home"
  role="tabpanel"
  aria-labelledby="home-tab"
>
  <div class="form-outer">
    <div class="page slide-page">
      <div class="nsd79">
        <div class="row">
          <div class="col-sm-5 sxdhd789">
            <div class="nhj89hn9">
              <p class="h7h8j7">Pick 1 goalkeeper</p>
              <h1 class="dhcbn87">Goalkeeper</h1>
            </div>
          </div>
          <div class="col-sm-7 d-none d-md-block sd8j97j">
            <div class="d-flex justify-content-center">
              <div class="team-player">
                <img
                  class="sdhdh7h8"
                  src="{{ asset('public/assets/image/star-new-1.png') }}"
                />
                <div class="bh8j7h7">
                  <img
                    id="goalkeeper_img"
                    src="{{ asset('public/assets/image/image _1.png') }}"
                  />
                </div>
                <div class="sdjd7jh89">
                  <img
                    src="{{ asset('public/assets/image/Vector_115.png') }}"
                  />
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
            <input
              class="input-field inputcolor sdjd8u7"
              type="text"
              placeholder="search"
              name="usrnm"
              id="goal_keeper" value="{{!empty($request['searchData']) && $request['type']=='goalkeeper'?$request['searchData']:''}}"
            />
            <i class="fa fa-search icon sdcjd8" id="goal_keeper_search"></i>
            <a class="sdjndk7" href="javascript:void(0)" id="goalkeeper_filt">
              <i class="fa fa-filter sdjd87" aria-hidden="true"></i>
            </a>
          </div>
        </div>

        <div class="row mt-2">
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

                <p class="range-slider__subtitle">Cost Bar</p>
                <div class="value-data"><p class="o-value">$0</p> <p class="goalkeeper_range range-slider__value">$100</p></div>

                <div class="range-slider__slider">
                    <input
                    type="range"
                    min="0"
                    max="100"
                    value="100"
                    class="slider"
                    id="rangeSlider"
                    />
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
                    <h6>Goals/Assists</h6>
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
                  @if(!empty($user_selected_player) && in_array($goakkeeperValue["id"],$user_selected_player))
                    @php $check="checked"; @endphp
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
                      <img
                        class="imgsize"
                        src="{{ $goakkeeperValue['image_path'] }}"
                      />
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
                      <p>{{ $goakkeeperValue["total_point"] }} Points</p>
                    </td>
                    <td class="goalkeeper_td">
                      <p class="hsksk78 goalkeeper_sell_price">
                        {{ $goakkeeperValue["sell_price"] }} M
                      </p>
                    </td>
                    <td class="checkboxtd">
                      <input class="form-check-input tem-chekbox goalkeepercheck" type="checkbox" {{$check}} value="{{ $goakkeeperValue['id'] }}" id="flexCheckDefault" onclick="goalKeepercheckbox(event)"/>
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
<div
  class="tab-pane fade profile-tab <?= $type == 'defender' ? 'show active' : '' ?>"
  id="profile"
  role="tabpanel"
  aria-labelledby="profile-tab"
>
  <div class="form-outer">
    <div class="page slide-page">
      <div class="nsd79">
        <div class="row">
          <div class="col-sm-5 sxdhd789">
            <div class="nhj89hn9">
              <p class="h7h8j7">Pick 2 Defender</p>
              <h1 class="dhcbn87">Defender</h1>
            </div>
          </div>
          <div class="col-sm-7 d-none d-md-block sd8j97j">
            <div class="d-flex">
              @for ($i = 0; $i < 2; $i++)
              <div class="team-player">
                <img
                  class="sdhdh7h8"
                  src="{{ asset('public/assets/image/star-new-1.png') }}"
                />
                <div class="bh8j7h7">
                  <img
                    id="defender_img{{ $i }}"
                    src="{{ asset('public/assets/image/image _1.png') }}"
                  />
                </div>
                <div class="sdjd7jh89">
                  <img
                    src="{{ asset('public/assets/image/Vector_115.png') }}"
                  />
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
            <input
              class="input-field inputcolor sdjd8u7"
              type="text"
              placeholder="search"
              name="usrnm"
              id="defender" value="{{!empty($request['searchData']) && $request['type']=='defender'?$request['searchData']:''}}"
            />
            <i class="fa fa-search icon sdcjd8" id="defender_search"></i>
            <a class="sdjndk7" href="javascript:void(0)" id="defender_filt">
              <i class="fa fa-filter sdjd87" aria-hidden="true"></i>
            </a>
          </div>
        </div>

        <div class="row mt-2">
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
                <select class="inputcolor kdjdkl8"  id="defender_point">
                    <option class="hd7h89" value="">Point</option>
                    <option class="hd7h89" value="desc" {{ !empty($request['point']) && $request['point']=='desc'?"selected":''}}>High to Low</option>
                    <option class="hd7h89" value="asc" {{ !empty($request['point']) && $request['point']=='asc'?"selected":''}}>Low to High</option>
                </select>
              </div>
            </div>
          </div>

          <div class="col-sm-4 mt-3">
            <div class="range-slider">

                <p class="range-slider__subtitle">Cost Bar</p>
                <div class="value-data"><p class="o-value">$0</p> <p class="defender_range range-slider__value">$100</p></div>

                <div class="range-slider__slider">
                    <input
                    type="range"
                    min="0"
                    max="100"
                    value="100"
                    class="slider"
                    id="defender_rangeSlider"
                    />
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
                    <h6>Goals/Assists</h6>
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
                  @if(!empty($user_selected_player) && in_array($defenderValue["id"],$user_selected_player))
                    @php $check="checked"; @endphp
                  @endif
                @if(empty($defenderValue["team"]["name"]))
                      @continue;
                  @endif
                <tr>
                  <td class="defender_td">
                    <img
                      class="imgsize"
                      src="{{ $defenderValue['image_path'] }}"
                    />
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
                    <p>{{ $defenderValue["total_point"] }} Points</p>
                  </td>
                  <td class="defender_td">
                    <p class="hsksk78 defender_sell_price">
                      {{ $defenderValue["sell_price"] }}
                    </p>
                  </td>
                  <td>
                    <input
                      class="form-check-input tem-chekbox defendercheck"
                      type="checkbox"
                      value="{{ $defenderValue['id'] }}"
                      id="flexCheckDefault" {{$check}}
                      onclick="defendercheckbox()"
                    />
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

<div
  class="tab-pane fade contact-tab <?= $type == 'midfielder' ? 'show active' : '' ?>"
  id="contact"
  role="tabpanel"
  aria-labelledby="contact-tab"
>
  <div
    class="tab-pane fade show active"
    id="home"
    role="tabpanel"
    aria-labelledby="home-tab"
  >
    <div class="form-outer">
      <div class="page slide-page">
        <div class="nsd79">
          <div class="row">
            <div class="col-sm-5 sxdhd789">
              <div class="nhj89hn9">
                <p class="h7h8j7">Pick 2 midfielder</p>
                <h1 class="dhcbn87">Midfielder</h1>
              </div>
            </div>
            <div class="col-sm-7 d-none d-md-block sd8j97j">
              <div class="d-flex">
                @for ($i = 0; $i < 2; $i++)
                <div class="team-player">
                  <img
                    class="sdhdh7h8"
                    src="{{ asset('public/assets/image/star-new-1.png') }}"
                  />
                  <div class="bh8j7h7">
                    <img
                      id="midfielder_img{{ $i }}"
                      src="{{ asset('public/assets/image/image _1.png') }}"
                    />
                  </div>
                  <div class="sdjd7jh89">
                    <img
                      src="{{ asset('public/assets/image/Vector_115.png') }}"
                    />
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
              <input
                class="input-field inputcolor sdjd8u7"
                type="text"
                placeholder="search"
                name="usrnm"
                id="midfielder" value="{{!empty($request['searchData']) && $request['type']=='midfielder'?$request['searchData']:''}}"
              />
              <i class="fa fa-search icon sdcjd8" id="midfielder_search"></i>
              <a class="sdjndk7" href="javascript:void(0)" id="midfielder_filt">
                <i class="fa fa-filter sdjd87" aria-hidden="true"></i>
              </a>
            </div>
          </div>

          <div class="row mt-2">
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

                    <p class="range-slider__subtitle">Cost Bar</p>
                    <div class="value-data"><p class="o-value">$0</p> <p class="midfielder_range range-slider__value">$100</p></div>

                    <div class="range-slider__slider">
                        <input
                        type="range"
                        min="0"
                        max="100"
                        value="100"
                        class="slider"
                        id="midfielder_rangeSlider"
                        />
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
                      <h6>Goals/Assists</h6>
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
                  @if(!empty($user_selected_player) && in_array($midfielderValue["id"],$user_selected_player))
                    @php $check="checked"; @endphp
                  @endif
                  @if(empty($midfielderValue["team"]["name"]))
                        @continue;
                    @endif
                  <tr>
                    <td class="midfielder_td">
                      <img
                        class="imgsize"
                        src="{{ $midfielderValue['image_path'] }}"
                      />
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
                      <p>{{ $midfielderValue["total_point"] }} Points</p>
                    </td>
                    <td class="midfielder_td">
                      <p class="hsksk78 midfielder_sell_price">
                        {{ $midfielderValue["sell_price"] }}
                      </p>
                    </td>
                    <td>
                      <input
                        class="form-check-input tem-chekbox midfieldercheck"
                        type="checkbox"
                        value="{{ $midfielderValue['id'] }}"
                        id="flexCheckDefault" {{$check}}
                        onclick="midfieldercheckbox()"
                      />
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
<div
  class="tab-pane fade contact-tab2 <?= $type == 'forward' ? 'show active' : '' ?>"
  id="contact2"
  role="tabpanel"
  aria-labelledby="contact-tab2"
>
  <div
    class="tab-pane fade show active"
    id="home"
    role="tabpanel"
    aria-labelledby="home-tab"
  >
    <div class="form-outer">
      <div class="page slide-page">
        <div class="nsd79">
          <div class="row">
            <div class="col-sm-5 sxdhd789">
              <div class="nhj89hn9">
                <p class="h7h8j7">Pick 2 forward</p>
                <h1 class="dhcbn87">Forward</h1>
              </div>
            </div>
            <div class="col-sm-7 d-none d-md-block sd8j97j">
              <div class="d-flex">
                @for ($i = 0; $i < 2; $i++)
                <div class="team-player">
                  <img
                    class="sdhdh7h8"
                    src="{{ asset('public/assets/image/star-new-1.png') }}"
                  />
                  <div class="bh8j7h7">
                    <img
                      id="forward_img{{ $i }}"
                      src="{{ asset('public/assets/image/image _1.png') }}"
                    />
                  </div>
                  <div class="sdjd7jh89">
                    <img
                      src="{{ asset('public/assets/image/Vector_115.png') }}"
                    />
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
              <input
                class="input-field inputcolor sdjd8u7"
                type="text"
                placeholder="search"
                name="usrnm"
                id="forward" value="{{!empty($request['searchData']) && $request['type']=='forward'?$request['searchData']:''}}"
              />
              <i class="fa fa-search icon sdcjd8" id="forward_search"></i>
              <a class="sdjndk7" href="javascript:void(0)" id="forward_filt">
                <i class="fa fa-filter sdjd87" aria-hidden="true"></i>
              </a>
            </div>
          </div>

          <div class="row mt-2">
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

                    <p class="range-slider__subtitle">Cost Bar</p>
                    <div class="value-data"><p class="o-value">$0</p> <p class="forward_range range-slider__value">$100</p></div>

                    <div class="range-slider__slider">
                        <input
                        type="range"
                        min="0"
                        max="100"
                        value="100"
                        class="slider"
                        id="forward_rangeSlider"
                        />
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
                      <h6>Goals/Assists</h6>
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
                  @if(!empty($user_selected_player) && in_array($forwardValue["id"],$user_selected_player))
                    @php $check="checked"; @endphp
                  @endif
                  @if(empty($forwardValue["team"]["name"]))
                        @continue;
                    @endif
                  <tr>
                    <td class="forward_td">
                      <img
                        class="imgsize"
                        src="{{ $forwardValue['image_path'] }}"
                      />
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
                      <p>{{ $forwardValue["total_point"] }} Points</p>
                    </td>
                    <td class="forward_td">
                      <p class="hsksk78 forward_sell_price">
                        {{ $forwardValue["sell_price"] }}
                      </p>
                    </td>
                    <td>
                      <input class="form-check-input tem-chekbox forwardcheck"
                      name="checkbox_forward" type="checkbox" value="{{
                        $forwardValue["id"]
                      }}" id="flexCheckDefault" {{$check}}
                      onclick="forwardcheckbox()">
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
let slider = document.getElementById("rangeSlider");
let outputEl = document.querySelector(".goalkeeper_range");
sliderShow(slider,outputEl);

let slider1 = document.getElementById("defender_rangeSlider");
let outputEl1 = document.querySelector(".defender_range");
sliderShow(slider1,outputEl1);

let slider2 = document.getElementById("midfielder_rangeSlider");
let outputEl2 = document.querySelector(".midfielder_range");
sliderShow(slider2,outputEl2);

let slider3 = document.getElementById("midfielder_rangeSlider");
let outputEl3 = document.querySelector(".midfielder_range");
sliderShow(slider3,outputEl3);

function sliderShow(slider,outputEl){
    function decimalSeparator(number) {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
    outputEl.textContent = `$ ${decimalSeparator(slider.value)} `; // Display the default slider value
    // Update the current slider value (each time you drag the slider handle)
    slider.oninput = function () {
    outputEl.textContent = `$ ${decimalSeparator(this.value)} `;
    };
}



</script>
<script type="text/javascript">
selectCount()
goalKeepercheckbox();
defendercheckbox();
midfieldercheckbox();
forwardcheckbox();

    function playerTeamCheck(){
        var teamArray = [];
        $(".form-check-input:checkbox[type=checkbox]:checked").each(function (e) {
            var teamname=$(this).closest("tr").find("strong").html();
            if(teamArray[teamname]===undefined){
                teamArray[teamname]=1
            }else{
                teamArray[teamname]=parseInt(teamArray[teamname])+1
            }
            if(teamArray[teamname]>2){
                $.notify("You can only select 2 maximum players from one team.", "info");
                $(this).closest("tr").find("input[type=checkbox]").prop("checked", false);
                $(this).closest('tr').css('backgroundColor','');
                //$("#NextBtn").attr("class","firstNext next adisable");
            }else{
                //$("#NextBtn").attr("class","firstNext next");
            }
        });
        selectCount();
    }

  $("body").on("click", ".goalkeeper_td", function () {
    if (
      $(this).closest("tr").find("input[type=checkbox]").prop("checked") == true
    ) {
      $(this).closest("tr").find("input[type=checkbox]").prop("checked", false);
      $("input.goalkeepercheck").removeAttr("disabled");
    } else {
      var select = 0;
      var image = "";
      var full_name = "";
      var sell_price = "";

      $(".goalkeepercheck:checkbox[type=checkbox]:checked").each(function () {
        select += 1;
      });

      if (select >= 1) {
        $("input.goalkeepercheck").prop("disabled", true);
      } else {
        $("input.goalkeepercheck").removeAttr("disabled");
        $(this)
          .closest("tr")
          .find("input[type=checkbox]")
          .prop("checked", true);
      }
      newselect = 0;
      $(".goalkeepercheck:checkbox[type=checkbox]:checked").each(function () {
        newselect += 1;
      });
      if (newselect >= 1) {
        $("input.goalkeepercheck").prop("disabled", true);
      }

      $(".goalkeepercheck:checkbox[type=checkbox]:checked").each(function () {
        $(this).removeAttr("disabled");
        image = $(this).closest("tr").find("img").attr("src");
        full_name = $(this).closest("tr").find(".goalkep_fullname").html();
        sell_price = $(this)
          .closest("tr")
          .find(".goalkeeper_sell_price")
          .html();
        $("#goalkeeper_img").attr("src", image);
        $("#goalkeeper_name").html(full_name);
        $("#goalkeepersell_price").html(sell_price);
        select += 1;
      });
    }
    $(".goalkeepercheck:checkbox[type=checkbox]:checked").closest('tr').css('backgroundColor','#0ea5e0');
    $(".goalkeepercheck:checkbox[type=checkbox]:not(:checked)").closest('tr').css('backgroundColor','');
    selectCount();
    playerTeamCheck();
  });

  $("body").on("click", ".defender_td", function () {
    if (
      $(this).closest("tr").find("input[type=checkbox]").prop("checked") == true
    ) {
      $(this).closest("tr").find("input[type=checkbox]").prop("checked", false);
      $("input.defendercheck").removeAttr("disabled");
    } else {
      var select = 0;
      var image = "";
      var full_name = "";
      var sell_price = "";

      $(".defendercheck:checkbox[type=checkbox]:checked").each(function () {
        select += 1;
      });
      if (select >= 2) {
        $("input.defendercheck").prop("disabled", true);
      } else {
        $("input.defendercheck").removeAttr("disabled");
        $(this)
          .closest("tr")
          .find("input[type=checkbox]")
          .prop("checked", true);
      }
      newselect = 0;
      $(".defendercheck:checkbox[type=checkbox]:checked").each(function () {
        newselect += 1;
      });
      if (newselect >= 2) {
        $("input.defendercheck").prop("disabled", true);
      }
      var n = 0;
      $(".defendercheck:checkbox[type=checkbox]:checked").each(function () {
        $(this).removeAttr("disabled");
        image = $(this).closest("tr").find("img").attr("src");
        full_name = $(this).closest("tr").find(".defender_fullname").html();
        sell_price = $(this).closest("tr").find(".defender_sell_price").html();
        $("#defender_img" + n).attr("src", image);
        $("#defender_name" + n).html(full_name);
        $("#defendersell_price" + n).html(sell_price);
        n += 1;
      });
    }
    $(".defendercheck:checkbox[type=checkbox]:checked").closest('tr').css('backgroundColor','#0ea5e0');
    $(".defendercheck:checkbox[type=checkbox]:not(:checked)").closest('tr').css('backgroundColor','');
    selectCount();
    playerTeamCheck();

  });

  $("body").on("click", ".midfielder_td", function () {
    if (
      $(this).closest("tr").find("input[type=checkbox]").prop("checked") == true
    ) {
      $(this).closest("tr").find("input[type=checkbox]").prop("checked", false);
      $("input.midfieldercheck").removeAttr("disabled");
    } else {
      var select = 0;
      var image = "";
      var full_name = "";
      var sell_price = "";

      $(".midfieldercheck:checkbox[type=checkbox]:checked").each(function () {
        select += 1;
      });
      if (select >= 2) {
        $("input.midfieldercheck").prop("disabled", true);
      } else {
        $("input.midfieldercheck").removeAttr("disabled");
        $(this)
          .closest("tr")
          .find("input[type=checkbox]")
          .prop("checked", true);
      }
      newselect = 0;
      $(".midfieldercheck:checkbox[type=checkbox]:checked").each(function () {
        newselect += 1;
      });
      if (newselect >= 2) {
        $("input.midfieldercheck").prop("disabled", true);
      }
      var n = 0;
      $(".midfieldercheck:checkbox[type=checkbox]:checked").each(function () {
        $(this).removeAttr("disabled");
        image = $(this).closest("tr").find("img").attr("src");
        full_name = $(this).closest("tr").find(".midfielder_fullname").html();
        sell_price = $(this)
          .closest("tr")
          .find(".midfielder_sell_price")
          .html();
        $("#midfielder_img" + n).attr("src", image);
        $("#midfielder_name" + n).html(full_name);
        $("#midfieldersell_price" + n).html(sell_price);
        n += 1;
      });
    }
    $(".midfieldercheck:checkbox[type=checkbox]:checked").closest('tr').css('backgroundColor','#0ea5e0');
    $(".midfieldercheck:checkbox[type=checkbox]:not(:checked)").closest('tr').css('backgroundColor','');
    selectCount();
    playerTeamCheck();
  });

  $("body").on("click", ".forward_td", function () {
    if (
      $(this).closest("tr").find("input[type=checkbox]").prop("checked") == true
    ) {
      $(this).closest("tr").find("input[type=checkbox]").prop("checked", false);
      $("input.forwardcheck").removeAttr("disabled");
    } else {
      var select = 0;
      var image = "";
      var full_name = "";
      var sell_price = "";

      $(".forwardcheck:checkbox[type=checkbox]:checked").each(function () {
        select += 1;
      });
      if (select >= 2) {
        $("input.forwardcheck").prop("disabled", true);
      } else {
        $("input.forwardcheck").removeAttr("disabled");
        $(this)
          .closest("tr")
          .find("input[type=checkbox]")
          .prop("checked", true);
      }
      newselect = 0;
      $(".forwardcheck:checkbox[type=checkbox]:checked").each(function () {
        newselect += 1;
      });
      if (newselect >= 2) {
        $("input.forwardcheck").prop("disabled", true);
      }
      var n = 0;
      $(".forwardcheck:checkbox[type=checkbox]:checked").each(function () {
        $(this).removeAttr("disabled");
        image = $(this).closest("tr").find("img").attr("src");
        full_name = $(this).closest("tr").find(".forward_fullname").html();
        sell_price = $(this).closest("tr").find(".forward_sell_price").html();
        $("#forward_img" + n).attr("src", image);
        $("#forward_name" + n).html(full_name);
        $("#forwardsell_price" + n).html(sell_price);
        n += 1;
      });
    }
    $(".forwardcheck:checkbox[type=checkbox]:checked").closest('tr').css('backgroundColor','#0ea5e0');
    $(".forwardcheck:checkbox[type=checkbox]:not(:checked)").closest('tr').css('backgroundColor','');
    selectCount();
    playerTeamCheck();
  });

  function selectCount() {
    var selected = 0;
    $(".form-check-input:checkbox[type=checkbox]:checked").each(function (e) {
      selected += 1;
    });
    $("#selected_count").html(selected + "/7");
  }


  function goalKeepercheckbox() {
    var select = 0;
    var image = "";
    var full_name = "";
    var sell_price = "";
    $(".goalkeepercheck:checkbox[type=checkbox]:checked").each(function () {
      image = $(this).closest("tr").find("img").attr("src");
      full_name = $(this).closest("tr").find(".goalkep_fullname").html();
      sell_price = $(this).closest("tr").find(".goalkeeper_sell_price").html();
      select += 1;
    });
    if (select >= 1) {
      $("#goalkeeper_img").attr("src", image);
      $("#goalkeeper_name").html(full_name);
      $("#goalkeepersell_price").html(sell_price);
      $("input.goalkeepercheck").attr("disabled", true);
      $(".goalkeepercheck:checkbox[type=checkbox]:checked").removeAttr(
        "disabled"
      );
    } else {
      $("input.goalkeepercheck").removeAttr("disabled");
      $(".goalkeepercheck:checkbox[type=checkbox]:checked").removeAttr(
        "disabled"
      );
    }
    $(".goalkeepercheck:checkbox[type=checkbox]:checked").closest('tr').css('backgroundColor','#0ea5e0');
    $(".goalkeepercheck:checkbox[type=checkbox]:not(:checked)").closest('tr').css('backgroundColor','');
  }

  function defendercheckbox() {
    var select = 0;

    $(".defendercheck:checkbox[type=checkbox]:checked").each(function () {
      image = $(this).closest("tr").find("img").attr("src");
      full_name = $(this).closest("tr").find(".defender_fullname").html();
      sell_price = $(this).closest("tr").find(".defender_sell_price").html();
      $("#defender_img" + select).attr("src", image);
      $("#defender_name" + select).html(full_name);
      $("#defendersell_price" + select).html(sell_price);
      select += 1;
    });

    if (select >= 2) {
      $("input.defendercheck").attr("disabled", true);
      $(".defendercheck:checkbox[type=checkbox]:checked").removeAttr(
        "disabled"
      );
    } else {
      $(".defendercheck:checkbox[type=checkbox]:checked").removeAttr(
        "disabled"
      );
      $("input.defendercheck").removeAttr("disabled");
    }
    $(".defendercheck:checkbox[type=checkbox]:checked").closest('tr').css('backgroundColor','#0ea5e0');
    $(".defendercheck:checkbox[type=checkbox]:not(:checked)").closest('tr').css('backgroundColor','');
  }

  function midfieldercheckbox() {
    var select = 0;
    $(".midfieldercheck:checkbox[type=checkbox]:checked").each(function () {
      image = $(this).closest("tr").find("img").attr("src");
      full_name = $(this).closest("tr").find(".midfielder_fullname").html();
      sell_price = $(this).closest("tr").find(".midfielder_sell_price").html();
      $("#midfielder_img" + select).attr("src", image);
      $("#midfielder_name" + select).html(full_name);
      $("#midfieldersell_price" + select).html(sell_price);
      select += 1;
    });

    if (select >= 2) {
      $("input.midfieldercheck").attr("disabled", true);
      $(".midfieldercheck:checkbox[type=checkbox]:checked").removeAttr(
        "disabled"
      );
    } else {
      $(".midfieldercheck:checkbox[type=checkbox]:checked").removeAttr(
        "disabled"
      );
      $("input.midfieldercheck").removeAttr("disabled");
    }
    $(".midfieldercheck:checkbox[type=checkbox]:checked").closest('tr').css('backgroundColor','#0ea5e0');
    $(".midfieldercheck:checkbox[type=checkbox]:not(:checked)").closest('tr').css('backgroundColor','');
  }

  function forwardcheckbox() {
    var select = 0;
    $(".forwardcheck:checkbox[type=checkbox]:checked").each(function () {
      image = $(this).closest("tr").find("img").attr("src");
      full_name = $(this).closest("tr").find(".forward_fullname").html();
      sell_price = $(this).closest("tr").find(".forward_sell_price").html();
      $("#forward_img" + select).attr("src", image);
      $("#forward_name" + select).html(full_name);
      $("#forwardsell_price" + select).html(sell_price);
      select += 1;
    });
    if (select >= 2) {
      $("input.forwardcheck").attr("disabled", true);
      $(".forwardcheck:checkbox[type=checkbox]:checked").removeAttr("disabled");
    } else {
      $(".forwardcheck:checkbox[type=checkbox]:checked").removeAttr("disabled");
      $("input.forwardcheck").removeAttr("disabled");
    }
    $(".forwardcheck:checkbox[type=checkbox]:checked").closest('tr').css('backgroundColor','#0ea5e0');
    $(".forwardcheck:checkbox[type=checkbox]:not(:checked)").closest('tr').css('backgroundColor','');
  }
</script>
