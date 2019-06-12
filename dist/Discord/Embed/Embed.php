<?php
namespace Coercive\Utility\Orator\Discord\Embed;

class Embed extends AbstractSerialize
{
	/** @var string title of embed */
	protected $title = '';

	/** @var string type of embed (always "rich" for webhook embeds) */
	protected $type = 'rich';

	/** @var string description of embed */
	protected $description = '';

	/** @var string url of embed */
	protected $url = '';

	/** @var string ISO8601 timestamp of embed content */
	protected $timestamp = '';

	/** @var int color code of the embed */
	protected $color = 0;

	/** @var Footer footer information */
	protected $footer = null;

	/** @var Image image information */
	protected $image = null;

	/** @var Thumbnail thumbnail information */
	protected $thumbnail = null;

	/** @var Video video information */
	protected $video = null;

	/** @var Provider provider information */
	protected $provider = null;

	/** @var Author author information */
	protected $author = null;

	/** @var Field[] array of embed field objects */
	protected $fields = [];

	/**
	 * Embed constructor.
	 *
	 * @param string $title [optional]
	 * @param string $description [optional]
	 * @param string $color [optional]
	 */
	public function __construct(string $title = '', string $description = '', string $color = '')
	{
		if($title) {
			$this->setTitle($title);
		}
		if($description) {
			$this->setDescription($description);
		}
		if($color) {
			$this->setColor($color);
		}
	}

	/**
	 * @param string $title
	 * @return Embed
	 */
	public function setTitle(string $title): Embed
	{
		$this->title = $title;
		return $this;
	}

	/**
	 * @param string $type [optional]
	 * @return Embed
	 */
	public function setType(string $type = 'rich'): Embed
	{
		$this->type = $type;
		return $this;
	}

	/**
	 * @param string $description
	 * @return Embed
	 */
	public function setDescription(string $description): Embed
	{
		$this->description = $description;
		return $this;
	}

	/**
	 * @param string $url
	 * @return Embed
	 */
	public function setUrl(string $url): Embed
	{
		$this->url = $url;
		return $this;
	}

	/**
	 * @param string $timestamp
	 * @return Embed
	 */
	public function setTimestamp(string $timestamp): Embed
	{
		$this->timestamp = $timestamp;
		return $this;
	}

	/**
	 * @param string $color
	 * @return Embed
	 */
	public function setColor(string $color): Embed
	{
		$this->color = (int) hexdec($color);
		return $this;
	}

	/**
	 * @param Footer $footer [optional]
	 * @return Footer
	 */
	public function Footer(Footer $footer = null): Footer
	{
		if($footer) { return $this->footer = $footer; }
		return null === $this->footer ? $this->footer = new Footer : $this->footer;
	}

	/**
	 * @param Image $image [optional]
	 * @return Image
	 */
	public function Image(Image $image = null): Image
	{
		if($image) { return $this->image = $image; }
		return null === $this->image ? $this->image = new Image : $this->image;
	}

	/**
	 * @param Thumbnail $thumbnail [optional]
	 * @return Thumbnail
	 */
	public function Thumbnail(Thumbnail $thumbnail = null): Thumbnail
	{
		if($thumbnail) { return $this->thumbnail = $thumbnail; }
		return null === $this->thumbnail ? $this->thumbnail = new Thumbnail : $this->thumbnail;
	}

	/**
	 * @param Video $video [optional]
	 * @return Video
	 */
	public function Video(Video $video = null): Video
	{
		if($video) { return $this->video = $video; }
		return null === $this->video ? $this->video = new Video : $this->video;
	}

	/**
	 * @param Provider $provider [optional]
	 * @return Provider
	 */
	public function Provider(Provider $provider = null): Provider
	{
		if($provider) { return $this->provider = $provider; }
		return null === $this->provider ? $this->provider = new Provider : $this->provider;
	}

	/**
	 * @param Author $author [optional]
	 * @return Author
	 */
	public function Author(Author $author = null): Author
	{
		if($author) { return $this->author = $author; }
		return null === $this->author ? $this->author = new Author : $this->author;
	}

	/**
	 * @param Field $field
	 * @return Embed
	 */
	public function addField(Field $field): Embed
	{
		$this->fields[] = $field;
		return $this;
	}
}