$(document).ready(function () {
    //sort table home page
    $('#myTable th[data-sort]').click(function () {
        if (!$(this).hasClass('no-sort')) {
            var table = $(this).parents('table').eq(0);
            var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()));
            this.asc = !this.asc;
            if (!this.asc) { rows = rows.reverse(); }
            for (var i = 0; i < rows.length; i++) { table.append(rows[i]); }
        }
    });
    
    function comparer(index) {
        return function (a, b) {
            var valA = getCellValue(a, index), valB = getCellValue(b, index);
            if (index === 3) { // If sorting by Date column
                valA = parseDate(valA);
                valB = parseDate(valB);
            }
            return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB, undefined, { numeric: true });
        };
    }

    function getCellValue(row, index) {
        return $(row).children('td').eq(index).text();
    }

    function parseDate(dateString) {
        var parts = dateString.split('/');
        return new Date(parts[0], parts[1] - 1, parts[2]); // Month is 0-based
    }

    // Call the function to set the initial state of the Submit button
    updateSubmitButtonStatus();

    function updateSubmitButtonStatus() {
        var titleLength = $("#Title").val().length;
        var textLength = $("#Text").val().length;
        var dropdown1Value = $("#dropdown1").val();
        var errorMessage = "";

        // Check conditions for the title
        if (titleLength < 5) {
            errorMessage = "Title must be at least 5 characters long.";
            $("#title-error-message").text(errorMessage);
        } else if (titleLength > 1000) {
            errorMessage = "Title cannot exceed 1000 characters.";
            $("#title-error-message").text(errorMessage);
        }

        // Check conditions for the text area
        var Message = "";
        var maxCharacters = 1500;
        if (textLength >= maxCharacters) {
            Message = "";
            errorMessage = "Maximum character limit exceeded for text.";
            $("#text-characters-counter").text(Message);
            $("#text-error-message").text(errorMessage);
        } else {
            remaining = maxCharacters - textLength;
            errorMessage = "";
            Message = "Remaining Characters " + remaining + " / " + maxCharacters;
            $("#text-error-message").text(errorMessage);
            $("#text-characters-counter").text(Message);
        }

        // Update the Submit button disabled property
        $("#Submit").prop("disabled", errorMessage !== "" || titleLength < 5 || titleLength > 1000 || textLength === 0 || dropdown1Value === "");
    }

    // Bind keyup and change event handlers to Title and Text fields
    $("#Title, #Text, #dropdown1").on("keyup change", function () {
        updateSubmitButtonStatus();  // Update button status whenever text changes
    });

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