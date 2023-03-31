<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <?php echo form_open('Users/addUser');?>
      <div class="modal-header">
        <h4 class="modal-title">New User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
              <label for="name" class="col-sm-4 control-label">Full Name</label>
              <div class="col-sm-12">
                <select class="form-control select2" name="member" autofocus="" required="" style="width: 100%;">
                  <option selected="selected" disabled>Select Member</option>
                        <?php
                           //id auto increament in tables initiation
                          $i = 1; 
                         if(count($members)):?>
                      <?php foreach ($members as $members):?>

                      ?>
                        <option value="<?=  $members->Email;?>"><?=  $members->FName.' '.$members->MName.' '.$members->LName;?></option>
                      <?php endforeach;?>
                      <?php endif;?>
                </select>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add User</button>
      </div>
      <?php echo form_close();?>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

