  //  var APP_URL='http://127.0.0.1:8000';
//  var APP_URL="{{url('/')}}";
    // var APP_URL='http://localhost/mellobridge22/public/';
   var APP_URL='https://demoyourprojects.com/mellobridge/';
// left menu


function load_modal(){
   $('#import_shipment').css({'visibility':'visible','opacity':1});
   $('#import_shipment').show();  
 }
 function stripe_load_modal(){
  $('#credit-button').css({'visibility':'visible','opacity':1});
  $('#credit-button').show();  
}
$('.mob-click').click(function() {
$(this).toggleClass('open');
$('.left-menu').toggleClass('show');
});


// dropdown

  
$(".dropdown").click(function(){
    var id=$(this).data('id');
 $("#"+id).toggleClass("open");
 $(this).toggleClass("active");     

 });

// $("#recipient").click(function(){
//   console.log('test');  
// });
function popupOne(){
  Recipientname  = $("#recipientedit").attr("data-name");
  Addressline1  = $("#recipientedit").attr("data-addressline1");
  Addressline2  = $("#recipientedit").attr("data-addressline2");
  City  = $("#recipientedit").attr("data-city");
  country  = $("#recipientedit").attr("data-country");
  statekey  = $("#recipientedit").attr("data-state");
  statename  = $("#recipientedit").attr("data-state-name");
  shipid  = $("#recipientedit").attr("data-ship-id");
  orderid  = $("#recipientedit").attr("data-order-id");
  phoneno  = $("#recipientedit").attr("data-phone");
  // alert(shipid);
  if(country =="USA"){
    country=1;
  }else{
    country=2;
  }
 

  PostalCode  = $("#recipientedit").attr("data-postal_code");
  PackageDescription  = $("#recipientedit").attr("data-description");
  PackageContent  = $("#recipientedit").attr("data-package-content");
  
  RetailValue  = $("#recipientedit").attr("data-retail-value");
  height  = $("#recipientedit").attr("data-height");
  width  = $("#recipientedit").attr("data-width");
  length  = $("#recipientedit").attr("data-length");
  dimensionunit  = $("#recipientedit").attr("data-dimensionUnit");
  weight  = $("#recipientedit").attr("data-ship-weight");
  weightunit  = $("#recipientedit").attr("data-ship-unit");
  shapetype  = $("#recipientedit").attr("data-shape-type");
  $("input[name=package_type][value=" + shapetype + "]").attr('checked', 'checked');
  if(Addressline2=='null'){
    Addressline2='';
  }
  if(statekey==0){
    statename='';
  }
  if(orderid=='null'){
    orderid='';
  }
  if(phoneno=='null'){
    phoneno='';
  }
  
  // alert(country);
  $("#recipient_name").val(Recipientname);
  $("#address_line_1").val(Addressline1);
  $("#address_line_2").val(Addressline2);
  $("#ciry").val(City);
  $("#postal_code").val(PostalCode);
  $("#merchandise").val(PackageContent);
  $("#description_of_contents").val(PackageDescription);
  $("#retail_value").val(RetailValue);
  $("#currency").val('USD');
  $("#height").val(height);
  $("#width").val(width);
  $("#length").val(length);
  $("#dimension_unit").val(dimensionunit);
  $("#weight").val(weight);
  $("#unit").val(weightunit);
  $("#country").val(country);
  $("#shipid").val(shipid);
  $("#order_ID").val(orderid);
  $("#mobile_number").val(phoneno);
  $("#state").html('<option value=' + statekey + '>' + statename + '</option>');
  
  //console.log('ok');
  $('#popup1').css({'visibility':'visible','opacity':1});
  $('#popup1').show();
}
function popupCreate(){
  
  //console.log('ok');
  $('#popup1').css({'visibility':'visible','opacity':1});
  $('#popup1').show();
}
function popupdescription(){
  PackageDescription  = $("#descipedit").attr("data-description");
  PackageContent  = $("#descipedit").attr("data-package-content");
  RetailValue  = $("#descipedit").attr("data-retail-value");
  height  = $("#descipedit").attr("data-height");
  width  = $("#descipedit").attr("data-width");
  length  = $("#descipedit").attr("data-length");
  dimensionunit  = $("#descipedit").attr("data-dimensionUnit");
  weight  = $("#descipedit").attr("data-ship-weight");
  weightunit  = $("#descipedit").attr("data-ship-unit");
  Recipientname  = $("#descipedit").attr("data-name");
  Addressline1  = $("#descipedit").attr("data-addressline1");
  Addressline2  = $("#descipedit").attr("data-addressline2");
  statekey  = $("#descipedit").attr("data-state");
  statename  = $("#descipedit").attr("data-state-name");
  shipid  = $("#descipedit").attr("data-ship-id");
  orderid  = $("#descipedit").attr("data-order-id");
  phoneno  = $("#descipedit").attr("data-phone");
  // alert(shipid);
  if(Addressline2=='null'){
    Addressline2='';
  }
  if(statekey==0){
    statename='';
  }
  if(orderid=='null'){
    orderid='';
  }
  if(phoneno=='null'){
    phoneno='';
  }
  City  = $("#descipedit").attr("data-city");
  country  = $("#descipedit").attr("data-country");
  PostalCode  = $("#descipedit").attr("data-postal_code");
  shapetype  = $("#descipedit").attr("data-shape-type");
  
  $("input[name=package_type][value=" + shapetype + "]").attr('checked', 'checked');
  if(country =="USA"){
    country=1;
  }else{
    country=2;
  }
  // shipid  = $("#descipedit").attr("data-ship-id");
  $("#merchandise").val(PackageContent);
  $("#description_of_contents").val(PackageDescription);
  $("#retail_value").val(RetailValue);
  $("#currency").val('USD');
  $("#height").val(height);
  $("#width").val(width);
  $("#length").val(length);
  $("#dimension_unit").val(dimensionunit);
  $("#weight").val(weight);
  $("#unit").val(weightunit);
  $("#recipient_name").val(Recipientname);
  $("#address_line_1").val(Addressline1);
  $("#address_line_2").val(Addressline2);
  $("#ciry").val(City);
  $("#country").val(country);
  $("#postal_code").val(PostalCode);
  $("#shipid1").val(shipid);
  $("#order_ID").val(orderid);
  $("#mobile_number").val(phoneno);
  $("#state").html('<option value=' + statekey + '>' + statename + '</option>');
  // $("#ship_id").val(shipid);
  $('#popup2').css({'visibility':'visible','opacity':1});
  $('#popup2').show();
  // $('#addresspopup1').css({'visibility':'visible','opacity':1});
  // $('#addresspopup1').hide();
  
}
function popuppackage(){
  height  = $("#packageedit").attr("data-height");
  width  = $("#packageedit").attr("data-width");
  length  = $("#packageedit").attr("data-length");
  dimensionunit  = $("#packageedit").attr("data-dimensionUnit");
  weight  = $("#packageedit").attr("data-ship-weight");
  weightunit  = $("#packageedit").attr("data-ship-unit");
  PackageContent  = $("#packageedit").attr("data-package-content");
  PackageDescription  = $("#packageedit").attr("data-description");
  RetailValue  = $("#packageedit").attr("data-retail-value");
  Recipientname  = $("#packageedit").attr("data-name");
  Addressline1  = $("#packageedit").attr("data-addressline1");
  Addressline2  = $("#packageedit").attr("data-addressline2");
  City  = $("#packageedit").attr("data-city");
  PostalCode  = $("#packageedit").attr("data-postal_code");
   country  = $("#packageedit").attr("data-country");
   statekey  = $("#packageedit").attr("data-state");
   statename  = $("#packageedit").attr("data-state-name");
   shipid  = $("#packageedit").attr("data-ship-id");
   orderid  = $("#packageedit").attr("data-order-id");
   phoneno  = $("#packageedit").attr("data-phone");
    // alert(country);
  shapetype  = $("#packageedit").attr("data-shape-type");
  // alert(shapetype);
  $("input[name=package_type][value=" + shapetype + "]").attr('checked', 'checked');
  if(Addressline2=='null'){
    Addressline2='';
  }
  if(statekey==0){
    statename='';
  }
  if(orderid=='null'){
    orderid='';
  }
  if(phoneno=='null'){
    phoneno='';
  }
  if(country =="USA"){
    country=1;
  }else{
    country=2;
  }
  console.log(weight);
  $("#height").val(height);
  $("#width").val(width);
  $("#length").val(length);
  $("#dimension_unit").val(dimensionunit);
  $("#weight").val(weight);
  $("#unit").val(weightunit);
  $("#merchandise").val(PackageContent);
  $("#description_of_contents").val(PackageDescription);
  $("#retail_value").val(RetailValue);
  $("#currency").val('USD');
  $("#recipient_name").val(Recipientname);
  $("#address_line_1").val(Addressline1);
  $("#address_line_2").val(Addressline2);
  $("#ciry").val(City);
  $("#country").val(country);
  // $("#shape").val(shapetype);
  $("#postal_code").val(PostalCode);
  $("#shipid2").val(shipid);
  $("#order_ID").val(orderid);
  $("#mobile_number").val(phoneno);
  $("#state").html('<option value=' + statekey + '>' + statename + '</option>');
  $('#popup3').css({'visibility':'visible','opacity':1});
  $('#popup3').show();
}
function popupClose(arg){
  //console.log(arg);
  if(arg=='pop1')
  {
    $('#popup1').css({'visibility':'hidden','opacity':0});
    $('#popup1').hide();
    window.location.reload();
  }
  if(arg=='pop2')
  {
    $('#popup2').css({'visibility':'hidden','opacity':0});
    $('#popup2').hide();
    window.location.reload();
  }
  if(arg=='pop3')
  {
    $('#popup3').css({'visibility':'hidden','opacity':0});
    $('#popup3').hide();
    window.location.reload();
  }
  if(arg=='pop4')
  {
    $('#popup4').css({'visibility':'hidden','opacity':0});
    $('#popup4').hide();
    window.location.reload();
  }  
  if(arg=='pop5')
  {
    location.reload();

  }  
}
jQuery.validator.addMethod("noSpace", function(value, element)   { //Code used for blank space Validation 
  return this.optional(element) || /^[a-zA-Z0-9-,]+(\s{0,1}[a-zA-Z-, ])*$/.test(value);
  }, "No space please and don't leave it empty"); 
