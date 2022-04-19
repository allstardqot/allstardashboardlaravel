<div class="sdjsd689">
    <div class="sdjsd789">
        <h1 class="sdhn485"><span id="selected_count">01</span>/07</h1>
        <p class="sxdjhd767">
            <b>Players <br />Selected</b>
        </p>
    </div>
    <div class="sxdhdcn9908">
        <h1 class="sdhsdks87">94.5 M</h1>
        <p class="sdjhs7tyh">
            <b>Money<br />
                Remaining</b>
        </p>
    </div>
</div>
<div class="tab-pane fade home-tab <?= $type == 'goalkeeper' || $type == '' ? 'show active' : '' ?>" id="home"
    role="tabpanel" aria-labelledby="home-tab">
    <div class="form-outer">
        <div class="page slide-page">
            

            <div class="nsd79">
                <div class="row">
                    <div class="col-sm-5 sxdhd789">
                        <div class="nhj89hn9">
                            <p class="h7h8j7">Pick atleast 1 goalkeeper</p>
                            <h1 class="dhcbn87">Goalkeeper</h1>
                        </div>
                    </div>
                    <div class="col-sm-7 d-none d-md-block sd8j97j">
                        <div class="d-flex justify-content-center">
                            <div class="team-player">
                                <img class="sdhdh7h8" src="{{ asset('public/assets/image/star-new-1.png') }}" />
                                <div class="bh8j7h7">
                                    <img src="{{ asset('public/assets/image/image _1.png') }}" />
                                </div>
                                <div class="sdjd7jh89">
                                    <img src="{{ asset('public/assets/image/Vector_115.png') }}" />
                                    <div class="j7hs89">
                                        <h6 class="h7bhsh8y6">Tammy Johnson</h6>
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
                                            <b>$5.25 M</b>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-container sdhnd87 sdsdsde44">
                        <input class="input-field inputcolor sdjd8u7" type="text" placeholder="search" name="usrnm"
                            id="goal_keeper" />
                        <i class="fa fa-search icon sdcjd8" id="goal_keeper_search"></i>
                        <a class="sdjndk7" href="">
                            <i class="fa fa-filter sdjd87" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="table-responsive sdchsdsdh">
                            <table class="table">
                                @foreach ($goalkeeperData as $goakkeeperValue)
                                    <tr>
                                        <td>
                                            <img class="imgsize" src="{{ $goakkeeperValue['image_path'] }}" />
                                        </td>
                                        <td>
                                            <p>{{ $goakkeeperValue['fullname'] }}</p>
                                            <p class="sdjd6">Goalkeeper</p>
                                        </td>
                                        <td>
                                            <strong>{{ $goakkeeperValue['team']['name'] }}</strong>
                                        </td>
                                        <td>
                                            <p>18 Goals</p>
                                        </td>
                                        <td>
                                            <p>104 Points</p>
                                        </td>
                                        <td>
                                            <p class="hsksk78">5.25 M</p>
                                        </td>
                                        <td>
                                            <input class="form-check-input tem-chekbox goalkeepercheck" type="checkbox" value="{{ $goakkeeperValue['id'] }}" onclick="goalKeepercheckbox(event)" id="flexCheckDefault">
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
<div class="tab-pane fade profile-tab <?= $type == 'defender' ? 'show active' : '' ?>" id="profile" role="tabpanel"
    aria-labelledby="profile-tab">
    <div class="form-outer">
        <div class="page slide-page">
            {{-- <div class="sdjsd689">
                <div class="sdjsd789">
                    <h1 class="sdhn485">01/07</h1>
                    <p class="sxdjhd767">
                        <b>Players <br />Selected</b>
                    </p>
                </div>
                <div class="sxdhdcn9908">
                    <h1 class="sdhsdks87">94.5 M</h1>
                    <p class="sdjhs7tyh">
                        <b>Money<br />
                            Remaining</b>
                    </p>
                </div>
            </div> --}}

            <div class="nsd79">
                <div class="row">
                    <div class="col-sm-5 sxdhd789">
                        <div class="nhj89hn9">
                            <p class="h7h8j7">Pick atleast 2 Defender</p>
                            <h1 class="dhcbn87">Defender</h1>
                        </div>
                    </div>
                    <div class="col-sm-7 d-none d-md-block sd8j97j">
                        <div class="d-flex">
                            <div class="team-player">
                                <img class="sdhdh7h8" src="{{ asset('public/assets/image/star-new-1.png') }}" />
                                <div class="bh8j7h7">
                                    <img src="{{ asset('public/assets/image/image _1.png') }}" />
                                </div>
                                <div class="sdjd7jh89">
                                    <img src="{{ asset('public/assets/image/Vector_115.png') }}" />
                                    <div class="j7hs89">
                                        <h6 class="h7bhsh8y6">Tammy Johnson</h6>
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
                                            <b>$5.25 M</b>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="team-player">
                                <img class="sdhdh7h8"
                                    src="{{ asset('public/assets/image/star-new-1.png') }}" />
                                <div class="bh8j7h7">
                                    <img src="{{ asset('public/assets/image/image _1.png') }}" />
                                </div>
                                <div class="sdjd7jh89">
                                    <img src="{{ asset('public/assets/image/Vector_115.png') }}" />
                                    <div class="j7hs89">
                                        <h6 class="h7bhsh8y6">Tammy Johnson</h6>
                                        <p class="fjf78h7">Forward</p>
                                        <div class="dfhfj7j">
                                            <div class="djhfhd8h89">
                                                <p class="sdbdj76">18 CGW Point</p>
                                            </div>
                                            <div class="djhfhd8h89">
                                                <p class="sdbdj76">104 T F Points
                                                </p>
                                            </div>
                                        </div>
                                        <p class="sxjmndkod78">
                                            <b>$5.25 M</b>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-container sdhnd87 sdsdsde44">
                        <input class="input-field inputcolor sdjd8u7" type="text" placeholder="search" name="usrnm"
                            id="defender" />
                        <i class="fa fa-search icon sdcjd8" id="defender_search"></i>
                        <a class="sdjndk7" href="">
                            <i class="fa fa-filter sdjd87" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-7 mt-3">
                        <div class="sxdjdj87">
                            <div class="sdjd787">
                                <h6 class="sdjnd78">Short By</h6>
                            </div>
                            <div class="text-white text-center sdjnd890j">
                                <div class="jnsjsd87">
                                    <select class="inputcolor jjhn90k7">
                                        <option class="hd7h89">Team</option>
                                        <option class="hd7h89">2</option>
                                        <option class="hd7h89">3</option>
                                        <option class="hd7h89">4</option>
                                    </select>
                                </div>
                                <select class="inputcolor kdjdkl8">
                                    <option class="hd7h89">Point</option>
                                    <option class="hd7h89">2</option>
                                    <option class="hd7h89">3</option>
                                    <option class="hd7h89">4</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 mt-3">
                        <div class="sdjbd76">
                            <p class="asdhd76">Cost Bar</p>
                            <div class="d-flex w-100">
                                <div class="sdkndn50">
                                    <p class="asdh76">$0</p>
                                </div>
                                <div class="sadnnj7">
                                    <p class="kjsdhn78">$100</p>
                                </div>
                            </div>
                            <div class="w3-light-grey w3-round-xlarge">
                                <div class="w3-container w3-blue w3-round-xlarge"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="table-responsive sdchsdsdh">
                            <table class="table">
                                @foreach ($defenderData as $defenderValue)
                                    <tr>
                                        <td>
                                            <img class="imgsize" src="{{ $defenderValue['image_path'] }}" />
                                        </td>
                                        <td>
                                            <p>{{ $defenderValue['fullname'] }}</p>
                                            <p class="sdjd6">Defender</p>
                                        </td>
                                        <td>
                                            <strong>{{ $defenderValue['team']['name'] }}</strong>
                                        </td>
                                        <td>
                                            <p>18 Goals</p>
                                        </td>
                                        <td>
                                            <p>104 Points</p>
                                        </td>
                                        <td>
                                            <p class="hsksk78">5.25 M</p>
                                        </td>
                                        <td>
                                            <input class="form-check-input tem-chekbox defendercheck" type="checkbox" value="{{ $defenderValue['id'] }}" id="flexCheckDefault" onclick="defendercheckbox(event)">
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

