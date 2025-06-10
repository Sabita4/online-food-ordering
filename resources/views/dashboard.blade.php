@extends('layouts.app')
@section('title','Dashboard')
@section('content')
<div class="grid grid-cols-3 gap-4">
    <div class="bg-blue-100 p-3 shadow-md-rounded-lg">
        <h3 class=font-bold text-xl">
            <i class="ri-user-fill"></i>
            Total users
        </h3>
        <p class="txt-4xl text-right font-bold">50</p>
    </div>
    <div class="bg-yellow-100 p-3 shadow-md-rounded-lg">
        <h3 class="font-bold text-xl">
            <i class="ri-restaurant-2-fill"></i>
            Total Food
        </h3>
        <p class="txt-4xl text-right font bold">100</p>
    </div>
    <div class="bg-pink-100 p-3 shadow-md-rounded-lg">
        <h3 class="font-bold text-xl">
            <i class="ri-order-play-fill"></i>
            Total order
        </h3>
        <p class="txt-4xl text-right font bold">800</p>
    </div>
    <div class="bg-green-200 p-3 shadow-md-rounded-lg">
        <h3 class="font-bold text-xl">
            <i class="ri-currency-fill"></i>
            Total revenue
        </h3>
        <p class="txt-4xl text-right font bold">50000</p>
    </div>
    <div class="bg-violet-100 p-3 shadow-md-rounded-lg">
        <h3 class="font-bold text-xl">
            <i class="ri-menu-search-fill"></i>
            Total categories
        </h3>
        <p class="txt-4xl text-right font bold">{{ $totalcategories }}</p>
    </div>
    <div class="bg-purple-200 p-3 shadow-md-rounded-lg">
        <h3 class="font-bold text-xl">
            <i class="ri-team-fill"></i>
            Total customers
        </h3>
        <p class="txt-4xl text-right font bold">600</p>
    </div>
    <div class="bg-gray-200 p-3 shadow-md-rounded-lg">
        <h3 class="font-bold text-xl">
            <i class="ri-history-line"></i>
            Recent orders
        </h3>
        <p class="txt-4xl text-right font bold">450</p>
    </div>
    <div class="bg-orange-200 p-3 shadow-md-rounded-lg">
        <h3 class="font-bold text-xl">
            <i class="ri-hourglass-fill"></i>
            Pending orders
        </h3>
        <p class="txt-4xl text-right font bold">200</p>
    </div>

    @endsection