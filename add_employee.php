<?php

$page_title = "Add EMployee";
$css_file = 'style.css';
include_once("./includes/template/header.php");
require_once("./connect_db.php");

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == "POST") {
  $name   = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  $gpa  = filter_var($_POST['gpa'], FILTER_SANITIZE_NUMBER_FLOAT);
  $college  = filter_var($_POST['college'], FILTER_SANITIZE_STRING);
  $dep    = filter_var($_POST['dep'], FILTER_SANITIZE_STRING);

  global $con;

  $stmt = $con->prepare("INSERT INTO employee(name,gpa,college,dep) value(?,?,?,?)");
  $stmt->execute(array($name, $gpa, $college, $dep));

  echo "
    <script>
        toastr.success('Success');
    </script>";
    

  header("Refresh:3;url=add_employee.php");
}

?>
<div class="container text-light mt-5 border py-4 bg-primary shadow-lg p-3 mb-5 bg-body-tertiary rounded">
  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" >
    <div class="container">
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control">
      </div>

      <div class="mb-3">
        <label class="form-label">gpa</label>
        <input type="number" name="gpa" class="form-control">
      </div>

      <div class="mb-3">
        <label class="form-label">college</label>
        <input type="text" name="college" class="form-control">
      </div>

      <div class="mb-3">
        <label class="form-label">department</label>
        <input type="text" name="dep" class="form-control">
      </div>

      <button type="submit" class="btn btn-danger">Submit</button>
    </div>
  </form>
</div>




<?php include_once("./includes/template/footer.php");
?>