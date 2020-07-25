<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use OpenApi\Annotations\Items;
use OpenApi\Annotations\Property;
use OpenApi\Annotations\Schema;

/**
 * @Schema(
 *      description= "Get quotation response"
 * )
 *
 * @package App\Http\Responses
 */
    class GetQuotationResponse extends JsonResponse
    {
        /**
         * @Property(
         *     type="string",
         * description= "quoteNo"
         * )
         *
         * @var string
         */
        public string $quoteNo;

        /**
         * @Property(
         *     type="integer",
         *     description="totalPremium"
         * )
         *
         * @var int
         */    
        public int $totalPremium;
        /**
         * @Property(
         *     type="array",
         *     @OA\Items(type="VehicleResult"),
         *     description= "vehicleResult"
         * )
         * 
         * @var string
         */
        public $vehicleResult = []; // VehicleResult  class type
    }

?>