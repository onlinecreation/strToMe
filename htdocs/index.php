<?php
/**
 * Main UI
 * @author Raphaël http://www.onlinecreation.pro
 */
require "config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo SITE_TITLE; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php echo SITE_DESCRIPTION; ?>">
        <meta name="author" content="http://www.onlinecreation.pro">
        <link rel="stylesheet" type="text/css" href="css/default.css" />
        <link rel="apple-touch-icon" href="img/icon_128.png" />
        <link rel="shortcut icon" href="favicon.ico">
    </head>
    <body>
        <div class="container">
            <a href="<?php echo SITE_URL ?>" ><h1><?php echo SITE_TITLE ?></h1></a>
            <?php if (isset($_SESSION['result'])) { ?>
                <textarea id="result"><?php
            echo htmlentities($_SESSION['result'], ENT_QUOTES, "UTF-8");
            unset($_SESSION['result']);
                ?></textarea>
            <?php } ?>
            <form method="post" action="encode.php">
                <label for="str">
                    I want to convert, hash, encode, decode or encrypt this text:
                </label>
                <textarea name="str" id="str"><?php echo @$_SESSION['str']; ?></textarea>
                <label for="to">With the following PHP function:</label>
                <select name="to" id="to">
                    <?php
                    if (isset($_SESSION["to"])) {
                        echo '
                    <optgroup label="last used">
                    <option>' . htmlentities($_SESSION["to"], ENT_QUOTES, "UTF-8") . '</option>
                    </optgroup>
                ';
                    }
                    ?>
                    <optgroup label="encode">
                        <option value="base64_encode">base64_encode - Base 64 encoding</option>
                        <option value="convert_uuencode">convert_uuencode - UUcode encoding</option>
                        <option value="htmlentities">htmlentities - HTML encoding</option>
                        <option value="urlencode">urlencode - URL encoding</option>
                        <option value="rawurlencode">rawurlencode - URL encoding</option>
                        <option value="json_encode">json_encode - JSon encoding</option>
                    </optgroup>
                    <optgroup label="decode">
                        <option value="base64_decode">base64_decode - Decode base64 string</option>
                        <option value="convert_uudecode">convert_uudecode - Decode UUcode</option>
                        <option value="html_entity_decode">html_entity_decode - Decode HTML entities</option>
                        <option value="urldecode">urldecode - Decode URL</option>
                        <option value="rawurldecode">rawurldecode - Decode URL</option>
                        <option value="json_decode">json_decode - Decode JSon datas</option>
                    </optgroup>
                    <optgroup label="time">
                        <option value="date">date - Test a date string with the current timestamp</option>
                        <option value="strtotime">strtotime - Textual english date into a timestamp</option>
                        <option value="date(r)">date(r) - Timestamp to textual date</option>
                        <option value="date(u)">date(u) - Current timestamp</option>
                    </optgroup>
                    <?php if (function_exists("hash_algos")) { ?>
                        <optgroup label="hash">
                            <?php foreach (hash_algos() as $hash) { ?>
                                <option value="hash/<?php echo $hash; ?>"><?php echo $hash; ?></option>
                            <?php } ?>
                        </optgroup>
                    <?php } else { ?>
                        <optgroup label="hash">
                            <option value="md5">md5</option>
                            <option value="sha1">sha1</option>
                            <option value="crc32">crc32</option>
                        </optgroup>
                    <?php } ?>
                </select>
                <select name="type" id="type">
                    <optgroup label="output">
                        <option <?php
                    if ($_SESSION["type"] == "text") {
                        echo "selected";
                    }
                    ?>>text</option>
                    <optgroup label="file">
                        <?php
                        foreach ($GLOBALS["BINARY_EXT_ALLOWED"] as $ext) {
                            echo '<option';
                            if ($_SESSION["type"] == $ext) {
                                echo ' selected';
                            }
                            echo ' value="' . $ext . '">' . $ext . '</option>';
                        }
                        ?>
                    </optgroup>
                </select>
                <input type="submit" value="OK" />
            </form>
        </div>
        <div class="socials">
            <div class="addthis_toolbox addthis_default_style addthis_32x32_style"
                 addthis:url="<?php echo SITE_URL ?>"
                 addthis:title="<?php echo SITE_SOCIAL_NETWORKS_TITLE ?>"
                 addthis:description="<?php echo SITE_SOCIAL_NETWORKS_DESCRIPTION; ?>">
                <a class="addthis_button_facebook"></a>
                <a class="addthis_button_twitter"></a>
                <a class="addthis_button_google_plusone_share"></a>
                <a class="addthis_button_linkedin"></a>
                <a class="addthis_button_digg"></a>
                <a class="addthis_button_reddit"></a>
                <a class="addthis_button_email"></a>
                <a class="addthis_button_compact"></a>
                <a class="addthis_counter addthis_bubble_style"></a>
            </div>
        </div>
        <div class="footer">
            Powered by <a href="https://github.com/onlinecreation/strToMe" target="_blank">strToMe</a>
            - Hosted and made by <a href="http://www.onlinecreation.pro" target="_blank" title="Bordeaux Web Agency">OnLine Creation</a>
        </div>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript">
            var addthis_config = addthis_config||{};
            addthis_config.data_track_clickback = false;
            addthis_config.data_track_addressbar = false;
        </script>
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-519bd6235ebd3bf1"></script>
    </body>
</html>