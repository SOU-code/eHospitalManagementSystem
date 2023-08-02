<?php
session_start();
if(isset($_SESSION['admin'])){
    include("../include/connection.php");
}
else{
    header("location:../index.php");
}
$query = "SELECT * FROM doctors WHERE status='pending'";
$result = mysqli_query($connect, $query);
$output = "";
$output .= "
<div class='table-responsive'>
    <table class='table table-bordered'>
        <tr>
            <th>Id</th>
            <th>Fullname</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Specialization</th>
            <th>Gender</th>
            <th>Approve</th>
            <th>Reject</th>
        </tr>";
if (mysqli_num_rows($result) < 1) {
    $output .= "<tr>
        <th colspan='8'>There are no job requests yet.</th>
    </tr>";
}
while ($row = mysqli_fetch_array($result)) {
    $output .= "<tr>
        <td>" . $row['id'] . "</td>
        <td>" . $row['name'] . "</td>
        <td>" . $row['email'] . "</td>
        <td>" . $row['phone'] . "</td>
        <td>" . $row['specialization'] . "</td>
        <td>" . $row['gender'] . "</td>
        <td><button id=" . $row['id'] . " class='btn btn-success approve'>Approve</button></td>
        <td><button id=" . $row['id'] . " class='btn btn-danger reject'>Reject</button></td>
    </tr>";
}
$output .= "
    </table>
</div>
";
echo $output;
?>
