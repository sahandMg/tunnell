<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>confirmation</title>
    <style>
        .container{
            background-color: #03A293;
        }
        .link-btn{
            border: 2px solid white;
            color: white;
            border-radius: 10px;
            padding: 10px 2%;
            width: 30%;
            text-align: center;
            background-color: transparent ;
            font-family: sans-b;
            border: 3px solid white;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <a class="link-btn" href="{{route('mailConfirmation').'?id='.$user->temp_token}}">تایید ایمیل</a>
    </div>
</body>
</html>