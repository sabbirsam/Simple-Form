<section class="contact-info-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <!-- <div class="contact-form"> -->
                        <div class="col-lg-12">
                            <!-- <div class="card card-outline card-info"> -->
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
                                                            <!-- <th class="text-center"><?php echo $values->form_fields; ?></th> -->

                                                            <th class="text-center"><?php 
                                                                $myArray = explode(',', $values->form_fields);
                                                                // print_r( $myArray);
                                                                foreach($myArray as $key => $val) {
                                                                    // var_dump($val);
                                                                    ?>
                                                                    <table>
                                                                        <!-- <th><?php echo $val; ?></th> -->
                                                                        <th class="user_input"><?php 
                                                                        // $exploded = preg_replace('/[^a-zA-Z0-9_: -]/s',' ',$val);
                                                                        $search = ':false'.$val;
                                                                        $exploded = preg_replace('/[^a-zA-Z0-9_: -]/s',' ',$val);
                                                                        echo $exploded; // best 


                                                                        // $blacklist = ":false|: ";
                                                                        $blacklist = ":false";
                                                                        if(preg_match("/($blacklist)/", $exploded)) {
                                                                        //    echo "Found";
                                                                           echo '<script type="text/javascript"> 
                                                                       
                                                                          var c = Array.from(document.querySelectorAll("th.user_input")).map(x => x.innerText)
                                                                          console.log(c); 
                                                                          if(c[12] == "input") {
                                                                            Array.from(document.getElementsByClassName("th.user_input").style.display) = "none";
                                                                        }
                                                                        
                                                                            </script>'; 
                                                                           
                                                                        }
                                                                        // echo $exploded;



                                                                        $exp = preg_replace("(:false)", "",  $exploded);
                                                                        // echo $exp; // best 

                                                                        

                                                                        ?></th>
                                                                    </table>
                                                                    <?php
                                                                    
                                                                }
                                                            ?></th>

                                                            <td class="form_data_json"><b><?php echo date("M d, Y",strtotime($values->time)) ?></b></td>
                                                            <!-- Action  -->
                                                            <td class="text-center">
                                                            <div class="m-4">
                                                                <div class="dropdown action_form">
                                                                    <!-- <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">Action</a> -->
                                                                    <a class="dropdown-toggle" data-bs-toggle="dropdown">Action</a>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="./index.php?page=edit_ticket&id=<?php echo $values->id ?>">Edit</a>
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
                            <!-- </div> -->
                        </div>
                    <!-- </div> -->
                
            </div>

        </div>
    </div>
</section>



<?php
// $keys   = array_keys($myArray);
// $values = array_values($myArray);
// print_r($keys. "  ". $values);


// foreach($values as $name => $val){
//     $StringData = $val;
    // print_r($jsonData);
    // var_dump($jsonData);
    // echo gettype($jsonData);// its an string
    
    // $pieces = explode("=", $StringData);
    // var_dump($pieces);

    // $exploded = preg_split('/ (=|,) /', $StringData);
    // echo gettype($var1)."\n";

    echo '<pre>';
    // var_dump($exploded);
    echo '</pre>';
    
    // print_r($result);
    // foreach($result as $key => $val) {
    //     var_dump($key);
    //     foreach($val as $_key => $_val) {
    //      echo 'VALUE IS: '.$_val.'<br/>';
    //     }
    //   }
    

