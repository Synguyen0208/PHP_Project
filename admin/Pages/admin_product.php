<?php
require "funtion.php";


session_start();
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
                        <a class="dropdown-item" href="login.php">Logout</a>
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
                                            <a class="nav-link" href="password.html">Forgot Password</a>
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
                        <h1 class="mt-4">PRODUCT ADMIN</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">PRODUCT</li>
                        </ol>
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Add product</button>  
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Account user management</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="account_user.php">View Details<sup><b style="color: white"><?php echo $count['quan_acc']?></b></sup></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Supply partner management</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="admin_company.php">View Details<sup><b style="color: white"><?php echo $count['quan_com']?></b></sup></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Account admin management</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="account_admin.php">View Details<sup><b style="color: white"><?php echo $count['quan_accAD']?></b></sup></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Order management</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="order_manager.php">View Details<sup><b style="color: white"><?php echo $count['quan_or']?></b></sup></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4" style="background-color: black; border: 1px solid black">
                                    <div class="card-body" style="background-color: black;">Shipping partners</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between" style="background-color: black;">
                                        <a class="small text-white stretched-link" href="admin_shipping.php">View Details<sup><b style="color: white"><?php echo $count['shipping']?></b></sup></a>
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
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Discount</th>
                                                <th>Mass</th>
                                                <th>Quantity</th>
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th>Category</th>
                                                <th>ED</th>
                                                <th>MFG</th>
                                                <th>Company</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Discount</th>
                                                <th>Mass</th>
                                                <th>Quantity</th>
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th>Category</th>
                                                <th>ED</th>
                                                <th>MFG</th>
                                                <th>Company</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php 
                                       
                                            $result = $GLOBALS['conn']->select(" pro.id, pro.name,quantity, price, sell_price, title, ED, MFG, image, mass, industry, com.name as company FROM ((product pro INNER JOIN product_industry ind ON pro.industry_id=ind.id) INNER JOIN company com on pro.id_com=com.id)");
                                            $arr=array();
                                            while ($row = mysqli_fetch_array($result)) {
                                                $arr[]=array(
                                                    'id'=>$row['id'],
                                                    'name'=>$row['name'],
                                                    'price'=>$row['price'],
                                                    'mass'=>$row['mass'],
                                                    'discount'=>$row['sell_price'],
                                                    'quantity'=>$row['quantity'],
                                                    'title'=>$row['title'],
                                                    'image'=>$row['image'],
                                                    'industry'=>$row['industry'],
                                                    'ED'=>$row['ED'],
                                                    'MFG'=>$row['MFG'],
                                                    'company'=>$row['company']
                                                );
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $row['name']?>
                                            </td>
                                            <td>
                                                <?php echo $row['price']?>
                                            </td>
                                            <td>
                                                <?php echo $row['sell_price']?>
                                            </td>
                                            <td>
                                                <?php echo $row['mass']?>
                                            </td>
                                            <td>
                                                <?php echo $row['quantity']?>
                                                <button data-toggle="modal" data-target="#myModal3" onclick="document.getElementById('import').value=<?php echo $row['id']?>" style="float: right">+</button>
                                            </td>
                                            <td>
                                                <?php echo $row['title']?>
                                            </td>
                                            <td>
                                            <img src="<?php echo $row['image']?>" class="img-responsive" style="width:4rem; height:5rem " alt="Image">
                                            </td>
                                            <td>
                                                <?php echo $row['industry']?>
                                            </td>
                                            <td>
                                                <?php echo $row['ED']?>
                                            </td>
                                            <td>
                                                <?php echo $row['MFG']?>
                                            </td>
                                            <td>
                                                <?php echo $row['company']?>
                                            </td>
                                            <td>
                                                <button data-toggle="modal" name="add"  data-target="#myModal1" onclick="change(<?php echo $row['id']?>)"><img src="https://taiwebs.com/upload/icons/systemmodeler.png" style="width: 2rem" alt=""></button>
                                                <form action="" method="post">
                                                <button type="submit" name="delete" value="<?php echo $row['id']?>"><img src="https://cdn3.iconfinder.com/data/icons/social-messaging-ui-color-line/254000/82-512.png" onclick="delete1();"style="width: 2rem; height: 2rem" alt=""></button>
                                                </form>
                                                
                                            </td>
                                            
                                        </tr>
                                        
                                        <?php }
                                        echo "<script> var product =".json_encode($arr)."
                                        localStorage.setItem('listProduct', JSON.stringify(product))</script>";
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
                <form method="POST" id="form" action="admin_product.php" enctype = "multipart/form-data">
                <div class="modal-header">
                    <h1>Thêm sản phẩm</h1>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <label for="">Nhập tên sản phẩm</label><br>
                                <input type="text" name="name-product" placeholder="Nhập tên sản phẩm" required><br>
                                <label for="">Danh mục sản phẩm</label><br>
                                <select name="category" id="industry" onchange="myFunction()" >
                                    <?php 
                                     $sql="SELECT id, industry from product_industry;";
                                     $result = $GLOBALS['conn']->execute($sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <option value="<?php echo $row['id']?>"><?php echo $row['industry']?></option>
                                    <?php }?>
                                    <option value="Other">Other</option>
                                </select><br>
                                <div class="industry" id="input-industry">
                                    
                                </div>
                                <div class="in_price">
                                    <div>
                                        <label for="">Giá nhập sản phẩm</label><br>
                                        <input type="number" min="1" name="price-product"
                                            placeholder="Nhập giá sản phẩm" required>
                                    </div>
                                    <div>
                                        <label for="">Giá bán</label><br>
                                        <input type="number"  name="discount-price-product"
                                            placeholder="Nhập giá bán" required>
                                    </div>
                                </div>
                                <label for="">Số lượng sản phẩm</label><br>
                                <input type="number" min="0" name="quantity-product" placeholder="Nhập số lượng sản phẩm" required><br>
                                <label for="">Khối lượng sản phẩm</label><br>
                                <input type="number" min="0" name="mass-product" id="mass" placeholder="Nhập khối lượng sản phẩm" required><br>
                                <label for="">Ngày sản xuất</label>
                                <input type="date" name="ED" id="" required><br>
                                <label for="">Hạn sử dụng</label>
                                <input type="date" name="MFG" id="" required><br>
                                <label for="">Công ty sản xuất</label><br>
                                <select name="company" id="company" onchange="myFunction1()" >
                                    <?php 
                                     $sql="SELECT id, name from company;";
                                     $result = $GLOBALS['conn']->execute($sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                                    <?php }?>
                                    <option value="Other">Other</option>
                                </select><br>
                                <div class="input-company" id="input-company">
                                   
                                </div>
                                
                                <input type="file" name="image-product"><br>
                                <span><?php echo $_SESSION['err']?></span><br>
                                <label for="">Mô tả sản phẩm</label><br>
                                <textarea name="title" id="" cols="30" rows="10" required></textarea><br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit"  id="add" value="add" class="btn btn-primary btn-lg" name="add">
                        Thêm Sản Phẩm
                    </button>
                </div>
                </form>
            </div>
    </div>

    <div id="myModal1" class="modal">
    <div class="modal-content">
        <form method="POST" id="form" action="" enctype="multipart/form-data">
            <div class="modal-header">
                <h1>Sửa sản phẩm</h1>
            </div>
            <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <input type="number" id="idd" name="idd" readonly="true">
                                <label for="">Nhập tên sản phẩm</label><br>
                                <input type="text" id="name" name="name-productt" placeholder="Nhập tên sản phẩm" required><br>
                                <label for="">Danh mục sản phẩm</label><br>
                                <select name="industryy" id="industry" onchange="myFunction()" >
                                    <?php 
                                     $sql="SELECT id, industry from product_industry;";
                                     $result = $GLOBALS['conn']->execute($sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <option value="<?php echo $row['id']?>"><?php echo $row['industry']?></option>
                                    <?php }?>
                                    <option value="Other">Other</option>
                                </select><br>
                                <div class="industry" id="input-industry">
                                    
                                </div>
                                <div class="in_price">
                                    <div>
                                        <label for="">Giá nhập sản phẩm</label><br>
                                        <input type="number" id="price" min="1" name="price-productt"
                                            placeholder="Nhập giá sản phẩm" required>
                                    </div>
                                    <div>
                                        <label for="">Giá bán</label><br>
                                        <input type="number" id="discount" min="1" max="100" name="discount-price-productt"
                                            placeholder="Nhập bán" required>
                                    </div>
                                </div>
                                
                                <label for="">Khối lượng sản phẩm</label><br>
                                <input type="number" min="0" name="mass-productt" id="masss" placeholder="Nhập khối lượng sản phẩm" required><br>
                                <label for="">Ngày sản xuất</label>
                                <input type="date" name="EDD" id="ED" required><br>
                                <label for="">Hạn sử dụng</label>
                                <input type="date" name="MFGG" id="MFG" required><br>
                                <label for="">Công ty sản xuất</label><br>
                                <select name="companyy" id="company" onchange="myFunction1()" >
                                    <?php 
                                     $sql="SELECT id, name from company;";
                                     $result = $GLOBALS['conn']->execute($sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <option value="<?php echo $row['id']?>"><?php echo $row['name']?></option>
                                    <?php }?>
                                    <option value="Other">Other</option>
                                </select><br>
                                <div class="input-company" id="input-company">
                                   
                                </div>
                                
                                <input type="file" name="image-productt"><br>
                                <span><?php echo $_SESSION['err']?></span><br>
                                <img src="" id="img" style="width: 6rem; height: 6rem" value="kk" alt=""><br>
                                <input type="text" id="image" name="image" style="display:none">
                                <label for="">Mô tả sản phẩm</label><br>
                                <textarea name="titlee" id="title" cols="30" rows="10" required></textarea><br>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="submit" id="login" value="login" class="btn btn-primary btn-lg" name="log">
                    Sửa Sản Phẩm
                </button>
            </div>
        </form>
    </div>
</div>
<div id="myModal3" class="modal">
    <div class="modal-content">
    <form method="POST" style="margin-bottom: 0px"  action="" enctype="multipart/form-data">
            <div class="modal-header">
                <h1>Import goods</h1>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <label for="">Input quantity</label><br>
                            <input type="number" min=0 id="addStock" name="Quantity" placeholder="Input quanity product">
                        </div>
                    </div>
                </div>
            </div>
            
        
        <div class="modal-footer">
            
                <button name="import" type="submit" class="btn btn-primary btn-lg" id="import" value="">Import</button>
            
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
