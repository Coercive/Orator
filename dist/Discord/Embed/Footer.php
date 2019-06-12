<?php
namespace Coercive\Utility\Orator\Discord\Embed;

class Footer extends AbstractSerialize
{
	/** @var string footer text */
	protected $text = '';

	/** @var string url of footer icon (only supports http(s) and attachments) */
	protected $icon_url = '';

	/** @var string a proxied url of footer icon */
	protected $proxy_icon_url = '';

	/**
	 * @param string $text
	 * @return Footer
	 */
	public function setText(string $text): Footer
	{
		$this->text = $text;
		return $this;
	}

	/**
	 * @param string $url
	 * @return Footer
	 */
	public function setIconUrl(string $url): Footer
	{
		$this->icon_url = $url;
		return $this;
	}

	/**
	 * @param string $url
	 * @return Footer
	 */
	public function setProxyIconUrl(string $url): Footer
	{
		$this->proxy_icon_url = $url;
		return $this;
	}
}