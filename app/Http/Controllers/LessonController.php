<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\LessonExercise;
use App\Models\LessonUsefulLink;
use App\Models\LessonVideo;
use App\Models\LessonVocabulary;
use App\Traits\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LessonController extends Controller
{
    use UploadFile;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessons = Lesson::all();

        return view('app.lessons.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.lessons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id();

        DB::beginTransaction();
        try {
            $lesson = Lesson::create($data);

            $this->createLessonVideo($request, $lesson);

            $this->createLessonExercise($request, $lesson);

            $this->createLessonVocabulary($request, $lesson);

            $this->createLessonUseful($request, $lesson);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withInput()->with([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }

        return redirect()->route('lessons.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        //
    }

    public function createLessonUseful(Request $request, Lesson $lesson)
    {
        if ($request->useful_link || $request->useful_file) {
            $model = '\App\Models\LessonUsefulLink';

            $usefulLink = LessonUsefulLink::create([
                'lesson_id' => $lesson->id,
                'link' => $request->useful_link,
            ]);

//            dd($usefulLink);

            // upload files
            if($request->hasFile('useful_file')) $res = $this->upload($model, $usefulLink->id, $request->file('useful_file'));
            if(isset($res['error'])) return back()->with([
                'success' => false,
                'message' => $res['error']
            ]);
        }
    }

    public function createLessonVideo(Request $request, Lesson $lesson)
    {
        if ($request->video_link) {
            LessonVideo::create([
                'lesson_id' => $lesson->id,
                'link' => $request->video_link
            ]);
        }
    }

    public function createLessonExercise(Request $request, Lesson $lesson)
    {
        if ($request->exercise_link) {
            LessonExercise::create([
                'lesson_id' => $lesson->id,
                'link' => $request->exercise_link
            ]);
        }
    }

    public function createLessonVocabulary(Request $request, Lesson $lesson)
    {
        if ($request->vocabulary_link || $request->vocabularies) {
            LessonVocabulary::create([
                'lesson_id' => $lesson->id,
                'link' => $request->vocabulary_link,
                'vocabularies' => $request->vocabularies
            ]);
        }
    }
}
