# Yii 2 LoveOrigami

## Установка
* Клонируем репозиторий карскаса
```
git clone https://loveorigami@bitbucket.org/loveorigami/lo.yii.git example.com
```
* скопировать содержимое папки  `environments` в корень приложения.
* обновить зависимости
```
composer up
```
* Скопировать и переименовать файл `.env.dist` в `.env`.
* Внести необходимые изменения в `.env` файл
- Установить текущее окружение
```
YII_DEBUG   = true
YII_ENV     = dev
```
- Подключение к базе данных
```
DB_DSN           = mysql:host=127.0.0.1;port=3306;dbname=yii2-lo
DB_USERNAME      = root
DB_PASSWORD      =
DB_TABLE_PREFIX  = mx_
```
- Сконфигурировать URL приложения
```
FRONTEND_URL    = http://site.lo
BACKEND_URL     = http://admin.lo
STORAGE_DIR     = uploads
STORAGE_URL     = http://site.lo/${STORAGE_DIR}
```

* Выполнить в консоли команду `yii app/setup`

## Настройка приложения
* В `@backend\config\params-local.php` содержится массив подключаемых модулей.
```
'enabledModules' => [
    [
        'path' =>'@vendor/loveorigami/lo-module-{module}/modules/admin/config/main.php',
        'modules'=>['playground', 'core', 'page']
    ]
],
```

оставить в перечне те, которые содержатся в composer.json
```
 "repositories": [
    {
      "type": "vcs",
      "url": "https://loveorigami@bitbucket.org/loveorigami/lo-core-cms.git"
    },
    {
      "type": "vcs",
      "url": "https://loveorigami@bitbucket.org/loveorigami/lo-module-core.git"
    },
......
  ],
  "minimum-stability": "dev",
  "require": {
    "php": ">=5.4.0",
    "yiisoft/yii2": ">=2.0.6",

    "loveorigami/lo-core-cms": "*",
    "loveorigami/lo-module-core": "*",
......
  },
```  

## Вход в админку
* По адресу, настроеному в `.env`, заходим в админку.
* Пользователи
```
login: root
password: root

login: author
password: author
```

* К каждому пользователю привязаны соответствующие роли
    - Роль `root` - без ограничений
    - Роль `author` - доступ к своим записям в модуле page.