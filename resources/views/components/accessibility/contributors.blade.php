@if ($contributors)
    <div>
        <div>
            <h3>Want to see who contributed this for you?</h3>
        </div>
        <div style="margin-bottom: 10px;">A special thanks goes to our contributors:</div>
        <div>
            <div>
                @foreach($contributors as $contributor)
                    <div style="display: inline-flex; align-items: center; gap: 10px; margin-right: 10px;">
                        <figure style="max-width: 60px; margin: 0;">
                            <img
                                src="https://github.com/{{$contributor}}.png"
                                alt="{{$contributor}}"
                                width="60"
                                height="60"
                                style="border-radius: 50%; display: block;"
                            >
                        </figure>
                        <a href="https://github.com/{{$contributor}}" target="_blank" rel="noopener noreferrer" style="text-decoration: none; color: inherit;">{{$contributor}}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
