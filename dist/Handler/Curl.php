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

	/** @var string Returned response */
	private $response = '';

	/** @var int Returned error number */
	private $errno = 0;

	/** @var int Returned error label */
	private $error = '';

	/** @var int Returned httpcode */
	private $httpcode = 0;

	/** @var int Returned header size */
	private $headerSize = 0;

	/** @var string Returned effective url */
	private $effectiveUrl = '';

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
			$this->response = curl_exec($this->ch);
			$this->headerSize = (int) curl_getinfo($this->ch,CURLINFO_HEADER_SIZE);
			$this->httpcode = (int) curl_getinfo($this->ch, CURLINFO_HTTP_CODE);
			$this->effectiveUrl = (string) curl_getinfo($this->ch,CURLINFO_EFFECTIVE_URL);
			$this->errno = curl_errno($this->ch);
			$this->error = curl_error($this->ch);
			if (false === $this->response) {
				if (!$retries || !in_array($this->errno, self::RETRIABLE_ERROR_CODES, true)) {
					curl_close($this->ch);
					break;
				}
				continue;
			}
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

	/**
	 * Full response
	 *
	 * @return string
	 */
	public function getResponse(): string
	{
		return (string) $this->response;
	}

	/**
	 * Response header
	 *
	 * @return string
	 */
	public function getHeader(): string
	{
		return substr($this->getResponse(), 0, $this->headerSize);
	}

	/**
	 * Response body
	 *
	 * @return string
	 */
	public function getBody(): string
	{
		return substr($this->getResponse(), $this->headerSize);
	}

	/**
	 * Response effective url
	 *
	 * @return string
	 */
	public function getEffectiveUrl(): string
	{
		return $this->effectiveUrl;
	}

	/**
	 * Error message
	 *
	 * @return string
	 */
	public function getError(): string
	{
		return $this->error;
	}

	/**
	 * Error number
	 *
	 * @return int
	 */
	public function getErrno(): int
	{
		return $this->errno;
	}
}