<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

use App\Models\Type;
use App\Models\Level;

// use App\Http\Controllers\TypeController;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data = Item::latest()->paginate(5);
        $data = Item::orderBy('id')->paginate(5);
    
        return view('items.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexjson()
    {
        $data = Item::latest()->paginate(5);
    
        return view('items.indexjson',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$types = Type::lists('type_name','id');
        $types = Type::all();
        $levels = Level::all();
        return view('items.create', compact('types', 'levels'));
        // return view('items.create',compact('types'));
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
            'name' => 'required',
            'type_id' => 'required',
            'level_id' => 'required',
            'description' => 'required'
        ]);

        if($request->superior == "on")
            $request['superior'] = 1;
        else
            $request['superior'] = 0;
        
        if($request->eth == "on")
            $request['eth'] = 1;
        else
            $request['eth'] = 0;
    
        Item::create($request->all());
     
        return redirect()->route('items.index')
                        ->with('success','Item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('items.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $types = Type::all();
        $levels = Level::all();
        return view('items.edit', compact('item', 'types', 'levels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required',
            'type_id' => 'required',
            'level_id' => 'required',
            'description' => 'required'
        ]);
    
        if($request->superior == "on")
            $request['superior'] = 1;
        else
            $request['superior'] = 0;
        
        if($request->eth == "on")
            $request['eth'] = 1;
        else
            $request['eth'] = 0;

        //echo "superior: ".$request['superior'];
        //echo "eth :" .$request['eth'];
        // var_dump($request->all());
        // exit();

        $item->update($request->all());
    
        return redirect()->route('items.index')
                        ->with('success','Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
    
        return redirect()->route('items.index')
                        ->with('success','Item deleted successfully');
    }
}
