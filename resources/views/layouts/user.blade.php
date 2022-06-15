<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>All Stars @yield('title')</title>

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

   
</head>

<body>

    <div class="loading">
        <div class="circle"> </div>
      </div>

@include('element/users/header') @show
@if($errors->any())
@foreach ($errors->all() as $err)
<div class="alert alert-danger" role="alert">
    <li>{{$err}}</li>
</div>

@endforeach
@endif
@if(session()->has('message'))
    <div class="alert alert-success alert-one" id="alert">
        {{ session()->get('message') }}

        <button type="button" class="btn-close" aria-label="Close" onclick="closeAlert()"></button>
    </div>
@endif
@yield('content')


@include('element/users/footer')

@show

<script src="{{ asset('public/assets/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('public/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery-ui.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script src="{{ asset('public/assets/js/script.js') }}"></script>
<script src="{{ asset('public/assets/js/notify.min.js') }}"></script>
<script src="{{ asset('public/assets/js/user_script.js') }}"></script>
<script src="{{ asset('public/assets/js/rte.js') }}"></script>
<script src="{{ asset('public/assets/js/all_plugins.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js" integrity="sha512-3j3VU6WC5rPQB4Ld1jnLV7Kd5xr+cq9avvhwqzbH/taCRNURoeEpoPBK9pDyeukwSxwRPJ8fDgvYXd6SkaZ2TA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    
   

   
    $(document).ready(function() {

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
    


    
      var editor1 = new RichTextEditor("#div_editor1");

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


        // Share Api
        const shareData = {
            title: 'All Star',
            text: "This is the All Star Football Game Online: http://3.0.113.116/all_stars/ \n Winning Pool successfully!",
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
    });



</script>

</body>

</html>
