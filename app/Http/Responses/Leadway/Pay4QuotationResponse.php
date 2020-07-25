<?php


namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use OpenApi\Annotations\Items;
use OpenApi\Annotations\Property;
use OpenApi\Annotations\Schema;

/**
 * @Schema(
 *      description= "Pay for quotation response"
 * )
 *
 * @package App\Http\Responses
 */
    class Pay4QuotationResponse extends JsonResponse
    {
        /**
         * @Property(
         *     type="string",
         * description= "paymentUrl"
         * )
         *
         * @var string
         */
        public string $paymentUrl;

        /**
         * @Property(
         *     type="bool",
         * description= "paystackUrl"
         * )
         *
         * @var bool
         */
        public bool $paystackUrl;

        /**
         * @Property(
         *     type="string",
         * description= "PolicyNo"
         * )
         *
         * @var string
         */
        public $PolicyNo;

        /**
         * @Property(
         *     type="string",
         * description= "message"
         * )
         *
         * @var string
         */
        public $message;
    }

?>