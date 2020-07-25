<?php

namespace App\Http\Controllers\Leadway;

use App\Http\Responses\AutobaseMotorInsuranceResponse;
use App\Http\Controllers\Leadway\Requests\AutobaseMotorInsuranceRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OpenApi\Annotations\Get;
use OpenApi\Annotations\MediaType;
use OpenApi\Annotations\Property;
use OpenApi\Annotations\RequestBody;
use OpenApi\Annotations\Response;
use OpenApi\Annotations\Schema;

class AutobaseMotorInsuranceController extends Controller
{
    public function __construct()
    {
        //
    }

    /**
     * @Get(
     *     path="/AutobaseMotorInsurance",
     *     summary= "Leadway Motor Insurance API",
     *     @RequestBody(
     *         @MediaType(
     *             mediaType="application/json",
     *             @Schema(
     *                 allOf={
     *                     @Schema(
     *                         type="object",
     *                         @Property(property="data",ref="#/components/schemas/AutobaseMotorInsuranceResponse")
     *                     )
     *                 }
     *             )
     *         )
     *     ),
     *     @Response(
     *          response="200",
     *          description= "Normal Operational Response",
     *         @MediaType(
     *             mediaType="application/json",
     *             @Schema(
     *                 allOf={
     *                     @Schema(ref="#/components/schemas/ApiResponse"),
     *                     @Schema(
     *                         type="object",
     *                         @Property(property="data",ref="#/components/schemas/AutobaseMotorInsuranceResponse")
     *                     )
     *                 }
     *             )
     *         )
     *     )
     * )
     *
     * @param AutobaseMotorInsuranceRequest $request
     *
     * @return AutobaseMotorInsuranceResponse
     */
    public function post(AutobaseMotorInsuranceRequest $request)
    {
        return $request;
        // $response = new AutobaseMotorInsuranceResponse();
        // return ;
    }

}
