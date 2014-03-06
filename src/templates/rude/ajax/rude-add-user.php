<?

namespace rude;

debug($_REQUEST);

$role     = get(RUDE_FIELD_ROLE);
$username = get(RUDE_FIELD_USERNAME);
$password = get(RUDE_FIELD_PASSWORD);

$q = new query(RUDE_TABLE_ROLES);

$role     = $q->escape($role);
$username = $q->escape($username);
$password = $q->escape($password);

$q->select(RUDE_TABLE_ROLES);
$q->where(RUDE_FIELD_ROLE, $role);
$q->start();

$role = $q->get_object();

if ($role === null)
{
	die();
}

$role_id = $role->id;


$q = new cquery(RUDE_TABLE_USERS);
//$q->