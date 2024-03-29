# ChatX
Simple free PHP &amp; JavaScript chatroom with flat file database

<h1>Demo <a href="https://codepen.io/C3La-NS/full/jOZpgRW">on CodePen</a><h1>

<h2>What is ChatX?</h2>
ChatX is an advanced and sophisticated iteration of the original ShoutBox script, initially introduced on <a href="https://tutorialzine.com/2015/01/shoutbox-php-jquery">Tutorialzine</a> in 2015.
<br />
This script utilizes a flat file database and harnesses the power of <a href="https://github.com/jamesmoss/flywheel">Flywheel</a> and <a href="https://github.com/mpratt/RelativeTime">RelativeTime</a> PHP libraries to provide a seamless and efficient user experience. It is user-friendly, easy to install and modify, and compatible with nearly all hosting services.
<br />
The idea behind the development of ChatX was to create an easy-to-use compact chat widget with fully-customizable color schemes, capable of working on any web-site with the code installed.
<br />
<h2>Preview image</h2>
<img src="https://i.imgur.com/BlIRJZ9.png">

<h2>Why ChatX?</h2>
<br />
One of the key features of ChatX is its accessibility and convenience. The chat remains on the screen and is always within reach, even while navigating the website. It is easy to drag and resize the widget within the browser viewport, and it can be expanded or minimized to suit your needs. The chat also remembers its state, so you don't have to readjust it each time you use it.
<br />
Another benefit of ChatX is its ease of installation. There is no need for complex setups or MySQL or other databases. Just unzip the archive on your hosting and you're ready to go. The script is compatible with PHP 7.0+, making it suitable even for free web hosting services.
<br />
Despite its simplicity, ChatX offers all the main features of a regular chat. You can easily manage the chat's global functions without needing to understand JavaScript or PHP coding.
<br />
It's free, without any ads or distracting copyrights, and we continuously work to improve the user experience.
<br />
<h2>Main features:</h2>
<li>Flat file database</li>
<li>Long-polling for persistent connection</li>
<li>Easy installation</li>
<li>Modest. No need for a bunch of dependencies, does not load your hosting resources too much</li>
<li>Works well with many websites (including 3-rd party websites)</li>
<li>Compact and modern widget with draggable, and resizeable functionality</li>
<li>Languages: English / Russian</li>
<li>BB-tags: bold; italic; underlined; text color; images; links;</li>
<li>Media uploader (via imgur.com)</li>
<li>Authentication system</li>
<li>Moderation panel (shout management, user management, settings management, style customization)</li>
<li>Public and private mode</li>
<li>Push and sound notifications for new messages</li>
<br />
<details> 
  <summary><h2>Changelog (+)</h2></summary>
  <b>ver 1.4.0</b>
  <li>Close button that minifies chat</li>
  <li>Stop Get query when minimized and restore on expand</li>
  <li>New universal scrollbar</li>
  <li>Pulsating indicator when in fast track mode</li>
  <li>Open links in new window</li>
  <li>Simpler code (in process of developing universal widget)</li>
  <li>Updated Draggable.js library, now ChatX works with great variety of jQuery libraries</li>
  <b>ver 1.5.0</b>
  <li>a better way of loading CSS</li>
  <li>Interface translation simplified</li>
  <li>UI improvements</li>
  <li>Moderation page</li>
  <li>Updated icon while uploading image</li>
  <li>Fixed when image was uploaded but not sent due to the empty name field</li>
  <li>script.js --> core.js</li>
  <li>Updated widget (simpler installation)</li>
  <li>Beta Authentication (login & sign up)</li>
  <li>Public & Private mode</li>
  <li>New Settings.php file with easily customizable ChatX settings</li>
  <li>Logged In users have a verification icon</li>
  <li>Usergroups: users and moderators.</li>
  <li>Updated Flywheel library (more developed database in perspective)</li>
  <b>ver 1.6.0</b>
  <li>Private mode no longer in beta</li>
  <li>Passwords are hashed with PASSWORD_BCRYPT</li>
  <li>Cookies secured</li>
  <li>Json files no longer accessible directly</li>
  <li>General security improvements</li>
  <li>Complete userlist page</li>
  <li>New page - Setups.php. Easy way to edit settings</li>
  <li>ChatX now checks when it is outside viewpoint and restores its position</li>
  <b>ver 1.7.0</b>
  <li>Featherlight library allows viewing uploaded images in modal window</li>
  <li>New prompt menu for bb-tags</li>
  <li>Resize widget horizontally</li>
  <li>Updates for moderator's panel with new options and settings</li>
  <li>Changeable widget language (Rus/Eng)</li>
  <li>Widget works better with various websites</li>
  <li>General improvements and updates</li>
  <b>ver 1.8.0</b>
  <li>MyBB integration</li>
  <li>Chat history</li>
  <li>New settings options</li>
  <li>Stability & performance improvements</li>
  <b>ver 1.9.0</b>
  <li>Shout management: multiple message selection</li>
  <li>New settings in moderator's panel</li>
  <b>ver 2.0.0</b>
  <li>New messages at the bottom</li>
  <li>Thumbnails for jpg and jpeg images</li>
  <li>Updated UI when uploading images from external URLs</li>
  <li>All images are hosted on Imgur.com</li>
  <b>ver 2.1.0</b>
  <li>Username styling</li>
  <b>ver 2.2.0</b>
  <li>Notification for the new messages when widget is minimized</li>
  <li>Audio notifications for the new messages when user is logged in</li>
  <li>Highlighted messages of its owner</li>
  <li>Easier style customization with CSS vars</li>
  <b>ver 2.3.0</b>
  <li>Autorecognizing URLs (for users only)</li>
  <li>New menu for link insertion</li>
  <li>Ajax load paused whenever text selected in chat</li>
  <li>Ajax load paused when multiple tabs with widget are active, staying alive in current tab</li>
  <li>New widget styling page with Ace editor in moderator's panel</li>
  <li>Refined styling tuning</li>
  <li>Minimal mobile optimization</li>
  <li>Hotkeys (Ctrl+B) for bold, (Ctrl+I) for italic, (Ctrl+U) for underlined formatting tags</li>
  <li>Prompts on widget demo page</li>
  <li>Option in settings to switch off demo page</li>
  <li>Simple (dumb) push notifications for new messages in chat (for users only)</li>
  <li>New sound notification variant for new messages in chat. New sound effect when message is sent</li>
  <li>Switchable EmojiOne library option for Emoji in chat settings</li>
  <li>Precise timestamp on hovering on relative time mark</li>
  <li>Dynamic loading of chat history in widget itself</li>
  <li>Optimization and improvements for Nginx</li>
  <li>Redesign of minified chat tray</li>
  <b>ver 2.4.0</b>
  <li>Vanilla JS code (no jQuery)</li>
  <li>JWT for loggin in. Persistent loggin session</li>
  <li>No jQuery-ui. Mobile support for drag&drop and resize events</li>
  <li>Full 3rd party websites support</li>
  <li>Custom lightbox gallery with scaling up/down features</li>
  <li>CTRL+V to upload an image from clipboard</li>
  <li>Automatic check for ChatX updates in moderation panel</li>
  <li>Preset widget color schemes</li>
  <li>Enhanced MyBB.ru integration. Keeping profile passwords in the forum storage</li>
  <li>Overall UI improvements for the widget and moderator's panel</li>
  <li>Updated help page</li>
  <li>Imgur application identificator (API) field in ChatX settings</li>
  <b>ver 2.5.0</b>
  <li>PHP 8.0+ support</li>
  <li>Content editable input field for new messages</li>
  <li>CTRL+ENTER for new lines</li>
  <li>A static file for checking updates in chat</li>
  <li>Visual indicator for characters left in input field</li>
  <li>Empty bbtags no longer transformed into html</li>
  <li>Login form is inserted in DOM when it is expected for it</li>
  <li>Non-transparent .png files are shown in thumbnails</li>
  
