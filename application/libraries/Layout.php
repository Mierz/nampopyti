<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout
{
    var $obj;
    var $layout;

    function __construct()
    {
        $this->obj =& get_instance();
        $this->layout = 'layout_main';
    }

    function setLayout($layout)
    {
      $this->layout = $layout;
    }

    function view($view, $data=null, $return=false)
    {
        $loadedData = array();        
        $loadedData['content_for_layout'] = $this->obj->load->view($view,$data,true);
        $loadedData['nav'] = $this->nav();

        if($return)
        {
            $output = $this->obj->load->view($this->layout, $loadedData, true);
            return $output;
        }
        else
        {
            $this->obj->load->view($this->layout, $loadedData, false);
        }
    }

    private function nav()
    {
        $menu = [
            'main' => [
                'method' => 'index',
                'title' => 'Главная',
            ],
            'routes' => [
                'method' => 'search',
                'title' => 'Главная',
            ],
        ];

        foreach ($menu as $controller => $method) {
          //  echo $controller . "<br/>";
           // print_r($method);
        }

        //$controller = $this->obj->router->fetch_class();
        //$method = $this->obj->router->fetch_method();
        //echo "brbr";
    }
}