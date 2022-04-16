@extends('layouts.web.main')
@section('title', ' Contact Us')
@section('content')
<main>
  <div class="contact-sec">
    <div class="container-fluid">
      <h3 class="contact-heading">Contact Us</h3>

      <div class="rightSide2">
          <img src="{{asset('public/img/Pattern(1).png')}}" />
        </div>
      <div class="col-md-10 mx-auto">
      <div class="row">
        <div class="col-lg-6 col-12">
          <h5 class="askdyhdn" class="mt-4 ">Leave us a message</h5>
          <div class=" mt-5">
            <input
              class="input-one"
              type="text"
              id="fname"
              name="fname"
              placeholder="First_Name Last_Name"
            /><br />
            <input
              class="input-two"
              type="text"
              id="fname"
              name="fname"
              placeholder="Email Address"
            /><br />
            <textarea
              class="input-three"
              name="message"
              rows="6"
              placeholder="Your Message"
              cols="30"
            ></textarea>
            <input
              type="button"
              class="form-control input-button btnColor mt-4 order-last order-lg-first"
              value="SEND"
            />
          </div>
        </div>
        
        <div class="col-lg-6 col-12 text-lg-left">
          <div class="getintouch">
            <h5 class="mt-4  getheading">Get in touch</h5>
            <div class="getImg">
              <img class="" src="{{asset('public/img/nÅà.png')}}" />
              <a class="lopremA"
                >Lorem ipsum dolor sit amet, consectetur
              </a>
              <h5 class="adress1">adipiscing, CO-80111</h5>
              <br />
              <img src="{{asset('public/img/néò.png')}}" />
              <a class="numberA">+020-000-0000</a><br />
              <div class="mt-3">
                <img src="{{asset('public/img/nâá.png')}}" />
                <a class="enquiryA">enquiry@allstars.com</a>
              </div>
              <div class="mt-5  mb-4">
            <img src="{{asset('public/img/Icon%20awesome-youtube.png')}}" />
            <img
              style="margin-left: 5%"
              src="{{asset('public/img/Icon%20awesome-instagram.png')}}"
            />
            <img
              style="margin-left: 5%"
              src="{{asset('public/img/Icon%20awesome-facebook.png')}}"
            />
            <img
              style="margin-left: 5%"
              src="{{asset('public/img/Icon%20awesome-twitter.png')}}"
            />
          </div>
            </div>
              
          </div>
        

          <img
            class="reactagle w-100"
            class="mt-4 ml-5"
            src="{{asset('public/img/Rectangle%2019.png')}}"
          />
        </div>
      </div>
      </div>
    </div>
  </div>
</main>
@endsection
