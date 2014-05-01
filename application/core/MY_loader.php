<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_loader extends CI_Loader {

    /**
     *  Override the default view method to accomadate view layouts.
     *
     *  @param  string  $view   view name - it becomes available to the layout as $page_content
     *  @param  array   $vars   array of data that will be passed to the layout and view
     *  @param  bool    $return return the view as data, excluding the layout
     *  @param  string  $layout layout file to use, defaults to layouts/default.php
     */
    public function view($view, $vars = array(), $return = FALSE, $layout = 'default')
    {
        if($return) {
            // if return is true return the fragment, even if the layout exists
            $page = $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
        } elseif(file_exists(APPPATH . "views/layouts/" . $layout . ".php")) {
            // if the layout exists, return the layout
            $vars['page_content'] = $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => TRUE)) . "\n";
            $page = $this->_ci_load(array('_ci_view' => 'layouts/' . $layout, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
        } else {
            // if the layout doesn't exist and return is false, return like normal.
            $page = $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
        }

        return $page;
    }
}

/* End of file MY_loader.php */
/* Location: ./application/core/MY_loader.php */