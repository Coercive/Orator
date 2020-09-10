<?php
namespace Coercive\Utility\Orator\Handler;

use Exception;

/**
 * Curl utility
 *
 * @package		Coercive\Utility\Orator
 * @link		https://github.com/Coercive/Orator
 *
 * @author  	Anthony Moral <contact@coercive.fr>
 * @copyright   2019 Anthony Moral
 * @license 	MIT
 */
class Curl
{
	const RETRIABLE_ERROR_CODES = [
		CURLE_COULDNT_RESOLVE_HOST,
		CURLE_COULDNT_CONNECT,
		CURLE_HTTP_NOT_FOUND,
		CURLE_READ_ERROR,
		CURLE_OPERATION_TIMEOUTED,
		CURLE_HTTP_POST_ERROR,
		CURLE_SSL_CONNECT_ERROR,
	];

	/** @var resource Curl handler */
	private $ch = null;

	/** @var int Returned httpcode */
	private $httpcode = 0;

	/**
	 * Curl constructor.
	 *
	 * @param resource $ch
	 * @return void
	 */
	public function __construct($ch)
	{
		$this->ch = $ch;
	}

	/**
	 * Curl destructor.
	 *
	 * @return void
	 */
	public function __destruct()
	{
		if($this->ch) {
			curl_close($this->ch);
		}
	}

	/**
	 * Send curl
	 *
	 * @param int $retries [optional]
	 * @return $this
	 * @throws Exception
	 */
	public function execute(int $retries = 3): Curl
	{
		$retries = abs($retries);
		while ($retries--) {
			if (false === curl_exec($this->ch)) {
				$errno = curl_errno($this->ch);

				if (!in_array($errno, self::RETRIABLE_ERROR_CODES, true) || !$retries) {
					$error = curl_error($this->ch);
					curl_close($this->ch);
					throw new Exception("Curl error (code $errno): $error");
				}

				continue;
			}

			$this->httpcode = (int) curl_getinfo($this->ch, CURLINFO_HTTP_CODE);
			curl_close($this->ch);
			break;
		}
		return $this;
	}

	/**
	 * CURLINFO_HTTP_CODE
	 *
	 * @return int
	 */
	public function getHttpCode(): int
	{
		return $this->httpcode;
	}
}