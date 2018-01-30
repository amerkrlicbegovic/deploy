@extends('layouts.app')

@section('header')
<header class="header header-inverse" style="background-color: #4f407b">
  <div class="container text-center">

    <div class="row">
      <div class="col-12 col-lg-8 offset-lg-2">

        <h1>Šta želite sljedeće naučiti? !</h1>
      </div>
    </div>

  </div>
</header>
@stop

@section('content')
<section class="section" id="section-vtab">
    <div class="container">
        <header class="section-header">
        <h2>Evo svih zabavnih kurseva!</h2>
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

</section>

@endsection
