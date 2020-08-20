<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Qcli;
use App\Contener;
class ContenerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = Contener::whereHas('Qclii', function ($q) use ($request) {

            return $q->where('name', 'like', '%' . $request->search . '%');

        })->paginate(5);

        return view('dashboard.contener.index', compact('orders'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Qcli::all();
        return view('dashboard.contener.create', compact('categories'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'commit' => 'required',
            'payment' => 'required',
            'rest' => 'required',




    
        ]);
    
        Contener::create($request->all());
        session()->flash('success', __('تمت الاضافة بنجاح'));
        return redirect()->route('dashboard.Contener.index');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order= Contener::find($id);

        return view('dashboard.Contener.edit', compact('order'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'payment' => 'required',
            'rest' => 'required',

        ]);

        $order= Contener::find($id);
        $order->payment = $request->payment;
        $order->rest = $request->rest;



        $order->save();
        session()->flash('success', __('تم التسديد بنجاح'));
        return redirect()->route('dashboard.Contener.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Contener= Contener::find($id);


        $Contener->delete();
        session()->flash('success', __(' تم الحذف بنجاح'));
        return redirect()->route('dashboard.Contener.index');
        //
    }
}
