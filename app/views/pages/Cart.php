<main class="container">
    <h2 class="center-align">Cart</h2>
    <?php
        if(isset($_SESSION["user"])):
    ?>
        <input type="hidden" id="userShop" value="<?= $_SESSION["user"]->idUser ?>">
    <?php endif; ?>
    <table class="centered margin-t">
        <thead>
        <tr>
            <th>ISBN</th>
            <th>Item Name</th>
            <th>Item Price</th>
            <th>
                <button type="submit" name="delete" id="dropAllBooks"
                        class="waves-effect waves-light btn-small btn-floating orange accent-4">
                    <i class="material-icons">delete</i>
                </button>
            </th>
        </tr>
        </thead>

        <tbody id="shopping">

        </tbody>
    </table>
</main>
