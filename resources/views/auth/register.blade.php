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
        <div class="cart_body text">
            <div class="cart">  
            <div class="card-header mb-2">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="content mt-2 mb-2 ">
                                <button type="submit" class="btn_radius">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>  
    
</div>
@endsection
