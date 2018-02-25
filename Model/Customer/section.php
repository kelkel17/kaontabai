<section style="margin-top: 5%;">
    <div class="container">
        <div class="row">
            <div class="abouts_content" style="width: 100%; margin-top: -5%; margin-bottom: -5%;">
                <div class="form-group">
                    <label>Search by: </label>
                    <select name="filter" id="filter" class="form-control" style="width: 15%;">
                        <option value="0">Google Map</option>
                        <option value="1">Restaurant Name</option>
                        <option value="2">Most Visited</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="div1" style=" margin-left:10%">
    <div class="container">
        <div class="row">
            <div class="abouts_content" style="width: 90%; margin-top: -7%; margin-bottom: -15%; ">
                <form method="post">
                    <center>
                        <input class="form-control glyphicon" placeholder="&#xe003;" name="text" id="search" type="text">
                    </center>
                </form>
            </div>
            <div class="container" id="result" style="width: 90%; margin: 0 auto;">
                <div class="row">
                    <?php 
                                  $restaurant = viewAllOwners();
                                  if (count($restaurant) > 0) {
                                      foreach ($restaurant as $row) {
                                          $id = $_GET['id'];

                              ?>
                        <div class="abouts_content">
                            <div class="col-md-6">
                                <div class="single_abouts_text text-center wow slideInLeft" data-wow-duration="1s">
                                    <?php echo '<img src="../../Image/'.$row['restaurant_logo'].'" align="top" alt=""/>'; ?></div>

                            </div>
                            <form method="post">
                                <div class="col-md-6" id="tableFooter">
                                    <div class="single_abouts_text wow slideInRight" data-wow-duration="1s">
                                        <h4><?php echo $row['restaurant_name']; ?></h4>
                                        <div style="width: 80%">
                                            <p>
                                                <?php echo substr($row['restaurant_desc'], 0, 390) .((strlen($row['restaurant_desc']) > 500) ? '...' : ''); ?>
                                            </p>
                                        </div>
                                        <br>
                                        <a href="restaurantinfo.php?cid=<?php echo $row['restaurant_id']; ?>&id=<?php echo $id;?>">

                                          <input type="hidden" name="cid" value="<?php echo $row['restaurant_id']; ?>">
                                          <input type="hidden" name="id" value="<?php echo $id ?>">
                                          <input type="submit" name="visit" value="More Info" class="btn btn-primary"></a>

                                        <a href="restaurantinfo.php?cid=<?php echo $row['restaurant_id']; ?>&id=<?php echo $id;?>" class="btn btn-primary">Book A Table</a>
                                        <?php
                                       $resId = $row['restaurant_id'];
                                       $rate = getRate($resId);
                                     ?>
                                            <br />
                                            <br/>
                                            <input value=<?php echo $rate?> type="number" id="rate" class="rating" min=0 max=5 step=0.1 data-size="xs" data-stars="5" productId=
                                            <?php echo $resId;?> disabled>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <?php } }?>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="div0" style="margin-left: 10%;">
    <div class="container">
        <div class="row">
            <div class="abouts_content" style="width: 90%; margin-top: -7%; margin-bottom: -5%">
                <?php
                           $id = $_GET['id'];
                           $latlng = getMap();
                           $latlng = json_encode($latlng,true);                  
                          echo '<div id="alldata" style="display:none;">'.$latlng.'</div>';
                         ?>
                    <div class="abouts_content" id="map" style="width: 100%; height: 500px">

                    </div>
            </div>
        </div>
    </div>
</section>

<section id="div2" class="abouts" style="margin-top: -2%;">
    <div class="container" style="width: 90%; margin: 0 auto;">
        <div class="row">
            <?php 
                                  $restaurant = viewAllOwners();
                                  if (count($restaurant) > 0) {
                                      foreach ($restaurant as $row) {
                                          $id = $_GET['id'];

                              ?>
                <div class="abouts_content">
                    <div class="col-md-6">
                        <div class="single_abouts_text text-center wow slideInLeft" data-wow-duration="1s">
                            <?php echo '<img src="../../Image/'.$row['restaurant_logo'].'" align="top" alt=""/>'; ?></div>

                    </div>
                    <form method="post">
                        <div class="col-md-6" id="tableFooter">
                            <div class="single_abouts_text wow slideInRight" data-wow-duration="1s">
                                <h4><?php echo $row['restaurant_name']; ?></h4>
                                <div style="width: 70%">
                                    <p>
                                        <?php echo substr($row['restaurant_desc'], 0, 390) .((strlen($row['restaurant_desc']) > 500) ? '...' : ''); ?>
                                    </p>
                                </div>
                                <br>
                                <a href="restaurantinfo.php?cid=<?php echo $row['restaurant_id']; ?>&id=<?php echo $id;?>">

                                          <input type="hidden" name="cid" value="<?php echo $row['restaurant_id']; ?>">
                                          <input type="hidden" name="id" value="<?php echo $id ?>">
                                          <input type="submit" name="visit" value="More Info" class="btn btn-primary"></a>

                                <a href="restaurantinfo.php?cid=<?php echo $row['restaurant_id']; ?>&id=<?php echo $id;?>" class="btn btn-primary">Book A Table</a>
                                <?php
                                       $resId = $row['restaurant_id'];
                                       $rate = getRate($resId);
                                     ?>
                                    <br />
                                    <br/>
                                    <input value=<?php echo $rate?> type="number" id="rate" class="rating" min=0 max=5 step=0.1 data-size="xs" data-stars="5" productId=
                                    <?php echo $resId;?> disabled>
                            </div>
                        </div>
                    </form>

                </div>
                <?php } }?>
        </div>
    </div>
    </div>
    </div>
</section>