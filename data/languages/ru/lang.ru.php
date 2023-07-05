<?php
/* 
------------------
Language: Russian
------------------
*/

$lang = array();

// Page Titles
$lang['TITLE_MANAGEMENT'] = 'Управление ChatX';
$lang['TITLE_USERS'] = 'Управление пользователями ChatX';
$lang['TITLE_SETTINGS'] = 'Настройки ChatX';
$lang['TITLE_HISTORY'] = 'История ChatX';
$lang['TITLE_STYLING'] = 'CSS редактор';

// Navbar
$lang['NAVBAR_GREETING'] = 'Привет,';
$lang['NAVBAR_LOGOUT'] = 'Выход';

// Navigation
$lang['NAVIGATION'] = 'Навигация';
$lang['SHOUT_MANAGEMENT'] = 'Сообщения и виджет';
$lang['USER_MANAGEMENT'] = 'Пользователи';
$lang['CHATX_SETUPS'] = 'Настройки';
$lang['CHATX_STYLING'] = 'CSS редактор';
$lang['GITHUB'] = 'GtiHub';

// Moderator Panel Settings
$lang['CHATX_SETTINGS'] = 'Настройки ChatX';
$lang['CHATX_SETTINGS_DESCRIPTION'] = 'Вы можете подключать или отключать глобальные функции для чата здесь.';
$lang['LOGGED_IN_CAN_READ&SEND_MESSAGES'] = 'Только авторизованные пользователи могут читать и отправлять сообщения:';
$lang['USER_REGISTRATION_ENABLED'] = 'Регистрация новых пользователей включена:';
$lang['NUMBERS_ONLY'] = 'Только числа';
$lang['RELOAD_MESSAGES_SLOW_TRACK'] = 'ChatX обновляется в <b>медленном</b> режиме каждые (сек.):';
$lang['RELOAD_MESSAGES_FAST_TRACK'] = 'ChatX обновляется в <b>быстром</b> режиме каждые (сек.):';
$lang['EMOJIONE_LIBRARY'] = 'Использовать библиотеку <b>EmojiOne</b> для замены :) на эмодзи:';
$lang['MYBB_INTEGRATION'] = 'Использовать данные <b>MyBB</b> форума для автоматической авторизации:';
$lang['DEMO_PAGE'] = 'Показывать демонстрационную страницу с чатом';
$lang['MESSAGE_MAX_CHARS'] = 'Максимальное число символов на сообщение:';
$lang['WIDGET_MAX_SHOUTS'] = 'Максимальное число сообщений в чате:';
$lang['HISTORY_MAX_SHOUTS'] = 'Максимальное число сообщений в истории чата:';
$lang['IMGUR_IDENTIFICATOR'] = 'Идентификатор приложения Imgur (API):';
$lang['SOUND_NOTIFICATION'] = 'Звук уведомления о новом сообщении:';
$lang['NOTIFICATION_VARIANT'] = 'Вариант';
$lang['NOTIFICATION_NULL'] = 'Выключено';
$lang['LANGUAGE'] = 'Язык приложения:';
$lang['LANGUAGE_EN'] = 'Английский';
$lang['LANGUAGE_RU'] = 'Русский';
$lang['EXTERNAL_DOMAIN'] = 'Внешний домен, на котором вы будете использовать ChatX:';
$lang['SAVE_SETTINGS'] = 'Сохранить настройки';
$lang['AUTO_PURGING'] = 'Авто-отчистка';
$lang['AUTO_PURGING_DESC1'] = 'Чтобы сохранить скорость ChatX рекомендуется удалять время от времени на сервере старые сообщения.';
$lang['AUTO_PURGING_DESC2'] = 'Если ваш сервер поддерживает CRON, вручную создайте задачу, которая будет запускать скрипт <b>delete_old_shouts.php</b> каждые 15 минут-1 час.';
$lang['UPDATING_PLEASE_WAIT'] = 'Обновление настроек. Пожалуйста подождите.';
$lang['TOOLTIP_EMOJIONE_DESC'] = 'Данная библиотека достаточно объемная и может замедлять загрузку вашего чата.';

