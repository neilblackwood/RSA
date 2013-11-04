<div class="navbar-custom navbar-fixed-top">
    <div style='background-image: url("/assets/img/TopBar.svg"); height: 70px; position:absolute; z-index:-1; width:100%'>
        &nbsp;
        </div>

        <div class="container" style='width:900px'>
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar">test</span>
            <span class="icon-bar">test</span>
            <span class="icon-bar">test</span>
          </button>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <?php
            $menuItems = array(
                                'choose', 'photo', 'mix', 'gallery'
                              );

            $currentPage = $this->uri->rsegment(1);

            $menu = $href = null;

            foreach ($menuItems as $index=>$item)
            {
                $class = null;
                if ($href != "#" && $currentPage != "welcome") $href = "/" . $item;

                if ($currentPage == $item)
                {
                    $class = " class='active'";
                    $href = "#";
                }

                if ($item == 'choose') $linkClass = "class='multiline'";
                else $linkClass = null;

                $menu .= "<li" . $class . "><a href='" . $href . "' " . $linkClass . ">" . lang($item . '_menu_option') . "</a></li>";
            }

            echo $menu;

            ?>

          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <!--[if lt IE 9]>
<div class="row" style="margin-top:8em">
    <div class="col-md-12" style='margin-top: -50px'>
         <div style='background-color:white'>
             <p style='text-align: center; font-size:1.2em' class="chromeframe">You are using an <strong>outdated browser</strong>. If you have access to a modern browser like Chrome or Firefox, please try this instead or use your smart phone or tablet device.</p>
        </div>
    </div>
</div>
     <![endif]-->