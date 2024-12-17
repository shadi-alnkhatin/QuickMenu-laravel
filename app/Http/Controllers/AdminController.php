<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
       $statics= new StaticsController();
        $totalUsers = User::count();
        $totalMenu=Menu::count();
        $totalProfits=$statics->getTotalProfits();
        $totalActiveSubscription=$statics->getSubscribersCount();
        return view('dashboard',compact('totalUsers','totalProfits','totalActiveSubscription','totalMenu'));
    }
}
