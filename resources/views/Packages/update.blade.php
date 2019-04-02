 @extends('layouts.app')
 
@section('content')
 </h2>
    <hr>
 
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if($package->id==null)
    {{route('login')}}
    @else
    <form method="post" action="{{ route('packages.update', $package->id) }}">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" value="{{ $package->title }}" class="form-control" placeholder="Post Title">
        </div>
        <div class="form-group">
            <label>Details</label>
            <textarea name="details" rows="4" class="form-control">{{ $package->details}}</textarea>
        </div>
        <a href="{{ route('packages.index') }}" class="btn btn-default">Cancel</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endif 
@stop