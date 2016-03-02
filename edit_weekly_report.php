
<!DOCTYPE html>
<html lang="en">


<style>

.row{
    margin-top:40px;
    padding: 0 10px;
}

.clickable{
    cursor: pointer;   
}

.panel-heading span {
    margin-top: -20px;
    font-size: 15px;
}

</style>

 
   
   
<?php include "include/header.php"; ?>

<body class="nav-md">

    <div class="container body">

        <div class="main_container">

            <?php include "include/menu.php"; ?>


            <!-- top navigation -->
            <?php include "include/top.php"; ?>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                  
                  
<?php
//including the database connection file
include_once("connection.php");

if(isset($_POST['update'])) {
  
	$weekly_reportid = mysql_real_escape_string($_POST['weekly_reportid']);
    $S_day = mysql_real_escape_string($_POST['S_day']);
    $NPV = mysql_real_escape_string($_POST['NPV']);
    $NPBA =mysql_real_escape_string($_POST['NPBA']);	
    $NPBW =mysql_real_escape_string($_POST['NPBW']);
    $NPBH = mysql_real_escape_string($_POST['NPBH']);
    $Remark = mysql_real_escape_string($_POST['Remark']);
    $Name_of_recorder= mysql_real_escape_string($_POST['Name_of_recorder']);
    $date_of_filling = mysql_real_escape_string($_POST['date_of_filling']);
   
   

    // checking empty fields
    if(empty($S_day)) {
     
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database   
        $result = mysql_query("UPDATE weekly_report SET S_day='$S_day',NPV='$NPV',NPBA='$NPBA',NPBW='$NPBW',NPBH='$NPBH',Remark='$Remark',Name_of_recorder='$Name_of_recorder',date_of_filling='$date_of_filling' WHERE weekly_reportid=$weekly_reportid");
        
        //Insert the action in the database
        $query_action = mysql_query(" INSERT INTO actions ( action_name,user,level,note) VALUES('Add weekly report','".$_SESSION['valid']."','".$_SESSION['level']."','Counsellor added Weekly on the : $S_day') ");

        //display success message
        echo "  
            <div class='alert alert-success'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Weekly report </strong> edited succesfully !
            </div>

            ";

            //header("Location:view_visitor.php");

    }
}

?>
<?php

//getting id from url
$weekly_reportid= $_GET['weekly_reportid'];

//selecting data associated with this particular id
$result = mysql_query("SELECT * FROM weekly_report WHERE weekly_reportid=$weekly_reportid");

while($res = mysql_fetch_array($result))
{
  $weekly_reportid = $res['weekly_reportid'];
   $S_day = $res['S_day'];
    $NPV = $res['NPV'];
    $NPBA =$res['NPBA'];	
    $NPBW =$res['NPBW'];
    $NPBH = $res['NPBH'];
    $Remark = $res['Remark'];
    $Name_of_recorder= $res['Name_of_recorder'];
    $date_of_filling = $res['date_of_filling'];

}

?>
                  
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                              
                                    <p style="margin-top:-50px;">
                                    <h2>EDIT WEEKLY REPORT FORM&emsp;<small> <i class="fa fa-caret-right"></i> &emsp; Perez Chapel International</small></h2>
                               
                                <div class="x_content">
                                    <br />
                                    <form id="form1" method="post" enctype="multipart/form-data" action="" data-parsley-validate class="form-horizontal form-label-left">



        <!--  First panel  -->
                                  
      <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Fill Report</h3>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span>
                </div>
                <div class="panel-body">

<div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Day<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                                      <div class="form-group">
                                            
                                        <select class="select2_single form-control" name="S_day" tabindex="-1">
                                          <option value="<?php echo $S_day;?>">Jeudi</option>
                                                <option value="Jeudi">Jeudi</option>
												 <option value="Dimanche">Dimanche</option>
												  
                                              
                                                </select>
                                                    </div>
                                                </div>
                                              </div> 
            

                                         <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">No. of new people(Visitors)<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                                      <div class="form-group">
                                            
                                        <select class="select2_single form-control" name="NPV" tabindex="-1">
