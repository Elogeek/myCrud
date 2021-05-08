<?php
use Model\Manager\User;
require_once $_SESSION['DOCUMENT_ROOT'] . "include.php";

/** Connection admin
 * @param string $email
 * @param int $role
 * @return User|null
 */
 public function ConAdmin(string $email, int $role): ?User {
    $request = DB::getInstance()->prepare('SELECT * FROM user WHERE role_fk = :role');
    $request->bindValue(':role', $role);
    //if admin === go connect
    if ($request === RoleManager::isAdmin()) {
        session_start();
    } else {
        //if no admin === no connect redirection index
        $request !== RoleManager::isAdmin();
        header('location=index.php');
    }
    $request->execute();
}





