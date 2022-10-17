    <?php

include("../includes/controller.php");
include("../includes/uFunctions.php");
$form = new Form;

$target_dir = "../files/midia/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);


if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.$_FILES['file']['name'])) {
    $status = 1;
}
?>