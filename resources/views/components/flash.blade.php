@if (session()->has('success'))
<div 
    x-data="{show:true}" x-init="setTimeout(() => show = false, 3000)" x-show='show' class="fixed bottom-5 border right-5 bg-blue-500 text-white shadow-xl py-2 px-4 rounded-xl">
    <p>{{session('success')}}</p>
</div>
@endif