
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-10">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Kirjaudu</h3>
                        </div>
                        <?php
                        $success_msg = $this->session->flashdata('success_msg');
                        $error_msg = $this->session->flashdata('error_msg');

                        if ($success_msg) {
                            ?>
                            <div class="alert alert-success">
                                <?php echo $success_msg; ?>
                            </div>
                            <?php
                        }
                        if ($error_msg) {
                            ?>
                            <div class="alert alert-danger">
                                <?php echo $error_msg; ?>
                            </div>
                            <?php
                        }
                        ?>

                        <div class="panel-body">
                            <form role="form" method="post" action="<?php echo base_url('kayttaja/login_kayttaja'); ?>">
                                <fieldset>
                                    <div class="form-group"  >
                                        <input class="form-control" placeholder="Tunnus" name="tunnus" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Salasana" name="salasana" type="password" value="">
                                    </div>


                                    <input class="btn btn-primary btn-lg btn-block" type="submit" value="Kirjaudu" name="login" >

                                </fieldset>
                            </form>
                            <center><b>Not registered ?</b> <br></b><a href="<?php echo base_url('kayttaja'); ?>">Register here</a></center><!--for centered text-->

                        </div>
                    </div>
                </div>
        </div>