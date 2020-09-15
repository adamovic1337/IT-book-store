<section class="col s10 padding-t">
    <div class="row">
        <div class="col s6">
            <div class="padding">
                <h5 class="center-align">Book sold</h5>
                <h3 class="center-align">
                    <?= $data->number ?>
                </h3>
            </div>
        </div>
        <div class="col s6">
            <div class="padding">
                <h5 class="center-align">Online Users</h5>
                <h3 class="center-align">
                    <?php
                    $online = file("app/data/log-online.txt");
                    echo $online[0];
                    ?>
                </h3>
            </div>
        </div>
    </div>
    <di class="row">
        <div class="col s6">
            <div class="z-depth-1 padding">
                <h5 class="center-align padding-b">Error Logs</h5>

                <?php
                $errors = file("app/data/log-errors.txt");
                $tmp = count($errors);
                for ($i = 0; $i < $tmp; $i++) {
                    echo "<p>";
                    $error = explode("\t", $errors[$i]);
                    foreach ($error as $key => $e) {
                        if ($key == 0) {
                            echo "-" . $e . " ";
                        } else {
                            echo $e . " ";
                        }

                    }
                    echo "</p>";
                }

                ?>
            </div>
        </div>
        <div class="col s6">
            <div class="z-depth-1 padding">
                <h5 class="center-align padding-b">Page Access Logs</h5>

                <?php
                $pages = file("app/data/log-page.txt");
                $tmp = count($pages);
                for ($i = 0; $i < $tmp; $i++) {
                    echo "<p>";
                    $page = explode("\t", $pages[$i]);
                    foreach ($page as $key => $e) {
                        if ($key == 0) {
                            echo "-" . $e . " ";
                        } else {
                            echo $e . " ";
                        }

                    }
                    echo "</p>";
                }

                ?>
            </div>
        </div>
    </di>
</section>
