<?php
/*
require('config/db.php');


if(!isset($_SESSION["id"])){
    $customerId = 0;
    $profid = $_SESSION['profid'];

} else if(isset($_SESSION["id"])){
   
    $customerId = $_SESSION['id'];
   $profid = 0;

} else{}


$queryComment = "SELECT * FROM comments WHERE `task-id` = '$id' ORDER BY `id` DESC ";
$resultComment = mysqli_query($db,$queryComment);
$comments = mysqli_fetch_all($resultComment, MYSQLI_ASSOC);



if(isset($_POST['commentAdd'])){

    $comment = mysqli_real_escape_string($db, $_POST['comment']);

    
    
    $sql = "INSERT INTO `comments` SET
    `task-id` = '$id',
    `comment`='{$_POST['comment']}' ,
    `prof-id`= '$profid',
    `customer-id`='$customerId'
 ";
    
    
    $db->query($sql);
    if($db->error){
    echo $db->error;
    }else{
    ($sql);
        header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
    
    }
    
    
    }

*/

?>


                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Comments</h4>

                                        <form action="" method="post" class="row mb-3">
                                        <input type="text" placeholder="Add Comment" name="comment" class="form-control w-75 ml-3"> 
                                        <button class="btn btn-sm btn-primary ml-3" type="submit" name="commentAdd">Comment</button>
                                        </form>

                                        <?php foreach ( $comments as $comment) :?>
                                       
                                        <?php
                                               
                                               $queryCommentCustomer = 'SELECT * FROM customer WHERE `id` = '.$comment['customer-id']; 
                                               $resultCommentCustomer = mysqli_query($db,$queryCommentCustomer);
                                               $commentsCustomer = mysqli_fetch_assoc($resultCommentCustomer);
                                               mysqli_free_result($resultCommentCustomer);

                                               $queryCommentProf = 'SELECT * FROM prof WHERE `id` ='.$comment['prof-id']; 
                                               $resultCommentProf = mysqli_query($db,$queryCommentProf);
                                               $commentsProf= mysqli_fetch_assoc($resultCommentProf);
                                               mysqli_free_result($resultCommentProf);
                                                                           
                                
                                                ?>


                                             <div class="media mb-4">
                                            <div class="mr-3">
                                            

                                            </div>
                                            <div class="media-body">
                                                <h5 class="font-size-13 mb-1 text-capitalize">
                                                <?php
                                                if ($comment['customer-id'] > 0  && $comment['prof-id'] == 0 ){
                                                    echo $commentsCustomer["first-name"] ;
                                                    echo(' ');
                                                    echo $commentsCustomer["last-name"] ; 

                                                }else if ($comment['prof-id'] > 0  && $comment['customer-id'] == 0 ){
                                                    echo $commentsProf["first-name"] ;
                                                    echo(' ');
                                                    echo $commentsProf["last-name"] ; 

                                                }else{}                                          

                                                ?>
                                                </h5>
                                                <p class="text-muted mb-1">
                                                    <?php echo $comment["comment"] ; ?>
                                                </p>
                                            </div>
                                            <div class="ml-3">
                                                <span class="text-primary small">   <?php echo $comment["date-created"] ; ?></span>
                                            </div>
                                        </div>

                                            
                                      <?php endforeach ?>
        
                                        
                                    </div>
                                </div>
                            </div>