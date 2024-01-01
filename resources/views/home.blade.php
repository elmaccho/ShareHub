@extends('layouts.app')    
    @section('content')
    <div class="main-container d-flex justify-content-between align-items-start gap-5">
        <div class="side-menu col-4 d-flex flex-column gap-4">
            <button class="close-side-menu"><i class="fa-solid fa-xmark"></i></button>
            <form class="sh-section d-flex align-items-center" action="">
                <input class="form-control" type="search" name="" id="" placeholder="Search...">
                <button class="border-0 bg-transparent search-btn" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
            <div class="buttons-wrapper d-flex align-items-center flex-column gap-4">
                <div class="sh-section d-flex flex-column">
                    <a class="menu-link" href="#"><i class="fa-solid fa-people-group"></i> Friends</a>
                    <a class="menu-link" href="#"><i class="fa-solid fa-boxes-stacked"></i> Saved posts</a>
                    <a class="menu-link" href="#"><i class="fa-solid fa-users-between-lines"></i> Groups</a>
                </div>
                <div class="sh-section d-flex flex-column">
                    <a class="menu-link" href="#"><i class="fa-solid fa-gear"></i> Settings</a>
                </div>
            </div>
        </div>
        <div class="post-container d-flex align-items-center flex-column gap-5">
            <div class="sh-section d-flex align-items-center">
                <div class="d-flex align-items-center gap-2">
                    <div class="user-profile-image">
                        <img src="{{ asset('storage/'. $user->profile_image_path) }}" alt="">
                    </div>
                    <p class="h3 m-0 welcome-message"><span class="inner-message">Hi {{ $user->name }}!</span> What's on your mind?</p>
                </div>
                <span class="comment-icon">
                    <i class="fa-solid fa-comment-dots"></i>
                </span>
            </div>

            <div class="sh-section d-flex flex-column">
                <div class="author-info">
                    <img class="user-profile-image" src="{{ asset('storage/' . $user->profile_image_path) }}" alt="">
                    <div class="post-info">
                        <div class="author-sur-name">
                            Maciej Chojnacki
                        </div>
                        <div class="post-date">
                            20.12.2023 at 22:14
                        </div>
                    </div>
                </div>
                <div class="post-title">
                    My first post!
                </div>
                <div class="post-description mb-3">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto itaque accusamus maiores inventore neque deleniti corporis facere repellat nesciunt excepturi dolorum illum perferendis ea fugiat consectetur assumenda sunt, alias recusandae commodi veritatis totam quam! Nesciunt nihil officia, nobis laborum error voluptas ea laboriosam quasi! Maxime nesciunt est error nostrum aspernatur deleniti maiores vero, debitis autem cupiditate. Repudiandae pariatur possimus quod hic nobis quo molestiae omnis et praesentium ea ad nihil odit, provident enim laborum ex iure dolore aut minus quia. Consectetur facere fugiat adipisci consequuntur architecto quia quibusdam ullam amet?
                </div>
                <div class="post-social-actions mb-3">
                    <button class="like-btn sh-post-btn">
                        <i class="fa-solid fa-heart"></i> 
                        1 Likes
                    </button>
                    <button class="comment-btn sh-post-btn">
                        <i class="fa-solid fa-comment"></i> 
                        0 Comments
                    </button>
                    <button class="saves-btn sh-post-btn">
                        <i class="fa-solid fa-bookmark"></i> 
                        0 Saves
                    </button>
                </div>
                <div class="post-comments-section">

                </div>
                <div class="post-add-comment d-flex align-items-center gap-2">
                    <img class="user-profile-image" src="{{ asset('storage/' . $user->profile_image_path) }}" alt="">

                    <form action="" method="post">
                        <input class="sh-input" type="text" name="" id="" placeholder="Write your comment...">
                    </form>
                </div>
            </div>
        </div>
    </div>
    @vite('resources/css/home.css')
    @vite('resources/js/side_menu.js')
@endsection
