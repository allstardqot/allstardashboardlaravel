@extends('layouts.user')
@section('title', 'Dashboard')
@section('content')
<main>
    <div class="main1">
        <div class="container-fluid p-0 text-white">
            <div class="text-white omne2">
                <h1 class="conra1">Share Pool !!!</h1>
                <div class="row">
                    <div class="bottom-container roqq">
                        <div class="nigblue">
                            <div class="jsdhjsdh">
                                <a href="#" class="btn nhy"><b>{{$pool_name}}</b></a>
                            </div>
                            <div class="shdjshd">
                                <a href="#" class="najxcbn" class="btn">Entry Amount <img
                src="{{ asset('public/assets/image/coins.png') }}"
                class="img-fluid"
                width="18"
                alt=""
              /> {{$entry_fees}}</a>
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
                            <a href="javascript:void(0);" class="jnsdxi sharei" >share</a>
                        </div>
                    </div>
                </div>
            </div>
            <form name="add_email" id="add_email" action="{{url('user-invite')}}" method="post">
                @csrf
                <div class="baytjh" id="field_add">
                    <div class="row">
                        <div class="majhyt">
                            <div class="clak">
                                <input type="hidden" name="pool_id" value='{{$id}}'/>

                                <input class="inpotyahn" type="text" name="email[]" placeholder="Enter Email address" />
                            </div>
                            <div class="lkahty">
                                {{-- <button  name="buttton">+ Add More</button> --}}
                                <input class="bants" type="button" id="add"  value="+ Add More">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="form-control btnColor mt-4 order-last order-lg-first tbnayr" name="submit" id="submit">
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
                    <h4 class="modal-title ">share</h4>
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
    <script src="{{ asset('public/assets/js/jquery-3.5.1.min.js') }}"></script>

 <script>  
        const shareData = {
            title: 'All Star',
            text: "This is the All Star Football Game Online: https://allstarsfan.com/ \n Winning Pool successfully!",
            // url: 'https://mynataraja.live/',


        }
        const btni = document.querySelector('.sharei');
        const resultParai = document.querySelector('.result');

        // Share must be triggered by "user activation"
        btni.addEventListener('click', async () => {
            // alert('adfd');
            try {
                await navigator.share(shareData)
                resultParai.textContent = 'MDN shared successfully'
            } catch (err) {
                resultParai.textContent = 'Error: ' + err
            }
        });
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#field_add').append('<div class="row" id="row'+i+'"><div class="majhyt"><div class="clak"><input class="inpotyahn" type="text" name="email[]" placeholder="Enter Email address" /></div><div class="lkahty"><input class="bants btn_remove" name="remove" id="'+i+'" type="button" value="X Remove"></div></div></div>');
           //$('#fname').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
           
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      /*$('#submit').click(function(){      
        let dataa=$('#add_email').serialize();
        $.ajax({
            url:'/allstarsfan.com/user-invite',
            type:'POST',
            data:{dataa},
            success:function(response){
                console.log(response);
            }
        });
        alert(dataa);
        
           
      });  */
 });  
 </script>
@endsection
