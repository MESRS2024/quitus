<div class="justify-content-center">
    @foreach ($path as $media)
        @php($media->makePublic())
        <img class="img-circle img-md" src="{{ $media->getUrl() }}" alt="{{$media->basename}}"
             srcset="{{$media->getUrl()}}">
    @endforeach
</div>
