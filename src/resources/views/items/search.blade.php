@extends('items.layout')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif

<form action="{{ route('items.search') }}" method="GET">
    <div class="form-row">
        <div class="form-group col-md-2">
            <strong>Type:</strong>
            <select name="type_id">
                <option value="0">All</option>
                @foreach ($types as $type)
                    @if (isset($filters->type_id) AND $type->id == $filters->type_id)
                        <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
                    @else
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-2">
            <strong>Level:</strong>
            <select name="level_id">
                <option value="0">All</option> 
                @foreach ($levels as $level)
                    @if (isset($filters->level_id) AND $level->id == $filters->level_id)
                        <option value="{{ $level->id }}" selected>{{ $level->name }}</option>
                    @else
                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-2">
            <!-- <label class="form-check-label" for="superior">
            Superior?
            </label>
            <input class="form-check-input" {{-- $filters->superior ? 'checked' : '' --}} type="checkbox" name="superior" id="superior"> -->
            <strong>Superior:</strong>
            <select name="superior">
                <option value="3" @if (isset($filters->superior) AND $filters->superior == 3) selected @endif>All</option>
                <option value="0" @if (isset($filters->superior) AND $filters->superior == 0) selected @endif>No</option>
                <option value="1" @if (isset($filters->superior) AND $filters->superior == 1) selected @endif>Yes</option>

                <!-- <option value="3" {{-- $filters->superior == 3 ? 'selected' : '' --}}>All</option>
                <option value="0" {{-- $filters->superior == 0 ? 'selected' : '' --}}>No</option>
                <option value="1" {{-- $filters->superior == 1 ? 'selected' : '' --}}>Yes</option> -->
            </select>
        </div>
        <div class="form-group col-md-2">
            <strong>Eth:</strong>
            <select name="eth">
                <option value="3" @if (isset($filters->eth) AND $filters->eth == 3) selected @endif>All</option>
                <option value="0" @if (isset($filters->eth) AND $filters->eth == 0) selected @endif>No</option>
                <option value="1" @if (isset($filters->eth) AND $filters->eth == 1) selected @endif>Yes</option>

                <!-- <option value="3" {{-- $filters->eth == 3 ? 'selected' : '' --}}>All</option>
                <option value="0" {{-- $filters->eth == 0 ? 'selected' : '' --}}>No</option>
                <option value="1" {{-- $filters->eth == 1 ? 'selected' : '' --}}>Yes</option> -->
            </select>
            <!-- <label class="form-check-label" for="eth">
            Eth?
            </label>
            <input class="form-check-input" {{-- $filters->eth ? 'checked' : '' --}} type="checkbox" name="eth" id="eth"> -->
        </div>
        <div class="form-group col-md-2">
            <strong>Sockets:</strong>
            <input type="number" name="sockets" value="@if(isset($filters->sockets) AND $filters->sockets != NULL){{$filters->sockets}}@endif" class="form-control" placeholder="Nr. of Sockets">
        </div>
        <!-- <div class="form-row">
        <div class="form-group col-md-6">
        <label for="inputCity">City</label>
        <input type="text" class="form-control" id="inputCity">
        </div>
        <div class="form-group col-md-4">
        <label for="inputState">State</label>
        <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
        </select>
        </div>
        <div class="form-group col-md-2">
        <label for="inputZip">Zip</label>
        <input type="text" class="form-control" id="inputZip">
        </div>
        </div> -->
        <!-- <div class="form-group">
        <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck">
        <label class="form-check-label" for="gridCheck">
        Check me out
        </label>
        </div>
        </div> -->
        <div class="form-group col-md-2">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </div>
</form>

<!-- <form>
<div class="form-row">
<div class="col">
<strong>Type:</strong>
<select name="type_id">
@foreach ($types as $type)
<option value="{{ $type->id }}">{{ $type->name }}</option>
@endforeach
</select>
</div>
<div class="col">
<strong>Level:</strong>
<select name="level_id">
@foreach ($levels as $level)
<option value="{{ $level->id }}">{{ $level->name }}</option>
@endforeach
</select>
</div>
<div class="col">
<strong>Sockets:</strong>
<input type="number" name="sockets" placeholder="Nr. of Sockets">
</div>
<div class="col">
<a class="btn btn-success" href="{{ route('items.create') }}"> Search</a>
</div>
</div>
</form> -->

<!-- <div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-row">
<div class="col">
<strong>Type:</strong>
<select name="type_id">
@foreach ($types as $type)
<option value="{{ $type->id }}">{{ $type->name }}</option>
@endforeach
</select>
</div>
<div class="col">
<strong>Sockets:</strong>
<input type="number" name="sockets" placeholder="Nr. of Sockets">
</div>
<div class="col">

</div>

<strong>Type:</strong>
<select name="level_id">
@foreach ($levels as $level)
<option value="{{ $level->id }}">{{ $level->name }}</option>
@endforeach
</select> -->
<!-- <strong>Sockets:</strong>
<input type="number" name="sockets" class="form-control" placeholder="Nr. of Sockets"> -->
<!-- </div>
<div class="form-group">
<a class="btn btn-success" href="{{ route('items.create') }}"> Search</a>
</div>
</div>
</div> -->

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
            <!-- <a class="btn btn-primary" href="{{ route('items.edit',$value->id) }}">Edit</a>   
            @csrf
            @method('DELETE')      
            <button type="submit" class="btn btn-danger">Delete</button> -->
        </form>
        </td>
    </tr>
    @endforeach
</table>  
{{-- !! $data->links() !! --}}
@endsection