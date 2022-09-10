<section class="contact-info-area">
    <div class="container">
        <div class="row">
            <!-- remove above for full width table  -->

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="col-lg-12">
                    <div class="card-body">
                        <div class="sec-title-style1 float-left">
                            <div class="text">
                                <div class="decor-left"><span></span></div>
                                <p><?php _e("User Inputed Data","simple_form");?> </p>
                            </div>
                        </div>

                        <div class="form-data-field" id="create_form_btn">
                            <div class="saveDataWrap">
                                <a class="saveDataWrap_child"
                                    href="admin.php?page=create_form"><?php _e("Create Form","simple_form");?></a>
                            </div>
                        </div>

                        <table class="table table-hover table-bordered" id="list">
                            <colgroup>
                                <col width="5%">
                                <col width="5%">
                                <col width="30%">
                                <col width="15%">
                                <!-- <col width="20%"> -->
                                <col width="30%">
                                <col width="8%">
                                <!-- <col width="20%"> -->
                                <col width="20%">
                                <!-- <col width="20%"> -->
                                <col width="12%">
                                <col width="8%">
                            </colgroup>
                            <thead>
                                <tr class="form_data_json">
                                    <th><?php _e("#","simple_form");?></th>
                                    <th><?php _e("Id","simple_form");?></th>

                                    <th><?php _e("Input","simple_form");?></th>
                                    <th><?php _e("Number","simple_form");?></th>
                                    <!-- <th>Email</th>  -->
                                    <th><?php _e("Textarea","simple_form");?></th>
                                    <th><?php _e("Select","simple_form");?></th>
                                    <!-- <th>Checkbox</th>  -->
                                    <th><?php _e("Selected Date","simple_form");?></th>
                                    <!-- <th>File</th>  -->

                                    <th><?php _e("Submission Date","simple_form");?></th>
                                    <th><?php _e("Action","simple_form");?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $where = '';
                                ?>
                                <?php 
                                        global $wpdb;
                                        $table_name = $wpdb->prefix . 'simple_form_tables_values';
                                        $results = $wpdb->get_results("SELECT * FROM $table_name");

                                        foreach($results as $row => $values)
                                        {
                                            $jdata= json_decode($values->form_fields , true);
                                            ?>
                                <tr>
                                    <th class="text-center"><?php echo esc_html($i++) ?></th>
                                    <th class="text-center"><?php echo esc_html($values->id); ?></th>

                                    <th class="text-center">
                                        <?php if(!$jdata['input']){$jdata['input'] = array();} foreach($jdata['input'] as $input_key=>$input_val){print_r($input_val."<br>");} ?>
                                    </th>
                                    <th class="text-center">
                                        <?php if(!$jdata['number']){$jdata['number'] = array();} foreach($jdata['number'] as $input_key=>$input_val){print_r($input_val."<br>");} ?>
                                    </th>
                                    <!-- <th class="text-center"><?php if(!$jdata['email']){$jdata['email'] = array();} foreach($jdata['email'] as $input_key=>$input_val){print_r($input_val."<br>");} ?></th> -->
                                    <th class="text-center">
                                        <?php if(!$jdata['textarea']){$jdata['textarea'] = array();} foreach($jdata['textarea'] as $input_key=>$input_val){print_r($input_val."<br>");} ?>
                                    </th>
                                    <th class="text-center">
                                        <?php if(!$jdata['select']){$jdata['select'] = array();} foreach($jdata['select'] as $input_key=>$input_val){print_r($input_val."<br>");} ?>
                                    </th>
                                    <!-- <th class="text-center"><?php if(!$jdata['checkbox']){$jdata['checkbox'] = array();} foreach($jdata['checkbox'] as $input_key=>$input_val){print_r($input_val."<br>");} ?></th> -->
                                    <th class="text-center">
                                        <?php if(!$jdata['date']){$jdata['date'] = array();} foreach($jdata['date'] as $input_key=>$input_val){echo (esc_html($input_val)."<br>");} ?>
                                    </th>
                                    <!-- <th class="text-center"><?php if(!$jdata['myfile']){$jdata['myfile'] = array();} foreach($jdata['myfile'] as $input_key=>$input_val){print_r($input_val."<br>");} ?></th> -->

                                    <td class="form_data_json">
                                        <b><?php echo date("M d, Y",strtotime(esc_html($values->time))) ?></b>
                                    </td>
                                    <td class="text-center">
                                        <div class="m-4">
                                            <div class="dropdown action_form">
                                                <!-- <a class="dropdown-toggle" data-bs-toggle="dropdown">Action</a> -->
                                                <button class="btn btn-primary dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <?php _e("Action","simple_form");?>
                                                </button>

                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="admin.php?page=simple_form&id=<?php echo esc_html($values->id) ?>"><?php _e("View","simple_form");?></a>
                                                    <a class="dropdown-item delete_ticket"
                                                        data-id="<?php echo esc_html($values->id); ?>"
                                                        data-nonce="<?php echo wp_create_nonce('SFSF_delete_post_nonce') ?>"
                                                        data-modal-delete-id="popup" class="sd_delete-post"
                                                        href="#"><?php _e("Delete","simple_form");?></a>
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
</section>