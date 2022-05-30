<!DOCTYPE html>
    <?php
        include('../includes/database_connection.php');
        include('../includes/header.php');
        include('../includes/session.php');
        //initialize so no.
        //$_SESSION['SO_num']="";
    ?>

<html lang="en">
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <?php include('../navbar/navbar.php');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-13">
                    <h4 class="page-header">QUALITY RECORD E SYSTEM (QREX)</h4>
                </div>
                <!-- /.col-lg-13 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-13">
                    <div class="panel panel-primary" >
                        <div class="panel-heading">Preset Lot Details</div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <!-- --------------------------------------------------------------------------------- -->
                        <form method="post" id="insert_formA">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                      <!-- SELECT FACTORY /.form-group -->
                                        <div class="form-group">
                                          <?php
                                          $query = $connect->prepare("SELECT * FROM DimPlant");
                                          $query->execute();
                                          $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                          ?>
                                            <label>Factory</label>
                                            <select class="form-control" id="PlantKey" name="PlantKey" required></td>
                                            <option class="form-control" name="PlantKey" value=""> Factory</option>
                                            <?php foreach ($fetch as $row) { ?>
                                            <option name="PlantKey" value="<?php echo $row['PlantName'];?>"><?php echo $row['PlantName']; }?></option>
                                            </select>
                                        </div>
                                        <!-- SO NUMBER /.form-group -->
                                        <div class="form-group">
                                            <label>SO Number</label>
                                            <input type="text" class="form-control" name="SONumber" id="SONumber" placeholder="Enter SO Number">
                                        </div>
                                        <!-- ITEM NUMBER /.form-group -->
                                        <div class="form-group">
                                            <label>Item Number</label>
                                            <input type="number" class="form-control" placeholder="Enter Item Number" name="itemnumber" id="ItemNumber">
                                        </div>
                                        <!-- SELECT BRAND /.form-group -->
                                        <div class="form-group">
                                          <?php
                                              $query = $connect->prepare("SELECT * FROM M_Brand ORDER BY BrandName ASC");
                                              $query->execute();
                                              $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                          ?>
                                            <label>Brand</label>
                                            <select class="form-control" id="Brand" name="Brand">
                                                <option class="form-control" name="" value="">Brand </option>
                                                <?php foreach ($fetch as $row) { ?>
                                                <option name="Brand" value="<?php echo $row['BrandName'];?>"><?php echo $row['BrandName']; }?></option>
                                                </select>
                                        </div>
                                        <!-- CUSTOMER /.form-group -->
                                        <div class="form-group">
                                          <?php
                                              $query = $connect->prepare("SELECT * FROM M_Customer ORDER BY CustomerName ASC");
                                              $query->execute();
                                              $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                          ?>
                                            <label>Customer</label>
                                            <select class="form-control" id="Customer" name="Customer">
                                                <option class="form-control" name="" value=""> Customer</option>
                                                <?php foreach ($fetch as $row) { ?>
                                                <option name="Customer" value="<?php echo $row['CustomerName'];?>"><?php echo $row['CustomerName']; }?></option>
                                            </select>
                                        </div>
                                        <!-- CATEGORY /.form-group -->
                                        <div class="form-group">
                                          <?php
                                          $query = $connect->prepare("SELECT * FROM M_InspectionPlan");
                                          $query->execute();
                                          $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                          ?>
                                            <label>Category</label>
                                            <select class="form-control" id="InspectionPlanKey" name="InspectionPlanKey" required></td>
                                                    <option class="form-control" name="InspectionPlanKey" value=""> Category</option>
                                                    <?php foreach ($fetch as $row) { ?>
                                                    <option name="InspectionPlanKey" value="<?php echo $row['InspectionPlanName'];?>"><?php echo $row['InspectionPlanName']; }?></option>
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                    <!-- SIZE /.form-group -->
                                    <div class="col-md-6">

                                        <!-- COLOUR /.form-group -->

                                        <div class="form-group">
                                          <?php
                                              $query = $connect->prepare("SELECT * FROM M_GloveColour ORDER BY GloveColourName ASC");
                                              $query->execute();
                                              $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                          ?>
                                            <label>Colour</label>
                                            <select class="form-control" id="GloveColourKey" name="GloveColourKey" required>
                                                <option class="form-control" name="GloveColourKey" value=""> Colour</option>
                                                <?php foreach ($fetch as $row) { ?>
                                                <option name="GloveColourKey" value="<?php echo $row['GloveColourCode'];?>"><?php echo $row['GloveColourName']; }?></option>
                                            </select>
                                        </div>
                                        <!-- LOT COUNT /.form-group -->

                                        <div class="form-group">
                                            <label>Lot Count</label>
                                            <input type="number" class="form-control" placeholder="Lot Count" id="lotcount" name="lotcount">
                                        </div>
                                        <!-- LOT NUMBER /.form-group -->

                                        <div class="form-group">
                                            <label>Lot Number</label>
                                            <input type="number" class="form-control" placeholder="Lot Number" id="lotnumber" name="lotnumber">
                                        </div>
                                        <!-- PRODUCT /.form-group -->

                                        <div class="form-group">
                                          <?php
                                              $query = $connect->prepare("SELECT * FROM M_GloveProductType ORDER BY GloveProductTypeName ASC");
                                              $query->execute();
                                              $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                          ?>
                                            <label>Product</label>
                                            <select class="form-control" id="GloveProductTypeKey" name="GloveProductTypeKey">
                                                <option class="form-control" name="GloveProductTypeKey" value="">Product</option>
                                                <?php foreach ($fetch as $row) { ?>
                                                <option name="GloveProductTypeKey" value="<?php echo $row['GloveProductTypeName'];?>"><?php echo $row['GloveProductTypeName']; }?></option>
                                            </select>
                                        </div>
                                        <!-- PRODUCT CODE /.form-group -->

                                        <div class="form-group">
                                          <?php
                                              $query = $connect->prepare("SELECT * FROM M_GloveCode ORDER BY GloveCodeLong ASC");
                                              $query->execute();
                                              $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
                                          ?>
                                            <label>Product Code</label>
                                            <select class="form-control" id="GloveCodeKey" name="GloveCodeKey" required>
                                                <option class="form-control" name="GloveCodeKey" value="">Product Code</option>
                                            <?php foreach ($fetch as $row) { ?>
                                                <option name="GloveCodeKey" value="<?php echo $row['GloveCodeLong'];?>"><?php echo $row['GloveCodeLong']; }?></option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                          <label>Size</label>

                                              <div class="toolt"><sup><i class="fa fa-info-circle" aria-hidden="true"></i></sup>
                                                  <span class="toolttext">Only select if all pallets have same size*</span>
                                              </div>


                                          <select name="GloveSizeKey[]" class="form-control gloveSizePrimary" ><option value="">Size</option><?php echo size_selection($connect); ?></select>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                          </form>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-13">
                    <div class="panel panel-primary" >
                        <div class="panel-heading">Preset Pallet Details</div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <div class="table-responsive">

                            <!-- <div class="form-inline"> -->
                            <div class="table-repsonsive">
                              <form method="post" id="insert_formB">
                                <span id="error"></span>
                                <table class="table" id="item_table" style="bordered: none;">
                                    <tr>
                                      <th>Size</th>
                                        <th>Sample Size Visual</th>
                                        <th>Sample Size APT/WTT</th>
                                        <th>Acc Hole</th>
                                        <th>Acc Critical NFG</th>
                                        <th>Acc Critical NAG</th>
                                        <th>Acc Major</th>
                                        <th>Acc Minor</th>
                                        <th>Pallet Number</th>
                                        <th><button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus"></span></button></th>
                                    </tr>

                                    <?php
                                    function size_selection($connect)
                                    {
                                      $output = '';
                                      $query = "SELECT * FROM M_GloveSize";
                                      $statement = $connect->prepare($query);
                                      $statement->execute();
                                      $result = $statement->fetchAll();
                                      foreach($result as $row)
                                      {
                                        $output .= '<option value="'.$row["GloveSizeCodeLong"].'">'.$row["GloveSizeCodeLong"].'</option>';
                                      }
                                      return $output;
                                    }

                                    ?>
                                </table>

                                <div align="center">
                                    <input type="submit" name="submit" class="btn btn-info" value="Insert" />
                                </div>
                              </form>
                              <div id="test">

                              </div>
                            </div>
                            <!-- </div> -->

                        </div>
                    </div>
                </div>
            </div>



                        <br>




            <!-- /.table-responsive -->
        </div>
            <!-- /.row -->

            <!-- /.row -->

            <!-- /.row -->

                <!-- /.col-lg-6 -->

                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    </div>
    <div id="test">

    </div>

          <?php   include('script.php'); ?>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>

        var list = 0;
        var _selectedSize = '';
        var sizeRow = '';
        var sizeNew = '';
            $(document).ready(function(){

              newrow();


              $(".gloveSizePrimary").change(function() {
                //console.log(list);
                _selectedSize = $(".gloveSizePrimary").val();
                for (var i = 1; i <= list; i++) {
                //  console.log(i);
                  sizeNew = ".sizeRow"+i;
                  //console.log(sizeNew);
                  //console.log(_selectedSize);
                  if($(sizeNew).val() == ''){
                    $(sizeNew).val(_selectedSize);
                  }
                }
              });

                $(document).on('click', '.add', function(){
                  newrow();
                });


                function newrow(){
                  _selectedSize = $(".gloveSizePrimary").val();
                  if (list < 25){
                    list++;
                    var html = '';
                    html += '<tr>';
                    html += '<td width="100px"><select name="GloveSizeKey[]" class="form-control gloveSizeSub sizeRow'+list+'" ><option value="">Size</option><?php echo size_selection($connect); ?></select></td>';
                    html += '<td><input type="text" name="visual[]" class="form-control sample'+list+'" placeholder="SS Visual"></td>';
                    html += '<td><input type="text" name="sample[]" class="form-control sample'+list+'" placeholder="APT/WTT"></td>';
                    html += '<td><input type="text" name="accFFH[]" class="form-control accFFH'+list+'" placeholder="Acc FFH"></td>';
                    html += '<td><input type="text" name="accNFG[]" class="form-control accNFG'+list+'" placeholder="Acc Critical NFG"></td>';
                    html += '<td><input type="text" name="accNAG[]" class="form-control accNAG'+list+'" placeholder="Acc Critical NAG"></td>';
                    html += '<td><input type="text" name="accMajor[]" class="form-control accMajor'+list+'" placeholder="Acc Major"></td>';
                    html += '<td><input type="text" name="accMinor[]" class="form-control accMinor'+list+'" placeholder="Acc Minor"></td>';
                    html += '<td><input type="text" name="palletNumber[]" class="form-control palletNumber'+list+'" placeholder="Pallet Number" value="'+list+'"></td>';
                    if (list == 1){
                      html += '<td></td></tr>';
                    }else {
                      html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';

                    }
                    $('#item_table').append(html);
                    //console.log(_selectedSize);
                    sizeRow = ".sizeRow"+list;
                    // alert(sizeRow);
                    if(_selectedSize != ''){
                      $(sizeRow).val(_selectedSize);
                    }
                  }else{
                    alert("reached maximum number of pallets");
                  }

                }

                $(document).on('click', '.remove', function(){
                  list -- ;
                    $(this).closest('tr').remove();
                });

                $('#insert_formB').on('submit', function(event){
                    //event.preventDefault();
                    //event.preventDefault();
                    var error = '';

                    var form_dataA = $('#insert_formA').serializeArray();
                    var form_dataB = $(this).serializeArray();
                    console.log(form_dataA);
                    console.log(form_dataB);


                    if(error == '')
                    {

                     $("#test").load("preset_transaction.php",{
                       form_dataA: form_dataA,
                       form_dataB: form_dataB

                     });

                     alert("Data saved!");
                    }
                    else
                    {
                     $('#error').html('<div class="alert alert-danger">'+error+'</div>');
                    }
                });
            });
        </script>
        <style>

