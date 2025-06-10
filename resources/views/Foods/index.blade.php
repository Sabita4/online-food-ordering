@extends('layouts.app')
@section('title', ' Foods')
@section('content')
<div class="flex justify-end mb-4">
            <a href="{{route('foods.create')}}" class="bg-blue-600 text-white px-4 py-2 rounded-lg ">Add Product</a>
</div>
<table class="w-full">
            <tr class="bg-gray-200">
                        <th class="p-2 border border-gray-50">Picture</th>
                        <th class="p-2 border border-gray-50">Food</th>
                        <th class="p-2 border border-gray-50">Price</th>
                        <th class="p-2 border border-gray-50">Discounted Price</th>
                        <th class="p-2 border border-gray-50">Description</th>
                        <th class="p-2 border border-gray-50">Stock</th>
                        <th class="p-2 border border-gray-50">Category</th>
                        <th class="p-2 border border-gray-50">Action</th>
            </tr>
            @foreach ($foods as $food )
            <tr class="text-center">
                  <td class="p-2 border border-gray-100">
                <img src="{{asset('images/foods/'.$food->photopath)}}" alt="" class="h-16">
            </td>
            <td class="p-2 border border-gray-100">{{$food->name}}</td>
            <td class="p-2 border border-gray-100">{{$food->price}}</td>
            <td class="p-2 border border-gray-100">{{$food->discounted_price ?? '--'}}</td>
            <td class="p-2 border border-gray-100">{{$food->description}}</td>
            <td class="p-2 border border-gray-100">{{$food->stock}}</td>
            <td class="p-2 border border-gray-100">{{$food->category->name}}</td>
            <td class="p-2 border border-gray-100">
                <a href="{{route('foods.edit',$food->id)}}" class="bg-blue-600 text-white px-2 py-1 rounded-md">Edit</a>
                <a href="{{route('foods.destroy',$food->id)}}" onclick="return confirm('Are you sure to delete?');" class="bg-red-600 text-white px-2 py-1 rounded-md">Delete</a>
            </td>       
            </tr>
            
            @endforeach</table>
@endsection