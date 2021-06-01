<div class="ml-3 mr-3 d-flex justify-content-center" >
    <div class="row justify-content-center" style="width: 70vw;background-color: whitesmoke; ">
        <?php foreach ($historyRows as $historyRow) { ?>
            <div class="col-md-3 m-3 p-2">
                <div class="card shadow" style="width: 18rem;">
                    <img class="card-img-top" src="<?php echo base_url('uploads/') . $historyRow->imageUrl ?>" alt="Card image cap">
                    <span style="position: absolute;top:0; right:0;bottom:auto;left:auto" class="badge badge-pill badge-primary"><?php echo $historyRow->createdOn ?></span>
                    <div class="card-body">
                        <h5 class="card-title text-center <?php echo $historyRow->code=='healthy' ? "alert alert-success" :"alert alert-warning"  ?>"
                        style="text-overflow: ellipsis;overflow: hidden;
                                            text-overflow: ellipsis;
                                            display: -webkit-box;
                                            -webkit-line-clamp: 1;
                                            -webkit-box-orient: vertical;"><?php echo $historyRow->code ?></h5>
                        <div style="text-overflow: ellipsis;overflow: hidden;
                                            text-overflow: ellipsis;
                                            display: -webkit-box;
                                            -webkit-line-clamp: 7;
                                            -webkit-box-orient: vertical;">
                            <?php echo $historyRow->cure ?>
                        </div>
                        <p class="card-text" ></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>