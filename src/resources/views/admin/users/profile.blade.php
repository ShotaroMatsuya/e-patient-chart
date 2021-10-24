<x-admin-master>

    @section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
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
    <div class="mb-4 d-flex align-items-center">
        <img class="m-3" height="50px" src="{{Gravatar::src($user->email)}}" alt="">
        <h1>User Profile for  : {{$user->name}}</h1>

    </div>
<div class="row">
    <div class="col-sm-6">
    <form action="{{route('user.profile.update',$user)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')




            <div class="form-group">
                <label for="username">Username</label>
            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" value="{{$user->username}}">
            @error('username')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
            </div>
            <div class="form-group">
                <label for="name">Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{$user->name}}">
            @error('name')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{$user->email}}">
            @error('email')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
            @error('password')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            </div>
            <div class="form-group">
                <label for="password-confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password-confirmation">
            @error('password_confirmation')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


    </div>
</div>
<div class="row my-5">
    <p class="lead">※以下はAdminのみ編集可能</p>
    <div class="col-sm-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>Options</th>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th>Attach</th>
                      <th>Delete</th>

                    </tr>
                  </thead>
                  <tfoot>
                      <tr>
                        <th>Options</th>

                        <th>Id</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Attach</th>
                        <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td><input type="checkbox"
                                @foreach ($user->roles as $user_role)
                                    @if ($user_role->slug == $role->slug)
                                        checked
                                    @endif
                                @endforeach

                                ></td>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td>{{$role->slug}}</td>
                            <td>
                                <form action="{{route('user.role.attach',$user)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="role" value="{{$role->id}}">
                                    <button type="submit"
                                    class="btn btn-primary"
                                    {{-- すでに与えられているroleにはdisabledクラスがつくようにする --}}
                                    @if($user->roles->contains($role))
                                        disabled
                                    @endif

                                    >Attach</button>
                                </form>
                            </td>


                            <td>
                                <form action="{{route('user.role.detach',$user)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="role" value="{{$role->id}}">
                                    <button type="submit" class="btn btn-danger"
                                    {{-- すでに与えられているroleにはdisabledクラスがつくようにする --}}
                                    @if(!$user->roles->contains($role))
                                        disabled
                                    @endif

                                    >Detach</button>
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

    @endsection


</x-admin-master>
