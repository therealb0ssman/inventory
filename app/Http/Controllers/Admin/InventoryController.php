<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $inventory = Inventory::paginate(5);
        return view('admin.inventory')->with('invents', $inventory);
      

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        // dd($request);
        Inventory::create([
            'Items' => $request['Name'],
            'Description' => $request['Description'],
            'Brand' => $request['Brand'],
            'Quantity' => $request['Quantity'],
            'Date_Acquired' => $request['date_acquired'],
            'Condition' => $request['Condition'],
        ]);
        $inventory = Inventory::paginate(5);
        return view('admin.inventory')->with('invents', $inventory);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
      
        
        return view('admin.editInventory', compact('inventory', $inventory) );

      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
           
            $inventory->Items = $request->input('Name') ;
            $inventory->Description = $request->input('Description') ;
            $inventory->Brand = $request->input('Brand') ;
            $inventory->Quantity = $request->input('Quantity') ;
            $inventory->Date_Acquired = $request->input('date_acquired') ;
            $inventory->Condition = $request->input('Condition') ;

            $inventory->save();
        
            return redirect(route('admin.inventory.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        //
    }

    public function search()
    {
        $search_item = $_GET['search'];
        $invents = Inventory::where('Items','LIKE', '%'.$search_item.'%')->paginate(5);
        return view('admin.inventory', compact('invents'));
        // dd($inventory);
    }
 }
