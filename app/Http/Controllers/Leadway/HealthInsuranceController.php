<?php

namespace App\Http\Controllers;

use App\Http\Responses\HealthInsuranceResponse;
use App\Http\Controllers\Leadway\Requests\HealthInsuranceRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OpenApi\Annotations\Get;
use OpenApi\Annotations\MediaType;
use OpenApi\Annotations\Property;
use OpenApi\Annotations\RequestBody;
use OpenApi\Annotations\Response;
use OpenApi\Annotations\Schema;
use Illuminate\Support\Facades\Log;

class HealthinsuranceController extends Controller
{

    /**
     * @Get(
     *     path="/HealthInsurance",
     *     summary= "Leadway Health Insurance API",
     *     @RequestBody(
     *         @MediaType(
     *             mediaType="application/json",
     *             @Schema(
     *                 allOf={
     *                     @Schema(
     *                         type="object",
     *                         @Property(property="data",ref="#/components/schemas/HealthInsuranceResponse")
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
     *                         @Property(property="data",ref="#/components/schemas/HealthInsuranceResponse")
     *                     )
     *                 }
     *             )
     *         )
     *     )
     * )
     *
     * @param HealthInsuranceRequest $request
     *
     * @return HealthInsuranceResponse
     */
    public function post(Request $request)
    {
        Log::info($request->JSON_string);
        // var_dump($request->JSON_string);
            
        try{
            // return $request;
            // $response = new HealthInsuranceResponse();
            return response()->json(['message' => '$e->getMessage()'], 409);
        } catch (\Exception $e) {
            //return error message
            // return response()->json(['message' => 'User Registration Failed!'], 409);
            return response()->json(['message' => $e->getMessage()], 409);
        }
            
    }

}
