<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch categories in descending order of ID with pagination (10 per page)
        $categories = Category::orderBy('id', 'desc')->paginate(10);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        // Return the view to create a new category
        return view('categories.create');
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        // Validate the request input
        $request->validate([
            'name' => 'required|string|max:80',
        ]);

        // Create and save the new category
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        // Redirect to index with success message
        return redirect()->route('categories.index')
            ->with('message', 'Category Added Successfully')
            ->with('status', asset('assets/icon/success.gif'));
    }

    /**
     * Display the specified category.
     */
    public function show(string $id)
    {
        // Find the category by ID
        $category = Category::find($id);
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(string $id)
    {
        // Find the category by ID and pass it to the edit view
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the category and update its name
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

        // Redirect to index with success message
        return redirect()->route('categories.index')
            ->with('message', 'Category Updated Successfully')
            ->with('status', asset('assets/icon/success.gif'));
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(string $id)
    {
        // Find and delete the category
        $category = Category::find($id);
        $category->delete();

        // Redirect to index with delete success message
        return redirect(route('categories.index'))
            ->with('message', 'Category Deleted Successfully')
            ->with('status', asset('assets/icon/delete.gif'));
    }

    /**
     * Change the status of the specified category (activate/deactivate).
     */
    public function changeStatus($id)
    {
        // Find the category
        $category = Category::findOrFail($id);

        // If status is active (1), check for linked courses before deactivating
        if ($category->status == 1) {
            $hasCourses = \App\Models\Course::where('category_id', $category->id)->exists();

            if ($hasCourses) {
                // Prevent deactivation if courses are linked
                return back()->with('message', 'Cannot deactivate. This category is linked to one or more courses.')
                    ->with('status', asset('assets/icon/error.gif'));
            }
        }

        // Toggle the status between 1 (active) and 0 (inactive)
        $category->status = $category->status == 1 ? 0 : 1;
        $message = $category->status == 1
            ? 'Status Activated Successfully!'
            : 'Status Inactivated!!!';

        // Save the updated status
        $category->save();

        // Redirect back with status message
        return back()->with('message', $message)
            ->with('status', asset('assets/icon/success.gif'));
    }
}
