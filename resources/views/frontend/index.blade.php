@extends('frontend.master')
@section('content')
  <!-- views -->
  <section class="banner-menu home-height">
    <div class="bg-video-wrap">
      <img src="{{asset('university/images/banner-1.jpg')}}" alt="banner-img" class="desktop-view-only w-100">
      <img src="{{asset('university/images/mob-banner.jpg')}}" alt="banner-img" class="mob-view-only w-100">
      <div class="container banner-caption banner-caption-home">
        <div class="banner-text mb-3">
          <h1 class="cooper">Global Recruitment Platform</h1>
          <h2>TO EMPOWER STUDENTS </h2>
          <p>Create solutions for tomorrow’s challenges</p>
        </div>
        <a href="students.html" class="banner-btn">Learn More</a>
      </div>
    </div>
    <div class="carousel-bottom">
      <ul class="banner-boxes">
        <li>
          <a href="#">
            <i class="fas fa-laptop-code"></i>
            <label>All-in-One Online Recruitment Platform</label>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fas fa-headset"></i>
            <label>24x7 Support</label>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fas fa-chart-bar"></i>
            <label>Real-Time Data Reporting </label>
          </a>
        </li>
      </ul>
    </div>
  </section>

  <section class="call-to-action">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-8">
          <p><strong>30% More commission</strong> for the first 50 affiliate partners</p>
          <p>Offering the best opportunities and support to grow your business with no extra effort</p>
        </div>
        <div class="col-md-4 text-end">
          <a href="recruiters.html" class="call-to-action-btn">Apply Now</a>
        </div>
      </div>
    </div>
  </section>

  <section class="about-ub mt-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <img src="{{asset('university/images/about-img-1.png')}}" class="w-100">
        </div>
        <div class="col-md-6">
          <label class="common-top-heading">About</label>
          <!-- <h2 class="common-heading">Learn More About <span>University Bureau</span></h2> -->
          <p>Find everything you need on one platform: 5,000+ recruiters & 1,500+ institutions globally through one
            marketplace.</p>
          <p>We guide, build confidence and help students worldwide to study and get the best international education.
            We provide a recruitment platform which enables institutions and recruitment agents to find and transact
            with each other, seamlessly.</p>
          <p>Think, approach us for getting the best out of the best course, take a step ahead and celebrate your win
            with us.</p>
          <p> <a href="about-us.html" class="common-btn">Learn More</a></p>
        </div>
      </div>
    </div>
  </section>

  <section class="how-we-work mt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="common-heading mb-3">How we <span>Work</span></h2>
          <div class="row">
            <div class="col-md-6">
              <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Time-saving recruitment tools
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <div class="row">
                        <div class="col-md-9">
                          <p>University Bureau makes your search easy to study abroad, simplifies your application
                            filing, and makes your application acceptance process successful. We connect international
                            students, recruitment partners (5,000+), and academic institutions (1,500+) on one platform
                            across Canada, the United States, the United Kingdom, and Australia.
                          <p>
                        </div>
                        <div class="col-md-3">
                          <img src="{{asset('university/images/time-save-img.png')}}" class="w-100" alt="time-save">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      End-to-end quality assurance
                    </button>
                  </h2>
                  <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <p>We provide you Quality Compliance and Visa (QCV) team to conduct in-depth checks on all visa
                        and course applications by using intuitive automation tools. We aim to make the application
                        process smooth and stress-free for students, recruiters and universities by providing 1-on-1
                        support worldwide.</p>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      Data that drives performance
                    </button>
                  </h2>
                  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <p>We provide student portal to recruiters, which saves recruiters time and gives students a
                        seamless counseling experience. With us, students will understand their application funnel and
                        data is organised in one secure place by following a Privacy Compliance Program aligned with the
                        General Data Protection Regulation.</p>
                    </div>
                  </div>
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="lets-started mt-5 mb-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2 class="common-heading"><span>Let’s get started </span> With University Bureau</h2>
          <p>We provide a recruitment platform, providing End to End support from research to admission to visa and
            arrival at your dream Institute. We guide you at every step of the way 24x7!</p>
          <p>Dream-Achieve-Success-Grow</p>
        </div>
      </div>
      <div class="row lets-started-row">
        <div class="col-md-4 mtb-15">
          <div class="lets-started-box h-100">
            <div class="lets-started-img">
              <img src="{{asset('university/images/apply-for-1.jpg')}}" class="w-100" alt="apply-for-1.jpg">
            </div>
            <div class="lets-started-text">
              <label>For Students</label>
              <p>We work hard to make your dreams come true by helping you to apply to institutes or programs based on
                your skills and interest.</p>
            </div>
            <div class="lets-started-btn">
              <a href="signup.html" class="common-btn">Student Registration</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mtb-15">
          <div class="lets-started-box h-100">
            <div class="lets-started-img">
              <img src="{{asset('university/images/apply-for-2.jpg')}}" class="w-100" alt="apply-for-1.jpg">
            </div>
            <div class="lets-started-text">
              <label>For Partner Institutions</label>
              <p>We provide a trusted platform to institutions to find a student, which the Home Office has approved as
                per the requirements.</p>
            </div>
            <div class="lets-started-btn">
              <a href="institutions.html" class="common-btn">Institutions Registration</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 mtb-15">
          <div class="lets-started-box h-100">
            <div class="lets-started-img">
              <img src="{{asset('university/images/apply-for-3.jpg')}}" class="w-100" alt="apply-for-1.jpg">
            </div>
            <div class="lets-started-text">
              <label>For Recruiters</label>
              <p>We provide an online recruitment platform to select student's, institutions and offer them support 24x7
                locally or globally by using our online support system.</p>
            </div>
            <div class="lets-started-btn">
              <a href="recruiter.html" class="common-btn">Recruiters Registration</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="video-home mb-5 mt-5">
    <img src="{{asset('university/images/video-bg.jpg')}}" class="desktop-view-only w-100" alt="video-home">
    <img src="{{asset('university/images/mob-video-bg.jpg')}}" class="mob-view-only w-100" alt="mob-video-home">
    <div class="video-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <!--<p><a href="#"><img src="images/play-icon.png" alt="Play-Icon"></a></p>-->
            <h1>Just Everything you need to connect with <br><span>Institutes, Students, and Recruitment Partners across
                the Globe.</span></h1>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="what-says mb-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2 class="common-heading">Listen to <span>our Partners</span></h2>
          <p>We believe that education must be accessible to all. We guide Students, Institutions, Recruiters and work
            hard for them to achieve their goals.</p>
        </div>
      </div>
      <div class="row lets-started-row align-items-center">
        <div class="col-md-4 pe-0">
          <div id="students-say" class="carousel slide carousel-fade bg-blue-home" data-bs-ride="carousel">
            <h5>Students:</h5>
            <hr class="line-hr">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#students-say" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#students-say" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#students-say" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item people-pic active">
                <img src="{{asset('university/images/stu2.jpg')}}" alt="people-say">
                <div class="carousel-caption">
                  <p class="text-white">University Bureau helped me throughout my application filling process. Their
                    team double-checked every part of my application or visa so that everything was correct and they
                    provided 24x7 call support.</p>
                  <small> Himanshi aggarwal, University of Canada West, Student from India.</small>
                </div>
              </div>
              <div class="carousel-item people-pic">
                <img src="{{asset('university/images/stu3.jpg')}}" alt="people-say">
                <div class="carousel-caption">
                  <p class="text-white">Studying at an international university was the most rewarding experience of my
                    life. With the university bureau, it comes true. UB team guided me through the immigration, visa
                    filing, IELTS training process. </p>
                  <small> Shruti, University of Toronto, Student from India.</small>
                </div>
              </div>
              <div class="carousel-item people-pic">
                <img src="{{asset('university/images/stu4.jpg')}}" alt="people-say">
                <div class="carousel-caption">
                  <p class="text-white">Thanks to the University Bureau team for guiding me and helping me at each and
                    every step to make my dream of getting an education at a foreign university successful. </p>
                  <small> Sonal Rathore, Conestoga College, Ontario, Canada, Student from India.</small>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#students-say" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#students-say" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        <div class="col-md-4 pe-0 ps-0">
          <div id="partner-say" class="carousel slide carousel-fade bg-red-home pb-5 pt-5" data-bs-ride="carousel">
            <h5>Institutions:</h5>
            <hr class="line-hr">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#partner-say" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#partner-say" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#partner-say" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item people-pic active">
                <img src="{{asset('university/images/int1.jpg')}}" alt="people-say">
                <div class="carousel-caption">
                  <p class="text-white"> It was not easy to find each student and check all the submitted applications.
                    With University Bureau, institutes can directly reach out to recruiters. Institutes only have to
                    give a final check to the submitted application, which saves time.</p>
                  <!-- <small>SC West Institute-1, Canada</small> -->
                </div>
              </div>
              <div class="carousel-item people-pic">
                <img src="{{asset('university/images/inst2.jpg')}}" alt="people-say">
                <div class="carousel-caption">
                  <p class="text-white">The University bureau provides a network of more than 5,000+ recruiters to reach
                    the best and brightest students globally. It provides a single, easy-to-use platform, and they train
                    the recruitment partners through an industry specialist to promote the institution.</p>
                  <!-- <small>SC West Institute-2, Canada</small> -->
                </div>
              </div>
              <div class="carousel-item people-pic">
                <img src="{{asset('university/images/stu1.jpg')}}" alt="people-say">
                <div class="carousel-caption">
                  <p class="text-white">University Bureau is a college search and review platform. Students can view
                    thousands of institutions and give their feedback to help other candidates to choose the institute
                    who are willing to study abroad. They also promote institutions worldwide.</p>
                  <!-- <small>SC West Institute-3, Canada</small> -->
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#partner-say" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#partner-say" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        <div class="col-md-4 ps-0">
          <div id="recruiters-say" class="carousel slide carousel-fade bg-blue-home" data-bs-ride="carousel">
            <h5>Recruiters:</h5>
            <hr class="line-hr">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#recruiters-say" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#recruiters-say" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#recruiters-say" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item people-pic active">
                <img src="{{asset('university/images/rec1.jpg')}}" alt="people-say">
                <div class="carousel-caption">
                  <p class="text-white">University Bureau has dedicated staff whose support is available for 24x7. They
                    guide everything about their platform, which is so friendly that I quickly understand it. They
                    provide us with all facilities on one recruitment platform. </p>
                  <small>Harshit Shrivastava, Indore.</small>
                </div>
              </div>
              <div class="carousel-item people-pic">
                <img src="{{asset('university/images/re3.jpg')}}" alt="people-say">
                <div class="carousel-caption">
                  <p class="text-white"> University Bureau helped me increase my student reach and gave me more students
                    and institutions options on their platform. They also provide us document manager to store the
                    documents and CRM tools to make our work smooth.</p>
                  <small>Ammad, Mumbai</small>
                </div>
              </div>
              <div class="carousel-item people-pic">
                <img src="{{asset('university/images/newr1.jpg')}}" alt="people-say">
                <div class="carousel-caption">
                  <p class="text-white">University Bureau simplifies our search and streamlines the
                    application-acceptance process by connecting international students, recruitment partners, and
                    academic institutions globally on one platform. There are providing an online Recruitment AI-Enabled
                    Platform, thus providing complete digital solutions. </p>
                  <small>Malvika Singh, Banglore</small>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#recruiters-say" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#recruiters-say" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="search-dream-colleges">
    <div class="container">
      <div class="row">
        <div class="common-heading-home-college text-center">Most Recommended <span> Colleges</span></div>
        <div class="row lets-started-row">
          <div class="col-md-12 mt-5">
            <div class="3-col-items">


              <div class="card">
                <div class="media media-2x1 gd-primary">

                  <img class="blog-image" src="{{asset('university/images/uploads/6373caeebd458.jpg')}}">
                  <div class="college-title">
                    <label>Castleton University</label>

                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6 bdr-right">
                      <label>USD 30046</label>
                      <small>Min Fees</small>
                    </div>
                    <div class="col-md-6">
                      <label>USD 30046</label>
                      <small>Max Fees</small>
                    </div>
                    <div class="col-md-12 bdr-top">
                      <label>USD 30046</label>
                      <small>Average Fees</small>
                    </div>
                    <div class="col-md-12 bdr-top">
                      <p><i class="fas fa-map-marker-alt"></i> United States</p>

                    </div>

                  </div>
                </div>
              </div>

              <div class="card">
                <div class="media media-2x1 gd-primary">

                  <img class="blog-image" src="{{asset('university/images/uploads/NORTHERN_LIGHT_COLLEGE.jpg')}}">
                  <div class="college-title">
                    <label>Northern Lights College</label>

                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6 bdr-right">
                      <label>CAD 10930
                      </label>
                      <small>Min Fees</small>
                    </div>
                    <div class="col-md-6">
                      <label>CAD 11750</label>
                      <small>Max Fees</small>
                    </div>
                    <div class="col-md-12 bdr-top">
                      <label>CAD 11633</label>
                      <small>Average Fees</small>
                    </div>
                    <div class="col-md-12 bdr-top">
                      <p><i class="fas fa-map-marker-alt"></i> Canada</p>

                    </div>

                  </div>
                </div>
              </div>
              <div class="card">
                <div class="media media-2x1 gd-primary">

                  <img class="blog-image" src="{{asset('university/images/uploads/NORTHERN_LIGHT_COLLEGE.jpg')}}">
                  <div class="college-title">
                    <label>Northern Lights College</label>

                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6 bdr-right">
                      <label>CAD 10930
                      </label>
                      <small>Min Fees</small>
                    </div>
                    <div class="col-md-6">
                      <label>CAD 11750</label>
                      <small>Max Fees</small>
                    </div>
                    <div class="col-md-12 bdr-top">
                      <label>CAD 11633</label>
                      <small>Average Fees</small>
                    </div>
                    <div class="col-md-12 bdr-top">
                      <p><i class="fas fa-map-marker-alt"></i> Canada</p>

                    </div>

                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="latest-blog mt-5 mb-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1><span>Read our blog </span> and let’s grow Globally</h1>
          <p class="mb-4">We have got you covered! Get the latest education trends and the best tips related to studying
            overseas</p>
        </div>
      </div>
      <div class="row lets-started-row">
        <div class="col-md-12">
          <div class="3-col-items">

            <div class="card">
              <div class="media media-2x1 gd-primary">
                
                <img class="blog-image" src="{{asset('university/images/uploads/629498bfd050f.jpg')}}">
              </div>
              <div class="card-body card-body-review">
                <h5 class="card-title"><a href="blogs/why-to-study-in-canada.html" class="link-red">Why To Study In
                    Canada</a></h5>
                <p>
                <p><strong>Canada is the most preferred and sought-after country for higher education by Indian
                    students</strong>. It offers high-quality education topped with internship opportunities, post-study
                  wor....</p>
                <a href="blogs/why-to-study-in-canada.html" class="link-re home-read-more" tabindex="-1">Read More</a>
              </div>
              <div class="post-date">
                <label class="date-month">Apr 19 </label>
                <span class="year">22</span>
              </div>
            </div>

            <div class="card">
              <div class="media media-2x1 gd-primary">
                <img class="blog-image" src="{{asset('university/images/uploads/6243f05369ca5.jpg')}}">
              </div>
              <div class="card-body card-body-review">
                <h5 class="card-title"><a href="blogs/Most-Preferred-Courses-to-Study-in-Abroad-by-Indian-Students.html"
                    class="link-red">Most Preferred Courses to Study in Abroad </a></h5>
                <p>
                <p>As per the survey, <strong>18 % of the Indian students prefer Engineering subject to study
                    abroad</strong>, followed by Computer Science which 12 percent Indian students prefer and Business
                  Studies....</p>
                <a href="blogs/Most-Preferred-Courses-to-Study-in-Abroad-by-Indian-Students.html"
                  class="link-re home-read-more" tabindex="-1">Read More</a>
              </div>
              <div class="post-date">
                <label class="date-month">Apr 19 </label>
                <span class="year">22</span>
              </div>
            </div>

            <div class="card">
              <div class="media media-2x1 gd-primary">
                <img class="blog-image" src="{{asset('university/images/uploads/624692b7df263.jpg')}}">
              </div>
              <div class="card-body card-body-review">
                <h5 class="card-title"><a href="blogs/canada-immigration-levels-plan.html" class="link-red"> Canada's
                    Immigration Levels Plan for 2022–2024</a></h5>
                <p>
                <p>Canada&#39;s<strong> Immigration Levels Plan for 2022-2024 was just released. Between 2022 and
                    2024</strong>, the Canadian government plans to welcome nearly 430,000 additional immigrants.</p>

               ....
                  <a href="blogs/canada-immigration-levels-plan.html" class="link-re home-read-more" tabindex="-1">Read
                    More</a>
              </div>
              <div class="post-date">
                <label class="date-month">Apr 19 </label>
                <span class="year">22</span>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="study-destinaton-section">
    <div class="container">
      <div class="row">
        <div class="studydes_head">
          <img src="{{asset('university/images/Study%20Destination%20test.png')}}" alt="study destinaton">
        </div>
        <div class="studydes_main">
          <div class="studydes-container">
            <a href="country/study-in-canada.html">
              <div class="studydes-card">
                <img src="{{asset('university/images/studydes-img-1.png')}}" alt="">
                <h6><b>Study In Canada</b></h6>
              </div>
            </a>
            <a href="country/study-in-australia.html">
              <div class="studydes-card">
                <img src="{{asset('university/images/studydes-img-2.png')}}" alt="">
                <h6><b>Study In Australia</b></h6>
              </div>
            </a>
            <a href="country/study-in-switzerland.html">
              <div class="studydes-card">
                <img src="{{asset('university/images/studydes-img-3.png')}}" alt="">
                <h6><b>Study In Switzerland</b></h6>
              </div>
            </a>
            <a href="country/study-in-united-kingdom.html">
              <div class="studydes-card">
                <img src="{{asset('university/images/studydes-img-4.png')}}" alt="">
                <h6><b>Study In United Kingdom</b></h6>
              </div>
            </a>
            <a href="country/study-in-united-state-of-america.html">
              <div class="studydes-card">
                <img src="{{asset('university/images/studydes-img-5.png')}}" alt="">
                <h6><b>Study In U.S.A</b></h6>
              </div>
            </a>
            <a href="country/study-in-ireland.html">
              <div class="studydes-card">
                <img src="{{asset('university/images/studydes-img-6.png')}}" alt="">
                <h6><b>Study In Ireland</b></h6>
              </div>
            </a>
            <a href="country/study-in-france.html">
              <div class="studydes-card">
                <img src="{{asset('university/images/studydes-img-7.png')}}" alt="">
                <h6><b>Study In France</b></h6>
              </div>
            </a>
            <a href="country/study-in-germany.html">
              <div class="studydes-card">
                <img src="{{asset('university/images/studydes-img-8.png')}}" alt="">
                <h6><b>Study In Germany</b></h6>
              </div>
            </a>
            <a href="country/study-in-latvia.html">
              <div class="studydes-card">
                <img src="{{asset('university/images/studydes-img-9.png')}}" alt="">
                <h6><b>Study In Latvia</b></h6>
              </div>
            </a>
            <a href="country/study-in-europe.html">
              <div class="studydes-card">
                <img src="{{asset('university/images/studydes-img-10.png')}}" alt="">
                <h6><b>Study In Europe</b></h6>
              </div>
            </a>
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
              <label>1500 +</label>
              <span>Institutions</span>
            </li>
            <li class="col">
              <i class="fas fa-user-tie"></i>
              <label>5000 +</label>
              <span>Recruitment Partners</span>
            </li>
            <li class="col">
              <i class="fas fa-globe-asia"></i>
              <label>100 +</label>
              <span>Countries</span>
            </li>
            <li class="col">
              <i class="fas fa-users"></i>
              <label>100,000 +</label>
              <span>Students</span>
            </li>
            <li class="col">
              <i class="fas fa-tasks"></i>
              <label>50,000 +</label>
              <span>Programs</span>
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
  @endsection
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection 