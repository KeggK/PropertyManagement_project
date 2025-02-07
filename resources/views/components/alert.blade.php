@props(['success' => 'true'])
<div x-data="{show: true}" x-show="show" x-init="setTimeout(() => show = false, 6000)" @class([
    'flex items-center text-white border-green-300 bg-green-400 flex p-4 mb-4 w-[80%] md:w-1/3 fixed z-50 top-2 right-0' => $success,
    'flex items-center text-white  border-red-300 bg-red-400 flex p-4 mb-4 w-[80%] md:w-1/3 fixed z-50 top-2 right-0' => !$success,
]) role="alert">
    <svg class="flex-shrink-0 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
            clip-rule="evenodd"></path>
    </svg>
    <div class="ml-3 text-base italic">
        {{ $slot }}
    </div>
</div>