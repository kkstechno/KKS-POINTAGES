<div class="ui modal medium add">
    <div class="header">{{ __("Nouveau pointage Employé") }}</div>
    <div class="content">
        <form id="add_attendance_form" action="{{ url('attendance/add-entry') }}" class="ui form add-attendance" method="post" accept-charset="utf-8">
        @csrf
        <div class="field">
            <label>{{ __("Employé") }}</label>
            <select class="ui search dropdown getref uppercase" name="name">
                <option value="">--Choisir--</option>
                @isset($employees)
                    @foreach ($employees as $data)
                    <option value="{{ $data->lastname }} {{ $data->firstname }}" data-ref="{{ $data->id }}">{{ $data->lastname }} {{ $data->firstname }}</option>
                    @endforeach
                @endisset
            </select>
        </div>
        <div class="field">
            <label for="">{{ __("Date") }}</label>
            <input class="airdatepicker" type="text" placeholder="" name="date" data-position="top right">
        </div>
        <div class="field">
            <label for="">{{ __("Heure d'Arrivée") }} <span class="help" style="color:red;">(*)</span></label>
            <input class="jtimepicker" type="text" placeholder="00:00:00" name="timein" value="" required>
        </div>
        <div class="field">
            <label for="">{{ __("Heure Départ") }} <span class="help" style="color:red;">(*)</span></label>
            <input class="jtimepicker" type="text" placeholder="00:00:00" name="timeout" value="" required>
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
        <input type="hidden" value="" name="ref">
        <button class="ui positive approve small button" type="submit" name="submit"><i class="ui checkmark icon"></i> {{ __("Enregistrer") }}</button>
        <button class="ui grey cancel small button" type="button"><i class="ui times icon"></i> {{ __("Annuler") }}</button>
    </div>
    </form>
</div>