<main class="container row">
    <aside class="col s3">
        <!--  Search  -->
        <div class="input-field">
            <input type="text" id="autocomplete-input" class="autocomplete">
            <label for="autocomplete-input"><i class="material-icons">search</i></label>
        </div>
        <!--  Filter  -->
        <p>Filter Categories</p>
        <div class="aside-container margin-y">
            <form>
                <?php
                foreach ($data["categories"] as $key=>$item):
                    ?>
                    <p>
                        <label>
                            <input type="checkbox" class="filled-in categories" value="<?= $item->idCategory ?>"/>
                            <span><?= $item->name ?></span>
                        </label>
                        <?php
                            if($data["bookNumbers"][$key] == null):
                        ?>
                            <span class="badge grey-text">0</span>
                        <?php
                            else:
                        ?>
                            <span class="badge grey-text"><?= $data["bookNumbers"][$key] ?></span>
                        <?php endif; ?>
                    </p>
                <?php endforeach; ?>
            </form>
        </div>
        <div class="divider divider-color"></div>
        <!--  Sort  -->
        <p class="margin-t">Sort By Name</p>
        <div class="aside-container margin-y">
            <form>
                <p>
                    <label>
                        <input name="group1" type="radio" class="sorting" value="asc"/>
                        <span><i class="fas fa-sort-alpha-down icon-size"></i></span>
                    </label>
                </p>
                <p>
                    <label>
                        <input name="group1" type="radio"class="sorting" value="desc"/>
                        <span><i class="fas fa-sort-alpha-up icon-size"></i></span>
                    </label>
                </p>
            </form>
        </div>
        <div class="divider divider-color"></div>
    </aside>

    <section class="col s9 padding-t">
        <div class="row" id="books">
            <?php
                foreach ($data["books"] as $item):
            ?>
            <div class="col s3">
                <div class="row">
                    <div class="col s12">
                        <div class="card">
                            <div class="card-image">
                                <img src="public/img/small/<?= $item->small ?>">
                            </div>
                            <div class="card-action">
                                <a href="index.php?page=details&book=<?= $item->idBook ?>"
                                   class="btn waves-effect waves-light orange accent-4 button-center" target="_blank">Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <ul class="pagination center-align" id="pagination">
            <?php
                for ($i = 1; $i <= $data["pagination"]; $i++):
                    if ($i == 1):
            ?>
                <li class="waves-effect active pagination"><a href="#" data-page="<?= $i ?>"><?= $i ?></a></li>
            <?php else: ?>
                <li class="waves-effect pagination"><a href="#" data-page="<?= $i ?>"><?= $i ?></a></li>
            <?php endif; endfor; ?>
        </ul>
    </section>
</main>



