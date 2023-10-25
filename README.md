Coercive Orator
===============

Simple handlers for Slack and Discord webhooks.

Get
---
```shell
composer require coercive/orator
```

Slack
-----
```php
$slack = new SlackHook(HOOKS_SLACK_URL);
$slack->publish('Hello!');
```

Discord
-------
```php
$discord = new DiscordHook(HOOKS_DISCORD_URL);
$discord->setContent('Hello!');
$discord->publish();
```

Vocalize text ?
```php
$discord->setTts(true);
```

Advanced embed content
```php
# Simple content
$embed1 = new Embed('Light', 'This is white colored', '#FFFFFF');

# Complex content
$embed2 = new Embed;
$embed2->Author()->setName('JOHN DOE');
$embed2->setTitle('Custom title');
$embed2->setColor('#FF0000');
$embed2->setDescription('Say something');
$embed2->Footer()->setText('This is the end');

$discord = new DiscordHook(HOOKS_DISCORD_URL);
$discord->setContent('Hello!');
$discord->addEmbed($embed1);
$discord->addEmbed($embed2);
$discord->publish();
```

Log
---
Example of basic config
```php
L::detectLogpath();
L::basepath('/root/path/to/my/project');
L::header('prod', 'myproject', 'coercive', '•••');
L::colorizeLevel();
```

And then, you can log something
```php

# Log by level (debug, error, fatal, info, warning)
L::info('Hello! This is an info log!');
L::warning('Hello! This is a warning log!');

# Log mixed data
L::debug([
    'example',
    'data',
    'to',
    'log'
]);

# Add separator
L::separator();
L::rainbow();
```
