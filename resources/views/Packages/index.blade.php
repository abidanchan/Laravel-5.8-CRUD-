@extends('layouts.app')
@section('content')
<div class='col-md'>
	
</div>
   <br>
    @if (Session::get('success'))
        <div class="alert alert-success">
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif
    <a href="{{ route('packages.create') }}" class="btn" style="">Create New Package</a>
  <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Content</th>
                </tr>
            </thead>
             <tbody>
                @foreach($packages as $key => $package)
                <tr>
                    <td>{{ (($packages->currentPage() - 1 ) * $packages->perPage() ) + $loop->iteration }}</td>
                    <td>{{ $package->title }}</td>
                    <td>{{ $package->details }}</td>
                    <td style="width: 10%">
                        <a href="{{ route('packages.show', $package->id) }}" class="btn btn-success" style="margin-bottom: 10px; width: 70px;">View</a><br>
                        <a href="{{ route('packages.edit', $package->id) }}" class="btn btn-info" style="margin-bottom: 10px; width: 70px;">Edit</a>
 
                        <form action="{{ route('packages.destroy', [$package->id]) }}" method="POST">
                             {{ csrf_field() }}
                             {{ method_field('DELETE') }}
                           <input type="submit" class="btn btn-danger" value="Delete"/>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>



        </table>
        {{ $packages->links() }}
        
    </div>
@endsection