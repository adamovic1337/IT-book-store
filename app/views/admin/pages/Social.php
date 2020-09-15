<table class="highlight centered container">
    <thead>
    <tr>
        <th>Id</th>
        <th>link</th>
        <th>icon</th>
        <th>insert</th>
    </tr>
    </thead>
    <tbody>
    <form action="admin.php" method="post">
        <tr>
            <td>*</td>
            <td>
                <div class="input-field col s12">
                    <input value="" id="insertLink" name="insertLink" type="text" class="validate">
                    <label class="active" for="insertLink">Link</label>
                </div>
            </td>
            <td>
                <div class="input-field col s12">
                    <input value="" id="insertName" name="insertName" type="text" class="validate">
                    <label class="active" for="insertName">Icon</label>
                </div>
            </td>
            <td>
                <input type="hidden" name="admin" value="insertForSocial">
                <button type="submit" name="insert" value="insert"
                        class="waves-effect waves-light modal-trigger btn orange accent-4">
                    <i class="fas fa-database"></i>
                </button>
            </td>
        </tr>
    </form>
    </tbody>

    <thead>
    <tr>
        <th>Id</th>
        <th>Link</th>
        <th>Name</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($data["social"] as $item):
        ?>
        <tr>
            <td><?= $item->idSocial ?></td>
            <form action="admin.php" method="post">
                <td>
                    <div class="row">
                        <div class="input-field col s12">
                            <input value="<?= $item->link ?>" name="updateUrl"
                                   id="updateUrl" type="text"
                                   class="validate">
                            <label class="active" for="updateUrl">Link</label>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="row">
                        <div class="input-field col s12">
                            <input value='<?= $item->name ?>' name="updateName"
                                   id="updateName" type="text"
                                   class="validate">
                            <label class="active" for="updateName">Icon</label>
                        </div>
                    </div>
                </td>
                <td>
                    <input type="hidden" name="admin" value="updateForSocial">
                    <button type="submit" name="update" value="<?= $item->idSocial ?>"
                            class="waves-effect waves-light btn orange accent-4">
                        <i class="material-icons">edit</i>
                    </button>
                </td>
            </form>
            <form action="admin.php" method="post"">
            <td>
                <input type="hidden" name="admin" value="deleteForSocial">
                <button type="submit" name="delete" value="<?= $item->idSocial ?>"
                        class="waves-effect waves-light btn orange accent-4">
                    <i class="material-icons">delete</i>
                </button>
            </td>
            </form>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
