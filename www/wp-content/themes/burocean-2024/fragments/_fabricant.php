<div class="row">
    <div class="col col-md-6 col-xs-12">
        <?php 
        $image_1 = get_field('image_col_1', 'option');
        
        if( !empty($image_1) ): ?>
            <figure class="photo photo-fit">
                <?php 
                    echo wp_get_attachment_image( $image_1, 'wide-sm', true, ['loading' => 'lazy'] );
                ?>
            </figure>
        <?php endif; ?>
        <span class="titre-rubrique"><?php the_field('titre_col_1', 'option'); ?></span>
        <p><?php if (!is_front_page()) { the_field('description_1', 'option'); } ?></p>
    </div>
    
    <div class="col col-md-6 col-xs-12">
        <?php 
        $image_2 = get_field('image_1_col_2', 'option');
        
        if( !empty($image_2) ): ?>
            <figure class="photo photo-fit">
                <?php 
                    echo wp_get_attachment_image( $image_2, 'wide-sm', true, ['loading' => 'lazy'] );
                ?>
            </figure>
        <?php endif; ?>
        
        <span class="titre-rubrique"><?php the_field('titre_1_col_2', 'option'); ?></span>
        <p><?php if (!is_front_page()) { the_field('description_2', 'option'); } ?></p>
    </div>
    
    <div class="col col-md-6 col-xs-12">
        <?php 
        $image_3 = get_field('image_2_col_2', 'option');
        
        if( !empty($image_3) ): ?>
            <figure class="photo photo-fit">
                <?php 
                    echo wp_get_attachment_image( $image_3, 'wide-sm', true, ['loading' => 'lazy'] );
                ?>
            </figure>
        <?php endif; ?>
        <span class="titre-rubrique"><?php the_field('titre_2_col_2', 'option'); ?></span>
        <p><?php if (!is_front_page()) { the_field('description_3', 'option'); } ?></p>
    </div>
    
    <div class="col col-md-6 col-xs-12">
        <?php 
        $image_4 = get_field('image_col_3', 'option');
        
        if( !empty($image_4) ): ?>
        	<figure class="photo photo-fit">
                <?php 
                    echo wp_get_attachment_image( $image_4, 'wide-sm', true, ['loading' => 'lazy'] );
                ?>
            </figure>
        <?php endif; ?>
        <span class="titre-rubrique"><?php the_field('titre_col_3', 'option'); ?></span>
        <p><?php if (!is_front_page()) { the_field('description_4', 'option'); } ?></p>
    </div>
</div>