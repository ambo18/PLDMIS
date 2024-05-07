<?php include('userheader.php'); ?>

<style>
    .dash-summary {
        display: flex;
        justify-content: space-between;
        width: 83%;
    }

    .dash-panel {
        border: 1px solid #f0efef;
        width: 48%;
        padding: 1em 1em;
        box-shadow: 2px 2px 7px #c8c8c8;
    }

    canvas {
        display: block;
        margin: 0 auto;
    }
</style>

<?php
include_once('../controller/connect.php');
$dbs = new database();
$db = $dbs->connection();
$pending = 0;
$accepted = 0;
$EmpId = $_SESSION['User']['EmployeeId'];

// Technical
$technical_sql = "SELECT * FROM `trainingdetails` WHERE EmpId = '{$EmpId}' AND `Type_of_seminar_training` = 'Technical'";
$technical_qry = mysqli_query($db, $technical_sql);
$technical = $technical_qry->num_rows;

// Managerial
$managerial_sql = "SELECT * FROM `trainingdetails` WHERE EmpId = '{$EmpId}' AND `Type_of_seminar_training` = 'Managerial'";
$managerial_qry = mysqli_query($db, $managerial_sql);
$managerial = $managerial_qry->num_rows;

// Supervisory
$supervisory_sql = "SELECT * FROM `trainingdetails` WHERE EmpId = '{$EmpId}' AND `Type_of_seminar_training` = 'Supervisory'";
$supervisory_qry = mysqli_query($db, $supervisory_sql);
$supervisory = $supervisory_qry->num_rows;

// Foundational
$foundational_sql = "SELECT * FROM `trainingdetails` WHERE EmpId = '{$EmpId}' AND `Type_of_seminar_training` = 'Foundational'";
$foundational_qry = mysqli_query($db, $foundational_sql);
$foundational = $foundational_qry->num_rows;

// Masteral
$masteral_sql = "SELECT * FROM `degreedetails` WHERE EmpId = '{$EmpId}' AND DegreeType = 'Masteral'";
$masteral_qry = mysqli_query($db, $masteral_sql);
$masteral = $masteral_qry->num_rows;

// Doctoral
$doctoral_sql = "SELECT * FROM `degreedetails` WHERE EmpId = '{$EmpId}' AND DegreeType = 'Doctoral'";
$doctoral_qry = mysqli_query($db, $doctoral_sql);
$doctoral = $doctoral_qry->num_rows;
?>

<div class="s-12 l-10">
    <div class="clearfix"></div>
</div>

<div class="s-12 l-10" style="margin-top: 20px; background: #fff;">
    <canvas id="myBarChart" width="800" height="200"></canvas>
</div>

<div class="s-12 l-10" style="margin-top: 20px; background: #fff;">
    <canvas id="masteral_doctoralChart" width="800" height="200"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var ctx = document.getElementById('myBarChart').getContext('2d');
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Technical', 'Managerial', 'Supervisory', 'Foundational'],
            datasets: [{
                label: 'Technical',
                data: [<?= $technical ?>, 0, 0, 0],
                backgroundColor: 'rgba(255, 99, 132, 0.7)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }, {
                label: 'Managerial',
                data: [0, <?= $managerial ?>, 0, 0],
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }, {
                label: 'Supervisory',
                data: [0, 0, <?= $supervisory ?>, 0],
                backgroundColor: 'rgba(255, 206, 86, 0.7)',
                borderColor: 'rgba(255, 206, 86, 1)',
                borderWidth: 1
            }, {
                label: 'Foundational',
                data: [0, 0, 0, <?= $foundational ?>],
                backgroundColor: 'rgba(75, 192, 192, 0.7)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            }
        }
    });
</script>

<script>
    var ctx = document.getElementById('masteral_doctoralChart').getContext('2d');
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Masteral', 'Doctoral'],
            datasets: [{
                label: 'Masteral',
                data: [<?= $masteral ?>, 0, 0, 0],
                backgroundColor: ['rgba(255, 0, 0, 0.7)', 'rgba(154, 205, 50, 0.7)', 'rgba(255, 0, 0, 0.7)', 'rgba(154, 205, 50, 0.7)'],
                borderColor: ['rgba(255, 0, 0, 1)', 'rgba(154, 205, 50, 1)', 'rgba(255, 0, 0, 1)', 'rgba(154, 205, 50, 1)'],
                borderWidth: 1
            }, {
                label: 'Doctoral',
                data: [0, <?= $doctoral ?>, 0, 0],
                backgroundColor: ['rgba(0, 255, 0, 0.7)', 'rgba(0, 255, 0, 0.7)', 'rgba(0, 255, 0, 0.7)', 'rgba(0, 255, 0, 0.7)'],
                borderColor: ['rgba(0, 255, 0, 1)', 'rgba(0, 255, 0, 1)', 'rgba(0, 255, 0, 1)', 'rgba(0, 255, 0, 1)'],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            }
        }
    });
</script>

<?php include('userfooter.php'); ?>
