
@if ( \Session::has('danger') )
<div class="bg-red-500 text-center py-2 lg:px-2 text-white">
    <div class="p-2 bg-red-700 items-center leading-none lg:rounded-full flex lg:inline-flex" role="alert">
        <span class="flex rounded-full bg-danger-500 uppercase px-2 py-1 text-base font-bold mr-3">
            <svg class="full-current fa pr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><path d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm80 168c17.7 0 32 14.3 32 32s-14.3 32-32 32-32-14.3-32-32 14.3-32 32-32zm-160 0c17.7 0 32 14.3 32 32s-14.3 32-32 32-32-14.3-32-32 14.3-32 32-32zm170.2 218.2C315.8 367.4 282.9 352 248 352s-67.8 15.4-90.2 42.2c-13.5 16.3-38.1-4.2-24.6-20.5C161.7 339.6 203.6 320 248 320s86.3 19.6 114.7 53.8c13.6 16.2-11 36.7-24.5 20.4z"/></svg> Lo siento
        </span>
        <span class="font-semibold mr-2 text-left flex-auto">{{ \Session::get('danger') }}</span>
    </div>
</div>
@endif
@if ( \Session::has('message') )
<div class="bg-green-500 text-center py-2 lg:px-2 text-white">
    <div class="p-2 bg-green-700 items-center leading-none lg:rounded-full flex lg:inline-flex" role="alert">
        <span class="flex rounded-full bg-green-500 uppercase px-2 py-1 text-base font-bold mr-3">
            <svg class="fill-current fa pr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"/></svg> Bien
        </span>
        <span class="font-semibold mr-2 text-left flex-auto">{{ \Session::get('message') }}</span>
    </div>
</div>
@endif