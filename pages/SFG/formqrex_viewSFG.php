  <!-- Print Result  -->
  <!-- Print Result  -->
<?php
include('../includes/database_connection.php');
include('../includes/session.php');
include('../includes/header.php');

$lotID = $_GET['LotIDKey'];
$RecordID = $_GET['RecordID'];

// echo $lotID;
// echo "<br />".$RecordID;
?>

  <body>

    <nav style = "background-color:rgba(0, 0, 0, 0.1);" class = "navbar navbar-default">
      <div  class = "container-fluid">
        <div class = "navbar-header">
          <a class = "navbar-brand" ><b>QUALITY RECORD E SYSTEM (QREX) - SFG</b></a>
        </div>
      </div>
    </nav>

    <?php
      $query = $connect->prepare("{CALL SP_GetLotExistingRec(?)}");
      $query -> bindParam(1, $lotID);
      $query->execute();
      $T_Lot_ProductionDateWLine = $query->fetchAll();
      $query -> nextRowset();
      $T_Lot_PackingDate = $query->fetch();
      //echo $T_Lot_PackingDate['PackingDate'];
      $query -> nextRowset();
      $T_Lot_CartonNum = $query->fetch();
      // echo $T_Lot_CartonNum['CartonNum'];
      $query -> nextRowset();
      $T_Lot_FG = $query->fetch();
      // echo $T_Lot_FG['BatchNumber'];
      $query -> nextRowset();
      $T_Lot_SFG = $query->fetch();
      // echo $T_Lot_SFG['BatchNumber'];


      $query2 = $connect->prepare("{CALL SP_GetRecordExistingRec(?)}");
      $query2 -> bindParam(1, $RecordID);
      $query2->execute();
      $T_Record_Instrument = $query2->fetchAll();
      $query2 -> nextRowset();
      $T_Record_Test = $query2->fetchAll();
      $query2 -> nextRowset();
      $T_Record_SampleSize = $query2->fetchAll();
      $query2 -> nextRowset();
      $T_Record_Defect = $query2->fetchAll();
      $query2 -> nextRowset();
      $T_Record_AQL = $query2->fetchAll();
      $query2 -> nextRowset();
      $T_Record_UDResult = $query2->fetchAll();

      $defectResult_pivot = array(
        $T_Record_Defect[0]['DefectKey'] => $T_Record_Defect[0]['DefectValue'],
        $T_Record_Defect[1]['DefectKey'] => $T_Record_Defect[1]['DefectValue'],
        $T_Record_Defect[2]['DefectKey'] => $T_Record_Defect[2]['DefectValue'],
        $T_Record_Defect[3]['DefectKey'] => $T_Record_Defect[3]['DefectValue'],
        $T_Record_Defect[4]['DefectKey'] => $T_Record_Defect[4]['DefectValue'],
        $T_Record_Defect[5]['DefectKey'] => $T_Record_Defect[5]['DefectValue'],
        $T_Record_Defect[6]['DefectKey'] => $T_Record_Defect[6]['DefectValue'],
        $T_Record_Defect[7]['DefectKey'] => $T_Record_Defect[7]['DefectValue'],
        $T_Record_Defect[8]['DefectKey'] => $T_Record_Defect[8]['DefectValue'],
        $T_Record_Defect[9]['DefectKey'] => $T_Record_Defect[9]['DefectValue'],
  
        $T_Record_Defect[10]['DefectKey'] => $T_Record_Defect[10]['DefectValue'],
        $T_Record_Defect[11]['DefectKey'] => $T_Record_Defect[11]['DefectValue'],
        $T_Record_Defect[12]['DefectKey'] => $T_Record_Defect[12]['DefectValue'],
        $T_Record_Defect[13]['DefectKey'] => $T_Record_Defect[13]['DefectValue'],
        $T_Record_Defect[14]['DefectKey'] => $T_Record_Defect[14]['DefectValue'],
        $T_Record_Defect[15]['DefectKey'] => $T_Record_Defect[15]['DefectValue'],
        $T_Record_Defect[16]['DefectKey'] => $T_Record_Defect[16]['DefectValue'],
        $T_Record_Defect[17]['DefectKey'] => $T_Record_Defect[17]['DefectValue'],
        $T_Record_Defect[18]['DefectKey'] => $T_Record_Defect[18]['DefectValue'],
        $T_Record_Defect[19]['DefectKey'] => $T_Record_Defect[19]['DefectValue'],
  
        $T_Record_Defect[20]['DefectKey'] => $T_Record_Defect[20]['DefectValue'],
        $T_Record_Defect[21]['DefectKey'] => $T_Record_Defect[21]['DefectValue'],
        $T_Record_Defect[22]['DefectKey'] => $T_Record_Defect[22]['DefectValue'],
        $T_Record_Defect[23]['DefectKey'] => $T_Record_Defect[23]['DefectValue'],
        $T_Record_Defect[24]['DefectKey'] => $T_Record_Defect[24]['DefectValue'],
        $T_Record_Defect[25]['DefectKey'] => $T_Record_Defect[25]['DefectValue'],
        $T_Record_Defect[26]['DefectKey'] => $T_Record_Defect[26]['DefectValue'],
        $T_Record_Defect[27]['DefectKey'] => $T_Record_Defect[27]['DefectValue'],
        $T_Record_Defect[28]['DefectKey'] => $T_Record_Defect[28]['DefectValue'],
        $T_Record_Defect[29]['DefectKey'] => $T_Record_Defect[29]['DefectValue'],
  
        $T_Record_Defect[30]['DefectKey'] => $T_Record_Defect[30]['DefectValue'],
        $T_Record_Defect[31]['DefectKey'] => $T_Record_Defect[31]['DefectValue'],
        $T_Record_Defect[32]['DefectKey'] => $T_Record_Defect[32]['DefectValue'],
        $T_Record_Defect[33]['DefectKey'] => $T_Record_Defect[33]['DefectValue'],
        $T_Record_Defect[34]['DefectKey'] => $T_Record_Defect[34]['DefectValue'],
        $T_Record_Defect[35]['DefectKey'] => $T_Record_Defect[35]['DefectValue'],
        $T_Record_Defect[36]['DefectKey'] => $T_Record_Defect[36]['DefectValue'],
        $T_Record_Defect[37]['DefectKey'] => $T_Record_Defect[37]['DefectValue'],
        $T_Record_Defect[38]['DefectKey'] => $T_Record_Defect[38]['DefectValue'],
        $T_Record_Defect[39]['DefectKey'] => $T_Record_Defect[39]['DefectValue'],
  
        $T_Record_Defect[40]['DefectKey'] => $T_Record_Defect[40]['DefectValue'],
        $T_Record_Defect[41]['DefectKey'] => $T_Record_Defect[41]['DefectValue'],
        $T_Record_Defect[42]['DefectKey'] => $T_Record_Defect[42]['DefectValue'],
        $T_Record_Defect[43]['DefectKey'] => $T_Record_Defect[43]['DefectValue'],
        $T_Record_Defect[44]['DefectKey'] => $T_Record_Defect[44]['DefectValue'],
        $T_Record_Defect[45]['DefectKey'] => $T_Record_Defect[45]['DefectValue'],
        $T_Record_Defect[46]['DefectKey'] => $T_Record_Defect[46]['DefectValue'],
        $T_Record_Defect[47]['DefectKey'] => $T_Record_Defect[47]['DefectValue'],
        $T_Record_Defect[48]['DefectKey'] => $T_Record_Defect[48]['DefectValue'],
        $T_Record_Defect[49]['DefectKey'] => $T_Record_Defect[49]['DefectValue'],
  
        $T_Record_Defect[50]['DefectKey'] => $T_Record_Defect[50]['DefectValue'],
        $T_Record_Defect[51]['DefectKey'] => $T_Record_Defect[51]['DefectValue'],
        $T_Record_Defect[52]['DefectKey'] => $T_Record_Defect[52]['DefectValue'],
        $T_Record_Defect[53]['DefectKey'] => $T_Record_Defect[53]['DefectValue'],
        $T_Record_Defect[54]['DefectKey'] => $T_Record_Defect[54]['DefectValue'],
        $T_Record_Defect[55]['DefectKey'] => $T_Record_Defect[55]['DefectValue'],
        $T_Record_Defect[56]['DefectKey'] => $T_Record_Defect[56]['DefectValue'],
        $T_Record_Defect[57]['DefectKey'] => $T_Record_Defect[57]['DefectValue'],
        $T_Record_Defect[58]['DefectKey'] => $T_Record_Defect[58]['DefectValue'],
        $T_Record_Defect[59]['DefectKey'] => $T_Record_Defect[59]['DefectValue'],
  
        $T_Record_Defect[60]['DefectKey'] => $T_Record_Defect[60]['DefectValue'],
        $T_Record_Defect[61]['DefectKey'] => $T_Record_Defect[61]['DefectValue'],
        $T_Record_Defect[62]['DefectKey'] => $T_Record_Defect[62]['DefectValue'],
        $T_Record_Defect[63]['DefectKey'] => $T_Record_Defect[63]['DefectValue'],
        $T_Record_Defect[64]['DefectKey'] => $T_Record_Defect[64]['DefectValue'],
        $T_Record_Defect[65]['DefectKey'] => $T_Record_Defect[65]['DefectValue'],
        $T_Record_Defect[66]['DefectKey'] => $T_Record_Defect[66]['DefectValue'],
        $T_Record_Defect[67]['DefectKey'] => $T_Record_Defect[67]['DefectValue'],
        $T_Record_Defect[68]['DefectKey'] => $T_Record_Defect[68]['DefectValue'],
        $T_Record_Defect[69]['DefectKey'] => $T_Record_Defect[69]['DefectValue'],
        
        $T_Record_Defect[70]['DefectKey'] => $T_Record_Defect[70]['DefectValue'],
        $T_Record_Defect[71]['DefectKey'] => $T_Record_Defect[71]['DefectValue'],
        $T_Record_Defect[72]['DefectKey'] => $T_Record_Defect[72]['DefectValue'],
        $T_Record_Defect[73]['DefectKey'] => $T_Record_Defect[73]['DefectValue'],
        $T_Record_Defect[74]['DefectKey'] => $T_Record_Defect[74]['DefectValue'],
        $T_Record_Defect[75]['DefectKey'] => $T_Record_Defect[75]['DefectValue'],
        $T_Record_Defect[76]['DefectKey'] => $T_Record_Defect[76]['DefectValue'],
        $T_Record_Defect[77]['DefectKey'] => $T_Record_Defect[77]['DefectValue'],
        $T_Record_Defect[78]['DefectKey'] => $T_Record_Defect[78]['DefectValue'],
        $T_Record_Defect[79]['DefectKey'] => $T_Record_Defect[79]['DefectValue'],
  
        $T_Record_Defect[80]['DefectKey'] => $T_Record_Defect[80]['DefectValue'],
        $T_Record_Defect[81]['DefectKey'] => $T_Record_Defect[81]['DefectValue'],
        $T_Record_Defect[82]['DefectKey'] => $T_Record_Defect[82]['DefectValue'],
        $T_Record_Defect[83]['DefectKey'] => $T_Record_Defect[83]['DefectValue'],
        $T_Record_Defect[84]['DefectKey'] => $T_Record_Defect[84]['DefectValue'],
        $T_Record_Defect[85]['DefectKey'] => $T_Record_Defect[85]['DefectValue'],
        $T_Record_Defect[86]['DefectKey'] => $T_Record_Defect[86]['DefectValue'],
        $T_Record_Defect[87]['DefectKey'] => $T_Record_Defect[87]['DefectValue'],
        $T_Record_Defect[88]['DefectKey'] => $T_Record_Defect[88]['DefectValue'],
        $T_Record_Defect[89]['DefectKey'] => $T_Record_Defect[89]['DefectValue'],
  
        $T_Record_Defect[90]['DefectKey'] => $T_Record_Defect[90]['DefectValue'],
        $T_Record_Defect[91]['DefectKey'] => $T_Record_Defect[91]['DefectValue'],
        $T_Record_Defect[92]['DefectKey'] => $T_Record_Defect[92]['DefectValue'],
        $T_Record_Defect[93]['DefectKey'] => $T_Record_Defect[93]['DefectValue'],
        $T_Record_Defect[94]['DefectKey'] => $T_Record_Defect[94]['DefectValue'],
        $T_Record_Defect[95]['DefectKey'] => $T_Record_Defect[95]['DefectValue'],
        $T_Record_Defect[96]['DefectKey'] => $T_Record_Defect[96]['DefectValue'],
        $T_Record_Defect[97]['DefectKey'] => $T_Record_Defect[97]['DefectValue'],
        $T_Record_Defect[98]['DefectKey'] => $T_Record_Defect[98]['DefectValue'],
        $T_Record_Defect[99]['DefectKey'] => $T_Record_Defect[99]['DefectValue'],
  
        $T_Record_Defect[100]['DefectKey'] => $T_Record_Defect[100]['DefectValue'],
        $T_Record_Defect[101]['DefectKey'] => $T_Record_Defect[101]['DefectValue'],
        $T_Record_Defect[102]['DefectKey'] => $T_Record_Defect[102]['DefectValue'],
        $T_Record_Defect[103]['DefectKey'] => $T_Record_Defect[103]['DefectValue'],
        $T_Record_Defect[104]['DefectKey'] => $T_Record_Defect[104]['DefectValue'],
        $T_Record_Defect[105]['DefectKey'] => $T_Record_Defect[105]['DefectValue'],
        $T_Record_Defect[106]['DefectKey'] => $T_Record_Defect[106]['DefectValue'],
        $T_Record_Defect[107]['DefectKey'] => $T_Record_Defect[107]['DefectValue'],
        $T_Record_Defect[108]['DefectKey'] => $T_Record_Defect[108]['DefectValue'],
        $T_Record_Defect[109]['DefectKey'] => $T_Record_Defect[109]['DefectValue'],
        
        $T_Record_Defect[110]['DefectKey'] => $T_Record_Defect[110]['DefectValue'],
        $T_Record_Defect[111]['DefectKey'] => $T_Record_Defect[111]['DefectValue'],
        $T_Record_Defect[112]['DefectKey'] => $T_Record_Defect[112]['DefectValue'],
        $T_Record_Defect[113]['DefectKey'] => $T_Record_Defect[113]['DefectValue'],
        $T_Record_Defect[114]['DefectKey'] => $T_Record_Defect[114]['DefectValue'],
        $T_Record_Defect[115]['DefectKey'] => $T_Record_Defect[115]['DefectValue'],
        $T_Record_Defect[116]['DefectKey'] => $T_Record_Defect[116]['DefectValue'],
        $T_Record_Defect[117]['DefectKey'] => $T_Record_Defect[117]['DefectValue'],
        $T_Record_Defect[118]['DefectKey'] => $T_Record_Defect[118]['DefectValue'],
        $T_Record_Defect[119]['DefectKey'] => $T_Record_Defect[119]['DefectValue'],
        
        $T_Record_Defect[120]['DefectKey'] => $T_Record_Defect[120]['DefectValue'],
        $T_Record_Defect[121]['DefectKey'] => $T_Record_Defect[121]['DefectValue'],
        $T_Record_Defect[122]['DefectKey'] => $T_Record_Defect[122]['DefectValue'],
        $T_Record_Defect[123]['DefectKey'] => $T_Record_Defect[123]['DefectValue'],
        $T_Record_Defect[124]['DefectKey'] => $T_Record_Defect[124]['DefectValue'],
        $T_Record_Defect[125]['DefectKey'] => $T_Record_Defect[125]['DefectValue'],
        $T_Record_Defect[126]['DefectKey'] => $T_Record_Defect[126]['DefectValue'],
        $T_Record_Defect[127]['DefectKey'] => $T_Record_Defect[127]['DefectValue'],
        $T_Record_Defect[128]['DefectKey'] => $T_Record_Defect[128]['DefectValue'],
        $T_Record_Defect[129]['DefectKey'] => $T_Record_Defect[129]['DefectValue'],
        
        $T_Record_Defect[130]['DefectKey'] => $T_Record_Defect[130]['DefectValue'],
        $T_Record_Defect[131]['DefectKey'] => $T_Record_Defect[131]['DefectValue'],
        $T_Record_Defect[132]['DefectKey'] => $T_Record_Defect[132]['DefectValue'],
        $T_Record_Defect[133]['DefectKey'] => $T_Record_Defect[133]['DefectValue'],
        $T_Record_Defect[134]['DefectKey'] => $T_Record_Defect[134]['DefectValue'],
        $T_Record_Defect[135]['DefectKey'] => $T_Record_Defect[135]['DefectValue'],
        $T_Record_Defect[136]['DefectKey'] => $T_Record_Defect[136]['DefectValue'],
        $T_Record_Defect[137]['DefectKey'] => $T_Record_Defect[137]['DefectValue'],
        $T_Record_Defect[138]['DefectKey'] => $T_Record_Defect[138]['DefectValue'],
        $T_Record_Defect[139]['DefectKey'] => $T_Record_Defect[139]['DefectValue'],
  
        $T_Record_Defect[140]['DefectKey'] => $T_Record_Defect[140]['DefectValue'],
        $T_Record_Defect[141]['DefectKey'] => $T_Record_Defect[141]['DefectValue'],
        $T_Record_Defect[142]['DefectKey'] => $T_Record_Defect[142]['DefectValue'],
        $T_Record_Defect[143]['DefectKey'] => $T_Record_Defect[143]['DefectValue'],
        );

      $query3 = $connect->prepare("SELECT * FROM T_Record_Master WHERE RecordID = ?");
      $query3 -> bindParam(1, $RecordID);
      $query3 ->execute();
      $T_Record_Master = $query3->fetch();

    ?>

    <div class = "container-fluid">

      <div class="panel panel-primary">
        <div class="panel-heading">
          Customer Information
        </div>

        <div class="panel-body">
          <div class="row">

            <div class="col-lg-6">

                      <div class="form-group">

                        Factory:
                        <label> <?php echo $T_Lot_SFG['PlantName'];  ?> </label>
                      </div>

                      <div class="form-group">
                        <?php $date = date("d/m/Y h:i:s A", strtotime($T_Record_Master['RecordCreatedDateTime'])); ?>
                        Date:
                        <label><?php echo $date;?></label>
                      </div>

                      <div class="form-group">
                        Batch No:
                        <label><?php echo $T_Lot_SFG['BatchNumber'];?></label>
                      </div>

                      <div class="form-group">
                        Inspection Stage:
                        <label> <?php echo 'SEMI FINISHED GOOD'?></label></br>
                      </div>

                      <div class="form-group">
                        Category: <label><?php echo $T_Lot_SFG['InspectionPlanName']; ?></label></br>
                      </div>

                      <div class="form-group">
                        Size:<label> <?php echo $T_Lot_SFG['GloveSizeCodeLong'];?> </label></br>
                      </div>

                      <div class="form-group">
                        Inspection Count:
                        <label> <?php echo $T_Record_Master['InspectionCount'];?></label></br>
                      </div>

										  <div class="form-group">
                        Quantity Carton / Bag:
                        <label><?php echo $T_Lot_SFG['CartonQuantity'];?></label></br>
                      </div>

										  <div class="form-group">
                        Carton Number:
                        <label><?php echo $T_Lot_CartonNum['CartonNum'];?></label></br>
                      </div>

                      <div class="form-group">
                        Status:
                        <label>
                        <?php if ($T_Record_Master['RecordStatusFlag'] == '1') echo "N/A";
                              if ($T_Record_Master['RecordStatusFlag'] == '2') echo "Reinspect";
                              if ($T_Record_Master['RecordStatusFlag'] == '3') echo "Convert Inspection";
                              if ($T_Record_Master['RecordStatusFlag'] == '4') echo "Repack Inspection";?>
                        </label></br>
                      </div>
                      </div>

                      <div class="col-lg-6">


				<div class="form-group">
                        Customer:
                        <label><?php echo $T_Lot_SFG['CustomerName'];?></label><br>
                      </div>

                      <div class="form-group">
                        Brand:
                        <label><?php echo $T_Lot_SFG['BrandName'];?></label>
                      </div>

                      <div class="form-group">
                        LOT NO:
                        <label><?php echo $T_Lot_SFG['LotNumber'];?></label>
                      </div>

                      <div class="form-group">
                        Product : <label><?php echo $T_Lot_SFG['GloveProductTypeName'];?></label>
                      </div>

                      <div class="form-group">
                        Product Code: <label><?php echo $T_Lot_SFG['GloveCodeLong'];?></label>
                      </div>

                      <div class="form-group">
                        Colour:  <label><?php echo $T_Lot_SFG['GloveColourName']; ?></label>
                      </div>

                      <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">

                        <tr class="info">
                          <th class="text-center" colspan="2">Production:</th>
                          <th class="text-center">Shift:</th>
                        </tr>

                        <tr>
                          <?php

                            foreach ($T_Lot_ProductionDateWLine as $data) {
                          ?>

                        <?php
                            if ($data['SHIFT'] == NULL) { ?>
                            <input type="hidden" name="ProductionLineKey1" value="<?php echo $data['ProductionLineKey'] ?>">
                            <input type="hidden" name="production_date1" value="<?php echo $data['ProductionDate'] ?>">
                            <input type="hidden" name="shift1" value="<?php echo $data['SHIFT'] ?>">

                            <?php } else { ?>

                          <td style="text-align:center"><?php echo $data['ProductionLineName'];}?></td>
                          <?php $ProductDate = date("d/m/Y", strtotime($data['ProductionDate'])); ?>
                          <td style="text-align:center"><?php echo $ProductDate;?></td>
                          <td style="text-align:center"><?php echo $data['SHIFT'];}?></td>
                        </tr>
                      </table>

                      <div class="form-group">
                        <?php $Packdate = date("d/m/Y", strtotime($T_Lot_PackingDate['PackingDate'])); ?>
                        Pack Date:
                        <label> <?php echo $Packdate ?></label>
                      </div>

                      <div class="form-group">
                        Checked By:
                        <label><?php echo $T_Record_Master['InspectionUserID'];?></label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-12">
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        Internal Physical Test
                      </div>

