<div class="container">
    <h2>Dodawanie wizyty</h2>
    <form action="{{ action('VisitsController@store') }}" method="POST" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label for="name">Nauczyciel:</label>
            <select name="tutor">
                @foreach($tutors as $tutor)
                    <option value="{{ $tutor->id }}">{{ $tutor->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="name">Student:</label>
            <select name="student">
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="name">Data wizyty:</label>
            <input type="text" class="form-control" name="date">
        </div>

        <input type="submit" value="Dodaj" class="btn btn-primary">
    </form>
</div>