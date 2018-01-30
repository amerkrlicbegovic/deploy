@extends('layouts.app')

@section('header')
<header class="header header-inverse" style="background-color: #4f407b;">
  <div class="container text-center">

    <div class="row">
      <div class="col-12 col-lg-8 offset-lg-2">

        <h1>Izlistaj kurseve</h1>
        <p class="fs-20 opacity-70">Svi naši kursevi na jednom mjestu</p>

      </div>
    </div>

  </div>
</header>
@stop

@section('content')
  <div class="section bg-grey">
    <div class="container">

      <div class="row gap-y">
        <div class="col-12">          
            <table class="table">
                <thead>
                    <th>Naslov kursa</th>
                </thead>
                <tbody>
                    @forelse($series as $s)
                        <tr>
                            <td><a href="{{ route('series.show', $s->slug) }}">{{ $s->title }}</a></td>
                            <td>
                                <a href="{{ route('series.edit', $s->slug) }}" class="btn btn-info">Edit</a>
                            </td>
                            <td>
                                <a href="{{ route('series.delete', $s->slug) }}" class="btn btn-danger">Obriši</a>
                            </td>
                        </tr>
                    @empty
                        <p class="text-center">Nema epizoda</p>
                    @endforelse
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
@stop