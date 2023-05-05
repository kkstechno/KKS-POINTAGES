<div class="ui modal medium add">
    <div class="header">{{ __("Ajouter un nouveau groupe de congés") }}</div>
    <div class="content">
        <form id="add_leavegroup_form" action="{{ url('fields/leavetype/leave-groups/add') }}" class="ui form" method="post" accept-charset="utf-8">
            @csrf
            <div class="field">
                <label>{{ __("Intitulé du privilège") }}</label>
                <input type="text" name="leavegroup" value="" class="uppercase" placeholder="Entre un nom">
            </div>
            <div class="field">
                <label>{{ __("Description") }}</label>
                <input type="text" name="description" value="" class="uppercase" placeholder="Enter Description for Leave Group">
            </div>
            <div class="field">
                <label>{{ __("Congés Octroyés") }}</label>
                <select class="ui search dropdown selection multiple uppercase" name="leaveprivileges[]" multiple="">
                    <option value="">Choisir Type de congé </option>
                    @isset($lt)
                        @foreach($lt as $leave)
                            <option value="{{ $leave->id }}">{{ $leave->leavetype }}</option>
                        @endforeach
                    @endisset
                </select>
            </div>
            <div class="field">
                <label>{{ __("Statut") }}</label>
                <select class="ui dropdown uppercase" name="status">
                    <option value="">Choisir Statut</option>
                    <option value="1">Activé</option>
                    <option value="0">Désactivé</option>
                </select>
            </div>
            <div class="field">
                <div class="ui error message">
                    <i class="close icon"></i>
                    <div class="header"></div>
                    <ul class="list">
                        <li class=""></li>
                    </ul>
                </div>
            </div>
    </div>
    <div class="actions">
        <button class="ui positive small button approve" type="submit" name="submit"><i class="ui checkmark icon"></i> {{ __("Valider") }}</button>
        <button class="ui grey small button cancel" type="button"><i class="ui times icon"></i> {{ __("Annuler") }}</button>
    </div>
    </form>
</div>