<!-- All content on dashboard goes here -->
  <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                  <?php $this->db->where('Status', 1); $this->db->from('members'); echo $this->db->count_all_results();?>
                    
                  </h3>

                <p>Members</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-people"></i>
              </div>
              <a class="small-box-footer">
                <b><?php $this->db->where('Status', 0); $this->db->from('members'); echo $this->db->count_all_results();?></b> Unapproved</i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $this->db->count_all('grouptype');?></h3>

                <p>Groups</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-people"></i>
              </div>
              <a class="small-box-footer">_</a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $this->db->count_all('users');?></h3>

                <p>Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-person"></i>
              </div>
              <a class="small-box-footer">_</a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php 
                        $this->db->where('attendanceDate ', $records1->attendanceDate ); 
                        $this->db->from('attendance'); 
                        echo $this->db->count_all_results();?></h3>

                <p>Attended Last Meeting</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a class="small-box-footer">_</a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>


