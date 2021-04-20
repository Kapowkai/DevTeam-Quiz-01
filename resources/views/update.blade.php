@extends('layout/user-layout')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                            <h5 class="card-title">
                                <div class="d-flex justify-content-between">
                                    <div class="h4">Update this book in db</div>
                                </div>
                            </h5>
                            <form>
                                <div class="form-group">
                                    <label for="bookName">ชื่อหนังสือ</label>
                                    <input type="text" class="form-control" id="bookName" v-model="bookName" required>
                                </div>
                                <div class="form-group">
                                    <label for="writerName">แต่งโดย</label>
                                    <input type="text" class="form-control col-md-8" id=writerName" v-model="writerName" required>
                                    <label for="price">ราคา</label>
                                    <input type="text" class="form-control col-md-2" id="price" v-model="price" required>
                                    <label for="page">จำนวนหน้า</label>
                                    <input type="text" class="form-control col-md-2" id="page" v-model="page" required>
                                </div>
                                <button type="button" class="btn btn-primary pl-5 pr-5" @click="submit({!! $id !!})">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        var app = new Vue({
            el: '#app',
            data: {!! $result !!},
            methods:{
                submit(id){
                    const formData = new FormData();
                    formData.append('bookName',this.bookName);
                    formData.append('price',this.price);
                    formData.append('writerName',this.writerName);
                    formData.append('page',this.page);
                    formData.append('_method','PUT');
                    axios.post('/api/update-data/'+id,
                        formData,
                        {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        })
                        .then(function(response){
                            console.log(response);
                            // window.location = '/home';
                    })
                        .catch(function(){
                            console.log('error');
                        });
                }


            }
        })
    </script>
@endpush
