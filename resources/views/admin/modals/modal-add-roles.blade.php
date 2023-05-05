<div class="ui add modal small">
    <div class="header">{{ __("Ajouter Rôle") }}</div>
    <div class="content">
    <form id="add_role_form" action="{{ url('users/roles/add') }}" class="ui form" method="post" accept-charset="utf-8">
        @csrf
        <div class="field">
            <label>{{ __("Initulé/Nom du Rôle") }}</label>
            <input class="uppercase" name="role_name" value="" type="text">
        </div>
        <div class="field">
            <label>{{ __("Statut") }}</label>
            <select name="state" class="ui dropdown uppercase">
                <option value="">Choisir Statut</option>
                <option value="Active">Activé</option>
                <option value="Disabled">Désactivé</option>
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
        <button class="ui positive small button" type="submit" name="submit"><i class="ui checkmark icon"></i> {{ __("Enregistrer") }}</button>
        <button class="ui grey cancel small button" type="button"><i class="ui times icon"></i> {{ __("Fermer") }}</button>
    </div>
    </form>  
</div>
