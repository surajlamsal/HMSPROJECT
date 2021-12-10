@if($errors->any())
<div class="bg-red-100 text-red-800 my-2 border border-red-300 px-6 py-4 rounded">
    {{ $errors->first() }}
</div>
@endif


@if(session('error'))
<div class="bg-red-100 text-red-800 my-2 border border-red-300 px-6 py-4 rounded">
    {{ session('error') }}
</div>
@endif

@if(session('success'))
<div class="bg-green-100 text-green-800 my-2 border border-green-300 px-6 py-4 rounded">
    {{ session('success') }}
</div>
@endif