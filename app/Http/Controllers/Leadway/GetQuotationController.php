<?php

namespace App\Http\Controllers\Leadway;

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
        return $request;
        // $response = new GetQuotationResponse();
        // return ;
    }

}
