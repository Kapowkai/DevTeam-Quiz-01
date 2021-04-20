@extends('layout\user-layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <form action="/" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" value="{{Request::get('search')}}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary">ค้นหา</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-2">
                <div class="d-flex justify-content-end bd-highlight mb-3">
                    <div class="p-2 btn btn-outline-secondary"><a href="/create">เพิ่ม</a></div>
                </div>
            </div>
        </div>
        <div class="row">
            @if(!$books->isEmpty())
                @foreach($books as $book)
            <div class="col-md-3">
                <div class="card mt-2">
                    <div class="card-body ">
                        <h5 class="card-title">{{$book->bookName}}</h5>
                        <p class="card-text">เขียนโดย : {{$book->writerName}} <br>ราคา : {{$book->price}} บาท </p>
                        <button type="button" class="btn btn-outline-secondary m-1" onclick="location.href='/change/{{$book->id}}';">Change</button>
                        <button type="button" class="btn btn-outline-danger m-1" @click="deleted({{$book->id}})">Delete</button>
                        <button type="button" class="btn btn-primary w-100 m-1 mt-3" @click="">Buy</button>

                    </div>
                </div>
            </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        var app = new Vue({
            el: '#app',
            data: {},
            methods:{
                updated(id){
                    axios.post('/update/'+id)
                        .then(function(response){
                            console.log(response);
                            if(response.data.status==200){
                                swal({
                                    icon:"success"
                                    ,text:response.data.message
                                    ,button:false
                                });
                                setTimeout(function (){
                                    window.location.reload();
                                },2000);
                            }else{
                                swal("ผิดพลาด",response.data.message,"error");
                            }
                        })
                        .catch(function(){
                            console.log('error');
                        })},
                deleted(id){
                    axios.delete('/api/delete-data/'+id)
                        .then(function(response){
                            console.log(response);
                            setTimeout(function (){
                                window.location.reload();
                            },200);
                        })
                        .catch(function(){
                            console.log('error');
                        });
                }


            }
        })
    </script>
@endpush
