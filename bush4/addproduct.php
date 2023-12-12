<?php
include('includes/header.php');
include('includes/sidebar.php');
include('includes/topbar.php');
include('config.php');



if(isset($_POST['addcat'])){
    $catname = $_POST['catname'];

    $insertcat = "INSERT INTO `category` ( `catname`) VALUES ( '$catname')";

    $result = mysqli_query($connection , $insertcat);
    if($result){
        echo '<script>
        alert("category inserted");
        window.location.href="addproduct.php"
        </script>';
    }
   

}

?>


    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

        <!-- ..............ADD CATEGORY.......... -->

<form action="<?php echo $_SERVER['PHP_SELF'];?>"  method="POST" enctype ="multipart/form-data">

<div class="col-sm-8 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                        placeholder="category name" name="catname" required>
                

                        
                        <input type="submit" class="btn btn-primary btn-user btn-block" name="addcat" value="ADD Category" >

                      </div>
                    </form>

        <!-- ......ADD PRODUCT program....... -->

            <div class="col-xl-10 col-lg-12 col-md-9">
                <h2>Add product</h2>
                <hr>
        <form class="user" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype ="multipart/form-data">
            <div class="form-group row">

            <div class="col-sm-6 mb-3 mb-sm-0">

            <select class="form-select" name="category" aria-label="Default select example">

            <?php
            
            $fetch_cat = "SELECT * from `category`";
            $result = mysqli_query($connection , $fetch_cat);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){

                    echo'<option value="'.$row['catid'].'"> '.$row['catname'].' </option>';

                }
            }
            
            ?>
          
  
</select>
</div>
            
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                        placeholder="product Name" name="FirstName" required>
                </div>
                <div class="col-sm-12">
                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                        placeholder="description " name="pdes" required>
                 </div>
            </div>
            <div class="form-group">
                <input type="file" class="form-control form-control-user" id="exampleInputEmail"
                    name="image" required>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user"
                        id="exampleInputPassword" placeholder="price" name="price" required>
                </div>
                
            </div>
            <!-- <a class="btn btn-primary btn-user btn-block" name="register">
                Register Account
            </a> -->
            <input type="submit" class="btn btn-primary btn-user btn-block" name="addproduct" value="ADD product" >
            
           
                                
        </form>

            </div>

        </div>

    </div>


</body>

</html>










<?php
include('includes/footer.php');


?>