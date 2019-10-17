@extends('layouts.frontend')

@section('content')
<div class="container-fluid places">
    <div class="col-xs-12 videos-header card">
        <h2>{{ $film->title }}</h2>
    </div>

    <div class="row">

        <!-- left col. -->
        <div class="col-xs-12 col-md-9 single-video-left">

            <div class="card">

                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="{{ $film->embed }}?showinfo=0" frameborder="0" allowfullscreen></iframe>
                </div>
            
                <div class="single-video-content">
                    <div class="categories">
                        <h4>Kategorie</h4>
                        <span>
                        <a href="">Nauki ścisłe</a>,&nbsp;
                        <a href="">Matematyka</a>,&nbsp;
                        </span>
                    </div>
                    <h4>Pełny opis</h4>
                    <p>{{ $film->description }}</p>
                    <span class="upper-label">Dodał</span>
                    <span class="video-author">Jan Kowalski</span>
                </div>
                
            </div>
            
        </div>

        <!-- right col. -->
        <div class="col-xs-12 col-md-3 single-video-right">
            
            <!-- pojedynczy box -->
            <div class="card">
                <div class="right-col-box">
                    <h4>Udostępnij</h4>
                    <div class="social-icons">
                        <i class="fa fa-facebook-official"></i>
                        <i class="fa fa-twitter-square"></i>
                        <i class="fa fa-google-plus-square"></i> 
                        <i class="fa fa-youtube-square"></i>
                    </div>
                </div>
            </div>

            <!-- pojedynczy box -->
            <div class="card">
                <div class="right-col-box categories-box">
                    <h4>Popularne kategorie</h4>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <h5>Matematyka</h5>
                            <span>234 filmów</span>
                        </li>
                        <li class="list-group-item">
                            <h5>Fizyka</h5>
                            <span>87 filmów</span>
                        </li>
                        <li class="list-group-item">
                            <h5>Informatyka</h5>
                            <span>56 filmów</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- pojedynczy box -->
            <div class="card">
                <div class="right-col-box">
                    <h4>Statystyki</h4>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span class="badge">1342</span>Filmów
                        </li>
                        <li class="list-group-item">
                            <span class="badge">18</span>Kategorii
                        </li>
                        <li class="list-group-item">
                            <span class="badge">7800</span>Użytkowników
                        </li>
                        <li class="list-group-item">
                            <span class="badge">832</span>Komentarzy
                        </li>
                    </ul>                            
                </div>
            </div>

        </div>

    </div>
</div>
@endsection