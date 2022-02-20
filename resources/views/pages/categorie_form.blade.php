@extends('layouts.app', ['activePage' => 'categories', 'titlePage' => __('Categorie Form')])
{{-- TODO  --}}
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" @if ($context == 'update')
                    action="{{ route('categorieUpdate') }}"
                    @else
                        action="{{ route('categorieStore') }}"
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
                                <h4 class="card-title">{{ __('Modifier categorie') }}</h4>
                                @else
                                    <h4 class="card-title">{{ __('Ajouter categorie') }}</h4>
                                @endif
                            </div>
                            <div class="card-body ">
                                <div class="row justify-content-center">
                                    <div class="col-sm-6">
                                        <label class="">{{ __('Titre') }}</label>
                                        <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('tile') ? ' is-invalid' : '' }}"
                                                name="title" id="input-title" type="text" required="true"
                                                aria-required="true" />
                                            @if ($errors->has('title'))
                                                <span id="title-error" class="error text-danger"
                                                    for="input-title">{{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="">{{ __('Image') }}</label>
                                        <div class="form-group form-file-upload form-file-simple">
                                            <input type="text" class="form-control inputFileVisible" placeholder="image upload...">
                                            <input type="file" name="thumb" class="inputFileHidden">
                                         </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-sm-12">
                                        <label class="">{{ __('Email') }}</label>
                                        <div class="form-group">
                                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
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
