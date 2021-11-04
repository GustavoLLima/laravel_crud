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

        return view('items.index',compact('data'));
    
        // return view('items.index',compact('data'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function search(Request $request)
    {
        // if (isset($request['level_id'])){
        //      echo "level não vazio";
        //     if($request['sockets'] == "")
        //         echo "branco";
        //     else
        //         echo "não branco";
        // }   
        // else{
        //     echo "level vazio";
        // }


        //if(!empty($request->input('user_id'))) {

        // $data = Item::where('type_id', '1')->get();
        // dd($query);

        $conditions = [];

        // type_id
        // level_id
        // superior
        // eth
        // sockets

        $filters = (object)[];

        if (isset($request['type_id']) AND $request['type_id'] != 0){
            array_push($conditions, ['type_id', '=', $request['type_id']]);
            $filters->type_id = $request['type_id'];
        } else{
            $filters->type_id = NULL;
        }
        if (isset($request['level_id']) AND $request['level_id'] != 0){
            array_push($conditions, ['level_id', '=', $request['level_id']]);
            $filters->level_id = $request['level_id'];
        } else{
            $filters->level_id = NULL;
        }


        if (isset($request['superior']) AND $request['superior'] != 3){
            array_push($conditions, ['superior', '=', $request['superior']]);
            $filters->superior = $request['superior'];
        } else{
            $filters->superior = 3;
        }



        if (isset($request['eth']) AND $request['eth'] != 3){
            array_push($conditions, ['eth', '=', $request['eth']]);
            $filters->eth = $request['eth'];
        } else{
            $filters->eth = 3;
        }

        if (isset($request['sockets']) AND $request['sockets'] != NULL){
            array_push($conditions, ['sockets', '=', $request['sockets']]);
            $filters->sockets = $request['sockets'];
        } else{
            $filters->sockets = NULL;
        }
        
        // var_dump($conditions); exit();

        $data = Item::where($conditions)->get();


        // $query = Item::where(function ($q) use ($conditions) {
        // foreach ($conditions as $condition) {
        //     $q->Where($condition[0], $condition[1], $condition[2]);
        //     }
        // })->get();



        // dd($query->getBindings());

        // echo $data; exit();

        // //array_push($conditions, ['type_id', '1']);

        // $data = Item::where("type_id", "=", 1)->toSql();
  
        // echo $data; exit();

        // $data = Item::where(function ($query) {
        // $query->where('name', '=', 'John');
        // $query->where('name', '=', 'Ae');
        // foreach ($conditions as $condition) {
        //     //$q->Where($condition[0], $condition[1], $condition[2]);
        //     $query->Where($condition[0], $condition[1], $condition[2]);
        //     //$q->orWhere('family_name', 'like', "%{$value}%");
        //     }
        // })->toSql();
        // //->get();

        // echo $data; exit();

        // var_dump($data); exit();

        // if(sizeof($conditions) != 0)
        //     $data = Item::orderBy('id')->where($conditions);
        //     //$data = Item::all();
        // else
        //     $data = Item::orderBy('id')->paginate(5);

        // //echo $conditions[0][2];
        // var_dump($conditions);
        // exit();








        //$data = Item::orderBy('id')->paginate(5);

        //var_dump($conditions); exit();

        // $request['type_id'] = 1;

        // if(!empty($request->input('type_id')))
        //     $data->where('type_id', '=', $request['type_id']);


        $types = Type::all();
        $levels = Level::all();
    
        return view('items.search',compact('data', 'types', 'levels', 'filters'))
            ->with('i', (request()->input('page', 1) - 1) * 5);


        // Funciona sem filtro
        // $data = Item::orderBy('id')->paginate(5);

        // $types = Type::all();
        // $levels = Level::all();
    
        // return view('items.search',compact('data', 'types', 'levels'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexjson()
    {
        $data = Item::latest()->paginate(5);

        return view('items.indexjson',compact('data'));
    
        // return view('items.indexjson',compact('data'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
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