</details>
<br />
<h2>Acknowledgements</h2>
Thanks to Tutorialzine for the initial shoutbox script release and inspiration.
<br />
Thanks to Alex_63 for the implementation of the fast & slow track system.
<br />
Thanks to me for all the patience during the development :)
<br />
<h2>Requirements</h2>
PHP 7.0+
<br />
HTTPS
<br />
CURL (for uploading images to imgur)
<br />
<h2>Installation</h2>
1) Unpack the archive in an arbitrary directory on your server and navigate to it;
<br />
2) ChatX works out-of-the-box on the demo page (INDEX.PHP). You will see a minified chat box in the bottom right corner of the screen.
<br />
<br />
If you plan to embed the chat on another URL within the same website or use it on a third-party website, you will need to complete further installation procedures:
<br />
a) Expand the widget;
<br />
b) Click on <b>Gear</b> icon <b>→</b> <b>Login</b>;
<br />
c) In the modal box, login as <b>admin</b> (the default password is <b>admin</b>);
<br />
d) Click on <b>ChatX management</b> link;
<br />
e) In the new tab follow the steps provided in the left sidebar.
<br />
<br />
If done ChatX should work correctly on any website.


<h3>ChatX development blog: https://xlns.ru/blog/category/chatx/ (in Russian)</h3>
<h3>ChatX knowledgebase: https://xlns.ru/wiki/ (in Russian)</h3>
<h3>ChatX for MyBB.ru forums: http://forum.mybb.ru/viewtopic.php?id=38807 (in Russian)</h3>
<br />
<a href="https://www.buymeacoffee.com/C3LaNS" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;" ></a>
