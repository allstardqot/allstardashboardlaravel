@extends('layouts.user') @section('title', 'Dashboard') @section('content')
<style>
  .about-sec {
    padding: 8px 0px 53px;
  }
  .user-coin-main {
    background: #2a2b50;
    border: 1px solid #6669b9;
    border-radius: 10px;
    margin: 70px 0px 99px;
    padding: 38px 47px 162px;
  }
  .about-sec .heading {
    font-size: 48px;
    line-height: 56px;
    margin-bottom: 32px;
  }
  .heading {
    font-weight: 700;
    font-size: 36px;
    line-height: 42px;
    color: #fff;
    margin: 0;
  }
  .about-sec h6.subtile-head {
    font-weight: 700;
    font-size: 24px;
    margin-top: 14px;
    margin-bottom: 54px;
  }
  .about-sec h6 {
    font-weight: 400;
    font-size: 20px;
    line-height: 23px;
    color: #ffffff;
    margin-bottom: 12px;
  }
  .user-coin-row {
    padding: 72px 48px 84px;
    background: #ff5000;
    border-radius: 10px;
  }
  .user-card {
    background: #ffffff;
    border-radius: 32px;
    text-align: center;
    padding: 12px 15px 39px;
    margin-bottom: 20px;
    min-height: 100%;
  }
  .user-card img {
    width: 100%;
    max-width: 90px;
  }

  .user-card h5 {
    margin-top: 12px !important;
    margin-bottom: 0;
    font-weight: 600;
    font-size: 20px;
    line-height: 23px;
    text-align: center;
    color: #000000;
  }

  .user-card .btn-primary {
    background: #505281;
    color: #fff;
    border: 0px;
    width: auto;
    padding: 10px 10px;
  }
  .user-card .btn-primary:hover {
    background: #ff5000;
    color: #fff;
  }

  @media (max-width: 767.98px) {
    .user-coin-main {
      margin: 70px 0px 99px;
      padding: 30px 15px 50px;
    }
    .about-sec .heading {
      font-size: 26px;
    }
    .user-coin-row {
      padding: 30px 15px 30px;
    }
  }
</style>

<section class="about-sec visually-hidden" id="wallet-sec" >
  <div class="container">
    <div class="user-coin-main">
      <div class="row">
        <div class="col-md-12">
          <div class="head-content text-center">
            <h2 class="heading">User AFC</h2>
            <h6 class="subtile-head">
              Total AFC:<img
                src="{{ asset('public/assets/image/coins.png') }}"
                class="img-fluid"
                width="25"
                alt=""
              />
              <span id="userAvailableWallet">{{Auth::user()->wallet}}</span>
            </h6>
          </div>
        </div>
      </div>
      <div class="user-coin-row">
        <div class="row">
          <div class="col-md-4 mb-4">
            <div class="user-card">
              <div class="user-card-details">
              <img
                src="{{ asset('public/assets/image/coins.png') }}"
                class="img-fluid"
                
                alt=""
              />
                <h5>
                  <a
                    class="btn btn-primary"
                    href="http://3.110.104.72/offer"
                    target="http://3.110.104.72/offer"
                    >Buy AFC</a
                  >
                </h5>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="user-card">
              <div class="user-card-details">
                <img
                  src="{{ asset('public/assets/image/add 2.png') }}"
                  class="img-fluid"
                  alt=""
                />

                <div class="input-group mt-3">
                  <input
                    type="number"
                    class="form-control"
                    id="addtoken"
                    value="1"
                  />
                  <a
                    class="btn btn-primary"
                    href="javascript:void(0)"
                    onclick="addtoken();"
                    >Add AFC</a
                  >
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="user-card">
              <div class="user-card-details">
                <img
                  src="{{ asset('public/assets/image/withdrawal 1.png') }}"
                  class="img-fluid"
                  alt=""
                />
                <div class="input-group mt-3">
                  <input
                    type="number"
                    class="form-control"
                    id="withdrawtoken"
                    value="1"
                  />

                  <a
                    class="btn btn-primary"
                    href="javascript:void(0)"
                    onclick="withdrawtoken();"
                    >Withdraw AFC</a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="my-5 py-5" id="invitemodal">
    <div class="modal-dialog">
      <div class="modal-content mt-0">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Please Enter the OTP Sent To Your Registered Email</h4>
        </div>
        <div class="modal-body">
          <div class="modal-in">
            <form id="otpVerfiy">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter OTP" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                        <input
                  class="btn btn-primary"
                  id="otp_submit"
                  value="Submit"
                />
                          <!-- <button  class="btn btn-danger">Submit</button> -->
                        </div>
                    </div>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
