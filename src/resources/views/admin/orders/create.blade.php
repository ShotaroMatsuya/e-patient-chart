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
        <h1>Create Orders</h1>

        <div class="card">
            <div class="card-header">患者情報</div>
            <div class="card-body">
                <h3>患者名:{{$post->name}}</h3>
                <p>臨床診断名:{{$post->clinical_diagnosis}}</p>
                <p>担当医:{{$post->user->name}}</p>
            </div>
            <div class="card-footer">
                <form method="POST" action="{{route('orders.store')}}">
                    @csrf
                    <input type="hidden" value="{{$post->id}}" name="post_id">
                    <div class="form-group">
                        <label for="exam_id">検査名</label>
                        <select  name="exam_id">
                            @foreach ($exams as $exam)
                            <option value="{{$exam->id}}">{{$exam->name}}</option>

                            @endforeach

                          </select>


                    </div>
                    <div class="form-group">
                        <label for="executed_at">検査施行予定日</label>
                    <input type="text" class="form-control" name="executed_at" id="executed_at" value="{{isset($order) ? $order->executed_at : ''}}"></div>
                    <div class="form-group">
                        <label for="comment">コメント</label>
                        <input id="comment" type="hidden" name="comment" value="{{isset($post) ? $post->comment: ''}}">
                        <trix-editor input="comment"></trix-editor>
                    </div>


                <button type="submit" class="btn btn-lg btn-primary">Create Order</button>
                </form>
            </div>
        </div>

    @endsection
    @section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.js" integrity="sha512-S9EzTi2CZYAFbOUZVkVVqzeVpq+wG+JBFzG0YlfWAR7O8d+3nC+TTJr1KD3h4uh9aLbfKIJzIyTWZp5N/61k1g==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    flatpickr('#executed_at');

</script>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.css" integrity="sha512-EQF8N0EBjfC+2N2mlaH4tNWoUXqun/APQIuFmT1B+ThTttH9V1bA0Ors2/UyeQ55/7MK5ZaVviDabKbjcsnzYg==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


@endsection

</x-admin-master>
