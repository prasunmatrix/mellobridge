<feed xmlns="https://bernays.com/">
    @foreach ($pressreleaseListing as $post)  
    @endphp
    <post>
        <headline>{{ $post->headline }}</headline>
    </post>
    @endforeach
</feed>