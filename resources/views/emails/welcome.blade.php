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
  transform: translate(-40%, -50%);
}

}

    </style>
</head>
<body>

@php
    $texts = \App\Models\MailContent::first();
    $lang = \App\Models\User::find($user->id)->language;
    $topImage = $texts->email_image_top;
    $welcome = "";
    $first = "";
    $middleImage = $texts->email_image_middle;
    $second = "";
    $third = "";

    switch ($lang) {
        case 'en':
    $welcome =  $texts->en_welcome;
    $first =  $texts->en_first;
    $second = $texts->en_second;
    $third = $texts->en_third;
            break;
        case 'es':
    $welcome =  $texts->es_welcome;
    $first =  $texts->es_first;
    $second = $texts->es_second;
    $third = $texts->es_third;
            break;
        case 'nl':
    $welcome =  $texts->nl_welcome;
    $first =  $texts->nl_first;
    $second = $texts->nl_second;
    $third = $texts->nl_third;
            break;
        case 'fr':
    $welcome =  $texts->fr_welcome;
    $first =  $texts->fr_first;
    $second = $texts->fr_second;
    $third = $texts->fr_third;
            break;

    }
@endphp

    <div class="container">

        <img src="https://beyondbruges.be{{$topImage}}" alt="" width="100%" style="padding:5px">

        <h1 style="color:black">{{$user->name}}</h1> {!! $welcome !!}
        <p style="color:black">
            {!!$first!!}
        </p>
        <img src="https://beyondbruges.be{{$middleImage}}" alt="" width="100%" style="padding:80px">
        <p style="color:black">{!! $second !!}</p>

        <hr>


<img src="https://beyondbruges.be/images/{{$user->id}}.png" alt="" width="100%" style="padding:20px">

<hr>

        <center>
            <p style="color:black">
                {!! $third!!}
            </p>
            <a href="https://beyondbruges.be" class="btn btn-xl btn-primary" >BeyondBruges.be</a>
         </center>

        <div class="footer">
            <p>© {{env('APP_NAME')}} {{\Carbon\Carbon::now()->format('Y')}}</p>
        </div>
    </div>
</body>
</html>
