<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <title>Hello, world!</title>
  </head>
  <body>
  <h1 style="text-align: center;">edit details</h1>
<table id="myTable" class="table table-bordered">
    <thead>
        <tr>
            <th>S.N</th>
            <th>note</th>
            <th></th>
            <th></th>
            <th></th>

        </tr>
    </thead>
    <tbody>  

     <?php $questions = $this->db->get('notes')->result();?>
                   
        <?php 
        foreach($questions as $question)
        { ?>
        
        <tr>
           <!--  <?php print_r($question); ?> -->
            <!-- <br> -->
            <!-- <input type="hidden" name="questionid[]" value="<?php echo $question->sn ?>"> -->
            
            <td><?php echo $question->sn ?></td>
            <td><?php echo $question->textarea?></td> 
            <td><a href="<?php echo base_url('notecontroller/viewcontroller/'); ?><?php echo $question->sn ?>"><button name="view<?php echo $question->sn ?>">view</button></a></td>
            <td><a href="<?php echo base_url('notecontroller/editview/'); ?><?php echo $question->sn ?>"><button name="edit<?php echo $question->sn ?>">edit</button></a></td>
            <td><a href="<?php echo base_url('notecontroller/deletecontroller/'); ?><?php echo $question->sn ?>"><button name="delete<?php echo $question->sn ?>">delete</button></a></td>
            
        </tr>
     

       
    <?php } ?>


    
    </tbody>

 
     
</table>


  </body>
</html>