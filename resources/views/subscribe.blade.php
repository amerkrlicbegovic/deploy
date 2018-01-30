@extends('layouts.app')

@section('header')
<header class="header header-inverse" style="background-color: #4f407b">
  <div class="container text-center">

    <div class="row">
      <div class="col-12 col-lg-8 offset-lg-2">

        <h1>Preplatite se na naš sajt</h1>
      </div>
    </div>

  </div>
</header>
@stop

@section('content')
<section class="section" id="section-vtab">
    <div class="container text-center">
        <vue-stripe email="{{ auth()->user()->email }}"></vue-stripe>
    </div>
</section>    

@endsection


@section('scripts')
    <script src="https://checkout.stripe.com/checkout.js"></script>
@endsection