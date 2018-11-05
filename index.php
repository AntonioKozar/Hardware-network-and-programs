<?php
/**
 * index short summary.
 *
 * index description.
 *
 * @version 1.0
 * @author Antonio Kožar, mag.ing.el.
 */

require("class.php");
require("functions.php");
require("staticclass.php");
$StaticClass = new staticclass();

if(isset($_POST['Check']) and $_POST['Check'] == "1")
{

    $DatabaseInformation = new DatabaseInformation();
    $DatabaseConnection = DatabaseConnection($DatabaseInformation);
    $PhysicalAddress = $_POST['PhysicalAddress'];
    //$PhysicalAddress = "1C666D94AB42";
    $MySQLString = "SELECT * FROM network WHERE mac = '{$PhysicalAddress}'";
    $MySQLCommand = mysqli_query($DatabaseConnection, $MySQLString);
    if($MySQLCommand->num_rows == 1)
    {
        print("1");
    }
    else
    {
        print("0");
    }
    mysqli_close($DatabaseConnection);

}
if(isset($_POST['UpdateNetwork']) and $_POST['UpdateNetwork'] == "1")
{
    $DatabaseInformation = new DatabaseInformation();
    $DatabaseConnection = DatabaseConnection($DatabaseInformation);
    $LocalData = new LocalData();

    $LocalData->FD = $_POST["FD"];
    $LocalData->Port = $_POST["Port"];
    $LocalData->Barcode = $_POST["Barcode"];
    $LocalData->IPv4Address = $_POST["IPv4Address"];
    $LocalData->SubnetMask = $_POST["SubnetMask"];
    $LocalData->DefaultGateway = $_POST["DefaultGateway"];
    $LocalData->DNS1 = $_POST["DNS1"];
    $LocalData->DNS2 = $_POST["DNS2"];
    $LocalData->PhysicalAddress = $_POST["PhysicalAddress"];
    $LocalData->ComputerName = $_POST["ComputerName"];
    $LocalData->Processor = $_POST["Processor"];
    $LocalData->RAM = $_POST["RAM"];
    $LocalData->Motherboard = $_POST["Motherboard"];
    $LocalData->DiskNumber = $_POST["DiskNumber"];
    $LocalData->DiskSize = $_POST["DiskSize"];
    $LocalData->DisplayAdapters = $_POST["DisplayAdapters"];
    $LocalData->OperatingSystem = $_POST["OperatingSystem"];

    $MySQLString = "UPDATE network SET ip = '{$LocalData->IPv4Address}', subnet = '{$LocalData->SubnetMask}', gateway = '{$LocalData->DefaultGateway}', dns1 = '{$LocalData->DNS1}', dns2 = '{$LocalData->DNS2}', pcname = '{$LocalData->ComputerName}', processor = '{$LocalData->Processor}', ram = '{$LocalData->RAM}', motherboard = '{$LocalData->Motherboard}', hddnumber = '{$LocalData->DiskNumber}', hddsize = '{$LocalData->DiskSize}', gpu = '{$LocalData->DisplayAdapters}', os = '{$LocalData->OperatingSystem}' WHERE mac = '{$LocalData->PhysicalAddress}'";
    $MySQLCommand = mysqli_query($DatabaseConnection, $MySQLString);
    print_r($MySQLCommand);

    mysqli_close($DatabaseConnection);
}
if(isset($_POST["UpdateMAC"]) and $_POST["UpdateMAC"] == "1")
{
    $DatabaseInformation = new DatabaseInformation();
    $DatabaseConnection = DatabaseConnection($DatabaseInformation);
    $LocalData = new LocalData();
    $LocalData->PhysicalAddress = $_POST["PhysicalAddress"];

    $MySQLString = "TRUNCATE {$LocalData->PhysicalAddress}";

    $MySQLCommand = mysqli_query($DatabaseConnection, $MySQLString);
    mysqli_close($DatabaseConnection);
}
if(isset($_POST["UpdateMACFill"]) and $_POST["UpdateMACFill"] == "1")
{
    $DatabaseInformation = new DatabaseInformation();
    $DatabaseConnection = DatabaseConnection($DatabaseInformation);
    $LocalData = new LocalData();
    $LocalData->PhysicalAddress = $_POST["PhysicalAddress"];
    $LocalData->Program = $_POST["Program"];
    $Date = date("d.m.Y H:i:s");
    $MySQLString = "INSERT INTO {$LocalData->PhysicalAddress} (id, program, valid, added, date) VALUES (NULL, '{$LocalData->Program}', '1', '{$Date}', CURRENT_TIMESTAMP)";

    $MySQLCommand = mysqli_query($DatabaseConnection, $MySQLString);
    mysqli_close($DatabaseConnection);
}
if(isset($_POST['InsertNetwork']) and $_POST['InsertNetwork'] == "1")
{

    $DatabaseInformation = new DatabaseInformation();
    $DatabaseConnection = DatabaseConnection($DatabaseInformation);
    $LocalData = new LocalData();

    $LocalData->FD = $_POST["FD"];
    $LocalData->Port = $_POST["Port"];
    $LocalData->Barcode = $_POST["Barcode"];
    $LocalData->IPv4Address = $_POST["IPv4Address"];
    $LocalData->SubnetMask = $_POST["SubnetMask"];
    $LocalData->DefaultGateway = $_POST["DefaultGateway"];
    $LocalData->DNS1 = $_POST["DNS1"];
    $LocalData->DNS2 = $_POST["DNS2"];
    $LocalData->PhysicalAddress = $_POST["PhysicalAddress"];
    $LocalData->ComputerName = $_POST["ComputerName"];
    $LocalData->Processor = $_POST["Processor"];
    $LocalData->RAM = $_POST["RAM"];
    $LocalData->Motherboard = $_POST["Motherboard"];
    $LocalData->DiskNumber = $_POST["DiskNumber"];
    $LocalData->DiskSize = $_POST["DiskSize"];
    $LocalData->DisplayAdapters = $_POST["DisplayAdapters"];
    $LocalData->OperatingSystem = $_POST["OperatingSystem"];

/*

    $LocalData->FD = "4";
    $LocalData->Port = "60";
    $LocalData->Barcode = "11111";
    $LocalData->IPv4Address = "161.53.202.61";
    $LocalData->SubnetMask = "255.255.255.0";
    $LocalData->DefaultGateway = "161.53.202.1";
    $LocalData->DNS1 = "161.53.202.3";
    $LocalData->DNS2 = "161.53.30.100";
    $LocalData->PhysicalAddress = "1C666D94AB42";
    $LocalData->ComputerName = "S2-6A-2-PC1";
    $LocalData->Processor = "Intel(R) Core(TM) i5-6400 CPU @ 2.70GHz";
    $LocalData->RAM = "8";
    $LocalData->Motherboard = "1";
    $LocalData->DiskNumber = "2";
    $LocalData->DiskSize = "688";
    $LocalData->DisplayAdapters = "NVIDIA GeForce GT 630";
    $LocalData->OperatingSystem = "Windows 10 Pro";
*/
    $Date = date("d.m.Y H:i:s");
    $MySQLString = "INSERT INTO network (id, fd, port, ip, subnet, gateway, dns1, dns2, mac, pcname, barcode, processor, ram, motherboard, hddnumber, hddsize, gpu, os, added, edited) VALUES (NULL, '{$LocalData->FD}', '{$LocalData->Port}', '{$LocalData->IPv4Address}', '{$LocalData->SubnetMask}', '{$LocalData->DefaultGateway}', '{$LocalData->DNS1}', '{$LocalData->DNS2}', '{$LocalData->PhysicalAddress}', '{$LocalData->ComputerName}', '{$LocalData->Barcode}', '{$LocalData->Processor}', '{$LocalData->RAM}', '{$LocalData->Motherboard}', '{$LocalData->DiskNumber}', '{$LocalData->DiskSize}', '{$LocalData->DisplayAdapters}', '{$LocalData->OperatingSystem}', '{$Date}', CURRENT_TIMESTAMP)";
    $MySQLCommand = mysqli_query($DatabaseConnection, $MySQLString);
    print_r($MySQLCommand);
    mysqli_close($DatabaseConnection);

}
if(isset($_POST["CreateMAC"]) and $_POST["CreateMAC"] == "1")
{
    $DatabaseInformation = new DatabaseInformation();
    $DatabaseConnection = DatabaseConnection($DatabaseInformation);
    $PhysicalAddress = $_POST["PhysicalAddress"];
    $MySQLString = "CREATE TABLE {$PhysicalAddress} (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,program VARCHAR(255) NOT NULL,valid int(4) NOT NULL, added VARCHAR(64) NOT NULL, date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP)";
    $MySQLCommand = mysqli_query($DatabaseConnection, $MySQLString);

    mysqli_close($DatabaseConnection);
}
if(isset($_POST["FillMAC"]) and $_POST["FillMAC"] == "1")
{
    $DatabaseInformation = new DatabaseInformation();
    $DatabaseConnection = DatabaseConnection($DatabaseInformation);
    $LocalData->PhysicalAddress = $_POST["PhysicalAddress"];
    $LocalData->Program = $_POST["Program"];
    $Date = date("d.m.Y H:i:s");
    $MySQLString = "INSERT INTO {$LocalData->PhysicalAddress} (id, program, valid, added, date) VALUES (NULL, '{$LocalData->Program}', '1', '{$Date}', CURRENT_TIMESTAMP)";
    $MySQLCommand = mysqli_query($DatabaseConnection, $MySQLString);

    mysqli_close($DatabaseConnection);
}

//if((!isset($_POST["Check"]) or $_POST["Check"] == "") or (!isset($_POST["UpdateMAC"]) or $_POST["UpdateMAC"] == ""))
//{
//    if(!isset($_POST["Check"],$_POST["FillMAC"],$_POST["CreateMAC"],$_POST['InsertNetwork'],$_POST["UpdateMACFill"],$_POST["UpdateMAC"],$_POST['UpdateNetwork']))
//    {
//        header("Location:" . $StaticClass->Statistics);
//    }
//}


?>