  {{-- Asigning --}}
  <div class="modal fade" id="asign" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form method="POST" action="{{ route('new.beneficiary') }}">
            @csrf
        {{-- <input type="text" hidden name="package" value="{{$package->id}}"> --}}
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Beneficiary Registration</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

                <div class="form-group row">

                    <div class="col-md-4">

                        <label for="email" class="">{{ __('County') }}</label>

                    </div>
                    <div class="col-md-8">
                            <div class="form-group">
                                <div class="input-group">
                                    <select class="custom-select mr-sm-2" required name="county" id="inlineFormCustomSelect">
                                        <option value="" selected>Choose county</option>
                                        @foreach ( $counties as $county)
                                    <option value="{{$county->code}}">{{$county->name}}</option>
                                        @endforeach


                                      </select>
                                  {{-- <input type="text" class="form-control" name="name" required id="formGroupExampleInput" placeholder="Distributor Name"> --}}
                                </div>
                                </div>

                    </div>

                </div>

                {{-- First Name --}}
                <div class="form-group row">

                    <div class="col-md-4">

                        <label for="email" class="">{{ __('First Name') }}</label>

                    </div>
                    <div class="col-md-8">
                            <div class="form-group">
                                <div class="input-group">

                                  <input type="text" class="form-control" name="fname" required id="formGroupExampleInput" placeholder="First Name as in National ID Card">
                                </div>
                                </div>

                    </div>

                </div>

                {{-- Middle Name --}}
                <div class="form-group row">

                    <div class="col-md-4">

                        <label for="email" class="">{{ __('Middle Name') }}</label>

                    </div>
                    <div class="col-md-8">
                            <div class="form-group">
                                <div class="input-group">

                                  <input type="text" class="form-control" name="mname"  id="formGroupExampleInput" placeholder="Middle Name as in National ID Card">
                                </div>
                                </div>

                    </div>

                </div>

                {{-- Last Name --}}
                <div class="form-group row">

                    <div class="col-md-4">

                        <label for="email" class="">{{ __('Last Name') }}</label>

                    </div>
                    <div class="col-md-8">
                            <div class="form-group">
                                <div class="input-group">

                                  <input type="text" class="form-control" name="lname" required id="formGroupExampleInput" placeholder="Last Name as in National ID Card">
                                </div>
                                </div>

                    </div>

                </div>
                {{-- id Number --}}
                <div class="form-group row">

                    <div class="col-md-4">

                        <label for="email" class="">{{ __('ID Number') }}</label>

                    </div>
                    <div class="col-md-8">
                            <div class="form-group">
                                <div class="input-group">

                                  <input type="text" class="form-control" name="idnumber" required id="formGroupExampleInput" placeholder="National ID Number">
                                </div>
                                </div>

                    </div>

                </div>

                {{-- Phone Number --}}
                <div class="form-group row">

                    <div class="col-md-4">

                        <label for="email" class="">{{ __('Phone Number') }}</label>

                    </div>
                    <div class="col-md-8">
                            <div class="form-group">
                                <div class="input-group">

                                  <input type="text" class="form-control" name="phone" required id="formGroupExampleInput" placeholder="Mobile Phone Number">
                                </div>
                                </div>

                    </div>

                </div>

                {{-- date of birth --}}
                <div class="form-group row">

                    <div class="col-md-4">

                        <label for="email" class="">{{ __('Date of Birth') }}</label>

                    </div>
                    <div class="col-md-8">
                            <div class="form-group">
                                <div class="input-group">

                                  <input type="date" class="form-control" name="dob" required id="formGroupExampleInput" placeholder="Date of Birth">
                                </div>
                                </div>

                    </div>

                </div>

        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        {{-- </form> --}}
        </div>
    </form>
      </div>
    </div>


