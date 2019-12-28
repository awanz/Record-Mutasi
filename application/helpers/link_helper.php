<?php
/**
 * Helper asset_url()
 * ------------------------------------------------------------------------
 * @access    public
 * @param    string
 * @return    string
 */

if (!function_exists('assets_admin'))
{
    function assets($uri)
    {
        $_ci =& get_instance();
        return $_ci->config->base_url('assets/'.$uri);
    }
} 