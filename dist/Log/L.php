<?php
namespace Coercive\Utility\Orator\Log;

/**
 * Orator Log
 *
 * @package		Coercive\Utility\Orator
 * @link		https://github.com/Coercive/Orator
 *
 * @author  	Anthony Moral <contact@coercive.fr>
 * @copyright   2023 Anthony Moral
 * @license 	MIT
 */
class L
{
	const TAG = "\033[";

	const RESET = 0;
	const BOLD = 1;
	const ITALIC = 3; # may not work, depends on your terminal.
	const UNDERLINE = 4;
	const BLINK = 5; # may not work, depends on your terminal.
	const REVERSE = 7;
	const CONCEALED = 8;

	const FONT_STYLE = [
		'none' => self::RESET,
		'bold' => self::BOLD,
		'italic' => self::ITALIC,
		'underline' => self::UNDERLINE,
		'blink' => self::BLINK,
		'reverse' => self::REVERSE,
		'concealed' => self::CONCEALED,
	];

	const FOREGROUND_COLOR_DARK = 2;
	const FOREGROUND_COLOR_LIGHT = 6;
	const FOREGROUND_COLOR_DEFAULT = 39;
	const FOREGROUND_COLOR_BLACK = 30;
	const FOREGROUND_COLOR_RED = 31;
	const FOREGROUND_COLOR_GREEN = 32;
	const FOREGROUND_COLOR_YELLOW = 33;
	const FOREGROUND_COLOR_BLUE = 34;
	const FOREGROUND_COLOR_MAGENTA = 35;
	const FOREGROUND_COLOR_CYAN = 36;
	const FOREGROUND_COLOR_LIGHT_GRAY = 37;
	const FOREGROUND_COLOR_DARK_GRAY = 90;
	const FOREGROUND_COLOR_LIGHT_RED = 91;
	const FOREGROUND_COLOR_LIGHT_GREEN = 92;
	const FOREGROUND_COLOR_LIGHT_YELLOW = 93;
	const FOREGROUND_COLOR_LIGHT_BLUE = 94;
	const FOREGROUND_COLOR_LIGHT_MAGENTA = 95;
	const FOREGROUND_COLOR_LIGHT_CYAN = 96;
	const FOREGROUND_COLOR_WHITE = 97;

	const FOREGROUND_COLORS = [
		'dark' => self::FOREGROUND_COLOR_DARK,
		'light' => self::FOREGROUND_COLOR_LIGHT,
		'default' => self::FOREGROUND_COLOR_DEFAULT,
		'black' => self::FOREGROUND_COLOR_BLACK,
		'red' => self::FOREGROUND_COLOR_RED,
		'green' => self::FOREGROUND_COLOR_GREEN,
		'yellow' => self::FOREGROUND_COLOR_YELLOW,
		'blue' => self::FOREGROUND_COLOR_BLUE,
		'magenta' => self::FOREGROUND_COLOR_MAGENTA,
		'cyan' => self::FOREGROUND_COLOR_CYAN,
		'light_gray' => self::FOREGROUND_COLOR_LIGHT_GRAY,
		'dark_gray' => self::FOREGROUND_COLOR_DARK_GRAY,
		'light_red' => self::FOREGROUND_COLOR_LIGHT_RED,
		'light_green' => self::FOREGROUND_COLOR_LIGHT_GREEN,
		'light_yellow' => self::FOREGROUND_COLOR_LIGHT_YELLOW,
		'light_blue' => self::FOREGROUND_COLOR_LIGHT_BLUE,
		'light_magenta' => self::FOREGROUND_COLOR_LIGHT_MAGENTA,
		'light_cyan' => self::FOREGROUND_COLOR_LIGHT_CYAN,
		'white' => self::FOREGROUND_COLOR_WHITE,
	];

