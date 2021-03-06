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

        <div class="md-card">
            <div class="md-card-content large-padding">
                <a href="{{ route('login') }}" class="uk-position-top-right uk-close uk-margin-right uk-margin-top back_to_login"></a>
                <h2 class="heading_a uk-margin-large-bottom">Reset password</h2>

                <form action="{{ route('password.request') }}" method="post">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="uk-form-row">
                        <label for="login_email_reset">E-mail Address</label>
                        <input class="md-input {{ $errors->has('email') ? ' md-input-danger' : '' }}" type="text" name="email" value="{{ $email or old('email') }}" required autofocus/>

                        @if ($errors->has('email'))
                            <label class="uk-text-danger">
                                {{ $errors->first('email') }}
                            </label>
                        @endif
                    </div>

                    <div class="uk-form-row">
                        <label for="login_email_reset">Password</label>
                        <input class="md-input {{ $errors->has('password') ? ' md-input-danger' : '' }}" type="password" name="password" required/>

                        @if ($errors->has('password'))
                            <label class="uk-text-danger">
                                {{ $errors->first('password') }}
                            </label>
                        @endif
                    </div>

                    <div class="uk-form-row">
                        <label for="login_email_reset">Confirm Password</label>
                        <input class="md-input {{ $errors->has('password_confirmation') ? ' md-input-danger' : '' }}" type="password" name="password_confirmation" required/>

                        @if ($errors->has('password_confirmation'))
                            <label class="uk-text-danger">
                                {{ $errors->first('password_confirmation') }}
                            </label>
                        @endif
                    </div>

                    <div class="uk-margin-medium-top">
                        <button type="submit" class="md-btn md-btn-primary md-btn-block">
                            Reset password
                        </button>
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

</body>
</html>
