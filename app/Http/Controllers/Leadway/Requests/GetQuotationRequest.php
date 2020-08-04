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
class GetQuotationRequest extends Controller
{

   public $clientInfo;
   public string $clientNo;
   public $vehicles = []; // Vehicle class type
   public string $signature;

    public function __construct(Request $request)
   {
      $this->validate(
         $request, [
            'signature' => 'string',
            'vehicle' => 'required|unique:Vehicle',
            'clientNo' => 'string',
            'clientInfo' => 'unique:ClientInfo'
         ]
      );

      $this->vehicle = $request->input('vehicle');
      $this->clientNo = $request->input('clientNo');
      $this->clientInfo = $request->input('clientInfo');
      $this->signature = $request->input('signature');

      parent::__construct($request);
   }

}

?>