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
                            {{-- <input type="hidden" name="id" value="{{$product->id}}"> --}}
                            <button type="submit" class="btn text " style="border:none; cursor: pointer;">remove</button>
                        </form>
                    </div>
                    <div class="text descript">
                          {{$product->product_name}} 
                          <div>{{$product->presentPrice()}}</div>
                    </div>
                   

            </div>
              
            @endforeach
                
                <div class="text descript" style="height: 10%;">
                   
                    {{$totalPrice}}
                </div>
                @include('inc.you-may-like')
                @include('inc.footer')
        </div>
    {{-- </div> --}}
@endsection