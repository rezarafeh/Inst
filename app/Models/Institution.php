<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model {
    protected $fillable = ['name', 'region', 'country'];
    public function students() {
        return $this->hasMany(Student::class); // This is an example of a relationship - an institution can have many students
    }
    protected $appends = ['students_count']; // The value must match the name between the get and 
                                             // Attribute keywords, and separated by an underscore. Note:
                                             // It is case-sensitive.
                                             
        
    public function getStudentsCountAttribute() {
        return $this->students()->count(); // Get the number of students per institution
    }
}