<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use QrCode;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use App\Models\AgeGroup;
use App\Models\Country;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\AutomaticCoupon;
use App\Models\UserDynamicCoupon;
use App\Models\DynamicCoupon;
use App\Models\Product;
use Carbon\Carbon;
use App\Models\UserLevel;
use App\Models\UserCharacter;
use App\Models\UserLandmark;
use App\Models\BLandMark;

class PassportAuthController extends Controller
{
    /**
     * Registration
     */
    public function register(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'country_id' => $request->country_id,
            'age_group_id' => $request->age_group_id,
        ]);

        $user->roles()->sync(2);
        $token = $user->createToken('LaravelAuthApp')->accessToken;


        QrCode::size(1024)
                ->format('png')
                ->generate(config('app.url').'/admin/qr-codes/create/'.$user->id, public_path('images/'.$user->id.'.png'));


        if ($request->notifiable != null && $request->notifiable == 1) {
            $user->notifiable = 1;
            $user->update();
        }

        $user->bryghia = 2.5;
        $user->update();

        return response()->json(['token' => $token], 200);
    }


    public function assigntickets(User $user){

        Log::debug("Starting autocoupons");

        $autocoupons = AutomaticCoupon::all();
        foreach ($autocoupons as $key => $value) {
            $exists = false;
            $currentProduct = Product::find($value->product_id);
            if (!$currentProduct){
                Log::debug($currentProduct->name." is not present");
                continue;
            }

            foreach(\App\Models\DynamicCoupon::where('user_id', $user->id)->get() as $coupon){

                if($coupon->products->first()->id == $value->product_id){
                    $exists = true;
                    continue;
                }

            }

            if($exists){
                continue;
            }

        //Generar  dynamic coupon
        $dynamicCoupon = new DynamicCoupon;
        $dynamicCoupon->name = Product::find($value->product_id)->name;

        $date = Carbon::now()->addDays(365);

        $dynamicCoupon->expiration = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format(config('panel.date_format'). ' ' . config('panel.time_format'));
        $dynamicCoupon->user_id = $user->id;
        $dynamicCoupon->code = Str::random(8);
        $dynamicCoupon->imageurl = config('app.url').'/dynamiccoupons/'.$dynamicCoupon->code.'.png';
        $dynamicCoupon->save();
        $dynamicCoupon->products()->sync($value->product_id);

        //Generar user dynamic coupon
        $userdynamiccoupon = new UserDynamicCoupon;
        $userdynamiccoupon->user_id = $user->id;
        $userdynamiccoupon->dynamic_coupon_id = $dynamicCoupon->id;
        $userdynamiccoupon->save();


     QrCode::size(1024)
                ->format('png')
                ->generate(config('app.url').'/admin/redeemed-dynamic-coupons/create/'.$dynamicCoupon->code, public_path('dynamiccoupons/'.$dynamicCoupon->code.'.png'));
        $dynamicCoupon->update();



        }


    }

    /**
     * Login
     */
    public function login(Request $request)
    {
        $data = [
            'email' => $request->username,
            'password' => $request->password
        ];


        if ($request->password == "appleuser" || Str::contains($request->username, '@apple.com')){

            $user = User::where('email', $request->username)->first();

            if(!$user){

                return response()->json(['error' => 'User is not registered'], 401);
            }
            else
            {
                Auth::loginUsingId($user->id);
                Log::debug("Logging with apple or facebook account");
                $accesstoken = auth()->user()->createToken('LaravelAuthApp')->accessToken;
                $refreshtoken = "refresh_token";
                return response()->json(['token_type' => "Bearer", 'access_token' => $accesstoken, 'refresh_token'=>$refreshtoken], 200);
            }
        }




        if (auth()->attempt($data)) {

            $accesstoken = auth()->user()->createToken('LaravelAuthApp')->accessToken;
                $refreshtoken = "refresh_token";

            if (auth()->user()->status == 1) {

                Log::debug("Logging with email account");
                return response()->json(['token_type' => "Bearer", 'access_token' => $accesstoken, 'refresh_token'=>$refreshtoken], 200);

            }
            else
            {
                return response()->json(['error' => 'User account is disabled'], 401);
            }

        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }



    public function user(Request $request){

        $user = User::where('email', $request->email)->first();

        if (!$user) {
           return response()->json(['error' => 'Not Found'], 404);
        }
        else
        {
            $this->patchMinusBryghia();
            $this->unlocktourist();
            $this->checkFirstUnlocks();
            $this->assigntickets($user);
            return response()->json(['data' => $user], 200);
        }
    }

    public function udid(Request $request){

        $user = Auth::user();
        if ($request->udid != null) {
           $user->udid = $request->udid;
        }
        $user->device = $request->device;
        $user->update();
        return response()->json(['data' => $user->udid], 200);
    }

        public function stats(Request $request){

        $stats = User::withCount('userUserLandmarks')->withCount('userUserLevels')->withCount('userCharacters')->where('id', $request->user_id)->first();

        if (!$stats) {
           return response()->json(['error' => 'Not Found'], 404);
        }
        else
        {
            return response()->json(['data' => $stats], 200);
        }
    }

    public function updateLanguage(Request $request){

        if($request->language){

            $user = Auth::user();

            $sTest = $request->language;
            preg_match("/\(([^\)]*)\)/", $sTest, $aMatches);
            $user->language = $aMatches[1];
            $user->update();
            return response()->json(['data' => $user->language], 200);
        }
        else{
            return response()->json(['Request->language is null'], 200);
        }
    }

    public function countries(){

            $countries = Country::all();
            return response()->json(['data' => $countries], 200);

    }

    public function agegroups(){

        $agegroups = AgeGroup::all();
        return response()->json(['data' => $agegroups], 200);

        }

    public function patchMinusBryghia(){

         if(auth()->user() != null ){

            $user = auth()->user();

            if($user->bryghia < 0)
            {
            $user->bryghia = 0;
            $user->update();
             }
        }

    }

    public function forgot(Request $request){
        $this->validateEmail($request);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $response = $this->broker()->sendResetLink(
            $this->credentials($request)
        );

        return $response == Password::RESET_LINK_SENT
                    ? $this->sendResetLinkResponse($request, $response)
                    : $this->sendResetLinkFailedResponse($request, $response);

    }

    protected function validateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    }

    public function broker()
    {
        return Password::broker();
    }

    protected function credentials(Request $request)
    {
        return $request->only('email');
    }

    protected function sendResetLinkResponse(Request $request, $response)
    {
        return $request->wantsJson()
                    ? new JsonResponse(['message' => trans($response)], 200)
                    : back()->with('status', trans($response));
    }

    public function sendWelcomeEmail(User $user)
    {
        Mail::to($user->email)->send(new WelcomeEmail($user));

    }


    public function unlocktourist(){

        $user = Auth::user();

        if (!$user) {
            return response()->json(['not found'], 404);
        }


        foreach (BLandMark::all() as $key => $value) {

            $existinglevel = UserLandmark::where('user_id', $user->id)->where('landmark_id', $value->id)->first();
            if($existinglevel != null){
                continue;
            }
            $userlm = new UserLandmark;
            $userlm->user_id = $user->id;
            $userlm->landmark_id = $value->id;
            $userlm->save();

            }


       }

       public function checkFirstUnlocks()
       {

            $user = Auth::user();

            if (!$user) {
                return response()->json(['not found'], 404);
            }

            $firstLevel = UserLevel::where('user_id', $user->id)->where('level_id', 1)->first();

            if (!$firstLevel) {
               $firstLevel = new UserLevel;
               $firstLevel->user_id = $user->id;
               $firstLevel->level_id = 1;
               $firstLevel->save();
            }

            $firstCharacter = UserCharacter::where('user_id', $user->id)->where('character_id', 10)->first();


            if (!$firstCharacter) {
                $firstCharacter = new UserCharacter;
                $firstCharacter->user_id = $user->id;
                $firstCharacter->level_id = 10;
                $firstCharacter->save();
             }

       }

}
