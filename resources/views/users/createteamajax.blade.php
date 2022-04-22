<div class="sdjsd689">
    <div class="sdjsd789">
        <h1 class="sdhn485" id="selected_count">0/07</h1>
        <p class="sxdjhd767">
            <b>Players <br />Selected</b>
        </p>
    </div>
    <div class="sxdhdcn9908">
        <h1 class="sdhsdks87">50M</h1>
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
                                    <img id="goalkeeper_img" src="{{ asset('public/assets/image/image _1.png') }}" />
                                </div>
                                <div class="sdjd7jh89">
                                    <img src="{{ asset('public/assets/image/Vector_115.png') }}" />
                                    <div class="j7hs89">
                                        <h6 class="h7bhsh8y6" id="goalkeeper_name">Tammy Johnson</h6>
                                        <p class="fjf78h7">goalkeeper</p>
                                        <div class="dfhfj7j">
                                            <div class="djhfhd8h89">
                                                <p class="sdbdj76 goalkeeper_cg_point">18 CGW Point</p>
                                            </div>
                                            <div class="djhfhd8h89">
                                                <p class="sdbdj76 goalkeeper_tf_point">104 T F Points</p>
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
                                    {{-- <tr class="goalkeeper_tr" onclick="goalKeepercheckbox()"> --}}
                                    <tr>
                                        <td class="imagetd goalkeeper_td">
                                            <img class="imgsize" src="{{ $goakkeeperValue['image_path'] }}" />
                                        </td>
                                        <td class="goalkeeper_td">
                                            <p class="goalkep_fullname">{{ $goakkeeperValue['fullname'] }}</p>
                                            <p class="sdjd6">Goalkeeper</p>
                                        </td>
                                        <td class="goalkeeper_td">
                                            <strong>{{ isset($goakkeeperValue['team']['name']) ? $goakkeeperValue['team']['name'] : '' }}</strong>
                                        </td>
                                        <td class="goalkeeper_td">
                                            <p>18 Goals</p>
                                        </td>
                                        <td class="goalkeeper_td">
                                            <p>104 Points</p>
                                        </td>
                                        <td class="goalkeeper_td">
                                            <p class="hsksk78 goalkeeper_sell_price">
                                                {{ $goakkeeperValue['sell_price'] }} M</p>
                                        </td>
                                        <td class="checkboxtd">
                                            <input class="form-check-input tem-chekbox goalkeepercheck" type="checkbox"
                                                value="{{ $goakkeeperValue['id'] }}" id="flexCheckDefault" onclick="goalKeepercheckbox(event)">
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
                            @for ($i = 0; $i < 2; $i++)
                                <div class="team-player">
                                    <img class="sdhdh7h8"
                                        src="{{ asset('public/assets/image/star-new-1.png') }}" />
                                    <div class="bh8j7h7">
                                        <img id="defender_img{{ $i }}"
                                            src="{{ asset('public/assets/image/image _1.png') }}" />
                                    </div>
                                    <div class="sdjd7jh89">
                                        <img src="{{ asset('public/assets/image/Vector_115.png') }}" />
                                        <div class="j7hs89">
                                            <h6 class="h7bhsh8y6" id='defender_name{{ $i }}'>Tammy
                                                Johnson</h6>
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
                                        <td class="defender_td">
                                            <img class="imgsize" src="{{ $defenderValue['image_path'] }}" />
                                        </td>
                                        <td class="defender_td">
                                            <p class="defender_fullname">{{ $defenderValue['fullname'] }}</p>
                                            <p class="sdjd6">Defender</p>
                                        </td>
                                        <td class="defender_td">
                                            <strong>{{ isset($defenderValue['team']['name']) ? $defenderValue['team']['name'] : '' }}</strong>
                                        </td>
                                        <td class="defender_td">
                                            <p>18 Goals</p>
                                        </td>
                                        <td class="defender_td">
                                            <p>104 Points</p>
                                        </td>
                                        <td class="defender_td">
                                            <p class="hsksk78 defender_sell_price">
                                                {{ $defenderValue['sell_price'] }}</p>
                                        </td>
                                        <td>
                                            <input class="form-check-input tem-chekbox defendercheck" type="checkbox"
                                                value="{{ $defenderValue['id'] }}" id="flexCheckDefault"
                                                onclick="defendercheckbox(event)">
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
                <div class="nsd79">
                    <div class="row">
                        <div class="col-sm-5 sxdhd789">
                            <div class="nhj89hn9">
                                <p class="h7h8j7">
                                    Pick atleast 2 midfielder
                                </p>
                                <h1 class="dhcbn87">Midfielder</h1>
                            </div>
                        </div>
                        <div class="col-sm-7 d-none d-md-block sd8j97j">
                            <div class="d-flex">
                                @for ($i = 0; $i < 2; $i++)
                                    <div class="team-player">
                                        <img class="sdhdh7h8"
                                            src="{{ asset('public/assets/image/star-new-1.png') }}" />
                                        <div class="bh8j7h7">
                                            <img id="midfielder_img{{ $i }}"
                                                src="{{ asset('public/assets/image/image _1.png') }}" />
                                        </div>
                                        <div class="sdjd7jh89">
                                            <img src="{{ asset('public/assets/image/Vector_115.png') }}" />
                                            <div class="j7hs89">
                                                <h6 class="h7bhsh8y6" id="midfielder_name{{ $i }}">
                                                    Tammy Johnson</h6>
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
                                            <td class="midfielder_td">
                                                <img class="imgsize"
                                                    src="{{ $midfielderValue['image_path'] }}" />
                                            </td>
                                            <td class="midfielder_td">
                                                <p class="midfielder_fullname">{{ $midfielderValue['fullname'] }}
                                                </p>
                                                <p class="sdjd6">Midfielder</p>
                                            </td>
                                            <td class="midfielder_td">
                                                <strong>{{ isset($midfielderValue['team']['name']) ? $midfielderValue['team']['name'] : '' }}</strong>
                                            </td>
                                            <td class="midfielder_td">
                                                <p>18 Goals</p>
                                            </td>
                                            <td class="midfielder_td">
                                                <p>104 Points</p>
                                            </td>
                                            <td class="midfielder_td">
                                                <p class="hsksk78 midfielder_sell_price">
                                                    {{ $midfielderValue['sell_price'] }}</p>
                                            </td>
                                            <td>
                                                <input class="form-check-input tem-chekbox midfieldercheck"
                                                    type="checkbox" value="{{ $midfielderValue['id'] }}"
                                                    id="flexCheckDefault" onclick="midfieldercheckbox(event)">

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
                                @for ($i = 0; $i < 2; $i++)
                                    <div class="team-player">
                                        <img class="sdhdh7h8"
                                            src="{{ asset('public/assets/image/star-new-1.png') }}" />
                                        <div class="bh8j7h7">
                                            <img id="forward_img{{ $i }}"
                                                src="{{ asset('public/assets/image/image _1.png') }}" />
                                        </div>
                                        <div class="sdjd7jh89">
                                            <img src="{{ asset('public/assets/image/Vector_115.png') }}" />
                                            <div class="j7hs89">
                                                <h6 class="h7bhsh8y6" id="forward_name{{ $i }}">Tammy
                                                    Johnson</h6>
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
                                                    <b id="forwardsell_price{{ $i }}">$5.25 M</b>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
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
                                            <td class="forward_td">
                                                <img class="imgsize"
                                                    src="{{ $forwardValue['image_path'] }}" />
                                            </td>
                                            <td class="forward_td">
                                                <p class="forward_fullname">{{ $forwardValue['fullname'] }}</p>
                                                <p class="sdjd6">Forward</p>
                                            </td>
                                            <td class="forward_td">
                                                <strong>{{ isset($goakkeeperValue['team']['name']) ? $goakkeeperValue['team']['name'] : '' }}</strong>
                                            </td>
                                            <td class="forward_td">
                                                <p>18 Goals</p>
                                            </td>
                                            <td class="forward_td">
                                                <p>104 Points</p>
                                            </td>
                                            <td class="forward_td">
                                                <p class="hsksk78 forward_sell_price">
                                                    {{ $forwardValue['sell_price'] }}</p>
                                            </td>
                                            <td>
                                                <input class="form-check-input tem-chekbox forwardcheck"
                                                    name="checkbox_forward" type="checkbox"
                                                    value="{{ $forwardValue['id'] }}" id="flexCheckDefault"
                                                    onclick="forwardcheckbox(event)"">

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
<script type="text/javascript">

    $("body").on("click", ".goalkeeper_td", function() {
        if ($(this).closest('tr').find('input[type=checkbox]').prop('checked') == true) {
            $(this).closest('tr').find('input[type=checkbox]').prop('checked', false);
            $("input.goalkeepercheck").removeAttr('disabled');

            console.log("removeee");
        } else {
            var select = 0;
            var image = '';
            var full_name = '';
            var sell_price = '';

            $(".goalkeepercheck:checkbox[type=checkbox]:checked").each(function() {
                select += 1;
            });

            if (select >= 1) {
                $("input.goalkeepercheck").prop("disabled",true);
            } else {
                $("input.goalkeepercheck").removeAttr("disabled");
                $(this).closest('tr').find('input[type=checkbox]').prop('checked', true);
            }
            newselect=0;
            $(".goalkeepercheck:checkbox[type=checkbox]:checked").each(function() {
                newselect += 1;
            });
            if(newselect>=1){
                $("input.goalkeepercheck").prop("disabled",true);
            }

            $(".goalkeepercheck:checkbox[type=checkbox]:checked").each(function() {
                $(this).removeAttr('disabled');
                image = $(this).closest('tr').find('img').attr("src");
                full_name = $(this).closest('tr').find('.goalkep_fullname').html();
                sell_price = $(this).closest('tr').find('.goalkeeper_sell_price').html();
                $("#goalkeeper_img").attr('src', image);
                $("#goalkeeper_name").html(full_name);
                $("#goalkeepersell_price").html(sell_price);
                select += 1;
            });
        }
        selectCount()
    })

    $("body").on("click", ".defender_td", function() {
        if ($(this).closest('tr').find('input[type=checkbox]').prop('checked') == true) {
            $(this).closest('tr').find('input[type=checkbox]').prop('checked', false);
            $("input.defendercheck").removeAttr('disabled');

        } else {
            var select = 0;
            var image = '';
            var full_name = '';
            var sell_price = '';

            $(".defendercheck:checkbox[type=checkbox]:checked").each(function() {
                select += 1;
            });
            if (select >= 2) {
                $("input.defendercheck").prop("disabled",true);
            } else {
                $("input.defendercheck").removeAttr("disabled");
                $(this).closest('tr').find('input[type=checkbox]').prop('checked', true);
            }
            newselect=0;
            $(".defendercheck:checkbox[type=checkbox]:checked").each(function() {
                newselect += 1;
            });
            if (newselect >= 2) {
                $("input.defendercheck").prop("disabled",true);
            }
            var n = 0;
            $(".defendercheck:checkbox[type=checkbox]:checked").each(function() {
                $(this).removeAttr('disabled');
                image = $(this).closest('tr').find('img').attr("src");
                full_name = $(this).closest('tr').find('.defender_fullname').html();
                sell_price = $(this).closest('tr').find('.defender_sell_price').html();
                $("#defender_img"+ n).attr('src', image);
                $("#defender_name"+ n).html(full_name);
                $("#defendersell_price"+ n).html(sell_price);
                n += 1;
            });
        }
        selectCount()
    })

    $("body").on("click", ".midfielder_td", function() {
        if ($(this).closest('tr').find('input[type=checkbox]').prop('checked') == true) {
            $(this).closest('tr').find('input[type=checkbox]').prop('checked', false);
            $("input.midfieldercheck").removeAttr('disabled');

        } else {
            var select = 0;
            var image = '';
            var full_name = '';
            var sell_price = '';

            $(".midfieldercheck:checkbox[type=checkbox]:checked").each(function() {
                select += 1;
            });
            if (select >= 2) {
                $("input.midfieldercheck").prop("disabled",true);
            } else {
                $("input.midfieldercheck").removeAttr("disabled");
                $(this).closest('tr').find('input[type=checkbox]').prop('checked', true);
            }
            newselect=0;
            $(".midfieldercheck:checkbox[type=checkbox]:checked").each(function() {
                newselect += 1;
            });
            if (newselect >= 2) {
                $("input.midfieldercheck").prop("disabled",true);
            }
            var n = 0;
            $(".midfieldercheck:checkbox[type=checkbox]:checked").each(function() {
                $(this).removeAttr('disabled');
                image = $(this).closest('tr').find('img').attr("src");
                full_name = $(this).closest('tr').find('.midfielder_fullname').html();
                sell_price = $(this).closest('tr').find('.midfielder_sell_price').html();
                $("#midfielder_img"+ n).attr('src', image);
                $("#midfielder_name"+ n).html(full_name);
                $("#midfieldersell_price"+ n).html(sell_price);
                n += 1;
            });
        }
        selectCount()
    })

    $("body").on("click", ".forward_td", function() {
        if ($(this).closest('tr').find('input[type=checkbox]').prop('checked') == true) {
            $(this).closest('tr').find('input[type=checkbox]').prop('checked', false);
            $("input.forwardcheck").removeAttr('disabled');

        } else {
            var select = 0;
            var image = '';
            var full_name = '';
            var sell_price = '';

            $(".forwardcheck:checkbox[type=checkbox]:checked").each(function() {
                select += 1;
            });
            if (select >= 2) {
                $("input.forwardcheck").prop("disabled",true);
            } else {
                $("input.forwardcheck").removeAttr("disabled");
                $(this).closest('tr').find('input[type=checkbox]').prop('checked', true);
            }
            newselect=0;
            $(".forwardcheck:checkbox[type=checkbox]:checked").each(function() {
                newselect += 1;
            });
            if (newselect >= 2) {
                $("input.forwardcheck").prop("disabled",true);
            }
            var n = 0;
            $(".forwardcheck:checkbox[type=checkbox]:checked").each(function() {
                $(this).removeAttr('disabled');
                image = $(this).closest('tr').find('img').attr("src");
                full_name = $(this).closest('tr').find('.forward_fullname').html();
                sell_price = $(this).closest('tr').find('.forward_sell_price').html();
                $("#forward_img"+ n).attr('src', image);
                $("#forward_name"+ n).html(full_name);
                $("#forwardsell_price"+ n).html(sell_price);
                n += 1;
            });
        }
        selectCount()
    })

    function selectCount() {
        var selected = 0;
        $('.form-check-input:checkbox[type=checkbox]:checked').each(function(e) {
            selected += 1;
        });
        $("#selected_count").html(selected + "/07")
    }

    function goalKeepercheckbox() {
        var select = 0;
        var image = '';
        var full_name = '';
        var sell_price='';
        $(".goalkeepercheck:checkbox[type=checkbox]:checked").each(function() {
            image=$(this).closest('tr').find('img').attr("src");
            full_name=$(this).closest('tr').find('.goalkep_fullname').html();
            sell_price=$(this).closest('tr').find('.goalkeeper_sell_price').html();
            select += 1;
        });
        if (select >= 1) {
            $("#goalkeeper_img").attr('src', image);
            $("#goalkeeper_name").html(full_name);
            $("#goalkeepersell_price").html(sell_price);
            $("input.goalkeepercheck").attr("disabled", true);
            $(".goalkeepercheck:checkbox[type=checkbox]:checked").removeAttr("disabled");
        } else {
            $("input.goalkeepercheck").removeAttr("disabled");
            $(".goalkeepercheck:checkbox[type=checkbox]:checked").removeAttr("disabled");

        }
    }

    function defendercheckbox(e) {
        var select = 0;

        $(".defendercheck:checkbox[type=checkbox]:checked").each(function() {
            image = $(this).closest('tr').find('img').attr("src");
            full_name = $(this).closest('tr').find('.defender_fullname').html();
            sell_price = $(this).closest('tr').find('.defender_sell_price').html();
            $("#defender_img" + select).attr('src', image);
            $("#defender_name" + select).html(full_name);
            $("#defendersell_price" + select).html(sell_price);
            select += 1;
        });

        if (e.target.checked && select >= 2) {
            $("input.defendercheck").attr("disabled", true);
            $(".defendercheck:checkbox[type=checkbox]:checked").removeAttr("disabled");
        } else {
            $(".defendercheck:checkbox[type=checkbox]:checked").removeAttr("disabled");
            $("input.defendercheck").removeAttr("disabled");
        }
    }

    function midfieldercheckbox(e) {
        var select = 0;
        $(".midfieldercheck:checkbox[type=checkbox]:checked").each(function() {
            image = $(this).closest('tr').find('img').attr("src");
            full_name = $(this).closest('tr').find('.midfielder_fullname').html();
            sell_price = $(this).closest('tr').find('.midfielder_sell_price').html();
            $("#midfielder_img" + select).attr('src', image);
            $("#midfielder_name" + select).html(full_name);
            $("#midfieldersell_price" + select).html(sell_price);
            select += 1;
        });

        if (e.target.checked && select >= 2) {
            $("input.midfieldercheck").attr("disabled", true);
            $(".midfieldercheck:checkbox[type=checkbox]:checked").removeAttr("disabled");
        } else {
            $(".midfieldercheck:checkbox[type=checkbox]:checked").removeAttr("disabled");
            $("input.midfieldercheck").removeAttr("disabled");
        }
    }

    function forwardcheckbox(e) {
        var select = 0;
        $(".forwardcheck:checkbox[type=checkbox]:checked").each(function() {
            image = $(this).closest('tr').find('img').attr("src");
            full_name = $(this).closest('tr').find('.forward_fullname').html();
            sell_price = $(this).closest('tr').find('.forward_sell_price').html();
            $("#forward_img" + select).attr('src', image);
            $("#forward_name" + select).html(full_name);
            $("#forwardsell_price" + select).html(sell_price);
            select += 1;
        });
        if (e.target.checked && select >= 2) {
            $("input.forwardcheck").attr("disabled", true);
            $(".forwardcheck:checkbox[type=checkbox]:checked").removeAttr("disabled");
        } else {
            $(".forwardcheck:checkbox[type=checkbox]:checked").removeAttr("disabled");
            $("input.forwardcheck").removeAttr("disabled");
        }
    }
</script>