	const BACKGROUND_COLOR_DEFAULT = 49;
	const BACKGROUND_COLOR_BLACK = 40;
	const BACKGROUND_COLOR_RED = 41;
	const BACKGROUND_COLOR_GREEN = 42;
	const BACKGROUND_COLOR_YELLOW = 43;
	const BACKGROUND_COLOR_BLUE = 44;
	const BACKGROUND_COLOR_MAGENTA = 45;
	const BACKGROUND_COLOR_CYAN = 46;
	const BACKGROUND_COLOR_LIGHT_GRAY = 47;
	const BACKGROUND_COLOR_DARK_GRAY = 100;
	const BACKGROUND_COLOR_LIGHT_RED = 101;
	const BACKGROUND_COLOR_LIGHT_GREEN = 102;
	const BACKGROUND_COLOR_LIGHT_YELLOW = 103;
	const BACKGROUND_COLOR_LIGHT_BLUE = 104;
	const BACKGROUND_COLOR_LIGHT_MAGENTA = 105;
	const BACKGROUND_COLOR_LIGHT_CYAN = 106;
	const BACKGROUND_COLOR_WHITE = 107;

	const BACKGROUND_COLORS = [
		'default' => self::BACKGROUND_COLOR_DEFAULT,
		'black' => self::BACKGROUND_COLOR_BLACK,
		'red' => self::BACKGROUND_COLOR_RED,
		'green' => self::BACKGROUND_COLOR_GREEN,
		'yellow' => self::BACKGROUND_COLOR_YELLOW,
		'blue' => self::BACKGROUND_COLOR_BLUE,
		'magenta' => self::BACKGROUND_COLOR_MAGENTA,
		'cyan' => self::BACKGROUND_COLOR_CYAN,
		'light_gray' => self::BACKGROUND_COLOR_LIGHT_GRAY,
		'dark_gray' => self::BACKGROUND_COLOR_DARK_GRAY,
		'light_red' => self::BACKGROUND_COLOR_LIGHT_RED,
		'light_green' => self::BACKGROUND_COLOR_LIGHT_GREEN,
		'light_yellow' => self::BACKGROUND_COLOR_LIGHT_YELLOW,
		'light_blue' => self::BACKGROUND_COLOR_LIGHT_BLUE,
		'light_magenta' => self::BACKGROUND_COLOR_LIGHT_MAGENTA,
		'light_cyan' => self::BACKGROUND_COLOR_LIGHT_CYAN,
		'white' => self::BACKGROUND_COLOR_WHITE,
	];

	const LEVEL_DEBUG = 'debug';
	const LEVEL_ERROR = 'error';
	const LEVEL_FATAL = 'fatal';
	const LEVEL_INFO = 'info';
	const LEVEL_WARNING = 'warning';

	const LEVELS = [
		self::LEVEL_DEBUG,
		self::LEVEL_ERROR,
		self::LEVEL_FATAL,
		self::LEVEL_INFO,
		self::LEVEL_WARNING,
	];

	const STACK_PREFIX = 'prefix';
	const STACK_DATETIME = 'datetime';
	const STACK_LEVEL = 'level';
	const STACK_ENV = 'env';
	const STACK_PROJECT = 'project';
	const STACK_USER = 'user';
	const STACK_MESSAGE = 'msg';
	const STACK_PATH = 'path';
	const STACK_LINE = 'line';
	const STACK_SEPARATOR = 'separator';

	const SUBSTACK_LEVEL_DEBUG = self::STACK_LEVEL . '_' . self::LEVEL_DEBUG;
	const SUBSTACK_LEVEL_ERROR = self::STACK_LEVEL . '_' . self::LEVEL_ERROR;
	const SUBSTACK_LEVEL_FATAL = self::STACK_LEVEL . '_' . self::LEVEL_FATAL;
	const SUBSTACK_LEVEL_INFO = self::STACK_LEVEL . '_' . self::LEVEL_INFO;
	const SUBSTACK_LEVEL_WARNING = self::STACK_LEVEL . '_' . self::LEVEL_WARNING;

	static private array $stack = [
		self::STACK_PREFIX,
		self::STACK_DATETIME,
		self::STACK_LEVEL,
		self::STACK_ENV,
		self::STACK_PROJECT,
		self::STACK_USER,
		self::STACK_MESSAGE,
		self::STACK_PATH,
		self::STACK_LINE,
	];

