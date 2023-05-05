<div class="ui modal add medium">
    <div class="header">{{ __("Ajouter nouvel horaire") }}</div>
    <div class="content">
        <form id="add_schedule_form" action="{{ url('schedules/add') }}" class="ui form" method="post" accept-charset="utf-8">
            @csrf
            <div class="field">
                <label>{{ __('Nom de l\'Employé') }}</label>
                <select class="ui search dropdown getid uppercase" name="employee">
                    <option value="">Choisir l'Employé</option>
                    @isset($employee)
                        @foreach ($employee as $data)
                            <option value="{{ $data->lastname }} {{ $data->firstname }}" data-id="{{ $data->id }}">{{ $data->lastname }} {{ $data->firstname }}</option>
                        @endforeach
                    @endisset
                </select>
            </div>
            <div class="two fields">
                <div class="field">
                    <label for="">{{ __('Heure d\'Arrivée') }}</label>
                    <input type="text" placeholder="08:30:00" name="intime" class="jtimepicker" />
                </div>
                <div class="field">
                    <label for="">{{ __('Heure de Départ') }}</label>
                    <input type="text" placeholder="17:30:00" name="outime" class="jtimepicker" />
                </div>
            </div>
            <div class="field">
                <label for="">{{ __('De') }}</label>
                <input type="text" placeholder="Date Début" name="datefrom" id="datefrom" class="airdatepicker" />
            </div>
            <div class="field">
                <label for="">{{ __('A') }}</label>
                <input type="text" placeholder="Date Fin" name="dateto" id="dateto" class="airdatepicker" />
            </div>
            <div class="eight wide field">
                <label for="">{{ __('Heure Totale') }}</label>
                <input type="number" placeholder="0" name="hours" />
            </div>
           <div class="grouped fields field">
                <label>{{ __('Choix des jours de Repos') }}</label>
                <div class="field">
                    <div class="ui checkbox sunday">
                        <input type="checkbox" name="restday[]" value="Dimanche">
                        <label>{{ __('Dimanche') }}</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox ">
                        <input type="checkbox" name="restday[]" value="Lundi">
                        <label>{{ __('Lundi') }}</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox ">
                        <input type="checkbox" name="restday[]" value="Mardi">
                        <label>{{ __('Mardi') }}</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox ">
                        <input type="checkbox" name="restday[]" value="Mercredi">
                        <label>{{ __('Mercredi') }}</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox ">
                        <input type="checkbox" name="restday[]" value="Jeudi">
                        <label>{{ __('Jeudi') }}</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui checkbox ">
                        <input type="checkbox" name="restday[]" value="Vendredi">
                        <label>{{ __('Vendredi') }}</label>
                    </div>
                </div>
                <div class="field" style="padding:0">
                    <div class="ui checkbox saturday">
                        <input type="checkbox" name="restday[]" value="Samedi">
                        <label>{{ __('Samedi') }}</label>
                    </div>
                </div>
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
            <input type="hidden" name="id" value="">
            <button class="ui positive small button" type="submit" name="submit"><i class="ui checkmark icon"></i> {{ __('Enregistrer') }}</button>
            <button class="ui grey small button cancel" type="button"><i class="ui times icon"></i> {{ __('Annuler') }}</button>
        </div>
        </form>  
</div>
