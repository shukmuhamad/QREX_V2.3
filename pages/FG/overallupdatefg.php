<?php
  include('../includes/database_connection.php');
  include('../includes/session.php');
  include('../includes/header.php');

  //If user role is not staff, redirect to home
  if($_SESSION['PositionKey']!=1){
    header('Location: home.php');
  }

  $Verify_ID = $_SESSION['BadgeID'];

  if(isset($_POST['search'])){

    $_SESSION['Ofactory'] = $_POST['factory'];
    $_SESSION['OsoNumber'] = $_POST['soNumber'];
    $_SESSION['OitemNumber']  = $_POST['itemNumber'];
    $_SESSION['OgloveSize'] = $_POST['gloveSize'];
    $_SESSION['OlotCount'] = $_POST['lotCount'];
    $_SESSION['OinspectionCount'] = $_POST['inspectionCount'];
  }
  if((!isset($_POST['search'])) && (!isset($_POST['update']))){
    $_SESSION['Ofactory'] = NULL;
    $_SESSION['OsoNumber'] =NULL;
    $_SESSION['OitemNumber']  = NULL;
    $_SESSION['OgloveSize'] = NULL;
    $_SESSION['OlotCount'] = NULL;
    $_SESSION['OinspectionCount'] = NULL;
  }

