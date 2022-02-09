<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Partner;
use App\Models\Coupon;
use App\Models\DynamicCoupon;
use App\Models\QrCode;
use App\Models\Analytic;
use App\Models\ContactForm;


class HomeController
{
    public function index()
    {
        $users = User::count();
        $transactions = Transaction::count();
        $partners = Partner::count();
        $coupons = Coupon::count();
        $dy_coupons = DynamicCoupon::count();
        $qrs = QrCode::count();
        $bryghia = Analytic::where('value', 'issued_bryghia')->get()->sum('value');
        $contactForm = ContactForm::latest()->take(5)->get();
        return view('home' ,compact('users','transactions','partners','coupons','dy_coupons','qrs','bryghia','contactForm'));
    }
}
