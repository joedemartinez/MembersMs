<footer class="main-footer">
    <strong> &copy; <?= date('Y') ?></strong> 
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/plugins/chart.js/Chart.min.js') ?>"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets/plugins/sparklines/sparkline.js') ?>"></script>
<!-- JQVMap -->
<script src="<?= base_url('assets/plugins/jqvmap/jquery.vmap.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/plugins/jquery-knob/jquery.knob.min.js') ?>"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/plugins/moment/moment.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/daterangepicker/daterangepicker.js') ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
<!-- Summernote -->
<script src="<?= base_url('assets/plugins/summernote/summernote-bs4.min.js') ?>"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/dist/js/adminlte.js') ?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/jszip/jszip.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/pdfmake/pdfmake.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/pdfmake/vfs_fonts.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') ?>"></script>
<!-- Select2 -->
<script src="<?= base_url('assets/plugins/select2/js/select2.full.min.js') ?>"></script>

<!-- message fade out time -->
    <script type="text/javascript">
      $(function() {
        $("#successMessage:visible").fadeOut(10000);
      });

      // select2
      $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
      })
    </script>

    <script>
  $(document).ready(function() {
    $("#example1 ").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    // $("#gmembers ").DataTable({
    //  "sort": true,
    //   "select": true,
    //   'stateSave': true,
    //   dom: 'Bfrtip',
    //     lengthMenu: [
    //       [ 10, 25, 50, 100, 200, -1 ],
    //       [ '10 rows', '25 rows', '50 rows','100 rows','200 rows', 'Show all' ]
    //   ],
    //   buttons: [
    //       'pageLength', 'excel', 'csv', 'pdf', 'print'
    //   ]
    // });
    
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<!-- 'dom': 'Bfrtip',
        'lengthMenu': [
          [ 10, 25, 50, 100, 200, -1 ],
          [ '10 rows', '25 rows', '50 rows','100 rows','200 rows', 'Show all' ]
      ], -->

<script>
  //checking Member Type
  $('#memberDues').change(function(){  
     var memberDues = $('#memberDues').val();  
     if(memberDues != '')  
     {  
      $.ajax({  
           url: '<?= base_url('Users/getMember')?>', 
           method:"POST",  
           data:{memberDues:memberDues},
           success:function(data){

            //if data is found in database
            if (data !== 'null'){
              $('#memberType').val(data);
              if (data === 'Monthly') {
                  $('#memberAmount').val('GHS 50.00');
              } else {
                $('#memberAmount').val('GHS 20.00');
              }
            }else{//else display nothing
              $('#memberType').val('no Member Type '); 
            }
           }
      });  
     }  
  });


$(document).ready(function(){
  // load grop members
  $(document).on("click", ".groupMembers", function(e){
    e.preventDefault();
    $('#groupMembersModal').modal('show');
    var id = $(this).data('id');
    getStaff(id);
  });


  // load attendanceMembers members
  $(document).on("click", ".attendanceMembers", function(e){
    e.preventDefault();
    $('#attendanceMembersModal').modal('show');
    var id = $(this).data('id');
    getattendanceMember(id);
  });

  //getting all staff per unit
  function getStaff(id){
    $.ajax({
      method: 'POST',
      url: '<?= base_url('Groups/getMembers')?>', 
      data: {id:id},
      success: function(response){
        //if data is found in database
          $('.gmembers').html(response);
      }
    });
  }

  //getting all staff per attendance
  function getattendanceMember(id){
    $.ajax({
      method: 'POST',
      url: '<?= base_url('Attendance/getMembers')?>', 
      data: {id:id},
      success: function(response){
        //if data is found in database
          $('.amembers').html(response);
      }
    });
  }

  // //loadig
      const btn = document.querySelector("button");
      btn.addEventListener("click", changeColor);
          function changeColor() {
            $('#modal-overlay').modal('show');
            setTimeout(function(){
              $('#modal-overlay').modal('hide');
            }, 500);     
      }

      //pic
      function image_preview(e){
        var reader = new FileReader();
        reader.onload = function(){
        var output = document.getElementById('profile-pic');
        output.src = reader.result;
        }
        reader.readAsDataURL(e.target.files[0]);
      }

});
</script>
<!-- dob birtda -->
<!-- <script>  
setInterval(Check_user, 10000);

function Check_user(){
  $.ajax({
      method: 'POST',
      url: '<?= base_url('Members/getDoB')?>', 
      success: function(response){
        //if data is found in database
          $('#dob').html(response);
      }
    });
} 

</script> -->
</body>
</html>
