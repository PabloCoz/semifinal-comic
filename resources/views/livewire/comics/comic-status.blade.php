<div>
    <span id="arriba" class="hidden px-5 py-2 bg-black rounded-lg fixed bottom-5 right-5 cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6 text-white font-bold">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 10.5L12 3m0 0l7.5 7.5M12 3v18" />
        </svg>
        u
    </span>

    <div class="max-w-4xl mx-auto">
        <h1 class="font-luckiest text-2xl text-center mt-3">
            {{ $chapter->name }}
        </h1>
        <div class="mt-3 bg-white w-full pb-2">
            @foreach ($chapter->images as $images)
                <img src="{{ Storage::url($images->url) }}" alt="">
            @endforeach

        </div>
    </div>
    @push('up')
        <script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>
        <script>
            $(document).ready(function() {

                $('#arriba').click(function() {
                    $('body, html').animate({
                        scrollTop: '0px'
                    }, 300);
                });

                $(window).scroll(function() {
                    if ($(this).scrollTop() > 0) {
                        $('#arriba').slideDown(300);
                    } else {
                        $('#arriba').slideUp(300);
                    }
                });

            });
        </script>
    @endpush
</div>
