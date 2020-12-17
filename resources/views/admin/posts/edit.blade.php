<x-admin-master>
    @section('content')
        <h1>患者情報</h1>
        <p class="lead">初診日: {{$post->created_at}}</p>
        <p class="lead">最終更新日: {{$post->updated_at->diffForHumans()}}</p>
<form method="POST" action="{{route('post.update',$post->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">名前</label>
        <input type="text" class="form-control" name="name" id="name" aria-describedby="" placeholder="Enter name" value="{{$post->name}}">
        </div>
        <div class="form-group">
            <label for="birthday">生年月日</label>
        <input type="text" class="form-control" name="birthday" id="birthday" aria-describedby="" placeholder="Enter birthday" value="{{$post->birthday}}">
        </div>
        <div class="form-group">
            <label for="sex">性別</label>
            <select name="sex" id="sex">
                <option value="0" {{$post->sex == 0 ? "selected": ""}}>男</option>
                <option value="1" {{$post->sex == 1 ? "selected": ""}}>女</option>
            </select>

        </div>
        <div class="form-group">
            <label for="clinical-diagnosis">臨床診断名</label>
        <input type="text" class="form-control" name="clinical-diagnosis" id="clinical-diagnosis" aria-describedby="" placeholder="Enter Diagnosis" value="{{$post->clinical_diagnosis}}">
        </div>

        <div class="form-group">
            <label for="description">病歴</label>
            <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{$post->description}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endsection
</x-admin-master>
