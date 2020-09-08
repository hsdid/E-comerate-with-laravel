<div class="content">
            
    {{-- <h4 class="text">categories</h4>
    <div class="links m-b-md nav-grid">
        <li class="nav-link"><a href="#">Laptops</a> </li>
        <li class="nav-link"><a href="#">Phones</a> </li>
        <li class="nav-link"><a href="#">Monitors</a> </li>
        <li class="nav-link"><a href="#">Computer parts</a> </li>
    </div> --}}
    <h4 class="text ">You also might like</h4>
    <div class="product-body">
        
        @foreach ($mightAlsoLike as $product) 
            <div class="product">
                <img src="{{url('/img/microsoft-surface-prox.jpg')}}" width="150" alt="product">   
                <a href="/shop/{{$product->slug}}" class="product-name">{{$product->name}}</a>  
                <div class="text">{{$product->presentPrice()}}</div>
            </div>
        @endforeach

    </div>

</div>


