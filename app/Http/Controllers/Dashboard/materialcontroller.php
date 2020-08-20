<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\material;
use App\type;

class materialcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = type::all();
        $materials = material::latest()->paginate(5);;


        return view('dashboard.matrail.index', compact('types','materials'));


        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = type::all();
        return view('dashboard.matrail.create', compact('types'));
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
            'name' => 'required|unique:materials',
            'description' => 'required',
            'stock' => 'required|min:1',




    
        ]);
    
        material::create($request->all());
        session()->flash('success', __('تمت الاضافة بنجاح'));
        return redirect()->route('dashboard.material.index');
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
         $material= material::find($id);
         $types = type::all();

        return view('dashboard.matrail.edit', compact('material','types'));

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
            'description' => 'required',
            'stock' => 'required|min:1',

        ]);

        $material= material::find($id);
        $material->name = $request->name;
        $material->description = $request->description;
        $material->stock = $request->stock;
        $material->save();


        session()->flash('success', __('تم التعديل بنجاح'));
        return redirect()->route('dashboard.material.index');
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
         $material= material::find($id);


        $material->delete();
        session()->flash('success', __(' تم الحذف بنجاح'));
        return redirect()->route('dashboard.material.index');

        //
    }
}
