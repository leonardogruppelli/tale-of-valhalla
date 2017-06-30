<!-- Main content -->
<section class="content"> 

    <!-- Classes Table -->
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Classes</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="col-sm-12">
                <?php
                if ($this->session->has_userdata('message')) {
                    $message = $this->session->flashdata('message');
                    if ($this->session->flashdata('situation') == '1') {
                        echo "<div class='alert alert-success alert-dismissable'>";
                        echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                        echo $message;
                        echo "</div>";
                    } else {
                        echo "<div class='alert alert-danger alert-dismissable'S>";
                        echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                        echo $message;
                        echo "</div>";
                    }
                }
                ?>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nome</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!$classes) { ?>
                                <tr>
                                    <td colspan="3">Nenhuma classe cadastrada.</td>
                                </tr>
                            <?php } ?>
                            <?php
                            foreach ($classes as $class) {
                                $id = $class->id;
                                ?>

                                <tr>
                                    <td style="vertical-align: middle" width="10%"> <center> <?= $class->id ?> </center> </td>
                            <td style="vertical-align: middle"> <?= $class->name ?> </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>