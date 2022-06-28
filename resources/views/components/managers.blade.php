<div class="col-lg-3  mt-3 d-none d-lg-block order-lg-3">
    <div class="bgcxhdb78">

        <div class="managers-tab">
            <ul class="nav nav-pills mb-3" id="magers-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="manger-home-tab" data-bs-toggle="pill" data-bs-target="#manger-home" type="button" role="tab" aria-controls="manger-home" aria-selected="true">Managers</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link private-1" id="player-tab" data-bs-toggle="pill" data-bs-target="#player-tab1" type="button" role="tab" aria-controls="player-tab1" aria-selected="false">Top Players</button>
                </li>

            </ul>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="manger-home" role="tabpanel" aria-labelledby="manger-home-tab">
                    <div class="hsdhsd">
                        @foreach($user as $key => $value)
                        <div class="sdkdj">
                            <div class="user-details">
                                <div class="sdksdlk"><img src="{{ asset('public/assets/image/Rectangle 312.png') }}"></div>
                                <div class="sdkjsdj">
                                    <h5>{{ $value->user_name }}</h5>
                                </div>
                            </div>

                            <div class="user-invite" >
                                <button type="button" class="sjsdjk78"  onclick="openpop('{{ $value->email }}','{{ $value->user_name  }}')"><i class="fa fa-user-plus sdjkdjkd" ></i> Invite</button>
                            </div>
                        </div>
                            
                        @endforeach
                    </div>
                </div>
                @include('element/users/topplayers') 

            </div>

        </div>

    </div>
</div>