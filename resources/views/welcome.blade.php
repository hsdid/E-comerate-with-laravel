

@extends('layouts.app')

@section('content')
    

    {{-- <div class="flex-center position-ref full-height"> --}}
    
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="content ">
            

           
            <h4 class="text">categories</h4>
            <div class="links nav-grid">
                <a class="nav-link" href="#">Laptops</a>
                <a class="nav-link" href="#">Phones</a>
                <a class="nav-link" href="#">Monitors</a> 
                <a class="nav-link" href="#">Computer parts</a> 
            </div>
            <h4 class="text">some products</h4>
            <div class="product-body">

                @foreach ($products as $product) 
                    <div class="product">
                        <img src="{{url('/img/microsoft-surface-prox.jpg')}}" width="200" alt="product">
                        <a href="/shop/{{$product->slug}}" class="product-name">{{$product->name}}</a>    
                        <div class=" text">{{$product->presentPrice()}}</div>
                    </div>
                @endforeach

            </div>

            {{-- <button class="btn text"> show more </button> --}}
            
            <div class="descript hei-5" >
                <a href="/shop" class="text btn-no-border"> show more</a>
            </div>

            @include('inc.footer')
        </div>
    {{-- </div> --}}
@endsection