@if(session('success'))
    <div class="p-2" style="color: #9ccc65; border: 1px solid #9ccc65;">
        <strong>{{{session('success')}}}</strong>
    </div>
@endif
