<!--...............Footer section........................-->
<div class="wrapper">
  <footer>
    <div class="footer-rgt">
      <div class="footer-menu">
        <h3>COMPANY</h3>
        <ul>
          <li><a href="{{ url('/how-its-work') }}">How it works</a></li>
          <!-- <li><a href="#">Services</a></li> -->
          <!-- <li><a href="#">Locations</a></li> -->
          <li><a href="{{ url('/prohibited-items') }}">Prohibited Items</a></li>
          <li><a href="{{ url('/about-us') }}">About Us</a></li>
          <li><a href="{{ url('/faq') }}">FAQ</a></li>
        </ul>
      </div>
      <div class="footer-menu">
        <h3>RESOURCES</h3>
        <ul>
          <li><a href="{{ url('/location') }}">Locations</a></li>
          <li><a href="homepage#calculator">Pricing</a></li>
         
        </ul>
      </div>
      <div class="footer-menu">
        <h3>SUPPORT</h3>
        <ul>
          <li><a href="{{ url('/contact-us') }}">Contact Us</a></li>
        </ul>
      </div>
    </div>
      <div class="footer-lft">
        <img src="{{ asset('site/assets/images/logo-footer.svg') }}" alt=""/>
        <p>© 2022 MelloBridge. All rights reserved</p>
        <ul>
          <li><a href="#">Terms of service</a></li>
          <li><a href="#">Terms of use</a></li>
          <li><a href="#">Privacy Policy</a></li>
        </ul>
      </div>
     
  </footer>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('site/assets/js/jquery.slimmenu.min.js') }}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="{{ asset('site/assets/js/custom.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
$(function() {
    $('a[href*=\\#]:not([href=\\#])').on('click', function() {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.substr(1) +']');
        if (target.length) {
            $('html,body').animate({
                scrollTop: target.offset().top
            }, 1000);
            return false;
        }
    });
});
</script>
</body>
</html>