<?php

namespace App\Http\Controllers;

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
        return $request;
        // $response = new CreatePolicy4mQuotationResponse();
        // return ;
    }

}
