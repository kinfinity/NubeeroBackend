<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use OpenApi\Annotations\Items;
use OpenApi\Annotations\Property;
use OpenApi\Annotations\Schema;

/**
 * @Schema(
 *      description= "Leadway Health Insurance response"
 * )
 *
 * @package App\Http\Responses
 */
class HealthInsuranceResponse extends JsonResponse
{

    /**
     * @Property(
     *     type="integer",
     *     description="premium"
     * )
     *
     * @var int
     */    
    public int $premium;
    
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
     * description= "quoteNo"
     * )
     *
     * @var string
     */
    public string $quoteNo;

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
     * description= "accountNo"
     * )
     *
     * @var string
     */
    public string $accountNo;

}