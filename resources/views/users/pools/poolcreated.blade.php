@extends('layouts.user')
@section('title','Congratulations, Pool Created!!!')
@section('content')

<main>
    <div class="main1">
        <div class="container-fluid p-0 text-white">
            <div class="text-white omne2">
                <h1 class="conra1">Congratulations, Pool Created!</h1>
                <div class="row">
                    <div class="bottom-container roqq">
                        <div class="nigblue">
                            <div class="jsdhjsdh">
                                <a href="#" class="btn nhy"><b>{{$pool_name}}</b></a>
                            </div>
                            <div class="shdjshd">
                                <a href="#" class="najxcbn" class="btn">Entry Amount $ {{$entry_fees}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="makosdo">
                    <div class="bayrt">
                        <div class="tayui">
                            <p class="p111">
                                Please join  pool {{ $pool_name }} at
                                allstarsfans.com
                            </p>
                        </div>
                        <div class="nyary">
                            <a href="#"  class="jnsdxi share" >share</a>
                            <p class="result"></p>
                        </div>
                    </div>
                </div>
            </div>
            <form id="email" method="post" action="{{ url('/invite-email') }}">
                @csrf

            
                <div class="baytjh" id="fieldadd">
                    <div class="row">
                        <div class="majhyt">
                            <div class="clak">
                                <input class="inpotyahn" type="email" id="email" name="email[]" placeholder="Enter Email address" />
                                <input class="inpotyahn" type="hidden"  name="pool_name" value="{{ $pool_name }}"/>
                                <input class="inpotyahn" type="hidden" name="entry_fees" value="{{ $entry_fees }}"/>
                                <input class="inpotyahn" type="hidden"  name="starting_at" value="{{ $starting_at }}"/>
                                <input class="inpotyahn" type="hidden"  name="ending_at"  value="{{ $ending_at }}"/>
                                <input class="inpotyahn" type="hidden"  name="max_participants"  value="{{ $max_participants }}"/>
                                <input class="inpotyahn" type="hidden"  name="team_name"  value="{{ $team_name }}"/>
                                <input class="inpotyahn" type="hidden"  name="pool_type"  value="{{ $pool_type }}"/>
                                <input class="inpotyahn" type="hidden"  name="pass"  value="{{ $pass }}"/>
                            </div>
                            <div class="lkahty">
                                <input class="bants add_more" type="button"  value="+ Add More">
                                {{-- <button type="button" class="bants add_more">+ Add More</button> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" name="submit" id="invite" class="form-control btnColor mt-4 order-last order-lg-first tbnayr">
                    Invite
                </button>
            </form>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog text-white">
            <!-- Modal content-->
            <div class="namtrs" class="modal-content">
                <div class="modal-header mt-5">
                    <h4 class="modal-title">share</h4>
                </div>
                <div class="modal-body">
                    <i class="fa fa-facebook-square" aria-hidden="true"></i>
                    <i class="fa fa-twitter-square" aria-hidden="true"></i>
                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                </div>
                <div class="modal-footer">
                    <button class="nahts" type="button" class="btn btn-default" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
     const shareData = {
            title: 'All Star',
            text: "This is the All Star Football Game Online: https://allstarsfan.com/ \n Winning Pool successfully!",
            // url: 'https://mynataraja.live/',


        }
        const btn = document.querySelector('.share');
        const resultPara = document.querySelector('.result');

        // Share must be triggered by "user activation"
        btn.addEventListener('click', async () => {
            // alert('adfd');
            try {
                await navigator.share(shareData)
                // resultPara.textContent = 'MDN shared successfully'
            } catch (err) {
                // resultPara.textContent = 'Error: ' + err
            }
        });
</script>
@endsection
