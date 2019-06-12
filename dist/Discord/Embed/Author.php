<?php
namespace Coercive\Utility\Orator\Discord\Embed;

class Author extends AbstractSerialize
{
	/** @var string name of author */
	protected $name = '';

	/** @var string url of author */
	protected $url = '';

	/** @var string url of author icon (only supports http(s) and attachments) */
	protected $icon_url = '';

	/** @var string a proxied url of author icon */
	protected $proxy_icon_url = '';

	/**
	 * @param string $name
	 * @return Author
	 */
	public function setName(string $name): Author
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @param string $url
	 * @return Author
	 */
	public function setUrl(string $url): Author
	{
		$this->url = $url;
		return $this;
	}

	/**
	 * @param string $url
	 * @return Author
	 */
	public function setIconUrl(string $url): Author
	{
		$this->icon_url = $url;
		return $this;
	}

	/**
	 * @param string $url
	 * @return Author
	 */
	public function setProxyIconUrl(string $url): Author
	{
		$this->proxy_icon_url = $url;
		return $this;
	}
}