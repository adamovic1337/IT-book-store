<form action="admin.php" method="post">
    <table class="highlight centered container">
        <thead>
        <tr>
            <th>Id</th>
            <th>Original</th>
            <th>Delete</th>
        </tr>
        </thead>

        <tbody>
        <?php
        foreach ($data as $item):
            ?>
            <tr>
                <td><?= $item->idImage ?></td>
                <td>
                    <img src="public/img/originals/<?= $item->original ?>" alt="avatar"
                         class="materialboxed imgSize button-center">
                </td>
                <td>
                    <input type="hidden" name="admin" value="deleteForImages">
                    <input type="hidden" name="original" value="<?= $item->small ?>">
                    <input type="hidden" name="small" value="<?= $item->original ?>">
                    <button type="submit" name="delete" value="<?= $item->idImage ?>" class="waves-effect waves-light btn orange accent-4">
                        <i class="material-icons">delete</i>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</form>
