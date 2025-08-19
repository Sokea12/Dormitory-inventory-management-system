<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Item List</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <h4 class="mb-3">Item List</h4>
    </div>
    <div class="col-lg-12">
      <div class="table-responsive rounded mb-3">
        <table class="data-table table mb-0 tbl-server-info" style="background-color: White; border-radius: 10px;">
          <thead class="bg-white text-uppercase" id="tableIteme">
            <tr class="" style="background-color: White;">
              <th>Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="ligth-body">
            <?php
            // Your PHP code to fetch and display items goes here
            ?>
            <tr>
              <td>Item Name</td>
              <td>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-item-id="<?= $item['id']; ?>" data-item-name="<?= $item['name']; ?>">
                  Delete
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>









<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete "<span id="itemNameToDelete"></span>"?
        <!-- Hidden input to store the item ID -->
        <input type="hidden" id="itemIdToDelete">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- Button to trigger deletion -->
        <button type="button" class="btn btn-danger" id="confirmDeleteButton">Delete</button>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
  $(document).ready(function() {
    // Function to handle when delete button is clicked
    $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // Button that triggered the modal
      var itemId = button.data('item-id'); // Extract info from data-* attributes
      var itemName = button.data('item-name');
      var modal = $(this);
      modal.find('.modal-body #itemNameToDelete').text(itemName);
      modal.find('.modal-body #itemIdToDelete').val(itemId);
    });

    // Function to handle when delete confirmation button is clicked
    $('#confirmDeleteButton').click(function() {
      var itemId = $('#itemIdToDelete').val();
      // Send AJAX request to delete item using PHP endpoint
      $.post('item/delete_item.php', { itemId: itemId }, function(data) {
        // Handle response from server here (e.g., show success message, reload page, etc.)
        // For simplicity, let's just reload the page
        window.location.reload();
      });
    });
  });
</script>

</body>
</html>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Auto Button Click</title>
</head>
<body>

<!-- Button to trigger modal -->
<button id="autoButtonClick" style="display:none;" data-toggle="modal" data-target="#exampleModal" data-delete-modal-values="<?= $row['us_id']; ?>|<?= $user_profile['usf_firstname']; ?>">Delete</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete <span id="deleteItemName"></span>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirmDeleteButton">Delete</button>
      </div>
    </div>
  </div>
</div>

<script>
  // Function to auto click the button with ID 'autoButtonClick'
  function autoClickButton() {
    document.getElementById('autoButtonClick').click();
  }

  // Call the function after the page loads
  window.onload = function() {
    autoClickButton();
  }

  // Function to handle showing modal and setting delete values
  document.addEventListener('DOMContentLoaded', function() {
    var deleteModalTriggerButton = document.getElementById('autoButtonClick');
    deleteModalTriggerButton.addEventListener('click', function() {
      var modalValues = this.getAttribute('data-delete-modal-values').split('|');
      var userId = modalValues[0];
      var userName = modalValues[1];
      document.getElementById('deleteItemName').textContent = userName;
      // You can use userId and userName here to perform additional actions if needed
    });
  });
</script>

</body>
</html>
