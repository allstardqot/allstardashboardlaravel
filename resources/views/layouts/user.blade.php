<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Allstars @yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('public/assets/image/favicon.png') }}">

    <!-- Styles -->
    
    <link href="{{ asset('public/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/font-awesome.min.css') }}" rel="stylesheet">

    <link href="{{ asset('public/assets/css/fantasy-allstars.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/fantasy-allstars1.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/f-a.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/rte_theme_default.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/editor.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('public/assets/css/jquery.toast.min.css') }}" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YLJ8NL5151"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YLJ8NL5151');
</script>
   
</head>

<body>
   
    <div class="loading">
        <div class="circle"> </div>
      </div>

@include('element/users/header') @show
@if($errors->any())
@foreach ($errors->all() as $err)
<div class="alert alert-danger " id="" role="alert">
    <li>{{$err}}</li>
</div>

@endforeach
@endif
@if(session()->has('message'))
    <div class="alert alert-success alert-one " id="alert">
        {{ session()->get('message') }}

        <button type="button" class="btn-close"  aria-label="Close" ></button>
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger alert-one " id="alert">
        {{ session()->get('error') }}

        {{-- <button type="button" class="btn-close"  aria-label="Close" ></button> --}}
    </div>
@endif


@yield('content')


{{-- Invite Modal Html From Haome And Pool Section --}}

<div class="modal fade" id="invitemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Please select your pool to share</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="modal-in">
            <form action="{{ url('/user-invite') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <input type="hidden" class="form-control" id="exampleFormControlInput1" name="email" placeholder="Email">
                            <input type="text" class="form-control" id="formname" name="name" placeholder="Name" required>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <select class="form-select typeoption"  aria-label="Default select example " name="pool_type" id="typeoption" required>
                                <option selected style="color:#fff;">Select Public or Private</option>
                                <option value="Public Pool">Public Pool</option>
                                <option value="Private Pool">Private Pool</option>
                                
                              </select>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example" name='pool_id' id="typename" required>
                                <option selected>Select First Pool Type</option>
                               
                                
                              </select>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>

                    </div>

                </div>
              
            </form>
        </div>
       
        </div>
      
      </div>
    </div>
</div>

{{-- Popup For Showing User Name Which Join In Pool --}}
<div class="modal fade" id="joinusers" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title fs-4" id="exampleModalLabel">Managers in Pool</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="modal-in">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3" id="joinusername">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">User Name</th>
                                   
                                  </tr>
                                </thead>
                                <tbody id="poolusersname">
                                </tbody >
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

  


  {{-- Comments SHowing Popup --}}

  <div class="modal fade" id="usersCommentss" tabindex="-1" aria-labelledby="userCommmets" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title fs-4" id="userCommmets">User Comments</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="modal-in">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3" id="commentuser">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Comment</th>
                                    <th scope="col">User Name</th>
                                   
                                  </tr>
                                </thead>
                                <tbody id="userscomments">
                                </tbody >
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

@include('element/users/footer')

@show

<script src="{{ asset('public/assets/js/jquery-3.5.1.min.js') }}"></script>
<!-- <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script> -->
<!-- <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="{{ asset('public/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery-ui.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


