<div class="left-menu">
    <div class="top-button">
        <a href="javascript:void(0)" onclick="popupCreate();" class="btn-md btn-purple block">Create Shipment</a>
        <!-- <button class="btn-md btn-purple block" onclick="popupOne();">Create Shipment</button> -->
        <a href="{{url('/import-shipment')}}" class="btn-md btn-black block">Import Shipment</a>
    </div>
    <div class="left-credits-box">
        <div class="col">
          <div class="box">
              <div class="row">
                <div class="col-50">
                    <div class="title">Available</div>
                    <div class="price">${{Auth::guard('frontenduser')->user()->wallet_amount}}</div>
                </div>
                <div class="col-50">
                  @php 
                  $unpaid=App\Models\Mastershipment::where(['is_deleted' => 'N'])->where('is_paid','=',0)->where('user_id','=',Auth::guard('frontenduser')->user()->id)->sum('totalpay');
                  @endphp
                    <div class="title">Unpaid</div>
                    @if($unpaid ==0)
                    <div class="price unpaid">$0.00</div>
                    @else
                    <div class="price unpaid">${{$unpaid}}</div>
                    @endif
                </div>
              </div>
              <a href="{{url('/add-credits')}}" class="btn-sm btn-purple block">Add Credits</a>
          </div>
        </div>
    </div>
    <div class="left-nav">
        <ul>
          
          <li class=@if(Route::currentRouteName()=='dashboard'){{'active'}}@endif><a href="{{url('/dashboard')}}">Dashboard</a></li>
          <li class=@if(Route::currentRouteName()=='pending-shipment'){{'active'}}@endif><a href="{{url('/pending-shipment')}}">Pending</a></li>
                                
          <li class=@if(Route::currentRouteName()=='intransit-shipment'){{'active'}}@endif><a href="{{url('/intransit-shipment')}}">In Transit</a></li>
          <li class=@if(Route::currentRouteName()=='delivered'){{'active'}}@endif><a href="{{url('/delivered')}}">Delivered</a></li>
          <li class=@if(Route::currentRouteName()=='archived'){{'active'}}@endif><a href="{{url('/archived')}}">Archived</a></li>
          <li class=@if(Route::currentRouteName()=='exception'){{'active'}}@endif><a href="{{url('/exception')}}">Exception</a></li>
          <li class=@if(Route::currentRouteName()=='void-shipment'){{'active'}}@endif><a href="{{url('/void-shipment')}}">Voided</a></li>
          <li class=@if(Route::currentRouteName()=='all-shipment'){{'active'}}@endif><a href="{{url('/all-shipment')}}">All Shipments</a></li>
          <!-- <li><a href="#">Batches</a></li> -->
          <li class=@if(Route::currentRouteName()=='return'){{'active'}}@endif><a href="{{url('/return')}}">Returns</a></li>
        </ul>
        <ul class="bottom-list">
          <li class=@if(Route::currentRouteName()=='settings'|| Route::currentRouteName()=='account'){{'active'}}@endif><a href="{{url('/settings')}}">Settings</a></li>
          <li><a href="{{url('/contact-us')}}">Contact Us</a></li>
          <li><a href="{{url('/signout')}}">Sign Out</a></li>
        </ul>
    </div>
  </div>