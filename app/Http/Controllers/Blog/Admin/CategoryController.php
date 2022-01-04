<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Blog\BaseController;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination = BlogCategory::paginate(3);
        return view('blog.admin.category.index', compact('pagination'));
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
        $item = BlogCategory::findOrFail($id);
        $allCategories = BlogCategory::all();
        return view('blog.admin.category.edit', compact('item', 'allCategories'));
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
        $item = BlogCategory::find($id);
        if (is_null($item)) {
            return back()
                ->withErrors(['msg' => 'No such item ' . $id])
                ->withInput();
        }

        $data = $request->all();
        $result = $item->fill($data)->save();
        if ($result) {
            return redirect()
                ->route('blog.admin.categories.edit', $item->id)
                ->with(['success' => 'Item updated successfully']);
        } else {
            return back()
                ->withErrors(['msg' => 'Invalid save item'])
                ->withInput();
        }
    }
}
