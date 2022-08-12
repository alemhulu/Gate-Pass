<div>
  <footer id="footer" class="overflow-hidden border-0 m-0"
    style="background-image: url(img/demos/construction/backgrounds/background-2.jpg); background-repeat: no-repeat; background-position: center bottom;">
    <div class="container pt-5">
      <div class="row pt-4 mb-5 gy-4">
        <div class="col-lg-3 align-self-start">
          <a href="/">
            <img alt="Quarit" class="img-fluid logo" width="223" src="/logo/logo.png">
          </a>
        </div>
        <div class="col-lg-4">
          <h4 class="text-color-dark font-weight-bold mb-4-5">Navigation</h4>
          <ul class="list list-unstyled columns-lg-2">
            <li>
              <a href="/" class="text-color-hover-primary">
                Home
              </a>
            </li>
            <li>
              <a href="/about-us" class="text-color-hover-primary">
                About Us
              </a>
            </li>
            <li>
              <a href="/our-business" class="text-color-hover-primary">
                Our Business
              </a>
            </li>
            <li>
              <a href="/sister-campanies" class="text-color-hover-primary">
                Sister Companies
              </a>
            </li>
            <li>
              <a href="/contact-us" class="text-color-hover-primary">
                Contact Us
              </a>
            </li>
          </ul>
        </div>
      </div>

      <hr>

      <div class="footer-copyright bg-transparent pb-5 mt-5-5">
        <div class="row pb-5">
          <div class="col text-center mb-5">
            <p class="text-color-grey text-3 mb-3">Quarit Agro Industry © {{ now()->year }}. All Rights
              Reserved.
            </p>

            <a href="https://alelamultimedia.com">
              <p class="text-color-green text-3 mb-3 font-weight-bold">
                | Developed by:
                <span><img src="/alelalogo.jpg" alt="alela" width=30> </span>
                <span style=" color: #ff7417;">alela
                  events &amp; multimedia
                </span> |
              </p>
            </a>


            <ul class="footer-social-icons social-icons social-icons-clean social-icons-medium mb-5">
              <li class="social-icons-instagram">
                <a href="{{ $social->instagram ?? '#' }}" target="_blank" title="Instagram"><i
                    class="fab fa-instagram text-4"></i></a>
              </li>
              <li class="social-icons-linkedin">
                <a href="{{ $social->linkedin ?? '#' }}" target="_blank" title="LinkedIn"><i
                    class="fab fa-linkedin-in text-4"></i></a>
              </li>
              <li class="social-icons-facebook">
                <a href="{{ $social->facebook ?? '#' }}" class="fab fa-facebook-f text-4"></></a>
              </li>
            </ul>
          </div>
        </div>
      </div>

    </div>
    <div class="position-absolute left-100pct transform3dx-n50 top-0 d-none d-lg-block">
      <div class="appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="1000"
        data-appear-animation-duration="1500ms">
        <div class="custom-square-1 custom-square-1-big bg-primary mt-0 mb-5 me-5"></div>
      </div>
    </div>
  </footer>
</div>