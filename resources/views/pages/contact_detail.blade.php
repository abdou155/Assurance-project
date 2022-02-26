@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Information de contact')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h2>
                                <strong>{{$contact->subject}}</strong>
                            </h2>
                            <small>
                            From: {{$contact->name}}
                            </small>
                            <small>
                            Email: {{$contact->email}}
                            </small>
                            <hr>
                            <b>Message</b>
                            <p>{{$contact->message}}</p>

                        </div>
                        <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">date_range</i> {{$contact->created_at}}
                        </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection
