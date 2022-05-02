<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\User;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use Chartisan\PHP\Chartisan;
use Illuminate\Http\Request;
use ConsoleTVs\Charts\BaseChart;

class MyChart extends BaseChart
{
    public ?string $name = 'my_charts';
    public ?string $routeName = 'my_charts';
    public ?string $prefix = 'my_charts';
    public ?array $middlewares = ['auth:admin'];
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $user= User::all()->count();
        $grade= Grade::all()->count();
        $teacher= Teacher::all()->count();
        $subject= Subject::all()->count();
        return Chartisan::build()
            ->labels(['Student',  'Teacher','Subject', 'Grades'])
            ->dataset('', [$user, $subject, $teacher, $grade]);
            // ->dataset('Subject', [$subject]);
    }
}
