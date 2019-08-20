<?php

/**
 * @var KodiCMS\Assets\Contracts\MetaInterface
 * @var KodiCMS\Assets\Contracts\PackageManagerInterface $packages
 *
 * @see http://sleepingowladmin.ru/docs/assets
 */
Meta::setFavicon(asset('favicon.ico'));
Meta::addCss('extended', (mix('css/admin_so.css')), ['admin-default']);
