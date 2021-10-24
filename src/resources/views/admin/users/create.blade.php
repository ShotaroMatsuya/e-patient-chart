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
        <h1>Create a New Staff</h1>

    </div>
<div class="row">
    <div class="col-sm-6">
    <form action="{{route('user.profile.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{isset($user)?$user->name:''}}">
            @error('name')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            </div>
            <div class="form-group">
                <label for="username">Username</label>
            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" value="{{isset($user)?$user->username:''}}">
            @error('username')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{isset($user)?$user->email:''}}">
            @error('email')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            </div>
            <div class="form-group">
                <div class="card">
                    <div class="card-header">
                        <label for="role_id">役職</label>
                    </div>
                    <div class="card-body">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role_id" value="1" id="admin">
                            <label class="form-check-label" for="admin">アドミン</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role_id" value="2" id="doctor">
                            <label class="form-check-label" for="doctor">医師</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role_id" value="3" id="nurse">
                            <label class="form-check-label" for="nurse">看護師</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role_id" value="4" id="officer">
                            <label class="form-check-label" for="officer">医療事務</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role_id" value="6" id="technologist">
                            <label class="form-check-label" for="technologist">検査技師</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role_id" value="5" id="student">
                            <label class="form-check-label" for="student">学生</label>
                        </div>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <label for="major">専門 (※医師のみ)</label>
                <select name="major" id="major">
                    <option value="">なし</option>
                    <option value="消化器内科">消化器内科</option>
                    <option value="血液内科">血液内科</option>
                    <option value="整形外科">整形外科</option>
                    <option value="脳外科">脳外科</option>
                    <option value="呼吸器外科">呼吸器外科</option>
                    <option value="病理部">病理部</option>
                    <option value="放射線科">放射線科</option>
                    <option value="内視鏡科">内視鏡科</option>
                </select>

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


    @endsection


</x-admin-master>
