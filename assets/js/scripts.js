$(document).ready(function () {
    // Initial setup (optional): Populate dropdown2 with default options based on initial state of dropdown1
    var selectedValue1 = $("#dropdown1").val();
    populateDropdown2(selectedValue1);

    $("#dropdown1").change(function () {
        var selectedValue1 = $(this).val();
        populateDropdown2(selectedValue1);
    });

    $("#Title").on("keyup change", function () {
        var titleLength = $(this).val().length;
        var errorMessage = "";
        if (titleLength < 50) {
            errorMessage = "Title must be at least 50 characters long.";
        } else if (titleLength > 1000) {
            errorMessage = "Title cannot exceed 1000 characters.";
        }
        $("#title-error-message").text(errorMessage);
        // Optionally disable submit button if there's an error
        //the Submit is the id 
        $("#Submit").prop("disabled", errorMessage !== "");
    });

    $('#Text').on('keyup change', function(){
        var textLength = $(this).val().length;
        var errorMessage = "";
        var maxLength = 1500;
        var remainingChars = maxLength - textLength;
        $('#text-characters-counter').text(remainingChars + ' characters remaining');
        if(textLength > maxLength){
            errorMessage = "Maximum character limit exceeded";
        }
        $('#text-characters-counter').text(remainingChars);
        // Optionally disable submit button if there's an error
        $("#Submit").prop("disabled", errorMessage !== "");
    });

    function populateDropdown2(selectedValue1) {
        $("#dropdown2").empty();  // Clear existing options in dropdown2 before populating
        switch (selectedValue1) {
            case "option1":
                $("#dropdown2").append($('<option value="">Please Select an option fron Dropdown1</option>'));
                break;
            case "option2":
                $("#dropdown2").append($('<option value="option1a">Option 1a</option>'));
                $("#dropdown2").append($('<option value="option1b">Option 1b</option>'));
                break;
            case "option3":
                $("#dropdown2").append($('<option value="option2a">Option 2a</option>'));
                $("#dropdown2").append($('<option value="option2b">Option 2b</option>'));
                break;
            case "option4":
                $("#dropdown2").append($('<option value="option3a">Option 3a</option>'));
                $("#dropdown2").append($('<option value="option3b">Option 3b</option>'));
                break;
        }
    }
});