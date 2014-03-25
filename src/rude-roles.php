<?

namespace rude;

class roles
{
    public static function get()
    {
        $q = new query(RUDE_TABLE_ROLES);
        $q->start();

        return $q->get_object_list();
    }

    public static function get_id($role_name)
    {
        $roles = roles::get();

        foreach ($roles as $role)
        {
            if ($role->role == $role_name)
            {
                return $role->id;
            }
        }

        return null;
    }

    public static function add($role, $allow_user_management, $allow_role_management)
    {
        $q = new cquery(RUDE_TABLE_ROLES);
        $q->add(RUDE_FIELD_ROLE, $role);
        $q->add(RUDE_FIELD_ALLOW_USER_MANAGEMENT, $allow_user_management);
        $q->add(RUDE_FIELD_ALLOW_ROLE_MANAGEMENT, $allow_role_management);
        $q->start();

        return $q->get_id();
    }

    public static function delete($id)
    {
        $q = new dquery(RUDE_TABLE_ROLES);
        $q->where(RUDE_FIELD_ID, (int) $id);
        $q->limit(1);
        $q->start();
    }

    public static function count()
    {
        $q = new query(RUDE_TABLE_USERS);
        $q->table(RUDE_TABLE_ROLES);
        $q->count(RUDE_FIELD_ROLE_ID);
        $q->right_join(RUDE_TABLE_ROLES, RUDE_FIELD_ROLE_ID, RUDE_FIELD_ID);
        $q->group_by(RUDE_FIELD_ID);
        $q->start();

        return $q->get_object_list();
    }
}