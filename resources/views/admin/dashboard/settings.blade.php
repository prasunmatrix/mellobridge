@extends('admin.layouts.after-login-layout')


@section('unique-content')



    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Home</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.'.App::getLocale().'.dashboard')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Setting</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{$panel_title}} </h3>
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
                      
                        <form action="{{route('admin.'.App::getLocale().'.settings')}}"
                              method="POST" id="">
                            
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">TimeZone : <span class="error">*</span></label>
                                        <div class="col-sm-9">
                                           
                                        <select class="form-control select2bs4  select2-hidden-accessible" name="timezone"
                                                data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                 
                                            <option value="">--Choose Time Zone --</option>
                                           
                                            @foreach($timezones as $timezone)
                                                <option value="{{ $timezone->tz_name }}"@if($timezone->tz_name == $settingObj->timezone ){{'selected'}}@endif>{{ $timezone ->tz_name.'    '.$timezone->current_utc_offset }}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Date Format : <span class="error">*</span></label>
                                        <div class="col-sm-9">
                                        <select class="form-control select2bs4  select2-hidden-accessible" name="date_format"
                                                data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                <option value="">--Choose Data format--</option>
                                                <option value="d-M-Y"@if($settingObj->date_format=='d-M-Y'){{'selected'}}@endif>{{date('d-M-Y')}}</option>
                                                <option value="d/M/Y"@if($settingObj->date_format==  'd/M/Y'){{'selected'}}@endif>{{date('d/M/Y')}}</option>
                                                <option value="Y-m-d"@if($settingObj->date_format == 'Y-m-d'){{'selected'}}@endif>{{date('Y-m-d')}}</option>
                                                <option value="M/d/y"@if($settingObj->date_format == 'M/d/y'){{'selected'}}@endif>{{date('M/d/y')}}</option>
                                                <option value="M/d/yy"@if($settingObj->date_format == 'M/d/yy'){{'selected'}}@endif>{{date('M/d/yy')}}</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Time Format : <span class="error">*</span></label>
                                        <div class="col-sm-9">
                                        <select class="form-control select2bs4  select2-hidden-accessible" name="time_format"
                                                data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                <option value="">--Choose Time format--</option>
                                                <option value="H:i:s"@if($settingObj->time_format== 'H:i:s'){{'selected'}}@endif>{{  \Carbon::now()->setTimezone($settingObj->timezone)->format('H:i:s') }}</option>
                                                <option value="H:i"@if($settingObj->time_format== 'H:i'){{'selected'}}@endif>{{  \Carbon::now()->setTimezone($settingObj->timezone)->format('H:i') }}</option>
                                                <option value="G:i:s A"@if($settingObj->time_format== 'G:i:s A'){{'selected'}}@endif>{{ \Carbon::now()->setTimezone($settingObj->timezone)->format('G:i:s A')}}</option>
                                                <option value="g:i A"@if($settingObj->time_format== 'g:i A'){{'selected'}}@endif>{{ \Carbon::now()->setTimezone($settingObj->timezone)->format('g:i A')}}</option>  
                                        </select>
                                        </div>
                                    </div>
                                    @if(\Auth::guard('admin')->user()->usertype == 'S')
                                        <div class="form-group row" id="vat_value_for_pr_copywrite" > 
                                            <label class="col-sm-3 col-form-label">VAT Value For PR Copywrite : <span class="error">*</span></label>
                                            <div class="col-sm-9">
                                            <input type="number" name="vat_value_for_pr_copywrite" placeholder="Enter VAT Value for P R Copywrite" class="form-control" value="{{ $settingObj->vat_value_for_pr_copywrite }}" />
                                            </div>
                                        </div>
                                        <div class="form-group row" id="vat_value_for_press_release" > 
                                            <label class="col-sm-3 col-form-label">VAT Value For Press Release : <span class="error">*</span></label>
                                            <div class="col-sm-9">
                                            <input type="number" name="vat_value_for_press_release" placeholder="Enter VAT Value for Press Release" class="form-control" value="{{ $settingObj->vat_value_for_press_release }}" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Return request : <span class="error">*</span></label>
                                            <br>
                                            <div class="col-sm-9">
                                            <input type="checkbox" name="return_request" @if($settingObj->return_request == 'yes') {{ 'checked' }} @endif
                                            value="Yes" id="return_request">
                                            
                                            <label for="return_request"> Yes</label><br>
                                            </div>
                                        </div>
                                        <div class="form-group row" id="limit_count"  @if($settingObj->return_request != 'yes') style="display:none" @endif> 
                                            <label class="col-sm-3 col-form-label">Limitation Count for PR Copywrite Return Request: <span class="error">*</span></label>
                                            <div class="col-sm-9">
                                            <input type="number" name="limitation_count" placeholder="Enter Limitation Count" value="{{ $settingObj->limitation_count }}" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Currency : <span class="error">*</span></label>
                                            <div class="col-sm-9">
                                            <select class="form-control select2bs4  select2-hidden-accessible" name="currency"
                                                    data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                <option value="">--Choose Currency --</option>
                                                @foreach($currencies as $currency)
                                                    <option value="{{$currency->symbol.'||'.$currency->code}}"@if($currency->code == $settingObj->currency_code){{'selected'}}@endif>{{$currency->symbol.'    '.$currency->code}}</option>
                                                @endforeach
                                                
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group row" id="facebook_link" > 
                                            <label class="col-sm-3 col-form-label">Facebook Link : <span class="error">*</span></label>
                                            <div class="col-sm-9">
                                            <input type="link" name="facebook_link" placeholder="Enter Facebook Link" class="form-control" value="{{ $settingObj->facebook_link }}" />
                                            </div>
                                        </div>
                                        <div class="form-group row" id="twitter_link" > 
                                            <label class="col-sm-3 col-form-label">Twitter Link : <span class="error">*</span></label>
                                            <div class="col-sm-9">
                                            <input type="link" name="twitter_link" placeholder="Enter Twitter Link" class="form-control" value="{{ $settingObj->twitter_link }}" />
                                            </div>
                                        </div>
                                        <div class="form-group row" id="youtube_link" > 
                                            <label class="col-sm-3 col-form-label">Youtube Link : <span class="error">*</span></label>
                                            <div class="col-sm-9">
                                            <input type="link" name="youtube_link" placeholder="Enter Youtube Link" class="form-control" value="{{ $settingObj->youtube_link }}" />
                                            </div>
                                        </div>
                                        <div class="form-group row" id="instagram_link" > 
                                            <label class="col-sm-3 col-form-label">Instagram Link : <span class="error">*</span></label>
                                            <div class="col-sm-9">
                                            <input type="link" name="instagram_link" placeholder="Enter Instagram Link" class="form-control" value="{{ $settingObj->instagram_link }}" />
                                            </div>
                                        </div>
                                        <div class="form-group row" id="vimeo_link" > 
                                            <label class="col-sm-3 col-form-label">Vimeo Link : <span class="error">*</span></label>
                                            <div class="col-sm-9">
                                            <input type="link" name="vimeo_link" placeholder="Enter Vimeo Link" class="form-control" value="{{ $settingObj->vimeo_link }}" />
                                            </div>
                                        </div>
                                        <div class="form-group row" id="maximum_pr_copyright" > 
                                            <label class="col-sm-3 col-form-label">Maximum PR Copyright : <span class="error">*</span></label>
                                            <div class="col-sm-9">
                                            <input type="number" name="maximum_pr_copyright" placeholder="Enter Maximum PR Copyright" class="form-control" value="{{ $settingObj->maximum_pr_copyright }}" />
                                            </div>
                                        </div>
                                        <div class="form-group row" > 
                                            <div class="col-sm-4">
                                            </div>
                                            <label class="col-sm-5 col-form-label">Set payment amount slab for Press Release :</label>
                                        </div>
                                
                                        <div class="form-group row" id="amount" > 
                                            <label class="col-sm-1 col-form-label"> First: <span class="error">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="number" name="first_count" placeholder="Enter First Count" class="form-control" value="{{($master_payment_slab[0]->count)}}" />
                                            </div>
                                            <label class="col-sm-2 col-form-label"> Words, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Amount: <span class="error">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="number" name="first_amount" placeholder="Enter First Amount" class="form-control" value="{{($master_payment_slab[0]->amount)}}" />
                                               
                                            </div>
                                        </div>

                                        <div class="form-group row" id="amount" > 
                                            <label class="col-sm-1 col-form-label">Next : <span class="error">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="number" name="next_count" placeholder="Enter Next Count" class="form-control" value="{{($master_payment_slab[1]->count)}}" />
                                               
                                            </div>
                                            <label class="col-sm-2 col-form-label">Words, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Amount:<span class="error">*</span></label>
                                            <div class="col-sm-5">
                                                <input type="number" name="next_amount" placeholder="Enter Next Amount" class="form-control" value="{{($master_payment_slab[1]->amount)}}" />
                                            </div>
                                        </div>
                                        
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="">
                                    <a class="btn btn-primary back_new"
                                       href="{{route('admin.'.App::getLocale().'.dashboard')}}">Back</a>
                                    <button id="" type="submit" class="btn btn-success submit_new">Submit</button>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                    <div class="overlay dark" id="card_loader">
                        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('custom-scripts')
    <script !src="">
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
        $(document).on('click','#return_request',function() {
            if($(this).is(":checked")){
                $('#limit_count').show();
            } else {
                $('#limit_count').hide();
            }
        });
    </script>
@endpush
