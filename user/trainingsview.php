<?php include('userheader.php'); ?>
<?php
    include_once('../controller/connect.php');
    
    $dbs = new database();
    $db = $dbs->connection();

    $page = "";
    $EmpId = $_SESSION['User']['EmployeeId'];

    // Retrieve total number of records
    $SearchName = isset($_GET['search']) ? $_GET['search'] : '';
    $total_query = mysqli_query($db, "SELECT COUNT(Detail_Id) as total FROM trainingdetails WHERE EmpId = '$EmpId' AND TrainingType LIKE '%$SearchName%'"); 
    $total_result = mysqli_fetch_array($total_query);
    $total_records = $total_result['total'];

    $RecordeLimit = 10;

    // Retrieve data based on EmpId
    $sql = mysqli_query($db, "SELECT * FROM trainingdetails WHERE EmpId = '$EmpId' AND TrainingType LIKE '%$SearchName%' LIMIT $RecordeLimit");

    for ($i = 0; $i < ceil($total_records / $RecordeLimit); $i++) {
        $d = $i + 1;
        $page .= "<a href='?bn=$d'>$d</a>&nbsp &nbsp &nbsp";
    }

    if (isset($_POST['delete'])) {
        $employeeid = $_POST['employeeid'];
        mysqli_query($db, "DELETE FROM trainingdetails WHERE Detail_Id = '$employeeid'");
        echo "<script>window.location='trainingsview.php';</script>";
    }
?>
<link rel="stylesheet" type="text/css" href="../css/table-style.css" />
<!-- <link rel="stylesheet" type="text/css" href="css/basictable.css" /> -->
<script type="text/javascript" src="../js/jquery.basictable.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#table').basictable();

        $('#table-breakpoint').basictable({
            breakpoint: 768
        });

        $('#table-swap-axis').basictable({
            swapAxis: true
        });

        $('#table-force-off').basictable({
            forceResponsive: false
        });

        $('#table-no-resize').basictable({
            noResize: true
        });

        $('#table-two-axis').basictable();

        $('#table-max-height').basictable({
            tableWrapper: true
        });
    });
</script>

<div class="validation-form">
    <div>
        <div class="w3l-table-info">
            <h2>Training/Seminar Attended</h2>
            <br>
            <div class="s-12 l-10">
                <form method="GET" action="#">
                    <input type="search-box" style="float: right;" placeholder="Search" value="<?php echo (isset($_GET['search'])) ? $_GET['search'] : ''; ?>" type="text" name="search"><br>
                </form>
                <table id="table">
                    <thead>
                        <tr>
                            <th style="text-transform: capitalize;">Seminar/Training Title</th>
                            <th style="text-transform: capitalize;">Seminar/Training Type</th>
                            <th style="text-transform: capitalize;">Current Status</th>
                            <th style="text-transform: capitalize;">Target Status</th>
                            <th style="text-transform: capitalize;">Date</th>                           
                            <th style="text-transform: capitalize; text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($sql)) { ?>
                            <tr>
                                <td><?php echo $row['TrainingType']; ?></td>
                                <td><?php echo $row['Type_of_seminar_training']; ?></td>
                                <td><?php echo $row['CurrentStatus']; ?></td>
                                <td><?php echo $row['TargetStatus']; ?></td>
                                <td><?php echo $row['date']; ?></td>
                                <td style="text-align: center;">
                                    <form method="POST" action="#">
                                        <input type="hidden" name="employeeid" value="<?php echo $row['Detail_Id']; ?>">
                                        <u><button type="submit" name="delete" class="btn btn-default">Delete</button></u>
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
</div>
<!-- The Modal -->
<div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
</div>

<?php include('userfooter.php'); ?>
<!--image Popup-->
<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById('myImg');
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function () {
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }
</script>
<!--End image Popup -->
