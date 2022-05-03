<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* Base */

body,
body *:not(html):not(style):not(br):not(tr):not(code) {
    box-sizing: border-box;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif,
        'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
    position: relative;
}

body {
    -webkit-text-size-adjust: none;
    background-color: #ffffff;
    color: #718096;
    height: 100%;
    line-height: 1.4;
    margin: 0;
    padding: 0;
    width: 100% !important;
}

p,
ul,
ol,
blockquote {
    line-height: 1.4;
    text-align: left;
}

a {
    color: blue;
}

a img {
    border: none;
}

/* Typography */

h1 {
    color: #3d4852;
    font-size: 18px;
    font-weight: bold;
    margin-top: 0;
    text-align: left;
}

h2 {
    font-size: 16px;
    font-weight: bold;
    margin-top: 0;
    text-align: left;
}

h3 {
    font-size: 14px;
    font-weight: bold;
    margin-top: 0;
    text-align: left;
}

p {
    font-size: 16px;
    line-height: 1.5em;
    margin-top: 0;
    text-align: left;
}

p.sub {
    font-size: 12px;
}

img {
    max-width: 100%;
}

/* Layout */

.wrapper {
    -premailer-cellpadding: 0;
    -premailer-cellspacing: 0;
    -premailer-width: 100%;
    background-color: #edf2f7;
    margin: 0;
    padding: 0;
    width: 100%;
}

.content {
    -premailer-cellpadding: 0;
    -premailer-cellspacing: 0;
    -premailer-width: 100%;
    margin: 0;
    padding: 0;
    width: 100%;
}

/* Header */

.header {
    padding: 25px 0;
    text-align: center;
}

.header a {
    color: #3d4852;
    font-size: 19px;
    font-weight: bold;
    text-decoration: none;
}

/* Logo */

.logo {
    height: 75px;
    max-height: 75px;
    width: 75px;
}

/* Body */

.body {
    -premailer-cellpadding: 0;
    -premailer-cellspacing: 0;
    -premailer-width: 100%;
    background-color: #edf2f7;
    border-bottom: 1px solid #edf2f7;
    border-top: 1px solid #edf2f7;
    margin: 0;
    padding: 0;
    width: 100%;
}

.inner-body {
    -premailer-cellpadding: 0;
    -premailer-cellspacing: 0;
    -premailer-width: 570px;
    background-color: #ffffff;
    border-color: #e8e5ef;
    border-radius: 2px;
    border-width: 1px;
    box-shadow: 0 2px 0 rgba(0, 0, 150, 0.025), 2px 4px 0 rgba(0, 0, 150, 0.015);
    margin: 0 auto;
    padding: 0;
    width: 570px;
}

/* Subcopy */

.subcopy {
    border-top: 1px solid #e8e5ef;
    margin-top: 25px;
    padding-top: 25px;
}

.subcopy p {
    font-size: 14px;
}

/* Footer */

.footer {
    -premailer-cellpadding: 0;
    -premailer-cellspacing: 0;
    -premailer-width: 570px;
    margin: 0 auto;
    padding: 0;
    text-align: center;
    width: 570px;
}

.footer p {
    color: #b0adc5;
    font-size: 12px;
    text-align: center;
}

.footer a {
    color: #b0adc5;
    text-decoration: underline;
}

/* Tables */

.table table {
    -premailer-cellpadding: 0;
    -premailer-cellspacing: 0;
    -premailer-width: 100%;
    margin: 30px auto;
    width: 100%;
}

.table th {
    border-bottom: 1px solid #edeff2;
    margin: 0;
    padding-bottom: 8px;
}

.table td {
    color: #74787e;
    font-size: 15px;
    line-height: 18px;
    margin: 0;
    padding: 10px 0;
}

.content-cell {
    max-width: 100vw;
    padding: 32px;
}

/* Buttons */

