@if(session('success'))
    <div class="flash-success" id="hideMe" role="alert">
        {{ session('success') }}
    </div>
@endif

@if(session('danger'))
    <div class="flash-fail" id="hideMe" role="alert">
        {{ session('danger') }}
    </div>
@endif
