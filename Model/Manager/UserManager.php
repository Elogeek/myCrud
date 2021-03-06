<?php

namespace Model\User;

use Model\DB;
use PDOException;
use PDO;
use Model\Entity\User;
use RoleManager;
use Model\Manager\Traits\ManagerTrait;

require_once $_SERVER['DOCUMENT_ROOT'] . '/include.php';

class UserManager {

    /**
     * Return an User by his id
     * @param int $id
     * @return User
     */
    public function getById(int $id): ?User
    {
        $user = null;
        $request = DB::getInstance()->prepare("SELECT * FROM user WHERE id = :id");
        $request->bindValue(':id', $id);
        $result = $request->execute();

        if ($result) {
            $user_data = $request->fetch();
            if ($user_data) {
                $role = $user_data['role_fk'];
                $user = new User($user_data['username'], $user_data['password'], $user_data['id'], $user_data['email'], $role);
            }
        }

        return $user;
    }

    /**
     * Return an User by his user name or null
     * @param string $email
     * @return User|null
     */
    public function login(string $email): ?User
    {
        $request = DB::getInstance()->prepare("SELECT * FROM user WHERE email = :email");
        $request->bindValue(':email', $email);
        $result = $request->execute();
        $user = null;

        if ($result && $data = $request->fetch()) {
            $role = $data['role_fk'];
            $user = new User($data['username'], $data['password'], $data['id'], $data['email'], $role);
        }

        return $user;
    }

    /**
     * Add an user into table user
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        $request = DB::getInstance()->prepare("INSERT INTO user (username, email, password, role_fk) VALUES (:username, :email, :password, :role)");

        $request->bindValue(":username", $user->getUsername());
        $request->bindValue(":email", $user->getMail());
        $request->bindValue(":password", password_hash($user->getPassword(), PASSWORD_BCRYPT));
        $request->bindValue(":role", $user->getRole()->getId());

        return $request->execute() && DB::encodePassword($request) && DB::getInstance()->lastInsertId() != 0;
    }

    /**
     * disconnect user
     * @param int $id
     * @param string $username
     * @param int $role
     * @return User|null
     */
    public function logOut(int $id, string $username, int $role): ?User {
        if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['role'])) {
            $_SESSION = array();
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 50000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
            session_destroy();
            header('location=index.php');

        }
    }

}





