<?php include_once('../../includes/db/init.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../dist/css/multi_form.css" />
    <script src="../../dist/scripts/mulForm.js" defer></script>
    <script src="../../dist/scripts/customSelect.js" defer></script>
    <title>Registraion Form</title>
</head>

<body>
    <form action="#" class="form">
        <h1 class="text-center">Create Post</h1>
        <!-- Progress bar -->
        <div class="progressbar">
            <div class="progress" id="progress"></div>
            <div class="progress-step progress-step-active" data-title="Category"></div>
            <div class="progress-step" data-title="Info"></div>
            <div class="progress-step" data-title="Title"></div>
            <div class="progress-step" data-title="Images"></div>
            <div class="progress-step" data-title="Addition"></div>
        </div>
        <!-- Steps -->
        <div class="form-step form-step-active">
            <div class="category-container">
                <h3>Scroll for more categories</h3>
                <select class="cat-select__selected" size="5">
                    <?php
                    $db = new Database();
                    $moreCats = $db->getRows("SELECT DISTINCT(cat) FROM cats ORDER BY cat ");
                    foreach ($moreCats as $row) {
                    ?>
                        <option value="<<?php echo strtolower($row['cat']); ?>"><?php echo $row['cat']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="">
                <a href="#" class="btn btn-next width-50 ml-auto">Next</a>
            </div>
        </div>
        <div class="form-step">
            <div class="form-step__grid-setup">
                <div>
                    <h3>Gender</h3>
                    <select class="cat-select__selected" size="4">
                        <?php
                        $db = new Database();
                        $moreCats = $db->getRows("SELECT DISTINCT(gender) FROM forms");
                        foreach ($moreCats as $row) {
                        ?>
                            <option value="<<?php echo strtolower($row['gender']); ?>"><?php echo $row['gender']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div>
                    <h3>Age Group</h3>
                    <select class="cat-select__selected" size="4">
                        <?php
                        $db = new Database();
                        $moreCats = $db->getRows("SELECT DISTINCT(age_group) FROM forms");
                        foreach ($moreCats as $row) {
                        ?>
                            <option value="<<?php echo strtolower($row['age_group']); ?>"><?php echo $row['age_group']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div>
                <input type="url" name="post-title" placeholder="Title" id="" class="form-input">
            </div>

            <div class="btns-group">
                <a href="#" class="btn btn-prev">Previous</a>
                <a href="#" class="btn btn-next">Next</a>
            </div>
        </div>
        <div class="form-step">
            <div class="input-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" />
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" />
            </div>
            <div class="btns-group">
                <a href="#" class="btn btn-prev">Previous</a>
                <a href="#" class="btn btn-next">Next</a>
            </div>
        </div>
        <div class="form-step">
            <div class="input-group">
                <label for="dob">Date of Birth</label>
                <input type="date" name="dob" id="dob" />
            </div>
            <div class="input-group">
                <label for="ID">National ID</label>
                <input type="number" name="ID" id="ID" />
            </div>
            <div class="btns-group">
                <a href="#" class="btn btn-prev">Previous</a>
                <a href="#" class="btn btn-next">Next</a>
            </div>
        </div>
        <div class="form-step">
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" />
            </div>
            <div class="input-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" name="confirmPassword" id="confirmPassword" />
            </div>
            <div class="btns-group">
                <a href="#" class="btn btn-prev">Previous</a>
                <input type="submit" value="Submit" class="btn" />
            </div>
        </div>
    </form>
</body>

</html>