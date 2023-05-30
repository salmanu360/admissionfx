@include('frontend.include.header')
<section class="banner-menu">
    <div class="bg-video-wrap">
      <img src="{{asset('university/images/login-bg.jpg')}}" alt="banner-img" class="desktop-view-only w-100">
      <img src="{{asset('university/images/mob-login-bg.jpg')}}" alt="banner-img" class="mob-view-only w-100">
      <div class="container banner-caption login-caption banner-caption-custom">
        <div class="banner-text mb-3">
          <h2>Contact Us</h2>
          <p>We’re here to help. Don’t hesitate to get in touch with our expert support <br>team who can help answer all of your questions.</p>
        </div>
      </div>
    </div>
</section>

<section class="login-body">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5">
                <div class="login-form">
                    <div class="text-center mb-5">
                        <h3>Feel Free to Contact Us</h3>
                        <hr class="line-hr mb-5">
                    </div>
                    <form id="contactform" class="contact-form" action="https://universitybureau.com/contact" method="post">
                        <input type="hidden" name="_csrf" value="fjqpq9-xM_jqh-oYOh0FfXMjdAFoaeD-mW7o7XevB_wRVprDudtksrrujS9cJW0vPWAXRh4shJf2La2GT5dsrA==">
                        <div class="mb-4 mt-5">
                            <div class="login-input">
                                <div class="form-group field-contactform-name required">

                                    <input type="text" id="contactform-name" class="form-control" name="ContactForm[name]" autofocus placeholder="Name" aria-required="true">

                                    <p class="help-block help-block-error"></p>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="login-input">
                                <div class="form-group field-contactform-email required">

                                    <input type="text" id="contactform-email" class="form-control" name="ContactForm[email]" placeholder="Email" aria-required="true">

                                    <p class="help-block help-block-error"></p>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="login-input">
                                <div class="form-group field-contactform-phone">

                                    <input type="text" id="contactform-phone" class="form-control" name="ContactForm[phone]" placeholder="Contact Number">

                                    <p class="help-block help-block-error"></p>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="login-input">
                                <div class="form-group field-contactform-subject">

                                    <input type="text" id="contactform-subject" class="form-control" name="ContactForm[subject]" placeholder="Subject">

                                    <p class="help-block help-block-error"></p>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="login-input">
                                <div class="form-group field-contactform-body">

                                    <textarea id="contactform-body" class="form-control" name="ContactForm[body]" rows="2" placeholder="Message"></textarea>

                                    <p class="help-block help-block-error"></p>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="login-input">
                                <div class="form-group field-contactform-verifycode">
                                    <label class="control-label" for="contactform-verifycode"></label>
                                    <input type="hidden" id="contactform-verifycode" class="form-control" name="ContactForm[verifyCode]">
                                    <div id="contactform-verifycode-recaptcha-contactform" class="g-recaptcha" data-sitekey="6LfMe2EfAAAAAFPVnVm2fnY_wOL4TmiM0QF9Z5aP"
                                        data-input-id="contactform-verifycode" data-form-id="contactform"></div>

                                    <p class="help-block help-block-error"></p>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="common-btn w-100" name="contact-button">Submit</button> </div>
                    </form>
                </div>
            </div>
            <div class="col-md-7 text-center">
                <h2 class="common-heading">Contact <span>Details</span></h2>
                <div class="row lets-started-row">
                    <div class="col-md-12 m-auto mb-3">
                        <div class="register-boxes">
                            <a href="mailto:help@universitybureau.com">
                                <i class="fas fa-envelope"></i>
                                <label>support@universitybureau.com</label>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12 m-auto">
                        <div class="register-boxes">
                            <a href="tel:+91-9355500042">
                                <i class="fas fa-phone-square-alt"></i>
                                <label>93-555-000-42</label>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12 mt-4">
                        <div class="register-boxes">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3302.054976400357!2d-117.4607410848519!3d34.14493558058083!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c34953007cc255%3A0xd0001948fe248f37!2s6000%20Big%20Pine%20Dr%2C%20Fontana%2C%20CA%2092336%2C%20USA!5e0!3m2!1sen!2sin!4v1646450413754!5m2!1sen!2sin"
                                width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="counter-achive">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="row">
                    <li class="col">
                        <i class="fas fa-university"></i>
                        <label>250 +</label>
                        <span>Institution Partners</span>
                    </li>
                    <li class="col">
                        <i class="fas fa-user-tie"></i>
                        <label>500 +</label>
                        <span>Recruitment Partners</span>
                    </li>
                    <li class="col">
                        <i class="fas fa-globe-asia"></i>
                        <label>10 +</label>
                        <span>Countries</span>
                    </li>
                    <li class="col">
                        <i class="fas fa-users"></i>
                        <label>150 +</label>
                        <span>Team Members</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
@include('frontend.include.footer')