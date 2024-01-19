<?php
ob_start();
include '../connection.php';
$dep_id = $_GET['dep_id'];
$sm_id = $_GET['sm_id'];
$sql = mysqli_query($con,"select * from tb_student_register where dep_id='$dep_id' and sm_id='$sm_id'");

echo '<div class="col-lg-12">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Students List</h5>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Email</th>
                  </tr>
                </thead>
                <tbody>';
                $c = 1;
                while($r=mysqli_fetch_array($sql)) { 
                    echo "<tr>";
                    echo "<td>" . $c. "</td>";
                    echo "<td>" . $r['name'] . "</td>";
                    echo "<td>" . $r['address'] . "</td>";
                    echo "<td>" . $r['contact_no'] . "</td>";
                    echo "<td>" . $r['email'] . "</td>";
                    echo "</tr>";
                  }
                echo '</tbody>
              </table>            
            </div>
        </div>
    </div>';
?>