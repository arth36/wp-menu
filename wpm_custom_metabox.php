<?php

/**************************************************
    * creating the custom metabox
***************************************************/

function wpm_custom_metabox(){

    add_meta_box(
        'wpm_meta_box',
        __('Item Information', 'wp-book'),
        'wpm_meta_callback',
        'item'
    );

}

add_action( 'add_meta_boxes', 'wpm_custom_metabox' );

function wpm_meta_callback( $post ){

    /**************************************************
        * getting metadata from database
    ***************************************************/
    
    $wpm_price = get_metadata( 'item', $post->ID, 'price', $single = true );
    $wpm_vegnonveg = get_metadata('item', $post->ID, 'veg_nonveg', $single=true);
    echo $wpm_price;
    echo $wpm_vegnonveg;
    
    ?>

    <div>

        <div class="meta-row">
            <div class="meta-th">
                <label for="price" class="wpm-row-title">Price: </label>
            </div>
            <div class="meta-td">
                <input type="number" name="price" id="price" placeholder="Enter Item Price" value="<?php echo esc_attr( $wpm_price ); ?>"/>
            </div>
            <br />
            <?php
                $value = get_post_meta( $post->ID,'item',true );
            ?>
            <div class="meta-th">
                <label for="veg_nonveg"><?php _e( "Veg Or Non-Veg:", 'veg_nonveg' ); ?></label>
                <br />  
                <input type="radio" name="veg_nonveg" value="veg" <?php checked( $wpm_vegnonveg, 'veg' ); ?> />Veg<br>
                <input type="radio" name="veg_nonveg" value="nonveg" <?php checked( $wpm_vegnonveg, 'nonveg' ); ?> />Non Veg<br>
            </div>
        </div>
        
        <?php wp_nonce_field( 'wpm_custom_menu_info_nonce', 'wpm_menu_info_nonce' ); ?>

    </div>
    <?php
}

/**************************************************
    * storing the metadata to the database
***************************************************/

function wpm_custom_menu_info_nonce( $post_id ){
    
    if( ! isset( $_POST['wpm_menu_info_nonce'] ) || ! wp_verify_nonce( $_POST['wpm_menu_info_nonce'], 'wpm_custom_menu_info_nonce' ) ){
        return $post_id;
    }

    if( isset( $_POST['price'] ) ){
        update_metadata('item', $post_id, 'price', sanitize_text_field($_POST['price']) );
    }

    if( isset( $_POST['veg_nonveg'] ) ){
        update_metadata('item', $post_id, 'veg_nonveg', sanitize_text_field($_POST['veg_nonveg']) );
    }
}
add_action( 'save_post', 'wpm_custom_menu_info_nonce' );