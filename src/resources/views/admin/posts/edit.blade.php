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
        <h4>患者情報:<span class="mx-3 bold h2">{{$post->name}}様</span></h1>
        <p class="lead">初診日: {{$post->created_at}}</p>
        <p class="lead">最終更新日: {{$post->updated_at->diffForHumans()}}</p>
        <p class="lead">担当医: {{$post->user->name}}</p>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6 p-3">
                    <h5>臨床情報</h5>
                    <form method="POST" action="{{route('post.update',$post->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="name">名前</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="" placeholder="Enter name" value="{{$post->name}}">
                        </div>
                        <div class="form-group">
                            <label for="birthday">Birthday</label>
                        <input type="text" class="form-control" name="birthday" id="birthday" value="{{isset($post) ? $post->birthday : ''}}">
                        <div class="form-group">
                            <label for="sex">性別</label>
                            <select name="sex" id="sex">
                                <option value="0" {{$post->sex == 0 ? "selected": ""}}>男</option>
                                <option value="1" {{$post->sex == 1 ? "selected": ""}}>女</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="clinical_diagnosis">臨床診断名</label>
                        <input type="text" class="form-control" name="clinical_diagnosis" id="clinical_diagnosis" aria-describedby="" placeholder="Enter Diagnosis" value="{{$post->clinical_diagnosis}}">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <input id="description" type="hidden" name="description" value="{{isset($post) ? $post->description: ''}}">
                                <trix-editor input="description"></trix-editor>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

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
