<div class="ui modal small edit">
    <div class="header">{{ __("Edition des rôles") }}</div>
    <div class="content">
    <form id="edit_role_form" action="{{ url('users/roles/update') }}" class="ui form" method="post" accept-charset="utf-8">
        @csrf
        <div class="field">
            <label>{{ __("Intitulé/Nom du rôle") }}</label>
            <input class="uppercase" name="role_name" value="" type="text">
        </div>
        <div class="field">
            <label>{{ __("Statut") }}</label>
            <select name="state" class="ui dropdown state uppercase">
                <option value="Activé">{{ __("Activé") }}</option>
                <option value="Désactivé">{{ __("Désactivé") }}</option>
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
        <input type="hidden" value="" name="id" class="" readonly="">
        <button class="ui positive small button" type="submit" name="submit"><i class="ui checkmark icon"></i> {{ __("Valider") }}</button>
        <button class="ui grey cancel small button" type="button"><i class="ui times icon"></i> {{ __("Annuler") }}</button>
    </div>
    </form>  
</div>
