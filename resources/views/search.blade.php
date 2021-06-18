@extends('master')

@section('content')
<div class="custom-product">
    <div class="col-sm-4">
        <a href="#">Filter</a>
    </div>
    <div class="col-sm-4">
    <div class="trending-wrapper">
  <h4>Results for Products</h4>
    @foreach($products as $item)
        <div class="searched-item"> 
        <a href="detail/{{$item['id']}}">
      <img class="tranding-image" src="{{$item['images']}}">
      <div class="">
        <h2>{{$item['product_name']}}</h2>
        <h5>Price : {{$item['price']}} | Gender : {{$item['category_one']}}</h5>
      </div>
      </a>
      </div>
      @endforeach
    </div>
    </div>
  </div>
@endsection