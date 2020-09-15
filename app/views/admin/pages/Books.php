<table class="highlight centered container">
    <thead>
    <tr>
        <th>*</th>
        <th>New</th>
        <th>Book</th>
        <th>insert</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <form action="admin.php" method="post" enctype="multipart/form-data">
        <tr>
            <td></td>
            <td>
                <div class="input-field col s12">
                    <input value="" id="bookName" name="bookName" type="text" class="validate">
                    <label class="active" for="bookName">Book Name</label>
                </div>
            </td>
            <td>
                <div class="input-field col s12">
                    <input value="" id="bookIsbn" name="bookIsbn" type="text" class="validate">
                    <label class="active" for="bookIsbn">ISBN</label>
                </div>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <div class="input-field col s12">
                    <select name="bookCategory">
                        <option value="" disabled selected>Choose category</option>
                        <?php
                        foreach ($data["categories"] as $item):
                            ?>
                            <option value="<?= $item->idCategory ?>"><?= $item->name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label>Category</label>
                </div>
            </td>
            <td>
                <div class="input-field col s12">
                    <input value="" id="bookPrice" name="bookPrice" type="text" class="validate">
                    <label class="active" for="bookPrice">Price</label>
                </div>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">
                <div class="input-field col s12">
                    <select multiple name="bookAuthors">
                        <option value="" disabled selected>Choose authors</option>
                        <?php
                        foreach ($data["authors"] as $item):
                            ?>
                            <option value="<?= $item->idAuthor ?>"><?= $item->full_name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label>Authors</label>
                </div>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">
                <div class="input-field col s12">
                    <textarea id="description" name="bookDescription" class="materialize-textarea"></textarea>
                    <label for="description">Description</label>
                </div>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <div class="file-field input-field col s12">
                    <div class="btn">
                        <span>Upload book Cover</span>
                        <input type="file" name="bookCover">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" hidden>
                    </div>
                </div>
            </td>
            <td></td>
            <td>
                <button type="submit" name="insert" value="insert"
                        class="waves-effect waves-light btn orange accent-4">
                    <i class="fas fa-database"></i>
                </button>
            </td>
            <td></td>
        </tr>
    </form>
    </tbody>
    <!--********************************-->
    <thead>
    <tr>
        <th>Id</th>
        <th>---</th>
        <th>---</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <form action="admin.php" method="post" enctype="multipart/form-data">
        <?php
        foreach ($data["books"] as $book):
        ?>
        <tr>
            <td><?= $book->idBook ?></td>
            <td>
                <div class="input-field col s12">
                    <input value="<?= $book->bookName ?>" id="bookName" name="bookName" type="text" class="validate">
                    <label class="active" for="bookName">Book Name</label>
                </div>
            </td>
            <td>
                <div class="input-field col s12">
                    <input value="<?= $book->isbn ?>" id="bookIsbn" name="bookIsbn" type="text" class="validate">
                    <label class="active" for="bookIsbn">ISBN</label>
                </div>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <div class="input-field col s12">
                    <select name="bookCategory">
                        <option value="" disabled selected>Choose category</option>
                        <?php
                        foreach ($data["categories"] as $item):
                            if ($book->idCategory == $item->idCategory):
                                ?>
                                <option value="<?= $item->idCategory ?>" selected><?= $item->name ?></option>
                            <?php else: ?>
                                <option value="<?= $item->idCategory ?>"><?= $item->name ?></option>
                            <?php endif; endforeach; ?>
                    </select>
                    <label>Category</label>
                </div>
            </td>
            <td>
                <div class="input-field col s12">
                    <input value="<?= $book->price ?>" id="bookPrice" name="bookPrice" type="text" class="validate">
                    <label class="active" for="bookPrice">Price $</label>
                </div>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">
                <div class="input-field col s12">
                    <select multiple name="bookAuthors">
                        <option value="" disabled selected>Choose authors</option>
                        <?php

                        foreach ($book->authors as $author):
                            foreach ($data["authors"] as $item):
                                if ($author->idAuthor == $item->idAuthor):
                                    ?>
                                    <option value="<?= $item->idAuthor ?>" selected><?= $item->full_name ?></option>
                                <?php else: ?>
                                    <option value="<?= $item->idAuthor ?>"><?= $item->full_name ?></option>
                                <?php endif; endforeach; endforeach; ?>
                    </select>
                    <label>Authors</label>
                </div>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2">
                <div class="input-field col s12">
                    <textarea id="description" name="bookDescription" class="materialize-textarea justify-align"><?= $book->description ?></textarea>
                    <label for="description">Description</label>
                </div>
            </td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <div class="file-field input-field col s12">
                    <div class="btn">
                        <span>Upload book Cover</span>
                        <input type="file" name="bookCover">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" hidden>
                    </div>
                </div>
            </td>
            <td>
                <div class=" col s6 offset-s3">
                    <img src="public/img/originals/<?= $book->original ?>" alt="avatar" class="materialboxed imgSize2">
                </div>
            </td>
            <td>
                <button type="submit" name="update" value="<?= $book->idBook ?>"
                        class="waves-effect waves-light btn orange accent-4">
                    <i class="material-icons">edit</i>
                </button>
            </td>
    </form>
    <form action="admin.php" method="post" enctype="multipart/form-data">
        <td>
            <button type="submit" name="delete" value="<?= $book->idBook ?>"
                    class="waves-effect waves-light modal-trigger btn orange accent-4">
                <i class="material-icons">delete</i>
            </button>
        </td>
    </form>
    </tr>
    <tr>
        <td class="grey lighten-3"></td>
        <td class="grey lighten-3"></td>
        <td class="grey lighten-3"></td>
        <td class="grey lighten-3"></td>
        <td class="grey lighten-3"></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</section>
