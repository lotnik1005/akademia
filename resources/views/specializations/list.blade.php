@extends('layouts.frontend')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dodawanie przedmiotu do nauczyciela</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ action('SpecializationController@store') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('specializations') ? ' has-error' : '' }}">
                                <label for="specializations" class="col-md-4 control-label">Dodaj nowy przedmiot</label>

                                <div class="col-md-6">
                                    <input id="specializations" type="text" class="form-control" name="specializations" value="{{ old('specializations') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('specializations') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Dodaj
                                    </button>
                                </div>
                            </div>
                        </form>
                        <form class="form-horizontal" role="form" method="POST" action="{{ action('TutorsController@store') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="userid" value="{{ Auth::user()->id }}">
                            <label for="specializations" class="col-md-4 control-label">Wybierz i zapisz swoje specjalizacje</label>
                            <div class="form-group">
                                <div class="col-md-6">
                                    @foreach($specializations as $specialization)
                                        {{ $specialization->id }}
                                            @if($tutor->specializations->contains($specialization->id))
                                                <input id="specializations[]" type="checkbox" class="form-check-inline" name="specializations[]" value="{{ $specialization->id }}" checked>{{ $specialization->name }}
                                            @else
                                                <input id="specializations[]" type="checkbox" class="form-check-inline" name="specializations[]" value="{{ $specialization->id }}">{{ $specialization->name }}
                                            @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Zapisz
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
