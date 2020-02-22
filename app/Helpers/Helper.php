<?php
namespace App\Helpers;

use Illuminate\Support\Collection;
use App\Entities\Learn\Course;

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
    $lessons = 0;

    foreach ( $skill->courses as $course )  {
      $lessons += $course->lessons->count();
    }

    return $lessons;
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

  public function totalLessons () {
    $courses = Course::with('lessons')->where('is_publish', 1)->get();
    $lessons = 0;
    
    foreach ( $courses as $course ) {
      $lessons += $course->lessons->where('is_publish', 1)->count();
    }

    return $lessons;
  }

  public function totalTime () {
    $courses = Course::with('lessons')->where('is_publish', 1)->get();
    $seconds = 0;

    foreach ( $courses as $course )  {
      foreach ( $course->lessons->where('is_publish', 1) as $lesson ) {
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

  public function formatDateText ($timestamp) {
		return $this->month($timestamp->month, 3).' '.$timestamp->day.', '.$timestamp->year;
  }
  
  public function month ($number, $char = 0) {
    $month = 'Enero';
    switch ( $number ) {
      case 1: $month = 'Enero';
      case 2: $month = 'Febrero';
      case 3: $month = 'Marzo';
      case 4: $month = 'Abril';
      case 5: $month = 'Mayo';
      case 6: $month = 'Junio';
      case 7: $month = 'Julio';
      case 8: $month = 'Agosto';
      case 9: $month = 'Septiembre';
      case 10: $month = 'Octubre';
      case 11: $month = 'Noviembre';
      case 12: $month = 'Diciembre';
      default: $month = 'Enero';
    }

    return $char == 0 ? $month : substr($month, 0, $char);
  }

  public function excerpt ($content) {
    $content = \Illuminate\Mail\Markdown::parse($content);

    return strip_tags(substr($content, 0, 180)).'...';
  }

  public function socialShare ( $type, $slug, $title) {
    $url = url('/').'/'.$slug;

    switch ( $type ) {
      case 'facebook': return 'https://www.facebook.com/sharer/sharer.php?u='.$url.'&t='.$title;
      case 'twitter': return 'https://twitter.com/intent/tweet?url='.$url.'&text='.$title;
      case 'telegram': return 'https://t.me/share/url?url='.$url.'&text='.$title;
      default: return 'https://www.facebook.com/sharer/sharer.php?u='.$url.'&t='.$title;
    }
  }

  public function firstName ($name) {
    $name = explode(' ', $name);
    return $name[0];
  }

  public function gravatar ($email) {
    return 'https://www.gravatar.com/avatar/'.md5( strtolower( trim( $email ) ) ).'?s=200';
  }


  public function getCodeUUID($a, $b, $c) {
    return hashid_encode($a).'-'.hashid_encode($b).'-'.hashid_encode($c);
  }
}