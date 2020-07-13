<?php

// $custom_terms = get_terms('item_category');

// foreach($custom_terms as $custom_term) {
//     wp_reset_query();
//     $args = array('post_type' => 'item',
//         'tax_query' => array(
//             array(
//                 'taxonomy' => 'item_category',
//                 'field' => 'slug',
//                 'terms' => $custom_term->slug,
//             ),
//         ),
//      );

//      $loop = new WP_Query($args);
//      if($loop->have_posts()) {
//         echo '<h2>'.$custom_term->name.'</h2>';

//         while($loop->have_posts()) : $loop->the_post();
//             echo '<a href="'.get_permalink().'">'.get_the_title().'</a><br>';
//             $wpm_info_price = get_metadata( 'item', get_the_id(), 'price' )[0];
//             echo $wpm_info_price;
//             $wpm_info_veg_nonveg = get_metadata( 'item', get_the_id(), 'veg_nonveg' )[0];
//             echo $wpm_info_veg_nonveg;
//         endwhile;
//      }
// }

?>
<html>
    <head>
        <meta charset="utf-8">
        <?php wp_head(); ?>
    </head>
    <body>
    <?php
        $table_cats = get_terms('table_category');
        ?>
        <div class="hello">
            <?php
        foreach($table_cats as $table_cat) {
            wp_reset_query();
            $args = array('post_type' => 'table',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'table_category',
                        'field' => 'slug',
                        'terms' => $table_cat->slug,
                    ),
                ),
            );
            $loop = new WP_Query($args);
            ?>
            <?php
            
            if($loop->have_posts()) {
                ?>    
                <div class="hi">
                    <?php
                        echo '<h2>'.$table_cat->name.'</h2>';  
                        while($loop->have_posts()) : $loop->the_post();
                            echo '<p>'.get_the_title().'</><br>';
                        endwhile;
                     }
                     ?>
                    </div>
                    <?php
                }
                ?>
                </div>
        
                <?php
    ?>
    <?php
        $custom_terms = get_terms('item_category');
        $j=1;
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
    ?>
        <div class="dropdown-list" id="on" rel="dropdown-list<?php echo $i;?>">
		    <div class="prouct-list">
			    <span class="inner-category">
                    <?php
                    if($loop->have_posts()) {
                        echo '<h4>'.$custom_term->name.'</h4>';
                    ?>
			        </span>
			    <i><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/bottom-arrow.svg" alt=""></i>
            </div>
            <?php
                while($loop->have_posts()) : $loop->the_post();     
            ?>
		        <div class="product-container">
			        <label class="container">
			            <input type="radio" checked="checked" name="radio">
			            <span class="checkmark"></span>
			        </label>
			        <span class="inner-category">
                    <?php
                        echo '<h4>'.get_the_title().'</h4>';
                        $wpm_info_price = get_metadata( 'item', get_the_id(), 'price' )[0];
                        echo '<p>'.$wpm_info_price.'</p>';
                    ?>
			        </span>
			        <div class="input-group">
                        <div class="input-group-btn">
                            <button id="down" class="btn btn-default" onclick="down('0',<?php echo $j?>)">
                                <i><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/minus.svg" alt=""></i>
                            </button>
                        </div>
                        <p id="myNumber<?php echo $j; ?>" class="form-control input-number">0</p>
                        <div class="input-group-btn">
                            <button id="up" class="btn btn-default" onclick="up('10',<?php echo $j?>)">
                                <i><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/plus.svg" alt=""></i>
                            </button>
                        </div>
                    </div>
                </div>
                <?php
                $j++;
                    endwhile;
                    $i++;
                }
                ?>
        </div>
                <?php
            }
                ?>
            <div>
                <input type="text" id="otpinput"/>
                <script>
                var bla = jQuery('#otpinput').val();
                </script>
                <p onclick="done('13',bla)">Total items are: <span id="total">0</span></p>
            </div>
    </body>
</html>