<!-----------------------------------------------------------1.INSTRUMENT--------------------------------------------------------------------------->
                      <div class="col-lg-6"></br>

                      <label>1. Instruments</label></br></br>
                      <div class="form-group">
                        Weighing Scale ID: <label><?php echo $T_Record_Instrument[0]['InstrumentValue'];?></label>
                      </div>

                      <div class="form-group">
                        Ruler ID:<label> <?php echo $T_Record_Instrument[2]['InstrumentValue'];?> </label>
                      </div>

                      <div class="form-group">
                        Thickness Gauge ID:<label>  <?php echo $T_Record_Instrument[1]['InstrumentValue'];?></label>
                      </div>
										    <br>
<!-----------------------------------------------------------2. TEST RESULT--------------------------------------------------------------------------->
										    <label>2. Test Result</label></br></br>

                        <div class="form-group">
                          Glove Weight:
                          <?php if ($T_Record_Test[11]['TestValue'] != NULL ) { ?>
                        <label><?php echo $T_Record_Test[10]['TestValue'];?>, <?php echo $T_Record_Test[11]['TestValue'];?></label>
                        <?php }else{ ?>
                        <label><?php echo  $T_Record_Test[10]['TestValue'];}?></label>
                        </div>

    								    <div class="form-group">
                          Counting:
                          <?php if ($T_Record_Test[12]['SRText'] != NULL ) { ?>
                        <label><?php echo $T_Record_Test[12]['TestValue'];?>, <?php echo $T_Record_Test[12]['SRText'];?></label>
                        <?php }else{ ?>
                        <label><?php echo  $T_Record_Test[12]['TestValue'];}?></label>
                        </div>

                        <div class="form-group">
                          Packaging Defect:
                          <?php if ($T_Record_Test[7]['SRText'] != NULL ) { ?>
                        <label><?php echo $T_Record_Test[7]['TestValue'];?>, <?php echo $T_Record_Test[7]['SRText'];?></label>
                        <?php }else{ ?>
                        <label><?php echo  $T_Record_Test[7]['TestValue'];}?></label>
                        </div>
                      </div><br>

