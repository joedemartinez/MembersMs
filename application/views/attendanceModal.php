<div class="modal fade" id="modal-default">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <?php echo form_open('Attendance/newAttendance');?>
      <div class="modal-header">
        <h4 class="modal-title">Today's Attendance</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="name" class="col-sm-4 control-label">Members <small>(multiple select)</small></label>
          <div class="col-sm-12">
            <select class="form-control select2" name="member[]" autofocus="" required="" style="width: 100%;" multiple>
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
          <div class="row">
            <div class="col-sm-6">
                <label for="name" class="control-label">Today's Date</label>
                <input type="date" class="form-control " placeholder="Date" id="todayDate" name="todayDate" required="">
            </div>
            <div class="col-sm-6">
                <label for="name" class="control-label">Attendance Type</label>
                <select class="form-control" id="attendanceType" name="attendanceType" required="" style="width: 100%;">
                  <option selected disabled>Attendance Type</option>
                  <option value="Present">Present</option>
                  <option value="Absent">Absent</option>
                  <option value="Leave">Leave</option>
            </select>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Create</button>
      </div>
      <?php echo form_close();?>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</div>

<div class="modal fade" id="attendanceMembersModal">
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
            <tbody  class="amembers">
              
            </tbody>
          </table>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</div>