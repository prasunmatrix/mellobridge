@extends('admin.layouts.after-login-layout')


@section('unique-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Shipment Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.shipment.list')}}"> Shipment List</a></li>
              <li class="breadcrumb-item active">Shipment Edit</li>
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

                            @php
                                $settingsDetails= (object)json_decode($details->setting_json);                                   
                            @endphp

                            <form action="{{route('admin.shipment-editSubmit',[$encryptCode])}}" method="POST"  id="user_edit">
                                    {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-10">
                                    
                                        <div class="form-group row">
                                            <label for="Title" class="col-sm-2 col-form-label">Tracking Number : <span class="error">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" readonly  value="{{$details->tracking_numbers}}" class="form-control" placeholder="Tracking Numbers" title="Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Title" class="col-sm-2 col-form-label">Weight : <span class="error">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="weight" id="weight" value="{{$details->weight}}" readonly class="form-control" placeholder="Weight" title="Weight">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Title" class="col-sm-2 col-form-label">Weight Unit : <span class="error">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="weight_unit" id="weight_unit" readonly value="{{$details->weight_unit}}" class="form-control" placeholder="Weight" title="Weight">
                                            </div>
                                        </div>
                                        <h5> From Address </h5>

                                        <div class="form-group row">
                                            <label for="Title" class="col-sm-2 col-form-label">First Name : <span class="error">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="from_first_name" id="from_first_name"  value="{{$from_address['first_name']}}" class="form-control" placeholder="First Name" title="Weight">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Title" class="col-sm-2 col-form-label">Last Name : <span class="error">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="from_last_name" id="from_last_name"  value="{{$from_address['last_name']}}" class="form-control" placeholder="Last Name" title="Weight">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Title" class="col-sm-2 col-form-label">Company Name : <span class="error">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="from_company_name" id="from_company_name"  value="{{$from_address['company_name']}}" class="form-control" placeholder="Company Name" title="Weight">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Title" class="col-sm-2 col-form-label">City : <span class="error">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="from_city" id="from_city"  value="{{$from_address['city']}}" class="form-control" placeholder="City" title="Weight">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Title" class="col-sm-2 col-form-label">Postal Code : <span class="error">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="from_postal_code" id="from_postal_code" readonly value="{{$from_address['postal_code']}}" class="form-control" placeholder="Weight" title="Weight">
                                            </div>
                                        </div>
                                        <h5> To Address</h5>

                                        <div class="form-group row">
                                            <label for="Title" class="col-sm-2 col-form-label">First Name : <span class="error">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="to_first_name" id="to_first_name"  value="{{$to_address['first_name']}}" class="form-control" placeholder="First Name" title="Weight">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Title" class="col-sm-2 col-form-label">Last Name : <span class="error">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="to_last_name" id="to_last_name"  value="{{$to_address['last_name']}}" class="form-control" placeholder="Last Name" title="Weight">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Title" class="col-sm-2 col-form-label">Company Name : <span class="error">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="to_company_name" id="to_company_name"  value="{{$to_address['company_name']}}" class="form-control" placeholder="Company Name" title="Weight">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Title" class="col-sm-2 col-form-label">City : <span class="error">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="to_city" id="to_city"  value="{{$to_address['city']}}" class="form-control" placeholder="City" title="Weight">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Title" class="col-sm-2 col-form-label">Phone Number : <span class="error">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="number" maxlength="11" name="to_phone" id="to_phone"  value="{{$to_address['phone_number']}}" class="form-control" placeholder="phone no" title="Weight">
                                            </div>
                                        </div>


                                        <div class="card-footer">
                                                <div class="">
                                                    <a class="btn btn-primary back_new" href="{{route('admin.shipment.list')}}">Back</a>
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
  @endsection
      

         
         
              
             

                

      