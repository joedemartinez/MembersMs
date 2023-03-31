<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <button class="btn btn-block btn-secondary" onClick="window.location.reload();"><i class="fa fa-refresh"></i> Refresh</button></h3>
                  <h3 class="card-title">
                    <?php if(isset($pageTitle) && $pageTitle=='Members'): ?>
                  <a data-toggle="modal" data-target="#modal-default" title="Add New" class="btn btn-block btn-info"><i class="fa fa-plus"></i> New</a></h3>
                  <?php endif; ?>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <?php if(isset($pageTitle) && $pageTitle !=='Members'): ?>
                    <th>Action</th>
                    <?php endif; ?>
                    <th>Pic</th>
                    <th>FullName</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>DoB</th>
                    <th>Phone No</th>
                    <th>Address</th>
                    <th>Profession</th>
                    <th>Church</th>
                    <th>Member No</th>
                    <th>Member Type</th>
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
                         ?>
                      
                    </td>
                    <?php if(isset($pageTitle) && $pageTitle !=='Members'): ?>
                    <td><?php 
                    $hashed = md5($records->memberID);
                    echo anchor("Members/approved/{$hashed}/{$records->memberID}", 'Approve', array('title' => 'Delete', 'class' => 'btn btn-info btn-sm', 'onclick' => "return confirm('Do you want to approve this member?')"));?></td>
                    <?php endif; ?>

                    <td>
                      <img src="<?= ($records->photo != '') ? base_url('assets/image/profilePics/'.$records->Email.$records->photo) : base_url('assets/dist/img/avatar2.png') ?>" class="img-circle elevation-2" alt="User Image" style="width: 60px;">
                    </td>
                    <td><?=  $records->FName ." ". $records->MName." ". $records->LName;?>
                    </td>
                    <td><?=  $records->Email;?></td>
                    <td><?=  $records->Gender;?></td>
                    <td><?=  $records->DoB;?></td>
                    <td><?=  $records->PhoneNo;?></td>
                    <td><?=  $records->ResidenceAddress;?></td>
                    <td><?=  $records->Profession;?></td>
                    <td><?=  $records->Church;?></td>
                    <td><?=  $records->MemberNo;?></td>
                    <td><?=  $records->MemberType;?></td>
                    
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
    </section>

        <!-- add new  -->
    <?php include 'membersModal.php';?>