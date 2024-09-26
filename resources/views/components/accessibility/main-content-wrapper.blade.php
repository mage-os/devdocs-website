<div id="main-content">
    @if ($communityNote)
    <div class="gradient-box py-8 px-5 gap-3 flex flex-col mb-10">
        <p style="margin-bottom: 0!important;">
            <span class="block font-bold">📝 Community Note</span>
            The content on this page was generated with the assistance of AI and is pending a
            human review. While we've done our best to ensure accuracy, there may be
            discrepancies or areas that could be improved.
        </p>
    </div>
    @endif
    {{ $slot }}
</div>
