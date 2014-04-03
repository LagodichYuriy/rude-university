<?

namespace rude;

define('RUDE_IMAGE_FROM_TEXT_WIDTH',  100);
define('RUDE_IMAGE_FROM_TEXT_HEIGHT', 30);

define('RUDE_IMAGE_COLOR_WHITE', 'white');
define('RUDE_IMAGE_COLOR_BLACK', 'black');
define('RUDE_IMAGE_COLOR_BLUE',  'blue');

class image
{
	private $image    = null; // image itself
	private $width    = 0;    // image width
	private $height   = 0;    // image height

	private $color_fg = '';   // image foreground color
	private $color_bg = '';   // image backgound color

	private $text     = '';   // image text;
	private $angle    = 0;    // image rotate angle

	private $bytecode = null; // rendered image


	public function __construct($text, $width, $height, $color_fg = RUDE_IMAGE_COLOR_BLACK, $color_bg = RUDE_IMAGE_COLOR_WHITE, $angle = 90)
	{
		$this->text = $text;

		$this->width = $width;
		$this->height = $height;

		$this->color_fg = $color_fg;
		$this->color_bg = $color_bg;

		$this->angle = $angle;


		$this->render();

		$this->html();
	}

	public function __destruct()
	{
		if (is_resource($this->image))
		{
			imagedestroy($this->image);
		}
	}

	public function render()
	{
		$this->image = imagecreatetruecolor($this->width, $this->height);

		$rgb_bg = $this->color_bg();
		$rgb_fg = $this->color_fg();

		if (!$rgb_fg or !$rgb_bg)
		{
			return;
		}

		$color_bg = imagecolorallocate($this->image, 255, 255, 255);
		$color_fg = imagecolorallocate($this->image, 0, 0, 0);

		imagefill($this->image, 0, 0, $color_bg);

		imagestring($this->image, 2, 0, 0,  $this->text, $color_fg);

		$this->image = $this->rotate($this->angle, $color_bg);
		imagesavealpha($this->image, true);

		ob_start();
		imagepng($this->image);
		$this->bytecode = ob_get_clean();


//		$background_color = imagecolorallocate($this->image, 255, 255, 255); // set background color
//		$text_color = imagecolorallocate($this->image, 0, 0, 0); // set foreground color
//
////		imagefill($this->image, 0, 0, $bg);
//
//		imagestring($this->image, 5, 0, 0, $this->text, $text_color); // draw the string at the top left corner
//
//		ob_start();
//		imagepng($this->image);
//		$this->bytecode = ob_get_clean();
//
		imagecolordeallocate($this->image, $color_fg);
		imagecolordeallocate($this->image, $color_bg);

	}

	public function color_bg()
	{
		return $this->color_bg;
	}

	public function color_fg()
	{
		return $this->color_fg;
	}

	public function color($color_name)
	{
		switch ($color_name)
		{
			case RUDE_IMAGE_COLOR_WHITE:
				return array(255, 255, 255);
				break;

			case RUDE_IMAGE_COLOR_BLACK:
				return array(0, 0, 0);
				break;

			case RUDE_IMAGE_COLOR_BLUE:
				return array(0, 0, 255);
				break;

			default:
				return null;
				break;
		}
	}

	public function rotate($angle = null)
	{
		if ($angle === null)
		{
			$angle = $this->angle;
		}

		return imagerotate($this->image, $angle, 0);
	}

	function iso2uni($str_iso)
	{
		$str_uni = '';

		for ($i = 0; $i < strlen($str_iso); $i++)
		{
			$thischar = substr($str_iso, $i, 1);
			$charcode = ord($thischar);

			$str_uni .= ($charcode > 175) ? "&#" . (1040 + ($charcode - 176)) . ";" : $thischar;
		}

		return $str_uni;
	}

	public function html()
	{
		?><img src="data:image/png;base64,<?= base64_encode($this->bytecode) ?>" /><?
	}
}