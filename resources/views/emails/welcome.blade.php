<!DOCTYPE html>
<html>

<head>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <style>
        /* Inline your Bootstrap CSS here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: #ffffff;
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .logo {
            width: 150px;
            margin: 0 auto 20px;
            display: block;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #666666;
            margin-top: 20px;
        }
        .img-container {
  position: relative;
  width: 100px;/*Or whatever you want*/
}
.imageOne {
  width: 100%;
}
.imageTwo {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

}

    </style>
</head>
<body>
    <div class="container">

        <div class="img-container" style="width:100%">
            <img src="https://beyondbruges.be/images/iphoneinhand.png" alt="Background" class="img-fluid imageTwo" style="max-width: 50%">
            <img src="https://beyondbruges.be/storage/2/614a7a0f48797_6140e044e65d9_sliderbg.jpeg" alt="Overlay"  class="img-fluid imageOne" style="max-width: 100%">
        </div>
        <h1>{{$user->name}}, {{ __('messages.welcome', [], $user->language) }}</h1>
        <p>
            {{ __('messages.enjoy', [], $user->language) }}
        </p>
        <img src="{{ env('APP_URL')}}/images/icon.jpg" alt="" width="100%" style="padding:80px">
        <p style="color:black">{{ __('messages.reward', [], $user->language) }}</p>

        <hr>


<img src="{{env('APP_URL')}}/images/{{$user->id}}.png" alt="" width="100%" style="padding:20px">

<hr>

        <center>
            <p>
                {{ __('messages.contact', [], $user->language) }}
            </p>
            <a href="" class="btn btn-xl btn-primary" style="background-color:black">BeyondBruges.be</a>
         </center>

        <div class="footer">
            <p>{!! __('messages.rights', ['year' => date('Y')], $user->language) !!}</p>
        </div>
    </div>
</body>
</html>
