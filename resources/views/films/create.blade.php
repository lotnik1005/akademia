@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dodawanie filmu</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ action('FilmsController@store') }}">
                        @csrf
                        <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="form-group">
                            <label for="tytul" class="col-md-4 col-form-label text-md-right">{{ __('Tytuł') }}</label>

                            <div class="col-md-6">
                                <input id="tytul" type="text" class="form-control" name="tytul" value="{{ old('tytul') }}" required autofocus>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="opis" class="col-md-4 col-form-label text-md-right">{{ __('Opis') }}</label>

                            <div class="col-md-6">
                                <textarea id="opis" name="opis" class="form-control" required cols="4" rows="5"></textarea>
                                <!--<input id="opis" type="text" class="form-control" name="opis" required>-->
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="link" class="col-md-4 col-form-label text-md-right">{{ __('URL filmu') }}</label>

                            <div class="col-md-6">
                                <input id="link" type="text" class="form-control" name="link" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Zapisz') }}
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
