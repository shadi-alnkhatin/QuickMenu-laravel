<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
       if( auth()->user()->isUser()){
            $userId=Auth::id();
            $totalOrders = Order::where('user_id', operator: $userId)->count();

            // Total profits
            $totalProfits = floor(Order::where('user_id', $userId)->sum('total_price'));

            // Total menus
            $totalMenus = Menu::where('user_id', $userId)->count();
            $lastWeekSales = Order::where('user_id', $userId)
            ->where('created_at', '>=', now()->subWeek())
            ->sum('total_price');

            $totlMenuScans= Menu::where('user_id', $userId)->sum('visit_count');

            return view('index', compact('totalProfits', 'totalMenus','totalOrders','lastWeekSales','totlMenuScans'));
       }
       elseif( auth()->user()->isAdmin()){
            $statics= new StaticsController();
            $totalUsers = User::count();
            $totalMenu=Menu::count();
            $totalProfits=$statics->getTotalProfits();
            $totalActiveSubscription=$statics->getSubscribersCount();
            return view('admin',compact('totalUsers','totalProfits','totalActiveSubscription','totalMenu'));
       }

    }
}