<!-----------------------------------------------------------3. INTERNAL PHYSICAL TESTING ------------------------------------------------------------>                   <!-- /.col-lg-6 (nested) -->
                      <div class="col-lg-4">
                        <label>3. Internal Physical Testing</label>


                        <table class="table table-bordered" id="dataTable" width="20%" cellspacing="0">
                          <tr>
                            <div class="form-group">

                            <th scope="col" class="info">Layering:</th>
                            <td><?php echo $T_Record_Test[1]['TestValue'];?></td>

                            <th class="info">Smelly:</th>
                            <td><?php echo $T_Record_Test[4]['TestValue'];?></td>
                          </tr>

                          <tr>
                            <th scope="col" class="info">Gripness:</th>
                            <td><?php echo $T_Record_Test[5]['TestValue'];?></td>


                            <th scope="col" class="info">Black Cloth:</th>
                            <td><?php echo $T_Record_Test[8]['TestValue'];?></td>


                          </tr>

                          <tr>
                            <th class="info">Sticking:</th>
                            <td><?php echo $T_Record_Test[6]['TestValue'];?></td>


                            <th scope="col" class="info">Dispensing:</th>
                            <td><?php echo $T_Record_Test[3]['TestValue'];?></td>


                          </tr>

                          <tr>
                            <th class="info">White Cloth:</th>
                            <td><?php echo $T_Record_Test[9]['TestValue'];?></td>


                            <th class="info">Dye Leak:</th>
                            <td><?php echo $T_Record_Test[131]['TestValue'];?></td>


                          </tr>
                          <tr>
                            <th class="info">Sealing:</th>
                            <td><?php echo $T_Record_Test[130]['TestValue'];?></td>


                            <th class="info">Burst Test:</th>
                            <td><?php echo $T_Record_Test[132]['TestValue'];?></td>

                          </tr>
                          <tr>
                            <th class="info">Visual & Peel Ability:</th>
                            <td><?php echo $T_Record_Test[133]['TestValue'];?></td>

                          </tr>
                        </table><br>

                        <table class="table table-bordered" id="dataTable" width="20%" cellspacing="0">
                        <tr>
                          <th class="info" rowspan="2">Donning & Tearing:</th>
                          <th>Result</th>
                          <th>Remark</th>
                        </tr>
                        <tr>
                        <div class="form-group">
                          <td><?php echo $T_Record_Test[2]['TestValue'];?></td>
                          <td><?php echo $T_Record_Test[2]['SRText'];?></td>
                        </div>
                        </tr>
                      </table>

<!-----------------------------------------------------------4. SPECIAL REQUIREMENT ------------------------------------------------------------------>

                        <label>4. Special Requirements</label>
                        <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
  										    <tr>
                            <div class="form-group">
                            <th scope="col" class="info">Test No:</th>
                            <th class="info">Test Name:</th>
                            <th scope="col" class="info">Disposition:</th>
                          </tr>

                          <tr>
                            <th scope="col" class="info">Test 1:</th>

                            <td><?php echo $T_Record_Test[125]['TestValue'];?></td>
                            <td><?php echo $T_Record_Test[125]['SRText'];?></td>
                          </tr>

                          <tr>
                            <th scope="col" class="info">Test 2:</th>

                            <td><?php echo $T_Record_Test[126]['TestValue'];?></td>
                            <td><?php echo $T_Record_Test[126]['SRText'];?></td>
                          </tr>

                          <tr>
                            <th scope="col" class="info">Test 3:</th>

                            <td><?php echo $T_Record_Test[127]['TestValue'];?></td>
                            <td><?php echo $T_Record_Test[127]['SRText'];?></td>
                          </tr>

                          <tr>
                            <th scope="col" class="info">Test 4:</th>

                            <td><?php echo $T_Record_Test[128]['TestValue'];?></td>
                            <td><?php echo $T_Record_Test[128]['SRText'];?></td>
                          </tr>

                          <tr>
                            <th scope="col" class="info">Test 5:</th>

                            <td><?php echo $T_Record_Test[129]['TestValue'];?></td>
                            <td><?php echo $T_Record_Test[129]['SRText'];?></td>
                          </tr>
                        </table>
                      </div>

