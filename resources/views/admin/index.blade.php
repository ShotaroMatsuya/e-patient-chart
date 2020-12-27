<x-admin-master>
@section('content')
@if (session()->has('permission-updated'))
    <div class="alert alert-success">
        {{session('permission-updated')}}
    </div>
@endif
@if (session()->has('role-updated'))
    <div class="alert alert-success">
        {{session('role-updated')}}
    </div>
@endif
<h1 class="h3 mb-4 stext-gray-800">Dashboard</h1>
<h2 class="font-italic">Welecome! {{auth()->user()->name}}</h2>
{{-- admin case --}}
@if (auth()->user()->userHasRole('Admin'))
<h3 class="text-center m-5">Create Role</h3>
<div class="row">
    @if (session()->has('role-deleted'))
                <div class="alert alert-danger">
                    {{session('role-deleted')}}
                </div>
            @endif
</div>

        <div class="row">

            <div class="col-sm-3">
            <form action="{{route('roles.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror">
                        <div>
                            @error('name')
                            <span>
                                <strong>
                                    {{$message}}
                                </strong>
                            </span>

                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Create</button>

                </form>
            </div>
            <div class="col-sm-9">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>Id</th>
                              <th>Name</th>
                              <th>Slug</th>
                              <th>Delete</th>


                            </tr>
                          </thead>
                          <tfoot>
                            <tr>
                                <th>Id</th>
                              <th>Name</th>
                              <th>Slug</th>
                              <th>Delete</th>

                            </tr>
                          </tfoot>
                          <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                <td>{{$role->id}}</td>
                                <td><a href="{{route('roles.edit',$role->id)}}">
                                    {{$role->name}}
                                </a></td>
                                <td>{{$role->slug}}</td>
                                <td>
                                <form action="{{route('roles.destroy',$role->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                </tr>
                            @endforeach

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
            </div>
        </div>

<hr class="p-3 bold">
<h3 class="text-center m-5">Create Permission</h3>
<div class="row">

    <div class="col-sm-3">
        <form action="{{route('permissions.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror">
                    <div>
                        @error('name')
                        <span>
                            <strong>
                                {{$message}}
                            </strong>
                        </span>

                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Create</button>

            </form>
        </div>
        <div class="col-sm-9">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Permissions</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Name</th>
                          <th>Slug</th>
                          <th>Delete</th>


                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                            <th>Id</th>
                          <th>Name</th>
                          <th>Slug</th>
                          <th>Delete</th>

                        </tr>
                      </tfoot>
                      <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                            <td>{{$permission->id}}</td>
                            <td><a href="{{route('permissions.edit',$permission->id)}}">
                                {{$permission->name}}
                            </a></td>
                            <td>{{$permission->slug}}</td>
                            <td>
                            <form action="{{route('permissions.destroy',$permission->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                            </tr>
                        @endforeach

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
        </div>
</div>


@endif
{{-- case of doctor --}}
@if (auth()->user()->isDoctor())
<h1>Your Patiesnts</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
                <th>Id</th>
                <th>名前</th>
                <th>生年月日</th>
                <th>年齢</th>
                <th>性別</th>
                <th>臨床診断名</th>
                <th>初診日</th>
                <th>更新日</th>
                <th>詳細</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>Id</th>
                <th>名前</th>
                <th>生年月日</th>
                <th>年齢</th>
                <th>性別</th>
                <th>臨床診断名</th>
                <th>初診日</th>
                <th>更新日</th>
                <th>詳細</th>

            </tr>
          </tfoot>
          <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td><a href="{{route('post',$post->id)}}">{{$post->name}}</a></td>
                <td>{{$post->birthday->format('Y-m-d')}}</td>
                <td>{{$post->birthday->diffForHumans()}}</td>
                <td>{{$post->sex == 0 ? '男':'女'}}</td>
                <td>{{$post->clinical_diagnosis}}</td>
                <td>{{$post->created_at->format('Y-m-d')}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
                <td>
                    <a href="{{route('post',$post->id)}}" class="btn btn-success">詳細</a>
                </td>
            </tr>

            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="d-flex">
    <div class="mx-auto">
        {{-- {{$posts->links()}} --}}

    </div>
</div>
@section('scripts')
<!-- Page level plugins -->
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('js/demo/datatables-demo.js')}}"></script>

@endsection

@endif
@endsection


</x-admin-master>
