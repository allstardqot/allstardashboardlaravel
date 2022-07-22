{{-- <div class="tab-pane fade profile-tab <?= $type == 'defender' ? 'show active' : '' ?>" id="profile" role="tabpanel"
    aria-labelledby="profile-tab"> --}}
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
                                    <img class="sdhdh7h8"
                                        src="{{ asset('public/assets/image/star-new-1.png') }}" />
                                    <div class="bh8j7h7 defender_staricon{{ $i }}">
                                        <img id="defender_img{{ $i }}"
                                            src="{{ asset('public/assets/image/image _1.png') }}" />
                                    </div>
                                    <div class="sdjd7jh89 defender_staricon{{ $i }}">
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
                        <input class="input-field inputcolor sdjd8u7" type="text" placeholder="search"
                            name="usrnm" id="defender"
                            value="{{ !empty($request['searchData']) && $request['type'] == 'defender' ? $request['searchData'] : '' }}" />
                        <i class="fa fa-search icon sdcjd8" id="defender_search"></i>
                        <a class="sdjndk7" onclick="defenderfilt()" href="javascript:void(0)">
                            <i class="fa fa-filter sdjd87" aria-hidden="true"></i>
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
                                        @foreach ($team as $key => $teamValue)
                                            {{ $select = '' }}
                                            @if (!empty($request['type']) && $request['type'] == 'defender')
                                                {{ $select = !empty($request['team']) && $request['team'] == $key ? 'selected' : '' }}
                                            @endif
                                            <option class="hd7h89" value="{{ $key }}" {{ $select }}>
                                                {{ $teamValue }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <select class="inputcolor kdjdkl8" id="defender_point">
                                    <option class="hd7h89" value="">Point</option>
                                    <option class="hd7h89" value="desc"
                                        {{ !empty($request['point']) && $request['point'] == 'desc' ? 'selected' : '' }}>
                                        High to Low</option>
                                    <option class="hd7h89" value="asc"
                                        {{ !empty($request['point']) && $request['point'] == 'asc' ? 'selected' : '' }}>Low
                                        to High</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 mt-3">
                        <div class="range-slider">

                            <p class="range-slider__subtitle">Cost Bar</p>
                            <div class="value-data">
                                <p class="o-value">$0</p>
                                <p class="defender_range range-slider__value">
                                    ${{ !empty($request['type'] == 'defender') && !empty($request['cost_range']) ? $request['cost_range'] : '50' }}
                                </p>
                            </div>

                            <div class="range-slider__slider">
                                <input type="range" min="0" max="50"
                                    value="{{ !empty($request['type'] == 'defender') && !empty($request['cost_range']) ? $request['cost_range'] : '50' }}"
                                    class="slider" id="defender_rangeSlider" />
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
                                    {{ $check = '' }}
                                    @if (!empty($user_selected_player) && in_array($defenderValue['id'], $user_selected_player))
                                        @php $check="checked"; @endphp
                                    @endif
                                    @if (empty($defenderValue['team']['name']))
                                        @continue;
                                    @endif
                                    <tr>
                                        <td class="defender_td">
                                            <input type="hidden" id="hiddenId"
                                                value="{{ $defenderValue['fullname'] }}">
                                            <input type="hidden" id="hiddenSellprice"
                                                value="{{ $defenderValue['sell_price'] }}">
                                            <img class="imgsize" src="{{ $defenderValue['image_path'] }}" />
                                        </td>
                                        <td class="defender_td">
                                            <p class="defender_fullname">
                                                {{ $defenderValue['fullname'] }}
                                            </p>
                                            <p class="sdjd6">{{ $defenderValue['Position']['name'] }}</p>
                                        </td>
                                        <td class="defender_td">
                                            <strong>{{ isset($defenderValue['team']['name']) ? $defenderValue['team']['name'] : '' }}</strong>
                                        </td>
                                        <td class="defender_td">
                                            <p>18 Goals</p>
                                        </td>
                                        <td class="defender_td">
                                            <p>{{ $defenderValue['total_point'] }} Points</p>
                                        </td>
                                        <td class="defender_td">
                                            <p class="hsksk78 defender_sell_price">
                                                {{ $defenderValue['sell_price'] }}
                                            </p>
                                        </td>
                                        <td class="defender_td">
                                            <span class="check_span"></span>
                                            <input class="form-check-input tem-chekbox defendercheck" type="checkbox"
                                                value="{{ $defenderValue['id'] }}" id="flexCheckDefault"
                                                {{ $check }} {{-- onclick="defendercheckbox()" --}} />
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
{{-- </div> --}}
