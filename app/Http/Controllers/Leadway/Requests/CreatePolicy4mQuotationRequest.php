<?php

namespace App\Http\Controllers\Leadway\Requests;

use OpenApi\Annotations\Items;
use OpenApi\Annotations\Property;
use OpenApi\Annotations\Schema;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


/**
 * @Schema(
 *      description= "Leadway Health Insurance request"
 * )
 *
 * @package App\Http\Controllers\Leadway\Requests
 */
class CreatePolicy4mQuotationRequest extends Controller
{
   public string $quoteNo;
   public string $paymentReferenceNo;
   public $issueCreditNote;
   public $creditNote;
   public int $height;
   public int $width;
   public bool $useWalletPayment;
   public string $additionalComment;
   public $callBackPaymentPage;
   public $callBackUrl;
   public $beneficiaries = []; // Beneficiary class type
   public $medicalAnswer = []; // MedicalAnswer  class type
   public $bankInfo;
   public $clientPassportBase64String;
   public $clientSignatureBase64String;
   public $otherFileUpload = []; // Base64StringGroup class type
   public ?string $annuityBankInfo;
   public $signature;

    public function __construct(Request $request)
   {
      $this->validate(
         $request, [
            'signature' => 'string',
            'staffs' => 'string',
            'building' => 'string',
            'vehicle' => 'required|unique:Vehicle',
            'clientNo' => 'string',
            'clientInfo' => 'unique:ClientInfo',
            'productCode' => 'string',
            'productSubClass' => 'string'
         ]
      );

      $this->quoteNo = $request->input('quoteNo');
      $this->paymentReferenceNo = $request->input('paymentReferenceNo');
      $this->issueCreditNote = $request->input('issueCreditNote');
      $this->creditNote = $request->input('creditNote');
      $this->height = $request->input('height');
      $this->width = $request->input('width');
      $this->useWalletPayment = $request->input('useWalletPayment');
      $this->additionalComment = $request->input('additionalComment');
      $this->callBackPaymentPage = $request->input('callBackPaymentPage');
      $this->callBackUrl = $request->input('callBackUrl');
      $this->beneficiaries = $request->input('beneficiaries');
      $this->medicalAnswer = $request->input('medicalAnswer');
      $this->bankInfo = $request->input('bankInfo');
      $this->clientPassportBase64String = $request->input('clientPassportBase64String');
      $this->clientSignatureBase64String = $request->input('clientSignatureBase64String');
      $this->otherFileUpload = $request->input('otherFileUpload');
      $this->annuityBankInfo = $request->input('annuityBankInfo');
      $this->signature = $request->input('signature');

      parent::__construct($request);
   }

}

?>