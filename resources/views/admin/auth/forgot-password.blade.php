

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>GrabVisa Forget Password</title>
    <link rel="icon" type="image/x-icon" href="{{asset('modern-light-menu/assets/img/favicon.ico')}}"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{asset('modern-light-menu/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('modern-light-menu/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('modern-light-menu/assets/css/authentication/form-1.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('modern-light-menu/assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('modern-light-menu/assets/css/forms/switches.css')}}">
</head>
<body class="form">
    
<!--{{asset('modern-light-menu/')}}-->
    <div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">
                        <h1><a href="/"><span class="brand-name">Password Recovery</span></a></h1>
                        <p class=""><b>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</b></p>
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        
                       <form method="POST" action="{{ route('admin.password.email') }}" class="text-left">
                           @csrf
                            <div class="form">

                                <div id="email-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                    <input id="email" name="email" type="text" value="" placeholder="Email">
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value="">{{ __('Email Password Reset Link') }}</button>
                                    </div>                                    
                                </div>

                            </div>
                        </form>                      

                    </div>                    
                </div>
            </div>
        </div>
        <div class="form-image">
            <div class="l-image">
            </div>
        </div>
    </div>

    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('modern-light-menu/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('modern-light-menu/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('modern-light-menu/bootstrap/js/bootstrap.min.js')}}"></script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('modern-light-menu/assets/js/authentication/form-1.js')}}"></script>

</body>
</html>


