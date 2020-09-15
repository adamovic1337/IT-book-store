<main class="container">
    <div class="row margin-t">
        <div class="col s6 offset-s3">
            <h2 class="center-align">Contact</h2>
            <form id="contact">
                <div class="row">
                    <div class="input-field col s12">
                        <?php
                        if (isset($_SESSION['user'])):
                            ?>
                            <input id="fullName" type="text" class="" value="<?= $_SESSION["user"]->firstName ?> <?= $_SESSION["user"]->lastName ?>">
                            <label for="fullName">Full name *</label>
                        <?php else: ?>
                            <input id="fullName" type="text" class="">
                            <label for="fullName">Full name *</label>
                        <?php endif; ?>
                        <span class="helper-text" data-error="Required, first capital letter, space between names" data-success="Correct">e.g. John Wick</span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <?php
                        if (isset($_SESSION['user'])):
                            ?>
                            <input id="email" type="text" class="" value="<?= $_SESSION["user"]->email ?>">
                            <label for="email">Email *</label>
                        <?php else: ?>
                            <input id="email" type="text" class="">
                            <label for="email">Email *</label>
                        <?php endif; ?>
                        <span class="helper-text" data-error="Wrong format. Example: example@example.com" data-success="Correct">example@example.com</span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="subject" type="text" class="validate">
                        <label for="subject">Subject *</label>
                        <span class="helper-text" data-error="Required" data-success="Correct">Fill this form</span>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="message" class="materialize-textarea"></textarea>
                        <label for="message">Message *</label>
                        <span class="helper-text" data-error="Required" data-success="Correct">Fill this form</span>
                    </div>
                </div>
                <button class="btn waves-effect waves-light orange accent-4 button-center" type="button" id="sendMail" value="send">
                    Send
                    <i class="material-icons right">send</i>
                </button>
                <div class="preloader-wrapper button-center" id="preloader">
                    <div class="spinner-layer spinner-red-only">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div><div class="gap-patch">
                            <div class="circle"></div>
                        </div><div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
