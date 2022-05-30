<?php


  function updateLot($connect, $tableName, $lotID, $columnVal, $identifier ){

    $stmt = $connect->prepare("{CALL SP_UpdateLot(?,?,?,?)}");
    $stmt->bindParam(1, $tableName);
    $stmt->bindParam(2, $lotID);
    $stmt->bindParam(3, $columnVal);
    $stmt->bindParam(4, $identifier);

    if($stmt->execute()){
      echo '<script>
      console.log("'.$tableName.' has been updated.");
      </script>';
    }

  }

  function updateRecord($connect, $tableName, $recordID, $columnVal, $identifier ){

    $stmt = $connect->prepare("{CALL SP_UpdateRecord(?,?,?,?)}");
    $stmt->bindParam(1, $tableName);
    $stmt->bindParam(2, $recordID);
    $stmt->bindParam(3, $columnVal);
    $stmt->bindParam(4, $identifier);

    if($stmt->execute()){
      echo '<script>
      console.log("'.$tableName.' has been updated.");
      </script>';
    }

  }

        if (isset($_POST['submit']))
        {
          $Plant                  = $_POST['PlantKey'];
          $RecordCreatedDateTime  = date('Y-m-d H:i:s', strtotime(str_replace("/","-",$_POST['RecordCreatedDateTime'])));
          $BatchNumber            = $_POST['BatchNumber'];
          $SONumber               = $_POST['SONumber'];
          $ItemNumber             = $_POST['SOItemNumber'];
          $InspectionPlan         = $_POST['InspectionPlanKey'];
          $GloveSize              = $_POST['GloveSizeCodeLong'];
          $PalletNumber           = $_POST['PalletNumber'];
          $InspectionCount        = $_POST['InspectionCount'];
          $CartonQuantity         = $_POST['CartonQuantity'];
          $palletID               = $_POST['PalletID'];
          $FGCondition            = $_POST['inspection_stage'];
          $CartonNum              = explode(",", $_POST['CartonNum']);
          $Customer               = $_POST['CustomerName'];
          $Brand                  = $_POST['BrandName'];
          $LotNumber              = $_POST['LotNumber'];
          $GloveProductType       = $_POST['GloveProductTypeName'];
          $GloveCode              = $_POST['GloveCodeLong'];
          $GloveColour            = $_POST['GloveColourCode'];
          $ProductionLineKey1     = $_POST['ProductionLineName1'];
          $ProductionLineKey2     = $_POST['ProductionLineName2'];
          $ProductionLineKey3     = $_POST['ProductionLineName3'];
          $ProductDate1           = date('Y-m-d H:i:s', strtotime(str_replace("/","-",$_POST['product_date1'])));
          $ProductDate2           = date('Y-m-d H:i:s', strtotime(str_replace("/","-",$_POST['product_date2'])));
          $ProductDate3           = date('Y-m-d H:i:s', strtotime(str_replace("/","-",$_POST['product_date3'])));
          $Shift1                 = $_POST['shift1'];
          $Shift2                 = $_POST['shift2'];
          $Shift3                 = $_POST['shift3'];
          $PackingDate            = $_POST['PackingDate'];
          $InspectionUserID       = $_POST['InspectionUserID'];
          $VerifierID              = $_POST['verify_by'];
          $VerifiedDate            = date('Y-m-d H:i:s', strtotime(str_replace("/","-",$_POST['date_verify'])));
          $RecordStatusFlag       = $_POST['RecordStatusFlag'];



          $ThicknessTestingMethod = $_REQUEST['method'];
          $WeighingScaleID    = $_REQUEST['InstrumentValue'];
          $RulerID            = $_REQUEST['InstrumentValue2'];
          $ThicknessGauge     = $_REQUEST['InstrumentValue3'];
          $GloveWeightTest    = $_REQUEST['TestValue'];
          $CountingTest       = $_REQUEST['TestValue2'];
          $PackagingDefectsTest = $_REQUEST['TestValue3'];
          $LayeringTest       = $_REQUEST['TestValue4'];
          $SmellTest          = $_REQUEST['TestValue5'];
          $GripTest           = $_REQUEST['TestValue6'];
          $DonningTearingTest = $_REQUEST['TestValue7'];
          $BlackClothTest     = $_REQUEST['TestValue8'];
          $StickingTest       = $_REQUEST['TestValue9'];
          $DispensingTest     = $_REQUEST['TestValue10'];
          $WhiteClothTest     = $_REQUEST['TestValue11'];
          $Test1Name          = $_REQUEST['TestValue12'];
          $Test2Name          = $_REQUEST['TestValue13'];
          $Test3Name          = $_REQUEST['TestValue14'];
          $Test4Name          = $_REQUEST['TestValue15'];
          $Test5Name          = $_REQUEST['TestValue16'];
          $DyeLeakTest        = $_REQUEST['TestValue17'];
          $SealingTest        = $_REQUEST['TestValue18'];
          $BurstTest          = $_REQUEST['TestValue19'];
          $VPA                = $_REQUEST['TestValue20'];

          $length1            = $_REQUEST['length1'];
          $length2            = $_REQUEST['length2'];
          $length3            = $_REQUEST['length3'];
          $length4            = $_REQUEST['length4'];
          $length5            = $_REQUEST['length5'];
          $length6            = $_REQUEST['length6'];
          $length7            = $_REQUEST['length7'];
          $length8            = $_REQUEST['length8'];
          $length9            = $_REQUEST['length9'];
          $length10           = $_REQUEST['length10'];
          $length11           = $_REQUEST['length11'];
          $length12           = $_REQUEST['length12'];
          $length13           = $_REQUEST['length13'];
          $length_p_f         = $_REQUEST['length_p_f'];

          $width1             = $_REQUEST['width1'];
          $width2             = $_REQUEST['width2'];
          $width3             = $_REQUEST['width3'];
          $width4             = $_REQUEST['width4'];
          $width5             = $_REQUEST['width5'];
          $width6             = $_REQUEST['width6'];
          $width7             = $_REQUEST['width7'];
          $width8             = $_REQUEST['width8'];
          $width9             = $_REQUEST['width9'];
          $width10            = $_REQUEST['width10'];
          $width11            = $_REQUEST['width11'];
          $width12            = $_REQUEST['width12'];
          $width13            = $_REQUEST['width13'];
          $width_p_f          = $_REQUEST['width_p_f'];

          $cuff1              = $_REQUEST['cuff1'];
          $cuff2              = $_REQUEST['cuff2'];
          $cuff3              = $_REQUEST['cuff3'];
          $cuff4              = $_REQUEST['cuff4'];
          $cuff5              = $_REQUEST['cuff5'];
          $cuff6              = $_REQUEST['cuff6'];
          $cuff7              = $_REQUEST['cuff7'];
          $cuff8              = $_REQUEST['cuff8'];
          $cuff9              = $_REQUEST['cuff9'];
          $cuff10             = $_REQUEST['cuff10'];
          $cuff11             = $_REQUEST['cuff11'];
          $cuff12             = $_REQUEST['cuff12'];
          $cuff13             = $_REQUEST['cuff13'];
          $cuff_p_f           = $_REQUEST['cuff_p_f'];

          $palm1              = $_REQUEST['palm1'];
          $palm2              = $_REQUEST['palm2'];
          $palm3              = $_REQUEST['palm3'];
          $palm4              = $_REQUEST['palm4'];
          $palm5              = $_REQUEST['palm5'];
          $palm6              = $_REQUEST['palm6'];
          $palm7              = $_REQUEST['palm7'];
          $palm8              = $_REQUEST['palm8'];
          $palm9              = $_REQUEST['palm9'];
          $palm10             = $_REQUEST['palm10'];
          $palm11             = $_REQUEST['palm11'];
          $palm12             = $_REQUEST['palm12'];
          $palm13             = $_REQUEST['palm13'];
          $palm_p_f           = $_REQUEST['palm_p_f'];

          $fingertip1         = $_REQUEST['fingertip1'];
          $fingertip2         = $_REQUEST['fingertip2'];
          $fingertip3         = $_REQUEST['fingertip3'];
          $fingertip4         = $_REQUEST['fingertip4'];
          $fingertip5         = $_REQUEST['fingertip5'];
          $fingertip6         = $_REQUEST['fingertip6'];
          $fingertip7         = $_REQUEST['fingertip7'];
          $fingertip8         = $_REQUEST['fingertip8'];
          $fingertip9         = $_REQUEST['fingertip9'];
          $fingertip10        = $_REQUEST['fingertip10'];
          $fingertip11        = $_REQUEST['fingertip11'];
          $fingertip12        = $_REQUEST['fingertip12'];
          $fingertip13        = $_REQUEST['fingertip13'];
          $fingertip_p_f      = $_REQUEST['fingertip_p_f'];

          $bead_diameter1     = $_REQUEST['bead_diameter1'];
          $bead_diameter2     = $_REQUEST['bead_diameter2'];
          $bead_diameter3     = $_REQUEST['bead_diameter3'];
          $bead_diameter4     = $_REQUEST['bead_diameter4'];
          $bead_diameter5     = $_REQUEST['bead_diameter5'];
          $bead_diameter6     = $_REQUEST['bead_diameter6'];
          $bead_diameter7     = $_REQUEST['bead_diameter7'];
          $bead_diameter8     = $_REQUEST['bead_diameter8'];
          $bead_diameter9     = $_REQUEST['bead_diameter9'];
          $bead_diameter10    = $_REQUEST['bead_diameter10'];
          $bead_diameter11    = $_REQUEST['bead_diameter11'];
          $bead_diameter12    = $_REQUEST['bead_diameter12'];
          $bead_diameter13    = $_REQUEST['bead_diameter13'];
          $bead_diameter_p_f  = $_REQUEST['bead_diameter_p_f'];

          $cuff_edge1         = $_REQUEST['cuff_edge1'];
          $cuff_edge2         = $_REQUEST['cuff_edge2'];
          $cuff_edge3         = $_REQUEST['cuff_edge3'];
          $cuff_edge4         = $_REQUEST['cuff_edge4'];
          $cuff_edge5         = $_REQUEST['cuff_edge5'];
          $cuff_edge6         = $_REQUEST['cuff_edge6'];
          $cuff_edge7         = $_REQUEST['cuff_edge7'];
          $cuff_edge8         = $_REQUEST['cuff_edge8'];
          $cuff_edge9         = $_REQUEST['cuff_edge9'];
          $cuff_edge10        = $_REQUEST['cuff_edge10'];
          $cuff_edge11        = $_REQUEST['cuff_edge11'];
          $cuff_edge12        = $_REQUEST['cuff_edge12'];
          $cuff_edge13        = $_REQUEST['cuff_edge13'];
          $cuff_edge_p_f      = $_REQUEST['cuff_edge_p_f'];

          $g_weight1          = $_REQUEST['g_weight1'];
          $g_weight2          = $_REQUEST['g_weight2'];
          $g_weight3          = $_REQUEST['g_weight3'];
          $g_weight4          = $_REQUEST['g_weight4'];
          $g_weight5          = $_REQUEST['g_weight5'];
          $g_weight6          = $_REQUEST['g_weight6'];
          $g_weight7          = $_REQUEST['g_weight7'];
          $g_weight8          = $_REQUEST['g_weight8'];
          $g_weight9          = $_REQUEST['g_weight9'];
          $g_weight10         = $_REQUEST['g_weight10'];
          $g_weight11         = $_REQUEST['g_weight11'];
          $g_weight12         = $_REQUEST['g_weight12'];
          $g_weight13         = $_REQUEST['g_weight13'];
          $g_weight_p_f       = $_REQUEST['g_weight_p_f'];

          $SRText1            = $_REQUEST['SRText1'];
          $SRText2            = $_REQUEST['SRText2'];
          $SRText3            = $_REQUEST['SRText3'];
          $SRText4            = $_REQUEST['SRText4'];
          $SRText5            = $_REQUEST['SRText5'];
          $SRText6            = $_REQUEST['SRText6'];
          $SRText7            = $_REQUEST['SRText7'];
          $SRText8            = $_REQUEST['SRText8'];
          $SRTextPackaging    = $_REQUEST['SRTextPackaging'];

          $machine_id         = $_REQUEST['machine_id'];
          $sample_size        = $_REQUEST['sample_size_vt'];
          $sample_size_apt    = $_REQUEST['sample_size_apt'];
          $sample_size_apt2   = $_REQUEST['sample_size_apt2'];
          $AQL_minor          = $_REQUEST['AQL_minor'];
          $AQL_major          = $_REQUEST['AQL_major'];
          $AQL_criticalNAG    = $_REQUEST['AQL_criticalNAG'];
          $AQL_criticalNFG    = $_REQUEST['AQL_criticalNFG'];
          $AQL_holes1         = $_REQUEST['AQL_holes1'];
          $AQL_holes2         = $_REQUEST['AQL_holes2'];

          $Acceptance_minor   = $_REQUEST['Acceptance_minor'];
          $Acceptance_major   = $_REQUEST['Acceptance_major'];
          $Acceptance_nag     = $_REQUEST['Acceptance_nag'];
          $Acceptance_nfg     = $_REQUEST['Acceptance_nfg'];
          $Acceptance_holes1  = $_REQUEST['Acceptance_holes1'];
          $Acceptance_holes2  = $_REQUEST['Acceptance_holes2'];

          $AQL_regulatoryPackaging        = $_REQUEST['AQL_regulatorypackaging'];
          $Acceptance_RegulatoryPackaging = $_REQUEST['Acceptance_regulatorypackaging'];
          $AQL_VisualPackaging            = $_REQUEST['AQL_visualpackaging'];
          $Acceptance_VisualPackaging     = $_REQUEST['Acceptance_majorpackaging'];
          $AQL_CriticalPackaging          = $_REQUEST['AQL_criticalpackaging'];
          $Acceptance_CriticalPackaging   = $_REQUEST['Acceptance_criticalpackaging'];

          $Result_RegulatoryPackaging   = $_REQUEST['Result_Regulatory'];
          $Result_CriticalPackaging   = $_REQUEST['Result_Critical'];
          $Result_VisualPackaging   = $_REQUEST['Result_Visual'];
          $Final_Disposition   = $_REQUEST['final_disposition'];
          $Total_holes    = $_REQUEST['total_holes'];
      //------------MINOR-------------------//
          $DB     = $_REQUEST['DB'];
          $SD     = $_REQUEST['SD'];
          $SP     = $_REQUEST['SP'];

      //------------MAJOR-------------------//
          $CA     = $_REQUEST['CA'];
          $CL     = $_REQUEST['CL'];
          $CLD    = $_REQUEST['CLD'];
          $CS     = $_REQUEST['CS'];
          $DF     = $_REQUEST['DF'];
          $DT     = $_REQUEST['DT'];
          $EFI    = $_REQUEST['EFI'];
          $FM     = $_REQUEST['FM'];
          $FNO    = $_REQUEST['FNO'];
          $FO     = $_REQUEST['FO'];
          $GNO    = $_REQUEST['GNO'];
          $IB     = $_REQUEST['IB'];
          $ICT    = $_REQUEST['ICT'];
          $L_Major      = $_REQUEST['L_Major'];
          $PMI    = $_REQUEST['PMI'];
          $PMO    = $_REQUEST['PMO'];
          $PLM    = $_REQUEST['PLM'];
          $RC     = $_REQUEST['RC'];
          $RM     = $_REQUEST['RM'];
          $SAG    = $_REQUEST['SAG'];
          $SG     = $_REQUEST['SG'];
          $SHN    = $_REQUEST['SHN'];
          $SI     = $_REQUEST['SI'];
          $SKV    = $_REQUEST['SKV'];
          $SLD    = $_REQUEST['SLD'];
          $SO     = $_REQUEST['SO'];
          $STK    = $_REQUEST['STK'];
          $STN    = $_REQUEST['STN'];
          $TA     = $_REQUEST['TA'];
          $TS     = $_REQUEST['TS'];
          $UNF    = $_REQUEST['UNF'];
          $WL     = $_REQUEST['WL'];
          $WSI    = $_REQUEST['WSI'];
          $WSO    = $_REQUEST['WSO'];
          $LS     = $_REQUEST['LS'];
      //-------------------------------//
          $BP     = $_REQUEST['BP'];
          $DP     = $_REQUEST['DP'];
          $DSP    = $_REQUEST['DSP'];
          $DTP    = $_REQUEST['DTP'];
          $IA     = $_REQUEST['IA'];
          $IFS    = $_REQUEST['IFS'];
          $IP_MAJOR     = $_REQUEST['IP_MAJOR'];
          $OP     = $_REQUEST['OP'];
          $RP     = $_REQUEST['RP'];
          $SH     = $_REQUEST['SH'];
          $SMP    = $_REQUEST['SMP'];
      //-------------CRITICAL------------------//
          $BPC    = $_REQUEST['BPC'];
          $CR     = $_REQUEST['CR'];
          $DC     = $_REQUEST['DC'];
          $DD     = $_REQUEST['DD'];
          $DIS    = $_REQUEST['DIS'];
          $FMT    = $_REQUEST['FMT'];
          $L       = $_REQUEST['L'];
          $GL     = $_REQUEST['GL'];
          $MP     = $_REQUEST['MP'];
          $NB     = $_REQUEST['NB'];
          $NF     = $_REQUEST['NF'];
          $TW     = $_REQUEST['TW'];
          $WE     = $_REQUEST['WE'];
          $WG     = $_REQUEST['WG'];
          $PGM     = $_REQUEST['PGM'];
          $SDG     = $_REQUEST['SDG'];
          $URD     = $_REQUEST['URD'];
      //-------------------------------//
          $CH     = $_REQUEST['CH'];
          $FK     = $_REQUEST['FK'];
          $TAH    = $_REQUEST['TAH'];
          $TR    = $_REQUEST['TR'];
          $TH     = $_REQUEST['TH'];
          $MF     = $_REQUEST['MF'];
      //-------------------------------//
          $ICP    = $_REQUEST['ICP'];
          $NP     = $_REQUEST['NP'];
          $WP     = $_REQUEST['WP'];
      //------------HOLES1-------------------//
          $BF     = $_REQUEST['BF'];
          $P      = $_REQUEST['P'];
          $CF     = $_REQUEST['CF'];
          $SF     = $_REQUEST['SF'];
          $TAHs   = $_REQUEST['TAHs'];
          $FKS    = $_REQUEST['FKS'];
          $THs    = $_REQUEST['THs'];
          $FT     = $_REQUEST['FT'];
          $TRS    = $_REQUEST['TRS'];
          $GB     = $_REQUEST['GB'];
          $CHs    = $_REQUEST['CHs'];
          $L_HOLES1    = $_REQUEST['L_HOLES1'];
      //--------------HOLES2-----------------//
          $BF_2   = $_REQUEST['BF_2'];
          $P_2    = $_REQUEST['P_2'];
          $CF_2   = $_REQUEST['CF_2'];
          $SF_2   = $_REQUEST['SF_2'];
          $TAHs_2 = $_REQUEST['TAHs_2'];
          $FKS_2  = $_REQUEST['FKS_2'];
          $THs_2  = $_REQUEST['THs_2'];
          $FT_2   = $_REQUEST['FT_2'];
          $TRS_2  = $_REQUEST['TRS_2'];
          $GB_2   = $_REQUEST['GB_2'];
          $CHs_2  = $_REQUEST['CHs_2'];
          $L_HOLES2    = $_REQUEST['L_HOLES2'];

      //-------------REGULATOR------------------//
          $WLN    = $_REQUEST['WLN'];
          $WPC    = $_REQUEST['WPC'];
          $WMD    = $_REQUEST['WMD'];
          $MM     = $_REQUEST['MM'];
          $WED    = $_REQUEST['WED'];
          $IP     = $_REQUEST['IP'];
      //-------------CRITICAL PACKAGING------------------//
          $WQ     = $_REQUEST['WQ'];
          $WGS    = $_REQUEST['WGS'];
          $WTS    = $_REQUEST['WTS'];
          $MSG    = $_REQUEST['MSG'];
          $WPD    = $_REQUEST['WPD'];
          $MS     = $_REQUEST['MS'];
          $WGT    = $_REQUEST['WGT'];
          $PTS    = $_REQUEST['PTS'];
          $FC     = $_REQUEST['FC'];
          $MSI    = $_REQUEST['MSI'];
          $MB     = $_REQUEST['MB'];
          $WGA    = $_REQUEST['WGA'];
          $WPO    = $_REQUEST['WPO'];
          $POS    = $_REQUEST['POS'];
          $TRP    = $_REQUEST['TRP'];
          $MLN    = $_REQUEST['MLN'];
          $OS     = $_REQUEST['OS'];
          $DMG    = $_REQUEST['DMG'];
          $BC     = $_REQUEST['BC'];
      //--------------VISUAL PACKAGING-----------------//
          $WT     = $_REQUEST['WT'];
          $PIS    = $_REQUEST['PIS'];
          $CT     = $_REQUEST['CT'];
          $MSA    = $_REQUEST['MSA'];
          $POP    = $_REQUEST['POP'];
          $WIS    = $_REQUEST['WIS'];
          $FG     = $_REQUEST['FG'];
          $DT_PACKING     = $_REQUEST['DT_PACKING'];


          $overall_AQL    = $_REQUEST['overall_AQL'];
          $UDResultKey    = $_REQUEST['UDResultCode'];

      //--------------new add defect-----------------//

          $STNs     = $_REQUEST['STNs'];
          $SLDs     = $_REQUEST['SLDs'];
          $Ls     = $_REQUEST['Ls'];
          $GF    = $_REQUEST['GF'];
          $MS_critical     = $_REQUEST['MS_critical'];
          $PFK    = $_REQUEST['PFK'];
          $GSH     = $_REQUEST['GSH'];
          $LH     = $_REQUEST['LH'];
          $MH    = $_REQUEST['MH'];
          $LH_2     = $_REQUEST['LH_2'];
          $MH_2    = $_REQUEST['MH_2'];
          $MG    = $_REQUEST['MG'];





//---------------------------------------------------------Updating T_Record_Master---------------------------------------------------------//

  $colVal_array = array(
    array(
      "col"=>"InspectionUserID",
      "newcolval"=>$InspectionUserID,
      "oldcolval"=>$T_Record_Master['InspectionUserID'],
    )
    ,array(
      "col"=>"RecordCreatedDateTime",
      "newcolval"=>$RecordCreatedDateTime,
      "oldcolval"=>$T_Record_Master['RecordCreatedDateTime'],
    )
    ,array(
      "col"=>"InspectionCount",
      "newcolval"=>$InspectionCount,
      "oldcolval"=>$T_Record_Master['InspectionCount'],
    )
    ,array(
      "col"=>"VerifiedDate",
      "newcolval"=>$VerifiedDate,
      "oldcolval"=>$T_Record_Master['VerifiedDate'],
    )
    ,array(
      "col"=>"VerifierID",
      "newcolval"=>$VerifierID,
      "oldcolval"=>$T_Record_Master['VerifierID'],
    )
  );

  $colVal_JSON = json_encode($colVal_array);

  echo "<br />".$colVal_JSON;

  $indentifier_array = array(
    array(
      "iCol"=>"RecordID",
      "iColVal"=>$T_Record_Master['RecordID'],
    )
  );

  $indentifier_JSON = json_encode($indentifier_array);
  echo "<br />".$indentifier_JSON;

  updateRecord($connect,"T_Record_Master", $RecordID, $colVal_JSON,$indentifier_JSON);



//------------------------------updating T_Record_instrument-------------------------------------------------

function updateInstrument($connect,$RecordID ,$newVal,$oldVal,$identifierValue){
  $colVal_array = array(
    array(
      "col"=>"InstrumentValue",
      "newcolval"=>$newVal,
      "oldcolval"=>$oldVal,
    )
  );

  $colVal_JSON = json_encode($colVal_array);

  echo "<br />".$colVal_JSON;

  $indentifier_array = array(
    array(
      "iCol"=>"InstrumentKey",
      "iColVal"=>$identifierValue,
    )
  );

  $indentifier_JSON = json_encode($indentifier_array);
  echo "<br />".$indentifier_JSON;

  updateRecord($connect,"T_Record_Instrument", $RecordID, $colVal_JSON,$indentifier_JSON);
}


updateInstrument($connect, $RecordID, $WeighingScaleID, $T_Record_Instrument[0]['InstrumentValue'], "1");
updateInstrument($connect, $RecordID, $ThicknessGauge, $T_Record_Instrument[1]['InstrumentValue'], "2");
updateInstrument($connect, $RecordID, $RulerID, $T_Record_Instrument[2]['InstrumentValue'], "3");
updateInstrument($connect, $RecordID, $machine_id, $T_Record_Instrument[3]['InstrumentValue'], "4");

//-------------------------------------------------------------------------------------------------------------------------------
//------------------------------updating T_Record_Test-------------------------------------------------

function updateTest($connect,$RecordID ,$newVal,$oldVal, $newSRTVal, $oldSRTVal, $identifierValue){
  $colVal_array = array(
    array(
      "col"=>"TestValue",
      "newcolval"=>$newVal,
      "oldcolval"=>$oldVal,
    )
    ,array(
      "col"=>"SRText",
      "newcolval"=>$newSRTVal,
      "oldcolval"=>$oldSRTVal,
    )
  );

  $colVal_JSON = json_encode($colVal_array);

  echo "<br />".$colVal_JSON;

  $indentifier_array = array(
    array(
      "iCol"=>"TestKey",
      "iColVal"=>$identifierValue,
    )
  );

  $indentifier_JSON = json_encode($indentifier_array);
  echo "<br />".$indentifier_JSON;

  updateRecord($connect,"T_Record_Test", $RecordID, $colVal_JSON,$indentifier_JSON);
}

updateTest($connect, $RecordID, $ThicknessTestingMethod, $T_Record_Test[0]['TestValue'], null, null, "1");
updateTest($connect, $RecordID, $GloveWeightTest, $T_Record_Test[12]['TestValue'], null, null, "12");
updateTest($connect, $RecordID, $CountingTest, $T_Record_Test[14]['TestValue'], null, null, "14");
updateTest($connect, $RecordID, $PackagingDefectsTest, $T_Record_Test[7]['TestValue'], null, null, "8");
updateTest($connect, $RecordID, $LayeringTest, $T_Record_Test[1]['TestValue'], null, null, "2");
updateTest($connect, $RecordID, $SmellTest, $T_Record_Test[4]['TestValue'], null, null, "5");
updateTest($connect, $RecordID, $GripTest, $T_Record_Test[5]['TestValue'], null, null, "6");
updateTest($connect, $RecordID, $DonningTearingTest, $T_Record_Test[2]['TestValue'], null, null, "3");
updateTest($connect, $RecordID, $BlackClothTest, $T_Record_Test[8]['TestValue'], null, null, "9");
updateTest($connect, $RecordID, $StickingTest, $T_Record_Test[6]['TestValue'], null, null, "7");
updateTest($connect, $RecordID, $DispensingTest, $T_Record_Test[3]['TestValue'], null, null, "4");
updateTest($connect, $RecordID, $WhiteClothTest, $T_Record_Test[9]['TestValue'], null, null, "10");
updateTest($connect, $RecordID, $Test1Name, $T_Record_Test[125]['TestValue'], null, null, "144");
updateTest($connect, $RecordID, $Test2Name, $T_Record_Test[126]['TestValue'], null, null, "145");
updateTest($connect, $RecordID, $Test3Name, $T_Record_Test[127]['TestValue'], null, null, "146");
updateTest($connect, $RecordID, $Test4Name, $T_Record_Test[128]['TestValue'], null, null, "147");
updateTest($connect, $RecordID, $Test5Name, $T_Record_Test[129]['TestValue'], null, null, "148");
updateTest($connect, $RecordID, $DyeLeakTest, $T_Record_Test[131]['TestValue'], null, null, "150");
updateTest($connect, $RecordID, $SealingTest, $T_Record_Test[130]['TestValue'], null, null, "149");
updateTest($connect, $RecordID, $BurstTest, $T_Record_Test[132]['TestValue'], null, null, "157");
updateTest($connect, $RecordID, $VPA, $T_Record_Test[133]['TestValue'], null, null, "158");

updateTest($connect, $RecordID, $length1, $T_Record_Test[14]['TestValue'], null, null, "17");
updateTest($connect, $RecordID, $length2, $T_Record_Test[15]['TestValue'], null, null, "18");
updateTest($connect, $RecordID, $length3, $T_Record_Test[16]['TestValue'], null, null, "19");
updateTest($connect, $RecordID, $length4, $T_Record_Test[17]['TestValue'], null, null, "20");
updateTest($connect, $RecordID, $length5, $T_Record_Test[18]['TestValue'], null, null, "21");
updateTest($connect, $RecordID, $length6, $T_Record_Test[19]['TestValue'], null, null, "22");
updateTest($connect, $RecordID, $length7, $T_Record_Test[20]['TestValue'], null, null, "23");
updateTest($connect, $RecordID, $length8, $T_Record_Test[21]['TestValue'], null, null, "24");
updateTest($connect, $RecordID, $length9, $T_Record_Test[22]['TestValue'], null, null, "25");
updateTest($connect, $RecordID, $length10, $T_Record_Test[23]['TestValue'], null, null, "26");
updateTest($connect, $RecordID, $length11, $T_Record_Test[24]['TestValue'], null, null, "27");
updateTest($connect, $RecordID, $length12, $T_Record_Test[25]['TestValue'], null, null, "28");
updateTest($connect, $RecordID, $length13, $T_Record_Test[26]['TestValue'], null, null, "29");
updateTest($connect, $RecordID, $length_p_f, $T_Record_Test[13]['TestValue'], null, null, "16");

updateTest($connect, $RecordID, $width1, $T_Record_Test[28]['TestValue'], null, null, "31");
updateTest($connect, $RecordID, $width2, $T_Record_Test[29]['TestValue'], null, null, "32");
updateTest($connect, $RecordID, $width3, $T_Record_Test[30]['TestValue'], null, null, "33");
updateTest($connect, $RecordID, $width4, $T_Record_Test[31]['TestValue'], null, null, "34");
updateTest($connect, $RecordID, $width5, $T_Record_Test[32]['TestValue'], null, null, "35");
updateTest($connect, $RecordID, $width6, $T_Record_Test[33]['TestValue'], null, null, "36");
updateTest($connect, $RecordID, $width7, $T_Record_Test[34]['TestValue'], null, null, "37");
updateTest($connect, $RecordID, $width8, $T_Record_Test[35]['TestValue'], null, null, "38");
updateTest($connect, $RecordID, $width9, $T_Record_Test[36]['TestValue'], null, null, "39");
updateTest($connect, $RecordID, $width10, $T_Record_Test[37]['TestValue'], null, null, "40");
updateTest($connect, $RecordID, $width11, $T_Record_Test[38]['TestValue'], null, null, "41");
updateTest($connect, $RecordID, $width12, $T_Record_Test[39]['TestValue'], null, null, "42");
updateTest($connect, $RecordID, $width13, $T_Record_Test[40]['TestValue'], null, null, "43");
updateTest($connect, $RecordID, $width_p_f, $T_Record_Test[27]['TestValue'], null, null, "30");

updateTest($connect, $RecordID, $cuff1, $T_Record_Test[42]['TestValue'], null, null, "45");
updateTest($connect, $RecordID, $cuff2, $T_Record_Test[43]['TestValue'], null, null, "46");
updateTest($connect, $RecordID, $cuff3, $T_Record_Test[44]['TestValue'], null, null, "47");
updateTest($connect, $RecordID, $cuff4, $T_Record_Test[45]['TestValue'], null, null, "48");
updateTest($connect, $RecordID, $cuff5, $T_Record_Test[46]['TestValue'], null, null, "49");
updateTest($connect, $RecordID, $cuff6, $T_Record_Test[47]['TestValue'], null, null, "50");
updateTest($connect, $RecordID, $cuff7, $T_Record_Test[48]['TestValue'], null, null, "51");
updateTest($connect, $RecordID, $cuff8, $T_Record_Test[49]['TestValue'], null, null, "52");
updateTest($connect, $RecordID, $cuff9, $T_Record_Test[50]['TestValue'], null, null, "53");
updateTest($connect, $RecordID, $cuff10, $T_Record_Test[51]['TestValue'], null, null, "54");
updateTest($connect, $RecordID, $cuff11, $T_Record_Test[52]['TestValue'], null, null, "55");
updateTest($connect, $RecordID, $cuff12, $T_Record_Test[53]['TestValue'], null, null, "56");
updateTest($connect, $RecordID, $cuff13, $T_Record_Test[54]['TestValue'], null, null, "57");
updateTest($connect, $RecordID, $cuff_p_f, $T_Record_Test[41]['TestValue'], null, null, "44");

updateTest($connect, $RecordID, $palm1, $T_Record_Test[56]['TestValue'], null, null, "59");
updateTest($connect, $RecordID, $palm2, $T_Record_Test[57]['TestValue'], null, null, "60");
updateTest($connect, $RecordID, $palm3, $T_Record_Test[58]['TestValue'], null, null, "61");
updateTest($connect, $RecordID, $palm4, $T_Record_Test[59]['TestValue'], null, null, "62");
updateTest($connect, $RecordID, $palm5, $T_Record_Test[60]['TestValue'], null, null, "63");
updateTest($connect, $RecordID, $palm6, $T_Record_Test[61]['TestValue'], null, null, "64");
updateTest($connect, $RecordID, $palm7, $T_Record_Test[62]['TestValue'], null, null, "65");
updateTest($connect, $RecordID, $palm8, $T_Record_Test[63]['TestValue'], null, null, "66");
updateTest($connect, $RecordID, $palm9, $T_Record_Test[64]['TestValue'], null, null, "67");
updateTest($connect, $RecordID, $palm10, $T_Record_Test[65]['TestValue'], null, null, "68");
updateTest($connect, $RecordID, $palm11, $T_Record_Test[66]['TestValue'], null, null, "69");
updateTest($connect, $RecordID, $palm12, $T_Record_Test[67]['TestValue'], null, null, "70");
updateTest($connect, $RecordID, $palm13, $T_Record_Test[68]['TestValue'], null, null, "71");
updateTest($connect, $RecordID, $palm_p_f, $T_Record_Test[55]['TestValue'], null, null, "58");

updateTest($connect, $RecordID, $fingertip1, $T_Record_Test[70]['TestValue'], null, null, "73");
updateTest($connect, $RecordID, $fingertip2, $T_Record_Test[71]['TestValue'], null, null, "74");
updateTest($connect, $RecordID, $fingertip3, $T_Record_Test[72]['TestValue'], null, null, "75");
updateTest($connect, $RecordID, $fingertip4, $T_Record_Test[73]['TestValue'], null, null, "76");
updateTest($connect, $RecordID, $fingertip5, $T_Record_Test[74]['TestValue'], null, null, "77");
updateTest($connect, $RecordID, $fingertip6, $T_Record_Test[75]['TestValue'], null, null, "78");
updateTest($connect, $RecordID, $fingertip7, $T_Record_Test[76]['TestValue'], null, null, "79");
updateTest($connect, $RecordID, $fingertip8, $T_Record_Test[77]['TestValue'], null, null, "80");
updateTest($connect, $RecordID, $fingertip9, $T_Record_Test[78]['TestValue'], null, null, "81");
updateTest($connect, $RecordID, $fingertip10, $T_Record_Test[79]['TestValue'], null, null, "82");
updateTest($connect, $RecordID, $fingertip11, $T_Record_Test[80]['TestValue'], null, null, "83");
updateTest($connect, $RecordID, $fingertip12, $T_Record_Test[81]['TestValue'], null, null, "84");
updateTest($connect, $RecordID, $fingertip13, $T_Record_Test[82]['TestValue'], null, null, "85");
updateTest($connect, $RecordID, $fingertip_p_f, $T_Record_Test[69]['TestValue'], null, null, "72");

updateTest($connect, $RecordID, $bead_diameter1, $T_Record_Test[84]['TestValue'], null, null, "87");
updateTest($connect, $RecordID, $bead_diameter2, $T_Record_Test[85]['TestValue'], null, null, "88");
updateTest($connect, $RecordID, $bead_diameter3, $T_Record_Test[86]['TestValue'], null, null, "89");
updateTest($connect, $RecordID, $bead_diameter4, $T_Record_Test[87]['TestValue'], null, null, "90");
updateTest($connect, $RecordID, $bead_diameter5, $T_Record_Test[88]['TestValue'], null, null, "91");
updateTest($connect, $RecordID, $bead_diameter6, $T_Record_Test[89]['TestValue'], null, null, "92");
updateTest($connect, $RecordID, $bead_diameter7, $T_Record_Test[90]['TestValue'], null, null, "93");
updateTest($connect, $RecordID, $bead_diameter8, $T_Record_Test[91]['TestValue'], null, null, "94");
updateTest($connect, $RecordID, $bead_diameter9, $T_Record_Test[92]['TestValue'], null, null, "95");
updateTest($connect, $RecordID, $bead_diameter10, $T_Record_Test[93]['TestValue'], null, null, "96");
updateTest($connect, $RecordID, $bead_diameter11, $T_Record_Test[94]['TestValue'], null, null, "97");
updateTest($connect, $RecordID, $bead_diameter12, $T_Record_Test[95]['TestValue'], null, null, "98");
updateTest($connect, $RecordID, $bead_diameter13, $T_Record_Test[96]['TestValue'], null, null, "99");
updateTest($connect, $RecordID, $bead_diameter_p_f, $T_Record_Test[83]['TestValue'], null, null, "86");

updateTest($connect, $RecordID, $cuff_edge1, $T_Record_Test[98]['TestValue'], null, null, "101");
updateTest($connect, $RecordID, $cuff_edge2, $T_Record_Test[99]['TestValue'], null, null, "102");
updateTest($connect, $RecordID, $cuff_edge3, $T_Record_Test[100]['TestValue'], null, null, "103");
updateTest($connect, $RecordID, $cuff_edge4, $T_Record_Test[101]['TestValue'], null, null, "104");
updateTest($connect, $RecordID, $cuff_edge5, $T_Record_Test[102]['TestValue'], null, null, "105");
updateTest($connect, $RecordID, $cuff_edge6, $T_Record_Test[103]['TestValue'], null, null, "106");
updateTest($connect, $RecordID, $cuff_edge7, $T_Record_Test[104]['TestValue'], null, null, "107");
updateTest($connect, $RecordID, $cuff_edge8, $T_Record_Test[105]['TestValue'], null, null, "108");
updateTest($connect, $RecordID, $cuff_edge9, $T_Record_Test[106]['TestValue'], null, null, "109");
updateTest($connect, $RecordID, $cuff_edge10, $T_Record_Test[107]['TestValue'], null, null, "110");
updateTest($connect, $RecordID, $cuff_edge11, $T_Record_Test[108]['TestValue'], null, null, "111");
updateTest($connect, $RecordID, $cuff_edge12, $T_Record_Test[109]['TestValue'], null, null, "112");
updateTest($connect, $RecordID, $cuff_edge13, $T_Record_Test[110]['TestValue'], null, null, "113");
updateTest($connect, $RecordID, $cuff_edge_p_f, $T_Record_Test[97]['TestValue'], null, null, "100");

updateTest($connect, $RecordID, $g_weight1, $T_Record_Test[112]['TestValue'], null, null, "115");
updateTest($connect, $RecordID, $g_weight2, $T_Record_Test[113]['TestValue'], null, null, "116");
updateTest($connect, $RecordID, $g_weight3, $T_Record_Test[114]['TestValue'], null, null, "117");
updateTest($connect, $RecordID, $g_weight4, $T_Record_Test[115]['TestValue'], null, null, "118");
updateTest($connect, $RecordID, $g_weight5, $T_Record_Test[116]['TestValue'], null, null, "119");
updateTest($connect, $RecordID, $g_weight6, $T_Record_Test[117]['TestValue'], null, null, "120");
updateTest($connect, $RecordID, $g_weight7, $T_Record_Test[118]['TestValue'], null, null, "121");
updateTest($connect, $RecordID, $g_weight8, $T_Record_Test[119]['TestValue'], null, null, "122");
updateTest($connect, $RecordID, $g_weight9, $T_Record_Test[120]['TestValue'], null, null, "123");
updateTest($connect, $RecordID, $g_weight10, $T_Record_Test[121]['TestValue'], null, null, "124");
updateTest($connect, $RecordID, $g_weight11, $T_Record_Test[122]['TestValue'], null, null, "125");
updateTest($connect, $RecordID, $g_weight12, $T_Record_Test[123]['TestValue'], null, null, "126");
updateTest($connect, $RecordID, $g_weight13, $T_Record_Test[124]['TestValue'], null, null, "127");
updateTest($connect, $RecordID, $g_weight_p_f, $T_Record_Test[111]['TestValue'], null, null, "114");

updateTest($connect, $RecordID, $SRText1, $T_Record_Test[11]['TestValue'], null, null, "13");
updateTest($connect, $RecordID, $SRText2, $T_Record_Test[12]['TestValue'], null, null, "14");
updateTest($connect, $RecordID, $SRText3, $T_Record_Test[125]['TestValue'], null, null, "144");
updateTest($connect, $RecordID, $SRText4, $T_Record_Test[126]['TestValue'], null, null, "145");
updateTest($connect, $RecordID, $SRText5, $T_Record_Test[127]['TestValue'], null, null, "146");
updateTest($connect, $RecordID, $SRText6, $T_Record_Test[128]['TestValue'], null, null, "147");
updateTest($connect, $RecordID, $SRText7, $T_Record_Test[129]['TestValue'], null, null, "148");
updateTest($connect, $RecordID, $SRText8, $T_Record_Test[2]['TestValue'], null, null, "3");
updateTest($connect, $RecordID, $SRTextPackaging, $T_Record_Test[7]['TestValue'], null, null, "8");

//-------------------------------------------------------------------------------------------------------------------------------

//------------------------------updating T_Record_AQL-------------------------------------------------

function updateAQL($connect,$RecordID ,$newVal,$oldVal, $identifierValue){
  $colVal_array = array(
    array(
      "col"=>"AQLValue",
      "newcolval"=>$newVal,
      "oldcolval"=>$oldVal,
    )
  );

  $colVal_JSON = json_encode($colVal_array);

  echo "<br />".$colVal_JSON;

  $indentifier_array = array(
    array(
      "iCol"=>"AQLDescriptionKey",
      "iColVal"=>$identifierValue,
    )
  );

  $indentifier_JSON = json_encode($indentifier_array);
  echo "<br />".$indentifier_JSON;

  updateRecord($connect,"T_Record_AQL", $RecordID, $colVal_JSON,$indentifier_JSON);
}

updateAQL($connect, $RecordID, $AQL_minor, $T_Record_AQL[0]['AQLValue'], "128");
updateAQL($connect, $RecordID, $AQL_major, $T_Record_AQL[2]['AQLValue'], "130");
updateAQL($connect, $RecordID, $AQL_criticalNAG, $T_Record_AQL[22]['AQLValue'], "167");
updateAQL($connect, $RecordID, $AQL_criticalNFG, $T_Record_AQL[21]['AQLValue'], "166");
updateAQL($connect, $RecordID, $AQL_holes1, $T_Record_AQL[4]['AQLValue'], "166");
updateAQL($connect, $RecordID, $AQL_holes2, $T_Record_AQL[6]['AQLValue'], "136");

updateAQL($connect, $RecordID, $Acceptance_minor, $T_Record_AQL[1]['AQLValue'], "129");
updateAQL($connect, $RecordID, $Acceptance_major, $T_Record_AQL[3]['AQLValue'], "131");
updateAQL($connect, $RecordID, $Acceptance_nag, $T_Record_AQL[20]['AQLValue'], "165");
updateAQL($connect, $RecordID, $Acceptance_nfg, $T_Record_AQL[19]['AQLValue'], "164");
updateAQL($connect, $RecordID, $Acceptance_holes1, $T_Record_AQL[5]['AQLValue'], "135");
updateAQL($connect, $RecordID, $Acceptance_holes2, $T_Record_AQL[7]['AQLValue'], "137");

updateAQL($connect, $RecordID, $AQL_regulatorypackaging, $T_Record_AQL[13]['AQLValue'], "155");
updateAQL($connect, $RecordID, $Acceptance_RegulatoryPackaging, $T_Record_AQL[14]['AQLValue'], "156");
updateAQL($connect, $RecordID, $AQL_VisualPackaging, $T_Record_AQL[9]['AQLValue'], "151");
updateAQL($connect, $RecordID, $Acceptance_VisualPackaging, $T_Record_AQL[12]['AQLValue'], "154");
updateAQL($connect, $RecordID, $AQL_CriticalPackaging, $T_Record_AQL[11]['AQLValue'], "153");
updateAQL($connect, $RecordID, $Acceptance_CriticalPackaging, $T_Record_AQL[10]['AQLValue'], "152");

updateAQL($connect, $RecordID, $Result_RegulatoryPackaging, $T_Record_AQL[17]['AQLValue'], "161");
updateAQL($connect, $RecordID, $Result_CriticalPackaging, $T_Record_AQL[16]['AQLValue'], "160");
updateAQL($connect, $RecordID, $Result_VisualPackaging, $T_Record_AQL[15]['AQLValue'], "159");
updateAQL($connect, $RecordID, $Final_Disposition, $T_Record_AQL[18]['AQLValue'], "162");
//updateAQL($connect, $RecordID, $Total_holes, $T_Record_AQL[8]['AQLValue'], "140");


updateAQL($connect, $RecordID, $overall_AQL, $T_Record_AQL[8]['AQLValue'], "140");
//-------------------------------------------------------------------------------------------------------------------------------

//------------------------------updating T_Record_Defect-------------------------------------------------

function updateDefect($connect,$RecordID ,$newVal,$oldVal, $identifierValue){
  $colVal_array = array(
    array(
      "col"=>"DefectValue",
      "newcolval"=>$newVal,
      "oldcolval"=>$oldVal,
    )
  );

  $colVal_JSON = json_encode($colVal_array);

  echo "<br />".$colVal_JSON;

  $indentifier_array = array(
    array(
      "iCol"=>"DefectKey",
      "iColVal"=>$identifierValue,
    )
  );

  $indentifier_JSON = json_encode($indentifier_array);
  echo "<br />".$indentifier_JSON;

  updateRecord($connect,"T_Record_Defect", $RecordID, $colVal_JSON,$indentifier_JSON);
}

updateDefect($connect, $RecordID, $DB, $T_Record_Defect[0]['DefectValue'], "1");
updateDefect($connect, $RecordID, $SD, $T_Record_Defect[1]['DefectValue'], "2");
updateDefect($connect, $RecordID, $SP, $T_Record_Defect[2]['DefectValue'], "3");

updateDefect($connect, $RecordID, $CA, $T_Record_Defect[3]['DefectValue'], "4");
updateDefect($connect, $RecordID, $CL, $T_Record_Defect[4]['DefectValue'], "5");
updateDefect($connect, $RecordID, $CLD, $T_Record_Defect[5]['DefectValue'], "6");
updateDefect($connect, $RecordID, $CS, $T_Record_Defect[6]['DefectValue'], "7");
updateDefect($connect, $RecordID, $DF, $T_Record_Defect[7]['DefectValue'], "8");
updateDefect($connect, $RecordID, $DT, $T_Record_Defect[8]['DefectValue'], "9");
updateDefect($connect, $RecordID, $EFI, $T_Record_Defect[9]['DefectValue'], "10");
updateDefect($connect, $RecordID, $FM, $T_Record_Defect[10]['DefectValue'], "11");
updateDefect($connect, $RecordID, $FNO, $T_Record_Defect[11]['DefectValue'], "12");
updateDefect($connect, $RecordID, $FO, $T_Record_Defect[12]['DefectValue'], "13");
updateDefect($connect, $RecordID, $GNO, $T_Record_Defect[13]['DefectValue'], "14");
updateDefect($connect, $RecordID, $IB, $T_Record_Defect[14]['DefectValue'], "15");
updateDefect($connect, $RecordID, $ICT, $T_Record_Defect[15]['DefectValue'], "16");
updateDefect($connect, $RecordID, $L_Major, $T_Record_Defect[15]['DefectValue'], "17");
updateDefect($connect, $RecordID, $PMI, $T_Record_Defect[16]['DefectValue'], "20");
updateDefect($connect, $RecordID, $PMO, $T_Record_Defect[20]['DefectValue'], "21");
updateDefect($connect, $RecordID, $PLM, $T_Record_Defect[18]['DefectValue'], "19");
updateDefect($connect, $RecordID, $RC, $T_Record_Defect[21]['DefectValue'], "22");
updateDefect($connect, $RecordID, $RM, $T_Record_Defect[22]['DefectValue'], "23");
updateDefect($connect, $RecordID, $SAG, $T_Record_Defect[23]['DefectValue'], "24");
updateDefect($connect, $RecordID, $SG, $T_Record_Defect[24]['DefectValue'], "25");
updateDefect($connect, $RecordID, $SHN, $T_Record_Defect[25]['DefectValue'], "26");
updateDefect($connect, $RecordID, $SI, $T_Record_Defect[26]['DefectValue'], "27");
updateDefect($connect, $RecordID, $SKV, $T_Record_Defect[27]['DefectValue'], "28");
updateDefect($connect, $RecordID, $SLD, $T_Record_Defect[28]['DefectValue'], "29");
updateDefect($connect, $RecordID, $SO, $T_Record_Defect[29]['DefectValue'], "30");
updateDefect($connect, $RecordID, $STK, $T_Record_Defect[30]['DefectValue'], "31");
updateDefect($connect, $RecordID, $STN, $T_Record_Defect[31]['DefectValue'], "32");
updateDefect($connect, $RecordID, $TA, $T_Record_Defect[32]['DefectValue'], "33");
updateDefect($connect, $RecordID, $TS, $T_Record_Defect[33]['DefectValue'], "34");
updateDefect($connect, $RecordID, $UNF, $T_Record_Defect[34]['DefectValue'], "35");
updateDefect($connect, $RecordID, $WL, $T_Record_Defect[35]['DefectValue'], "36");
updateDefect($connect, $RecordID, $WSI, $T_Record_Defect[36]['DefectValue'], "37");
updateDefect($connect, $RecordID, $WSO, $T_Record_Defect[37]['DefectValue'], "38");
updateDefect($connect, $RecordID, $LS, $T_Record_Defect[17]['DefectValue'], "18");

updateDefect($connect, $RecordID, $BP, $T_Record_Defect[38]['DefectValue'], "40");
updateDefect($connect, $RecordID, $DP, $T_Record_Defect[39]['DefectValue'], "41");
updateDefect($connect, $RecordID, $DSP, $T_Record_Defect[40]['DefectValue'], "42");
updateDefect($connect, $RecordID, $DTP, $T_Record_Defect[41]['DefectValue'], "43");
updateDefect($connect, $RecordID, $IA, $T_Record_Defect[42]['DefectValue'], "44");
updateDefect($connect, $RecordID, $IFS, $T_Record_Defect[43]['DefectValue'], "45");
updateDefect($connect, $RecordID, $IP_MAJOR, $T_Record_Defect[44]['DefectValue'], "46");
updateDefect($connect, $RecordID, $OP, $T_Record_Defect[45]['DefectValue'], "47");
updateDefect($connect, $RecordID, $RP, $T_Record_Defect[46]['DefectValue'], "48");
updateDefect($connect, $RecordID, $SH, $T_Record_Defect[47]['DefectValue'], "49");
updateDefect($connect, $RecordID, $SMP, $T_Record_Defect[48]['DefectValue'], "50");

updateDefect($connect, $RecordID, $BPC, $T_Record_Defect[49]['DefectValue'], "51");
updateDefect($connect, $RecordID, $CR, $T_Record_Defect[50]['DefectValue'], "52");
updateDefect($connect, $RecordID, $DC, $T_Record_Defect[51]['DefectValue'], "53");
updateDefect($connect, $RecordID, $DD, $T_Record_Defect[52]['DefectValue'], "54");
updateDefect($connect, $RecordID, $DIS, $T_Record_Defect[53]['DefectValue'], "55");
updateDefect($connect, $RecordID, $FMT, $T_Record_Defect[54]['DefectValue'], "56");
updateDefect($connect, $RecordID, $L, $T_Record_Defect[56]['DefectValue'], "58");
updateDefect($connect, $RecordID, $GL, $T_Record_Defect[55]['DefectValue'], "57");
updateDefect($connect, $RecordID, $MP, $T_Record_Defect[57]['DefectValue'], "59");
updateDefect($connect, $RecordID, $NB, $T_Record_Defect[58]['DefectValue'], "60");
updateDefect($connect, $RecordID, $NF, $T_Record_Defect[59]['DefectValue'], "61");
updateDefect($connect, $RecordID, $TW, $T_Record_Defect[62]['DefectValue'], "64");
updateDefect($connect, $RecordID, $WE, $T_Record_Defect[64]['DefectValue'], "66");
updateDefect($connect, $RecordID, $WG, $T_Record_Defect[65]['DefectValue'], "67");
updateDefect($connect, $RecordID, $PGM, $T_Record_Defect[60]['DefectValue'], "62");
updateDefect($connect, $RecordID, $SDG, $T_Record_Defect[61]['DefectValue'], "63");
updateDefect($connect, $RecordID, $URD, $T_Record_Defect[63]['DefectValue'], "65");

updateDefect($connect, $RecordID, $CH, $T_Record_Defect[66]['DefectValue'], "68");
updateDefect($connect, $RecordID, $FK, $T_Record_Defect[67]['DefectValue'], "69");
updateDefect($connect, $RecordID, $TAH, $T_Record_Defect[69]['DefectValue'], "71");
updateDefect($connect, $RecordID, $TR, $T_Record_Defect[71]['DefectValue'], "73");
updateDefect($connect, $RecordID, $TH, $T_Record_Defect[70]['DefectValue'], "72");
updateDefect($connect, $RecordID, $MF, $T_Record_Defect[68]['DefectValue'], "70");

updateDefect($connect, $RecordID, $ICP, $T_Record_Defect[71]['DefectValue'], "74");
updateDefect($connect, $RecordID, $NP, $T_Record_Defect[70]['DefectValue'], "75");
updateDefect($connect, $RecordID, $WP, $T_Record_Defect[68]['DefectValue'], "76");

updateDefect($connect, $RecordID, $BF, $T_Record_Defect[75]['DefectValue'], "77");
updateDefect($connect, $RecordID, $P, $T_Record_Defect[81]['DefectValue'], "83");
updateDefect($connect, $RecordID, $CF, $T_Record_Defect[76]['DefectValue'], "78");
updateDefect($connect, $RecordID, $SF, $T_Record_Defect[82]['DefectValue'], "84");
updateDefect($connect, $RecordID, $TAHs, $T_Record_Defect[83]['DefectValue'], "85");
updateDefect($connect, $RecordID, $FKS, $T_Record_Defect[78]['DefectValue'], "80");
updateDefect($connect, $RecordID, $THs, $T_Record_Defect[84]['DefectValue'], "86");
updateDefect($connect, $RecordID, $FT, $T_Record_Defect[79]['DefectValue'], "81");
updateDefect($connect, $RecordID, $TRS, $T_Record_Defect[85]['DefectValue'], "87");
updateDefect($connect, $RecordID, $GB, $T_Record_Defect[80]['DefectValue'], "82");
updateDefect($connect, $RecordID, $CHs, $T_Record_Defect[77]['DefectValue'], "79");
updateDefect($connect, $RecordID, $L_HOLES1, $T_Record_Defect[130]['DefectValue'], "143");

updateDefect($connect, $RecordID, $BF_2, $T_Record_Defect[86]['DefectValue'], "88");
updateDefect($connect, $RecordID, $P_2, $T_Record_Defect[92]['DefectValue'], "94");
updateDefect($connect, $RecordID, $CF_2, $T_Record_Defect[87]['DefectValue'], "100");
updateDefect($connect, $RecordID, $SF_2, $T_Record_Defect[93]['DefectValue'], "95");
updateDefect($connect, $RecordID, $TAHs_2, $T_Record_Defect[94]['DefectValue'], "96");
updateDefect($connect, $RecordID, $FKS_2, $T_Record_Defect[89]['DefectValue'], "102");
updateDefect($connect, $RecordID, $THs_2, $T_Record_Defect[95]['DefectValue'], "97");
updateDefect($connect, $RecordID, $FT_2, $T_Record_Defect[90]['DefectValue'], "103");
updateDefect($connect, $RecordID, $TRS_2, $T_Record_Defect[96]['DefectValue'], "98");
updateDefect($connect, $RecordID, $GB_2, $T_Record_Defect[91]['DefectValue'], "93");
updateDefect($connect, $RecordID, $CHs_2, $T_Record_Defect[88]['DefectValue'], "90");
updateDefect($connect, $RecordID, $L_HOLES2, $T_Record_Defect[131]['DefectValue'], "144");

updateDefect($connect, $RecordID, $WLN, $T_Record_Defect[100]['DefectValue'], "113");
updateDefect($connect, $RecordID, $WPC, $T_Record_Defect[102]['DefectValue'], "115");
updateDefect($connect, $RecordID, $WMD, $T_Record_Defect[101]['DefectValue'], "114");
updateDefect($connect, $RecordID, $MM, $T_Record_Defect[98]['DefectValue'], "111");
updateDefect($connect, $RecordID, $WED, $T_Record_Defect[99]['DefectValue'], "112");
updateDefect($connect, $RecordID, $IP, $T_Record_Defect[97]['DefectValue'], "110");

updateDefect($connect, $RecordID, $WQ, $T_Record_Defect[120]['DefectValue'], "133");
updateDefect($connect, $RecordID, $WGS, $T_Record_Defect[116]['DefectValue'], "129");
updateDefect($connect, $RecordID, $WTS, $T_Record_Defect[121]['DefectValue'], "134");
updateDefect($connect, $RecordID, $MSG, $T_Record_Defect[108]['DefectValue'], "121");
updateDefect($connect, $RecordID, $WPD, $T_Record_Defect[118]['DefectValue'], "131");
updateDefect($connect, $RecordID, $MS, $T_Record_Defect[109]['DefectValue'], "122");
updateDefect($connect, $RecordID, $WGT, $T_Record_Defect[117]['DefectValue'], "130");
updateDefect($connect, $RecordID, $PTS, $T_Record_Defect[113]['DefectValue'], "126");
updateDefect($connect, $RecordID, $FC, $T_Record_Defect[105]['DefectValue'], "118");
updateDefect($connect, $RecordID, $MSI, $T_Record_Defect[110]['DefectValue'], "123");
updateDefect($connect, $RecordID, $MB, $T_Record_Defect[106]['DefectValue'], "119");
updateDefect($connect, $RecordID, $WGA, $T_Record_Defect[115]['DefectValue'], "128");
updateDefect($connect, $RecordID, $WPO, $T_Record_Defect[119]['DefectValue'], "132");
updateDefect($connect, $RecordID, $POS, $T_Record_Defect[112]['DefectValue'], "125");
updateDefect($connect, $RecordID, $TRP, $T_Record_Defect[114]['DefectValue'], "127");
updateDefect($connect, $RecordID, $MLN, $T_Record_Defect[107]['DefectValue'], "120");
updateDefect($connect, $RecordID, $OS, $T_Record_Defect[111]['DefectValue'], "124");
updateDefect($connect, $RecordID, $DMG, $T_Record_Defect[104]['DefectValue'], "117");
updateDefect($connect, $RecordID, $BC, $T_Record_Defect[103]['DefectValue'], "116");

updateDefect($connect, $RecordID, $WT, $T_Record_Defect[129]['DefectValue'], "142");
updateDefect($connect, $RecordID, $PIS, $T_Record_Defect[126]['DefectValue'], "139");
updateDefect($connect, $RecordID, $CT, $T_Record_Defect[122]['DefectValue'], "135");
updateDefect($connect, $RecordID, $MSA, $T_Record_Defect[125]['DefectValue'], "138");
updateDefect($connect, $RecordID, $POP, $T_Record_Defect[127]['DefectValue'], "12");
updateDefect($connect, $RecordID, $WIS, $T_Record_Defect[128]['DefectValue'], "141");
updateDefect($connect, $RecordID, $FG, $T_Record_Defect[124]['DefectValue'], "137");
updateDefect($connect, $RecordID, $DT_PACKING, $T_Record_Defect[123]['DefectValue'], "136");

updateDefect($connect, $RecordID, $STNs, $T_Record_Defect[140]['DefectValue'], "158");
updateDefect($connect, $RecordID, $SLDs, $T_Record_Defect[141]['DefectValue'], "160");
updateDefect($connect, $RecordID, $Ls, $T_Record_Defect[142]['DefectValue'], "161");
updateDefect($connect, $RecordID, $GF, $T_Record_Defect[132]['DefectValue'], "146");
updateDefect($connect, $RecordID, $MS_critical, $T_Record_Defect[133]['DefectValue'], "147");
updateDefect($connect, $RecordID, $PFK, $T_Record_Defect[135]['DefectValue'], "149");
updateDefect($connect, $RecordID, $GSH, $T_Record_Defect[134]['DefectValue'], "148");
updateDefect($connect, $RecordID, $LH, $T_Record_Defect[136]['DefectValue'], "150");
updateDefect($connect, $RecordID, $MH, $T_Record_Defect[138]['DefectValue'], "155");
updateDefect($connect, $RecordID, $LH_2, $T_Record_Defect[137]['DefectValue'], "151");
updateDefect($connect, $RecordID, $MH_2, $T_Record_Defect[139]['DefectValue'], "151");
updateDefect($connect, $RecordID, $MG, $T_Record_Defect[143]['DefectValue'], "162");
//-------------------------------------------------------------------------------------------------------------------------------


//------------------------------updating T_Record_SampleSize-------------------------------------------------

function updateSampleSize($connect,$RecordID ,$newVal,$oldVal, $identifierValue){
  $colVal_array = array(
    array(
      "col"=>"SampleSizeValue",
      "newcolval"=>$newVal,
      "oldcolval"=>$oldVal,
    )
  );

  $colVal_JSON = json_encode($colVal_array);

  echo "<br />".$colVal_JSON;

  $indentifier_array = array(
    array(
      "iCol"=>"SampleSizeCategoryKey",
      "iColVal"=>$identifierValue,
    )
  );

  $indentifier_JSON = json_encode($indentifier_array);
  echo "<br />".$indentifier_JSON;

  updateRecord($connect,"T_Record_SampleSize", $RecordID, $colVal_JSON,$indentifier_JSON);
}

updateSampleSize($connect, $RecordID, $sample_size, $T_Record_SampleSize[0]['SampleSizeValue'], "142");
updateSampleSize($connect, $RecordID, $sample_size_apt, $T_Record_SampleSize[1]['SampleSizeValue'], "168");
updateSampleSize($connect, $RecordID, $sample_size_apt, $T_Record_SampleSize[2]['SampleSizeValue'], "169");

//-------------------------------------------------------------------------------------------------------------------------------


//------------------------------updating T_Record_UDResult-------------------------------------------------

function updateUDResult($connect,$RecordID ,$newVal,$oldVal, $identifierValue){
  $colVal_array = array(
    array(
      "col"=>"UDResultKey",
      "newcolval"=>$newVal,
      "oldcolval"=>$oldVal,
    )
  );

  $colVal_JSON = json_encode($colVal_array);

  echo "<br />".$colVal_JSON;

  $indentifier_array = array(
    array(
      "iCol"=>"UDResultKey",
      "iColVal"=>$identifierValue,
    )
  );

  $indentifier_JSON = json_encode($indentifier_array);
  echo "<br />".$indentifier_JSON;

  updateRecord($connect,"T_Record_UDResult", $RecordID, $colVal_JSON,$indentifier_JSON);
}

updateUDResult($connect, $RecordID, $UDResultKey, $T_Record_UDResult[0]['UDResultCode'], $UDResultKey);

//-------------------------------------------------------------------------------------------------------------------------------


//------------------------------updating T_Lot_FG-------------------------------------------------
$matching = $T_Lot_FG['GloveColourName'];
$query = "SELECT * FROM M_GloveColour";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
foreach($result as $row)
{

    if($row['GloveColourName'] == $matching ){
    $oldColourCode = $row['GloveColourCode'];
    }
}
  $colVal_array = array(
    array(
      "col"=>"PlantKey",
      "newcolval"=>$Plant,
      "oldcolval"=>$T_Lot_FG['PlantName'],
    )
    ,array(
      "col"=>"PalletID",
      "newcolval"=>$palletID,
      "oldcolval"=>$T_Lot_FG['PalletID'],
    )
    ,array(
      "col"=>"BatchNumber",
      "newcolval"=>$BatchNumber,
      "oldcolval"=>$T_Lot_FG['BatchNumber'],
    )
    ,array(
      "col"=>"SONumber",
      "newcolval"=>$SONumber,
      "oldcolval"=>$T_Lot_FG['SONumber'],
    )
    ,array(
      "col"=>"SOItemNumber",
      "newcolval"=>$ItemNumber,
      "oldcolval"=>$T_Lot_FG['SOItemNumber'],
    )
    ,array(
      "col"=>"CustomerKey",
      "newcolval"=>$Customer,
      "oldcolval"=>$T_Lot_FG['CustomerName'],
    )
    ,array(
      "col"=>"BrandKey",
      "newcolval"=>$Brand,
      "oldcolval"=>$T_Lot_FG['BrandName'],
    )
    ,array(
      "col"=>"LotNumber",
      "newcolval"=>$LotNumber,
      "oldcolval"=>$T_Lot_FG['LotNumber'],
    )
    ,array(
      "col"=>"InspectionPlanKey",
      "newcolval"=>$InspectionPlan,
      "oldcolval"=>$T_Lot_FG['InspectionPlanName'],
    )
    ,array(
      "col"=>"PalletNumber",
      "newcolval"=>$PalletNumber,
      "oldcolval"=>$T_Lot_FG['PalletNumber'],
    )
    ,array(
      "col"=>"CartonQuantity",
      "newcolval"=>$CartonQuantity,
      "oldcolval"=>$T_Lot_FG['CartonQuantity'],
    )
    ,array(
      "col"=>"GloveCodeKey",
      "newcolval"=>$GloveCode,
      "oldcolval"=>$T_Lot_FG['GloveCodeLong'],
    )
    ,array(
      "col"=>"GloveColourKey",
      "newcolval"=>$GloveColour,
      "oldcolval"=>$oldColourCode,
    )
    ,array(
      "col"=>"GloveProductTypeKey",
      "newcolval"=>$GloveProductType,
      "oldcolval"=>$T_Lot_FG['GloveProductTypeName'],
    )
    ,array(
      "col"=>"GloveSizeKey",
      "newcolval"=>$GloveSize,
      "oldcolval"=>$T_Lot_FG['GloveSizeCodeLong'],
    )
    ,array(
      "col"=>"FGCondition",
      "newcolval"=>$FGCondition,
      "oldcolval"=>$T_Lot_FG['FGCondition'],
    )

  );

  $colVal_JSON = json_encode($colVal_array);

  echo "<br />".$colVal_JSON;



  updateLot($connect,"T_Lot_FG", $lotID, $colVal_JSON,null);


//-------------------------------------------------------------------------------------------------------------------------------

//------------------------------updating T_Lot_PackingDate-------------------------------------------------

function updatePackingDate($connect,$lotID ,$newVal,$oldVal, $identifierValue){
  $colVal_array = array(
    array(
      "col"=>"PackingDate",
      "newcolval"=>$newVal,
      "oldcolval"=>$oldVal,
    )
  );

  $colVal_JSON = json_encode($colVal_array);

  echo "<br />".$colVal_JSON;

  $indentifier_array = array(
    array(
      "iCol"=>"Shift",
      "iColVal"=>$identifierValue,
    )
  );

  $indentifier_JSON = json_encode($indentifier_array);
  echo "<br />".$indentifier_JSON;

  updateLot($connect,"T_Lot_PackingDate", $lotID, $colVal_JSON,$indentifier_JSON);
}

updatePackingDate($connect, $lotID, $PackingDate, $T_Lot_PackingDate['PackingDate'], "0");

//-------------------------------------------------------------------------------------------------------------------------------


//------------------------------updating T_Lot_ProductionDateWLine-------------------------------------------------

$Line_array[0] = array(

    "lotidkey"=>$lotID,
    "plant"=>$Plant,
    "productiondate"=>$ProductDate1,
    "shift"=>$Shift1,
    "productionline"=>$ProductionLineKey1,
    "productionkey"=>"1",
);

if($ProductDate2 != ''){
  $Line_array[1] = array(

      "lotidkey"=>$lotID,
      "plant"=>$Plant,
      "productiondate"=>$ProductDate2,
      "shift"=>$Shift2,
      "productionline"=>$ProductionLineKey2,
      "productionkey"=>"2",
  );
}

if($ProductDate3 != ''){
  $Line_array[2] = array(

      "lotidkey"=>$lotID,
      "plant"=>$Plant,
      "productiondate"=>$ProductDate3,
      "shift"=>$Shift3,
      "productionline"=>$ProductionLineKey3,
      "productionkey"=>"3",
  );
}

$tableName = "T_Lot_ProductionDateWLine";


function updatePDWL($connect,$lotID ,$newDateVal, $oldDateVal, $newShiftVal, $oldShiftVal ,$newLineVal, $oldLineVal, $identifierValue, $identifierValue2){
  $colVal_array = array(
    array(
      "col"=>"ProductionDate",
      "newcolval"=>$newDateVal,
      "oldcolval"=>$oldDateVal,
    )
    ,array(
      "col"=>"Shift",
      "newcolval"=>$newShiftVal,
      "oldcolval"=>$oldShiftVal,
    )
    ,array(
      "col"=>"ProductionLineKey",
      "newcolval"=>$newLineVal,
      "oldcolval"=>$oldLineVal,
    )

  );

  $colVal_JSON = json_encode($colVal_array);

  echo "<br />".$colVal_JSON;

  $indentifier_array = array(
    array(
      "iCol"=>"Shift",
      "iColVal"=>$identifierValue,
    )
    ,array(
      "iCol"=>"ProductionKey",
      "iColVal"=>$identifierValue2,
    )
  );

  $indentifier_JSON = json_encode($indentifier_array);
  echo "<br />".$indentifier_JSON;

  updateLot($connect,"T_Lot_ProductionDateWLine", $lotID, $colVal_JSON,$indentifier_JSON);
}

updatePDWL($connect, $lotID, $ProductDate1, $T_Lot_ProductionDateWLine[0]['ProductionDate'], $Shift1, $T_Lot_ProductionDateWLine[0]['SHIFT'], $ProductionLineKey1, $T_Lot_ProductionDateWLine[0]['ProductionLineName'], $T_Lot_ProductionDateWLine[0]['SHIFT'], "1");
if(count($T_Lot_ProductionDateWLine) >= 2){
  updatePDWL($connect, $lotID, $ProductDate2, $T_Lot_ProductionDateWLine[1]['ProductionDate'], $Shift2, $T_Lot_ProductionDateWLine[1]['SHIFT'], $ProductionLineKey2, $T_Lot_ProductionDateWLine[1]['ProductionLineName'], $T_Lot_ProductionDateWLine[1]['SHIFT'], "2");
  if(count($T_Lot_ProductionDateWLine) >= 3){
    updatePDWL($connect, $lotID, $ProductDate3, $T_Lot_ProductionDateWLine[2]['ProductionDate'], $Shift3, $T_Lot_ProductionDateWLine[2]['SHIFT'], $ProductionLineKey3, $T_Lot_ProductionDateWLine[2]['ProductionLineName'], $T_Lot_ProductionDateWLine[2]['SHIFT'], "3");
  }
}



function newProdLine($connect, $tableName, $Line_JSON){

  $NewLine = "[".$Line_JSON."]";
  $query5 = $connect->prepare("{CALL SP_INSERTEXTRALOT(?,?)}");
  $query5 -> bindParam(1, $tableName);
  $query5 -> bindParam(2, $NewLine);
  $query5->execute();
}

if(count($T_Lot_ProductionDateWLine) == 1 &&  $ProductDate2 != '' && $Shift2 != ''){
  newProdLine($connect, $tableName, json_encode($Line_array[1]));
}


if(count($T_Lot_ProductionDateWLine) == 2 &&  $ProductDate3 != '' && $Shift3 != ''){
  newProdLine($connect, $tableName, json_encode($Line_array[2]));
}

//-------------------------------------------------------------------------------------------------------------------------------


//------------------------------updating T_Lot_CartonNum-------------------------------------------------

$OldCartonNum  = explode(",", $T_Lot_CartonNum['CartonNum']);
$tableName2 = "T_Lot_CartonNum";


function updateCartonNum($connect,$lotID ,$newVal, $oldVal){
  $colVal_array = array(
    array(
      "col"=>"CartonNum",
      "newcolval"=>$newVal,
      "oldcolval"=>$oldVal,
    )
  );

  $colVal_JSON = json_encode($colVal_array);

  echo "<br />".$colVal_JSON;


  updateLot($connect,"T_Lot_CartonNum", $lotID, $colVal_JSON,null);
}

function newCartonNum($connect, $tableName, $newCarton_JSON){

  $NewCarton = "[".$newCarton_JSON."]";
  $query5 = $connect->prepare("{CALL SP_INSERTEXTRALOT(?,?)}");
  $query5 -> bindParam(1, $tableName);
  $query5 -> bindParam(2, $NewCarton);
  $query5->execute();
}

$iStart =0;
for($i = 0; $i < count($OldCartonNum); $i++ ){
  updateCartonNum($connect, $lotID, $CartonNum[$i], $OldCartonNum[$i]);
  $iStart = $i;
}

if(count($OldCartonNum) < count($CartonNum)){
  for($i = $iStart+1; $i < count($CartonNum); $i++ ){
    //echo "<br /> new value for add:".$CartonNum[$i];
    $cartonArr = array(
      "lotidkey"=>$lotID,
      "cartonnum"=>$CartonNum[$i],
    );

    newCartonNum($connect, $tableName2, json_encode($cartonArr));

  }
}

//-------------------------------------------------------------------------------------------------------------------------------


           echo"<script>alert('Data is saved!!');</script>";
          // echo '<meta http-equiv="refresh" content="0">';
          //echo"<script>location.replace('formqrex_editFG.php?LotIDKey=".$lotID."&RecordID=".$RecordID."');</script>";

//-------------------------------------------------------------------------------------------------------------------------------

} //if isset submit

            ?>
