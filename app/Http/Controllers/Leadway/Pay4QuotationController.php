<?php

namespace App\Http\Controllers\Leadway;

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
        return $request;
        // $response = new Pay4QuotationResponse();
        // return ;
    }

}