	static private array $styles = [
		self::STACK_PREFIX => [
			self::BOLD,
			self::FOREGROUND_COLOR_GREEN,
		],
		self::STACK_DATETIME => [
			self::FOREGROUND_COLOR_LIGHT_YELLOW,
		],
		self::STACK_LEVEL => [
			self::BOLD,
			self::FOREGROUND_COLOR_WHITE,
			self::BACKGROUND_COLOR_DARK_GRAY,
		],
		self::SUBSTACK_LEVEL_DEBUG => [
			self::BOLD,
			self::FOREGROUND_COLOR_BLACK,
			self::BACKGROUND_COLOR_WHITE,
		],
		self::SUBSTACK_LEVEL_ERROR => [
			self::BOLD,
			self::FOREGROUND_COLOR_WHITE,
			self::BACKGROUND_COLOR_LIGHT_RED,
		],
		self::SUBSTACK_LEVEL_FATAL => [
			self::BOLD,
			self::FOREGROUND_COLOR_WHITE,
			self::BACKGROUND_COLOR_RED,
		],
		self::SUBSTACK_LEVEL_INFO => [
			self::BOLD,
			self::FOREGROUND_COLOR_WHITE,
			self::BACKGROUND_COLOR_LIGHT_BLUE,
		],
		self::SUBSTACK_LEVEL_WARNING => [
			self::BOLD,
			self::FOREGROUND_COLOR_BLACK,
			self::BACKGROUND_COLOR_YELLOW,
		],
		self::STACK_ENV => [
			self::BOLD,
			self::FOREGROUND_COLOR_WHITE,
			self::BACKGROUND_COLOR_MAGENTA,
		],
		self::STACK_PROJECT => [
			self::BOLD,
			self::FOREGROUND_COLOR_WHITE,
			self::BACKGROUND_COLOR_RED,
		],
		self::STACK_USER => [
			self::BOLD,
			self::FOREGROUND_COLOR_WHITE,
			self::BACKGROUND_COLOR_CYAN,
		],
		self::STACK_MESSAGE => [
			self::FOREGROUND_COLOR_WHITE,
		],
		self::STACK_PATH => [
			self::FOREGROUND_COLOR_LIGHT_BLUE,
		],
		self::STACK_LINE => [
			self::FOREGROUND_COLOR_CYAN,
		],
		self::STACK_SEPARATOR => [
			self::FOREGROUND_COLOR_GREEN,
			self::BACKGROUND_COLOR_GREEN,
		],
	];

	const DEFAULT_DATETIME_FORMAT = 'Y-m-d H:i:s';

	/**
	 * @var array The injected or generated data to log. (date, message, level...)
	 */
	static private array $data = [];

	/**
	 * @var string The basepath to remove from the autodetection of source path.
	 */
	static private string $basepath = '';

	/**
	 * @var string The log path to directly write in if setted.
	 * The error_log method is used otherwise.
	 */
	static private string $logpath = '';

	/**
	 * @var string Date format if log is write directly in file. (not for error_log)
	 */
	static private string $dateTimeFormat = self::DEFAULT_DATETIME_FORMAT;

	/**
	 * @var bool Colorize the level tag (warning, error, info...) with setted substyles.
	 * The basic level entry will be used otherwise.
	 */
	static private bool $colorizeLevel = false;

	/**
	 * Write data in the end of a given log file, add a line return after.
	 *
	 * @param string $filepath
	 * @param string $data
	 * @return void
	 */
	static private function write( string $filepath, string $data)
	{
		file_put_contents($filepath,$data . PHP_EOL, FILE_APPEND);
	}

	/**
	 * Switch write in log file manualy, or use error_log instead.
	 *
	 * @param string $content
	 * @return void
	 */
	static private function log(string $content)
	{
		if(self::$logpath) {
			self::write(self::$logpath, $content);
		}
		else {
			error_log(print_r($content, true));
		}
	}

	/**
	 * Apply styles to the data, and log it.
	 *
	 * @return void
	 */
	static private function beautify()
	{
		$str = '';
		if(self::$logpath) {
			self::$data[self::STACK_DATETIME] = self::colorize(date(self::$dateTimeFormat), self::$styles[self::STACK_DATETIME] ?? []);
		}

		# Respect the stack order
		foreach (self::$stack as $name) {
			$entry = self::$data[$name] ?? null;
			if(null !== $entry) {

				# Apply level color dynamically
				if(self::$colorizeLevel && $name === self::STACK_LEVEL) {
					$name = self::STACK_LEVEL . '_' . strtolower($entry);
				}

				# Concat values separated with a single space
				$str .= ($str ? ' ' : '') . self::colorize($entry, self::$styles[$name] ?? []);
			}
		}
		self::log($str);
	}

