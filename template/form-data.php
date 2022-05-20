<section class="contact-info-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="contact-form">
                    <div class="col-lg-12">
                        <!-- <div class="card card-outline card-info"> -->
                            <div class="card-body">
                                <div class="sec-title-style1 float-left">
                                    <div class="text"><div class="decor-left"><span></span></div><p>Feel free to contact us. </p></div>
                                </div>
                                <table class="table table-hover table-bordered" id="list">
                                    <colgroup>
                                        <col width="5%">
                                        <col width="5%">
                                        <col width="15%">
                                        <!-- <col width="35%"> -->
                                        <col width="20%">
                                        <col width="10%">
                                    </colgroup>
                                    <thead>
                                        <tr class="form_data_json">
                                            <th>#</th>
                                            <th>Shortcode</th>
                                            <th>Form Name</th>
                                            <!-- <th>Json Data</th> -->
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
                                                        <th class="text-center"><?php echo $row->id; ?></th>
                                                        <th class="text-center"><?php echo $row->form_name; ?></th>
                                                        <!-- <th class="text-center"><?php echo $row->form_fields; ?></th> -->
                                                        <td class="form_data_json"><b><?php echo date("M d, Y",strtotime($row->time)) ?></b></td>
                                                        <!-- Action  -->
                                                        <td class="text-center">
                                                        <div class="m-4">
                                                            <div class="dropdown action_form">
                                                                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">Action</a>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="./index.php?page=edit_ticket&id=<?php echo $row->id ?>">Edit</a>
                                                                    <a class="dropdown-item delete_ticket" href="javascript:void(0)" data-id="<?php $row->id ?>">Delete</a>
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
                        <!-- </div> -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>