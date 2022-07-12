@extends('layouts.app')

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
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="row">
                  @include('admin.sidebar')
                  <div class="col-sm-9">
                    <div class="card">
                        <div class="card-header">Organization Editing</div>

                      <div class="card-body">
                        <h5 class="card-title"> <strong></strong></h5>


                        <div class="row">
                          <div class="col-sm-12">
                          {{-- <div class="card"> --}}
                            <div class="card-body">
                                <form method="POST" action="{{ route('edit.organization') }}">
                                    @csrf
                                    <input type="text" hidden value="{{$store->id}}" name="store">
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('Name') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $store->name }}" placeholder="Collection Point Name" required autocomplete="name" autofocus>
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$store->email}}"  placeholder="Collection Email Address" required autocomplete="email">
            
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="phone" class="col-md-4 col-form-label text-md-left">{{ __('Mobile Phone Number') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $store->phone }}" placeholder="Collection Point Mobile Number"required autocomplete="phone">
            
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- //Location start --}}
                                    {{-- <div class="form-group row">
                      
                                        <div class="col-md-4">
                    
                                            <label for="email" class="">{{ __('Ward') }}</label>
                    
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <select class="custom-select "  required name="county" id="inlineFormCustomSelect">
                                                        <option value="{{$store->ward_id}}" selected>{{$store->ward->name}}</option>
                                                            @foreach ( $wards as $ward)
                                                        <option value="{{$ward->id}}">{{$ward->name}}</option>
                                                            @endforeach
                    
                    
                                                          </select>
                                                      
                                                    </div>
                                                    </div>
                    
                                        </div>
                    
                                    </div> --}}
                                    <div class="form-group row">
                                        <label for="phone" class="col-md-4 col-form-label text-md-left">{{ __('Location') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="location" type="text" class="form-control @error('phone') is-invalid @enderror" name="location" value="{{ $store->location}}" placeholder="Collection Point Location"required autocomplete="phone">
            
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>




                                        {{-- Atttendants --}}

                                        {{-- <div class="form-group row">
                                            <label for="attendants" class="col-md-4 col-form-label text-md-left">{{ __('Attendants') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="attendants" type="text" class="form-control @error('attendants') is-invalid @enderror" name="attendants" value="{{ $store->attendants }}" placeholder="Number of Attendants"required autocomplete="attendants">
                
                                                @error('attendants')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div> --}}


            
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Update') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>

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
@endsection
