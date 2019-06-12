<?php
namespace Coercive\Utility\Orator\Slack;

use Exception;
use Coercive\Utility\Orator\Handler\Curl;

/**
 * Slack WebHook
 *
 * @package		Coercive\Utility\Orator
 * @link		https://github.com/Coercive/Orator
 *
 * @author  	Anthony Moral <contact@coercive.fr>
 * @copyright   2019 Anthony Moral
 * @license 	MIT
 */
class SlackHook
{
	/** @var string The webhook endpoint url */
	protected $endpoint = '';

	/** @var string The targeted Slack channel */
	protected $channel = '';

	/** @var string The message to send */
	protected $message = '';

	/** @var string The sending activation status */
	protected $state = true;

	/** @var string The curl sending retries after retriable error */
	protected $retries = 3;

	/**
	 * Post fields
	 *
	 * @return string
	 */
	protected function postFields(): string
	{
		return 'payload=' . urlencode(json_encode([
			'channel' => $this->channel,
			'text' => $this->message,
		]));
	}

	/**
	 * cUrl send post
	 *
	 * @return bool
	 */
	protected function send(): bool
	{
		$ch = curl_init($this->endpoint);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($ch, CURLOPT_POSTFIELDS, $this->postFields());
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		try {
			(new Curl($ch))->execute($this->retries);
			return true;
		}
		catch (Exception $e) {
			return false;
		}
	}

	/**
	 * Slack constructor.
	 *
	 * You can get your webhook endpoint from your Slack settings
	 *
	 * @param string $endpoint [optional]
	 * @param string $channel [optional]
	 */
	public function __construct(string $endpoint = '', string $channel = '#general')
	{
		$this->endpoint = $endpoint;
		$this->channel = $channel;
	}

	/**
	 * Sending activation
	 *
	 * @param bool $activate
	 * @return SlackHook
	 */
	public function setState(bool $activate): SlackHook
	{
		$this->state = $activate;
		return $this;
	}

	/**
	 * Sending retries
	 *
	 * @param int $retries
	 * @return SlackHook
	 */
	public function setRetries(int $retries): SlackHook
	{
		$this->retries = abs($retries);
		return $this;
	}

	/**
	 * Webhook endpoint setter
	 *
	 * @param string $endpoint
	 * @return SlackHook
	 */
	public function setEndpoint(string $endpoint): SlackHook
	{
		$this->endpoint = $endpoint;
		return $this;
	}

	/**
	 * Channel setter
	 *
	 * @param string $channel
	 * @return SlackHook
	 */
	public function setChannel(string $channel = '#general'): SlackHook
	{
		$this->channel = $channel;
		return $this;
	}

	/**
	 * Send message
	 *
	 * @param string $message
	 * @return SlackHook
	 */
	public function publish(string $message): SlackHook
	{
		if($this->state && $this->endpoint && $this->channel && $message) {
			$this->message = $message;
			$this->send();
		}
		return $this;
	}
}