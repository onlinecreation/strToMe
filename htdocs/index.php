<?php
require "config.php" ;
include "header.php" ;
?>
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
    <label for="to">With the PHP function:</label>
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
    <select name="type">
        <optgroup label="output">
            <option <?php if ($_SESSION["type"] == "text") {
            echo "selected";
        } ?>>text</option>
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
        </optgroup>
    </select>
    <input type="submit" value="OK" />
</form>
<?php
include "footer.php";
