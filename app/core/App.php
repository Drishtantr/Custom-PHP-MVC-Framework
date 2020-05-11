<?php


class App
{


    protected $defaultMethod = "index";

    protected $defaultController = "Home";

    protected $parameters = [];


    public function __construct()
    {

        $url = $this->processUrl();


        if(file_exists('../app/controllers/' .$url[0]. '.php')) {

            $this->defaultController = $url[0];
            unset($url[0]);

        }


        require_once('../app/controllers/' .$this->defaultController. '.php');

        $this->defaultController = new $this->defaultController;



            if(isset($url[1])){


                if(method_exists($this->defaultController, $url[1])){


                    $this->defaultMethod = $url[1];
                    unset($url[1]);

                }




            }





        $this->parameters = $url ? array_values($url) : [];


        call_user_func_array([$this->defaultController, $this->defaultMethod], $this->parameters);




    }

    public function processUrl(){


        if(isset($_GET['url'])) {


            return $url = explode('/',filter_var(rtrim($_GET['url'],'/'), FILTER_SANITIZE_URL));




        }




    }




}
