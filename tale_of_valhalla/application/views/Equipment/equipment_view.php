<!-- Main content -->
<section class="content"> 

    <!-- Equipment -->
    <div class="col-sm-4">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Equipamento</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-sm-12">
                    <div class="row">
                        <?php
                        if ($this->session->has_userdata('message')) {
                            $message = $this->session->flashdata('message');
                            if ($this->session->flashdata('situation') == '1') {
                                echo "<div class='alert alert-success alert-dismissable' style='margin-left: 15px; margin-right: 15px;'>";
                                echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                                echo $message;
                                echo "</div>";
                            } else {
                                echo "<div class='alert alert-danger alert-dismissable' style='margin-left: 15px; margin-right: 15px;'>";
                                echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                                echo $message;
                                echo "</div>";
                            }
                        }
                        ?>

                        <?php
                        if (isset($helmet)) {
                            ?>

                            <!-- Helmet -->
                            <div class="col-sm-12">
                                <center> <img src="http://localhost/tale_of_valhalla/tale_of_valhalla_admin/items_images/<?= $helmet->image ?>" class="img-rounded img-thumbnail" style="width: 115px; height: 95px;"> </center>

                                <hr>        

                                <div class="col-sm-12">
                                    <a href="<?= base_url('/equipment/unequip_item/' . $this->session->selected_character . '/' . $helmet->id) ?>" class="btn btn-lg btn-warning btn-fill" role="button">Desequipar</a>
                                </div>
                            </div>

                        <?php } else { ?>

                            <!-- Helmet -->
                            <div class="col-sm-12">
                                <center> <img src="<?= base_url('/backgrounds/warrior.jpg') ?>" class="img-rounded img-thumbnail" style="width: 100px; height: 150px;"> </center>
                            </div>

                        <?php } ?>

                        <?php
                        if (isset($armor)) {
                            ?>

                            <!-- Armor -->
                            <div class="col-sm-12">
                                <center> <img src="http://localhost/tale_of_valhalla/tale_of_valhalla_admin/items_images/<?= $armor->image ?>" class="img-rounded img-thumbnail" style="width: 115px; height: 95px;"> </center>

                                <hr>        

                                <div class="col-sm-12">
                                    <a href="<?= base_url('/equipment/unequip_item/' . $this->session->selected_character . '/' . $armor->id) ?>" class="btn btn-lg btn-warning btn-fill" role="button">Desequipar</a>
                                </div>
                            </div>

                        <?php } else { ?>

                            <!-- Armor -->
                            <div class="col-sm-12">
                                <center> <img src="<?= base_url('/backgrounds/warrior.jpg') ?>" class="img-rounded img-thumbnail" style="width: 100px; height: 150px;"> </center>
                            </div>

                    <?php } ?>

                    <?php
                    if (isset($pants)) {
                        ?>

                        <!-- Pants -->
                        <div class="col-sm-12">
                            <center> <img src="http://localhost/tale_of_valhalla/tale_of_valhalla_admin/items_images/<?= $pants->image ?>" class="img-rounded img-thumbnail" style="width: 115px; height: 95px;"> </center>

                            <hr>        

                            <div class="col-sm-12">
                                <a href="<?= base_url('/equipment/unequip_item/' . $this->session->selected_character . '/' . $pants->id) ?>" class="btn btn-lg btn-warning btn-fill" role="button">Desequipar</a>
                            </div>
                        </div>

                    <?php } else { ?>

                        <!-- Pants -->
                        <div class="col-sm-12">
                            <center> <img src="<?= base_url('/backgrounds/warrior.jpg') ?>" class="img-rounded img-thumbnail" style="width: 100px; height: 150px;"> </center>
                        </div>

                    <?php } ?>

                    <?php
                    if (isset($gloves)) {
                        ?>

                        <!-- Gloves -->
                        <div class="col-sm-12">
                            <center> <img src="http://localhost/tale_of_valhalla/tale_of_valhalla_admin/items_images/<?= $gloves->image ?>" class="img-rounded img-thumbnail" style="width: 115px; height: 95px;"> </center>

                            <hr>        

                            <div class="col-sm-12">
                                <a href="<?= base_url('/equipment/unequip_item/' . $this->session->selected_character . '/' . $gloves->id) ?>" class="btn btn-lg btn-warning btn-fill" role="button">Desequipar</a>
                            </div>
                        </div>

                    <?php } else { ?>

                        <!-- Gloves -->
                        <div class="col-sm-12">
                            <center> <img src="<?= base_url('/backgrounds/warrior.jpg') ?>" class="img-rounded img-thumbnail" style="width: 100px; height: 150px;"> </center>
                        </div>

                    <?php } ?>

                    <?php
                    if (isset($boots)) {
                        ?>

                        <!-- Boots -->
                        <div class="col-sm-12">
                            <center> <img src="http://localhost/tale_of_valhalla/tale_of_valhalla_admin/items_images/<?= $boots->image ?>" class="img-rounded img-thumbnail" style="width: 115px; height: 95px;"> </center>

                            <hr>        

                            <div class="col-sm-12">
                                <a href="<?= base_url('/equipment/unequip_item/' . $this->session->selected_character . '/' . $boots->id) ?>" class="btn btn-lg btn-warning btn-fill" role="button">Desequipar</a>
                            </div>
                        </div>

                    <?php } else { ?>

                        <!-- Boots -->
                        <div class="col-sm-12">
                            <center> <img src="<?= base_url('/backgrounds/warrior.jpg') ?>" class="img-rounded img-thumbnail" style="width: 100px; height: 150px;"> </center>
                        </div>

                    <?php } ?>

                    <?php
                    if (isset($weapon)) {
                        ?>

                        <!-- Weapon -->
                        <div class="col-sm-12">
                            <center> <img src="http://localhost/tale_of_valhalla/tale_of_valhalla_admin/items_images/<?= $weapon->image ?>" class="img-rounded img-thumbnail" style="width: 115px; height: 95px;"> </center>

                            <hr>        

                            <div class="col-sm-12">
                                <a href="<?= base_url('/equipment/unequip_item/' . $this->session->selected_character . '/' . $weapon->id) ?>" class="btn btn-lg btn-warning btn-fill" role="button">Desequipar</a>
                            </div>
                        </div>

                    <?php } else { ?>

                        <!-- Weapon -->
                        <div class="col-sm-12">                           
                            <center> <img src="<?= base_url('/backgrounds/warrior.jpg') ?>" class="img-rounded img-thumbnail" style="width: 100px; height: 150px;"> </center>                            
                        </div>

                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>
</section>