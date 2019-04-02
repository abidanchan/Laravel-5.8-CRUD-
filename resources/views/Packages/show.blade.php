@extends('layouts.app')
 
@section('content')
 <div class="col">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('packages.index') }}"> Back</a>
            </div>
        </div>
    </div>
 
 
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">


                <strong>Title:</strong>
                {{ $package->title }}
            
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $package->details }}
            </div>

        </div>
    </div>
    </div>
  
@stop