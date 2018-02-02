<?php

namespace Klikskola\Http\Controllers;

use Klikskola\Lesson;
use Klikskola\Series;
use Illuminate\Http\Request;

class WatchSeriesController extends Controller
{
    /**
     * Watch a series
     *
     * @param Klikskola\Series $series
     * @return redirect
     */
    public function index(Series $series) {
        $user = auth()->user();

        if($user->hasStartedSeries($series)) {
            return redirect()->route('series.watch', [   
                    'series' => $series->slug, 
                    'lesson' => $user->getNextLessonToWatch($series)
            ]);
        }
        
        return redirect()->route('series.watch', [   
                'series' => $series->slug, 
                'lesson' => $series->lessons->first()->id 
        ]);
    }
    
    /**
     * Show a lesson page
     *
     * @param Klikskola\Series $series
     * @param Klikskola\Lesson $lesson
     * @return view
     */
    public function showLesson(Series $series, Lesson $lesson) {
        if ($lesson->premium && !auth()->user()->subscribed('monthly') && !auth()->user()->subscribed('yearly')) {
            return redirect('subscribe');
        } 

        return view('watch', [
            'series' => $series,
            'lesson' => $lesson
        ]);
    }

    /**
     * Complete a lesson via ajax
     *
     * @param Klikskola\Lesson $lesson
     * @return json response
     */
    public function completeLesson(Lesson $lesson) {
        auth()->user()->completeLesson($lesson);
        return response()->json([
            'status' => 'ok'
        ]);
    }
}
