# ChatX
Simple free PHP &amp; jQuery chat project with flat file database

<h2>What is ChatX?</h2>
ChatX is a highly customized and refined version of the first iteration of the ShoutBox script originally introduced on <a href="https://tutorialzine.com/2015/01/shoutbox-php-jquery">Tutorialzine</a> in 2015.
<br />
The script uses flat file database only, built with the use of Flywheel and RelativeTime PHP libraries, jQuery, HTML, CSS. It's easy to install and modify, works perfectly with any PHP 5.3 or higher hosting services.
<br />
The idea that stood behind the development of ChatX was to create an easy-to-use compact chat with draggable functionality and fully-customizable color schemes, capable of working on any web-site with the code installed.
<br />
<h2>Preview image</h2>
<img src="https://i.imgur.com/jPpLLtX.png">

<br />
<h2>Main features:</h2>
<li>Flat file storing</li>
<li>Easy installation</li>
<li>Modest. Doesn't need a bunch of dependencies, does not load your hosting resources too much</li>
<li>Works well with any websites (more improvements to come)</li>
<li>Compact and modern look</li>
<li>Draggable, ability to remember coordinates on the page</li>
<li>Autoloads new shouts through JSON every 15 sec on slow track and every 5 sec on fast track (customizable)</li>
<li>Slow & fast tracks are togglable through chat settings, stored in LocalStorage</li>
<li>Also provides manual refresh button</li>
<li>Nick-name is stored in LocalStorage, not cleared on submit anymore.</li>
<li>Loads 20 recent shouts (customizable)</li>
<li>Auto expanding textarea for a new message</li>
<li>Submit on Enter</li>
<li>XSS-free (hopefully)</li>
<li>240 char per message. Limit also specified on backend server side</li>
<li>15 char limit for nick-name field (also PHP)</li>
<li>Prohibited empty messages (PHP)</li>
<li>Nice font-powered, scalable and customizable icons</li>
<li>Appears after pageload (no disturbing jumps)</li>
<li>Supports Emoji (EmojiOne, updated ver. 3.1.2)</li>
<li>Reply system</li>
<li>Timing with RelativeTime</li>
<li>Languages: Eng / Rus (more to come)</li>
<li>BB-tags: bold; italic; underlined; text color; images; links;</li>
<li>Media uploader (to imgur.com)</li>
<li>Separate ChatX template file for easy color customization</li>
ver 1.4.0
<li>Close button that minifies chat</li>
<li>Stop Get query when minimized and restore on expand</li>
<li>New universal scrollbar</li>
<li>Pulsating indicator when in fast track mode</li>
<li>Open links in new window</li>
<li>Simplier code (in process of developing universal widget)</li>
<li>Upadated Draggable.js library, now ChatX works with great variety of jQuery libraries</li>
ver 1.5.0
<li>a better way of loading CSS</li>
<li>Interface translation simplified</li>
<li>UI improvements</li>
<li>Moderation page</li>
<li>Updated icon while uploading image</li>
<li>Fixed when image was uploaded but not sent due to the empty name field</li>
<li>script.js --> core.js</li>
<li>Updated widget (simpler installation)</li>
<li>Beta Authentification (login & sign up)</li>
<li>Public & Private mode</li>
<li>New Settings.php file with easilty customizable ChatX settings</li>
<li>Logged In users have a verification icon</li>
<li>Usergroups: users and moderators.</li>
<li>Updated Flywheel library (more developed database in perspective)</li>
ver 1.6.0
<li>Private mode no longer in beta</li>
<li>Passwords are hashed with PASSWORD_BCRYPT</li>
<li>Cookies secured</li>
<li>Json files no longer accessible directly</li>
<li>General security improvements</li>
<li>Complete userlist page</li>
<li>New page - Setups.php. Easy way of editing settings</li>
<li>ChatX now checks when it is outside viewpoint and restores its position</li>
ver 1.7.0
<li>Featherlight library allows viewing uploaded images in modal window</li>
<li>New prompt menu for bb-tags</li>
<li>Resize widget horizontally</li>
<li>Updates for moderator's panel with new options and settings</li>
<li>Changeble widget language (Rus/Eng)</li>
<li>Widget works better with various websites</li>
<li>General improvements and updates</li>

<h2>ToDo list:</h2>
ChatX is still under development. We are expecting more improvements and features in future. However, we'd be glad if you helped us with the development. Below we enlisted main ToDo changes. Feel free to commit new ideas or working solutions :) Things implemented are crossed out.
<h3>Nearest perspective:</h3>
<li>Templates</li>
<li>Chat history for users (in another tab)</li>
<li>Integration with MyBB.ru</li>

<h3>Long perspective:</h3>
<li>Notification for the new messages when widget is minimized</li>

<h2>Acknowledgements</h2>
Thanks Tutorialzine for the initial shoutbox release.
<br />
Thanks Alex_63 for the implementation of the fast / slow track system
<br />
Thanks me for all the patience during the development :)
<br />
More to come, help us and you'll be here too.

<h2>Installation</h2>
ChatX works out-of-the-box on demo page (INDEX.HTML). However, if you condsider using it on other web-sites or directories, you are to complete a simple installation:
<br />
a) Login as Admin and navigate to /client/index.php. In the left sidebar you will find ChatX widget. Copy it to your website.


b) open /setups.php and define your external domain. For example "https://your-domain.com" (without final "/")
If done ChatX must work correctly.

<h2>Demo</h2>
Coming soon!


<h2>ChatX official web-site (Russian): https://celans.ru/ChatX/</h2>
