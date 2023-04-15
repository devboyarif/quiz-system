<?php

namespace App\Models;

use App\Models\QuestionOption;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'question_text',
        'code_snippet',
        'answer_explanation',
        'more_info_link',
    ];

    public function questionOptions(): HasMany
    {
        return $this->hasMany(QuestionOption::class)->inRandomOrder();
    }
}
