<?php

namespace App\Http\Controllers;

use _3rdParty\Core\config\config;
use App\Http\Responses\GetQuotationResponse;
use App\Http\Controllers\Leadway\Requests\GetQuotationRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OpenApi\Annotations\Get;
use OpenApi\Annotations\MediaType;
use OpenApi\Annotations\Property;
use OpenApi\Annotations\RequestBody;
use OpenApi\Annotations\Response;
use OpenApi\Annotations\Schema;

use _3rdParty\Facade\LeadwayAPI;
use _3rdParty\Leadway\models\request\GetQuotationRequest as API_GetQuotationRequest;
use _3rdParty\Leadway\models\objects\Vehicle;
use _3rdParty\Leadway\models\objects\ClientInfo;

class GetQuotationController extends Controller
{
    public function __construct()
    {
        //
    }

    /**
     * @Get(
     *     path="/GetQuotation",
     *     summary= "Leadway Get Quotation API",
     *     @RequestBody(
     *         @MediaType(
     *             mediaType="application/json",
     *             @Schema(
     *                 allOf={
     *                     @Schema(
     *                         type="object",
     *                         @Property(property="data",ref="#/components/schemas/GetQuotationResponse")
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
     *                         @Property(property="data",ref="#/components/schemas/GetQuotationResponse")
     *                     )
     *                 }
     *             )
     *         )
     *     )
     * )
     *
     * @param GetQuotationRequest $request
     *
     * @return GetQuotationResponse
     */
    public function post(GetQuotationRequest $request)
    {
        try 
        {

            // Configure and Create API facade
            $config = new config();
            $config->ENV = "DEVELOPEMENT";
            $leadFacade = new LeadwayAPI($config);

            // GET QUOTATION
            $getQuote_Req = new API_GetQuotationRequest();
            
            $getQuote_Req->clientNo = $request->clientNo;

            $getQuote_Req->clientInfo = new ClientInfo();
            $getQuote_Req->clientInfo->surname = $request->clientInfo['surname'];
            $getQuote_Req->clientInfo->othernames = $request->clientInfo['othernames'];
            $getQuote_Req->clientInfo->middlename = $request->clientInfo['middlename'];
            $getQuote_Req->clientInfo->emailAddress = $request->clientInfo['emailAddress'];
            $getQuote_Req->clientInfo->mobileNo = $request->clientInfo['mobileNo'];
            $getQuote_Req->clientInfo->gender = $request->clientInfo['gender'];
            $getQuote_Req->clientInfo->dob_mm_dd_yyyy = $request->clientInfo['dob_mm_dd_yyyy'];
            $getQuote_Req->clientInfo->postalAddress = $request->clientInfo['postalAddress'];
            $getQuote_Req->clientInfo->city = $request->clientInfo['city'];
            $getQuote_Req->clientInfo->state = $request->clientInfo['state'];

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

                $getQuote_Req->vehicle[] = $v;

            }

            $getQuote_Req->signature = $request->signature;
            // $getQuote_Req->request_str = '';

            $response = $leadFacade->GetQuotation($getQuote_Req);

            // Save the request footprint to the DB

            // $response = new HealthInsuranceResponse();

            return response()->json(['message' => $request->clientNo], 409);

        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 409);
        }
    }

}
