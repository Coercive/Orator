Coercive Orator
===============

Simple handlers for Slack and Discord webhooks.

Get
---
```
composer require coercive/orator
```

Slack
-----
```
$slack = new SlackHook(HOOKS_SLACK_URL);
$slack->publish('Hello!');
```

Discord
-------
```
$discord = new DiscordHook(HOOKS_DISCORD_URL);
$discord->setContent('Hello!');
$discord->publish();
```

Vocalize text ?
```
$discord->setTts(true);
```

Advanced embed content
```
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