<option value="<?php echo $NPV;?>"></option>
                                                <option value="1">1</option>
												 <option value="2">2</option>
												  <option value="3">3</option>
												   <option value="4">4</option>
												    <option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="8">8</option>
													<option value="9">9</option>
													<option value="10">10</option>
                                              
                                                </select>
                                                    </div>
                                                </div>
                                              </div> 
											  
											  
											  <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">No. of people who are born again<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                                      <div class="form-group">
                                            
                                        <select class="select2_single form-control" name="NPBA" tabindex="-1">
<option value="<?php echo $NPBA;?>">1</option>
                                                   <option value="1">1</option>
												 <option value="2">2</option>
												  <option value="3">3</option>
												   <option value="4">4</option>
												    <option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="8">8</option>
													<option value="9">9</option>
													<option value="10">10</option>
                                              
                                                </select>
                                                    </div>
                                                </div>
                                              </div>
											  
											   <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">No. of people batized in water<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                                      <div class="form-group">
                                            
                                        <select class="select2_single form-control" name="NPBW" tabindex="-1">
<option value="<?php echo $NPBW;?>">1</option>
                                                   <option value="1">1</option>
												 <option value="2">2</option>
												  <option value="3">3</option>
												   <option value="4">4</option>
												    <option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="8">8</option>
													<option value="9">9</option>
													<option value="10">10</option>
                                              
                                                </select>
                                                    </div>
                                                </div>
                                              </div>

											  <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">No. of people baptized in the Holy Spirit<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-2 col-sm-6 col-xs-12">
                                                      <div class="form-group">
                                            
                                        <select class="select2_single form-control" name="NPBH" tabindex="-1">
 <option value="<?php echo $NPBH;?>">1</option>
                                                   <option value="1">1</option>
												 <option value="2">2</option>
												  <option value="3">3</option>
												   <option value="4">4</option>
												    <option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="8">8</option>
													<option value="9">9</option>
													<option value="10">10</option>
                                              
                                                </select>
                                                    </div>
                                                </div>
                                              </div>
											  
										<div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Remark <span class="required">*</span>
                                            </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <textarea class="form-control" name="Remark" rows="3" placeholder="Add a note" value="<?php echo $Remark;?>"></textarea>
                                            </div>
                                        </div>
										
										
                                    <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name of Recorder <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="first-name" name="Name_of_recorder" required="" title="Please enter your Firstname" class="form-control col-md-7 col-xs-12" value="<?php echo $Name_of_recorder;?>">
                                            </div>
                                        </div>
										 
										 <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Date<span class="required">*</span>
                                            </label>
            <div class="col-md-3 col-sm-3 col-xs-12">
        <input type="text" class="form-control" name="date_of_filling" value="<?php echo $date_of_filling;?>" id="date" data-toggle="datepicker" data-select="datepicker" readonly>
       <button type="button" class="btn btn-primary" data-toggle="datepicker"><i class="fa fa-calendar"></i></button>
            </div>
        
    </div>
                                        
                                        

                                   

                                           


                                              

              
                         
                </div>
        </div>


                            </div>

                                   <center> <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <a href="view_visitor.php"><div class="btn btn-round btn-warning">Cancel </div></a>
                                                <button type="submit" name="update" class="btn btn-round btn-success"> Save visitor </button>
                                            </div>
                                        </div>

                                    </form>
                                        </center>

                                             
                                     
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>

                        <br />
                        <br />
                        <br />

                    </div>
                </div>
                    <!-- footer content -->
              
                <!-- /footer content -->
                    
                </div>
                <!-- /page content -->
            </div>

        </div>

        <div id="custom_notifications" class="custom-notifications dsp_none">
            <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
            </ul>
            <div class="clearfix"></div>
            <div id="notif-group" class="tabbed_notifications"></div>
        </div>
  <?php include "include/scripts.php"; ?>

    <!--country ends here -->

   

</body>

</html>