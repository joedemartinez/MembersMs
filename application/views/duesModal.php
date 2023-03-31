<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <?php echo form_open('Dues/newDues');?>
      <div class="modal-header">
        <h4 class="modal-title">New Dues</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="name" class="col-sm-4 control-label">Full Name</label>
          <div class="col-sm-12">
            <select class="form-control select2" id="memberDues" name="member" autofocus="" required="" style="width: 100%;">
              <option selected="selected" disabled>Select Member</option>
                    <?php
                       //id auto increament in tables initiation
                      $i = 1; 
                     if(count($members)):?>
                  <?php foreach ($members as $members):?>

                  ?>
                    <option value="<?=  $members->memberID;?>"><?=  $members->FName.' '.$members->MName.' '.$members->LName;?></option>
                  <?php endforeach;?>
                  <?php endif;?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="name" class="col-sm-4 control-label">Member Type</label>
          <div class="row">
            <div class="col-sm-6">
                <input type="text" class="form-control " placeholder="Member Type" id="memberType" name="memberType" required="" disabled>
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" placeholder="Member Amount" id="memberAmount" name="memberAmount" required="" disabled>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="name" class="col-sm-4 control-label">Amount</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" placeholder="Amount" name="amount" required="" autocomplete="off">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Payment</button>
      </div>
      <?php echo form_close();?>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
</div>