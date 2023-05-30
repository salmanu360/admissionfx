

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>GrabVisa Admin Login</title>
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

                        <p style="font-size:20px;">This is a secure area of the admin. Please confirm your password before continuing.</p>
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <form method="POST" action="{{ route('admin.password.confirm') }}" class="text-left">
                            @csrf
                            <div class="form">


                                <div id="password-field" class="field-wrapper input mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Password" required autocomplete="current-password" />
                                    
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary btn-block" value="">Confirm</button>
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


