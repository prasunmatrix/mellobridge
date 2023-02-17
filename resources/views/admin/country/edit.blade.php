@extends('admin.layouts.after-login-layout')


@section('unique-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.'.\App::getLocale().'.dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.'.\App::getLocale().'.category.list')}}">Category List</a></li>
              <li class="breadcrumb-item active">Category Edit</li>
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
                            <form action="{{route('admin.'.\App::getLocale().'.edit',[$encryptCode])}}" method="POST"  id="category_edit">
                                    {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-10">
                                    
                                            <div class="form-group row">
                                                <label for="Title" class="col-sm-2 col-form-label">Name : <span class="error">*</span></label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="name" id="name"  value="{{$details->name}}" class="form-control" placeholder=" Name" title="Name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="Title" class="col-sm-2 col-form-label">Slug : <span class="error">*</span></label>
                                                    <div class="col-sm-10">
                                                    <input type="text" name="slug" id="slug" value="{{$details->slug}}" class="form-control" placeholder=" Slug" title="Slug">
                                                    </div>
                                                </div>
                                            
                                            <div class="form-group row">
                                                <label for="Title" class="col-sm-2 col-form-label">Status : <span class="error">*</span></label>
                                                <div class="col-sm-10">
                                                    <select class="form-control select2 select2-danger" name="status" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                            <option value="">Choose option</option>
                                                            <option value="A" {{ $details->status == 'A' ? 'selected' : '' }}>Active</option>
                                                            <option value="I" {{ $details->status == 'I' ? 'selected' : '' }} >Inactive</option>
                                                    </select>   
                                                </div>
                                        </div>
                                        <div class="">
                                                <div class="">
                                                    <a class="btn btn-primary back_new" href="{{route('admin.'.\App::getLocale().'.category.list')}}">Back</a>
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
 

      

         
         
              
             

                

      