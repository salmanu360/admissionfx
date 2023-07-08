@php
    $detail = json_decode($activity->properties, TRUE);

//dd($detail['attributes']);
//dd($detail['old']);

// @if(isset($detail['old']))
                //<h4>Old data</h4>
            //@endif
              //  @if(isset($detail['attributes']))
                //<h4>New data</h4>
            //@endif
@endphp


<div class="modal-header modal-colored-header bg-info text-white">
    <div class="row booking-modal-row">
        <div class="head">
            @if(isset($detail['old']))
                <h4>Old data</h4>
            @elseif(isset($detail['attributes']))
                <h4>New data</h4>
            @endif
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body custom-modal-body">
    <div class="row activity-log">
        <div class="log">
            <div class="body">
                @if(isset($detail['old']))
                    @php $oldParams  = $detail['old']; @endphp
                    @php $newParams  = $detail['attributes']; @endphp
                    @php $keys  = array_keys($oldParams); @endphp
                    @for($i = 0; $i < count($keys); $i++)
                        <div class="log-row">
                            <div class="old">
                        <span class="log-key">
                            {{ $keys[$i] }}
                        </span>
                                <span class="log-value">
                            {{ $oldParams[$keys[$i]] }}
                        </span>
                            </div>
                            <div
                                    class="new {{ $oldParams[$keys[$i]] == $newParams[$keys[$i]] ? 'same' : 'different' }}">
                        <span class="log-key">
                            {{ $keys[$i] }}
                        </span>
                                <span class="log-value">
                            {{ $newParams[$keys[$i]] }}
                        </span>
                            </div>
                        </div>
                    @endfor
                @elseif(isset($detail['attributes']))
                    @php $newParams  = $detail['attributes']; @endphp
                    @php $keys  = array_keys($newParams); @endphp
                    @for($i = 0; $i < count($keys); $i++)
                        <div class="log-row">
                            <div class="new">
                        <span class="log-key">
                            {{ $keys[$i] }}
                        </span>
                                <span class="log-value">
                            {{ $newParams[$keys[$i]] }}
                        </span>
                            </div>
                        </div>
                    @endfor
                @endif
            </div>
        </div>
    </div>
</div>


