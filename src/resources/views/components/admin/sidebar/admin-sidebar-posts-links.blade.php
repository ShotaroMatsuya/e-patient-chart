<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePost" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-user-injured"></i>
        <span class="strong text-monospace ">患者一覧</span>
    </a>
    <div id="collapsePost" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Patients</h6>
      <a class="collapse-item" href="{{route('post.create')}}">Create a Patient</a>
      <a class="collapse-item" href="{{route('post.index')}}">View All Patients</a>
      </div>
    </div>
  </li>
