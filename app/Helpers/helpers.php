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

if (! function_exists ('total_time') ) {
  function total_time () {
    return app(\App\Helpers\Helper::class)->totalTime();
  }
}

if (! function_exists ('total_lessons') ) {
  function total_lessons () {
    return app(\App\Helpers\Helper::class)->totalLessons();
  }
}

if (! function_exists ('to_seconds') ) {
  function to_seconds ($time) {
    return app(\App\Helpers\Helper::class)->toSeconds($time);
  }
}

if (! function_exists ('to_month') ) {
  function to_month ($number, $char = 0) {
    return app(\App\Helpers\Helper::class)->month($number, $char);
  }
}


if (! function_exists ('to_time') ) {
  function to_time ($time_seconds) {
    return app(\App\Helpers\Helper::class)->toTime($time_seconds);
  }
}

if (! function_exists ('format_date_post') ) {
  function format_date_post ($timestamp) {
    return app(\App\Helpers\Helper::class)->formatDatePost($timestamp);
  }
}

if (! function_exists ('date_text') ) {
  function date_text ($timestamp) {
    return app(\App\Helpers\Helper::class)->formatDateText($timestamp);
  }
}

if (! function_exists ('excerpt') ) {
  function excerpt ($content) {
    return app(\App\Helpers\Helper::class)->excerpt($content);
  }
}

if (! function_exists ('social_share') ) {
  function social_share ($type, $slug, $title) {
    return app(\App\Helpers\Helper::class)->socialShare($type, $slug, $title);
  }
}

if (! function_exists ('first_name') ) {
  function first_name ($name) {
    return app(\App\Helpers\Helper::class)->firstName($name);
  }
}

if (! function_exists ('gravatar') ) {
  function gravatar ($email) {
    return app(\App\Helpers\Helper::class)->gravatar($email);
  }
}