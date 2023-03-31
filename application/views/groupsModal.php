<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <?php echo form_open('Groups/addGroup');?>
      <div class="modal-header">
        <h4 class="modal-title">New Group</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
              <label class="col-sm-4 control-label">Group Name</label>

              <div class="col-sm-12">
                <input type="text" class="form-control" placeholder="Group Name" id="groupName" name="groupName" autofocus="" required="" autocomplete="off">
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Group</button>
      </div>
      <?php echo form_close();?>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
</div>

<div class="modal fade" id="modal-default1">
  <div class="modal-dialog">
    <div class="modal-content">
      <?php echo form_open('Groups/addMemberToGroup');?>
      <div class="modal-header">
        <h4 class="modal-title">Add Member to Group</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
              <label class="col-sm-4 control-label">Group Name</label>
              <div class="col-sm-12">
                <select class="form-control select2" name="group" autofocus="" required="" style="width: 100%;">
                  <option selected="selected" disabled>Select Group</option>
                        <?php
                           //id auto increament in tables initiation
                          $i = 1; 
                         if(count($results)):?>
                      <?php foreach ($results as $results):?>

                      ?>
                        <option value="<?=  $results->GroupTypeID;?>"><?=  $results->GroupTypeName;?></option>
                      <?php endforeach;?>
                      <?php endif;?>
                </select>
              </div>
          </div>
          <div class="form-group">
              <label for="staffno" class="col-sm-4 control-label">Email Address</label>
              <div class="col-sm-12">
                <select class="form-control select2" name="member" autofocus="" required="" style="width: 100%;">
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add To Group</button>
      </div>
      <?php echo form_close();?>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</div>

<div class="modal fade" id="groupMembersModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Members</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <table id="gmembers" class="table table-bordered table-striped">
            <thead>
            <th>#</th>
            <th>Fullname</th>
            </thead>
            <tbody  class="gmembers">
              
            </tbody>
          </table>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</div>