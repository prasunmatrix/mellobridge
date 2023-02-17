@extends('admin.layouts.after-login-layout')


@section('unique-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Setting Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.insurance-price.list')}}">Setting List</a></li>
              <li class="breadcrumb-item active">Setting Edit</li>
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
                            <form action="{{route('admin.price.edit',[$encryptCode])}}" method="POST" enctype="multipart/form-data" id="category_edit">
                                    {{ csrf_field() }}
                                <div class="row">
                                        <div class="col-md-10">
                                    
                                            <div class="form-group row">
                                                <label for="Title" class="col-sm-2 col-form-label">Insurance Price(%): <span class="error">*</span></label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="price" id="price"  value="{{$details->insurance_price}}" class="form-control" placeholder="Price" title="Price">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="Title" class="col-sm-2 col-form-label"> Label Price : <span class="error">*</span></label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="lable_price" id="lable_price"  value="{{$details->lable_price}}" class="form-control" placeholder="Price" title="Price">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="Title" class="col-sm-2 col-form-label"> Admin Email : <span class="error">*</span></label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="admin_email" id="admin_email"  value="{{$details->admin_email}}" class="form-control" placeholder="Email" title="Admin Email">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="Title" class="col-sm-2 col-form-label"> Phone : <span class="error">*</span></label>
                                                <div class="col-sm-10">
                                                    <input type="number" maxlength="11"name="phone" id="phone"  value="{{$details->phone}}" class="form-control" placeholder="Phone" title="Phone">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="Title" class="col-sm-2 col-form-label"> Company Name: <span class="error">*</span></label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="compnay_name" id="company_name"  value="{{$details->company_name}}" class="form-control" placeholder="Company Name" title="Company Name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label  class="col-sm-2 col-form-label" >Current Logo</label>
                                                <div class="col-sm-10">
                                                    <img src="{{ asset('assets/uploads/'.$details->logo.'') }}" alt="" height="150" width="150" id="logo">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" >Logo</label>
                                                <div class="col-sm-10">
                                                    <input type="file" name="logo"  id="logo" value="{{ $details->logo }}" class="form-control" >
                                                </div>
                                            </div> 
                                           
                                            
                                           
                                        <div class="">
                                                <div class="">
                                                    <a class="btn btn-primary back_new" href="{{route('admin.insurance-price.list')}}">Back</a>
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
 

      

         
         
              
             

                

      