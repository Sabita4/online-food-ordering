<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use App\Models\Foods;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Food::all();
        return view('foods.index', compact('foods'));
    }
    public function create()
    {
        $categories = Category::orderBy('order', 'asc')->get();
        return view('foods.create', compact('categories'));
    }
    public function store(Request $request)
    {
        // dd(request()->all());
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'discounted_price' => 'nullable|numeric',
            'description' => 'required|string',
            'stock' => 'required|numeric',
            'photopath' => 'required|image'
        ]);
        // Handle file upload
        $file = $request->file('photopath');
        $fileName = time() . '.' . $file->getClientOriginalExtension();  //we add time or rename garencha 
        $file->move(public_path('images/foods'), $fileName);
        $data['photopath'] = $fileName;

        // Create the product
        Food::create($data);
        return redirect()->route('foods.index')->with('success', 'Food Created Successfully');
    }
    public function edit($id)
    {
        $foods = Food::findorFail($id);
        $categories = Category::orderBy('order', 'asc')->get();
        return view('foods.edit', compact('foods', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'discounted_price' => 'nullable|numeric|lt:price',
            'description' => 'required|string',
            'stock' => 'required|numeric',
            'photopath' => 'nullable|image'
        ]);
        $food = Food::findOrFail($id);
        if ($request->hasFile('photopath')) {
            $file = $request->file('photopath');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/foods'), $fileName);
            $data['photopath'] = $fileName;

            //unsent the old image
            if (file_exists(public_path('images/foods/' . $food->photopath))) {
                unlink(public_path('images/foods/' . $food->photopath));
            }
        }
        $food->update($data);
        return redirect()->route('foods.index')->with('success', 'Food Updated Successfully');
    }
    public function destroy($id)
    {
        $food = Food::findOrFail($id);
        //unsent the old image
        if (file_exists(public_path('images/foods/' . $food->photopath))) {
            unlink(public_path('images/foods/' . $food->photopath));
        }
        $food->delete();
        return redirect()->route('foods.index')->with('success', 'Food Deleted Successfully');
    }
}
