# Удобный шаблон для Laravel (laravel-template)

## .env
Требуется добавить 2 параметра (закинуто в конфиг)
`GOOGLE_ANALYTIC` и `YANDEX_METRIC`

## Info

- Использую как скелет в новых проектах. Сокращает время на построение структуры и основных моментов
- Не используется фронтальный фреймворк (типа Bootstrap)
- Не все переводы локализации на EN
- Добавлен CDN jquery + локальная замена ему

- Добавлено и закомментировано (нужно подтянуть модуль yarn или npm)
  * Vue -- `npm i vue --save`
  * VueX и store -- `npm i vuex --save`
  * VueAxios -- `npm i vue-axios --save`
  * VueTheMask -- `npm i vue-the-mask --save`
  * cookies -- `npm i js-cookie --save`
  * vue-moment -- `npm i vue-moment --save`
  * Bearer token
  * Element.io -- `npm i element-ui --save`
  * popper -- `npm i popper --save`
  * lodash -- `npm i lodash --save`
  * jquery -- `npm i jquery --save`

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

дополнительная разметка ld-json (только данные массивом через запятую)
@section('ldjson')
  "@context": "http://schema.org2",
  "@type": "WebSite2",
@endsection
```

Возникнут вопросы или предложения - пишите мне в телеграмм `@neodaan`

ПР приветствуется)
