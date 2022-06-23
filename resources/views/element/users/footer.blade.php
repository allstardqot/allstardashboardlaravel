<footer>
    <div class="container-fluid p-0 text-white">
        <div class="py-4 nshtasdw">
            <div class="col-lg-10 col-10 mx-auto py-0 text-white">
                <div class="row">
                    <div class="col-lg-3 col-12 text-lg-left">
                        <h3>QUICK LINK</h3>
                        <p><a href="{{ url('/') }}">Home</a> </p>
                        <p><a href="{{ url('/about_us') }}">About Us</a></p>
                        <p><a href="{{ url('/how_to_play') }}">How to Play</a></p>
                        <p><a href="{{ url('/faq') }}">FAQ</a></p>
                        <p><a href="{{ url('/contact_us') }}">Contact Us</a></p>
                    </div>
                    <div class="col-lg-3 col-12 text-lg-left">
                        <h3>LEGAL</h3>
                        <p><a href="#">Terms and Conditions</a></p>
                        <p><a href="#">Responsible gaming</a></p>
                        <p><a href="#">AML Policy</a></p>
                        <p><a href="#">KYC Policy</a></p>
                        <p><a href="#">Self Exclusion</a></p>
                        <p><a href="#">Underage Gaming Policy</a></p>
                    </div>
                    <div class="col-lg-6 col-12">
                        <h3>CONTACT US</h3>
                        <form>
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <input type="Name" class="form-control inputft bgcolorinput mt-4" id="Name" placeholder="Name" name="Name" />
                                    <input type="email" class="form-control inputft bgcolorinput mt-4" id="email" placeholder="Email id " name="email" />
                                    <input type="button" class="d-lg-block jsystdbh d-none form-control mt-4" value="SEND" />
                                </div>
                                <div class="col-lg-6 col-12">
                                    <textarea class="form-control jsystdbh inputft bgcolorinput mt-4 w-100 order-first order-lg-last" rows="5" placeholder="Your Message" id="comment"></textarea>
                                </div>
                                <div class="col-lg-12 d-lg-none d-block">
                                    <input type="button" class="form-control btnColor mt-4 order-last order-lg-first" value="SEND" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row text-white mklatr">
            <div class="offset-lg-1 col-lg-8 mt-3 col-12 text-lg-left">
                <p class=""><b>{{ date('Y') }} © AllStars. All rights reserved.</b></p>
            </div>
            <div class="col-lg-3 mt-3 col-12 text-center">
                <ul class="d-flex list-unstyled marginl djfjdf">
                <li class="px-2"><a href="https://telegram.me/" ><img src="{{asset('public/img/teligram.png')}}"></a></li>
                <li class="px-3"><a href="https://www.instagram.com/"><img src="{{asset('public/img/Icon awesome-instagram.png')}}"> </a></li>
                <li class="px-3"><a href="https://twitter.com/"><img src="{{asset('public/img/Icon awesome-twitter.png')}}"> </a></li>
                <li class="px-3"><a href="https://discord.gg/"><img src="{{asset('public/img/discord-50.png')}}"> </a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
