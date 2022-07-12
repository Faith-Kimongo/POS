@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> <a href="/distribute">Dashboard </a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                    <div class="row">
{{-- includde --}} @include('distributor.sidebar')
                        <div class="col-sm-9">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title"> <strong>Beneficiary List</strong></h5>


                              <div class="row">
                                <div class="col-sm-12">
                                {{-- <div class="card"> --}}
                                  <div class="card-body">
                                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Voucher</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($beneficiaries as  $beneficiary)
                                            <tr>
                                                <td>{{$beneficiary->id}}</td>
                                                <td> <a href="/distributor/beneficiary/{{$beneficiary->id}}">{{ucfirst($beneficiary->fname)}} {{ucfirst($beneficiary->mname)}} {{ucfirst($beneficiary->lname)}} </a></td>
                                                <td><a href="#">{{$beneficiary->phone}} </a> </td>
                                                <td>
                                                    @foreach($beneficiary->voucher as $voucher)
                                                    @if ($loop->first)
                                                    {{$voucher->voucher->code}}
                                                    @endif
                                                    @endforeach

                                                </td>
                                                <td data-order="1000">
                                                    @foreach($beneficiary->voucher as $voucher)
                                                    @if ($loop->first)

                                                    {{$voucher->voucher->code}}
                                                    @endif
                                                    @endforeach
                                                </td>
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
<script>
   $(document).ready(function() {
	//Only needed for the filename of export files.
	//Normally set in the title tag of your page.
	document.title='Simple DataTable';
    responsive=true;
	// DataTable initialisation
	$('#example').DataTable(
		{
			"dom": '<"dt-buttons"Bf><"clear">lirtp',
			"paging": true,
			"autoWidth": true,
			"buttons": [
				'colvis',
				'copyHtml5',
        'csvHtml5',
				'excelHtml5',
        'pdfHtml5',
				'print'
			]
		}
	);
});
</script>

                                  </div>
                                {{-- </div> --}}
                              </div>

                            </div>

                            </div>
                          </div>
                        </div>
                      </div>


                </div>
            </div>
        </div>
    </div>
</div>
@include('distributor.new')
@endsection
