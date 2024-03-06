<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Authentication</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="{{url('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/plugins/perfectscroll/perfect-scrollbar.css')}}" rel="stylesheet">
    <link href="{{url('assets/plugins/pace/pace.css')}}" rel="stylesheet">
    <link href="{{url('assets/plugins/highlight/styles/github-gist.css')}}" rel="stylesheet">
    <link href="{{url('assets/plugins/datatables/datatables.min.css')}}" rel="stylesheet">

    <!-- Theme Styles -->
    <link href="{{asset('assets')}}/css/main.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/css/horizontal-menu/horizontal-menu.css" rel="stylesheet">
    <link href="{{asset('assets')}}/css/custom.css" rel="stylesheet">

    <link href="{{asset('assets')}}/css/darktheme.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="{{url('assets/images/neptune.png')}}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('assets/images/neptune.png')}}" />

    <!-- <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script> -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js')}}"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
    <![endif]-->
</head>


<body>
    <div class="app horizontal-menu app-auth-sign-up align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background">

        </div>
        <div class="app-auth-container">
            <div class="logo">
                <a href="index.html">Neptune</a>
            </div>
            <p class="auth-description">Please enter your credentials to create an account.<br>Already have an account? <br><a href="{{ route('login.index') }}">Sign In</a></p>
            <form method="post" action="{{ route('register.perform') }}">
                @csrf
                <div class="auth-credentials m-b-xxl">
                    <label for="signUpUsername" class="form-label">Username</label>
                    <input type="text" name="name" class="form-control m-b-md" id="signUpUsername" aria-describedby="signUpUsername" placeholder="Enter username" required="required">

                    <label for="signUpEmail" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control m-b-md" id="signUpEmail" aria-describedby="signUpEmail" placeholder="example@neptune.com" required="required">

                    <label for="signUpPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="signUpPassword" aria-describedby="signUpPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" required="required">
                    <div id="emailHelp" class="form-text">Password must be minimum 8 characters length*</div>
                    <br>
                    <label for="signUpPassword" class="form-label">Password Verification</label>
                    <input type="password" name="password_verification" class="form-control" id="signUpPassword" aria-describedby="signUpPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" required="required">
                </div>

                <div class="auth-submit">
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </div>
            </form>
            <div class="divider"></div>
            <div class="auth-alts">
                <a href="#" class="auth-alts-google"></a>
                <a href="#" class="auth-alts-facebook"></a>
                <a href="#" class="auth-alts-twitter"></a>
            </div>
        </div>
    </div>

    <!-- Javascripts -->
    <script src="{{url('assets/plugins/jquery/jquery-3.5.1.min.js')}}"></script>
    <script src="{{url('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{url('assets/plugins/perfectscroll/perfect-scrollbar.min.js')}}"></script>
    <script src="{{url('assets/plugins/pace/pace.min.js')}}"></script>
    <script src="{{url('assets/js/main.min.js')}}"></script>
    <script src="{{url('assets/js/custom.js')}}"></script>
</body>

</html>