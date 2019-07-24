<?php
 if ( isset($_POST["submit"]) ) {

   if ( isset($_FILES["file"])) {

            //if there was an error uploading the file
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";

        }
        else {
                 //Print file details
             echo "<b>Upload </b>" . $_FILES["file"]["name"] . " successfully!<br /> Browser the <a href=\"register.php\">menu</a>.";
             //echo "Type: " . $_FILES["file"]["type"] . "<br />";
             //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
             //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

                 //if file already exists
             /*
             if (file_exists("upload/" . $_FILES["file"]["name"])) {
            echo $_FILES["file"]["name"] . " already exists. ";
             }
             else {
             */
            //Store file in directory "upload" with the name of "uploaded_file.txt"
            $storagename = "register.csv";
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $storagename);
            //echo "Stored in: " . "upload/" . $_FILES["file"]["name"] . "<br />";
        }
     } else {
             echo "No file selected <br />";
     }
}