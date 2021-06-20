<?php
if ($_GET['randomId'] != "w9dr4fNaXiASHC2_WttFNT9YoFIyJ9UUFH6WzmmPhXox7jF1WocnHWj6SVyttrhp") {
    echo "Access Denied";
    exit();
}

// display the HTML code:
echo stripslashes($_POST['wproPreviewHTML']);

?>  
