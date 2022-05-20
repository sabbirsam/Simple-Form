<!-- // echo "<script src=\"$this->plugin_url/assets/Public/modal-slider/jquery.min.js\"><script>";  -->
<!-- // echo "<script src=\"$this->plugin_url/assets/Public/modal-slider/script.js\"><script>";  -->

<?php 
    if ($select_category) :
        $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 8,
        'product_cat' =>  $select_category,
        'meta_query'  => array( array(
            'key'     => '_price',
            'value'   => array(1, 10000),
            'compare' => 'BETWEEN',
            'type'    => 'NUMERIC'
            ) ),
        );


        $loop = new WP_Query( $args );

        while ( $loop->have_posts() ) : $loop->the_post();
            global $product;

            
            $id = $loop->post->ID;
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), array('220','220'), true );
            
            $sale_price = $product->get_price();
            $regular_price = $product->get_regular_price();

            $saving_price = wc_price( $regular_price - $sale_price );

        ?>

<div class="container">
    <!--slider------------------->
    <ul id="autoWidth" class="sa">

        <li class="item-a">
            <!--slider-box-->
            <div class="box">
                <p class="marvel"><a href="<?php echo get_permalink()?>"><?php echo esc_html( get_the_title() ); ?></p>
                <div class="product__discount__percent marvel">SAVE: -<?php echo $saving_price; ?></div>
                <!--model-->
                <img class="model" src="<?php echo $image[0]; ?>">
                <!--details-->
                <div class="details">

                    <p> <?php echo get_woocommerce_currency_symbol() . $sale_price.".00"; ?><span><?php echo get_woocommerce_currency_symbol(). $product->get_regular_price(). ".00"; ?></span>
                    </p>
                    <p class="marvel"><a href="<?php echo get_permalink()?>">Visit</a></p>


                </div>
        </li>
        <?php
    endwhile;
?>
    </ul>
    <?php
    endif;
    wp_reset_query();
        ?>

</div>




<script>
(function($) {
    $('#autoWidth').lightSlider({
        autoWidth: true,
        loop: true,
        // item:1,
        onSliderLoad: function() {
            $('#autoWidth').removeClass('cS-hidden');
        }
    });
})(jQuery);
</script>


<?php
wp_reset_query();