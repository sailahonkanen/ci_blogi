<div class="row">
    <div class="content">
        <?php
        print "<h1>$kirjoitus->otsikko</h1>";
        print '<span>' . $this->util->format_sqldate_to_fin($kirjoitus->paivays) . '</span>';
        print '&nbsp;';
        print '<span> by ' . $kirjoitus->tunnus . '</span>';
        print "<p> $kirjoitus->teksti </p>";

        if (isset($this->session->userdata['id'])) {

            echo form_open('kommentti/tallenna');
            ?>

            <div class="form-group">
                <input type="hidden" name="kirjoitus_id" value="<?php print $kirjoitus->id; ?>">
                <textarea name="teksti"></textarea>
                <input type="hidden" value="<?php echo $this->session->userdata['id']; ?>" name="kayttaja_id">
            </div>
            <button>Tallenna</button>
            <?php
            echo form_close();
            foreach ($kommentit as $kommentti) {

                print "<ul>";
                print "<li>" . $kommentti->teksti;
                print '<span>' . $this->util->format_sqldate_to_fin($kommentti->paivays) . '</span>';
                print '&nbsp;';
                print '<span> by ' . $kommentti->tunnus . '</span>';
                print anchor("kommentti/poista/$kommentti->id/$kommentti->kirjoitus_id", "<i class='fas fa-trash-alt'></i>", array("onclick" => "return confirm('Haluatko varmasti poistaa kommentin?');"));
                print "</ul>";
            }
        }
        ?>

    </div>
</div>
