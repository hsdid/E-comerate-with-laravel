

@extends('layouts.app')
{{-- @include('inc.nav') --}} 
@section('content')
    

   
    
        {{-- @if (Route::has('login'))
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
        @endif --}}

       
        <div class="container">
            
            <div class="navbar text">
               
                    <div class="nav-link toleft" style="border-right: black solid 1px;">
                        <a class="text  title ml-1 " href="/">Ecomerate</a>
                    </div>
                    <div class="nav-link toleft"  style="border-right: black solid 1px;">
                        <a class="text btn-no-border ml-1 " href="/shop">Shop</a>
                    </div>
                    <div class="nav-link toright" > 
                        {{-- <a class="text btn-no-border"  href="/register">reg</a>  --}}
                        <a class="text btn-no-border "  href="/login">log in</a> 
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                            <button type="submit" class="btn-no-border text ml-2">log out</button>
                        </form>
                        <a class="text btn-no-border ml-2"  href="/saved">Saved</a> 
                        <a class="text btn-no-border ml-2 mr-2  {{$incart == 0 ? 'isDisabled' : 'active'}} " href="/cart" ><i class="fas fa-shopping-bag  "></i>  @if ($incart > 0) ({{$incart}}) @endif </a>
                        
                    </div>
              
            </div>
                @foreach ($categories as $category)
                <div class="nav-link">
                    <ul style="list-style:none;" >
                    <li  class=" {{ request()->category == $category->slug ? 'active' : 'text'}} "><a class="text btn-no-border" href="{{ route('shop.index',['category' => $category->slug]) }}">{{$category->name}}</a></li>
                    </ul>
                </div>
                @endforeach
           
        </div>
   
@endsection