// Index Page (Moderator)
$lang['CHATX_WIDGET'] = 'ChatX виджет и установка';
$lang['CHATX_WIDGET_DESC2'] = 'Если Вы планируете использовать ChatX на стороннем домене, укажите этот домен в <a href="setups.php#ext_domain">настройках ChatX</a>. Эта мера необходима для выполнения политики CORS.';
$lang['CHATX_WIDGET_DESC3'] = 'Добавьте виджет куда-нибудь на ваш сайт:';
$lang['CHATX_WIDGET_DESC4'] = 'Готово!';
$lang['DELETING_SHOUTS_ID'] = 'Удаление сообщений';
$lang['DELETING_SHOUTS_ID_DESC1'] = 'Отметьте все требуемые сообщения и нажмите на кнопку "Удалить".';
$lang['SHOUT_ID_DELETE'] = 'Удалить';
$lang['CLEARING_ALL_DATA'] = 'Удалить все данные';
$lang['CLEARING_ALL_DATA_DESC1'] = 'Будьте осторожны. Нажимая кнопку ниже, Вы удалите навсегда все данные с сервера.';
$lang['DELETE_EVERYTHING'] = 'Удалить все';
$lang['CROSSDOMAIN_LOGIN'] = 'Приложение используется <b>Кроссдоменно</b>, Вы должны повторно авторизоваться!';

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
$lang['ADDING_MODERATORS'] = 'Добавление и удаление модераторов';
$lang['ADDING_MODERATORS_DESC1'] = 'Введите ник-нейм существующего пользователя, чтобы сделать его модератором. Повторите, чтобы удалить модератора.';
$lang['ADDING_MODERATOR_BUTTON'] = 'Управление модератором';
$lang['BLOCKING_USERS'] = 'Блокировка пользователей';
$lang['BLOCKING_USERS_DESC1'] = 'Введите ник-нейм существующего пользователя, чтобы заблокировать/разблокировать его.';
$lang['BLOCKING_USERS_BUTTON'] = 'Заблок./разблок. пользователя';

// Styling Page (Moderator)
$lang['TEMPLATES'] = 'Стили';
$lang['TEMPLATES_DESC1'] = 'Вы можете найти больше цветовых схем для ChatX на';
$lang['TEMPLATES_DESC1_1'] = 'странице на Github';
$lang['TEMPLATES_DESC2'] = 'Выберите подходящую цветовую схему и замените код до';
$lang['CSS_UPDATE'] = 'Обновить CSS';
$lang['CSS_EDITOR'] = 'редактор';
$lang['CSS_EDITOR_DESC1'] = 'Вы можете настраивать цветовую схему виджета и прописывать собственные CSS правила';

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

// Index Page (User)
$lang['WELCOME_BACK'] = 'Добро пожаловать!';
$lang['LOGGED_IN_SUCCESSFULLY'] = 'Вы успешно вошли в свой аккаунт.';
$lang['GO_TO'] = 'Теперь Вы можете перейти на этот';
$lang['URL_WEBSITE'] = 'ВЕБ-САЙТ';
$lang['BEGIN_CONVERSATION'] = 'и начать беседу в ChatX';

// Help page
$lang['TITLE_HELP'] = 'Помощь по ChatX';
$lang['HELP'] = 'Помощь';
$lang['WIDGET_HOTKEYS'] = 'Горячие клавишы';
$lang['FORMATTING_MENU'] = 'чтобы открыть меню форматирования';
$lang['LOAD_MODE'] = 'переключить режим загрузки сообщений (быстрый/медленный)';
$lang['BOLD_TEXT'] = 'вставить тег форматирования текста - жирный';
$lang['ITALIC_TEXT'] = 'вставить тег форматирования текста - курсив';
$lang['UNDERLINE_TEXT'] = 'вставить тег форматирования текста - подчеркнутый';
$lang['SELECTION_TEXT'] = 'можно также применять с выделенным текстом';
$lang['CLIPBOARD_IMG'] = 'загрузить изображение из буфера обмена';
$lang['SEND_MESSAGE'] = 'отправить сообщение';

// Application version
$lang['APPLICATION_VERSON'] = '2.4.0';
