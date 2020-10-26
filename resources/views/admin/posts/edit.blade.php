<x-admin-master>
    @section('content')
        <h1>Edit a Post</h1>
<form method="POST" action="{{route('post.update',$post->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title" aria-describedby="" placeholder="Enter title" value="{{$post->title}}">
        </div>
        <div class="form-group">
        <div><img width="100px" src="{{$post->post_image}}" alt=""></div>
            <label for="file">File</label>
            <input type="file" class="form-control-file" id="post_image" name="post_image">
        </div>
        <div class="form-group">
        <textarea name="body" id="body" class="form-control" cols="30" rows="10">{{$post->body}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endsection
</x-admin-master>
