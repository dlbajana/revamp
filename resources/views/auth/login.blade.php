<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="icon" type="image/png" href="/img/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="/img/favicon-32x32.png" sizes="32x32">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>

    <!-- uikit -->
    <link rel="stylesheet" href="/bower_components/uikit/css/uikit.almost-flat.min.css"/>

    <!-- altair admin login page -->
    <link rel="stylesheet" href="/css/login_page.min.css" />

</head>
<body class="login_page">

    <div class="login_page_wrapper">
        <div class="md-card" id="login_card">
            <div class="md-card-content large-padding" id="login_form">
                <div class="login_heading">
                    <div class="user_avatar"></div>
                </div>
                <form action="{{ route('login') }}" method="post">
                    {{ csrf_field() }}

                    <div class="uk-form-row">
                        <label for="username">Username</label>
                        <input class="md-input {{ $errors->has('username') ? ' md-input-danger' : '' }}" type="text" id="username" name="username" value="{{ old('username') }}"/>
                        @if ($errors->has('username'))
                            <label class="uk-text-danger">{{ $errors->first('username') }}</label>
                        @endif
                    </div>
                    <div class="uk-form-row">
                        <label for="password">Password</label>
                        <input class="md-input {{ $errors->has('password') ? ' md-input-danger' : '' }}" type="password" id="password" name="password" />
                        @if ($errors->has('password'))
                            <label class="uk-text-danger">{{ $errors->first('password') }}</label>
                        @endif
                    </div>
                    <div class="uk-margin-medium-top">
                        <button type="submit" class="md-btn md-btn-primary md-btn-block md-btn-large">Sign In</button>
                    </div>
                    <div class="uk-margin-top">
                        <a href="#" id="login_help_show" class="uk-float-right">Need help?</a>
                        <span class="icheck-inline">
                            <input type="checkbox" name="login_page_stay_signed" id="login_page_stay_signed" data-md-icheck />
                            <label for="login_page_stay_signed" class="inline-label">Stay signed in</label>
                        </span>
                    </div>
                </form>
            </div>
            <div class="md-card-content large-padding uk-position-relative" id="login_help" style="display: none">
                <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
                <h2 class="heading_b uk-text-success">Can't log in?</h2>
                <p>Here’s the info to get you back in to your account as quickly as possible.</p>
                <p>First, try the easiest thing: if you remember your password but it isn’t working, make sure that Caps Lock is turned off, and that your username is spelled correctly, and then try again.</p>
                <p>If your password still isn’t working, it’s time to <a href="{{ route('password.request') }}" >reset your password</a>.</p>
            </div>
            <div class="md-card-content large-padding" id="login_password_reset" style="display: none">
                <button type="button" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></button>
                <h2 class="heading_a uk-margin-large-bottom">Reset password</h2>
                <form>
                    <div class="uk-form-row">
                        <label for="login_email_reset">Your email address</label>
                        <input class="md-input" type="text" id="login_email_reset" name="login_email_reset" />
                    </div>
                    <div class="uk-margin-medium-top">
                        <a href="index.html" class="md-btn md-btn-primary md-btn-block">Reset password</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- common functions -->
    <script src="/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="/js/uikit_custom.min.js"></script>
    <!-- altair core functions -->
    <script src="/js/altair_admin_common.min.js"></script>

    <script>
        $(function() {
            // login_page
            altair_login_page.init();
        });

        // variables
        var $login_card = $('#login_card'),
            $login_form = $('#login_form'),
            $login_help = $('#login_help'),
            $register_form = $('#register_form'),
            $login_password_reset = $('#login_password_reset');

        altair_login_page = {
            init: function () {
                // show login form (hide other forms)
                var login_form_show = function() {
                    $login_form
                        .show()
                        .siblings()
                        .hide();
                };

                // show register form (hide other forms)
                var register_form_show = function() {
                    $register_form
                        .show()
                        .siblings()
                        .hide();
                };

                // show login help (hide other forms)
                var login_help_show = function() {
                    $login_help
                        .show()
                        .siblings()
                        .hide();
                };

                // show password reset form (hide other forms)
                var password_reset_show = function() {
                    $login_password_reset
                        .show()
                        .siblings()
                        .hide();
                };

                $('#login_help_show').on('click',function(e) {
                    e.preventDefault();
                    // card animation & complete callback: login_help_show
                    altair_md.card_show_hide($login_card,undefined,login_help_show,undefined);
                });

                $('#signup_form_show').on('click',function(e) {
                    e.preventDefault();
                    $(this).fadeOut('280');
                    // card animation & complete callback: register_form_show
                    altair_md.card_show_hide($login_card,undefined,register_form_show,undefined);
                });

                $('.back_to_login').on('click',function(e) {
                    e.preventDefault();
                    $('#signup_form_show').fadeIn('280');
                    // card animation & complete callback: login_form_show
                    altair_md.card_show_hide($login_card,undefined,login_form_show,undefined);
                });

                $('#password_reset_show').on('click',function(e) {
                    e.preventDefault();
                    // card animation & complete callback: password_reset_show
                    altair_md.card_show_hide($login_card,undefined,password_reset_show,undefined);
                });


            }
        };
    </script>

</body>
</html>
