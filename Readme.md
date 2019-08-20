# Удобный шаблон для Laravel (laravel-template)

[![StyleCI](https://styleci.io/repos/167434921/shield?branch=master)](https://styleci.io/repos/167434921)


## .env
Требуется добавить 2 параметра (закинуто в конфиг)
`GOOGLE_ANALYTIC` и `YANDEX_METRIC`

## Info

- Использую как скелет в новых проектах. Сокращает время на построение структуры и основных моментов
- Не используется фронтальный фреймворк (типа Bootstrap)
- Не все переводы локализации на EN
- Добавлен CDN jquery + локальная замена ему (отключен комментарием)
- Добавлена локализация в Vue (можно использовать `{{ __('api.db_data') }}` или `{{ trans('api.db_data') }}`), но не работает нормально множественность
- Добавлена возможность выключать сайт на обслуживание
- Добавлена возможность выключать сайт для незарегистрированных пользователей
- Добавлена возможность выключать возможность регистрации
- Добавлена модульная структура со своими провайдерами, подключением админки, локализацией и прочим.
  * для добавления модуля нужно сдублировать папку модуля
  * в конфиге добавить имя папки в массив `config\module.php`
  * поменять главный роут модуля
  * [front] добавить SASS для билда `@import '../../Modules/Blog/resources/sass/app.scss';`
  * [front] добавить JS для билда `require('../../Modules/Blog/resources/js/module.js')`
  * добавить сидер `$this->call(Modules\Blog\database\seeds\BlogCategorySeeder::class);`
  * локализация модулей в фреймворке `{{ __('Module::file.key') }}`
  * локализация модулей в Vue остается прежней `{{ __('file.key') }}` (внимательно относится к именованию файлов, чтоб не переименовать ключи)

- Добавлено и закомментировано (нужно подтянуть модуль yarn или npm)
  * VueTheMask -- `npm i vue-the-mask --save`
  * vue-moment -- `npm i vue-moment --save`
  * Element.io -- `npm i element-ui --save`
  * popper -- `npm i popper --save`
  * jquery -- `npm i jquery --save`

- Подключено и используется
  * Vue -- `npm i vue --save`
  * VueAxios -- `npm i vue-axios --save`
  * VueX и store -- `npm i vuex --save`
  * cookies -- `npm i js-cookie --save`
  * Bearer token
  * lodash -- `npm i lodash --save`


## Blade секции для разных нужд
- `@section('title', 'Заголовок страницы')`
- `@section('description', 'Описание')`
- `@section('canonical', 'каноническая ссылка')`
- `@section('body_class', 'клас для body')`
- `@section('content_class', 'класс главного контента')`
- `@section('footer_class', 'класс футера')`
- `@section('og_image', 'ОГ изображение')`
- `@section('og_image_alt', 'Альт ОГ изображения')`

```
@section('style')
  добавление стилей
@endsection

@section('script')
  добавление скриптов
@endsection

дополнительная разметка ld-json (можно использовать для других скриптов и стилей)
@section('ldjson')
  <script type="application/ld+json">
    {
      "@context": "http://schema.org2",
      "@type": "WebSite2",
    }
  </script>
@endsection
```

## Пакеты NPM
- Noty (https://github.com/needim/noty)
- Vue-js-modal (https://github.com/euvl/vue-js-modal)


## Пакеты Composer
- SleepingOwl (https://github.com/LaravelRUS/SleepingOwlAdmin)
- Laravel IDE Helper (https://github.com/barryvdh/laravel-ide-helper)
- Agent (https://github.com/jenssegers/agent)
- Laravel Backup (https://github.com/spatie/laravel-backup)


Возникнут вопросы или предложения - пишите мне в телеграмм `@neodaan`

ПР приветствуется)
