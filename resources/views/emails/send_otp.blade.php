<!DOCTYPE html>
<html>

<head>
    <title>OTP Verification</title>
    <style>
        body {
            background-color: #e6f7ff;
            color: #0077b3;
            font-family: Arial, sans-serif;
            font-size: 16px;
        }

        h1 {
            color: #005580;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
            text-shadow: 2px 2px #b3d9ff;
        }

        p {
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .btn {
            background-color: #005580;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            display: inline-block;
            font-size: 16px;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0077b3;
        }
    </style>
</head>

<body style="text-align: center">
    <h1>OTP Verification</h1>

    <p>Hello,</p>

    <p>Your OTP for verification is:</p>

    <p style="font-size: 24px; font-weight: bold; text-align: center; margin-bottom: 30px;">{{ $code }}</p>

    <p>Enter this OTP in the verification form to complete your registration.</p>

    <p>Thank you for choosing our service!</p>

    <img src="http://atlobs.com/images/logo.png" alt="">
</body>

</html>
