/**
*Author: Ashuwp
*Author url: http://www.ashuwp.com
*Version: 6.2
**/
jQuery(document).ready(function($){
  var upload_frame,
      gallery_frame;
  
  //upload
  $('.ashuwp_field_area').on( 'click', 'a.ashu_upload_button', function( event ){
    
    event.preventDefault();
    
    upload_btn = $( this );
    
    if(upload_frame){
      upload_frame.open();
      return;
    }
    
    upload_frame = wp.media({
      title: 'Insert image',
      button: {
        text: 'Insert'
      },
      multiple: false
    });
    
    upload_frame.on('select',function(){
      var attachment = upload_frame.state().get('selection').first().toJSON();
      
      upload_btn.parent().find('.ashuwp_field_upload').val(attachment.url).trigger('change');


    });
    
    upload_frame.open();
    
  });
  
  $('.ashuwp_field_area').on('change focus blur onblur input', 'input.ashuwp_field_upload', function(){
    
    preview_div = $(this).parent().parent().find('.ashuwp_file_preview');;
    file_uri = $(this).val();
    
    if(file_uri){
      var index1 = file_uri.lastIndexOf('.'),
          index2 = file_uri.length,
          file_type = file_uri.substring(index1,index2),
          img_src = ashu_file_preview.img_base;
          
      if($.inArray(file_type,['.png','.jpg','.gif','.bmp','.svg'])!='-1'){
        img_src = file_uri;
      }else if($.inArray(file_type,['.zip','.rar','.7z','.gz','.tar','.bz','.bz2'])!='-1'){
        img_src += ashu_file_preview.img_path.archive;
      }else if($.inArray(file_type,['.mp3','.wma','.wav','.mod','.ogg','.au'])!='-1'){
        img_src += ashu_file_preview.img_path.audio;
      }else if($.inArray(file_type,['.avi','.mov','.wmv','.mp4','.flv','.mkv'])!='-1'){
        img_src += ashu_file_preview.img_path.video;
      }else if($.inArray(file_type,['.swf'])!='-1'){
        img_src += ashu_file_preview.img_path.interactive;
      }else if($.inArray(file_type,['.php','.js','.css','.json','.html','.xml'])!='-1'){
        img_src += ashu_file_preview.img_path.code;
      }else if($.inArray(file_type,['.doc','.docx','.pdf','.wps'])!='-1'){
        img_src += ashu_file_preview.img_path._document;
      }else if($.inArray(file_type,['.xls','.xlsx','.csv','.et','.ett'])!='-1'){
        img_src += ashu_file_preview.img_path.spreadsheet;
      }else if($.inArray(file_type,['.txt','.rtf'])!='-1'){
        img_src += ashu_file_preview.img_path._text;
      }else{
        img_src += ashu_file_preview.img_path._default;
      }
      
      $file_view = '<img src ="'+img_src+'" />';
      preview_div.html('').append($file_view);
    }else{
      preview_div.html('');
    }
  });
  
  //gallery
  $('.ashuwp_field_area').on('click', 'a.add_gallery', function(event){
    event.preventDefault();
    
    gallery_input = $(this).parent().find('.ashuwp_gallery_input');
    gallery_view = $(this).parent().find('.gallery_view');
    attachment_ids = gallery_input.val();
    
    if( gallery_frame ){
      gallery_frame.open();
      return;
    }
    
    gallery_frame = wp.media({
      title: 'Add to gallary',
      button: {
        text: 'Add to gallary'
      },
      multiple: true
    });
    
    gallery_frame.on('select', function(){
      var selection = gallery_frame.state().get('selection');
      selection.map( function( attachment ){
        attachment = attachment.toJSON();

        if ( attachment.id ) {
          attachment_ids = attachment_ids ? attachment_ids + "," + attachment.id : attachment.id;
          gallery_view.append('<div class="image" data-attachment_id="' + attachment.id + '"><img src="' + attachment.url + '" /><div class="actions"><a href="#" class="delete" title="Delete image">Delete</a></div></div>');
        }
      });
      
      gallery_input.val(attachment_ids);
      
    });
    
    gallery_frame.open();
    
  });
  $('.ashuwp_field_area').on('click', 'a.delete', function(event){
    
    gallery_container = $(this).closest('.gallery_container');
    
    $(this).closest('div.image').remove();
    
    var attachment_ids = '';
    gallery_container.find('div.image').css('cursor','default').each(function() {
      var attachment_id = $(this).attr( 'data-attachment_id' );
        attachment_ids = attachment_ids + attachment_id + ',';
    });
    
    gallery_container.find('.ashuwp_gallery_input').val( attachment_ids );
    
    return false;
  });
  function ashuwp_gallery_sortable(){
    $('.gallery_view').sortable({
      items: 'div.image',
      cursor: 'move',
      scrollSensitivity:40,
      forcePlaceholderSize: true,
      forceHelperSize: false,
      helper: 'clone',
      opacity: 0.65,
      placeholder: 'wc-metabox-sortable-placeholder',
      start:function(event,ui){
        ui.item.css('background-color','#f6f6f6');
      },
      stop:function(event,ui){
        ui.item.removeAttr('style');
      },
      update: function(event, ui) {
        var attachment_ids = '';
        $(this).find('div.image').css('cursor','default').each(function() {
          var attachment_id = $(this).attr( 'data-attachment_id' );
              attachment_ids = attachment_ids + attachment_id + ',';
        });
        $(this).parent().find('.ashuwp_gallery_input').val( attachment_ids );
      }
    });
  }
  ashuwp_gallery_sortable();
  
  //field multiple
  $('.ashuwp_field_area .multiple_wrap').on('click','a.add_item',function(){
    event.preventDefault();
    
    multiple_wrap = $(this).closest('.multiple_wrap');
    data_name = $(this).attr('data_name');
    
    html_format = $('#' + data_name).html();
    count = 0;
    count = multiple_wrap.find('.multiple_item').length + 1;
    
    html_temp = html_format.replace(/({{i}})/g,count);
    
    $(this).before(html_temp);
    multiple_wrap.trigger('multiple_change');
    ashuwp_gallery_sortable();
  });
  
  $('.ashuwp_field_area .multiple_wrap').on('click','a.delete_item',function(){
    event.preventDefault();
    
    multiple_wrap = $(this).closest('.multiple_wrap');
    $(this).closest('.multiple_item').remove();
    multiple_wrap.trigger('multiple_change');
  });
  
  //colorpicker
  $('.ashuwp_color_picker input').wpColorPicker();
  $('.ashuwp_color_picker').on('multiple_change',function(){
    $('.ashuwp_color_picker input.ashuwp_field_input').each(function(){
      if( ! $(this).parent().hasClass('wp-picker-input-wrap') ){
        $(this).wpColorPicker();
      }
    });
  });
  
  //tab
  $( '.ashuwp_feild_tabs' ).tabs();
  
  //quick edit
  if(typeof(inlineEditPost)!='undefined'){
  var ashuwp_inline_edit = inlineEditPost.edit;
  inlineEditPost.edit = function( id ) {

		// "call" the original WP edit function
		// we don't want to leave WordPress hanging
		ashuwp_inline_edit.apply( this, arguments );

		// now we take care of our business

		// get the post ID
		var $post_id = 0;
		if ( typeof( id ) == 'object' ) {
			$post_id = parseInt( this.getId( id ) );
		}

		if ( $post_id > 0 ) {
			// define the edit row
			var $edit_row = $( '#edit-' + $post_id );
			var $post_row = $( '#post-' + $post_id );

			// get the data
			//var $book_author = $( '.column-book_author', $post_row ).text();
			//var $inprint = !! $('.column-inprint>*', $post_row ).prop('checked');

			// populate the data
			//$( ':input[name="book_author"]', $edit_row ).val( $book_author );
			//$( ':input[name="inprint"]', $edit_row ).prop('checked', $inprint );
      
      //text
      $( '.ashuwp_text_field .ashuwp_field_input', $edit_row ).each(function(){
        input_name = $(this).prop('name');
        col_name = '.column-'+input_name;
        input_val = $( col_name, $post_row ).text();
        $(this).val(input_val);
      });
      //numbers_array
      $( '.ashuwp_numbers_array_field .ashuwp_field_input', $edit_row ).each(function(){
        input_name = $(this).prop('name');
        col_name = '.column-'+input_name;
        input_val = $( col_name, $post_row ).text();
        $(this).val(input_val);
      });
      //color
      $( '.ashuwp_color_field .ashuwp_field_input', $edit_row ).each(function(){
        input_name = $(this).prop('name');
        col_name = '.column-'+input_name;
        color_data = $( col_name, $post_row ).find('span').attr('data-color');
        
        $(this).val(color_data);
        $(this).wpColorPicker();
      });
      //textarea
      $( '.ashuwp_textarea_field .ashuwp_field_textarea', $edit_row ).each(function(){
        input_name = $(this).prop('name');
        col_name = '.column-'+input_name;
        input_val = $( col_name, $post_row ).text();
        $(this).val(input_val);
      });
      //radio
      $( '.ashuwp_radio_field', $edit_row ).each(function(){
        input_name = $(this).find('.ashuwp_field_radio').eq(0).prop('name');
        col_name = '.column-'+input_name;
        input_val = $( col_name, $post_row ).text();
        $(this).find('.ashuwp_field_radio').each(function(){
          check_text = $(this).attr('data-text');
          if(input_val==check_text){
            $(this).prop('checked', true );
          }
        });
      });
      //checkbox
      $( '.ashuwp_checkbox_field', $edit_row ).each(function(){
        input_name = $(this).find('.ashuwp_field_checkbox').eq(0).prop('name');
        input_name = input_name.substr(0, input_name.length-2);
        console.log(input_name);
        col_name = '.column-'+input_name;
        input_val = $( col_name, $post_row ).text();
        check_values = input_val.split(',');
        
        $(this).find('.ashuwp_field_checkbox').each(function(){
          check_text = $(this).attr('data-text');
          
          if( $.inArray( check_text,check_values )!=-1){
            $(this).prop('checked', true );
          }
        });
      });
      
      //select
      $( '.ashuwp_select_field', $edit_row ).each(function(){
        input_name = $(this).find('.ashuwp_field_select').prop('name');
        col_name = '.column-'+input_name;
        input_val = $( col_name, $post_row ).text();
        $(this).find('option').each(function(){
          check_text = $(this).text();
          if(input_val==check_text){
            $(this).prop('selected', true );
          }
        });
      });
		}
	};
  }
});