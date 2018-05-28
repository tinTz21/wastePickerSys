@extends('layouts.callpicker')

@section('content')
<h3 style="text-align: center;">Please search your location by typing below:</h3>
<form action="/wastePickerSys/public/search" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="q"
            placeholder="Search picker"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span> 
            </button>
        </span>
    </div>
</form>
@if(isset($details))
	<p>The search results for your query <b> {{ $query }} </b> are :</p>
	<h1 style="text-align: center;"> WastePicker'(s) found: </h1>
		<table class="table table-stripped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Location</th>
					<th>Phone</th>
					<th>plate Number</th>
					<th>email</th>
				</tr>
			</thead>
			<tbody>
				@foreach($details as $user)
					<tr>
						<td> {{ $user->name }} </td>
						<td> {{ $user->address }} </td>
						<td> {{ $user->phone }} </td>
						<td> {{ $user->plate }} </td>
						<td> {{ $user->email }} </td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@endif
@endsection