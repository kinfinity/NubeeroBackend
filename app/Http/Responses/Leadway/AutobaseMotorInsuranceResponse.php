<?php

namespace App\Http\Responses\Leadway;

use Illuminate\Http\JsonResponse;
use OpenApi\Annotations\Items;
use OpenApi\Annotations\Property;
use OpenApi\Annotations\Schema;
use _3rdParty\Core\Leadway\models\objects;

/**
 * @Schema(
 *      description= "AutobaseMotor Insurance response"
 * )
 *
 * @package App\Http\Responses
 */
class AutobaseMotorInsuranceResponse extends JsonResponse
{

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
     *     type="string",
     * description= "PolicyNo"
     * )
     *
     * @var string
     */
    public string $PolicyNo;

    /**
     * @Property(
     *     type="string",
     * description= "bankName"
     * )
     *
     * @var string
     */
    public string $bankName;

    /**
     * @Property(
     *     type="string",
     * description= "certificateUrl"
     * )
     *
     * @var string
     */
    public string $certificateUrl;

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
     *     type="array",
     *     @OA\Items(type="VehicleResult"),
     *     description= "vehicleResult"
     * )
     * 
     * @var string
     */
    public $vehicleResult = [];

}