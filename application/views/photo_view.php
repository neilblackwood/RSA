    <div class="row">
		<div class="col-md-4 col-md-offset-1 first-paragraph">
			<h2><?php echo lang('photo_header') ?></h2>
			<p style='width:440px;text-align: justify'>
			<?php echo lang('photo_paragraph1') ?>
                        </p>
                        <p>
                        <?php echo lang('photo_paragraph2') ?>
			</p>
		</div>

                 <div class="col-md-6 col-md-offset-1 first-paragraph" style='margin-top:80px' id='selected-picture'>
                   <?php echo isset($_COOKIE['RSApicture']) ? "<img src='" . $_COOKIE['RSApicture'] . "'>" : "<img src=''>" ?>
                 </div>
	</div>


        <div class="row" style='margin-top:50px'>
                <div class="col-md-3 col-md-offset-1">
                    <a class="fancybox" href='#webcam'>
                        <div class='photo-section'>
                            <p class='header'><?php echo lang('photo_webcam') ?> &gt;</p>
                            <img src='assets/img/icon1.svg' style='width:260px'>
                        </div>
                    </a>

                    <div style="display:none">
                        <div id="webcam" style='text-align:center'>
                            <!--<h1><?php echo lang('photo_webcam') ?></h1>-->

                            <?php
                            $user_agent = $_SERVER['HTTP_USER_AGENT'];
                            if (strpos( $user_agent, 'Safari') !== false && strpos( $user_agent, 'Chrome') == false)
                            {
                            ?>
                              <input type="file" accept="image/*;capture=camera">
                            <?php
                            }
                            else
                            { // flash based
                            ?>
                            <div style='width: 400px;height:200px;' id='camera'>
                            </div>
                              <?php
                            }
                            ?>
                              <script>

var pos = 0;
var ctx = null;
var cam = null;
var image = null;

var filter_on = false;
var filter_id = 0;

function changeFilter() {
	if (filter_on) {
		filter_id = (filter_id + 1) & 7;
	}
}

function toggleFilter(obj) {
	if (filter_on =!filter_on) {
		obj.parentNode.style.borderColor = "#c00";
	} else {
		obj.parentNode.style.borderColor = "#333";
	}
}

