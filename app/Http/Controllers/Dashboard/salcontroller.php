<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\salary;
use App\employe;
class salcontroller extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $emp = employe::all();

      

        // dd($request->searchemp,$request->searchdate);

        $saralays = salary::when($request->searchemp, function ($q) use ($request) {

            return $q->where('employe_id', '=',  $request->searchemp );

        })->when($request->searchdate, function ($q) use ($request) {

            return $q->where('date','=', $request->searchdate);
    
        })->latest()->paginate(5);
            
        return view('dashboard.sal.index', compact('saralays','emp'));

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $emp = employe::all();
        return view('dashboard.sal.create', compact('emp'));
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
        $i=salary::where('employe_id', '=', $request->employe_id)->where('date',  '=',  $request->date)->first();
        if($i == null)
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
        

       


        return redirect()->route('dashboard.sal.index');


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

        return view('dashboard.sal.edit', compact('salary'));
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
        return redirect()->route('dashboard.sal.index');
    
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
        $salary = salary::find($id);


        $salary->delete();
        session()->flash('success', __(' تم الحذف بنجاح'));
        return redirect()->route('dashboard.sal.index');

        //
    }
}
