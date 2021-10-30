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
                <label>Scroll for more categories</label>
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
                    <label for="email">Gender</label>
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
                    <label for="email">Age Group</label>
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
                <input type="url" name="post-title" placeholder="Youtube URL" id="" class="form-input">
            </div>
            <div class="btns-group">
                <a href="#" class="btn btn-prev">Previous</a>
                <a href="#" class="btn btn-next">Next</a>
            </div>
        </div>
        <div class="form-step">
            <div class="input-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" />
            </div>
            <div class="input-group">
                <label for="description">Description</label>
                <textarea type="text" name="description" id="description" class="input-group__post-description" placeholder="description"></textarea>
            </div>
            <div class="btns-group">
                <a href="#" class="btn btn-prev">Previous</a>
                <a href="#" class="btn btn-next">Next</a>
            </div>
        </div>
        <div class="form-step">
            <label>Add Images</label>
            <div class="form-step__img-upload-section">
                <?php
                for ($x = 0; $x <= 3; $x++) {
                ?>
                    <div class="image-upload-<?php echo $x; ?>">
                        <div class="center">
                            <div class="form-input">
                                <label for="file-ip-<?php echo $x; ?>">
                                    <img id="file-ip-<?php echo $x; ?>-preview" alt="__Add Image" src="../../img/image.png">
                                    <button type="button" class="imgRemove" onclick="myImgRemove(<?php echo $x; ?>)"></button>
                                </label>
                                <input type="file" name="img<?php echo $x; ?>"  id="file-ip-<?php echo $x; ?>" accept="image/*" onchange="showPreview(event, <?php echo $x; ?>);">
                            </div>
                        </div>
                    </div>
                    <script>
                        var number = <?php echo $x;?>;
                        console.log(<?php echo $x;?>)
                            function showPreview(event, number) {
                                if (event.target.files.length > 0) {
                                    let src = URL.createObjectURL(event.target.files[0]);
                                    let preview = document.getElementById("file-ip-" + number + "-preview");
                                    preview.src = src;
                                    preview.style.display = "block";
                                }
                            }
                            function myImgRemove(number) {
                                document.getElementById("file-ip-" + number + "-preview").src = "../../img/image.png";
                                document.getElementById("file-ip-" + number).value = null;
                            }
                    </script>
                <?php } ?>
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