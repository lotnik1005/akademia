@extends('layouts.frontend')

@section('content')
    <div class="container-fluid places">

        <h1 class="text-center">Moje lekcje</h1>

        @foreach($films->chunk(4) as $chunked_films)

            <div class="row">

                @foreach($chunked_films as $film)

                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail">
                            <iframe width="280" height="215" src="{{ $film->embed }}"></iframe>
                            <div class="caption">
                                <h3>{{ $film->title }}</h3><br>
                                <p>{{ $film->description }}</p>
                                <p><a href="{{ url('films', $film->id) }}" class="btn btn-primary" role="button">Pełny dostęp</a></p>
                            </div>
                        </div>
                    </div>

                @endforeach


            </div>

        @endforeach

    </div>
@endsection