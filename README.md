# ChatX
Simple, free PHP &amp; jQuery chat project with flat file database

<h2>What is ChatX?</h2>
ChatX is a highly customized and refined version of the first iteration of the ShoutBox script originally introduced on <a href="https://tutorialzine.com/2015/01/shoutbox-php-jquery">Tutorialzine</a> in 2015.
<br />
The script uses flat file database only, built with the use of Flywheel and RelativeTime PHP libraries, jQuery, HTML, CSS. It's easy to install and modify, works perfectly with any PHP 5.3 or higher hosting services.
<br />
The idea that stood behind the development of ChatX was to create an easy-to-use compact chat with draggable functionality and fully-customizable color schemes, capable of working on any web-site with the code installed.
<br />
<img src="http://celans.ru/ChatX/wp-content/uploads/sites/4/2017/09/snip_20170913215406.png">
<br />
<h2>Main features:</h2>
<li>Flat file storing</li>
<li>Easy installation</li>
<li>Modest. Don't need a bunch of dependencies, does not load your hosting resources too much</li>
<li>Works well with any websites (more improvement to come)</li>
<li>Compact and modern look</li>
<li>Draggable, ability to remember coordinates on the page</li>
<li>Autoloads new shouts through JSON every 15 sec on slow track and every 5 sec on fast track (customizable)</li>
<li>Slow & fast track is togglable through chat settings, stored in LocalStorage</li>
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


<h2>ToDo list:</h2>
ChatX is still under development. We are expecting more improvements and features in future. However, we'd be glad if you help us with the development. Below we enlisted ToDo vector of progress. Feel free to commit new ideas or working solutions :) Things implemented are crossed out.
<h3>Nearest perspective:</h3>
<li>Make separate .css file for easy-customizable chat color-scheme</li>
<li>A tooltip for the required name field</li>
<li>Bring English localization back!</li>
<li>Make simple installation instructions on demo-page (INDEX.HTML)</li>
<li>Introduce simple formatting tags (bold, italic and more)</li>
<li>Templates</li>
<h3>Long perspective:</h3>
<li>Close button that minifies chat</li>
<li>Chat history (probably in another tab)</li>


<h2>Acknowledgements</h2>
Thanks Tutorialzine for the initial shoutbox release.
<br />
Thanks Alex_63 for the implementation of the fast / slow track system
<br />
Thanks me for all the patience during the development :)
<br />
More to come, help us and you'll be here too.

<h2>Installation</h2>
ChatX works out-of-the-box on demo page (INDEX.HTML). However, if you condsider using it on other web-sites or directories, you will have to complete a simple installation:
<br />
Copy ChatX code and <b>make sure all the links are pointing straight to your ChatX directory</b>

```
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/emojione@3.1.2/extras/css/emojione.min.css" />
<link href="https://file.myfontastic.com/pK2gUqLQUfCn3ScMEZhDmc/icons.css" rel="stylesheet">
<link rel="stylesheet" href="./assets/css/chatx_styles.css" />


<div id='chatx' class='chat'>
            <header>
                <h1><i class="icon-chat"></i> ChatX | Chat <input id="false_shoutbox_name" type="name" maxlength="15" placeholder="Enter name" onblur="javascript:getElementById('shoutbox-name').value=this.value"/> <i class="icon-refresh"></i>
                    <div class="chat_popover_parent"> <a href="javascript:void(0);" class="chat_btn"><i class="icon-gear"></i></a>
                        <div class="chat_popover"><div><span>Fast track update</span><input type="checkbox" id="icd" name="icd" value="icd" /><label for="icd"></label></div></div>
                    </div>
                </h1>
            </header>
            <div class='body'>
                <div class="shoutbox">
                    <ul class="shoutbox-content"></ul>
                    <div class="shoutbox-form">
                        <h2>New messages atop</h2>
                    </div>
                </div>
            </div>
            <div class="shoutbox-form">
                <form id="NewMessage">
                    <input type="hidden" id="shoutbox-name" name="name" maxlength="15" />
                    <textarea data-autoresize id="shoutbox-comment" rows="2" data-min-rows="2" placeholder="Start typing..." name="comment" maxlength='240'></textarea>
                    <button id="send_message" type="submit" value=""><i class="icon-send"></i></button>
                </form>
            </div>
        </div>
    <!-- chat End -->
    <!-- Include jQuery and the EmojiOne library -->
    
    
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.2/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/emojione@3.1.2/lib/js/emojione.min.js"></script>
<script src="./assets/js/script.js" charset="UTF-8"></script>
<script src="./assets/js/additional.js"></script>
```
It's advisable to add CSS files to Header of your website and JS files to Footer.
Then procede to script.js (assets/js) and type the straight link to your ChatX directory once again.
```
siteurl = '.'; // Replace dot with the ChatX URL if you gonna use chat on other pages
```
If done ChatX must work correctly.

<h2>Demo</h2>
Coming soon!
