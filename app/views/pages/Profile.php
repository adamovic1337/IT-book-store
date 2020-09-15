<main class="container">
    <div class="row margin-y padding-b">
        <div class="col s6 offset-s3">
            <h2 class="center-align">Profile</h2>
            <form id="contact" action="index.php" method="post" onsubmit="return updateProfile();" enctype="multipart/form-data">
                <input type="hidden" name="ajax" value="profileUpdate">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="profileFirstName" name="profileFirstName" type="text" class="" value="<?= $_SESSION["user"]->firstName ?>">
                        <label for="profileFirstName">First name</label>
                        <span class="helper-text" data-error="Required, first capital letter"
                              data-success="Correct">e.g. John</span>
                    </div>
                    <div class="input-field col s6">
                        <input id="profileLastName" name="profileLastName" type="text" class="" value="<?= $_SESSION["user"]->lastName ?>">
                        <label for="profileLastName">Last name</label>
                        <span class="helper-text" data-error="Required, first capital letter"
                              data-success="Correct">e.g. Wick</span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="profileUsername" name="profileUsername" type="text" class="" value="<?= $_SESSION["user"]->username ?>" disabled>
                        <label for="profileUsername">Username</label>
                        <span class="helper-text">Can't be changed</span>
                    </div>
                    <div class="input-field col s6">
                        <input id="profilePassword" name="profilePassword" type="password" class="" value="">
                        <label for="profilePassword">Password *</label>
                        <span class="helper-text" data-error="Required, max 13, min 3 characters"
                              data-success="Correct">Max 13, min 3 characters</span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 offset-s3">
                        <select id="profileCountries" name="profileCountries">
                            <option value="0" disabled selected>Choose your option</option>
                            <?php
                            foreach ($data["countries"] as $country):
                                if ($country->idCountry == $_SESSION["user"]->idCountry):
                                    ?>
                                    <option value="<?= $country->idCountry ?>" selected><?= $country->name ?></option>
                                <?php else: ?>
                                    <option value="<?= $country->idCountry ?>"><?= $country->name ?></option>
                                <?php endif; endforeach; ?>
                        </select>
                        <label>Country</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="profileEmail" name="profileEmail" type="text" class="" value="<?= $_SESSION["user"]->email ?>">
                        <label for="profileEmail">Email *</label>
                        <span class="helper-text" data-error="Wrong format. Example: example@example.com"
                              data-success="Correct">example@example.com</span>
                    </div>
                </div>
                <div class=" col s6 offset-s3">
                    <img src="public/img/originals/<?= $_SESSION["user"]->avatarOriginal ?>" alt="avatar" class="materialboxed imgSize">
                </div>
                <div class="clearfix"></div>
                <button class="btn waves-effect waves-light orange accent-4 button-center margin-t" type="submit" id="profileUpdate" name="profileUpdate"
                        value="<?= $_SESSION["user"]->idUser ?>">
                    Save
                    <i class="material-icons right">send</i>
                </button>
            </form>
        </div>
    </div>
</main>

