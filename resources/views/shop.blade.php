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
            <h4 class="text">products</h4>
            <div class="product-body">
                
                @foreach ($products as $product) 
                    <div class="product">
                        <img src="{{url('/img/microsoft-surface-prox.jpg')}}" width="200" alt="product">   
                        <a href="/shop/{{$product->slug}}" class="product-name">{{$product->name}}</a>  
                        <div class="product-price">{{$product->presentPrice()}}</div>
                    </div>
                @endforeach

            </div>
            @include('inc.footer')
        </div>
    {{-- </div> --}}
@endsection