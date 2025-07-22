window.addEventListener("load", function () {
    console.log("JS file loaded");
    console.log("Page fully loaded.");
    const search = window.location.search;
    const params = new URLSearchParams(search);
    const property_id = params.get('property_id');

    var is_interested_image = document.getElementsByClassName("is-interested-image")[0];
    is_interested_image.addEventListener("click", function (event) {
        var XHR = new XMLHttpRequest();

        // On success
        XHR.addEventListener("load", toggle_interested_success);

        // On error
        XHR.addEventListener("error", on_error);

        // Set up request
        XHR.open("GET", "api/toggle_interested.php?property_id=" + property_id);

        // Initiate the request
        XHR.send();

        document.getElementById("loading").style.display = 'block';
        event.preventDefault();
    });


   
    

});

var toggle_interested_success = function (event) {
    document.getElementById("loading").style.display = 'none';

    var response = JSON.parse(event.target.responseText);
    if (response.success) {
        var is_interested_image = document.getElementsByClassName("is-interested-image")[0];
        var interested_user_count = document.getElementsByClassName("interested-user-count")[0];

        if (response.is_interested) {
            is_interested_image.classList.add("fas");
            is_interested_image.classList.remove("far");
            interested_user_count.innerHTML = parseFloat(interested_user_count.innerHTML) + 1;
        } else {
            is_interested_image.classList.add("far");
            is_interested_image.classList.remove("fas");
            interested_user_count.innerHTML = parseFloat(interested_user_count.innerHTML) - 1;
        }
    } else if (!response.success && !response.is_logged_in) {
        window.$("#login-modal").modal("show");
    }
};

$(document).ready(function () {
    $(document).on('click', '#bookBtn', function () {
        console.log("Book button clicked");

        const propertyId = new URLSearchParams(window.location.search).get('property_id');
        console.log("Property ID:", propertyId);

        $.ajax({
            url: 'api/toggle_booking.php',
            method: 'POST',
            data: { property_id: propertyId },
            success: function (response) {
                // Check if response is a string
                if (typeof response === "string") {
                    response = response.trim();
                    console.log("Response from server:", response);

                    if (response === 'booked') {
                        $('#bookBtn')
                            .removeClass('btn-primary')
                            .addClass('btn-danger')
                            .text('Unbook');
                        alert('Booking confirmed! 🎉');
                    } else if (response === 'unbooked') {
                        $('#bookBtn')
                            .removeClass('btn-danger')
                            .addClass('btn-primary')
                            .text('Book Now');
                        alert('Booking cancelled ❌.');
                    } else {
                        alert('⚠️ Unexpected response: ' + response);
                    }
                } else {
                    console.warn("Expected a string response but got:", response);
                    alert('⚠️ Server returned invalid response.');
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX error:", error);
                alert("⚠️ Failed to connect to the server.");
            }
        });
    });
});
