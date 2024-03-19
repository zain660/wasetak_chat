@extends('layouts.admin_layout')
@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        @foreach ($chats as $item)
        <h1 class="h3 mb-0 text-gray-800">Messages</h1>
        <h1 class="h4 mb-0 text-gray-800">Date/Time: {{$item->updated_at->format('d-m-y')}}</h1>

    </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Message</th>
                
                
            </tr>
            </thead>
            <tbody>
             
                    <tr>
                        <th scope="row"></th>
                        <td>{{$item->message}}</td>
                        
                    </tr> 
                   
            </tbody>
        </table>

        @endforeach
        
    
    </div>
@endsection
