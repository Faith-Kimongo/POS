@extends('layouts.app')

<style>
table
{
    counter-reset: rowNumber;
}

table tr > td:first-child
{
    counter-increment: rowNumber;
}

table tr td:first-child::before
{
    content: counter(rowNumber);
    min-width: 1em;
    margin-right: 0.5em;
}
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href="/Dashboard/">Dashboard</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        @include('admin.sidebar')
                        <div class="col-sm-10">
                            <div class="card">
                              <div class="card-header">DSM Counties</div>
                              <div class="card-body">
                                {{-- <h5 class="card-title"><strong> List</strong></h5> --}}
                                @if($counties->count()!=0)
                                    {{-- Table start --}}
                                    <table id="counties" summary="This table shows how to create responsive tables using Datatables' extended functionality" class="table table-bordered table-hover dt-responsive">
                                        <caption class="text-center">Republic of Kenya Counties</caption>
                                        <thead>
                                          <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Code</th>
                                            <th>Sub-Counties</th>
                                            <th>Wards</th>
                                          </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($counties as $county)
                                          <tr>
                                            <td></td>
                                          <td> <a href="/admin/county/{{$county->id}}">{{$county->name}}</a></td>
                                            <td>{{$county->code}}</td>
                                            <td>{{$county->sub_county->count()}}</td>
                                            <td>{{$county->ward->count()}}</td>
                                            {{-- <td>@foreach($county->sub_county as $sub_county){{$sub_county->wards->count()}}@endforeach</td> --}}
                                          </tr>
                                          @endforeach

                                        </tbody>
                                        <tfoot>
                                          <tr>
                                            {{-- <td colspan="5" class="text-center">Data retrieved from <a href="http://www.infoplease.com/ipa/A0855611.html" target="_blank">infoplease</a> and <a href="http://www.worldometers.info/world-population/population-by-country/" target="_blank">worldometers</a>.</td> --}}
                                          </tr>
                                        </tfoot>
                                      </table>
                                    {{-- Table end --}}


                                    @else 
                                    <form method="POST" action="{{ route('counties.upload') }}" enctype="multipart/form-data">
                                        @csrf
                                        {{-- <input type="text" hidden name="batch" value="{{$batch}}"> --}}
                                      <div class="form-group row">
                                
                                        <div class="col-md-4 ml-3">
                    
                                            <label for="file_upload" class="">{{ __('Select Counties Upload list') }}</label>
                    
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="input-group">
                    
                                                      <input type="file"  name="counties" required id="counties" placeholder="Counties">
                                                    </div>
                                                    </div>
                    
                                        </div>
                    
                                    </div>
                                      <div class="modal-footer">
                                
                                        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                      
                                    </div>
                                  </form>
                                    @endif
                              </div>
                            </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    document.title='ZDDMS Organizations';
    $('#counties').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
    // $('table').DataTable();
</script>
{{-- <script>
    var table = document.getElementsByTagName('table')[0],
  rows = table.getElementsByTagName('tr'),
  text = 'textContent' in document ? 'textContent' : 'innerText';

for (var i = 1, len = rows.length; i < len; i++) {
  rows[i].children[0][text] = i + '. ' + rows[i].children[0][text];
}
</script> --}}
@endsection
