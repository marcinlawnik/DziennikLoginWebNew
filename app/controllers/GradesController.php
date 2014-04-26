<?php

class GradesController extends \BaseController {


    public function getIndex()
    {
        // Show all grades belonging to user
        $grades = User::find(Auth::user()->id)->grades;
        return View::make('grades.index')->withGrades($grades);
    }

    public function getShow($id)
    {
        // Show detailed data about chosen grade
        // TODO:check if grade belongs to user
        $validator = Validator::make(
            array('id' => $id),
            array('id' => 'required|numeric')
        );
        if($validator->passes())
        {
            $grade = User::find(Auth::user()->id)->grades()->where('id', '=', $id)->first();
            if($grade == ''){
                return Redirect::to('grades')->with('message', Lang::get('messages.gradenotfound'));
            }
            return View::make('grades.show')->withGrade($grade);
        } else {
            return Redirect::to('grades')->with('message', Lang::get('messages.gradenotfound'));
        }


    }

}