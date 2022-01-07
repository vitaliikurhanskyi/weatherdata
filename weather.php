<?php

class Weather
{

    public $weather = NULL;
    public $decodeWeatherArray = [];
    public $city = NULL;
    public $error = NULL;
    public $showResult = false;
    public $getData = false;
    public $showError = false;
    public $showError2 = false;
    

    function __construct($city, $showResult, $getData)
    {
        if($getData == '1') {
            $this->getData = true;
        }
        if ($showResult == '1') {
            $this->showResult = true;
        }
        $this->city = $city;
        $this->getAllWeatherData();
        $this->decodeWeayherJson();
    }

    //Functions:    
    public function getAllWeatherData()
    {
        if($this->getData){
            $get_wether = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=" . $this->city . "&appid=a868550f20df98f37e4926673203701d");
            if($get_wether == false) {
                $this->showError2 = true;
            }
        }

        if ($this->showError2 == true) {
            $this->showError = true;
        }
        
        if($this->showError) {
            $this->setError();
        } 
        else {
            $this->weather = $get_wether;
        }
        
    }

    public function setError() {
        $this->error = "Введите правильное название города!!!";
    }

    public function getError() {
        return $this->error;
    }

    public function decodeWeayherJson()
    {
        //$this->returnWeatherData();
        $this->decodeWeatherArray = json_decode($this->weather, true);
    }

    public function returnWeatherData()
    {
        //$this->getAllWeatherData();
        return $this->decodeWeatherArray;
    }

    public function getClouds()
    {
        $WeatherArray = $this->decodeWeatherArray;
        return ucwords($WeatherArray['weather'][0]['description']);
    }

    public function getTemperature()
    {
        $WeatherArray = $this->decodeWeatherArray;
        return $WeatherArray['main']['humidity'];
    }

    public function getWind()
    {
        $WeatherArray = $this->decodeWeatherArray;
        return $WeatherArray['wind']['speed'];
    }

    public function getCityName()
    {
        $WeatherArray = $this->decodeWeatherArray;
        return $WeatherArray['name'];
    }

}

$weather = new Weather($_POST['cityname'], $_POST['showResult'], $_POST['getData']);

?>