<?php
/**
 * function short summary.
 *
 * function description.
 *
 * @version 1.0
 * @author Antonio Kožar, mag.ing.el.
 */

function DatabaseConnection()
{
    $ConnectionInformation = new ConnectionInformation();
    $Connection = mysqli_connect($ConnectionInformation->Servername,$ConnectionInformation->Username,$ConnectionInformation->Password,$ConnectionInformation->Database);
    unset($ConnectionInformation);
    return $Connection;
}
function GetAllFromNetwork($Connection)
{
    $SQLString = "SELECT * FROM network";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $MySQLCommand = mysqli_fetch_all($MySQLCommand, MYSQLI_NUM);
    mysqli_close($Connection);
    return $MySQLCommand;
}
function GetAllFromNetworkSearch($Connection, $Search)
{
    // barcode ip mac pcname
    $SQLString = "SELECT * FROM network WHERE barcode = '{$Search}' OR ip = '{$Search}' OR mac = '{$Search}' OR pcname = '{$Search}'";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $MySQLCommand = mysqli_fetch_all($MySQLCommand, MYSQLI_NUM);
    mysqli_close($Connection);
    return $MySQLCommand;
}
function GetAllFromPhysicalAddress($Connection,$PhysicalAddress)
{
    $SQLString = "SELECT * FROM {$PhysicalAddress}";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $MySQLCommand = mysqli_fetch_all($MySQLCommand, MYSQLI_NUM);
    mysqli_close($Connection);
    return $MySQLCommand;
}
function CreateTableLocal($Connection)
{
    $SQLString = "CREATE TABLE local ( id INT NOT NULL AUTO_INCREMENT , global VARCHAR(16) NOT NULL , local VARCHAR(16) NOT NULL , PRIMARY KEY (id)) ENGINE = MyISAM;";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S0', 'S0-1')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S0', 'S0-2')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S0', 'S0-3')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S0', 'S0-4')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S0', 'S0-5')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S0', 'S0-6')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S0', 'S0-7')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S0', 'S0-8')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S0', 'S0-9')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S0', 'S0-10')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S0', 'S0-11')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S0', 'S0-12')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S0', 'S0-13')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S0', 'S0-14')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S0', 'S0-15')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S0', 'S0-16')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S0', 'S0-17')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S1', 'S1-1')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S1', 'S1-2')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S1', 'S1-3')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S1', 'S1-4')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S1', 'S1-5')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S1', 'S1-6')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S1', 'S1-7')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S1', 'S1-8')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S1', 'S1-9')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S1', 'S1-10')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S1', 'D5')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S1', 'D4')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S2', 'S2-1')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S2', 'S2-2')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S2', 'S2-3')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S2', 'S2-4')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S2', 'S2-5')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S2', 'S2-6')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S2', 'S2-7')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S2', 'S2-8')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S2', 'S2-9')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S2', 'S2-10')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S2', 'S2-11')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S2', 'S2-12')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S2', 'S2-13')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S2', 'S2-14')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S2', 'S2-15')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S2', 'S2-16')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S2', 'S2-17')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S2', 'S2-18')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S2', 'S2-19')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S2', 'S2-20')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S2', 'S2-21')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S2', 'S2-22')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S2', 'S2-23')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S2', 'D6a')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S2', 'D6b')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S2', 'S2-6A-1')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'S2', 'S2-6A-2')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'N0', 'N0-1')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'N0', 'N0-2')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'N0', 'N0-3')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'N0', 'N0-4')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'N0', 'N0-5')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'N0', 'N0-6')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'N0', 'N0-7')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'N0', 'D1')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'N0', 'D2')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'N0', 'D3')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'N1', 'N1-1')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'N1', 'N1-2')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'N1', 'N1-3')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'N1', 'N1-4')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'N1', 'N1-5')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'N1', 'N1-6')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'N1', 'N1-7')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'N2', 'N2-1')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'N2', 'N2-2')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'N2', 'N2-3')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'N2', 'N2-4')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'N2', 'N2-5')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'N2', 'N2-6')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'N2', 'N2-7')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'N2', 'D14')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'N2', 'D13')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'N2', 'D12')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'N2', 'D11')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'N2', 'D10')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'N2', 'D9')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'N2', 'D8')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $SQLString = "INSERT INTO local (id, global, local) VALUES (NULL, 'N2', 'D7')";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));

    mysqli_close($Connection);
    return $MySQLCommand;
}

