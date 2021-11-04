@extends('types.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Level</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" onclick="javascript:history.go(-1)"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $level->name }}
            </div>
        </div>
    </div>
@endsection