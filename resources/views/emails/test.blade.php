{{-- <h2>
    Your email : {{ $email }}
</h2>

<h3>
    Your password : {{ $password }}
</h3> --}}

<!DOCTYPE html>
<html>

<head>
    <title>Your Information Required For Dashboard</title>
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
    <h1>Your Information Required For Dashboard</h1>

    <p>Hello,</p>

    <p>Your Email for login to dashboard is:</p>

    <p style="font-size: 24px; font-weight: bold; text-align: center; margin-bottom: 30px;">{{ $email }}</p>

    <p>Your password for login to dashboard is:</p>

    <p style="font-size: 24px; font-weight: bold; text-align: center; margin-bottom: 30px;">{{ $password }}</p>


    <p>Thank you for choosing our service!</p>

    <img src="{{ asset('appLogo/family.png') }}" alt="">
</body>

</html>

