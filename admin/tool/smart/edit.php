<?php
require_once(dirname(__FILE__) . "/../../config.php");
$mydb = new MySql();
$scenesql = "SELECT * FROM `#@__pano_scene` WHERE `id` = $id";
$scenerow = $mydb->getOne($scenesql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
    <head>
        <title>获取热点</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style type="text/css"> 
            html {height: 100%;overflow: hidden;}
            #vrpano {height: 100%;}
            body {height: 100%;margin: 0;padding: 0;background-color: #fff;}
        </style>
        <script type="text/javascript" src="../../js/jquery.js"></script>
        <script type="text/javascript">
            function getback() {
                var hotspotdata = "";
                var spotscale = vrpano().get("hotspot[me].scale");
                var spotatv = vrpano().get("hotspot[me].atv");
                var spotath = vrpano().get("hotspot[me].ath");
                var spotrz = vrpano().get("hotspot[me].rz");
                var spotrx = vrpano().get("hotspot[me].rx");
                var spotry = vrpano().get("hotspot[me].ry");
                var spotrwidth = vrpano().get("hotspot[me].width");
                var spotrheight = vrpano().get("hotspot[me].height");
                hotspotdata = spotscale+"|"+spotatv+"|"+spotath+"|"+spotrz+"|"+spotrx+"|"+spotry+"|"+spotrwidth+"|"+spotrheight;
                window.opener.getsmartdata(hotspotdata);
                window.close();
            }
            function vrpano() {
                return document.getElementById("krpanoSWFObject");
            }
        </script>
    </head>
    <body>
        <div id="vrpano">
        </div>
        <script type="text/javascript" src="<?php echo $cmspath; ?>/vrpano/vrpano<?php echo $scenerow['pid']; ?>/swfkrpano.js"></script>
        <script type="text/javascript">
            embedpano({swf: "<?php echo $cmspath; ?>/vrpano/vrpano<?php echo $scenerow['pid']; ?>/krpano.swf", xml: "editxml.php?data=<?php echo $id; ?>|<?php echo $img; ?>|<?php echo $spotid; ?>", target: "vrpano", html5: "auto", passQueryParameters: true, wmode: "transparent"});
        </script>
    </body>
</html>
