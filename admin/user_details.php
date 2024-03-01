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
                        var tableHtml = '<table class="table bg-dark text-light col-md-5 m-auto">' +
                                        '<thead>' +
                                        '<tr>' +
                                        '<th scope="col">Roll No</th>' +
                                        '<th scope="col">Quiz</th>' +
                                        '<th scope="col">Marks</th>' +
                                        '</tr>' +
                                        '</thead>' +
                                        '<tbody>';
                        data.forEach(function(item) {
                            tableHtml += '<tr>' +
                                         '<td>' + item[0] + '</td>' + // roll_no
                                         '<td>' + item[1] + '</td>' + // quiz name
                                         '<td>' + item[2] + '</td>' + // marks
                                         '</tr>';
                        });
                        tableHtml += '</tbody></table>';
                        $('#userDetails').html(tableHtml);
                    } else {
                        $('#userDetails').html('<h3 class="text-center my-4">' + data.error + '</h3>');
                    }
                },
                error: function(xhr, status, error) {
                    $('#userDetails').html('<h3 class="text-center my-4">An error occurred: ' + error + '</h3>');
                }
            });
        } else {
            $('#userDetails').empty();
        }
    });
});
</script>


<?php include '../includes/footer.php'; ?>
