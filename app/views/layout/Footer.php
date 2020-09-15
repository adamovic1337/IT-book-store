<footer class="page-footer grey darken-4">
    <div class="container">
        <div class="row">
            <div class="col l6 s12 word-wrap">
                <h5 class="orange-text text-accent-4"><?= $data["footer"]["textData"]->header; ?></h5>
                <p class="grey-text text-lighten-4"><?= $data["footer"]["textData"]->content; ?></p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="orange-text text-accent-4">Follow us on</h5>
                <ul class="social-inline">
                    <?php
                        foreach ($data["footer"]["social"] as $item):
                    ?>
                        <li><a class="hover-text-out hover-text-in" href="<?= $item->link ?>" target="_blank"><?= $item->name ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright grey darken-3">
        <div class="container">
            &copy; <a class="hover-text-out hover-text-in" href="https://www.linkedin.com/in/stefan-adamovic-5a1b36154/" target="_blank">Stefan Adamovic</a> 2019.
            <a class="hover-text-out hover-text-in right" href="documentation.pdf" target="_blank">Documentation</a>
        </div>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="public/js/main.min.js"></script>
</body>

</html>