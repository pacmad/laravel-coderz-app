@extends('layouts.app_inside')

@section('body')
<div class="">
    <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="row">
            <div class="col-md-12">
              <ul class="list-unstyled d-flex justify-content-end">
                  <li><a class="rounded-pill bg-danger p-1 text-white" href="{{ route(Request::path(), ['query' => 'lastday', 'user' => Auth::id()]) }}">Ultime 24 ore</a></li>
                  <li><a class="rounded-pill bg-danger p-1 text-white" href="{{ route(Request::path(), ['query' => 'lastweek', 'user' => Auth::id()]) }}">Ultima settimana</a></li>
                  <li><a class="rounded-pill bg-danger p-1 text-white" href="{{ route(Request::path(), ['query' => 'lastmonth', 'user' => Auth::id()]) }}">Ultimo mese</a></li>
                  <li><a class="rounded-pill bg-danger p-1 text-white" href="{{ route(Request::path(), ['query' => 'always', 'user' => Auth::id()]) }}">Sempre</a></li>
              </ul>
            </div>
          </div>
            <div class="row">
                <div class="col-md-10 text-white">
                    <h3>Statistiche Totali</h3>
                </div>
            </div>
            <div class="row justify-content-between mt-4 text-white">
                <div class="col-md-3">
                  <div class="bg-color1 shadow-sm p-2 text-center rounded shadow-lg">
                    <p class="text-right m-0">Ticket totali</p>
                    <h5 class="text-right"><a href="{{route('tickets', ['query' => Auth::user() -> dash_status, 'user' => Auth::id()])}}">{{ $tickets -> count() }}</a></h5>
                    <canvas id="myChart1" width="400" height="300"></canvas>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="bg-color1 shadow-sm p-2 text-center rounded shadow-lg">
                    <p class="text-right m-0">Ticket risolti</p>
                    <h5 class="text-right">{{$tickets -> where('solved', 1) -> count()}}</h5>
                    <canvas id="myChart2" width="400" height="300"></canvas>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="bg-color1 shadow-sm p-2 text-center rounded shadow-lg">
                    <p class="text-right m-0">Ticket da risolvere</p>
                    <h5 class="text-right">{{$tickets -> where('solved', 0) -> count()}}</h5>
                    <canvas id="myChart3" width="400" height="300"></canvas>
                  </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-10 text-white">
                    <h3>Statistiche Personali</h3>
                </div>
            </div>
            <div class="row justify-content-between mt-4 text-white">
                <div class="col-md-3">
                    <div class="bg-color1 p-2 text-center rounded shadow-lg">
                      <p class="text-right m-0">Ticket totali</p>
                      <h5 class="text-right">{{ $tickets -> count() }}</h5>
                      <canvas id="myChart4" width="400" height="300"></canvas>
                    </div>
                </div>
                <div class="col-md-3">
                  <div class="bg-color1 p-2 text-center rounded shadow-lg">
                    <p class="text-right m-0">Ticket risolti</p>
                    <h5 class="text-right">{{$tickets -> where('solved', 1) -> count()}}</h5>
                    <canvas id="myChart5" width="400" height="300"></canvas>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="bg-color1 p-2 text-center rounded shadow-lg">
                    <p class="text-right m-0">Ticket da risolvere</p>
                    <h5 class="text-right">{{$tickets -> where('solved', 0) -> count()}}</h5>
                    <canvas id="myChart6" width="400" height="300"></canvas>
                  </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-10 text-white">
                    <h3>Ticket assegnati</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
