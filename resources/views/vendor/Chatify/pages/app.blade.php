@extends('admin.admin_master')
@section('admin')
    @include('Chatify::layouts.headLinks')

    <style>
        /* Pastikan elemen messenger memiliki tinggi maksimum */
        .messenger {
            max-height: 100vh;
            overflow: hidden;
        }

        /* Batasi ukuran kontainer pesan agar tidak keluar dari tata letak */
        .messages-container {
            max-height: calc(100vh - 100px);
            /* Sesuaikan sesuai dengan kebutuhan Anda */
            overflow-y: auto;
        }

        /* Batasi tinggi kontainer daftar kontak */
        .listOfContacts {
            max-height: calc(100vh - 272px);
            /* Sesuaikan sesuai dengan kebutuhan Anda */
            overflow-y: auto;
        }
    </style>
    <div class="messenger">
        {{-- ----------------------Users/Groups lists side---------------------- --}}
        <div class="messenger-listView {{ !!$id ? 'conversation-active' : '' }}">
            {{-- Header and search bar --}}
            <div class="m-header">
                <nav>
                    <a href="#"><i class="fas fa-inbox"></i> <span class="messenger-headTitle">MESSAGES</span> </a>
                    {{-- header buttons --}}
                    <nav class="m-header-right">

                    </nav>
                </nav>
                {{-- Search input --}}
                <input type="text" class="messenger-search" placeholder="Search" />
                {{-- Tabs --}}

            </div>
            {{-- tabs and lists --}}
            <div class="m-body contacts-container">
                {{-- Lists [Users/Group] --}}
                {{-- ---------------- [ User Tab ] ---------------- --}}
                <div class="show messenger-tab users-tab app-scroll" data-view="users">
                    {{-- Favorites --}}
                    <div class="favorites-section">
                        <p class="messenger-title"><span>Favorites</span></p>
                        <div class="messenger-favorites app-scroll-hidden"></div>
                    </div>
                    {{-- Saved Messages --}}

                    {{-- Contact --}}
                    <p class="messenger-title"><span>All Messages</span></p>
                    <div class="listOfContacts" style="width: 100%;height: calc(100% - 272px);position: relative;"></div>
                </div>
                {{-- ---------------- [ Search Tab ] ---------------- --}}
                <div class="messenger-tab search-tab app-scroll" data-view="search">
                    {{-- items --}}
                    <p class="messenger-title"><span>Search</span></p>
                    <div class="search-records">
                        <p class="message-hint center-el"><span>Type to search..</span></p>
                    </div>
                </div>
            </div>
        </div>

        {{-- ----------------------Messaging side---------------------- --}}
        <div class="messenger-messagingView">
            {{-- header title [conversation name] amd buttons --}}
            <div class="m-header m-header-messaging">
                <nav class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                    {{-- header back button, avatar and user name --}}
                    <div class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                        <a href="#" class="show-listView"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    {{-- header buttons --}}
                    <a href="{{ route('dashboard') }}" class="home-icon"><i class="fas fa-home"></i></a>
                </nav>
                {{-- Internet connection --}}
                <div class="internet-connection">
                    <span class="ic-connected">Connected</span>
                    <span class="ic-connecting">Connecting...</span>
                    <span class="ic-noInternet">No internet access</span>
                </div>
            </div>

            {{-- Messaging area --}}
            <div class="m-body messages-container app-scroll">
                <div class="messages">
                    <p class="message-hint center-el"><span>Please select a chat to start messaging</span></p>
                </div>
                {{-- Typing indicator --}}
                <div class="typing-indicator">
                    <div class="message-card typing">
                        <div class="message">
                            <span class="typing-dots">
                                <span class="dot dot-1"></span>
                                <span class="dot dot-2"></span>
                                <span class="dot dot-3"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Send Message Form --}}
            @include('Chatify::layouts.sendForm')
        </div>

        {{-- ---------------------- Info side ---------------------- --}}
        <div class="messenger-infoView app-scroll">
            {{-- nav actions --}}
            <nav>
                <p>User Details</p>
                <a href="#"><i class="fas fa-times"></i></a>
            </nav>
            {!! view('Chatify::layouts.info')->render() !!}
        </div>
    </div>

    @include('Chatify::layouts.modals')
    @include('Chatify::layouts.footerLinks')
@endsection

<style>
    .m-header a.home-icon {
        margin-right: auto;
        /* Pushes the icon to the left */
        margin-left: 20px;
        /* Adds some space between the icon and the back button */
    }
</style>
