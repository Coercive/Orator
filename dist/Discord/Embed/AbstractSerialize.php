<?php
namespace Coercive\Utility\Orator\Discord\Embed;

use JsonSerializable;

abstract class AbstractSerialize implements JsonSerializable
{
	/**
	 * Export data for json encode
	 *
	 * @return array
	 */
	public function jsonSerialize(): array
	{
		return get_object_vars($this);
	}
}