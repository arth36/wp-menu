<?php

/**************************************************
    * creating the custom metabox
***************************************************/

function wpm_table_metabox(){

    add_meta_box(
        'wpm_meta_box',
        __('Table Information', 'wp-book'),
        'wpm_table_meta_callback',
        'table'
    );

}

add_action( 'add_meta_boxes', 'wpm_table_metabox' );

function wpm_table_meta_callback( $post ){

    /**************************************************
        * getting metadata from database
    ***************************************************/
    
    // $wpm_price = get_metadata( 'item', $post->ID, 'price', $single = true );
    // $wpm_vegnonveg = get_metadata('item', $post->ID, 'veg_nonveg', $single=true);
    // echo $wpm_price;
    // echo $wpm_vegnonveg;
    
    ?>

    <div>
        <form method="post">
            <div class="meta-row">
                <div class="meta-th">
                    <button OnClick="GetRandom()" class="button-primary" type="button">generate OTP</button>
                    <p id="pwbx"></p>
                    <script>
                    function GetRandom(){
                        var myElement = document.getElementById("pwbx");
                        var Element = myElement.innerHTML;
                        var value = Math.floor(1000 + Math.random() * 9000);
                        myElement.innerHTML=value;
                    }
                </script>
                </div>
            </div>
        </form>
        
        <?php wp_nonce_field( 'wpm_custom_table_info_nonce', 'wpm_table_info_nonce' ); ?>

    </div>
    <?php
}

/**************************************************
    * storing the metadata to the database
***************************************************/

function wpm_custom_table_info_nonce( $post_id ){
    
    if( ! isset( $_POST['wpm_table_info_nonce'] ) || ! wp_verify_nonce( $_POST['wpm_table_info_nonce'], 'wpm_custom_table_info_nonce' ) ){
        return $post_id;
    }

    if( isset( $_POST['price'] ) ){
        update_metadata('table', $post_id, 'price', sanitize_text_field($_POST['price']) );
    }

}
add_action( 'save_post', 'wpm_custom_table_info_nonce' );