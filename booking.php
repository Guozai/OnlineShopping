<?php
session_start();
include_once("modules.php");
topModule('booking');
?>

<style>
.wrong {color: red;}
.bookingform {
  width: 300px;
  background: transparent;
  border: none;
  outline: none;
  border-bottom: 1px solid black;
  color: black;
  font-size: 18px;
  margin-bottom: 16px;
  margin-left:5%;
}
.bookingbutton{
  width: 100px;
  font-size: 25px; 
  
}
</style>

<?php  $_SESSION['booking'] = array (
        "aid" => $_POST["aid"],
        "date" => $_POST["date"],
        "days" => $_POST["days"],
        "adults" => $_POST["adults"],
        "children" => $_POST["children"],
    );

  if(isset($_SESSION['booking'])){
    $sitePriceList = array("US"=>35.25, "UM"=>40.50, "PS"=>50.25, "PM"=>60.50, "C"=>100.00);
    $aid = $_SESSION['booking']["aid"];
    $adults = $_SESSION['booking']['adults'];
    $children = $_SESSION['booking']['children'];
    $days = $_SESSION['booking']['days'];
    $pernightPrice = $sitePriceList["$aid"];
    $extraAdult=10;
    $extraChild=5;
    
    $numberOfPeople = $adults + $children;

    if($aid == "C"){
      $extraAdult=0;
      $extraChild=0;
    }

    if ($numberOfPeople > 2 && $adults >= 2) {
      $totalPrice = ($pernightPrice + $extraAdult * ($adults - 2) + $extraChild * $children) * $days;
      $GST = $totalPrice / 11;
    }
    else if ($numberOfPeople > 2 && $adults == 1) {
      $totalPrice = ($pernightPrice + $extraAdult * ($adults - 1) + $extraChild * ($children - 1)) * $days;
      $GST = $totalPrice / 11;
    }
    else if ($numberOfPeople <= 2) {
      $totalPrice = $pernightPrice * $days;
      $GST = $totalPrice / 11;
    }
  }
  function type($aid){
    switch ($aid){
        case "US":
           echo "Unpowered Small Site";
           break;
        case "UM":
            echo "Unpowered Medium Site";
            break;
        case "PS":
            echo "Powered Small Site";
            break;
        case "PM":
            echo "Powered Medium Site";
            break;
        case "C":
            echo "Caravan Sites";
            break;
    }

}
  ?>
<body>

  <?php
  $errorCount = 0;
  $nameError = $emailError = $phoneError = "";
  $name = $email = $phone = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {
      $nameError = "Name is required";
      $errorCount++;
    }
    else {
      $name = test_input($_POST["name"]);
      if (!preg_match("/^(?=.*[A-Za-z])([A-Za-z '.-]*)$/", $name)) {
        $nameError = "Only letters along with space ' - . punctuation characters allowed";
        $errorCount++;
      }
    }

    if (empty($_POST["email"])) {
      $emailError = "Email is required ";
      $emailError++;
    }
    else {
      $email = test_input($_POST["email"]);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid email format";
        $errorCount++;
      }
    }

    if (empty($_POST["phone"])) {
      $phoneError = "Mobile Phone is required";
      $errorCount++;
    }
    else {
      $phone = test_input($_POST["phone"]);
      if (!preg_match("/^(\(04\)|04|\+614)([ ]?\d){8}$/",$phone)) {
        $phoneError = "only Australia mobile number allowed";
        $errorCount++;
      }
    }
    if ($errorCount <= 0){
        $nameError = $emailError = $phoneError = "";
    }
  }
  function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  ?>

  <main>
    <h2 style="text-align: center; padding-top: 5%; padding-bottom: 3%;">Your Booking Information</h2>
    <table style="margin:auto;">
      <tr>
        <th>Accommodation Type: </th>
        <th><?php type($_SESSION["booking"]["aid"])?></th>
      </tr>
      <tr>
        <th>Arrival Date: </th>
        <th><?php echo $_SESSION["booking"]["date"]; ?></th>
      </tr>
      <tr>
        <th>Number of Days: </th>
        <th><?php echo $_SESSION["booking"]["days"]; ?></th>
      </tr>
      <tr>
        <th>Number of Adults: </th>
        <th><?php echo $_SESSION["booking"]["adults"]; ?></th>
      </tr>
      <tr>
        <th>Number of Children: </th>
        <th><?php echo $_SESSION["booking"]["children"]; ?></th>
      </tr>
      <tr>
        <th>Total Price: </th>
        <th>$<?php echo number_format($totalPrice, 2);?></th>
      </tr>
      <tr>

        <th>GST included: </th>
        <th>$<?php echo number_format($GST, 2);?></th>
      </tr>
    </table>

    <h2 style="text-align: center; padding-top: 5%; padding-bottom: 3%;">Customer Information</h2>
    <form id="customerform" name="customerBookingForm" method="post" action="receipt.php" style="margin:50px;text-align:center;">
    <input type='hidden' id='totalprice' name='totalprice' value="<?php echo number_format($totalPrice, 2);?>">
    <input type='hidden' id='GST' name='GST' value="<?php echo number_format($GST, 2);?>">
    <p>Name: <input type="text" id="name" name="name" class="bookingform" pattern="(?=.*[A-Za-z])([A-Za-z '.-]*)" title="only contain alphabetic characters along with the space ' - . punctuation characters" ></p>
    <span class="wrong"><?php echo $nameError;?></span>
    <p>Email: <input type="email" id="email" name="email" class="bookingform" ></p>
    <span class="wrong"><?php echo $emailError;?></span>
    <p>Mobile Number: <input type="tel" id="phone" name="phone" class="bookingform" pattern="(\(04\)|04|\+614)([ ]?\d){8}" title="only australia mobile number"></p>
    <span class="wrong"><?php echo $phoneError;?></span><br>
    <input type="button" name="cancel" value="cancel" onClick="window.location='accommodation.php';">
    <input type="submit" name="submitted" value="confirm">
    </form>

    <script>
    document.getElementById("name").value = localStorage.getItem("name");
    document.getElementById("phone").value = localStorage.getItem("phone");
    document.getElementById("email").value = localStorage.getItem("email");
  </script>
   
    
  </main>
  <?php
    endModule();
  ?>