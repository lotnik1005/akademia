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
                <ul class="nav nav-tabs" role="tablist">
                    <li class="active"><a href="#tab01" aria-controls="tab01" role="tab" data-toggle="tab">Moje lekcje</a></li>

                    <li><a href="#tab02" aria-controls="tab02" role="tab" data-toggle="tab">O mnie</a></li>

                    <li><a href="#tab03" aria-controls="tab03" role="tab" data-toggle="tab">Dane kontaktowe</a></li>
                </ul>

                


                    <div class="tab-pane" id="tab02" role="tabpanel">
                        <div class="tab-pane-item">
                            <h2>O mnie</h2>
                            <p>Nauczyciel z wieloletnim doświadczeniem</p>
                        </div>
                    </div>

                    <div class="tab-pane" id="tab03" role="tabpanel">
                        <div class="tab-pane-item">
                            <h2>Adres</h2>
                            <p>21-500 Biała Podlaska, ul. Brzeska 0</p>
                        </div>
                        <div class="tab-pane-item">
                            <h2>Telefon</h2>
                            <p>0000000000</p>
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