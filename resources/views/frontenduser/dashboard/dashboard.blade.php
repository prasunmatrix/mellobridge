@extends('frontenduser.layout.mellobridgefrontuser')
@section('title', $page_title)
@section('content')
<style>
  .error{ color:red; } 
</style>

<section class="main-container">
  <!-- left menu start -->
  @include('frontenduser.elements.leftmenu')
  <!-- left menu end -->
  <!-- right content start -->
  <div class="right-content">
    <div class="user-notification">
        <div class="notification">
        {{--  <a href="#">
          <img src="{{ asset('frontenduser/assets/images/icon-notification.png') }}" alt="">
          <span class="circle"></span>
          </a> --}} 
        </div>
        <div class="user dropdown drophide" data-id="client">
          <div class="icon-user"></div>
          <div class="user-name">
              <div class="title">{{Auth::guard('frontenduser')->user()->name}}</div>
              <div class="client-id"></div>
          </div>
          <div class="icon-arrow drophide"></div>
          <div class="dropdown-menu totalhide" id="client">
              
              <a href="{{url('/signout')}}" class="dropdown-item ">
              <i class="fa fa-power-off"></i>  Log Out
              </a>
          </div>
        </div>
    </div>
    <div class="shipment-summary">
        <h2>Shipment Summary</h2>
        <div class="row summary-box">
          <div class="col">
              <div class="box">
                <div class="title">In Transit</div>
                <div class="number">{{$totalintransit}}</div>
                <a href="{{url('/intransit-shipment')}}" class="btn-view">View all</a>
              </div>
          </div>
          <div class="col">
              <div class="box">
                <div class="title">Pending</div>
                <div class="number">{{$totalpending}}</div>
                <a href="{{url('/pending-shipment')}}" class="btn-view">View all</a>
              </div>
          </div>
          <div class="col">
              <div class="box">
                <div class="title">Returns</div>
                <div class="number">0</div>
                <a href="{{url('/return')}}" class="btn-view">View all</a>
              </div>
          </div>
        </div>
    </div>
    <div class="credits">
        <h2>Credits</h2>
        <div class="row credits-box">
          <div class="col">
              <div class="box">
                <div class="row">
                    <div class="col-50">
                      <div class="title">Available</div>
                      <div class="price">${{Auth::guard('frontenduser')->user()->wallet_amount}}</div>
                    </div>
                    <div class="col-50">
                      <div class="title">Unpaid</div>
                      @php 
                  $unpaid=App\Models\Mastershipment::where(['is_deleted' => 'N'])->where('is_paid','=',0)->where('user_id','=',Auth::guard('frontenduser')->user()->id)->sum('totalpay');
                  @endphp
                  @if($unpaid ==0)
                      <div class="price unpaid">$0.00</div>
                      @else
                      <div class="price unpaid">${{$unpaid}}</div>
                      @endif
                    </div>
                </div>
                <a href="{{url('/add-credits')}}" class="btn-xl btn-purple block">Add Credits</a>
              </div>
          </div>
        </div>
    </div>
  </div>
  <!-- right content end -->
</section>

@endsection
@push('custom-styles')
  <!-- <link rel="stylesheet" href="{{ asset('site/assets/css/select2.min.css') }}"> -->
@endpush
@push('custom-scripts')
  <!-- <script type="text/javascript" src="{{ asset('site/assets/js/select2.full.min.js') }}"></script> -->
@endpush
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(){
        // Show hide popover
        $(".drophide").click(function(){
            $(this).find(".totalhide").show();
        });
    });
    $(document).on("click", function(event){
        var $trigger = $(".drophide");
        if($trigger !== event.target && !$trigger.has(event.target).length){
            $(".totalhide").hide();
        }            
    });
</script>

