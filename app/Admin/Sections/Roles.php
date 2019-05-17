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
    $this->addToNavigation()
      ->setAccessLogic(function() {
        // return auth()->user()->isAdmin();
        if(Auth::check() && auth()->user()->isAdmin()) {
          return true;
        }
      })
      ->setPriority(1000);
  }

  protected $checkAccess = true;
  protected $alias = 'roles';

  public function getIcon() {
    return 'fa fa-group';
  }
  public function getTitle() {
    return 'Роли';
  }
  public function getEditTitle() {
    return 'Редактирование роли';
  }


  public function onDisplay() {

    $display = AdminDisplay::datatables()->setHtmlAttribute('class', 'table-danger table-hover')->setDisplaySearch(true);

    $display->setColumns([
      AdminColumn::text('id', '#')->setWidth('30px'),
      AdminColumn::link('name', 'Название')->setWidth('150px'),
      AdminColumn::text('description', 'Описание'),
    ]);

    return $display;
  }


  public function onEdit($id) {
    $form = AdminForm::panel()->addBody([
      AdminFormElement::text('id', '#')->setReadonly(1),
      AdminFormElement::text('name', 'Название')->required(),
      AdminFormElement::textarea('description', 'Описание')->setRows(3)
        ->addValidationRule('max:255', 'Не более 250 символов'),
    ]);

    $form->getButtons()->setButtons([
      // 'save'  => new Save(),
      'save_and_close'  => new SaveAndClose(),
      'cancel'  => (new Cancel()),
    ]);

    return $form;
  }

}
