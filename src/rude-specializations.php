<?

namespace rude;

class specializations
{
    public static function get($field = false)
    {
        $q = new query(RUDE_TABLE_SPECIALIZATIONS);


        if ($field === false)
        {
            $q->start();

            return $q->get_object_list();
        }


        if (is_int($field))
        {
            $q->where(RUDE_FIELD_ID, $field);
        }
        else if (is_string($field))
        {
            $q->where(RUDE_FIELD_NAME, $field);
        }

        $q->start();


        return $q->get_object();
    }

    public static function getcode($field = false)
    {
        $q = new query(RUDE_TABLE_SPECIALIZATIONS);


        if ($field === false)
        {
            $q->start();

            return $q->get_object_list();
        }


        if (is_int($field))
        {
            $q->where(RUDE_FIELD_ID, $field);
        }
        else if (is_string($field))
        {
            $q->where(RUDE_FIELD_CODE, $field);
        }

        $q->start();


        return $q->get_object();
    }

    public static function add($name, $code)
    {
        $q = new cquery(RUDE_TABLE_SPECIALIZATIONS);
        $q->add(RUDE_FIELD_NAME, $name);
        $q->add(RUDE_FIELD_CODE, $code);
        $q->start();

        return $q->get_id();
    }

    public static function delete($name)
    {
        $q = new dquery(RUDE_TABLE_SPECIALIZATIONS);
        $q->where(RUDE_FIELD_NAME, $name);
        $q->limit(1);
        $q->start();
    }
}