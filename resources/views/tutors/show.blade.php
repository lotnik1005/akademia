@extends('layouts.frontend')

@section('content')
    <section id="feature" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="section-title">
                        <h1>O mnie</h1>
                    </div>
                </div>

                <div class="col-md-8 col-sm-8">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Moje lekcje</a></li>
                        <li><a data-toggle="tab" href="#menu1">O mnie</a></li>
                        <li><a data-toggle="tab" href="#menu2">Dane kontaktowe</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <h3>Moje lekcje</h3>
                            <p>Matematyka, fizyka</p>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <h3>O mnie</h3>
                            <p>Nauczyciel z wieloletnim doświadczeniem</p>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <h3>Dane kontaktowe</h3>
                            <p>21-500 Biała Podlaska, ul. Brzeska 0</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-4 col-sm-4">
                <div class="feature-image">
                    <img src="{{ url('user-avatar/'. $users->id . '/600') }}" class="img-responsive" alt="">
                </div>
            </div>

            @foreach($relations as $relation)
                {{ $relation->films->id->name }}
            @endforeach

        </div>
        </div>
    </section>
@endsection
