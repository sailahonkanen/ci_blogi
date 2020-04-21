
<div class="row">
    <div class="col-lg-6 col-md-8 col-sm-10">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Registration</h3>
            </div>
            <div class="panel-body">

                <?php
                $error_msg = $this->session->flashdata('error_msg');
                if ($error_msg) {
                    ?>
                    <div class="alert alert-danger">
                        <?php echo $error_msg; ?>
                    </div>
                    <?php
                }
                ?>

                <form role="form" method="post" action="<?php echo base_url('kayttaja/register_kayttaja'); ?>">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="Sukunimi" name="sukunimi" type="text" autofocus required>
                        </div>

                        <div class="form-group">
                            <input class="form-control" placeholder="Etunimi" name="etunimi" type="text" required>
                        </div>

                        <div class="form-group">
                            <input class="form-control" placeholder="Tunnus" name="tunnus" type="text" required>
                        </div>

                        <div class="form-group">
                            <input class="form-control" placeholder="Salasana" name="salasana" type="password" value="" required>
                        </div>

                        <div class="form-group">
                            <input class="form-control" placeholder="E-mail" name="email" type="email" required>
                        </div>

                        <input class="btn btn-lg btn-primary btn-block" type="submit" value="Register" name="register" >

                    </fieldset>
                </form>
                <center><b>Already registered ?</b> <br></b><a href="<?php echo base_url('kayttaja/login_view'); ?>">Login here</a></center><!--for centered text-->
            </div>
        </div>
    </div>
</div>