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
        <h1>Create</h1>
<form method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="" placeholder="Enter name">
        </div>
        @if (auth()->user()->isDoctor())
        <div class="form-group">
            <label for="user_id">担当Dr.</label>
            <p class="lead bold">{{auth()->user()->name}}</p>
        @else
        <div class="form-group">
            <label for="user_id">担当Dr.</label>
            <select name="user_id" id="user_id">
                @foreach ($doctors as $doctor)
                <option value="{{$doctor->id}}"
                    @if ($doctor->id == auth()->user()->id)
                    selected
                    @endif
                    >{{$doctor->name}}</option>
                @endforeach

            </select>
        </div>

        @endif
        <div class="form-group">
            <label for="birthday">Birthday</label>
        <input type="text" class="form-control" name="birthday" id="birthday" value="{{isset($post) ? $post->birthday : ''}}">
        <div class="form-group">
            <label for="sex">sex</label>
            <select  name="sex">
                <option value="0">男性</option>
                <option value="1">女性</option>
              </select>

        </div>
        <div class="form-group">
            <label for="clinical_diagnosis">臨床診断</label>
            <input type="text" class="form-control" name="clinical_diagnosis" id="clinical_diagnosis" aria-describedby="" placeholder="Enter clinical_diagnosis">
        </div>
        <div class="form-group">
            <label for="description">臨床情報</label>
            <input id="description" type="hidden" name="description" value="{{isset($post) ? $post->description: ''}}">
            <trix-editor input="description"></trix-editor>
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endsection
    @section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.js" integrity="sha512-S9EzTi2CZYAFbOUZVkVVqzeVpq+wG+JBFzG0YlfWAR7O8d+3nC+TTJr1KD3h4uh9aLbfKIJzIyTWZp5N/61k1g==" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    flatpickr('#birthday');
    $(document).ready(function() {

});
</script>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.css" integrity="sha512-EQF8N0EBjfC+2N2mlaH4tNWoUXqun/APQIuFmT1B+ThTttH9V1bA0Ors2/UyeQ55/7MK5ZaVviDabKbjcsnzYg==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


@endsection

</x-admin-master>
