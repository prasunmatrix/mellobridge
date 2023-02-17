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
                  <h3 class="card-title">Tracking Info</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                  <div class="card-body">
                  @if(!empty(@trackingStatus))
                @foreach($trackingStatus as $key=>$tracking)
                    <div class="form-group">
                        <label for="name">Status:</label>
                        {{$tracking['status']}}   
                    </div> 
                    <div class="form-group">
                        <label for="name">Time:</label>
                          Time: {{$tracking['timestamp']}} 
                    </div> 
                    @endforeach
                @endif
                   
                    
                   
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