$(document).ready(function () {

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

    // Alert before remove reocrd
    $(".removeStudentRecord").submit(function () {
        return confirm('Are you sure want to remove record?');
    });
});