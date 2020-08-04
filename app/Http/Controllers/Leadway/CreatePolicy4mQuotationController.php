<?php

namespace App\Http\Controllers;

use _3rdParty\Core\config\config;
use App\Http\Responses\CreatePolicy4mQuotationResponse;
use App\Http\Controllers\Leadway\Requests\CreatePolicy4mQuotationRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OpenApi\Annotations\Get;
use OpenApi\Annotations\MediaType;
use OpenApi\Annotations\Property;
use OpenApi\Annotations\RequestBody;
use OpenApi\Annotations\Response;
use OpenApi\Annotations\Schema;

use _3rdParty\Facade\LeadwayAPI;
use _3rdParty\Leadway\models\request\CreatePolicy4mQuotationRequest as API_CreatePolicy4mQuotationRequest;
use _3rdParty\Leadway\models\objects\Beneficiary;
use _3rdParty\Leadway\models\objects\BankInfo;
use _3rdParty\Leadway\models\objects\Base64StringGroup;
use _3rdParty\Leadway\models\objects\MedicalAnswer;

class CreatePolicy4mQuotationController extends Controller
{
    public function __construct()
    {
        //
    }

    /**
     * @Get(
     *     path="/CreatePolicy4mQuotation",
     *     summary= "Leadway Policy Creation API",
     *     @RequestBody(
     *         @MediaType(
     *             mediaType="application/json",
     *             @Schema(
     *                 allOf={
     *                     @Schema(
     *                         type="object",
     *                         @Property(property="data",ref="#/components/schemas/CreatePolicy4mQuotationResponse")
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
     *                         @Property(property="data",ref="#/components/schemas/CreatePolicy4mQuotationResponse")
     *                     )
     *                 }
     *             )
     *         )
     *     )
     * )
     *
     * @param CreatePolicy4mQuotationRequest $request
     *
     * @return CreatePolicy4mQuotationResponse
     */
    public function post(CreatePolicy4mQuotationRequest $request)
    {
        try 
        {

            // Configure and Create API facade
            $config = new config();
            $config->ENV = "DEVELOPEMENT";
            $leadFacade = new LeadwayAPI($config);

            // CREATE POLICY FROM QUOTATION
            $createPolicy4rmQuote_Req = new API_CreatePolicy4mQuotationRequest();
            
            $createPolicy4rmQuote_Req->quoteNo = $request->quoteNo;
            $createPolicy4rmQuote_Req->paymentReferenceNo = $request->paymentReferenceNo;
            $createPolicy4rmQuote_Req->issueCreditNote = $request->issueCreditNote;
            $createPolicy4rmQuote_Req->creditNote = $request->creditNote;
            $createPolicy4rmQuote_Req->height = $request->heights;
            $createPolicy4rmQuote_Req->weight = $request->weight;
            $createPolicy4rmQuote_Req->useWalletPayment = $request->useWalletPayment;
            $createPolicy4rmQuote_Req->additionalComment = $request->additionalComment;
            $createPolicy4rmQuote_Req->callBackPaymentPage = $request->callBackPaymentPage;
            $createPolicy4rmQuote_Req->callBackUrl = $request->callBackUrl;


            foreach($request->beneficiaries as $b)
            {
                $ben = new Beneficiary();
                $ben->surname = $b->surname;
                $ben->otherNames = $b->otherNames;
                $ben->sharePercentage = $b->sharePercentage;
                $ben->relationshipType = $b->relationshipType;
                $ben->mobileNo = $b->mobileNo;

                $createPolicy4rmQuote_Req->beneficiaries[] = $ben;

            }

            foreach($request->medicalAnswer as $ma)
            {
                $medA = new MedicalAnswer();
                $medA->question = $ma->question;
                $medA->selected = $ma->selected;

                $createPolicy4rmQuote_Req->medicalAnswer[] = $medA;

            }

            $bankI = new BankInfo();
            $bankI->bankName = $request->bankInfo->bankName;
            $bankI->accountName = $request->bankInfo->accountName;
            $bankI->accountNo = $request->bankInfo->accountNo;
            $bankI->directDebit = $request->bankInfo->directDebit;
            $bankI->ddFrequency = $request->bankInfo->ddFrequency;
            $bankI->debit_startDate_mm_dd_yyyy = $request->bankInfo->debit_startDate_mm_dd_yyyy;
            $createPolicy4rmQuote_Req->bankInfo = $bankI;


            $createPolicy4rmQuote_Req->clientPassportBase64String = new Base64StringGroup();
            $createPolicy4rmQuote_Req->clientPassportBase64String->fileName = $request->clientPassportBase64String->fileName;
            $createPolicy4rmQuote_Req->clientPassportBase64String->base64String = $request->clientPassportBase64String->base64String;
            $createPolicy4rmQuote_Req->clientPassportBase64String->fileExtension = $request->clientPassportBase64String->fileExtension;


            $createPolicy4rmQuote_Req->clientSignatureBase64String = new Base64StringGroup();
            $createPolicy4rmQuote_Req->clientSignatureBase64String->fileName = $request->fileName;
            $createPolicy4rmQuote_Req->clientSignatureBase64String->base64String = $request->base64String;
            $createPolicy4rmQuote_Req->clientSignatureBase64String->fileExtension = $request->fileExtension;


            foreach($request->otherFileUpload as $o)
            {
                $ofU = new Base64StringGroup();
                $ofU->fileName = $o->fileName;
                $ofU->base64String = $o->base64String;
                $ofU->fileExtension = $o->fileExtension;

                $createPolicy4rmQuote_Req->otherFileUpload[] = $ofU;

            }

            
            $createPolicy4rmQuote_Req->annuityBankInfo = $request->annuityBankInfo;
            $createPolicy4rmQuote_Req->signature = $request->signature;
            // $createPolicy4rmQuote_Req->request_str = '';

            $response = $leadFacade->CreatePolicy4mQuotation($createPolicy4rmQuote_Req);

            // Save the request footprint to the DB

            // $response = new HealthInsuranceResponse();

            return response()->json(['message' => $request->clientNo], 409);

        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 409);
        }
    }

}
