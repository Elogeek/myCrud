<?php
require_once $_SERVER ['DOCUMENT_ROOT'] . 'include.php';

class AdminController {

    public function gotoAdminPage(){
        $username = 'Elodie';
        require_once './View/pageAdmin.php';
    }

}