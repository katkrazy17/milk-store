@extends('layouts.cate-layout')
@section('content')

<div class="col-xs-12 col-sm-8  ">
    <div class="panel panel-success">
        <div class="panel-body">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
                    <h4>
                        <a href="" class="pro-detail-title">
                          {!! Form::label('','', ['control-label']) !!}
                          {!! Form::label('', $laptop->name, ['control-label']) !!}
                        </a>
                    </h4>
                    <hr>

                    <div class="row">

                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                            <div class="img-box img_detail">
                            <img class="img-responsive" id="chitietanh" src="{!!url('./uploads/'.$laptop->images)!!}" alt="img responsive">
                            </div>
                            <h3 class="price  ">{!!number_format($laptop->price)!!}₫</h3>
                        </div>

                        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Khuyễn mãi - Chính sách</h3>
                                </div>

                                <div class="panel-body">
                                    <div class="khuyenmai">
                                        <li>- {!!$laptop->promo!!}</li>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-info">
                                <div class="panel-body">
                                    <div class="chinhsach">
                                        <li>- Trong hộp có: {!!$laptop->packet!!} </li>
                                        <li>- Giao hàng tận nơi miễn phí</li>
                                    </div>
                                </div>
                            </div>
                            <a href="{!!url('cart/addcart/'.$laptop->id)!!}" title="" class="btn btn-large btn-block btn-primary btnthemct">Đặt hàng ngay</a>
                        </div>
                    </div>
                </div>
            </div>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
