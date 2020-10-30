@extends('admin.master.master')
@section('title','Vietpro edit Product')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa sản phẩm</h1>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-xs-6 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Sửa sản phẩm</div>
                    <div class="panel-body">
                        <form action="{{route('product.update',['id'=>$product->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row" style="margin-bottom:40px">

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Danh mục</label>
                                        <select name="category" class="form-control">
                                            {{GetCategory($categories,0,"",$product->parent)}}
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Mã sản phẩm</label>
                                        <input  type="text" name="code" class="form-control" value="{{$product->code}}">
                                        {{ShowError($errors,'code')}}
                                    </div>
                                    <div class="form-group">
                                        <label>Tên sản phẩm</label>
                                        <input  type="text" name="name" class="form-control" value="{{$product->name}}">
                                        {{ShowError($errors,'name')}}
                                    </div>
                                    <div class="form-group">
                                        <label>Giá sản phẩm (Giá chung)</label>
                                        <input  type="number" name="price" class="form-control" value="{{$product->price}}">
                                        {{ShowError($errors,'price')}}
                                    </div>
                                    <div class="form-group">
                                        <label>Sản phẩm có nổi bật</label>
                                        <select  name="featured" class="form-control">
                                            @if ($product->featured==0) <option selected value="0">Không</option> @endif
                                            @if ($product->featured==1) <option selected value="1">Có</option> @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Trạng thái</label>
                                        <select  name="state" class="form-control">
                                            @if ($product->state==1) <option selected value="1">Còn hàng</option> @endif
                                            @if ($product->state==0) <option selected value="0">Hết hàng</option> @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Ảnh sản phẩm</label>
                                        <input id="img" type="file" name="img" class="form-control hidden"
                                            onchange="changeImg(this)">
                                        <img id="avatar" class="thumbnail" width="100%" height="350px" src="../upload/image/{{$product->image}}">
                                        {{ShowError($errors,'img')}}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Thông tin</label>
                                        <textarea  name="info" style="width: 100%;height: 100px;">{{$product->info}}</textarea>
                                        {{ShowError($errors,'info')}}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Miêu tả</label>
                                        <textarea id="editor"  name="describe" style="width: 100%;height: 100px;">{{$product->description}}</textarea>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">

                                        <button class="btn btn-success" name="add-product" type="submit">Sửa sản phẩm</button>
                                        <button class="btn btn-danger" type="reset">Huỷ bỏ</button>
                                    </div>
                                </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>

            </div>
        </div>

        <!--/.row-->
    </div>

@endsection
@section('script')
@parent
<script>
     function changeImg(input){
            //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
            if(input.files && input.files[0]){
                var reader = new FileReader();
                //Sự kiện file đã được load vào website
                reader.onload = function(e){
                    //Thay đổi đường dẫn ảnh
                    $('#avatar').attr('src',e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(document).ready(function() {
            $('#avatar').click(function(){
                $('#img').click();
            });
        });

    </script>

@endsection