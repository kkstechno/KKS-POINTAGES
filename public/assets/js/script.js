
$('.dropdown').dropdown();
$('.ui.dropdown').dropdown();
$('.ui.checkbox').checkbox();
$('.ui.radio.checkbox').checkbox();
$('.ui.modal').modal();
$('.ui.basic.modal').modal();
$('.ui.add.modal').modal('attach events', '.btn-add', 'toggle');
$('.ui.edit.modal').modal('attach events', '.btn-edit', 'toggle');
$('.ui.modal.import').modal('attach events', '.btn-import', 'toggle');

/*
* Toggle sidebar on Menu button click
*/
$('#slidesidebar').on('click', function () {
    $('#sidebar').toggleClass('active');
    $('#body').toggleClass('active');
});

/*
* Semantic UI extension detect if form inputs are not empty and include notempty class
*/
$('input, textarea').focusout(function (event) {
    var notempty = $(this).val();
    if (notempty !== '') {
        $(this).addClass('notempty');
    }
});

/*
* Semantic UI extension on page load check form inputs if has a value, add notempty class when not empty
*/
$('input, textarea').each(function (index, el) {
    input = $(this).val();
    if (input !== '') {
        $(this).addClass('notempty');
    };
});

/*
* Semantic UI extension detect if form select dropdown are not empty and include notempty class
*/
$('.ui.dropdown.selection, .ui.search.dropdown').focusout(function (event) {
    var dd = $(this).find('select').val();
    var selected = $(this).find('.menu .item.active.selected').attr('data-value');
    if (dd !== '' && selected !== undefined || selected !== '' && selected !== undefined) {
        $(this).addClass('notempty');
    }
});

/*
* Semantic UI extension on page load check form select dropdown if has a value, add notempty class when not empty
*/
$('.ui.dropdown.selection, .ui.search.dropdown').each(function (index, el) {
    var dropdown = $(this).find('select').val();
    var selected = $(this).find('.menu .item.active.selected').attr('data-value');
    if (dropdown !== '' && selected !== undefined || selected !== '' && selected !== undefined) {
        $(this).addClass('notempty');
    }
});

/*
 * Hide form message
 */
$('.message .close').on('click', function () {
    $(this).closest('.message').transition('fade');
});

/*
 * Auto-hide sidebar on window resize if window size is small
 */
$(window).resize(function () {
    if ($(window).width() <= 768) {
        $('#sidebar, #body').addClass('active');
    }
});

/*
 * Prevent Semantic UI modal exit on submit button 
 */
$('.ui.modal.add,.ui.modal.edit').modal({
    onDeny: function () {
        return true;
    },
    onApprove: function () {
        return false;
    }
});

/*
 * Client-side form validation
 */
$('#add_employee_form, #edit_employee_form').form({
    fields: {
        firstname: {
            identifier: 'firstname',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez saisir votre prénom'
            }]
        },
        lastname: {
            identifier: 'lastname',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez entrer un nom de famille'
            }]
        },
        emailaddress: {
            identifier: 'emailaddress',
            rules: [{
                type: 'email',
                prompt: 'Entrez une adresse Email s\'il vous plaît'
            }]
        },
        idno: {
            identifier: 'idno',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez entrer un numéro ID'
            }]
        },
        employmentstatus: {
            identifier: 'employmentstatus',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez sélectionner un statut d\'emploi'
            }]
        },
    }
});

$('#edit_attendance_form').form({
    fields: {
        employee: {
            identifier: 'employee',
            rules: [{
                type: 'empty',
                prompt: '   Veuillez saisir un employé'
            }]
        },
        date: {
            identifier: 'date',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez saisir une date'
            }]
        },
        timein: {
            identifier: 'timein',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez saisir l\'heure d\'arrivée'
            }]
        },
        timeout: {
            identifier: 'timeout',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez saisir l\'heure de Départ'
            }]
        },
        reason: {
            identifier: 'reason',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez entrer le motif'
            }]
        },
    }
});

$('#add_schedule_form, #edit_schedule_form').form({
    fields: {
        employee: {
            identifier: 'employee',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez sélectionner un employé'
            }]
        },
        intime: {
            identifier: 'intime',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez entrer une heure de début'
            }]
        },
        outime: {
            identifier: 'outime',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez saisir une heure d\'arrêt'
            }]
        },
        datefrom: {
            identifier: 'datefrom',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez saisir une date de début'
            }]
        },
        dateto: {
            identifier: 'dateto',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez saisir une date de fin'
            }]
        },
        hours: {
            identifier: 'hours',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez saisir un nombre total d\'heures'
            }]
        },
    }
});

$('#edit_leave_form').form({
    fields: {
        status: {
            identifier: 'status',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez sélectionner un statut'
            }]
        },
    }
});

$('#add_user_form').form({
    fields: {
        name: {
            identifier: 'name',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez sélectionner un employé'
            }]
        },
        email: {
            identifier: 'email',
            rules: [{
                type: 'email',
                prompt: 'Entrez une adresse mail s\'il vous plaît'
            }]
        },
        acc_type: {
            identifier: 'acc_type',
            rules: [{
                type: 'checked',
                prompt: 'Veuillez choisir le type de compte'
            }]
        },
        role_id: {
            identifier: 'role_id',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez sélectionner un rôle'
            }]
        },
        status: {
            identifier: 'status',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez sélectionner un statut'
            }]
        },
        password: {
            identifier: 'password',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez entrer un mot de passe'
            }]
        },
        password_confirmation: {
            identifier: 'password_confirmation',
            rules: [{
                type: 'match[password]',
                prompt: 'Veuillez confirmer le mot de passe'
            }]
        },
    }
});

