@extends('layouts.app', ['activePage' => 'agences', 'titlePage' => __('Liste des Agences')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header  card-header-success">
                            <p class="card-category"> Voir la liste des agences</p>
                            <a href="{{ route('agenceAddForm') }}" type="button" class="btn btn-sm btn-dark pull-right">
                                <span class="material-icons">add</span>
                                {{ __('Ajouter une Agence') }}
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Code
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th style="width: 50%" class="text-center">
                                            Emplacement
                                        </th>
                                        <th style="width: 16.66%">
                                            Action
                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach ($agences as $key => $value)
                                        <tr id="row_id_{{$value->id}}">
                                            <td>
                                                {{ $value->id }}
                                            </td>
                                            <td>
                                                {{ $value->code }}
                                            </td>
                                            <td>
                                                {{ $value->name }}
                                            </td>
                                            <td>
                                                {{ $value->location }}
                                            </td>
                                            <td>
                                                <a type="button" href="/agences/edit/{{$value->id}}" class=" btn btn-sm btn-outline-info"><span class="material-icons">
                                                    edit
                                                    </span>
                                                </a>
                                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                                <button type="button" data-id="{{ $value->id }}" class=" btn btn-sm btn-outline-danger deleteRecord"><span class="material-icons">
                                                    delete
                                                    </span>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
