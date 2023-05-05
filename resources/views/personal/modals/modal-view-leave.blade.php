<div class="ui modal medium view">
    <div class="header">{{ __("Mes congés") }}</div>
    <div class="content">
        <form action="" class="ui form" method="post" accept-charset="utf-8">
        <div class="field">
            <label>{{ __("Employé") }}</label>
            <input type="text" class="employee uppercase readonly" value="" readonly="">
        </div>
        <div class="field">
            <label>{{ __("Type de congé") }}</label>
            <input type="text" class="leavetype uppercase readonly" value="" readonly="">
        </div>
        <div class="two fields">
            <div class="field">
                <label for="">{{ __("Date de Soumission") }}</label>
                <input type="text" class="leavefrom readonly" value="" readonly="" />
            </div>
            <div class="field">
                <label for="">{{ __("Date Départ") }}</label>
                <input type="text" class="leaveto readonly" value="" readonly=""/>
            </div>
        </div>
        <div class="field">
            <label for="">{{ __("Date Arrivée") }}</label>
            <input type="text" class="returndate readonly" value="" readonly=""/>
        </div>
        <div class="field">
            <label>{{ __("Raison/Motif") }}</label>
            <textarea rows="5" class="reason uppercase readonly" value="" readonly=""></textarea>
        </div>
        <div class="field">
            <label for="">{{ __("Décision") }}</label>
            <input type="text" class="status readonly" value="" readonly=""/>
        </div>
    </div>
    <div class="actions">
        <button class="ui grey small button cancel" type="button"><i class="ui times icon"></i> {{ __("Fermer") }}</button>
    </div>
    </form>  
</div>
    