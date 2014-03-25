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
}