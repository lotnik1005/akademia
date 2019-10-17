<div class="container">
    <h2>Wizyty</h2>
    <a href="{{ URL::to('visits/create') }}">Dodaj nową wizytę</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Student</th>
                <th>Korepetytor</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($visits as $visit)
            <tr>
                <th scope="row">{{ $visit->id }}</th>
                <th>{{ $visit->tutor->name}}</th>
                <th>{{ $visit->student->surname }}</th>
                <th>{{ $visit->date }}</th>
                <th></th>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>