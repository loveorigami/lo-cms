-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 05 2015 г., 17:28
-- Версия сервера: 5.6.22-log
-- Версия PHP: 5.4.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `yii2-user`
--

-- --------------------------------------------------------

--
-- Структура таблицы `mx_auth_assignment`
--

CREATE TABLE IF NOT EXISTS `mx_auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `mx_auth_assignment`
--

INSERT INTO `mx_auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('author', '2', 1435493835),
('root', '1', 1433589550);

-- --------------------------------------------------------

--
-- Структура таблицы `mx_auth_constraint`
--

CREATE TABLE IF NOT EXISTS `mx_auth_constraint` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `author_id` int(11) DEFAULT NULL,
  `updater_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `role` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `constraint` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forbidden_attrs` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `mx_auth_constraint`
--

INSERT INTO `mx_auth_constraint` (`id`, `status`, `author_id`, `updater_id`, `created_at`, `updated_at`, `role`, `model`, `constraint`, `forbidden_attrs`) VALUES
(1, 1, 1, 1, 1435476532, 1439543865, 'author', '\\lo\\modules\\page\\models\\Page', '\\lo\\core\\rbac\\AuthorConstraint', 'author_id');

-- --------------------------------------------------------

--
-- Структура таблицы `mx_auth_item`
--

