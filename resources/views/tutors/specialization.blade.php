@extends('layouts.frontend')

@section('content')

<div class="container-fluid places">

        @if($tutors_specializations == null)
            <p class="text-center red bolded">Nie znaleziono ofert spełniających podane kryteria</p>
        @endif
        <h1 class="text-center">Nasi korpetytorzy</h1>

        @foreach($tutors_specializations->chunk(4) as $tutors_specializations_chunked)

            <div class="row">

                @foreach($tutors_specializations_chunked as $tutor)

                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail">
                            <img class="img-responsive" src="{{ url('user-avatar/'. $tutor->id . '/600') }}" alt="...">
                            <div class="caption">
                                <h3>{{ $tutor->name }} <br />{{ $tutor->surname }}  <br /><small>
                                    </small> </h3>
                                <p><a href="{{ route('tutor', ['id'=>$tutor->id]) }}" class="btn btn-primary" role="button">Szczegóły</a></p>
                            </div>
                        </div>
                    </div>

                @endforeach


            </div>

        @endforeach

    </div>

@endsection