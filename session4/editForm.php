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

</head>
<body>
    <form method="post" enctype="multipart/form-data" class="form-horizontal">
        <table class="table table-bordered table-responsive">

            <tr>
                <td><label class="control-label">Id.</label></td>
                <td><input class="form-control" type="text" name="user_id"  value="<?php echo $id; ?>" /></td>
            </tr>

            <tr>
                <td><label class="control-label">Username.</label></td>
                <td><input class="form-control" type="text" name="user_name"  value="<?php echo $name; ?>" /></td>
            </tr>

            <tr>
                <td><label class="control-label">Phone.</label></td>
                <td><input class="form-control" type="text" name="phone"  value="<?php echo $phone; ?>" /></td>
            </tr>

            <tr>
                <td><label class="control-label">Email.</label></td>
                <td><input class="form-control" type="text" name="email"  value="<?php echo $email; ?>" /></td>
            </tr>

            <tr>
                <td><label class="control-label">Birthday.</label></td>
                <td><input class="form-control" type="date" name="birthdate"  value="<?php echo $birthdate; ?>" /></td>
            </tr>

            <tr>
                <td><label class="control-label">Profile Img.</label></td>
                <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
            </tr>

            <tr>
                <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-default">
                        <span class="glyphicon glyphicon-save"></span> &nbsp; save
                    </button>
                </td>
            </tr>

        </table>
    </form>
</body>

<?php
    error_reporting( ~E_NOTICE );
    require_once 'connect.php';

    if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
    {
        $id = $_GET['edit_id'];
        $stmt_edit = $connect->prepare('SELECT * FROM users WHERE id =:uid');
        $stmt_edit->execute(array(':uid'=>$id));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);
    }
    else
    {
        header("Location: index.php");
    }

    if(isset($_POST['btn_save_updates']))
    {
        $id = $_POST['user_id'];// user id
        $name = $_POST['user_name'];// user name
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $birthdate = $_POST['birthdate'];

        $imgFile = $_FILES['user_image']['name'];
        $tmp_dir = $_FILES['user_image']['tmp_name'];
        $imgSize = $_FILES['user_image']['size'];

        if($imgFile)
        {
            $upload_dir = 'user_images/'; // upload directory
            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
            $userpic = rand(1000,1000000).".".$imgExt;
            if(in_array($imgExt, $valid_extensions))
            {
                if($imgSize < 5000000)
                {
                    unlink($upload_dir.$edit_row['userPic']);
                    move_uploaded_file($tmp_dir,$upload_dir.$userpic);
                }
                else
                {
                    $errMSG = "Sorry, your file is too large it should be less then 5MB";
                }
            }
            else
            {
                $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }
        }
        else
        {
            // if no image selected the old image remain as it is.
            $userpic = $edit_row['userPic']; // old image from database
        }


        // if no error occured, continue ....
        if(!isset($errMSG))
        {
            $stmt = $connect->prepare('UPDATE tbl_users 
                  SET userName=:uname, 
                   userProfession=:ujob, 
                   userPic=:upic 
                   WHERE userID=:uid');
            $stmt->bindParam(':uname',$username);
            $stmt->bindParam(':ujob',$userjob);
            $stmt->bindParam(':upic',$userpic);
            $stmt->bindParam(':uid',$id);

            if($stmt->execute()){
                ?>
                <script>
                    alert('Successfully Updated ...');
                    window.location.href='index.php';
                </script>
                <?php
            }
            else{
                $errMSG = "Sorry Data Could Not Updated !";
            }
        }
    }
?>