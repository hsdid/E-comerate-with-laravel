@extends('layouts.app')

@section('content')
    
        <div class="container_cart content">
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
            <div class="text  cart_body">
                <div class="cart">
                    Shoping bag
               </div>
            </div>
            <div class="cart_body">
                <div class="cart">
                     
                    <div class="cart_product">
                         @if ($incart > 0) 
                         @foreach ($products as $product)
               
                                <div class="content">
                                
                                    <div class=" product_check">
                                         <div>
                                            {{-- <img src="{{url('/img/microsoft-surface-prox.jpg')}}" width="100" alt="product"> --}}

                                            <img class=" ml-auto mr-auto" src="{{$product->image}}" width="100" alt="product"> 
                                            
                                            
                                        </div>   
                                        <select class="quantity" data-id="{{$product->id}}" >
                                            <option {{$product->qty == 1 ? 'selected' : ''}} value="1">1</option>
                                            <option {{$product->qty == 2 ? 'selected' : ''}} value="2">2</option>
                                            <option {{$product->qty == 3 ? 'selected' : ''}} value="3">3</option>
                                            <option {{$product->qty == 4 ? 'selected' : ''}} value="4">4</option>
                                            <option {{$product->qty == 5 ? 'selected' : ''}} value="5">5</option>
                                        </select>
                                        <div class="buttons">
                                            <form action="{{route('cart.destroy',$product->id )}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                            
                                                <button type="submit" class="btn-no-border text">remove</button>
                                            </form> 
                                        @if (Auth::check())
                                            {{$userId = Auth::id()}}
                                            
                                            <form action="{{route('cart.switchToSaveForLater',['product_id' =>$product->id ,'user_id' => $userId]) }}" method="POST">
                                                {{ csrf_field() }}

                                                <button type="submit" class="btn-no-border text">Save</button>
                                            </form> 
                                        @else 
                                            <button type="submit" class="btn-no-border text" disabled>Save</button>
                                        @endif
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
                     </div>

                </div>
                
            </div>
            <div class="text cart_body">
                <div class="cart cart_product">
                    Total price {{$totalPrice}}
                    <a href="{{ route('checkout.index')}}" class="btn-no-border text">chechout</a>
               </div>
            </div>

        </div>

@endsection

@section('extra-js')
        
    <script src="{{ asset('js/app.js')}}"></script>
    <script>
        (function(){
            const classname = document.querySelectorAll('.quantity');

            Array.from(classname).forEach(function(element){
                element.addEventListener('change',function(){
                    
                    const id = element.getAttribute('data-id')
                   
                    axios.patch(`/cart/${id}`, {
                       quantity: this.value
                       //console.log(quantity)
                    })
                    .then(function (response) {
                        console.log(response);
                        window.location.href = "{{ route('cart.index') }}"
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                })
            })

        })();
    </script>
@endsection