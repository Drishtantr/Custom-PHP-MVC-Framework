<?php



class Home extends Controller{






    public function index($title = ''){


        $post = $this->model('Post');

        $post->title = "Php is the best";


        $this->view('home', ['title'=>$post->title]);


    }



    public function register(){


        echo "hey I'm registering a user";


    }






}




