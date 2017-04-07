<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AchievementAndDisplinaryAction extends Controller
{
    public function displayAthleteInfo()
    {
        return view('sport_organization_user.athlete_information.athlete_achievement.display_athlete_info');
    }
}
