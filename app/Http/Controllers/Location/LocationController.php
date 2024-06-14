<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\District;
use App\Models\Ward;
use App\Transformers\CityTransfornmer;
use App\Transformers\CountryTransfornmer;
use App\Transformers\DistrictTransfornmer;
use App\Transformers\WardTransfornmer;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    protected $countryModel;
    protected $cityModel;
    protected $districtModel;
    protected $wardModel;
    public function __construct(Country $countryModel, City $cityModel, District $districtModel, Ward $wardModel)
    {
        $this->countryModel = $countryModel;
        $this->cityModel = $cityModel;
        $this->districtModel = $districtModel;
        $this->wardModel = $wardModel;
    }

    public function getCountries(Request $request){
        $entries = $this->countryModel->all();
        $this->setTransformer(new CountryTransfornmer());
        return $this->jsonReponse($entries, 200, [], ['paginate' => false]);
    }

    public function getCities(Request $request){
        $entries = $this->cityModel->all();
        $this->setTransformer(new CityTransfornmer());
        return $this->jsonReponse($entries, 200, [], ['paginate' => false]);
    }

    public function getDistricts(String $id){
        $entries = $this->districtModel->where('city_id', $id)->get();
        $this->setTransformer(new DistrictTransfornmer());
        return $this->jsonReponse($entries, 200, [], ['paginate' => false]);
    }

    public function getWards(String $id){
        $entries = $this->wardModel->where('district_id', $id)->get();
        $this->setTransformer(new WardTransfornmer());
        return $this->jsonReponse($entries, 200, [], ['paginate' => false]);
    }
}
