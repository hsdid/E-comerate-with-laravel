@extends('layouts.app')

@section('content')

<div class="container_cart">

            
            <div class="navbar text">
                
                    <div class="nav-link toleft" style="border-right: black solid 1px;">
                        <a class="text  title ml-1 " href="/">Ecomerate</a>
                    </div>
                    <div class="nav-link toleft"  style="border-right: black solid 1px;">
                        <a class="text btn-no-border ml-1 " href="/shop">Shop</a>
                    </div>
                    <div class="nav-link toright" > 
                        <a class="text btn-no-border"  href="/saved">Saved</a> 
                        <a class="text btn-no-border ml-2 mr-2" href="/cart"><i class="fas fa-shopping-bag  "></i> </a>
                        {{-- @if ($incart > 0) ({{$incart}}) @endif  --}}
                    </div>
            </div>
            
            <div class="cart_body text">
                <div class="cart">
                    <a class="text btn-no-border " href="{{ url()->previous() }}">Back</a>    
                </div>
                
            </div>
            
            <div class="cart_body">
                <div class="cart">
                    <div class=" mt-2">{{ __('Login') }}</div>

                    <div class="text  mt-2">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="">
                                <label for="email" class="">{{ __('E-Mail Address') }}</label>

                                <div class="">
                                    <input id="email" type="email" class=" form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row  mt-2">
                                <label for="password" class=" mt-2">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                          
                              
                            <div class="" style="border-bottom: #101 solid 1px">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="" for="remember">
                                            {{ __('Remember Me') }}
                                </label>

                                <button type="submit" class="content mt-2 mb-2 btn_radius">
                                    {{ __('Login') }} 
                                </button>
                            </div>
                                
                            

                            <div class=" " >
                                    
                                    @if (Route::has('password.request'))
                                        <a class="text btn-no-border" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                              
                                        <h5 class="text"> if you dont have acconut ?</h5>
                                <a class="text btn-no-border"  href="/register">register</a>
                            </div>
                        </form>
                    </div>
                </div>  
            </div>
</div>
@endsection
