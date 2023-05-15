@extends('layouts.personal')

    @section('meta')
        <title>Profil Employé | KKS-POINTAGE</title>
        <meta name="description" content="Workday my profile, view my profile, and update my personal information">
    @endsection

    @section('content')
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">{{ __("Profil Employé") }} - <span class="p_value" style="color:red;">@isset($company_data->idno) {{ $company_data->idno }} @endisset</span>
                    <!--a href="{{ url('personal/profile/edit') }}" class="ui basic blue button mini offsettop5 float-right" ><i class="ui icon edit" ></i>{{ __("Editer") }}</a-->
                </h2>
            </div>    
        </div><br>

        <div class="row">
            <div class="col-md-4 float-left">
                <div class="box box-success">
                    <div class="box-body employee-info">
                            <div class="author">
                            @if($profile_photo != null)
                                <img class="avatar border-white" src="{{ asset('/assets/faces/'.$profile_photo) }}" alt="profile photo"/>
                            @else
                                <img class="avatar border-white" src="{{ asset('/assets/images/faces/user.png') }}" alt="profile photo"/>
                            @endif
                            </div>
                            <p class="description text-center">
                                <h4 class="title">@isset($profile->firstname) {{ $profile->firstname }} @endisset @isset($profile->lastname) {{ $profile->lastname }} @endisset</h4>
                                <table style="width: 100%" class="profile-tbl">
                                    <tbody>
                                        <tr>
                                            <td><span class="p_value">@isset($profile->emailaddress) {{ $profile->emailaddress }} @endisset</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="p_value">@isset($profile->mobileno) {{ $profile->mobileno }} @endisset</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="p_value">@isset($company_data->idno) {{ $company_data->idno }} @endisset</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </p>
                    </div>
                </div>
            </div>

            <div class="col-md-8 float-left">
                <div class="box box-success">
                    <div class="box-header with-border">{{ __("Informations Personnels") }}</div>
                    <div class="box-body employee-info">
                        <table class="tablelist">
                            <tbody>

                                <tr>
                                    <td><p>{{ __("Genre") }}</p></td>
                                    <td><p>@isset($profile->gender) {{ $profile->gender }} @endisset</p></td>
                                </tr>
                                <tr>
                                    <td><p>{{ __("Adresse du domicile") }}</p></td>
                                    <td><p>@isset($profile->homeaddress) {{ $profile->homeaddress }} @endisset</p></td>
                                </tr>
                                <tr>
                                    <td><p>{{ __("N° CNI") }}</p></td>
                                    <td><p>@isset($profile->nationalid) {{ $profile->nationalid }} @endisset</p></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h4 class="ui dividing header">{{ __("Informations Supplémentaires") }}</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ __("Entreprise") }}</td>
                                    <td>@isset($company_data->company) {{ $company_data->company }} @endisset</td>
                                </tr>
                                <tr>
                                    <td><p>{{ __("Département") }}</p></td>
                                    <td><p>@isset($company_data->department) {{ $company_data->department }} @endisset</p></td>
                                </tr>
                                <tr>
                                    <td>{{ __("Fonction") }}</td>
                                    <td>@isset($company_data->jobposition) {{ $company_data->jobposition }} @endisset</td>
                                </tr>
                                <tr>
                                <tr>
                                    <td><p>{{ __("Type d'Emploi") }}</p></td>
                                    <td><p>@isset($profile->employmenttype) {{ $profile->employmenttype }} @endisset</p></td>
                                </tr>

                                <tr>
                                    <td><p>{{ __("Prise de fonction") }}</p></td>
                                    <td><p>
                                        @isset($company_data->startdate) 
                                            @php echo e(date("d-m-Y", strtotime($company_data->startdate))) @endphp
                                        @endisset
                                    </p></td>
                                </tr>
                                <tr>
                                    <td><p>{{ __("Date Embauche") }}</p></td>
                                    <td><p>
                                        @isset($company_data->dateregularized) 
                                            @php echo e(date("d-m-Y", strtotime($company_data->dateregularized))) @endphp
                                        @endisset
                                    </p></td>
                                </tr>
                                <tr>
                                    <td><p>{{ __("Statut du Compte") }}</p></td>
                                    <td>
                                        @if($profile->employmentstatus != '') 
                                        @if($profile->employmentstatus == 'Activé')
                                            <span class="green">{{ __("Activé") }}</span> 
                                        @else
                                            <span class="red">{{ __("Désactivé") }}</span> 
                                        @endif
                                    @endif
                                    </td>
                                </tr> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection




