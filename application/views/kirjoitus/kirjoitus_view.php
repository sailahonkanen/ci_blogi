<?php
echo form_open('kirjoitus/tallenna');
?>
<div class="row">
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Lisää kirjoitus</h1>
                <input type="hidden" value="<?php echo $id; ?>" name="id">
            </div>
            <div class="card-body">

                <div class="form-group">
                    <input type="text" class="form-control" id="otsikko" placeholder="Otsikko tähän" name="otsikko" value="<?php echo $otsikko; ?>">
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="5" id="teksti" placeholder="Teksti tänne..." name="teksti" value="<?php echo $teksti; ?>"></textarea>
                </div>
                <input type="hidden" value="<?php echo $this->session->userdata['id']; ?>" name="kayttaja_id">
                <?php
                echo validation_errors();
                echo '<div class="buttons">';
                $js = "onclick=window.location='" . site_url() . "/kirjoitus/index';";
                echo form_submit('tallenna', 'Tallenna');
                
                echo form_button('peruuta', 'Peruuta', $js);
                echo '</div>';
                echo form_close();
                ?>
            </div>
        </div>
    </div>
</div>