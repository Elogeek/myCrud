<?php

use Model\Entity\Role;
use Model\Entity\User;

require_once $_SERVER['DOCUMENT_ROOT'] . '/include.php';
/**
 * Class RolesManager
 */
class RoleManager
{

    /**
     * Return a Role object based on a given role id.
     * @param int $id
     * @return Role
     */
    public function get($id): ?Role {
        $role = null;
        $request = DB::getInstance()->prepare("Select * FROM role WHERE id = :id");
        $request->bindValue(':id', $id);
        $result = $request->execute();
        if($result && $data = $request->fetch()) {
            $role = new Role($data['id'], $data['name']);
        }

        return $role;
    }

    /**
     * Return true if the role is deletable ( not the default roles ).
     * @param string $roleName
     * @return bool
     */
    public static function isDeletable(string $roleName): bool
    {
        return !in_array($roleName, ['admin']);
    }

    /**
     * @param Role $role
     * @return bool
     */
    public static function isEditable(Role $role): bool
    {
        return self::isDeletable($role->getName());
    }


    /**
     * Return true if user is admin.
     * @param User $user
     * @return bool
     */
    public static function isAdmin(User $user)
    {
        return $user->getRole()->getId() && $user->getRole()->getName() === 'admin';
    }
}