	/**
	 * Colorize given string
	 * Apply spaces if background added
	 *
	 * @param string $str
	 * @param array $styles
	 * @return string
	 */
	static private function colorize(string $str, array $styles): string
	{
		if(!$styles) {
			return $str;
		}

		# Asc order
		sort($styles);

		# Apply spaces if background added
		foreach ($styles as $style) {
			if(in_array($style, self::BACKGROUND_COLORS, true)) {
				$str = ' ' . trim($str) . ' ';
				break;
			}
		}

		# Add style tag and tag config before the string
		# Add reset tag after for next data in log
		return self::TAG . implode(';', $styles) . 'm' . $str . self::TAG . self::RESET . 'm';
	}

	/**
	 * Extracts the source (file, line) of the requested log location from the debugbacktrace.
	 *
	 * @param int $level [optional] Indicate the number of bounces (methods called internally) to skip.
	 * @return void
	 */
	static private function source(int $level = 2)
	{
		# Remove previous source data
		unset(self::$data[self::STACK_PATH], self::$data[self::STACK_LINE]);

		# Load backtrace
		$backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);

		# Extract filepath
		if($s = $backtrace[$level]['file'] ?? '') {
			if(self::$basepath) {
				$s = str_replace(self::$basepath, '', $s);
			}
			self::$data[self::STACK_PATH] = $s;
		}

