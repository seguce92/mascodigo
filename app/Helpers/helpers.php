<?php

if (! function_exists ('skill_courses') ) {
  function skill_courses($skill) {
    return app(\App\Helpers\Helper::class)->skillCourses($skill);
  }
}

if (! function_exists ('skill_lessons') ) {
  function skill_lessons ($skill) {
    return app(\App\Helpers\Helper::class)->skillLessons($skill);
  }
}

if (! function_exists ('skill_time') ) {
  function skill_time ($skill) {
    return app(\App\Helpers\Helper::class)->skillTime($skill);
  }
}

if (! function_exists ('course_time') ) {
  function course_time ($course) {
    return app(\App\Helpers\Helper::class)->courseTime($course);
  }
}

if (! function_exists ('to_seconds') ) {
  function to_seconds ($time) {
    return app(\App\Helpers\Helper::class)->toSeconds($time);
  }
}

if (! function_exists ('to_time') ) {
  function to_time ($time_seconds) {
    return app(\App\Helpers\Helper::class)->toTime($time_seconds);
  }
}
