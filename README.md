# textbrowser / Snapshot Telegram WordPress bot

originally applied with this for the Telegram #botprize but never win or got heeded.

My suggestion is, to read the whole readme...

The very special thing about this: it is WordPress code ...
so thats a Telegram bot which can run on every WordPress instance on the internet.
(and you know WordPress is 33 % in the moment)

you can only use
https://t.me/snapshot_bot
in action. The other is deprecated.

the problem is they were before I got to know wp_remote_post and have no user management or something.
thats the reason why they do not match any more our business model and we decided to open-source it.
So we just publish them on github in the hope they are useful for somebody. They are GPL2, mainly because of WordPress itself and
the additional libraries it is using.

Our own quality assurance says it has a very bad code style. Although we try to go with Allman Style, but it is not guaranteed, that we deliver good code here.

## What it is
the complete code for two Telegram bots running on a WordPress instance

## What it is not
Easy understandable code or code with a good quality.

## What I offer you
I am so passionate about #WordPress or #Telegram that I offer you free help on my personal account on
https://t.me/theode . I have a lot of free time in the train, so do not hesitate to ask something!

## What I cannot offer in the moment
I am not able to write Telegram bots or WordPress plugins for you for free. If you have enough money
I can write something for you for 160 usd / per hour and got a bill from the company I am working for.

### Requirements
- WordPress,
- Telegram Bot token,
- (for Snapshots) api keys of snapshot engines

there is a function inside called wp_get_googlelink($url) which is not published here.
this has different reasons. one is , that google said they deprecate it, the second reason:
because of API keys and so on it is too private.

### How to activate it
Just put all the files to your WordPress wp-content/plugins/textbrowser and add a few variables.
We tried to mark them with {your-code-here}



