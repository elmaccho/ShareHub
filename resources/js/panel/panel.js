$(document).ready(function () {
    $('#usersCollapseBtn').on('click', function () {
        $.ajax({
            url: '/admin/users',
            method: "GET",
            success: function (response) {
                $('#dashboard-content').html(response);
            }
        });
    });
});
