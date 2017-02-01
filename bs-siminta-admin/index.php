<?php
session_start();
$a=$_SESSION['uid'];
if( isset($_SESSION["uid"])){
?>


<?php   
    include ("conexion.php");
    $connect=Database::getConexion();
    if ($connect) {
        $sqlBusq ="SELECT * FROM usuario WHERE id = '$a'";
        $sqlResulta = mysqli_query($connect,$sqlBusq);
    }
?>



<?php
    if ($connect) {
        $sqlBusq ="SELECT * FROM mensaje ORDER BY nombre";
        $sqlResult = mysqli_query($connect,$sqlBusq);
        $sqlmensaje="SELECT count(id) FROM mensaje WHERE estado !='realizado'";
        $encontrados=mysqli_query($connect,$sqlmensaje);
        while( $f = mysqli_fetch_array($encontrados) ) {

            $final=$f[0];
        } 
        
       
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootsrtap Free Admin Template - SIMINTA | Admin Dashboad Template</title>
    
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />
   </head>
<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    <img src="imagen/finsa.png" alt="" height="200" widht="20o"/>
                </a>
            </div>
            <!-- end navbar-header -->
            <!-- navbar-top-links -->
             <ul class="nav navbar-top-links navbar-right">
                <!-- main dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                       <?php echo " <span class='top-label label label-danger '>".$final[0]."</span>";?>
                       <i class="fa fa-envelope fa-3x"></i>
                    </a>
                    
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li><a href="cerrarSesion.php"><i class="fa fa-sign-out fa-fw"></i>Salir</a>
                        </li>
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                
              
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="assets/img/user.jpg" alt="">
                            </div>

                                         <div class="user-info">
                                <div> 

 <?php
        while( $fila = mysqli_fetch_array($sqlResulta) )
            {
      
                                   echo" <strong>".$fila['nombre']."</strong>" ;

                                   } ?>

                            </div>  

                           
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li class="sidebar-search">
                        <!-- search section-->
                      
                        <!--end search section-->
                    </li>
                    
                    <li>
                        
                            <li>
                                <a href="blank.php">Lista de mensajes</a>
                            </li>
                            
                        </ul>
                        <!-- second-level-items -->
                    </li>
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Bienvenido Administrador</h1>
                </div>
                <!--End Page Header -->


            </div>

           <img src="../images/about-pic3.jpg"/>

           <table>
<tbody>
  <!-- Aplicadas en las filas -->
 
 
  <!-- Aplicadas en las celdas (<td> o <th>) -->
  <tr>
    <td class="active">...</td>
    <td class="success">...</td>
    <td class="warning">...</td>
    <td class="danger">...</td>
  </tr>
</tbody>
</table>
                      

                    </div>
                    <!--End Chat Panel Example-->
                </div>
            </div>


         


        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="assets/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/plugins/morris/morris.js"></script>
    <script src="assets/scripts/dashboard-demo.js"></script>

</body>

</html>
<?php
} else {
    echo "<meta http-equiv=refresh content=0;url=http://localhost/web/index.html>";
    }
?>