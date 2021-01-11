<x-admin-master>
    @section('content')
    <h1>Users</h1>
    @if (session('user-deleted'))
        <div class="alert alert-danger">
            {{session('user-deleted')}}
        </div>
    @endif
    @if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li class="list-group-item">
            {{$error}}
        </li>
        @endforeach

    </div>

    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Users</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Username</th>
                  <th>Avatar</th>
                  <th>Name</th>
                  <th>Major</th>
                  <th>Role</th>
                  <th>Registered date</th>
                  <th>Updated profile date</th>
                  <th>Delete</th>

                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Major</th>
                    <th>Role</th>
                    <th>Registered date</th>
                    <th>Updated profile date</th>
                    <th>Delete</th>
                </tr>
              </tfoot>
              <tbody>
                  @foreach ($users as $user)
                  <tr>
                        <td>{{$user->id}}</td>
                        <td><a href="{{route('user.profile.show',$user->id)}}">{{$user->username}}</a></td>
                        <td>
                            <img height="50px" src="{{Gravatar::src($user->email)}}" alt="">
                        </td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->major?$user->major :''}}</td>
                        <td>
                            @foreach ($user->roles as $role)
                                {{$role->name}}
                            @endforeach
                        </td>
                        <td>{{$user->created_at->diffForhumans()}}</td>
                        <td>{{$user->updated_at->diffForhumans()}}</td>
                        <td>
                            <form method="POST" action="{{route('user.destroy',$user->id)}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                  </tr>

                  @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>

    @endsection
    @section('scripts')
      <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('js/demo/datatables-demo.js')}}"></script>

      @endsection
</x-admin-master>
