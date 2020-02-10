<div class="max-w-sm w-full w-1/1 lg:w-1/4 py-3 px-3">
  <div class="card skilled {{ $skill->slug }} pt-4">
    <div class="overlay"></div>
    <a href="{{ route('skill', $skill->slug) }}" class="circle text-white" title="EXPLORAR CURSOS">
      {!! $skill->icon !!}
    </a>
    <a class="title font-serif uppercase" href="{{ route('skill', $skill->slug) }}" title="EXPLORAR CURSOS">{{ $skill->name }}</a>
    <div class="flex flex-wrap w-full py-4 description">
      <div class="flex w-1/2 inline-flex justify-center items-center text-sm font-serif">
        <svg class="h-4 w-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M542.22 32.05c-54.8 3.11-163.72 14.43-230.96 55.59-4.64 2.84-7.27 7.89-7.27 13.17v363.87c0 11.55 12.63 18.85 23.28 13.49 69.18-34.82 169.23-44.32 218.7-46.92 16.89-.89 30.02-14.43 30.02-30.66V62.75c.01-17.71-15.35-31.74-33.77-30.7zM264.73 87.64C197.5 46.48 88.58 35.17 33.78 32.05 15.36 31.01 0 45.04 0 62.75V400.6c0 16.24 13.13 29.78 30.02 30.66 49.49 2.6 149.59 12.11 218.77 46.95 10.62 5.35 23.21-1.94 23.21-13.46V100.63c0-5.29-2.62-10.14-7.27-12.99z"/></svg>
        @php  $amount = skill_courses($skill) @endphp
        <p class="text">{{ $amount > 1 || $amount < 1 ? $amount . ' Cursos' : $amount . ' Curso' }}</p>
      </div>
      <div class="flex w-1/2 inline-flex justify-center items-center text-sm text-gray-600 font-serif">
        <svg class="h-4 w-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm57.1 350.1L224.9 294c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h48c6.6 0 12 5.4 12 12v137.7l63.5 46.2c5.4 3.9 6.5 11.4 2.6 16.8l-28.2 38.8c-3.9 5.3-11.4 6.5-16.8 2.6z"/></svg>
        <p class="text">{{ skill_time($skill) }}</ṕ>
      </div>
    </div>
  </div>
</div>