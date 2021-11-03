@extends('items.layout')
 
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <!-- <h2>Laravel 8 CRUD Example from scratch - laravelcode.com</h2> -->
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('items.create') }}"> Create New Item</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Superior</th>
            <th>Eth</th>
            <th>Sockets</th>
            <th>Type</th>
            <th>Level</th>
            <th>Description</th>
            <!-- <th>Details</th> -->
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>
                @if ($value->superior == 1)
                    Yes
                @else
                    No
                @endif
            </td>
            <td>
                @if ($value->eth == 1)
                    Yes
                @else
                    No
                @endif
            </td>
            <td>{{ $value->sockets }}</td>
            <td>{{ $value->type->name }}</td>
            <td>{{ $value->level->name }}</td>
            <td>{{ $value->description }}</td>
            <!-- <td>{{ \Str::limit($value->description, 100) }}</td> -->
            <td>
                <form action="{{ route('items.destroy',$value->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('items.show',$value->id) }}">Show</a>    
                    <a class="btn btn-primary" href="{{ route('items.edit',$value->id) }}">Edit</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
    {!! $data->links() !!}      
@endsection