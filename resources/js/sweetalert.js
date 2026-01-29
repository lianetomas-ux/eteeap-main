// SweetAlert configurations for the application
window.showSuccessAlert = function(message, title = 'Success!') {
    Swal.fire({
        title: title,
        text: message,
        icon: 'success',
        confirmButtonColor: '#006633',
        confirmButtonText: 'OK',
        timer: 3000,
        timerProgressBar: true,
        showConfirmButton: false
    });
};

window.showErrorAlert = function(message, title = 'Error!') {
    Swal.fire({
        title: title,
        text: message,
        icon: 'error',
        confirmButtonColor: '#dc3545',
        confirmButtonText: 'OK'
    });
};

window.showWarningAlert = function(message, title = 'Warning!') {
    Swal.fire({
        title: title,
        text: message,
        icon: 'warning',
        confirmButtonColor: '#ffc107',
        confirmButtonText: 'OK'
    });
};

window.showInfoAlert = function(message, title = 'Info') {
    Swal.fire({
        title: title,
        text: message,
        icon: 'info',
        confirmButtonColor: '#006633',
        confirmButtonText: 'OK'
    });
};

window.showConfirmDelete = function(message = 'This action cannot be undone.', title = 'Are you sure?') {
    return Swal.fire({
        title: title,
        text: message,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    });
};

window.showValidationErrors = function(errors) {
    let errorMessages = '';
    if (Array.isArray(errors)) {
        errorMessages = errors.join('\n');
    } else if (typeof errors === 'object') {
        errorMessages = Object.values(errors).flat().join('\n');
    } else {
        errorMessages = errors;
    }

    Swal.fire({
        title: 'Validation Error',
        text: errorMessages,
        icon: 'error',
        confirmButtonColor: '#dc3545',
        confirmButtonText: 'OK'
    });
};

// Auto-show success messages from session
document.addEventListener('DOMContentLoaded', function() {
    // Check for success message
    const successMessage = document.querySelector('[data-success-message]');
    if (successMessage) {
        showSuccessAlert(successMessage.dataset.successMessage);
    }

    // Check for error message
    const errorMessage = document.querySelector('[data-error-message]');
    if (errorMessage) {
        showErrorAlert(errorMessage.dataset.errorMessage);
    }

    // Check for validation errors
    const validationErrors = document.querySelector('[data-validation-errors]');
    if (validationErrors) {
        const errors = JSON.parse(validationErrors.dataset.validationErrors);
        showValidationErrors(errors);
    }

    // Handle delete confirmations
    document.querySelectorAll('[data-confirm-delete]').forEach(function(element) {
        element.addEventListener('click', function(e) {
            e.preventDefault();
            const form = this.closest('form');
            const message = this.dataset.confirmDelete || 'This action cannot be undone.';

            showConfirmDelete(message).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});