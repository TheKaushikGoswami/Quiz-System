<?php
include 'header.php';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center my-4">Quiz Management System</h1>
            <div class="card col-md-6 m-auto bg-dark text-light">
                <div class="card-header">
                    <h2>Quiz</h2>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="question p-3 mb-3">
                            <h4>Question 1</h4>
                            <div class="options col-md-11 m-auto d-flex flex-column">
                                <label for=""><input type="radio" class="form-radio" name="answer1" value="a">Answer 1</label>
                                <label for=""><input type="radio" class="form-radio" name="answer1" value="b">Answer 2</label>
                                <label for=""><input type="radio" class="form-radio" name="answer1" value="c">Answer 3</label>
                                <label for=""><input type="radio" class="form-radio" name="answer1" value="d">Answer 4</label>
                            </div>
                        </div>
                        <div class="submit-button col-md-11 m-auto d-flex flex-row-reverse">
                            <button class="btn btn-light">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include 'footer.php';
?>