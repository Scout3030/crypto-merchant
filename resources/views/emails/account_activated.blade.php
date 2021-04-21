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
        a.btn {
            background-color: #71bf7e;
            color: #fff;
            font-weight: 600;
            padding: 12px 24px;
            border-radius: 10px;
            text-decoration: none;
            min-width: 240px;
            display: inline-block;
        }
    </style>
</head>
<table width="400" border="0" align="center" style="text-align:center;">
    <tr class="logo">
        <td><img src="{{ asset('img/logo.png') }}" width="210" height="121" alt="logo" /></td>
    </tr>
    <tr class="oneTime">
        <td>Welcome to Cryptomatix</td>
    </tr>
    <tr class="content">
        <td>
            <p style="font-size: 18px;">Following are your login credentials:</p>
            <p>
                <b>Email:</b> {{ $data->email }}<br>
                <b>Temporary Password:</b> {{ $data->password }}
            </p>
            <br>
            <p><a class="btn" href="{{ route('auth.showLoginForm') }}" target="_blank">Click here to Login</a></p>
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
