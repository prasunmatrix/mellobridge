var APP_URL='http://127.0.0.1:8000';
// left menu


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
  //console.log('ok');
  $('#popup1').css({'visibility':'visible','opacity':1});
  $('#popup1').show();
}
function popupClose(arg){
  //console.log(arg);
  if(arg=='pop1')
  {
    $('#popup1').css({'visibility':'hidden','opacity':0});
    $('#popup1').hide();
  }
  if(arg=='pop2')
  {
    $('#popup2').css({'visibility':'hidden','opacity':0});
    $('#popup2').hide();
  }
  if(arg=='pop3')
  {
    $('#popup3').css({'visibility':'hidden','opacity':0});
    $('#popup3').hide();
  }
  if(arg=='pop4')
  {
    $('#popup4').css({'visibility':'hidden','opacity':0});
    $('#popup4').hide();
  }  
}
$("#recipient").validate({
  rules: {
    recipient_name: {
      required: true
      //maxlength: 50
    },
    address_line_1: {
      required: true
    },
    city: {
      required: true
    },
    country: {
      required: true
    },
    state: {
      required: true
    },
    postal_code: {
      required: true,
      number:true,
      minlength:5,
      maxlength:5,
    },
    mobile_number: {
      required: true,
      number:true,
      minlength:10,
      maxlength:10,
    },
  },
  messages: {
    recipient_name: {
      required: "<span style='color:red;'>Can't be blank</span>"
      //maxlength: "Your last name maxlength should be 50 characters long."
    },
    address_line_1: {
      required: "<span style='color:red;'>Can't be blank</span>"
    },
    city: {
      required: "<span style='color:red;'>Can't be blank</span>"
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
      'X-CSRF-TOKEN': $('input[name="_token"]').val()
      }
    });
    $.ajax({
      url: APP_URL+'/create-shipment' ,
      type: "POST",
      data: $('#recipient').serialize(),
      success: function( response ) {
      //console.log(response.status);
      if(response.status==1)
      {
        $('#popup1').css({'visibility':'hidden','opacity':0});
        $('#popup1').hide();
        $('#popup2').css({'visibility':'visible','opacity':1});
        $('#popup2').show();
      }
      }
    });
  }      
});
$("#description").validate({
  rules: {
    merchandise: {
      required: true
      //maxlength: 50
    },
    description_of_contents: {
      required: true
    },
    retail_value: {
      required: true,
      number:true,
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
      required: "<span style='color:red;'>Can't be blank</span>"
    },
    retail_value: {
      required: "<span style='color:red;'>Can't be blank</span>"
    },
    currency: {
      required: "<span style='color:red;'>Can't be blank</span>"
    },
  },
  submitHandler: function(form) {
    $.ajaxSetup({
      headers: {
      'X-CSRF-TOKEN': $('input[name="_token"]').val()
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
      'X-CSRF-TOKEN': $('input[name="_token"]').val()
      }
    });
    $.ajax({
      url: APP_URL+'/package' ,
      type: "POST",
      data: $('#package').serialize(),
      success: function( response ) {
      console.log(response.data);
      console.log(response.message);
      if(response.status==1)
      {
        $('#popup3').css({'visibility':'hidden','opacity':0});
        $('#popup3').hide();
        $('#popup4').css({'visibility':'visible','opacity':1});
        $('#popup4').show();
        
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
          $("#ib_return_client_profit1").html("$"+response.message);
          $("#insurance_div").hide();
          $("#insurance_checkbox").click(function() {
            if($(this).is(":checked")) {
                $("#insurance_div").show();
                //console.log(response.insurancePrice);
                var total=parseFloat(response.message)+parseFloat(response.insurancePrice);
                total=total.toFixed(2);
                $("#insurancePrice").html("$"+response.insurancePrice);
                $("#totla_price").html("$"+total);
            } else {
                $("#insurance_div").hide();
                $("#totla_price").html("$"+response.message);
            }
          });          
          $("#ib_return_client_profit2").html("$"+response.message);
          $("#totla_price").html("$"+response.message);                      
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
      'X-CSRF-TOKEN': $('input[name="_token"]').val()
      }
    });
    $.ajax({
      url: APP_URL+'/postage' ,
      type: "POST",
      data: $('#package').serialize(),
      success: function( response ) {
      
      }
    });
  }      
});
// $("#postage").click(function(){
//   console.log('test');  
// });

$( function() {
  $("#ship_date").datepicker({dateFormat: 'yy-mm-dd',minDate: 0});
} );
// $("#send_form1").click(function(){
//   $('#popup1').hide();
//   $('#popup2').show();
// })  
function selectState(val){
  //alert(id);
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

