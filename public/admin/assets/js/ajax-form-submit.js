function submitFormWithAjax(form, successTitle, successRedirect, errorTitle, errorMessage) {
    $(form).on("submit", function (e) {
        e.preventDefault();
        var form = $(this);

        // Start the loading animation
        Swal.fire({
            title: 'جاري التحميل...',
            text: 'يرجى الانتظار...',
            imageUrl: 'https://usagif.com/wp-content/uploads/loading-23.gif',
            showConfirmButton: false,
            allowOutsideClick: false
        });

        // Prepare form data for submission
        let formData = new FormData(this);

        // Perform the AJAX request
        $.ajax({
            url: form.attr("action"),
            type: form.attr("method"),
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                // Stop the loading animation and show success message
                Swal.fire({
                    icon: 'success',
                    title: successTitle,
                    showConfirmButton: false,
                    showCancelButton: false,
                    timer: 1500 // Close the modal after 1.5 seconds
                });

                // Redirect after a successful submission
                setTimeout(function () {
                    window.location.href = successRedirect;
                }, 1500);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                if (jqXHR.status === 422) {
                    // Stop the loading animation
                    Swal.fire({
                        icon: 'error',
                        title: errorTitle,
                        text: errorMessage,
                        confirmButtonText: 'حسنا'
                    }).then((result) => {
                        highlightErrors();
                    }).catch(Swal.noop);

                    function highlightErrors() {
                        var errors = jqXHR.responseJSON.errors;
                        //remove all error messages
                        $('.invalid-feedback').remove();
                        // remove is-invalid class
                        $('.is-invalid').removeClass('is-invalid');
                        // remove border color
                        $('.input-group-text').css({
                            'border-color': '',
                        });

                        $.each(errors, function (key, errorMessages) {
                            // check if has class is-invalid
                            if ($('[name="' + key + '"]').hasClass('is-invalid')) {
                                $('[name="' + key + '"]').next().remove();
                            }

                            var input = form.find('[name="' + key + '"]');

                            input.addClass('is-invalid');
                            var inputGroupText = input.closest(
                                '.input-group').find(
                                '.input-group-text');
                            inputGroupText.css({
                                'border-color': 'red',
                            });
                            input.after('<div class="invalid-feedback">' + errorMessages[0] + '</div>');
                        });
                    }

                } else {
                    // Stop the loading animation and show generic error message
                    Swal.fire({
                        icon: 'error',
                        text: 'حدث خطء ما: ' + errorThrown,
                        confirmButtonText: 'حسنا'
                    });
                }
            }
        });
    });
}
