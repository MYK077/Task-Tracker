<?php

include_once ('function.php');

error_reporting(0);

$json = file_get_contents('data.json');

$response['success'] = 0 ;

$data = json_decode($json,1);

krsort($data);



         switch($_GET['mode']){

            
            case "reactivate":

              $id = $_GET['id'];
            
              $data[$id]['status']= 1;
            
              save($data); 
            
            break;

            case "remove":

              $id = $_GET['id'];
            
              $data[$id]['status']= 2;
            
              save($data); 
            
            break;

            case "stop":

              $id = $_GET['id'];
            
              $data[$id]['date_end']= time();
            
              save($data); 
            
            break;

            case "new":

              $time = time();

              $data[$time]['id'] = $time;

              $data[$time]['name']= $_GET['name'];

              $data[$time]['date_start']=$time;

              $data[$time]['date_end']= '';

              $data[$time]['status']= 1;

              $is_return = save($data);
            
              $response['success'] = $is_return;

            echo json_encode($response);



            break;

            case "tally":

            $count = 0;

                foreach ($data as $task) {

                        if($task['status']==1){
                
                        $count = $count + time()- $task['date_start'];

                        
                }
            }

                echo time_nice(abs($count));
            

            break;

            case "build":

    		foreach ($data as $task) { 

                if($task['status'] == 1) {
                ?>



    			<tr>

    			 <td> <?php echo $task['name']; ?> </td>

    			 <td> <?php echo date_nice($task['date_start']); ?> </td>

                 <td> 

                         <?php if($task['date_end'] !=""){

                                 echo date_nice($task['date_end']) ;

                         }

                         ?> 

                 </td>

    			 <td> 

                        <?php if($task['date_end']==""){
                        
                                 echo time_nice(time()- $task['date_start']);
                 
                            } 
                              else{

                                echo time_nice($task['date_end']- $task['date_start']);

                            } ?>
                        
                </td>

    			 

    			 <!-- <td class="btn-col"><button type="submit" data-id="<?php echo $task['id']; ?>" class="btn btn-primary btn-stop" id="btn-disable" <?php if($task['date_end'] != '') { ?>disabled <?php }?> >Stop</button></td> -->


                 <td class="btn-col"><button type="submit" data-id="<?php echo $task['id']; ?>" class="btn btn-primary btn-stop btn-disable">Stop</button></td>

    			 <td class="btn-col"><button data-id="<?php echo $task['id']; ?>" class="btn btn-danger btn-remove"><strong>X</strong></button></td> 

    		    </tr>
    		  
             <?php } } 

             break;


             case "restore":

            foreach ($data as $task) { 

                if($task['status'] == 2) {
                ?>



                <tr>

                 <td> <?php echo $task['name']; ?> </td>

                 <td> <?php echo date_nice($task['date_start']); ?> </td>

                 <td> 

                         <?php if($task['date_end'] !=""){

                                 echo date_nice($task['date_end']) ;

                         }

                         ?> 

                 </td>

                 <td> 

                        <?php if($task['date_end']==""){
                        
                                 echo time_nice(time()- $task['date_start']);
                 
                            } 
                              else{

                                echo time_nice($task['date_end']- $task['date_start']);

                            } ?>
                        
                </td>

                 

                 <td class="btn-col"></td>

                 <td class="btn-col"><button data-id="<?php echo $task['id']; ?>" class="btn btn-danger btn-restore"><strong>R</strong></button></td> 

                </tr>
              
             <?php } } 

             break;


               } ?>


    





