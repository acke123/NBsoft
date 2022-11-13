<?php
require '../view/head.php';
require '../connection/TableConnectionData.php';
?>
<div class="jumbotron text-center">
    <h2>Form validation</h2>
</div>
<div class="container">
    <div class="row">
        <div class="col-6 offset-3" id="table">
            <form method="post" action="insert_form_data.php">
                <div class="form-group">
                    <label for="firstname">First name:</label>
                    <input type="text" name="firstname" id="firstname" placeholder="Enter your first name"
                           class="form-control" required>
                    <div id="divfirstname"></div>
                    <label for="lastname">Last name:</label>
                    <input type="text" name="lastname" id="lastname" placeholder="Enter your last name"
                           class="form-control" required>
                    <div id="divlastname"></div>
                    <label for="gender">Gender:</label>
                    <input type="radio" name="gender" id="gender" value="male" required> Male
                    <input type="radio" name="gender" id="gender" value="female"> Female
                </div>
                <label for="year">Date:</label>
                <select class="form-control" name="year" id="year">
                    <?php for ($i = 1920; $i < 2010; $i++): ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" placeholder="Enter your address" class="form-control"
                       required>
                <div id="divaddress"></div>
                <label for="city">City:</label>
                <input type="text" name="city" id="city" placeholder="Enter your city" class="form-control" required>
                <div id="divcity"></div>
                <label for="textarea">About you</label>
                <textarea class="form-control" name="textarea" id="textarea" placeholder="Something about you..."
                          rows="3"></textarea>
                <div id="divtextarea"></div>
                <label for="languages[]">Skills:</label>
                <input type="checkbox" name="languages[]" id="languages[]" value="php"> Php
                <input type="checkbox" name="languages[]" id="languages[]" value="js"> Js
                <input type="checkbox" name="languages[]" id="languages[]" value="java"> Java
                <input type="checkbox" name="languages[]" id="languages[]" value="python"> Python
                <button type="submit" name="button" id="button" class="btn btn-info form-cotrol">Submit</button>
            </form>
        </div>
        <div class="col-6 offset-3">
            <a class="btn btn-primary" href="../index.php" role="button">Home Page</a>
        </div>
        <div class="col-6 offset-3" id="table">
            <table>
                <thead>
                <tr>
                    <th colspan="2" id="result"></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td id="firstname"></td>
                </tr>
                <tr>
                    <td id="lastname"></td>
                </tr>
                <tr>
                    <td id="gender"></td>
                </tr>
                <tr>
                    <td id="year"></td>
                </tr>
                <tr>
                    <td id="address"></td>
                </tr>
                <tr>
                    <td id="city"></td>
                </tr>
                <tr>
                    <td id="textarea"></td>
                </tr>
                <tr>
                    <td id="languages"></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../js/validation.js"></script>
<script>
    $(document).ready(function () {
        function lodetable() {
            $.ajax({
                url: "validation.php",
                type: "GET",
                success: function (data) {
                    $('#table').html(data);
                }
            });
        }

        lodetable();

        $('form').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: 'insert_form_data.php',
                data: $('form').serialize(),
                success: function (data) {
                    $("#table").text("");
                    let parseData = jQuery.parseJSON(data);
                    $("#result").text("Your data:");
                    $("#firstname").text("First name: " + parseData['firstname']);
                    $("#lastname").text("Last name: " + parseData['lastname']);
                    $("#gender").text("Gender: " + parseData['gender']);
                    $("#year").text("Year :" + parseData['year']);
                    $("#address").text("Address: " + parseData['address']);
                    $("#city").text("City:" + parseData['city']);
                    $("#textarea").text("About you: " + parseData['textarea']);
                    $("#languages").text("Your skills: " + parseData['languages']);
                }
            });
        });
    });
</script>
<?php require '../view/body.php'; ?>
