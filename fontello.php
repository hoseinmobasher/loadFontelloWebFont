<?php
function cws_get_all_fontello_icons()
{
    $meta = get_option('csw_fl');
    if (empty($meta) || (time() - $meta['t'] > 3600 * 7)) {
        $file = get_template_directory() . '/css/fontello.css';
        $fl_content = '';
        if (file_exists($file)) {
            $fl_content = file_get_contents($file);
            if (preg_match_all("/icon-((\w+|-?)+):before/", $fl_content, $matches, PREG_PATTERN_ORDER)) {
                update_option('cws_fl', array('t' => time(), 'fl' => $matches[1]));
                return $matches[1];
            }
        }
    } else {
        return $meta['fl'];
    }
}
?>
