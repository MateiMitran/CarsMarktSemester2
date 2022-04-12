<?php
 class Car
{
    private $id;
    private $model;
    private $manufacturer;
    private $build_year;
    private $price;
    private $total_mileage;
    private $type;
    private $engine;
    private $fuel_type;
    private $transmission;
    private $drivetrain;
    private $city_mileage;
    private $highway_mileage;
    private $exterior_color;
    private $interior_color;
    private $vin;
    private $convenience_features;
    private $safety_features;
    private $seating_features;
    private $exterior_features;
    private $description;
    private $image1;
    private $image2;
    private $image3;
    private $image4;
    private $image5;
    
    public function __construct($id,$model,$manufacturer,$description,$build_year,$price,$total_mileage,$type,$engine,$fuel_type,
                               $transmission,$drivetrain,$city_mileage,$highway_mileage,$exterior_color,$interior_color,$vin,
                               $convenience_features,$safety_features,$seating_features,$exterior_features,$image1,$image2,$image3,$image4,$image5)
    {
        $this->id = $id;
        $this->model = $model;
        $this->manufacturer = $manufacturer;
        $this->build_year = $build_year;
        $this->description = $description;
        $this->price = $price;
        $this->total_mileage = $total_mileage;
        $this->type = $type;
        $this->engine = $engine;
        $this->fuel_type = $fuel_type;
        $this->transmission = $transmission;
        $this->drivetrain = $drivetrain;
        $this->city_mileage = $city_mileage;
        $this->highway_mileage = $highway_mileage;
        $this->exterior_color = $exterior_color;
        $this->interior_color = $interior_color;
        $this->vin = $vin;
        $this->convenience_features = $convenience_features;
        $this->safety_features = $safety_features;
        $this->seating_features = $seating_features;
        $this->exterior_features = $exterior_features;
        $this->image1 = $image1;
        $this->image2 = $image2;
        $this->image3 = $image3;
        $this->image4 = $image4;
        $this->image5 = $image5;
    }
    public function GetManufacturer()
    {
        return "$this->manufacturer";
    }

    public function GetTotalMileage()
    {
        return "$this->total_mileage";
    }

    public function GetType()
    {
        return "$this->type";
    }

    public function GetEngine()
    {
        return "$this->engine";
    }

    public function GetFuelType()
    {
        return "$this->fuel_type";
    }

    public function GetTransmission()
    {
        return "$this->transmission";
    }

    public function GetDrivetrain()
    {
        return "$this->drivetrain";
    }

    public function GetCityMileage()
    {
        return "$this->city_mileage";
    }

    public function GetHighwayMileage()
    {
        return "$this->highway_mileage";
    }

    public function GetExteriorColor()
    {
        return "$this->exterior_color";
    }

    public function GetInteriorColor()
    {
        return "$this->interior_color";
    }

    public function GetVin()
    {
        return "$this->vin";
    }

    public function GetConvenienceFeatures()
    {
        return "$this->convenience_features";
    }

    public function GetSafetyFeatures()
    {
        return "$this->safety_features";
    }

    public function GetSeatingFeatures()
    {
        return "$this->seating_features";
    }

    public function GetExteriorFeatures()
    {
        return "$this->exterior_features";
    }

    public function GetID()
    {
        return "$this->id";
    }
    public function GetModel()
    {
        return "$this->model";
    }

    public function GetBuildYear()
    {
        return "$this->build_year";
    }

    public function GetPrice()
    {
        return "$this->price";
    }
    
    public function GetDescription()
    {
       return "$this->description";
    }

    public function GetImage1()
    {
        return $this->image1;
    }
    public function GetImage2()
    {
        return $this->image2;
    }
    public function GetImage3()
    {
        return $this->image3;
    }
    public function GetImage4()
    {
        return $this->image4;
    }
    public function GetImage5()
    {
        return $this->image5;
    }

   
}