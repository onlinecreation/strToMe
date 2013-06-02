<?php

/**
 * Main process
 * @author Raphaël http://www.onlinecreation.fr
 */
session_start();
require 'config.php';
if (isset($_POST['str']) && is_string($_POST['str']) && isset($_POST['to'])) {

    switch ($_POST['to']) {
        case 'base64_encode':
            $result = base64_encode($_POST['str']);
            break;
        case 'convert_uuencode':
            $result = convert_uuencode($_POST['str']);
            break;
        case 'htmlentities':
            $result = htmlentities($_POST['str'], ENT_QUOTES, 'UTF-8');
            break;
        case 'urlencode':
            $result = urlencode($_POST['str']);
            break;
        case 'rawurlencode':
            $result = rawurlencode($_POST['str']);
            break;
        case 'json_encode':
            $result = json_encode($_POST['str']);
            break;
        case 'base64_decode':
            $result = base64_decode($_POST['str']);
            break;
        case 'convert_uudecode':
            $result = convert_uudecode($_POST['str']);
            break;
        case 'html_entity_decode':
            $result = html_entity_decode($_POST['str']);
            break;
        case 'urldecode':
            $result = urldecode($_POST['str']);
            break;
        case 'rawurldecode':
            $result = rawurldecode($_POST['str']);
            break;
        case 'json_decode':
            $result = json_decode($_POST['str']);
            break;
        case 'date':
            $result = date($_POST['str']);
            break;
        case 'strtotime':
            $result = strtotime($_POST['str']);
            break;
        case 'date(r)':
            if (strlen($_POST['str']) > 0) {
                $result = date('r', $_POST['str']);
            } else {
                $result = date('r');
            }
            break;
        case 'date(u)':
            $result = date('U');
            break;
        case 'hash/md2':
            $result = hash('md2', $_POST['str']);
            break;
        case 'hash/md4':
            $result = hash('md4', $_POST['str']);
            break;
        case 'hash/md5':
            $result = hash('md5', $_POST['str']);
            break;
        case 'hash/sha1':
            $result = hash('sha1', $_POST['str']);
            break;
        case 'hash/sha224':
            $result = hash('sha224', $_POST['str']);
            break;
        case 'hash/sha256':
            $result = hash('256', $_POST['str']);
            break;
        case 'hash/sha384':
            $result = hash('sha384', $_POST['str']);
            break;
        case 'hash/sha512':
            $result = hash('sha512', $_POST['str']);
            break;
        case 'hash/ripemd128':
            $result = hash('ripemd128', $_POST['str']);
            break;
        case 'hash/ripemd160':
            $result = hash('ripemd160', $_POST['str']);
            break;
        case 'hash/ripemd256':
            $result = hash('ripemd256', $_POST['str']);
            break;
        case 'hash/ripemd320':
            $result = hash('ripemd320', $_POST['str']);
            break;
        case 'hash/whirlpool':
            $result = hash('whirlpool', $_POST['str']);
            break;
        case 'hash/tiger128,3':
            $result = hash('tiger128,3', $_POST['str']);
            break;
        case 'hash/tiger160,3':
            $result = hash('tiger160,3', $_POST['str']);
            break;
        case 'hash/tiger192,3':
            $result = hash('tiger192,3', $_POST['str']);
            break;
        case 'hash/tiger128,4':
            $result = hash('tiger128,4', $_POST['str']);
            break;
        case 'hash/tiger160,4':
            $result = hash('tiger160,4', $_POST['str']);
            break;
        case 'hash/tiger192,4':
            $result = hash('tiger192,4', $_POST['str']);
            break;
        case 'hash/snefru':
            $result = hash('snefru', $_POST['str']);
            break;
        case 'hash/snefru256':
            $result = hash('snefru256', $_POST['str']);
            break;
        case 'hash/gost':
            $result = hash('gost', $_POST['str']);
            break;
        case 'hash/adler32':
            $result = hash('adler32', $_POST['str']);
            break;
        case 'hash/crc32':
            $result = hash('crc32', $_POST['str']);
            break;
        case 'hash/crc32b':
            $result = hash('crc32b', $_POST['str']);
            break;
        case 'hash/fnv132':
            $result = hash('fnv132', $_POST['str']);
            break;
        case 'hash/fnv164':
            $result = hash('fnv164', $_POST['str']);
            break;
        case 'hash/joaat':
            $result = hash('joaat', $_POST['str']);
            break;
        case 'hash/haval128,3':
            $result = hash('haval128,3', $_POST['str']);
            break;
        case 'hash/haval160,3':
            $result = hash('haval160,3', $_POST['str']);
            break;
        case 'hash/haval192,3':
            $result = hash('haval192,3', $_POST['str']);
            break;
        case 'hash/haval224,3':
            $result = hash('haval224,3', $_POST['str']);
            break;
        case 'hash/haval256,3':
            $result = hash('haval256,3', $_POST['str']);
            break;
        case 'hash/haval128,4':
            $result = hash('haval128,4', $_POST['str']);
            break;
        case 'hash/haval160,4':
            $result = hash('haval160,4', $_POST['str']);
            break;
        case 'hash/haval192,4':
            $result = hash('haval192,4', $_POST['str']);
            break;
        case 'hash/haval224,4':
            $result = hash('haval224,4', $_POST['str']);
            break;
        case 'hash/haval256,4':
            $result = hash('haval256,4', $_POST['str']);
            break;
        case 'hash/haval128,5':
            $result = hash('haval128,5', $_POST['str']);
            break;
        case 'hash/haval160,5':
            $result = hash('haval160,5', $_POST['str']);
            break;
        case 'hash/haval192,5':
            $result = hash('haval192,5', $_POST['str']);
            break;
        case 'hash/haval224,5':
            $result = hash('haval224,5', $_POST['str']);
            break;
        case 'hash/haval256,5':
            $result = hash('haval256,5', $_POST['str']);
            break;
        case 'md5':
            $result = md5($_POST['str']);
            break;
        case 'sha1':
            $result = sha1($_POST['str']);
            break;
        case 'crc32':
            $result = crc32($_POST['str']);
            break;
        default:
            $result = 'Error';
    }


    if (strlen($_POST['str']) < 1000) {
        $_SESSION['str'] = $_POST['str'];
        $_SESSION['type'] = $_POST['type'];
        $_SESSION['to'] = $_POST['to'];
    } else {
        unset($_SESSION['str']);
        unset($_SESSION['type']);
        unset($_SESSION['to']);
    }
    if ($_POST['type'] == 'text') {
        $_SESSION['result'] = $result;
        header('Location: index.php');
        die();
    } elseif (in_array($_POST['type'], $GLOBALS['BINARY_EXT_ALLOWED'])) {
        unset($_SESSION['str']);
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=output.' . $_POST['type']);
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        print $result;
    } else {
        echo 'Error while transforming your string. Please go back and try again.';
    }
}