<!-----------------------------------------------------------PHYSICAL DIMENSION TEST --------------------------------------------------------------->                      <div class="row">
                        <div class="col-lg-12">
                           <div class="panel panel-primary">
                             <div class="panel-heading">
                            Physical Dimensions Test
                             </div>
                           </div>
                           <div class="col-lg-6">
                             <table class="table table-bordered" id="dataTable" >
         										<tr>
           									<th scope="col" class="info">METHOD:</th>


             									<td><?php echo $T_Record_Test[0]['TestValue'];?></td>
        										</tr>
                                        </table>
                               </div>
                                  <div class="col-lg-12">

                                    <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                                     <tr class="info">
                                       <th class="text-center">TEST</th>
                                     <th class="text-center">1</th>
                                     <th class="text-center">2</th>
                                     <th class="text-center">3</th>
                                     <th class="text-center">4</th>
                                     <th class="text-center">5</th>
                                     <th class="text-center">6</th>
                                     <th class="text-center">7</th>
                                     <th class="text-center">8</th>
                                     <th class="text-center">9</th>
                                     <th class="text-center">10</th>
                                     <th class="text-center">11</th>
                                     <th class="text-center">12</th>
                                     <th class="text-center">13</th>
                                     <th class="text-center">PASS/FAIL</th>
                           		</tr>

         										        <tr>
                                       <th scope="col" class="info">Length(mm):</th>
                                       <td class="text-center"><?php echo $T_Record_Test[14]['TestValue'];?></td>
                                  	    <td class="text-center"><?php echo $T_Record_Test[15]['TestValue'];?></td>
                                       <td class="text-center"><?php echo $T_Record_Test[16]['TestValue'];?></td>
                                       <td class="text-center"><?php echo $T_Record_Test[17]['TestValue'];?></td>
                                       <td class="text-center"><?php echo $T_Record_Test[18]['TestValue'];?></td>
                                       <td class="text-center"><?php echo $T_Record_Test[19]['TestValue'];?></td>
                                       <td class="text-center"><?php echo $T_Record_Test[20]['TestValue'];?></td>
                                       <td class="text-center"><?php echo $T_Record_Test[21]['TestValue'];?></td>
                                       <td class="text-center"><?php echo $T_Record_Test[22]['TestValue'];?></td>
                                       <td class="text-center"><?php echo $T_Record_Test[23]['TestValue'];?></td>
                                       <td class="text-center"><?php echo $T_Record_Test[24]['TestValue'];?></td>
                                       <td class="text-center"><?php echo $T_Record_Test[25]['TestValue'];?></td>
                                       <td class="text-center"><?php echo $T_Record_Test[26]['TestValue'];?></td>
             				                  <td class="text-center"><?php echo $T_Record_Test[13]['TestValue'];?></td>
        				 </tr>

                                 <tr>
           									      <th scope="col" class="info">Width(mm):</th>
                                   <td class="text-center"><?php echo $T_Record_Test[28]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[29]['TestValue'];?></td>
                                  	<td class="text-center"><?php echo $T_Record_Test[30]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[31]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[32]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[33]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[34]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[35]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[36]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[37]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[38]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[39]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[40]['TestValue'];?></td>
             									    <td class="text-center"><?php echo $T_Record_Test[27]['TestValue'];?></td>
        										      </tr>

                                 <tr>
           									      <th scope="col" class="info">Thickness of Cuff(mm):</th>

                                   <td class="text-center"><?php echo $T_Record_Test[42]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[43]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[44]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[45]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[46]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[47]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[48]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[49]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[50]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[51]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[52]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[53]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[54]['TestValue'];?></td>
             									    <td class="text-center"><?php echo $T_Record_Test[41]['TestValue'];?></td>

        										      </tr>

                                 <tr>
           									      <th scope="col" class="info">Thickness of Palm(mm):</th>
                                   <td class="text-center"><?php echo $T_Record_Test[56]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[57]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[58]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[59]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[60]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[61]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[62]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[63]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[64]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[65]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[66]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[67]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[68]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[55]['TestValue'];?></td>
        										      </tr>

                                 <tr>
           									      <th scope="col" class="info">Thickness of Cuff Edge:</th>
                                   <td class="text-center"><?php echo $T_Record_Test[70]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[71]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[72]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[73]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[74]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[75]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[76]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[77]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[78]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[79]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[80]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[81]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[82]['TestValue'];?></td>
                                   <td class="text-center"><?php echo $T_Record_Test[69]['TestValue'];?></td>
        										      </tr>

                         			</table>

                      </div>
                    </div>
                  </div>
                </div><br><br>
