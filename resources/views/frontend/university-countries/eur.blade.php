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
            <img src="{{asset('university/countries/eur/eur-banner.PNG')}}" alt="banner-img" class="desktop-view-only w-100">
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
                            <td><img src="{{asset('university/countries/eur/avicenna.PNG')}}" alt=""></td>
                            <td>Budapest</td>
                            <td>Jan,Sep</td>
                            <td>
                                <ul>
                                    <li>Offer Letter within 2-3 Working Days</li>
                                </ul>
                            </td>
                        </tr>
                        <tr class="">
                            <td scope="row">2.</td>
                            <td><img src="{{asset('university/countries/eur/xenophon.PNG')}}" alt=""></td>
                            <td>Budapest</td>
                            <td>Rolling</td>
                            <td>
                                <ul>
                                    <li>Offer Letter within 2-3 Working Days</li>
                                </ul>
                            </td>
                        </tr>
                        <tr class="">
                            <td scope="row">3.</td>
                            <td><img src="{{asset('university/countries/eur/swiss-school.PNG')}}" alt=""></td>
                            <td>Budapest</td>
                            <td>Rolling</td>
                            <td>
                                <ul>
                                    <li>Offer Letter within 2-3 Working Days</li>
                                </ul>
                            </td>
                        </tr>
                        <tr class="">
                            <td scope="row">4.</td>
                            <td><img src="{{asset('university/countries/eur/turiba.PNG')}}" alt=""></td>
                            <td>Budapest</td>
                            <td>Rolling</td>
                            <td>
                                <ul>
                                    <li>Offer Letter within 2-3 Working Days</li>
                                </ul>
                            </td>
                        </tr>
                        <tr class="">
                            <td scope="row">5.</td>
                            <td><img src="{{asset('university/countries/eur/pecs.PNG')}}" alt=""></td>
                            <td>Pecs</td>
                            <td>Rolling</td>
                            <td>
                                <ul>
                                    <li>Offer Letter within 2-3 Working Days</li>
                                </ul>
                            </td>
                        </tr>
                        <tr class="">
                            <td scope="row">6.</td>
                            <td><img src="{{asset('university/countries/eur/transport.PNG')}}" alt=""></td>
                            <td>Riga</td>
                            <td>Rolling</td>
                            <td>
                                <ul>
                                    <li>Offer Letter within 2-3 Working Days</li>
                                </ul>
                            </td>
                        </tr>
                        <tr class="">
                            <td scope="row">7.</td>
                            <td><img src="{{asset('university/countries/eur/ecotur.PNG')}}" alt=""></td>
                            <td>Valencia</td>
                            <td>Rolling</td>
                            <td>
                                <ul>
                                    <li>Offer Letter within 2-3 Working Days</li>
                                </ul>
                            </td>
                        </tr>
                        <tr class="">
                            <td scope="row">8.</td>
                            <td><img src="{{asset('university/countries/eur/eie.PNG')}}" alt=""></td>
                            <td>St. Julian's</td>
                            <td>Rolling</td>
                            <td>
                                <ul>
                                    <li>Offer Letter within 2-3 Working Days</li>
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