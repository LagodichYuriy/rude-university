<?

namespace rude;

class specialties
{
	public static function get()
	{
		$database = new database();

		$q = "
			SELECT
				univ_specialties.*,
				univ_qualifications.name AS qualification_name,
				univ_faculties.name      AS faculty_name,
				univ_faculties.shortname AS faculty_shortname

			FROM
				univ_specialties

			LEFT JOIN univ_qualifications ON univ_specialties.qualification_id = univ_qualifications.id
			LEFT JOIN univ_faculties      ON univ_specialties.faculty_id = univ_faculties.id

			WHERE 1 = 1

			ORDER BY
				univ_faculties.shortname
		";

		$database->query($q);

		return $database->get_object_list();
	}

	public static function delete($name)
	{
		$q = new dquery(RUDE_TABLE_SPECIALTIES);
		$q->where(RUDE_FIELD_NAME, $name);
		$q->limit(1);
		$q->start();
	}


	public static function get_one($field = false)
	{
		$q = new query(RUDE_TABLE_SPECIALTIES);


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

	public static function add($name, $id_qualificatio,$id_faculty)
	{
		$q = new cquery(RUDE_TABLE_SPECIALTIES);
		$q->add(RUDE_FIELD_NAME, $name);
		$q->add(qualification_id, $id_qualificatio);
		$q->add(faculty_id, $id_faculty);
		$q->start();

		return $q->get_id();
	}
}