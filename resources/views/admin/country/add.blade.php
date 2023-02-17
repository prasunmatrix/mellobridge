@extends('admin.layouts.after-login-layout')


@section('unique-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Price Calculate</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
              {{--<li class="breadcrumb-item"><a href="{{route('admin.country.list')}}"></a></li>--}}
              <li class="breadcrumb-item active">Price Calculate</li>
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
                                <form action="{{route('admin.price-add')}}" method="POST"  id="Create_category">
                                        {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-7">
                                            <h4> From Address </h4>
                                                   <div class="form-group row">
                                                      <label for="Title" class="col-sm-2 col-form-label">Company Name : <span class="error"></span></label>
                                                        <div class="col-sm-7">
                                                        <input type="text" name="from_company_name" id="from_company_name" class="form-control" placeholder="Company Name"  title="Address">
                                                        </div>
                                                        <div class="col-sm-2">
                                                        <h5> </h5>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                      <label for="Title" class="col-sm-2 col-form-label">First Name : <span class="error"></span></label>
                                                        <div class="col-sm-7">
                                                        <input type="text" name="from_first_name" id="from_first_name" class="form-control" placeholder="First Name"  title="Address">
                                                        </div>
                                                        <div class="col-sm-3">
                                                           <h6>Ex: John</h6>
                                                            </div>
                                                    </div>
                                                    <div class="form-group row">
                                                    <label for="Title" class="col-sm-2 col-form-label">Last Name : <span class="error"></span></label>
                                                        <div class="col-sm-7">
                                                        <input type="text" name="from_last_name" id="from_last_name" class="form-control" placeholder="Last Name"  title="Address">
                                                        </div>
                                                        <div class="col-sm-3">
                                                           <h6>Ex: Dune</h6>
                                                            </div>
                                                    </div>
                                                    <div class="form-group row">
                                                    <label for="Title" class="col-sm-2 col-form-label">Phone number : <span class="error"></span></label>
                                                        <div class="col-sm-7">
                                                        <input type="number" name="phone" id="phone" class="form-control" placeholder="phone"  title="Address">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                    <label for="Title" class="col-sm-2 col-form-label">City : <span class="error"></span></label>
                                                        <div class="col-sm-7">
                                                        <input type="text" name="from_city" id="from_city" class="form-control" placeholder="City"  title="Address">
                                                        </div>
                                                        <div class="col-sm-3">
                                                           <h6>Ex: Los Angeles</h6>
                                                            </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="Title" class="col-sm-2 col-form-label">Postal Code : <span style="color:red" class="error">*</span></label>
                                                            <div class="col-sm-7">
                                                            <input type="number" name="from_postal_code" id="postal_code" class="form-control" required placeholder="Postal Code" title="City">
                                                            </div>
                                                            <div class="col-sm-3">
                                                           <h6>Ex: 90099</h6>
                                                            </div>
                                                    </div>
                                                    
                                            <h4> To Address </h4>
                                                   <div class="form-group row">
                                                     <label for="Title" class="col-sm-2 col-form-label">Company  Name : <span class="error"></span></label>
                                                        <div class="col-sm-7">
                                                        <input type="text" name="to_company_name" id="to_company_name" class="form-control" placeholder="Company Name"  title="Address">
                                                        </div>
                                                    </div>
                                                   <div class="form-group row">
                                                     <label for="Title" class="col-sm-2 col-form-label">First Name : <span class="error"></span></label>
                                                        <div class="col-sm-7">
                                                        <input type="text" name="to_first_name" id="to_first_name" class="form-control" placeholder="First Name"  title="Address">
                                                        </div>
                                                        <div class="col-sm-3">
                                                           <h6>Ex: Nik</h6>
                                                            </div>
                                                    </div>
                                                    <div class="form-group row">
                                                    <label for="Title" class="col-sm-2 col-form-label">Last Name : <span class="error"></span></label>
                                                        <div class="col-sm-7">
                                                        <input type="text" name="to_last_name" id="to_last_name" class="form-control" placeholder="Last Name"  title="Address">
                                                        </div>
                                                        <div class="col-sm-3">
                                                           <h6>Ex: jones</h6>
                                                            </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="form-group row">
                                                        <label for="Title" class="col-sm-2 col-form-label">State : <span style="color:red" class="error">*</span></label>
                                                        <div class="col-sm-7">
                                                            <select class="form-control select2 select2-danger" required name="to_state" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                                <option value="">Choose option</option>
                                                                {{--<option value="WA">Washington</option>--}}
                                                                <option value="CA">California</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="Title" class="col-sm-2 col-form-label">Postal Code : <span style="color:red" class="error">*</span></label>
                                                            <div class="col-sm-7">
                                                            <input type="TEXT" name="to_postal_code" id="to_postal_code" reuired class="form-control" required placeholder="Postal Code" title="City">
                                                            </div>
                                                            <div class="col-sm-3">
                                                           <h6>Ex: 94306</h6>
                                                            </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="Title" class="col-sm-2 col-form-label">City : <span style="color:red" class="error">*</span></label>
                                                            <div class="col-sm-7">
                                                            <input type="text" name="to_city" id="to_city" class="form-control" required placeholder="City" title="City">
                                                            </div>
                                                            <div class="col-sm-3">
                                                           <h6>Ex: California</h6>
                                                            </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="Title" class="col-sm-2 col-form-label">Shape : <span style="color:red" class="error">*</span></label>
                                                        <div class="col-sm-7">
                                                            <select class="form-control select2 select2-danger" required name="shape" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                                <option value="">Choose option</option>
                                                                <option value="Parcel">Parcel</option>
                                                                <option value="Flat">Flat</option>
                                                                <option value="FlatRateEnvelope">FlatRateEnvelope</option>
                                                                <option value="LegalFlatRateEnvelope">LegalFlatRateEnvelope</option>
                                                                <option value="PaddedFlatRateEnvelope">PaddedFlatRateEnvelope</option>
                                                                <option value="SmallFlatRateBox">SmallFlatRateBox</option>
                                                                <option value="MediumFlatRateBox">MediumFlatRateBox</option>
                                                                <option value="MediumFlatRateBox">LargeFlatRateBox</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-3">
                                                           <h6>Ex: Parcel</h6>
                                                            </div>
                                                    </div>
                                                    


                                                    <div class="form-group row">
                                                        <label for="Title" class="col-sm-2 col-form-label">Weight : <span style="color:red" class="error">*</span></label>
                                                            <div class="col-sm-7">
                                                            <input type="number" name="weight" id="weight" min="1" class="form-control" placeholder="Weight" required title="Weight">
                                                            </div>
                                                            <div class="col-sm-3">
                                                           <h6>Ex: 3</h6>
                                                            </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="Title" class="col-sm-2 col-form-label">Weight Unit : <span style="color:red" class="error">*</span></label>
                                                        <div class="col-sm-7">
                                                            <select class="form-control select2 select2-danger" required name="unit" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                                <option value="">Choose option</option>
                                                                <option value="oz">oz</option>
                                                                <option value="lb">lb</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-3">
                                                           <h6>Ex: lb</h6>
                                                            </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="Title" class="col-sm-2 col-form-label">Width : <span style="color:red"class="error">*</span></label>
                                                            <div class="col-sm-7">
                                                            <input type="number" name="width" id="width" value='0'min="0" class="form-control" required placeholder="Dimension" title="Weight">
                                                            </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="Title" class="col-sm-2 col-form-label">Height : <span style="color:red" class="error">*</span></label>
                                                            <div class="col-sm-7">
                                                            <input type="number" name="height" id="height" value='0'min="0" class="form-control" required placeholder="Dimension" title="Weight">
                                                            </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="Title" class="col-sm-2 col-form-label">length : <span style="color:red" class="error">*</span></label>
                                                            <div class="col-sm-7">
                                                            <input type="number" name="length" id="length" min="0" value='0' class="form-control" required placeholder="Dimension" title="Weight">
                                                            </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="Title" class="col-sm-2 col-form-label">Dimensions Unit : <span style="color:red" class="error">*</span></label>
                                                        <div class="col-sm-7">
                                                            <select class="form-control select2 select2-danger" name="dimension_unit" required data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                                <option value="cm">cm</option>
                                                                <option value="in">in</option>
                                                                <option value="ft">ft</option>
                                                                <option value="mm">mm</option>
                                                                <option value="m">m</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                            <div class="">
                                                        <div class="">
                                                        {{--<a class="btn btn-primary back_new" href="{{route('admin.country.list')}}">Back</a>--}}
                                                        <button id="" type="submit" class="btn btn-success submit_new">Calculate</button>
                                                        </div>
                                            </div>
                                            <br>
                                            <h3 class="card-title">{{$total_price}}</h3>
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