$("#recipient").validate({
  rules: {
    recipient_name: {
      required: true,
      noSpace:true,
      maxlength:30,
      
      //maxlength: 50
    },
    address_line_1: {
      required: true,
      noSpace:true,
      maxlength:50,
    },
    address_line_2: {
      maxlength:50,
    },
    city: {
      required: true,
      noSpace:true,
      maxlength:30,
    },
    country: {
      required: true
    },
    state: {
      required: true
    },
    postal_code: {
      required: true,
      maxlength:7,
    },
    mobile_number: {
      // required: true,
      number:true,
      minlength:10,
      maxlength:11,
    },
  },
  messages: {
    recipient_name: {
      required: "<span style='color:red;'>Can't be blank</span>",
      maxlength: "<span style='color:red;'>Your  name maxlength should be 30 characters long.</span>"
    },
    address_line_1: {
      required: "<span style='color:red;'>Can't be blank</span>",
      maxlength: "<span style='color:red;'>Your  address maxlength should be 50 characters long.</span>"
    },
    address_line_2: {
      maxlength: "<span style='color:red;'>Your  address maxlength should be 50 characters long.</span>"
    },
    city: {
      required: "<span style='color:red;'>Can't be blank</span>",
      maxlength: "<span style='color:red;'>Your  city maxlength should be 30 characters long.</span>"
    },
    country: {
      required: "<span style='color:red;'>Can't be blank</span>"
    },
    state: {
      required: "<span style='color:red;'>Can't be blank</span>"
    },
    postal_code: {
      required: "<span style='color:red;'>Can't be blank</span>"
    },
    mobile_number: {
      required: "<span style='color:red;'>Can't be blank</span>"
    },
  },
  submitHandler: function(form) {
    $.ajaxSetup({
      headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });
   $('#cover-spin').show(0);
    $.ajax({
      url: APP_URL+'/create-shipment' ,
      type: "POST",
      data: $('#recipient').serialize(),
      success: function( response ) {
      //console.log(response.status);
      $('#cover-spin').hide(0);
      if(response.status==1)
      {
        $('#popup1').css({'visibility':'hidden','opacity':0});
        $('#popup1').hide();
        //  $('#popup2').css({'visibility':'visible','opacity':1});
        //  $('#popup2').show();
        if(response.address_line_2==null){
          $("#line1").html(response.address1);
        }else{
          $("#line1").html(response.address1+"<br>"+response.address_line_2);
        }
        if(response.suggestedaddressline1 !='{"data":[]}'){
           $('#suggestedAdress').show();
          $('#addressfound').hide();
          if(response.address_line_2==null){
            $("#suggestedline1").html(response.suggestedaddressline1);
          }else{
            $("#suggestedline1").html(response.suggestedaddressline1+"<br>"+response.address_line_2);
          }
          $("#suggestedcity").html(response.city+","+response.state+" "+response.postal_code+"<br>"+response.country_name);
          $("#suggestbutton").html('<a href="javascript:void(0)" data-postal-code="'+response.postal_code+'" data-address='+response.suggestedaddressline1+' onclick="poupCloseOpen2()" class="btn-purple " id="suggestedaddress">Use Suggested Address</a> ');

        }
        if(response.message!=''){
          $('#errormsg').show();
          // $('#addressfound').show();
          $("#errormsg").html(response.message);
        }else{
          $('#errormsg').hide();
        }
        $("#city").html(response.city+","+response.state+" "+response.postal_code+"<br>"+response.country_name);
        $('#addresspopup1').css({'visibility':'visible','opacity':1});
        $('#addresspopup1').show();
       
      }
      }
    });
  }      
});
$("#description").validate({
  rules: {
    merchandise: {
      required: true,
      noSpace:true,
      //maxlength: 50
    },
    description_of_contents: {
      required: true,
      noSpace:true,
      maxlength:50,
    },
    retail_value: {
      required: true,
      digits:true,
      max: 400,
    },
    currency: {
      required: true
    },
  },
  messages: {
    merchandise: {
      required: "<span style='color:red;'>Can't be blank</span>"
      //maxlength: "Your last name maxlength should be 50 characters long."
    },
    description_of_contents: {
      required: "<span style='color:red;'>Can't be blank</span>",
      maxlength: "<span style='color:red;'>Your  description maxlength should be 50 characters long.</span>"
    },
    retail_value: {
      required: "<span style='color:red;'>Can't be blank</span>",
      digits: "<span style='color:red;'>Please enter only digits</span>",
      max: "Shipments cannot exceed $400 in retail value"
    },
    currency: {
      required: "<span style='color:red;'>Can't be blank</span>"
    },
  },
  submitHandler: function(form) {
    $.ajaxSetup({
      headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });
    $.ajax({
      url: APP_URL+'/description' ,
      type: "POST",
      data: $('#description').serialize(),
      success: function( response ) {
      //console.log(response.status);
      if(response.status==1)
      {
        $('#popup2').css({'visibility':'hidden','opacity':0});
        $('#popup2').hide();
       
        
        $('#popup3').css({'visibility':'visible','opacity':1});
        $('#popup3').show();
      }
      }
    });
  }      
});
$("#package").validate({
  rules: {
    package_type: {
      required: true
    },
    weight: {
      required: true,
      number:true,
    },
    unit: {
      required: true,
    },
    length: {
      required: true,
      number:true,
    },
    width: {
      required: true,
      number:true,
    },
    height: {
      required: true,
      number:true,
    },
    dimension_unit: {
      required: true,
    }
  },
  messages: {
    merchandise: {
      required: "<span style='color:red;'>Can't be blank</span>"
    },
    weight: {
      required: "<span style='color:red;'>Can't be blank</span>"
    },
    unit: {
      required: "<span style='color:red;'>Can't be blank</span>"
    },
    length: {
      required: "<span style='color:red;'>Can't be blank</span>"
    },
    width: {
      required: "<span style='color:red;'>Can't be blank</span>"
    },
    height: {
      required: "<span style='color:red;'>Can't be blank</span>"
    },
    dimension_unit: {
      required: "<span style='color:red;'>Can't be blank</span>"
    },
  },
  submitHandler: function(form) {
    $.ajaxSetup({
      headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });
    $.ajax({
      url: APP_URL+'/package' ,
      type: "POST",
      data: $('#package').serialize(),
      success: function( response ) {
       console.log(response.data);
        // alert(response.status);
      // console.log(response.message);
      if(response.data =='weight'){
        $("#weighterr").html(response.message);
        $('#weighterr').show();
        // $('#dimensionerr').hide();


        // $("#send_form3").prop('disabled', true);
      }
     /* if(response.data =='dimension'){
        $("#dimensionerr").html(response.message);
        $('#dimensionerr').show();
        $('#weighterr').hide();

        // $("#send_form3").prop('disabled', true);
      }*/
      if(response.status==0){
        toastr.error(response.message);
      }
      if(response.status==1)
      {
        $('#popup3').css({'visibility':'hidden','opacity':0});
        $('#popup3').hide();
        $('#popup4').css({'visibility':'visible','opacity':1});
        $('#popup4').show();
        $('#weighterr').hide();
        $('#dimensionerr').hide();
        
        if(response.data=="false")
        {
          $("#ib_return_client_profit1").html(response.message);
          var label_price="0.00";
          //console.log("$"+label_price);
          $("#insurance_div").hide();
          $("#insurance_checkbox").click(function() {
            if($(this).is(":checked")) {
                $("#insurance_div").show();
                //console.log(response.insurancePrice);
                $("#insurancePrice").html("$"+response.insurancePrice);
                $("#totla_price").html("$"+label_price);
            } else {
                $("#insurance_div").hide();
                $("#totla_price").html("$"+label_price);
            }
          });
          $("#ib_return_client_profit2").html("$"+label_price);
          $("#totla_price").html("$"+label_price);
          $("#send_form4").prop('disabled', true);
        }
        if(response.data=="true")
        {
          $('#signature_price').prop('checked', false);
          $('#insurance_checkbox').prop('checked', false);
          $("#ib_return_client_profit1").html("$"+response.message);
          $("#signature_price").click(function() {
            if($(this).is(":checked")) {
               //console.log("signature added");
              if($("#insurance_checkbox").is(":checked"))
              {
                // $("#ib_return_client_profit1").html("$"+response.total_price_signature);
                // $("#ib_return_client_profit2").html("$"+response.total_price_signature);
                // var total_signature_insurance=parseFloat(response.total_price_signature)+parseFloat(response.insurancePriceSignature);
                // total_signature_insurance=total_signature_insurance.toFixed(2);
                // $("#insurancePrice").html("$"+response.insurancePriceSignature);
                // $("#totla_price").html("$"+total_signature_insurance);
                let flag=1;
                checkboxManiPulation(flag,response.total_price_signature,response.insurancePriceSignature);

              }
              else
              { 
                // $("#ib_return_client_profit1").html("$"+response.total_price_signature);
                // $("#ib_return_client_profit2").html("$"+response.total_price_signature);
                // console.log("test signature");
                // $("#totla_price").html("$"+response.total_price_signature);
                let flag=2;
                checkboxManiPulation(flag,response.total_price_signature);
              }  
            }
            // else if($(this).is(":checked") && $("#insurance_checkbox").is(":checked")){
            //    console.log("both signature amd insurance checked"); 
            // } 
            else {
              // //console.log("signature not added");
              // $("#ib_return_client_profit1").html("$"+response.message);
              // $("#ib_return_client_profit2").html("$"+response.message);
              // $("#totla_price").html("$"+response.message);
              let flag=5;
              checkboxManiPulation(flag,'','',response.message,response.insurancePrice);


            }
          });
          $("#insurance_div").hide();
          $("#insurance_checkbox").click(function() {
            if($(this).is(":checked")) {
              $("#insurance_div").show();
                if($("#signature_price").is(":checked"))
                {
                  // //console.log("signature added in insurance");
                  // $("#ib_return_client_profit1").html("$"+response.total_price_signature);
                  // $("#ib_return_client_profit2").html("$"+response.total_price_signature);
                  // var total_signature_insurance=parseFloat(response.total_price_signature)+parseFloat(response.insurancePriceSignature);
                  // total_signature_insurance=total_signature_insurance.toFixed(2);
                  // $("#insurancePrice").html("$"+response.insurancePriceSignature);
                  // $("#totla_price").html("$"+total_signature_insurance);
                  let flag=3;
                  checkboxManiPulation(flag,response.total_price_signature,response.insurancePriceSignature);
                }
                else
                {
                  // //console.log(response.insurancePrice);
                  // var total=parseFloat(response.message)+parseFloat(response.insurancePrice);
                  // total=total.toFixed(2);
                  // $("#insurancePrice").html("$"+response.insurancePrice);
                  // $("#totla_price").html("$"+total);
                  let flag=4;
                  checkboxManiPulation(flag,'','',response.message,response.insurancePrice);
                }
            } else {
                // $("#insurance_div").hide();
                // $("#totla_price").html("$"+response.message);
                let flag=6;
                checkboxManiPulation(flag,response.total_price_signature,'',response.message,'');
            }
          });                    
          $("#ib_return_client_profit2").html("$"+response.message);
          $("#totla_price").html("$"+response.message);  
          $("#mailclass").html(response.mail_class);                    
          $("#send_form4").prop('disabled', false);
        }
      }
      }
    });
  }      
});
$("#postage").validate({
  rules: {
    ship_date: {
      required: true
    },
  },
  messages: {
    merchandise: {
      required: "<span style='color:red;'>Can't be blank</span>"
    },
    
  },
 
  submitHandler: function(form) {
    $.ajaxSetup({
      headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });
    $('#cover-spin-post').show(0);
    $.ajax({
      url: APP_URL+'/postage' ,
      type: "POST",
      data: $('#postage').serialize(),
      success: function( response ) {
        $('#cover-spin-post').hide(0);
        if(response.status==1)
        {
          toastr.success(response.message);
          window.setTimeout(function(){

            // Move to a new location or you can do something else
            window.location.href = APP_URL+'/pending-shipment';
    
        }, 5000);
        }
        else
        {
          toastr.error(response.message);
        }
      }
    });
  }      
});
//stripe payment redirect
$("#paymentForm").validate({
  rules: {
    amount: {
      required: true,
      digits:true,
    },
    
  },
  messages: {
    amount: {
      required: "<span style='color:red;'>Please enter amount</span>",
      digits: "<span style='color:red;'>Please enter only digits</span>"
    },
    
  },
  submitHandler: function(form) {
    $.ajaxSetup({
      headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });
    $.ajax({
      url: APP_URL+'/stripe-payment' ,
      type: "POST",
      data: $('#paymentForm').serialize(),
      success: function( response ) {
        amount=response.amount;
        if( amount < 10){
          toastr.error('Amount value should be minimum $10');
        }else if(amount >5000){
          toastr.error('Amount value should be maximum $4999');
        }else{
        window.location.href = APP_URL+'/add-credits?amount='+amount+'';
        }
      }
    });
  }      
});
function checkboxManiPulation(flag,total_price_signature=null,insurancePriceSignature=null,total_price=null,insurancePrice=null){
  console.log(flag);
  switch (flag)
  {
  case 1:
    console.log("case1");   
    $("#ib_return_client_profit1").html("$"+total_price_signature);
    $("#ib_return_client_profit2").html("$"+total_price_signature);
    var total_signature_insurance=parseFloat(total_price_signature)+parseFloat(insurancePriceSignature);
    total_signature_insurance=total_signature_insurance.toFixed(2);
    $("#insurancePrice").html("$"+insurancePriceSignature);
    $("#totla_price").html("$"+total_signature_insurance);
  break;
  case 2:
    console.log("case2");
    $("#ib_return_client_profit1").html("$"+total_price_signature);
    $("#ib_return_client_profit2").html("$"+total_price_signature);
    $("#totla_price").html("$"+total_price_signature);
  break;
  case 3:
    console.log("case3");
    $("#ib_return_client_profit1").html("$"+total_price_signature);
    $("#ib_return_client_profit2").html("$"+total_price_signature);
    var total_signature_insurance=parseFloat(total_price_signature)+parseFloat(insurancePriceSignature);
    total_signature_insurance=total_signature_insurance.toFixed(2);
    $("#insurancePrice").html("$"+insurancePriceSignature);
    $("#totla_price").html("$"+total_signature_insurance);
  break;
  case 4:
    console.log("case4");
    var total=parseFloat(total_price)+parseFloat(insurancePrice);
    total=total.toFixed(2);
    $("#insurancePrice").html("$"+insurancePrice);
    $("#totla_price").html("$"+total);
  break;
  case 5:
    console.log("case5");
    $("#ib_return_client_profit1").html("$"+total_price);
    $("#ib_return_client_profit2").html("$"+total_price);
    $("#insurancePrice").html("$"+insurancePrice);
    $("#totla_price").html("$"+total_price);
  break;  
  case 6:
    console.log("case6");
    $("#insurance_div").hide();
    var ib_return_client_profit2=$("#ib_return_client_profit2").text();
    //console.log(ib_return_client_profit2);
    $("#totla_price").html(ib_return_client_profit2);        
  }
}
function poupCloseOpen(arg){
  console.log(arg);
  if(arg=='addresspop2')
  {
    $('#addresspopup1').css({'visibility':'hidden','opacity':0});
    $('#addresspopup1').hide();
    $('#popup1').css({'visibility':'visible','opacity':1});
    $('#popup1').show();
    
  }
  
  if(arg=='pop2')
  {
    $('#popup2').css({'visibility':'hidden','opacity':0});
    $('#popup2').hide();
    $('#addresspopup1').css({'visibility':'hidden','opacity':0});
    $('#addresspopup1').hide();
    $('#popup1').css({'visibility':'visible','opacity':1});
    $('#popup1').show();
    
  }
  if(arg=='pop3')
  {
    $('#popup3').css({'visibility':'hidden','opacity':0});
    $('#popup3').hide();
    $('#addresspopup1').css({'visibility':'hidden','opacity':0});
    $('#addresspopup1').hide();
    $('#popup2').css({'visibility':'visible','opacity':1});
    $('#popup2').show();
    
  }
  if(arg=='pop4')
  {
    $('#popup4').css({'visibility':'hidden','opacity':0});
    $('#popup4').hide();
    $('#popup3').css({'visibility':'visible','opacity':1});
    $('#popup3').show();
    
  }
}
$( function() {
  $("#ship_date").datepicker({dateFormat: 'yy-mm-dd',minDate: 0,maxDate: 90});
} );
// $("#send_form1").click(function(){
//   $('#popup1').hide();
//   $('#popup2').show();
// })  
function selectState(val){
  //alert(id);
  // alert('a');
  url=APP_URL+'/getStates';
  if(val == '') {
    $("select[name=state]").html('<option value="">State</option>');
}
$.ajax(
{  
    url : url,
    type: 'GET',
    data : { country : val },
}).done( 
    function(response) 
    {
        var obj = JSON.parse(response);
        html = '<option value="">State*</option>';
        $.each(obj,function(key, value) 
        {
            html = html + '<option value=' + key + '>' + value + '</option>';
        });
        $("select[name=state]").html(html);
    }
);
}


// datatable

 $(document).ready(function() {
    $('#example').DataTable( {
        columnDefs: [ {
            orderable: false,
            className: 'select-checkbox',
            targets:   0
        } ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]]
    } );
} );
function poupCloseOpen2(){
     postal =$("#suggestedaddress").data("postal-code");
     addressline =$("#suggestedaddress").data("address");
     $.ajax({
      url: APP_URL+'/suggested-addressinsert' ,
      type: "GET",
      data: { addressline : addressline },
      success: function( response ) {
        $('#popup3').css({'visibility':'hidden','opacity':0});
        $('#popup3').hide();
        
        $('#popup2').css({'visibility':'visible','opacity':1});
        $('#popup2').show();
        $("#address_line_1").val(addressline);
        $('#addresspopup1').css({'visibility':'hidden','opacity':0});
         $('#addresspopup1').hide();
      }
    });
}
//news feed

// var width = $('.ticker-text').width(),
//     containerwidth = $('.ticker-container').width(),
//     left = containerwidth;
// $(document).ready(function(e){
// 	function tick() {
//         if(--left < -width){
//             left = containerwidth;
//         }
//         $(".ticker-text").css("margin-left", left + "px");
//         setTimeout(tick, 8);
//       }
//       tick();
// });

//news feed



