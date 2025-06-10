@extends('layouts.app')
@section('title', 'Edit Product')
@section('content')
<form action="{{route('foods.update',$foods->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <select name="category_id" id="" class="border border-gray-300 p-2 rounded-md w-full mb-3">
        @foreach($categories as $category)
        <option value="{{$category->id}}" @if($foods->category_id==$category->id) selected @endif>{{$category->name}}</option>
        @endforeach
    </select>
    <input type="text" class="border border-gray-300 p-2 rounded-md w-full mb-3" name="name" placeholder="Product Name" value="{{$foods->name}}">
    @error('name')
    <div class="text-red-500 mb-3 -mt-3">{{$message}}</div>
    @enderror
    <input type="text" class="border border-gray-300 p-2 rounded-md w-full mb-3" name="price" placeholder="Price" value="{{$foods->price}}">
    @error('price')
    <div class="text-red-500 mb-3 -mt-3">{{$message}}</div>
    @enderror
    <input type="text" class="border border-gray-300 p-2 rounded-md w-full mb-3" name="discounted_price" placeholder="Discounted Price" value="{{$foods->discounted_price}}">
    @error('discounted_price')
    <div class="text-red-500 mb-3 -mt-3">{{$message}}</div>
    @enderror
    <textarea class="border border-gray-300 p-2 rounded-md w-full mb-3" name="description" placeholder="Description">{{old('description',$foods->description)}}</textarea>
    @error('description')
    <div class="text-red-500 mb-3 -mt-3">{{$message}}</div>
    @enderror
    <input type="number" class="border border-gray-300 p-2 rounded-md w-full mb-3" name="stock" placeholder="Stock" value="{{$foods->stock}}">
    @error('stock')
    <div class="text-red-500 mb-3 -mt-3">{{$message}}</div>
    @enderror
    <p>Current Picture</p>
    <img src="{{asset('images/foods/'.$food->photopath)}}" alt="Food Image" class="h-20 w-20">
    <input type="file" class="border border-gray-300 p-2 rounded-md w-full mb-3" name="photopath" placeholder="Picture" value="{{$foods->photopath}}">
    @error('photopath')
    <div class="text-red-500 mb-3 -mt-3">{{$message}}</div>
    @enderror
    <div class="flex justify-center mt-4">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg ">Edit Food</button>
        <a href="{{route('foods.index')}}" class="bg-red-600 text-white px-8 py-2 rounded-lg ml-2">Cancel</a>
    </div>
</form>
@endsection