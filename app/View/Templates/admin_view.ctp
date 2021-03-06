<section id="cont_wrapper">
    <section class="content">
        <!--<h1 class="main_heading"><?php //echo $this->Html->link('Add EventTemplate', '/admin/EventTemplates/createEventTemplate');                                     ?></h1>-->
        <section class="content_info">
            <?php echo $this->Session->flash(); ?>
            <!------------------------------------------------------------ template edit starts below ----------------------------------->

            <link href="/css/evol.colorpicker.css" rel="stylesheet" />
            <script src="/js/ckeditor.js"></script>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js" type="text/javascript"></script>
            <script src="/js/evol.colorpicker.js" type="text/javascript"></script>

            <link href="/css/sample.css" rel="stylesheet">
            <style>

                .ui-widget-content {
                    background-color: #B2B2B2;
                    border: 1px solid #B2B2B2;
                    color: #333333;
                }
                li{
                    margin-top: 6px;
                }
                .evo-palette, .evo-palette-ie {
                    background-color: #B2B2B2;
                    border-collapse: separate;
                    border-spacing: 4px 0;
                }
                .smlpink_button_grey {
                    background: none repeat scroll 0 0 #808080;
                    border-radius: 25px;
                    color: #FFFFFF;
                    display: inline-block;
                    font-size: 12px;
                    font-weight: 700;
                    height: 26px;
                    line-height: 26px;
                    padding: 0 17px;
                    text-transform: uppercase;
                }
                .smlpink_button {
                    background: none repeat scroll 0 0 #7900A0;
                    border-radius: 25px;
                    color: #FFFFFF;
                    display: inline-block;
                    font-size: 12px;
                    font-weight: 700;
                    height: 26px;
                    line-height: 26px;
                    padding: 0 17px;
                    text-transform: uppercase;
                }

            </style>
            <script>
                function backgroundColor(color) {
                    $(".my_focus").css("background-color", color);
                    $(".my_focus").removeClass("my_focus");

                }
                function borderColor(color) {
                    $(".my_focus").css("border", "1px solid " + color);
                    $(".my_focus").removeClass("my_focus");
                }
                function textColor(color) {
                    $(".my_focus").css("color", color);
                    $(".my_focus").removeClass("my_focus");
                }
                function fullBackgroundColor(color) {
                    $(".fulckeditor").last().css("background-color", color);
                    $(".my_focus").removeClass("my_focus");
                }
                function fullBorderColor(color) {
                    $(".fulckeditor").last().css("border", "1px solid");
                    $(".fulckeditor").last().css("border-color", color);
                    $(".my_focus").removeClass("my_focus");
                }
                function fullTextColor(color) {
                    $(".fulckeditor").css("color", color);
                    $(".my_focus").removeClass("my_focus");
                }


                $(document).ready(function()
                {
                    // set default background color
                    var variable = $(".fulckeditor").last();
                    var fullBackgroundColor = variable.css("background-color");
                    if (fullBackgroundColor.trim() != "transparent") {
                        $(".fullBackgroundColor").val(rgb2hex(fullBackgroundColor));
                        $(".fullBackgroundColor").next().css("background-color", fullBackgroundColor);
                    }
                    //alert(color);
                    // now defalt border color
                    var fullborderColor = variable.css("borderTopColor");
                    if (fullborderColor.trim() != "transparent") {
                        $(".fullBorderColor").val(rgb2hex(fullborderColor));
                        //$(".fulckeditor").last().next().css("background-color", color);
                        $(".fullBorderColor").next().css("background-color", fullborderColor);
                    }
                    //alert(bordercolor);


                    $('.cpBoth').colorpicker();
                });
                $('body').click(function() {
                    $(".my_focus").removeClass("my_focus");

                    $(".cke_focus").addClass("my_focus");

                    // set background color default
                    var cke = $(".cke_focus");
                    //console.log(cke);
                    if (cke.length != 0) {
                        var backgroundcolor = $(".cke_focus").css("background-color");
                        //alert(backgroundcolor);
                        if (backgroundcolor.trim() != "transparent") {
                            $(".BackgroundColor").val(rgb2hex(backgroundcolor));
                            $(".BackgroundColor").next().css("background-color", backgroundcolor);
                        }
                    }


                    //set border color default
                    if (cke.length != 0) {
                        var borderColor = $('.cke_focus').css("borderTopColor");
                        if (borderColor.trim() != "transparent") {
                            $(".borderColor").val(rgb2hex(borderColor));
                            $(".borderColor").next().css("background-color", borderColor);
                        }
                    }

                    // set text color
                    if (cke.length != 0) {
                        var color = $('.cke_focus').css("color");
                        if (color.trim() != "transparent") {
                            $(".textColor").val(rgb2hex(color));
                            $(".textColor").next().css("background-color", color);
                        }
                    }

                });

                function rgb2hex(rgb) {
                    var hexDigits = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "a", "b", "c", "d", "e", "f"];
                    rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
                    function hex(x) {
                        return isNaN(x) ? "00" : hexDigits[(x - x % 16) / 16] + hexDigits[x % 16];
                    }
                    return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
                }

                function save() {
                    $("a").removeAttr("data-cke-saved-href");
                    var html = $(".EventTemplateHtmlDiv").html();
                    $("#EventTemplateHtml").val(html);
                    document.myForm.submit();
                }

            </script>
            <div class="clear"></div>
            <?php
            echo $this->Form->create("Template", array("action" => "view", "id" => "myForm", "name" => "myForm"));
            echo $this->Form->input("EventTemplate.id", array("type" => "hidden", "value" => $data["EventTemplate"]["id"]));
            echo $this->Form->input("EventTemplate.html", array("type" => "hidden", "value" => $data["EventTemplate"]["html"], "id" => "EventTemplateHtml"));
            echo $this->Form->end();
            ?>



            <div id="tabs" class='left-panel-box' style="background-color:#FFF !important;">
                <ul>
                    <li style="float:left;"><a href="javascript:void();" onclick="javascript:tab('tab1');" class="color_tab smlpink_button">Color</a></li>
                    <li style="float:left; margin-left: 36px;"><a href="javascript:void();" class="image_tab smlpink_button_grey" onclick="javascript:tab('ImageHere');">Image</a></li>
                </ul>
                <div style="clear:both;"></div>
                <div id="tab1">
                    <h2>Background Color</h2>
                    <input class="cpBoth BackgroundColor" value="#FFFFFF" onchange="javascript:backgroundColor(this.value);"/>
                    <br>
                    <h2>Border Color</h2>
                    <input class="cpBoth borderColor" value="#FFFFFF" onchange="javascript:borderColor(this.value);"/>
                    <br>
                    <h2>Text Color</h2>
                    <input class="cpBoth textColor" value="#FFFFFF" onchange="javascript:textColor(this.value);"/>
                    <br>
                    <h2>Full Background Color</h2>
                    <input class="cpBoth fullBackgroundColor" value="#FFFFFF" onchange="javascript:fullBackgroundColor(this.value);"/>
                    <br>
                    <h2>Full Border Color</h2>
                    <input class="cpBoth fullBorderColor" value="#FFFFFF" onchange="javascript:fullBorderColor(this.value);"/>

                    <!--                <h2>Full Text Color</h2>
                                    <input class="cpBoth" value="#31859b" onchange="javascript:fullTextColor(this.value);"/>-->
                </div>
                <div id="ImageHere" style="background-color:white; display: none;">

                </div>
            </div>

            <div style="width:20%; height: 800px; border: 1px solid #D8E2EA; float: right; padding: 12px; background-color: #D8E2EA;">
                <h4>Template Keywords</h4>
                <ul>
                    <li><b>Event Name</b></li>
                    <li>*|EVENT_NAME|*</li>

                    <li><b>Event Venue</b></li>
                    <li>*|VENUE|*</li>

                    <li><b>Event Cost</b></li>
                    <li>*|COST|*</li>

                    <li><b>Event Date</b></li>
                    <li>*|Date|*</li>

                    <li><b>Short Description</b></li>
                    <li>*|SHORT_DESCRIPTION|*</li>

                    <li><b>Long Description</b></li>
                    <li>*|LONG_DESCRIPTION|*</li>

                    <li><b>Event Date</b></li>
                    <li>*|Date|*</li>

                    <li><b>Ticket URL</b></li>
                    <li>*|TICKET_URL|*</li>

                    <li><b>Facebook URL</b></li>
                    <li>*|FACEBOOK_URL|*</li>

                    <li><b>Site URL</b></li>
                    <li>*|SITE_URL|*</li>

                    <li><b>Event Detail URL</b></li>
                    <li>*|EVENT_DETAIL_URL|*</li>

                    <li><b>Primary Image</b></li>
                    <li><?php echo "http://" . $_SERVER["HTTP_HOST"] . "/img/primary.gif"; ?></li>

                    <li><b>Flyer Image</b></li>
                    <li><?php echo "http://" . $_SERVER["HTTP_HOST"] . "/img/flyer.gif"; ?></li>

                    <li><b>Repeat Tag Open</b></li>
                    <li>*|REPEAT|*</li>

                    <li><b>Repeat Tag Close</b></li>
                    <li>*|/REPEAT|*</li>


                </ul>
            </div>
            <div class="EventTemplateHtmlDiv" style="width:60%; float: right;">
                <!--------------------------------- full editor ---------------------->

                <div id="container" class="fulckeditor">
                    <?php echo $data["EventTemplate"]["html"]; ?>
                </div>



                <!------------------------- full editor------------------------------------------------->

            </div>

            <section class="login_btn" style="float:right; margin-right: 20%;">
                <span class="blu_btn_lt">
                    <a class="blu_btn_rt" style="cursor:pointer;" onclick="javascript:window.back();">Go Back</a>
                </span>
                <span class="blu_btn_lt">
                    <a class="blu_btn_rt" style="cursor:pointer;" onclick="javascript:save();">Save Changes</a>
                </span>
            </section>
            <!------------------------------------------------------------ template edit ends above ------------------------------------->          
            <section class="clr_bth"></section>
        </section>
    </section>
