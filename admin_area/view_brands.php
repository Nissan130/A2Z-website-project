<h3 class="text-center text-success">All Brands</h3>

<table class="table table-bordered mt-5">
    <thead class="table-info">
        <tr class="text-center">
            <th>SL No</th>
            <th>Brand ID</th>
            <th>Brand title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="table-secondary">
        <?php

            $select_brand="SELECT * FROM brands";
            $result=mysqli_query($con,$select_brand);
            $number=0;
            while($row=mysqli_fetch_assoc($result)){
                $brand_id=$row['brand_id'];
                $brand_title=$row['brand_title'];
                $number++;
        ?>
        <tr class="text-center">
            <td><?php echo $number;?></td>
            <td><?php echo $brand_id;?></td>
            <td><?php echo $brand_title;?></td>

            <!-- edit icon  -->
            <td><a href='index.php?edit_brands=<?php echo $brand_id;?>' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>

            <!-- delete icon  -->
            <td><a href='index.php?delete_brands=<?php echo $brand_id;?>' 
            type="button" class="text-dark" data-toggle="modal" data-target="#exampleModal<?php echo $brand_id; ?>"><i class='fa-solid fa-trash'></i></a></td>
        </tr>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal<?php echo $brand_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?php echo $brand_id; ?>" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <h4>Are you sure want to delete this?</h4>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_brands" class="text-light text-decoration-none">No</a></button>
                <button type="button" class="btn btn-primary"><a href="index.php?delete_brands=<?php echo $brand_id?>" class="text-light text-decoration-none">Yes</a></button>
              </div>
            </div>
          </div>
        </div>
        <?php
            }?>
    </tbody>
</table>
