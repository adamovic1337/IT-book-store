<table class="highlight centered container">
    <thead>
    <tr>
        <th>Header</th>
        <th>Update</th>
    </tr>
    </thead>
    <tbody>
    <form action="admin.php" method="post">
        <tr>
            <td>
                <div class="input-field col s12">
                    <input value="<?= $data["textData"]->header ?>" id="footerHeader" name="footerHeader" type="text"
                           class="validate">
                    <label class="active" for="footerHeader">Header</label>
                </div>
            </td>
            <td></td>
        </tr>

    </tbody>

    <thead>
    <tr>
        <th>Content</th>
        <th></th>
    </tr>
    </thead>
    <tbody>

    <tr>
        <td>
            <div class="row">
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="textarea1" name="footerContent"
                                  class="materialize-textarea"><?= $data["textData"]->content ?></textarea>
                        <label for="textarea1">Content</label>
                    </div>
                </div>
            </div>
        </td>
        <td>
            <input type="hidden" name="admin" value="updateForFooter">
            <button type="submit" name="updateContent" value="<?= $data["textData"]->idFooter ?>"
                    class="waves-effect waves-light btn orange accent-4">
                <i class="material-icons">edit</i>
            </button>
        </td>
        </form>
    </tr>

    </tbody>
</table>

