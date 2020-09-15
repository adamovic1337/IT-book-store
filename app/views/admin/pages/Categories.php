<table class="highlight centered container width-50">
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>insert</th>
    </tr>
    </thead>
    <tbody>
    <form action="admin.php" method="post">
        <tr>
            <td>*</td>
            <td>
                <div class="input-field col s12">
                    <input value="" id="insertCategory" name="insertName" type="text" class="validate">
                    <label class="active" for="insertCategory">Name</label>
                </div>
            </td>
            <td>
                <input type="hidden" name="admin" value="insertForCategories">
                <button type="submit" name="insert" value="insert"
                        class="waves-effect waves-light btn orange accent-4">
                    <i class="fas fa-database"></i>
                </button>
            </td>
        </tr>
    </form>
    </tbody>

    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($data as $item):
        ?>
        <tr>
            <td><?= $item->idCategory ?></td>
            <form action="admin.php" method="post">
                <td>
                    <div class="row">
                        <div class="input-field col s12">
                            <input value="<?= $item->name ?>" name="updateName"
                                   id="updateName" type="text"
                                   class="validate">
                            <label class="active" for="updateName">Name</label>
                        </div>
                    </div>
                </td>
                <td>
                    <input type="hidden" name="admin" value="updateForCategories">
                    <button type="submit" name="update" value="<?= $item->idCategory ?>"
                            class="waves-effect waves-light modal-trigger btn orange accent-4">
                        <i class="material-icons">edit</i>
                    </button>
                </td>
            </form>
            <form action="admin.php" method="post"">
            <td>
                <input type="hidden" name="admin" value="deleteForCategories">
                <button type="submit" name="delete" value="<?= $item->idCategory ?>"
                        class="waves-effect waves-light btn orange accent-4">
                    <i class="material-icons">delete</i>
                </button>
            </td>
            </form>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

