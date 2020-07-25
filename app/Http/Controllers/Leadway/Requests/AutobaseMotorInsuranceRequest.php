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
class AutobaseMotorInsuranceRequest extends Controller
{

    public function __construct(Request $request)
   {
      $this->validate(
         $request, [
            'signature' => 'string',
            'staffs' => 'string',
            'building' => 'string',
            'vehicle' => 'required|unique:Vehicle',
            'clientNo' => 'string',
            'clientInfo' => 'unique:ClientInfo',
            'productCode' => 'string',
            'productSubClass' => 'string'
         ]
      );

      parent::__construct($request);
   }

}

?>