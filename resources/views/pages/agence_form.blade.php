@extends('layouts.app', ['activePage' => 'agences', 'titlePage' => __('Agence Form')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post"
                    @if ($context == 'update')
                        action="{{ route('agenceUpdate') }}"
                    @else
                        action="{{ route('agenceStore') }}"
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
                                    <h4 class="card-title">{{ __('Modifier une agence') }}</h4>
                                @else
                                    <h4 class="card-title">{{ __('Ajouter une agence') }}</h4>
                                @endif
                            </div>
                            <div class="card-body ">
                                <div class="row justify-content-center">
                                    <div class="col-sm-6">
                                        <label class="">{{ __('Nom') }}</label>
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                name="name" id="input-name" type="text" required="true" aria-required="true"
                                                @if ($context == 'update')
                                            value="{{ $agence->name }}"
                                            @endif
                                            />
                                            @if ($errors->has('name'))
                                                <span id="name-error" class="error text-danger"
                                                    for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="">{{ __('Code') }}</label>
                                        <div class="form-group{{ $errors->has('code') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}"
                                                name="code" id="input-code" type="text" required="true" aria-required="true"
                                                @if ($context == 'update')
                                            value="{{ $agence->code }}"
                                            @endif
                                            />
                                            @if ($errors->has('code'))
                                                <span id="code-error" class="error text-danger"
                                                    for="input-code">{{ $errors->first('code') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-sm-12">
                                        <label class="">{{ __('Emplacement') }}</label>
                                        <div class="form-group{{ $errors->has('location') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}"
                                                name="location" id="input-location" type="text" required="true"
                                                aria-required="true" @if ($context == 'update')
                                            value="{{ $agence->location }}"
                                            @endif
                                            />
                                            @if ($errors->has('location'))
                                                <span id="location-error" class="error text-danger"
                                                    for="input-location">{{ $errors->first('location') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer justify-content-end mr-5">
                                <button type="submit" class="btn btn-success">
                                    @if ($context == 'update')
                                        {{ __('Modifier') }}
                                    @else
                                        {{ __('Enregistrer') }}
                                    @endif
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
