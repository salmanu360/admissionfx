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
            <img src="{{asset('university/countries/usa/usa-banner.png')}}" alt="banner-img" class="desktop-view-only w-100">
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
                            <td><img src="{{asset('university/countries/usa/bay-atlantic.PNG')}}" alt=""></td>
                            <td>Washington, D.C.</td>
                            <td>Jan,May,Sep</td>
                            <td>
                                <ul>
                                    <li>Smooth Process to USA</li>
                                </ul>
                            </td>
                        </tr>
                        <tr class="">
                            <td scope="row">2.</td>
                            <td><img src="{{asset('university/countries/usa/coe.PNG')}}" alt=""></td>
                            <td>Iowa</td>
                            <td>Jan,Sep</td>
                            <td>
                                <ul>
                                    <li>Smooth Process to USA</li>
                                </ul>
                            </td>
                        </tr>
                        <tr class="">
                            <td scope="row">3.</td>
                            <td><img src="{{asset('university/countries/usa/community-college.PNG')}}" alt=""></td>
                            <td>Pennsylvania</td>
                            <td>Jan,Sep</td>
                            <td>
                                <ul>
                                    <li>Smooth Process to USA</li>
                                </ul>
                            </td>
                        </tr>
                        <tr class="">
                            <td scope="row">4.</td>
                            <td><img src="{{asset('university/countries/usa/community-spokane.PNG')}}" alt=""></td>
                            <td>Washington</td>
                            <td>Jan,May,Sep</td>
                            <td>
                                <ul>
                                    <li>Smooth Process to USA</li>
                                </ul>
                            </td>
                        </tr>
                        <tr class="">
                            <td scope="row">5.</td>
                            <td><img src="{{asset('university/countries/usa/edgewood.PNG')}}" alt=""></td>
                            <td>Wisconsin</td>
                            <td>Jan,May,Sep</td>
                            <td>
                                <ul>
                                    <li>Smooth Process to USA</li>
                                </ul>
                            </td>
                        </tr>
                        <tr class="">
                            <td scope="row">6.</td>
                            <td><img src="{{asset('university/countries/usa/fox-wally.PNG')}}" alt=""></td>
                            <td>Wisconsin</td>
                            <td>Jan,Sep</td>
                            <td>
                                <ul>
                                    <li>Smooth Process to USA</li>
                                </ul>
                            </td>
                        </tr>
                        <tr class="">
                            <td scope="row">7.</td>
                            <td><img src="{{asset('university/countries/usa/glasgow.PNG')}}" alt=""></td>
                            <td>New York</td>
                            <td>Jan,Sep</td>
                            <td>
                                <ul>
                                    <li>Smooth Process to USA</li>
                                </ul>
                            </td>
                        </tr>
                        <tr class="">
                            <td scope="row">8.</td>
                            <td><img src="{{asset('university/countries/usa/hanover.PNG')}}" alt=""></td>
                            <td>Indiana</td>
                            <td>Jan,May,Sep</td>
                            <td>
                                <ul>
                                    <li>Smooth Process to USA</li>
                                </ul>
                            </td>
                        </tr>
                        <tr class="">
                            <td scope="row">9.</td>
                            <td><img src="{{asset('university/countries/usa/hartwick.PNG')}}" alt=""></td>
                            <td>New York</td>
                            <td>Jan,May,Sep</td>
                            <td>
                                <ul>
                                    <li>Smooth Process to USA</li>
                                </ul>
                            </td>
                        </tr>
                        <tr class="">
                            <td scope="row">10.</td>
                            <td><img src="{{asset('university/countries/usa/hawaii-pacific.PNG')}}" alt=""></td>
                            <td>Hawaii</td>
                            <td>Jan,Sep</td>
                            <td>
                                <ul>
                                    <li>Smooth Process to USA</li>
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