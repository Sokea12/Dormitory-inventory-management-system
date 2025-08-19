<?php
 session_start();
 include("../config/connection.php");
 include("main_header.php");
?>
<!-- <form action="" method="post"></form> -->
<form action="category/delete_category.php" method="post">
    
        <!-- <div>
            <button type="button">Add Categorys</button>
        </div> -->
        <!-- <div class="content-page"> -->
    
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">Category List : <?= $_SESSION['category']; ?></h4>
                    
                    <p class="mb-0">Use category list as to describe your overall core business from the provided list. <br>
                    Click the name of the category where you want to add a list item. .</p>
                </div>
                <!-- <a href="page-add-category.html" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Category</a> -->
                <a href="" id="btnAddcategory" class="btn btn-primary add-list" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="las la-plus mr-3"></i>Add Category</a>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="table-responsive rounded mb-3">
                <table class="data-table table mb-0 tbl-server-info">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            <th>
                                <div class="checkbox d-inline-block">
                                    <input type="checkbox" class="checkbox-input" id="checkAll">
                                    <label for="checkbox1" class="mb-0"></label>
                                </div>
                            </th>
                            <th>Image</th>
                            <th>Code</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        <?php
                            $query ="SELECT * FROM tbl_category";
                            $query_run = mysqli_query($conn, $query);
                            
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $row)
                                {
                                    ?>
                                     <tr>
                                        <td>
                                            <div class="checkbox d-inline-block">
                                                <input type="checkbox" class="checkbox" name="checkbox_category_delete_id[]" value="<?= $row['id']; ?>">
                                                <label for="checkbox2" class="mb-0"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="../assets/images/categorys/<?= $row['category_image']; ?>" class="img-fluid rounded avatar-50 mr-3" alt="image">
                                                <div>
                                                    <?= $row['category_name']; ?>
                                                    <p class="mb-0"><small><?= $row['category_dsc']; ?></small></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?= $row['category_code']; ?></td>
                                        <?php 
                                            if($row['category_status']!= 0){
                                                echo"<td style=\"color: rgb(94, 196, 11); font-weight: bold;\">Active</td>";
                                            }else{
                                                echo"<td style=\"color: rgb(255, 85, 0); font-weight: bold;\">Inactive</td>";
                                            }
                                        ?>
                                        <td>
                                        <div class="d-flex align-items-center list-action">
                                            <a href="#" data-toggle="modal" data-target="#exampleModalCenteredScrollable"><i class="ri-eye-line mr-0"></i>Viwe</a>
                                            ||
                                            <a href="#" data-toggle="modal" data-target=".bd-example-modal-lg" 
                                               onclick="setEditModalValues('<?= $row['id']; ?>', '<?= $row['category_name']; ?>', '<?= $row['category_code']; ?>', '<?= $row['category_dsc']; ?>', '<?= $row['category_image']; ?>', '<?= $row['category_status']; ?>')"><i class="ri-pencil-line mr-0"></i>Edit</a>
                                            ||
                                               <a href="#" data-toggle="modal" data-target="#exampleModal"
                                               onclick="setDeleteModalValues('<?= $row['id']; ?>', '<?= $row['category_name']; ?>', '<?= $row['category_code']; ?>', '<?= $row['category_dsc']; ?>', '<?= $row['category_image']; ?>', '<?= $row['category_status']; ?>')"><i class="ri-delete-bin-line mr-0"></i>Deleted</a>
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
        <div class="col-lg-12">
            <!-- <hr> -->
            <div>
                <button type="submit" name="btn_edit_category_id">Edit</button>
                <button type="submit" name="btn_delete_category_id">Delete</button>
                <!-- <button type="submit" name="btn_delete_category_id">Delete</button> -->
            </div>
            <hr>
        </div>
    </div>
</div>    
    
</form>




<!-- Modle form -->
<!-- Modal Add Category -->
<div class="modal fade bd-example-modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleCategory">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="container-fluid" data-select2-id="5">
                <form action="category/update-category.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" id="categoryId" value="">

                <div class="form-group">
                    <label>Image</label>
                    <input type="hidden" id="txtfileimage" value="">
                    <input type="file" class="form-control image-file" name="fileimage" id="fileimage" value="" accept="image/*">
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Name</label>
                    <input type="text" name="txtcategoryname" id="txtcategoryname" class="form-control rounded-0" value="">
                </div>
                <div class="form-group">
                    <label for="categorycode" class="control-label">Code</label>
                    <input type="text" name="txtcategorycode" id="txtcategorycode" step="any" class="form-control rounded-0 text-end" value="">
                </div>
                <div class="form-group">
                    <label for="categorydsc" class="control-label">Description</label>
                    <textarea name="txtrcategorydsc" id="txtrcategorydsc" cols="30" rows="2" class="form-control form no-resize"></textarea>
                </div>
                
                
                <div class="form-group">
                    <label for="categorystatus" class="control-label">Status</label>
                    <select name="slcategorystatus" id="slcategorystatus" class="custom-select selevt">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <div ><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></div>
                <button type="submit" class="btn btn-primary" name="btnSaveCategory" id="btnSaveCategory" data-dismiss="modal">Save</button>
                <button type="submit" class="btn btn-primary" name="btnSaveChangesCategory" data-toggle="modal" data-target="#exampleModal" id="btnSaveChangesCategory" data-dismiss="modal">Save changes</button>
            </div>
            </form>
            
        </div>
    </div>
    </div>
    </div>





    
<!-- Modal Delete Category -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">

                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                              <!-- Do you really want to delete "Cocacola"? -->
                                <input type="hidden" name="deleteCategortId" id="deleteCategortId" value="">
                                <div id="DescriptionDelete" value=""></div>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button type="button" class="btn btn-primary" id="btnDeleteCategory">Delete</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
<!-- Modal View-->

<!-- Modal -->            
<div id="exampleModalCenteredScrollable" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
                <ul>
                Hello koL sokea
                    <ul>Hello world!</ul>
                    
                </ul>
                <ul>
                Hello koL sokea
                    <ul>Hello world!</ul>
                    
                </ul>
                <ul>
                Hello koL sokea
                    <ul>Hello world!</ul>
                    
                </ul>
                <ul>
                Hello koL sokea
                    <ul>Hello world!</ul>
                    
                </ul>
                <ul>
                Hello koL sokea
                    <ul>Hello world!</ul>
                    
                </ul>
            
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    </div>
</div>    
</div>
               
<!-- Wrapper End-->
</div>
<!-- class="alert alert-success" role="alert"  -->

  <!-- <div class="alert alert-success">
    This is a success alert—check it out!
  </div> -->
<?php
 include("main_foother.php");
?>


<script>
   // Get the "Check All" checkbox and all checkboxes with class "checkbox"
   var checkAll = document.getElementById('checkAll');
    var checkboxes = document.getElementsByClassName('checkbox');

    // Add an event listener to the "Check All" checkbox
    checkAll.addEventListener('change', function () {
      // Loop through all checkboxes and set their checked property to match the "Check All" checkbox
      for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = checkAll.checked;
      }
    });

    // Add an event listener to each individual checkbox
    for (var i = 0; i < checkboxes.length; i++) {
      checkboxes[i].addEventListener('change', function () {
        // If any checkbox is unchecked, uncheck the "Check All" checkbox
        checkAll.checked = true;
        for (var j = 0; j < checkboxes.length; j++) {
          if (!checkboxes[j].checked) {
            checkAll.checked = false;
            break;
          }
        }
      });
    }




    
    // Function to handle form submission
    function handleFormSubmission(argumentValue) {
        // Retrieve the selected file
        // alert(argumentValue);
        var categoryimage = $("#fileimage")[0].files[0];
        var catgoryImage = $("#txtfileimage").val();
        // Retrieve other form data
        var categoryId = $("#categoryId").val();
        var categoryname = $("#txtcategoryname").val();
        var categorycode = $("#txtcategorycode").val();
        var categorydsc = $("#txtrcategorydsc").val();
        var categorystatus = $("#slcategorystatus").val();

        // alert(categoryId);
        // Create FormData object to handle file and text data
        var formData = new FormData();
        formData.append('fileimage', categoryimage);
        formData.append('txtfileimage', catgoryImage);
        formData.append('categoryId', categoryId)
        formData.append('txtcategoryname', categoryname);
        formData.append('txtcategorycode', categorycode);
        formData.append('txtrcategorydsc', categorydsc);
        formData.append('slcategorystatus', categorystatus);

        // Use a switch statement based on numeric result
        switch(parseInt(argumentValue)) {
            case 1:
                // Handle case where result is 1
                var categoryurl = "category/add-category.php";
                // alert(categoryurl);

                // window.location.href = "form-category.php";
                break;
            case 2:
                // Handle case where result is 2
                var categoryurl = "category/update-category.php";
                // alert(2);
                // console.error("An error occurred during form submission.");
                break;
            case 3:
                // Handle case where result is 2
                var categoryurl = "category/delete-category.php";
                alert(3);
                // console.error("An error occurred during form submission.");
                break;
            default:
                // Handle other cases
                // console.warn("Unexpected result:", result);
                alert(0);
        }


        // Make an AJAX request using FormData for file upload
        $.ajax({
            url: categoryurl,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(result){
            alert(result);
                window.location.href = "form-category.php";
                if(result == 1){
                    alert("1");
                }else{
                    alert("0");
                }
                
                
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    // Add Category 
    $(function(){
        
        // To Add Category
        $("#btnAddcategory").click(function(event){
            event.preventDefault();
            document.getElementById('titleCategory').innerHTML = 'Add Category';  
            $("#btnSaveCategory").show();
            $("#btnSaveChangesCategory").hide();
            // $("#btnUpdateCategory").modal('show');
        });
        // Prevent the default form submission
        $("#btnSaveCategory").click(function(event){
            event.preventDefault();
            // Call the function to handle form submission
            var argumentValue = '1';
            handleFormSubmission(argumentValue);
        });


    });

    // Function to set the values in the modal for editing
    function setEditModalValues(categoryId, categoryName, categoryCode, categoryDesc, categoryImage, categoryStatus) {
        // Set the values in the modal form fields
        // alert(categoryId);
        $("#btnSaveCategory").hide();
        $("#btnSaveChangesCategory").show();
        
        document.getElementById('categoryId').value = categoryId;
        document.getElementById('txtcategoryname').value = categoryName;
        document.getElementById('txtcategorycode').value = categoryCode;
        document.getElementById('txtrcategorydsc').value = categoryDesc;
        document.getElementById('txtfileimage').value = categoryImage;
        document.getElementById('slcategorystatus').value = categoryStatus;
        document.getElementById('titleCategory').innerHTML = 'Edit Category';  
        // $("#btnUpdateCategory").modal('show');
        
    }

    // Update Catagory
    $("#btnSaveChangesCategory").click(function(event){
        // Prevent the default form submission
        event.preventDefault();
        // Call the function to handle form submission
        var argumentValue = '2';
        handleFormSubmission(argumentValue);
                      
    });

    

    // Delete Category
    // Function to set the values in the modal for editing
    function setDeleteModalValues(categoryId, categoryName, categoryCode, categoryDesc, categoryImage, categoryStatus) {
        // Set the values in the modal form fields
        document.getElementById('deleteCategortId').value = categoryId;  
        document.getElementById('DescriptionDelete').innerHTML = 'Do you really want to delete "' + categoryName + '"?';        
    }
    $("#btnDeleteCategory").click(function(event){
        // Prevent the default form submission
        event.preventDefault();
        
        // Retrieve other form data
        var categoryId = $("#deleteCategortId").val();
        // var userid = $("#txtdel_userid").val();
            //alert(userid);
            $.post("category/delete-category.php",{deleteCategortId:categoryId},function(result){
                  alert(result);
                  window.location.href = "form-category.php";
            });
    });



</script>