<?php

class IncludeFilePresenter{



    public function __construct(){

    }


    public function show($view,$data){

        include_once './view/header.mustache';
        include_once('./view/'.$view);
        include_once './view/footer.mustache';
    }

}