<?

namespace rude;

class report
{
	private $id = null;   // id из БД
	private $year = 0; // год набора

	public function get_id()
	{
		return $this->id;
	}

	public function get_year()
	{
		return $this->year;
	}

	public function set_id($id)
	{
		$this->id = $id;
	}

	public function set_year($year)
	{
		$this->year = $year;
	}
}