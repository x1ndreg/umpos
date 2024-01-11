<script>
  $(document).on('click', '.deletebg.confirm-text', function(event) {
    event.preventDefault(); // Prevent the default action of the link

    var productID = $(this).parent().parent().attr('id'); // Get the ID of the product that is being deleted

    // Send an AJAX request to delete the product from the database
    $.ajax({
      url: 'deleteProduct.php', // URL of the PHP script that handles the deletion
      method: 'POST',
      data: {
        productID: productID
      },
      success: function(response) {
        // If the deletion was successful, remove the product from the DOM
        if (response === 'success') {
          $(this).parent().parent().remove();
        }
      }
    });
  });
</script>
