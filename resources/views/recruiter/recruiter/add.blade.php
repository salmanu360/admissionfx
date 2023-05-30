@extends('recruiter.master')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('modern-light-menu/plugins/select2/select2.min.css')}}">
@endsection
@section('content')
    <div class="page-header">
        <div class="page-title">
            <h3>Add Recruiter</h3>
        </div>
        <div class="dropdown filter custom-dropdown-icon">
            <a href="{{route('rec.index')}}">
                <button class="btn btn-success"><i class="fa-solid fa-eye"></i> View Recruiter</button>
            </a>
        </div>
    </div>

    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
            @include('admin.partials._message')
            <form action="{{route('rec.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div id="form-wizard" class="sw-main sw-theme-default">
                    <div class="sw-container tab-content" style="min-height: 0px;">
                            <div class="border-bottom border-gray pb-2"></div>
                            <div class="fields_container" data-rows-limit="-1">
                                <div class="form-group field-recruitersform-company_name required">
                                    <label class="form-label" for="recruitersform-company_name">Company Name</label>
                                    <input type="text" id="recruitersform-company_name" class="form-control "
                                           name="company_name" value="{{old('company_name')}}">
                                </div>
                                <div class="form-group field-recruitersform-email required">
                                    <label class="form-label" for="recruitersform-email">Email</label>
                                    <input type="text" id="recruitersform-email" class="form-control" value="{{old('email')}}" name="email">

                                </div>
                                <div class="form-group field-recruitersform-website">
                                    <label class="form-label" for="recruitersform-website">Website</label>
                                    <input type="text" id="recruitersform-website" class="form-control" value="{{old('website')}}" name="website">
                                </div>
                                <div class="form-group field-recruitersform-facebook_page">
                                    <label for="recruitersform-facebook_page">Facebook Page Name</label>
                                    <input type="text" id="recruitersform-facebook_page" class="form-control"
                                           name="facebook" value="{{old('facebook')}}" placeholder="e.g. www.facebook.com/universitybureau">

                                </div>
                                <div class="form-group field-recruitersform-instagram_handle">
                                    <label for="recruitersform-instagram_handle">Instagram Handle</label>
                                    <input type="text" id="recruitersform-instagram_handle" class="form-control"
                                           name="instagram" value="{{old('instagram')}}" placeholder="e.g. @universitybureau">

                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="form-group field-recruitersform-twitter_handle">
                                    <label for="recruitersform-twitter_handle">Twitter Handle</label>
                                    <input type="text" id="recruitersform-twitter_handle" class="form-control"
                                           name="twitter" value="{{old('twitter')}}" placeholder="e.g. @universitybureau">
                                </div>
                                <div class="form-group field-recruitersform-linked_url">
                                    <label for="recruitersform-linked_url">Linkedin URL</label>
                                    <input type="text" id="recruitersform-linked_url" class="form-control"
                                           name="linkedIn" value="{{old('linkedIn')}}" placeholder="e.g. www.linkedin.com/company/universitybureau">
                                </div>
                            </div>

                            <div class="border-bottom border-gray pb-2"></div>
                            <div class="fields_container" data-rows-limit="-1">
                                <div class="form-group field-main-source required">
                                    <label for="main-source">Main Source of Students</label>
                                    <select id="main-source" name="student_source" class="form-control basic">
                                        <option value="">Select Country</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antarctica">Antarctica</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Bouvet Island">Bouvet Island</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cote D'ivoire">Cote D'ivoire</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Territories">French Southern Territories</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-bissau">Guinea-bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                        <option value="Korea, Republic of">Korea, Republic of</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macao">Macao</option>
                                        <option value="North Macedonia">North Macedonia</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                        <option value="Moldova, Republic of">Moldova, Republic of</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Pitcairn">Pitcairn</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russian Federation">Russian Federation</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Helena">Saint Helena</option>
                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                        <option value="Saint Lucia">Saint Lucia</option>
                                        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                        <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Serbia and Montenegro">Serbia and Montenegro</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                        <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Timor-leste">Timor-leste</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Viet Nam">Viet Nam</option>
                                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                                        <option value="Western Sahara">Western Sahara</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>
                                <div class="form-group field-recruitersform-owner_first_name required">
                                    <label class="form-label" for="recruitersform-owner_first_name">Owner's First Name</label>
                                    <input type="text" id="recruitersform-owner_first_name" class="form-control"
                                           name="first_name" value="{{old('first_name')}}">
                                </div>
                                <div class="form-group field-recruitersform-owner_last_name required">
                                    <label class="form-label" for="recruitersform-owner_last_name">Owner's Last Name</label>
                                    <input type="text" id="recruitersform-owner_last_name" class="form-control"
                                           name="last_name" value="{{old('last_name')}}">
                                </div>
                                <div class="form-group field-recruitersform-street_address required">
                                    <label class="form-label" for="recruitersform-street_address">Street Address</label>
                                    <input type="text" id="recruitersform-street_address" class="form-control"
                                           name="address" value="{{old('address')}}">
                                </div>
                                <div class="form-group field-recruitersform-city required">
                                    <label class="form-label" for="recruitersform-city">City</label>
                                    <input type="text" id="recruitersform-city" class="form-control"
                                           name="city" value="{{old('city')}}">
                                </div>
                                <div class="form-group field-recruitersform-state">
                                    <label class="form-label" for="recruitersform-state">State/Province</label>
                                    <input type="text" id="recruitersform-state" class="form-control"
                                           name="state" value="{{old('state')}}">
                                </div>
                                <div class="form-group field-country required">
                                    <label for="country">Country</label>
                                    <select id="country" name="country" class="form-control basic">
                                        <option value="">Select Country</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antarctica">Antarctica</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Bouvet Island">Bouvet Island</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cote D'ivoire">Cote D'ivoire</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Territories">French Southern Territories</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-bissau">Guinea-bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                        <option value="Korea, Republic of">Korea, Republic of</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macao">Macao</option>
                                        <option value="North Macedonia">North Macedonia</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                        <option value="Moldova, Republic of">Moldova, Republic of</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Pitcairn">Pitcairn</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russian Federation">Russian Federation</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Helena">Saint Helena</option>
                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                        <option value="Saint Lucia">Saint Lucia</option>
                                        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                        <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Serbia and Montenegro">Serbia and Montenegro</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                        <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Timor-leste">Timor-leste</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Viet Nam">Viet Nam</option>
                                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                                        <option value="Western Sahara">Western Sahara</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>
                                <div class="form-group field-recruitersform-postal_code">
                                    <label class="form-label" for="recruitersform-postal_code">Postal Code</label>
                                    <input type="text" id="recruitersform-postal_code" class="form-control"
                                           name="postal_zip" value="{{old('postal_zip')}}">
                                </div>
                                <div class="form-group field-recruitersform-phone required">
                                    <label for="recruitersform-phone">Phone</label>
                                        <input type="tel" id="recruitersform-phone" class="form-control"
                                               name="phone" value="{{old('phone')}}"
                                               placeholder="(201) 555-0123">
                                </div>
                                <div class="form-group field-recruitersform-cellphone">
                                    <label for="recruitersform-cellphone">Cellphone</label>
                                        <input type="tel" id="recruitersform-cellphone" class="form-control"
                                               name="mobile" placeholder="(201) 555-0123" value="{{old('mobile')}}">
                                </div>
                                <div class="form-group field-recruitersform-sky_id">
                                    <label class="form-label" for="recruitersform-sky_id">Skype ID</label>
                                    <input type="text" id="recruitersform-sky_id" class="form-control"
                                           name="skype" value="{{old('skype')}}">
                                </div>
                                <div class="form-group field-recruitersform-whatsapp_id">
                                    <label class="form-label" for="recruitersform-whatsapp_id">Whatsapp ID</label>
                                    <input type="text" id="recruitersform-whatsapp_id" class="form-control"
                                           name="whatsapp" value="{{old('whatsapp')}}">
                                </div>
                                <div class="form-group field-recruitersform-refer_name">
                                    <label class="form-label" for="recruitersform-refer_name">Has anyone from University
                                        Bureau helped or referred you? If yes, who?</label>
                                    <input type="text" id="recruitersform-refer_name" class="form-control"
                                           name="referred" value="{{old('referred')}}">
                                </div>
                            </div>


                            <div class="border-bottom border-gray pb-2"></div>
                            <div class="fields_container" data-rows-limit="-1">
                                <div class="form-group field-recruitersform-begin_rec_time">
                                    <label class="form-label" for="recruitersform-begin_rec_time">When did you begin
                                        recruiting students?</label>
                                    <input type="date" id="recruitersform-begin_rec_time" class="form-control"
                                           name="recruiting_from_date" value="{{old('recruiting_from_date')}}">
                                </div>
                                <div class="form-group field-recruitersform-client_service">
                                    <label for="recruitersform-client_service">What services do you provide to your
                                        clients?</label>
                                    <textarea id="recruitersform-client_service" class="form-control"
                                              name="services" rows="2" cols="25">{{old('services')}}</textarea>
                                </div>
                                <div class="form-group field-recruitersform-rep_students required">
                                    <label></label>
                                    <div id="recruitersform-rep_students">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" id="i0" class="custom-control-input"
                                                   name="students_from[]" value="canada">
                                            <label class="custom-control-label" for="i0">Canadian Schools Represented</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" id="i1" class="custom-control-input"
                                                   name="students_from[]" value="america">
                                            <label class="custom-control-label" for="i1">American Schools
                                                Represented</label>
                                        </div>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" id="i2" class="custom-control-input"
                                                   name="students_from[]" value="other">
                                            <label class="custom-control-label" for="i2">Represents Other
                                                Countries</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group field-recruitersform-inst_rep">
                                    <label for="recruitersform-inst_rep">What institutions are you representing?</label>
                                    <textarea id="recruitersform-inst_rep" class="form-control"
                                              name="institute" rows="2" cols="25" >{{old('institute')}}</textarea>
                                </div>
                                <div class="form-group field-recruitersform-edu_org_bl">
                                    <label for="recruitersform-edu_org_bl">What educational associations or groups does
                                        your organization belong to?</label>
                                    <textarea id="recruitersform-edu_org_bl" class="form-control"
                                              name="associations" rows="2" cols="25">{{old('associations')}}</textarea>
                                </div>
                                <div class="form-group field-recruit-from">
                                    <label for="recruit-from">Where do you recruit from?</label>
                                    <select id="recruit-from" class="form-control basic"
                                            name="recruiting_from_country" >
                                        <option value="">Select Country</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antarctica">Antarctica</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Bouvet Island">Bouvet Island</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cote D'ivoire">Cote D'ivoire</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Territories">French Southern Territories</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-bissau">Guinea-bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                        <option value="Korea, Republic of">Korea, Republic of</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macao">Macao</option>
                                        <option value="North Macedonia">North Macedonia</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                        <option value="Moldova, Republic of">Moldova, Republic of</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Pitcairn">Pitcairn</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russian Federation">Russian Federation</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Helena">Saint Helena</option>
                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                        <option value="Saint Lucia">Saint Lucia</option>
                                        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                        <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Serbia and Montenegro">Serbia and Montenegro</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                        <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Timor-leste">Timor-leste</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Viet Nam">Viet Nam</option>
                                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                                        <option value="Western Sahara">Western Sahara</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>
                                <div class="form-group field-recruitersform-stu_abroad_year">
                                    <label>Approximately how many students do you send abroad per year?</label>
                                    <div id="recruitersform-stu_abroad_year" role="radiogroup">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="i3" class="custom-control-input"
                                                   name="students_per_year" value="1-5">
                                            <label class="custom-control-label" for="i3">1 - 5</label>
                                        </div>

                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="i4" class="custom-control-input"
                                                   name="students_per_year" value="6-20">
                                            <label class="custom-control-label" for="i4">6 - 20</label>
                                        </div>

                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="i5" class="custom-control-input"
                                                   name="students_per_year" value="21-50">
                                            <label class="custom-control-label" for="i5">21 - 50</label>
                                        </div>

                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="i6" class="custom-control-input"
                                                   name="students_per_year" value="51-250">
                                            <label class="custom-control-label" for="i6">51 - 250</label>
                                        </div>

                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="i7" class="custom-control-input"
                                                   name="students_per_year" value="251+">
                                            <label class="custom-control-label" for="i7">251+</label>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group field-market-methods">
                                    <label for="market-methods">What type of marketing methods do you undertake?</label>
                                   <select id="market-methods" class="form-control tagging"
                                            name="marketing[]" multiple="multiple">
                                        <option value="Online Advertising">Online Advertising</option>
                                        <option value="Education Fairs">Education Fairs</option>
                                        <option value="Workshops">Workshops</option>
                                        <option value="Sub-Agent Network">Sub-Agent Network</option>
                                        <option value="Newspaper and Magazine Advertising">Newspaper and Magazine Advertising</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group field-recruitersform-aver_service_fee required">
                                    <label>Average Service Fee</label>
                                    <div id="recruitersform-aver_service_fee" role="radiogroup" aria-required="true">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="i8" class="custom-control-input"
                                                   name="service_fee" value="0-200">
                                            <label class="custom-control-label" for="i8">₹0 - ₹200</label>
                                        </div>

                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="i9" class="custom-control-input"
                                                   name="service_fee" value="200-500">
                                            <label class="custom-control-label" for="i9">₹200 - ₹500</label>
                                        </div>

                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="i10" class="custom-control-input"
                                                   name="service_fee" value="500-1000">
                                            <label class="custom-control-label" for="i10">₹500 - ₹1000</label>
                                        </div>

                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="i11" class="custom-control-input"
                                                   name="service_fee" value="1000-2500">
                                            <label class="custom-control-label" for="i11">₹1000 - ₹2500</label>
                                        </div>

                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="i12" class="custom-control-input"
                                                   name="service_fee" value="2500+">
                                            <label class="custom-control-label" for="i12">₹2500+</label>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group field-recruitersform-refer_stu_univer">
                                    <label>Please provide an estimate of the number of students you will refer to
                                        University Bureau.</label>
                                    <div id="recruitersform-refer_stu_univer" role="radiogroup">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="i13" class="custom-control-input"
                                                   name="refer_student_bureau" value="1-5">
                                            <label class="custom-control-label" for="i13">1 - 5</label>
                                        </div>

                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="i14" class="custom-control-input"
                                                   name="refer_student_bureau" value="6-20">
                                            <label class="custom-control-label" for="i14">6 - 20</label>
                                        </div>

                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="i15" class="custom-control-input"
                                                   name="refer_student_bureau" value="21-50">
                                            <label class="custom-control-label" for="i15">21 - 50</label>
                                        </div>

                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="i16" class="custom-control-input"
                                                   name="refer_student_bureau" value="51-250">
                                            <label class="custom-control-label" for="i16">51 - 250</label>
                                        </div>

                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="i17" class="custom-control-input"
                                                   name="refer_student_bureau" value="251+">
                                            <label class="custom-control-label" for="i17">251+</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group field-recruitersform-add_comment">
                                    <label for="recruitersform-add_comment">Additional Comments</label>
                                    <textarea id="recruitersform-add_comment" class="form-control"
                                              name="comments" rows="2" cols="25">{{old('comments')}}</textarea>
                                </div>
                                <div class="form-group field-recruitersform-refrence_name">
                                    <label class="form-label" for="recruitersform-refrence_name">Reference Name</label>
                                    <input type="text" id="recruitersform-refrence_name" class="form-control"
                                           name="reference_name" value="{{old('reference_name')}}">
                                </div>
                                <div class="form-group field-recruitersform-ref_stu_name">
                                    <label class="form-label" for="recruitersform-ref_stu_name">Reference Institution Name</label>
                                    <input type="text" id="recruitersform-ref_stu_name" class="form-control"
                                           name="reference_institution" value="{{old('reference_institution')}}">
                                </div>
                                <div class="form-group field-recruitersform-ref_business_email">
                                    <label class="form-label" for="recruitersform-ref_business_email">Reference Institution Email</label>
                                    <input type="text" id="recruitersform-ref_business_email" class="form-control"
                                           name="reference_institution_email" value="{{old('reference_institution_email')}}">
                                </div>
                                <div class="form-group field-recruitersform-ref_phone">
                                    <label for="recruitersform-ref_phone">Reference Institution Phone</label>
                                        <input type="number" id="recruitersform-ref_phone" class="form-control"
                                               name="reference_institution_contact"
                                               placeholder="(201) 555-0123" value="{{old('reference_institution_contact')}}">
                                </div>
                                <div class="form-group field-recruitersform-ref_website">
                                    <label class="form-label" for="recruitersform-ref_website">Reference Website</label>
                                    <input type="text" id="recruitersform-ref_website" class="form-control"
                                           name="reference_institution_website" value="{{old('reference_institution_website')}}">
                                </div>
                                <div class="form-group field-recruitersform-comp_logo">
                                    <label for="recruitersform-comp_logo">Company Logo</label>
                                    <input type="file" id="recruitersform-comp_logo" class="form-control-file" name="company_logo">
                                </div>
                                <div class="form-group field-recruitersform-bus_certificate">
                                    <label for="recruitersform-bus_certificate">Business Certificate</label>
                                    <input type="file" id="recruitersform-bus_certificate" class="form-control-file" name="business_certificate">
                                </div>
                                <div class="form-group field-recruitersform-confirmation">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="recruitersform-confirmation"
                                                class="custom-control-input" name="declare_confirm"
                                                value="1" checked="checked">
                                        <label class="custom-control-label" for="recruitersform-confirmation">I declare
                                            that the information contained in this application and all supporting
                                            documentation is true and correct.</label>

                                    </div>
                                </div>
                                <div class="form-group field-recruitersform-acceptance required">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" id="recruitersform-acceptance"
                                                class="custom-control-input" name="terms_conditions" value="1"
                                                checked="checked" >
                                        <label class="custom-control-label" for="recruitersform-acceptance">I have read
                                            and accept <a href="#"> Terms and Conditions </a>
                                            and <a href="#"> Privacy Policy </a>.</label>
                                    </div>
                                </div>
                                <div class="form-group ">
                                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                                </div>
                            </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection

@section('js')
    <script src="{{asset('modern-light-menu/plugins/flatpickr/flatpickr.js')}}"></script>
    <script src="{{asset('modern-light-menu/plugins/flatpickr/custom-flatpickr.js')}}"></script>
    <script src="{{asset('modern-light-menu/plugins/select2/select2.min.js')}}"></script>
    <script src="{{asset('modern-light-menu/plugins/select2/custom-select2.js')}}"></script>
    <script>
        $(".tagging").select2({
            tags: true
        });

        $(".basic").select2({
            tags: true,
        });
    </script>
@endsection