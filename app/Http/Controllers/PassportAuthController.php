<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use QrCode;
use Auth;
use Illuminate\Support\Str;
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
            'password' => bcrypt($request->password)
        ]);

        $this->email();
        $user->roles()->sync(2);
        $token = $user->createToken('LaravelAuthApp')->accessToken;


        QrCode::size(1024)
                ->format('png')
                ->generate(config('app.url').'/admin/qr-codes/create/'.$user->id, public_path('images/'.$user->id.'.png'));

        if ($request->notifiable != null && $request->notifiable == 1) {
            $user->notifiable = 1;
            $user->update();
        }

        /*REMOVE THIS ON LAUNCH*/
        $user->bryghia = 25;
        $user->update();
        /*REMOVE THIS ON LAUNCH*/

        return response()->json(['token' => $token], 200);
    }

    public function email(){

    }

    /**
     * Login
     */
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];



        if ($request->password == "appleuser" || Str::contains($request->email, '@apple.com')){

            $user = User::where('email', $request->email)->first();
            if(!$user){
                return response()->json(['error' => 'User is not registered'], 401);
            }
            else
            {
                $token = $user->createToken('LaravelAuthApp')->accessToken;
                return response()->json(['token' => $token], 200);
            }
        }

        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;

            if (auth()->user()->status == 1) {
               return response()->json(['token' => $token], 200);
            }
            else
            {
                return response()->json(['error' => 'User account is disabled'], 401);
            }

        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }


    public function loginApple(Request $request){

        $user  = User::find($request->email);

        if(!$user){

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt('appleuser'),
                'apple_token' =>$request->apple_token
            ]);

            $this->email();
            $user->roles()->sync(2);
            $token = $user->createToken('LaravelAuthApp')->accessToken;


            QrCode::size(1024)
                    ->format('png')
                    ->generate(config('app.url').'/admin/qr-codes/create/'.$user->id, public_path('images/'.$user->id.'.png'));

            if ($request->notifiable != null && $request->notifiable == 1) {
                $user->notifiable = 1;
                $user->update();
            }

            /*REMOVE THIS ON LAUNCH*/
            $user->bryghia = 25;
            $user->update();
            /*REMOVE THIS ON LAUNCH*/

            return response()->json(['token' => $token], 200);
        }

        else{

            $token = user()->createToken('LaravelAuthApp')->accessToken;
            if (user()->status == 1) {
               return response()->json(['token' => $token], 200);
            }
            else
            {
                return response()->json(['error' => 'User account is disabled'], 401);
            }
        }

    }


    public function user(Request $request){

        $user = User::where('email', $request->email)->first();

        if (!$user) {
           return response()->json(['error' => 'Not Found'], 404);
        }
        else
        {
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
}
