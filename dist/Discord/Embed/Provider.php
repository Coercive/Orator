<?php
namespace Coercive\Utility\Orator\Discord\Embed;

class Provider extends AbstractSerialize
{
	/** @var string name of provider */
	protected $name = '';

	/** @var string url of provider */
	protected $url = '';

	/**
	 * @param string $name
	 * @return Provider
	 */
	public function setName(string $name): Provider
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @param string $url
	 * @return Provider
	 */
	public function setUrl(string $url): Provider
	{
		$this->url = $url;
		return $this;
	}
}