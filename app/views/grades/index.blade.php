@if(Session::has('message'))
<p class="alert">{{ Session::get('message') }}</p>
@endif
@if(Session::has('error'))
<p class="alert">{{ Session::get('error') }}</p>
@endif
<table id="table_grades" border="5">

<thead>
<tr>
<th>id przedmiotu</th><th>wartość</th><th>waga</th><th>grupa</th>
</tr>
</thead>

<tbody>
@foreach($grades as $key => $value)
<tr>
    <td>{{ $value->subject_id}}</td>
    <td>{{ $value->value }}</td>
    <td>{{ $value->weight }}</td>
    <td>{{ $value->group }} </td>
    //<td>{{ $value->id }}</td>
    <!-- we will also add show, edit, and delete buttons -->
    <td>

        <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
        <a class="btn btn-small btn-success" href="{{ URL::to('grades/show/' . $value->id) }}">Show Grade</a>

    </td>
</tr>
@endforeach
</tbody>
</table>
<script type="text/javascript"> $(document).ready(function()
{
$("#table_grades").tablesorter();
}
);
</script>
