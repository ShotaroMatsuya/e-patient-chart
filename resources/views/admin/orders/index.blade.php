<x-admin-master>
    @section('content')
    <h1>All Orders</h1>
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
                    <h6 class="m-0 font-weight-bold text-primary">Order List</h6>
                </div>
                <div class="card-body">
                    @if ($orders->count() > 0)
                    <table>
                        <thead>
                            <th>状態</th>
                            <th>検査施行日</th>
                            <th>検査Id</th>
                            <th>検査名</th>
                            <th>患者名</th>
                            <th>担当医</th>
                            <th>詳細</th>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>
                                        {{$order->isFinished == 0 ?'未完':'完了'}}
                                    </td>
                                    <td>
                                        {{$order->executed_at->format('Y-m-d')}}
                                    </td>
                                    <td>
                                        {{$order->id}}
                                    </td>
                                    <td>
                                        {{$order->exam()->name}}
                                    </td>
                                    <td>
                                        {{$order->post()->name}}
                                    </td>
                                    <td>
                                        {{$order->post()->user()->name}}
                                    </td>
                                    <td>
                                        @if (auth()->user()->isAdmin())
                    <form method="POST" action="{{route('order.destroy',$order->id)}}">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        {{-- @endcan --}}
                        @else
                        <a href="{{route('order.edit',$order->id)}}" class="btn btn-success">詳細</a>
                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
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
