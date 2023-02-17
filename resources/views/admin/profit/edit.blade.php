@extends('admin.layouts.after-login-layout')


@section('unique-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profit Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.profit.list')}}">Profit List</a></li>
              <li class="breadcrumb-item active">Profit Edit</li>
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

                           

                            <form action="{{route('admin.profit-editSubmit',[$encryptCode])}}" method="POST"  id="user_edit">
                                    {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-10">
                                    
                                    <div class="form-group row">
                                            <label for="Title" class="col-sm-2 col-form-label">Weight From : <span class="error">*</span></label>
                                            <div class="col-sm-10">
                                            <input type="text" readonly value="{{$details->start_weight}}" class="form-control" placeholder="Amount" title="Email">
                                            </div>
                                        </div>  
                                        <div class="form-group row">
                                            <label for="Title" class="col-sm-2 col-form-label">Weight to : <span class="error">*</span></label>
                                            <div class="col-sm-10">
                                            <input type="text" readonly value="{{$details->end_weight}}" class="form-control" placeholder="Amount" title="Email">
                                            </div>
                                        </div>     
                                        <div class="form-group row">
                                            <label for="Title" class="col-sm-2 col-form-label">Unit : <span class="error">*</span></label>
                                            <div class="col-sm-10">
                                            <input type="text" readonly value="{{$details->unit}}" class="form-control" placeholder="Amount" title="Email">
                                            </div>
                                        </div>         
                                        
                                        <div class="form-group row">
                                            <label for="Title" class="col-sm-2 col-form-label">Price : <span class="error">*</span></label>
                                            <div class="col-sm-10">
                                            <input type="text" name="price" id="price" value="{{$details->price}}" class="form-control" placeholder="Amount" title="Email">
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
                                                    <a class="btn btn-primary back_new" href="{{route('admin.notification.list')}}">Back</a>
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
      

         
         
              
             

                

      