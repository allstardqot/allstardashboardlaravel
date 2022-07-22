@extends('layouts.web.main')
@section('title', ' How To Play')
@section('content')
<style>
  .table thead th {
    color: #fff;
  }
  .table{
    border: 1px solid #fff;
  }
  tr.table-bg {
    background: #000;
}
td {
    border-left: 1px solid #fff;
}
.table td, .table th{
  width: 65px;
  color: #fff;
}
</style>
<div class="navmate">
  <section class="content-sec pt-5 py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="content-column">
            <h3 class="text-center heading-h3 text-white">
              <span> COOKIES POLICY </span>
            </h3>

            {{-- <h4>Title</h4> --}}
            <p>
              Allstars Fantasy (the “allstarsfan.com”) uses cookies. This Cookie Policy (“Policy”) explains how we use cookies and similar technology and your choice options in this regard. This Policy shall be read in conjunction with our Privacy Policy, Terms and Conditions and all other Website policies. Please read this carefully as this Policy is legally binding when you access or use the Website, regardless of how you access or make use of the Website and our services.
            </p>
            <p>	We may use cookies and similar technologies that automatically collect certain information from your browser or device when you visit the Website, read our emails, use our services or otherwise engage with us.</p>

            <h4>WHAT IS A COOKIE</h4>
            <p>
              A cookie is a piece of data contained in a very small text file that is stored in your browser or elsewhere in your hard drive. We use cookies, web beacons, log files, and a variety of similar technologies (collectively, “cookies”) to collect information from your browser or device and evaluate the effectiveness of our Website and analyses user trends. These technologies collect information about how you use our service (e.g., the pages you view, the links you click, and other actions you take on the Website), information about your browser and online usage patterns (e.g., Internet Protocol (“IP”) address, browser type, browser language, referring / exit pages and URLs, pages viewed, whether you opened an email, links clicked), and information about the device(s) you use to access the Website and our services (e.g., mobile device identifier, mobile carrier, device type, model and manufacturer, mobile device operating system brand and model, and whether you access the Website from multiple devices). 
            </p>

            <h4>WHY WE USE THESE TECHNOLOGIES</h4>
            <p>We may use the information collected through these technologies to better display our Website, deliver content (including ads), recognise you to save you time and access to customised features, track your specified preferences, to provide better technical support including certain Website features, for promotional purposes, and to measure and analyse Website’s usage. We may also use third-party service providers and said service providers may place cookies on the hard drive of your device (or use similar technologies) and will receive information on how our users navigate and use the Website.
            </p>

            <h4>TYPES OF COOKIES WE USE</h4>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Recusandae provident consequuntur hic cum magnam ea praesentium
              asperiores est quia! Labore sapiente fuga sit est quis, eaque
              soluta ex laborum cumque.
            </p>

            <table class="table">
              <thead>
                <tr class="table-bg">
                  <th scope="col">Serial No.</th>
                  <th scope="col">Type of Cookie</th>
                  <th scope="col">Description</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>
                    Strictly Necessary (also known as Essential or Required Cookies)</td>
                  <td>Necessary for the operation of the Website. We may use essential cookies to authenticate users, prevent fraudulent use of user accounts, or offer Website features.</td>
                  
                  <!-- <td></td> -->
                </tr>
                <tr>
                  <td>2</td>
                  <td>Functional</td>
                  <td>Allow us to recognize and count the number of visitors and see how visitors move around the Website when using it. This helps us improve the way the Website works.</td>
                  
                  <!-- <td></td> -->
                </tr>
                <tr>
                  <td>3</td>
                  <td>Analytic</td>
                  <td>Used to recognise you when you return to the Website. This enables us to personalise our content for you and remember your preferences. </td>
                  
                  <!-- <td></td> -->
                </tr>
                <tr>
                  <td>4</td>
                  <td>Tracking</td>
                  <td>Record your visit to the Website, the pages you have visited, and the links you have followed. We will use this information to make the Website and the content more relevant to your interests. We may also share this information with third-parties for this purpose.</td>
                  
                  <!-- <td></td> -->
                </tr>
                <tr>
                  <td>5</td>
                  <td>Session (temporary)</td>
                  <td>Are ones which last for a session on our website. They contain information, stored in a temporary memory location and are deleted after your session ends. This allows us to remember visitors when they move between our web pages and are vital for user experience.</td>
                  
                  <!-- <td></td> -->
                </tr>
                
               
              </tbody>
            </table>


            <h4>USE COOKIES </h4>
            <p>
              We may use cookies which will not be saved on your device, or which will only be saved on your device for as long as your browser is active (session cookies) and those which will be saved on your device for a longer period (persistent cookies). We take appropriate security measures to prevent unauthorized access to our cookies.
            </p>

            <h4>ADVERTISEMENTS </h4>
            <p>
              Where we use third-party advertising companies to serve ads when you visit or use our Website. These companies may use information about your visits to our Website and other websites that are contained in web cookies and other tracking technologies in order to provide advertisements about goods and services of interest to you, provided you have consented to the same.
            </p>

            <h4>LINKS TO THIRD-PARTIES</h4>
            <p>
             Our services, Website or communications may contain links to other third-party websites which are not owned or operated by us and are regulated by their own policies. We strongly advise you to review the policies of every website you visit.  We specifically recommend that you, as the user (under this Policy) visit, familiarize, understand the cookie policies of such entities, as they are our partners in providing services to you. However, even where you have not reviewed said third-party policies, you undertake that you as the user accept their individual policies, including their cookies policies, as third-party service providers to us.
            </p>

            <h4>YOUR CHOICE OF COOKIES</h4>
            <p>
              8.1.	You may be able to refuse or disable cookies by adjusting your web browser settings. Some browsers have options that allow the visitor to control whether the browser will accept cookies, reject cookies, or notify the visitor each time a cookie is sent. If you choose to refuse, disable, or delete these technologies, some of the functionality of our services and features may no longer be available to you or function properly. 
            </p>

            <h4>Title</h4>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Recusandae provident consequuntur hic cum magnam ea praesentium
              asperiores est quia! Labore sapiente fuga sit est quis, eaque
              soluta ex laborum cumque.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection