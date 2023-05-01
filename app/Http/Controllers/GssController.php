<?php

namespace App\Http\Controllers;

use App\Models\Gss;
use Illuminate\Http\Request;

class GssController extends Controller
{
    public function sgs()
    {
        $gss = Gss::all();
        return view('sgs', compact('gss'));
    }

    public function sgsCourses()
    {
        $user = auth()->user();

        $selectedCourses = [];
        $regCourses = [];

        if ($user->level == 1) {
            $gss = Gss::where('level', 1)->get();
        } else if ($user->level == 3) {
            $gss = Gss::where('level', 3)->get();
        }
        else {
            $myGss = $user->gss;

            foreach ($myGss as $gs) {
                if($gs->pivot->score < 39 && $gs->pivot->score != 0){                
                $gs['type'] = 'co';
                // Add to selected courses
                array_push($selectedCourses, $gs);
                }
            }
            $gss = $selectedCourses;
        }

        $regCourses = $user->gss->where('level', $user->level);

        return view('sgscourses', compact('gss', 'regCourses'));
    }

    public function sgsFees(){
        return view('sgsfees');
    }

    public function sgsResults(){
        
        $user = auth()->user();
        $courses = $user->gss;

        $selectedCourses = [];

        foreach ($courses as $course) {

            if ($course->pivot->level < $user->level) {
                array_push($selectedCourses, $course);
            }
        }
        $courses = $selectedCourses;
        return view('sgsresults', compact('courses'));
    
    }

}
