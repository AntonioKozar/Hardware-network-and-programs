<?php
/**
 * details short summary.
 *
 * details description.
 *
 * @version 1.0
 * @author Antonio Kožar, mag.ing.el.
 */

session_start();
require("class.php");
require("function.php");
require("../staticclass.php");
require("tfpdf.php");

$StaticClass = new staticclass();
$StaticInformation = new StaticInformation();

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
if(!isset($_GET["mac"]) or $_GET["mac"] == "")
{
    header("Location:" . $StaticClass->Statistics);
}


$PC = new PC();
$Program = new Program();
$ProgramList = new ProgramList();
$PC->PhysicalAddress = $_GET["mac"];
$Connection = DatabaseConnection();
$X = GetAllFromNetworkSearch($Connection, $PC->PhysicalAddress);

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
}
$Connection = DatabaseConnection();
$X = GetAllFromPhysicalAddress($Connection,$PC->PhysicalAddress);
foreach($X as $ROW)
{
    $Program = new Program();
    $Program->ID = $ROW[0];
    $Program->ProgramName = $ROW[1];
    $ProgramList->List[] = $Program;
    unset($Program);
}

$Connection = DatabaseConnection();
$Location = GetLocation($Connection,substr($PC->ComputerName,0,2));

if(isset($_POST["PDF"]) and $_POST["PDF"] != "")
{
    class PDF extends tFPDF
    {
        // Page header
        function Header()
        {
            // Logo
            //$this->Image('logo.png',10,6,30);
            // Arial bold 15
            //$this->SetFont('Arial','B',15);
            // Move to the right
            //$this->Cell(80);
            // Title
            //$this->Cell(30,10,'Title',1,0,'C');
            // Line break
           // $this->Ln(20);
        }

        // Page footer
        function Footer()
        {
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Page number
            $this->Cell(0,10,'stranica: ' . $this->PageNo().'/{nb}                                                                                                                                            datum: '.date('d.m.Y.'),0,0,'C');
        }
    }
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    // Add a Unicode font (uses UTF-8)
    $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
    //$pdf->SetFont('DejaVu','',10);

    // Load a UTF-8 string from a file and print it
    //$txt = "file_get_contents('HelloWorld.txt')";
    //$pdf->Write(8,$txt);

    // Select a standard font (uses windows-1252)
    $pdf->SetFont('DejaVu','',14);
    $pdf->Ln(10);
    $pdf->Write(5,'Zapisnik o predanom računalu');
    $pdf->SetFont('DejaVu','',12);
    $pdf->Ln(10);
    $pdf->Write(5,'Informacije o računalu:');
    $pdf->SetFont('DejaVu','',10);
    $pdf->Ln(8);
    $pdf->Write(5,'Barkod: ' . $PC->Barcode);
    $pdf->Ln(4);
    $pdf->Write(5,'Preklopnik: ' . $PC->FD);
    $pdf->Ln(4);
    $pdf->Write(5,'Port: ' . $PC->Port);
    $pdf->Ln(4);
    $pdf->Write(5,'IPv4 Adresa: ' . $PC->Address);
    $pdf->Ln(4);
    $pdf->Write(5,'IPv4 Maska Podmreže: ' . $PC->SubnetMask);
    $pdf->Ln(4);
    $pdf->Write(5,'IPv4 Zadani Pristupnik: ' . $PC->DefaultGateway);
    $pdf->Ln(4);
    $pdf->Write(5,'IPv4 DNS Server 1: ' . $PC->DNSServer1);
    $pdf->Ln(4);
    $pdf->Write(5,'IPv4 DNS Server 2: ' . $PC->DNSServer2);
    $pdf->Ln(4);
    $pdf->Write(5,'Fizička Adresa: ' . $PC->PhysicalAddress);
    $pdf->Ln(4);
    $pdf->Write(5,'Naziv Računala: ' . $PC->ComputerName);
    $pdf->Ln(4);
    $pdf->Write(5,'Procesor: ' . $PC->Processor);
    $pdf->Ln(4);
    $pdf->Write(5,'Ugrađena Radna Memorija (RAM): ' . $PC->InstalledMemoryRAM);
    $pdf->Ln(4);
    $pdf->Write(5,'Broj Tvrdih Diskova: ' . $PC->LocalDiskNumber);
    $pdf->Ln(4);
    $pdf->Write(5,'Ukupna Zapremnina Tvrdih Diskova: ' . $PC->LocalDiskSize);
    $pdf->Ln(4);
    $pdf->Write(5,'Grafički Adapter: ' . $PC->DisplayAdapter);
    $pdf->Ln(4);
    $pdf->Write(5,'Operativni Sustav: ' . $PC->OperatingSystem);
    $pdf->Ln(8);

    $pdf->Write(5,'Instalirani programi:');

    $pdf->Ln(8);
    foreach($ProgramList->List as $Program)
    {
        $pdf->Write(5,$Program->ID . ".) " . $Program->ProgramName);
        $pdf->Ln(4);
    }
    $pdf->SetFont('DejaVu','',12);
    $pdf->Ln(30);
    $pdf->Write(5,'________________________________                                                     ________________________________');
    $pdf->SetFont('DejaVu','',10);
    $pdf->Ln(5);
    $pdf->Write(5,'                    (PREDAO/LA)                                                                                                      (PREUZEO/LA)');
    $pdf->Output();
    //dodaj datum
}
?>

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

    <title>
        <?php ?>
    </title>

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
                    <li>
                        <form class="navbar-form navbar-right" method="post">
                            <input type="submit" class="form-control" value="Print" name="PDF"/>
                        </form>
                    </li>
                    <li>
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
                    <input type="text" class="form-control" placeholder="Search..." name="Search" title="Barcode, IP, MAC, PCname" disabled />
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="main">
                
                <div class="table-responsive col-md-6">
                    <h3>
                        Computer information
                    </h3>
                    <table class="table table-striped table-bordered">
                        <tbody>
                            <tr>
                                <th class="col-md-3 text-right">#</th>
                                <td>
                                    <?php print($PC->ID); ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="col-md-3 text-right">Barcode</th>
                                <td>
                                    <?php print($PC->Barcode); ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="col-md-3 text-right">FD</th>
                                <td>
                                    <?php print($PC->FD); ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="col-md-3 text-right">Port</th>
                                <td>
                                    <?php print($PC->Port); ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="col-md-3 text-right">IPv4 Address</th>
                                <td>
                                    <?php print($PC->Address); ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="col-md-3 text-right">IPv4 Subnet Mask</th>
                                <td>
                                    <?php print($PC->SubnetMask); ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="col-md-3 text-right">IPv4 Default Gateway</th>
                                <td>
                                    <?php print($PC->DefaultGateway); ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="col-md-3 text-right">IPv4 DNS Server 1</th>
                                <td>
                                    <?php print($PC->DNSServer1); ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="col-md-3 text-right">IPv4 DNS Server 2</th>
                                <td>
                                    <?php print($PC->DNSServer2); ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="col-md-3 text-right">Physical Address</th>
                                <td>
                                    <?php print($PC->PhysicalAddress); ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="col-md-3 text-right">Computer name</th>
                                <td>
                                    <?php print($PC->ComputerName); ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="col-md-3 text-right">Processor</th>
                                <td>
                                    <?php print($PC->Processor); ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="col-md-3 text-right">Installed memory (RAM)</th>
                                <td>
                                    <?php print($PC->InstalledMemoryRAM); ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="col-md-3 text-right">Local Disk Number</th>
                                <td>
                                    <?php print($PC->LocalDiskNumber); ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="col-md-3 text-right">Local Disk Size</th>
                                <td>
                                    <?php print($PC->LocalDiskSize); ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="col-md-3 text-right">Display adapter</th>
                                <td>
                                    <?php print($PC->DisplayAdapter); ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="col-md-3 text-right">Operating System</th>
                                <td>
                                    <?php print($PC->OperatingSystem); ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <h3>
                        Lokacija računala
                    </h3>
                    <table class="table table-striped table-bordered">
                        <tr>
                            <td>
                                <img src="img/<?php print($Location[0]); ?>.png" class="col-md-12" />
                            </td>

                        </tr>
                    </table>
                    <?php print($PC->ComputerName . ' <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span> ' . $Location[0]); ?>
                </div>
                <div class="table-responsive col-md-6">
                    <h3>
                        Program list
                    </h3>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="col-md-1">#</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach($ProgramList->List as $Program) 
                            {
                            ?>
                            <tr>
                                <td><?php print($Program->ID); ?></td>
                                <td><?php print($Program->ProgramName); ?></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
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

