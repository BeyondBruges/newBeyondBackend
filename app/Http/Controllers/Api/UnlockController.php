<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

//Gamemode
use App\Models\UserGameLevel;
use App\Models\UserLevelObject;
use App\Models\LevelObject;
use App\Models\Level;

//TouristMode
use App\Models\UserLevel;
use App\Models\UserLandmark;
use App\Models\BLandMark;

use App\Models\PushNotification;
use OneSignal;
use App\Models\Transaction;

class UnlockController extends Controller
{
   public function unlockgame(Request $request){

    $user = Auth::user();

    if (!$user) {
        return response()->json(['not found'], 404);
    }

    foreach (Level::all() as $key => $value) {

        $userlvl = new UserGameLevel;
        $userlvl->user_id = $user->id;
        $userlvl->level_id = $value->id;
        $userlvl->save();
    }

    $transaction = new Transaction;
    $transaction->value = 1;
    $transaction->status = 1;
    $transaction->user_id = $user->id;
    $transaction->transaction_type = 7;
    $transaction->save();

       //localize
        $messageLoc = PushNotification::where('key', 'TransactionSucced')->first();
        $langKey = $user->language;
        $content = $langKey.'_content';

        if ($user->udid != null && $messageLoc) {
            $userId = $user->udid;

            OneSignal::sendNotificationToUser(
                $messageLoc->$content,
                $userId,
                $url = null,
                $data = null,
                $buttons = null,
                $schedule = null
            );
        }

    //resetear app
    return response()->json([$user], 200);

   }

   public function unlocktourist(Request $request){

    $user = Auth::user();

    if (!$user) {
        return response()->json(['not found'], 404);
    }

    foreach (Level::all() as $key => $value) {

        $userlvl = new UserLevel;
        $userlvl->user_id = $user->id;
        $userlvl->level_id = $value->id;
        $userlvl->save();

    }

    foreach (BLandMark::all() as $key => $value) {

        $userlm     = new UserLandmark;
        $userlm->user_id = $user->id;
        $userlm->landmark_id = $value->id;
        $userlm->save();

    }

    $transaction = new Transaction;
    $transaction->value = 1;
    $transaction->status = 1;
    $transaction->user_id = $user->id;
    $transaction->transaction_type = 8;
    $transaction->save();

    $messageLoc = PushNotification::where('key', 'TransactionSucced')->first();
    $langKey = $user->language;
    $content = $langKey.'_content';

    if ($user->udid != null && $messageLoc) {

        $userId = $user->udid;

        OneSignal::sendNotificationToUser(
            $messageLoc->$content,
            $userId,
            $url = null,
            $data = null,
            $buttons = null,
            $schedule = null
        );
    }

    //resetear app
    return response()->json([$user], 200);


   }

   public function unlockeverything(Request $request){

    $user = Auth::user();
    if (!$user) {
        return response()->json(['not found'], 404);
    }

    foreach (Level::all() as $key => $value) {

       $userlvl = new UserGameLevel;
       $userlvl->user_id = $user->id;
       $userlvl->level_id = $value->id;
       $userlvl->save();

    }


    foreach (Level::all() as $key => $value) {

       $userlvl = new UserLevel;
       $userlvl->user_id = $user->id;
       $userlvl->level_id = $value->id;
       $userlvl->save();

    }

    foreach (BLandMark::all() as $key => $value) {

        $userlm = new UserLandmark;
       $userlm->user_id = $user->id;
       $userlm->landmark_id = $value->id;
       $userlm->save();

    }

    $transaction = new Transaction;
    $transaction->value = 1;
    $transaction->status = 1;
    $transaction->user_id = $user->id;
    $transaction->transaction_type = 9;
    $transaction->save();

    $messageLoc = PushNotification::where('key', 'TransactionSucced')->first();
    $langKey = $user->language;
    $content = $langKey.'_content';

        if ($user->udid != null && $messageLoc) {

            $userId = $user->udid;

            OneSignal::sendNotificationToUser(
                $messageLoc->$content,
                $userId,
                $url = null,
                $data = null,
                $buttons = null,
                $schedule = null
            );

        }

    //resetear app
    return response()->json([$user], 200);

   }
}
