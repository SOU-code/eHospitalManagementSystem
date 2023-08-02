<?php
session_start();
if(isset($_SESSION['admin'])){
    include("../include/connection.php");
}
else{
    header("location:../index.php");
}
$query = "SELECT * FROM doctors WHERE status='approved'";
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
            <th>Salary</th>
            <th>Update</th>
            <th>Delete</th>
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
        <td>" . $row['salary'] . "</td>
        <td>
            <a href='update_doctor.php?id=" . $row['id'] . "' ><button class='btn btn-warning'>Update</button></a>
        </td>
        <td>
            <a href='delete_doctor.php?id=" . $row['id'] . "' ><button class='btn btn-danger'>Delete</button></a>
        </td>
    </tr>";
}
$output .= "
    </table>
</div>
";
echo $output;
?>
