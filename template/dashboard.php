<section class="contact-info-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="col-lg-12">
                                <div class="card-body">
                                    <div class="sec-title-style1 float-left">
                                        <div class="text"><div class="decor-left"><span></span></div><p>User Inputed Data </p></div>
                                    </div>
                                    <table class="table table-hover table-bordered" id="list">
                                        <colgroup>
                                            <col width="5%">
                                            <col width="5%">
                                            <col width="50%">
                                            <col width="12%">
                                            <col width="8%">
                                        </colgroup>
                                        <thead>
                                            <tr class="form_data_json">
                                                <th>#</th>
                                                <th>Id</th> 
                                                <th>Form Fields</th> 
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
                                                        ?>
                                                            <tr>
                                                            <th class="text-center"><?php echo $i++ ?></th>
                                                            <th class="text-center"><?php echo $values->id; ?></th>
                                                            <th class="text-center"><?php 
                                                                $myArray = explode(',', $values->form_fields);
                                                                foreach($myArray as $key => $val) {
                                                                    ?>
                                                                    <table>
                                                                        <th class="user_input"><?php 
                                                                        $search = ':false'.$val;
                                                                        $exploded = preg_replace('/[^a-zA-Z0-9_: -]/s',' ',$val);
                                                                        echo $exploded;
                                                                        ?></th>
                                                                    </table>
                                                                    <?php    
                                                                }
                                                            ?></th>
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
        </div>
    </div>
</section>
