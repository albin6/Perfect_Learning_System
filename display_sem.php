<?php
include 'connection.php';

if (isset($_GET['dep_id'])) {
    $dep_id = $_GET['dep_id'];

        // Prepare and execute your SQL query
        $sql = "SELECT sm_id,semester FROM tb_semester WHERE dep_id = '$dep_id'";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            // Handle the SQL query error
            $response = array('error_message' => 'SQL query error');
        } else {
            // Fetch the data into an array
            $data = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            // Close the database connection
            mysqli_close($conn);

            // Return the data as JSON
            header('Content-Type: application/json');
            echo json_encode($data);
            return;
        }
   
} else {
    $response = array('error_message' => 'dep_id not provided');
}

// Return the error response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>


<!-- function semester(){
$dep_id = request.GET.get("dep_id")
$sem = "select * from tb_semester where dep_id='$dep_id'"

return JsonResponse(list($sem.values('sm_id', 'semester')), safe = False)
}
?> -->