</section>
<script type="text/javascript">
    function tab(id) {
        if (id == "tab1") {
            $("#tab1").show();
            $("#ImageHere").hide();
            $(".color_tab").addClass("smlpink_button");
            $(".color_tab").removeClass("smlpink_button_grey");
            $(".image_tab").removeClass("smlpink_button");
            $(".image_tab").addClass("smlpink_button_grey");
        } else {
            $("#tab1").hide();
            $("#ImageHere").show();
            $(".color_tab").removeClass("smlpink_button");
            $(".color_tab").addClass("smlpink_button_grey");
            $(".image_tab").addClass("smlpink_button");
            $(".image_tab").removeClass("smlpink_button_grey");
        }
    }
    $(document).ready(function() {
        $(".cke_dialog_ui_button").live("click", function() {
            // below is tottaly new code
            $(".template-design img").each(function() {
                if (!$(this).hasClass("launchEditor")) {
                    $(this).addClass("launchEditor");
                    var id = "<?php echo uniqid(); ?>"
                    $(this).attr("id", id);
                    var src = $(this).attr("src");
                    var onclick = 'launchEditor("' + id + '","' + src + '");';
                    var imageURL = "<br/><img src = '" + src + "' onclick = '" + onclick + "' title='Edit' class='img_" + id + "' style='width:120px;height120px; cursor:pointer;'><span style='display: none;' id='load_" + id + "' class='loader'><img alt='' src='/img/admin/loader.gif' title='Loading'></span><br/>";
                    //alert(imageURL);
                    //$("#ImageHere").append(imageURL);
                }
            });
            // above is totally new code
            $(".launchEditor").each(function() {
                // here will be all stuff
                var src = $(this).attr("src");
                var id = $(this).attr("id");
                $(".img_" + id).attr("src", src);
            });
        });
    });

