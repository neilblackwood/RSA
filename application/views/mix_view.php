<div class="row first-paragraph">
    <div class="col-md-4 col-md-offset-1">
        <h2><?php echo lang('mix_header') ?></h2>

        <p style='width:320px;text-align: justify'>
        <?php echo lang('mix_paragraph1') ?>
        </p>

        <br/>

        <p style='width:320px;text-align: justify'>
            <?php echo lang('mix_paragraph2') ?>

            <div>
                <a href='/photo' class='button' style='width:200px'><?php echo lang('mix_paragraph2_action') ?></a>
            </div>
        </p>

        <br/>

        <p style='width:320px;text-align: justify'>
            <?php echo lang('mix_paragraph3') ?>

            <div>
                <a class="fancybox button" href='#upload' id='preview-pic'>
                        <?php echo lang('mix_paragraph3_action') ?>
                </a>
                <div style="display:none">
                    <div id="upload">
                        <h1><?php echo lang('mix_paragraph3_action') ?></h1>

                            <div style='text-align: center;height:650px'>
                                <div style='display:none' id='preview-container'>
                                    <img src=''>
                                </div>
                                <input id='final-picture' type="button" value="Save &amp; email it to me"/>
                            </div>
                    </div>
                </div>
            </div>
        </p>

        <br/>

        <p style='width:320px;text-align: justify'>
            <?php echo lang('mix_paragraph4') ?>

            <div>
                <a href='/gallery' class='button' style='width:200px'><?php echo lang('mix_paragraph4_action') ?></a>
            </div>
        </p>

    </div>

    <div class="col-md-4 col-md-offset-1 first-paragraph">

        <div class="row">
                <div class="col-md-1" style='text-align: center'>
                <?php echo isset($_COOKIE['RSApicture']) ? "<img src='" . $_COOKIE['RSApicture'] . "'>" : null ?>
                </div>
        </div>

        <div class="row">
            <div class="col-md-1">
                    <div id="carousel-body" class="carousel slide" data-interval="false" style='width:<?php echo $this->config->item('image_width') ?>px; margin: 0 auto'>
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                          <li data-target="#carousel-body" data-slide-to="0" class="active"></li>
                          <li data-target="#carousel-body" data-slide-to="1"></li>
                          <li data-target="#carousel-body" data-slide-to="2"></li>
                        </ol>

                        <!-- BODY -->
                        <div class="carousel-inner">
                        <?php
                        $active = 'active';

                        foreach ($pics['body'] as $index=>$pic)
                        {
                        ?>
                          <div class="item body <?php echo $active ?>">
                           <img src='<?php echo $pic ?>'>
                          </div>
                        <?php
                            $active = null;
                        }
                        ?>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-body" data-slide="prev">
                          <span class='glyphicon glyphicon-chevron-left arrow_carousel left'></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-body" data-slide="next">
                          <span class='glyphicon glyphicon-chevron-right arrow_carousel right'></span>
                        </a>
                  </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-1">
                    <div id="carousel-feet" class="carousel slide" data-interval="false" style='width:<?php echo $this->config->item('image_width') ?>px; margin: 0 auto'>
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                          <li data-target="#carousel-feet" data-slide-to="0" class="active"></li>
                          <li data-target="#carousel-feet" data-slide-to="1"></li>
                          <li data-target="#carousel-feet" data-slide-to="2"></li>
                        </ol>

                        <!-- LEGS -->
                        <div class="carousel-inner">
                        <?php
                        $active = 'active';

                        foreach ($pics['legs'] as $index=>$pic)
                        {
                        ?>
                          <div class="item legs <?php echo $active ?>">
                           <img src='<?php echo $pic ?>'>
                          </div>
                        <?php
                            $active = null;
                        }
                        ?>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-feet" data-slide="prev">
                          <span class='glyphicon glyphicon-chevron-left arrow_carousel left'></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-feet" data-slide="next">
                          <span class='glyphicon glyphicon-chevron-right arrow_carousel right'></span>
                        </a>
                  </div>
            </div>
        </div>
    </div>
</div>


