<?php include_once('../../includes/db/init.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../dist/css/multi_form.css" />
    
    <title>Registraion Form</title>
</head>
<body>
    <form action="#" class="post-form">
        <h1 class="heading-secondary heading-secondary--center-auto">Create Post</h1>
        <!-- Progress bar -->
        <div class="progressbar">
            <div class="progressbar__progress" id="progress"></div>
            <div class="progressbar__progress-step progressbar__progress-step-active" data-title="Category"></div>
            <div class="progressbar__progress-step" data-title="Info"></div>
            <div class="progressbar__progress-step" data-title="Title"></div>
            <div class="progressbar__progress-step" data-title="Images"></div>
            <div class="progressbar__progress-step" data-title="Addition"></div>
        </div>
        <!-- Steps -->
        <div class="form-step form-step-active">
            <div>
                <label class="post-form__label-heading" for="select_category" class="post-form__label">Scroll for more categories</label>
                <select class="cat-select__selected" id="select_category" name="select_category" size="5">
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
                <a href="javascript:void(0)" class="btns-group__btn btns-group__btn-next btns-group__btn--one">Next</a>
            </div>
        </div>
        <div class="form-step">
            <div class="form-step__grid-setup">
                <div>
                    <label class="post-form__label-heading" for="email">Gender</label>
                    <select class="cat-select__selected--no-bar" size="4">
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
                    <label class="post-form__label-heading" for="email">Age Group</label>
                    <select class="cat-select__selected--no-bar" size="4">
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
            <div class="form__group">
                <input type="url" name="post-title" placeholder="Youtube URL" id="y-url" class="form__input">
                <label for="y-url" class="form__label">Youtube URL</label>
            </div>
            <div class="btns-group">
                <a href="#" class="btns-group__btn btns-group__btn-prev">Previous</a>
                <a href="#" class="btns-group__btn btns-group__btn-next">Next</a>
            </div>
        </div>
        <div class="form-step">
            <div class="form__group">
                <input type="text" class="form__input" placeholder="Title" name="title" id="title" />
                <label class="form__label" for="title">Title</label>
            </div>
            <div class="form__group">
                <textarea type="text" name="description" id="description" class="input-group__post-description form__input" placeholder="Description"></textarea>
                <label class="form__label" for="description">Description</label>
            </div>
            <div class="btns-group">
                <a href="#" class="btns-group__btn btns-group__btn-prev">Previous</a>
                <a href="#" class="btns-group__btn btns-group__btn-next">Next</a>
            </div>
        </div>
        <div class="form-step">
            <label class="post-form__label-heading">Add Images</label>
            <div class="form-step__img-upload-section">
                <?php
                for ($x = 0; $x <= 3; $x++) {
                ?>
                    <div class="image-upload-<?php echo $x; ?>">
                        <div class="center">
                            <div class="form-input">
                                <label class="post-form__label" for="file-ip-<?php echo $x; ?>">
                                    <img id="file-ip-<?php echo $x; ?>-preview" alt="__Add Image">
                                    <button type="button" class="imgRemove" title='removes image' onclick="myImgRemove(<?php echo $x; ?>)"></button>
                                </label>
                                <input type="file" name="img<?php echo $x; ?>" id="file-ip-<?php echo $x; ?>" accept="image/*" onchange="showPreview(event, <?php echo $x; ?>);">
                            </div>
                        </div>
                    </div>
                    <script>
                        var number = <?php echo $x; ?>;
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
                <a href="#" class="btns-group__btn btns-group__btn-prev">Previous</a>
                <a href="#" class="btns-group__btn btns-group__btn-next">Next</a>
            </div>
        </div>
        <div class="form-step">
            <div class="input-group">
                <div class="user-info">
                    <label class="post-form__label-heading" for="user-info">Display User Info
                        <input type="checkbox" name="user-info" id="user-info" value="yes">
                    </label>
                    <label class="post-form__label-heading" for="user-comments">Allow Social
                        <input type="checkbox" name="user-comments" id="user-comments" value="yes">
                    </label>
                </div>
                <div class="form__group">
                    <input type="url" name="additional-links" class="form__input" placeholder="Website" id="additional-links" />
                    <label class="form__label" for="additional-links">Website</label>
                </div>
            </div>
            <div class="input-group">
                <div class="center">
                    <!-- <input type="checkbox" name=""> Show User Info -->
                </div>
            </div>
            <div class="btns-group">
                <div><a href="#" class="btns-group__btn btns-group__btn-prev">Previous</a></div>
               <div><input type="submit" value="Submit" class="btns-group__btn" /></div> 
            </div>
        </div>
    </form>
</body>
</html>