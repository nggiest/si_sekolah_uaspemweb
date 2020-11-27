<?php  
    $data = $id->result()[0];
?>
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-check-circle-o fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
                                        Thank you:)
                                        </div>
                                        <div>This book has been returned with fine fee 
                                        <?php /*echo $data->Denda*/ 
                                            if ($data->Denda == 0) {
                                                echo "FREE";
                                            } else {
                                                echo "IDR.".$data->Denda.",-";
                                            }
                                        ?>   
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo base_url();?>index.php/controller_peminjaman">
                                <div class="panel-footer">
                                    <span class="pull-left">Finish</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>