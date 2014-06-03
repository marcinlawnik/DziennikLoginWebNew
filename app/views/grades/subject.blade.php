@include('dashboard.header')
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//cdn.jsdelivr.net/tablesorter/2.16.3/js/jquery.tablesorter.min.js"></script>

@include('includes.messages')

@if (count($grades) >= 1)
{{-- I have multiple records! --}}
<script type="text/javascript"> $(document).ready(function()
        {
            $("#table_grades").tablesorter();
        }
    );
</script>

<div class="container">
<div class="row">
<div class="col-sm-12 col-md-12">
    <div class="well">
        <h1>{{ $subject }}, średnia {{ $average}}</h1>
        <table class="table table-striped" id="table_grades">
            <thead>
            <tr>
                <th>Ocena</th>

                <th>Waga</th>

                <th>Grupa</th>

                <th>Tytuł</th>

                <th>Skrót</th>

                <th>Data</th>

                <th>Przedmiot</th>
            </tr>
            </thead>

            <tbody>
            @foreach($grades as $key => $value)
            <tr>
                <td><span>{{ $value->value }}</span></td>
                <td><span>{{ $value->weight }}</span></td>
                <td><span>{{ $value->group }}</span></td>
                <td><span>{{ $value->title }}</span></td>
                <td><span>{{ $value->abbreviation }}</span></td>
                <td><span>{{ $value->date }}</span></td>
                <td><span>{{ $value->subject->name  }}</span></td>
                <td>
                    <span><a class="btn btn-small btn-success" href="{{ URL::to('grades/show/' . $value->id) }}">Szczegóły</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
@else
<p>Wiadomość jakaś, że nie ma ocen!</p>
@endif
