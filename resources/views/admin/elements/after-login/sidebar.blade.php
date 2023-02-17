<!-- Main Sidebar Container -->
@php
    $admin = auth()->guard('admin')->user();
    $admin_image = $admin->profilePicLink
@endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="User Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Panel |Mello Bridge</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('site/assets/images/MelloBridge.svg')}}" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ $admin->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                {{--<li class="nav-item has-treeview">
                    <a href="#"
                       class="nav-link"></i>
                        <p>
                            Home
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview @if(Route::currentRouteName()=='admin.dashboard' 
                    ){{'style="display: block;"'}}@endif">
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}"
                               class="nav-link @if(Route::currentRouteName()=='admin.dashboard'){{'active'}}@endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        
     
                        

                    </ul>
                </li>--}}
                <li class="nav-item">
                            <a href="{{route('admin.dashboard')}}"
                                class="nav-link @if(Route::currentRouteName()=='admin.dashboard'
                                ){{'active'}}@endif"> 
                                        
                                <i class="far  fa-circle  nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                
                <li class="nav-item has-treeview @if(Route::currentRouteName()=='admin.user-management.role-list'
                                        ||Route::currentRouteName()=='admin.user-management.role-add'  
                                        || Route::currentRouteName()=='admin.user-management.edit'
                                        ||Route::currentRouteName()=='admin.user-management.role.permission' 
                                        ||Route::currentRouteName()=='admin.user-management.user.list' 
                                        ||Route::currentRouteName()=='admin.user-management.user.add' 
                                        ||Route::currentRouteName()=='admin.user-management.user-edit' 
                                        ||Route::currentRouteName()=='admin.user-management.front-user.list' 
                                        ||Route::currentRouteName()=='admin.user-management.front-user.add' 
                                        ||Route::currentRouteName()=='admin.user-management.front-user-edit' 
                                        ){{'menu-open'}}@endif">
                    <a href="#"
                    class="nav-link  @if(Route::currentRouteName()=='admin.user-management.role-list'
                                        ||Route::currentRouteName()=='admin.user-management.role-add'  
                                        || Route::currentRouteName()=='admin.user-management.edit'
                                        ||Route::currentRouteName()=='admin.user-management.role.permission' 
                                        ||Route::currentRouteName()=='admin.user-management.user.list' 
                                        ||Route::currentRouteName()=='admin.user-management.user.add' 
                                        ||Route::currentRouteName()=='admin.user-management.user-edit' 
                                        ||Route::currentRouteName()=='admin.user-management.front-user.list' 
                                        ||Route::currentRouteName()=='admin.user-management.front-user.add' 
                                        ||Route::currentRouteName()=='admin.user-management.front-user-edit' 
                                        ){{'active'}}@endif">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            User Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview @if(Route::currentRouteName()=='admin.user-management.role-list'
                                        ||Route::currentRouteName()=='admin.user-management.role-add'  
                                        || Route::currentRouteName()=='admin.user-management.edit'
                                        ||Route::currentRouteName()=='admin.user-management.role.permission' 
                                        ||Route::currentRouteName()=='admin.user-management.user.list' 
                                        ||Route::currentRouteName()=='admin.user-management.user.add' 
                                        ||Route::currentRouteName()=='admin.user-management.user-edit' 
                                        ||Route::currentRouteName()=='admin.user-management.front-user.list' 
                                        ||Route::currentRouteName()=='admin.user-management.front-user.add' 
                                        ||Route::currentRouteName()=='admin.user-management.front-user-edit' 
                                        ){{'style="display: block;"'}}@endif">
                                        @if(Auth::guard('admin')->user()->id ==1)
                        <li class="nav-item">
                            <a href="{{route('admin.user-management.role-list')}}"
                                class="nav-link @if(Route::currentRouteName()=='admin.user-management.role-list'
                                        ||Route::currentRouteName()=='admin.user-management.role-add'  
                                        || Route::currentRouteName()=='admin.user-management.edit'
                                        ||Route::currentRouteName()=='admin.user-management.role.permission' 
                                        ){{'active'}}@endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Role Management</p>
                            </a>
                        </li>
                        @endif
                        @if(checkFunctionPermission('user-management.user.list'))
                        <li class="nav-item">
                            <a href="{{route('admin.user-management.user.list' )}}"
                             class="nav-link @if(Route::currentRouteName()=='admin.user-management.user.list' 
                                        ||(Route::currentRouteName()=='admin.user-management.user-edit' && isset($details->usertype))
                                        || Route::currentRouteName()=='admin.user-management.user.add'){{'active'}}@endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Staff List</p>
                            </a>
                        </li>
                        @endif
                        @if(checkFunctionPermission('user-management.front-user.list'))
                        <li class="nav-item">
                            <a href="{{route('admin.user-management.front-user.list' )}}"
                             class="nav-link @if(Route::currentRouteName()=='admin.user-management.front-user.list' 
                                        ||(Route::currentRouteName()=='admin.user-management.front-user-edit' && isset($details->usertype) && $details->usertype = 'FU')
                                        || Route::currentRouteName()=='admin.user-management.front-user.add'){{'active'}}@endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p> User List</p>
                            </a>
                        </li>
                        @endif

                        
                    </ul>
                </li>
                <li class="nav-item has-treeview @if(Route::currentRouteName()=='admin.shipment.list'
                                        ||Route::currentRouteName()=='admin.shipment.edit'  
                                        || Route::currentRouteName()=='admin.shipment.tracking-detail'
                                        ||Route::currentRouteName()=='admin.counry.list' 
                                        ||Route::currentRouteName()=='admin.shipment-track.list'  
                                        ||Route::currentRouteName()=='admin.state-add'
                                        ||Route::currentRouteName()=='admin.state.edit'
                                        ||Route::currentRouteName()=='admin.state.list'){{'menu-open'}}@endif">
                    <a href="#"
                    class="nav-link @if(Route::currentRouteName()=='admin.shipment.list'
                                        ||Route::currentRouteName()=='admin.shipment.edit'  
                                        || Route::currentRouteName()=='admin.shipment.tracking-detail'
                                        ||Route::currentRouteName()=='admin.counry.list' 
                                        ||Route::currentRouteName()=='admin.shipment-track.list'  
                                        ||Route::currentRouteName()=='admin.state-add'
                                        ||Route::currentRouteName()=='admin.state.edit'
                                        ||Route::currentRouteName()=='admin.state.list'){{'active'}}@endif">
                        <i class="nav-icon fas fa-shipping-fast"></i>
                        <p>
                            Shipment Management
                            <i class="right fas fa-angle-left"></i>
                            
                        </p>
                    </a>
                    <ul class="nav nav-treeview @if(Route::currentRouteName()=='admin.shipment.list'
                                        ||Route::currentRouteName()=='admin.shipment.edit'  
                                        || Route::currentRouteName()=='admin.shipment.tracking-detail'
                                        ||Route::currentRouteName()=='admin.counry.list' 
                                        ||Route::currentRouteName()=='admin.shipment-track.list'  
                                        ||Route::currentRouteName()=='admin.state-add'
                                        ||Route::currentRouteName()=='admin.state.edit'
                                        ||Route::currentRouteName()=='admin.state.list'){{'style="display: block;"'}}@endif">
                        <li class="nav-item">
                            <a href="{{route('admin.country.list')}}"
                                class="nav-link @if(Route::currentRouteName()=='admin.country.list' 
                                        ){{'active'}}@endif"> 
                                        
                                <i class="far fa-circle nav-icon"></i>
                                <p>Country List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.state.list')}}"
                                class="nav-link @if(Route::currentRouteName()=='admin.state.list' 
                                ||Route::currentRouteName()=='admin.state-add'
                                ||Route::currentRouteName()=='admin.state.edit'){{'active'}}@endif"> 
                                        
                                <i class="far fa-circle nav-icon"></i>
                                <p>State List</p>
                            </a>
                        </li>
                        @if(checkFunctionPermission('shipment.list'))
                        <li class="nav-item">
                            <a href="{{route('admin.shipment.list')}}"
                                class="nav-link @if(Route::currentRouteName()=='admin.shipment.list'
                                        ||Route::currentRouteName()=='admin.shipment.edit'  
                                        || Route::currentRouteName()=='admin.shipment.tracking-detail' 
                                        ){{'active'}}@endif">   
                                <i class="far fa-circle nav-icon"></i>
                                <p>Shipment List</p>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{route('admin.shipment-track.list')}}"
                                class="nav-link  @if(Route::currentRouteName()=='admin.shipment-track.list' 
                                        ){{'active'}}@endif 
                                        ">
                                        
                                <i class="far fa-circle nav-icon"></i>
                                <p>Shipment Tracking</p>
                            </a>
                        </li>

                        
                    </ul>
                </li>
                <li class="nav-item">
                            <a href="{{route('admin.price-add')}}"
                                class="nav-link @if(Route::currentRouteName()=='admin.price-add'
                                ){{'active'}}@endif"> 
                                        
                                <i class="far fa fa-calculator nav-icon"></i>
                                <p>Price Calculator</p>
                            </a>
                        </li>
    
                    @if(checkFunctionPermission('insurance-price.list'))
                        <li class="nav-item">
                            <a href="{{route('admin.insurance-price.list')}}"
                                class="nav-link @if(Route::currentRouteName()=='admin.insurance-price.list'
                                ||Route::currentRouteName()=='admin.price.edit'){{'active'}}@endif"> 
                                        
                                <i class="far fa fa-cog nav-icon"></i>
                                <p>Setting Management</p>
                            </a>
                        </li>
                        @endif
                @if(checkFunctionPermission('support.list'))
                        <li class="nav-item">
                            <a href="{{route('admin.support.list')}}"
                                class="nav-link @if(Route::currentRouteName()=='admin.support.list'
                                ){{'active'}}@endif"> 
                                        
                                <i class="far fa fa-address-book nav-icon"></i>
                                <p>Support Management</p>
                            </a>
                        </li>
                @endif
                @if(checkFunctionPermission('coupon.list'))
                        <li class="nav-item">
                            <a href="{{route('admin.coupon.list')}}"
                                class="nav-link @if(Route::currentRouteName()=='admin.coupon.list'
                                || Route::currentRouteName()=='admin.coupon-add'
                                ||Route::currentRouteName()=='admin.coupon.edit'){{'active'}}@endif"> 
                                        
                                <i class="far fa fa-gift nav-icon"></i>
                                <p>Coupon Management</p>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{route('admin.report.list')}}"
                                class="nav-link @if(Route::currentRouteName()=='admin.report.list'
                                ){{'active'}}@endif"> 
                                        
                                <i class="far fa fa-file nav-icon"></i>
                                <p>Report Management</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.notification.list')}}"
                                class="nav-link @if(Route::currentRouteName()=='admin.notification.list'
                                || Route::currentRouteName()=='admin.notification-add'
                                ||Route::currentRouteName()=='admin.notification.edit'){{'active'}}@endif"> 
                                        
                                <i class="far fa fa-bell nav-icon"></i>
                                <p>Notication Management</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.profit.list')}}"
                                class="nav-link @if(Route::currentRouteName()=='admin.profit.list'
                                ||Route::currentRouteName()=='admin.profit.edit'){{'active'}}@endif"> 
                                        
                                <i class="far fa fa-gift nav-icon"></i>
                                <p>Profit Management</p>
                            </a>
                        </li>
                <li class="nav-item has-treeview @if(Route::currentRouteName()=='admin.cms-management.list' 
                || Route::currentRouteName()=='admin.cms-management.cms.add'
                || Route::currentRouteName()=='admin.cms-management.edit'
                || Route::currentRouteName()=='admin.cms-management.view'
                ){{'menu-open'}}@endif">
                    <a href="#"
                       class="nav-link @if(Route::currentRouteName()=='admin.cms-management.list'
                       || Route::currentRouteName()=='admin.cms-management.cms.add'
                        || Route::currentRouteName()=='admin.cms-management.edit'
                        || Route::currentRouteName()=='admin.cms-management.view'
                       ){{'active'}}@endif">
                        <i class="nav-icon fas fa-file-alt fa-lg"> </i>
                        <p>
                            Cms Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview @if(Route::currentRouteName()=='admin.cms-management.list'
                    || Route::currentRouteName()=='admin.cms-management.cms.add'
                    || Route::currentRouteName()=='admin.cms-management.edit'
                    || Route::currentRouteName()=='admin.cms-management.view' 
                  ){{'style="display: block;"'}}@endif">
                  @if(checkFunctionPermission('cms-management.list'))
                        <li class="nav-item">
                            <a href="{{route('admin.cms-management.list')}}"
                               class="nav-link @if(Route::currentRouteName()=='admin.cms-management.list' 
                               || Route::currentRouteName()=='admin.cms-management.cms.add'
                                || Route::currentRouteName()=='admin.cms-management.edit'
                                || Route::currentRouteName()=='admin.cms-management.view'
                               ){{'active'}}@endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cms List</p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>

               

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>