.toolt {
    cursor: pointer;
    position: relative;
    display: inline-block;
}

.toolttext {
    opacity: 0;
    z-index: 99;
    color: #bbb;
    width: 190px;
    display: block;
    font-size: 11px;
    padding: 5px 10px;
    border-radius: 3px;
    text-align: center;
    text-shadow: 1px 1px 2px #111;
    background: rgba(51,51,51,0.9);
    border: 1px solid rgba(34,34,34,0.9);
    box-shadow: 0 0 3px rgba(0,0,0,0.5);
    -webkit-transition: all .2s ease-in-out;
    -moz-transition: all .2s ease-in-out;
    -o-transition: all .2s ease-in-out;
    -ms-transition: all .2s ease-in-out;
    transition: all .2s ease-in-out;
    -webkit-transform: scale(0);
    -moz-transform: scale(0);
    -o-transform: scale(0);
    -ms-transform: scale(0);
    transform: scale(0);
    position: absolute;
    right: -165px;
    bottom: 30px;
}

/* triangle punya css */
.toolttext:before,.toolttext:after {
    content: '';
    border-left: 0px solid transparent;
    border-right: 10px solid transparent;
    border-top: 10px solid rgba(51,51,51,0.9);
    position: absolute;
    bottom: -10px;
    left: 10%;
}

.toolt:hover .toolttext,a:hover .toolttext {
    opacity: 1;
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -o-transform: scale(1);
    -ms-transform: scale(1);
    transform: scale(1);
}

        </style>
    </body>
</html>
