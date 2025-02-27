
     
$(document).ready(function () {


    // get the route
    let searchServiceUserRoute = "";  

    $(document).on("click", "[data-bs-target='#addFamilyMemberModal']", function () {
        searchServiceUserRoute = $(this).data("searchserviceuserroute");  
     });


    // Handle search input event using jQuery
    $("#search_family_member").on("input", function () {
        let query = $(this).val().trim();
        let resultsContainer = $("#family_member_results");

        if (query.length < 2) {
            resultsContainer.html(`<p class="text-muted">Enter at least 2 characters to search.</p>`);
            return;
        }

        // Make AJAX request to fetch matching family members
        $.ajax({
            url: searchServiceUserRoute,
            method: "GET",
            data: { query: query },
            dataType: "json",
            success: function (data) {
                resultsContainer.html("");

                if (data.length === 0) {
                    resultsContainer.html(`<p class="text-muted">No results found.</p>`);
                } else {
                    $.each(data, function (index, member) {
                        let row = `
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="selected_care_beneficiary" value="${member.id}">
                                <label class="form-check-label">
                                    ${member.first_name} ${member.last_name} (${member.email})
                                </label>
                            </div>
                        `;
                        resultsContainer.append(row);
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error("Error fetching family members:", error);
            }
        });
    });

    // Handle selection of family member
    $(document).on("change", "input[name='selected_care_beneficiary']", function () {
        $("#selected_care_beneficiary_id").val($(this).val());
    });
});










$(document).ready(function () {

let modalClosedListenerAdded = false; // Track if the event listener has been added

// CSRF token setup for AJAX requests
$.ajaxSetup({
headers: {
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
}
});

// Handle form submission via AJAX
$("#addFamilyMemberModal form").on("submit", function (event) {
event.preventDefault(); // Prevent default form submission

let form = $(this);
let formData = form.serialize();
let submitButton = form.find("button[type='submit']");
let errorContainer = $("#modalErrorMessage");
let successContainer = $("#modalSuccessMessage");
let formContent = $("#modalFormContent");

errorContainer.html("").hide(); // Clear previous errors
submitButton.prop("disabled", true); // Disable button during request

$.post(form.attr("action"), formData)
    .done(function (response) {
        submitButton.prop("disabled", false);

        if (response.success) {
            // Hide form and show success message
            formContent.hide();
            successContainer.removeClass("d-none").show();

            $("#addFamilyMemberModal").on("hidden.bs.modal", function () {
                location.reload(); 
            });

            modalClosedListenerAdded = true; // Prevent duplicate event bindings
            
        } else {
            errorContainer.html(`<strong>Error:</strong> ${response.message}`).removeClass("d-none").show();
            $("#addFamilyMemberModal").modal("show"); // Show modal if error occurs
        }
    })
    .fail(function (xhr) {
        submitButton.prop("disabled", false);

        if (xhr.responseJSON && xhr.responseJSON.errors) {
            let errors = xhr.responseJSON.errors;
            let errorMessages = "";

            // Loop through each error and display its message
            Object.keys(errors).forEach((key) => {
                errors[key].forEach((message) => {
                    errorMessages += `<p>${message}</p>`; // Correctly formats each error
                });
            });

            errorContainer.html(`<strong>Error:</strong> ${errorMessages}`).removeClass("d-none").show();
        } else {
            errorContainer.html(`<strong>Error:</strong> An unexpected error occurred.`).removeClass("d-none").show();
        }

        $("#addFamilyMemberModal").modal("show"); // Show modal if an error occurs
    });
});

// Reset modal when closed
$('#addFamilyMemberModal').on('hidden.bs.modal', function () {
$("#modalSuccessMessage").addClass("d-none").hide(); // Hide success message
$("#modalErrorMessage").addClass("d-none").hide(); // Hide error message
$("#modalFormContent").show(); // Show form content again
$("#addFamilyMemberModal form")[0].reset(); // Reset form fields
});
});

