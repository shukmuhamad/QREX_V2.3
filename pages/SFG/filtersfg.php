<?php
  include('../includes/database_connection.php');
  include('../includes/session.php');
  include('../includes/header.php');
?>

  <body>
    <div id="wrapper">
      <?php include('../navbar/navbar.php');?>

      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">SFG Table Filter</h1>
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="panel panel-primary" >
          <div class="panel-heading">
            SFG Table Filter
          </div>
          <!-- /.panel-heading -->

          <div class="panel-body">

            <form method="POST">

              <div class="col-md-2">
                <div class="form-group">
                  <?php
                    $smt = $connect->prepare('SELECT PlantName From DimPlant');
                    $smt->execute();
                    $data = $smt->fetchAll();
                  ?>

                  <label>Factory</label>
                  <select class="form-control" name="factory" required>
                    <option value="" selected>Select Factory</option>
                    <?php
                      foreach ($data as $row){
                    ?>
                    <option value="<?php echo $row['PlantName'];?>"><?php echo $row['PlantName'];}?></option>
                  </select>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col-md-2 -->

              <div class="col-md-2">
                <div class="form-group">
                  <label>Start Date</label>
                  <input class="form-control" type="date" name="startDate" onkeydown="return false" required>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col-md-2 -->

              <div class="col-md-2">
                <div class="form-group">
                  <label>End Date</label>
                  <input class="form-control" type="date" name="endDate" onkeydown="return false" required>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col-md-2 -->

              <button class="btn btn-success" name="search" style="margin-top:25px;">
                <i class="fa fa-search"></i>
                Search
              </button>

            </form>
            <br>

            <div class="col-md-12">

              <div class="table-responsive">

                <table class="table table-bordered" id="tableID" width="30%" cellspacing="0">
                  <thead>


                    <tr class="info">
                      <th rowspan="2">Action</th>
                      <th rowspan="2">Lot Count</th>
                      <th rowspan="2">Factory</th>
                      <th rowspan="2">Customer</th>
                      <th rowspan="2">Brand</th>
                      <th rowspan="2">Product</th>
                      <th rowspan="2">Product Code</th>
                      <th rowspan="2">Colour</th>
                      <th rowspan="2">Inspection Date</th>
                      <th rowspan="2">Production Date</th>
                      <th rowspan="2">Production Line</th>
                      <th rowspan="2">Shift</th>
                      <th rowspan="2">Packing Date</th>
                      <th rowspan="2">Category</th>
                      <th rowspan="2">Glove Size</th>
                      <th rowspan="2">Sample Size VT (Visual Test)</th>
                      <th rowspan="2">Sample Size APT/WTT level 1</th>
                      <th rowspan="2">Sample Size APT/WTT level 2</th>
                      <th rowspan="2">Batch Number</th>
                      <th rowspan="2">Carton Quantity</th>
                      <th rowspan="2">Carton Number</th>
                      <th rowspan="2">Inspection Count</th>
                      <th colspan="7">Defects</th>
                      <th colspan="6">Acceptance</th>
                      <th rowspan="2">Glove weight</th>
                      <th rowspan="2">Overall AQL</th>
                      <th rowspan="2">Disposition</th>
                      <th rowspan="2">UD Result Code</th>
                      <th rowspan="2">Counting</th>
                      <th rowspan="2">Donning and Tearing</th>
                      <th rowspan="2">Lot ID</th>
                      <th rowspan="2">Check By(Badge ID)</th>
                      <th rowspan="2">Check By(Name)</th>
                      <th rowspan="2">Verify By(Badge ID)</th>
                      <th rowspan="2">Verify By(Name)</th>
                    </tr>

                    <tr class="info">
                      <th>Total Barrier</th>
                      <th>Total Holes 1</th>
                      <th>Total Holes 2</th>
                      <th>Total Defects Critical NFG</th>
                      <th>Total Defects Critical NAG</th>
                      <th>Total Defects Major</th>
                      <th>Total Defects Minor</th>
                      <th>Acc Holes 1</th>
                      <th>Acc Holes 2</th>
                      <th>Acc Critical NFG</th>
                      <th>Acc Critical NAG</th>
                      <th>Acc Major</th>
                      <th>Acc Minor</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php
                    if(isset($_POST['search'])){

                      $factory=$_POST['factory'];
                      $startDate=date('Y-m-d', strtotime($_POST['startDate']));
                      $endDate=date('Y-m-d', strtotime($_POST['endDate']));

                      $null = NULL;

                      $query="{CALL SP_View_All_SFG(?, ?, ?)}";

                      $stmt=$connect->prepare($query);
                      $stmt->bindParam(1, $factory);
                      $stmt->bindParam(2, $startDate);
                      $stmt->bindParam(3, $endDate);
                      $stmt->execute();

                      while ($row=$stmt->fetch()){
                  ?>

                    <tr class="text-center">
                      <td>
                        <a class="btn btn-success" href="formqrex_viewSFG.php?LotIDKey=<?php echo $row['LotIDKey'];?>&RecordID=<?php echo $row['RecordID'];?>" target="_blank">
                          VIEW
                        </a>
                      </td>
                      <td><?php echo $row['LotCount'];?></td>
                      <td><?php echo $row['Factory'];?></td>
                      <td><?php echo $row['CustomerName'];?></td>
                      <td><?php echo $row['BrandName'];?></td>
                      <td><?php echo $row['GloveProductTypeName'];?></td>
                      <td><?php echo $row['GloveCodeLong'];?></td>
                      <td><?php echo $row['GloveColourName'];?></td>
                      <td><?php echo date('d/m/Y',strtotime($row['RecordCreatedDateTime']));?></td>
                      <td><?php echo $row['ProductionDate'];?></td>
                      <td><?php echo $row['ProductionLine'];?></td>
                      <td><?php echo $row['Shift'];?></td>
                      <td><?php echo date('d/m/Y',strtotime($row['PackingDate']));?></td>
                      <td><?php echo $row['InspectionPlanName'];?></td>
                      <td><?php echo $row['GloveSizeCodeLong'];?></td>
                      <td><?php echo $row['SampleSizeVisual'];?></td>
                      <td><?php echo $row['SampleSizeAPT/WTTLevel1'];?></td>
                      <td><?php echo $row['SampleSizeAPT/WTTLevel2'];?></td>
                      <td><?php echo $row['BatchNumber'];?></td>
                      <td><?php echo $row['CartonQuantity'];?></td>
                      <td><?php echo $row['CartonNumber'];?></td>
                      <td><?php echo $row['InspectionCount'];?></td>
                      <!-- total holes is total barrier = total holes 1 + total holes 2 + total NFG-->
                      <td><?php echo $row['TotalHoles'];?></td>
                      <td><?php echo $row['TotalHoles1'];?></td>
                      <td><?php echo $row['TotalHoles2'];?></td>
                      <td><?php echo $row['TotalNonFunctionalCritical'];?></td>
                      <td><?php echo $row['TotalNAG_CP'];?></td>
                      <td><?php echo $row['TotalDefectMajorVisual'];?></td>
                      <td><?php echo $row['TotalDefectMinorVisual'];?></td>
                      <td><?php echo $row['AcceptanceHoles1'];?></td>
                      <td><?php echo $row['AcceptanceHoles2'];?></td>
                      <td><?php echo $row['AcceptanceNonFunctionalCritical'];?></td>
                      <td><?php echo $row['AcceptanceNonAcceptableCritical'];?></td>
                      <td><?php echo $row['AcceptableMajorVisual'];?></td>
                      <td><?php echo $row['AcceptableMinorVisual'];?></td>
                      <td><?php echo $row['GloveWeightAverage'];?></td>
                      <td><?php echo $row['OverallAQL'];?></td>
                      <td><?php echo $row['FinalDisposition'];?></td>
                      <td><?php echo $row['UDResultCode'];?></td>
                      <td><?php echo $row['CountingTest'];?></td>
                      <td><?php echo $row['DonningTearingTest'];?></td>
                      <td><?php echo $row['LotIDKey'];?></td>
                      <td><?php echo $row['InspectionUserID'];?></td>
                      <td><?php echo $row['InspectorName'];?></td>
                      <td><?php echo $row['VerifierID'];?></td>
                      <td><?php echo $row['VerifierName'];?></td>
                    </tr>

                  <?php }} ?>
                  </tbody>
                </table>

              </div>
              <!-- /.table-responsive -->

            </div>
            <!-- /.col-md-12 -->

          </div>
          <!-- /.panel-body -->
        </div>
        <!-- /.panel -->

      </div>
      <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>
    <script src="../vendor/datatables/datatables-demo.js"></script>
    <script type="text/javascript" language="javascript" src="datatables/js/jquery-3.3.1.js"></script>
    <script type="text/javascript" language="javascript" src="datatables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="datatables/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="datatables/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="datatables/js/buttons.bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="datatables/js/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="datatables/js/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="datatables/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="datatables/js/buttons.print.min.js"></script>
    <script type="text/javascript" language="javascript" src="datatables/js/buttons.colVis.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <link href="jquery.datatables.yadcf.css" rel="stylesheet" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
    <script src="jquery.dataTables.yadcf.js"></script>
    <script>
      $(document).ready(function(){

        $('#tableID').dataTable({
          pageLength: 10,
          "dom": 'Bfrtip',
          buttons: [{
            extend :'excel',
            text:'Export to Excel',
            exportOptions: {
              format: {
                header: function ( data, row, column, node ) {
                  var newdata = data;

                  newdata = newdata.replace(/<.*?<\/*?>/gi, '');
                  newdata = newdata.replace(/<div.*?<\/div>/gi, '');
                  newdata = newdata.replace(/<\/div.*?<\/div>/gi, '');
                  return newdata;
                }
              }
            }
          },
          {
            extend :'pdf',
            text:'Export to PDF',
            orientation: 'landscape',
            pageSize: 'LEGAL',
            exportOptions: {
              format: {
                header: function ( data, row, column, node ) {
                  var newdata = data;

                  newdata = newdata.replace(/<.*?<\/*?>/gi, '');
                  newdata = newdata.replace(/<div.*?<\/div>/gi, '');
                  newdata = newdata.replace(/<\/div.*?<\/div>/gi, '');
                  return newdata;
                }
              }
            }
          },
          {
            extend :'print',
            text:'Print Table',
            orientation: 'landscape',
            pageSize: 'LEGAL',
            exportOptions: {
              format: {
                header: function ( data, row, column, node ) {
                  var newdata = data;

                  newdata = newdata.replace(/<.*?<\/*?>/gi, '');
                  newdata = newdata.replace(/<div.*?<\/div>/gi, '');
                  newdata = newdata.replace(/<\/div.*?<\/div>/gi, '');
                  return newdata;
                }
              }
            }
          }]
        });

      });
    </script>
  <!-- Page-Level Demo Scripts - Tables - Use for reference -->
  </body>
</html>
