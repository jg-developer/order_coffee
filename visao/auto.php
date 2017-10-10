<?php
/**
 * Created by PhpStorm.
 * User: Jonathan
 * Date: 05/06/2017
 * Time: 10:07
 */

    function __autoload($classe)
    {
        require_once "../modelo/{$classe}.class.php";
    }