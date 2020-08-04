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
class Pay4QuotationRequest extends Controller
{
   public string $signature;
   public string $quoteNo;
   public $beneficiaries = []; //  Beneficiary class type
   public bool $useWalletPayment;
   public $callBackUrl;
   public string $additionalComment;
   public int $height;
   public int $width;
   public $bankInfo;
   public $medicalAnswer = []; // MedicalAnswer  class type
   public $clientPassportBase64String;
   public $clientSignatureBase64String;
   public $otherFileUpload = []; // Base64StringGroup  class type
   public ?string $annuityBankInfo;

    public function __construct(Request $request)
   {
      $this->validate(
         $request, [
            'signature' => 'string'
         ]
      );

      $this->quoteNo = $request->input('quoteNo');
      $this->height = $request->input('height');
      $this->width = $request->input('width');
      $this->useWalletPayment = $request->input('useWalletPayment');
      $this->additionalComment = $request->input('additionalComment');
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