jQuery("#camera").webcam({

	width: 400,
	height: 200,
	mode: "callback",
	swffile: "/assets/js/vendor/webcam/jscam_canvas_only.swf",

	onTick: function(remain) {

		if (0 == remain) {
			jQuery("#status").text("Cheese!");
		} else {
			jQuery("#status").text(remain + " seconds remaining...");
		}
	},

	onSave: function(data) {

		var col = data.split(";");
		var img = image;

		if (false == filter_on) {

			for(var i = 0; i < 400; i++) {
				var tmp = parseInt(col[i]);
				img.data[pos + 0] = (tmp >> 16) & 0xff;
				img.data[pos + 1] = (tmp >> 8) & 0xff;
				img.data[pos + 2] = tmp & 0xff;
				img.data[pos + 3] = 0xff;
				pos+= 4;
			}

		} else {

			var id = filter_id;
			var r,g,b;
			var r1 = Math.floor(Math.random() * 255);
			var r2 = Math.floor(Math.random() * 255);
			var r3 = Math.floor(Math.random() * 255);

			for(var i = 0; i < 400; i++) {
				var tmp = parseInt(col[i]);

				/* Copied some xcolor methods here to be faster than calling all methods inside of xcolor and to not serve complete library with every req */

				if (id == 0) {
					r = (tmp >> 16) & 0xff;
					g = 0xff;
					b = 0xff;
				} else if (id == 1) {
					r = 0xff;
					g = (tmp >> 8) & 0xff;
					b = 0xff;
				} else if (id == 2) {
					r = 0xff;
					g = 0xff;
					b = tmp & 0xff;
				} else if (id == 3) {
					r = 0xff ^ ((tmp >> 16) & 0xff);
					g = 0xff ^ ((tmp >> 8) & 0xff);
					b = 0xff ^ (tmp & 0xff);
				} else if (id == 4) {

					r = (tmp >> 16) & 0xff;
					g = (tmp >> 8) & 0xff;
					b = tmp & 0xff;
					var v = Math.min(Math.floor(.35 + 13 * (r + g + b) / 60), 255);
					r = v;
					g = v;
					b = v;
				} else if (id == 5) {
					r = (tmp >> 16) & 0xff;
					g = (tmp >> 8) & 0xff;
					b = tmp & 0xff;
					if ((r+= 32) < 0) r = 0;
					if ((g+= 32) < 0) g = 0;
					if ((b+= 32) < 0) b = 0;
				} else if (id == 6) {
					r = (tmp >> 16) & 0xff;
					g = (tmp >> 8) & 0xff;
					b = tmp & 0xff;
					if ((r-= 32) < 0) r = 0;
					if ((g-= 32) < 0) g = 0;
					if ((b-= 32) < 0) b = 0;
				} else if (id == 7) {
					r = (tmp >> 16) & 0xff;
					g = (tmp >> 8) & 0xff;
					b = tmp & 0xff;
					r = Math.floor(r / 255 * r1);
					g = Math.floor(g / 255 * r2);
					b = Math.floor(b / 255 * r3);
				}

				img.data[pos + 0] = r;
				img.data[pos + 1] = g;
				img.data[pos + 2] = b;
				img.data[pos + 3] = 0xff;
				pos+= 4;
			}

		}

		if (pos >= 0x4B000) {
			ctx.putImageData(img, 0, 0);
			pos = 0;
		}

                // save to file
                var dataURL = canvas.toDataURL("image/png");
                $('#selected-picture img').attr('src', dataURL);
                $.fancybox.close();
	},

	onCapture: function () {
		webcam.save();

		jQuery("#flash").css("display", "block");
		jQuery("#flash").fadeOut(100, function () {
			jQuery("#flash").css("opacity", 1);
		});
	},

	debug: function (type, string) {
		jQuery("#status").html(type + ": " + string);
	},

	onLoad: function () {

		var cams = webcam.getCameraList();
		for(var i in cams) {
			jQuery("#cams").append("<li>" + cams[i] + "</li>");
		}
	}
});

function getPageSize() {

	var xScroll, yScroll;

	if (window.innerHeight && window.scrollMaxY) {
		xScroll = window.innerWidth + window.scrollMaxX;
		yScroll = window.innerHeight + window.scrollMaxY;
	} else if (document.body.scrollHeight > document.body.offsetHeight){ // all but Explorer Mac
		xScroll = document.body.scrollWidth;
		yScroll = document.body.scrollHeight;
	} else { // Explorer Mac...would also work in Explorer 6 Strict, Mozilla and Safari
		xScroll = document.body.offsetWidth;
		yScroll = document.body.offsetHeight;
	}

	var windowWidth, windowHeight;

	if (self.innerHeight) { // all except Explorer
		if(document.documentElement.clientWidth){
			windowWidth = document.documentElement.clientWidth;
		} else {
			windowWidth = self.innerWidth;
		}
		windowHeight = self.innerHeight;
	} else if (document.documentElement && document.documentElement.clientHeight) { // Explorer 6 Strict Mode
		windowWidth = document.documentElement.clientWidth;
		windowHeight = document.documentElement.clientHeight;
	} else if (document.body) { // other Explorers
		windowWidth = document.body.clientWidth;
		windowHeight = document.body.clientHeight;
	}

	// for small pages with total height less then height of the viewport
	if(yScroll < windowHeight){
		pageHeight = windowHeight;
	} else {
		pageHeight = yScroll;
	}

	// for small pages with total width less then width of the viewport
	if(xScroll < windowWidth){
		pageWidth = xScroll;
	} else {
		pageWidth = windowWidth;
	}

	return [pageWidth, pageHeight];
}

