
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
                    <?php echo $_SESSION['level'] ?>  &emsp;
                    <small><i class="fa fa-caret-right"></i> &emsp; 
                        List of members
                        </small>
                    </h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                   
                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                               
                                <div class="x_content">
                                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                                        <thead>
                                            <tr class="headings">
                                                <th>
                                                    <!-- input type="checkbox" class="tableflat" -->
                                                </th>
                                                <th>Service Day</th>
                                                <th>New People</th>
                                                <th>Born Again </th>
                                                <th>Baptized With Water </th>
                                                <th>Baptized With Holy Spirit</th>
                                               
                                                <th>Name of recorder</th>
                                                <th><span> Action</span>
                                                </th>
                                            </tr>
                                        </thead>

                                    <?php
                                    //including the database connection file
                                    include_once("connection.php");
                                    $level = $name = mysql_real_escape_string($_SESSION['level']);

                                    //fetching data in descending order (lastest entry first)
                                    $result = mysql_query("SELECT * FROM weekly_report ORDER BY weekly_reportid DESC");
                                    ?>

                                <?php

                                while($res = mysql_fetch_array($result)) { 
								
								$date=date_create($res['date_of_filling']);
								
                                    echo "<tr class='odd pointer'>";
                                    echo "<td class='a-center'>";
                                    //echo "<input type='checkbox' class='tableflat'> ";
                                    echo "</td>";
                                    echo "<td>".date_format($date," l jS F Y")."</td>";
                                    echo "<td>".$res['NPV']."</td>";
                                    echo "<td>".$res['NPBA']."</td>"; 
                                    echo "<td>".$res['NPBW']."</td>";
                                    echo "<td>".$res['NPBH']."</td>";
                                    echo "<td>".$res['Name_of_recorder']."</td>";  
                                    echo "<td><a class='btn btn-warning btn-xs' href=\"edit_weekly_report.php?weekly_reportid=$res[weekly_reportid]\">

                                    <span class='glyphicon glyphicon-pencil'></span>

                                    </a>

                                    <button type='button' class='btn btn-danger btn-xs' data-toggle='modal' data-target='#myModal-$res[weekly_reportid]'><span class='glyphicon glyphicon-trash'></span></button>

                                        <!-- Modal -->
                                        <div id='myModal-$res[weekly_reportid]' class='modal fade' role='dialog'>
                                          <div class='modal-dialog modal-sm'>

                                            <!-- Modal content-->
                                            <div class='modal-content'>
                                              <div class='modal-header'>
                                                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                                <h4 class='modal-title'>Delete</h4>
                                              </div>
                                              <div class='modal-body'>
                                                <p>Are you sure you want to delete the report of <b> ".date_format($date," l jS F Y")."? </b></p>
                                              </div>
                                              <div class='modal-footer'>
                                                <a href='' class='btn btn-default' data-dismiss='modal'>Close</a>
                                                <a href='delete_weekly_report.php?weekly_reportid=$res[weekly_reportid]' class='btn btn-danger'>Delete</a>
                                              </div>
                                            </div>

                                          </div>
                                        </div>    
                                    </td>";  
                                    echo "</tr>";
                                }
                                ?>
                                       <!-- Trigger the modal with a button -->

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

    
   
      
        <!-- icheck -->
        
        <script src="boot/js/icheck/icheck.min.js"></script>

   
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
                        "sSearch": "Advanced Search:"
                    },
                    "aoColumnDefs": [
                        {
                            'bSortable': false,
                            'aTargets': [0]
                        } //disables sorting for column one
            ],

                    'iDisplayLength': 15,
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