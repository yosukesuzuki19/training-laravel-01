<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Item;
use App\Http\Requests\ItemStorePost;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $items=Item::sortable()->paginate(10);
//        $items=Item::all();
//        $items->withPath('custom/url');

        $categories=Category::all()->pluck('name','id');

        return view('items.index',compact('items','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all()->pluck('name','id');

        return view('items.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemStorePost $request)
    {

        Item::create([
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id')
        ]);

        return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
//        dd(ArrayTo)
        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $categories=Category::all()->pluck('name','id');

        return view('items.edit',compact('item','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $item->update([
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id')
        ]);

        return redirect()->route('items.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index');
    }

    public function search(Request $request)
    {
        $s_name = $request->input('name');
        $s_category_id = $request->input('category_id');
        $query = Item::query();

        if(!empty($s_name)){
            $query->where('name','like','%'.$s_name.'%');
        }

        if(!empty($s_category_id)){
            $query->where('category_id','like','%'.$s_category_id.'%');
        }

        $items= $query->paginate(10);
        $categories=Category::all()->pluck('name','id');

        return view('items.index',compact('items','categories'));
    }
}
