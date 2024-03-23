@php
$user = auth()->user();
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
	<img src="{{env('APP_URL')}}/{{$topImage}}" alt="" width="100%" style="padding:5px">
	<br>
	<br>
	<h1 style="color:black">{{$user->name}}</h1>
	{!! $welcome !!}
	<p style="color:black">
		{!!$first!!}
	</p>
	<img src="{{env('APP_URL')}}/{{$middleImage}}" alt="" width="100%" style="padding:80px">
	<p style="color:black">{!! $second !!}</p>
	<hr>
	<center>
		<img src="https://phplaravel-493623-2526898.cloudwaysapps.com/images/{{$user->id}}.png"  alt="" width="50%" style="padding:20px">
	</center>
	<hr>
	<center>
		<p style="color:black">
			{!! $third!!}
		</p>
		<a href="{{env('APP_URL')}}" class="btn btn-xl btn-dark" >BeyondBruges.be</a>

	<div class="footer">
        <br>
		<small>© {{env('APP_NAME')}} {{\Carbon\Carbon::now()->format('Y')}}</small>
	</div>
</center>
</div>
