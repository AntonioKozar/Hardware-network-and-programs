<?php

/**
 * functions short summary.
 *
 * functions description.
 *
 * @version 1.0
 * @author Antonio Kožar, mag.ing.el.
 */

 function DatabaseConnection($DatabaseInformation)
 {
     $MySQLCommand = mysqli_connect($DatabaseInformation->host, $DatabaseInformation->username, $DatabaseInformation->password, $DatabaseInformation->database);

     return $MySQLCommand;
 }