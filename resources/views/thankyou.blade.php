@extends('layouts.app')

@section('content')
    
        <div class="content" style="margin-top:300px;">
            <div >
            <h2 class="text descript">Thank you! for your order</h2>

            <a href="/" class="text btn-no-border">back to store</a>
            </div>
           
                @include('inc.footer')
        </div>
    {{-- </div> --}}
@endsection