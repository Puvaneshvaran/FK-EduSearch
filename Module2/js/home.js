$(document).ready(function() {
    // Save button click event
    $('form').on('submit', function(event) {
      event.preventDefault(); // Prevent form submission
  
      // Collect form data
      var formData = $(this).serialize();
  
      // Send AJAX request to save the form data
      $.ajax({
        url: $(this).attr('action'),
        type: $(this).attr('method'),
        data: formData,
        success: function(response) {
          // Display success message and show user input
          alert('User profile saved successfully!\n\n' + formData);
          resetForm(); // Reset the form
        },
        error: function(xhr, status, error) {
          // Display error message
          alert('An error occurred while saving the user profile.');
          console.log(xhr.responseText);
        }
      });
    });
  
    // Update button click event
    $('button[type="edit"]').on('click', function() {
      enableForm(); // Enable form fields for editing
    });
  
    // Reset button click event
    $('button[type="clear"]').on('click', function() {
      resetForm(); // Reset the form
    });
  
    // Function to enable form fields for editing
    function enableForm() {
      $('input, select').prop('disabled', false);
    }
  
    // Function to reset the form
    function resetForm() {
      $('form')[0].reset();
      $('input, select').prop('disabled', true);
    }
  });  

  //redirect page button - Report
  document.getElementById('pageButton').addEventListener('click', function() {
    // Change page URL upon button click
    window.location.href = '#.html';
  });
  //redirect page button - Complain
  document.getElementById('pageButton2').addEventListener('click', function() {
    // Change page URL upon button click
    window.location.href = '#.html';
  });
    
  //image frame
  function displaySelectedImage(event) {
    var input = event.target;
    var frame = document.getElementById('profile-picture-frame');

    frame.innerHTML = '';

    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        var img = document.createElement('img');
        img.src = e.target.result;
        frame.appendChild(img);
      };

      reader.readAsDataURL(input.files[0]);
    }
  }