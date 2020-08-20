<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\employe;
use App\emptype;
class employecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $emps = employe::latest()->paginate(5);

        $emps = employe::when($request->search, function($q) use ($request){

            return $q->where('name', 'like', '%' . $request->search . '%')
            ->orWhere('phone', 'like', '%' . $request->search . '%');
            
               

        })->latest()->paginate(5);

      

        return view('dashboard.employes.index', compact('emps'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = emptype::all();
        return view('dashboard.employes.create', compact('categories'));
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
            'name' => 'required|unique:employes',
            'phone' => 'required',
            'address' => 'required',
            'price' => 'required',
        ]);

        $request_data = $request->all();

        employe::create($request_data);

        session()->flash('success', __('تمت الاضافة بنجاح'));
        return redirect()->route('dashboard.employe.index');
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
        $categories = emptype::all();

        $emp = employe::find($id);

        return view('dashboard.employes.edit', compact('emp','categories'));
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
            'name' => 'required',
            'phone' => 'required|min:1',
            'price' => 'required',

            'address' => 'required',
        ]);

        $emp= employe::find($id);
        $emp->name = $request->name;
        $emp->phone = $request->phone;
        $emp->address = $request->address;
        $emp->price = $request->price;
        $emp->save();


        session()->flash('success', __('تم التعديل بنجاح'));
        return redirect()->route('dashboard.employe.index');
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
        $emp= employe::find($id);


        $emp->delete();
        session()->flash('success', __(' تم الحذف بنجاح'));
        return redirect()->route('dashboard.employe.index');

        //
    }
}
