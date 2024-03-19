@extends('layouts.admin_layout')
@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">All Users</h1>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Group Name</th>
            
            <th scope="col">Actions</th>
            
        </tr>
        </thead>
        <tbody>
          
            @if($usergroup->count() > 0)
            @php
                $count = 1;
            @endphp
            @foreach ($usergroup as $item)
            <tr>
                @php
                $group = App\Models\Group::where('id',$item->group_id)->first();
               @endphp
               
                <th scope="row">{{$count ++}}</th>
                <td>{{$group->group_name}}</td>
                <td> 
                    <a href="{{route('admin.groupchat',$group->id)}}" class="btn btn-success">Group Chats</a>
                    
                    </td>
                
               
            </tr> 
           
       
            @endforeach
            @endif

            </tr>
        </tbody>
    </table>
</div>
@endsection
