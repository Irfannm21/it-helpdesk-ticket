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
            return redirect()->route('product.index')->with('message', 'User added successfully!');
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
