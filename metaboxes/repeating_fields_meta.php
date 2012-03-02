<?php global $wpalchemy_media_access; ?>
<div class="my_meta_control">  
 
    <?php while($mb->have_fields_and_multi('docs')): ?>
    <?php $mb->the_group_open(); ?>  
 
        <?php $mb->the_field('title'); ?>
        <p><label for="<?php $mb->the_name(); ?>">Title: </label>
        <input type="text" id="<?php $mb->the_name(); ?>" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>"/><a href="#" class="dodelete button">Remove Image</a></p>
        
        <?php $mb->the_field('imgurl'); ?>
        <?php $wpalchemy_media_access->setGroupName('img-n'. $mb->get_the_index())->setInsertButtonLabel('Insert'); ?>
 
        <p><label >URL: </label>
        	<?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
        	<?php echo $wpalchemy_media_access->getButton(); ?>
        </p>  
 
    <?php $mb->the_group_close(); ?>
    <?php endwhile; ?>
    <p style="padding:8px; border-top: 1px solid #DFDFDF;"><a href="#" class="docopy-docs button">Add</a><a href="#" class="dodelete-docs button">Remove All</a></p>
 	<div class="clear"></div>
</div>