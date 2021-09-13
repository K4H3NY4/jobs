
<?php require('../config/db.php');

session_start();
if(!isset($_SESSION["id"])){
    header("Location: login.php");
    exit(); } 
    else if(isset($_SESSION["id"])){
       $customerId = $_SESSION['id'];
       $taskid =$_SESSION['taskid'];
       $profid = 0;
    }

  

$queryComment = "SELECT * FROM comments WHERE `task-id` = '$taskid' ORDER BY `id` DESC ";
$resultComment = mysqli_query($db,$queryComment);
$comments = mysqli_fetch_all($resultComment, MYSQLI_ASSOC);
mysqli_free_result($resultComment);


?>


<?php foreach ( $comments as $comment) :?>
     <div class="media mb-4"> 
    <div class="mr-3">
    </div>
   
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
        <span class="text-success small">   <?php echo $comment["date-created"] ; ?></span>

        <?php   
        if(  $customerId == $comment['customer-id']){
                echo('
<form action="" method="post"><input type="hidden" value="');echo $comment['id'];echo('" name="commentDeleteId">     
<button class="small text-danger btn btn-sm btn-outline-danger" type="submit" name="commentDelete">Delete</button> 
</form>
                
                
                
            ');
            }else{}
            ?>
    </div>
</div>

    
<?php endforeach ?>

                        
