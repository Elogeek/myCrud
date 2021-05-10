<?php
use PDO;
USE PDOException;
use Model\DB;
use Model\Entity\User;

require_once $_SERVER ['DOCUMENT_ROOT'] . 'include.php';

class AdminController {

    public function gotoAdminPage(){

        $username = 'Elodie';
        require_once './View/pageAdmin.php';
    }

    /** Connexion admin
     * @param string $email
     * @param int $role
     * @return User|null
     */
    public function ConAdmin(string $email, int $role): ?User {

        $request = DB::getInstance()->prepare('SELECT * FROM user WHERE role_fk = :role');
        $request->bindValue(':role', $role);
        //if admin === go connect
        if ($request === RoleManager::isAdmin($admin)) {
            session_start();
        } else {
            //if no admin === no connect redirection index
            $request !== RoleManager::isAdmin($admin);
            require_once './View/home.php';
            $request->execute();
        }
    }

}