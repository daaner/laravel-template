<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\LocaleRepository;

class LocaleController extends Controller
{

  public function assets_ru() {
    $set_data = new LocaleRepository;
    $strings = $set_data->getCacheLng('ru');

    return response($strings)->header('Content-Type', 'text/javascript');
  }


  public function assets_en() {
    $set_data = new LocaleRepository;
    $strings = $set_data->getCacheLng('en');

    return response($strings)->header('Content-Type', 'text/javascript');
  }
}
