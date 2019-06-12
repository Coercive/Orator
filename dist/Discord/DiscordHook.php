<?php
namespace Coercive\Utility\Orator\Discord;

use Exception;
use Coercive\Utility\Orator\Handler\Curl;
use Coercive\Utility\Orator\Discord\Embed\Embed;

/**
 * Discord WebHook
 *
 * @link https://discordapp.com/developers/docs/resources/webhook#execute-webhook
 *
 * @package		Coercive\Utility\Orator
 * @link		https://github.com/Coercive/Orator
 *
 * @author  	Anthony Moral <contact@coercive.fr>
 * @copyright   2019 Anthony Moral
 * @license 	MIT
 */
class DiscordHook
{
	/** @var string The webhook endpoint url */
	protected $endpoint = '';

	/** @var string override the default username of the webhook */
	protected $username = '';

	/** @var string override the default avatar of the webhook */
	protected $avatar = '';

	/** @var string the message contents (up to 2000 characters) */
	protected $content = '';

	/** @var Embed[] embedded rich content */
	protected $embeds = null;

	/** @var bool true if this is a TTS message */
	protected $tts = false;

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
		return json_encode([
			'username' => $this->username,
			'avatar_url' => $this->avatar,
			'content' => $this->content,
			'embeds' => $this->embeds,
			'tts' => $this->tts,
		]);
	}

	/**
	 * cUrl send post
	 *
	 * @return bool
	 */
	protected function send(): bool
	{
		$ch = curl_init($this->endpoint);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $this->postFields());

		try {
			$curl = new Curl($ch);
			$curl->execute($this->retries);
			return $curl->getHttpCode() === 204;
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
	 */
	public function __construct(string $endpoint = '')
	{
		$this->endpoint = $endpoint;
	}

	/**
	 * Sending activation
	 *
	 * @param bool $activate
	 * @return DiscordHook
	 */
	public function setState(bool $activate): DiscordHook
	{
		$this->state = $activate;
		return $this;
	}

	/**
	 * Sending retries
	 *
	 * @param int $retries
	 * @return DiscordHook
	 */
	public function setRetries(int $retries): DiscordHook
	{
		$this->retries = abs($retries);
		return $this;
	}

	/**
	 * Webhook endpoint setter
	 *
	 * @param string $endpoint
	 * @return DiscordHook
	 */
	public function setEndpoint(string $endpoint): DiscordHook
	{
		$this->endpoint = $endpoint;
		return $this;
	}

	/**
	 * Override the default username of the webhook
	 *
	 * @param string $username
	 * @return DiscordHook
	 */
	public function setUsername(string $username): DiscordHook
	{
		$this->username = $username;
		return $this;
	}

	/**
	 * Override the default avatar of the webhook
	 *
	 * @param string $avatar
	 * @return DiscordHook
	 */
	public function setAvatar(string $avatar): DiscordHook
	{
		$this->avatar = $avatar;
		return $this;
	}

	/**
	 * The message contents (up to 2000 characters)
	 *
	 * @param string $content
	 * @return DiscordHook
	 */
	public function setContent(string $content): DiscordHook
	{
		$this->content = $content;
		return $this;
	}

	/**
	 * Embedded rich content
	 *
	 * @param Embed $embed
	 * @return DiscordHook
	 */
	public function addEmbed(Embed $embed): DiscordHook
	{
		$this->embeds[] = $embed;
		return $this;
	}

	/**
	 * true if this is a TTS message
	 *
	 * @param bool $tts
	 * @return DiscordHook
	 */
	public function setTts(bool $tts): DiscordHook
	{
		$this->tts = $tts;
		return $this;
	}

	/**
	 * Send message
	 *
	 * @return DiscordHook
	 */
	public function publish(): DiscordHook
	{
		if($this->state && $this->endpoint && $this->content || $this->embeds) {
			$this->send();
		}
		return $this;
	}
}