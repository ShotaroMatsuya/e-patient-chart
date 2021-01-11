<x-admin-master>
    @section('content')
    <h1>All Patients</h1>
    {{-- @if (Session::has('message')) --}}
    @if(session('message'))
    <div class="alert alert-danger">
        {{-- {{Session::get('message')}} --}}
        {{session('message')}}
    </div>
    @elseif(session('post-created-message'))
    <div class="alert alert-success">
        {{session('post-created-message')}}
    </div>
    @elseif(session('post-updated-message'))
    <div class="alert alert-success">
        {{session('post-updated-message')}}
    </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th>更新日</th>
                    <th>Id</th>
                    <th>名前</th>
                    <th>生年月日</th>
                    <th>年齢</th>
                    <th>性別</th>
                    <th>臨床診断名</th>
                    <th>初診日</th>
                    <th>
                        @if (auth()->user()->isAdmin())
                        削除
                        @else
                        詳細

                        @endif
                    </th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>更新日</th>
                    <th>Id</th>
                    <th>名前</th>
                    <th>生年月日</th>
                    <th>年齢</th>
                    <th>性別</th>
                    <th>臨床診断名</th>
                    <th>初診日</th>
                    <th>
                        @if (auth()->user()->isAdmin())
                        削除
                        @else
                        詳細

                        @endif
                    </th>

                </tr>
              </tfoot>
              <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                    <td>{{$post->id}}</td>
                    <td><a href="{{route('post',$post->id)}}">{{$post->name}}</a></td>
                    <td>{{$post->birthday->format('Y-m-d')}}</td>
                    <td>{{$post->birthday->age}}</td>
                    <td>{{$post->sex == 0 ? '男':'女'}}</td>
                    <td>{{$post->clinical_diagnosis}}</td>
                    <td>{{$post->created_at->format('Y-m-d')}}</td>
                    <td>
                        {{-- PostPolicyクラスに定義されているviewをセット --}}
                        {{-- @can('view',$post) --}}

                        @if (auth()->user()->isAdmin())
                    <form method="POST" action="{{route('post.destroy',$post->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        {{-- @endcan --}}
                        @else
                        <a href="{{route('post',$post->id)}}" class="btn btn-success">詳細</a>
                        @endif
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

    @endsection
</x-admin-master>
