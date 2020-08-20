<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\salary;
use App\employe;

class salarycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $emp = employe::all();

        $saralays = salary::when($request->searchemp, function ($q) use ($request) {

            return $q->where('employe_id', '=',  $request->searchdate );

            

        })->latest()->paginate(5);
        /*

        if($request->search != null)
        {
        $payment = Order::whereHas('client', function ($q) use ($request) {

            return $q->where('name', 'like', '%' . $request->search . '%');

        })->sum('payment');

        $rest = Order::whereHas('client', function ($q) use ($request) {

            return $q->where('name', 'like', '%' . $request->search . '%');

        })->sum('rest');

        $finprice = Order::whereHas('client', function ($q) use ($request) {

            return $q->where('name', 'like', '%' . $request->search . '%');

        })->sum('finprice');
    }
    else{

        $payment =0;
        $rest  =0;
        $finprice =0;


    }
    */
        return view('dashboard.salary.index', compact('saralays','emp'));
        
        //dashboard.salarys.index
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $emp = employe::all();
        return view('dashboard.salary.create', compact('emp'));

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
            'employe_id' => 'required',
            'date' => 'required',

        ]);
        $i=salary::where('employe_id', '=', $request->employe_id)->firstOrFail();
        $d=salary::where('date', '=', $request->date)->firstOrFail();
        if($i == null && $d == null)
        {
            $emp = employe::find($request->employe_id);
        

            $sal = salary::create($request->all());
     
            $sal->update([
             'price' => $emp->price,
         ]);

         session()->flash('success', __('تمت الاضافة بنجاح'));


        }
        else{

            session()->flash('success', __(' تم انشاء حساب شهر لهذا الموظف من قبل '));


        }
        

       


        return redirect()->route('dashboard.salary.index');


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
        $salary= salary::find($id);

        return view('dashboard.salary.edit', compact('salary'));
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

    $salary= salary::find($id);
    $salary->payment = $request->payment;
    $salary->rest = $request->rest;



    $salary->save();
    session()->flash('success', __('تم التسديد بنجاح'));
    return redirect()->route('dashboard.salary.index');

        //
    }

    Route::get('/shaft/{order}/materials', 'shaftcontroller@materials')->name('shafts.materials');


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $salary = salary::find($id);


        $salary->delete();
        session()->flash('success', __(' تم الحذف بنجاح'));
        return redirect()->route('dashboard.salary.index');

        //
    }
}
