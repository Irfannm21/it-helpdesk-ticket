<?php
namespace App\Models;

class Product extends Model
{
    protected $table = 'ref_product';

    protected $fillable = [
        'code',
        'name',
        'date',
        'types',
        'price',
        'description',
    ];

    
    public function handleStoreOrUpdate($request)
    {
        $this->beginTransaction();
        try {
            $this->fill($request->all());
            $this->save();

            // return $this->commitSaved();
            $this->commitSaved();
            if(request()->route()->getName() == 'product.store') {
                return redirect()->route('product.index')->with('message', 'Product added successfully!');
            } else {
                return redirect()->route('product.index')->with('message', 'Product Upddated successfully!');
            }
        } catch (\Exception $e) {
            return $this->rollbackSaved($e);
        }
    }

    public function handleDestroy()
    {
        $this->beginTransaction();
        try {
            $this->delete();
            $this->commitDeleted();
            return redirect()->route('product.index')->with('message', 'Delete Product successfully!');
        } catch (\Exception $e) {
            return $this->rollbackDeleted($e);
        }
    }
}
