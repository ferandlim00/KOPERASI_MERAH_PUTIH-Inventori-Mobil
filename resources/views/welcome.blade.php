@extends('layouts.app')

@section('content')
<style>
    .container{
        display: flex;          /* Aktifkan Flexbox pada body */
            justify-content: center;  /* Pusatkan горизонтально */
            align-items: center; 
            margin:auto;
            min-height: 80vh;      
    }
  .welcome-container {
    background-color: #f8fafc;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    margin: auto;
  }

  .welcome-heading {
    color: #2c3e50;
    margin-bottom: 1rem;
    font-size: 2.5rem;
  }

  .welcome-text {
    color: #4a5568;
    margin-bottom: 1.5rem;
    font-size: 1.1rem;
  }

  .login-button {
    background-color: #e53e3e;
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 5px;
    text-decoration: none;
    font-weight: 600;
    transition: background-color 0.3s ease;
    display: inline-block;
  }

  .login-button:hover {
    background-color: #c53030;
  }

  .dashboard-button {
    background-color: #38a169;
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 5px;
    text-decoration: none;
    font-weight: 600;
    transition: background-color 0.3s ease;
    display: inline-block;
  }

  .dashboard-button:hover {
    background-color: #2d684c;
  }

  @media (max-width: 768px) {
    .welcome-container {
      padding: 1.5rem;
      width: 95%;
    }

    .welcome-heading {
      font-size: 2rem;
    }

    .welcome-text {
      font-size: 1rem;
    }
  }
</style>

<div class="container">
  <div class="welcome-container">
    <h1 class="welcome-heading">Selamat Datang di Sistem Inventori Mobil</h1>
    <p class="welcome-text">Koperasi Mobil</p>
    <p class="welcome-text">Sistem ini digunakan untuk mencatat barang dan transaksi keluar/masuk.</p>

    @guest
      <div style="text-align: center;">
        <a href="{{ route('login') }}" class="login-button">Login untuk Masuk Sistem</a>
      </div>
    @endguest

    @auth
      <div style="text-align: center;">
        <a href="{{ route('barang.index') }}" class="dashboard-button">Masuk ke Dashboard</a>
      </div>
    @endauth
  </div>
</div>
@endsection
