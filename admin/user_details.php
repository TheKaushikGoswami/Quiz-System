<?php

include 'config/config.php';
include '../includes/header.php';
include 'fetch_user.php';

?>

<!-- Use AJAX to fetch user's roll number -->

<div class="container-fluid" style="height:90vh;display:flex;align-items:center;justify-content:center">
    <div class="card m-auto col-md-8 come-out" style="border-radius:30px">
        <h1 class="text-center my-4">User Details</h1>
        <div class="card-body">
            <form action="user_details.php" method="POST">
                <input type="number" name="roll_no" placeholder="Enter User's Roll Number" class="form-control mb-2" style="width:80%;margin:auto">
            </form>
        </div>
        <div id="userDetails">
            
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(document).ready(function() {
    $("input[name='roll_no']").on('input', function() {
        var roll_no = $(this).val();
        if(roll_no.length > 0) {
            $.ajax({
                url: 'fetch_user.php', // Adjust the path as necessary
                type: 'POST',
                dataType: 'json',
                data: {roll_no: roll_no},
                success: function(data) {
                    if(!data.error) {
                        $('#userDetails').html(
                            '<table class="table table-dark bg-dark text-light col-md-5 m-auto">' +
                            '<thead>' +
                            '<tr>' +
                            '<th scope="col">Roll No</th>' +
                            '<th scope="col">Name</th>' +
                            '<th scope="col">Email</th>' +
                            '<th scope="col">Course</th>' +
                            '<th scope="col">Year</th>' +
                            '</tr>' +
                            '</thead>' +
                            '<tbody>' +
                            '<tr>' +
                            '<td>' + data.roll_no + '</td>' +
                            '<td>' + data.name + '</td>' +
                            '<td>' + data.email + '</td>' +
                            '<td>' + data.course + '</td>' +
                            '<td>' + data.year + '</td>' +
                            '</tr>' +
                            '</tbody>' +
                            '</table>'
                        );
                    } else {
                        $('#userDetails').html('<h3 class="text-center my-4">' + data.error + '</h3>');
                    }
                }
            });
        } else {
            $('#userDetails').empty();
        }
    });
});
</script>


<?php include '../includes/footer.php'; ?>
