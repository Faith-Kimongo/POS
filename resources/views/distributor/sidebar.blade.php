<div class="col-sm-3 mb-1">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-left mt-2 mb-0"> <strong> Batches Assigned </strong></h5>
        @foreach (Auth::user()->batchasign as $distri )
      <a href="/distributor/batch/{{$distri->id}}">{{$distri->batch['name']}}</a> <br>
        @endforeach
        <h5 class="card-title text-left mt-2 mb-0"> <strong>Beneficiaries </strong></h5>
        <a href="/beneficiary/list">List</a> <br>
        <a href="/distributor/beneficiary">Assign Voucher</a> <br>
      <a href="#" data-toggle="modal" data-target="#asign">New +</a>
      </div>
    </div>
  </div>




