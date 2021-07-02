<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Revenue;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $revenues = Revenue::all();
        $users = User::all();
        $toplam = 0;
        foreach ($users as $user) {
            $usersTotal[$user->id] = 0;
        }
        foreach ($revenues as $revenue) {
            $toplam += $revenue->price;
            $usersTotal[$revenue->user_id] += $revenue->price;
        }
        $data = [
            'total_price' => $toplam,
            'users' => $users,
            'users_total' => $usersTotal,
        ];
        return view('admin.index', $data);
    }


    public function transactions(){
        $transactions = Transaction::orderBy('id', 'Desc')->paginate(10);
        $data = [
            'transactions' => $transactions,
        ];
        return view('admin.transactions', $data);
    }
}
