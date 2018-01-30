@extends('layouts.app')

@section('header')
    <!-- Header -->
    <header class="header header-inverse h-fullscreen pb-80" style="background-color: #4f407b">
        <div class="container text-center">

            <div class="row h-full">
                <div class="col-12 col-lg-8 offset-lg-2 align-self-center">

                    <h1 class="display-1 hidden-sm-down">{{ $series->title }}</h1>
                    <h1 class="display-4 hidden-md-up">{{ $series->title }}</h1>
                    <br>
                    <hr class="w-80">
                    <br>
                    @auth
                        @hasStartedSeries($series)
                        <a href="{{ route('series.learning', $series->slug) }}" class="btn btn-xl btn-white w-200 mr-16 btn-round">NASTAVI UČITI</a>
                    @else
                        <a href="{{ route('series.learning', $series->slug) }}" class="btn btn-xl btn-white w-200 mr-16 btn-round">POČNI UČITI</a>
                        @endhasStartedSeries
                        @else
                            <a href="{{ route('series.learning', $series->slug) }}"  class="btn btn-xl btn-white w-200 mr-16 btn-round">POČNI UČITI</a>
                        @endauth
                </div>

                <div class="col-12 align-self-end text-center">
                    <a class="scroll-down-1 scroll-down-inverse" href="#" data-scrollto="section-intro"><span></span></a>
                </div>

            </div>

        </div>
    </header>
    <!-- END Header -->
@endsection

@section('content')
    <section class="section">
      <div class="container">
        <header class="section-header">
          <small><strong>OPIS KURSA</strong></small>
          <h2>O čemu je ovaj kurs?</h2>
          <hr>
        </header>
        
        <div class="row gap-y">
          
          <div class="col-12 offset-md-2 col-md-8 mb-30">
            <p class="text-center">
              {{ $series->description }}
            </p>
          </div>
        </div>

      </div>
    </section>

@endsection