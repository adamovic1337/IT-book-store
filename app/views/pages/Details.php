<main class="container">
    <div class="row margin-t">
        <div class="col s8">
            <h2><?= $data["bookDetails"]->bookName ?></h2>
            <h6 class="">by:
                <?php
                foreach ($data["bookDetails"]->authors as $key=>$author){
                    if($key == 0) {
                        echo $author->author;
                    } else {
                        echo ", ".$author->author;
                    }
                }
                ?>
            </h6>
            <p class="justify-align"><?= $data["bookDetails"]->description ?></p>
            <p>ISBN: <?= $data["bookDetails"]->isbn ?></p>
            <blockquote>Price: $<?= $data["bookDetails"]->price ?></blockquote>
        </div>
        <div class="col s4">
            <img src="public/img/originals/<?= $data["bookDetails"]->original ?>" alt="Book Cover"
                 class="image">
            <div class="margin-t">
                <button type="button" data-id="<?= $data["bookDetails"]->idBook ?>" class="btn waves-effect waves-light orange accent-4 button-center cart" >Add to cart</button>
            </div>
        </div>
    </div>
</main>