.action {
    -premailer-cellpadding: 0;
    -premailer-cellspacing: 0;
    -premailer-width: 100%;
    margin: 30px auto;
    padding: 0;
    text-align: center;
    width: 100%;
}

.button {
    -webkit-text-size-adjust: none;
    border-radius: 4px;
    color: #fff;
    display: inline-block;
    overflow: hidden;
    text-decoration: none;
    font-color: white;
}

.button-blue,
.button-primary {
    background-color: #2d3748;
    border-bottom: 8px solid #2d3748;
    border-left: 18px solid #2d3748;
    border-right: 18px solid #2d3748;
    border-top: 8px solid #2d3748;
}

.button-green,
.button-success {
    background-color: #48bb78;
    border-bottom: 8px solid #48bb78;
    border-left: 18px solid #48bb78;
    border-right: 18px solid #48bb78;
    border-top: 8px solid #48bb78;
}

.button-red,
.button-error {
    background-color: #e53e3e;
    border-bottom: 8px solid #e53e3e;
    border-left: 18px solid #e53e3e;
    border-right: 18px solid #e53e3e;
    border-top: 8px solid #e53e3e;
}

/* Panels */

.panel {
    border-left: #2d3748 solid 4px;
    margin: 21px 0;
}

.panel-content {
    background-color: #edf2f7;
    color: #718096;
    padding: 16px;
}

.panel-content p {
    color: #718096;
}

.panel-item {
    padding: 0;
}

.panel-item p:last-of-type {
    margin-bottom: 0;
    padding-bottom: 0;
}

/* Utilities */

.break-all {
    word-break: break-all;
}
@media only screen and (max-width: 600px) {
.inner-body {
width: 100% !important;
}

.footer {
width: 100% !important;
}
}

    </style>
</head>
<body class="panel-content">
    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
        <td align="center">
        <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">

        </table>
        {{-- {{ $header ?? '' }} --}}

        <!-- Email Body -->
        <tr>
        <td class="body" width="100%" cellpadding="0" cellspacing="0">
        <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
        <!-- Body content -->
        <tr>
        <td class="content-cell">
            <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
                <h1>Greetings, {{ $user }} </h1>
                <p class="" style="font-size: 16px;">Your account has successfully registered to MyCICS Student Access Portal.</p>
                <p class="" style="font-size: 16px;">Attached here is your account access on MyCICS Student Access Portal.</p>
                <table class="panel" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                    <tr>
                    <td class="panel-content">
                    <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                    <tr>
                    <td class="panel-item">
                        <p class=""><strong>Account Credentials: </strong></p>
                        <p>Email: <strong>{{ $email }}</strong></p>
                        <p>Password: <strong>{{ $pass }}</strong></p>
                    </td>
                    </tr>
                    </table>
                    </td>
                    </tr>
                    </table>
                <table class="action" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                    <tr>
                    <td align="center">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
                    <tr>
                    <td align="center">
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation">
                    <tr>
                    <td>
                        <p class=""><strong>Please click the button below to login to your MyCICS Student Access Portal.</strong></p>
                    <a href="{{ route('login') }}" class="button button-{{ $color ?? 'primary' }}"> Click here to login</a>
                    </td>
                    </tr>
                    </table>
                    </td>
                    </tr>
                    </table>
                    </td>
                    </tr>
                </table>
            </table>
            <table class="subcopy" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                <tr>
                <td>
                    <p class=""><strong>Note: Please read Intructions carefully.</strong></p>
                    <p>• Keep this email for future purpose</p>
                    <p>• If you receive this email, Please do not reply. This is an automatic email notification.</p>
                    <p>• Please do not delete this email or share your account to others!</p>
                </td>
                </tr>
            </table>
            </td>
        </tr>
        </table>
        </td>
        </tr>
        <tr>
            <td>
            <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
            <tr>
            <td class="content-cell" align="center">
                © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
            </td>
            </tr>
            </table>
            </td>
            </tr>
        </table>
        </td>
        </tr>
        </table>
</body>
</html>
