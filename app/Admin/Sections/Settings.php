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

use Auth;

//use SleepingOwl\Admin\Form\Buttons\Save;
use SleepingOwl\Admin\Form\Buttons\SaveAndClose;
use SleepingOwl\Admin\Form\Buttons\Cancel;


class Settings extends Section implements Initializable
{
  public function initialize() {
  }

  protected $checkAccess = true;
  protected $alias = 'settings';

  public function getIcon() {
    return 'fas fa-cog';
  }
  public function getTitle() {
    return 'Настройки';
  }
  public function getEditTitle() {
    return 'Редактирование настройки сайта';
  }


  public function onDisplay() {

    $display = AdminDisplay::table()
      ->setHtmlAttribute('class', 'table-danger table-hover');

    $display->setColumns([
      // AdminColumn::text('id', '#')
      //   ->setWidth('50px'),
      AdminColumn::link('name', 'Настройка')
        ->setWidth('150px'),
      AdminColumn::boolean('value', 'Состояние')
        ->setWidth('130px')
        ->setOrderable(true),
      AdminColumn::text('description', 'Описание'),
      AdminColumn::text('updated_at', 'Изменен', 'editors.name')
        ->setWidth('160px')
        ->setSearchable(false)
        ->setOrderable(true),
    ]);

    return $display;
  }


  public function onEdit($id) {
    $form = AdminForm::panel()->addBody([
      AdminFormElement::columns()->addColumn([
        AdminFormElement::text('name', 'Название')
          ->setReadonly(1)
          ->required(),
        AdminFormElement::textarea('description', 'Описание')
          ->setRows(3)
          ->addValidationRule('max:190', __('adm.valid.max190')),
        AdminFormElement::html('<hr>'),
        AdminFormElement::checkbox('value', 'Состояние настройки'),
      ], 8)->addColumn([
        AdminFormElement::text('creators.name', 'Создал')
          ->setReadonly(1),
        AdminFormElement::text('updated_at', 'Создано')
          ->setReadonly(1),
        AdminFormElement::html('<hr>'),
        AdminFormElement::text('editors.name', 'Редактировал')
          ->setReadonly(1),
        AdminFormElement::text('updated_at', 'Редакция')
          ->setReadonly(1),
      ]),
    ]);

    $form->getButtons()->setButtons([
      // 'save'  => new Save(),
      'save_and_close'  => new SaveAndClose(),
      'cancel'  => (new Cancel()),
    ]);

    return $form;
  }

}
