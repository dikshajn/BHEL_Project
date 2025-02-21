<?php
define('TITLE', 'Requests');
define('PAGE', 'Requests');
include('../dbconnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])) {
    $aEmail = $_SESSION['aEmail'];
} else {
    echo "<script> location.href='AdminLogin.php'</script>";
}
include('Includes/AdminHeader.php');
?>
<!-- Start 2nd Column -->
<div class="col-sm-4 offset-sm-2">
    <?php
    $sql = "SELECT request_id, request_info, request_desc, request_date FROM submitmaintenancerequest_tb";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div class="card mt-5 mx-5">';
                echo '<div class="card-header">';
                    echo 'Request ID : '. $row['request_id'];
                echo '</div>';
                echo '<div class="card-body">';
                    echo '<h5 class="card-title">Request Info : ' . $row['request_info'] . '</h5>';
                    echo '<p class="card-text">' . $row['request_desc'] . '</p>';
                    echo '<p class="card-text">Request Date: ' . $row['request_date'] . '</p>';
                echo '<div class="float-right">';
                    echo '<form action="" method="POST">';
                        echo '<input type="hidden" name="id" value='.$row["request_id"].'>';
                        echo '<input type="submit" class="btn btn-danger mr-3" value="View" name="view">';
                        echo '<input type="submit" class="btn btn-secondary" name="close" value="Close">';
                    echo '</form>';
                echo '</div>' ;
            echo '</div>' ;
        echo'</div>';
        }
    }
    ?>

</div>
<!-- End 2nd Column -->

<?php
include('assignmaintenanceworkform.php');
include('Includes/AdminFooter.php');
?>