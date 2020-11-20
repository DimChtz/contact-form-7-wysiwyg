<div class="control-box">
    <fieldset>
      <legend><?php _e('Generate a WYSIWYG Editor Field.', 'cf7-wysiwyg'); ?></legend>

	  <table class="form-table">
        <tbody>
	      <tr>
	        <th scope="row"><?php _e('Name', 'cf7-wysiwyg'); ?></th>
	        <td>
		      <fieldset>
		        <legend class="screen-reader-text"><?php _e('Name', 'cf7-wysiwyg'); ?></legend>
		        <input type="text" name="name" class="oneline" id="<?php echo esc_attr( $args['content'] . '-name' ); ?>">
		      </fieldset>
	        </td>
	      </tr>
	      <tr>
	        <th scope="row"><?php _e('Class', 'cf7-wysiwyg'); ?></th>
	        <td>
		      <fieldset>
		        <legend class="screen-reader-text"><?php _e('Class', 'cf7-wysiwyg'); ?></legend>
		        <input type="text" name="class" class="classvalue oneline option" id="<?php echo esc_attr( $args['content'] . '-class' ); ?>">
		      </fieldset>
	        </td>
	      </tr>
	      <tr>
	        <th scope="row"><?php _e('ID', 'cf7-wysiwyg'); ?></th>
	        <td>
		      <fieldset>
		        <legend class="screen-reader-text"><?php _e('ID', 'cf7-wysiwyg'); ?></legend>
		        <input type="text" name="id" class="idvalue oneline option" id="<?php echo esc_attr( $args['content'] . '-id' ); ?>">
		      </fieldset>
	        </td>
	      </tr>
        </tbody>
      </table>
    </fieldset>
</div>

<div class="insert-box">
	<input type="text" name="wysiwyg" class="tag code" readonly="readonly" onfocus="this.select()">
	<div class="submitbox">
		<input type="button" class="button button-primary insert-tag" value="<?php _e('Insert Tag', 'cf7-wysiwyg'); ?>">
	</div>
</div>