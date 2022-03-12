<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // use gate in authorizations
        // $this->authorize('admin');

        $data = [
            'title' => 'Post Category',
            'categories' => Category::latest()->get(),
        ];
        return view('dashboard.categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Create Category',
        ];
        return view('dashboard.categories.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation for forms
        $validated_data_input = $request->validate([
            'name' => ['required', 'unique:categories,name'],
            'image' => ['image', 'file', 'max:1024']
        ]);

        if ($request->file('image')) {
            $validated_data_input['image'] = $request->file('image')->store('category_images');
        };

        // generate slug for category
        $validated_data_input['slug'] = Str::slug($request->name);

        // store
        if (Category::create($validated_data_input)) {
            return redirect('dashboard/categories')->with('success', 'New Category has been added!');
        }

        return back()->with('fail', 'New Category can\'t be added to database');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $data = [
            'title' => 'Rename Category',
            'category' => $category,
        ];
        return view('dashboard.categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $new_slug = Str::slug($request->name);

        $rules = [
            'name' => ['required', 'max:50'],
            'image' => ['image', 'file', 'max:1024'],
        ];

        $validated_data_input = $request->validate($rules);
        $validated_data_input['slug'] = $new_slug;

        if ($request->file('image')) {
            // check category image
            if ($category->image) {
                Storage::delete($category->image);

                $validated_data_input['image'] = $request->file('image')->store('category_images');
            };
        }

        if (Category::where('id', $category->id)->update($validated_data_input)) {
            return redirect('dashboard/categories')->with('success', 'One Category has been updated!');
        };

        return back()->with('fail', 'Category can\'t be updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if (Category::destroy($category->id)) {
            // delete category image too
            if ($category->image) {
                Storage::delete($category->image);
            }

            return redirect('dashboard/categories')->with('success', 'Category has been deleted!');
        };

        return back()->with('fail', 'Can\'t deleting the category since sistems\' error');
    }
}
