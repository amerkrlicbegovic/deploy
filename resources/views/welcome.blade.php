@extends('layouts.app')

@section('header')
    <!-- Header -->
    <header class="header header-inverse h-fullscreen pb-80" style="background-color: #4f407b">
        <div class="container text-center">

            <div class="row h-full">
                <div class="col-12 col-lg-8 offset-lg-2 align-self-center">

                    <h1 class="display-1 hidden-sm-down">KLIKŠKOLA</h1>
                    <h1 class="display-4 hidden-md-up">KLIKŠKOLA</h1>
                    <br>
                    <p class="fs-20 w-400 mx-auto hidden-sm-down">Besplatni online kursevi</p>
                    <p class="fs-16 w-250 mx-auto hidden-md-up">Besplatni online kursevi</p>

                    <hr class="w-80">
                    <br>

                    <a class="btn btn-xl btn-round btn-white w-200 hidden-sm-down" href="{{ route('all-series') }}">Lista kurseva</a>
                    <a class="btn btn-lg btn-round btn-white w-200 hidden-md-up" href="{{ route('all-series') }}">Lista kurseva</a>

                </div>

                <div class="col-12 align-self-end text-center">
                    <a class="scroll-down-1 scroll-down-inverse" href="#" data-scrollto="section-intro"><span></span></a>
                </div>

            </div>

        </div>
    </header>
    <!-- END Header -->

    <section class="section">
        <div class="container">
            <header class="section-header">
                <h2>Kategorije</h2>
            </header>

            <div class="row gap-y">

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card card-bordered card-hover-shadow text-center">
                        <div class="card-block">
                            <p><i class="icon-mobile fs-50 text-muted"></i></p>
                            <h4 class="card-title">Mobilni development</h4>
                        </div>
                    </div>
                </div>


                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card card-bordered card-hover-shadow text-center">
                        <div class="card-block">
                            <p><i class="icon-gears fs-50 text-muted"></i></p>
                            <h4 class="card-title">Server konfiguracija</h4>
                        </div>
                    </div>
                </div>


                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card card-bordered card-hover-shadow text-center">
                        <div class="card-block">
                            <p><i class="icon-tools fs-50 text-muted"></i></p>
                            <h4 class="card-title">UI/UX Dizajn</h4>
                        </div>
                    </div>
                </div>


                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card card-bordered card-hover-shadow text-center">
                        <div class="card-block">
                            <p><i class="icon-recycle fs-50 text-muted"></i></p>
                            <h4 class="card-title">Programiranje</h4>
                        </div>
                    </div>
                </div>


                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card card-bordered card-hover-shadow text-center">
                        <div class="card-block">
                            <p><i class="icon-browser fs-50 text-muted"></i></p>
                            <h4 class="card-title">Web Dizajn</h4>
                        </div>
                    </div>
                </div>


                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card card-bordered card-hover-shadow text-center">
                        <div class="card-block">
                            <p><i class="icon-paintbrush fs-50 text-muted"></i></p>
                            <h4 class="card-title">Grafički Dizajn</h4>
                        </div>
                    </div>
                </div>


                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card card-bordered card-hover-shadow text-center">
                        <div class="card-block">
                            <p><i class="icon-piechart fs-50 text-muted"></i></p>
                            <h4 class="card-title">Data Analiza</h4>
                        </div>
                    </div>
                </div>


                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card card-bordered card-hover-shadow text-center">
                        <div class="card-block">
                            <p><i class="icon-newspaper fs-50 text-muted"></i></p>
                            <h4 class="card-title">Microsoft Office</h4>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('content')

    <section class="section bg-gray">
        <div class="container">
            <header class="section-header">
                <small>Kursevi</small>
                <h2>Izaberite svoj besplatni kurs i počnite</h2>
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

    </section>

@endsection