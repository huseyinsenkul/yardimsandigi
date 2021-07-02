<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Revenue;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class RevenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [
            'users' => User::all(),
        ];
        return view('admin.revenue_controller.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = [
            'users' => User::all(),
        ];
        return view('admin.revenue_controller.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'user' => 'numeric|exists:users,id',
            'month' => 'required|numeric',
            'year' => 'required|numeric',
            'price' => 'required|numeric',
            'date' => 'required',
        ]);
        $month = "";
        switch ($request->month) {
            case 1:
                $month = "Ocak";
                break;
            case 2:
                $month = "Şubat";
                break;
            case 3:
                $month = "Mart";
                break;
            case 4:
                $month = "Nisan";
                break;
            case 5:
                $month = "Mayıs";
                break;
            case 6:
                $month = "Haziran";
                break;
            case 7:
                $month = "Temmuz";
                break;
            case 8:
                $month = "Ağustos";
                break;
            case 9:
                $month = "Eylül";
                break;
            case 10:
                $month = "Ekim";
                break;
            case 11:
                $month = "Kasım";
                break;
            case 12:
                $month = "Aralık";
                break;
        }

        $revenue = new Revenue();
        $revenue->user_id = $request->user;
        $revenue->price = $request->price;
        $revenue->month = $month;
        $revenue->year = $request->year;
        $revenue->date = $request->date;
        $revenue->save();

        $user = User::find($request->user);
        $transacion = new Transaction();
        $transacion->admin_id = auth('admin')->user()->id;
        $transacion->description = $user->name . " isimli kullanıcıdan " . $request->price . " TL aidat tahsilatı yapıldı.";
        $transacion->save();

        return back()->with(['success' => 'Aidat ödemesi başarılı!']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user = User::findOrFail($id);
        $data = [
            'user' => $user,
            'revenues' => $user->getRevenues->reverse(),
        ];
        return view('admin.revenue_controller.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search_user(Request $request)
    {

        return redirect()->route('admin.revenue.show', $request->user);
    }

    public function page_month()
    {

        return view('admin.revenue_controller.month');
    }

    public function search_month(Request $request)
    {

        $this->validate($request, [
            'year' => 'numeric',
        ]);
        $revenues = Revenue::where('year', '=', $request->year)->where('month', '=', $request->month)->get();
        if ($request->isNotPrice) {
            $users = User::all();
            foreach ($users as $user) {
                $x = Revenue::where('user_id', '=', $user->id)->where('year', '=', $request->year)->where('month', '=', $request->month)->first();
                if (!$x) {
                    $odemeyenler[] = $user->name;
                }
            }
            $data = [
                'price' => false,
                'odemeyenler' => $odemeyenler,
            ];
            return view('admin.revenue_controller.month_show', $data);
        } else {
            $data = [
                'price' => true,
                'revenues' => $revenues,
            ];
            return view('admin.revenue_controller.month_show', $data);
        }
    }
}
