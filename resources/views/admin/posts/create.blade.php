<x-admin-master>
    @section('content')
        <h1>Create</h1>
<form method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="birthday">Birthday</label>
            <input type="text" class="form-control" name="birthday" id="birthday" aria-describedby="" placeholder="Enter birthday">
        </div>
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
            <textarea cols="30" rows="10" type="text" class="form-control" name="description" id="description" aria-describedby="" placeholder="Enter description"></textarea>
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endsection
</x-admin-master>
