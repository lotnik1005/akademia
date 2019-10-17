<div class="container">
    <h2>Studenci</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Imię</th>
                <th>Nazwisko</th>
            </tr>
        </thead>
        <tbody>
            @foreach($studentsList as $student)
                <tr>
                    <th scope="row">{{ $student->id }}</th>
                    <th><a href="{{ URL::to('students/' . $student->id) }}">{{ $student->name }}</a></th>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>