CREATE TABLE IF NOT EXISTS `mx_auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `mx_auth_item`
--

INSERT INTO `mx_auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/*', 2, NULL, NULL, NULL, 1433660637, 1433660637),
('/admin/default/index', 2, NULL, NULL, NULL, 1440409936, 1440409936),
('/backuprestore/default/index', 2, NULL, NULL, NULL, 1434299727, 1434299727),
('/core/cache/index', 2, NULL, NULL, NULL, 1439195993, 1439195993),
('/core/constraint/index', 2, NULL, NULL, NULL, 1438940434, 1438940434),
('/core/file-manager/index', 2, NULL, NULL, NULL, 1439189533, 1439189533),
('/core/key-storage/index', 2, NULL, NULL, NULL, 1439191257, 1439191257),
('/core/log/index', 2, NULL, NULL, NULL, 1439195982, 1439195982),
('/core/menu/index', 2, NULL, NULL, NULL, 1440053620, 1440053620),
('/core/system-information/index', 2, NULL, NULL, NULL, 1439189537, 1439189537),
('/debug/default/index', 2, NULL, NULL, NULL, 1433779978, 1433779978),
('/elfinder/*', 2, NULL, NULL, NULL, 1433859876, 1433859876),
('/elfinder/connect', 2, NULL, NULL, NULL, 1433936006, 1433936006),
('/elfinder/manager', 2, NULL, NULL, NULL, 1433936010, 1433936010),
('/gii/default/index', 2, NULL, NULL, NULL, 1433779961, 1433779961),
('/i18n/i18n-message/index', 2, NULL, NULL, NULL, 1433778748, 1433778748),
('/i18n/i18n-source-message/index', 2, NULL, NULL, NULL, 1433778752, 1433778752),
('/page/*', 2, NULL, NULL, NULL, 1435480880, 1435480880),
('/page/item/*', 2, NULL, NULL, NULL, 1435480873, 1435480873),
('/page/item/create', 2, NULL, NULL, NULL, 1435480873, 1435480873),
('/page/item/delete', 2, NULL, NULL, NULL, 1435480873, 1435480873),
('/page/item/editable', 2, NULL, NULL, NULL, 1435480873, 1435480873),
('/page/item/groupdelete', 2, NULL, NULL, NULL, 1435480873, 1435480873),
('/page/item/index', 2, NULL, NULL, NULL, 1435480873, 1435480873),
('/page/item/update', 2, NULL, NULL, NULL, 1435480873, 1435480873),
('/page/item/view', 2, NULL, NULL, NULL, 1435480873, 1435480873),
('/playground/default/ajaxq', 2, NULL, NULL, NULL, 1440062712, 1440062712),
('/playground/default/index', 2, NULL, NULL, NULL, 1440062715, 1440062715),
('/playground/formplay/index', 2, NULL, NULL, NULL, 1440062705, 1440062705),
('/plugins/item/index', 2, NULL, NULL, NULL, 1438513070, 1438513070),
('/sight/*', 2, NULL, NULL, NULL, 1435910465, 1435910465),
('/sight/town/*', 2, NULL, NULL, NULL, 1435911401, 1435911401),
('/sight/town/create', 2, NULL, NULL, NULL, 1435911401, 1435911401),
('/sight/town/delete', 2, NULL, NULL, NULL, 1435911401, 1435911401),
('/sight/town/editable', 2, NULL, NULL, NULL, 1435911401, 1435911401),
('/sight/town/grab', 2, NULL, NULL, NULL, 1435911408, 1435911408),
('/sight/town/groupdelete', 2, NULL, NULL, NULL, 1435911408, 1435911408),
('/sight/town/index', 2, NULL, NULL, NULL, 1435823928, 1435823928),
('/sight/town/parser', 2, NULL, NULL, NULL, 1435911408, 1435911408),
('/sight/town/update', 2, NULL, NULL, NULL, 1435911401, 1435911401),
('/sight/town/view', 2, NULL, NULL, NULL, 1435911401, 1435911401),
('/site/index', 2, NULL, NULL, NULL, 1433660961, 1433660961),
('/system-information/index', 2, NULL, NULL, NULL, 1433779454, 1433779454),
('/timeline-event/index', 2, NULL, NULL, NULL, 1433742183, 1433742183),
('admin', 1, 'администратор, имеет возможность удалять записи', NULL, NULL, 1433589078, 1433660915),
('author', 1, 'автор', NULL, NULL, 1433660746, 1433660746),
('BCreate', 2, 'Create items in backend', NULL, NULL, 1434384366, 1434384366),
('BDelete', 2, 'Can delete item', NULL, NULL, 1433923033, 1433923033),
('BDeleteOwn', 2, 'Can delete own item', 'OwnModelRule', NULL, 1433921768, 1440408547),
('BRoot', 2, 'Only for root', NULL, NULL, 1435405792, 1435405792),
('BUpdate', 2, 'Can update item', NULL, NULL, 1433922980, 1433922980),
('BUpdateOwn', 2, 'Can update own item', 'OwnModelRule', NULL, 1433921045, 1440408513),
('BView', 2, 'Can view item', NULL, NULL, 1435481086, 1435481125),
('BViewOwn', 2, 'Can view own item', NULL, NULL, 1435481173, 1435481173),
('editor', 1, 'редактор', NULL, NULL, 1433660710, 1433660799),
('root', 1, 'владелец', NULL, NULL, 1433583350, 1433660882),
('user', 1, 'пользователь', NULL, NULL, 1433660785, 1433685296);

-- --------------------------------------------------------

--
-- Структура таблицы `mx_auth_item_child`
--

CREATE TABLE IF NOT EXISTS `mx_auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `mx_auth_item_child`
--

INSERT INTO `mx_auth_item_child` (`parent`, `child`) VALUES
('root', '/*'),
('author', '/elfinder/*'),
('BCreate', '/page/item/create'),
('BDelete', '/page/item/delete'),
('BUpdate', '/page/item/editable'),
('BDelete', '/page/item/groupdelete'),
('BCreate', '/page/item/index'),
('BUpdate', '/page/item/update'),
('BView', '/page/item/view'),
('author', '/site/index'),
('root', 'admin'),
('editor', 'author'),
('author', 'BCreate'),
('admin', 'BDelete'),
('BDeleteOwn', 'BDelete'),
('author', 'BDeleteOwn'),
('root', 'BRoot'),
('BUpdateOwn', 'BUpdate'),
('editor', 'BUpdate'),
('author', 'BUpdateOwn'),
('BViewOwn', 'BView'),
('editor', 'BView'),
('author', 'BViewOwn'),
('admin', 'editor'),
('author', 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `mx_auth_rule`
--

CREATE TABLE IF NOT EXISTS `mx_auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `mx_auth_rule`
--

INSERT INTO `mx_auth_rule` (`name`, `data`, `created_at`, `updated_at`) VALUES
('OwnModelRule', 'O:24:"common\\rbac\\OwnModelRule":3:{s:4:"name";s:12:"OwnModelRule";s:9:"createdAt";i:1440408380;s:9:"updatedAt";i:1440408446;}', 1440408380, 1440408446);

-- --------------------------------------------------------

--
-- Структура таблицы `mx_i18n_message`
--

CREATE TABLE IF NOT EXISTS `mx_i18n_message` (
  `id` int(11) NOT NULL DEFAULT '0',
  `language` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `translation` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`,`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `mx_i18n_message`
--

INSERT INTO `mx_i18n_message` (`id`, `language`, `translation`) VALUES
(670, 'ru', 'Настройки приложения'),
(671, 'ru', 'Женский'),
(672, 'ru', 'Мужской'),
(673, 'ru', 'Настройки были успешно сохранены'),
(674, 'ru', 'Это имя пользователя уже занято'),
(675, 'ru', 'Аккаунт'),
(676, 'ru', 'Активно'),
(677, 'ru', 'Приложение'),
(678, 'ru', 'Хроника приложения'),
(679, 'ru', 'Вы уверены, что хотите удалить эту запись?'),
(680, 'ru', 'Вы уверены, что хотите сбросить этот кеш?'),
(681, 'ru', 'Категории статей'),
(682, 'ru', 'Статьи'),
(683, 'ru', 'Скрыть боковую панель'),
(684, 'ru', 'Тема панели управления'),
(685, 'ru', 'Коробочный шаблон панели управления'),
(686, 'ru', 'Использование CPU'),
(687, 'ru', 'Кеш'),
(688, 'ru', 'Запись была успешно удалена из кеша'),
(689, 'ru', 'Кеш был успешно сброшен'),
(690, 'ru', 'Виджеты карусели'),
(691, 'ru', 'Слайд был успешно сохранен'),
(692, 'ru', 'Категория'),
(693, 'ru', 'Очистить'),
(694, 'ru', 'Контент'),
(695, 'ru', 'Количество'),
(696, 'ru', 'Создать'),
(697, 'ru', 'Создание {modelClass}'),
(698, 'ru', 'Тип БД'),
(699, 'ru', 'Версия БД'),
(700, 'ru', 'Дата'),
(701, 'ru', 'Удалить'),
(702, 'ru', 'Удалить значение по ключу из кеша'),
(703, 'ru', 'Неактивно'),
(704, 'ru', 'Редактировать аккаунт'),
(705, 'ru', 'Редактировать профиль'),
(706, 'ru', 'Email'),
(707, 'ru', 'Активно'),
(708, 'ru', 'Ошибка #{id}'),
(709, 'ru', 'Ошибка {code}'),
(710, 'ru', 'Событие'),
(711, 'ru', 'Внешний IP'),
(712, 'ru', 'Менеджер файлов'),
(713, 'ru', 'Файловое хранилище'),
(714, 'ru', 'Записи о файлах'),
(715, 'ru', 'Файлов в хранилище'),
(716, 'ru', 'Фиксированный шаблон панели управления'),
(717, 'ru', 'Сбросить'),
(718, 'ru', 'Свободно Swap'),
(719, 'ru', 'Свободно памяти'),
(720, 'ru', 'Сервисный режим фронтенд части'),
(721, 'ru', 'Привет, {username}'),
(722, 'ru', 'Имя хоста'),
(723, 'ru', 'I18N переводы'),
(724, 'ru', 'Тексты'),
(725, 'ru', 'ID'),
(726, 'ru', 'Если вы оставите это поле пустым. ЧПУ будет сгенерирован автоматически'),
(727, 'ru', 'Неправильный логин или пароль'),
(728, 'ru', 'Внутренний IP'),
(729, 'ru', 'Сбросить тег'),
(730, 'ru', 'Версия ядра'),
(731, 'ru', 'Ключ'),
(732, 'ru', 'Записи'),
(733, 'ru', 'Ключ-Значение'),
(734, 'ru', 'Язык'),
(735, 'ru', 'Уровень'),
(736, 'ru', 'Средняя нагрузка'),
(737, 'ru', 'Время события'),
(738, 'ru', 'Выход'),
(739, 'ru', 'Журнал'),
(740, 'ru', 'Участник с {0, date, short}'),
(741, 'ru', 'Память'),
(742, 'ru', 'Использование памяти'),
(743, 'ru', 'Виджеты меню'),
(744, 'ru', 'Сообщение'),
(745, 'ru', 'Подробнее'),
(746, 'ru', 'Сеть'),
(747, 'ru', 'Новый пользователь ({identity}) был зарегистрирован {created_at}'),
(748, 'ru', 'Событий нет'),
(749, 'ru', 'Не опубликовано'),
(750, 'ru', 'Кол-во ядер'),
(751, 'ru', 'ОС'),
(752, 'ru', 'Версия ОС'),
(753, 'ru', 'Выкл'),
(754, 'ru', 'Вкл'),
(755, 'ru', 'Операционная система'),
(756, 'ru', 'Версия РHP'),
(757, 'ru', 'Страницы'),
(758, 'ru', 'Пароль'),
(759, 'ru', 'Подтверждение пароля'),
(760, 'ru', 'Порт'),
(761, 'ru', 'Префикс'),
(762, 'ru', 'Процессор'),
(763, 'ru', 'Архитектура процессора'),
(764, 'ru', 'Профиль'),
(765, 'ru', 'Опубликовано'),
(766, 'ru', 'В режиме реального времени'),
(767, 'ru', 'Запомнить меня'),
(768, 'ru', 'Сбросить'),
(769, 'ru', 'Роли'),
(770, 'ru', 'Сохранить'),
(771, 'ru', 'Поиск'),
(772, 'ru', 'Выберите кеш'),
(773, 'ru', 'Вход'),
(774, 'ru', 'Войти'),
(775, 'ru', 'ПО'),
(776, 'ru', 'Извините, но приложению не удалось собрать информацию о вашей системе. Смотрите {link}'),
(777, 'ru', 'Текст'),
(778, 'ru', 'Статические страницы'),
(779, 'ru', 'Система'),
(780, 'ru', 'Системная дата'),
(781, 'ru', 'Информация о системе'),
(782, 'ru', 'Системный журнал'),
(783, 'ru', 'Системное время'),
(784, 'ru', 'Тег'),
(785, 'ru', 'TagDependency был инвалидирован'),
(786, 'ru', 'Текстовые блоки'),
(787, 'ru', 'Текстовые виджеты'),
(788, 'ru', 'Время'),
(789, 'ru', 'Хроника'),
(790, 'ru', 'Часовой пояс'),
(791, 'ru', 'Навигация'),
(792, 'ru', 'Общий Swap'),
(793, 'ru', 'Общая память'),
(794, 'ru', 'Перевод'),
(795, 'ru', 'Редактировать'),
(796, 'ru', 'Редактирование {modelClass}: '),
(797, 'ru', 'Uptime'),
(798, 'ru', 'Использованный размер'),
(799, 'ru', 'Регистраций'),
(800, 'ru', 'Имя пользователя'),
(801, 'ru', 'Пользователи'),
(802, 'ru', 'Смотреть всё'),
(803, 'ru', 'Просмотр пользователя'),
(804, 'ru', 'Web сервер'),
(805, 'ru', 'Слайды'),
(806, 'ru', 'Виджет карусели'),
(807, 'ru', 'Виджеты меню'),
(808, 'ru', 'У вас новое событие'),
(809, 'ru', 'У вас новый пользователь'),
(810, 'ru', 'У вас {num} записей в журнале'),
(811, 'ru', 'Ваш аккаунт был успешно сохранен'),
(812, 'ru', 'Ваш профиль был успешно сохранен'),
(813, 'ru', 'I18N'),
(814, 'ru', 'Перевод'),
(815, 'ru', 'Текст'),
(816, 'ru', 'Шаблон статьи'),
(817, 'ru', 'Шаблон страницы'),
(818, 'ru', '"{attribute}" должен содержать валидный JSON'),
(819, 'ru', 'Активно'),
(820, 'ru', 'ID Статьи'),
(821, 'ru', 'Автор'),
(822, 'ru', 'Базовый URL'),
(823, 'ru', 'Базовый Url'),
(824, 'ru', 'Текст'),
(825, 'ru', 'Текст'),
(826, 'ru', 'ID карусели'),
(827, 'ru', 'Категория'),
(828, 'ru', 'Комментарий'),
(829, 'ru', 'Компонент'),
(830, 'ru', 'Настройки'),
(831, 'ru', 'Создано'),
(832, 'ru', 'Создано'),
(833, 'ru', 'Удалено'),
(834, 'ru', 'Закрыто на обслуживание'),
(835, 'ru', 'E-mail'),
(836, 'ru', 'Тип файла'),
(837, 'ru', 'Имя'),
(838, 'ru', 'Пол'),
(839, 'ru', 'ID'),
(840, 'ru', 'Изображение'),
(841, 'ru', 'Ключ'),
(842, 'ru', 'Последний вход'),
(843, 'ru', 'Фамилия'),
(844, 'ru', 'Локаль'),
(845, 'ru', 'Отчество'),
(846, 'ru', 'Имя'),
(847, 'ru', 'Порядок'),
(848, 'ru', 'Родительская категория'),
(849, 'ru', 'Путь'),
(850, 'ru', 'Аватар'),
(851, 'ru', 'Опубликовано'),
(852, 'ru', 'Дата публикации'),
(853, 'ru', 'Размер'),
(854, 'ru', 'ЧПУ'),
(855, 'ru', 'Статус'),
(856, 'ru', 'Эскиз изображения'),
(857, 'ru', 'Название'),
(858, 'ru', 'Тип'),
(859, 'ru', 'Обновлено'),
(860, 'ru', 'Последнее обновление'),
(861, 'ru', 'Обновивщий'),
(862, 'ru', 'IP'),
(863, 'ru', 'Url'),
(864, 'ru', 'ID пользователя'),
(865, 'ru', 'Имя пользователя'),
(866, 'ru', 'Значение'),
(867, 'ru', 'Настройки'),
(868, 'ru', 'Настройки пользователя'),
(869, 'ru', 'О нас'),
(870, 'ru', 'Настройки аккаунта'),
(871, 'ru', 'Статьи'),
(872, 'ru', 'Приложения'),
(873, 'ru', 'Панель управления'),
(874, 'ru', 'Сообщение'),
(875, 'ru', 'Проверьте ваш e-mail.'),
(876, 'ru', 'Подтвердите пароль'),
(877, 'ru', 'Контакты'),
(878, 'ru', 'E-mail'),
(879, 'ru', 'Email'),
(880, 'ru', 'Ошибка в процессе OAuth авторизации.'),
(881, 'ru', 'Женский'),
(882, 'ru', 'Главная'),
(883, 'ru', 'Если вы забыли пароль, вы можете сбросить его <a href="{link}">здесь</a>'),
(884, 'ru', 'Неправильный логин или пароль.'),
(885, 'ru', 'Язык'),
(886, 'ru', 'Войти с помощью'),
(887, 'ru', 'Вход'),
(888, 'ru', 'Выход'),
(889, 'ru', 'Мужской'),
(890, 'ru', 'Имя'),
(891, 'ru', 'Нужен аккаунт? Зарегистрируйтесь'),
(892, 'ru', 'Новый пароль был сохранен'),
(893, 'ru', 'Страница не найдена'),
(894, 'ru', 'Пароль'),
(895, 'ru', 'Сброс пароля для {name}'),
(896, 'ru', 'Настройки профиля'),
(897, 'ru', 'Запомнить меня'),
(898, 'ru', 'Запрос сброса пароля'),
(899, 'ru', 'Сброс пароля'),
(900, 'ru', 'Создать аккаунт с помощью'),
(901, 'ru', 'Регистрация'),
(902, 'ru', 'Извините, мы не можем сбросить пароль для этого e-mail.'),
(903, 'ru', 'Тема'),
(904, 'ru', 'Отправить'),
(905, 'ru', 'Спасибо. Мы свяжемся с Вами в ближайщее время'),
(906, 'ru', 'Ошибка при отправке сообщения.'),
(907, 'ru', 'Этот e-mail уже занят'),
(908, 'ru', 'Это имя пользователя уже занято'),
(909, 'ru', 'Редактировать'),
(910, 'ru', 'Имя пользователя'),
(911, 'ru', 'Имя пользователя или e-mail'),
(912, 'ru', 'Проверочный код'),
(913, 'ru', 'Пользователь с email {email} уже зарегистрирован.'),
(914, 'ru', 'Добро пожаловать в {app-name}. E-mail с информацией о пользователе был отправлен на вашу почту.'),
(915, 'ru', 'Ваш аккаунт был успешно сохранен'),
(916, 'ru', '{app-name} | Информация о пользователе'),
(917, 'ru', 'Назначения'),
(918, 'ru', 'Пользователи'),
(919, 'ru', 'Пользователь'),
(920, 'ru', 'Доступно'),
(921, 'ru', 'Назначено'),
(922, 'ru', 'Создать'),
(923, 'ru', 'Обновить'),
(924, 'ru', 'Роли'),
(925, 'ru', 'Создать роль'),
(926, 'ru', 'Имя'),
(927, 'ru', 'Тип'),
(928, 'ru', 'Описание'),
(929, 'ru', 'Имя правила'),
(930, 'ru', 'Дата'),
(931, 'ru', 'Обновить роль'),
(932, 'ru', 'Удалить'),
(933, 'ru', 'Вы действительно хотите удалить этот элемент?'),
(934, 'ru', 'ID'),
(935, 'ru', 'Родитель'),
(936, 'ru', 'Имя родителя'),
(937, 'ru', 'Маршрут'),
(938, 'ru', 'Имя пользователя'),
(939, 'ru', 'Обновить разрешение'),
(940, 'ru', 'Разрешения'),
(941, 'ru', 'Разрешение'),
(942, 'ru', 'Создать разрешение'),
(943, 'ru', 'Создать разрешения'),
(944, 'ru', 'Маршруты'),
(945, 'ru', 'Создать маршрут'),
(946, 'ru', 'Новый'),
(947, 'ru', 'Сгенерировать маршруты'),
(948, 'ru', 'Добавить'),
(949, 'ru', 'Создать правило'),
(950, 'ru', 'Правила'),
(951, 'ru', 'Обновить правило'),
(952, 'ru', 'Обновить меню'),
(953, 'ru', 'Меню'),
(954, 'ru', 'Поиск'),
(955, 'ru', 'Сбросить'),
(956, 'ru', 'Обновить меню'),
(957, 'ru', 'Порядок'),
(958, 'ru', 'Имя класса'),
(959, 'ru', 'Назначение'),
(960, 'ru', 'Роль'),
(961, 'ru', 'Правило'),
(962, 'ru', 'Меню'),
(963, 'ru', 'Помощь'),
(964, 'ru', 'Приложение'),
(965, 'ru', 'Чтобы закончить регистрацию, вы должны ввести свой почтовый адрес'),
(966, 'ru', 'Что-то пошло не так'),
(967, 'ru', 'ВКонтакте'),
(968, 'ru', 'Яндекс'),
(969, 'ru', 'Вы можете подключить несколько аккаунтов, чтобы использовать их для входа'),
(971, 'ru', 'Ссылка для подтверждения была отправлена вам на почту'),
(972, 'ru', 'Вам было отправлено письмо. Оно содержит ссылку, по которой вы должны перейти, чтобы завершить регистрацию.'),
(973, 'ru', 'Вам было отправлено письмо. Оно содержит сгенерированный нами пароль.'),
(974, 'ru', 'Вам было отправлено письмо. Оно содержит ваш пароль и ссылку, по которой вы должны перейти, чтобы завершить регистрацию.'),
(975, 'ru', 'Ссылка для активации аккаунта была отправлена вам на почту'),
(976, 'ru', 'Если вы хотите, чтобы пароль был сгенерирован, оставьте поле пустым'),
(977, 'ru', 'Аккаунт'),
(978, 'ru', 'Активация аккаунта'),
(979, 'ru', 'Аккаунт'),
(980, 'ru', 'Аккаунт пользователя был обновлен'),
(981, 'ru', 'Настройки аккаунта'),
(982, 'ru', 'Уже зарегистрированы? Авторизуйтесь!'),
(983, 'ru', 'Вам отправлено письмо с инструкциями по смене пароля.'),
(984, 'ru', 'Произошла ошибка и ваш пароль не был изменен. Пожалуйста, попробуйте позже.'),
(985, 'ru', 'Во время выполнения запроса произошла ошибка'),
(986, 'ru', 'Вы уверены, что хотите заблокировать пользователя?'),
(987, 'ru', 'Вы уверены, что хотите подтвердить аккаунт пользователя?'),
(988, 'ru', 'Вы уверены, что хотите удалить этого пользователя?'),
(989, 'ru', 'Вы уверены, что хотите разблокировать пользователя?'),
(990, 'ru', 'Вы уверены? Удаленный аккаунт не может быть восстановлен'),
(991, 'ru', 'Права пользователя'),
(992, 'ru', 'Почти готово! Осталось перейти по ссылке, отправленной на ваш новый почтовый адрес'),
(993, 'ru', 'Почти готово! Осталось перейти по ссылке, отправленной на ваш старый почтовый адрес'),
(994, 'ru', 'О себе'),
(995, 'ru', 'Блокировать'),
(996, 'ru', 'Блокировка'),
(997, 'ru', 'Заблокирован  {0, date, MMMM dd, YYYY HH:mm}'),
(998, 'ru', 'Изменить аватар на сайте Gravatar.com'),
(999, 'ru', 'Смена пароля на сайте {0}'),
(1000, 'ru', 'Подтвердить'),
(1001, 'ru', 'Активация аккаунта на сайте {0}'),
(1002, 'ru', 'Смена почтового адреса на сайте {0}'),
(1003, 'ru', 'Активация'),
(1004, 'ru', 'Статус'),
(1005, 'ru', 'Время активации'),
(1006, 'ru', 'Активирован'),
(1007, 'ru', 'Активирован {0, date, MMMM dd, YYYY HH:mm}'),
(1008, 'ru', 'Подключить'),
(1009, 'ru', 'Продолжить'),
(1010, 'ru', 'Создать'),
(1011, 'ru', 'Создать новый аккаунт'),
(1012, 'ru', 'Данные для входа будут отправлены пользователю на почту'),
(1013, 'ru', 'Текущий пароль'),
(1014, 'ru', 'Текущий пароль введен неправильно'),
(1015, 'ru', 'Удалить'),
(1016, 'ru', 'Не пришло письмо?'),
(1017, 'ru', 'Отключить'),
(1018, 'ru', 'Нет аккаунта? Зарегистрируйтесь!'),
(1019, 'ru', 'Email'),
(1020, 'ru', 'Публичный email'),
(1021, 'ru', 'При смене пароля произошла ошибка'),
(1022, 'ru', 'Произошла ошибка при активации пользователя'),
(1023, 'ru', 'Произошла ошибка при удалении пользователя'),
(1024, 'ru', 'Завершить'),
(1025, 'ru', 'Забыли пароль?'),
(1026, 'ru', 'Gravatar email'),
(1027, 'ru', 'Здравствуйте'),
(1028, 'ru', 'Если вы уже зарегисрированы, войдите и подключите аккаунт в настройках'),
(1029, 'ru', 'Если вы не можете нажать на ссылку, скопируйте ее и вставте в адресную строку вашего браузера'),
(1030, 'ru', 'P.S. Если вы получили это сообщение по ошибке, просто удалите его'),
(1031, 'ru', 'Чтобы активировать ваш аккаунт, пожалуйста, нажмите на ссылку ниже'),
(1032, 'ru', 'Чтобы завершить запрос, нажмите на ссылку ниже'),
(1033, 'ru', 'Информация'),
(1034, 'ru', 'Неправильный логин или пароль'),
(1035, 'ru', 'Ссылка неправильна или устарела'),
(1036, 'ru', 'Присоединился {0, date}'),
(1037, 'ru', 'Местоположение'),
(1038, 'ru', 'Логин'),
(1039, 'ru', 'Выйти'),
(1040, 'ru', 'Управление пользователями'),
(1041, 'ru', 'Имя'),
(1042, 'ru', 'Соцсети'),
(1043, 'ru', 'Новый email'),
(1044, 'ru', 'Новый пароль'),
(1045, 'ru', 'Создать разрешение'),
(1046, 'ru', 'Создать роль'),
(1047, 'ru', 'Создать пользователя'),
(1048, 'ru', 'Пользователь незаблокирован'),
(1049, 'ru', 'Пароль'),
(1050, 'ru', 'Пароль был изменен'),
(1051, 'ru', 'Разрешения'),
(1052, 'ru', 'Чтобы восстановить пароль, нажмите на ссылку ниже'),
(1053, 'ru', 'Исправьте следующие ошибки'),
(1054, 'ru', 'Профиль'),
(1055, 'ru', 'Профиль'),
(1056, 'ru', 'Профиль пользователя был обновлен'),
(1057, 'ru', 'Настройки профиля'),
(1058, 'ru', 'Восстановить пароль'),
(1059, 'ru', 'Ссылка для смены пароля неправильна или устарела. Пожалуйста, попробуйте запросить новую ссылку.'),
(1060, 'ru', 'Письмо для сброса пароля было отправлено'),
(1061, 'ru', 'IP при регистрации'),
(1062, 'ru', 'Регистрационный IP'),
(1063, 'ru', 'Время регистрации'),
(1064, 'ru', 'Запомнить меня'),
(1065, 'ru', 'Повторная отправка инструкций'),
(1066, 'ru', 'Сбросить пароль'),
(1067, 'ru', 'Роли'),
(1068, 'ru', 'Сохранить'),
(1069, 'ru', 'Авторизоваться'),
(1070, 'ru', 'Зарегистрироваться'),
(1071, 'ru', 'Что-то пошло не так, и ваш аккаунт не был активирован.'),
(1072, 'ru', 'Спасибо за регистрацию на сайте {0}'),
(1073, 'ru', 'Ваш аккаунт был успешно активирован.'),
(1074, 'ru', 'Ссылка для активации аккаунта неправильна или она устарела. Вы можете запросить новую.'),
(1075, 'ru', 'Нет пользователя с таким email'),
(1076, 'ru', 'Этот аккаунт уже был активирован'),
(1077, 'ru', 'Этот аккаунт уже был привязан к другой учетной записи'),
(1078, 'ru', 'Этот email уже используется'),
(1079, 'ru', 'Это имя пользователя уже используется'),
(1080, 'ru', 'Разблокировать'),
(1081, 'ru', 'Аккаунт неподтвержден'),
(1082, 'ru', 'Обновить'),
(1083, 'ru', 'Обновить аккаунт пользователя'),
(1084, 'ru', 'Пользователь был блокирован'),
(1085, 'ru', 'Пользователь был активирован'),
(1086, 'ru', 'Пользователь был создан'),
(1087, 'ru', 'Пользователь был удален'),
(1088, 'ru', 'Пользователь был разблокирован'),
(1089, 'ru', 'Пользователь не найден'),
(1090, 'ru', 'Имя пользователя'),
(1091, 'ru', 'Пользователи'),
(1092, 'ru', 'Вы запросили смену email на сайте {0}'),
(1093, 'ru', 'Вы запросили смену пароля на сайте {0}'),
(1094, 'ru', 'Мы отправили письма на ваш старый и новый почтовые ящики. Вы должны перейти по обеим, чтобы завершить процесс смены адреса.'),
(1095, 'ru', 'Вебсайт'),
(1096, 'ru', 'Добро пожаловать на {0}'),
(1097, 'ru', 'Добро пожаловать! Вы были успешно зарегистрированы и авторизованы.'),
(1098, 'ru', 'Вы можете добавить пользователю несколько ролей или разрешений, используя форму ниже'),
(1099, 'ru', 'Вы не можете заблокировать свой собственный аккаунт'),
(1100, 'ru', 'Вы не можете удалить свой собственный аккаунт'),
(1101, 'ru', 'Вы можете использовать его вместе с вашим email или логином для входа'),
(1102, 'ru', 'Вы должны активировать аккаунт'),
(1103, 'ru', 'Настройки аккаунта были изменены'),
(1104, 'ru', 'Ваш аккаунт был блокирован'),
(1105, 'ru', 'Аккаунт был успешно подключен'),
(1106, 'ru', 'Ваш аккаунт был создан'),
(1107, 'ru', 'Ваш аккаунт на сайте "{0}" был успешно создан и мы сгенерировали пароль для вас'),
(1108, 'ru', 'Ваша ссылка устарела или является ошибочной'),
(1109, 'ru', 'Ваш email был успешно изменен'),
(1110, 'ru', 'Ваш пароль был успешно изменен.'),
(1111, 'ru', 'Настройки профиля были успешно сохранены'),
(1112, 'ru', '{0, date, MMMM dd, YYYY HH:mm}'),
(1113, 'ru', 'Контент'),
(1114, 'ru', 'Главная'),
(1115, 'ru', 'Назначение'),
(1116, 'ru', 'Пользователи'),
(1117, 'ru', 'Назначение'),
(1118, 'ru', 'Роли'),
(1119, 'ru', 'Разрешения'),
(1120, 'ru', 'Маршруты'),
(1121, 'ru', 'Правила'),
(1122, 'ru', 'Меню'),
(1123, 'ru', 'Генератор кода'),
(1124, 'ru', 'Debug Data'),
(1125, 'ru', 'Любое имя'),
(1126, 'ru', 'Добро пожаловать!'),
(1127, 'ru', 'Бекап базы'),
(1128, 'ru', 'SypexDumper'),
(1129, 'ru', 'Текст'),
(1130, 'ru', 'Ограничения'),
(1131, 'ru', 'Класс модели'),
(1132, 'ru', 'Класс ограничения'),
(1133, 'ru', 'Запрещенные атрибуты'),
(1134, 'ru', 'Создано от'),
(1135, 'ru', 'Создано до'),
(1136, 'ru', 'Разрешения'),
(1137, 'ru', 'Поиск'),
(1138, 'ru', 'Расширенный поиск'),
(1139, 'ru', 'Автор'),
(1140, 'ru', 'Создано'),
(1141, 'ru', 'Обновлено'),
(1142, 'ru', 'Активно'),
(1143, 'ru', 'Да'),
(1144, 'ru', 'Нет'),
(1145, 'ru', 'Создать'),
(1146, 'ru', 'Обновить'),
(1147, 'ru', 'Удалить'),
(1148, 'ru', 'Вы уверены?'),
(1149, 'ru', 'Действия с выбранными'),
(1150, 'ru', 'Создать разрешение'),
(1151, 'ru', 'Разрешения'),
(1152, 'ru', 'Элемент'),
(1153, 'ru', 'Сохранить'),
(1154, 'ru', 'Обновить'),
(1155, 'ru', 'Отмена'),
(1156, 'ru', 'Редактировать разрешения'),
(1157, 'ru', 'Вид'),
(1158, 'ru', 'Роль'),
(1159, 'ru', 'Ограничение'),
(1160, 'ru', 'Создать ограничение'),
(1161, 'ru', 'Просмотр'),
(1162, 'ru', 'Обновить ограничения'),
(1163, 'ru', 'Обновить'),
(1164, 'ru', 'Вы уверены?'),
(1165, 'ru', 'Перевод'),
(1166, 'ru', 'Песочница'),
(1167, 'ru', 'Pjax'),
(1168, 'ru', 'Ajaxq'),
(1169, 'ru', 'Intro'),
(1170, 'ru', 'Города'),
(1171, 'ru', 'Город'),
(1172, 'ru', 'Парсер'),
(1173, 'ru', 'Достопримечательности'),
(1174, 'ru', 'Список городов'),
(1175, 'ru', 'Парсер городов'),
(1176, 'ru', 'Города'),
(1177, 'ru', 'Список'),
(1178, 'ru', 'Тип'),
(1196, 'ru', 'Плагины'),
(1197, 'ru', 'Создать плагин'),
(1198, 'ru', 'Id'),
(1199, 'ru', 'Название'),
(1200, 'ru', 'Url'),
(1201, 'ru', 'Версия'),
(1202, 'ru', 'Описание'),
(1203, 'ru', 'Автор'),
(1204, 'ru', 'Автор Url'),
(1205, 'ru', 'Хеш'),
(1206, 'ru', 'Статус'),
(1207, 'ru', 'Уверены, что хотите удалить эту запись?'),
(1208, 'ru', 'Плагины'),
(1209, 'ru', 'Да'),
(1210, 'ru', 'Нет'),
(1211, 'ru', 'Изображение'),
(1212, 'ru', 'На  главной'),
(1213, 'ru', 'Меню'),
(1214, 'ru', 'Главная'),
(1215, 'ru', 'Потомок'),
(1216, 'ru', 'Переместить'),
(1217, 'ru', 'Вверх'),
(1218, 'ru', 'Вниз'),
(1219, 'ru', 'Войти'),
(1220, 'ru', 'Иконка'),
(1221, 'ru', 'Родитель'),
(1254, 'ru', 'Сброс'),
(1255, 'ru', 'Родитель'),
(1256, 'ru', 'Форма'),
(1257, 'ru', 'Заголовок'),
(1258, 'ru', 'SEO'),
(1259, 'ru', 'Текст'),
(1260, 'ru', 'Текст'),
(1261, 'ru', 'Настройки'),
(1262, 'ru', 'Категория'),
(1263, 'ru', 'Обновить {modelClass}: '),
(1264, 'ru', 'Категория'),
(1265, 'ru', 'Назначение'),
(1266, 'ru', 'Назначение'),
(1267, 'ru', 'RBAC'),
(1268, 'ru', 'Координаты'),
(1269, 'ru', 'Создать {modelClass}'),
(1270, 'ru', 'Запись'),
(1271, 'ru', 'Галерея'),
(1272, 'ru', 'Выбор координат'),
(1273, 'ru', 'Введите адрес и нажмите Enter');

-- --------------------------------------------------------

--
-- Структура таблицы `mx_i18n_source_message`
--

CREATE TABLE IF NOT EXISTS `mx_i18n_source_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1274 ;

--
-- Дамп данных таблицы `mx_i18n_source_message`
--

INSERT INTO `mx_i18n_source_message` (`id`, `category`, `message`) VALUES
(670, 'backend', 'Application settings'),
(671, 'backend', 'Female'),
(672, 'backend', 'Male'),
(673, 'backend', 'Settings was successfully saved'),
(674, 'backend', 'This username has already been taken.'),
(675, 'backend', 'Account'),
(676, 'backend', 'Active'),
(677, 'backend', 'Application'),
(678, 'backend', 'Application timeline'),
(679, 'backend', 'Are you sure you want to delete this item?'),
(680, 'backend', 'Are you sure you want to flush this cache?'),
(681, 'backend', 'Article Categories'),
(682, 'backend', 'Articles'),
(683, 'backend', 'Backend sidebar collapsed'),
(684, 'backend', 'Backend theme'),
(685, 'backend', 'Boxed backend layout'),
(686, 'backend', 'CPU Usage'),
(687, 'backend', 'Cache'),
(688, 'backend', 'Cache entry has been successfully deleted'),
(689, 'backend', 'Cache has been successfully flushed'),
(690, 'backend', 'Carousel Widgets'),
(691, 'backend', 'Carousel slide was successfully saved'),
(692, 'backend', 'Category'),
(693, 'backend', 'Clear'),
(694, 'backend', 'Content'),
(695, 'backend', 'Count'),
(696, 'backend', 'Create'),
(697, 'backend', 'Create {modelClass}'),
(698, 'backend', 'DB Type'),
(699, 'backend', 'DB Version'),
(700, 'backend', 'Date'),
(701, 'backend', 'Delete'),
(702, 'backend', 'Delete a value with the specified key from cache'),
(703, 'backend', 'Disabled'),
(704, 'backend', 'Edit account'),
(705, 'backend', 'Edit profile'),
(706, 'backend', 'Email'),
(707, 'backend', 'Enabled'),
(708, 'backend', 'Error #{id}'),
(709, 'backend', 'Error {code}'),
(710, 'backend', 'Event'),
(711, 'backend', 'External IP'),
(712, 'backend', 'File Manager'),
(713, 'backend', 'File Storage'),
(714, 'backend', 'File Storage Items'),
(715, 'backend', 'Files in storage'),
(716, 'backend', 'Fixed backend layout'),
(717, 'backend', 'Flush'),
(718, 'backend', 'Free Swap'),
(719, 'backend', 'Free memory'),
(720, 'backend', 'Frontend maintenance mode'),
(721, 'backend', 'Hello, {username}'),
(722, 'backend', 'Hostname'),
(723, 'backend', 'I18n Messages'),
(724, 'backend', 'I18n Source Messages'),
(725, 'backend', 'ID'),
(726, 'backend', 'If you''ll leave this field empty, slug will be generated automatically'),
(727, 'backend', 'Incorrect username or password.'),
(728, 'backend', 'Internal IP'),
(729, 'backend', 'Invalidate tag'),
(730, 'backend', 'Kernel version'),
(731, 'backend', 'Key'),
(732, 'backend', 'Key Storage Items'),
(733, 'backend', 'Key-Value Storage'),
(734, 'backend', 'Language'),
(735, 'backend', 'Level'),
(736, 'backend', 'Load average'),
(737, 'backend', 'Log Time'),
(738, 'backend', 'Logout'),
(739, 'backend', 'Logs'),
(740, 'backend', 'Member since {0, date, short}'),
(741, 'backend', 'Memory'),
(742, 'backend', 'Memory Usage'),
(743, 'backend', 'Menu Widgets'),
(744, 'backend', 'Message'),
(745, 'backend', 'More info'),
(746, 'backend', 'Network'),
(747, 'backend', 'New user ({identity}) was registered at {created_at}'),
(748, 'backend', 'No events found'),
(749, 'backend', 'Not Published'),
(750, 'backend', 'Number of cores'),
(751, 'backend', 'OS'),
(752, 'backend', 'OS Release'),
(753, 'backend', 'Off'),
(754, 'backend', 'On'),
(755, 'backend', 'Operating System'),
(756, 'backend', 'PHP Version'),
(757, 'backend', 'Pages'),
(758, 'backend', 'Password'),
(759, 'backend', 'Password Confirm'),
(760, 'backend', 'Port'),
(761, 'backend', 'Prefix'),
(762, 'backend', 'Processor'),
(763, 'backend', 'Processor Architecture'),
(764, 'backend', 'Profile'),
(765, 'backend', 'Published'),
(766, 'backend', 'Real time'),
(767, 'backend', 'Remember Me'),
(768, 'backend', 'Reset'),
(769, 'backend', 'Roles'),
(770, 'backend', 'Save'),
(771, 'backend', 'Search'),
(772, 'backend', 'Select cache'),
(773, 'backend', 'Sign In'),
(774, 'backend', 'Sign me in'),
(775, 'backend', 'Software'),
(776, 'backend', 'Sorry, application failed to collect information about your system. See {link}.'),
(777, 'backend', 'Source Message'),
(778, 'backend', 'Static pages'),
(779, 'backend', 'System'),
(780, 'backend', 'System Date'),
(781, 'backend', 'System Information'),
(782, 'backend', 'System Logs'),
(783, 'backend', 'System Time'),
(784, 'backend', 'Tag'),
(785, 'backend', 'TagDependency was invalidated'),
(786, 'backend', 'Text Blocks'),
(787, 'backend', 'Text Widgets'),
(788, 'backend', 'Time'),
(789, 'backend', 'Timeline'),
(790, 'backend', 'Timezone'),
(791, 'backend', 'Toggle navigation'),
(792, 'backend', 'Total Swap'),
(793, 'backend', 'Total memory'),
(794, 'backend', 'Translation'),
(795, 'backend', 'Update'),
(796, 'backend', 'Update {modelClass}: '),
(797, 'backend', 'Uptime'),
(798, 'backend', 'Used size'),
(799, 'backend', 'User Registrations'),
(800, 'backend', 'Username'),
(801, 'backend', 'Users'),
(802, 'backend', 'View all'),
(803, 'backend', 'View user'),
(804, 'backend', 'Web Server'),
(805, 'backend', 'Widget Carousel Items'),
(806, 'backend', 'Widget Carousels'),
(807, 'backend', 'Widget Menus'),
(808, 'backend', 'You have new event'),
(809, 'backend', 'You have new user!'),
(810, 'backend', 'You have {num} log items'),
(811, 'backend', 'Your account has been successfully saved'),
(812, 'backend', 'Your profile has been successfully saved'),
(813, 'backend', 'i18n'),
(814, 'backend', 'i18n Message'),
(815, 'backend', 'i18n Source Message'),
(816, 'common', 'Article View'),
(817, 'common', 'Page View'),
(818, 'common', '"{attribute}" must be a valid JSON'),
(819, 'common', 'Active'),
(820, 'common', 'Article ID'),
(821, 'common', 'Author'),
(822, 'common', 'Base URL'),
(823, 'common', 'Base Url'),
(824, 'common', 'Body'),
(825, 'common', 'Caption'),
(826, 'common', 'Carousel ID'),
(827, 'common', 'Category'),
(828, 'common', 'Comment'),
(829, 'common', 'Component'),
(830, 'common', 'Config'),
(831, 'common', 'Created At'),
(832, 'common', 'Created at'),
(833, 'common', 'Deleted'),
(834, 'common', 'Down to maintenance.'),
(835, 'common', 'E-mail'),
(836, 'common', 'File Type'),
(837, 'common', 'Firstname'),
(838, 'common', 'Gender'),
(839, 'common', 'ID'),
(840, 'common', 'Image'),
(841, 'common', 'Key'),
(842, 'common', 'Last login'),
(843, 'common', 'Lastname'),
(844, 'common', 'Locale'),
(845, 'common', 'Middlename'),
(846, 'common', 'Name'),
(847, 'common', 'Order'),
(848, 'common', 'Parent Category'),
(849, 'common', 'Path'),
(850, 'common', 'Picture'),
(851, 'common', 'Published'),
(852, 'common', 'Published At'),
(853, 'common', 'Size'),
(854, 'common', 'Slug'),
(855, 'common', 'Status'),
(856, 'common', 'Thumbnail'),
(857, 'common', 'Title'),
(858, 'common', 'Type'),
(859, 'common', 'Updated At'),
(860, 'common', 'Updated at'),
(861, 'common', 'Updater'),
(862, 'common', 'Upload Ip'),
(863, 'common', 'Url'),
(864, 'common', 'User ID'),
(865, 'common', 'Username'),
(866, 'common', 'Value'),
(867, 'frontend', 'Settings'),
(868, 'frontend', 'User Settings'),
(869, 'frontend', 'About'),
(870, 'frontend', 'Account Settings'),
(871, 'frontend', 'Articles'),
(872, 'frontend', 'Attachments'),
(873, 'frontend', 'Backend'),
(874, 'frontend', 'Body'),
(875, 'frontend', 'Check your email for further instructions.'),
(876, 'frontend', 'Confirm Password'),
(877, 'frontend', 'Contact'),
(878, 'frontend', 'E-mail'),
(879, 'frontend', 'Email'),
(880, 'frontend', 'Error while oauth process.'),
(881, 'frontend', 'Female'),
(882, 'frontend', 'Home'),
(883, 'frontend', 'If you forgot your password you can reset it <a href="{link}">here</a>'),
(884, 'frontend', 'Incorrect username or password.'),
(885, 'frontend', 'Language'),
(886, 'frontend', 'Log in with'),
(887, 'frontend', 'Login'),
(888, 'frontend', 'Logout'),
(889, 'frontend', 'Male'),
(890, 'frontend', 'Name'),
(891, 'frontend', 'Need an account? Sign up.'),
(892, 'frontend', 'New password was saved.'),
(893, 'frontend', 'Page not found'),
(894, 'frontend', 'Password'),
(895, 'frontend', 'Password reset for {name}'),
(896, 'frontend', 'Profile settings'),
(897, 'frontend', 'Remember Me'),
(898, 'frontend', 'Request password reset'),
(899, 'frontend', 'Reset password'),
(900, 'frontend', 'Sign up with'),
(901, 'frontend', 'Signup'),
(902, 'frontend', 'Sorry, we are unable to reset password for email provided.'),
(903, 'frontend', 'Subject'),
(904, 'frontend', 'Submit'),
(905, 'frontend', 'Thank you for contacting us. We will respond to you as soon as possible.'),
(906, 'frontend', 'There was an error sending email.'),
(907, 'frontend', 'This email address has already been taken.'),
(908, 'frontend', 'This username has already been taken.'),
(909, 'frontend', 'Update'),
(910, 'frontend', 'Username'),
(911, 'frontend', 'Username or email'),
(912, 'frontend', 'Verification Code'),
(913, 'frontend', 'We already have a user with email {email}'),
(914, 'frontend', 'Welcome to {app-name}. Email with your login information was sent to your email.'),
(915, 'frontend', 'Your account has been successfully saved'),
(916, 'frontend', '{app-name} | Your login information'),
(917, 'rbac-admin', 'Assignments'),
(918, 'rbac-admin', 'Users'),
(919, 'rbac-admin', 'User'),
(920, 'rbac-admin', 'Avaliable'),
(921, 'rbac-admin', 'Assigned'),
(922, 'rbac-admin', 'Create'),
(923, 'rbac-admin', 'Update'),
(924, 'rbac-admin', 'Roles'),
(925, 'rbac-admin', 'Create Role'),
(926, 'rbac-admin', 'Name'),
(927, 'rbac-admin', 'Type'),
(928, 'rbac-admin', 'Description'),
(929, 'rbac-admin', 'Rule Name'),
(930, 'rbac-admin', 'Data'),
(931, 'rbac-admin', 'Update Role'),
(932, 'rbac-admin', 'Delete'),
(933, 'rbac-admin', 'Are you sure to delete this item?'),
(934, 'rbac-admin', 'ID'),
(935, 'rbac-admin', 'Parent'),
(936, 'rbac-admin', 'Parent Name'),
(937, 'rbac-admin', 'Route'),
(938, 'rbac-admin', 'Username'),
(939, 'rbac-admin', 'Update Permission'),
(940, 'rbac-admin', 'Permissions'),
(941, 'rbac-admin', 'Permission'),
(942, 'rbac-admin', 'Create Permission'),
(943, 'rbac-admin', 'Create Permissions'),
(944, 'rbac-admin', 'Routes'),
(945, 'rbac-admin', 'Create route'),
(946, 'rbac-admin', 'New'),
(947, 'rbac-admin', 'Generate Routes'),
(948, 'rbac-admin', 'Append'),
(949, 'rbac-admin', 'Create Rule'),
(950, 'rbac-admin', 'Rules'),
(951, 'rbac-admin', 'Update Rule'),
(952, 'rbac-admin', 'Create Menu'),
(953, 'rbac-admin', 'Menus'),
(954, 'rbac-admin', 'Search'),
(955, 'rbac-admin', 'Reset'),
(956, 'rbac-admin', 'Update Menu'),
(957, 'rbac-admin', 'Order'),
(958, 'rbac-admin', 'Class Name'),
(959, 'rbac-admin', 'Assignment'),
(960, 'rbac-admin', 'Role'),
(961, 'rbac-admin', 'Rule'),
(962, 'rbac-admin', 'Menu'),
(963, 'rbac-admin', 'Help'),
(964, 'rbac-admin', 'Application'),
(965, 'user', 'In order to finish your registration, we need you to enter your email address'),
(966, 'user', 'Something went wrong'),
(967, 'user', 'VKontakte'),
(968, 'user', 'Yandex'),
(969, 'user', 'You can connect multiple accounts to be able to log in using them'),
(970, 'user', '(not set)'),
(971, 'user', 'A confirmation message has been sent to your new email address'),
(972, 'user', 'A message has been sent to your email address. It contains a confirmation link that you must click to complete registration.'),
(973, 'user', 'A message has been sent to your email address. It contains a password that we generated for you.'),
(974, 'user', 'A message has been sent to your email address. It contains your password and a confirmation link that you must click to complete registration.'),
(975, 'user', 'A new confirmation link has been sent'),
(976, 'user', 'A password will be generated automatically if not provided'),
(977, 'user', 'Account'),
(978, 'user', 'Account confirmation'),
(979, 'user', 'Account details'),
(980, 'user', 'Account details have been updated'),
(981, 'user', 'Account settings'),
(982, 'user', 'Already registered? Sign in!'),
(983, 'user', 'An email has been sent with instructions for resetting your password'),
(984, 'user', 'An error occurred and your password has not been changed. Please try again later.'),
(985, 'user', 'An error occurred processing your request'),
(986, 'user', 'Are you sure you want to block this user?'),
(987, 'user', 'Are you sure you want to confirm this user?'),
(988, 'user', 'Are you sure you want to delete this user?'),
(989, 'user', 'Are you sure you want to unblock this user?'),
(990, 'user', 'Are you sure? Deleted user can not be restored'),
(991, 'user', 'Assignments'),
(992, 'user', 'Awesome, almost there. Now you need to click the confirmation link sent to your new email address'),
(993, 'user', 'Awesome, almost there. Now you need to click the confirmation link sent to your old email address'),
(994, 'user', 'Bio'),
(995, 'user', 'Block'),
(996, 'user', 'Block status'),
(997, 'user', 'Blocked at {0, date, MMMM dd, YYYY HH:mm}'),
(998, 'user', 'Change your avatar at Gravatar.com'),
(999, 'user', 'Complete password reset on {0}'),
(1000, 'user', 'Confirm'),
(1001, 'user', 'Confirm account on {0}'),
(1002, 'user', 'Confirm email change on {0}'),
(1003, 'user', 'Confirmation'),
(1004, 'user', 'Confirmation status'),
(1005, 'user', 'Confirmation time'),
(1006, 'user', 'Confirmed'),
(1007, 'user', 'Confirmed at {0, date, MMMM dd, YYYY HH:mm}'),
(1008, 'user', 'Connect'),
(1009, 'user', 'Continue'),
(1010, 'user', 'Create'),
(1011, 'user', 'Create a user account'),
(1012, 'user', 'Credentials will be sent to the user by email'),
(1013, 'user', 'Current password'),
(1014, 'user', 'Current password is not valid'),
(1015, 'user', 'Delete'),
(1016, 'user', 'Didn''t receive confirmation message?'),
(1017, 'user', 'Disconnect'),
(1018, 'user', 'Don''t have an account? Sign up!'),
(1019, 'user', 'Email'),
(1020, 'user', 'Email (public)'),
(1021, 'user', 'Error occurred while changing password'),
(1022, 'user', 'Error occurred while confirming user'),
(1023, 'user', 'Error occurred while deleting user'),
(1024, 'user', 'Finish'),
(1025, 'user', 'Forgot password?'),
(1026, 'user', 'Gravatar email'),
(1027, 'user', 'Hello'),
(1028, 'user', 'If you already registered, sign in and connect this account on settings page'),
(1029, 'user', 'If you cannot click the link, please try pasting the text into your browser'),
(1030, 'user', 'If you did not make this request you can ignore this email'),
(1031, 'user', 'In order to complete your registration, please click the link below'),
(1032, 'user', 'In order to complete your request, please click the link below'),
(1033, 'user', 'Information'),
(1034, 'user', 'Invalid login or password'),
(1035, 'user', 'Invalid or expired link'),
(1036, 'user', 'Joined on {0, date}'),
(1037, 'user', 'Location'),
(1038, 'user', 'Login'),
(1039, 'user', 'Logout'),
(1040, 'user', 'Manage users'),
(1041, 'user', 'Name'),
(1042, 'user', 'Networks'),
(1043, 'user', 'New email'),
(1044, 'user', 'New password'),
(1045, 'user', 'New permission'),
(1046, 'user', 'New role'),
(1047, 'user', 'New user'),
(1048, 'user', 'Not blocked'),
(1049, 'user', 'Password'),
(1050, 'user', 'Password has been changed'),
(1051, 'user', 'Permissions'),
(1052, 'user', 'Please click the link below to complete your password reset'),
(1053, 'user', 'Please fix following errors:'),
(1054, 'user', 'Profile'),
(1055, 'user', 'Profile details'),
(1056, 'user', 'Profile details have been updated'),
(1057, 'user', 'Profile settings'),
(1058, 'user', 'Recover your password'),
(1059, 'user', 'Recovery link is invalid or expired. Please try requesting a new one.'),
(1060, 'user', 'Recovery message sent'),
(1061, 'user', 'Registration IP'),
(1062, 'user', 'Registration ip'),
(1063, 'user', 'Registration time'),
(1064, 'user', 'Remember me next time'),
(1065, 'user', 'Request new confirmation message'),
(1066, 'user', 'Reset your password'),
(1067, 'user', 'Roles'),
(1068, 'user', 'Save'),
(1069, 'user', 'Sign in'),
(1070, 'user', 'Sign up'),
(1071, 'user', 'Something went wrong and your account has not been confirmed.'),
(1072, 'user', 'Thank you for signing up on {0}'),
(1073, 'user', 'Thank you, registration is now complete.'),
(1074, 'user', 'The confirmation link is invalid or expired. Please try requesting a new one.'),
(1075, 'user', 'There is no user with this email address'),
(1076, 'user', 'This account has already been confirmed'),
(1077, 'user', 'This account has already been connected to another user'),
(1078, 'user', 'This email address has already been taken'),
(1079, 'user', 'This username has already been taken'),
(1080, 'user', 'Unblock'),
(1081, 'user', 'Unconfirmed'),
(1082, 'user', 'Update'),
(1083, 'user', 'Update user account'),
(1084, 'user', 'User has been blocked'),
(1085, 'user', 'User has been confirmed'),
(1086, 'user', 'User has been created'),
(1087, 'user', 'User has been deleted'),
(1088, 'user', 'User has been unblocked'),
(1089, 'user', 'User is not found'),
(1090, 'user', 'Username'),
(1091, 'user', 'Users'),
(1092, 'user', 'We have received a request to change the email address for your account on {0}'),
(1093, 'user', 'We have received a request to reset the password for your account on {0}'),
(1094, 'user', 'We have sent confirmation links to both old and new email addresses. You must click both links to complete your request'),
(1095, 'user', 'Website'),
(1096, 'user', 'Welcome to {0}'),
(1097, 'user', 'Welcome! Registration is complete.'),
(1098, 'user', 'You can assign multiple roles or permissions to user by using the form below'),
(1099, 'user', 'You can not block your own account'),
(1100, 'user', 'You can not remove your own account'),
(1101, 'user', 'You can now log in with the following credentials:'),
(1102, 'user', 'You need to confirm your email address'),
(1103, 'user', 'Your account details have been updated'),
(1104, 'user', 'Your account has been blocked'),
(1105, 'user', 'Your account has been connected'),
(1106, 'user', 'Your account has been created'),
(1107, 'user', 'Your account on {0} has been created'),
(1108, 'user', 'Your confirmation token is invalid or expired'),
(1109, 'user', 'Your email address has been changed'),
(1110, 'user', 'Your password has been changed successfully.'),
(1111, 'user', 'Your profile has been updated'),
(1112, 'user', '{0, date, MMMM dd, YYYY HH:mm}'),
(1113, 'menu', 'Content'),
(1114, 'backend', 'Main'),
(1115, 'backend', 'Asignment'),
(1116, 'backend', 'Users (main)'),
(1117, 'backend', 'Assignment'),
(1118, 'backend', 'Role'),
(1119, 'backend', 'Permission'),
(1120, 'backend', 'Route'),
(1121, 'backend', 'Rule'),
(1122, 'backend', 'Menu'),
(1123, 'backend', 'Gii'),
(1124, 'backend', 'Debug'),
(1125, 'my', 'Some Name'),
(1126, 'app', 'Welcome'),
(1127, 'backend', 'Backuprestore'),
(1128, 'backend', 'SypexDumper'),
(1129, 'common', 'Text'),
(1130, 'backend', 'Constraint'),
(1131, 'core', 'Model class'),
(1132, 'core', 'Constraint class'),
(1133, 'core', 'Forbidden attributes'),
(1134, 'core', 'Created from'),
(1135, 'core', 'Created to'),
(1136, 'core', 'Permissions'),
(1137, 'core', 'Search'),
(1138, 'core', 'Extended search'),
(1139, 'core', 'Author'),
(1140, 'core', 'Created'),
(1141, 'core', 'Updated'),
(1142, 'core', 'Status'),
(1143, 'core', 'Yes'),
(1144, 'core', 'No'),
(1145, 'core', 'Create'),
(1146, 'core', 'Update'),
(1147, 'core', 'Delete'),
(1148, 'core', 'Are you sure?'),
(1149, 'core', 'Actions with selected'),
(1150, 'common', 'Create Permission'),
(1151, 'common', 'Permissions'),
(1152, 'core', 'Element'),
(1153, 'core', 'Save'),
(1154, 'core', 'Apply'),
(1155, 'core', 'Cancel'),
(1156, 'common', 'Update Permission'),
(1157, 'core', 'View'),
(1158, 'common', 'Role'),
(1159, 'common', 'Constraint'),
(1160, 'common', 'Create Constraint'),
(1161, 'backend', 'View'),
(1162, 'common', 'Update Constraint'),
(1163, 'common', 'Update'),
(1164, 'core', 'Are you shure?'),
(1165, 'backend', 'Translate'),
(1166, 'backend', 'Playgraund'),
(1167, 'backend', 'Pjax'),
(1168, 'backend', 'Ajaxq'),
(1169, 'common', 'Intro'),
(1170, 'backend', 'Towns'),
(1171, 'common', 'Town'),
(1172, 'common', 'Parser'),
(1173, 'backend', 'Sight'),
(1174, 'common', 'Town list'),
(1175, 'backend', 'Parser towns'),
(1176, 'common', 'Towns'),
(1177, 'common', 'List'),
(1178, 'backend', 'Type'),
(1196, 'plugin', 'Items'),
(1197, 'plugin', 'Create Item'),
(1198, 'plugin', 'ID'),
(1199, 'plugin', 'Name'),
(1200, 'plugin', 'Url'),
(1201, 'plugin', 'Version'),
(1202, 'plugin', 'Text'),
(1203, 'plugin', 'Author'),
(1204, 'plugin', 'Author Url'),
(1205, 'plugin', 'Hash'),
(1206, 'plugin', 'Status'),
(1207, 'plugins', 'Are you sure to delete this item?'),
(1208, 'backend', 'Plugins'),
(1209, 'common', 'Yes'),
(1210, 'common', 'No'),
(1211, 'common', 'Img'),
(1212, 'common', 'Onmain'),
(1213, 'common', 'Menu'),
(1214, 'common', 'Root'),
(1215, 'common', 'Child'),
(1216, 'core', 'Replace'),
(1217, 'core', 'Up'),
(1218, 'core', 'Down'),
(1219, 'core', 'Enter'),
(1220, 'common', 'Icon'),
(1221, 'main/app', 'Parent'),
(1254, 'core', 'Reset'),
(1255, 'core', 'Parent'),
(1256, 'backend', 'Form'),
(1257, 'common', 'title'),
(1258, 'core', 'SEO'),
(1259, 'common', 'text'),
(1260, 'core', 'Text'),
(1261, 'core', 'Config'),
(1262, 'common', 'Cat'),
(1263, 'common', 'Update {modelClass}: '),
(1264, 'backend', 'Cat'),
(1265, 'common', 'Assignment'),
(1266, 'core', 'Assignment'),
(1267, 'backend', 'RBAC'),
(1268, 'common', 'Coords'),
(1269, 'common', 'Create {modelClass}'),
(1270, 'common', 'Item'),
(1271, 'common', 'Gallery'),
(1272, 'core', 'Coordinates select'),
(1273, 'core', 'Input address and press Enter');

-- --------------------------------------------------------

--
-- Структура таблицы `mx_key_storage_item`
--

CREATE TABLE IF NOT EXISTS `mx_key_storage_item` (
  `key` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `updated_at` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`key`),
  UNIQUE KEY `idx_key_storage_item_key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `mx_key_storage_item`
--

INSERT INTO `mx_key_storage_item` (`key`, `value`, `comment`, `updated_at`, `created_at`) VALUES
('backend.layout-boxed', '1', NULL, 1439193889, NULL),
('backend.layout-collapsed-sidebar', '0', NULL, 1439193889, NULL),
('backend.layout-fixed', '0', NULL, 1439193889, NULL),
('backend.theme-skin', 'skin-purple', 'skin-blue, skin-black, skin-purple, skin-green, skin-red, skin-yellow', 1439193889, NULL),
('frontend.maintenance', 'disabled', 'Set it to "true" to turn on maintenance mode', 1439193889, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `mx_menu`
--

CREATE TABLE IF NOT EXISTS `mx_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(256) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` text,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Дамп данных таблицы `mx_menu`
--

INSERT INTO `mx_menu` (`id`, `name`, `parent`, `route`, `order`, `data`) VALUES
(1, 'Main', NULL, '/site/index', 0, 'return [''icon''=>''dashboard''];'),
(2, 'Timeline', NULL, '/timeline-event/index', 1, 'return [''icon''=>''bar-chart-o''];'),
(3, 'Content', NULL, NULL, 3, 'return [''icon''=>''edit''];'),
(4, 'Pages', 3, '/page/item/index', 1, NULL),
(5, 'Users (main)', NULL, NULL, 4, 'return [''icon''=>''users''];'),
(6, 'Users', 5, '/user/admin/index', 1, NULL),
(7, 'RBAC', 5, '/admin/default/index', 2, NULL),
(13, 'System', NULL, NULL, 10, 'return [''icon''=>''cogs''];'),
(14, 'i18n', 13, NULL, 1, 'return [''icon''=>''flag''];'),
(15, 'i18n Source Message', 14, '/i18n/i18n-source-message/index', 1, NULL),
(16, 'i18n Message', 14, '/i18n/i18n-message/index', 2, NULL),
(17, 'Key-Value Storage', 13, '/core/key-storage/index', 2, NULL),
(18, 'Cache', 13, '/core/cache/index', 3, NULL),
(19, 'System Information', 13, '/core/system-information/index', 4, NULL),
(20, 'Logs', 13, '/core/log/index', 8, NULL),
(21, 'Gii', 13, '/gii/default/index', 31, NULL),
(22, 'Debug', 13, '/debug/default/index', 30, NULL),
(23, 'File Manager', 13, '/core/file-manager/index', 6, NULL),
(25, 'Constraint', 5, '/core/constraint/index', 20, NULL),
(26, 'Playgraund', NULL, NULL, 35, NULL),
(27, 'Translate', 26, '/playground/default/index', 1, NULL),
(28, 'Ajaxq', 26, '/playground/default/ajaxq', 2, NULL),
(30, 'Plugins', 13, '/plugins/item/index', 5, NULL),
(31, 'Form', 26, '/playground/formplay/index', 5, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `mx_page`
--

CREATE TABLE IF NOT EXISTS `mx_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `author_id` int(11) DEFAULT NULL,
  `updater_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `mx_page`
--

INSERT INTO `mx_page` (`id`, `slug`, `name`, `text`, `status`, `author_id`, `updater_id`, `created_at`, `updated_at`) VALUES
(1, 'about', 'About', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 1, 1, 1, 1435506064, 1435506064),
(2, 'test', 'test', '<p>Demo for plugin Code Highlighting Hello, world!</p>\r\n\r\n<p>[code]</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp; /**<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp; * @var string шаблон<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp; */</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp; public $tpl = &quot;form&quot;;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp; /**<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp; * @var array параметры \\yii\\widgets\\ActiveForm по умолчанию<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp; */</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp; protected $defaultFormOptions = [&#39;enableAjaxValidation&#39; =&gt; true, &#39;enableClientValidation&#39; =&gt; false];</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp; /**<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp; * @var string идентификатор виджета<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp; */</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp; protected $id;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp; protected $_tplDir;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp; public function init()<br />\r\n&nbsp;&nbsp;&nbsp; {</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $model = $this-&gt;model;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $this-&gt;id = strtolower(self::FORM_ID_PREF . str_replace(&quot;\\\\&quot;, &quot;-&quot;, $model::className()));</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; BootstrapPluginAsset::register($this-&gt;view);</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp; }</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp; public function run()<br />\r\n&nbsp;&nbsp;&nbsp; {<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $formOptions = array_merge($this-&gt;defaultFormOptions, $this-&gt;formOptions);</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; return $this-&gt;render($this-&gt;tpl, [<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &quot;model&quot; =&gt; $this-&gt;model,<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &quot;formOptions&quot; =&gt; $formOptions,<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &quot;id&quot; =&gt; $this-&gt;id<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ]<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; );<br />\r\n&nbsp;&nbsp;&nbsp; }</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp; /**<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp; * @var array дирректории, где хранятся шаблоны<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp; */<br />\r\n&nbsp;&nbsp;&nbsp; public function getTplDir()<br />\r\n&nbsp;&nbsp;&nbsp; {<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; if ($this-&gt;_tplDir === null) {</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $widgetTpl = [$this-&gt;viewPath . DIRECTORY_SEPARATOR . &#39;tpl&#39; . DIRECTORY_SEPARATOR];</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; if (is_array($this-&gt;model-&gt;tplDir)) {<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; foreach ($this-&gt;model-&gt;tplDir as $dir) {<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $modelTpl[] = Yii::getAlias($dir);<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; }<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; } else {<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $modelTpl = [Yii::getAlias($this-&gt;model-&gt;tplDir)];<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; }</p>\r\n\r\n<p>/* $modelTpl = [Yii::$app-&gt;controller-&gt;module-&gt;basePath.DIRECTORY_SEPARATOR.&#39;views&#39;.DIRECTORY_SEPARATOR.Yii::$app-&gt;controller-&gt;id.DIRECTORY_SEPARATOR.&#39;tpl&#39;.DIRECTORY_SEPARATOR];<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; */<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $this-&gt;_tplDir = ArrayHelper::merge($modelTpl, $widgetTpl);<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; }</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; return $this-&gt;_tplDir;<br />\r\n&nbsp;&nbsp;&nbsp; }</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>[/code]</p>', 1, 2, 2, 1435571412, 1441463164);

-- --------------------------------------------------------

--
-- Структура таблицы `mx_pg__form`
--

CREATE TABLE IF NOT EXISTS `mx_pg__form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` smallint(6) NOT NULL DEFAULT '0',
  `author_id` int(11) DEFAULT NULL,
  `updater_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `root` int(11) NOT NULL DEFAULT '0',
  `lft` int(11) NOT NULL DEFAULT '0',
  `rgt` int(11) NOT NULL DEFAULT '0',
  `level` int(11) NOT NULL DEFAULT '0',
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `onmain` smallint(6) NOT NULL DEFAULT '0',
  `text1` text COLLATE utf8_unicode_ci,
  `text2` text COLLATE utf8_unicode_ci,
  `text3` text COLLATE utf8_unicode_ci,
  `text4` text COLLATE utf8_unicode_ci,
  `text5` text COLLATE utf8_unicode_ci,
  `text6` text COLLATE utf8_unicode_ci,
  `text7` text COLLATE utf8_unicode_ci,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Дамп данных таблицы `mx_pg__form`
--

INSERT INTO `mx_pg__form` (`id`, `status`, `author_id`, `updater_id`, `created_at`, `updated_at`, `root`, `lft`, `rgt`, `level`, `name`, `slug`, `icon`, `onmain`, `text1`, `text2`, `text3`, `text4`, `text5`, `text6`, `text7`, `title`, `keywords`, `description`) VALUES
(1, 1, 1, NULL, NULL, NULL, 1, 1, 56, 1, '', '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 1, 1, 1, 1439741885, 1440745436, 0, 2, 3, 2, 'Главная', '/site/index', 'dashboard', 1, '', '', '', NULL, NULL, '45.49789247792821,33.79692903007548', '<pre style="background-color:#ffffff;color:#000000;font-family:''Courier New'';font-size:9,0pt;">\r\n<span style="color:#000080;background-color:#f7faff;font-weight:bold;">&lt;?php\r\n</span>\r\n<span style="color:#000080;background-color:#f7faff;font-weight:bold;">namespace </span><span style="background-color:#f7faff;">lo\\modules\\playground\\models;\r\n</span>\r\n<span style="color:#000080;background-color:#f7faff;font-weight:bold;">use </span><span style="background-color:#f7faff;">lo\\core\\db\\</span><span style="background-color:#e4e4ff;">MetaFields</span><span style="background-color:#f7faff;">;\r\n</span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">use </span><span style="background-color:#f7faff;">Yii;\r\n</span>\r\n<span style="color:#808080;background-color:#f7faff;font-style:italic;">/**\r\n</span><span style="color:#808080;background-color:#f7faff;font-style:italic;"> * Class MenuMeta\r\n</span><span style="color:#808080;background-color:#f7faff;font-style:italic;"> * Мета описание модели меню\r\n</span><span style="color:#808080;background-color:#f7faff;font-style:italic;"> * </span><span style="color:#808080;background-color:#f7faff;font-weight:bold;font-style:italic;">@package </span><span style="color:#808080;background-color:#f7faff;font-style:italic;">lo\\modules\\core\\models\r\n</span><span style="color:#808080;background-color:#f7faff;font-style:italic;"> */\r\n</span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">class </span><span style="background-color:#f7faff;">FormplayMeta </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">extends </span><span style="background-color:#e4e4ff;">MetaFields</span>\r\n<span style="background-color:#f7faff;">{\r\n</span>\r\n<span style="background-color:#f7faff;">    </span><span style="color:#808080;background-color:#f7faff;font-style:italic;">/**\r\n</span><span style="color:#808080;background-color:#f7faff;font-style:italic;">     * </span><span style="color:#808080;background-color:#f7faff;font-weight:bold;font-style:italic;">@inheritdoc\r\n</span><span style="color:#808080;background-color:#f7faff;font-weight:bold;font-style:italic;">     </span><span style="color:#808080;background-color:#f7faff;font-style:italic;">*/\r\n</span><span style="color:#808080;background-color:#f7faff;font-style:italic;">    </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">const </span><span style="color:#660e7a;background-color:#f7faff;font-weight:bold;font-style:italic;">SEO_TAB </span><span style="background-color:#f7faff;">= </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;seo&quot;</span><span style="background-color:#f7faff;">;\r\n</span><span style="background-color:#f7faff;">    </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">const </span><span style="color:#660e7a;background-color:#f7faff;font-weight:bold;font-style:italic;">TEXT_TAB </span><span style="background-color:#f7faff;">= </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;text&quot;</span><span style="background-color:#f7faff;">;\r\n</span><span style="background-color:#f7faff;">    </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">const </span><span style="color:#660e7a;background-color:#f7faff;font-weight:bold;font-style:italic;">CONFIG_TAB </span><span style="background-color:#f7faff;">= </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;config&quot;</span><span style="background-color:#f7faff;">;\r\n</span>\r\n<span style="background-color:#f7faff;">    </span><span style="color:#808080;background-color:#f7faff;font-style:italic;">/**\r\n</span><span style="color:#808080;background-color:#f7faff;font-style:italic;">     * </span><span style="color:#808080;background-color:#f7faff;font-weight:bold;font-style:italic;">@inheritdoc\r\n</span><span style="color:#808080;background-color:#f7faff;font-weight:bold;font-style:italic;">     </span><span style="color:#808080;background-color:#f7faff;font-style:italic;">*/\r\n</span>\r\n<span style="color:#808080;background-color:#f7faff;font-style:italic;">    </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">public function </span><span style="background-color:#f7faff;">tabs()\r\n</span><span style="background-color:#f7faff;">    {\r\n</span><span style="background-color:#f7faff;">        </span><span style="color:#660000;background-color:#f7faff;">$tabs </span><span style="background-color:#f7faff;">= </span><span style="background-color:#e4e4ff;">parent</span><span style="background-color:#f7faff;">::</span><span style="background-color:#f7faff;font-style:italic;">tabs</span><span style="background-color:#f7faff;">();\r\n</span>\r\n<span style="background-color:#f7faff;">        </span><span style="color:#660000;background-color:#f7faff;">$tabs</span><span style="background-color:#f7faff;">[</span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">self</span><span style="background-color:#f7faff;">::</span><span style="color:#660e7a;background-color:#f7faff;font-weight:bold;font-style:italic;">SEO_TAB</span><span style="background-color:#f7faff;">] = Yii::</span><span style="background-color:#f7faff;font-style:italic;">t</span><span style="background-color:#f7faff;">(</span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;core&#39;</span><span style="background-color:#f7faff;">, </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;SEO&quot;</span><span style="background-color:#f7faff;">);\r\n</span><span style="background-color:#f7faff;">        </span><span style="color:#660000;background-color:#f7faff;">$tabs</span><span style="background-color:#f7faff;">[</span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">self</span><span style="background-color:#f7faff;">::</span><span style="color:#660e7a;background-color:#f7faff;font-weight:bold;font-style:italic;">TEXT_TAB</span><span style="background-color:#f7faff;">] = Yii::</span><span style="background-color:#f7faff;font-style:italic;">t</span><span style="background-color:#f7faff;">(</span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;core&#39;</span><span style="background-color:#f7faff;">, </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;Text&quot;</span><span style="background-color:#f7faff;">);\r\n</span><span style="background-color:#f7faff;">        </span><span style="color:#660000;background-color:#f7faff;">$tabs</span><span style="background-color:#f7faff;">[</span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">self</span><span style="background-color:#f7faff;">::</span><span style="color:#660e7a;background-color:#f7faff;font-weight:bold;font-style:italic;">CONFIG_TAB</span><span style="background-color:#f7faff;">] = Yii::</span><span style="background-color:#f7faff;font-style:italic;">t</span><span style="background-color:#f7faff;">(</span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;core&#39;</span><span style="background-color:#f7faff;">, </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;Config&quot;</span><span style="background-color:#f7faff;">);\r\n</span>\r\n<span style="background-color:#f7faff;">        </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">return </span><span style="color:#660000;background-color:#f7faff;">$tabs</span><span style="background-color:#f7faff;">;\r\n</span><span style="background-color:#f7faff;">    }\r\n</span>\r\n<span style="background-color:#f7faff;">    </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">protected function </span><span style="background-color:#f7faff;">config()\r\n</span><span style="background-color:#f7faff;">    {\r\n</span><span style="background-color:#f7faff;">        </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">return </span><span style="background-color:#f7faff;">[\r\n</span><span style="background-color:#f7faff;">            </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;parent_id&quot; </span><span style="background-color:#f7faff;">=&gt; [\r\n</span><span style="background-color:#f7faff;">                </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;definition&quot; </span><span style="background-color:#f7faff;">=&gt; [\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;class&quot; </span><span style="background-color:#f7faff;">=&gt; \\lo\\core\\db\\fields\\ParentListField::</span><span style="background-color:#f7faff;font-style:italic;">className</span><span style="background-color:#f7faff;">(),\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;title&quot; </span><span style="background-color:#f7faff;">=&gt; Yii::</span><span style="background-color:#f7faff;font-style:italic;">t</span><span style="background-color:#f7faff;">(</span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;main/app&#39;</span><span style="background-color:#f7faff;">, </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;Parent&#39;</span><span style="background-color:#f7faff;">),\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;data&quot; </span><span style="background-color:#f7faff;">=&gt; [</span><span style="color:#660000;background-color:#f7faff;">$this</span><span style="background-color:#f7faff;">-&gt;</span><span style="color:#660e7a;background-color:#f7faff;font-weight:bold;">owner</span><span style="background-color:#f7faff;">, </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;getListTreeData&#39;</span><span style="background-color:#f7faff;">],\r\n</span><span style="background-color:#f7faff;">                ],\r\n</span><span style="background-color:#f7faff;">                </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;params&quot; </span><span style="background-color:#f7faff;">=&gt; [</span><span style="color:#660000;background-color:#f7faff;">$this</span><span style="background-color:#f7faff;">-&gt;</span><span style="color:#660e7a;background-color:#f7faff;font-weight:bold;">owner</span><span style="background-color:#f7faff;">, </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;parent_id&quot;</span><span style="background-color:#f7faff;">]\r\n</span><span style="background-color:#f7faff;">            ],\r\n</span>\r\n<span style="background-color:#f7faff;">            </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;author_id&quot; </span><span style="background-color:#f7faff;">=&gt; [\r\n</span><span style="background-color:#f7faff;">                </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;definition&#39; </span><span style="background-color:#f7faff;">=&gt; [\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;showInGrid&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">false</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;showInForm&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">false</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                ],\r\n</span><span style="background-color:#f7faff;">            ],\r\n</span><span style="background-color:#f7faff;">            </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;created_at&quot; </span><span style="background-color:#f7faff;">=&gt; [\r\n</span><span style="background-color:#f7faff;">                </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;definition&#39; </span><span style="background-color:#f7faff;">=&gt; [\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;showInGrid&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">false</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;showInForm&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">false</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                 ]\r\n</span><span style="background-color:#f7faff;">            ],\r\n</span><span style="background-color:#f7faff;">            </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;name&quot; </span><span style="background-color:#f7faff;">=&gt; [\r\n</span><span style="background-color:#f7faff;">                </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;definition&quot; </span><span style="background-color:#f7faff;">=&gt; [\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;class&quot; </span><span style="background-color:#f7faff;">=&gt; \\lo\\core\\db\\fields\\TextField::</span><span style="background-color:#f7faff;font-style:italic;">className</span><span style="background-color:#f7faff;">(),\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;title&quot; </span><span style="background-color:#f7faff;">=&gt; Yii::</span><span style="background-color:#f7faff;font-style:italic;">t</span><span style="background-color:#f7faff;">(</span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;common&#39;</span><span style="background-color:#f7faff;">, </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;Name&#39;</span><span style="background-color:#f7faff;">),\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;showInGrid&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">true</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;showInFilter&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">true</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;isRequired&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">true</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;editInGrid&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">true</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                ],\r\n</span><span style="background-color:#f7faff;">                </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;params&quot; </span><span style="background-color:#f7faff;">=&gt; [</span><span style="color:#660000;background-color:#f7faff;">$this</span><span style="background-color:#f7faff;">-&gt;</span><span style="color:#660e7a;background-color:#f7faff;font-weight:bold;">owner</span><span style="background-color:#f7faff;">, </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;name&quot;</span><span style="background-color:#f7faff;">]\r\n</span><span style="background-color:#f7faff;">            ],\r\n</span><span style="background-color:#f7faff;">            </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;slug&quot; </span><span style="background-color:#f7faff;">=&gt; [\r\n</span><span style="background-color:#f7faff;">                </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;definition&quot; </span><span style="background-color:#f7faff;">=&gt; [\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;class&quot; </span><span style="background-color:#f7faff;">=&gt; \\lo\\core\\db\\fields\\TextField::</span><span style="background-color:#f7faff;font-style:italic;">className</span><span style="background-color:#f7faff;">(),\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;title&quot; </span><span style="background-color:#f7faff;">=&gt; Yii::</span><span style="background-color:#f7faff;font-style:italic;">t</span><span style="background-color:#f7faff;">(</span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;common&#39;</span><span style="background-color:#f7faff;">, </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;Slug&#39;</span><span style="background-color:#f7faff;">),\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;isRequired&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">true</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;showInGrid&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">true</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                ],\r\n</span><span style="background-color:#f7faff;">                </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;params&quot; </span><span style="background-color:#f7faff;">=&gt; [</span><span style="color:#660000;background-color:#f7faff;">$this</span><span style="background-color:#f7faff;">-&gt;</span><span style="color:#660e7a;background-color:#f7faff;font-weight:bold;">owner</span><span style="background-color:#f7faff;">, </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;slug&quot;</span><span style="background-color:#f7faff;">]\r\n</span><span style="background-color:#f7faff;">            ],\r\n</span><span style="background-color:#f7faff;">            </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;icon&quot; </span><span style="background-color:#f7faff;">=&gt; [\r\n</span><span style="background-color:#f7faff;">                </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;definition&quot; </span><span style="background-color:#f7faff;">=&gt; [\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;class&quot; </span><span style="background-color:#f7faff;">=&gt; \\lo\\core\\db\\fields\\TextField::</span><span style="background-color:#f7faff;font-style:italic;">className</span><span style="background-color:#f7faff;">(),\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;title&quot; </span><span style="background-color:#f7faff;">=&gt; Yii::</span><span style="background-color:#f7faff;font-style:italic;">t</span><span style="background-color:#f7faff;">(</span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;common&#39;</span><span style="background-color:#f7faff;">, </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;Icon&#39;</span><span style="background-color:#f7faff;">),\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;showInGrid&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">true</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;showInFilter&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">true</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;isRequired&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">false</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;editInGrid&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">true</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                ],\r\n</span><span style="background-color:#f7faff;">                </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;params&quot; </span><span style="background-color:#f7faff;">=&gt; [</span><span style="color:#660000;background-color:#f7faff;">$this</span><span style="background-color:#f7faff;">-&gt;</span><span style="color:#660e7a;background-color:#f7faff;font-weight:bold;">owner</span><span style="background-color:#f7faff;">, </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;icon&quot;</span><span style="background-color:#f7faff;">]\r\n</span><span style="background-color:#f7faff;">            ],\r\n</span>\r\n<span style="background-color:#f7faff;">            </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;onmain&quot; </span><span style="background-color:#f7faff;">=&gt; [\r\n</span><span style="background-color:#f7faff;">                </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;definition&quot; </span><span style="background-color:#f7faff;">=&gt; [\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;class&quot; </span><span style="background-color:#f7faff;">=&gt; \\lo\\core\\db\\fields\\CheckBoxField::</span><span style="background-color:#f7faff;font-style:italic;">className</span><span style="background-color:#f7faff;">(),\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;title&quot; </span><span style="background-color:#f7faff;">=&gt; Yii::</span><span style="background-color:#f7faff;font-style:italic;">t</span><span style="background-color:#f7faff;">(</span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;common&#39;</span><span style="background-color:#f7faff;">, </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;Onmain&#39;</span><span style="background-color:#f7faff;">),\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;showInGrid&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">true</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;showInFilter&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">true</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;isRequired&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">false</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;editInGrid&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">true</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                ],\r\n</span><span style="background-color:#f7faff;">                </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;params&quot; </span><span style="background-color:#f7faff;">=&gt; [</span><span style="color:#660000;background-color:#f7faff;">$this</span><span style="background-color:#f7faff;">-&gt;</span><span style="color:#660e7a;background-color:#f7faff;font-weight:bold;">owner</span><span style="background-color:#f7faff;">, </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;onmain&quot;</span><span style="background-color:#f7faff;">]\r\n</span><span style="background-color:#f7faff;">            ],\r\n</span>\r\n<span style="background-color:#f7faff;">            </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;title&quot; </span><span style="background-color:#f7faff;">=&gt; [\r\n</span><span style="background-color:#f7faff;">                </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;definition&quot; </span><span style="background-color:#f7faff;">=&gt; [\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;class&quot; </span><span style="background-color:#f7faff;">=&gt; \\lo\\core\\db\\fields\\TextField::</span><span style="background-color:#f7faff;font-style:italic;">className</span><span style="background-color:#f7faff;">(),\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;title&quot; </span><span style="background-color:#f7faff;">=&gt; Yii::</span><span style="background-color:#f7faff;font-style:italic;">t</span><span style="background-color:#f7faff;">(</span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;common&#39;</span><span style="background-color:#f7faff;">, </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;title&#39;</span><span style="background-color:#f7faff;">),\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;showInGrid&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">false</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;isRequired&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">false</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;tab&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">self</span><span style="background-color:#f7faff;">::</span><span style="color:#660e7a;background-color:#f7faff;font-weight:bold;font-style:italic;">SEO_TAB</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                ],\r\n</span><span style="background-color:#f7faff;">                </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;params&quot; </span><span style="background-color:#f7faff;">=&gt; [</span><span style="color:#660000;background-color:#f7faff;">$this</span><span style="background-color:#f7faff;">-&gt;</span><span style="color:#660e7a;background-color:#f7faff;font-weight:bold;">owner</span><span style="background-color:#f7faff;">, </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;title&quot;</span><span style="background-color:#f7faff;">]\r\n</span><span style="background-color:#f7faff;">            ],\r\n</span>\r\n<span style="background-color:#f7faff;">            </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;text1&quot; </span><span style="background-color:#f7faff;">=&gt; [\r\n</span><span style="background-color:#f7faff;">                </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;definition&quot; </span><span style="background-color:#f7faff;">=&gt; [\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;class&quot; </span><span style="background-color:#f7faff;">=&gt; \\lo\\core\\db\\fields\\TextField::</span><span style="background-color:#f7faff;font-style:italic;">className</span><span style="background-color:#f7faff;">(),\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;title&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;TextField&#39;</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;showInGrid&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">false</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;isRequired&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">false</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;tab&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">self</span><span style="background-color:#f7faff;">::</span><span style="color:#660e7a;background-color:#f7faff;font-weight:bold;font-style:italic;">TEXT_TAB</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                ],\r\n</span><span style="background-color:#f7faff;">                </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;params&quot; </span><span style="background-color:#f7faff;">=&gt; [</span><span style="color:#660000;background-color:#f7faff;">$this</span><span style="background-color:#f7faff;">-&gt;</span><span style="color:#660e7a;background-color:#f7faff;font-weight:bold;">owner</span><span style="background-color:#f7faff;">, </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;text1&quot;</span><span style="background-color:#f7faff;">]\r\n</span><span style="background-color:#f7faff;">            ],\r\n</span>\r\n<span style="background-color:#f7faff;">            </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;text2&quot; </span><span style="background-color:#f7faff;">=&gt; [\r\n</span><span style="background-color:#f7faff;">                </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;definition&quot; </span><span style="background-color:#f7faff;">=&gt; [\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;class&quot; </span><span style="background-color:#f7faff;">=&gt; \\lo\\core\\db\\fields\\TextAreaField::</span><span style="background-color:#f7faff;font-style:italic;">className</span><span style="background-color:#f7faff;">(),\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;title&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;TextAreaField&#39;</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;showInGrid&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">false</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;isRequired&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">false</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;tab&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">self</span><span style="background-color:#f7faff;">::</span><span style="color:#660e7a;background-color:#f7faff;font-weight:bold;font-style:italic;">TEXT_TAB</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                ],\r\n</span><span style="background-color:#f7faff;">                </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;params&quot; </span><span style="background-color:#f7faff;">=&gt; [</span><span style="color:#660000;background-color:#f7faff;">$this</span><span style="background-color:#f7faff;">-&gt;</span><span style="color:#660e7a;background-color:#f7faff;font-weight:bold;">owner</span><span style="background-color:#f7faff;">, </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;text2&quot;</span><span style="background-color:#f7faff;">]\r\n</span><span style="background-color:#f7faff;">            ],\r\n</span>\r\n<span style="background-color:#f7faff;">            </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;text3&quot; </span><span style="background-color:#f7faff;">=&gt; [\r\n</span><span style="background-color:#f7faff;">                </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;definition&quot; </span><span style="background-color:#f7faff;">=&gt; [\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;class&quot; </span><span style="background-color:#f7faff;">=&gt; \\lo\\core\\db\\fields\\HtmlField::</span><span style="background-color:#f7faff;font-style:italic;">className</span><span style="background-color:#f7faff;">(),\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;inputClass&quot; </span><span style="background-color:#f7faff;">=&gt;[\r\n</span><span style="background-color:#f7faff;">                        </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;class&#39;</span><span style="background-color:#f7faff;">=&gt;</span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;lo\\core\\inputs\\HtmlInput&#39;</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                        </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;fileManagerController&quot;</span><span style="background-color:#f7faff;">=&gt;[</span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;elfinder&#39;</span><span style="background-color:#f7faff;">, </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;path&#39; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;page&#39;</span><span style="background-color:#f7faff;">],\r\n</span><span style="background-color:#f7faff;">                    ],\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;title&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;HtmlField&#39;</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;showInGrid&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">false</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;isRequired&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">false</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;widgetOptions&quot;</span><span style="background-color:#f7faff;">=&gt;[\r\n</span><span style="background-color:#f7faff;">                        </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;editorOptions&#39;</span><span style="background-color:#f7faff;">=&gt;[\r\n</span><span style="background-color:#f7faff;">                            </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;preset&#39; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;basic&#39;</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                        ]\r\n</span><span style="background-color:#f7faff;">                    ],\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;tab&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">self</span><span style="background-color:#f7faff;">::</span><span style="color:#660e7a;background-color:#f7faff;font-weight:bold;font-style:italic;">TEXT_TAB</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                ],\r\n</span><span style="background-color:#f7faff;">                </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;params&quot; </span><span style="background-color:#f7faff;">=&gt; [</span><span style="color:#660000;background-color:#f7faff;">$this</span><span style="background-color:#f7faff;">-&gt;</span><span style="color:#660e7a;background-color:#f7faff;font-weight:bold;">owner</span><span style="background-color:#f7faff;">, </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;text3&quot;</span><span style="background-color:#f7faff;">]\r\n</span><span style="background-color:#f7faff;">            ],\r\n</span>\r\n\r\n\r\n\r\n<span style="background-color:#f7faff;">            </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;text7&quot; </span><span style="background-color:#f7faff;">=&gt; [\r\n</span><span style="background-color:#f7faff;">                </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;definition&quot; </span><span style="background-color:#f7faff;">=&gt; [\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;class&quot; </span><span style="background-color:#f7faff;">=&gt; \\lo\\core\\db\\fields\\HtmlField::</span><span style="background-color:#f7faff;font-style:italic;">className</span><span style="background-color:#f7faff;">(),\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;inputClass&quot; </span><span style="background-color:#f7faff;">=&gt;[\r\n</span><span style="background-color:#f7faff;">                        </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;class&#39;</span><span style="background-color:#f7faff;">=&gt;</span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;lo\\core\\inputs\\HtmlInput&#39;</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                        </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;fileManagerController&quot;</span><span style="background-color:#f7faff;">=&gt;[</span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;elfinder&#39;</span><span style="background-color:#f7faff;">, </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;path&#39; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;page&#39;</span><span style="background-color:#f7faff;">],\r\n</span><span style="background-color:#f7faff;">                    ],\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;title&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;HtmlField&#39;</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;showInGrid&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">false</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;isRequired&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">false</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;widgetOptions&quot;</span><span style="background-color:#f7faff;">=&gt;[\r\n</span><span style="background-color:#f7faff;">                        </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;editorOptions&#39;</span><span style="background-color:#f7faff;">=&gt;[\r\n</span><span style="background-color:#f7faff;">                            </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;preset&#39; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;standard&#39;</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                        ]\r\n</span><span style="background-color:#f7faff;">                    ],\r\n</span><span style="background-color:#f7faff;">                    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;tab&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">self</span><span style="background-color:#f7faff;">::</span><span style="color:#660e7a;background-color:#f7faff;font-weight:bold;font-style:italic;">CONFIG_TAB</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">                ],\r\n</span><span style="background-color:#f7faff;">                </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;params&quot; </span><span style="background-color:#f7faff;">=&gt; [</span><span style="color:#660000;background-color:#f7faff;">$this</span><span style="background-color:#f7faff;">-&gt;</span><span style="color:#660e7a;background-color:#f7faff;font-weight:bold;">owner</span><span style="background-color:#f7faff;">, </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;text7&quot;</span><span style="background-color:#f7faff;">]\r\n</span><span style="background-color:#f7faff;">            ],\r\n</span>\r\n<span style="background-color:#f7faff;">        ];\r\n</span><span style="background-color:#f7faff;">    }\r\n</span>\r\n<span style="background-color:#f7faff;">}</span></pre>', '', NULL, NULL),
(3, 1, 1, 1, 1439741928, 1439796545, 0, 6, 9, 2, 'Контент', '#', 'edit', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `mx_pg__form` (`id`, `status`, `author_id`, `updater_id`, `created_at`, `updated_at`, `root`, `lft`, `rgt`, `level`, `name`, `slug`, `icon`, `onmain`, `text1`, `text2`, `text3`, `text4`, `text5`, `text6`, `text7`, `title`, `keywords`, `description`) VALUES
(4, 1, 1, 1, 1439747244, 1440065310, 0, 4, 5, 2, 'Хроника', '/timeline-event/index', 'bar-chart-o', 0, '', '', '<pre style="background-color:#ffffff;color:#000000;font-family:''Courier New'';font-size:9,0pt;">\r\n<span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;text3&quot; </span><span style="background-color:#f7faff;">=&gt; [\r\n</span><span style="background-color:#f7faff;">    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;definition&quot; </span><span style="background-color:#f7faff;">=&gt; [\r\n</span><span style="background-color:#f7faff;">        </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;class&quot; </span><span style="background-color:#f7faff;">=&gt; \\lo\\core\\db\\fields\\HtmlField::</span><span style="background-color:#f7faff;font-style:italic;">className</span><span style="background-color:#f7faff;">(),\r\n</span><span style="background-color:#f7faff;">        </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;inputClass&quot; </span><span style="background-color:#f7faff;">=&gt;[\r\n</span><span style="background-color:#f7faff;">            </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;class&#39;</span><span style="background-color:#f7faff;">=&gt;</span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;lo\\core\\inputs\\HtmlInput&#39;</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">            </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;fileManagerController&quot;</span><span style="background-color:#f7faff;">=&gt;[</span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;elfinder&#39;</span><span style="background-color:#f7faff;">, </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;path&#39; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;page&#39;</span><span style="background-color:#f7faff;">],\r\n</span><span style="background-color:#f7faff;">        ],\r\n</span><span style="background-color:#f7faff;">        </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;title&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;HtmlField&#39;</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">        </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;showInGrid&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">false</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">        </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;isRequired&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">false</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">        </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;widgetOptions&quot;</span><span style="background-color:#f7faff;">=&gt;[\r\n</span><span style="background-color:#f7faff;">            </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;editorOptions&#39;</span><span style="background-color:#f7faff;">=&gt;[\r\n</span><span style="background-color:#f7faff;">                </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;preset&#39; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&#39;basic&#39;</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">            ]\r\n</span><span style="background-color:#f7faff;">        ],\r\n</span><span style="background-color:#f7faff;">        </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;tab&quot; </span><span style="background-color:#f7faff;">=&gt; </span><span style="color:#000080;background-color:#f7faff;font-weight:bold;">self</span><span style="background-color:#f7faff;">::</span><span style="color:#660e7a;background-color:#f7faff;font-weight:bold;font-style:italic;">TEXT_TAB</span><span style="background-color:#f7faff;">,\r\n</span><span style="background-color:#f7faff;">    ],\r\n</span><span style="background-color:#f7faff;">    </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;params&quot; </span><span style="background-color:#f7faff;">=&gt; [</span><span style="color:#660000;background-color:#f7faff;">$this</span><span style="background-color:#f7faff;">-&gt;</span><span style="color:#660e7a;background-color:#f7faff;font-weight:bold;">owner</span><span style="background-color:#f7faff;">, </span><span style="color:#008000;background-color:#f7faff;font-weight:bold;">&quot;text3&quot;</span><span style="background-color:#f7faff;">]\r\n</span><span style="background-color:#f7faff;">],</span></pre>', NULL, NULL, NULL, '', '', NULL, NULL),
(5, 1, 1, 1, 1439796044, 1439796044, 0, 7, 8, 3, 'Страницы', '/page/item/index', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 1, 1, 1, 1439796228, 1439796517, 0, 10, 25, 2, 'Пользователи', '#', 'users', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 1, 1, 1, 1439796269, 1439796269, 0, 11, 12, 3, 'Пользователи', '/user/admin/index', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 1, 1, 1, 1439796311, 1439796311, 0, 13, 14, 3, 'Назначение', '/admin/assignment/index', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 1, 1, 1, 1439796330, 1439796330, 0, 15, 16, 3, 'Роли', '/admin/role/index', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 1, 1, 1, 1439796355, 1439796355, 0, 17, 18, 3, 'Разрешения', '/admin/permission/index', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 1, 1, 1, 1439796386, 1439796386, 0, 19, 20, 3, 'Маршруты', '/admin/route/index', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 1, 1, 1, 1439796405, 1439796405, 0, 21, 22, 3, 'Правила', '/admin/rule/index', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 1, 1, 1, 1439796438, 1439796438, 0, 23, 24, 3, 'Ограничения', '/core/constraint/index', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 1, 1, 1, 1439796591, 1439796608, 0, 26, 47, 2, 'Система', '#', 'cogs', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 1, 1, 1, 1439796646, 1439796646, 0, 27, 32, 3, 'i18n', '#', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 1, 1, 1, 1439796693, 1439796693, 0, 28, 29, 4, 'Текст', '/i18n/i18n-source-message/index', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 1, 1, 1, 1439796725, 1439796725, 0, 30, 31, 4, 'Перевод', '/i18n/i18n-message/index', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 1, 1, 1, 1439798184, 1439798184, 0, 35, 36, 3, 'Ключ - Значение', '/core/key-storage/index', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 1, 1, 1, 1439798201, 1439798412, 0, 41, 42, 3, 'Кеш', '/core/cache/index', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 1, 1, 1, 1439798236, 1439798400, 0, 43, 44, 3, 'Информация о системе', '/core/system-information/index', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 1, 1, 1, 1439798274, 1439798274, 0, 39, 40, 3, 'Журнал', '/core/log/index', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 1, 1, 1, 1439798320, 1439798328, 0, 37, 38, 3, 'Менеджер файлов', '/core/file-manager/index', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 1, 1, 1, 1439798363, 1439798386, 0, 33, 34, 3, 'Плагины', '/plugins/item/index', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 1, 1, 1, 1439798452, 1439798452, 0, 48, 55, 2, 'Песочница', '#', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 1, 1, 1, 1439798486, 1439798486, 0, 49, 50, 3, 'Перевод', '/playground/index', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 1, 1, 1, 1439798514, 1439798514, 0, 51, 52, 3, 'AjaxQ', '/playground/ajaxq', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 1, 1, 1, 1439798547, 1439798547, 0, 53, 54, 3, 'Достопримечательности', '/sight/town/index', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 1, 1, 1, 1439798601, 1439798601, 0, 45, 46, 3, 'Меню', '/core/menu/index', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `mx_plugins__app`
--

CREATE TABLE IF NOT EXISTS `mx_plugins__app` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `mx_plugins__app`
--

INSERT INTO `mx_plugins__app` (`id`, `name`) VALUES
(1, 'frontend'),
(2, 'common'),
(3, 'backend');

-- --------------------------------------------------------

--
-- Структура таблицы `mx_plugins__event`
--

CREATE TABLE IF NOT EXISTS `mx_plugins__event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_id` int(11) NOT NULL DEFAULT '1',
  `plugin_id` int(11) NOT NULL,
  `trigger_class` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trigger_event` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `handler_method` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `pos` int(11) NOT NULL DEFAULT '0',
  `status` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_plugins_event_plugins_item` (`plugin_id`),
  KEY `fk_plugins_event_plugins_app` (`app_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Дамп данных таблицы `mx_plugins__event`
--

INSERT INTO `mx_plugins__event` (`id`, `app_id`, `plugin_id`, `trigger_class`, `trigger_event`, `handler_method`, `data`, `pos`, `status`) VALUES
(20, 1, 10, 'yii\\base\\View', 'afterRender', 'shortCode', '{"style":"monokai","lang":"php"}', 0, 1),
(21, 3, 11, 'yii\\web\\View', 'beginBody', 'foo', '{"term":"Hello, world!"}', 0, 0),
(24, 3, 13, 'yii\\base\\Application', 'beforeRequest', 'login', '{"allowedIps":["127.0.0.1","127.0.0.2"],"users":{"admin":"123456"}}', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `mx_plugins__item`
--

CREATE TABLE IF NOT EXISTS `mx_plugins__item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `handler_class` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `version` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8_unicode_ci,
  `author` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Дамп данных таблицы `mx_plugins__item`
--

INSERT INTO `mx_plugins__item` (`id`, `handler_class`, `name`, `url`, `version`, `text`, `author`, `author_url`, `status`) VALUES
(10, 'lo\\plugins\\plugins\\code\\Code', 'Code Highlighting', 'https://github.com/loveorigami/yii2-plugins-system', '1.2', 'A shortcode for code highlighting in view. Use as [code lang="php"]...content...[/code]', 'Andrey Lukyanov', 'https://github.com/loveorigami', 1),
(11, 'common\\plugins\\test\\Test', 'Test plugin', '', '1.0', 'Small test plugin', 'Andrey Lukyanov', 'https://github.com/loveorigami', 1),
(13, 'lo\\plugins\\plugins\\httpauth\\Httpauth', 'Http Authentication', 'https://github.com/loveorigami/yii2-plugins-system/tree/master/plugins/httpauth', '1.0', 'Authentication for backend', 'Andrey Lukyanov', 'https://github.com/loveorigami', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `mx_profile`
--

CREATE TABLE IF NOT EXISTS `mx_profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `public_email` varchar(255) DEFAULT NULL,
  `gravatar_email` varchar(255) DEFAULT NULL,
  `gravatar_id` varchar(32) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `bio` text,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `mx_profile`
--

INSERT INTO `mx_profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`) VALUES
(1, '', '', 'loveorigami@mail.ru', '1c9a671351dcd2ca8862c2505e1ca9f3', '', '', ''),
(2, NULL, NULL, 'loveorigami@mail.ru', '1c9a671351dcd2ca8862c2505e1ca9f3', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `mx_setting`
--

CREATE TABLE IF NOT EXISTS `mx_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `code` varchar(32) NOT NULL,
  `type` varchar(32) NOT NULL,
  `store_range` varchar(255) DEFAULT NULL,
  `store_dir` varchar(255) DEFAULT NULL,
  `value` text,
  `sort_order` int(11) NOT NULL DEFAULT '50',
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`),
  KEY `code` (`code`),
  KEY `sort_order` (`sort_order`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3116 ;

--
-- Дамп данных таблицы `mx_setting`
--

INSERT INTO `mx_setting` (`id`, `parent_id`, `code`, `type`, `store_range`, `store_dir`, `value`, `sort_order`) VALUES
(11, 0, 'info', 'group', '', '', '', 50),
(21, 0, 'basic', 'group', '', '', '', 50),
(31, 0, 'smtp', 'group', '', '', '', 50),
(1111, 11, 'siteName', 'text', '', '', 'Your Site', 50),
(1112, 11, 'siteTitle', 'text', '', '', 'Your Site Title', 50),
(1113, 11, 'siteKeyword', 'text', '', '', 'Your Site Keyword', 50),
(2111, 21, 'timezone', 'select', '-12,-11,-10,-9,-8,-7,-6,-5,-4,-3.5,-3,-2,-1,0,1,2,3,3.5,4,4.5,5,5.5,5.75,6,6.5,7,8,9,9.5,10,11,12', '', '8', 50),
(2112, 21, 'commentCheck', 'select', '0,1', '', '0', 50),
(3111, 31, 'smtpHost', 'text', '', '', 'localhost', 50),
(3112, 31, 'smtpPort', 'text', '', '', '', 50),
(3113, 31, 'smtpUser', 'text', '', '', '', 50),
(3114, 31, 'smtpPassword', 'password', '', '', '', 50),
(3115, 31, 'smtpMail', 'text', '', '', '', 50);

-- --------------------------------------------------------

--
-- Структура таблицы `mx_social_account`
--

CREATE TABLE IF NOT EXISTS `mx_social_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `data` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_unique` (`provider`,`client_id`),
  KEY `fk_user_account` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `mx_social_account`
--

INSERT INTO `mx_social_account` (`id`, `user_id`, `provider`, `client_id`, `data`) VALUES
(1, 2, 'twitter', '163799366', '{"id":163799366,"id_str":"163799366","name":"Andrey Lukyanov","screen_name":"loveorigami","location":"Ukrane, Simferopol","description":"Love Origami master","url":"http:\\/\\/t.co\\/jiO3x0uURW","entities":{"url":{"urls":[{"url":"http:\\/\\/t.co\\/jiO3x0uURW","expanded_url":"http:\\/\\/www.loveorigami.info","display_url":"loveorigami.info","indices":[0,22]}]},"description":{"urls":[]}},"protected":false,"followers_count":14,"friends_count":11,"listed_count":3,"created_at":"Wed Jul 07 09:03:15 +0000 2010","favourites_count":1,"utc_offset":10800,"time_zone":"Kyiv","geo_enabled":false,"verified":false,"statuses_count":149,"lang":"ru","status":{"created_at":"Sat Jan 03 20:29:02 +0000 2015","id":5.5147534531285e+17,"id_str":"551475345312845824","text":"Origami Instructions: Number Zero (Andrey Lukyanov): http:\\/\\/t.co\\/0ba06jYFay \\u0441 \\u043f\\u043e\\u043c\\u043e\\u0449\\u044c\\u044e @YouTube","source":"<a href=\\"https:\\/\\/dev.twitter.com\\/docs\\/tfw\\" rel=\\"nofollow\\">Twitter for Websites<\\/a>","truncated":false,"in_reply_to_status_id":null,"in_reply_to_status_id_str":null,"in_reply_to_user_id":null,"in_reply_to_user_id_str":null,"in_reply_to_screen_name":null,"geo":null,"coordinates":null,"place":null,"contributors":null,"retweet_count":0,"favorite_count":0,"entities":{"hashtags":[],"symbols":[],"user_mentions":[{"screen_name":"YouTube","name":"YouTube","id":10228272,"id_str":"10228272","indices":[86,94]}],"urls":[{"url":"http:\\/\\/t.co\\/0ba06jYFay","expanded_url":"http:\\/\\/youtu.be\\/XBscAxmgEGI","display_url":"youtu.be\\/XBscAxmgEGI","indices":[53,75]}]},"favorited":false,"retweeted":false,"possibly_sensitive":false,"lang":"sk"},"contributors_enabled":false,"is_translator":false,"is_translation_enabled":false,"profile_background_color":"0099B9","profile_background_image_url":"http:\\/\\/abs.twimg.com\\/images\\/themes\\/theme4\\/bg.gif","profile_background_image_url_https":"https:\\/\\/abs.twimg.com\\/images\\/themes\\/theme4\\/bg.gif","profile_background_tile":false,"profile_image_url":"http:\\/\\/pbs.twimg.com\\/profile_images\\/1142923479\\/2_normal.jpg","profile_image_url_https":"https:\\/\\/pbs.twimg.com\\/profile_images\\/1142923479\\/2_normal.jpg","profile_link_color":"0099B9","profile_sidebar_border_color":"5ED4DC","profile_sidebar_fill_color":"95E8EC","profile_text_color":"3C3940","profile_use_background_image":true,"default_profile":false,"default_profile_image":false,"following":false,"follow_request_sent":false,"notifications":false}');

-- --------------------------------------------------------

--
-- Структура таблицы `mx_system_log`
--

CREATE TABLE IF NOT EXISTS `mx_system_log` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `level` int(11) DEFAULT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `log_time` double DEFAULT NULL,
  `prefix` text COLLATE utf8_unicode_ci,
  `message` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `idx_log_level` (`level`),
  KEY `idx_log_category` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Структура таблицы `mx_system_migration`
--

CREATE TABLE IF NOT EXISTS `mx_system_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `mx_system_migration`
--

INSERT INTO `mx_system_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1435405914),
('m140925_113152_create_pg_form_table', 1439732360),
('m150620_091027_init_dump', 1435406062),
('m150703_123104_page', 1435506064),
('m150720_090901_plugin_table', 1438513601),
('m150720_090905_app_table', 1438513601),
('m150720_091726_event_table', 1438513602),
('m150727_182017_create_constraint_table', 1435475636),
('m150820_085500_pg_form_add_text', 1440061879);

-- --------------------------------------------------------

--
-- Структура таблицы `mx_timeline_event`
--

CREATE TABLE IF NOT EXISTS `mx_timeline_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `event` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_created_at` (`created_at`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `mx_timeline_event`
--

INSERT INTO `mx_timeline_event` (`id`, `application`, `category`, `event`, `data`, `created_at`) VALUES
(1, 'frontend', 'user', 'signup', '{"publicIdentity":"webmaster","userId":1,"created_at":1433669718}', 1433669718),
(2, 'frontend', 'user', 'signup', '{"publicIdentity":"manager","userId":2,"created_at":1433669718}', 1433669718),
(3, 'frontend', 'user', 'signup', '{"publicIdentity":"user","userId":3,"created_at":1433669718}', 1433669718);

-- --------------------------------------------------------

--
-- Структура таблицы `mx_token`
--

CREATE TABLE IF NOT EXISTS `mx_token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL,
  UNIQUE KEY `token_unique` (`user_id`,`code`,`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `mx_user`
--

CREATE TABLE IF NOT EXISTS `mx_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(60) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_unique_username` (`username`),
  UNIQUE KEY `user_unique_email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `mx_user`
--

INSERT INTO `mx_user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`) VALUES
(1, 'root', 'lo@mail.ru', '$2y$12$XtDReYvhTKtQMbeWBj6jE.I1jrDop.FeJ7zsLDkThPexujwQFL3E2', 'Qn1cqR_Dkks07_v5z1Cl2PyxYu0VGB-C', 1433094350, NULL, NULL, '127.0.0.1', 1433094159, 1441461637, 0),
(2, 'author', 'love@mail.ru', '$2y$12$ddMPyBl1vjx5UA13iXyQwOzJEKYHGDdyNW4CgaKkeM/Kle9SlUsDa', 'E0ZYDHiw6aAc5Z2q4uKqhgxUbYAsDUAc', 1433154777, NULL, NULL, '127.0.0.1', 1433154778, 1441462952, 0);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `mx_auth_assignment`
--
ALTER TABLE `mx_auth_assignment`
  ADD CONSTRAINT `mx_auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `mx_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `mx_auth_item`
--
ALTER TABLE `mx_auth_item`
  ADD CONSTRAINT `mx_auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `mx_auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `mx_auth_item_child`
--
ALTER TABLE `mx_auth_item_child`
  ADD CONSTRAINT `mx_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `mx_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mx_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `mx_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `mx_menu`
--
ALTER TABLE `mx_menu`
  ADD CONSTRAINT `mx_menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `mx_menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `mx_plugins__event`
--
ALTER TABLE `mx_plugins__event`
  ADD CONSTRAINT `fk_plugins_event_plugins_app` FOREIGN KEY (`app_id`) REFERENCES `mx_plugins__app` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_plugins_event_plugins_item` FOREIGN KEY (`plugin_id`) REFERENCES `mx_plugins__item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `mx_profile`
--
ALTER TABLE `mx_profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `mx_user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `mx_social_account`
--
ALTER TABLE `mx_social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `mx_user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `mx_token`
--
ALTER TABLE `mx_token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `mx_user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
