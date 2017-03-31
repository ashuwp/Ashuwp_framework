<?php
/**
*Author: Ashuwp
*Author url: http://www.ashuwp.com
*Version: 5.0
**/

/**
*
*post meta test
*
**/
/*****Meta Box********/
$meta_conf = array(
  'title' => 'Meta box example',
  'id'=>'example_box',
  'page'=>array('page','post'),
  'context'=>'normal',
  'priority'=>'low'
);

$ashu_meta = array();

$ashu_meta[] = array(
  'name' => 'Input Example',
  'id'   => 'text_example',
  'desc' => 'A text input example, Default content:"Hello ashuwp."',
  'std'  => 'Hello ashuwp.',
  'type' => 'text'
);

$ashu_meta[] = array(
  'name' => 'Texearea Example',
  'id'   => 'textarea_example',
  'desc' => 'A textarea example, Default content:"Default content."',
  'std'  => 'Default content.',
  'type' => 'textarea'
);

$new_box = new ashuwp_postmeta_feild($ashu_meta, $meta_conf);

/**
*
*Tab style
*
**/

$tab_conf = array(
  'title' => 'Tab Title',
  'id'=>'tab_box',
  'page'=>array('page','post'),
  'context'=>'normal',
  'priority'=>'low',
  'tab'=>true
);

$tab_meta = array();

/**first tab**/
$tab_meta[] = array(
  'name' => 'Normal Field',
  'id'   => 'tab_first',
  'type' => 'open'
);

$tab_meta[] = array(
  'name' => 'Array Input',
  'id'   => 'array_input',
  'desc' => 'Set type as numbers array, Input numbers separated by commas, The data saved as array.',
  'type' => 'numbers_array'
);

$tab_meta[] = array(
  'name' => 'Color picker',
  'id'   => 'color_picker',
  'desc' => 'Set type as color, Color picker worked.',
  'std'  => '',
  'type' => 'color'
);

$tab_meta[] = array(
  'name'    => 'Radio Example',
  'id'      => 'radio_example',
  'desc'    => 'Please select your gender.',
  'std'     => 'thirdness',
  'subtype' => array(
    'male'      => 'Male',
    'female'    => 'Female',
    'thirdness' => 'Third gender'
  ),
  'type'    => 'radio'
);

$tab_meta[] = array(
  'name'    => 'Radio Example2',
  'id'      => 'radio_example2',
  'desc'    => 'The options are categories.',
  'std'     => 'thirdness',
  'subtype' => 'category',
  'type'    => 'radio'
);

$tab_meta[] = array(
  'name'    => 'Checkbox Example',
  'id'      => 'checkbox_example',
  'desc'    => 'Which fruits do you like?,Default are apple and orange.',
  'std'     => array('apple','orange'),
  'subtype' => array(
    'apple'  => 'Apple',
    'orange' => 'Orange',
    'banana' => 'Banana',
    'lemon'  => 'Lemon'
  ),
  'type'    => 'checkbox'
);

$tab_meta[] = array(
  'name'    => 'Checkbox Example2',
  'id'      => 'checkbox_example2',
  'desc'    => 'The options are menus',
  'std'     => '',
  'subtype' => 'nav_menu',
  'type'    => 'checkbox'
);

$tab_meta[] = array(
  'name'    => 'Select Example',
  'id'      => 'select_example',
  'desc'    => 'Please select your gender.',
  'std'     => '',
  'subtype' => array(
    'male'      => 'Male',
    'female'    => 'Female',
    'thirdness' => 'Third gender'
  ),
  'type'    => 'select'
);

$tab_meta[] = array(
  'name'    => 'Select Example2',
  'id'      => 'select_example2',
  'desc'    => 'The options are pages.',
  'std'     => '',
  'subtype' => 'page',
  'type'    => 'select'
);

$tab_meta[] = array(
  'name'    => 'Select Example3',
  'id'      => 'select_example3',
  'desc'    => 'The options are sidebars.',
  'std'     => '',
  'subtype' => 'sidebar',
  'type'    => 'select'
);

