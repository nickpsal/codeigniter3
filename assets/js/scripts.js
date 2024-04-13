$(document).ready(function () {
    // Initial setup (optional): Populate dropdown2 with default options based on initial state of dropdown1
    var selectedValue1 = $("#dropdown1").val();
    //this if we want to call the js function to get the options with js
    //populateDropdown2(selectedValue1);    

    $("#dropdown1").change(function () {
        $("#dropdown2").empty();
        var selectedValue1 = $(this).val();
        $.ajax({
            //if it si on the same controller with put only the method
            url: 'getOptions',  // Update the URL based on your CI configuration 
            type: 'POST',
            data: { selectedValue1: selectedValue1 },
            dataType: 'json',
            success: function (options) {
                if (options.length > 0) {
                    options.forEach(function (option) {
                        $("#dropdown2").append($('<option>', {
                            value: option.id,
                            text: option.name
                        }));
                    });
                } else {
                    $("#dropdown2").append($('<option value="">No options available</option>'));
                }
                $('#dropdown-error-message').text("");
            },
            error: function () {
                $('#dropdown-error-message').text("Error: Could not retrieve options");
            }
        });
    });

    $("#Title").on("keyup change", function () {
        var titleLength = $(this).val().length;
        var errorMessage = "";
        if (titleLength < 5) {
            errorMessage = "Title must be at least 5 characters long.";
        } else if (titleLength > 1000) {
            errorMessage = "Title cannot exceed 1000 characters.";
        }
        $("#title-error-message").text(errorMessage);
        // Optionally disable submit button if there's an error
        //the Submit is the id 
        $("#Submit").prop("disabled", errorMessage !== "");
    });

    $('#Text').on('keyup change', function () {
        var textLength = $(this).val().length;
        var errorMessage = "";
        var maxLength = 1500;
        var remainingChars = maxLength - textLength;
        $('#text-characters-counter').text(remainingChars + ' characters remaining');
        if (textLength > maxLength) {
            errorMessage = "Maximum character limit exceeded";
        }
        $('#text-characters-counter').text(remainingChars);
        // Optionally disable submit button if there's an error
        $("#Submit").prop("disabled", errorMessage !== "");
    });

    function populateDropdown2(selectedValue1) {
        var DropdownError = "";
        $("#dropdown2").empty();  // Clear existing options in dropdown2 before populating
        switch (selectedValue1) {
            case "option1":
                $("#dropdown2").append($('<option value="">Please Select an option fron Dropdown1</option>'));
                DropdownError = "Error No option choosed";
                break;
            case "option2":
                DropdownError = "";
                $("#dropdown2").append($('<option value="option1a">Option 1a</option>'));
                $("#dropdown2").append($('<option value="option1b">Option 1b</option>'));
                break;
            case "option3":
                DropdownError = "";
                $("#dropdown2").append($('<option value="option2a">Option 2a</option>'));
                $("#dropdown2").append($('<option value="option2b">Option 2b</option>'));
                break;
            case "option4":
                DropdownError = "";
                $("#dropdown2").append($('<option value="option3a">Option 3a</option>'));
                $("#dropdown2").append($('<option value="option3b">Option 3b</option>'));
                break;
        }
        $('#dropdown-error-message').text(DropdownError);
    }
});