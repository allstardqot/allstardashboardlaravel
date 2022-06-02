<footer>
    <div  class="py-4 footer">
      <div class="col-lg-10 col-10 mx-auto py-0 text-white">
        <div class="row">
          <div class="col-lg-3 col-12 text-center text-lg-left">
            <h3>QUICK LINK</h3>
            <p>Home</p>
            <p>About Us</p>
            <p>How to Play</p>
            <p>FAQ</p>
            <p>Contact Us</p>
          </div>
          <div class="col-lg-3 col-12 text-center text-lg-left">
            <h3>LEGAL</h3>
            <p>Terms and Conditions</p>
            <p>Responsible gaming</p>
            <p>AML Policy</p>
            <p>KYC Policy</p>
            <p>Self Exclusion</p>
            <p>Underage Gaming Policy</p>
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
          <p class=""><b>2022 © AllStars. All rights reserved.</b></p>
        </div>
        <div  class="col-lg-3 mt-3 col-12 text-center">
          <ul class="d-flex list-unstyled marginl">
            <li class="px-3"><a href="https://www.facebook.com/"><img src="{{asset('public/img/Icon awesome-facebook.png')}}"></a></li>
            <li class="px-3"><a href="https://twitter.com/"><img src="{{asset('public/img/Icon awesome-twitter.png')}}"> </a></li>
            <li class="px-3"><a href="https://www.instagram.com/"><img src="{{asset('public/img/Icon awesome-instagram.png')}}"> </a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
