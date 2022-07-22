<footer>
    <div  class="py-4 footer">
      <div class="col-lg-10 col-10 mx-auto py-0 text-white">
        <div class="row">
          <div class="col-lg-3 col-12 text-center text-lg-left">
            <h3>QUICK LINK</h3>
            <p><a href="{{ url('/') }}">Home</a> </p>
            <p><a href="{{ url('/about_us') }}">About Us</a></p>
            <p><a href="{{ url('/how_to_play') }}">How to Play</a></p>
            <p><a href="{{ url('/faq') }}">FAQ</a></p>
            <p><a href="{{ url('/contact_us') }}">Contact Us</a></p>
          </div>
          <div class="col-lg-3 col-12 text-center text-lg-left">
            <h3>LEGAL</h3>
            <p><a href="{{ url('/terms-condition') }}" >Terms and Conditions</a></p>
            <p>Responsible gaming</p>
            <p><a href="{{ url('/aml-policy') }}" >AML Policy</a></p>
            <p><a href="{{ url('/kyc-policy') }}" >KYC Policy</a></p>
            <p>Self Exclusion</p>
            <p><a href="{{ url('/gaming-policy') }}" >Underage Gaming Policy</a></p>
          </div>
          <div class="col-lg-6 col-12 text-center text-lg-left">
            <h3>CONTACT US</h3>
            <form action="{{ url('create') }}" method="POST">
              @csrf
              <div class="row">
                <div class="col-lg-6 col-12">
                  <input type="Name" class="form-control bgcolorinput mt-4" id="Name" placeholder="Name" name="fname" required>
                  <input type="email" class="form-control bgcolorinput mt-4" id="email" placeholder="Email id " name="email" required>
                  <button  type="submit" class=" d-lg-block d-none form-control btnColor mt-4" >SEND</button>
                </div>
                <div class="col-lg-6 col-12 ">
                  <textarea class="form-control bgcolorinput mt-4 w-100 order-first order-lg-last " rows="5" placeholder="Your Message" id="comment" name="message" required></textarea>
                </div>
                <div class="col-lg-12 d-lg-none d-block">
                  <input type="button"  class="form-control btnColor mt-4 order-last order-lg-first" value="SEND">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row text-white footer-bar" >
        <div  class="offset-lg-1 col-lg-8 mt-3 col-12  text-center text-lg-left">
          <p class=""><b>2022 © AllStars. All rights reserved.</b> <script type="text/javascript" src="https://seal.starfieldtech.com/getSeal?sealID=PqvRODZG7RIlmxTFAseQdNJnjmup9qZ8S2zb5vmrUjx0B6cN4OZGv4fU8A8C"></script></p>
        </div>
        <div  class="col-lg-3 mt-3 col-12 text-center">
          <ul class="d-flex list-unstyled marginl">
            <li class="px-2"><a href="{{ TELEGRAM }}" ><img src="{{asset('public/img/teligram.png')}}"></a></li>
            <li class="px-3"><a href="{{ INSTAGRAM }}"><img src="{{asset('public/img/Icon awesome-instagram.png')}}"> </a></li>
            <li class="px-3"><a href="{{ TWITTER }}"><img src="{{asset('public/img/Icon awesome-twitter.png')}}"> </a></li>
            <li class="px-3"><a href="{{ DISCORD }}"><img src="{{asset('public/img/discord-50.png')}}"> </a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
