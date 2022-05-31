<div class="row">
    <div class="col-md-4 col-1">
        <span class="titre-rubrique"><?php the_field('titre_col_1', 'option'); ?></span>
        <?php 
        $image_1 = get_field('image_col_1', 'option');
        
        if( !empty($image_1) ): ?>
        	<img src="<?php echo $image_1['url']; ?>" alt="<?php echo $image_1['alt']; ?>" />
        <?php endif; ?>
    </div>
    
    <div class="col-md-4 col-2">
        <div class="elem clearfix">
            <span class="titre-rubrique"><?php the_field('titre_1_col_2', 'option'); ?></span>
            <?php 
            $image_2 = get_field('image_1_col_2', 'option');
            
            if( !empty($image_2) ): ?>
            	<img src="<?php echo $image_2['url']; ?>" alt="<?php echo $image_2['alt']; ?>" />
            <?php endif; ?>
        </div>

        <div class="elem">
            <?php 
            $image_3 = get_field('image_2_col_2', 'option');
            
            if( !empty($image_3) ): ?>
            	<img src="<?php echo $image_3['url']; ?>" alt="<?php echo $image_3['alt']; ?>" />
            <?php endif; ?>
            <span class="titre-rubrique"><?php the_field('titre_2_col_2', 'option'); ?></span>
        </div>
    </div>
    
    <div class="col-md-4 col-3">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 51.13 35.75"><defs><style>.cls-icon-1{fill:#fff;}.cls-icon-2{fill:#8F908D;}</style></defs><g><g><circle class="cls-icon-1" cx="34.27" cy="18.88" r="15.58"/><path class="cls-icon-2" d="M37.84,2.41A1,1,0,0,0,37.92,2V1.09A1.09,1.09,0,0,0,36.84,0H30.93a1.09,1.09,0,0,0-1.09,1.09V2a1.06,1.06,0,0,0,.18.56,16.84,16.84,0,1,0,7.82-.17ZM34.27,33.57A14.69,14.69,0,1,1,49,18.89,14.7,14.7,0,0,1,34.27,33.57Z"/><path class="cls-icon-2" d="M33.68,19.75l-7.14-4.12a1.1,1.1,0,0,1-.39-1.49,1.08,1.08,0,0,1,1.48-.4l7.14,4.13a1.08,1.08,0,0,1,.4,1.48,1.09,1.09,0,0,1-1.49.4"/><path class="cls-icon-2" d="M15.85,11H3.42a1.09,1.09,0,0,1,0-2.18H15.85a1.09,1.09,0,1,1,0,2.18"/><path class="cls-icon-2" d="M13.52,16.94H1.09a1.09,1.09,0,1,1,0-2.17H13.52a1.09,1.09,0,1,1,0,2.17"/><path class="cls-icon-2" d="M13.68,22.85H1.24a1.09,1.09,0,0,1,0-2.18H13.68a1.09,1.09,0,1,1,0,2.18"/><path class="cls-icon-2" d="M15.7,28.75H3.26a1.09,1.09,0,0,1,0-2.17H15.7a1.09,1.09,0,1,1,0,2.17"/></g></g></svg>
        <?php 
        $image_4 = get_field('image_col_3', 'option');
        
        if( !empty($image_4) ): ?>
        	<img src="<?php echo $image_4['url']; ?>" alt="<?php echo $image_4['alt']; ?>" />
        <?php endif; ?>
        <span class="titre-rubrique"><?php the_field('titre_col_3', 'option'); ?></span>
    </div>
</div>