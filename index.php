<?php

$custom_terms = get_terms('item_category');

foreach($custom_terms as $custom_term) {
    wp_reset_query();
    $args = array('post_type' => 'item',
        'tax_query' => array(
            array(
                'taxonomy' => 'item_category',
                'field' => 'slug',
                'terms' => $custom_term->slug,
            ),
        ),
     );

     $loop = new WP_Query($args);
     if($loop->have_posts()) {
        echo '<h2>'.$custom_term->name.'</h2>';

        while($loop->have_posts()) : $loop->the_post();
            echo '<a href="'.get_permalink().'">'.get_the_title().'</a><br>';
            $wpm_info_price = get_metadata( 'item', get_the_id(), 'price' )[0];
            echo $wpm_info_price;
            $wpm_info_veg_nonveg = get_metadata( 'item', get_the_id(), 'veg_nonveg' )[0];
            echo $wpm_info_veg_nonveg;
        endwhile;
     }
}