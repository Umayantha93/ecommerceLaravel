@extends('master')
@section('content')
<div class="custom-product">
    <div class="col-sm-10">
    <div class="trending-wrapper">
  <h4>Results for Products</h4>
    @foreach($products as $item)
        <div class="row searched-item cart-list-devider"> 
        <div class="col-sm-3">

                <a href="detail/{{$item->id}}">
                <img class="tranding-image" src="{{$item->images}}">
                </a>
        
        </div>
        <div class="col-sm-3">

                <a href="detail/{{$item->id}}">
                <div class="">
                <h2>{{$item->product_name}}</h2>
                <h5>Price : {{$item->price}} | Gender : {{$item->category_one}}</h5>
                </div>
                </a>

        </div>
        <div class="col-sm-3">

            <button class="btn btn-warning">Romove from class</button>

        </div>
        </div>
      @endforeach
      </div>
    </div>
  </div>
@endsection
@section('footer')
@endsection
