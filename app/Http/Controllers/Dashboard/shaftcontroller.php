<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\material;
use App\type;
use App\employe;
use App\shaft;
class shaftcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $orders = shaft::when($request->search, function($q) use ($request){

            return $q->where('created_at','like', '%' . $request->search . '%');
               

        })->latest()->paginate(5);

        return view('dashboard.shaft.index', compact('orders'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $emp = employe::get();
        $categories = type::with('materials')->get();
        return view('dashboard.shaft.create', compact(  'categories','emp'));
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
            'materials' => 'required|array',
            'employe_id' => 'required',
            'expect' => 'required',


        ]);
        
        $client = employe::find($request->employe_id) ;
        
        

        $this->attach_order($request, $client);


        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('dashboard.shaft.index');
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



    public function materials(shaft $order)
    {
        $materials = $order->materials;
        return view('dashboard.shaft._materails', compact('materials','order'));

    }//end

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shaft= shaft::find($id);

        return view('dashboard.shaft.edit', compact('shaft'));
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
            'genter' => 'required',
            'lost' => 'required',
    
        ]);
       
        $shaft= shaft::find($id);
        $shaft->genter = $request->genter;
        $shaft->lost = $request->lost;
        $shaft->description = $request->description;

    
    
    
        $shaft->save();
        session()->flash('success', __('تم التسديد بنجاح'));
        return redirect()->route('dashboard.shaft.index');

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
        $order=shaft::find($id);
        foreach ($order->materials as $material) {

            $material->update([
                'stock' => $material->stock + $material->pivot->quantity
            ]);

        }//end of for each

        $order->delete();
        session()->flash('success', __(' تم الحذف بنجاح'));
        return redirect()->route('dashboard.shaft.index');
        //
    }
    

    private function attach_order($request, $client)
    {



        $shaft = $client->shafts()->create([]);

        $shaft->materials()->attach($request->materials);

        $total_price = 0;

        foreach ($request->materials as $id => $quantity) {

            $product = material::FindOrFail($id);
            if($product->stock >= $quantity['quantity'])
            {
            $product->update([
               
                'stock' => $product->stock - $quantity['quantity']
                
            ]);
            }
            else{

                    session()->flash('success', __('لا يمكن '));


            }

        }//end of foreach

        $shaft->update([
            'expect' => $request->expect,
            
        ]);

    }//end of attach order
}
