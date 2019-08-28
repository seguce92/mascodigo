<?php
namespace App\Helpers;

use Illuminate\Support\Collection;

class Helper {

  protected $html;

  public function __construct() {
    $this->html = app(\App\Helpers\Html\HtmlBuilder::class);
  }

  public function skillCourses ($skill) {
    $total = $skill->courses->count();
    return $total;
  }

  public function skillLessons ($skill) {
    return 0;
  }

  public function skillTime ($skill) {
    $seconds = 0;

    foreach ( $skill->courses as $course )  {
      foreach ( $course->lessons as $lesson ) {
        $seconds += $this->toSeconds($lesson->duration);
      }
    }

    return $this->toTime($seconds);
  }

  public function courseTime ($course) {
    $seconds = 0;

    foreach ( $course->lessons as $lesson ) {
      $seconds += $this->toSeconds($lesson->duration);
    }

    return $this->toTime($seconds);
  }

  public function toSeconds ($time) {
		list($hours, $minutes, $seconds) = explode(':', $time);

		return ($hours * 3600) + ($minutes * 60) + $seconds;
	}

	public function toTime ($time_seconds) {
		$hours = floor($time_seconds / 3600);
		$minutes = floor( ($time_seconds - ($hours * 3600) ) / 60);
		$seconds = $time_seconds - ($hours * 3600) - ($minutes * 60);

		if ( $hours < 10 ) $hours = '0' . $hours;
		if ( $minutes < 10 ) $minutes = '0' . $minutes;
		if ( $seconds < 10 ) $seconds = '0' . $seconds;

		return $hours . ':' . $minutes . ':' . $seconds;
  }
  
  public function formatDatePost ($timestamp) {
		return $this->month($timestamp->month).' '.$timestamp->day.', '.$timestamp->year;
  }
  
  private function month ($number) {
    switch ( $number ) {
      case 1: return 'Enero';
      case 2: return 'Febrero';
      case 3: return 'Marzo';
      case 4: return 'Abril';
      case 5: return 'Mayo';
      case 6: return 'Junio';
      case 7: return 'Julio';
      case 8: return 'Agosto';
      case 9: return 'Septiembre';
      case 10: return 'Octubre';
      case 11: return 'Noviembre';
      case 12: return 'Diciembre';
      default: return 'Enero';
    }
  }

  public function excerpt ($content) {
    $content = \Illuminate\Mail\Markdown::parse($content);

    return strip_tags(substr($content, 0, 180)).'...';
  }

}