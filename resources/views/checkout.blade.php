@extends('layouts.app')
{{-- @include('inc.nav') --}}
@section('extra-css')
    <script src="https://js.stripe.com/v3/"></script>
@endsection


@section('content')
    
        
      

        <div class="container_check " style>
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
                            checkout
                       </div>
                </div>
                <div class="cart_body">
                        <div class="cart">
                                @foreach ($products as $product)
                                <div class="text " style="border-bottom: #101 solid 1px;">
                                        
                                        {{$product->product_name}} 
                                        {{$product->presentPrice()}}
                                        <div><form action=" {{route('cart.destroy',$product->id )}} " method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                        
                                                <button type="submit" class="btn-no-border text">remove</button>
                                        
                                        </form> </div>
                                </div>
                                @endforeach
                        </div>  

                </div>

               
                <div class="text  cart_body">
                        <div class="cart">
                        Total price {{$totalPrice}}
                        </div>
                </div>
               
                <div class="cart_body">
                        <div class="cart ">
                                <form action="{{route('checkout.store')}}" method="POST" id="payment-form">
                                        {{ csrf_field() }}
                                        
                                        <div class="text mt-2 ">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control"  id="name" name="name" value="{{ old('name') }}" required >
                                        </div>
                                        <div class="text mt-2">
                                                <label for="address">Address</label>
                                                <input type="text" class="form-control"  id="address" name="address" value="{{ old('address') }}" required>
                                        </div>
                                       
                                        <div class="text mt-2">
                                                <label for="city">City</label>
                                                <input type="text" class="form-control"  id="city" name="city" value="{{ old('city') }}" required>
                                        </div>
                                        <div class="text mt-2">
                                                <label for="province">Province</label>
                                                <input type="text" class="form-control"  id="province" name="province" value="{{ old('province') }}" required>
                                        </div>
                                           
                                        
                                        <div class="text mt-2">
                                                <label for="postalcode">Postal Code</label>
                                                <input type="text" class="form-control"  id="postalcode" name="postalcode" value="{{ old('postalcode') }}" required>
                                        </div>
                                        <div class="text mt-2">
                                                <label for="phone">Phone</label>
                                                <input type="text" class="form-control"  id="phone" name="phone" value="{{ old('phone') }}" required>
                                        </div>
                                        <h4 class="text">Payment Details</h4>
                
                                        <div class="descript ">
                                                <label for="name_on_card">Name on Card</label>
                                                <input type="text" class="form-control"  id="name_on_card" name="name_on_card" value="">
                                                
                                        </div>
                                        <div class="descript mt-2">
                                                <label for="card-element">
                                                  Credit or debit card
                                                </label>
                                                <div id="card-element">
                                                  
                                                </div>
                        
                                                
                                                <div id="card-errors" role="alert"></div>
                                        </div>
                                        <button type="submit" id="complete-order" class="btn-no-border text mt-2">Complete Order</button>
                                </form>
                
                        </div>
                </div>

        </div>
        

        
        {{-- @include('inc.footer') --}}
@endsection

@section('extra-js')
    <script>
            
  (function(){
                // Create a Stripe client.
        var stripe = Stripe('pk_test_51HPFe0EPZePJwSeQkrfxwo9jGeDpENvS9RvBlAG9S6TgF0cr5szikvL7PElfgsPJ86TTYwFhj48K3FJf3TxvXEWm00WTkxgb20');


        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
        base: {
        color: '#32325d',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder': {
        color: '#aab7c4'
        }
        },
        invalid: {
        color: '#fa755a',
        iconColor: '#fa755a'
        }
        };

        // Create an instance of the card Element.
        var card = elements.create('card',
         {
                style: style,
                hidePostalCode: true
          });

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
        displayError.textContent = event.error.message;
        } else {
        displayError.textContent = '';
        }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
        event.preventDefault();

        var options = {
                name: document.getElementById('name_on_card').value,
                address_line1: document.getElementById('address').value,
                address_city: document.getElementById('city').value,
                address_state: document.getElementById('province').value,
                address_zip: document.getElementById('postalcode').value,
        }

        stripe.createToken(card,options).then(function(result) {
        if (result.error) {
        // Inform the user if there was an error.
        var errorElement = document.getElementById('card-errors');
        errorElement.textContent = result.error.message;
        } else {
        // Send the token to your server.
        stripeTokenHandler(result.token);
        }
        });
        });

        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
        }
                })();  
    </script>
@endsection