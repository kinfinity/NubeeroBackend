<?php

namespace App\Http\Controllers;

use _3rdParty\Core\config\config;
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

use _3rdParty\Facade\LeadwayAPI;
use _3rdParty\Leadway\models\request\AutobaseMotorInsuranceRequest as API_AutobaseMotorInsuranceRequest;
use _3rdParty\Leadway\models\objects\ClientInfo;
use _3rdParty\Leadway\models\objects\Vehicle;

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
        try 
        {

            // Configure and Create API facade
            $config = new config();
            $config->ENV = "DEVELOPEMENT";
            $leadFacade = new LeadwayAPI($config);

            // make leadway request to AUTOBASEMOTOR INSURANCE 
            $motorIns_Req = new API_AutobaseMotorInsuranceRequest();
        
            $motorIns_Req->clientNo = $request->clientNo;

            $motorIns_Req->clientInfo = new ClientInfo();
            $motorIns_Req->clientInfo->surname = $request->clientInfo['surname'];
            $motorIns_Req->clientInfo->othernames = $request->clientInfo['othernames'];
            $motorIns_Req->clientInfo->middlename = $request->clientInfo['middlename'];
            $motorIns_Req->clientInfo->emailAddress = $request->clientInfo['emailAddress'];
            $motorIns_Req->clientInfo->mobileNo = $request->clientInfo['mobileNo'];
            $motorIns_Req->clientInfo->gender = $request->clientInfo['gender'];
            $motorIns_Req->clientInfo->dob_mm_dd_yyyy = $request->clientInfo['dob_mm_dd_yyyy'];
            $motorIns_Req->clientInfo->postalAddress = $request->clientInfo['postalAddress'];
            $motorIns_Req->clientInfo->city = $request->clientInfo['city'];
            $motorIns_Req->clientInfo->state = $request->clientInfo['state'];

            foreach($request->vehicle as $vehicle)
            {
                $v = new Vehicle();
                $v->registrationNo = $vehicle->registrationNo;
                $v->make_id = $vehicle->make_id;
                $v->model_id = $vehicle->model_id;
                $v->chassisNo = $vehicle->chassisNo;
                $v->engineNo = $vehicle->engineNo;
                $v->bodyType = $vehicle->bodyType;
                $v->colour = $vehicle->colour;
                $v->manuYear = $vehicle->manuYear;
                $v->value = $vehicle->value;
                $v->commercial = $vehicle->commercial;

                $motorIns_Req->vehicle[] = $v;

            }

            $motorIns_Req->signature = $request->signature;
            // $motorIns_Req->request_str = 'motorinsurance';

            $response = $leadFacade->MotorInsurance($motorIns_Req);

            // Save the request footprint to the DB

            // $response = new HealthInsuranceResponse();

            return response()->json(['message' => $request->clientNo], 409);

         } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 409);
        }
    }

}
