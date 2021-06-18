@extends('master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6">
        <img class="detail-img" src="{{$product['images']}}" alt="">
        </div>
        <div class="col-sm-6">
        <a href="/">Go Back</a>
        <h2>{{$product['product_name']}}</h2>
        <h3>Price : {{$product['price']}}</h3>
        <h4>Brand : {{$product['brand']}}</h4>
        <h4>Gender : {{$product['category_one']}}</h4>
        <br><br>
        <button class="btn btn-primary">Add to Cart</button>
        <br><br>
        <button class="btn btn-success">Buy Now</button>
        </div>
    </div>
</div>
@endsection