function GetLocation($Connection,$Location)
{
    $SQLString = "SELECT global FROM local WHERE local LIKE '%{$Location}%' LIMIT 1";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $MySQLCommand = mysqli_fetch_array($MySQLCommand, MYSQLI_NUM);
    mysqli_close($Connection);
    return $MySQLCommand;
}

function GetDistinctProcessors($Connection)
{
    $SQLString = "SELECT DISTINCT processor FROM network";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $MySQLCommand = mysqli_fetch_all($MySQLCommand, MYSQLI_NUM);

    //foreach($MySQLCommand as $Processor)
    //{
    //    if(preg_match("Intel(R) Core(TM)",$Processor[0]))
    //    {
    //        $c = $Processor[0];
    //        $c = substr($c,18);
    //        $c = substr($c,0,strpos($c,"CPU"));
    //    }
    //    if(preg_match("Pentium(R) Dual-Core CPU",$Processor[0]))
    //    {
    //        $c = $Processor[0];
    //        $c = substr($c,24);
    //        $c = substr($c,0,strpos($c,"@"));
    //    }
    //    else
    //    {
    //        exit;
    //    }
    //    $SQLString = "SELECT Name, Code_Name, Processor_Number, Launch_Date, of_Cores, of_Threads, Processor_Base_Frequency, Memory_Types, Max_Memory_Size_dependent_on_memory_type, Max_of_Memory_Channels FROM processortab WHERE";
    //}
    mysqli_close($Connection);
    return $MySQLCommand;
}

function GetDistinctProcessorsCount($Connection, $ProcessorName)
{
    $SQLString = "SELECT COUNT(processor) FROM network WHERE processor = '{$ProcessorName}'";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $MySQLCommand = mysqli_fetch_array($MySQLCommand, MYSQLI_NUM);
    mysqli_close($Connection);

    return $MySQLCommand[0];
}

function GetProcessorInformation($Connection, $ProcessorName)
{
    $SQLString = "SELECT * FROM processor WHERE Name = '{$ProcessorName}';";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $MySQLCommand = mysqli_fetch_array($MySQLCommand, MYSQLI_NUM);
    mysqli_close($Connection);

    return $MySQLCommand;
}
function GetProcessorInformationLong($Connection, $ProcessorName)
{
    $SQLString = "SELECT * FROM processor WHERE Name='Pentium(R) Dual-Core CPU E5300 @ 2.60GHz';";
    $MySQLCommand = mysqli_query($Connection, $SQLString) or die("Error : " . mysqli_error($Connection));
    $MySQLCommand = mysqli_fetch_array($MySQLCommand, MYSQLI_NUM);
    mysqli_close($Connection);

    return $MySQLCommand;
}

function CreateTableProcessor($Connection)
{
    //CREATE TABLE `hnpefos`. ( `id` INT NOT NULL AUTO_INCREMENT , `Name` VARCHAR(512) NOT NULL , `CodeName` VARCHAR(512) NOT NULL , `VerticalSegment` VARCHAR(512) NOT NULL , `ProcessorNumber` VARCHAR(512) NOT NULL , `Status` VARCHAR(512) NOT NULL , `LaunchDate` VARCHAR(512) NOT NULL , `Lithography` VARCHAR(512) NOT NULL , `Price` VARCHAR(512) NOT NULL , `Cores` VARCHAR(512) NOT NULL , `Threads` VARCHAR(512) NOT NULL , `BaseFrequency` VARCHAR(512) NOT NULL , `TurboFrequency` VARCHAR(512) NOT NULL , `Cache` VARCHAR(512) NOT NULL , `BusSpeed` VARCHAR(512) NOT NULL , `TDP` VARCHAR(512) NOT NULL , `MemorySize` VARCHAR(512) NOT NULL , `MemoryTypes` VARCHAR(512) NOT NULL , `MemoryChannels` VARCHAR(512) NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;
}
