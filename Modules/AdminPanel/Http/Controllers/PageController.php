<?php

namespace Modules\AdminPanel\Http\Controllers;

use App\Models\Page;
use App\Models\PageCategories;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Symfony\Contracts\Service\Attribute\Required;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $pages = Page::all();
        return view('adminpanel::page.index',['pages' => $pages]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $categories = PageCategories::all();
        return view('adminpanel::page.create',['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'keywords' => 'required',
            'cat_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $imageName = uniqid().time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $page = new Page();
        $page->title = $validate['title'];
        $page->description = $validate['description'];
        $page->content = $validate['content'];
        $page->keywords = $validate['keywords'];
        $page->image = $imageName;
        $page->cat_id = $validate['cat_id'];
        $page->save();
        return redirect('/adminpanel/pages')->with('success','Page created');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('adminpanel::page.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Page $page)
    {
        $categories = PageCategories::all();
        return view('adminpanel::page.edit',['page' => $page,'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Page $page)
    {
        $validate = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'keywords' => 'required',
            'cat_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $imageName = uniqid().time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $page->title = $validate['title'];
        $page->description = $validate['description'];
        $page->content = $validate['content'];
        $page->keywords = $validate['keywords'];
        $page->image = $imageName;
        $page->cat_id = $validate['cat_id'];
        $page->save();
        return redirect('/adminpanel/pages')->with('success','Page updated');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect('/adminpanel/pages')->with('success','Page deleted');
    }
}