<!----------------------------------------------------------- INSPECTION RECORD --------------------------------------------------------------------->
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      Inspection Record
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">

                      <tr>
                        <th scope="col" class="info">SAMPLE SIZE APT/WTT (LEVEL 1):</th>
                        <td><?php echo $T_Record_SampleSize[1]['SampleSizeValue']; ?></td>

                        <th scope="col" class="info">SAMPLE SIZE VT:</th>
                        <td><?php echo $T_Record_SampleSize[0]['SampleSizeValue']; ?></td>
                      </tr>

                      <tr>
                        <th scope="col" class="info">SAMPLE SIZE APT/WTT (LEVEL 2):</th>
                        <td><?php echo $T_Record_SampleSize[2]['SampleSizeValue']; ?></td>

                        <th scope="col" class="info">MACHINE ID:</th>
                        <td><?php echo $T_Record_Instrument[3]['InstrumentValue']; ?></td>

                      </tr>
                    </table>

                    <td><b>**Inspection Plan & Level </b><a class = "btn btn-default"
                             data-toggle="modal" data-target="#remark" href="pdf/GL PQC S07 Inspection Plan 1.1 Published.pdf" target="iframe_i">?</a><br></td>
                             <td><b>*Glove Inspection</b></td>

                    <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                      <tr class="info">
                        <th></th>
                        <th colspan="2" width="13%">MINOR VISUAL</th>
                        <th colspan="4" width="30%">MAJOR VISUAL</th>
                        <th colspan="3" width="18%">CRITICAL NAG</th>
                        <th colspan="3" width="13%">CRITICAL NFG</th>
                        <th colspan="2" width="13%">FREEDOM FROM HOLES LEVEL 1</th>
                        <th colspan="2" width="13%">FREEDOM FROM HOLES LEVEL 2</th>
                      </tr>
                      <tr>
                        <th scope="col" class="info">AQL:</th>
                        <td colspan="2"><?php echo $T_Record_AQL[0]['AQLValue']?></td>
                        <td colspan="4"><?php echo $T_Record_AQL[2]['AQLValue']?></td>
                        <td colspan="3"><?php echo $T_Record_AQL[22]['AQLValue']?></td>
                        <td colspan="3"><?php echo $T_Record_AQL[21]['AQLValue']?></td>
                        <td colspan="2"><?php echo $T_Record_AQL[4]['AQLValue']?></td>
                        <td colspan="2"><?php echo $T_Record_AQL[6]['AQLValue']?></td>
                      </tr>

                      <tr>
                        <th scope="col" class="info">Acceptance:</th>
                        <td colspan="2"><?php echo $T_Record_AQL[1]['AQLValue']?></td>
                        <td colspan="4"><?php echo $T_Record_AQL[3]['AQLValue']?></td>
                        <td colspan="3"><?php echo $T_Record_AQL[20]['AQLValue']?></td>
                        <td colspan="3"><?php echo $T_Record_AQL[19]['AQLValue']?></td>
                        <td colspan="2"><?php echo $T_Record_AQL[5]['AQLValue']?></td>
                        <td colspan="2"><?php echo $T_Record_AQL[7]['AQLValue']?></td>
                      </tr>

                      <tr>
                        <th rowspan="12" scope="col" class="info"> Defect</th>

                        <!------------ MINOR VIS L1 ------------------------------------>

                        <td>DB:
                          <b><font color="red"><?php echo $defectResult_pivot['1']; ?></font></td>
                        <td>SD:
                          <b><font color="red"><?php echo $defectResult_pivot['2']; ?></font></td>


                        <!------------ MAJOR VIS L1 ------------------------------------>

                        <td>CA:
                          <b><font color="red"><?php echo $defectResult_pivot['4']; ?></font></td>
                        <td>CL:
                          <b><font color="red"><?php echo $defectResult_pivot['5']; ?></font></td>
                        <td>CLD:
                          <b><font color="red"><?php echo $defectResult_pivot['6']; ?></font></td>
                        <td>CS:
                          <b><font color="red"><?php echo $defectResult_pivot['7']; ?></font></td>



                        <!------------ CRITICAL NAG L1 ------------------------------------->

                        <td>BPC:
                          <b><font color="red"><?php echo $defectResult_pivot['51']; ?></font></td>
                        <td>CR:
                          <b><font color="red"><?php echo $defectResult_pivot['52']; ?></font></td>
                        <td>DC:
                          <b><font color="red"><?php echo $defectResult_pivot['53']; ?></font></td>


                        <!------------ DEF NFG L1 ------------------------------------->
                        <td>CH:
                          <b><font color="red"><?php echo $defectResult_pivot['68']; ?></font></td>
                        <td>FK:
                          <b><font color="red"><?php echo $defectResult_pivot['69']; ?></font></td>
                        <td>MF:
                          <b><font color="red"><?php echo $defectResult_pivot['70']; ?></font></td>




                        <!------------ DEF HOLES 2 L1 ----------------------------------->
                        <td>BF:
                          <b><font color="red"><?php echo $defectResult_pivot['77']; ?></font></td>
                        <td>CF:
                          <b><font color="red"><?php echo $defectResult_pivot['78']; ?></font></td>


                        <!------------ DEF HOLES 3 L1 ----------------------------------->
                        <td>BF:
                          <b><font color="red"><?php echo $defectResult_pivot['88']; ?></font></td>
                        <td>CF:
                          <b><font color="red"><?php echo $defectResult_pivot['89']; ?></font></td>

                      </tr>

                      <tr>

                        <!------------ MINOR VIS L2 ----------------------------------->
                        <td>SP:
                          <b><font color="red"><?php echo $defectResult_pivot['3']; ?></font></td>
                        <td>STNs:
                          <b><font color="red"><?php echo $defectResult_pivot['158']; ?></font></td>


                        <!------------ MAJOR VIS L2 ---------------------------------->

                        <td>DF:
                          <b><font color="red"><?php echo $defectResult_pivot['8']; ?></font></td>
                        <td>DT:
                          <b><font color="red"><?php echo $defectResult_pivot['9']; ?></font></td>
                        <td>EFI:
                          <b><font color="red"><?php echo $defectResult_pivot['10']; ?></font></td>
                        <td>FM:
                          <b><font color="red"><?php echo $defectResult_pivot['11']; ?></font></td>


                        <!------------ CRITICAL NAG L2 ---------------------------------->
                        <td>DD:
                          <b><font color="red"><?php echo $defectResult_pivot['54']; ?></font></td>
                        <td>DIS:
                          <b><font color="red"><?php echo $defectResult_pivot['55']; ?></font></td>
                        <td>FMT:
                          <b><font color="red"><?php echo $defectResult_pivot['56']; ?></font></td>


                        <!------------ DEF NFG L2 ---------------------------------->

                        <td>TAH:
                          <b><font color="red"><?php echo $defectResult_pivot['71']; ?></font></td>
                        <td>TH:
                          <b><font color="red"><?php echo $defectResult_pivot['72']; ?></font></td>
                        <td>TR:
                          <b><font color="red"><?php echo $defectResult_pivot['73']; ?></font></td>


                        <!------------ DEF HOLES 2 L2 ---------------------------------->
                        <td>CHs:
                          <b><font color="red"><?php echo $defectResult_pivot['79']; ?></font></td>
                        <td>FKs:
                          <b><font color="red"><?php echo $defectResult_pivot['80']; ?></font></td>


                        <!------------ DEF HOLES 3 L2 ---------------------------------->
                        <td>CHs:
                          <b><font color="red"><?php echo $defectResult_pivot['90']; ?></font></td>
                        <td>FKs:
                          <b><font color="red"><?php echo $defectResult_pivot['91']; ?></font></td>

                      </tr>

                      <tr>

                        <!------------ MINOR VIS L3 -------------------------------------->
                        <td>SLDs:
                          <b><font color="red"><?php echo $defectResult_pivot['160']; ?></font></td>
                        <td>Ls:
                          <b><font color="red"><?php echo $defectResult_pivot['161']; ?></font></td>



                        <!------------ MAJOR VIS L3 -------------------------------------->

                        <td>FNO:
                          <b><font color="red"><?php echo $defectResult_pivot['12']; ?></font></td>
                        <td>FO:
                          <b><font color="red"><?php echo $defectResult_pivot['13']; ?></font></td>
                        <td>GNO:
                          <b><font color="red"><?php echo $defectResult_pivot['14']; ?></font></td>
                        <td>IB:
                          <b><font color="red"><?php echo $defectResult_pivot['15']; ?></font></td>

                        <!------------ CRITICAL NAG  L3 --------------------------------------->

                        <td>GL:
                          <b><font color="red"><?php echo $defectResult_pivot['57']; ?></font></td>
                        <td>L:
                          <b><font color="red"><?php echo $defectResult_pivot['58']; ?></font></td>
                        <td>MP:
                          <b><font color="red"><?php echo $defectResult_pivot['59']; ?></font></td>



                        <!------------ CRITICAL NFG L3 ------------------------------------->

                        <td>GSH:
                          <b><font color="red"><?php echo $defectResult_pivot['148']; ?></font></td>
                        <td></td>
                        <td></td>


                        <!------------ DEF HOLES 1 L3 ------------------------------------>

                        <td>FT:
                          <b><font color="red"><?php echo $defectResult_pivot['81']; ?></font></td>
                        <td>GB:
                          <b><font color="red"><?php echo $defectResult_pivot['82']; ?></font></td>


                        <!------------ DEF HOLES 2 L3 ------------------------------------->
                        <td>FT:
                          <b><font color="red"><?php echo $defectResult_pivot['92']; ?></font></td>
                        <td>GB:
                          <b><font color="red"><?php echo $defectResult_pivot['93']; ?></font></td>

                      </tr>

                      <tr>

                        <td></td>
                        <td></td>

                        <!------------ MAJOR VIS L4 ---------------------------------------->

                        <td>ICT:
                          <b><font color="red"><?php echo $defectResult_pivot['16']; ?></font></td>
                        <td>L:
                          <b><font color="red"><?php echo $defectResult_pivot['17']; ?></font></td>
                        <td>LS:
                          <b><font color="red"><?php echo $defectResult_pivot['18']; ?></font></td>
                        <td>PLM:
                          <b><font color="red"><?php echo $defectResult_pivot['19']; ?></font></td>



                        <!------------ CRITICAL NAG L4 ------------------------------------------>

                        <td>NB:
                          <b><font color="red"><?php echo $defectResult_pivot['60']; ?></font></td>
                        <td>NF:
                          <b><font color="red"><?php echo $defectResult_pivot['61']; ?></font></td>
                        <td>PGM:
                          <b><font color="red"><?php echo $defectResult_pivot['62']; ?></font></td>


                        <!------------ CRITICAL NFG L4 ---------------------------------------->
                        <td></td>
                        <td></td>
                        <td></td>


                        <!------------ DEF HOLES 1 L4 ----------------------------------------->

                        <td>P:
                          <b><font color="red"><?php echo $defectResult_pivot['83']; ?></font></td>
                        <td>SF:
                          <b><font color="red"><?php echo $defectResult_pivot['84']; ?></font></td>


                        <!------------ DEF HOLES 2 L4 ----------------->
                        <td>P:
                          <b><font color="red"><?php echo $defectResult_pivot['94']; ?></font></td>
                        <td>SF:
                          <b><font color="red"><?php echo $defectResult_pivot['95']; ?></font></td>


                        </tr>

                      <tr>

                        <td></td>
                        <td></td>


                        <!------------ MAJOR VIS L5 ---------------------------------------->

                        <td>PMI:
                          <b><font color="red"><?php echo $defectResult_pivot['20']; ?></font></td>
                        <td>PMO:
                          <b><font color="red"><?php echo $defectResult_pivot['21']; ?></font></td>
                        <td>RC:
                          <b><font color="red"><?php echo $defectResult_pivot['22']; ?></font></td>
                        <td>RM:
                          <b><font color="red"><?php echo $defectResult_pivot['23']; ?></font></td>


                        <!------------ CRITICAL NAG L5 ---------------------------------------->

                        <td>SDG:
                          <b><font color="red"><?php echo $defectResult_pivot['63']; ?></font></td>
                        <td>TW:
                          <b><font color="red"><?php echo $defectResult_pivot['64']; ?></font></td>
                        <td>URD:
                          <b><font color="red"><?php echo $defectResult_pivot['65']; ?></font></td>


                        <!------------ CRITICAL NFG L5 ---------------------------------------->
                        <td></td>
                        <td></td>
                        <td></td>


                        <!------------ DEF HOLES 1 L5 ---------------------------------------->
                        <td>TAHs:
                          <b><font color="red"><?php echo $defectResult_pivot['85']; ?></font></td>
                        <td>THs:
                          <b><font color="red"><?php echo $defectResult_pivot['86']; ?></font></td>

                        <!------------ DEF HOLES 2 L5 ---------------------------------------->
                        <td>TAHs:
                          <b><font color="red"><?php echo $defectResult_pivot['96']; ?></font></td>
                        <td>THs:
                          <b><font color="red"><?php echo $defectResult_pivot['97']; ?></font></td>

                      </tr>

                      <tr>

                      <td></td>

                      <td></td>


                        <!------------ MAJOR VIS L6 ---------------------------------------->
                        <td>SAG:
                          <b><font color="red"><?php echo $defectResult_pivot['24']; ?></font></td>
                        <td>SG:
                          <b><font color="red"><?php echo $defectResult_pivot['25']; ?></font></td>
                        <td>SHN:
                          <b><font color="red"><?php echo $defectResult_pivot['26']; ?></font></td>
                        <td>SI:
                          <b><font color="red"><?php echo $defectResult_pivot['27']; ?></font></td>



                        <!------------ CRITICAL NAG L6 ---------------------------------------->

                        <td>WE:
                          <b><font color="red"><?php echo $defectResult_pivot['66']; ?></font></td>
                        <td>WG:
                          <b><font color="red"><?php echo $defectResult_pivot['67']; ?></font></td>
                        <td>MS:
                          <b><font color="red"><?php echo $defectResult_pivot['147']; ?></font></td>


                        <!------------ CRITICAL NFG L6 ---------------------------------------->
                        <td></td>
                        <td></td>
                        <td></td>



                        <!------------ DEF HOLES 1 L6 ---------------------------------------->
                        <td>TRs:
                          <b><font color="red"><?php echo $defectResult_pivot['87']; ?></font></td>
                        <td>L:
                          <b><font color="red"><?php echo $defectResult_pivot['143']; ?></font></td>


                        <!------------ DEF HOLES 2 L6 ---------------------------------------->
                        <td>TRs:
                          <b><font color="red"><?php echo $defectResult_pivot['98']; ?></font></td>
                        <td>L:
                          <b><font color="red"><?php echo $defectResult_pivot['144']; ?></font></td>

                      </tr>

                      <tr>
                        <td></td>
                        <td></td>

                        <!------------ MAJOR VIS L7 ---------------------------------------->

                        <td>SKV:
                          <b><font color="red"><?php echo $defectResult_pivot['28']; ?></font></td>
                        <td>SLD:
                          <b><font color="red"><?php echo $defectResult_pivot['29']; ?></font></td>
                        <td>SO:
                          <b><font color="red"><?php echo $defectResult_pivot['30']; ?></font></td>
                        <td>STK:
                          <b><font color="red"><?php echo $defectResult_pivot['31']; ?></font></td>



                        <!------------ CRITICAL NAG L7 ---------------------------------------->
                        <td>PFK:
                          <b><font color="red"><?php echo $defectResult_pivot['149']; }?></font></td>
                        <td>MG:
                          <b><font color="red"><?php echo $defectResult_pivot['162']; }?></font></td>
                        <td></td>


                        <!------------ CRITICAL NFG L7 ---------------------------------------->
                        <td></td>
                        <td></td>
                        <td></td>


                        <!------------ DEF HOLE 1 L7 ---------------------------------------->

                        <td>LH:
                          <b><font color="red"><?php echo $defectResult_pivot['150']; ?></font></td>
                        <td>MH:
                          <b><font color="red"><?php echo $defectResult_pivot['155']; ?></font></td>


                        <!------------ DEF HOLE 2 L7 ---------------------------------------->

                        <td>LH:
                          <b><font color="red"><?php echo $defectResult_pivot['151']; ?></font></td>
                        <td>MH:
                          <b><font color="red"><?php echo $defectResult_pivot['156']; ?></font></td>


                      </tr>

                      <tr>

                        <td></td>
                        <td></td>

                        <!------------ MAJOR VIS L8 ---------------------------------------->

                        <td>STN:
                          <b><font color="red"><?php echo $defectResult_pivot['32']; ?></font></td>
                        <td>TA:
                          <b><font color="red"><?php echo $defectResult_pivot['33']; ?></font></td>
                        <td>TS:
                          <b><font color="red"><?php echo $defectResult_pivot['34']; ?></font></td>
                        <td>UNF:
                          <b><font color="red"><?php echo $defectResult_pivot['35']; ?></font></td>


                        <!------------ CRITICAL NAG L8 ---------------------------------------->
                        <td>ICP:
                          <b><font color="red"><?php echo $defectResult_pivot['74']; ?></font></td>
                        <td>NP:
                          <b><font color="red"><?php echo $defectResult_pivot['75']; ?></font></td>
                        <td>WP:
                          <b><font color="red"><?php echo $defectResult_pivot['76']; ?></font></td>


                        <td></td>
                        <td></td>
                        <td></td>

                        <td></td>
                        <td></td>

                        <td></td>
                        <td></td>


                      </tr>

                      <tr>

                        <td></td>
                        <td></td>

                        <!------------ MAJOR VIS L9 ---------------------------------------->
                        <td>WL:
                          <b><font color="red"><?php echo $defectResult_pivot['36']; ?></font></td>
                        <td>WSI:
                          <b><font color="red"><?php echo $defectResult_pivot['37']; ?></font></td>
                        <td>WSO:
                          <b><font color="red"><?php echo $defectResult_pivot['38']; ?></font></td>
                        <td>GF:
                          <b><font color="red"><?php echo $defectResult_pivot['146']; ?></font></td>


                        <!------------ CRITICAL L9 ---------------------------------------->

                        <td></td>
                        <td></td>
                        <td></td>

                        <td></td>
                        <td></td>
                        <td></td>

                        <td></td>
                        <td></td>

                        <td></td>
                        <td></td>
                      </tr>

                      <tr>
                        <!------------ MINOR VIS L10 ---------------------------------------->
                        <td></td>
                        <td></td>

                        <!------------ MAJOR VIS L10 ---------------------------------------->

                        <td>BP:
                          <b><font color="red"><?php echo $defectResult_pivot['40']; ?></font></td>
                        <td>DP:
                          <b><font color="red"><?php echo $defectResult_pivot['41']; ?></font></td>
                        <td>DSP:
                          <b><font color="red"><?php echo $defectResult_pivot['42']; ?></font></td>
                        <td>DTP:
                          <b><font color="red"><?php echo $defectResult_pivot['43']; ?></font></td>


                        <!------------ CRITICAL L10 ---------------------------------------->

                        <td></td>
                        <td></td>
                        <td></td>

                        <td></td>
                        <td></td>
                        <td></td>

                        <td></td>
                        <td></td>

                        <td></td>
                        <td></td>


                      </tr>

                      <tr>
                        <!------------ MINOR VIS L11 ---------------------------------------->
                        <td></td>
                        <td></td>

                        <!------------ MAJOR VIS L11 ---------------------------------------->

                        <td>IA:
                          <b><font color="red"><?php echo $defectResult_pivot['44']; ?></font></td>
                        <td>IFS:
                          <b><font color="red"><?php echo $defectResult_pivot['45']; ?></font></td>
                        <td>IP:
                          <b><font color="red"><?php echo $defectResult_pivot['46']; ?></font></td>
                        <td>OP:
                          <b><font color="red"><?php echo $defectResult_pivot['47']; ?></font></td>


                        <!------------ CRITICAL L11 ---------------------------------------->
                        <td></td>
                        <td></td>
                        <td></td>
                        <!------------ HOLES1 L10 ---------------------------------------->
                        <td></td>
                        <td></td>
                        <td></td>
                        <!------------ HOLES2 L10 ---------------------------------------->
                        <td></td>
                        <td></td>
                        <!------------ HOLES3 L10 ---------------------------------------->
                        <td></td>
                        <td></td>
                      </tr>


                      <tr>
                        <td></td>
                        <td></td>

                        <!------------ MAJOR VIS L12 ---------------------------------------->

                        <td>RP:
                          <b><font color="red"><?php echo $defectResult_pivot['48']; ?></font></td>
                        <td>SH:
                          <b><font color="red"><?php echo $defectResult_pivot['49']; ?></font></td>
                        <td>SMP:
                          <b><font color="red"><?php echo $defectResult_pivot['50']; ?></font></td>
                        <td></td>

                        <!------------ CRITICAL L12 ---------------------------------------->
                        <td></td>
                        <td></td>
                        <td></td>
                        <!------------ HOLES1 L10 ---------------------------------------->
                        <td></td>
                        <td></td>
                        <td></td>
                        <!------------ HOLES2 L10 ---------------------------------------->
                        <td></td>
                        <td></td>
                        <!------------ HOLES3 L10 ---------------------------------------->
                        <td></td>
                        <td></td>
                      </tr>


                      <tr>


                        <th scope="col" class="info">Total defect</th>

                        <?php
                        $sum1 = 0;
                          $sum1 += $defectResult_pivot['1'];
                          $sum1 += $defectResult_pivot['2'];
                          $sum1 += $defectResult_pivot['3'];
                          $sum1 += $defectResult_pivot['158'];
                          $sum1 += $defectResult_pivot['160'];
                          $sum1 += $defectResult_pivot['161'];

                        $_SESSION['total_minor'] = $sum1;

                        ?>

                        <td colspan="2"><input class="form-control" name="total_minor" value="<?php echo $sum1; ?>" disabled></td>

                        <?php
                        $sum2 = 0;
                          $sum2 += $defectResult_pivot['4'];
                          $sum2 += $defectResult_pivot['5'];
                          $sum2 += $defectResult_pivot['6'];
                          $sum2 += $defectResult_pivot['7'];
                          $sum2 += $defectResult_pivot['8'];
                          $sum2 += $defectResult_pivot['9'];
                          $sum2 += $defectResult_pivot['10'];
                          $sum2 += $defectResult_pivot['11'];
                          $sum2 += $defectResult_pivot['12'];
                          $sum2 += $defectResult_pivot['13'];
                          $sum2 += $defectResult_pivot['14'];
                          $sum2 += $defectResult_pivot['15'];
                          $sum2 += $defectResult_pivot['16'];
                          $sum2 += $defectResult_pivot['17'];
                          $sum2 += $defectResult_pivot['18'];
                          $sum2 += $defectResult_pivot['19'];
                          $sum2 += $defectResult_pivot['20'];
                          $sum2 += $defectResult_pivot['21'];
                          $sum2 += $defectResult_pivot['22'];
                          $sum2 += $defectResult_pivot['23'];
                          $sum2 += $defectResult_pivot['24'];
                          $sum2 += $defectResult_pivot['25'];
                          $sum2 += $defectResult_pivot['26'];
                          $sum2 += $defectResult_pivot['27'];
                          $sum2 += $defectResult_pivot['28'];
                          $sum2 += $defectResult_pivot['29'];
                          $sum2 += $defectResult_pivot['30'];
                          $sum2 += $defectResult_pivot['31'];
                          $sum2 += $defectResult_pivot['32'];
                          $sum2 += $defectResult_pivot['33'];
                          $sum2 += $defectResult_pivot['34'];
                          $sum2 += $defectResult_pivot['35'];
                          $sum2 += $defectResult_pivot['36'];
                          $sum2 += $defectResult_pivot['37'];
                          $sum2 += $defectResult_pivot['38'];
                          $sum2 += $defectResult_pivot['40'];
                          $sum2 += $defectResult_pivot['41'];
                          $sum2 += $defectResult_pivot['42'];
                          $sum2 += $defectResult_pivot['43'];
                          $sum2 += $defectResult_pivot['44'];
                          $sum2 += $defectResult_pivot['45'];
                          $sum2 += $defectResult_pivot['46'];
                          $sum2 += $defectResult_pivot['47'];
                          $sum2 += $defectResult_pivot['48'];
                          $sum2 += $defectResult_pivot['49'];
                          $sum2 += $defectResult_pivot['50'];
                          $sum2 += $defectResult_pivot['146'];

                        $_SESSION['total_major'] = $sum2;
                        ?>

                        <td colspan="4"><input class="form-control" name="total_major" value="<?php echo $sum2; ?>" disabled></td>

                        <?php
                        $sum3 = 0;
                          $sum3 += $defectResult_pivot['51'];
                          $sum3 += $defectResult_pivot['52'];
                          $sum3 += $defectResult_pivot['53'];
                          $sum3 += $defectResult_pivot['54'];
                          $sum3 += $defectResult_pivot['55'];
                          $sum3 += $defectResult_pivot['56'];
                          $sum3 += $defectResult_pivot['57'];
                          $sum3 += $defectResult_pivot['58'];
                          $sum3 += $defectResult_pivot['59'];
                          $sum3 += $defectResult_pivot['60'];
                          $sum3 += $defectResult_pivot['61'];
                          $sum3 += $defectResult_pivot['62'];
                          $sum3 += $defectResult_pivot['63'];
                          $sum3 += $defectResult_pivot['64'];
                          $sum3 += $defectResult_pivot['65'];
                          $sum3 += $defectResult_pivot['66'];
                          $sum3 += $defectResult_pivot['67'];
                          $sum3 += $defectResult_pivot['74'];
                          $sum3 += $defectResult_pivot['75'];
                          $sum3 += $defectResult_pivot['76'];
                          $sum3 += $defectResult_pivot['147'];
                          $sum3 += $defectResult_pivot['149'];
                          $sum3 += $defectResult_pivot['162'];

                          $_SESSION['total_critical_nag'] = $sum3;

                        ?>


                        <td colspan="3"><input class="form-control" name="critical_nag" value="<?php echo $sum3; ?>" disabled></td>


                        <?php
                        $sum4 = 0;
                          $sum4 += $defectResult_pivot['68'];
                          $sum4 += $defectResult_pivot['69'];
                          $sum4 += $defectResult_pivot['70'];
                          $sum4 += $defectResult_pivot['71'];
                          $sum4 += $defectResult_pivot['72'];
                          $sum4 += $defectResult_pivot['73'];
                          $sum4 += $defectResult_pivot['148'];

                          $_SESSION['total_critical_nfg'] = $sum4;
                        ?>


                        <td colspan="3"><input class="form-control" name="critical_nfg" value="<?php echo $sum4; ?>" disabled></td>

                        <?php
                        $sum5 = 0;
                          $sum5 += $defectResult_pivot['77'];
                          $sum5 += $defectResult_pivot['78'];
                          $sum5 += $defectResult_pivot['79'];
                          $sum5 += $defectResult_pivot['80'];
                          $sum5 += $defectResult_pivot['81'];
                          $sum5 += $defectResult_pivot['82'];
                          $sum5 += $defectResult_pivot['83'];
                          $sum5 += $defectResult_pivot['84'];
                          $sum5 += $defectResult_pivot['85'];
                          $sum5 += $defectResult_pivot['86'];
                          $sum5 += $defectResult_pivot['87'];
                          $sum5 += $defectResult_pivot['143'];
                          $sum5 += $defectResult_pivot['150'];
                          $sum5 += $defectResult_pivot['155'];

                          $_SESSION['total_holes1'] = $sum5;
                        ?>

                        <td colspan="2"><input class="form-control" name="total_holes1" value="<?php echo $sum5; ?>" disabled></td>

                        <?php
                        $sum6 = 0;
                          $sum6 += $defectResult_pivot['88'];
                          $sum6 += $defectResult_pivot['89'];
                          $sum6 += $defectResult_pivot['90'];
                          $sum6 += $defectResult_pivot['91'];
                          $sum6 += $defectResult_pivot['92'];
                          $sum6 += $defectResult_pivot['93'];
                          $sum6 += $defectResult_pivot['94'];
                          $sum6 += $defectResult_pivot['95'];
                          $sum6 += $defectResult_pivot['96'];
                          $sum6 += $defectResult_pivot['97'];
                          $sum6 += $defectResult_pivot['98'];
                          $sum6 += $defectResult_pivot['144'];
                          $sum6 += $defectResult_pivot['151'];
                          $sum6 += $defectResult_pivot['156'];

                          $_SESSION['total_holes2'] = $sum6;
                        ?>

                        <td colspan="2"><input class="form-control" name="total_holes2" value="<?php echo $sum6; ?>" disabled></td>

                      </tr>

                      <?php
                      $grandTotal = $sum1 + $sum2 + $sum3 + $sum4 + $sum5 + $sum6;

                      ?>
                      <tr>
                        <th scope="col" class="info">Grand Total Defect</th>
                        <td colspan="16">
                          <input class="form-control" name="grand_total" value="<?php echo $grandTotal; ?>" disabled>
                        </td>
                      </tr>
                    </table>

                    <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                      <?php
                        $TotalBarier =  $sum4 + $sum5 + $sum6;
                      ?>
                      <tr>
                        <th scope="col" class="info">Total Barrier:</th>

                        <td><input class="form-control" name="total_holes" value="<?php echo $TotalBarier; ?>" disabled></td>


                        <th scope="col" class="info">Overall AQL:</th>

                        <td><input class="form-control" name="overall_AQL" value="<?php echo $T_Record_AQL[8]['AQLValue']?>" disabled></td>

                        <th scope="col" class="info">UD Disposition:</th>
                        <td><input class="form-control" name="UD_disposition" value="<?php echo $T_Record_UDResult[0]['UDResultCode'];?>" disabled></td>
                      </tr>
                    </table>

                    <td><b>*Product Packaging Inspection (Surgical)</b></td>

                    <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                      <tr class="info"><br>
                        <th></th>
                        <th colspan="3">REGULATORY PACKAGING</th>
                        <th colspan="4">CRITICAL PACKAGING</th>
                        <th colspan="4">VISUAL PACKAGING</th>

                      </tr>

                      <tr>
                        <th scope="col" class="info">**AQL:</th>

                        <td colspan="3"><?php echo $T_Record_AQL[13]['AQLValue'];?></td>
                        <td colspan="4"><?php echo $T_Record_AQL[11]['AQLValue'];?></td>
                        <td colspan="4"><?php echo $T_Record_AQL[9]['AQLValue'];?></td>

                      </tr>

                      <tr>
                        <th scope="col" class="info">Acceptance:</th>
                        <td colspan="3"><?php echo $T_Record_AQL[14]['AQLValue'];?></td>
                        <td colspan="4"><?php echo $T_Record_AQL[12]['AQLValue'];?></td>
                        <td colspan="4"><?php echo $T_Record_AQL[10]['AQLValue'];?></td>

                      </tr>
                      <tr>

                        <th scope="col" class="info" rowspan="5"> Defect</th>

                        <!-------------- REGULATOR PACKAGING L1 -------------------------->
                        <td>WLN:
                          <b><font color="red"><?php if( 113 < count($T_Record_Defect)){ echo $T_Record_Defect[113]['DefectValue']; }?></font></td>
                        <td>WMD:
                          <b><font color="red"><?php if( 114 < count($T_Record_Defect)){ echo $T_Record_Defect[114]['DefectValue']; }?></font></td>
                        <td>WED:
                          <b><font color="red"><?php if( 112 < count($T_Record_Defect)){ echo $T_Record_Defect[112]['DefectValue']; }?></font></td>


                        <!----------------------------CRITICAL PACKAGING L1------------------>
                        <td>WQ:
                          <b><font color="red"><?php if( 133 < count($T_Record_Defect)){ echo $T_Record_Defect[133]['DefectValue']; }?></font></td>
                        <td>MS:
                          <b><font color="red"><?php if( 122 < count($T_Record_Defect)){ echo $T_Record_Defect[122]['DefectValue']; }?></font></td>
                        <td>MB:
                          <b><font color="red"><?php if( 119 < count($T_Record_Defect)){ echo $T_Record_Defect[119]['DefectValue']; }?></font></td>
                        <td>MLN:
                          <b><font color="red"><?php if( 120 < count($T_Record_Defect)){ echo $T_Record_Defect[120]['DefectValue']; }?></font></td>


                        <!------------ VISUAL PACKAGING L1 ------------------------------------->
                        <td>WT:
                          <b><font color="red"><?php if( 142 < count($T_Record_Defect)){ echo $T_Record_Defect[142]['DefectValue']; }?></font></td>
                        <td>CT:
                          <b><font color="red"><?php if( 135 < count($T_Record_Defect)){ echo $T_Record_Defect[135]['DefectValue']; }?></font></td>
                        <td>POP:
                          <b><font color="red"><?php if( 140 < count($T_Record_Defect)){ echo $T_Record_Defect[140]['DefectValue']; }?></font></td>
                        <td></td>
                      </tr>

                      <tr>

                        <!-------------- REGULATOR PACKAGING L2 -------------------------->
                        <td>WPC:
                          <b><font color="red"><?php if( 115 < count($T_Record_Defect)){ echo $T_Record_Defect[115]['DefectValue']; }?></font></td>
                        <td>MM:
                          <b><font color="red"><?php if( 111 < count($T_Record_Defect)){ echo $T_Record_Defect[111]['DefectValue']; }?></font></td>
                        <td>IP:
                          <b><font color="red"><?php if( 110 < count($T_Record_Defect)){ echo $T_Record_Defect[110]['DefectValue']; }?></font></td>

                        <!----------------------------CRITICAL PACKAGING L2------------------>
                        <td>WGS:
                          <b><font color="red"><?php if( 129 < count($T_Record_Defect)){ echo $T_Record_Defect[129]['DefectValue']; }?></font></td>
                        <td>WGT:
                          <b><font color="red"><?php if( 130 < count($T_Record_Defect)){ echo $T_Record_Defect[130]['DefectValue']; }?></font></td>
                        <td>WGA:
                          <b><font color="red"><?php if( 128 < count($T_Record_Defect)){ echo $T_Record_Defect[128]['DefectValue']; }?></font></td>
                        <td>OS:
                          <b><font color="red"><?php if( 124 < count($T_Record_Defect)){ echo $T_Record_Defect[124]['DefectValue']; }?></font></td>
                        <!------------ VISUAL PACKAGING L2 ------------------------------------->
                        <td>FG:
                          <b><font color="red"><?php if( 137 < count($T_Record_Defect)){ echo $T_Record_Defect[137]['DefectValue']; }?></font></td>
                        <td>PIS:
                          <b><font color="red"><?php if( 139 < count($T_Record_Defect)){ echo $T_Record_Defect[139]['DefectValue']; }?></font></td>
                        <td>MSA:
                          <b><font color="red"><?php if( 138 < count($T_Record_Defect)){ echo $T_Record_Defect[138]['DefectValue']; }?></font></td>
                        <td></td>
                      </tr>

                      <tr>

                        <!-------------- REGULATOR PACKAGING L3 -------------------------->

                        <td></td>
                        <td></td>
                        <td></td>



                        <!----------------------------CRITICAL PACKAGING L3------------------>
                        <td>WTS:
                          <b><font color="red"><?php if( 134 < count($T_Record_Defect)){ echo $T_Record_Defect[134]['DefectValue']; }?></font></td>
                        <td>PTS:
                          <b><font color="red"><?php if( 126 < count($T_Record_Defect)){ echo $T_Record_Defect[126]['DefectValue']; }?></font></td>
                        <td>WPO:
                          <b><font color="red"><?php if( 132 < count($T_Record_Defect)){ echo $T_Record_Defect[132]['DefectValue']; }?></font></td>
                        <td>DMG:
                          <b><font color="red"><?php if( 117 < count($T_Record_Defect)){ echo $T_Record_Defect[117]['DefectValue']; }?></font></td>
                        <!------------ VISUAL PACKAGING L3 ------------------------------------->

                        <td>WIS:
                          <b><font color="red"><?php if( 141 < count($T_Record_Defect)){ echo $T_Record_Defect[141]['DefectValue']; }?></font></td>
                        <td>DT:
                          <b><font color="red"><?php if( 136 < count($T_Record_Defect)){ echo $T_Record_Defect[136]['DefectValue']; }?></font></td>
                        <td></td>
                        <td></td>
                      </tr>

                      <tr>
                        <!-------------- REGULATOR PACKAGING L4 -------------------------->

                        <td></td>
                        <td></td>
                        <td></td>

                        <!----------------------------CRITICAL PACKAGING L4 ------------------>
                        <td>MSG:
                          <b><font color="red"><?php if( 121 < count($T_Record_Defect)){ echo $T_Record_Defect[121]['DefectValue']; }?></font></td>
                        <td>FC:
                          <b><font color="red"><?php if( 118 < count($T_Record_Defect)){ echo $T_Record_Defect[118]['DefectValue']; }?></font></td>
                        <td>POS:
                          <b><font color="red"><?php if( 125 < count($T_Record_Defect)){ echo $T_Record_Defect[125]['DefectValue']; }?></font></td>
                        <td>BC:
                          <b><font color="red"><?php if( 116 < count($T_Record_Defect)){ echo $T_Record_Defect[116]['DefectValue']; }?></font></td>
                        <!------------ VISUAL PACKAGING L4 ------------------------------------->
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>

                      <tr>
                        <!-------------- REGULATOR PACKAGING L5 -------------------------->

                        <td></td>
                        <td></td>
                        <td></td>

                        <!----------------------------CRITICAL PACKAGING L5 ------------------>
                        <td>WPD:
                          <b><font color="red"><?php if( 131 < count($T_Record_Defect)){ echo $T_Record_Defect[131]['DefectValue']; }?></font></td>
                        <td>MSI:
                          <b><font color="red"><?php if( 123 < count($T_Record_Defect)){ echo $T_Record_Defect[123]['DefectValue']; }?></font></td>
                        <td>TRP:
                          <b><font color="red"><?php if( 127 < count($T_Record_Defect)){ echo $T_Record_Defect[127]['DefectValue']; }?></font></td>
                        <td></td>


                        <!------------ VISUAL PACKAGING L5 ------------------------------------->
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>

                      <tr>
                        <?php

                        ?>
                        <th scope="col" class="info">Result</th>

                        <td colspan="3"><input class="form-control" name="Result_Regulatory" value="<?php echo $T_Record_AQL[17]['AQLValue'];?>" disabled></td>
                        <td colspan="4"><input class="form-control" name="Result_Critical" value="<?php echo $T_Record_AQL[16]['AQLValue'];?>" disabled></td>
                        <td colspan="4"><input class="form-control" name="Result_Visual" value="<?php echo $T_Record_AQL[15]['AQLValue'];?>" disabled></td>

                      </tr>
                    </table>

                    <table class="table table-bordered" id="dataTable" width="30%" cellspacing="0">
                      <tr>
                        <th scope="col" class="info">Final Disposition:</th>


                        <td><input class="form-control" name="final_disposition" value="<?php echo $T_Record_AQL[18]['AQLValue'];?>" disabled></td>

                      </tr>
                    </table>

                    <div class="form-group">
                        Verified By:<label><?php echo $T_Record_Master['VerifierID'];?></label>
                      </div>

                      <div class="form-group">
                        <?php $date2 = date("d/m/Y h:i:s A", strtotime($T_Record_Master['VerifiedDate'])); ?>
                        Date:<label><?php echo $date2;?></label>
                      </div>

          						  <center><a class = "btn btn-primary" href = "tables_FG.php" > Back</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <a class = "btn btn-success" target="_blank" href = "formqrex_editSFG.php?LotIDKey=<?php echo $lotID;?>&RecordID=<?php echo $RecordID;?>" > Update/Verify</a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a class = "btn btn-warning" target="_blank" href = "reinspection_SFG.php?LotIDKey=<?php echo $lotID;?>&RecordID=<?php echo $RecordID;?>" > Reinspec</a>&nbsp;&nbsp;
                        <a target="" href="#" role="button" class="btn btn-primary" title="Print" onClick="window.print()"><i class = "glyphicon glyphicon-print"></i>&nbsp;Print</a></center><br><br>
                                       </form>
 									</div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">




                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->


        </div>
        <!-- /#page-wrapper -->
		</div>
	</div>

	<br />
	<br />

	<div style = "text-align:center; margin-right:10px;" class = "navbar navbar-default navbar-fixed-bottom">
		<label>Copyright © 2021 by QA PQC SQUAD</label>
	</div>
</body>

</html>
