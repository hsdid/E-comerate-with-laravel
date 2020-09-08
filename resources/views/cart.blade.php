@extends('layouts.app')

@section('content')
    
        <div class="content">
            
            <div>
                <a class="text btn " style="height: 5%;" href="{{route('shop.index')}}">Contrnue Shoping</a>
            </div>
           
            <h4 class="text">SHOPPING BAG
            </h4>
            @foreach ($products as $product)
                
            
            <div class="cart-page">
                
                    <div class="product">
                        <img src="{{url('/img/microsoft-surface-prox.jpg')}}" width="200" alt="product">
                             
                        {{-- <div class="product-price">{{$product->presentPrice()}}</div> --}} 
                        

                         <form action="{{route('cart.destroy',$product->id )}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                           
                            <button type="submit" class="btn-no-border text ">remove</button>
                           
                        </form> 
                    </div>
                    <div class="text descript ">
                          {{$product->product_name}} 
                          <div>{{$product->presentPrice()}}</div>
                    </div>
                   

            </div>
              
            @endforeach
                
                <div class="text descript" style="height: 5%;">
                   
                   Total price {{$totalPrice}}
                </div>
                
               

                @include('inc.you-may-like')
                @include('inc.footer')
        </div>
    {{-- </div> --}}
@endsection