$('#edit_user_form').form({
    fields: {
        name: {
            identifier: 'name',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez sélectionner un employé'
            }]
        },
        email: {
            identifier: 'email',
            rules: [{
                type: 'email',
                prompt: 'Entrez une adresse mail s\'il vous plaît'
            }]
        },
        acc_type: {
            identifier: 'acc_type',
            rules: [{
                type: 'checked',
                prompt: 'Veuillez choisir le type de compte'
            }]
        },
        role_id: {
            identifier: 'role_id',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez sélectionner un rôle'
            }]
        },
        status: {
            identifier: 'status',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez sélectionner un statut'
            }]
        },
    }
});

$('#add_role_form, #edit_role_form').form({
    fields: {
        role_name: {
            identifier: 'role_name',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez entrer un nom de rôle'
            }]
        },
        state: {
            identifier: 'state',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez sélectionner un statut'
            }]
        },
    }
});

$('#add_company_form').form({
    fields: {
        company: {
            identifier: 'company',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez saisir un nom d\'entreprise'
            }]
        },
    }
});

$('#add_department_form').form({
    fields: {
        department: {
            identifier: 'department',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez entrer un nom de département'
            }]
        },
    }
});

$('#add_jobtitle_form').form({
    fields: {
        department: {
            identifier: 'department',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez sélectionner un département'
            }]
        },
        jobtitle: {
            identifier: 'jobtitle',
            rules: [{
                type: 'empty',
                prompt: '   Veuillez saisir un titre de poste'
            }]
        },
    }
});

$('#add_leavetype_form').form({
    fields: {
        leavetype: {
            identifier: 'leavetype',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez entrer un nom de congé'
            }]
        },
        limit: {
            identifier: 'limit',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez entrer un numéro de crédit'
            }]
        },
        percalendar: {
            identifier: 'percalendar',
            rules: [{
                type: 'checked',
                prompt: 'Veuillez choisir une durée de congé'
            }]
        },
    }
});

$('#add_leavegroup_form, #edit_leavegroup_form').form({
    fields: {
        leavegroup: {
            identifier: 'leavegroup',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez entrer un nom de groupe de congé'
            }]
        },
        description: {
            identifier: 'description',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez saisir une description'
            }]
        },
        "leaveprivileges[]": {
            identifier: 'leaveprivileges[]',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez sélectionner les privilèges'
            }]
        },
        status: {
            identifier: 'status',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez sélectionner un statut'
            }]
        },
    }
});

$('#request_personal_leave_form, #edit_request_personal_leave_form').form({
    fields: {
        type: {
            identifier: 'type',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez sélectionner le type de congé'
            }]
        },
        leavefrom: {
            identifier: 'leavefrom',
            rules: [{
                type: 'empty',
                prompt: 'Please enter a Leave date from'
            }]
        },
        leaveto: {
            identifier: 'leaveto',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez saisir la date de départ'
            }]
        },
        returndate: {
            identifier: 'returndate',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez saisir la date de retour'
            }]
        },
        reason: {
            identifier: 'reason',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez entrer la raison'
            }]
        },
    }
});

$('#edit_personal_info_form').form({
    fields: {
        firstname: {
            identifier: 'firstname',
            rules: [{
                type: 'empty',
                prompt: 'Entrez votre prénom s\'il vous plait'
            }]
        },
        lastname: {
            identifier: 'lastname',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez entrer votre nom de famille'
            }]
        },
        gender: {
            identifier: 'gender',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez sélectionner le genre'
            }]
        },
        civilstatus: {
            identifier: 'civilstatus',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez sélectionner votre Statut matrimonial'
            }]
        },
        height: {
            identifier: 'height',
            rules: [{
                type: 'empty',
                prompt: 'Please enter your Height'
            }]
        },
        weight: {
            identifier: 'weight',
            rules: [{
                type: 'empty',
                prompt: 'Please enter your Weight'
            }]
        },
        emailaddress: {
            identifier: 'emailaddress',
            rules: [{
                type: 'email',
                prompt: 'Veuillez saisir votre adresse e-mail'
            }]
        },
        mobileno: {
            identifier: 'mobileno',
            rules: [{
                type: 'integer',
                prompt: 'Veuillez entrer votre numéro de téléphone portable'
            }]
        },
        age: {
            identifier: 'age',
            rules: [{
                type: 'integer',
                prompt: 'Please enter your Age'
            }]
        },
        birthday: {
            identifier: 'birthday',
            rules: [{
                type: 'empty',
                prompt: 'Please enter your Birthday'
            }]
        },
        birthplace: {
            identifier: 'birthplace',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez entrer votre lieu de naissance'
            }]
        },
        homeaddress: {
            identifier: 'homeaddress',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez saisir votre adresse personnelle'
            }]
        },
    }
});

$('#edit_personal_password_form').form({
    fields: {
        currentpassword: {
            identifier: 'currentpassword',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez entrer votre mot de passe actuel'
            }]
        },
        newpassword: {
            identifier: 'newpassword',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez entrer votre nouveau mot de passe'
            }]
        },
        confirmpassword: {
            identifier: 'confirmpassword',
            rules: [{
                type: 'empty',
                prompt: 'Veuillez confirmer votre nouveau mot de passe'
            }]
        },
    }
});

$('#edit_personal_user_form').form({
    fields: {
        name: {
            identifier: 'name',
            rules: [{
                type: 'empty',
                prompt: 'S\'il vous plaît entrez votre nom d\'utilisateur'
            }]
        },
        email: {
            identifier: 'email',
            rules: [{
                type: 'email',
                prompt: 'Veuillez entrer votre email d\'utilisateur'
            }]
        },
    }
});