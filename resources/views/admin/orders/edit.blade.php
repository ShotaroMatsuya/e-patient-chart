<x-admin-master>
    @include('includes.tinyeditor')
    @section('content')
    @if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li class="list-group-item">
            {{$error}}
        </li>
        @endforeach

    </div>

    @endif
        <h4>患者情報:<span class="mx-3 bold h2">{{$order->post->name}}様</span></h1>
        <p class="lead">検査施行日: {{$order->post->created_at}}</p>
        <p class="lead">担当医: {{$order->post->user->name}}</p>
        <hr>
        <div class="container">
            <div class="row">



            </div>
            <div class="col-lg-4 col-md-6 p-3">
                <h5>臨床検査情報</h5>
                <form action="{{route('orders.create',$post->id)}}">

                    <button type="submit" class="btn btn-lg btn-success">Orderする</button>

                </form>
            </div>


        </div>

    @endsection
    @section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.js" integrity="sha512-S9EzTi2CZYAFbOUZVkVVqzeVpq+wG+JBFzG0YlfWAR7O8d+3nC+TTJr1KD3h4uh9aLbfKIJzIyTWZp5N/61k1g==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr('#birthday');

</script>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.css" integrity="sha512-EQF8N0EBjfC+2N2mlaH4tNWoUXqun/APQIuFmT1B+ThTttH9V1bA0Ors2/UyeQ55/7MK5ZaVviDabKbjcsnzYg==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">



@endsection
</x-admin-master>
