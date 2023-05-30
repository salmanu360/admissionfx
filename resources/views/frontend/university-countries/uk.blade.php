@include('frontend.include.header')
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <style>
            .promoting-table{
                border: 1px solid;
                margin-top: 1rem;
            }
            .promoting-table th{
                border-right: 1px solid;
                font-size: 20px;
                text-align: center;
            }
            .promoting-table td{
                border-right: 1px solid;
                text-align: center;
                vertical-align: middle;
                font-weight: 500;
            }
            .promoting-table td:nth-child(5){
                text-align: left;
            }
            .promoting-table td img{
                width: 250px;
                box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            }
        </style>
    </head>
<body>

    <section class="banner-menu mob-inner-height lp-banner-height" style="background-color: #000;padding-top: 140px;">
            <img src="{{asset('university/countries/uk/uk-banner.PNG')}}" alt="banner-img" class="desktop-view-only w-100">
    </section>

    <section class="promoting-university_main">
        <div class="container-fluid">
            <div class="table-responsive">
                <table class="table promoting-table">
                    <thead>
                        <tr>
                            <th scope="col">Sr. No.</th>
                            <th scope="col">Name Of University</th>
                            <th scope="col">City</th>
                            <th scope="col">Intake</th>
                            <th scope="col">UPS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <td scope="row">1.</td>
                            <td><img src="{{asset('university/countries/uk/abertay.PNG')}}" alt=""></td>
                            <td>Scotland</td>
                            <td>Jan,Sep</td>
                            <td>
                                <ul>
                                    <li>Offer Letter Within 2 week</li>
                                    <li>IELTS Min Requirement Overall 6 with one Modules 5.5</li>
                                    <li>Waiver for CBSE and ICSC Board required 70% In English</li>
                                    <li>Academic Need 60%</li>
                                </ul>
                            </td>
                        </tr>
                        <tr class="">
                            <td scope="row">2.</td>
                            <td><img src="{{asset('university/countries/uk/solent.PNG')}}" alt=""></td>
                            <td>England</td>
                            <td>Jan,june,Sep</td>
                            <td>
                                <ul>
                                    <li>Offer Letter Within 7 Working Days</li>
                                    <li>IELTS Min Requirement Overall 6 with one Modules 5.5</li>
                                    <li>Waiver for CBSE and ICSC Board required 70% In English</li>
                                    <li>Academic Need 60%</li>
                                </ul>
                            </td>
                        </tr>
                        <tr class="">
                            <td scope="row">3.</td>
                            <td><img src="{{asset('university/countries/uk/west-england.PNG')}}" alt=""></td>
                            <td>England</td>
                            <td>Jan,Sep</td>
                            <td>
                                <ul>
                                    <li>Offer Letter Within 10 Working Days</li>
                                    <li>IELTS Min Requirement Overall 6 with one Modules 5.5</li>
                                    <li>Waiver for CBSE and ICSC Board required 70% In English</li>
                                    <li>Academic Need 60%</li>
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
        </div>
    </section>


    @include('frontend.include.footer')


    <script src="/assets/33d5fb32/jquery.js?v=1668973180"></script>
    <script src="/assets/e27e1803/yii.js?v=1668973180"></script>
    <script src="/assets/e27e1803/yii.activeForm.js?v=1668973180"></script>
    <script>jQuery(function ($) {
            jQuery('#w0').yiiActiveForm([], []);
            jQuery('#w1').yiiActiveForm([], []);
        });</script>
</body>

</html>