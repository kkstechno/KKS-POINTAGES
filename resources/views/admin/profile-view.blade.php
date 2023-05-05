@extends('layouts.default')

    @section('meta')
        <title>Profil | KKS-POINTAGES</title>
        <meta name="description" content="Workday view employee profile, edit employee profile, update employee profile">
    @endsection

    @section('content')
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">{{ __('Profil de l\'employé') }}
                    <a href="{{ url('employees') }}" class="ui basic blue button mini offsettop5 float-right"><i class="ui icon chevron left"></i>{{ __('Retour') }}</a>
                </h2>
            </div>    
        </div>

        <div class="row">
            <div class="col-md-4 float-left">
                <div class="box box-success">
                    <div class="box-body employee-info">
                        <div class="author">
                        @if($i != null)
                            <img class="avatar border-white" src="{{ asset('/assets/faces/'.$i) }}" alt="profile photo"/>
                        @else
                            <img class="avatar border-white" src="{{ asset('/assets/images/faces/default_user.jpg') }}" alt="profile photo"/>
                        @endif
                        </div>
                        <p class="description text-center">
                            <h4 class="title">@isset($p->firstname) {{ $p->firstname }} @endisset @isset($p->lastname) {{ $p->lastname }} @endisset</h4>
                            <table style="width: 100%" class="profile-tbl">
                                <tbody>
                                <td></td>
                                        <td><span class="p_value" style="color:red;">@isset($c->idno) {{ $c->idno }} @endisset</span></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><span class="p_value">@isset($p->emailaddress) {{ $p->emailaddress }} @endisset</span></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><span class="p_value">@isset($p->mobileno) {{ $p->mobileno }} @endisset</span></td>
                                    </tr>
                                    <tr>

                                </tbody>
                            </table>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-8 float-left">
                <div class="box box-success">
                    <div class="box-header with-border">{{ __('Renseignements personnels') }}</div>
                    <div class="box-body employee-info">
                            <table class="tablelist">
                                <tbody>
                                    <tr>
                                        <td><p>{{ __('Situtation Matrimoniale') }}</p></td>
                                        <td><p>@isset($p->civilstatus) {{ $p->civilstatus }} @endisset</p></td>
                                    </tr>
                                    <tr>
                                        <td><p>{{ __('Genre') }}</p></td>
                                        <td><p>@isset($p->gender) {{ $p->gender }} @endisset</p></td>
                                    </tr>
                                    <tr>
                                        <td><p>{{ __('Adresse du domicile') }}</p></td>
                                        <td><p>@isset($p->homeaddress) {{ $p->homeaddress }} @endisset</p></td>
                                    </tr>
                                    <tr>
                                        <td><p>{{ __('N° CNI') }}</p></td>
                                        <td><p>@isset($p->nationalid) {{ $p->nationalid }} @endisset</p></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h4 class="ui dividing header">{{ __('Information d\'emploi') }}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Entreprise') }}</td>
                                        <td>@isset($c->company) {{ $c->company }} @endisset</td>
                                    </tr>
                                    <tr>
                                        <td><p>{{ __('Département') }}</p></td>
                                        <td><p>@isset($c->department) {{ $c->department }} @endisset</p></td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Poste / Fonction') }}</td>
                                        <td>@isset($c->jobposition) {{ $c->jobposition }} @endisset</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Privilège') }}</td>
                                        <td>
                                            @isset($leavetype)
                                                @isset($leavegroup) 
                                                    @isset($c->leaveprivilege)
                                                        @foreach($leavegroup as $lg)
                                                            @if($lg->id == $c->leaveprivilege)
                                                                @php
                                                                    $lp = explode(",", $lg->leaveprivileges);
                                                                @endphp
                                                                @foreach($lp as $rights) 
                                                                    @foreach($leavetype as $lt)
                                                                        @if($lt->id == $rights) {{ $lt->leavetype }}, @endif
                                                                    @endforeach
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    @endisset
                                                @endisset
                                            @endisset
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><p>{{ __('Type d\'emploi') }}</p></td>
                                        <td><p>@isset($p->employmenttype) {{ $p->employmenttype }} @endisset</p></td>
                                    </tr>
                                    <tr>
                                        <td><p>{{ __('Date (Prise de fonction)') }}</p></td>
                                        <td>
                                            <p>
                                            @isset($c->startdate) 
                                                @php echo e(date("d-m-Y", strtotime($c->startdate))) @endphp
                                            @endisset
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><p>{{ __('Date d\'Embauche') }}</p></td>
                                        <td>
                                            <p>
                                            @isset($c->dateregularized) 
                                                @php echo e(date("d-m-Y", strtotime($c->dateregularized))) @endphp
                                            @endisset
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><p>{{ __('Statut') }}</p></td>
                                        <td><p>@isset($p->employmentstatus) {{ $p->employmentstatus }} @endisset</p></td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
    





