@extends('layouts.app')
@include('inc.nav')

@section('content')
    
        <div class="content">
        @if (Auth::check())
            <div>
                <a class="text btn " style="height: 5%;" href="{{route('shop.index')}}">Contrnue Shoping</a>
            </div>
           
            <h4 class="text">Your seved products ({{$inSaved}})
            </h4>
           
            @if ($inSaved > 0) 
                @foreach ($products as $product)
               
                    <div class="cart-page">
                    
                        <div class="product">
                            <img src="{{$product->image}}" width="200" alt="product">
                                
                            <div class="buttons">
                                <form action="{{route('saved.destroy',$product->id )}}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                
                                    <button type="submit" class="btn-no-border text">remove</button>
                                
                                </form> 
                            </div>
                        </div>
                        <div class="text descript ">
                            {{$product->product_name}} 
                            <div>{{$product->presentPrice()}}</div>
                        </div>
                    </div>
              
                @endforeach
            @else
            <h4 class="text"> is empty</h4>
            @endif
                    
               
                @include('inc.footer')
        @else
            <h4 class="text">you have to be logged</h4>
            <a class="text btn-no-border "  href="/login">log in here</a> 
        @endif
        </div>
   
@endsection