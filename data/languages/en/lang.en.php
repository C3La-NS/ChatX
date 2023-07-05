<?php
/* 
------------------
Language: English
------------------
*/

$lang = array();

// Page Titles
$lang['TITLE_MANAGEMENT'] = 'ChatX Management';
$lang['TITLE_USERS'] = 'ChatX User Management';
$lang['TITLE_SETTINGS'] = 'ChatX Settings';
$lang['TITLE_HISTORY'] = 'ChatX History';
$lang['TITLE_STYLING'] = 'CSS Editor';

// Navbar
$lang['NAVBAR_GREETING'] = 'Howdy,';
$lang['NAVBAR_LOGOUT'] = 'LogOut';

// Navigation
$lang['NAVIGATION'] = 'Navigation';
$lang['SHOUT_MANAGEMENT'] = 'Shout Management & Widget';
$lang['USER_MANAGEMENT'] = 'User Management';
$lang['CHATX_SETUPS'] = 'ChatX Settings';
$lang['CHATX_STYLING'] = 'CSS Editor';
$lang['GITHUB'] = 'GtiHub';

// Moderator Panel Settings
$lang['CHATX_SETTINGS'] = 'ChatX Settings';
$lang['CHATX_SETTINGS_DESCRIPTION'] = 'You can enable or disable global functions for chat app here.';
$lang['LOGGED_IN_CAN_READ&SEND_MESSAGES'] = 'Only logged in users can read and send messages:';
$lang['USER_REGISTRATION_ENABLED'] = 'New user registration is enabled:';
$lang['NUMBERS_ONLY'] = 'Numbers only';
$lang['RELOAD_MESSAGES_SLOW_TRACK'] = 'ChatX reloads messages in <b>slow</b> track every (seconds):';
$lang['RELOAD_MESSAGES_FAST_TRACK'] = 'ChatX reloads messages in <b>fast</b> track every (seconds):';
$lang['EMOJIONE_LIBRARY'] = 'Use <b>EmojiOne</b> library to replace :) with emoji:';
$lang['MYBB_INTEGRATION'] = 'Use <b>MyBB</b> forum data to log in or sign up users automatically:';
$lang['DEMO_PAGE'] = 'Show demonstration page with chat';
$lang['MESSAGE_MAX_CHARS'] = 'Max characters per message:';
$lang['WIDGET_MAX_SHOUTS'] = 'Max shouts in chat app:';
$lang['HISTORY_MAX_SHOUTS'] = 'Max shouts in chat history:';
$lang['IMGUR_IDENTIFICATOR'] = 'Imgur application identificator (API):';
$lang['SOUND_NOTIFICATION'] = 'Notification sound for new messages:';
$lang['NOTIFICATION_VARIANT'] = 'Sample';
$lang['NOTIFICATION_NULL'] = 'Disabled';
$lang['LANGUAGE'] = 'Appplication language:';
$lang['LANGUAGE_EN'] = 'English';
$lang['LANGUAGE_RU'] = 'Russian';
$lang['EXTERNAL_DOMAIN'] = 'External domain where you are going to use ChatX:';
$lang['SAVE_SETTINGS'] = 'Save Settings';
$lang['AUTO_PURGING'] = 'Automatic Purging';
$lang['AUTO_PURGING_DESC1'] = 'In order to preserve ChatX speed it is advisable to delete old messages from the server from time to time.';
$lang['AUTO_PURGING_DESC2'] = 'If your server supports CRON, create manually a job that will run <b>delete_old_shouts.php</b> script every 15 minutes-1 hour.';
$lang['UPDATING_PLEASE_WAIT'] = 'Updating settings. Please wait.';
$lang['TOOLTIP_EMOJIONE_DESC'] = 'This library is rather heavy and may affect loading speed of your chat app';

// Index Page (Moderator)
$lang['CHATX_WIDGET'] = 'ChatX Widget & Installation';
$lang['CHATX_WIDGET_DESC2'] = 'If you intend to use ChatX on external domain make sure you have set it in <a href="setups.php#ext_domain">ChatX Setttings</a>. This is needed to comply with CORS policy.';
$lang['CHATX_WIDGET_DESC3'] = 'Add ChatX widget to any place where you want it to appear:';
$lang['CHATX_WIDGET_DESC4'] = 'Done!';
$lang['DELETING_SHOUTS_ID'] = 'Deleting Shouts';
$lang['DELETING_SHOUTS_ID_DESC1'] = 'Select all the necessary messages and submit "Delete" button.';
$lang['SHOUT_ID_DELETE'] = 'Delete';
$lang['CLEARING_ALL_DATA'] = 'Clearing All Data';
$lang['CLEARING_ALL_DATA_DESC1'] = 'Be careful. By clicking the button below you will permanently delete all data from the server.';
$lang['DELETE_EVERYTHING'] = 'Delete everything';
$lang['CROSSDOMAIN_LOGIN'] = 'The application is used <b>Cross Domain</b>, you need to log in separately!';

