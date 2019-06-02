<?php

namespace Modules\Blog\Admin\Sections;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Initializable;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Form\FormElements;

use Modules\Blog\Models\BlogCategory;
use Modules\Blog\Models\Blog;

//use SleepingOwl\Admin\Form\Buttons\Save;
use SleepingOwl\Admin\Form\Buttons\SaveAndClose;
use SleepingOwl\Admin\Form\Buttons\Cancel;


class Blogs extends Section implements Initializable
{
  public function initialize() {
    // $this->addToNavigation()
    //   ->setPriority(2000);
  }

  protected $checkAccess = true;
  protected $alias = 'blog';

  public function getIcon() {
    return 'fa fa-file-text-o';
  }
  public function getTitle() {
    return __('Blog::admin_blog.get_title_blog');
  }
  public function getEditTitle() {
    return __('Blog::admin_blog.get_edit_blog');
  }
  public function getCreateTitle() {
    return __('Blog::admin_blog.get_create_blog');
  }


  public function onDisplay() {

    $display = AdminDisplay::datatables()
      ->setHtmlAttribute('class', 'table-primary table-hover')
      ->setDisplaySearch(true);

    $columns = [
      AdminColumn::text('id', '#')->setWidth('30px'),
      AdminColumn::image('image', __('adm.image'))->setWidth('50px'),
      AdminColumn::link('name', __('adm.title'), 'slug'),
      AdminColumn::text('categories.name', __('adm.edit.category'))
        ->setOrderable(false)
        ->setSearchCallback(function($column, $query, $search){
          return $query->orWhereHas('categories', function ($q) use ($search) {
            $q->where('name', 'like', '%'.$search.'%');
          });
        }),
      AdminColumn::custom(__('adm.lang'), function($model) {
        if(isset(config('app.locales')[$model->lang])) {
          $lang = config('app.locales')[$model->lang];
        } else { $lang = '-'; }
        return $lang;
      })->setWidth('30px'),
      // AdminColumn::boolean('active', __('adm.show'))->setWidth('30px'),
      AdminColumn::text('updated_at', __('adm.edited'), 'editors.name')->setWidth('160px')
        ->setSearchable(false)->setOrderable(false),
    ];

    $tableActive =  AdminDisplay::datatablesAsync()
      ->setName('active')
      ->setOrder([[1, 'desc']])
      ->setDisplaySearch(true)
      ->paginate(30)
      ->getScopes()->set('Active')
      ->setColumns($columns)
      ->setHtmlAttribute('class', 'table-primary table-hover th-center');

    $tableInactive =  AdminDisplay::datatablesAsync()
      ->setName('draft')
      ->setOrder([[1, 'desc']])
      ->paginate(30)
      ->getScopes()->set('Draft')
      ->setColumns($columns)
      ->setHtmlAttribute('class', 'table-info table-hover th-center');

    $tableDeleted =  AdminDisplay::datatablesAsync()
      ->setName('deleted')
      ->paginate(30)
      ->getScopes()->set('Deleted')
      ->setColumns($columns)
      ->setHtmlAttribute('class', 'table-danger table-hover th-center');


    $tabs = AdminDisplay::tabbed();

    $tabs->setElements([
      AdminDisplay::tab($tableActive)
        ->setLabel(__('adm.all'))
        ->seticon('<i class="fa fa-eye"></i>')
        ->setBadge(function () {
          return Blog::Active()->count();
        }),

      AdminDisplay::tab($tableInactive)
        ->setLabel(__('adm.drafted'))
        ->seticon('<i class="fa fa-eye-slash"></i>')
        ->setBadge(function () {
          return Blog::Draft()->count();
        }),

      AdminDisplay::tab($tableDeleted)
        ->setLabel(__('adm.deleted'))
        ->setIcon('<i class="fa fa-trash"></i>')
        ->setHtmlAttribute('class', 'tab-delete'),
    ]);

    return $tabs;
  }


  public function onEdit($id) {
    //== tabs
    $tabs = AdminDisplay::tabbed([
      __('Blog::admin_blog.main_tab') => new FormElements([
        AdminFormElement::text('id', '#')->setReadonly(1),
        AdminFormElement::select('lang', __('adm.edit.lang_site'), config('app.locales'))
          ->required()->setDefaultValue(1),

        AdminFormElement::dependentselect('category_id', __('adm.edit.category'))
          ->setModelForOptions(BlogCategory::class, 'name')
          ->setDataDepends(['lang'])
          ->setLoadOptionsQueryPreparer(function($item, $query) {
            return ( $query->where('lang', $item->getDependValue('lang')));
          }),

        AdminFormElement::html('<hr>'),
        AdminFormElement::image('image', __('adm.edit.image')),
        AdminFormElement::html('<hr>'),

        AdminFormElement::datetime('published_at', __('adm.edit.published_at')),
        AdminFormElement::datetime('published_to', __('adm.edit.published_to')),

        AdminFormElement::html('<hr>'),
        AdminFormElement::text('creators.name', __('adm.edit.creators'))->setReadonly(1),
        AdminFormElement::text('created_at', __('adm.edit.created_at'))->setReadonly(1),
        AdminFormElement::html('<hr>'),
        AdminFormElement::text('editors.name', __('adm.edit.editors'))->setReadonly(1),
        AdminFormElement::text('updated_at', __('adm.edit.updated_at'))->setReadonly(1),
      ]),

      __('Blog::admin_blog.meta_tab') => new FormElements([
        AdminFormElement::text('meta_title', __('adm.edit.meta_title')),
        AdminFormElement::textarea('meta_description', __('adm.edit.meta_description'))->setRows(5)
          ->addValidationRule('max:255', __('adm.valid.max250')),
        AdminFormElement::textarea('ldjson', 'LD-Json Script')->setRows(10),
      ]),
    ]);

    //== main form
    $form = AdminForm::panel()->addBody([
      AdminFormElement::columns()->addColumn([

        AdminFormElement::text('name', __('adm.name'))
          ->addValidationRule('max:255', __('adm.valid.max250'))->required(),
        AdminFormElement::text('slug', __('adm.slug'))
          ->addValidationRule('max:255', __('adm.valid.max250')),

        AdminFormElement::wysiwyg('info_preview', __('adm.text_preview')),
        AdminFormElement::wysiwyg('info_full', __('adm.text_full'))->setHeight(500),

      ], 8)->addColumn([$tabs]),

      AdminFormElement::html('<hr>'),
      AdminFormElement::checkbox('active', __('adm.edit.actived')),
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
