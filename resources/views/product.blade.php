@extends('layouts.app')
@include('inc.nav')
@section('content')
    
        <div class="content">
            
           
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
