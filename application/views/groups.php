<section class="content">
  <div class="container-fluid"> 
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header"> 
            <h3 class="card-title">
              <button class="btn btn-block btn-secondary" onClick="window.location.reload();"><i class="fa fa-refresh"></i> Refresh</button></h3>
              <h3 class="card-title">
              <a data-toggle="modal" data-target="#modal-default" title="Add New" class="btn btn-block btn-info"><i class="fa fa-plus"></i> New Group</a></h3>
              <h3 class="card-title">
              <a data-toggle="modal" data-target="#modal-default1" title="Add New" class="btn btn-block btn-info"><i class="fa fa-plus"></i> Add Member to Group</a></h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No.</th>
                <th>Group Type</th>
                <th>No of Members</th>
              </tr>
              </thead>
              <tbody>
                <?php
                       //id auto increament in tables initiation
                      $i = 1;

                     if(count($records)):?>
                  <?php foreach ($records as $records):?>
              <tr>
                <td><?= 
                       $i;
                      $i++;
                     ?></td>
                <td><?=  $records->GroupTypeName;?>
                </td>
                <td>
                  <a class="groupMembers" data-id="<?= $records->GroupTypeID; ?>" style='cursor: pointer;'>
                  <?php $this->db->where('GroupTypeID', $records->GroupTypeID); $this->db->from('groups'); echo $this->db->count_all_results();?>
                  </a>
                </td>
                
              </tr>
                <?php endforeach;?>
                  <?php endif;?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
  <!-- add new groups -->
    <?php include 'groupsModal.php';?>
</section>

    