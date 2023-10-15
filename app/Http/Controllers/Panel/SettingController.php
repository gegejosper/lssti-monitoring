<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Setting;
class SettingController extends Controller
{
    //
    public function update_setting(Request $req){
        $setting = Setting::find($req->setting_id);
        $setting->sms_message = $req->message;
        $setting->penalty = $req->penalty_amount;
        $setting->hours = $req->hours;
        $setting->enable_sms = $req->enable_sms;
        $setting->save();
        return redirect()->back()->with('success','Settings updated successfully');
    }
}
