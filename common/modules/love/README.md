# Getting started with Lo-module-love

### 1. Установка

```bash
  "repositories": [
    {
      "type": "vcs",
      "url": "http://loveorigami@bitbucket.org/loveorigami/lo-module-love.git"
    }
  ],
  "minimum-stability": "dev",
  "require": {
       "loveorigami/lo-module-love": "*"
  }
```

### 2. Update database schema

```bash
$ php yii migrate/up --migrationPath=@vendor/loveorigami/lo-module-love/migrations
```

### 3. Create database schema
```bash
$ php yii migrate/create --migrationPath=@vendor/loveorigami/lo-module-love/migrations "love_author"

```