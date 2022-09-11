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
        <h1>Edit Orders</h1>

        <div class="card">
            <div class="card-header">患者情報</div>
            <div class="card-body">
                <h3>患者名:{{ $order->post->name }}</h3>
                <p>
                    @if ($order->isFinished === 1)
                    検査施行日:
                    @else
                    検査予定日:
                    @endif
                    {{$order->executed_at}} - （{{ $order->executed_at->diffForHumans() }}）
                </p>
                <p>誕生日:{{ $order->post->birthday->format('Y-m-d') }}</p>
            </div>
            <div class="card-body">
                <h4>担当医: {{$order->post->user->name}}</h4>
                <p>検査依頼日: {{ $order->created_at->diffForHumans() }}</p>
                <div class="card">

                    <div class="card-header">オーダー内容:</div>
                    <div class="card-body">
                        {{ $order->comment }}
                    </div>
                </div>
                <p>ステータス:
                    @if ($order->isFinished === 1)
                    結果提出済み <i class="text-success fa fa-clipboard-check"></i>
                    @else
                    未提出 <i class="text-danger fa fa-circle"></i>
                    @endif
                </p>
            </div>
            <div class="card-header">
                臨床情報
            </div>
            <div class="card-body">
                <p class="lead">臨床診断名：{{ $order->post->clinical_diagnosis }}</p>
                <p class="lead">詳細：{{ $order->post->description }}</p>
            </div>
            <div class="card-header">
                検査情報
            </div>
            <div class="card-body">
                <p class="lead">検査施行日：{{ $order->executed_at->diffForHumans() }}</p>
                <p class="lead">検査依頼日：{{ $order->created_at->diffForHumans() }}</p>
                <p class="lead">最終編集日：{{ $order->updated_at->diffForHumans() }}</p>
                @if ($order->results->count() > 0 )
                @foreach ($order->results as $result)
                <div class="card mt-3">
                    <div class="card-header">
                        検査診断名: {{ $result->exam_diagnosis }}
                    </div>
                    <div class="card-body">
                        検査詳細: {{
                            $result->description }}
                        <img src="{{ $result->image }}" />
                    </div>
                    <div class="card-footer">
                        <p>作成日: {{ $result->created_at }}
                        </p>
                        <p>作成者: {{ $result->user_id }}</p>
                    </div>
                </div>
                @endforeach
                @else
                <div class="card mt-3">
                    <div class="card-body">
                        結果はまだ提出されていません
                    </div>
                </div>
                @endif
            </div>
            <div class="card-footer">
                @if ($order->isFinished === 0)
                <a href="{{route('orders.create',$order->id)}}" class="btn btn-success">入力</a>
                @else
                    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-primary">編集</a>
                @endif
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
