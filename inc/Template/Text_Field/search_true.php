<?php
/**
 * Main: text subtype = tel and required true
 */


//  get_search_form(); // this one is used as search on full area

?>
<div class="search_by_cat_input">
    <div class="grid-containerss">
        <div class="grid-itemss">
            <form role="search" method="get" action="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>">
                            <!-- With this hidden input you can define a specific post type. -->
                        
                        <div class="hero__search__categories">
                            <select class="woodpress_cat" name="category">
                        <!-- Insert here all option tags you want, with category slug as value -->

                        <?php 

                        $orderby = 'name';
                        $order = 'asc';
                        $hide_empty = false ;
                        $cat_args = array(
                            'orderby'    => $orderby,
                            'order'      => $order,
                            'hide_empty' => $hide_empty,
                        );

                        $product_categories = get_terms( 'product_cat', $cat_args );
                        if( !empty($product_categories) ){

                            ?>
                            <option value="*">Select</option>
                            <?php
                        
                            foreach ($product_categories as $key => $category) {
                                
                                ?>
                                
                                <option value="<?php echo esc_attr( $category->slug ); ?>"><?php echo esc_html( $category->name ); ?></option>
                                
                                <?php
                            }
                
                        }						
                        
                    ?>

                    </select>
                </div>

                <div class="search_with_input">
                    <input type="hidden" name="post_type" value="product" />
                    <!-- <input type="hidden" name="post_type" value="<?php echo get_search_query(); ?>" /> -->
                    <input name="s" type="text" placeholder="<?php _e( "What do yo u need?", "woodpress")?>" />

                </div>
                <button type="submit" class="site-btn"><i class="fa fa-search"><?php _e( "SEARCH", "woodpress")?></button>
            </form>
        </div>
    </div>

</div>