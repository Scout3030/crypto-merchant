<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta content="width=device-width" name="viewport"/>
    <title>CryptoMatix</title>
    <style>
        body {
            font-family: arial;
            font-size: 16px;
        }
        table {
            max-width: 100%;
        }
        .logo img {
            padding: 20px 0;
        }
        .oneTime td {
            background-color: #356ebb;
            color: #fff;
            font-weight: 600;
            padding: 10px;
        }
        tr.content td {
            padding: 40px 30px;
        }
        tr.footer td {
            border-top: 3px solid #cecece;
            color: #6d6d6d;
        }
        .btn {
            display: inline-block;
            font-weight: 400;
            line-height: 1.5;
            text-align: center;
            text-decoration: none;
            vertical-align: middle;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            padding: .375rem .75rem;
            font-size: 1rem;
            border-radius: .25rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            color: #fff;
            background-color: #198754;
            border-color: #198754;
        }
    </style>
</head>
<table width="400" border="0" align="center" style="text-align:center;">
    <tr class="logo">
        <td><img src="{{ asset('img/logo.png') }}" width="210" height="121" alt="logo" /></td>
    </tr>
    <tr class="oneTime">
        <td>One Time Password</td>
    </tr>
    <tr class="content">
        <td>
            <p>In order to make your login attempt<br>
                successful, please use the following OTP:</p>
            <br>
            <p><b>{{ $otp_token }}</b></p>
            <br>
            <br>
            <p>Thanks,<br>
                The Cryptomatix Team</p>
        </td>
    </tr>
    @include('emails.partials.footer')
</table>

<body>
</body>
</html>
