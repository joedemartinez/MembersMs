<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header"> 
                 <h3 class="card-title">
                  <button class="btn btn-block btn-secondary" onClick="window.location.reload();"><i class="fa fa-refresh"></i> Refresh</button></h3>
                  <h3 class="card-title">
                  <a data-toggle="modal" data-target="#modal-default" title="Add New" class="btn btn-block btn-info"><i class="fa fa-plus"></i> New Payment</a></h3>
                  
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Member</th>
                    <th>Amount Paid GHS</th>
                    <th>Date</th>
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
                    <td><?php
                          $query1 = $this->db->where(['memberID' => $records->memberID])
                                             ->get('members');
                          $fullname =  $query1->row(); 
                          echo $fullname->FName.' '.$fullname->MName.' '.$fullname->LName;
                          ;
                        ?>
                    </td>
                    <td>
                      <?=  $records->AmountPaid?>.00
                    </td>
                    <td>
                      <?=  $records->DatePaid?>
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
    </section>

    <!-- add new groups -->
    <?php include 'duesModal.php';?>