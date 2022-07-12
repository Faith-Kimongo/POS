<!DOCTYPE html>
<html>
  <head>
    <title>Smart Waiter</title>
    <meta charset="UTF-8" />
    @laravelPWA
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
    {{-- <link rel="stylesheet" href="src/styles.css" /> --}}
    <link rel="stylesheet" href="{{ asset('css/front.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    <script src="{{ asset('js/qr_packed.js') }}"></script>
    {{-- <script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/qr_packed.js"></script> --}}
  </head>

  <body >
    {{-- <div id="container">
      ksjdfhjdhjhgjhgj
    </div> --}}
    <div id="container" >
      <h1>Tap the Code below to Scan the QR Code</h1>

      <a id="btn-scan-qr">
        <img src="https://chart.apis.google.com/chart?cht=qr&chs=300x300&chl={{ url('/') }}&chld=H|0">
        
      <a/>

      <canvas hidden="" id="qr-canvas"></canvas>

      <div id="qr-result" hidden="">
        <b>Menu Link:</b> <span id="outputData"></span>
      </div>
    </div>


    <footer>
      <div class="container">
        <div class="wrap-logo">
          <h3><img src="{{ asset('media/icon/tribus-logo.jpg') }}" alt=""></h3><h3> Smart Waiter</h3>
        </div>
        <div class="wrap-info">
          <ul>
            <li>Tribus-Tsg , Two Rivers Mall</li>
            {{-- <li>+1 23 456 789</li> --}}
            <li><a href="mailto:info@smartwaiter.co.ke">info@smartwaiter.co.ke</a></li>
          </ul>
        </div>
        {{-- <div class="wrap-social">
          <ul>
            <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
            <li><a href=""><i class="fab fa-instagram"></i></a></li>
            <li><a href=""><i class="fab fa-google"></i></a></li>
            <li><a href=""><i class="fab fa-youtube"></i></a></li>
          </ul>
        </div> --}}
        <div class="footer-text">
          <p>Copyright © {{ now()->year }} All Right Reserved</p>
        </div>
      </div>
    </footer>
    <script src="{{ asset('js/qr-code.js') }}"></script>
    {{-- <script src="./src/qrCodeScanner.js"></script> --}}
  
  </body>
</html>
