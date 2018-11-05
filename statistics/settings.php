<?php
/**
 * settings short summary.
 *
 * settings description.
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

if(isset($_POST["CreateTableLocal"]) and $_POST["CreateTableLocal"] != "")
{
    $Connection = DatabaseConnection();
    CreateTableLocal($Connection);
    print('<script>alert("Table has been created.");</script>');
}
    $Connection = DatabaseConnection();
    $X = GetDistinctProcessors($Connection);

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
                        <a href="index.php">Dashboard</a>
                    </li>
                    <li class="active">
                        <a href="settings.php">Settings</a>
                    </li>
                    <li>
                        <a href="index.php?signout=1">Sign out</a>
                    </li>
                </ul>
                <form class="navbar-form navbar-right" method="post">
                    <input type="text" class="form-control" placeholder="Search..." name="Search" />
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="main">
                <!--<h1 class="page-header"><?php  ?> </h1>
                <h2 class="sub-header"><?php  ?></h2>-->
                <!--<form class="form-inline" method="post">
                    <div class="form-group">
                        <label for="CreateTableLocal">Create table local: </label>
                        <button type="submit" class="btn btn-default" id="CreateTableLocal" name="CreateTableLocal" value="1">GO</button>
                    </div>
                    
                </form>
                <br />-->
                <!--<form class="form-inline" method="post">
                    <div class="form-group">
                        <label for="GetDistinctProcessors">Get distinct processors: </label>
                        <button type="submit" class="btn btn-default" id="GetDistinctProcessors" name="GetDistinctProcessors" value="1">GO</button>
                    </div>
                </form>-->

                <br />
                <br />
                <div class="table-responsive col-md-6">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>                            
                                <th>Code Name</th>                            
                                <th>Count</th>
                                <th>Launch Date</th>
                                <th>Website</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $Counter = 1;
                            foreach($X as $ROW)
                            {
                                $Connection = DatabaseConnection();
                                $Count = GetDistinctProcessorsCount($Connection, $ROW[0]);
                                $Connection = DatabaseConnection();
                                $ProcessorInformation = GetProcessorInformation($Connection, $ROW[0]);
                                if($ProcessorInformation == NULL)
                                {
                                    $Connection = DatabaseConnection();
                                    $ProcessorInformation = GetProcessorInformationLong($Connection, $ROW[0]);
                                }
                            ?>
                            <tr>
                                <th>
                                    <?php print($Counter); ?>
                                </th>
                                <td>
                                    <?php print($ROW[0]); ?>
                                </td>
                                <td>
                                    <?php print($Count); ?>
                                </td>
                                <td>
                                    <?php print($ProcessorInformation[3]); ?>
                                </td>
                                <td>
                                    <a href="<?php print($ProcessorInformation[2]); ?>" target="_blank">Link</a>                                    
                                </td>
                            </tr>
                            <?php
                                $Counter++;
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

