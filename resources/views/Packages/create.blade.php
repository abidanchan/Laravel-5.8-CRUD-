@extends('layouts.app')
@section('content')
<div class="col-md">

<form method="post" action="{{ route('packages.store') }}">
	{{ csrf_field() }}
	<label>
		Title
	<input type="text" name="title">
</label>
<label>
Details
<input type="text" name="details">
</label>
<a href="{{ route('packages.index') }}" class="btn btn-default">Cancel</a>
        <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
@endsection