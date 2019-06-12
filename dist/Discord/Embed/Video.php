<?php
namespace Coercive\Utility\Orator\Discord\Embed;

class Video extends AbstractSerialize
{
	/** @var string source url of video */
	protected $url = '';

	/** @var int height of video */
	protected $height = 0;

	/** @var int width of video */
	protected $width = 0;

	/**
	 * @param string $url
	 * @return Video
	 */
	public function setUrl(string $url): Video
	{
		$this->url = $url;
		return $this;
	}

	/**
	 * @param int $height
	 * @return Video
	 */
	public function setHeight(int $height): Video
	{
		$this->height = $height;
		return $this;
	}

	/**
	 * @param int $width
	 * @return Video
	 */
	public function setWidth(int $width): Video
	{
		$this->width = $width;
		return $this;
	}
}