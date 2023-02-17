@extends('admin.layouts.after-login-layout')


@section('unique-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>State Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.state.list')}}">State List</a></li>
              <li class="breadcrumb-item active">State Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">{{$panel_title}}</h3>
                                </div>
                            <!-- /.card-header -->
                        <div class="card-body">
        
                    
                            @if(count($errors) > 0)
                                <div class="alert alert-danger alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    @foreach ($errors->all() as $error)
                                        <span>{{ $error }}</span><br/>
                                    @endforeach
                                </div>
                            @endif

                            @if(Session::has('success'))
                                <div class="alert alert-success alert-dismissable __web-inspector-hide-shortcut__">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    {{ Session::get('success') }}
                                </div>
                            @endif

                            @if(Session::has('error'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    {{ Session::get('error') }}
                                </div>
                            @endif


                            <form action="{{route('admin.state-editSubmit',[$encryptCode])}}" method="POST"  id="user_edit">
                                    {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-10">
                                    
                                                 <div class="form-group row">
                                                        <label for="Title" class="col-sm-2 col-form-label">Country Name : <span class="error">*</span></label>
                                                        <div class="col-sm-10">
                                                        <select class="form-control select2 select2-danger" value="{{old('country_name')}}"name="country_name" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                           <option value="">Choose option</option>
                                                             @if(!empty($countryList))
                                                             @foreach ($countryList as $country)
                                                             <option value="{{$country->id}}" {{ $details->country_id == $country->id ? 'selected' : '' }}>{{$country->country_name}}</option>
                                                           
                                                             @endforeach
                                                               @endif
                                                        </select>
                                                        
                                                        </div>
                                                    </div>
                                        
                                        <div class="form-group row">
                                            <label for="Title" class="col-sm-2 col-form-label">State : <span class="error">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="name" id="name" value="{{$details->name}}" class="form-control" placeholder="State" title="State">
                                            </div>
                                        </div>
                                                                                
                                        <div class="form-group row">
                                            <label for="Title" class="col-sm-2 col-form-label">State Code: <span class="error">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="state_code" id="state_code" value="{{$details->state_code}}" class="form-control" placeholder="State Code" title="State Code">
                                            </div>
                                        </div>
                                        
                                      


                                      {{--  <div class="form-group row">
                                            <label for="Title" class="col-sm-2 col-form-label">Status : <span class="error">*</span></label>
                                            <div class="col-sm-10">
                                            <select class="form-control select2 select2-danger" name="status" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                    <option value="">Choose option</option>
                                                    <option value="A" {{ $details->status == 'A' ? 'selected' : '' }}>Active</option>
                                                    <option value="I" {{ $details->status == 'I' ? 'selected' : '' }} >Inactive</option>
                                            </select>
                                            </div>
                                        </div>--}}
                                        <div class="card-footer">
                                                <div class="">
                                                    <a class="btn btn-primary back_new" href="{{route('admin.state.list')}}">Back</a>
                                                    <button id="" type="submit" class="btn btn-success submit_new">Update</button>
                                                </div>
                                        </div>
                                            
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
  </div>
         

<script>
$(function () {
  $("select").select2();
});
</script>
  @endsection
      

         
         
              
             

                

      