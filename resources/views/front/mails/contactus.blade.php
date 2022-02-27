<!doctype html>
<html lang="en-US">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Contact US | {{ _settings('SITE_TITLE') }}</title>
    <meta name="description" content="Contact US | {{ _settings('SITE_TITLE') }}">
    <style type="text/css">
        a:hover {text-decoration: underline !important;}
    </style>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 95%;
            margin-left: 15px !important;
            margin-right: 15px !important;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>
<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8" style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;">
        <tr>
            <td>
                <table style="background-color: #f2f3f8; max-width:670px; margin:0 auto;" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <a href="{{ route('home') }}" title="{{ _settings('SITE_TITLE') }}" target="_blank">
                                <img width="100" src="{{ $data['logo'] }}" title="{{ _settings('SITE_TITLE') }}" alt="{{ _settings('SITE_TITLE') }}">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="padding:0 35px;">
                                        <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:'Rubik',sans-serif;">Contact US</h1>
                                        <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table id="customers">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 30%;">Name</td>
                                                    <td style="width: 70%;">{{ $data['name'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 30%;">Email</td>
                                                    <td style="width: 70%;">{{ $data['email'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 30%;">Subject</td>
                                                    <td style="width: 70%;">{{ $data['subject'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 30%;">Message</td>
                                                    <td style="width: 70%;">{{ $data['message'] }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">&copy; <strong>{{ _settings('SITE_TITLE') }}</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>