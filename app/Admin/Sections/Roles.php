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


class Roles extends Section implements Initializable
{
  public function initialize() {

  }

  protected $checkAccess = true;
  protected $alias = 'roles';

  public function getIcon() {
    return 'fas fa-user-shield';
  }
  public function getTitle() {
    return 'Роли';
  }
  public function getEditTitle() {
    return 'Редактирование роли';
  }


  public function onDisplay() {

    $display = AdminDisplay::table()
      ->setHtmlAttribute('class', 'table-danger table-hover');

    $display->setColumns([
      AdminColumn::text('id', '#')
        ->setWidth('50px')
        ->setHtmlAttribute('class', 'text-center'),
      AdminColumn::link('name', 'Название')
        ->setWidth('150px'),
      AdminColumn::text('description', 'Описание'),
    ]);

    return $display;
  }


  public function onEdit($id) {
    $form = AdminForm::panel()->addBody([
      AdminFormElement::text('id', '#')
        ->setReadonly(1),
      AdminFormElement::text('name', 'Название')
        ->required()
        ->addValidationRule('max:190', __('adm.valid.max190')),
      AdminFormElement::textarea('description', 'Описание')
        ->setRows(3)
        ->addValidationRule('max:190', __('adm.valid.max190')),
    ]);

    $form->getButtons()->setButtons([
      // 'save'  => new Save(),
      'save_and_close'  => new SaveAndClose(),
      'cancel'  => (new Cancel()),
    ]);

    return $form;
  }

}