?>

  <body>
    <div id="wrapper">
      <?php include('../navbar/navbar.php');?>

      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">FG Overall Update</h1>
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="panel panel-primary" >
          <div class="panel-heading">
            Lot Details
          </div>

          <div class="panel-body">

              <form method="POST" id="idOfForm">

                <div class="row">

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Factory</label>
                      <?php
                        $smt = $connect->prepare('SELECT * From DimPlant');
                        $smt->execute();
                        $data = $smt->fetchAll();
                      ?>

                      <select class="form-control" name="factory" required>
                        <?php if($_SESSION['Ofactory'] != ''){
                          ?>
                          <option value="<?php echo $_SESSION['Ofactory'];?>"><?php echo $_SESSION['Ofactory'];?></option>
                          <?php
                        }else{
                          ?>
                          <option value="">Select Factory</option>
                          <?php
                        } ?>

                        <?php foreach($data as $row){?>
                        <option value="<?php echo $row['PlantName'];?>">
                          <?php echo $row['PlantName'];}?>
                        </option>
                      </select>
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col-md-2 -->

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>SO Number</label>

                      <input type="text" class="form-control" placeholder="SO Number" name="soNumber"

                        value="<?php
                        if($_SESSION['OsoNumber'] != ''){
                          echo $_SESSION['OsoNumber'];
                        }else{}
                          ?>" required>
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col-md-2 -->

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Item Number</label>
                      <input type="number" class="form-control" placeholder="Item Number" name="itemNumber" min="0"
                      value="<?php
                      if($_SESSION['OitemNumber'] != ''){
                        echo $_SESSION['OitemNumber'];
                      }else{}
                        ?>" required>
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col-md-2 -->

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Glove Size</label>
                      <?php
                        $smt = $connect->prepare('SELECT * FROM M_GloveSize');
                        $smt->execute();
                        $data = $smt->fetchAll();
                      ?>

                      <select class="form-control" name="gloveSize" required>
                        <?php if($_SESSION['OgloveSize'] != ''){
                          ?>
                          <option value="<?php echo $_SESSION['OgloveSize'];?>"><?php echo $_SESSION['OgloveSize'];?></option>
                          <?php
                        }else{
                          ?>
                          <option value="">Select Glove Size</option>
                          <?php
                        } ?>

                        <?php foreach ($data as $row){?>
                        <option value="<?php echo $row['GloveSizeCodeLong'];?>">
                          <?php echo $row['GloveSizeCodeLong'];}?>
                        </option>
                      </select>
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col-md-2 -->

                  <div class="col-md-1">
                    <div class="form-group">
                      <label>Lot Count</label>
                      <input type="number" class="form-control" name="lotCount" min="0"
                      value="<?php
                      if($_SESSION['OlotCount'] != ''){
                        echo $_SESSION['OlotCount'];
                      }else{}
                        ?>" required>
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col-md-1 -->

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Inspection Count</label>
                      <input type="number" class="form-control" placeholder="Inspection Count" name="inspectionCount" min="0"
                      value="<?php
                      if($_SESSION['OinspectionCount'] != ''){
                        echo $_SESSION['OinspectionCount'];
                      }else{}
                        ?>" required>
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col-md-2 -->

                  <div class="col-md-1">
                    <button class="btn btn-success" name="search" id="mySearch" style="margin-top:25px;">
                      Search
                    </button>
                  </div>
                  <!-- /.col-md-1 -->

                </div>
                <!-- /.row -->

              </form>
              <!-- /.form -->

              <form method="POST">

                <div class="row">

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Overall AQL</label>
                      <select class="form-control" id="P/f" name="overallAQL">
                        <option value="N/A"> N/A</option>
                        <option value="0.065"> 0.065</option>
                        <option value="0.10"> 0.10</option>
                        <option value="0.15"> 0.15</option>
                        <option value="0.25"> 0.25</option>
                        <option value="0.40"> 0.40</option>
                        <option value="0.65"> 0.65</option>
                        <option value="1.0"> 1.0</option>
                        <option value="1.5"> 1.5</option>
                        <option value="2.5"> 2.5</option>
                        <option value="4.0"> 4.0</option>
                        <option value="6.5"> 6.5</option>
                      </select>
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col-md-2 -->

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>UD Disposition</label>
                      <?php
                        $smt = $connect->prepare('SELECT * FROM M_UDResult');
                        $smt->execute();
                        $data = $smt->fetchAll();
                      ?>

                      <select class="form-control" id="UDResultKey" name="UDResultKey">
                        <option value=""> N/A</option>
                        <?php foreach($data as $row){?>
                        <option name="UDResultKey" value="<?php echo $row['UDResultCode']; ?>">
                          <?php echo $row['UDResultCode'];}?>
                        </option>
                      </select>
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col-md-2 -->

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Final Disposition</label>
                      <select class="form-control" id="final_disposition" name="finalDisposition">
                        <option value=""> N/A</option>
                        <option value="PASS"> PASS</option>
                        <option value="FAIL"> FAIL </option>
                      </select>
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col-md-2 -->

                  <div class="col-md-2">
                    <div class="form-group">
                      <label>Verified By</label>
                      <input type="text" class="form-control" placeholder="Badge ID" id="Verify_ID" name="verifiedBy">
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col-md-2 -->

                  <div class="col-md-1">
                    <button class="btn btn-primary" name="update" id="myUpdate" style="margin-top:25px;" disabled>Update</button>
                  </div>
                  <!-- /.col-md-1 -->

                </div>
                <!-- /.row -->

              </form>
              <!-- /.form -->

              <div class="row">
                <div class="col-md-12">

                  <div class="table-responsive">

                    <table class="table table-bordered" id="tableID" width="30%" cellspacing="0">
                      <thead>
                        <tr class="info">
                          <th rowspan="2">Action</th>
                          <th rowspan="2">SO Number</th>
                          <th rowspan="2">Item Number</th>
                          <th rowspan="2">Lot Count</th>
                          <th rowspan="2">Factory</th>
                          <th rowspan="2">Customer</th>
                          <th rowspan="2" class="brandHead">Brand</th>
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
                          <th rowspan="2">Pallet No</th>
                          <th rowspan="2">Carton Number</th>
                          <th rowspan="2">Inspection Count</th>
                          <th colspan="7">Defects</th>
                          <th colspan="6">Acceptance</th>
                          <th rowspan="2">Glove weight</th>
                          <th rowspan="2">Overall AQL</th>
                          <th rowspan="2">Disposition</th>
                          <th rowspan="2">UD Result Code</th>
                          <th rowspan="2">Counting</th>
                          <th rowspan="2">Packaging Defect</th>
                          <th rowspan="2">Overall Internal Physical Test</th>
                          <th rowspan="2">Donning and Tearing</th>
                          <th rowspan="2">Overall Physical Dimension Test</th>
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
                      <tbody id="myTable">

                        <?php

                          if(isset($_POST['update'])){

                            $overallAQL = $_POST['overallAQL'];
                            $UDResultKey = $_POST['UDResultKey'];
                            $finalDisposition = $_POST['finalDisposition'];
                            $verifiedBy = $_POST['verifiedBy'];

                            if( $Verify_ID == $_SESSION['BadgeID']){

                              $query="{CALL SP_Update_Overall_FG(?,?,?,?,?,?,?,?,?,?)}";

                              $stmt=$connect->prepare($query);
                              $stmt->bindParam(1, $_SESSION['Ofactory']);
                              $stmt->bindParam(2, $_SESSION['OsoNumber']);
                              $stmt->bindParam(3, $_SESSION['OitemNumber']);
                              $stmt->bindParam(4, $_SESSION['OgloveSize']);
                              $stmt->bindParam(5, $_SESSION['OlotCount']);
                              $stmt->bindParam(6, $_SESSION['OinspectionCount']);
                              $stmt->bindParam(7, $overallAQL);
                              $stmt->bindParam(8, $UDResultKey);
                              $stmt->bindParam(9, $finalDisposition);
                              $stmt->bindParam(10, $verifiedBy);
                              if($stmt->execute()){
                                echo '
                                <script>
                                console.log("updated")
                                </script>
                                ';
                              }

                        ?>

                          <div id="myModal" class="modal fade">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title">Succesfully Update!</h4>
                                </div>
                                <div class="modal-body">
                                  <p><?php echo $stmt->rowCount() ." records updated successfully and verified by " .$_SESSION['BadgeID'];?></p>
                                </div>
                              </div>
                            </div>
                          </div>

                        <?php

                        $query2="{CALL SP_View_Overall_FG(?,?,?,?,?,?)}";

                        $stmt2=$connect->prepare($query2);
                        $stmt2->bindParam(1, $_SESSION['Ofactory']);
                        $stmt2->bindParam(2, $_SESSION['OsoNumber']);
                        $stmt2->bindParam(3, $_SESSION['OitemNumber']);
                        $stmt2->bindParam(4, $_SESSION['OgloveSize']);
                        $stmt2->bindParam(5, $_SESSION['OlotCount']);
                        $stmt2->bindParam(6, $_SESSION['OinspectionCount']);
                        $stmt2->execute();
                        while ($row=$stmt2->fetch()){
                          ?>
                          <tr class="text-center">
                            <td>
                              <a class="btn btn-success" href="formqrex_viewFG.php?LotIDKey=<?php echo $row['LotIDKey'];?>&RecordID=<?php echo $row['RecordID'];?>" target="_blank">
                                VIEW
                              </a>
                            </td>
                            <td><?php echo $row['SONumber'];?></td>
                            <td><?php echo $row['SOItemNumber'];?></td>
                            <td><?php echo $row['LotCount'];?></td>
                            <td><?php echo $row['Factory'];?></td>
                            <td><?php echo $row['CustomerName'];?></td>
                            <td><?php echo $row['BrandName'];?></td>
                            <td><?php echo $row['GloveProductTypeName'];?></td>
                            <td><?php echo $row['GloveCodeLong'];?></td>
                            <td><?php echo $row['GloveColourCode'];?></td>
                            <td><?php echo date('d/m/Y',strtotime($row['RecordCreatedDateTime']));?></td>
                            <td><?php
                            $prodDate = (explode(",",$row['ProductionDate']));
                            //echo $row['ProductionDate']."<br /><br />";
                            for($i = 0; $i < count($prodDate); $i++){
                              echo date('d/m/Y',strtotime($prodDate[$i])).",<br />";
                            }

                            ?></td>
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
                            <td><?php echo $row['PalletNumber'];?></td>
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
                            <td><?php echo $row['PackagingDefectTestValue'];?></td>
                            <td><?php echo $row['OverallIPTVALUE'];?></td>
                            <td><?php echo $row['DonningTearingTest'];?></td>
                            <td><?php echo $row['OverallPDTVALUE'];?></td>
                            <td><?php echo $row['LotIDKey'];?></td>
                            <td><?php echo $row['InspectionUserID'];?></td>
                            <td><?php echo $row['InspectorName'];?></td>
                            <td><?php echo $row['VerifierID'];?></td>
                            <td><?php echo $row['VerifierName'];?></td>+
                          </tr>
                          <?php
                        }

                          }else{
                        ?>

                        <div id="myModal" class="modal fade">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Unsuccessful Update!</h4>
                              </div>
                              <div class="modal-body">
                                <p>Verifier badge ID not matched with user account Badge ID.</p>
                              </div>
                            </div>
                          </div>
                        </div>

                        <?php
                            }
                          }
                        ?>

                      <?php

                        if(isset($_POST['search'])){

                          $factory = $_POST['factory'];
                          $_SESSION['Ofactory'] = $_POST['factory'];

                          $soNumber = $_POST['soNumber'];
                          $_SESSION['OsoNumber'] = $_POST['soNumber'];

                          $itemNumber  = $_POST['itemNumber'];
                          $_SESSION['OitemNumber']  = $_POST['itemNumber'];

                          $gloveSize = $_POST['gloveSize'];
                          $_SESSION['OgloveSize'] = $_POST['gloveSize'];

                          $lotCount = $_POST['lotCount'];
                          $_SESSION['OlotCount'] = $_POST['lotCount'];

                          $inspectionCount = $_POST['inspectionCount'];
                          $_SESSION['OinspectionCount'] = $_POST['inspectionCount'];

                          $query="{CALL SP_View_Overall_FG(?,?,?,?,?,?)}";

                          $stmt=$connect->prepare($query);
                          $stmt->bindParam(1, $factory);
                          $stmt->bindParam(2, $soNumber);
                          $stmt->bindParam(3, $itemNumber);
                          $stmt->bindParam(4, $gloveSize);
                          $stmt->bindParam(5, $lotCount);
                          $stmt->bindParam(6, $inspectionCount);
                          $stmt->execute();
                          while ($row=$stmt->fetch()){
                      ?>

                      <tr class="text-center">
                        <td>
                          <a class="btn btn-success" href="formqrex_viewFG.php?LotIDKey=<?php echo $row['LotIDKey'];?>" target="_blank">
                            VIEW
                          </a>
                        </td>
                        <td><?php echo $row['SONumber'];?></td>
                        <td><?php echo $row['SOItemNumber'];?></td>
                        <td><?php echo $row['LotCount'];?></td>
                        <td><?php echo $row['Factory'];?></td>
                        <td><?php echo $row['CustomerName'];?></td>
                        <td><?php echo $row['BrandName'];?></td>
                        <td><?php echo $row['GloveProductTypeName'];?></td>
                        <td><?php echo $row['GloveCodeLong'];?></td>
                        <td><?php echo $row['GloveColourCode'];?></td>
                        <td><?php echo date('d/m/Y',strtotime($row['RecordCreatedDateTime']));?></td>
                        <td><?php
                        $prodDate = (explode(",",$row['ProductionDate']));
                        //echo $row['ProductionDate']."<br /><br />";
                        for($i = 0; $i < count($prodDate); $i++){
                          echo date('d/m/Y',strtotime($prodDate[$i])).",<br />";
                        }

                        ?></td>
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
                        <td><?php echo $row['PalletNumber'];?></td>
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
                        <td><?php echo "tiada";//$row['PackagingDefect'];?></td>
                        <td><?php echo "tiada";//$row['OverallInternalPhysicalTest'];?></td>
                        <td><?php echo $row['DonningTearingTest'];?></td>
                        <td><?php echo "tiada";//$row['OverallPhysicalDimensionTest'];?></td>
                        <td><?php echo $row['LotIDKey'];?></td>
                        <td><?php echo $row['InspectionUserID'];?></td>
                        <td><?php echo "tiada";//$row['InspectionUserName'];?></td>
                        <td><?php echo $row['VerifierID'];?></td>
                        <td><?php echo "tiada";//$row['VerifierID'];?></td>
                      </tr>
                    <?php }} ?>
                      </tbody>

                    </table>

                  </div>
                  <!-- /.table-responsive -->

                </div>
                <!-- /.col-md-12 -->
              </div>
              <!-- /.row -->

          </div>
          <!-- /.panel-body -->
        </div>
        <!-- /.panel -->

      </div>
      <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../../vendor/datatables-plugins/dataTables.bootstrap.js"></script>
    <script src="../../dist/js/sb-admin-2.js"></script>
    <script src="../../vendor/datatables/datatables-demo.js"></script>
    <script type="text/javascript" language="javascript" src="../datatables/js/jquery-3.3.1.js"></script>
    <script type="text/javascript" language="javascript" src="../datatables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="../datatables/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="../datatables/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="../datatables/js/buttons.bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="../datatables/js/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="../datatables/js/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="../datatables/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="../datatables/js/buttons.print.min.js"></script>
    <script type="text/javascript" language="javascript" src="../datatables/js/buttons.colVis.min.js"></script>
    <script type="text/javascript" language="javascript" src="../../../../../examples/resources/demo.js"></script>
    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <link href="../jquery.datatables.yadcf.css" rel="stylesheet" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
    <script src="../jquery.dataTables.yadcf.js"></script>
    <!-- This file affects the navbar -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>

      $(document).ready(function(){

        $('#Verify_ID').keyup(function(){
          selectVal = $('#Verify_ID').val();

          if(selectVal == ''){
            $('#myUpdate').prop("disabled", true);
          }
          else{
            $('#myUpdate').prop("disabled", false);
          }
        })

        $("#myModal").modal('show');

        $('#tableID').dataTable({
          "dom": 'Bfrtip',
          buttons: [{
            extend :'excel',
            text:'Export to Excel',
            footer: true,
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
            text: 'Print and PDF save',
            action:function () {
              form=document.getElementById('idOfForm');
              form.target='_blank';
              form.action='tablefg_test_print.php';
              form.submit();
              form.action='tablefg_test_update.php';
              form.target='';
            }
          }]
        }).yadcf([
          {column_number: 1, filter_default_label: "Select"},
          {column_number: 2, filter_default_label: "Select"},
          {column_number: 3, filter_default_label: "Select"},
          {column_number: 4, filter_default_label: "Select"},
          {column_number: 5, filter_default_label: "Select"},
          {column_number: 6, filter_default_label: "Select"},
          {column_number: 7, filter_default_label: "Select"},
          {column_number: 8, filter_default_label: "Select"},
          {column_number: 9, filter_default_label: "Select"},
          {column_number: 10, filter_default_label: "Select"},
          {column_number: 11, filter_default_label: "Select"},
          {column_number: 12, filter_default_label: "Select"},
          {column_number: 13, filter_default_label: "Select"},
          {column_number: 14, filter_default_label: "Select"},
          {column_number: 15, filter_default_label: "Select"},
          {column_number: 16, filter_default_label: "Select"},
          {column_number: 17, filter_default_label: "Select"},
          {column_number: 18, filter_default_label: "Select"},
          {column_number: 18, filter_default_label: "Select"}
        ]);

      });

	  </script>
  </body>
</html>
