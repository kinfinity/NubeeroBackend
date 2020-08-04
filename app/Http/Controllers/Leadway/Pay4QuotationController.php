<?php

namespace App\Http\Controllers;

use _3rdParty\Core\config\config;
use App\Http\Responses\Pay4QuotationResponse;
use App\Http\Controllers\Leadway\Requests\Pay4QuotationRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OpenApi\Annotations\Get;
use OpenApi\Annotations\MediaType;
use OpenApi\Annotations\Property;
use OpenApi\Annotations\RequestBody;
use OpenApi\Annotations\Response;
use OpenApi\Annotations\Schema;

use _3rdParty\Facade\LeadwayAPI;
use _3rdParty\Leadway\models\request\Pay4QuotationRequest as API_Pay4QuotationRequest;
use _3rdParty\Leadway\models\objects\Beneficiary;
use _3rdParty\Leadway\models\objects\BankInfo;
use _3rdParty\Leadway\models\objects\Base64StringGroup;
use _3rdParty\Leadway\models\objects\MedicalAnswer;

class Pay4QuotationController extends Controller
{
    public function __construct()
    {
        //
    }

    /**
     * @Get(
     *     path="/Pay4Quotation",
     *     summary= "Leadway Quotation Payment API",
     *     @RequestBody(
     *         @MediaType(
     *             mediaType="application/json",
     *             @Schema(
     *                 allOf={
     *                     @Schema(
     *                         type="object",
     *                         @Property(property="data",ref="#/components/schemas/Pay4QuotationResponse")
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
     *                         @Property(property="data",ref="#/components/schemas/Pay4QuotationResponse")
     *                     )
     *                 }
     *             )
     *         )
     *     )
     * )
     *
     * @param Pay4QuotationRequest $request
     *
     * @return Pay4QuotationResponse
     */
    public function post(Pay4QuotationRequest $request)
    {
        try 
        {

            // Configure and Create API facade
            $config = new config();
            $config->ENV = "DEVELOPEMENT";
            $leadFacade = new LeadwayAPI($config);

            //PAY FOR QUOTATIONweight
            $pay4Quote_Req = new API_Pay4QuotationRequest();
            
            $pay4Quote_Req->quoteNo = $request->quoteNo;
            $pay4Quote_Req->useWalletPayment = $request->useWalletPayment;
            $pay4Quote_Req->callBackUrl = $request->callBackUrl;
            $pay4Quote_Req->height = $request->height;
            $pay4Quote_Req->width = $request->width;
            $pay4Quote_Req->additionalComment = $request->additionalComment;

            foreach($request->beneficiaries as $b)
            {
                $ben = new Beneficiary();
                $ben->surname = $b->surname;
                $ben->otherNames = $b->otherNames;
                $ben->sharePercentage = $b->sharePercentage;
                $ben->relationshipType = $b->relationshipType;
                $ben->mobileNo = $b->mobileNo;

                $pay4Quote_Req->beneficiaries[] = $ben;

            }
            //
            
            foreach($request->medicalAnswer as $ma)
            {
                $medA = new MedicalAnswer();
                $medA->question = $ma->question;
                $medA->selected = $ma->selected;

                $pay4Quote_Req->medicalAnswer[] = $medA;

            }

            
            $bankI = new BankInfo();
            $bankI->bankName = $request->bankInfo->bankName;
            $bankI->accountName = $request->bankInfo->accountName;
            $bankI->accountNo = $request->bankInfo->accountNo;
            $bankI->directDebit = $request->bankInfo->directDebit;
            $bankI->ddFrequency = $request->bankInfo->ddFrequency;
            $bankI->debit_startDate_mm_dd_yyyy = $request->bankInfo->debit_startDate_mm_dd_yyyy;
            $pay4Quote_Req->bankInfo = $bankI;


            $pay4Quote_Req->clientPassportBase64String = new Base64StringGroup();
            $pay4Quote_Req->clientPassportBase64String->fileName = $request->clientPassportBase64String->fileName;
            $pay4Quote_Req->clientPassportBase64String->base64String = $request->clientPassportBase64String->base64String;
            $pay4Quote_Req->clientPassportBase64String->fileExtension = $request->clientPassportBase64String->fileExtension;


            $pay4Quote_Req->clientSignatureBase64String = new Base64StringGroup();
            $pay4Quote_Req->clientSignatureBase64String->fileName = $request->fileName;
            $pay4Quote_Req->clientSignatureBase64String->base64String = $request->base64String;
            $pay4Quote_Req->clientSignatureBase64String->fileExtension = $request->fileExtension;


            foreach($request->otherFileUpload as $o)
            {
                $ofU = new Base64StringGroup();
                $ofU->fileName = $o->fileName;
                $ofU->base64String = $o->base64String;
                $ofU->fileExtension = $o->fileExtension;

                $pay4Quote_Req->otherFileUpload[] = $ofU;

            }

            $pay4Quote_Req->annuityBankInfo = $request->annuityBankInfo;
            $pay4Quote_Req->signature = $request->signature;
            // $pay4Quote_Req->request_str = '';

            $response = $leadFacade->Pay4Quotation($pay4Quote_Req);

            // Save the request footprint to the DB

            // $response = new HealthInsuranceResponse();

            return response()->json(['message' => $request->clientNo], 409);

        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 409);
        }
    }

}