<div class="tab-pane fade contact-tab <?= $type == 'midfielder' ? 'show active' : '' ?>" id="contact" role="tabpanel"
    aria-labelledby="contact-tab">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="form-outer">
            <div class="page slide-page">
                {{-- <div class="sdjsd689">
                    <div class="sdjsd789">
                        <h1 class="sdhn485" id="selected_now">01/07</h1>
                        <p class="sxdjhd767">
                            <b>Players <br />Selected</b>
                        </p>
                    </div>
                    <div class="sxdhdcn9908">
                        <h1 class="sdhsdks87">94.5 M</h1>
                        <p class="sdjhs7tyh">
                            <b>Money<br />
                                Remaining</b>
                        </p>
                    </div>
                </div> --}}

                <div class="nsd79">
                    <div class="row">
                        <div class="col-sm-5 sxdhd789">
                            <div class="nhj89hn9">
                                <p class="h7h8j7">
                                    Pick atleast 1 midfielder
                                </p>
                                <h1 class="dhcbn87">Midfielder</h1>
                            </div>
                        </div>
                        <div class="col-sm-7 d-none d-md-block sd8j97j">
                            <div class="d-flex">
                                <div class="team-player">
                                    <img class="sdhdh7h8" src="{{ asset('public/assets/image/star-new-1.png') }}" />
                                    <div class="bh8j7h7">
                                        <img src="{{ asset('public/assets/image/image _1.png') }}" />
                                    </div>
                                    <div class="sdjd7jh89">
                                        <img src="{{ asset('public/assets/image/Vector_115.png') }}" />
                                        <div class="j7hs89">
                                            <h6 class="h7bhsh8y6">Tammy Johnson</h6>
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
                                                <b>$5.25 M</b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-player">
                                    <img class="sdhdh7h8"
                                        src="{{ asset('public/assets/image/star-new-1.png') }}" />
                                    <div class="bh8j7h7">
                                        <img src="{{ asset('public/assets/image/image _1.png') }}" />
                                    </div>
                                    <div class="sdjd7jh89">
                                        <img src="{{ asset('public/assets/image/Vector_115.png') }}" />
                                        <div class="j7hs89">
                                            <h6 class="h7bhsh8y6">Tammy Johnson</h6>
                                            <p class="fjf78h7">Forward</p>
                                            <div class="dfhfj7j">
                                                <div class="djhfhd8h89">
                                                    <p class="sdbdj76">18 CGW Point</p>
                                                </div>
                                                <div class="djhfhd8h89">
                                                    <p class="sdbdj76">104 T F Points
                                                    </p>
                                                </div>
                                            </div>
                                            <p class="sxjmndkod78">
                                                <b>$5.25 M</b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-container sdhnd87 sdsdsde44">
                            <input class="input-field inputcolor sdjd8u7" type="text" placeholder="search" name="usrnm"
                                id="midfielder" />
                            <i class="fa fa-search icon sdcjd8" id="midfielder_search"></i>
                            <a class="sdjndk7" href="">
                                <i class="fa fa-filter sdjd87" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-sm-7 mt-3">
                            <div class="sxdjdj87">
                                <div class="sdjd787">
                                    <h6 class="sdjnd78">Short By</h6>
                                </div>
                                <div class="text-white text-center sdjnd890j">
                                    <div class="jnsjsd87">
                                        <select class="inputcolor jjhn90k7">
                                            <option class="hd7h89">Team</option>
                                            <option class="hd7h89">2</option>
                                            <option class="hd7h89">3</option>
                                            <option class="hd7h89">4</option>
                                        </select>
                                    </div>
                                    <select class="inputcolor kdjdkl8">
                                        <option class="hd7h89">Point</option>
                                        <option class="hd7h89">2</option>
                                        <option class="hd7h89">3</option>
                                        <option class="hd7h89">4</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4 mt-3">
                            <div class="sdjbd76">
                                <p class="asdhd76">Cost Bar</p>
                                <div class="d-flex w-100">
                                    <div class="sdkndn50">
                                        <p class="asdh76">$0</p>
                                    </div>
                                    <div class="sadnnj7">
                                        <p class="kjsdhn78">$100</p>
                                    </div>
                                </div>
                                <div class="w3-light-grey w3-round-xlarge">
                                    <div class="w3-container w3-blue w3-round-xlarge" class="sdjd787">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-12">
                            <div class="table-responsive sdchsdsdh">
                                <table class="table">
                                    @foreach ($midfielderData as $midfielderValue)
                                        <tr>
                                            <td>
                                                <img class="imgsize" src="{{ $midfielderValue['image_path'] }}" />
                                            </td>
                                            <td>
                                                <p>{{ $midfielderValue['fullname'] }}</p>
                                                <p class="sdjd6">Midfielder</p>
                                            </td>
                                            <td>
                                                <strong>{{ $midfielderValue['team']['name'] }}</strong>
                                            </td>
                                            <td>
                                                <p>18 Goals</p>
                                            </td>
                                            <td>
                                                <p>104 Points</p>
                                            </td>
                                            <td>
                                                <p class="hsksk78">5.25 M</p>
                                            </td>
                                            <td>
                                                <input class="form-check-input tem-chekbox midfieldercheck" type="checkbox" value="{{ $midfielderValue['id'] }}"                                             id="flexCheckDefault" onclick="midfieldercheckbox(event)">

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
<div class="tab-pane fade contact-tab2 <?= $type == 'forward' ? 'show active' : '' ?>" id="contact2" role="tabpanel"
    aria-labelledby="contact-tab2">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="form-outer">
            <div class="page slide-page">
                {{-- <div class="sdjsd689">
                    <div class="sdjsd789">
                        <h1 class="sdhn485">01/07</h1>
                        <p class="sxdjhd767">
                            <b>Players <br />Selected</b>
                        </p>
                    </div>
                    <div class="sxdhdcn9908">
                        <h1 class="sdhsdks87">94.5 M</h1>
                        <p class="sdjhs7tyh">
                            <b>Money<br />
                                Remaining</b>
                        </p>
                    </div>
                </div> --}}

                <div class="nsd79">
                    <div class="row">
                        <div class="col-sm-5 sxdhd789">
                            <div class="nhj89hn9">
                                <p class="h7h8j7">
                                    Pick atleast 2 forward
                                </p>
                                <h1 class="dhcbn87">Forward</h1>
                            </div>
                        </div>
                        <div class="col-sm-7 d-none d-md-block sd8j97j">
                            <div class="d-flex">
                                <div class="team-player">
                                    <img class="sdhdh7h8" src="{{ asset('public/assets/image/star-new-1.png') }}" />
                                    <div class="bh8j7h7">
                                        <img src="{{ asset('public/assets/image/image _1.png') }}" />
                                    </div>
                                    <div class="sdjd7jh89">
                                        <img src="{{ asset('public/assets/image/Vector_115.png') }}" />
                                        <div class="j7hs89">
                                            <h6 class="h7bhsh8y6">Tammy Johnson</h6>
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
                                                <b>$5.25 M</b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-player">
                                    <img class="sdhdh7h8"
                                        src="{{ asset('public/assets/image/star-new-1.png') }}" />
                                    <div class="bh8j7h7">
                                        <img src="{{ asset('public/assets/image/image _1.png') }}" />
                                    </div>
                                    <div class="sdjd7jh89">
                                        <img src="{{ asset('public/assets/image/Vector_115.png') }}" />
                                        <div class="j7hs89">
                                            <h6 class="h7bhsh8y6">Tammy Johnson</h6>
                                            <p class="fjf78h7">Forward</p>
                                            <div class="dfhfj7j">
                                                <div class="djhfhd8h89">
                                                    <p class="sdbdj76">18 CGW Point</p>
                                                </div>
                                                <div class="djhfhd8h89">
                                                    <p class="sdbdj76">104 T F Points
                                                    </p>
                                                </div>
                                            </div>
                                            <p class="sxjmndkod78">
                                                <b>$5.25 M</b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="input-container sdhnd87 sdsdsde44">
                            <input class="input-field inputcolor sdjd8u7" type="text" placeholder="search" name="usrnm"
                                id="forward" />
                            <i class="fa fa-search icon sdcjd8" id="forward_search"></i>
                            <a class="sdjndk7" href="">
                                <i class="fa fa-filter sdjd87" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-sm-7 mt-3">
                            <div class="sxdjdj87">
                                <div class="sdjd787">
                                    <h6 class="sdjnd78">Short By</h6>
                                </div>
                                <div class="text-white text-center sdjnd890j">
                                    <div class="jnsjsd87">
                                        <select class="inputcolor jjhn90k7">
                                            <option class="hd7h89">Team</option>
                                            <option class="hd7h89">2</option>
                                            <option class="hd7h89">3</option>
                                            <option class="hd7h89">4</option>
                                        </select>
                                    </div>
                                    <select class="inputcolor kdjdkl8">
                                        <option class="hd7h89">Point</option>
                                        <option class="hd7h89">2</option>
                                        <option class="hd7h89">3</option>
                                        <option class="hd7h89">4</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4 mt-3">
                            <div class="sdjbd76">
                                <p class="asdhd76">Cost Bar</p>
                                <div class="d-flex w-100">
                                    <div class="sdkndn50">
                                        <p class="asdh76">$0</p>
                                    </div>
                                    <div class="sadnnj7">
                                        <p class="kjsdhn78">$100</p>
                                    </div>
                                </div>
                                <div class="w3-light-grey w3-round-xlarge">
                                    <div class="w3-container w3-blue w3-round-xlarge" class="sdjd787">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-12">
                            <div class="table-responsive sdchsdsdh">
                                <table class="table">
                                    @foreach ($forwardData as $forwardValue)
                                        <tr>
                                            <td>
                                                <img class="imgsize" src="{{ $forwardValue['image_path'] }}" />
                                            </td>
                                            <td>
                                                <p>{{ $forwardValue['fullname'] }}</p>
                                                <p class="sdjd6">Forward</p>
                                            </td>
                                            <td>
                                                <strong>{{ $forwardValue['team']['name'] }}</strong>
                                            </td>
                                            <td>
                                                <p>18 Goals</p>
                                            </td>
                                            <td>
                                                <p>104 Points</p>
                                            </td>
                                            <td>
                                                <p class="hsksk78">5.25 M</p>
                                            </td>
                                            <td>
                                                <input class="form-check-input tem-chekbox forwardcheck" name="checkbox_forward" type="checkbox" value="{{ $forwardValue['id'] }}" id="flexCheckDefault" onclick="forwardcheckbox(event)"">

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
<script type="text/javascript" >
            function goalKeepercheckbox(e){
                var select=0;
                $(".goalkeepercheck:checkbox[type=checkbox]:checked").each(function () {
                   select+=1;
                });
                if (e.target.checked && select>=1) {
                    $("input.goalkeepercheck").attr("disabled", true);
                    $(".goalkeepercheck:checkbox[type=checkbox]:checked").removeAttr("disabled");
                } else {
                    $("input.goalkeepercheck").removeAttr("disabled");
                    $(".goalkeepercheck:checkbox[type=checkbox]:checked").removeAttr("disabled");

                }
            }

            function defendercheckbox(e){
                var select=0;
                $(".defendercheck:checkbox[type=checkbox]:checked").each(function () {
                   select+=1;
                });
                if (e.target.checked && select>=2) {
                    $("input.defendercheck").attr("disabled", true);
                    $(".defendercheck:checkbox[type=checkbox]:checked").removeAttr("disabled");
                } else {
                    $(".defendercheck:checkbox[type=checkbox]:checked").removeAttr("disabled");
                    $("input.defendercheck").removeAttr("disabled");
                }
            }
            
            function midfieldercheckbox(e){
                var select=0;
                $(".midfieldercheck:checkbox[type=checkbox]:checked").each(function () {
                   select+=1;
                });
                if (e.target.checked && select>=2) {
                    $("input.midfieldercheck").attr("disabled", true);
                    $(".midfieldercheck:checkbox[type=checkbox]:checked").removeAttr("disabled");
                } else {
                    $(".midfieldercheck:checkbox[type=checkbox]:checked").removeAttr("disabled");
                    $("input.midfieldercheck").removeAttr("disabled");
                }
            }

            function forwardcheckbox(e){
                var select=0;
                $(".forwardcheck:checkbox[type=checkbox]:checked").each(function () {
                   select+=1;
                });
                if (e.target.checked && select>=2) {
                    $("input.forwardcheck").attr("disabled", true);
                    $(".forwardcheck:checkbox[type=checkbox]:checked").removeAttr("disabled");
                } else {
                    $(".forwardcheck:checkbox[type=checkbox]:checked").removeAttr("disabled");
                    $("input.forwardcheck").removeAttr("disabled");
                }
            }
            
            
    </script>