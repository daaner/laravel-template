<?php

namespace App\Admin\Sections;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Initializable;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;

use App\Role;
use Auth;

//use SleepingOwl\Admin\Form\Buttons\Save;
use SleepingOwl\Admin\Form\Buttons\SaveAndClose;
use SleepingOwl\Admin\Form\Buttons\Cancel;


class Users extends Section implements Initializable
{
  public function initialize() {
  }

  protected $checkAccess = true;
  protected $alias = 'users';

  public function getIcon() {
    return 'fa fa-user';
  }
  public function getTitle() {
    return 'Пользователи';
  }
  public function getEditTitle() {
    return 'Редактирование пользователя';
  }
  public function getCreateTitle() {
    return 'Добавление пользователя';
  }


  public function onDisplay() {

    $display = AdminDisplay::datatables()
      ->setHtmlAttribute('class', 'table-primary table-hover')
      ->setDisplaySearch(true);

    $display->setColumns([
      AdminColumn::text('id', '#')
        ->setWidth('50px')
        ->setHtmlAttribute('class', 'text-center'),
      AdminColumn::gravatar('email', 'Ava'),
      AdminColumn::link('email', 'Email'),
      AdminColumn::text('name', 'Имя'),
      AdminColumn::text('roles.name', 'Права')
        ->setWidth('150px')
        ->setOrderable(false)
        ->setSearchCallback(function($column, $query, $search){
          return $query->orWhereHas('roles', function ($q) use ($search) {
            $q->where('name', 'like', '%'.$search.'%');
          });
        }),
      AdminColumn::boolean('active', 'Вход'),
      AdminColumn::text('created_at', 'Создан')
        ->setWidth('160px')
        ->setSearchable(false),
    ]);

    return $display;
  }


  public function onEdit($id) {
    $form = AdminForm::panel()->addBody([
      AdminFormElement::columns()->addColumn([
        AdminFormElement::text('name', 'Имя')
          ->addValidationRule('max:190', __('adm.valid.max190'))
          ->required(),
        AdminFormElement::text('email', 'Почта')
          ->required()
          ->unique()
          ->addValidationRule('max:190', __('adm.valid.max190')),
        AdminFormElement::select('role_id', 'Права', Role::class)
          ->setDisplay('name')
          ->required()
          ->setSortable(false),
        AdminFormElement::select('lang', 'Язык сайта', config('app.locales'))
          ->required()
          ->setSortable(false),
        AdminFormElement::password('newpassword', 'Пароль (не заполнить - не сменится)')
          ->allowEmptyValue()
          ->addValidationRule('nullable')
          ->addValidationRule('between:8,50', 'От 8 до 50 символов'),
      ], 8)->addColumn([
        AdminFormElement::text('id', '#')
          ->setReadonly(1),
        AdminFormElement::checkbox('blocked', 'Блокировать пользователя'),
        AdminFormElement::html('<hr>'),
        AdminFormElement::text('created_at', 'Создан')
          ->setReadonly(1),
        AdminFormElement::text('signup_ip', 'IP регистрации')
          ->setReadonly(1),
        AdminFormElement::text('confirm_ip', 'IP активации почты')
          ->setReadonly(1),

      ]),
      AdminFormElement::html('<hr>'),
      AdminFormElement::checkbox('active', 'Включен'),
    ]);

    $form->getButtons()->setButtons([
      // 'save'  => new Save(),
      'save_and_close'  => new SaveAndClose(),
      'cancel'  => (new Cancel()),
    ]);

    return $form;
  }

  public function onCreate() {
    return $this->onEdit(null);
  }
  public function onDelete($id) {}

}
