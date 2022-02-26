@extends('layouts.app', ['activePage' => 'services', 'titlePage' => __('Information de service')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h2>
                                <strong>{{$service->title}}</strong>
                            </h2>
                            <small>
                            Cout: {{$service->price}}
                            </small>
                            <hr>
                            <b>Description</b>
                            <p>{{$service->description}}</p>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection
