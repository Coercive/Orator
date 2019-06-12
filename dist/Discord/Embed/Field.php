<?php
namespace Coercive\Utility\Orator\Discord\Embed;

class Field extends AbstractSerialize
{
	/** @var string name of the field */
	protected $name = '';

	/** @var string value of the field */
	protected $value = '';

	/** @var bool whether or not this field should display inline */
	protected $inline = false;

	/**
	 * @param string $name
	 * @return Field
	 */
	public function setName(string $name): Field
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @param string $value
	 * @return Field
	 */
	public function setValue(string $value): Field
	{
		$this->value = $value;
		return $this;
	}

	/**
	 * @param bool $inline
	 * @return Field
	 */
	public function setInline(bool $inline): Field
	{
		$this->inline = $inline;
		return $this;
	}
}