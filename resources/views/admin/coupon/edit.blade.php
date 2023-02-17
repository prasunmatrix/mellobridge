@extends('admin.layouts.after-login-layout')


@section('unique-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Coupon Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.coupon.list')}}">Coupon List</a></li>
              <li class="breadcrumb-item active">Coupon Edit</li>
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

                            <form action="{{route('admin.coupon-editSubmit',[$encryptCode])}}" method="POST"  id="user_edit">
                                    {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-10">
                                    
                                                 <div class="form-group row">
                                                        <label for="Title" class="col-sm-2 col-form-label">User Name : <span class="error">*</span></label>
                                                        <div class="col-sm-10">
                                                        <select class="form-control select2 select2-danger" value="{{old('name')}}"name="name" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                           <option value="">Choose option</option>
                                                             @if(!empty($userList))
                                                             @foreach ($userList as $user)
                                                             <option value="{{$user->id}}" {{ $details->user_id == $user->id ? 'selected' : '' }}>{{$user->name}}</option>
                                                             <!--<option value="{{$user->id}}">{{$user->name}}</option>-->
                                                             @endforeach
                                                               @endif
                                                        </select>
                                                        
                                                        </div>
                                                    </div>
                                        
                                        <div class="form-group row">
                                            <label for="Title" class="col-sm-2 col-form-label">Discount Amount($) : <span class="error">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="amount" id="amount" value="{{$details->discount_amount}}" class="form-control" placeholder="Amount" title="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Title" class="col-sm-2 col-form-label">Coupon code: <span class="error">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="" id="" value="{{$details->coupon_code}}" readonly class="form-control" placeholder="Amount" title="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Title" class="col-sm-2 col-form-label">Valid From : <span class="error">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="valid_from" id="valid_from" value="{{$details->valid_from}}" class="form-control" placeholder="Valid From" title="Phone">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="Title" class="col-sm-2 col-form-label">Valid Upto : <span class="error">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="valid_upto" id="valid_upto" value="{{$details->valid_upto}}" class="form-control" placeholder="Valid Upto" title="Phone">
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
                                                    <a class="btn btn-primary back_new" href="{{route('admin.coupon.list')}}">Back</a>
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
         
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>        
<script> 
        $(document).ready(function() { 
          
            $(function() { 
                $( "#valid_from" ).datepicker({ dateFormat: 'yy-mm-dd' }); 
                $( "#valid_upto" ).datepicker({ dateFormat: 'yy-mm-dd' }); 
            }); 
        }) 
</script>
<script>
$(function () {
  $("select").select2();
});
</script>
  @endsection
      

         
         
              
             

                

      