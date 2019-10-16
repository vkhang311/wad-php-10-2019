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
<boby>
    <div class="row">

            <?php
            error_reporting( ~E_NOTICE ); // avoid notice
            require_once 'dbConfig.php';
            $stmt = $connect->prepare('SELECT id, fullName, email, avatar FROM users ORDER BY id DESC');
            $stmt->execute();
            if($stmt->rowCount() > 0)
            {
                while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                {
                    extract($row);
                    ?>
                    <div class="col-md-2">
                        <p class="page-header"><?php echo $row['fullName']."&nbsp;/&nbsp;" . $row['email']; ?></p>
                        <img src="user_images/<?php echo $row['avatar']; ?>" class="img-rounded" width="250px" height="250px" />
                        <p class="page-header">
                            <span>
                            <a class="btn btn-info" href="editform.php?edit_id=<?php echo $row['id']; ?>" title="click for edit" onclick="return confirm('sure to edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                            <a class="btn btn-danger" href="?delete_id=<?php echo $row['id']; ?>" title="click for delete" onclick="return confirm('sure to delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a>
                            </span>
                        </p>
                    </div>
    </div>
                <?php
            }
        }
        else
        {
            ?>
            <div class="col-xs-12">
                <div class="alert alert-warning">
                    <span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
                </div>
            </div>
            <?php
        }

        ?>
    </div>
    <?php
        if(isset($_GET['delete_id']))
        {
            // select image from db to delete
            $stmt_select = $connect->prepare('SELECT avatar FROM users WHERE id =:uid');
            $stmt_select->execute(array(':uid'=>$_GET['delete_id']));
            $imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
            unlink("../images/".$imgRow['avatar']);

            // it will delete an actual record from db
            $stmt_delete = $connect->prepare('DELETE FROM tbl_users WHERE userID =:uid');
            $stmt_delete->bindParam(':uid',$_GET['delete_id']);
            $stmt_delete->execute();

            header("Location: index.php");
        }
    ?>
</boby>
</html>
