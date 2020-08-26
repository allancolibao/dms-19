$(document).ready(function () {
    $('.insert_form').on('submit', function () {
        if (confirm("Please double check all the fields before click save, Thank you")) {
            return true;
        } else {
            return false;
        }
    });
});
