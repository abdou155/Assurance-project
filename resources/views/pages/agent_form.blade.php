@extends('layouts.app', ['activePage' => 'agents', 'titlePage' => __('Agent Form')])
{{-- TODO  --}}
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" @if ($context == 'update')
                    action="{{ route('agentUpdate') }}"
                    @else
                        action="{{ route('agentStore') }}"
                    @endif
                 autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('post')


                        @if ($context == 'update')
                            <input hidden type="text" name="id" value="{{$agence->id}}">
                        @endif

                        <div class="card ">
                            <div class="card-header card-header-success">
                                @if ($context == 'update')
                                <h4 class="card-title">{{ __('Modifier un agent') }}</h4>
                                @else
                                    <h4 class="card-title">{{ __('Ajouter un agent') }}</h4>
                                @endif
                            </div>
                            <div class="card-body ">
                                <div class="row justify-content-center">
                                    <div class="col-sm-6">
                                        <label class="">{{ __('Nom') }}</label>
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                name="name" id="input-name" type="text" required="true"
                                                aria-required="true" />
                                            @if ($errors->has('name'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="">{{ __('Prenom') }}</label>
                                        <div class="form-group{{ $errors->has('family_name') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('family_name') ? ' is-invalid' : '' }}"
                                                name="family_name" id="input-family_name" type="text" required="true"
                                                aria-required="true" />
                                            @if ($errors->has('family_name'))
                                                <span id="family_name-error" class="error text-danger"
                                                    for="input-family_name">{{ $errors->first('family_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-sm-6">
                                        <label class="">{{ __('Email') }}</label>
                                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                name="email" id="input-email" type="text" required="true"
                                                aria-required="true" />
                                            @if ($errors->has('email'))
                                                <span id="email-error" class="error text-danger"
                                                    for="input-email">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="">{{ __('Titre') }}</label>
                                        <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                            <select class="form-control" data-style="btn btn-link" name="title"
                                                aria-label="Default select example" required>
                                                <option disabled selected>-- Choisir un titre --</option>
                                                @foreach ($titleList as $key => $value)
                                                    <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('title'))
                                                <span id="title-error" class="error text-danger"
                                                    for="input-title">{{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-sm-6">
                                        <label class="">{{ __('Agence') }}</label>
                                        <div class="form-group{{ $errors->has('agence') ? ' has-danger' : '' }}">
                                            <select class="form-control " data-style="btn btn-link" name="agence"
                                                aria-label="Default select example" required>
                                                <option disabled selected>-- Affecter à une agence --</option>
                                                @foreach ($agenceList as $key => $value)
                                                    <option value="{{$key}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('agence'))
                                                <span id="agence-error" class="error text-danger"
                                                    for="input-agence">{{ $errors->first('agence') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="">{{ __('Genre') }}</label>
                                        <div class="form-group{{ $errors->has('genre') ? ' has-danger' : '' }}">
                                            <div class="form-check form-check-radio">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="genre"
                                                        id="exampleRadios1" value="female">
                                                    Female
                                                    <span class="circle">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-radio">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="genre"
                                                        id="exampleRadios2" value="male" checked>
                                                    Male
                                                    <span class="circle">
                                                        <span class="check"></span>
                                                    </span>
                                                </label>
                                            </div>
                                            @if ($errors->has('genre'))
                                                <span id="genre-error" class="error text-danger"
                                                    for="input-genre">{{ $errors->first('genre') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer justify-content-end mr-5">
                                <button type="submit" class="btn btn-success">{{ __('Enregistrer') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
