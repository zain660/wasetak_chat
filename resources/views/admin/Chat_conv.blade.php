@extends('layouts.admin_layout')
@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Chat Conversation</h1>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">image</th>
            <th scope="col">email</th>
            <th scope="col">action</th>
            
        </tr>
        </thead>
        <tbody>
            @if($ChatConvo->count() > 0)
            @php
                $count = 1;
            @endphp
                @foreach ($ChatConvo as $item)
                    @php
                        $user = App\Models\User::where('id',$item->sender_id)
                        ->orwhere('id',$item->reciever_id)->where('id','!=', $id)->first();
                    @endphp
                <tr>
                    <th scope="row">{{$count ++}}</th>
                    <td>{{$user->name}}</td>
                    <td><img src="{{asset('/assets/media/avatar')}}/{{$user->avatar}}" alt="" class="shadow p-3 mb-5 bg-white" style="width: 50px;border-radius: 100px;"></td>
                    <td>{{$user->email}}</td>
                    <td>
                    
                    </td>
                    <td>
                        <a href="{{route('admin.chats',$item->id)}}" class="btn btn-success">Chats</a>
                    </td>
                </tr> 
                @endforeach
                {{$ChatConvo->links()}}
                @else
                <tr>
                    <td>No data found.</td>
                </tr>
            @endif
            </tbody>
    </table>
</div>
@endsection
