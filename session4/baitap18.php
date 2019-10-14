<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <?php
        error_reporting( ~E_NOTICE ); // avoid notice
        require_once 'connect.php';
        $sql18a = "ALTER TABLE users ADD avatar varchar(255) ";
        if (mysqli_query($connect, $sql18a) == TRUE){
            echo "Updated success";
        } else {
            echo "Error creating database: " . mysqli_error($connect);
        }


        if(isset($_POST['submit']))
        {
            $userId = $_POST['user_id'];// user name
            $name = $_POST['user_name'];// user email

            $imgFile = $_FILES['user_image']['name'];
            $tmp_dir = $_FILES['user_image']['tmp_name'];
            $imgSize = $_FILES['user_image']['size'];


            if(empty($userId)){
                $errMSG = "Please Enter Id.";
            }
            else if(empty($name)){
                $errMSG = "Please Enter Username.";
            }
            else if(empty($imgFile)){
                $errMSG = "Please Select Image File.";
            }
            else
            {
                $upload_dir = '../images/'; // upload directory

                $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

                // valid image extensions
                $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

                // rename uploading image
                $userpic = $name . $userId . "." .$imgExt;

                // allow valid image file formats
                if(in_array($imgExt, $valid_extensions)){
                    // Check file size '5MB'
                    if($imgSize < 5000000)    {
                        move_uploaded_file($tmp_dir,$upload_dir.$userpic);
                    }
                    else{
                        $errMSG = "Sorry, your file is too large.";
                    }
                }
                else{
                    $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                }
            }

            // if no error occured, continue ....
            if(!isset($errMSG))
            {
                $sqlAvatar = "UPDATE users SET avatar = '$userpic' WHERE id LIKE '$userId'";
                if (mysqli_query($connect, $sqlAvatar) == TRUE){
                    echo "Update avatar has been success";
                } else {
                    echo "Error creating database: " . mysqli_error($connect);
                }
                mysqli_close($connect);
            }
            echo '<br>';
            echo $userpic;
            echo '<br>';
            echo $userId;
        }
        ?>
</head>
<body>
    <form method="post" enctype="multipart/form-data" class="form-horizontal">
        <table class="table table-bordered table-responsive">
            <tr>
                <td><label class="control-label">Username.</label></td>
                <td><input class="form-control" type="text" name="user_id" placeholder="Enter Id" value="<?php echo $userId; ?>" /></td>
            </tr>

            <tr>
                <td><label class="control-label">Profession(Job).</label></td>
                <td><input class="form-control" type="text" name="user_name" placeholder="Enter Username" value="<?php echo $name; ?>" /></td>
            </tr>

            <tr>
                <td><label class="control-label">Profile Img.</label></td>
                <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
            </tr>

            <tr>
                <td colspan="2"><button type="submit" name="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-save"></span> &nbsp; save
                    </button>
                </td>
            </tr>

        </table>
    </form>
</body>
<?php

?>