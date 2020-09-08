@extends('layouts.app')

@section('content')
    
        <div class="content">
            
            {{-- <h4 class="text">categories</h4>
            <div class="links m-b-md nav-grid">
                <li class="nav-link"><a href="#">Laptops</a> </li>
                <li class="nav-link"><a href="#">Phones</a> </li>
                <li class="nav-link"><a href="#">Monitors</a> </li>
                <li class="nav-link"><a href="#">Computer parts</a> </li>
            </div> --}}
            <h4 class="text">product</h4>
            <div class="single-product-page">
                
                
                    <div class="product">
                        <img src="{{url('/img/microsoft-surface-prox.jpg')}}" width="350" alt="product">
                        {{-- <a href="#" class="product-name">{{$product->name}}</a>    
                        <div class="product-price">{{$product->presentPrice()}}</div> --}}
                    </div>
                    <div class="text descript">
                          {{$product->name}} -
                          {{$product->details}}
                          {{$product->description}}
                         
                          <div>{{$product->presentPrice()}}</div> 
                        
                          <form action="{{route('cart.store')}}" method="POST" >
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$product->id}}">
                            <input type="hidden" name="name" value="{{$product->name}}">
                            <input type="hidden" name="price" value="{{$product->price}}">
                            <button type="submit" class="text  btn-no-border">Add to cart</button>
                        </form>
                        
                    </div>
                   
            </div>
                @include('inc.you-may-like')
                @include('inc.footer')
        </div>
    {{-- </div> --}}
@endsection
