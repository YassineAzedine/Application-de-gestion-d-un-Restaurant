@extends('layouts.master')
@section('content')
<body id="body-pd">
<header class="header" id="header">
<div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
<div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
</header>
<div class="l-navbar" id="nav-bar">
<nav class="nav">
<div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">BBBootstrap</span> </a>
<div class="nav_list"> <a href="#" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> <a href="#" class="nav_link"><i class="fas fa-list">       </i> <span class="nav_name">servants</span> </a> <a href="#" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Messages</span> </a> <a href="#" class="nav_link"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Bookmark</span> </a> <a href="#" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Files</span> </a> <a href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Stats</span> </a> </div>
</div> <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
</nav>
</div>
<!--Container Main start-->
<div class="container">
<div class="height-100 bg-light">
<div class="d-flex flex-row justify-content-between">
<h3><i class="fas fa-list">servants</i></h3>





</div>
<a class="btn btn-primary " data-toggle="modal" data-target="#ModelCreate">
    <i class="fas fa-plus"></i>
            </a>
<table class="table table-hover">
<thead>
<tr>
<th>Id</th>
<th>Name</th>
<th>Address</th>

<th>Action</th>
</tr>
</thead>
@foreach ($servants as $servant)     
<tbody>




<td>  
{{$servant->id}}
</td>
<td>  
{{$servant->name}}</td>
<td>  
    @if($servant->address)
    {{$servant->address}}
    @else
        <span>non disponible</span>
    
    @endif

</td>
<td>  

<a class="btn bg-success table-striped" data-toggle="modal" data-target="#ModelEdit{{$servant->id}}">
<i class="fas fa-edit"></i>

</a>


</td>
<td>
    <a class="btn btn-warning" data-toggle="modal" data-target="#ModelEdit{{$servant->id}}">
        <i class="fas fa-eye"></i>  
</td>

<td>
<td>
<form action="{{route("servants.destroy",$servant->id)}}" method="post" id="{{$servant->id}}">
@csrf
@method("DELETE")

<button class="btn btn-danger"
onclick="event.preventDefault();
if(confirm('voulez vous supprimer la Categorie :   {{$servant->name}}?'))

document.getElementById({{$servant->id}}).submit()
" >

<i class="fas fa-trash"></i>
</button>
</form>

</td>
@include('management.servants.edit')
@include('management.servants.create')



</tbody>
@endforeach

</table>






</div>
</div>







<!--Container Main end-->
@endsection

