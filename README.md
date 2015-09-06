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

## Настройка приложения
* Скопировать и переименовать файл `.env.dist` в .`.env` и выполнить необходимую настройку. Префикс таблиц оставить `mx_`
Обязятельно сгенерировать cookie keys
```
FRONTEND_COOKIE_VALIDATION_KEY = you cookie
BACKEND_COOKIE_VALIDATION_KEY = you cookie
```

* в `@backend\config\params-local.php` содержится массив подключаемых модулей.

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

* выполнить миграцию `yii migrate up`, с которой загрузится дамп БД.
* по адресу, настроеному в `.env`, заходим в админку.

```
login: root
password: root

или

login: author
password: author
```
* Роль `root` - без ограничений
* Роль `author` - доступ к своим записям в модуле page.