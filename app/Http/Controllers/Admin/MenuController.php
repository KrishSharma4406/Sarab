<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menu = Menu::orderBy('position')->get();

        return view('admin.menu.index', compact('menu'));
    }

    public function create()
    {
        return view('admin.menu.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required'
        ]);

        Menu::create([
            'title' => $request->title,
            'url' => $request->url,
            'position' => $request->position,
            'target' => $request->target,
            'status' => $request->status
        ]);

        return redirect()
                ->route('menu.index')
                ->with('success','Menu Created Successfully');
    }

    public function edit(Menu $menu)
    {
        return view('admin.menu.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required'
        ]);

        $menu->update([
            'title' => $request->title,
            'url' => $request->url,
            'position' => $request->position,
            'target' => $request->target,
            'status' => $request->status
        ]);

        return redirect()
                ->route('menu.index')
                ->with('success','Menu Updated Successfully');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()
                ->route('menu.index')
                ->with('success','Menu Deleted Successfully');
    }
}