<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item; //追加
use App\Http\Requests\ItemRequest; //追加


class ItemController extends Controller
{
    public function index()
    {
        $items = Item::get();
        $data = ['items' => $items];
        return view('admin.item.index', $data);
    }
    public function create()
    {
        return view('admin.item.create');
    }

    public function add(ItemRequest $request)
    {
        $posts = $request->all();
        Item::create($posts);
        return redirect()->route('admin.item.index');
    }

    // public function add(Request $request)
    // {
    //     $id = $request->id;
    // }

    // public function edit(Request $request)
    // {
    //     $data = ['id' => $request->id];
    //     return view('admin.item.edit', $data);
    // }

    public function edit($id)
    {
        $item = Item::find($id);
        $data = ['item' => $item];
        return view('admin.item.edit', $data);
    }

    public function update(Request $request)
    {
        // $data = ['id' => $request->id];
        // return view('admin.item.edit', $data);

        $posts = $request->all();
        Item::find($request->id)->update($posts);
        return redirect()->route('admin.item.edit', ['id' => $request->id]);
    }

    public function delete(Request $request)
    {
        $data = ['id' => $request->id];
        return view('admin.item.edit', $data);
    }
}
