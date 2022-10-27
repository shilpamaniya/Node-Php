<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>User Registration</h4>
                    </div>
                    <div class="card-body ">

                        <?php
                            $conn=mysqli_connect("localhost","root","shilpa1612","register_exam");
                            $query="select * from user";
                            $query_run=mysqli_query($conn,$query);
                        ?>



                        <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>FirstName</th>
                                        <th>LastName</th>
                                        <th>DoB</th>
                                        <th>Gender</th>
                                        <th>Email</th>
                                        <th>PhoneNo</th>
                                        <th>Address</th>
                                        <th>Image</th>

                                    </tr>
                                </thead>
                                <tbody>
                             

                                <?php
                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['fName']; ?></td>
                                            <td><?php echo $row['lName']; ?></td>
                                            <td><?php echo $row['DOB']; ?></td>
                                            <td><?php echo $row['gender']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['mobile_no']; ?></td>
                                            <td><?php echo $row['address']; ?></td>
                                            <!-- <td><?php echo $row['file']; ?></td> -->
                                            <td>
                                                <image src="<?php echo "upload/" .$row['file']; ?>" width="100px" alt="Image">
                                            </td>
                                           
                                            </tr>
                                            <?php
                                        }
                                        
                                    }
                                    
                                    else{
                                            ?>
                                            <tr>
                                                <td>no record available</td>
                                            </tr>
                                        <?php
                                    }

                                ?>

                                    <tr>
                                        <th></th>
                                    </tr>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
    
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</body>
</html>
