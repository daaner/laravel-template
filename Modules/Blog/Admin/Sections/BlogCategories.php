<?php

namespace Modules\Blog\Admin\Sections;

use AdminColumn;
use AdminDisplay;
use AdminForm;
use AdminFormElement;

use AdminColumnFilter;
use AdminDisplayFilter;

use SleepingOwl\Admin\Contracts\Initializable;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Form\FormElements;

use Modules\Blog\Models\BlogCategory;
// use Modules\Blog\Models\Blog;

//use SleepingOwl\Admin\Form\Buttons\Save;
use SleepingOwl\Admin\Form\Buttons\SaveAndClose;
use SleepingOwl\Admin\Form\Buttons\Cancel;

use Modules\Blog\Repositories\BlogCategoryRepository;


class BlogCategories extends Section implements Initializable
{
  public function initialize() {
  }

  protected $checkAccess = true;
  protected $alias = 'blog-categories';

  public function getIcon() {
    return 'fas fa-th-list';
  }
  public function getTitle() {
    return __('Blog::admin_blog.get_title_category');
  }
  public function getEditTitle() {
    return __('Blog::admin_blog.get_edit_category');
  }
  public function getCreateTitle() {
    return __('Blog::admin_blog.get_create_category');
  }


  public function onDisplay() {

    $display = AdminDisplay::datatables()
      ->setHtmlAttribute('class', 'table-primary table-hover')
      ->setDisplaySearch(true);


    $columns = [
      AdminColumn::text('id', '#')
        ->setWidth('50px')
        ->setHtmlAttribute('class', 'text-center'),
      AdminColumn::link('name', __('adm.title'), 'slug'),
      AdminColumn::text('categories.name', __('adm.edit.category'))
        ->setOrderable(true)
        ->setOrderable(function($query, $direction) {
          $query->orderBy('category_id', $direction);
        })
        ->setSearchCallback(function($column, $query, $search){
          return $query->orWhereHas('categories', function ($q) use ($search) {
            $q->where('name', 'like', '%'.$search.'%');
          });
        })
        ->append(AdminColumn::filter('category_id')),
      AdminColumn::custom(__('adm.lang'), function($model) {
        if(isset(config('app.locales')[$model->lang])) {
          $lang = config('app.locales')[$model->lang];
        } else { $lang = '-'; }
        return $lang;
      })
        ->setWidth('50px')
        ->setHtmlAttribute('class', 'text-center'),
      AdminColumn::text('updated_at', __('adm.edited'), 'editors.name')
        ->setWidth('160px')
        ->setSearchable(false),
    ];

    $tableActive =  AdminDisplay::datatablesAsync()
      ->setName('active')
      ->setOrder([[0, 'desc']])
      ->setDisplaySearch(true)
      ->paginate(30)
      ->getScopes()->set('Active')
      ->setColumns($columns)
      ->setHtmlAttribute('class', 'table-primary table-hover th-center');

    $tableActive->setFilters(
        AdminDisplayFilter::related('category_id', __('adm.edit.category'))->setModel(BlogCategory::class)
      );

    $tableInactive =  AdminDisplay::datatablesAsync()
      ->setName('draft')
      ->setOrder([[0, 'desc']])
      ->setDisplaySearch(true)
      ->paginate(30)
      ->getScopes()->set('Draft')
      ->setColumns($columns)
      ->setHtmlAttribute('class', 'table-hover th-center');

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
        ->seticon('<i class="fas fa-eye"></i>')
        ->setBadge(function () {
          return BlogCategory::Active()->count();
        }),

      AdminDisplay::tab($tableInactive)
        ->setLabel(__('adm.drafted'))
        ->seticon('<i class="fas fa-eye-slash"></i>')
        ->setHtmlAttribute('class', 'text-black-50')
        ->setBadge(function () {
          return BlogCategory::Draft()->count();
        }),

      AdminDisplay::tab($tableDeleted)
        ->setLabel(__('adm.deleted'))
        ->setIcon('<i class="fas fa-trash"></i>')
        ->setHtmlAttribute('class', 'last text-danger'),
    ]);

    return $tabs;
  }


  public function onEdit($id) {
    //== tabs

    $this_model = $this->model->find($id);
    if($this_model) {
      $def_lang = $this_model->lang;
    } else {
      $def_lang = 1;
    }

    $data = new BlogCategoryRepository;
    $cat = $data->getBlogCategory($def_lang, $id);


    $tabs = AdminDisplay::tabbed([
      __('Blog::admin_blog.main_tab') => new FormElements([
        AdminFormElement::select('lang', __('adm.edit.lang_site'), config('app.locales'))
          ->required()
          ->setSortable(false)
          ->setDefaultValue($def_lang),
        AdminFormElement::text('id', '#')
          ->setReadonly(1),


        // AdminFormElement::dependentselect('category_id', __('adm.edit.category'))
        //   // ->setOptions($cat)
        //   ->setModelForOptions(BlogCategory::class, 'name')
        //   ->setDataDepends(['lang'])
        //   ->exclude($id)
        //   ->setDisplay('name')
        //   ->setSortable(false)
        //   ->setLoadOptionsQueryPreparer(function($item, $query) use ($cat) {
        //
        //     return ($query->where('lang', $item->getDependValue('lang'))
        //       ->where('active', true)
        //     );
        //   })
        //   ,


        AdminFormElement::html('<hr>'),
        AdminFormElement::text('creators.name', __('adm.edit.creators'))
          ->setReadonly(1),
        AdminFormElement::text('created_at', __('adm.edit.created_at'))
          ->setReadonly(1),
        AdminFormElement::html('<hr>'),
        AdminFormElement::text('editors.name', __('adm.edit.editors'))
          ->setReadonly(1),
        AdminFormElement::text('updated_at', __('adm.edit.updated_at'))
          ->setReadonly(1),
      ]),

      __('Blog::admin_blog.meta_tab') => new FormElements([
        AdminFormElement::text('meta_title', __('adm.edit.meta_title'))
          ->addValidationRule('max:190', __('adm.valid.max190')),
        AdminFormElement::textarea('meta_description', __('adm.edit.meta_description'))
          ->setRows(5)
          ->addValidationRule('max:190', __('adm.valid.max190')),
        AdminFormElement::textarea('ldjson', 'LD-Json Script')
          ->setRows(10),
      ]),
    ]);

    //== main form
    $form = AdminForm::panel()->addBody([
      AdminFormElement::columns()->addColumn([

        AdminFormElement::text('name', __('adm.name'))
          ->addValidationRule('max:190', __('adm.valid.max190'))
          ->required(),
        AdminFormElement::text('slug', __('adm.slug'))
          ->addValidationRule('max:190', __('adm.valid.max190')),
        AdminFormElement::columns()->addColumn([
          AdminFormElement::image('image', __('adm.edit.image'))
            ->addValidationRule('max:190', __('adm.valid.max190')),
        ], 6)->addColumn([
          AdminFormElement::text('icon', __('adm.edit.icon'))
            ->addValidationRule('max:190', __('adm.valid.max190')),
        ]),

        AdminFormElement::wysiwyg('info_preview', __('adm.text_preview')),
        // AdminFormElement::wysiwyg('info_full', __('adm.text_full'))->setHeight(500),

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