		# Extract line
		if($s = $backtrace[$level][self::STACK_LINE] ?? '') {
			self::$data[self::STACK_LINE] = $s;
		}
	}

	/**
	 * Send a level log with source
	 *
	 * @param string $level
	 * @param string $msg
	 * @return void
	 */
	static private function send(string $level, string $msg)
	{
		self::source();
		self::$data[self::STACK_MESSAGE] = $msg;
		self::$data[self::STACK_LEVEL] = strtoupper($level);
		self::beautify();
	}

	/**
	 * The basepath to remove from the autodetection of source path.
	 *
	 * @param string $path [optional]
	 * @return void
	 */
	static public function basepath(string $path = '')
	{
		self::$basepath = $path;
	}

	/**
	 * Custom log filepath to directly write in.
	 *
	 * @param string $path [optional]
	 * @return void
	 */
	static public function logpath(string $path = '')
	{
		self::$logpath = $path;
	}

	/**
	 * Detect de log path in php ini to write in directly.
	 * (to not use build-in error_log function)
	 *
	 * @return bool
	 */
	static public function detectLogpath(): bool
	{
		$path = (string) ini_get('error_log');
		self::logpath($path);
		return (bool) $path;
	}

	/**
	 * Custom date format if custom logpath is used.
	 *
	 * @param string $format [optional]
	 * @return void
	 */
	static public function dateTimeFormat(string $format = self::DEFAULT_DATETIME_FORMAT)
	{
		self::$dateTimeFormat = $format;
	}

	/**
	 * You can change stack order or remove some entries.
	 *
	 * @param array $stack
	 * @return void
	 */
	static public function setStack(array $stack)
	{
		self::$stack = $stack;
	}

	/**
	 * Export actual stack.
	 *
	 * @return array
	 */
	static public function getStack(): array
	{
		return self::$stack;
	}

	/**
	 * By default, levels use the style 'level' (witch is grey)
	 * You can use the stylized levels entries like : level_warnig, level_info...
	 *
	 * @param bool $enable [optional]
	 * @return void
	 */
	static public function colorizeLevel(bool $enable = true)
	{
		self::$colorizeLevel = $enable;
	}

	/**
	 * @see L::setStyle()
	 * @param array $styles
	 * @return void
	 */
	static public function setHeaderPrefixStyle(array $styles)
	{
		self::setStyle(self::STACK_PREFIX, $styles);
	}

	/**
	 * @see L::setStyle()
	 * @param array $styles
	 * @return void
	 */
	static public function setHeaderLevelStyle(array $styles)
	{
		self::setStyle(self::STACK_LEVEL, $styles);
	}

	/**
	 * @see L::setStyle()
	 * @param array $styles
	 * @return void
	 */
	static public function setHeaderEnvStyle(array $styles)
	{
		self::setStyle(self::STACK_ENV, $styles);
	}

	/**
	 * @see L::setStyle()
	 * @param array $styles
	 * @return void
	 */
	static public function setHeaderProjectStyle(array $styles)
	{
		self::setStyle(self::STACK_PROJECT, $styles);
	}

	/**
	 * @see L::setStyle()
	 * @param array $styles
	 * @return void
	 */
	static public function setHeaderUserStyle(array $styles)
	{
		self::setStyle(self::STACK_USER, $styles);
	}

	/**
	 * @see L::setStyle()
	 * @param array $styles
	 * @return void
	 */
	static public function setHeaderLevelDebugStyle(array $styles)
	{
		self::setStyle(self::SUBSTACK_LEVEL_DEBUG, $styles);
	}

	/**
	 * @see L::setStyle()
	 * @param array $styles
	 * @return void
	 */
	static public function setHeaderLevelErrorStyle(array $styles)
	{
		self::setStyle(self::SUBSTACK_LEVEL_ERROR, $styles);
	}

	/**
	 * @see L::setStyle()
	 * @param array $styles
	 * @return void
	 */
	static public function setHeaderLevelFatalStyle(array $styles)
	{
		self::setStyle(self::SUBSTACK_LEVEL_FATAL, $styles);
	}

	/**
	 * @see L::setStyle()
	 * @param array $styles
	 * @return void
	 */
	static public function setHeaderLevelInfoStyle(array $styles)
	{
		self::setStyle(self::SUBSTACK_LEVEL_INFO, $styles);
	}

	/**
	 * @see L::setStyle()
	 * @param array $styles
	 * @return void
	 */
	static public function setHeaderLevelWarningStyle(array $styles)
	{
		self::setStyle(self::SUBSTACK_LEVEL_WARNING, $styles);
	}

	/**
	 * Customize your log style.
	 *
	 * @param string $name
	 * @param array $styles
	 * @return void
	 */
	static public function setStyle(string $name, array $styles)
	{
		self::$styles[$name] = $styles;
	}

	/**
	 * Set info before your log data, example : ❚ [env] [project] [user] ...
	 *
	 * @param string $env [optional]
	 * @param string $project [optional]
	 * @param string $user [optional]
	 * @param string $prefix [optional]
	 * @return void
	 */
	static public function header(string $env = '', string $project = '', string $user = '', string $prefix = '❚')
	{
		if($env) {
			self::$data[self::STACK_ENV] = strtoupper($env);
		}
		else {
			unset(self::$data[self::STACK_ENV]);
		}
		if($project) {
			self::$data[self::STACK_PROJECT] = strtoupper($project);
		}
		else {
			unset(self::$data[self::STACK_PROJECT]);
		}
		if($user) {
			self::$data[self::STACK_USER] = mb_strtoupper($user);
		}
		else {
			unset(self::$data[self::STACK_USER]);
		}
		if($prefix) {
			self::$data[self::STACK_PREFIX] = $prefix;
		}
		else {
			unset(self::$data[self::STACK_PREFIX]);
		}
	}

	/**
	 * Unset data (not header)
	 *
	 * @return void
	 */
	static public function empty()
	{
		unset(self::$data[self::STACK_DATETIME], self::$data[self::STACK_LEVEL], self::$data[self::STACK_MESSAGE], self::$data[self::STACK_PATH], self::$data[self::STACK_LINE]);
	}

	/**
	 * Log a data, with some info in header before (type, count etc...)
	 *
	 * @param mixed $data
	 * @return void
	 */
	static public function debug($data)
	{
		$log = false;
		$type = gettype($data);

		$msg = 'DATA (' . $type . ')';
		switch ($type) {
			case 'boolean':
				$msg .= ' ' . ($data ? 'true' : 'false');
				break;
			case 'integer':
			case 'double':
				$msg .= ' ' . $data;
				break;
			case 'array':
				$msg .= ' count(' . count($data) . ')';
				$log = true;
				break;
			case 'string':
				$msg .= ' strlen(' . strlen($data) . ') mb_strlen(' . mb_strlen($data) . ')';
				$log = true;
				break;
			case 'NULL':
				$msg .= ' NULL';
				break;
			case 'object':
				$msg .= ' get_class(' . get_class($data) . ')';
				$log = true;
				break;
			case 'resource':
			case 'resource (closed)':
			case 'unknown type':
				$log = true;
			break;
		}

		self::send(self::LEVEL_DEBUG, $msg);
		if($log) {
			error_log(print_r($data, true));
		}
	}

	/**
	 * @see L::send()
	 * @param string $msg
	 * @return void
	 */
	static public function warning(string $msg)
	{
		self::send(self::LEVEL_WARNING, $msg);
	}

	/**
	 * @see L::send()
	 * @param string $msg
	 * @return void
	 */
	static public function error(string $msg)
	{
		self::send(self::LEVEL_ERROR, $msg);
	}

	/**
	 * @see L::send()
	 * @param string $msg
	 * @return void
	 */
	static public function fatal(string $msg)
	{
		self::send(self::LEVEL_FATAL, $msg);
	}

	/**
	 * @see L::send()
	 * @param string $msg
	 * @return void
	 */
	static public function info(string $msg)
	{
		self::send(self::LEVEL_INFO, $msg);
	}

	/**
	 * Log a line separator.
	 *
	 * @param int $length [optional]
	 * @param string $chars [optional]
	 * @return void
	 */
	static public function separator(int $length = 500, string $chars = '❚')
	{
		$str = str_pad($chars, $length, $chars);
		$l = self::colorize($str, self::$styles[self::STACK_SEPARATOR] ?? []);
		self::log($l);
	}

	/**
	 * Log a rainbow line.
	 *
	 * @param int $length [optional]
	 * @param string $chars [optional]
	 * @return void
	 */
	static public function rainbow(int $length = 150, string $chars = '❚')
	{
		$l = '';
		for ($i = 0; $i < $length; $i++) {
			$k = array_rand(self::FOREGROUND_COLORS);
			$l .= self::colorize($chars, [self::FOREGROUND_COLORS[$k]]);
		}
		self::log($l);
	}

	/**
	 * Log colorized SQL query
	 *
	 * @param string $query
	 * @return void
	 */
	static public function sql(string $query)
	{
		$query = self::colorize($query, [
				self::FOREGROUND_COLOR_WHITE,
			]) . ' ';

		$query = preg_replace_callback('`(?P<before>\s*)(?P<q>SELECT|DELETE|INSERT|UPDATE|SHOW|FROM|WHERE|AND|OR|SET|INTO)(?P<after>\s+)`i', function ($matches) {
			return $matches['before'] . self::colorize($matches['q'], [
					self::BOLD,
					self::FOREGROUND_COLOR_LIGHT_YELLOW,
				]) . $matches['after'];
		}, $query);

		$query = preg_replace_callback('#(?P<before>\s*)(?P<q>`[`a-z\d\._-]+`)(?P<after>\s+)#i', function ($matches) {
			return $matches['before'] . self::colorize($matches['q'], [
					self::BOLD,
					self::FOREGROUND_COLOR_LIGHT_MAGENTA,
				]) . $matches['after'];
		}, $query);

		$query = preg_replace_callback('`(?P<before>(?:\s|\033)=(?:\s|\033))(?P<q>(?:\'[^\']+\')|(?:"[^"]+"))(?P<after>(?:\s|\033))`i', function ($matches) {
			return $matches['before'] . self::colorize($matches['q'], [
					self::FOREGROUND_COLOR_LIGHT_GREEN,
				]) . $matches['after'];
		}, $query);

		$query = preg_replace_callback('`(?P<before>(?:\s|\033)=(?:\s|\033))(?P<q>\d+)(?P<after>(?:\s|\033))`i', function ($matches) {
			return $matches['before'] . self::colorize($matches['q'], [
					self::FOREGROUND_COLOR_LIGHT_CYAN,
				]) . $matches['after'];
		}, $query);

		self::info("SQL QUERY\r\n$query\r\n");
	}
}