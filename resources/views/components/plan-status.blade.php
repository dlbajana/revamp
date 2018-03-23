<span class="uk-badge
    @if($slot == 'active') uk-badge-success
    @elseif($slot == 'inactive') uk-badge-danger
    @else uk-badge-primary
    @endif">
    {{ strtoupper($slot) }}
</span>
