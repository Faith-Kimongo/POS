<div class="col-sm-2 mb-2">
    <div class="card">
      <div class="card-header">Menu</div>
      <div class="card-body">
        <h5 class="menu-title mb-0 text-left"> <strong> Organizations</strong></h5>
        {{-- @foreach (Auth::user()->batch  as $package ) --}}
        <a href="/admin/organizations">List</a> <br>
        {{-- @endforeach --}}
        @if(Auth::id()==1)
      <a href="/admin/organization/create">New</a>
        @endif
      <h5 class="menu-title mb-0 text-left"> <strong> Batches</strong></h5>
      <a href="/admin/batch/list">List</a> <br>
      <h5 class="menu-title mb-0 text-left"> <strong>Collection Points</strong></h5>
      <a href="/admin/collection/list">List</a> <br>
      {{-- <h3 class=" menu-title mb-0 text-left"> Reports</h3>
      <a href="/management/collections">List</a> <br>
      <a href="{{ route('new.collection.point') }}">New</a> <br> --}}

      <h3 class=" menu-title mb-0 text-left">Locations </h3>
      <a href="/admin/counties">Counties</a> <br>
      <a href="/admin/sub_counties">Sub Counties</a> <br>
      <a href="/admin/wards">Wards</a> <br>

      </div>
    </div>
  </div>