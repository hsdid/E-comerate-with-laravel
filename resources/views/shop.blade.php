@extends('layouts.app')
{{-- @include('inc.nav') --}}

@section('content')
    

    
       
            
            {{-- <div class="flex" style="margin-top: 700px;"> {{$products->appends(request()->input())->links() }} </div> --}}

            {{-- @include('inc.footer') --}}
       

        <div class="container_shop">
            <div class="navbar text">
                
                    <div class="nav-link toleft" style="border-right: black solid 1px;">
                        <a class="text  title ml-1 " href="/">Ecomerate</a>
                    </div>
                    <div class="nav-link toleft"  style="border-right: black solid 1px;">
                        <a class="text btn-no-border ml-1" href="/shop">Shop</a>
                    </div>
                    <div class="nav-link toright" > 
                        <a class="text btn-no-border" href="/saved">Saved</a> 
                        <a class="text btn-no-border ml-2 mr-2" href="/cart"><i class="fas fa-shopping-bag  "></i>  @if ($incart > 0) ({{$incart}}) @endif </a>
                        
                    </div>
            </div>
           
            <div class="category_shop">
                @foreach ($categories as $category)
                <div class="bor-r flex-center content" style="border-bottom: #101 solid 1px">
                    <ul class="list_none content">
                        <li class="{{ request()->category == $category->slug ? 'active' : 'text '}}"><a class="text btn-no-border content" href="{{ route('shop.index',['category' => $category->slug]) }}">{{$category->name}}</a></li>
                    </ul>
                </div>
                @endforeach
            </div>
            <div class="" style="border-bottom: #101 solid 1px">
                <strong class="text mr-1">Price:</strong>
                <a class="text mr-1 btn-no-border" href="{{ route('shop.index', ['category' => request()->category, 'sort' => 'low_high']) }}">Low to High</a>
                <a class="text btn-no-border" href="{{ route('shop.index', ['category' => request()->category, 'sort' => 'high_low']) }}">High to Low</a>
                <h4 class="text">{{$heder}}</h4>
            </div>
            
            
            <div class="product-body">
               
                    @forelse ($products as $product)
                    <div class="product">
                      
                            {{-- <img class=" ml-auto mr-auto" src="{{url('/img/microsoft-surface-prox.jpg')}}" width="200" alt="product">  --}}
                            <img class=" ml-auto mr-auto" src="{{$product->image}}" width="200" alt="product"> 
                        

                        <a href="/shop/{{$product->slug}}" class="text">{{$product->name}}</a>  
                        <div class=" text">{{$product->presentPrice()}}</div>
                    </div>
                    @empty
                        <div class="text">item not found</div>
                        
                    @endforelse
                    <div>

                    </div>
                  
            </div>
          
                <div class="content" style="border-bottom: #101 solid 1px;">
                    {{$products->appends(request()->input())->links() }} 
                  
                </div>
        </div>
  
@endsection