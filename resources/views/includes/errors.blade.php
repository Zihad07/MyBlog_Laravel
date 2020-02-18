
@if ($errors->any())


            @foreach ($errors->all() as $error)
                <div class="text-danger p-2 mb-1" style="border: 1px solid red;">
                    {{ $error }}
                </div>
            @endforeach

@endif


