<!DOCTYPE html>
<html lang="en-US">
    @include('frontend.include.header')

<body>

    <section class="banner-menu mob-inner-height lp-banner-height" style="height: 400px;background: linear-gradient(180deg, rgba(0,0,0,1) 0%, rgba(0, 0, 0, 0.027) 30%),url('{{asset('university/countries/overseas-banner.jpg')}}');background-size: cover;margin-top: 50px;">
            <!-- <img src="" alt="banner-img" class="desktop-view-only w-100"> -->
    </section>


    <section class="lets-started mt-5 mb-5">
        <div class="container">
          <div class="row">
            <div class="col-md-4 mtb-15">
              <div class="lets-started-box h-100">
                <div class="lets-started p-3">
                  <img src="{{asset('university/countries/can-flag.png')}}" class="w-100" alt="apply-for-1.jpg">
                </div>
                <div class="lets-started-btn">
                  <a href="{{route('frontend.study.canada')}}" class="common-btn">View Universities</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 mtb-15">
              <div class="lets-started-box h-100">
                <div class="lets-started p-3">
                  <img src="{{asset('university/countries/uk-flag.png')}}" class="w-100" alt="apply-for-1.jpg">
                </div>
                <div class="lets-started-btn">
                  <a href="{{route('frontend.study.unitedKingdom')}}" class="common-btn">View Universities</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 mtb-15">
              <div class="lets-started-box h-100">
                <div class="lets-started p-3">
                  <img src="{{asset('university/countries/aus-flag.png')}}" class="w-100" alt="apply-for-1.jpg">
                </div>
                <div class="lets-started-btn">
                  <a href="{{route('frontend.study.Australia')}}" class="common-btn">View Universities</a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>

    <section class="lets-started mt-5 mb-5">
        <div class="container">
          <div class="row">
            <div class="col-md-4 mtb-15">
              <div class="lets-started-box h-100">
                <div class="lets-started p-3">
                  <img src="{{asset('university/countries/eur-flag.png')}}" class="w-100" alt="apply-for-1.jpg">
                </div>
                <div class="lets-started-btn">
                  <a href="{{route('frontend.study.europe')}}" class="common-btn">View Universities</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 mtb-15">
              <div class="lets-started-box h-100">
                <div class="lets-started p-3">
                  <img src="{{asset('university/countries/usa-flag.png')}}" class="w-100" alt="apply-for-1.jpg">
                </div>
                <div class="lets-started-btn">
                  <a href="{{route('frontend.study.USAmerica')}}" class="common-btn">View Universities</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 mtb-15">
              <div class="lets-started-box h-100">
                <div class="lets-started p-3">
                  <img src="{{asset('university/countries/new-flag.png')}}" class="w-100" alt="apply-for-1.jpg">
                </div>
                <div class="lets-started-btn">
                  <a href="{{route('frontend.study.newZeland')}}" class="common-btn">View Universities</a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>


    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h5>Important Links</h5>
                    <ul class="footer-list">
                        <!--  <li><a href="#">Publisher</a></li>
                      <li><a href="#">Advertiser</a></li>
                      <li><a href="#">Affiliated</a></li> -->
                        <li><a href="#">Search Program</a></li>
                        <li><a href="service/institutions">Search Institutions</a></li>

                        <li><a href="about-us">About Us</a></li>
                        <li><a href="site/contact">Contact</a></li>
                        <li><a href="affiliates">Affiliate</a></li>




                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Other Links</h5>
                    <ul class="footer-list">
                        <li><a href="/story">Our Story</a></li>
                        <li><a href="/carrer">Careers</a></li>
                        <li><a href="/blogs">Blogs</a></li>
                        <li><a href="/faq">FAQ</a></li>




                    </ul>
                </div>



                <div class="col-md-3">
                    <h5>Our Policies</h5>

                    <ul class="footer-list">

                        <li><a href="/page/privacy-and-cookies-policy">Privacy And Policy</a></li>
                        <li><a href="/page/terms-and-conditions">Terms And Conditions</a></li>

                        <li><a href="/page/refund-policy">Refund Policies</a></li>


                    </ul>
                </div>





                <div class="col-md-3">
                    <h5>Get In Touch</h5>

                    <ul class="footer-list-1">
                        <!--<li><i class="fa fa-phone-alt"></i> <a href="tel:"> </a></li>-->
                        <li><a href="tel: 9355500042"><i class="fa fa-phone-alt"></i> 93-555-000-42 </a></li>
                        <li><i class="fa fa-envelope"></i> <a
                                href="mailto:support@universitybureau.com ">support@universitybureau.com </a></li>
                    </ul>

                    <ul class="footer-list-1">
                        <li><i class="fas fa-map-marker-alt"></i> <strong>Head Office :</strong> C-127, 3rd Floor,
                            Sec-2, NOIDA - 201301</li>
                    </ul>
                    <ul class="social-icons mt-3">
                        <li><a href="https://www.facebook.com/universitybureau "><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li><a href="https://twitter.com/universitybure1 "><i class="fab fa-twitter"></i></a></li>
                        <li><a href="https://www.linkedin.com/company/universitybureau"><i
                                    class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="https://www.instagram.com/universitybureau/  "><i class="fab fa-instagram"></i></a>
                        </li>
                        <li><a href="https://www.youtube.com/channel/UCXXDl1FUiEf1C57TwoJylJA"><i
                                    class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p class="mb-0"><small>&copy; Universitybureau 2019-2023 | All Rights Reserved</small> </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Back to top button -->
        <a id="button"></a>
    </footer>

    <script src="/assets/33d5fb32/jquery.js?v=1668973180"></script>
    <script src="/assets/e27e1803/yii.js?v=1668973180"></script>
    <script src="/assets/e27e1803/yii.activeForm.js?v=1668973180"></script>
    <script>jQuery(function ($) {
            jQuery('#w0').yiiActiveForm([], []);
            jQuery('#w1').yiiActiveForm([], []);
        });</script>
</body>

</html>