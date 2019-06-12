<?php
namespace Coercive\Utility\Orator\Discord\Embed;

class Thumbnail extends AbstractSerialize
{
	/** @var string source url of thumbnail (only supports http(s) and attachments) */
	protected $url = '';

	/** @var string a proxied url of the thumbnail */
	protected $proxy_url = '';

	/** @var int height of thumbnail */
	protected $height = 0;

	/** @var int width of thumbnail */
	protected $width = 0;

	/**
	 * @param string $url
	 * @return Thumbnail
	 */
	public function setUrl(string $url): Thumbnail
	{
		$this->url = $url;
		return $this;
	}

	/**
	 * @param string $proxy_url
	 * @return Thumbnail
	 */
	public function setProxyUrl(string $proxy_url): Thumbnail
	{
		$this->proxy_url = $proxy_url;
		return $this;
	}

	/**
	 * @param int $height
	 * @return Thumbnail
	 */
	public function setHeight(int $height): Thumbnail
	{
		$this->height = $height;
		return $this;
	}

	/**
	 * @param int $width
	 * @return Thumbnail
	 */
	public function setWidth(int $width): Thumbnail
	{
		$this->width = $width;
		return $this;
	}
}