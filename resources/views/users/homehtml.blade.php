<div class="njkas985">

    <div class="dashboard-tab">
        <ul class="nav nav-pills mb-3" id="pools-tab" role="tablist">
            {{-- <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="public-tab" data-bs-toggle="pill" data-bs-target="#public-home"
                        type="button" role="tab" aria-controls="public-home" aria-selected="true">Public Pools</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link private-1" id="private-tab" data-bs-toggle="pill" data-bs-target="#private"
                        type="button" role="tab" aria-controls="private" aria-selected="false">Private Pools</button>
                </li> --}}

            <li class="nav-item" role="presentation">
                <button class="nav-link <?php echo $type == 'public' || empty($type) ? 'active' : ''; ?>" id="public-tab" data-bs-toggle="pill"
                    data-bs-target="#public-home" type="button" role="tab" aria-controls="public-home"
                    aria-selected="<?php echo $type == 'public' || empty($type) ? 'true' : 'false'; ?>">Public Pools</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link private-1 <?php echo $type == 'private' ? 'active' : ''; ?>" id="private-tab" data-bs-toggle="pill"
                    data-bs-target="#private" type="button" role="tab" aria-controls="private"
                    aria-selected="<?php echo $type == 'private' || empty($type) ? 'true' : 'false'; ?>">Private Pools</button>
            </li>

        </ul>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade <?php echo $type == 'public' || empty($type) ? 'active show' : ''; ?>" id="public-home" role="tabpanel" aria-labelledby="public-tab">
                <div class="input-container mt-2 ">

                    <input class="input-field inputcolor lkpoi526" type="text" placeholder="search" name="public_pool"
                        id="public_pool" value=<?php echo $type == 'public' || empty($type) ? $_GET['searchData'] : ''; ?>>
                    {{-- <button type="submit"></button> --}}
                    <i class="fa fa-search icon" id="public_search"></i>

                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="dash-tab">
                            @if(!empty($weeak['starting_at']))
                            
                            <p>
                                {{date('d M Y', strtotime($weeak['starting_at']))}} - {{date('d M Y', strtotime($weeak['ending_at']))}}
                                
                            </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 pb-2">
                        <div class="text-center"><a href="{{ url('/create-pool') }}" class="btn-01">+
                                Create Pool</a></div>
                    </div>
                </div>
                <div class="dash-data">
                    @if (count($publicData) != 0)
                        @foreach ($publicData as $publicValue)
                            @if (in_array($publicValue['id'], $contest_pool))
                                @continue;
                            @endif
                            @if($publicValue->max_participants == $jointuser[$publicValue['id']])
                                @continue;
                             @endif
                            <div class="mkpiuh">
                                <div class="row">
                                    <div class="col-sm-7 mt-3 ">
                                        <div class="lkpoioubn">
                                            <div>
                                                <h6>{{ $publicValue['pool_name'] }}</h6>
                                                <p class="yhji2365">Entry Amount <img
                                                        src="{{ asset('public/assets/image/coins.png') }}"
                                                        width="20" class="img-fluid" alt="">
                                                    {{ $publicValue['entry_fees'] }}</p>
                                            </div>
                                            <div class="jhgyu56">
                                                <button class="asunht56" onclick="userdetail('{{ $publicValue['id'] }}')">{{ !empty($jointuser[$publicValue['id']]) ? $jointuser[$publicValue['id']] : 0 }} 
                                                    Users </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 mt-4 w-90 pb-3">
                                        <div class="okiuj456">
                                            <a href="#" class="hjytg458" data-bs-toggle="modal"
                                                data-bs-target="#myModal"
                                                onclick="showmodel('{{ $publicValue['id'] }}','{{ $publicValue['pool_type'] }}','{{ $publicValue['pool_name'] }}','{{$publicValue['entry_fees']}}')">+Join
                                                this pool</a>
                                            <a class="ahjl458" href="{{url('/invite/'.$publicValue['id'])}}">
                                                <i class="fa fa-user-plus dcs445" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h5 class="sdksdjdj">No Record</h5>
                    @endif
                </div>

            </div>
            <div class="tab-pane fade <?php echo $type == 'private' ? 'active show' : ''; ?>" id="private" role="tabpanel" aria-labelledby="private-tab">
                <div class="input-container mt-2 ">

                    <input class="input-field inputcolor lkpoi526" type="text" placeholder="search" name="private_pool"
                        id="private_pool" value=<?php echo $type == 'private' ? $_GET['searchData'] : ''; ?>>
                    {{-- <button type="submit"></button> --}}
                    <i class="fa fa-search icon" id="private_search"></i>

                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="dash-tab">
                            @if(!empty($weeak['starting_at']))
                            
                            <p>
                                {{date('d M Y', strtotime($weeak['starting_at']))}} - {{date('d M Y', strtotime($weeak['ending_at']))}}
                                
                            </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-4 pb-2">
                        <div class="text-center"><a href="{{ url('/create-pool') }}" class="btn-01">+
                                Create Pool</a></div>
                    </div>
                </div>
                <div class="dash-data">
                    @if (count($privateData) != 0)
                        @foreach ($privateData as $privateValue)
                            @if (in_array($privateValue['id'], $contest_pool))
                                @continue;
                            @endif
                            @if($privateValue->max_participants == $jointuser[$privateValue['id']])
                            @continue;
                         @endif
                            <div class="mkpiuh">

                                <div class="row">
                                    <div class="col-sm-7 mt-3 ">
                                        <div class="lkpoioubn">
                                            <div>
                                                <h6>{{ $privateValue['pool_name'] }}</h6>
                                                <p class="yhji2365">Entry Amount <img src="{{ asset('public/assets/image/coins.png') }}" alt="" width="20" class="img-fluid">
                                                    {{ $privateValue['entry_fees'] }}</p>
                                            </div>
                                            <div class="jhgyu56">
                                                <button
                                                    class="asunht56"  onclick="userdetail('{{ $privateValue['id'] }}')">{{ !empty($jointuser[$privateValue['id']]) ? $jointuser[$privateValue['id']] : 0 }}
                                                    Users</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 mt-4 w-90 pb-3">
                                        <div class="okiuj456">
                                            <a href="#" class="hjytg458" data-bs-toggle="modal"
                                                data-bs-target="#myModal"
                                                onclick="showmodel('{{ $privateValue['id'] }}','{{ $privateValue['pool_type'] }}','{{ $privateValue['pool_name'] }}','{{$privateValue['entry_fees']}}')">+Join
                                                this pool</a>
                                            {{-- <a class="ahjl458" href="#">
                                                <i class="fa fa-user-plus dcs445" aria-hidden="true"></i>
                                            </a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h5 class="sdksdjdj">No Record</h5>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function showmodel(id, type, pool_name,entry_fees) {
        ///console.log(type+"fffffffffffff");
        if (type == 0) {
            //console.log(type+"fffffffffffff");

            // document.getElementById('pooltypebtn').hidden = true;
            document.getElementById('joinPass').hidden = true;
            document.getElementById('passLabel').hidden = true;
        } else {
            //console.log(type+"uuuuuuuuuuuuuuu");
            // document.getElementById('pooltypebtn').hidden = false;
            document.getElementById('joinPass').hidden = false;
            document.getElementById('passLabel').hidden = false;
        }
        //$("#pop_pool_name").html(pool_name);
        var PoolName    = pool_name;
        var JoinAmount  = "Amount to join : "+entry_fees;
        document.getElementById("join_pool_id").value  = id;
        document.getElementById("PoolName").innerHTML  = PoolName;
        document.getElementById("JoinAmount").innerHTML = JoinAmount;
        document.getElementById("hiddenpooltype").value = type;
    }
</script>
