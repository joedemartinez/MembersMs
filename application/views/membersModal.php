<div class="modal fade" id="modal-default">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <?php echo form_open('Register/save');?>
      <div class="modal-header">
        <h4 class="modal-title">New Member</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Profile pic -->
        <div class="float-right" data-tippy-placement="right" title="Tap to Upload Picture" style="width: 200px;">          
          <img class="profile-pic" id="profile-pic" src="<?= base_url('assets/dist/img/avatar.png') ?>" alt="" style="height: 128px;width: 129px;"/>
            <input class="form-control" type="file" name="pic" placeholder="Picture" title="Picture" onchange="image_preview(event)" accept="image/*">
        </div>

        <div class="row">
          <label>FullName</label>
          <div class="col-md-12 row">
            <div class="form-group col-md-4">
              <input type="text" class="form-control" name='firstname' placeholder="First Name" required>
              <!-- <span class="text-danger"><?= isset($validation) ? display_error($validation, 'firstname') : ''  ?></span> -->
            </div>
            <div class="form-group col-md-4">
              <input type="text" class="form-control" name='middlename' placeholder="Middle Name">
            </div>
            <div class="form-group col-md-4">
              <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 row">
            <div class="form-group col-md-6">
              <label>DoB</label>
              <input type="date" class="form-control" name="birthdate" placeholder="select Date of Birth" required >
            </div>
            <div class="form-group col-md-6">
              <label>Gender</label>
              <select class="form-control" name="gender" required>
                <option selected='' value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 row">
            <div class="form-group col-md-4">
              <label>Email</label>
              <input type="email" class="form-control" name="email" placeholder="email@email.com" required>
            </div>
            <div class="form-group col-md-4">
              <label>Phone No</label>
              <input type="text" class="form-control" name="phone" maxlength="10" placeholder="0240000000" required>
            </div>
            <div class="form-group col-md-4">
              <label>Address</label>
              <input type="text" class="form-control" name="address" placeholder="AA-343-3433" >
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 row">
            <div class="form-group col-md-6">
              <label>Profession</label>
              <input type="text" class="form-control" name="profession" placeholder="Profession" >
            </div>
            <div class="form-group col-md-6">
              <label>Church</label>
              <input type="text" class="form-control" name="church" placeholder="Church" >
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 row">
            <div class="form-group col-md-6">
              <label>Member No</label>
              <input type="text" class="form-control" name="memberNo" placeholder="Member No" >
            </div>
            <div class="form-group col-md-6">
              <label>Member Type</label>
              <select class="form-control" name="memberType" required>
                <option selected='' disabled>Member Type</option>
                <option value="Life Time">Life Time</option>
                <option value="Monthly">Monthly</option>
              </select>
            </div>
          </div>
        </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
    <?php echo form_close();?>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>