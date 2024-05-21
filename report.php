<?php include('header.php');?>
<?php
    include_once('controller/connect.php');
  
    $dbs = new database();
    $db = $dbs->connection();

?>
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery first -->
<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> <!-- DataTables -->

<ol class="breadcrumb" style="margin: 10px 0px ! important;">
    <li class="breadcrumb-item"><a href="Home.php">Home</a><i class="fa fa-angle-right"></i>Reports</li>
</ol>

<div class="validation-form">
    <div>
        <div class="w3l-table-info">
            <h2>Reports</h2>
            <br>
            <div class="s-12 l-10">
                    <center>
                    <table id="table">
                        <tbody>
                            <tr>
                                <td>Training/ Seminar</td>
                                <td style="text-align: right;">
                                    <form method="POST" action="#">
                                        <u><button class="btn export-button" data-type="TrainingSeminar"><a onclick="Export()"><i class="fa fa-file" title="Export"></i><span>Export</span></a></button></u>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>Doctoral/ Masteral</td>
                                <td style="text-align: right;">
                                    <form method="POST" action="#">
                                        <u><button class="btn export-button" data-type="DoctoralMasteral"><a onclick="Export2()"><i class="fa fa-file" title="Export"></i><span>Export</span></a></button></u>
                                    </form>
                                </td> 
                            </tr>
                            <tr>
                                <td>Training Requests</td>
                                <td style="text-align: right;">
                                    <form method="POST" action="#">
                                        <u><button class="btn export-button" data-type="TrainingNeed"><a onclick="Export3()"><i class="fa fa-file" title="Export"></i><span>Export</span></a></button></u>
                                    </form>
                                </td> 
                            </tr>
                        </tbody>
                    </table>
                </center>
            </div>
        </div>
    </div>
</div>
</div>

<?php include('footer.php'); ?>

<script type="text/javascript">
    $(document).ready(function () {
        $('#table').basictable();

        $('.export-button').click(function() {
            var type = $(this).data('type');
            Export(type);
        });

        // Initialize DataTables
        $('#table').DataTable();
    });

    function Export() {
        var conf = confirm("Export all records to CSV?");
        var stmt = "SELECT EmpId, TrainingType, Type_of_seminar_training, Location, SponsorAgency, Category, date FROM trainingdetails";
        var tblHeader = 'Employee Name,Seminar/Training Name, Seminar/Training Type,Address,Sponsor,Category,Date';
        var fileName = "Seminar/Training Records";
        if (conf) {
            window.open(`export.php?query=${stmt}&tblHeader=${tblHeader}&fileName=${fileName}`, '_blank');
        }
    }

    function Export2() {
        var conf = confirm("Export all records to CSV?");
        var stmt = "SELECT EmpId, DegreeName, DegreeType, Units, Location, YearCompleted FROM degreedetails";
        var tblHeader = 'Employee Name,Degree Type,Degree Type, Units, Address, Year Completed';
        var fileName = "Doctoral/Masteral Records";
        if (conf) {
            window.open(`export.php?query=${stmt}&tblHeader=${tblHeader}&fileName=${fileName}`, '_blank');
        }
    }

    function Export3() {
        var conf = confirm("Export all records to CSV?");
        var stmt = "SELECT EmpId, TrainingType, Type_of_seminar_training, Semester FROM training_need";
        var tblHeader = 'Employee Name,Seminar/Training Name, Seminar/Training Type, Semester';
        var fileName = "Employee Training Requests Records";
        if (conf) {
            window.open(`export.php?query=${stmt}&tblHeader=${tblHeader}&fileName=${fileName}`, '_blank');
        }
    }

</script>