</script>
<!-- Load widget code -->
<!--<script type="text/javascript" src="https://dme0ih8comzn4.cloudfront.net/js/feather.js"></script>-->
<script type="text/javascript" src="http://feather.aviary.com/js/feather.js"></script>
<script type="text/javascript">

    var featherEditor = new Aviary.Feather({
        apiKey: '75a7351be279e84e',
        apiVersion: 3,
        noCloseButton: false,
        //tools: ['draw', 'stickers', 'crop', 'enhance', 'effects', 'orientation', 'focus', 'resize', 'warmth', 'brightness', 'contrast', 'saturation', 'sharpness', 'colorsplash', 'text', 'redeye', 'whiten', 'blemish'],
        onSave: function(imageID, newURL) {
            // save image to our server
            saveMyImage(newURL, imageID);

            //img.src = img_name;
            featherEditor.close();
        }

//                            onSaveButtonClicked: '/tests/test'
    });

    function launchEditor(id, src) {
        var newsrc = $("#" + id).attr("src");
        $(".img_" + id).attr("src", newsrc);
        featherEditor.launch({
            image: id,
            url: newsrc
        });
        return false;
    }

    function saveMyImage(imageURL, imageID) {
        //alert(imageURL);


        jQuery.ajax({
            url: '/Templates/saveTemplateImage/',
            type: "POST",
            data: {image: imageURL},
            success: function(data) {
                $("#" + imageID).attr("src", data);
                $(".img_" + imageID).attr("src", data);
                $(".img_" + imageID).attr("onclick", 'launchEditor("' + imageID + '","' + data + '");');
            }
        });
    }

    $(document).ready(function() {
        $(".launchEditor").each(function() {
            // here will be all stuff
            var src = $(this).attr("src");
            var id = $(this).attr("id");
            var onclick = 'launchEditor("' + id + '","' + src + '");';
            //alert(src+"--"+id+"--"+onclick);
            var imageURL = "<br/><img src = '" + src + "' onclick = '" + onclick + "' title='Edit' class='img_" + id + "' style='width:120px;height120px; cursor:pointer;'><br/>";
            //alert(imageURL);
            $("#ImageHere").append(imageURL);
        });
    });


    var i = 0;
    var imageURL = '';
    //console.log($("#ImageHere").html());
    $(".template-design img:visible").each(function() {
        i++;
        //$(this).hide();
        if (!$(this).hasClass("launchEditor")) {
            $(this).addClass("launchEditor");
            console.log($(this));
            var id = "imageId" + i;
            $(this).attr("id", id);
        }

        var src = $(this).attr("src");
        var id = $(this).attr("id");
        var onclick = 'launchEditor("' + id + '","' + src + '");';
        imageURL += "<br/><img src = '" + src + "' onclick = '" + onclick + "' title='Edit' class='img_" + id + "' style='width:120px;height120px; cursor:pointer;'><span style='display: none;' id='load_" + id + "' class='loader'><img alt='' src='/img/admin/loader.gif' title='Loading'></span><br/>";
    });
    //console.log($("#ImageHere").html());
    $("#ImageHere").html(imageURL);
    //console.log($("#ImageHere").html());
</script>