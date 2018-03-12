<span class="uk-badge
    @if($slot == 'active' || $slot == 'extended') uk-badge-success
    @elseif($slot == 'pending' || $slot == 'expired') uk-badge-default
    @elseif($slot == 'suspended') uk-badge-warning
    @elseif($slot == 'terminated') uk-badge-danger
    @else uk-badge-primary
    @endif">
    {{ strtoupper($slot) }}
</span>
