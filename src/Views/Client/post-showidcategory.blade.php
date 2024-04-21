@extends('layouts.master')

@section('title')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            
            <div class="col-md-9" data-aos="fade-up">
                @foreach ($post as $item)
                
                <h3 class="category-title">{{$item['p_title']}}</h3>
                <div class="d-md-flex post-entry-2 half">
                    <a href="/post/{{$item['p_id']}}" class="me-4 thumbnail">
                        <img src="{{$item['p_image']}}" alt=""  width="500px" height="500px">
                    </a>
                    <div>
                        
                        <h3><a href="/post/{{$item['p_id']}}">{{$item['p_excerpt']}}</a></h3>
                        <p>{{$item['p_content']}}</p>
                        <div class="d-flex align-items-center author">
                            <div class="photo"><img src="assets/img/person-2.jpg" alt="" class="img-fluid"></div>
                        </div>
                    </div>
                   
                </div> 
                @endforeach

              

                <div class="text-start py-4">
                    <div class="custom-pagination">
                        <a href="#" class="prev">Prevous</a>
                        <a href="#" class="active">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <a href="#" class="next">Next</a>
                    </div>
                </div>
               
            </div>

            @include('components.sidebar')
        </div>
        
    </div>
@endsection
