<?php include('userheader.php'); ?>
<?php
    include_once('../controller/connect.php');
    
    $dbs = new database();
    $db = $dbs->connection();

    $page = "";
    $EmpId = $_SESSION['User']['EmployeeId'];

    // Retrieve total number of records
    $SearchName = isset($_GET['search']) ? $_GET['search'] : '';
    $total_query = mysqli_query($db, "SELECT COUNT(Detail_Id) as total FROM degreedetails WHERE EmpId = '$EmpId' AND DegreeType LIKE '%$SearchName%'"); 
    $total_result = mysqli_fetch_array($total_query);
    $total_records = $total_result['total'];

    $RecordeLimit = 10;

    // Retrieve data based on EmpId
    $sql = mysqli_query($db, "SELECT * FROM degreedetails WHERE EmpId = '$EmpId' AND DegreeType LIKE '%$SearchName%' LIMIT $RecordeLimit");

    for ($i = 0; $i < ceil($total_records / $RecordeLimit); $i++) {
        $d = $i + 1;
        $page .= "<a href='?bn=$d'>$d</a>&nbsp &nbsp &nbsp";
    }

    if (isset($_POST['delete'])) {
        $degree_id = $_POST['degree_id'];
        mysqli_query($db, "DELETE FROM degreedetails WHERE Detail_Id = '$degree_id'");
        echo "<script>window.location='degreesview.php';</script>";
    }
?>
<link rel="stylesheet" type="text/css" href="../css/table-style.css" />
<script type="text/javascript" src="../js/jquery.basictable.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#table').basictable();
    });
</script>

<div class="validation-form">
    <div>
        <div class="w3l-table-info">
            <h2>Degrees</h2>
            <br>
            <div class="s-12 l-10">
                <form method="GET" action="#">
                    <input type="search-box" style="float: right;" placeholder="Search" value="<?php echo (isset($_GET['search'])) ? $_GET['search'] : ''; ?>" type="text" name="search"><br>
                </form>
                <table id="table">
                    <thead>
                        <tr>
                            <th style="text-transform: capitalize;">Degree Type</th>
                            <th style="text-transform: capitalize;">Degree Name</th>
                            <th style="text-transform: capitalize;">Year Completed</th>
                            <th style="text-transform: capitalize; text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($sql)) { ?>
                            <tr>
                                <td><?php echo $row['DegreeType']; ?></td>
                                <td><?php echo $row['DegreeName']; ?></td>
                                <td><?php echo $row['YearCompleted']; ?></td>
                                <td style="text-align: center;">
                                    <form method="POST" action="#">
                                        <input type="hidden" name="degree_id" value="<?php echo $row['Detail_Id']; ?>">
                                        <button type="submit" name="delete" class="btn btn-default">Delete</button>
                                        <button type="button" onclick="printTableRow(<?php echo $row['Detail_Id']; ?>)" class="btn btn-default"><i class="fa fa-print" style="color: #2ecc71;" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div><?php echo $page; ?></div>
        </div>
    </div>
</div>
<?php include('userfooter.php'); ?>
<script>
    function printTableRow(detailId) {
        // You can customize this URL based on your actual file structure
        var printUrl = 'print_degree.php?detailId=' + detailId;
        window.open(printUrl, '_blank');
    }
</script>
