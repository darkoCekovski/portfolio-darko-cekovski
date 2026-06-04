{{-- Add this snippet just before the closing </div> of the skills-page to auto-open modal when visiting /skill/{slug} directly --}}
@if($openSlug)
<script>
document.addEventListener('DOMContentLoaded', () => {
    setTimeout(() => {
        window.dispatchEvent(new CustomEvent('open-skill-modal', { detail: { slug: '{{ $openSlug }}' } }));
    }, 200);
});
</script>
@endif
