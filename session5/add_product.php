<?php ob_start();?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Blank</title>

  <!-- Custom fonts for this template-->
  <link href="css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  <?php include 'common/sidebar.php';?>
  <?php include 'connect.php';?>
  <?php 
    if(isset($_POST['add_product'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $discount = $_POST['discount'];
        $status = $_POST['status'];
        $categories_id= $_POST['categories_id'];
        $created = date("Y-m-d H:i:s");
        $image = 'product_image_default.png';
        $image_file = $_FILES['image'];
        if ($image_file['error'] == 0) {
            $image = $image_file['name'];
            move_uploaded_file($image_file['tmp_name'], 'upload/'.$image);
        }
        $sql = "INSERT INTO products(name, image, description, price, discount, status, categories_id, created) 
                    VALUES ('$name', '$image', '$description', '$price', '$discount', '$status', '$categories_id', '$created')";
        if (mysqli_query($connect, $sql) === TRUE) {
            header("Location: list_product.php");
            }
        }
  ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Blank Page</h1>
            <div class="card o-hidden border-0 shadow-lg my-5">
              <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                  <div class="col-lg-12">
                    <div class="p-5">
                      <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Create a product!</h1>
                      </div>
                      <form class="user" action="#" method="POST" enctype='multipart/form-data'>
                          <div class="form-group">
                          <input type="text" class="form-control form-control-user" name="name" placeholder="Product name">
                          </div>
                          <div class="form-group">
                              <input type="text" class="form-control form-control-user" name="description" placeholder="Description">
                          </div>
                          <div class="form-group">
                          <input type="file" name="image" >
                          </div>
                          <div class="form-group">
                              <input type="text" class="form-control form-control-user" name="price" placeholder="Price">
                          </div>
                          <div class="form-group">
                              <input type="text" class="form-control form-control-user" name="discount" placeholder="Discount">
                          </div>
                          <div class="form-group">
                              <input type="text" class="form-control form-control-user" name="status" placeholder="Status">
                          </div>
                          <div class="form-group col-lg-3">
                              <?php
                                 $sql1 = "SELECT * FROM product_categories ";
                                 $result = mysqli_query($connect, $sql1);
                              ?>
                              <select class="form-control " name="categories_id">
                                  <option value="">Select Category</option>
                                  <?php if ($result->num_rows > 0) { ?>
                                      <?php while ($row = $result->fetch_assoc()) { ?>
                                          <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                  <?php }
                                      }
                                  ?>

                              </select>
                          </div>
                        <input type="submit" name="add_product" value="Add product" class="btn btn-primary btn-user btn-block" >
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="js/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