$tab_meta[] = array(
  'name' => 'File Upload Example',
  'id'   => 'upload_example',
  'desc' => 'Pleas upload a file, Or fill the blank with file uri.',
  'std'  => '',
  'button_text' => 'Upload',
  'type' => 'upload'
);

$tab_meta[] = array(
  'name' => 'Image Gallery Example',
  'id'   => 'gallery_example',
  'desc' => 'Pleas upload some images.',
  'std'  => '',
  'button_text' => 'Add Images',
  'type' => 'gallery'
);

$tab_meta[] = array(
  'name'  => 'Tinymce Example',
  'id'    => 'tinymce_example',
  'desc'  => 'Pleas add some content',
  'std'   => 'Hello, world.',
  'media' => 1,
  'type'  => 'tinymce'
);

$tab_meta[] = array(
  'type' => 'close'
);

/**second tab**/
$tab_meta[] = array(
  'name' => 'Group And Multiple',
  'id'   => 'tab_second',
  'type' => 'open'
);

$tab_meta[] = array(
  'name' => 'Input Multiple Example',
  'id'   => 'text_multiple_example',
  'desc' => 'Set the multiple as true, The field is multiple.',
  'std'  => 'Hello ashuwp.',
  'multiple' => true,
  'type' => 'text'
);

$tab_meta[] = array(
  'name' => 'Input And Upload',
  'id'   => 'input_upload',
  'desc' => 'Set the type as group, And set the subtype as array, The fields as a group.',
  'std'  => '',
  'subtype' => array(
    array(
      'name' => 'Title',
      'id'   => 'title',
      'desc' => 'Title for image.',
      'std'  => '',
      'type' => 'text'
    ),
    array(
      'name' => 'Link',
      'id'   => 'link',
      'desc' => 'Link for image',
      'std'  => '',
      'type' => 'text'
    ),
    array(
      'name' => 'Image',
      'id'   => 'image',
      'desc' => 'Pleas upload a image, Or fill the blank with image uri.',
      'std'  => '',
      'button_text' => 'Upload',
      'type' => 'upload'
    ),
  ),
  'type' => 'group'
);

$tab_meta[] = array(
  'name' => 'Input And Upload Multiple',
  'id'   => 'input_upload_multiple',
  'desc' => 'Set the type as group, Set the subtype as array, And set the multiple as true, The group fields is multiple.',
  'std'  => '',
  'subtype' => array(
    array(
      'name' => 'Link',
      'id'   => 'link',
      'desc' => 'Link for image',
      'std'  => 'Hello ashuwp.',
      'type' => 'text'
    ),
    array(
      'name' => 'Image',
      'id'   => 'image',
      'desc' => 'Pleas upload a image, Or fill the blank with image uri.',
      'std'  => '',
      'button_text' => 'Upload',
      'type' => 'upload'
    ),
  ),
  'multiple' => true,
  'type' => 'group'
);

$tab_meta[] = array(
  'type' => 'close'
);

$tab_box = new ashuwp_postmeta_feild($tab_meta, $tab_conf);

/**
*
*taxonomy feild test
*
**/
/*****taxonomy feild ******/
$ashu_feild = array();
$taxonomy_cof = array('category','post_tag');

$ashu_feild[] = array(
  'name'      => 'Text Example',
  'id'        => 'text_example',
  'desc'      => 'description or notice.Default content:Default content',
  'std'       => 'Default content',
  'edit_only' => false,
  "type"      => "text"
);

$ashuwp_termmeta_feild = new ashuwp_termmeta_feild($ashu_feild, $taxonomy_cof);

/**
*
*Optinos page
*
**/
/**General options**/
$page_info = array(
  'full_name' => 'General Options',
  'optionname'=>'general',
  'child'=>false,
  'filename' => 'generalpage'
);

$ashu_options = array();

