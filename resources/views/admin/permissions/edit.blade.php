<x-admin-master>
    @section('content')
    @if (session()->has('permission-updated'))
    <div class="alert alert-success">
        {{session('permission-updated')}}
    </div>
@endif
<div class="row">

    <div class="col-sm-6">

        <h1>Edit: {{$permission->name}}</h1>
    <form method="POST" action="{{route('permissions.update',$permission->id)}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input class="form-control" type="text" name="name" id="name" value="{{$permission->name}}">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    </form>


    </div>
</div>

    @endsection
</x-admin-master>
