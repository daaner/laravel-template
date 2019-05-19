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


class Scripts extends Section implements Initializable
{
  public function initialize() {
    $this->addToNavigation()
      ->setAccessLogic(function() {
        if(Auth::check() && auth()->user()->isAdmin()) {
          return true;
        }
      })
      ->setPriority(900);
  }

  protected $checkAccess = true;
  protected $alias = 'scripts';

  public function getIcon() {
    return 'fa fa-file-code-o';
  }
  public function getTitle() {
    return 'Виджеты';
  }
  public function getEditTitle() {
    return 'Редактирование виджета (скрипта)';
  }
  public function getCreateTitle() {
      return 'Создание нового виджета (скрипта)';
  }


  public function onDisplay() {

    $display = AdminDisplay::datatables()->setHtmlAttribute('class', 'table-success table-hover')->setDisplaySearch(true);

    $display->setColumns([
      AdminColumn::text('id', '#')->setWidth('30px'),
      AdminColumn::link('name', 'Название'),
      AdminColumn::boolean('active', 'Вход')->setWidth('80px')
        ->setSearchable(false)->setOrderable(false),
      AdminColumn::boolean('top', 'Header')->setWidth('110px')
        ->setSearchable(false)->setOrderable(false),
      AdminColumn::text('updated_at', 'Изменен', 'editors.name')->setWidth('160px')
        ->setSearchable(false)->setOrderable(false),
    ]);

    return $display;
  }


  public function onEdit($id) {
    $form = AdminForm::panel()->addBody([
      AdminFormElement::columns()->addColumn([
        AdminFormElement::text('name', 'Название скрипта')->addValidationRule('max:255', 'Не более 250 символов')->required(),
        AdminFormElement::textarea('data', 'Данные')->setRows(8)->required(),
        AdminFormElement::checkbox('active', 'Включен или выключен на сайте'),
        AdminFormElement::html('<hr>'),
        AdminFormElement::checkbox('top', 'В шапку сайта (иначе в конец документа)'),
      ], 6)->addColumn([
        AdminFormElement::text('id', '#')->setReadonly(1),
        AdminFormElement::text('creators.name', 'Создал')->setReadonly(1),
        AdminFormElement::text('updated_at', 'Создано')->setReadonly(1),
        AdminFormElement::html('<hr>'),
        AdminFormElement::text('editors.name', 'Редактировал')->setReadonly(1),
        AdminFormElement::text('updated_at', 'Редакция')->setReadonly(1),
      ]),
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
