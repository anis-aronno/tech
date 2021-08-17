@extends('admin.include.master') 
	@section('title') New Counter - Alesha Tech Ltd. @endsection 
@section('content')

	<div class="layout-content">
        <div class="layout-content-body">
        	<div class="col-sm-12">
                <div class="page-header">
                    <h3 class="page-title">Create New Counter</h3>
                        <ol class="breadcrumb">
                            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li>Settings</li>
                            <li class="active">New Counter</li>
                            <li style="text-align:right; float:right">
                            	<a  href="{{ route('counter.index') }}" style="color:#fff;"><i class="fa fa-list"></i> View Counter List</a>
                            </li>
                        </ol>
                </div>
            
              @if (session()->has('messageType'))
                  <div class="alert alert-{{ session()->get('messageType') }}" role="alert">
                      <strong>STATUS: </strong> {{ session()->get('message') }}
                  </div>
              @endif
			</div>
              <div class="row-fluid">
                <div class="col-sm-12">
                  <div class="card">
                      
                      <div class="row" style="margin:10px">
                      	<div class="col-sm-12">
                            <form method="POST" action="{{ route('counter.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Total') }}</label>
                            <div class="col-md-6">
                                <input id="url" type="number" class="form-control" name="totals" value="{{ old('totals') }}">
                                @if ($errors->has('totals'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('totals') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                       
                       
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Sequence') }}</label>
                            <div class="col-md-8">
                                <input id="sequence" type="number" class="form-control" name="sequence" value="{{ old('sequence') }}" style="width:30%">
                                @if ($errors->has('sequence'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sequence') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Status') }}</label>
                            <div class="col-md-8">
                               <select name="status" class="form-control">
                               	 <option value="1">Display</option>
                                 <option value="0">Not Display</option>
                               </select>
                            </div>
                        </div>
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form> 
                    	</div>
                      </div>
                  </div>
                </div>  
              </div>
			</div>
        </div>
@endsection