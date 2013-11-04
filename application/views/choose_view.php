<div class="row">
            <div class="col-md-4 col-md-offset-1 first-paragraph">
                    <h2><?php echo lang('choose_header') ?></h2>
                    <p style='font-size:0.9em; width:420px'>
                        <?php echo lang('choose_paragraph') ?>
                    </p>
            </div>
    </div>

    <div class="row">
        <div class="col-md-9 col-md-offset-1" style='border-top:solid #655E4F 0.2em;margin-bottom:20px;margin-top:30px'>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 col-md-offset-1">
              <?php
              echo display_parts(1, $groups[1], "#5A2D7F");
              ?>
       </div>


    <div class="col-md-3" style='border-left:0.2em solid #655E4F; border-right:0.2em solid #655E4F'>
            <?php
                echo display_parts(2, $groups[2], "#B40084");
            ?>
    </div>

    <div class="col-md-3">
        <?php
                echo display_parts(3, $groups[3], "#6BB1B6");
        ?>
  </div>


    <div class="row">
        <div class="col-md-9 col-md-offset-1" style='border-top:solid #655E4F 0.2em;margin-bottom:20px;margin-top:30px'>
        </div>
    </div>

    <div class="row buttonRow" <?php if (!isset($_COOKIE['RSAchoice'])) echo "style='display:none'" ?>>
        <div class="col-md-4 col-md-offset-8">
            <br/>
            <a href='/photo' class='button'><?php echo lang('choose_photo') ?> &gt;</a>
        </div>
    </div>