window.addEventListener("load", function() {

	jQuery("body").append("<div id=\"flash\"></div>");

	var canvas = document.getElementById("canvas");

	if (canvas.getContext) {
		ctx = document.getElementById("canvas").getContext("2d");
		ctx.clearRect(0, 0, 400, 200);

		var img = new Image();
		//img.src = "/image/logo.gif";
		img.onload = function() {
			ctx.drawImage(img, 0, 0);
		}

		image = ctx.getImageData(0, 0, 400, 200);
	}

	var pageSize = getPageSize();
	jQuery("#flash").css({ height: pageSize[1] + "px" });

}, false);

window.addEventListener("resize", function() {

	var pageSize = getPageSize();
	jQuery("#flash").css({ height: pageSize[1] + "px" });

}, false);


                              </script>
                            <input onclick='webcam.capture();changeFilter();void(0);' type="button" value="<?php echo lang('photo_webcam') ?>"/>
<p><canvas id="canvas" height="200" width="400" style='display:none'></canvas></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <a class="fancybox" href='#upload'>
                        <div class='photo-section'>
                            <p class='header'><?php echo lang('photo_upload') ?> &gt;</p>
                            <img src='assets/img/icon2.svg' style='width:260px'>
                        </div>
                    </a>

                    <div style="display:none">
                        <div id="upload" style='width:400px;text-align: center'>
                            <h1><?php echo lang('photo_upload') ?></h1>
                            <div>
                                <?php echo lang('photo_upload_notes') ?>
                                <iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
                                <input type="file" id="file_upload" /><br/><br/><br/>

                                <div id='preview' style='display:none'>
                                <center><img id="preview_pic" class="preview-pic"/></center>
                                Move the selection to mark the part of the image you want to use
                                <input class='use-picture' type='button' value='<?php echo lang('photo_upload_button') ?>'>
                                </div>
                                <br/>

                                <div style="display:none">
                                    <input type="button" value="Update picture" id="update_picture"/>
                                </div>


                                <input type="hidden" id="x1" name="x1" />
                                <input type="hidden" id="y1" name="y1" />
                                <input type="hidden" id="x2" name="x2" />
                                <input type="hidden" id="y2" name="y2" />
                                <input type="hidden" id="w" name="w" />
                                <input type="hidden" id="h" name="h" />


                                <div id="upload_notice" style="display:none">
                                   <img src="/assets/js/vendor/fancybox/source/fancybox_loading@2x.gif"/>
                                   <?php echo lang('photo_upload_loading') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <a class="fancybox" href='#avatars'>
                        <div class='photo-section'>
                            <p class='header'><?php echo lang('photo_gallery') ?> &gt;</p>
                            <img src='assets/img/icon3.svg' style='width:260px'>
                        </div>
                    </a>

                    <div style="display:none">

                        <div id="avatars">
                            <h1><?php echo lang('photo_gallery') ?></h1>
                            <div><img src='/assets/img/head1.jpg'></div>
                            <div><img src='/assets/img/head2.jpg'></div>
                            <div><img src='/assets/img/head3.jpg'></div>
                            <div><img src='/assets/img/head4.jpg'></div>
                        </div>
                    </div>
                </div>
        </div>

            <div class="row buttonRow" <?php echo !isset($_COOKIE['RSApicture']) ? "style='display:none'" : null ?>>
                <div class="col-md-3 col-md-offset-9">
		    <br/><br/><br/>
                    <a href='/mix' class='button' style='width:200px'><?php echo lang('photo_mix_and_match') ?> &gt;</a>
                </div>
	    </div>

<div style='display:none' id='preload_images'>
<?php
$html = null;
foreach ($preload_images as $index=>$property)
{
    if ($property['body_part'] == 'trunk') $html .= "<img src='/assets/img/" . strtolower($_COOKIE['RSAlanguage']) . "/" . strtolower($property['file']) . "'>";
    elseif($property['body_part'] == 'legs') $html .= "<img src='/assets/img/english/" . strtolower($property['file']) . "'>";
}
echo $html;
?>
</div>