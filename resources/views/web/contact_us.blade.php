@extends('layouts.web.main') @section('title', ' Contact Us')
@section('content')
<main>
  <div class="contact-sec">
    <div class="container-fluid">
      <h3 class="contact-heading">Contact Us</h3>

      <div class="rightSide2">
        <img src="{{ asset('public/img/Pattern(1).png') }}" />
      </div>
      <div class="col-md-10 mx-auto">
        <div class="row">
          <div class="col-lg-6 col-12">
            <h5 class="askdyhdn" class="mt-4">Leave us a message</h5>
            <div class="mt-5">
              <form action="{{ url('create') }}" method="POST">
                @csrf
                <input
                  class="input-one"
                  type="text"
                  id="fname"
                  name="fname"
                  placeholder="Enter Your Name"
                  required
                /><br />
                <input
                  class="input-two"
                  type="email"
                  id="email_enquiry"
                  name="email"
                  placeholder="Email Address"
                  required
                /><br />
                <textarea
                  class="input-three"
                  name="message"
                  rows="6"
                  placeholder="Your Message"
                  cols="30"
                  required
                ></textarea>
                <button
                  type="submit"
                  name="submit"
                  class="form-control input-button btnColor mt-4 order-last order-lg-first"
                >
                  SEND
                </button>
              </form>
            </div>
          </div>

          <div class="col-lg-6 col-12 text-lg-left">
            <div class="getintouch">
              <h5 class="mt-4 getheading">Get in touch</h5>
              <div class="getImg">
                <img class="" src="{{ asset('public/img/nÅà.png') }}" />
                <a class="lopremA">Lorem ipsum dolor sit amet, consectetur </a>
                <h5 class="adress1">adipiscing, CO-80111</h5>
                <br />
                <img src="{{ asset('public/img/néò.png') }}" />
                <a class="numberA">+020-000-0000</a><br />
                <div class="mt-3">
                  <img src="{{ asset('public/img/nâá.png') }}" />
                  <a class="enquiryA">enquiry@allstars.com</a>
                </div>
                <div class="mt-5 mb-4">
                  <a href="https://telegram.me/"
                    ><img src="{{ asset('public/img/teligram.png') }}"
                  /></a>
                  <a href="https://www.instagram.com/"
                    ><img
                      src="{{ asset('public/img/Icon awesome-instagram.png') }}"
                      style="margin-left: 5%"
                    />
                  </a>
                  <a href="https://twitter.com/"
                    ><img
                      src="{{ asset('public/img/Icon awesome-twitter.png') }}"
                      style="margin-left: 5%"
                    />
                  </a>
                  <a href="https://discord.gg/"
                    ><img
                      src="{{ asset('public/img/discord-50.png') }}"
                      style="margin-left: 5%"
                    />
                  </a>
                </div>
              </div>
            </div>

            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d113874.29338088576!2d75.72051791689901!3d26.885346595404343!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396c4adf4c57e281%3A0xce1c63a0cf22e09!2sJaipur%2C%20Rajasthan!5e0!3m2!1sen!2sin!4v1656136480645!5m2!1sen!2sin"
              width="100%"
              height="350"
              style="border: 0; border-radius: 5px"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
