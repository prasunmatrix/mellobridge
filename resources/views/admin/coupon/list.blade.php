@extends('admin.layouts.after-login-layout')

@section('unique-content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Coupon Management</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Coupon List</li>
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
                                @if(checkFunctionPermission('coupon-add'))
                                    <a href="{{route('admin.coupon-add')}}"
                                                                           class="btn btn-success btn-xs">Coupon
                                        Create</a>
                                        @endif
                                    </h3>
                                </div>
                               
                            <!-- /.card-header -->
                            <div class="card-body">
                                                            @if(count($errors) > 0)
                                            <div class="alert alert-danger alert-dismissable">
                                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">??</button>
                                                @foreach ($errors->all() as $error)
                                                    <span>{{ $error }}</span><br/>
                                                @endforeach
                                            </div>
                                        @endif

                                        @if(Session::has('success'))
                                            <div class="alert alert-success alert-dismissable __web-inspector-hide-shortcut__">
                                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">??</button>
                                                {{ Session::get('success') }}
                                            </div>
                                        @endif

                                        @if(Session::has('error'))
                                            <div class="alert alert-danger alert-dismissable">
                                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">??</button>
                                                {{ Session::get('error') }}
                                            </div>
                                        @endif
                                <table class="table table table-bordered table-striped" id="coupon-table">
                                    <thead>
                                    <tr>
                                    <th>User</th>
                                    <th>Coupon Code</th>
                                    <th>Discount Amount($)</th>
                                    <th>Valid From</th>
                                    <th>Valid Upto</th>
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
                   oTable = $('#coupon-table').DataTable({
                       processing: true,
                       serverSide: true,
                        pageLength: 50,
                       ajax: {
                           url: '{!! route("admin.coupon.list.table") !!}',
                           data: function (d) {
                               d.type = $('select[name=type]').val();
                           }
                       },
                       columns: [
                        {data: 'name', name: 'name'},
                        {data: 'coupon_code', name: 'coupon_code'},
                        {data: 'discount_amount', name: 'discount_amount'},
                        {data: 'valid_from', name: 'valid_from'},
                        {data: 'valid_upto', name: 'valid_upto'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                       ],
                       drawCallback: function () {
                           // $('[data-toggle=confirmation]').confirmation({
                           //     rootSelector: '[data-toggle=confirmation]',
                           //     container: 'body'
                           // });
                       }
                   });
                   $('select[name="type"]').on("change", function (event) {
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
                        text: "Once deleted, you will not be able to recover this data!",
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


    