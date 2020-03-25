$(document).ready(function () {
    $('.update_form').on('submit', function () {
        if (confirm("This is the update verification message, Click OK to proceed.")) {
            return true;
        } else {
            return false;
        }
    });
});