$ashu_options[] = array(
  'name' => 'Input Example',
  'id'   => '_id_text',
  'desc' => 'description or notice',
  'std'  => 'Default content',
  'type' => 'text'
);

$ashu_options[] = array(
  'name' => 'Input Multiple',
  'id'   => 'input_multiple',
  'desc' => 'Set multiple as true, This field is multiple',
  'std' => '',
  'multiple'=> true,
  'type' => 'text'
);

$ashu_options[] = array(
  'name' => 'Array Input',
  'id'   => 'array_input',
  'desc' => 'Set type as numbers array, Input numbers separated by commas, The data saved as array.',
  'type' => 'numbers_array'
);

$ashu_options[] = array(
  'name' => 'Color Picker',
  'id'   => 'color_picker',
  'desc' => 'Set type as color, Color picker worked.',
  'std'  => '',
  'type' => 'color'
);

$ashu_options[] = array(
  'name' => 'Textarea Example',
  'id'   => '_id_textarea',
  'desc' => 'Description or Notice',
  'std'  => 'Default content',
  'type' => 'textarea'
);

$ashu_options[] = array(
  'name'    => 'Radio Example',
  'id'      => 'radio_example',
  'desc'    => 'Please select your gender.',
  'std'     => 'thirdness',
  'subtype' => array(
    'male'      => 'Male',
    'female'    => 'Female',
    'thirdness' => 'Third gender'
  ),
  'type'    => 'radio'
);

$ashu_options[] = array(
  'name'    => 'Radio Example2',
  'id'      => 'radio_example2',
  'desc'    => 'The options are categories.',
  'std'     => 'thirdness',
  'subtype' => 'category',
  'type'    => 'radio'
);

$ashu_options[] = array(
  'name'    => 'Checkbox Example',
  'id'      => 'checkbox_example',
  'desc'    => 'Which fruits do you like?,Default are apple and orange.',
  'std'     => array('apple','orange'),
  'subtype' => array(
    'apple'  => 'Apple',
    'orange' => 'Orange',
    'banana' => 'Banana',
    'lemon'  => 'Lemon'
  ),
  'type'    => 'checkbox'
);

$ashu_options[] = array(
  'name'    => 'Checkbox Example2',
  'id'      => 'checkbox_example2',
  'desc'    => 'The options are menus',
  'std'     => '',
  'subtype' => 'nav_menu',
  'type'    => 'checkbox'
);

$ashu_options[] = array(
  'name'    => 'Select Example',
  'id'      => 'select_example',
  'desc'    => 'Please select your gender.',
  'std'     => '',
  'subtype' => array(
    'male'      => 'Male',
    'female'    => 'Female',
    'thirdness' => 'Third gender'
  ),
  'type'    => 'select'
);

$ashu_options[] = array(
  'name'    => 'Select Example2',
  'id'      => 'select_example2',
  'desc'    => 'The options are pages.',
  'std'     => '',
  'subtype' => 'page',
  'type'    => 'select'
);

$ashu_options[] = array(
  'name'    => 'Select Example3',
  'id'      => 'select_example3',
  'desc'    => 'The options are sidebars.',
  'std'     => '',
  'subtype' => 'sidebar',
  'type'    => 'select'
);

$ashu_options[] = array(
  'name' => 'File Upload Example',
  'id'   => 'upload_example',
  'desc' => 'Pleas upload a file, Or fill the blank with file uri.',
  'std'  => '',
  'button_text' => 'Upload',
  'type' => 'upload'
);

$ashu_options[] = array(
  'name' => 'Image Gallery Example',
  'id'   => 'gallery_example',
  'desc' => 'Pleas upload some images.',
  'std'  => '',
  'button_text' => 'Add Images',
  'type' => 'gallery'
);

$ashu_options[] = array(
  'name'  => 'Tinymce Example',
  'id'    => 'tinymce_example',
  'desc'  => 'Pleas add some content',
  'std'   => 'Hello, world.',
  'media' => 1,
  'type'  => 'tinymce'
);

