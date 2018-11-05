<?php
/**
 * index short summary.
 *
 * index description.
 *
 * @version 1.0
 * @author Antonio Kožar, mag.ing.el.
 */
session_start();
require("class.php");
require("function.php");
require("../staticclass.php");
$StaticClass = new staticclass();

if(!isset($_SESSION["authorized"]) or $_SESSION["authorized"] == "0")
{
    $_SESSION["authorized"] = "0";
    header("Location:" . $StaticClass->SignIn);
}
if(isset($_GET["signout"]) and $_GET["signout"] == 1)
{
    $_SESSION["authorized"] = "0";
    header("Location:" . $StaticClass->SignIn);
}
$StaticInformation = new StaticInformation();
$GoFor = 1;
if(isset($_GET["pagination"]) and $_GET["pagination"] !="")
{
    $GoFor = $_GET["pagination"];
}
if(isset($_POST["Search"]) and $_POST["Search"] != "")
{
    $PCList = new PCList();
    $Connection = DatabaseConnection();
    $Search = $_POST["Search"];
    $X = GetAllFromNetworkSearch($Connection, $Search);
}
else
{
    $PCList = new PCList();
    $Connection = DatabaseConnection();
    $X = GetAllFromNetwork($Connection);
}
$PaginationCounter = 0;
foreach($X as $ROW)
{
    $PC = new PC();
    $PC->ID = $ROW[0];
    $PC->Barcode = $ROW[10];
    $PC->FD = $ROW[1];
    $PC->Port = $ROW[2];
    $PC->Address = $ROW[3];
    $PC->SubnetMask = $ROW[4];
    $PC->DefaultGateway = $ROW[5];
    $PC->DNSServer1 = $ROW[6];
    $PC->DNSServer2 = $ROW[7];
    $PC->PhysicalAddress = $ROW[8];
    $PC->ComputerName = $ROW[9];
    $PC->Processor = $ROW[11];
    $PC->InstalledMemoryRAM = $ROW[12];
    $PC->Motherboard = $ROW[13];
    $PC->LocalDiskNumber = $ROW[14];
    $PC->LocalDiskSize = $ROW[15];
    $PC->DisplayAdapter = $ROW[16];
    $PC->OperatingSystem = $ROW[17];
    $PC->Add = $ROW[18];
    $PC->Edit = $ROW[19];
    $PCList->List[] = $PC;
    unset($PC);
    $PaginationCounter++;
}
?>


<?php  ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="img/favicon.ico" />

    <title><?php ?> </title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet" />

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    <?php print($StaticInformation->ProjectName); ?>
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <a href="index.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="settings.php">Settings</a>
                    </li>
                    <li>
                        <a href="index.php?signout=1">Sign out</a>
                    </li>
                </ul>
                <form class="navbar-form navbar-right" method="post">
                    <input type="text" class="form-control" placeholder="Search..." name="Search" title="Barcode, IP, MAC, PCname" />
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="main">
                <!--<h1 class="page-header"><?php  ?> </h1>
                <h2 class="sub-header"><?php  ?></h2>-->
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Barcode</th>
                                <th>FD</th>
                                <th>Port</th>
                                <th>IPv4 Address</th>
                                <th>IPv4 Subnet Mask</th>
                                <th>IPv4 Default Gateway</th>
                                <th>IPv4 DNS Server 1</th>
                                <th>IPv4 DNS Server 2</th>
                                <th>Physical Address</th>
                                <!--<th>Computer name</th>
                                <th>Processor</th>
                                <th>Installed memory (RAM)</th>
                                <th>Local Disk Number</th>
                                <th>Local Disk Size</th>
                                <th>Display adapter</th>
                                <th>Operating System</th>-->
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $Counter = 0;
                            $Counter2 = 0;
                            foreach($PCList->List as $PC)
                            {
                                if((($GoFor * 18) > $Counter2) and (($GoFor * 18) - 19 < $Counter2))
                                {
                                    if($Counter == ($GoFor * 18))
                                    {
                                        break;
                                    }
                                    else
                                    {
                            ?>
                            <tr>
                                <td>
                                    <?php print($PC->ID); ?>
                                </td>
                                <td>
                                    <?php print($PC->Barcode); ?>
                                </td>
                                <td>
                                    <?php print($PC->FD); ?>
                                </td>
                                <td>
                                    <?php print($PC->Port); ?>
                                </td>
                                <td>
                                    <?php print($PC->Address); ?>
                                </td>
                                <td>
                                    <?php print($PC->SubnetMask); ?>
                                </td>
                                <td>
                                    <?php print($PC->DefaultGateway); ?>
                                </td>
                                <td>
                                    <?php print($PC->DNSServer1); ?>
                                </td>
                                <td>
                                    <?php print($PC->DNSServer2); ?>
                                </td>
                                <td>
                                    <?php print($PC->PhysicalAddress); ?>
                                </td>
                                <!--<td>
                                    <?php //print($PC->ComputerName); ?>
                                </td>
                                <td>
                                    <?php //print($PC->Processor); ?>
                                </td>
                                <td>
                                    <?php //print($PC->InstalledMemoryRAM); ?>
                                </td>
                                <td>
                                    <?php //print($PC->LocalDiskNumber); ?>
                                </td>
                                <td>
                                    <?php //print($PC->LocalDiskSize); ?>
                                </td>
                                <td>
                                    <?php //print($PC->DisplayAdapter); ?>
                                </td>
                                <td><?php //print($PC->OperatingSystem); ?></td>-->
                                <td><a class="btn btn-default btn-xs" href="details.php?mac=<?php print($PC->PhysicalAddress); ?>">GO</a></td>
                            </tr>    
                                <?php
                                    }
                                    $Counter++;
                                }
                                else
                                {
                            
                                }
                                $Counter2++;                               
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                </div>
                    <div class="text-center">
                    <nav aria-label="Page navigation ">
                        <ul class="pagination">
                            <?php                             
                            if($GoFor == 1)
                            {  
                            ?>
                            <li class="disabled">
                                <a aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php 
                            }
                            else
                            {
                            ?>
                            <li>
                                <a href="index.php?pagination=<?php print($GoFor-1); ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php 
                            }
                            for ($i = 1; $i <= ceil($PaginationCounter/18); $i++) 
                            {
                            ?>
                            <li>
                                <a href="index.php?pagination=<?php print($i) ?>"><?php print($i) ?></a>
                            </li>
                            <?php  
                            } 
                            if($GoFor >= ceil($PaginationCounter/18))
                            {  
                            ?>
                            <li class="disabled">
                                <a aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                            <?php 
                            }
                            else
                            {
                            ?>
                            <li>
                                <a href="index.php?pagination=<?php print($GoFor+1); ?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>
                            </li>
                            <?php 
                             }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>

