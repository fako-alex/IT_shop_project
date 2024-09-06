<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;
    protected $table = 'category';
    //protected $table = ['category'];

    static public function getSingle($id)
    {
        return self::find($id);
    }   


    static public function getRecord()
    {
        return self::select('category.*', 'users.name as created_by_name')
        ->join('users', 'users.id', '=', 'category.created_by')
        ->where('category.is_delete', '=', 0)
        ->orderBy('category.id', 'desc')
        ->get();
    }

    static public function getRecordActive()
    {
        return self::select('category.*')
        ->join('users', 'users.id', '=', 'category.created_by')
        ->where('category.is_delete', '=', 0)
        ->where('category.status', '=', 0)
        ->orderBy('category.name', 'asc')
        ->get();
        //->paginate(10);
    }

    public static function getRecordMenu()
    {
        return self::select('category.*')
            ->join('users', 'users.id', '=', 'category.created_by')
            ->where('category.is_delete', '=', 0)
            ->where('category.status', '=', 0)
            ->with('getSubCategory') // Charger les sous-catégories associées
            ->get();
    }

    public function getSubCategory()
{
    return $this->hasMany(SubCategoryModel::class, "category_id")
        ->where('status', '=', 0)
        ->where('is_delete', '=', 0);
}


}
