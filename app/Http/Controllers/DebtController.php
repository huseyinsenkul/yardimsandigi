<?php

namespace App\Http\Controllers;

use App\Models\Debt;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DebtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $debtGet = Debt::all();
        $users = User::all();
        $debts = array();
        $payments = array();
        foreach ($users as $user) {
            $debt = Debt::where('user_id', '=', $user->id)->where('status', '=', false)->orderBy('id', 'Desc')->first();
            $debts[$user->id] = $debt;
        }

        foreach ($debtGet as $debt) {
            $payments[$debt->id] = 0;
            foreach ($debt->getPayments as $payment) {
                $payments[$debt->id] += $payment->payment;
            }
        }
        $data = [
            'users' => $users,
            'debts' => $debts,
            'payments' => $payments,
        ];
        return view('admin.debt_controller.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $this->validate($request, [
            'user' => 'required',
        ]);

        $user = User::findOrFail($request->user);
        $total = 0;
        foreach ($user->getRevenues as $revenue) {
            $total += $revenue->price;
        }
        $data = [
            'user' => $user,
            'max' => $total * 2,
        ];
        return view('admin.debt_controller.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $debt = new Debt();
        $debt->user_id = $request->user;
        $debt->debt = $request->debt;
        $debt->status = false;
        $debt->save();

        $user = User::find($request->user);
        $transacion = new Transaction();
        $transacion->admin_id = auth('admin')->user()->id;
        $transacion->description = $user->name . " isimli kullanıcıya " . $request->debt . " TL borç girişi yapıldı.";
        $transacion->save();

        return redirect()->route('admin.debt.index')->with(['success' => 'Borç girişi başarılı!']);
    }

    public function price_page($debt_id, $user_id)
    {
        $debt = Debt::findOrFail($debt_id);
        $user = User::findOrFail($user_id);
        $paid = 0;
        foreach ($debt->getPayments as $payment) {
            $paid += $payment->payment;
        }
        $data = [
            'user' => $user,
            'debt' => $debt,
            'paid' => $paid,
        ];
        return view('admin.debt_controller.payment', $data);
    }

    public function price_progress(Request $request, $debt_id, $user_id)
    {
        $debt = Debt::findOrFail($debt_id);
        $payment = new Payment();
        $payment->debt_id = $debt_id;
        $payment->user_id = $user_id;
        $payment->payment = $request->payment;
        $payment->comment = $request->comment;
        $payment->save();
        $paid = 0;
        foreach ($debt->getPayments as $payments) {
            $paid += $payments->payment;
        }

        $user = User::find($request->user);
        $transacion = new Transaction();
        $transacion->admin_id = auth('admin')->user()->id;
        $transacion->description = $user->name . " isimli kullanıcıdan " . $request->payment . " TL borç ödemesi alındı.";
        $transacion->save();

        if ($paid === $debt->debt) {
            $debt->status = true;
            $debt->save();
            return redirect()->route('admin.debt.index')->with(['success' => 'Borç tahsilatı başarılı! Borç tamamen ödendi.']);
        }
        return back()->with(['success' => 'Borç tahsilatı başarılı!']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $debt = Debt::findOrFail($id);
        $data = [
            'debt' => $debt,
        ];
        return view('admin.debt_controller.show', $data);
    }

    public function debts_history($user_id)
    {
        $user = User::findOrFail($user_id);
        $data = [
            'user' => $user,
        ];
        return view('admin.debt_controller.history', $data);
    }
}
