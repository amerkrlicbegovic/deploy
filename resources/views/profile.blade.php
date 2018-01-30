@extends('layouts.app')

@section('header')
<header class="header header-inverse" style="background-color: #4f407b">
  <div class="container text-center">

    <div class="row">
      <div class="col-12 col-lg-8 offset-lg-2">

        <h1>{{ auth()->user()->name  }}</h1>
        <br>
        <h1>{{ $user->getTotalNumberOfCompletedLessons() }}</h1>
        <p class="fs-20 opacity-70">Kurseva završeno</p>
      </div>
    </div>

  </div>
</header>
@stop

@section('content')
<section class="section" id="section-vtab">
    <div class="container">
        <header class="section-header">
        <h2>Kurseve koje gledaš ...</h2>
        <hr>
        </header>


        <div class="row gap-y">
            @forelse($series as $s)
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="card-header-overlay">
                        </div>
                        <div class="card-block">
                            <h2 class="card-title fw-600">{{ $s->title }}</h2>
                            <p class="card-text">{{ str_limit($s->description , 140)}}</p>
                            <a class="fw-600 fs-12" href="{{ route('series', $s->slug) }}">Saznaj više<i class="fa fa-chevron-right fs-9 pl-8"></i></a>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>


    </div>
</section>    

@if(auth()->id() === $user->id)
@php 
$subscription = auth()->user()->subscriptions->first();
@endphp 
<section class="section bg-gray" id="section-vtab">
    <div class="container">
        <header class="section-header">
        <h2>Izmjeni svoj profil</h2>
        <hr>
        </header>


        <div class="row gap-5">
        

        <div class="col-12 col-md-4">
            <ul class="nav nav-vertical">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home-2">
                <h6>Lični detalji</h6>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#messages-2">
                <h6>Plačanja i Preplate</h6>
                </a>
            </li>
            @if(auth()->user()->card_brand)
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#settings-2">
                <h6>Detalji kartice</h6>
                </a>
            </li>
            @endif 
            </ul>
        </div>


        <div class="col-12 col-md-8 align-self-center">
            <div class="tab-content">
            
            <div class="tab-pane fade show active" id="home-2">
                <form action="{{ route('series.store')  }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input class="form-control form-control-lg" type="text" name="name" placeholder="Vaše ime">
                        </div>
                        <div class="form-group">
                            <input class="form-control form-control-lg" type="text" name="email" placeholder="Vaš email">
                        </div>

                        <button class="btn btn-lg btn-primary btn-block" type="submit">Spasi promjene</button>
                    </form>
            </div>

            <div class="tab-pane fade text-center" id="profile-2">
                
            </div>

            <div class="tab-pane fade" id="messages-2">
                <form action="{{ route('subscriptions.change') }}" method="post">
                    {{ csrf_field() }}
                    <h5 class="text-center">
                       Vaš trenutni plan:
                        @if($subscription)
                        <span class="badge badge-success">{{ $subscription->stripe_plan }}</span>
                        @else 
                        <span class="badge badge-danger">NEMA PLANA</span>
                        @endif 
                    </h5>
                    <br>
                    @if($subscription)
                    <select name="plan" class="form-control">
                        <option value="monthly">Mjesečno</option>
                        <option value="yearly">Godišnje</option>
                    </select>
                    <br>
                    <p class="text-center">
                        <button class="btn btn-primary" type="submit">Promjeni plan</button>
                    </p>
                    @endif
                    
                </form>
            </div>

            @if(auth()->user()->card_brand)
            <div class="tab-pane fade" id="settings-2">
                <div class="row">
                    <h2 class="text-center">
                        Vaša trenutna kartica: <span class="badge badge-sm badge-primary">{{ auth()->user()->card_brand }}:{{ auth()->user()->card_last_four }}</span>
                    </h2>
                    <p class="ml-5 mt-5 text-center">
                        <vue-update-card email="{{ auth()->user()->email }}"></vue-update-card>
                    </p>
                </div>
            </div>
            @endif 

            </div>
        </div>


        </div>


    </div>
</section>
@endif

@endsection

@section('scripts')
    <script src="https://checkout.stripe.com/checkout.js"></script>
@endsection
