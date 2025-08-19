<?php
 session_start();
 include("../config/check_session.php");
 include("../config/connection.php");
 if($_SESSION['ROLE'] == "2"){
    header("location: page_erre_404.php");
 }
 include("main_header.php");
?>

        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">List of Material Requst</h4>
                </div>
                <!-- <a href="page-add-category.html" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Category</a> -->
                <a href="form_request_material.php" class="btn btn-primary add-list" >+ Create New </a>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="table-responsive rounded mb-3" style="background-color:  #ffffff; padding-top: 5px;">
                <table class="data-table table mb-0 tbl-server-info ">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            <th>
                                #
                            </th>
                            <th>Date Created</th>
                            <th>Requst Code</th>
                            <th>Items</th>
                            <th>Status</th>
                            <th style="width: 50px;">Action</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        <?php
                            $query ="SELECT * FROM tbl_request";
                            $query_run = mysqli_query($conn, $query);
                            
                            if(mysqli_num_rows($query_run) > 0)
                            {   
                                $num = 0;
                                foreach($query_run as $row)
                                {
                                    $num++;
                                    ?>
                                     <tr>
                                        <td>
                                            <?= $num; ?>    
                                        </td>
                                        <td>
                                            <?= $row['rq_datetime']; ?>
                                        </td>
                                        <td>
                                            <?= $row['rq_code']; ?>
                                        </td>
                                        <td>
                                            <?= $row['rq_items']; ?>
                                        </td>
                                        <td>
                                            <?php 
                                            if($row['rq_status'] === '0'){
                                                ?>
                                                 <p style="color: #ffff; background-color: #7e9ff3; padding: 0px 3px; border-radius: 10px; width: 75px; height: inherit; text-align: center; margin: auto;">Pending</p>
                                                <?php
                                            }else{
                                                ?>
                                                <p style="color: #ffff; background-color: #23d899; padding: 1px 4px; border-radius: 10px; width: 75px; height: inherit; text-align: center; font-size: 15px; font: bole; margin: auto;">Received</p>
                                                <?php
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <div class="card-header-toolbar d-flex align-items-center">
                                                <span class="dropdown-toggle dropdown-bg btn" id="dropdownMenuButton001" data-toggle="dropdown" aria-expanded="true" style="background-color: #bdc4d4; width: 100px; height: inherit; padding: 5px; font-size: 16px;">
                                                    Action
                                                    <svg style="width: 18px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                                    </svg>
                                                </span>
                                                <div class="dropdown-menu fixed-element" aria-labelledby="dropdownMenuButton001" style="position: fixed; will-change: transform; top: 0px; left: 0px; transform: translate3d(-40px, 36px, 0px);" x-placement="bottom-end">
                                                         <!--  display: none;"  position: fixed; -->
                                                         <a href="form_request_material_save.php?code=<?php echo $row['rq_code'];?>&item=<?php echo $row['rq_items'];?>" type="button" class="dropdown-item" <?php if($row['rq_status'] === '0'){ ?><?php }else{ ?> style="display: none; "<?php } ?>>
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"  width="20" stroke-width="2" stroke="currentColor" class="svg-icon mr-0 text-secondary">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                                                            </svg>
                                                        Received
                                                    </a>
                                                    <a class="dropdown-item" href="form_view_material_requst.php?code=<?php echo $row['rq_code'];?>" style="justify-content: flex-end;  " >
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"  width="20" stroke-width="2" stroke="currentColor" class="svg-icon mr-0 text-secondary">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                        </svg>
                                                        View
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <svg class="svg-icon mr-0 text-secondary" id="h-02-p" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                        </svg>
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item" href="request/delete_rquest.php?rquestId=<?php echo $row['id'];?>&item=<?php echo $row['rq_items'];?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"  width="20" stroke-width="2" stroke="currentColor" class="svg-icon mr-0 text-secondary">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                          
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>    
    
</form>

               
<!-- Wrapper End-->
</div>
<!-- class="alert alert-success" role="alert"  -->

  <!-- <div class="alert alert-success">
    This is a success alert—check it out!
  </div> -->
<?php
 include("main_foother.php");
?>
