<section class="contact-info-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="contact-form">
                    <div class="col-lg-12">
                            <div class="card-body">
                                <div class="sec-title-style1 float-left">
                                    <div class="text"><div class="decor-left"><span></span></div><p>Feel free to contact us. </p></div>
                                </div>
                                <table class="table table-hover table-bordered" id="list">
                                    <colgroup>
                                        <col width="5%">
                                        <col width="15%">
                                        <col width="15%">
                                        <col width="20%">
                                        <col width="10%">
                                    </colgroup>
                                    <thead>
                                        <tr class="form_data_json">
                                            <th>#</th>
                                            <th>Shortcode</th>
                                            <th>Form Name</th>
                                            <th>Date</th>
                                            <th>Action</th>  
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        $where = '';
                                        ?>
                                            <?php 
                                                global $wpdb;
                                                $table_name = $wpdb->prefix . 'simple_form_tables';
                                                $results = $wpdb->get_results("SELECT * FROM $table_name");
                                                foreach($results as $row)
                                                {
                                                    ?>
                                                        <tr>
                                                        <th class="text-center"><?php echo $i++ ?></th>
                                                        <th id="copy-id<?php echo $row->id?>" class="text-center click-to-copy"><?php echo "[sf_form id=".$row->id."]" ; ?></th>
                                                        <th class="text-center"><?php echo $row->form_name; ?></th>
                                                        <td class="form_data_json"><b><?php echo date("M d, Y",strtotime($row->time)) ?></b></td>
                                                        <!-- Action  -->
                                                        <td class="text-center">
                                                        <div class="m-4">
                                                            <div class="dropdown action_form">
                                                                <a class="dropdown-toggle" data-bs-toggle="dropdown">Action</a>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item js-open-modal" data-name="<?php echo $row->form_name ?>"  data-modal-id="popup" href="#" data-id="<?php echo $row->id ?>">Edit</a>                                                                   
                                                                    <a class="dropdown-item delete_ticket" data-id="<?php echo $row->id; ?>" data-nonce="<?php echo wp_create_nonce('sf_delete_post_nonce') ?>" data-modal-delete-id="popup" class="sd_delete-post" href="#" >Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </td>
                                                    <?php
                                                }
                                            ?>
                                        </tr>	
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="popup" class="modal-box">
        <header>
            <a href="#" class="js-modal-close close">??</a>
            <h3><a href="#">Edit</a> Fields</h3>
        </header>
        <div class="modal-body">
            <div id="build-wrap">
                <div class="col-md-8">
                    <div class="saveDataWrap create_field_save_btn" >
                        <input id="form_name" class="form-name" name="form_name" placeholder="Give a form name" type="text" AUTOCOMPLETE=OFF/>  
                        <button class="btn btn-primary js-open-modal saveData" id="saveData" type="button">Update</button>
                    </div>
                </div> 
            </div>
        </div>
        <footer>
            <div class="saveDataWrap d-grid gap-2 col-6 mx-auto" >
            </div>
        </footer>
    </div>