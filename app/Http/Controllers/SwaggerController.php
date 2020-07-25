<?php
namespace App\Http\Controllers;

use OpenApi\Annotations\Contact;
use OpenApi\Annotations\Info;
use OpenApi\Annotations\Property;
use OpenApi\Annotations\Schema;

/**
 *
 * @Info(
 *     version="0.1.0",
 *      title="Nubeero API",
 *     description= "",
 *     @Contact(
 *         email="ksupro1@gmail.com.com",
 *         name="Egbewatt kokou M.S"
 *     )
 * )
 *
 * @Schema(
 *     schema="ApiResponse",
 *     type="object",
 *      description= "Response entity, response result uses this structure uniformly"
 *    ,
 *     @Property(
 *         property="code",
 *         type="string",
 *          description= "response code"
 *     ),
 *     @Property (property = "message", type = "string", description = "response result prompt")
 * )
 *
 *
 * @package App\Http\Controllers
 */
class SwaggerController
{}