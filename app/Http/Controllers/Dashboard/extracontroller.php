<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\extra;
class extracontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $emps = extra::when($request->search, function($q) use ($request){

            return $q->where('date_salary', 'like', '%' . $request->search . '%');
               

        })->latest()->paginate(5);
        if($request->search != null)
        {
        $price = extra::when($request->search, function($q) use ($request){

            return $q->where('date_salary', 'like', '%' . $request->search . '%');

        })->sum('price');
          }
          else{
            $price = 0;
          }


      

        return view('dashboard.extrea.index', compact('emps','price'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

             return view('dashboard.extrea.create');
          

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
            'date_salary' => 'required',
            'name_order' => 'required',
            'price' => 'required',
            'person_order' => 'required',
            'reson' => 'required',

        ]);

        $request_data = $request->all();

        extra::create($request_data);

        session()->flash('success', __('تمت الاضافة بنجاح'));
        return redirect()->route('dashboard.extra.index');
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
         $emp = extra::find($id);

        return view('dashboard.extrea.edit', compact('emp'));

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
            'date_salary' => 'required',
            'name_order' => 'required',
            'price' => 'required',
            'person_order' => 'required',
            'reson' => 'required',
        ]);

        $emp= extra::find($id);
        $emp->date_salary = $request->date_salary;
        $emp->name_order = $request->name_order;
        $emp->price = $request->price;
        $emp->person_order = $request->person_order;
        $emp->reson = $request->reson;

        $emp->save();


        session()->flash('success', __('تم التعديل بنجاح'));
        return redirect()->route('dashboard.extra.index');
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
        $emp= extra::find($id);


        $emp->delete();
        session()->flash('success', __(' تم الحذف بنجاح'));
        return redirect()->route('dashboard.extra.index');
        //
    }
}
