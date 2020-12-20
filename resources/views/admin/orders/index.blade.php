<x-admin-master>
    @section('content')
    <h1>All Orders</h1>
    {{-- @if (Session::has('message')) --}}
    @if(session('message'))
    <div class="alert alert-danger">
        {{-- {{Session::get('message')}} --}}
        {{session('message')}}
    </div>
    @elseif(session('order-created-message'))
    <div class="alert alert-success">
        {{session('order-created-message')}}
    </div>
    @elseif(session('order-updated-message'))
    <div class="alert alert-success">
        {{session('order-updated-message')}}
    </div>
    @endif

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Order List</h6>
                </div>
                <div class="card-body">
                    @if ($orders->count() > 0)
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                    <td class="text-center">
                                        @if ($order->isFinished == 0)
                                        <i class="text-danger fa fa-circle"></i>
                                        @else
                                        <i class="text-success fa fa-clipboard-check"></i>
                                        @endif
                                    </td>
                                    <td>
                                        {{$order->executed_at}}
                                    </td>
                                    <td>
                                        {{$order->id}}
                                    </td>
                                    <td>
                                        {{$order->exam->name}}
                                    </td>
                                    <td>
                                        {{$order->post->name}}
                                    </td>
                                    <td>
                                        {{$order->post->user->name}}
                                    </td>
                                    <td>
                                        @if (!auth()->user()->isTester())
                    <form method="POST" action="{{route('orders.destroy',$order->id)}}">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        {{-- @endcan --}}
                        @elseif(auth()->user()->isTester())
                        <a href="{{route('orders.edit',$order->id)}}" class="btn btn-success">詳細</a>
                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <h1>Order Not found !!</h1>
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
