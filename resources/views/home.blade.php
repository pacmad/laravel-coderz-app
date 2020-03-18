@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-2">
          <div class="card">
            <div class="card-header">Menu</div>
            <div class="card-body">
              <ul class="list-unstyled">
                <li>I miei ticket in carico</li>
                <li>I miei ticket chiusi</li>
                <li>Tutti i ticket aperti</li>
                <li>Tutti i ticket chiusi</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                  <div class="row justify-content-between">
                    <div class="col-md-3">
                      Dashboard - User - {{ Auth::user() -> name }}
                    </div>
                    <div class="col-md-2">
                      <div id="myDropdown" class="dropdown position-relative">
                        <button class="dropbtn">
                          @switch(Auth::user() -> dash_status)
                            @case('lastday')
                                Ultime 24 ore
                                @break

                            @case('lastweek')
                                Ultima settimana
                                @break

                            @case('lastmonth')
                                Ultimo mese
                                @break

                            @case('always')
                                Sempre
                                @break

                        @endswitch
                          <i class="fas fa-sort-down"></i>
                        </button>
                        <div class="dropdown-content d-none position-absolute bg-light z-index-50 border border-top-0 border-dark">
                          <ul class="list-unstyled">
                            <li><a class="text-body" href="{{ route('home', ['query' => 'lastday']) }}">Ultime 24 ore</a></li>
                            <li><a class="text-body" href="{{ route('home', ['query' => 'lastweek']) }}">Ultima settimana</a></li>
                            <li><a class="text-body" href="{{ route('home', ['query' => 'lastmonth']) }}">Ultimo mese</a></li>
                            <li><a class="text-body" href="{{ route('home', ['query' => 'always']) }}">Sempre</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <h3>Statistiche Totali</h3>
                  </div>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="row justify-content-around">
                        <div class="col-md-3 bg-info p-2 text-center">
                            <h2>Ticket totali</h2>
                            <h2>{{ $tickets -> count() }}</h2>
                        </div>
                        <div class="col-md-3 bg-info p-2 text-center">
                            <h2>Ticket risolti</h2>
                            <h2>{{$tickets -> where('solved', 1) -> count()}}</h2>
                        </div>
                        <div class="col-md-3 bg-info p-2 text-center">
                          <h2>Ticket da risolvere</h2>
                          <h2>{{$tickets -> where('solved', 0) -> count()}}</h2>
                        </div>
                    </div>
                    <div class="row justify-content-around mt-4">
                        <div class="col-md-3 p-2 text-center">
                          <canvas id="myChart1" width="400" height="400"></canvas>
                        </div>
                        <div class="col-md-3 p-2 text-center">
                          <canvas id="myChart2" width="400" height="400"></canvas>
                        </div>
                        <div class="col-md-3 p-2 text-center">
                          <canvas id="myChart3" width="400" height="400"></canvas>
                        </div>
                    </div>
                    <div class="row">
                      <h3>Statistiche Personali</h3>
                    </div>
                    <div class="row justify-content-around">
                        <div class="col-md-3 bg-info p-2 text-center">
                            <h2>Ticket totali</h2>
                            <h2>{{ $tickets -> count() }}</h2>
                        </div>
                        <div class="col-md-3 bg-info p-2 text-center">
                            <h2>Ticket risolti</h2>
                            <h2>{{$tickets -> where('solved', 1) -> count()}}</h2>
                        </div>
                        <div class="col-md-3 bg-info p-2 text-center">
                          <h2>Ticket da risolvere</h2>
                          <h2>{{$tickets -> where('solved', 0) -> count()}}</h2>
                        </div>
                    </div>
                    <div class="row justify-content-around mt-4">
                        <div class="col-md-3 p-2 text-center">
                          <canvas id="myChart4" width="400" height="400"></canvas>
                        </div>
                        <div class="col-md-3 p-2 text-center">
                          <canvas id="myChart5" width="400" height="400"></canvas>
                        </div>
                        <div class="col-md-3 p-2 text-center">
                          <canvas id="myChart6" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
