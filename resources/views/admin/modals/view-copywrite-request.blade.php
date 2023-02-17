<div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <table class="table table table-bordered table-striped" id="req-table">
                <tbody>
                    <tr>
                @foreach($details as $data )
                        <td>
                        Requested on:  {{date($settingObj->date_format,strtotime($data->submitted_at))}} 
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>