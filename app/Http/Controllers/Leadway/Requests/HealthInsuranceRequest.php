<?php

namespace App\Http\Controllers\Leadway\Requests;

use OpenApi\Annotations\Items;
use OpenApi\Annotations\Property;
use OpenApi\Annotations\Schema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


/**
 * @Schema(
 *      description= "Leadway Health Insurance request"
 * )
 *
 * @package App\Http\Controllers\Leadway\Requests
 */
class HealthInsuranceRequest extends Controller
{

   public string $signature;
   public string $productSubClass;
   public string $productCode;
   public $clientInfo;
   public string $clientNo;
   public $vehicle;
   public ?string $building;
   public ?string $staffs;

    public function __construct(Request $request)
   {
      $this->validate(
         $request, [
            'signature' => 'string',
            'staffs' => 'nullable',
            'building' => 'nullable',
            'clientNo' => 'string',
            'productCode' => 'string',
            'productSubClass' => 'string'
         ]
      );

      $this->signature = $request->input('signature');
      $this->staffs = $request->input('staffs');
      $this->building = $request->input('building');
      $this->clientNo = $request->input('clientNo');
      $this->productCode = $request->input('productCode');
      $this->productSubClass = $request->input('productSubClass');
      $this->vehicle = $request->input('vehicle');
      $this->clientInfo = $request->input('clientInfo');
      // var_dump($this->clientInfo['surname']);
      

      parent::__construct($request);
   }

}

?>