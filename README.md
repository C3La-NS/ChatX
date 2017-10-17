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
<img src="https://i.imgur.com/RYH2XLN.png">
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

<h2>ToDo list:</h2>
ChatX is still under development. We are expecting more improvements and features in future. However, we'd be glad if you helped us with the development. Below we enlisted main ToDo changes. Feel free to commit new ideas or working solutions :) Things implemented are crossed out.
<h3>Nearest perspective:</h3>
<li><del>Make separate .css file for easy-customizable chat color-scheme</del></li>
<li><del>A tooltip for the required name field</del></li>
<li><del>Bring English localization back!</del></li>
<li>Make simple installation instructions on demo-page (INDEX.HTML)</li>
<li><del>Introduce simple formatting tags (bold, italic and more)</del></li>
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
<link href="https://file.myfontastic.com/pK2gUqLQUfCn3ScMEZhDmc/icons.css" rel="stylesheet">
<link rel="stylesheet" href="./assets/css/chatx_styles.css" />
```

```
        <div id="chatx" class="chat">
            <header>
                <h1><i class="icon-chat"></i> ChatX | Chat <input id="false_shoutbox_name" type="name" maxlength="15" placeholder="Enter name" onblur="javascript:getElementById('shoutbox-name').value=this.value" /><div class="name-required">Please insert your name</div> <i class="icon-refresh"></i>
                    <div class="chat_popover_parent"> <a href="javascript:void(0);" class="chat_btn"><i class="icon-gear"></i></a>
                        <div class="chat_popover"><div><span>Fast track update</span><input type="checkbox" id="icd" name="icd" value="icd" /><label for="icd"></label></div></div>
                    </div>
                </h1>
            </header>
            <div class="body">
                <div class="shoutbox">
                    <ul class="shoutbox-content"></ul>
                    <div class="shoutbox-helper">
                        <p>New messages above</p>
                        <hr>
                        <span>Formatting tags:
                        <li>[b]Text[/b] results in: <b>Text</b></li>
                        <li>[i]Text[/i] results in: <i>Text</i></li>
                        <li>[u]Text[/u] results in: <u>Text</u></li>
                        <li>[color=red]Text[/color] results in: <span style="color: red">Text</span></li>
                        <li>[img]Img.jpg[/img] produces an image</li>
                        <li>[url]Url[/url] produces a link</li>
                        </span>
                    </div>
                </div>
            </div>
            <div class="shoutbox-form">
                <form id="NewMessage">
                    <input type="hidden" id="shoutbox-name" name="name" maxlength="15" />
                    <div class="dropzone"></div>
                    <textarea id="shoutbox-comment" class="js-elasticArea" rows="2" data-min-rows="2" placeholder="Start typing..." name="comment" maxlength='240'></textarea>
                    <button id="send_message" type="submit" onclick="chatSubmit();"><i class="icon-send"></i></button>
                </form>
            </div>
        </div>
        <!-- chat End -->

```
    
```    
    <!-- Include jQuery and the EmojiOne library -->
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="./assets/js/draggable.min.js"></script>
    <script src="./assets/js/script.js" charset="UTF-8"></script>
    <script src="https://cdn.jsdelivr.net/npm/emojione@3.1.2/lib/js/emojione.min.js"></script>

```
It's advisable to add CSS files to Header of your website and JS files to Footer.
Then procede to script.js (assets/js) and type the straight link to your ChatX directory once again.
```
siteurl = '.'; // Replace dot with the ChatX URL if you gonna use chat on other pages
```
If done ChatX must work correctly.

<h2>Demo</h2>
Coming soon!


<h2>ChatX official web-site (Russian): https://celans.ru/ChatX/</h2>
