<?php
/**
 * class short summary.
 *
 * class description.
 *
 * @version 1.0
 * @author Antonio Ko�ar, mag.ing.el.
 */

 class PCList
 {
     public $List = array();
 }

class PC
{
    public $ID;
    public $Barcode;
    public $FD;
    public $Port;
    public $Address;
    public $SubnetMask;
    public $DefaultGateway;
    public $DNSServer1;
    public $DNSServer2;
    public $PhysicalAddress;
    public $ComputerName;
    public $Processor;
    public $InstalledMemoryRAM;
    public $Motherboard;
    public $LocalDiskNumber;
    public $LocalDiskSize;
    public $DisplayAdapter;
    public $OperatingSystem;
    public $Add;
    public $Edit;
}

class ProgramList
{
    public $List = array();
}

class Program
{
    public $ID;
    public $ProgramName;
    public $Valid;
    public $Add;
    public $Date;
}

class ConnectionInformation
{
    public $Servername = "localhost";
    public $Username = "root";
    public $Password = "";
    public $Database = "hnpefos";
}

class StaticInformation
{
    public $ProjectName = "Hardware, Network and Programs";
}