

<!DOCTYPE html>
<html lang="en">

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
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
                    Departments  &emsp;
                    <small><i class="fa fa-caret-right"></i> &emsp;
                        List of all departments in the church
                    </small>
                </h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
					
					
					
					
					
					

                   <div class="row-fluid">
                    <div class="span12">                

                        <div class="block">
                            <div class="data invoice">
<?php
							
							$id = $_GET['weekly_reportid'];
                           
							$query=mysql_query("select * from weekly_report WHERE weekly_reportid='$id'");
							$row=mysql_fetch_array($query);
							$date=date_create($row['date_of_filling']);
							?>
							 
                                <div class="row">
                                   
                                    <div style="text-align:center"  class="col-md-12 col-sm-4 col-xs-12">
                                        <h4>Perez Chapel International</h4>
                                        <p>
                                            <h6>French Church</h6><br>
                                            Report Of The <?php echo date_format($date," l jS F Y");?><br>	
                                            Recorded By <?php echo $row['Name_of_recorder'];?><br>
                                            <abbr title="Phone">Tel:</abbr> +38 (123) 456-7890
                                        </p>                                
                                    </div>
                                    <div class="span3"></div>
                                  
                                </div>

                            
                                <p>Who Visited</p>

                                <table class="table" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="40%">New People</th>
                                            <th width="20%">Born Again</th>
                                            <th width="20%">Baptized with water</th>
                                            <th width="20%">Baptized with Holy Spirit</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        <tr>
                                            <td><?php echo $row['NPV'];?></td>
                                            <td><?php echo $row['NPBA'];?></td>
                                            <td><?php echo $row['NPBW'];?></td>
                                            <td><?php echo $row['NPBH'];?></td>
                                        </tr>
                                                                           
                                    </tbody>
                                </table>

                                <div class="row-fluid">
                                    <div class="span9"></div>
                                    <div class="span3">
                                        <div class="total">
                                           
                                            <div class="highlight">
                                                <strong><span>Remark:</span> <?php echo $row['Remark'];?></strong> 
                                            </div>  
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>    

                    </div>
                </div>
                </div>
                    <!-- footer content -->
             
                    
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

   
   
        <!-- bootstrap progress js -->
        <script src="boot/js/progressbar/bootstrap-progressbar.min.js"></script>
        <script src="boot/js/nicescroll/jquery.nicescroll.min.js"></script>
        <!-- icheck -->
        <script src="boot/j/icheck/icheck.min.js"></script>

   
        <!-- Datatables -->
        <script src="boot/js/datatables/js/jquery.dataTables.js"></script>
        <script src="boot/js/datatables/tools/js/dataTables.tableTools.js"></script>

        <script>
            $(document).ready(function () {
                $('input.tableflat').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'
                });
            });

            var asInitVals = new Array();
            $(document).ready(function () {
                var oTable = $('#example').dataTable({
                    "oLanguage": {
                        "sSearch": "Search all columns:"
                    },
                    "aoColumnDefs": [
                        {
                            'bSortable': false,
                            'aTargets': [0]
                        } //disables sorting for column one
            ],
                    'iDisplayLength': 12,
                    "sPaginationType": "full_numbers",
                    "dom": 'T<"clear">lfrtip',
                    "tableTools": {
                        "sSwfPath": "boot/js/datatables/tools/swf/copy_csv_xls_pdf.swf",
                            "aButtons": [
        {
            "sExtends": "copy",
            "oSelectorOpts": { filter: 'applied', order: 'current' }
        },
        {
            "sExtends": "xls",
            "oSelectorOpts": { filter: 'applied', order: 'current' },
            "sFileName": "PCI-EgliseFrancphone.xls"
        },
        {
            "sExtends": "pdf",
            "oSelectorOpts": { filter: 'applied', order: 'current' },
            "sFileName": "PCI-EgliseFrancphone.pdf",
            "sPdfOrientation": "landscape",
            "sPdfMessage": "Account List" + ($('div.dataTables_filter input').length > 0 ? " Filter: " + $('div.dataTables_filter input').val() : "")
        },
        {
            "sExtends": "print",
            "oSelectorOpts": { filter: 'applied', order: 'current' },
        }
        ]



                    }
                });
                $("tfoot input").keyup(function () {
                    /* Filter on the column based on the index of this element's parent <th> */
                    oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
                });
                $("tfoot input").each(function (i) {
                    asInitVals[i] = this.value;
                });
                $("tfoot input").focus(function () {
                    if (this.className == "search_init") {
                        this.className = "";
                        this.value = "";
                    }
                });
                $("tfoot input").blur(function (i) {
                    if (this.value == "") {
                        this.className = "search_init";
                        this.value = asInitVals[$("tfoot input").index(this)];
                    }
                });
            });
        </script>

        <?php include "include/scripts.php"; ?>
</body>

</html>