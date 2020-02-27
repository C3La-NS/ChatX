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

// Navbar
$lang['NAVBAR_GREETING'] = 'Howdy,';
$lang['NAVBAR_LOGOUT'] = 'LogOut';

// Navigation
$lang['NAVIGATION'] = 'Navigation';
$lang['SHOUT_MANAGEMENT'] = 'Shout Management & widget';
$lang['USER_MANAGEMENT'] = 'User Management';
$lang['CHATX_SETUPS'] = 'ChatX Settings';
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
$lang['FEATHERLIGHT_LIBRARY'] = 'Use <b>Featherlight</b> library to view uploaded images in a modal box:';
$lang['MYBB_INTEGRATION'] = 'Use <b>MyBB</b> forum data to log in or sign up users automatically:';
$lang['MESSAGE_MAX_CHARS'] = 'Max characters per message:';
$lang['WIDGET_MAX_SHOUTS'] = 'Max shouts in chat app:';
$lang['HISTORY_MAX_SHOUTS'] = 'Max shouts in chat history:';
$lang['SOUND_NOTIFICATION'] = 'Notification sound for new messages:';
$lang['NOTIFICATION_1'] = 'Sample 1';
$lang['NOTIFICATION_2'] = 'Sample 2';
$lang['NOTIFICATION_3'] = 'Sample 3';
$lang['NOTIFICATION_NULL'] = 'Disabled';
$lang['LANGUAGE'] = 'Appplication language:';
$lang['LANGUAGE_EN'] = 'English';
$lang['LANGUAGE_RU'] = 'Russian';
$lang['EXTERNAL_DOMAIN'] = 'External domain where you are going to use ChatX:';
$lang['SAVE_SETTINGS'] = 'Save Settings';
$lang['AUTO_PURGING'] = 'Automatic Purging';
$lang['AUTO_PURGING_DESC1'] = 'In order to preserve ChatX speed it is advisable to delete old messages from the server from time to time.';
$lang['AUTO_PURGING_DESC2'] = 'If your server supports CRON, create manually a job that will run <b>delete_old_shouts.php</b> script every 15 minutes-1 hour.';
$lang['ZERO_NOT_ALLOWED'] = 'Zero is not allowed';
$lang['UPDATING_PLEASE_WAIT'] = 'Updating settings. Please wait.';
$lang['TOOLTIP_EMOJIONE_DESC'] = 'This library may affect loading speed of your website. Update widget code after applying this feature.';

// Index Page (Moderator)
$lang['CHATX_WIDGET'] = 'ChatX Widget & Installation';
$lang['CHATX_WIDGET_DESC1'] = 'Make sure your website is using jQuery library. If it doesn\'t, install one:';
$lang['CHATX_WIDGET_DESC2'] = 'If you are planning to use ChatX on external domain make sure you have set it in <a href="setups.php">ChatX Setttings</a>. This is needed to comply with CORS policy.';
$lang['CHATX_WIDGET_DESC3'] = 'Add ChatX widget to any place where you want it to appear:';
$lang['CHATX_WIDGET_DESC4'] = 'Done!';
$lang['DELETING_SHOUTS_ID'] = 'Deleting Shouts';
$lang['DELETING_SHOUTS_ID_DESC1'] = 'Select all the necessary messages and submit "Delete" button.';
$lang['SHOUT_ID_DELETE'] = 'Delete';
$lang['SHOUT_ID'] = 'Select';
$lang['SHOUT_AUTHOR'] = 'Author';
$lang['SHOUT_CONTENT'] = 'Content';
$lang['CLEARING_ALL_DATA'] = 'Clearing All Data';
$lang['CLEARING_ALL_DATA_DESC1'] = 'Be careful. By clicking the button below you will permanently delete all data from the server.';
$lang['DELETE_EVERYTHING'] = 'Delete everything';

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
$lang['PASSWORD_CHANGED'] = 'Password Changed!';
$lang['DELETING_USERS'] = 'Deleting Users';
$lang['DELETING_USERS_DESC1'] = 'Enter existing username to delete them from database.';
$lang['CHANGING_USERS_BUTTON'] = 'Delete User';
$lang['USER_DELETED'] = 'User Deleted!';
$lang['ADDING_MODERATORS'] = 'Adding and removing moderators';
$lang['ADDING_MODERATORS_DESC1'] = 'Enter existing username to make them moderators.Repeat to remove moderator';
$lang['ADDING_MODERATOR_BUTTON'] = 'Manage Moderator';
$lang['MODERATOR_ADDED'] = 'Moderator Added!';
$lang['MODERATOR_REMOVED'] = 'Moderator Removed!';
$lang['BLOCKING_USERS'] = 'Blocking users';
$lang['BLOCKING_USERS_DESC1'] = 'Enter existing username to block them.';
$lang['BLOCKING_USERS_BUTTON'] = 'Ban user';
$lang['USER_BANNED'] = 'User Banned!';

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

// History Page
$lang['NEW_MESSAGES_ABOVE'] = 'New messages above';