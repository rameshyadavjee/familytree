<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    protected $fillable = ['user_id','name', 'gender','image', 'father_id', 'mother_id', 'spouse_id'];

    public function father()
    {
        return $this->belongsTo(FamilyMember::class, 'father_id');
    }

    public function mother()
    {
        return $this->belongsTo(FamilyMember::class, 'mother_id');
    }

    public function spouse()
    {
        return $this->belongsTo(FamilyMember::class, 'spouse_id');
    }
    

    public function children()
    {
        return $this->hasMany(FamilyMember::class, 'father_id');
    }
}
