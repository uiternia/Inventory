<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Type;
use Illuminate\Support\Facades\DB;
use Inertia\Response;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): Response
    {
        //whereの数字のマジックナンバーの回避
        $frozenFoods = DB::table('inventories')->where('type_id','1')->get();
        $seasonings = DB::table('inventories')->where('type_id','2')->get();
        $inventories = Inventory::all();

        return Inertia::render('Inventory.Index',
       ['frozenFoods' => $frozenFoods,
       'seasonings' => $seasonings,
       'inventories' => $inventories]
    );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('InventoryCreate',
        ['types' => Type::all()]
        );
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
            'foodName' => 'required',
            'weight' => 'required',
            'type' => 'required',
        ]);

        Inventory::create([
            'inventoryName' => $request->foodName,
            'weight' => $request->weight,
            'type_id' => $request->type, 
        ]);

        return redirect()->route('inventory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory): Response
    {
        return Inertia::render('Inventory.Edit',[
            'inventory' => $inventory
        ]);
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
        $validated = $request->validate([
            'weight' => 'required',
        ]);

        $inventory->update($validated);

        return redirect()->route('inventory.index')->with('message','更新しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        $inventory->delete();

        return redirect()->route('inventory.index')->with('message','削除しました。');//if文でflashを赤色にしたい。
    }

}
