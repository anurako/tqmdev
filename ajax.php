<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hrdb_regiscom";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
mysqli_set_charset($conn,"utf8");
$requestData= $_REQUEST;

$columns = array( 
 0 => "&gt;item_name", 
 1 => "&gt;item_model",
 2 => "&gt;item_brand",
 3 => "&gt;test"
);

$sql = "select item_name, item_model, item_brand from log_item";
$query=mysqli_query($conn, $sql) or die("user-grid-data.php: get employees");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;

$sql = "select item_name, item_model, item_brand ";
$sql.=" FROM log_item  ";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
 $sql.="where ( item_name LIKE '".$requestData['search']['value']."%' ";    
 $sql.=" OR item_model LIKE '".$requestData['search']['value']."%' ";

 $sql.=" OR item_brand LIKE '".$requestData['search']['value']."%' )";
}
$query=mysqli_query($conn, $sql) or die("user-grid-data.php: get employees");
$totalFiltered = mysqli_num_rows($query);

$sql.=" ORDER BY item_name asc LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
 $nestedData=array(); 
 $nestedData[] = $row["item_name"];
 $nestedData[] = $row["item_model"];
 $nestedData[] = $row["item_brand"];
 $nestedData[] = $requestData["test"];
 $data[] = $nestedData;
}

$json_data = array(
   "draw" => intval( $requestData['draw'] ),
   "recordsTotal" => intval( $totalData ),  // total number of records
   "recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
   "data"            => $data   // total data array
   );

echo json_encode($json_data);  // send data as json format

?>