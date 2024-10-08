<?php
  include_once 'database.php';
  include_once 'session.php';
?>
 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->
  <title>---- | Order Details</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
 
 
 
<?php
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM tbl_order_pasarsiswa WHERE fld_product_id = :pid");
  $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
    $pid = $_GET['pid'];
  $stmt->execute();
  $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
  }
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>

<div class="container-fluid">
  <tr>
    
 
  </tr>

      <div class="panel panel-default">
      <div class="panel-heading"><strong>Order Details</strong></div>
      <div class="panel-body">
          Below are specifications of the order.
      </div>

    <table class="table">
        <tr>
          <td class="col-xs-4 col-sm-4 col-md-4"><strong>Product ID</strong></td>
          <td><?php echo $readrow['fld_product_id'] ?></td>
        </tr>
          
        <tr>
          <td><strong>Name</strong></td>
          <td><?php echo $readrow['fld_product_name'] ?></td> 
        </tr>

        <tr>
          <td><strong>Quantity</strong></td>
          <td><?php echo $readrow['fld_quantity'] ?></td>
        </tr>

        <tr>
    <td><strong>Price</strong></td>
    <td>RM <?php echo number_format($readrow['fld_price'], 2); ?></td>
</tr>

<tr>
    <td><strong>Total Amount</strong></td>
    <td>RM <?php echo number_format($readrow['fld_amount'], 2); ?></td>
</tr>
      </table>
      </div>
    </div>
  </div>
</div>
 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
 
</body>
</html>

