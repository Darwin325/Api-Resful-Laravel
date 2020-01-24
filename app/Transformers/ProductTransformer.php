<?php

namespace App\Transformers;

use App\Product;
use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];
    
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Product $product)
    {
        return [
            'identifcador' => (int)$product->id,
            'fechaCreacion' => (string)$product->created_at,
            'titulo' => (string)$product->name,
            'detalles' => (string)$product->description,
            'disponibles' => (string)$product->quantity,
            'estado' => (string)$product->quantity,
            'imagen' => url("img/{$product->image}"),
            'vendedor' => (int)$product->seller_id,
            'fechaActualizacion' => (string)$product->updated_at,
            'fechaEliminacion' => isset($product->deleted_at) ? (string)$product->deleted_at : null,
        ];
    }
}