$ashu_options[] = array(
  'name' => 'Input And Upload',
  'id'   => 'input_upload',
  'desc' => 'Set the type as group, And set the subtype as array, The fields as a group.',
  'std'  => '',
  'subtype' => array(
    array(
      'name' => 'Title',
      'id'   => 'title',
      'desc' => 'Title for image.',
      'std'  => '',
      'type' => 'text'
    ),
    array(
      'name' => 'Link',
      'id'   => 'link',
      'desc' => 'Link for image',
      'std'  => '',
      'type' => 'text'
    ),
    array(
      'name' => 'Image',
      'id'   => 'image',
      'desc' => 'Pleas upload a image, Or fill the blank with image uri.',
      'std'  => '',
      'button_text' => 'Upload',
      'type' => 'upload'
    ),
  ),
  'type' => 'group'
);

$ashu_options[] = array(
  'name' => 'Input And Upload Multiple',
  'id'   => 'input_upload_multiple',
  'desc' => 'Set the type as group, Set the subtype as array, And set the multiple as true, The group fields is multiple.',
  'std'  => '',
  'subtype' => array(
    array(
      'name' => 'Link',
      'id'   => 'link',
      'desc' => 'Link for image',
      'std'  => 'Hello ashuwp.',
      'type' => 'text'
    ),
    array(
      'name' => 'Image',
      'id'   => 'image',
      'desc' => 'Pleas upload a image, Or fill the blank with image uri.',
      'std'  => '',
      'button_text' => 'Upload',
      'type' => 'upload'
    ),
  ),
  'multiple' => true,
  'type' => 'group'
);


$option_page = new ashuwp_options_feild($ashu_options, $page_info);

/**Child options page width tab style**/
$child_info = array(
  'full_name' => 'Child Options',
  'optionname'=>'childoption',
  'child'=>true,
  'parent_slug'=>'generalpage',
  'filename' => 'childpage'
);

$child_option = array();
/**first tab**/
$child_option[] = array(
  'name' => 'First Tab',
  'id'   => 'option_tab1',
  'type' => 'open',
);

$child_option[] = array(
  'name' => 'Input Example',
  'id'   => 'child_input',
  'desc' => 'description or notice',
  'std'  => 'Default content',
  'type' => 'text'
);

$child_option[] = array(
  'name' => 'Textarea Example',
  'id'   => 'child_textarea',
  'desc' => 'Description or Notice',
  'std'  => 'Default content',
  'type' => 'textarea'
);

$child_option[] = array(
  'type' => 'close',
);
/**second tab**/
$child_option[] = array(
  'name' => 'Second Tab',
  'id'   => 'option_tab2',
  'type' => 'open',
);

$child_option[] = array(
  'name' => 'Input Example',
  'id'   => 'child_input2',
  'desc' => 'description or notice',
  'std'  => 'Default content',
  'type' => 'text'
);

$child_option[] = array(
  'name' => 'Textarea Example',
  'id'   => 'child_textarea2',
  'desc' => 'Description or Notice',
  'std'  => 'Default content',
  'type' => 'textarea'
);
$child_option[] = array(
  'type' => 'close',
);

$child_page = new ashuwp_options_feild($child_option, $child_info);

/**Other top page**/
$top_page_info = array(
  'full_name' => 'Top page',
  'optionname'=>'toppage',
  'child'=>false,
  'filename' => 'toppage_slug',
  'tab'=>true
);

$top_page_option = array();
$top_page_option[] = array(
  'name' => 'Input Example',
  'id'   => 'child_input',
  'desc' => 'description or notice',
  'std'  => 'Default content',
  'type' => 'text'
);

$top_page_option[] = array(
  'name' => 'Textarea Example',
  'id'   => 'child_textarea',
  'desc' => 'Description or Notice',
  'std'  => 'Default content',
  'type' => 'textarea'
);

$top_page = new ashuwp_options_feild($top_page_option, $top_page_info);