// Userlist Page (Moderator)
$lang['REGISTERED_USERS'] = 'Registered users: ';
$lang['USER_MODERATOR'] = 'Moderator';
$lang['USER_BANNED'] = 'Banned';
$lang['USER_USERLIST'] = 'Userlist';
$lang['CHANGING_PASSWORD'] = 'Changing User Password';
$lang['CHANGING_PASSWORD_DESC1'] = 'Enter existing username and then specify a new user password.';
$lang['EXISTING_USERNAME'] = 'Existing Username';
$lang['NEW_PASSWORD'] = 'New Password';
$lang['CONFIRM_PASSWORD'] = 'Confirm Password';
$lang['CHANGING_PASSWORD_BUTTON'] = 'Change Password';
$lang['DELETING_USERS'] = 'Deleting Users';
$lang['DELETING_USERS_DESC1'] = 'Enter existing username to delete them from database.';
$lang['CHANGING_USERS_BUTTON'] = 'Delete User';
$lang['ADDING_MODERATORS'] = 'Adding and removing moderators';
$lang['ADDING_MODERATORS_DESC1'] = 'Enter existing username to make them moderators. Repeat to remove the moderator';
$lang['ADDING_MODERATOR_BUTTON'] = 'Manage Moderator';
$lang['BLOCKING_USERS'] = 'Blocking users';
$lang['BLOCKING_USERS_DESC1'] = 'Enter existing username to block/unblock them.';
$lang['BLOCKING_USERS_BUTTON'] = 'Ban/unban user';

// Styling Page (Moderator)
$lang['TEMPLATES'] = 'Templates';
$lang['TEMPLATES_DESC1'] = 'You can find more color schemes for ChatX widget on';
$lang['TEMPLATES_DESC1_1'] = 'this GitHub page';
$lang['TEMPLATES_DESC2'] = 'Choose a color scheme and replace the contents up to the';
$lang['CSS_UPDATE'] = 'Update CSS';
$lang['CSS_EDITOR'] = 'editor';
$lang['CSS_EDITOR_DESC1'] = 'You can customize widget color scheme and apply your own CSS rules';

// User pages
$lang['ACCESS_DENIED'] = 'ACCESS DENIED';
$lang['ACCESS_DENIED_DESC1'] = 'YOU HAVE NO PERMISSION TO VIEW THIS PAGE';

// Login/registration page
$lang['REGISTRATION_COMPLETE'] = 'Registration complete.';
$lang['USERNAME_TAKEN'] = 'Sorry, the username is already taken.';
$lang['REGISTRATION_DISABLED'] = 'Sorry, user registration is disabled.'; //not used
$lang['USERNAME_PASSWORD_NOT_RECOGNIZED'] = 'Username or password is not recognized';
$lang['CHATX_LOGIN'] = 'ChatX Login';
$lang['LOGIN'] = 'Login';
$lang['SIGN_UP'] = 'Sign Up';
$lang['ENTER_YOUR_NAME'] = 'Enter your name';
$lang['ENTER_YOUR_PASSWORD'] = 'Enter your password';
$lang['LOGIN_USER_BANNED'] = 'Username banned';

// Index Page (User)
$lang['WELCOME_BACK'] = 'Welcome back!';
$lang['LOGGED_IN_SUCCESSFULLY'] = 'You have successfully Logged In.';
$lang['GO_TO'] = 'You can now go to this';
$lang['URL_WEBSITE'] = 'WEBSITE';
$lang['BEGIN_CONVERSATION'] = 'to begin a conversation with ChatX';

// Help page
$lang['TITLE_HELP'] = 'ChatX Help';
$lang['HELP'] = 'Help';
$lang['WIDGET_HOTKEYS'] = 'Widget Hotkeys';
$lang['FORMATTING_MENU'] = 'to open text formatting menu';
$lang['LOAD_MODE'] = 'to switch ajax load mode (fast/slow)';
$lang['BOLD_TEXT'] = 'to insert bold text formatting tag';
$lang['ITALIC_TEXT'] = 'to insert italic text formatting tag';
$lang['UNDERLINE_TEXT'] = 'to insert underlined text formatting tag';
$lang['SELECTION_TEXT'] = 'also applies with text selection';
$lang['CLIPBOARD_IMG'] = 'upload image from clipboard';
$lang['SEND_MESSAGE'] = 'to send new message';

// Application version
$lang['APPLICATION_VERSON'] = '2.4.0';