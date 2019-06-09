<?php
/* 
------------------
Language: Russian
------------------
*/

$lang = array();

// Page Titles
$lang['TITLE_MANAGEMENT'] = 'Управление ChatX';

// Navbar
$lang['NAVBAR_GREETING'] = 'Привет,';
$lang['NAVBAR_LOGOUT'] = 'Выход';

// Navigation
$lang['NAVIGATION'] = 'Навигация';
$lang['SHOUT_MANAGEMENT'] = 'Сообщения и виджет';
$lang['USER_MANAGEMENT'] = 'Пользователи';
$lang['CHATX_SETUPS'] = 'Настройки';
$lang['GITHUB'] = 'GtiHub';

// Moderator Panel Settings
$lang['CHATX_SETTINGS'] = 'Настройки ChatX';
$lang['CHATX_SETTINGS_DESCRIPTION'] = 'Вы можете подключать или отключать глобальные функции для чата здесь.';
$lang['LOGGED_IN_CAN_READ&SEND_MESSAGES'] = 'Только авторизованные пользователи могут читать и отправлять сообщения:';
$lang['USER_REGISTRATION_ENABLED'] = 'Регистрация новых пользователей включена:';
$lang['RELOAD_MESSAGES_SLOW_TRACK'] = 'ChatX обновляется в <b>медленном</b> режиме каждые (сек.):';
$lang['RELOAD_MESSAGES_FAST_TRACK'] = 'ChatX обновляется в <b>быстром</b> режиме каждые (сек.):';
$lang['EMOJIONE_LIBRARY'] = 'Использовать библиотеку <b>EmojiOne</b> для замены :) на эмодзи:';
$lang['FEATHERLIGHT_LIBRARY'] = 'Использовать библиотеку <b>Featherlight</b> для просмотра загруженных изображений в модальном окне:';
$lang['LANGUAGE'] = 'Язык приложения:';
$lang['LANGUAGE_EN'] = 'Английский';
$lang['LANGUAGE_RU'] = 'Русский';
$lang['EXTERNAL_DOMAIN'] = 'Внешний домен, на котором вы будете использовать ChatX:';
$lang['SAVE_SETTINGS'] = 'Сохранить настройки';
$lang['AUTO_PURGING'] = 'Авто-отчистка';
$lang['AUTO_PURGING_DESC1'] = 'Чтобы сохранить скорость ChatX рекомендуется удалять время от времени на сервере старые сообщения.';
$lang['AUTO_PURGING_DESC2'] = 'Если ваш сервер поддерживает CRON, вручную создайте задачу, которая будет запускать скрипт <b>delete_old_shouts.php</b> каждые 15 минут-1 час.';
$lang['ZERO_NOT_ALLOWED'] = 'Ноль запрещен';
$lang['UPDATING_PLEASE_WAIT'] = 'Обновление настроек. Пожалуйста подождите.';

// Index Page (Moderator)
$lang['CHATX_WIDGET'] = 'ChatX виджет и установка';
$lang['CHATX_WIDGET_DESC1'] = 'Проверьте, подключена ли к вашему веб-сайту библиотеке jQuery. Подключите если это необходимо:';
$lang['CHATX_WIDGET_DESC2'] = 'Если Вы планируете использовать ChatX на стороннем домене, укажите этот домен в <a href="setups.php">настройках ChatX</a>. Эта мера необходима для выполнения политики CORS.';
$lang['CHATX_WIDGET_DESC3'] = 'Добавьте виджет куда-нибудь на ваш сайт:';
$lang['CHATX_WIDGET_DESC4'] = 'Готово!';
$lang['DELETING_SHOUTS_ID'] = 'Удаление сообщений по ID';
$lang['DELETING_SHOUTS_ID_DESC1'] = 'Кликните по ID сообщения, которое Вы бы хотели удалить, затем нажмите кнопку отправить.';
$lang['SHOUT_ID_INPUT'] = 'Введите ID сообщения...';
$lang['SHOUT_ID_DELETE'] = 'Удалить';
$lang['SHOUT_ID'] = 'ID Сообщ.';
$lang['SHOUT_AUTHOR'] = 'Автор';
$lang['SHOUT_CONTENT'] = 'Содержание';
$lang['CLEARING_ALL_DATA'] = 'Удалить все данные';
$lang['CLEARING_ALL_DATA_DESC1'] = 'Будьте осторожны. Нажимая кнопку ниже, Вы удалите навсегда все данные с сервера.';
$lang['DELETE_EVERYTHING'] = 'Удалить все';

// Userlist Page (Moderator)
$lang['REGISTERED_USERS'] = 'Зарегистрированные пользователи: '; // not used now
$lang['USER_MODERATOR'] = 'Модератор'; // not used now
$lang['USER_BANNED'] = 'Заблокирован'; // not used now
$lang['USER_USERLIST'] = 'Список пользователей';
$lang['CHANGING_PASSWORD'] = 'Изменение пароля пользователя';
$lang['CHANGING_PASSWORD_DESC1'] = 'Введите ник-нейм существующего пользователя и укажите новый пароль.';
$lang['EXISTING_USERNAME'] = 'Ник пользователя';
$lang['NEW_PASSWORD'] = 'Новый пароль';
$lang['CONFIRM_PASSWORD'] = 'Подтвердите пароль';
$lang['CHANGING_PASSWORD_BUTTON'] = 'Сменить пароль';
$lang['DELETING_USERS'] = 'Удаление пользователей';
$lang['DELETING_USERS_DESC1'] = 'Введите ник-нейм существующего пользователя, чтобы удалить его из базы данных.';
$lang['CHANGING_USERS_BUTTON'] = 'Удалить пользователя';
$lang['ADDING_MODERATORS'] = 'Добавление модераторов';
$lang['ADDING_MODERATORS_DESC1'] = 'Введите ник-нейм существующего пользователя, чтобы сделать его модератором.';
$lang['ADDING_MODERATOR_BUTTON'] = 'Добавить модератора';
$lang['BLOCKING_USERS'] = 'Блокировка пользователей';
$lang['BLOCKING_USERS_DESC1'] = 'Введите ник-нейм существующего пользователя, чтобы заблокировать его.';
$lang['BLOCKING_USERS_BUTTON'] = 'Заблокировать пользователя';

// User pages
$lang['ACCESS_DENIED'] = 'ДОСТУП ЗАПРЕЩЕН';
$lang['ACCESS_DENIED_DESC1'] = 'У ВАС НЕДОСТАТОЧНО ПРАВ ДЛЯ ПРОСМОТРА ЭТОЙ СТРАНИЦЫ';

// Login/registration page
$lang['REGISTRATION_COMPLETE'] = 'Регистрация завершена.';
$lang['USERNAME_TAKEN'] = 'Простите, это имя уже занято.';
$lang['REGISTRATION_DISABLED'] = 'Простите, регистрация новых пользователей отключена.'; //not used
$lang['USERNAME_PASSWORD_NOT_RECOGNIZED'] = 'Неправильное имя и/или пароль';
$lang['CHATX_LOGIN'] = 'Вход в ChatX';
$lang['LOGIN'] = 'Вход';
$lang['SIGN_UP'] = 'Регистрация';
$lang['ENTER_YOUR_NAME'] = 'Введите ваше имя';
$lang['ENTER_YOUR_PASSWORD'] = 'Введите ваш пароль';
$lang['LOGIN_USER_BANNED'] = 'Пользователь заблокирован';