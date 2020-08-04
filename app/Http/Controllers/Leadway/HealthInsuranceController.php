<?php

namespace App\Http\Controllers\Leadway;

use _3rdParty\Core\config\config;
use App\Http\Responses\HealthInsuranceResponse;
use App\Http\Controllers\Leadway\Requests\HealthInsuranceRequest;
use App\Http\Controllers\Controller;
use OpenApi\Annotations\Get;
use OpenApi\Annotations\MediaType;
use OpenApi\Annotations\Property;
use OpenApi\Annotations\RequestBody;
use OpenApi\Annotations\Response;
use OpenApi\Annotations\Schema;

use _3rdParty\Facade\LeadwayAPI;
use _3rdParty\Leadway\models\request\HealthInsuranceRequest as API_HealthInsuranceRequest;
use _3rdParty\Leadway\models\objects\ClientInfo;

class HealthInsuranceController extends Controller
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
    public function post(HealthInsuranceRequest $request)
    {

        try
        {            
            // Configure and Create API facade
            $config = new config();
            $config->ENV = "DEVELOPEMENT";
            $leadFacade = new LeadwayAPI($config);

            // make leadway request to HEALTH INSURANCE 
            $healthIns_Req = new API_HealthInsuranceRequest();
            
            $healthIns_Req->productSubClass = $request->productSubClass;
            $healthIns_Req->productCode = $request->productCode;
            $healthIns_Req->clientNo = $request->clientNo;

            $healthIns_Req->clientInfo = new ClientInfo();
            $healthIns_Req->clientInfo->surname = $request->clientInfo['surname'];
            $healthIns_Req->clientInfo->othernames = $request->clientInfo['othernames'];
            $healthIns_Req->clientInfo->middlename = $request->clientInfo['middlename'];
            $healthIns_Req->clientInfo->emailAddress = $request->clientInfo['emailAddress'];
            $healthIns_Req->clientInfo->mobileNo = $request->clientInfo['mobileNo'];
            $healthIns_Req->clientInfo->gender = $request->clientInfo['gender'];
            $healthIns_Req->clientInfo->dob_mm_dd_yyyy = $request->clientInfo['dob_mm_dd_yyyy'];
            $healthIns_Req->clientInfo->postalAddress = $request->clientInfo['postalAddress'];
            $healthIns_Req->clientInfo->city = $request->clientInfo['city'];
            $healthIns_Req->clientInfo->state = $request->clientInfo['state'];

            $healthIns_Req->vehicle = $request->vehicle;
            $healthIns_Req->building = $request->building;
            $healthIns_Req->staffs = $request->staffs;
            $healthIns_Req->signature = $request->signature;
            // $healthIns_Req->request_str = '';
            var_dump($healthIns_Req);

            $response = $leadFacade->HealthInsurance($healthIns_Req);

            // Save the request footprint to the DB

            // $response = new HealthInsuranceResponse();

            return response()->json(['message' => $request->clientNo], 409);
        } catch (\Exception $e) {
            //return error message
            // return response()->json(['message' => 'User Registration Failed!'], 409);
            return response()->json(['message' => $e->getMessage()], 409);
        }
            
    }

}
