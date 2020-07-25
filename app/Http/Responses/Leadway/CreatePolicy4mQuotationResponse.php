<?php


namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use OpenApi\Annotations\Items;
use OpenApi\Annotations\Property;
use OpenApi\Annotations\Schema;

/**
 * @Schema(
 *      description= "create policy from quotation response"
 * )
 *
 * @package App\Http\Responses
 */
    class CreatePolicy4mQuotationResponse extends JsonResponse
    {
        /**
         * @Property(
         *     type="string",
         * description= "PolicyNo"
         * )
         *
         * @var string
         */
        public string $PolicyNo;

        /**
         * @Property(
         *     type="string",
         * description= "message"
         * )
         *
         * @var string
         */
        public string $message;
        /**
         * @Property(
         *     type="string",
         * description= "paymentUrl"
         * )
         *
         * @var string
         */
        public $paymentUrl;
    }

?>