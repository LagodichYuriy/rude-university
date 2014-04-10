<?

namespace rude;

define('RUDE_REPORT_IMAGE_DEFAULT_WIDTH',  250);
<<<<<<< HEAD
define('RUDE_REPORT_IMAGE_DEFAULT_HEIGHT', 14);

define('RUDE_IMAGE_DEFAULT_FONT', RUDE_DIR_ROOT . RUDE_DIR_FONTS . '/Liberation/LiberationSans-Regular.ttf');
=======
define('RUDE_REPORT_IMAGE_DEFAULT_HEIGHT', 20);

define('RUDE_IMAGE_DEFAULT_FONT', RUDE_DIR_ROOT . RUDE_DIR_FONTS . '/LiberationSans-Regular.ttf');
>>>>>>> 50ccc2e4ffd02f6db1d20ffae8ac2dec7db8457f

class image
{
	/** @var resource $image */
	private $image    = null; // image itself

	private $width    = 0;    // image width
	private $height   = 0;    // image height

	private $font = '';       // text font

	private $text     = '';   // image text;
	private $angle    = 0;    // image rotate angle

	private $bytecode = null; // rendered image


<<<<<<< HEAD
	public function __construct($text, $width = RUDE_REPORT_IMAGE_DEFAULT_WIDTH, $height = RUDE_REPORT_IMAGE_DEFAULT_HEIGHT, $angle = 90, $font = RUDE_IMAGE_DEFAULT_FONT, $font_size = 9)
=======
	public function __construct($text, $width = RUDE_REPORT_IMAGE_DEFAULT_WIDTH, $height = RUDE_REPORT_IMAGE_DEFAULT_HEIGHT, $angle = 90, $font = RUDE_IMAGE_DEFAULT_FONT)
>>>>>>> 50ccc2e4ffd02f6db1d20ffae8ac2dec7db8457f
	{
		$this->width = $width;
		$this->height = $height;

		$this->font = $font;
<<<<<<< HEAD
		$this->font_size = $font_size;
=======
>>>>>>> 50ccc2e4ffd02f6db1d20ffae8ac2dec7db8457f

		$this->text = $text;
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

		$color_bg = imagecolorallocate($this->image, 255, 255, 255);
		$color_fg = imagecolorallocate($this->image, 0, 0, 0);

		imagecolortransparent($this->image, $color_bg);

		imagefill($this->image, 0, 0, $color_bg);

<<<<<<< HEAD
		imagettftext($this->image, $this->font_size, 0, 0, 12, $color_fg, $this->font, $this->text);
=======
		imagettftext($this->image, 10, 0, 2, 12, $color_fg, $this->font, $this->text);
>>>>>>> 50ccc2e4ffd02f6db1d20ffae8ac2dec7db8457f

		$this->image = $this->rotate($this->angle, $color_bg);

		ob_start();
		imagepng($this->image);
		$this->bytecode = ob_get_clean();

		imagecolordeallocate($this->image, $color_fg);
		imagecolordeallocate($this->image, $color_bg);
	}

	public function rotate($angle = null)
	{
		if ($angle === null)
		{
			$angle = $this->angle;
		}

		return imagerotate($this->image, $angle, 0);
	}

	public function html()
	{
		?><img src="data:image/png;base64,<?= base64_encode($this->bytecode) ?>" /><?
	}
}