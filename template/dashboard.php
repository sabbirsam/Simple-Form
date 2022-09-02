<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="col-lg-12">
                    <div class="card-body">
                        <div class="sec-title-style1 float-left">
                            <div class="text"><div class="decor-left"><span></span></div><p>User Inputed Data </p></div>
                        </div>
                        
                        <div class="form-data-field" id="create_form_btn">
                            <div class="saveDataWrap" >
                            <a class="saveDataWrap_child" href="admin.php?page=create_form">Create Form</a>
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
                                    <th>#</th>
                                    <th>Id</th> 

                                    <th>Input</th> 
                                    <th>Number</th> 
                                    <!-- <th>Email</th>  -->
                                    <th>Textarea</th> 
                                    <th>Select</th> 
                                    <!-- <th>Checkbox</th>  -->
                                    <th>Date</th> 
                                    <!-- <th>File</th>  -->

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
                                        $table_name = $wpdb->prefix . 'simple_form_tables_values';
                                        $results = $wpdb->get_results("SELECT * FROM $table_name");

                                        foreach($results as $row => $values)
                                        {
                                            $jdata= json_decode($values->form_fields , true);
                                            ?>
                                                <tr>
                                                <th class="text-center"><?php echo $i++ ?></th>
                                                <th class="text-center"><?php echo $values->id; ?></th>

                                                <th class="text-center"><?php if(!$jdata['input']){$jdata['input'] = array();} foreach($jdata['input'] as $input_key=>$input_val){print_r($input_val."<br>");} ?></th>
                                                <th class="text-center"><?php if(!$jdata['number']){$jdata['number'] = array();} foreach($jdata['number'] as $input_key=>$input_val){print_r($input_val."<br>");} ?></th>
                                                <!-- <th class="text-center"><?php if(!$jdata['email']){$jdata['email'] = array();} foreach($jdata['email'] as $input_key=>$input_val){print_r($input_val."<br>");} ?></th> -->
                                                <th class="text-center"><?php if(!$jdata['textarea']){$jdata['textarea'] = array();} foreach($jdata['textarea'] as $input_key=>$input_val){print_r($input_val."<br>");} ?></th>
                                                <th class="text-center"><?php if(!$jdata['select']){$jdata['select'] = array();} foreach($jdata['select'] as $input_key=>$input_val){print_r($input_val."<br>");} ?></th>
                                                <!-- <th class="text-center"><?php if(!$jdata['checkbox']){$jdata['checkbox'] = array();} foreach($jdata['checkbox'] as $input_key=>$input_val){print_r($input_val."<br>");} ?></th> -->
                                                <th class="text-center"><?php if(!$jdata['date']){$jdata['date'] = array();} foreach($jdata['date'] as $input_key=>$input_val){echo ($input_val."<br>");} ?></th>
                                                <!-- <th class="text-center"><?php if(!$jdata['myfile']){$jdata['myfile'] = array();} foreach($jdata['myfile'] as $input_key=>$input_val){print_r($input_val."<br>");} ?></th> -->
                                                
                                                <td class="form_data_json"><b><?php echo date("M d, Y",strtotime($values->time)) ?></b></td>
                                                <td class="text-center">
                                                <div class="m-4">
                                                    <div class="dropdown action_form">
                                                        <a class="dropdown-toggle" data-bs-toggle="dropdown">Action</a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="admin.php?page=simple_form&id=<?php echo $values->id ?>">View</a>
                                                            <a class="dropdown-item delete_ticket" data-id="<?php echo $values->id; ?>" data-nonce="<?php echo wp_create_nonce('sf_delete_post_nonce') ?>" data-modal-delete-id="popup" class="sd_delete-post" href="#" >Delete</a>
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

