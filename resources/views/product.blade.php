@extends('layouts.app')

@section('content')
    
     
        <div class="container_product">
            <div class="navbar text">
                
                <div class="nav-link toleft" style="border-right: black solid 1px;">
                    <a class="text  title ml-1 " href="/">Ecomerate</a>
                </div>
                <div class="nav-link toleft"  style="border-right: black solid 1px;">
                    <a class="text btn-no-border ml-1 " href="/shop">Shop</a>
                </div>
                <div class="nav-link toright" > 
                    <a class="text btn-no-border"  href="/saved">Saved</a> 
                    <a class="text btn-no-border ml-2 mr-2" href="/cart"><i class="fas fa-shopping-bag  "></i>  @if ($incart > 0) ({{$incart}}) @endif </a>
                    
                </div>
            </div>
            <div class="cart_body text ">
                
                <a class="text btn-no-border left_side p-1" href="{{ url()->previous() }}">Back</a>    
                <div class="right_side p-1"> product</div>
                    
               
            </div>
            <div class="cart_body text">
                <div class="left_side " >
                    {{-- <img class="" src="{{url('/img/microsoft-surface-prox.jpg')}}" width="200" alt="product" style="padding: 150px 0;"> --}}
                    <img class="" src="{{$product->image}}" width="200" alt="product" style="padding: 150px 0;">                 
                </div>
                <div class="right_side bor-r " style="border-bottom: #101 solid 1px; padding: 200px 0;">
                    {{$product->name}} -
                    {{$product->details}}
                    {{$product->description}}
                   
                    <div>{{$product->presentPrice()}}</div> 
                  
                    <form action="{{route('cart.store')}}" method="POST" >
                      {{ csrf_field() }}
                      <input type="hidden" name="id" value="{{$product->id}}">
                      <input type="hidden" name="name" value="{{$product->name}}">
                      <input type="hidden" name="price" value="{{$product->price}}">
                      <input type="hidden" name="image" value="{{$product->image}}">
                      <button type="submit" class="text  btn-no-border p-1">Add to cart</button>
                  </form>
                </div>
            </div>

            @include('inc.footer')
        </div>
        
    
@endsection
