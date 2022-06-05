<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;]
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


use App\Models\Transaction;

class UnlockController extends Controller
{
   public function unlockgame(){

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

    foreach (LevelObject::all() as $key => $value) {
       
        $userlvlobj = new UserLevelObject;
       $userlvlobj->user_id = $user->id;
       $userlvlobj->level_object_id = $value->id;
       $userlvlobj->save();

    }

    $transaction = new Transaction;
    $transaction->value = $request->value;
    $transaction->status = 1;
    $transaction->user_id = $user->id;
    $transaction->transaction_type = 7;
    $transaction->save();

       
        if ($user->udid != null) {

            $userId = $user->udid; 
             OneSignal::sendNotificationToUser(
            "Transaction succeded! Thanks for your purchase",
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

   public function unlocktourist(){

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
       
        $userlm = new UserLandmark;
       $userlm->user_id = $user->id;
       $userlm->level_object_id = $value->id;
       $userlm->save();

    }

    $transaction = new Transaction;
    $transaction->value = $request->value;
    $transaction->status = 1;
    $transaction->user_id = $user->id;
    $transaction->transaction_type = 8;
    $transaction->save();

       
        if ($user->udid != null) {

            $userId = $user->udid; 
             OneSignal::sendNotificationToUser(
            "Transaction succeded! Thanks for your purchase",
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

   public function unlockeverything(){
    

     if (!$user) {
        return response()->json(['not found'], 404);
    }

    foreach (Level::all() as $key => $value) {
        
       $userlvl = new UserGameLevel;
       $userlvl->user_id = $user->id;
       $userlvl->level_id = $value->id;
       $userlvl->save();

    }

    foreach (LevelObject::all() as $key => $value) {
       
        $userlvlobj = new UserLevelObject;
       $userlvlobj->user_id = $user->id;
       $userlvlobj->level_object_id = $value->id;
       $userlvlobj->save();

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
       $userlm->level_object_id = $value->id;
       $userlm->save();

    }

    $transaction = new Transaction;
    $transaction->value = $request->value;
    $transaction->status = 1;
    $transaction->user_id = $user->id;
    $transaction->transaction_type = 9;
    $transaction->save();

       
        if ($user->udid != null) {

            $userId = $user->udid; 
             OneSignal::sendNotificationToUser(
            "Transaction succeded! Thanks for your purchase",
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
