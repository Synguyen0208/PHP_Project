<?php
require "funtion.php";
session_start();
if(!isset($_SESSION['user_admin']))
header("location: Pages/login.php");
if(array_key_exists('logout', $_POST)){
    unset($_SESSION['user_admin']);
    header("location: Pages/login.php");
}
$conn=new connect_database("php_project");
// error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../js/bootstrap.bundle.js">
    <link rel="stylesheet" href="../js/bootstrap.min.js">
    <script src="../js/function.js"></script>
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">ADMIN</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <form action="" method="post">
                            <button class="dropdown-item" name="logout">Logout</button>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="../index.PHP">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.php">Login</a>
                                            <a class="nav-link" href="register.php">Register</a>
                                            <a class="nav-link" href="password.php">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">SUPPLY PARTNER ADMIN</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">SUPPLY PARTNER</li>
                        </ol>
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Add a supplier</button>  
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Product management</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="admin_product.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Supply partner management</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="admin_company.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Account user</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="account_user.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Danger Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                DataTable product
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>User name</th>
                                                <th>Password</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>User name</th>
                                                <th>Password</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php 
                                            
                                            $result = $GLOBALS['conn']->select("* from account");
                                            $arr=array();
                                            
                                            while ($row = mysqli_fetch_array($result)) {
                                                $arr[]=array(
                                                    'id'=>$row['id'],
                                                    'phone'=>$row['phone'],
                                                    'user'=>$row['user'],
                                                    'email'=>$row['email'],
                                                    'password'=>$row['password'],
                                                    'status'=>$row['status']
                                                );
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $row['id']?>
                                            </td>
                                            <td>
                                                <?php echo $row['phone']?>
                                            </td>
                                            <td>
                                                <?php echo $row['email']?>
                                            </td>
                                            <td>
                                                <?php echo $row['user']?>
                                            </td>
                                            <td>
                                                <?php echo $row['password']?><br>
                                                <button data-toggle="modal" name="change"  data-target="#myModal1" onclick="changeAdmin(<?php echo $row['id']?>)">Change password</button>
                                            </td>
                                            <td>
                                                <form action="" method="post">
                                                    <input style="display: none" type="submit" name="setStatusAcc" id="<?php echo $row['id']?>" value="">
                                                </form>
                                                <label class="switch">
                                                
                                                    <label for="submit"></label>
                                                    <input id="check<?php echo $row['id']?>" onclick="setStatus(<?php echo $row['id']?>)" type="checkbox" <?php if($row['status']=="accept"){?> checked<?php }?>>
                                                    <span class="slider round"></span>
                                                </label>
                                                
                                            </td>
                                            <td>
                                                
                                                <form action="" method="post">
                                                <button type="submit" name="deleteAccountAdmin" value="<?php echo $row['id']?>"><img src="https://cdn3.iconfinder.com/data/icons/social-messaging-ui-color-line/254000/82-512.png" style="width: 2rem; height: 2rem" alt=""></button>
                                                <input type="text" name="bool"  id="bool" style="display: none" value="false">
                                                </form>
                                                
                                            </td>
                                            
                                        </tr>
                                        
                                        <?php }
                                        echo "<script> var user_admin =".json_encode($arr)."
                                        localStorage.setItem('listUserAdmin', JSON.stringify(user_admin))</script>";
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            </div>

            <div id="myModal" class="modal">
        <div class="modal-content">
            <form method="POST" id="form" action="" enctype="multipart/form-data">
                <div class="modal-header">
                    <h1>Add supply partner</h1>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <label for="">Name company</label><br>
                                <input type="text" name="name" placeholder="Nhập tên công ty" required><br>
                                <label for="">Address</label><br>
                                <input type="text" name="address" placeholder="Nhập địa chỉ công ty" required><br>
                                <label for="">Manager</label><br>
                                <input type="text" name="manager" placeholder="Giám đốc công ty" required><br>
                                <label for="">License number</label>
                                <input type="text" name="license" id="" placeholder="Mã số thuế" required><br>
                                <label for="">Phone</label>
                                <input type="phone" name="phone" id="" placeholder="Số điện thoại" required><br>
                                <label for="">Email</label><br>
                                <input type="email" name="email" placeholder="Email"><br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="add" value="add" class="btn btn-primary btn-lg" name="addCom">
                        Add
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div id="myModal1" class="modal">
        <div class="modal-content">
            <form method="POST" id="form" action="" enctype="multipart/form-data">
                <div class="modal-header">
                    <h1>Change password</h1>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                
                                <label for="">Email</label><br>
                                <input type="text" name="email" id="email" readonly="true" required><br>
                                <label for="">Old password</label><br>
                                <input type="text" name="old" id="old" readonly="true" required><br>
                                <label for="">New password</label><br>
                                <input type="text" name="new" id="new" placeholder="New password" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="" value="change" class="btn btn-primary btn-lg" name="change">
                        Change
                    </button>
                </div>
            </form>
        </div>
    </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="../js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="../js/function.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/datatables-demo.js"></script>
    </body>
</html>
