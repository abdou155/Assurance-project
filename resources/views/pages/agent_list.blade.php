@extends('layouts.app', ['activePage' => 'agents', 'titlePage' => __('Liste des Agents')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header  card-header-success">
            <p class="card-category"> Voir la liste des agents</p>
            <a href="{{ route('agentAddForm') }}" type="button" class="btn btn-sm btn-dark pull-right">
                <span class="material-icons">add</span>
                {{ __('Ajouter un agent') }}
            </a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    Matricule
                  </th>
                  <th>
                    Nom
                  </th>
                  <th>
                    Prénom
                  </th>
                  <th>
                    Email
                  </th>
                  <th>
                    Titre
                  </th>
                  <th>
                    Agence
                  </th>
                  <th>
                    Action
                  </th>
                </thead>
                <tbody>
                    @foreach ($agents as $key => $value)
                    <tr id="row_id_{{$value->id}}">
                        <td>
                            {{ $value->id }}
                        </td>
                        <td>
                            {{ $value->profile->name }}
                        </td>
                        <td>
                            {{ $value->profile->family_name }}
                        </td>
                        <td>
                            {{ $value->email }}
                        </td>
                        <td>
                            {{ $value->profile->title }}
                        </td>
                        <td>
                            {{ $value->profile->agence->name }}
                        </td>
                        <td>
                            {{-- TODO --}}
                            {{-- <a type="button" href="/agents/edit/{{$value->id}}" class=" btn btn-sm btn-outline-info"><span class="material-icons">
                                edit
                                </span>
                            </a> --}}
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <button type="button" data-id="{{ $value->id }}" class=" btn btn-sm btn-outline-danger deleteAgent"><span class="material-icons">
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
