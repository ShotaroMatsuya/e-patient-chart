<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseTwo">
      {{-- <i class="fas fa-fw fa-cog"></i> --}}
      <i class="fas fa-fw fa-user-nurse"></i>
      <span class="strong text-monospace">医療関係者</span>
    </a>
    <div id="collapseUsers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Staffs</h6>
      <a class="collapse-item" href="{{route('users.create')}}">Create a Staff</a>

      <a class="collapse-item" href="{{route('users.index')}}">View All Staffs</a>
      </div>
    </div>
  </li>
