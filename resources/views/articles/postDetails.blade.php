
    @extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <main class="tm-main">
            <!-- Search form -->
            <div class="row tm-row">
                <div class="col-12">
                    <form method="GET" class="form-inline tm-mb-80 tm-search-form">                
                        <input class="form-control tm-search-input" name="query" type="text" placeholder="Search..." aria-label="Search">
                        <button class="tm-search-button" type="submit">
                            <i class="fas fa-search tm-search-icon" aria-hidden="true"></i>
                        </button>                                
                    </form>
                </div>                
            </div>            
            <div class="row tm-row">
                <div class="col-12">
                    <hr class="tm-hr-primary tm-mb-55">
               						  
                        <img src="{{ $posts->img }}" alt="Image" class="tm-mb-40" height="535">                            
                    
                </div>
            </div>
            <div class="row tm-row">
                <div class="col-lg-8 tm-post-col">
                    <div class="tm-post-full">                    
                        <div class="mb-4">
                            <h2 class="pt-2 tm-color-primary tm-post-title">{{ $posts->title }}</h2>
                            <p class="tm-mb-40">{{ $posts->created_at }} posted by  {{ $posts->user->name }}</p>
                            <h4 class="pt-2 tm-color-primary tm-post-title">Summary:</h4>
                            <p>
                                {{ $posts->summary }} 
                            </p>
                            <h4 class="pt-2 tm-color-primary tm-post-title">Body:</h4>
                            <p>
                                {{ $posts->body }} 
                            </p>
                            
                        </div>
                        
                        <!-- Comments -->
                        <div>
                            <h2 class="tm-color-primary tm-post-title">Comments</h2>
                            <hr class="tm-hr-primary tm-mb-45">
                            <example-component v-bind:post_id="{{ $posts->id }}" v-bind:user_id="{{ auth()->id() }}" ></example-component>
                        </div>
                    </div>
                </div>

            
                <aside class="col-lg-4 tm-aside-col">
                    <div class="tm-post-sidebar">
                        <hr class="mb-3 tm-hr-primary">
                        <h2 class="mb-4 tm-post-title tm-color-primary">Categories</h2>
                        <ul class="tm-mb-75 pl-5 tm-category-list">
                            
                            @forelse ($posts->categories as $cat)
                        <li><a href="#" class="tm-color-primary">{{ $cat->name }}</a></li>
                        @empty
                        <p>No categories</p>
                    @endforelse
                        </ul>
                        <hr class="mb-3 tm-hr-primary">
                     
                    </div>                    
                </aside>
            </div>
            <footer class="row tm-row">
                <div class="col-md-6 col-12 tm-color-gray">
                    Design: <a rel="nofollow" target="_parent" href="https://templatemo.com" class="tm-external-link">TemplateMo</a>
                </div>
                <div class="col-md-6 col-12 tm-color-gray tm-copyright">
                    Copyright 2020 Xtra Blog Company Co. Ltd.
                </div>
            </footer>
        </main>
    </div>
    

@endsection
