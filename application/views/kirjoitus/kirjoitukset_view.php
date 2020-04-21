
<div class="row">

    <!-- Blog Entries Column -->
    <div class="content">

        <?php foreach ($kirjoitukset as $kirjoitus) { ?>

            <!-- Blog Post -->
            <div class="card mb-4">
                <div class="card-body">
                    <h1 class="card-title"><?php print $kirjoitus->otsikko; ?></h1>
                    <a class="btn btn-primary" href="<?php print(site_url()) . 'kommentti/index/' . $kirjoitus->id; ?>">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    <?php
                    print $this->util->format_sqldate_to_fin($kirjoitus->paivays) . ' by ' . $kirjoitus->tunnus . '&nbsp;';
                    if (isset($this->session->userdata['id'])) {
                        print anchor("kirjoitus/poista/$kirjoitus->id", "<i class='fas fa-trash-alt'></i>", array("onclick" => "return confirm('Haluatko varmasti poistaa kirjoituksen?');"));
                    }
                    ?>
                </div>
            </div>

        <?php } ?>

    </div>


</div>