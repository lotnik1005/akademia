<div class="container">
    <h2>Dodawanie specjalizacji</h2>
    <form action="{{ action ('SpecializationController@store') }}" method="POST" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="name">Nazwa przedmiotu</label>
            <input type="text" class="form-control" name="name">
        </div>
        <input type="submit" value="Dodaj" class="btn btn-primary">
    </form>
</div>