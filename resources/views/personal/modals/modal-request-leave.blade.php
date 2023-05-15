<div class="ui modal medium add">
    <div class="header">{{ __("Demande Absence/Congé") }}</div>
    <div class="content">
        <form id="request_personal_leave_form" action="{{ url('personal/leaves/request') }}" class="ui form" method="post" accept-charset="utf-8">
        @csrf
        <div class="field">
            <label>{{ __("Type Demande") }}</label>
            <select name="type" class="ui dropdown uppercase">
                <option value="">Choisir type</option>
                <option value="Congé">Demande de congé</option>
                <option value="Permission">Permission d'absence</option>
            </select>
        </div>
        <div class="two fields">
            <div class="field">
                <label for="">{{ __("Date Départ") }}</label>
                <input id="leaveto" type="text" placeholder="Du" name="leaveto" class="airdatepicker underpercase" />
            </div>
            <div class="field">
                <label for="">{{ __("Date Retour") }}</label>
                <input id="returndate" type="text" placeholder="Au" name="returndate" class="airdatepicker underpercase" />
            </div>
        </div> 
        <div class="field">
            <label>{{ __("Motifs/Raisons") }}</label>
            <textarea class="uppercase" rows="5" name="reason" value=""></textarea>
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
    </form>
    </div>
    <div class="actions">
        <input type="hidden" name="typeid" value="">
        <button class="ui positive small button" type="submit" name="submit"><i class="ui checkmark icon"></i> {{ __("Envoyer Demande ") }}</button>
        <button class="ui grey small button cancel" type="button"><i class="ui times icon"></i> {{ __("Annuler") }}</button>
    </div>
</div>
