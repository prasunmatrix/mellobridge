    <script src="{{ asset('frontenduser/assets/js/jquery-3.6.0.min.js') }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/additional-methods.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>  
    <script src="{{ asset('frontenduser/assets/js/custom.js') }}" type="text/javascript"></script> 
    <script src="{{asset('frontenduser/assets/js/jquery.dataTables.min.js')}}" type="text/javascript"></script> 
    <script src="{{asset('frontenduser/assets/js/dataTables.select.min.js')}}" type="text/javascript"></script>  
    <script type="text/javascript">
        $(document).ready(function(){
        $(".dropdown-btn").click(function(){
          $(".dropdown-sec").toggle();
        });
        });
      </script>
      
  </body>
</html>