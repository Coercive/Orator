<?php
namespace Coercive\Utility\Orator\Discord\Embed;

class Image extends AbstractSerialize
{
	/** @var string source url of image (only supports http(s) and attachments) */
	protected $url = '';

	/** @var string a proxied url of the image */
	protected $proxy_url = '';

	/** @var int height of image */
	protected $height = 0;

	/** @var int width of image */
	protected $width = 0;

	/**
	 * @param string $url
	 * @return Image
	 */
	public function setUrl(string $url): Image
	{
		$this->url = $url;
		return $this;
	}

	/**
	 * @param string $proxy_url
	 * @return Image
	 */
	public function setProxyUrl(string $proxy_url): Image
	{
		$this->proxy_url = $proxy_url;
		return $this;
	}

	/**
	 * @param int $height
	 * @return Image
	 */
	public function setHeight(int $height): Image
	{
		$this->height = $height;
		return $this;
	}

	/**
	 * @param int $width
	 * @return Image
	 */
	public function setWidth(int $width): Image
	{
		$this->width = $width;
		return $this;
	}
}