{{-- <script src="{{ asset('public/assets/js/rangejs.js') }}"></script> --}}
<script src="{{ asset('public/assets/js/script.js') }}" async></script>
<script src="{{ asset('public/assets/js/notify.min.js') }}"></script>
<script src="{{ asset('public/assets/js/user_script.js') }}"></script>
<script src="{{ asset('public/assets/js/rte.js') }}"></script>
<script src="{{ asset('public/assets/js/all_plugins.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>

    const shareData = {
        title: 'All Star',
        text: "This is the All Star Football Game Online: https://allstarsfan.com/ \n Winning Pool successfully!",
        // url: 'https://mynataraja.live/',

    }
    const btn = document.querySelectorAll(".sharei");
    console.log(btn)
    const resultParai = document.querySelector('.result');

    Array.from(btn).forEach((e)=>{
        e.addEventListener('click', async () => {
        // alert('adfd');
        try {
            await navigator.share(shareData)
            // resultParai.textContent = 'MDN shared successfully'
        } catch (err) {
            resultParai.textContent = 'Error: ' + err
        }
    });
    })

    // Share must be triggered by "user activation"
    

    

    function openpop(email,username){
        // alert(email);
        $('#exampleFormControlInput1').val(email);
        $('#formname').val(username);
        $('#invitemodal').modal('show');
    }


    function withdrawrequest(){
        var withdrawtoken = $('#withdrawtoken').val();
        if(withdrawtoken < 100){
            $.notify("Minimum Withdrawl Off Above 100", "info");
        }else{

            $.ajax
            ({
                type: "GET",
                url: "withdrawl-request",
                data: 'amt='+withdrawtoken,
                cache: false,
                success: function(data)
                {
                    if(data == 1){
                        $.notify("Insufficient Balance in Wallet....", "info");
                    }else{
                        $('#userAvailableWallet').html(data);
                        $.notify("You Request Has Been Pending....", "success");
                        console.log(data);     
                    }
                        
                } 
            });
        }

    }
    function userdetail(id){
        $.ajax
        ({
            type: "GET",
            url: "joinusers",
            data: 'id='+id,
            cache: false,
            success: function(data)
            {
                $('#poolusersname').html(data);
            } 
        });
        $('#joinusers').modal('show');
    }

   
    
    $(document).ready(function() {

        $(".typeoption").change(function(){
            var id = $(this).val();
            $.ajax
            ({
                type: "GET",
                url: "fetchpool",
                data: 'id='+id,
                cache: false,
                // dataType: 'json',
                success: function(data)
                {
                    $('#typename').html(data);
                } 
            });
        });

        // open invite modal 
        $("#inviteBtn").click(function () {
            $("#modal").modal('show');
        });

        $("#send_invite").click(function () {
            var invite_email = $('#invite_email').serialize();
            // alert(invite_email)
            $("#modal").modal('hide');

            $.ajax({
                url: "send-invition",
                method: "POST",
                data: $('#invite_email').serialize(),
                success: function(result) {
                  console.log(result)
                  $.notify("Email(s) Sent Successfully", "success");

                }
            });
            // alert(invite_email)
        });

        $("#otp_submit").click(function () {
            var otpVerfiy = $('#otpVerfiy').serialize();
            // alert(invite_email)
            // $("#modal").modal('hide');

            $.ajax({
                url: "otp-verify",
                method: "get",
                data: otpVerfiy,
                success: function(result) {
                    if(result == 'Success'){
                        var obj = document.getElementById("wallet-sec");

                        obj.classList.remove("visually-hidden");
                        var date = new Date();
                        var minutes = 15;
                        date.setTime(date.getTime() + (minutes * 60 * 1000));
                        $.cookie("wallet-cookie","Verify", { expires: date });

                        var invmodal = document.getElementById("invitemodal");
                        
                        invmodal.style.display = "none";
                        $.notify("OTP Verified Successfully", "success");
                    }else{
                        $.notify("OTP Invaild", "warning");
                    }
                }
            });
            // alert(invite_email)
        });

        // Add more on created pool
        var i=1;  
        $('.add_more').click(function(){  
            i++;  
            $('#fieldadd').append('<div class="row" id="row'+i+'"><div class="majhyt"><div class="clak"><input class="inpotyahn" type="email" name="email[]" placeholder="Enter Email address" /></div><div class="lkahty"><input class="bants btnremove" name="remove" id="'+i+'" type="button" value="X Remove"></div></div></div>');
            //$('#fname').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
            
        });  

        // btn remove on created pool
        $(document).on('click', '.btnremove', function(){  
            var button_id = $(this).attr("id");   
            $('#row'+button_id+'').remove();  
        });  
    


    
     

        $(".hideShow").click(function(e) {
            var keyId = $(this).data('keyid');

            $(".commentArea" + keyId).toggleClass("active");
        });



        $(".submit_comment").click(function(e) {
            var keyId = $(this).data('keyid');
            var textData = $(".comment_text" + keyId).val();
            if (textData === '') {
                $.notify("Please enter comment!", "alert");
            } else {
                $.ajax({
                    url: "manager-lounge",
                    method: "GET",
                    data: {
                        'comment': textData,
                        'postId': keyId
                    },
                    success: function(result) {
                        $.notify("Your comment successfully submitted!", "success");
                        setTimeout(explode, 1000);

                    }
                });
            }

            function explode() {
                location.reload()
            }
        });
    });


    $('#storePost').click(function(e) {
        e.preventDefault();
        var post = $('#div_editor1').val();
        if (post != '') {
            $("#postForm").submit();
        } else {
            $.notify("Plz Enter Your Post", "info");
        }
        
    });

    
</script>

<?php 
$currentURL = Request::path();
if ( $currentURL == 'manager-lounge' ) {
    ?>
    <script>

        var editor1 = new RichTextEditor("#div_editor1");
    </script>
<?php }  
        $currentURL = Request::path();
        if ( $currentURL == 'wallet' && isset($_COOKIE['wallet-cookie']) ) {
    ?>
        <script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.36/dist/web3.min.js" integrity="sha256-nWBTbvxhJgjslRyuAKJHK+XcZPlCnmIAAMixz6EefVk=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@metamask/onboarding@1.0.1/dist/metamask-onboarding.bundle.js" ></script>
        <script src="{{asset('public/assets/js/jquery.toast.min.js')}}"></script>
        <script src="{{asset('public/assets/js/ido.js')}}"></script>

    <?php 
        }
    ?>

</body>

</html>
