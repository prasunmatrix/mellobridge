@extends('admin.layouts.after-login-layout')

@section('unique-content')
<div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Shipment Management</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Shipment Detail</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">{{$panel_title}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                  <div class="card-body">
                    <div class="form-group">
                        <label for="name">Status:</label>
                        {{ ucfirst($pageDetails->status) }}
                    </div> 
                    <div class="form-group">
                        <label for="rules">Mail Class :</label>
                        {{$pageDetails->mail_class}} 
                    </div>
                    <div class="form-group">
                        <label for="rules">Total Amount :</label>
                        $ {{$pageDetails->totalpay}} 
                    </div>
                    <div class="form-group">
                        <label for="rules">Weight :</label>
                        {{$pageDetails->weight}} {{$pageDetails->weight_unit}}
                    </div>
                    <div class="form-group">
                        <label for="rules">Pricing :</label>
                        {{$pageDetails->pricing}}
                    </div>
                    <div class="form-group">
                        <label for="rules">Postmark Date :</label>
                        {{$pageDetails->postmark_date}}
                    </div>
                    <div class="form-group">
                        <label for="rules">Shipping Status :</label>
                        @if($pageDetails->shipping_status=='')
                        {{'NA'}}
                        @else
                        {{$pageDetails->shipping_status}}
                        @endif
                    </div>
                    <!-- /.card-body -->
                    <div class="">
                       
                                
                            
                    </div>
                  </div>        
            </div>
            <div class="row">
              <div class="col-md-1">
              
                  
              </div>
            </div>
        </div>    

        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Fees Info</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                  <div class="card-body">
                    <div class="form-group">
                        <label for="name">Fees Amount:</label>
                        {{ ucfirst($pageDetails->fees_amount) }}
                    </div> 
                    <div class="form-group">
                        <label for="rules">Postage Price :</label>
                        {{$pageDetails->postage_amount}} 
                    </div>
                    <div class="form-group">
                        <label for="rules">Total Amount :</label>
                        $ {{$pageDetails->total_amount}} 
                    </div>
                   
                    
                   
                    <!-- /.card-body -->
                    <div class="">
                       
                            <a class="btn btn-primary back_new" href="{{route('admin.shipment.list')}}">Back</a>
                                
                            
                    </div>
                  </div>        
            </div>
            <div class="row">
              <div class="col-md-1">
              
                  
              </div>
            </div>
        </div> 
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Shipment Description</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                  <div class="card-body">
                    <div class="form-group">
                        <label for="name">Description:</label>
                        {{$pageDetails->parcel_description }}
                    </div> 
                    
                   
                    
                   
                    <!-- /.card-body -->
                    <div class="">
                       
                            <a class="btn btn-primary back_new" href="{{route('admin.shipment.list')}}">Back</a>
                                
                            
                    </div>
                  </div>        
            </div>
            <div class="row">
              <div class="col-md-1">
              
                  
              </div>
            </div>
        </div> 
    </section>
</div>
@endsection