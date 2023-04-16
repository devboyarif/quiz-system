<?php

use App\Models\Quiz;
use App\Models\Question;
use App\Http\Livewire\Quiz\QuizForm;
use App\Http\Livewire\Quiz\QuizList;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\Front\Leaderboard;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Questions\QuestionForm;
use App\Http\Livewire\Questions\QuestionList;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return DB::table('question_quiz')->get();


    $quiz = Quiz::find(1);
    return Question::query()
        ->inRandomOrder()
        // ->whereHas('quizzes',function($q){
        //     $q->where('quiz_id',1);
        // })
        ->whereRelation('quizzes','quiz_id', $quiz->id)
        ->with('quizzes','questionOptions')
        ->get();
    // return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('quiz/{quiz}/{slug?}', [HomeController::class, 'show'])->name('quiz.show');

Route::get('results', [ResultController::class, 'index'])->name('results.index');
Route::get('results/{test}', [ResultController::class, 'show'])->name('results.show');
Route::get('leaderboard', Leaderboard::class)->name('leaderboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('isAdmin')->group(function () {
        Route::get('questions', QuestionList::class)->name('questions');
        Route::get('questions/create', QuestionForm::class)->name('questions.create');
        Route::get('questions/{question}', QuestionForm::class)->name('questions.edit');

        Route::get('quizzes', QuizList::class)->name('quizzes');
        Route::get('quizzes/create', QuizForm::class)->name('quiz.create');
        Route::get('quizzes/{quiz}', QuizForm::class)->name('quiz.edit');
    });
});

require __DIR__.'/auth.php';
