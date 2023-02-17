@extends('admin.layouts.after-login-layout')

@section('unique-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Shipment List</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Shipment List</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">

                        <!-- /.card -->

                        <div class="card card-primary">
                               
                                <div class="card-header">
                                    <h3 class="card-title">{{$panel_title}}
                                   
                                                                                
                                    </h3>
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
                                        <div class="select_area">
                                            <div class="row">
                                                <div class="col-sm-12 align_right">
                                                    <div class="add_area">
                                                        <label>Status:  </label> 
                                                        <select  class="form_control" name="status" id="status" data-dropdown-css-class="select2-danger" style="width: 25%;">
                                                        
                                                                <option value="">Choose option</option>
                                                                <option value="In Transit">In Transit</option>
                                                                <option value="Delivered">Delivered</option>
                                                                <option value="Void">Void</option>
                                                                <option value="Return">Return</option>
                                                            </select>
                                                            
                                                        {{--<input type="submit"  id="btnSubmit">  --}}
                                                    </div>
                                                     </br>
                                                </div>
                                            </div> 
                                        </div>  
                                <table class="table table table-bordered table-striped" id="shipment-table">
                                    <thead>
                                    <tr>
                                    <th>Tracking Number</th>
                                    <th>Weight</th>
                                    <th>Unit</th>
                                    <th>Shipment Value</th>
                                    <th>Total Amount</th>
                                    <th>Profit Margin</th>
                                    <th>Status</th>
                                    <th>Postmark Date</th>
                                    {{--<th>Track</th>--}}
                                    <th><em class="fa fa-cog"></em>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="overlay dark" id="card_loader">
                                <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->

                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->

                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <div>
        <!--import modal start -->
        <div id="import-producer" class="modal fade" role="dialog">
    <div class="modal-dialog">

       

        @endsection

        @push('custom-scripts')
            <!-- DataTables -->
            <script src="{{asset('assets//plugins/datatables/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
            <script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
            <script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
            <!-- Sweet alert -->
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script src="{{asset('assets/plugins/toastr/toastr.min.js')}}"></script>
           <script>
               $(document).ready(function () {
                   
                   oTable = $('#shipment-table').DataTable({
                       processing: true,
                       serverSide: true,
                        pageLength: 50,
                       ajax: {
                           url: '{!! route("admin.shipment.list.table") !!}',
                        //    data: {'status' : status},
                        data: function (d) {
                               d.status =$('#status').val();
                           }
                           
                       },
                       columns: [
                        {data: 'tracking_numbers', name: 'tracking_numbers'},
                        {data: 'weight', name: 'weight'},
                        {data: 'weight_unit', name: 'weight_unit'},
                        {data: 'postage_amount', name: 'postage_amount'},
                        {data: 'totalpay', name: 'totalpay'},
                        {data: 'client_profit_price', name: 'client_profit_price'},
                        {data: 'status', name: 'status'},
                        {data: 'postmark_date', name: 'postmark_date'},
                       // {data: 'track', name: 'track'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                       ],
                       drawCallback: function () {
                           // $('[data-toggle=confirmation]').confirmation({
                           //     rootSelector: '[data-toggle=confirmation]',
                           //     container: 'body'
                           // });
                       }
                   });
                   $('select[name="status"]').on("change", function (event) {
                       oTable.draw();
                       event.preventDefault();
                   });
               });
              
           
            $(document).on('click', '.delete-alert', function (e) {
                    e.preventDefault();
                    var redirectUrl = $(this).data('redirect-url');
                    // alert(redirectUrl)
                    swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this entry!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location.href = redirectUrl;
                        } 
                    });
                });
         
    </script>
    
    @endpush


    