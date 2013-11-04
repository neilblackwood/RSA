<?php

/**
 * custom loader for common views
 *
 */
class MY_Loader extends CI_Loader
{
    public function template($view, $vars = array(), $return = FALSE, $force_env = FALSE)
    {
        $viewsToLoad = array();

        array_push($viewsToLoad, 'header', 'menu');
        array_push($viewsToLoad, $view, 'footer');

        $viewSuffix = "_view";

        $content = null;

        foreach ($viewsToLoad as $viewName) $content .= $this->view($viewName . $viewSuffix, $vars, $return);

        if ($return) return $content;
    }

}