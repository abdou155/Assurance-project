@extends('layouts.app', ['activePage' => 'services', 'titlePage' => __('Liste des Services')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('serviceAddForm') }}" type="button" class="btn btn-sm btn-dark pull-right">
                        <span class="material-icons">add</span>
                        {{ __('Ajouter un service') }}
                    </a>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Title
                                        </th>
                                        <th>
                                            Cout
                                        </th>
                                        <th class="">
                                            Categorie
                                        </th>
                                        <th style="width: 16.66%">
                                            Détails
                                        </th>
                                        <th style="width: 16.66%">
                                            Action
                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach ($services as $key => $value)
                                        <tr id="row_id_{{$value->id}}">
                                            <td>
                                                {{ $value->id }}
                                            </td>
                                            <td>
                                                {{ $value->title }}
                                            </td>
                                            <td>
                                                {{ $value->price }}
                                            </td>
                                            <td>
                                                {{ $value->categorie->title }}
                                            </td>
                                            <td>
                                                <a t href="/services/show/{{$value->id}}">Plus d'info</a>
                                            </td>
                                            <td>
                                                {{-- <a type="button" href="/agences/edit/{{$value->id}}" class=" btn btn-sm btn-outline-info"><span class="material-icons">
                                                    edit
                                                    </span>
                                                </a> --}}
                                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                                <button type="button" data-id="{{ $value->id }}" class=" btn btn-sm btn-outline-danger deleteService"><span class="material-icons">
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
