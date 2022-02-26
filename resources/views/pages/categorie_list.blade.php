@extends('layouts.app', ['activePage' => 'categories', 'titlePage' => __('Liste des Catégories')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <a href="{{route('categorieAddForm')}}" type="button" class="btn btn-lg btn-outline-dark w-100">
                        <span class="material-icons">
                            add
                        </span>
                        Ajouter Catégorie
                    </a>
                </div>
              </div>
              <hr>
              @foreach ($categories as $key => $value)
              <div class="row" id="categorie">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-text card-header-success">
                          <div class="card-text">
                            <h4 class="card-title">{{ $value->title}}</h4>
                          </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-11">
                                    {{$value->description}}
                                </div>
                                <div class="col-1">
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                    <button type="button" data-id="{{ $value->id }}" class=" btn btn-sm btn-danger deleteCategorie"><span class="material-icons">
                                        delete
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              @endforeach
            </div>
        </div>
    </div>
@endsection
